<?php

namespace App\Http\Controllers;

use App\account;
use App\server;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AccountController extends Controller
{
    public function WS_USA1($id){
        
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
            'created' => $fecha_actual,
            'expire' => get_days(),
            'user_id' => auth()->user()->id,
            'server_id' => $id,
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
    public function showSSH(){
        $getUsersAll = DB::table('servers')->
            join('accounts','servers.id','=','accounts.server_id')->
            where('accounts.user_id',auth()->user()->id)->orderBy('accounts.id','desc')->
            get();
        return view('panel.ssh.index',compact('getUsersAll'));
    }
    public function command_ssh($user,$passwd,$date){
        $comand = 'useradd -e '.$date.' -p "$(mkpasswd --method=sha-512 '.$passwd.')" '.$user;

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
