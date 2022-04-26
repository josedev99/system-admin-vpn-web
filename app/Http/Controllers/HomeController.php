<?php

namespace App\Http\Controllers;

use App\account;
use App\server;
use App\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('index','accounts','premiumUsa1','termino');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $getServersAll = server::all()->count();
        $getAccountsAll = account::all()->count();

        $getServiceAll = Service::all();
        $numberServer = DB::table('services')->
            join('servers','services.id','servers.service_id')->count();

        return view('home',compact('getServersAll','getAccountsAll','getServiceAll','numberServer'));
    }
    public function accounts($name,Service $protocol)
    {
        $id = $protocol->id;
        $data = server::where('service_id',$id)->get();
        return view('account',compact('data'));
    }
    public function premiumUsa1($id){
        $server = server::where('id','=',$id)->get();
        return view('premium-usa1',compact('server'));
    }
    public function termino(){
        return view('termino');
    }
}
