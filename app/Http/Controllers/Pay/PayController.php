<?php

namespace App\Http\Controllers\Pay;
require('../app/payInterface_alipay/request.php');
require('../app/payInterface_native/request.php');
use payInterface_native;
use payInterface_alipay;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
date_default_timezone_set('Asia/Shanghai');

class PayController extends Controller
{
    function wechatnotify(Request $request)
    {	
    	$wechat = new payInterface_native\request_wechat();
    	$wechat->index(null,'callback');
    }
    function alipaynotify(Request $request)
    {
    	$alipay = new payInterface_alipay\request_alipay();
    	$_token = $alipay->index(null,'callback');
    	
    	if(isset($_token) || !empty($_token))
    	{
    		$wechat = new payInterface_native\request_wechat();
    		$wechat->index(['_token'=>$_token],'closeOrder');

    	}else
    	{
    		exit;
    	}
    	
   	}
   	public function paymentsget(Request $request)
   	{
   		$id = $request->id;
   		$uid = \session('Home')->id;

   		$res = \DB::table('orders')->select('id','_token','status','uid','create_id','addtime')->where('id',$id)->where('uid',$uid)->first();
		if($res)
		{
			
				if($res->status == 1 && !empty($res->create_id))
				{ 
					return response()->json(1);
				}else
				{
					return response()->json(2);
				}  

		}else
		{
			return response()->json(4);
		}
		 

   	}

    function paymentsdiyget(Request $request)
    {

      $id = $request->id;
      $res = \DB::table('orders_diy')->select('id','_token','phone','status','name','create_id','addtime')->where('id',$id)->first();
      if($res)
      {
        if($res->status == 1 && !empty($res->create_id))
        {   
            $a = \DB::table('user_home')->select('id')->where('phone',$res->phone)->first();
            if(!$a)
            {
              $data['time'] = time();
              $data['uptime'] = $data['time'];
              $data['phone'] = $res->phone;
              $data['status'] = 1;
              $data['name'] = $res->phone;
              $data['names'] = $res->name;
              $data['password'] = \Hash::make('123456');
              $str="QWERTYUIOPASDFGHJKLZXCVBNM1234567890qwertyuiopasdfghjklzxcvbnm";
              str_shuffle($str);
              $token=substr(str_shuffle($str),26,15);
              // dd($token);
              $data['_token'] = \Hash::make($token);
              \DB::table('user_home')->insert($data);

            }
            
            return response()->json(1);
        }else
        {
            return response()->json(2);
        } 
      }

    }

}
