<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class HomeController extends Controller
{
    public function shoppingcart()
    {
    	dd(1);
    }

    public function cs()
    {	
    	return zend_code(18683197894,'注册验证码6470110 30分钟有效');
    	
    }
}
