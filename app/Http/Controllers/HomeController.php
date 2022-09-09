<?php

namespace App\Http\Controllers;

use App\account;
use App\saldo;
use App\server;
use App\Service;
use App\TotalAccounts;
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
        //Obtiene el saldo final de su cuenta
        if(isset(auth()->user()->id)){
            $getSaldo = saldo::where('user_id',auth()->user()->id)->get()->sum('saldo');
            session(['saldoDisponible' => $getSaldo]);
        }
        //Cantidad de servidores
        $getServersAll = server::all()->count();
        //Total de cuentas creadas
        $getAccountsAll = TotalAccounts::sum('account_Number');
        //Total de cuentas creadas por dia
        $fecha_actual = date("Y-m-d");
        $getTotalAccountDay = TotalAccounts::where('date_create',$fecha_actual)->sum('account_Number');
        //Muestra los servidores
        $getServiceAll = Service::all();

        return view('home',compact('getServersAll','getAccountsAll','getServiceAll','getTotalAccountDay'));
    }
    public function accounts($name,Service $protocol)
    {
        $id = $protocol->id;
        $data = server::where('service_id',$id)->get();
        return view('server',compact('data'));
    }

    public function premiumUsa1($id){
        $server = DB::table('services')->join('servers','services.id','=','servers.service_id')->
            where('servers.id','=',$id)->get();
        
        return view('formAccount',compact('server'));
    }
    public function termino(){
        return view('terminos');
    }
}
