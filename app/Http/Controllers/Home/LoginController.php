<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function login()
    {
    	if(session('Home'))
    	{
    		return redirect('/');
    	}

    	return view('Home.login.login',['title'=>'登入']);
    }

    public function register(){
    	return view('Home.login.register',['title'=>'注册']);
    }
}
