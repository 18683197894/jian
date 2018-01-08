<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PayController extends Controller
{
    public function index(Request $request)
    {	
    	$key = $request->key?$request->key:'';
    	$data = \DB::table('orders')
    	->join('user_home','orders.uid','=','user_home.id')
    	->select('orders.id','orders._token','user_home.name','orders.uid','orders.linkman','orders.address','orders.lebel','orders.remarks','orders.invoice','orders.risk','orders.phone','orders.addtime','orders.create_id','orders.total','orders.status')
    	->where('orders._token','like','%'.$key.'%')
    	->paginate(12);
    	
    	foreach($data as $k => $v)
    	{
    		if($v->status == 0)
    		{
    			if(time() - $v->addtime < 1800 )
    			{
    				$v->status = '未支付';
    			}else
    			{
    				$v->status = '支付超时';
    			}
    		}
    		if($v->status == 1)
    		{
    			$v->status == '已支付';
    		}
    	}
    	$data->appends(['key'=>$key]);
    	return view('Admin.pay.index',['title'=>'订单管理','data'=>$data,'request'=>$request->all()]);
    }
    public function shopping($id)
    {
    	$data = \DB::table('detail')->select('id','orderid','tus','pid','pid','name','prince','num')->where('orderid',$id)->paginate(12);
    	if(count($data) <= 0)
    	{
    		return back()->with(['info'=>'订单异常！无商品']);
    	}
    	foreach($data as $k => $v)
    	{
    		if($v->tus == '软包')
    		{
    			$v->path = \DB::table('column')->where('id',$v->pid)->first()->path;
    		}
    	}
    	return view('Admin.pay.shopping',['title'=>'订单商品详情','data'=>$data]);
    }

    public function userhome_orders($id)
    {
    	$name = \DB::table('user_home')->select('name')->where('id',$id)->first()->name;

    	$data = \DB::table('orders')
    			->select('id','_token','uid','linkman','address','lebel','remarks','invoice','risk','phone','addtime','create_id','total','status')
    			->paginate(12);
    	foreach($data as $k => $v)
    	{
    		if($v->status == 0)
    		{
    			if(time() - $v->addtime < 1800 )
    			{
    				$v->status = '未支付';
    			}else
    			{
    				$v->status = '支付超时';
    			}
    		}
    		if($v->status == 1)
    		{
    			$v->status == '已支付';
    		}
    	}
    	return view('Admin.pay.userhome_orders',['title'=>$name.'的订单','name'=>$name,'data'=>$data]);
    }
}
