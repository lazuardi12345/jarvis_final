<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Psy\TabCompletion\Matcher\FunctionsMatcher;

class LoginController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public Function login_proses(Request $request){
            $request->validate([
                'email' => 'required',
                'password' => 'required'
            ]);
        
            $data = [
                'email' => $request->email,
                'password' => $request->password
            ]; 
            if(Auth::attempt($data)){
                return redirect()->route('admin/');
            }else {
                return redirect()->route('login')->with('failed', 'email atau password salah');
            }

    }
    public function logout(){
        return redirect()->route('login')->with('success', 'Kamu Berhasil Logout');
    }

    public function register(){
        return view('auth.register');
    }
    public Function register_proses(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:user,email',
            'password' => 'required|min:6'

       ]);
       $data['name'] = $request->name;
       $data['email'] = $request->email;
       $data['password'] =  Hash::make($request->password);

       User::create($data);

       $login= [
        'email' => $request->email,
        'password' => $request->password
    ]; 
    if(Auth::attempt($data)){
        return redirect()->route('admin/');
    }else {
        return redirect()->route('login')->with('failed', 'email atau password salah');
    }
       
}
}
