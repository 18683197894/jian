<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function login(Request $request,$id=null)
    {	
    	if(session('Home'))
    	{	
    		\session()->forget('Home');
    	}

    	return view('Home.login.login',['title'=>'登入','id'=>$id]);
    }

    public function register(){
    	return view('Home.login.register',['title'=>'注册']);
    }

    public function nameajax(Request $request)
    {	
    	$name = $request->str;
    	$res = \DB::table('user_home')->where('name',$name)->first();
    	if($res)
    	{
    	return response()->json(2);

    	}else
    	{
    	return response()->json(1);

    	}
    }
    public function phoneajax(Request $request)
    {
    	$phone = $request->str;

    	$res = \DB::table('user_home')->where('phone',$phone)->first();
    	if($res)
    	{
    	return response()->json(2);

    	}else
    	{
    	return response()->json(1);

    	}
    }

    public function zendcode(Request $request)
    {	
	 	$phone = $request->phone;
		$rand = rand(10000,99999);
		$str = '注册验证码'.$rand.' 有效时间30分钟';
		$res = zend_code($phone,$str);

		if( $res == 'OK' || $res == 'ok')
		{
			\Cache::put($phone,$rand,30);
			return response()->json($res);

		}else
		{
			return response()->json($res);
		}
    	
	}

	public function yanajax(Request $request)
	{
		$phone = $request->phone;
		$yan = $request->yan;

		if(\Cache::has($phone))
		{
			$res = \Cache::get($phone);
			if( $res == $yan )
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

	public function doreg(Request $request)
	{
		$data = $request->except('_token','yan');
		
		$data['time'] = time();
		$data['uptime'] = $data['time'];
		$data['status'] = 1;
		$data['password'] = \Hash::make($data['password']);
		$str="QWERTYUIOPASDFGHJKLZXCVBNM1234567890qwertyuiopasdfghjklzxcvbnm";
		str_shuffle($str);
		$token=substr(str_shuffle($str),26,15);
		// dd($token);
		$data['_token'] = \Hash::make($token);

		$res = \DB::table('user_home')->insert($data);
		if($res)
		{	
			$ress = \DB::table('user_home')->where('name',$data['name'])->first();
			\session(['Home'=>$ress]);
			return redirect('/')->with(['info'=>'注册成功！']);
		}else
		{
			return back()->with(['info'=>'注册失败！']);
		}
	}

	public function dologin(Request $request)
	{	

		$data = $request->except('_token');
		$name = \DB::table('user_home')->where('name',$data['name'])->first();
		if( $data['id'] != null)
		{
			$url = \DB::table('webpage')->where('id',$data['id'])->first()->url;
		}else
		{
			$url = '/';
		}

		if(!$name)
		{
			return back()->withInput()->with(['info'=>'用户名不存在!']);
		}else
		{	
			if( $name->status == 0 )
			{
				return back()->withInput()->with(['info'=>'当前用户禁止登入！']);
			}

			$password_re = $name->password;

			if( \Hash::check($data['password'],$password_re) )
			{	
				\DB::table('user_home')->where('id',$name->id)->update(['uptime'=>time()]);
				\session(['Home'=>$name]);
				return redirect($url)->with(['info'=>'登录成功']);
			}else
			{
				return back()->withInput()->with(['info'=>'用户名或密码错误！']);
			}
		}
	}
}
