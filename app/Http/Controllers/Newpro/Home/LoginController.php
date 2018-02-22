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
    
    public function chongajax(Request $request)
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

    function zendcode(Request $request)
    {	
    	$phone = $request->phone;
    	$num = rand(111111,999999);
    	$str = '注册验证码：'.$num.'，有效时间30分钟';

    	$res = zend_code($phone,$str);
    	if($res == 'OK' || $res == 'ok')
    	{
    		\Cache::put($phone,$num,30);
    	}
    	return response()->json($res);
    }
    function yan(Request $request)
    {
    	$phone = $request->phone;
    	$yan = $request->yan;
    	if(\Cache::has($phone))
    	{
    		if($yan == \Cache::get($phone))
    		{
    			return response()->json(1);
    		}else
    		{
    			return response()->json(2);

    		}
    	}else
    	{
    		return response()->json(3);
    	}
    }

    public function registers(Request $request)
    {
    	$data = $request->except("_token","yan");
    	if($data['name'] == null || $data['password'] == null || $data['phone'] == null)
    	{
    		return back()->withInput()->with(['info'=>'数据有空！']);
    	}
    	$data['time'] = time();
    	$data['status'] = 1;
    	$str = 'QWERTYUIOPASDFGHJKLZXCVBNM0123456789qwertyuiopasdfghjklzxcvbnm';
    	str_shuffle($str);
    	$data['password'] = \Hash::make($data['password']);
    	$token = substr(str_shuffle($str),26,15);
    	$data['_token'] = \Hash::make($token);
    	$data['uptime'] = 0;
    	$res = \DB::table('user_home')->insert($data);
    	if($res)
    	{
    		return redirect('/newpro/login')->with(['info'=>'注册成功！']);
    	}else
    	{
    		return back()->withInput()->with(['info'=>'注册失败！']);
    	}
    }
}
