<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SaldoController extends Controller
{
    public function index(){
        return view('saldo.index');
    }
}
