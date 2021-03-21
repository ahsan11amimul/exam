<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    //
    public function get_register()
    {
        return view('auth.register');
    }
    public function register(Request $request)
    {
     
       $data=$request->validate([
        'name'=>'required|min:3',
        'email'=>'required|email',
        'username'=>'required|min:3|unique:users',
        'password'=>'required|min:6|max:16'
       ]);
       $hashed_password=password_hash($data['password'], PASSWORD_DEFAULT);
       $data['password']=$hashed_password;
      
       User::create($data);
       return redirect('/login/create')->with('status','Registered Successfully');
    }
    //login
    public function get_login()
    {
        return view('auth.login');
    }
    public function login(Request $request)
    {
        $data=$request->validate([
            'username'=>'required'
        ]);
        $verify_user=User::where('username',$data['username'])->first();
      
       if($verify_user)
       {
           return redirect('/employees');
       }else{
           return back()->with('status','you are not a valid User');
       }
       
    }
    public function logout()
    {
        auth()->logout();
        return redirect('/');
    }
}
