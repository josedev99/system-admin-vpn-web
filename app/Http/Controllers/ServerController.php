<?php

namespace App\Http\Controllers;

use App\server;
use App\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServerController extends Controller
{
    public function __construct()
    {
        return $this->middleware('roles:1,3');
    }
    //Lista todos los servers
    public function show(){
        $getServerAll = server::all();
        return view('panel.server.show',compact('getServerAll'));
    }
    public function addServer(){
        $getServer = new server();
        $getServices = Service::all();
        return view('panel.server.add',compact('getServer','getServices'));
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
            'vps_passwd' => 'required',
            'status' => 'required'
        ]);
        //added id
        $data['service_id'] = request()->service_id;
        //ID USERS AUTENTICATED
        $data['user_id'] = Auth::user()->id;
        server::create($data);
        return redirect()->route('server.show')->with('status','Agregado satisfactoriamente');
    }
    public function edit(server $id){
        $getServer = $id;
        $getServices = Service::all();
        return view('panel.server.edit',compact('getServer','getServices'));
    } 
    public function update(server $id){
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
            'vps_passwd' => 'required',
            'status' => 'required'
        ]);
        //added id
        $data['service_id'] = request()->service_id;
        //ID USERS AUTENTICATED
        $data['user_id'] = Auth::user()->id;
        $id->update($data);
        return redirect()->back()->with('status','Servidor actualizado!!');
    }
    public function serverAll(){
        $data = server::all();
        return view('server',compact('data'));
    } 
    public function destroy(server $id){
        $id->delete();
        return redirect()->back()->with('status','Eliminado!');
    }
}
