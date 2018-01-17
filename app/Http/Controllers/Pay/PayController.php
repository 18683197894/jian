<?php

namespace App\Http\Controllers\Pay;
require('../app/payInterface_alipay/request.php');
require('../app/payInterface_native/request.php');
require('../app/payInterface_weixinwap/request.php');
use payInterface_native;
use payInterface_alipay;
use payInterface_weixinwap;
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
			if( $res->status == 0 && ( time() - $res->addtime ) > 1800 )
			{
				$wechat = new payInterface_native\request_wechat();
				$wechat->index(['_token'=>$res->_token],'closeOrder');
				return response()->json(3);
			}else
			{
				if($res->status == 1 && !empty($res->create_id))
				{
					return response()->json(1);
				}else
				{
					return response()->json(2);
				}  
			}

		}else
		{
			return response()->json(4);
		}
		 

   	}

    public function webpay()
    {
      return view('Pay.Weixinweb.weixinweb');
    }

    public function webpays(Request $request)
    {
      $data = $request->except("_token");
      $data['out_trade_no'] = date('YmdHms',time()).rand(10000,20000);
      $datas = $data;
      $datas['time'] = time();

      $data['time_start'] = date('YmdHms',$datas['time']);
      $data['time_expire'] = date('YmdHms',$datas['time'] + 3000);
     
      $res = \DB::table('webpay')->insert($datas);
      if($res)
      {
        $weixinweb = new payInterface_weixinwap\Request_weixinw();
        $url = $weixinweb->index('submitOrderInfo',$data);
        dd($url);
      }else
      {
        dd('订单创建失败！');
      }
      
      dd($data);
    }

}
