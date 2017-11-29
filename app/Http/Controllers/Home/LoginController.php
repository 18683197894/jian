<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function login()
    {
    	// if(session('Home'))
    	// {
    	// 	return redirect('/');
    	// }

    	return view('Home.login.login',['title'=>'登入']);
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
	    // $postUrl= 'http://www.duanxin10086.com/sms.aspx?action=send&userid&account=jswlkj&password=jswl1688&mobile='.$phone.'&content=验证码:6582&sendTime=&taskName=注册验证码';
		// date_default_timezone_set('PRC');//设置时区为东八区否则时间比北京时间早8小时
		 $rand = rand(10000,99999);
		 $url ='http://www.duanxin10086.com/sms.aspx';
		 $mttime=date("YmdHis");
		 $post_data['action']   = 'send';
		 $post_data['userid']   = 15257;
		 $post_data['account']  = 'jswlkj';
		 $post_data['password'] = 'jswl1688';
		 $post_data['mobile']   = $phone;
		 $post_data['content']  = '注册验证码：'.$rand.' 有效时间30分钟。';
		 $post_data['sendTime'] = '';
		 $post_data['taskName']  = 'cs';
		 $o = "";
		 

		foreach( $post_data as $k => $v )
		  {
		     $o.= "$k=" . urlencode( $v)."&";
		  }
		 $post_data = substr($o,0,-1);
		
		function request_post($url ='', $param = '') {
		   if (empty($url) ||empty($param)) {
		      return false;
		   }
		 
		   $postUrl= $url;
		   $curlPost= $param;
		   $ch =curl_init();//初始化curl
		   curl_setopt($ch,CURLOPT_URL,$postUrl);//抓取指定网页
		   curl_setopt($ch,CURLOPT_HEADER, 0);//设置header
		   curl_setopt($ch,CURLOPT_RETURNTRANSFER, 1);//要求结果为字符串且屏幕上
		   curl_setopt($ch,CURLOPT_POST, 1);//post提交方式
		   curl_setopt($ch,CURLOPT_POSTFIELDS, $curlPost);
		   $data= curl_exec($ch);//运行curl
		   curl_close($ch);
		   return $data;
		  }

		  function xmlToArray($xml){ 
 
			 //禁止引用外部xml实体 
			 
			libxml_disable_entity_loader(true); 
			 
			$xmlstring = simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA); 
			 
			$val = json_decode(json_encode($xmlstring),true); 
			 
			return $val; 
			 
			}
		$res =request_post($url, $post_data);
		$arr = xmlToArray($res);

		if($arr['returnstatus'] != 'Success'){
			return response()->json(3);
		}
		if( $arr['message'] == 'ok' )
		{	
			\Cache::put($phone,$rand,30);
			return response()->json(1);
		}else
		{
			return response()->json(2);
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
			return redirect('/home/login')->with(['info'=>'注册成功！']);
		}else
		{
			return back()->with(['info'=>'注册失败！']);
		}
	}

	public function dologin(Request $request)
	{	

		$data = $request->except('_token');
		$name = \DB::table('user_home')->where('name',$data['name'])->first();

		if(!$name)
		{
			return back()->withInput()->with(['info'=>'用户名或密码错误!']);
		}else
		{
			$password_re = $name->password;

			if( \Hash::check($data['password'],$password_re) )
			{	
				\session(['Home'=>$data]);
				return redirect('/')->with(['info'=>'登录成功']);
			}else
			{
				return back()->withInput()->with(['info'=>'用户名或密码错误！']);
			}
		}
	}
}
