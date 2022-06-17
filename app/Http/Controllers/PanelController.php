<?php

namespace App\Http\Controllers;

use App\server;
use App\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PanelController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','roles:1,2,3']);
    }
    public function index(){
        $numUser = DB::table('servers')->
            join('accounts','servers.id','=','accounts.server_id')->
            where('accounts.user_id',auth()->user()->id)->count();
        return view('panel.index',compact('numUser'));
    }
    
}
