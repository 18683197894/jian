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
date_default_timezone_set('Asia/Shanghai');
    	
    	dd(date('Y-m-d H:i:s',time()));
    }
    function alipaynotify(Request $request)
    {
    	dd(date('Y-m-d H:i:s',time()));
    	    }

}
