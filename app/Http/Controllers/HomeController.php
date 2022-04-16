<?php

namespace App\Http\Controllers;

use App\account;
use App\server;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('index','accounts','premiumUsa1');
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
        
        return view('home',compact('getServersAll','getAccountsAll'));
    }
    public function accounts()
    {
        $data = server::all();
        return view('account',compact('data'));
    }
    public function premiumUsa1($id){
        $server = server::where('id','=',$id)->get();
        return view('premium-usa1',compact('server'));
    }
}
