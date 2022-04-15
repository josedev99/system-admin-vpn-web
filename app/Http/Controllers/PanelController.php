<?php

namespace App\Http\Controllers;

use App\server;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PanelController extends Controller
{
    public function index(){
        $numUser = DB::table('servers')->
            join('accounts','servers.id','=','accounts.server_id')->
            where('accounts.user_id',auth()->user()->id)->count();
        return view('panel.index',compact('numUser'));
    }
    public function addServer(){
        $getServer = new server();
        return view('panel.server.add',compact('getServer'));
    }
    public function saveServer(){
        $data = request()->validate([
            "name" => 'required',
            "payload" => 'required',
            "ip" => 'required',
            "country" => 'required',
            "province" => 'required',
            "days" => 'required',
            "price" => 'required',
            "type" => 'required',
            "limit" => 'required',
            "domain" => 'required',
            'vps_user' => 'required',
            'vps_passwd' => 'required'
        ]);
        server::create($data);
        return redirect()->back()->with('status','Agregado satisfactoriamente');
    }
}
