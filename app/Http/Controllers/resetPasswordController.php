<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class resetPasswordController extends Controller
{
    public function password_reset(){
        $data = Request()->validate([
            'email' => 'required'
        ]);

        if(User::where('email',$data['email'])->exists()){
            $this->send_email($data);
            return redirect()->back()->with('success','Link enviado exitosamente!');
        }else{
            return redirect()->back()->with('error','El correo no existe!!');
        }
    }
    public function password_edit(){
        return view('auth.passwords.reset');
    }
    public function password_update(){
        $data = request()->validate([
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ]);
        //Scryted password 
        $data['password'] = bcrypt( $data['password'] );
        User::where('email',$data['email'])->update($data);
        return redirect()->route('login')->with('success','tu contraseña se a ha modificado satisfactoriamente');
    }
    public function send_email($data){
        $subject = "Restablecimiento de contraseña";

        $for = $data['email'];

        Mail::send('mails.reset_password',$data, function($msj) use($subject,$for){
            $msj->from("hive-vpn.tk@outlook.com","Hive-vpn.tk");
            $msj->subject($subject);
            $msj->to($for);
        });
    }
}