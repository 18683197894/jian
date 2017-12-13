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
    	// $data = \DB::table('hfnews')->get();
    	// $pre = '/www.zheng.com/';

    	// foreach( $data as $k => $v )
    	// {
    	// 	$v->content = preg_replace($pre,'www.jianshanglianmeng.com', $v->content);
    	// }
    	// // dd($data);
    	// foreach( $data as $kk => $vv )
    	// {
    	// 	$arr['content'] = $vv->content;
    	// 	\DB::table('hfnews')->where('id',$vv->id)->update($arr);
    	// }
    	return 'ok';
    	
    }
}