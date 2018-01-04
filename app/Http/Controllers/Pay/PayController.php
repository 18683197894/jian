<?php

namespace App\Http\Controllers\Pay;
require('../app/payInterface_alipay/request.php');
require('../app/payInterface_native/request.php');
use payInterface_native;
use payInterface_alipay;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PayController extends Controller
{
    function wechatnotify(Request $request)
    {
    	$wechat = new payInterface_native\request_wechat();
    	$wechat->callback();
    }
    function alipaynotify(Request $request)
    {
    	dd(1);
    }

}
