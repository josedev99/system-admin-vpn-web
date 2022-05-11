<?php

namespace App\Http\Controllers;

use App\account;
use App\server;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class v2rayController extends Controller
{
    public function v2rayCore($id){
        
        $data = request()->validate([
            'user' => "required",
            'domain_bug' => 'required',

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
            'passwd' => '',
            'sni' => $data['domain_bug'],
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
        
        //Create v2ray
        $comand = "bash adduser.sh";
        
        $stream = ssh2_exec(connect(session('host'),session('vps_user'),session('vps_passwd'),22), $comand);
        stream_set_blocking( $stream, true );
        
        $genraUUID = "";
        
        while( $buf = fread($stream,4096) ){
            
            $genraUUID .= $buf;
            
        } 
        fclose($stream);
        //UUID
        $searchString = "\n";
        $replaceString = "";
        $uuid = str_replace($searchString,$replaceString,$genraUUID);
        $vmess = json_encode([ "v" => "2", "ps" => "free.v2ray-ssl.tk:443", "add" => $data['domain_bug'], "port" => 443, "aid" => 0, "type" => "", "net" => "ws", "path" => "/hive-vpn.tk/", "host" => "free.v2ray-ssl.tk", "id" => $uuid, "tls" => "tls"]);
        
        $rData = [
            'vmess' => base64_encode($vmess),
            'uuid' => $uuid
        ];
        return view('view_v2ray',compact('rData','resp_data'));
        
    }
    public function showSSH(){
        $getUsersAll = DB::table('servers')->
            join('accounts','servers.id','=','accounts.server_id')->
            where('accounts.user_id',auth()->user()->id)->orderBy('accounts.id','desc')->
            paginate(10);
        return view('panel.ssh.index',compact('getUsersAll'));
    }
    /*
    public function command_ssh($user,$passwd,$date){
        $uuid = "";
        $comand = "bash adduser.sh";

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
    */
}
