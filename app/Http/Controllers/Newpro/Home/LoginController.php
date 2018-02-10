<?php

namespace App\Http\Controllers\Newpro\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function login(Request $request)
    {	
    	$path = $request->input('path',null);
    	$title = getwebpage($request->path());
    	return view('Newpro.Home.Login.login',['title'=>$title,'path'=>$path]);
    }
    public function logins(Request $request)
    {
    	$name = $request->name;
    	$password = $request->password;
    	$path= $request->path;
    	if(!$name || !$password)
    	{
    		return back()->withInput()->with(['info'=>'输入为空!']);
    	}
    	$res = \DB::table('user_home')->select('id','_token','name','phone','password','time','status','uptime')
    			->where('name',$name)
    			->first();
    	if(!$res)
    	{
    		return back()->withInput()->with(['info'=>'用户名不存在！']);
    	}
    	if(\Hash::check($password,$res->password))
    	{
    		\session(['Home'=>$res]);
    		\DB::table('user_home')->where('id',$res->id)->update(['uptime'=>time()]);
    		if($path)
    		{
    			return redirect($path)->with(['info'=>'登入成功！']);
    		}else
    		{
    			return	redirect('/')->with(['info'=>'登入成功！']);
    		}
    	}else
    	{
    		return back()->withInput()->with(['info'=>'密码错误！']);
    	}
    }

    public function register(Request $request)
    {
    	$title = getwebpage($request->path());
    	return view('Newpro.Home.Login.register',['title'=>$title]);
    }
    
    public function chongajax(Requets $request)
    {	
    	$ors = $request->ors;
    	$init = $request->init;

    	$res = null;
    	if($ors == 'name')
    	{
    		$res = \DB::table('user_home')->select('id','name')->where('name',$init)->first();
    	}
    	if($ors == 'phone')
    	{
    		$res = \DB::table('user_home')->select('id','phone')->where('phone',$init)->first();
    	}
    	if($res)
    	{
    		return response()->json(2);
    	}else
    	{
    		return response()->json(1);

    	}
    }
}
