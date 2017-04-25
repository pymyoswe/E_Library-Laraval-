<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class AuthController extends Controller
{
    //
    public function login(){
        return view('auth/login');
    }
    public function register(){
        return view('auth/register');
    }
    public function signUp(Request $request){
        $this->validate($request,[
            'userName'=>'required|unique:users',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:5',
            'confirmPassword'=>'required|same:password'
        ]);
        $users=new User();
        $users->userName=$request['userName'];
        $users->email=$request['email'];
        $users->password=bcrypt($request['password']);
        $users->save();
        Auth::login($users);
        return redirect()->route('dashboard');





    }
    public function signIn(Request $request){
        $this->validate($request,[
            'userName'=>'required|exists:users',
            'password'=>'required'
        ]);
        if(Auth::attempt(['userName'=>$request['userName'],'password'=>$request['password']])){
            return redirect()->route('dashboard');
        }
        else{
            return redirect()->route('login');
        }

    }
    public function logout(){
        Auth::logout();
        return redirect()->route('/');

    }
}
