<?php

namespace App\Http\Controllers\Pay;
require('../app/payInterface_weixinwap/request.php');

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use payInterface_weixinwap;

class WebpayController extends Controller
{
    public function webpay_wechat()
    {
      return view('Pay.Weixinweb.weixinweb');
    }

    public function webpay_wechats(Request $request)
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

    //回调地址
    public function weixinweb_hui()
    {

    }

    //支付确认地址
    public function wechat_notify()
    {

    }

    public function webpay_alipay()
    {
    	return view('Pay.Alipayweb.alipayweb');
    }
}
