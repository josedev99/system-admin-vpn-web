<?php

namespace App\Http\Controllers;

use App\saldo;
use App\User;
use Illuminate\Http\Request;

class SaldoController extends Controller
{
    public function index(Request $request){
        $saldos = saldo::join('users','saldos.user_id','users.id')
        ->select(
            'saldos.id',
            'saldos.user_id',
            'saldos.saldo',
            'saldos.created_at',
            'users.name as name',
        )->orderBy('id','DESC')->paginate(10);
        return view('panel.saldo.index', compact('saldos'));
    }


    public function create()
    {
        $users = User::all();
        return view('panel.saldo.create',compact('users'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'saldo'=>'required',
            'user_id'=>'required',
            'created_at'=>'required'
        ]);

        $saldo = new saldo();
        $saldo->saldo = $request->saldo;
        $saldo->user_id = $request->user_id;
        $saldo->created_at = $request->created_at;
        $saldo->save();

        //redigirimos
        return redirect()->route('saldo.index');
    }

    public function  edit($id)
    {
        $users = User::all();
        $saldo = saldo::find($id);

        //retornamos
        return view('panel.saldo.edit',compact('saldo', 'users'));
    }

    public function update(Request $request, saldo $saldo)
    {
        $this->validate($request,[
            'saldo'=>'required',
            'user_id'=>'required',
            'created_at'=>'required'
        ]);

        $sal = $request->all();

        $saldo->update($sal);

        //redirigimos 
        return redirect()->route('saldo.index');

    }

    public function destroy($id)
    {
        saldo::find($id)->delete();
        return redirect()->route('saldo.index');
    }
}
