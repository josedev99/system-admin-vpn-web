<?php

namespace App\Http\Controllers;

use App\rol;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    public function __construct()
    {
        return $this->middleware('roles:1');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $getUsersAll = User::paginate(10);
        return view('panel.user.index',compact('getUsersAll'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {   
        $getUsersAccounts = DB::table('users')->
            join('accounts','users.id','=','accounts.user_id')->
            join('servers','accounts.server_id','=','servers.id')->
            where('users.id',$user->id)->get();
        return view('panel.user.show',compact('getUsersAccounts'));
        //return $getUsersAccounts;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $getRolsAll = rol::all();
        return view('panel.user.edit',compact('user','getRolsAll'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(User $user)
    {
        $data = request()->validate([
            'status' => 'required',
            'rol_id' => 'required'
        ]);
        $user->update($data);

        return redirect()->route('user.index')->with('status','Usuario actualizado!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index')->with('status','Usuario eliminado!');
    }
}
