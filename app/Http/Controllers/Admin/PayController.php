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
    	->select('orders.id','orders.name','orders.payors','orders._token','user_home.name as names','orders.uid','orders.linkman','orders.address','orders.lebel','orders.remarks','orders.invoice','orders.phone','orders.addtime','orders.create_id','orders.total','orders.status')
    	->where('orders._token','like','%'.$key.'%')
    	->paginate(12);
    	
    	foreach($data as $k => $v)
    	{  
            $v->addtime = explode(',',$v->addtime);
    		if($v->status == 0)
    		{
    			if(time() - $v->addtime[0] < 1800 )
    			{
    				$v->status = '未支付';
    			}else
    			{
    				$v->status = '支付超时';
    			}
    		}
    		if($v->status == 1)
    		{
    			$v->status = '已支付';
    		}
    	}
    	$data->appends(['key'=>$key]);
    	return view('Admin.pay.index',['title'=>'订单管理','data'=>$data,'request'=>$request->all()]);
    }
    public function shopping($id)
    {
    	$data = \DB::table('detail')->select('id','orderid','tus','pid','name','prince','num','ors')->where('orderid',$id)->paginate(12);
    	if(count($data) <= 0)
    	{
    		return back()->with(['info'=>'订单异常！无商品']);
    	}
    	
    	return view('Admin.pay.shopping',['title'=>'订单商品详情','data'=>$data]);
    }

    public function userhome_orders($id)
    {
    	$name = \DB::table('user_home')->select('name')->where('id',$id)->first()->name;

    	$data = \DB::table('orders')
                ->select('id','payors','_token','name','uid','linkman','address','lebel','remarks','invoice','phone','addtime','create_id','total','status')
    	       ->where('uid',$id)
                ->paginate(12);
    	foreach($data as $k => $v)
        {  
            $v->addtime = explode(',',$v->addtime);
            if($v->status == 0)
            {
                if(time() - $v->addtime[0] < 1800 )
                {
                    $v->status = '未支付';
                }else
                {
                    $v->status = '支付超时';
                }
            }
            if($v->status == 1)
            {
                $v->status = '已支付';
            }
        }
    	return view('Admin.pay.userhome_orders',['title'=>$name.'的订单','name'=>$name,'data'=>$data]);
    }

    public function diyindex(Request $request)
    {   
        $key = $request->key?$request->key:'';
        $status = $request->input('status','A');
      
        if($status === 'A')
        {   
            
            $data = \DB::table('orders_diy')
            ->select('id','ors','phone','name','contract','_token','room','total','addtime','remarks','status','create_id','payors')
            ->where('_token','like','%'.$key.'%')
            ->orderBy('addtime','desc')
            ->paginate(12);
        }else
        {   
            
            $data = \DB::table('orders_diy')
            ->select('id','ors','phone','name','contract','_token','room','total','addtime','remarks','status','create_id','payors')
            ->where('_token','like','%'.$key.'%')
            ->where('status','=',$status)
            ->orderBy('addtime','desc')
            ->paginate(10);
        }

        foreach($data as $k => $v)
        {
            $v->time = explode(',',$v->addtime);
        }
        $data->appends(['key'=>$key,'status'=>$status]);
        return view('Admin.pay.diyindex',['title'=>'建商支付','data'=>$data,'request'=>$request->all()]);
    }

    public function diyindexdel(Request $request)
    {
        $id = $request->id;
        $data = \DB::table('orders_diy')->select('id','status','addtime')->where('id',$id)->first();
        if(!$data)
        {
            return response()->json('订单不存在！');
        }
        $time = time() - $data->addtime;
        if($time < 3600)
        {   
            $a = 3600 - $time;
            return response()->json('删除失败 '.$a.'秒后重试！');
        }
        $res = \DB::table('orders_diy')->delete($id);
        if($res)
        {
            return response()->json(1);

        }else
        {
            return response()->json('删除失败 请重试！');
        }
        return response()->json($id);
    }
}
