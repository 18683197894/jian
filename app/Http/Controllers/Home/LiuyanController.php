<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LiuyanController extends Controller
{
    public function loupanajax(Request $request){
    	$phone = $request->phone;
    	$loupan = $request->hu;

    	$pho = \DB::table('lpyy')->where(['phone'=>$phone,'status'=>0])->first();
    	if($pho){
    		return response()->json(2);
    	}
    	
    	$data = [];
    	$data['loupan'] = $loupan;
    	$data['phone']  = $phone;
    	$data['status'] = 0;
    	$data['time']   = time(); 

    	$res = \DB::table('lpyy')->insert($data);

    	if($res)
    	{
    		return response()->json(1);
    	}else
    	{
    		return response()->json(3);
    	}
    	
    }

    public function zhaungxiuajax(Request $request){
    	$data = [];
    	$data['phone'] = $request->phone;

    	$pho = \DB::table('zxyy')->where(['phone'=>$data['phone'],'status'=>0])->first();

    	if($pho)
    	{
    		return response()->json(2);
    	} 

    	$data['time'] = time();
    	$data['status'] = 0;

    	$res = \DB::table('zxyy')->insert($data);

    	if($res)
    	{
    		return response()->json(1);
    	}else
    	{
    		return response()->json(3);
    	}
    }
}
