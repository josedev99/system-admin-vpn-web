<?php

namespace App\Http\Controllers;

use App\server;
use Illuminate\Http\Request;

class ServerController extends Controller
{
    //Lista todos los servers
    public function show(){
        $getServerAll = server::all();
        return view('panel.server.show',compact('getServerAll'));
    }
    public function edit(server $id){
        $getServer = $id;
        return view('panel.server.edit',compact('getServer'));
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
            'vps_passwd' => 'required'
        ]);

        $id->update($data);
        return redirect()->back()->with('status','Servidor editado!!');
    } 
    public function destroy(server $id){
        $id->delete();
        return redirect()->back()->with('status','Eliminado!');
    }
}
