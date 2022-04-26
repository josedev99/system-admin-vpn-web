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
        return $this->middleware('roles:1')->except('serverAll');
    }
    //Lista todos los servers
    public function show(){
        $getServerAll = server::all();
        return view('panel.server.show',compact('getServerAll'));
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
            'service_id' => 'required'
        ]);
        //ID USERS AUTENTICATED
        $data['user_id'] = Auth::user()->id;
        $id->update($data);
        return redirect()->back()->with('status','Servidor actualizado!!');
    }
    public function serverAll(){
        $data = server::all();
        return view('account',compact('data'));
    } 
    public function destroy(server $id){
        $id->delete();
        return redirect()->back()->with('status','Eliminado!');
    }
}
