<?php

namespace App\Http\Controllers;

use App\account;
use App\saldo;
use App\sales;
use App\server;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class v2rayController extends Controller
{
    public function v2rayCore(){
        
        $data = $this->validateDataForm();
        
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
            'server_id' => session('server_id'),
            'status' => 1
        ]);
        $getUserAll = DB::table('servers')->
            join('accounts','servers.id','=','accounts.server_id')->
            where('accounts.id',$resp->id)->
            get();
        $resp_data = $getUserAll[0];
        
        //Create v2ray
        $comand = "bash addV2rayClient.sh ".'hive-vpn.tk-'.$data['user']." ".get_days();
        
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
        //path v2ray
        $path_last = "wss://".$data['domain_bug']."/hive-vpn.tk/";
        $path = str_replace($searchString,$replaceString,$path_last);
        //V2ray nativo
        $vmessWSS = json_encode([ "v" => "2", "ps" => $data['domain_bug'],"sni" => $data['domain_bug'], "add" => $data['domain_bug'], "port" => 443, "aid" => 0, "type" => "", "net" => "ws", "path" => $path, "host" => session('domain'), "id" => $uuid, "tls" => "tls"]);


        //Soporte a domain con protocol websocket via cloudflare or cloudfront
        $vmess = json_encode([ "v" => "2", "ps" => session('domain').":443", "add" => $data['domain_bug'], "port" => 443, "aid" => 0, "type" => "", "net" => "ws", "path" => "/hive-vpn.tk/", "host" => session('domain'), "id" => $uuid, "tls" => "tls"]);
        
        $rData = [
            'vmess_wss' => base64_encode($vmessWSS),
            'vmess' => base64_encode($vmess),
            'uuid' => $uuid
        ];
        return view('view_v2ray',compact('rData','resp_data'));
        
    }

    public function v2ray_premium(){
        $this->validateDataForm();
        session([
            'user' => request()->user,
            'passwd' => '',
            'sni' => request()->domain_bug
        ]);
        //PROCESS ACCOUNT CREATED
        $validateUser = account::where('user','=',session('user'))->get();
        if(count($validateUser) > 0){
            return redirect()->back()->with('status','El usuario ya existe!');
        }
        
    
        $fecha_actual = date("Y-m-d");   
        
        $resp = account::create([
            'user' => session('user'),
            'passwd' => session('passwd'),
            'sni' => session('sni'),
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

        //SALES INSERT DATA
        sales::create([
            'user_id' => auth()->user()->id,
            'total' => session('price'),
            'date' => $fecha_actual,
            'paypal_data' => 'saldo virtual',
            'account_id' => $resp->id
        ]);
        //Descontamos su saldo actual
        $getSaldo = saldo::where('user_id',auth()->user()->id)->get()->sum('saldo');
        $getSaldo -= session('price');
        saldo::where('user_id','=',auth()->user()->id)->update(['saldo' => $getSaldo]); //Update saldo

        //Obtiene el saldo final de su cuenta
        $getSaldo = saldo::where('user_id',auth()->user()->id)->get()->sum('saldo');
        session(['saldoDisponible' => $getSaldo]);
        //Create user v2ray
        $comand = "bash addV2rayClient.sh ".'hive-vpn.tk-'.session('user')." ".get_days();
    
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
        //path v2ray
        $path_last = "wss://".session('sni')."/hive-vpn.tk/";
        $path = str_replace($searchString,$replaceString,$path_last);
        //V2ray nativo
        $vmessWSS = json_encode([ "v" => "2", "ps" => session('sni'),"sni" => session('sni'), "add" => session('sni'), "port" => 443, "aid" => 0, "type" => "", "net" => "ws", "path" => $path, "host" => session('domain'), "id" => $uuid, "tls" => "tls"]);
        //Soporte a domain con protocol websocket via cloudflare or cloudfront
        $vmess = json_encode([ "v" => "2", "ps" => session('domain').":443", "add" => session('sni'), "port" => 443, "aid" => 0, "type" => "", "net" => "ws", "path" => "/hive-vpn.tk/", "host" => session('domain'), "id" => $uuid, "tls" => "tls"]);
        
        $rData = [
            'vmess_wss' => base64_encode($vmessWSS),
            'vmess' => base64_encode($vmess),
            'uuid' => $uuid
        ];
        return view('view_v2ray',compact('rData','resp_data'));
    }

    public function showSSH(){
        $getUsersAll = DB::table('servers')->
            join('accounts','servers.id','=','accounts.server_id')->
            where('accounts.user_id',auth()->user()->id)->orderBy('accounts.id','desc')->get();
        return view('panel.ssh.index',compact('getUsersAll'));
    }
    public function validateDataForm(){
        $data = request()->validate([
                'user' => "required",
                'domain_bug' => "required",
                'g-recaptcha-response' => 'recaptcha'
        ]);
        return $data;
    }
}
