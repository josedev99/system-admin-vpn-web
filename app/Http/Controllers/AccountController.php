<?php

namespace App\Http\Controllers;

use App\account;
use App\saldo;
use App\sales;
use App\server;
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
        //Create user a server ssh
        
        $this->command_ssh($resp->user, $resp->passwd,get_days());
        
        
        //Descontamos su saldo actual
        $user_saldo = saldo::find(auth()->user()->id);
        $user_saldo->decrement('saldo',session('price'));
        //Obtiene el saldo final de su cuenta
        $getSaldo = saldo::where('user_id',auth()->user()->id)->get()->sum('saldo');
        session(['saldoDisponible' => $getSaldo]);
        sales::create([
            'user_id' => auth()->user()->id,
            'total' => session('price'),
            'date' => $fecha_actual,
            'paypal_data' => 'saldo virtual',
            'account_id' => $resp->id
        ]);
        
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

    public function command_ssh($user,$passwd,$date){
        //$comand = 'useradd -e '.$date.' -p "$(mkpasswd --method=sha-512 '.$passwd.')" '.$user;
        //Limite de conexiones simultaneas
        $conection_limit = session('conection_limit');
        $comand = 'bash adduser.sh '.$date.' '.$passwd.' '.$user.' '.$conection_limit;
        $stream = ssh2_exec(connect(session('host'),session('vps_user'),session('vps_passwd'),22), $comand);
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
