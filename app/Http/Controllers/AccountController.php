<?php

namespace App\Http\Controllers;

use App\account;
use App\saldo;
use App\sales;
use App\server;
use App\TotalAccounts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AccountController extends Controller
{
    public function WS_USA1(){
        
        $data = request()->validate([
            'user' => "required",
            'passwd' => "required",
            'g-recaptcha-response' => 'recaptcha'
        ]);
        //Validation data
        $validateUser = account::where('user','=','hive-vpn.tk-'.$data['user'])->get();
        if(count($validateUser) > 0){
            return redirect()->back()->with('status','El usuario ya existe!');
        }
        
    
        $fecha_actual = date("Y-m-d");   
        
        $resp = account::create([
            'user' => 'hive-vpn.tk-'.$data['user'],
            'passwd' => $data['passwd'],
            'sni' => '',
            'created' => $fecha_actual,
            'expire' => get_days(),
            'user_id' => auth()->user()->id,
            'server_id' => session('server_id'),
            'status' => 1
        ]);
        //Contabilizador de cuentas
        $insertedAccountsTotal = TotalAccounts::create([
            "account_Number" => 1,
            "date_create" => $fecha_actual
        ]);
        $getUserAll = DB::table('servers')->
            join('accounts','servers.id','=','accounts.server_id')->
            where('accounts.id',$resp->id)->
            get();
        $resp_data = $getUserAll[0];
        //Create user a server ssh
        
        $this->command_ssh($resp->user, $resp->passwd,get_days());
        
        return view('view_account',compact('resp_data'));
    }
    public function WS_Premium(){
        
        $data = request()->validate([
            'user' => "required",
            'passwd' => "required",
            'g-recaptcha-response' => 'recaptcha'
        ]);
        //Validation data
        $validateUser = account::where('user','=',$data['user'])->get();
        if(count($validateUser) > 0){
            return redirect()->back()->with('status','El usuario ya existe!');
        }
        
        $fecha_actual = date("Y-m-d");   
        
        $resp = account::create([
            'user' => $data['user'],
            'passwd' => $data['passwd'],
            'sni' => '',
            'created' => $fecha_actual,
            'expire' => get_days(),
            'user_id' => auth()->user()->id,
            'server_id' => session('server_id'),
            'status' => 1
        ]);
        $getUserAll = DB::table('servers')->
            join('accounts','servers.id','=','accounts.server_id')->
            where('accounts.id',$resp->id)->
            get();
        $resp_data = $getUserAll[0];
        
        //Descontamos su saldo actual
        $getSaldo = saldo::where('user_id',auth()->user()->id)->get()->sum('saldo');
        $getSaldo -= session('price');
        saldo::where('user_id','=',auth()->user()->id)->update(['saldo' => $getSaldo]); //Update saldo
        //Obtiene el saldo final de su cuenta
        $getSaldoTotal = saldo::where('user_id',auth()->user()->id)->get()->sum('saldo');
        session(['saldoDisponible' => $getSaldoTotal]);
        sales::create([
            'user_id' => auth()->user()->id,
            'total' => session('price'),
            'date' => $fecha_actual,
            'paypal_data' => 'saldo virtual',
            'account_id' => $resp->id
        ]);
        
        //Create user a server ssh
        $this->command_ssh($resp->user, $resp->passwd,get_days());
        
        return view('view_account',compact('resp_data'));
    }

    public function showSSH(){
        $getUsersAll = DB::table('servers')->
            join('accounts','servers.id','=','accounts.server_id')->
            where('accounts.user_id',auth()->user()->id)->orderBy('accounts.id','desc')->get();
        return view('panel.ssh.index',compact('getUsersAll'));
    }
    public function showAllAccounts(){
        $getUsersAll = DB::table('servers')->
            join('accounts','servers.id','=','accounts.server_id')->
            orderBy('accounts.id','desc')->get();
        return view('panel.ssh.all',compact('getUsersAll'));
    }
    //New function 
    public function showPremiumSSH(){
        $getSSHPremium = DB::table('servers')
            ->join('accounts','servers.id','=','accounts.server_id')
            ->where('accounts.user_id','=',auth()->user()->id)
            ->orderBy('accounts.id','desc')
            ->get();

        return view('panel.ssh.premium', compact('getSSHPremium'));
    }
    //New function
    public function renewSSH($id){
        return view('panel.ssh.renovar');
    }
    //Function renew ssh update
    public function updateSSH(){
        $server_data = server::where('ip','=',request()->ip)->get();
        session([
            'host' => $server_data[0]->ip,
            'vps_user' => $server_data[0]->vps_user,
            'vps_passwd' => $server_data[0]->vps_passwd,
            'days' => request()->days
        ]);
        //Validation payment
        $payment = 0;
        switch(request()->days){
            case 16:
                $payment = 2;
                break;
            case 32:
                $payment = 4;
                
                break;
            case 61:
                $payment = 9;
                
                break;
        }
        $getSaldoTotal = saldo::where('user_id',auth()->user()->id)->get()->sum('saldo');
        if($getSaldoTotal >= $payment){
            //Update saldo
            $getSaldoTotal -= $payment;
            saldo::where('user_id','=',auth()->user()->id)->update(['saldo' => $getSaldoTotal]);
            session(['saldoDisponible' => $getSaldoTotal]);
            //Continue code
            account::where('user','=',request()->user)->update([
                "expire" => get_days()
            ]);
    
            $command = 'bash updateUser.sh '.get_days().' '.request()->user;
    
            $this->command_ssh('','',get_days(),$command);
    
            return redirect()->route('sshPremium')->with('success','Cuenta SSH actualizado!!');

        }else{
            return redirect()->route('sshPremium')->with('error','Saldo insufiente');
        }
    }

    public function command_ssh($user,$passwd,$date, $command = ''){
        //$comand = 'useradd -e '.$date.' -p "$(mkpasswd --method=sha-512 '.$passwd.')" '.$user;
        //Limite de conexiones simultaneas
        $conection_limit = session('conection_limit');
        if($command == ''){
            $command = 'bash adduser.sh '.$date.' '.$passwd.' '.$user.' '.$conection_limit;
        }

        $stream = ssh2_exec(connect(session('host'),session('vps_user'),session('vps_passwd'),22), $command);
        stream_set_blocking( $stream, true );
 
        $data = "";
        
        while( $buf = fread($stream,4096) ){
        
        $data .= $buf;
        //Output uuid
        echo $buf;
        
        } 
        fclose($stream);
    }
}
