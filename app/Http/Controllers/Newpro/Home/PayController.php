<?php

namespace App\Http\Controllers\Newpro\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PayController extends Controller
{
    public function shoppingcart(request $request)
    {	
    	$title = getwebpage($request->path());
    	$uid = \session('Home')->id;
    	$data = \DB::table('playgou')
              ->join('door','playgou.pid','=','door.id')
              ->select('playgou.id','playgou.pid','playgou.tus','playgou.time','playgou.num','playgou.uid','door.main','door.nomain','door.model','door.pid as ppid','door.title as name')
              ->where('playgou.uid',$uid)
              ->orderBy('time','desc')
              ->get();
    	$qing = \DB::table('qing')->first()->money;
    	$style = \DB::table('style')
      ->join('packages','style.pid','=','packages.id')
      ->select('style.id','style.title','packages.title as titles')
      ->get();
        foreach($data as $k => $v)
      {
          if($v->tus == 'main')
          {
            $v->name = $v->name.' （主流品牌）';
            $v->money = $v->main;
          }else if($v->tus == 'nomain')
          {
            $v->name = $v->name.' （非主流品牌）';
            $v->money = $v->nomain;
          }else if($v->tus == 'model')
          {
            $v->name = $v->name.' （样板间）';
            $v->money = $v->model;
          }else if($v->tus == 'qing')
          {
            $v->name = $v->name.' （清水房）';
            $v->money = $qing.'/每平方';
          }
          foreach($style as $kk => $vv)
          {
            if($v->ppid == $vv->id)
            {
              $v->path = $vv->titles.' '.$vv->title;
            }
          }
      }
    	return view('Newpro.Home.Pay.shoppingcart',['title'=>$title,'data'=>$data]);
    }
    public function shoppingcartajax(Request $request)
    {
    	$ors = $request->ors;
    	$id = $request->id;
    	$num = $request->num;
    	// return response()->json(1);
    	if($ors == 'qing')
    	{
    		$res = \DB::table('playgou')->where('id',$id)->update(['num'=>$num]);
    		if($res)
    		{
    			return response()->json($num);
    		}else
    		{
    			return response()->json(false);
    		}
    	}else if($ors == 'jian')
    	{
    		$num = \DB::table('playgou')->select('id','num')->where('id',$id)->first()->num;
    		if($num && $num != 1)
    		{
    			$res = \DB::table('playgou')->where('id',$id)->update(['num'=>$num - 1 ]);
    			if($res)
    			{
    				return response()->json($num - 1);
    			}else
    			{
    				return response()->json(false);
    			}
    		}else
    		{
    			return response()->json(false);
    		}
    	}else if($ors == 'jia')
    	{
    		$num = \DB::table('playgou')->select('id','num')->where('id',$id)->first()->num;
    		if($num && $num < 10)
    		{
    			$res = \DB::table('playgou')->where('id',$id)->update(['num'=>$num + 1 ]);
    			if($res)
    			{
    				return response()->json($num + 1);
    			}else
    			{
    				return response()->json(false);
    			}
    		}else
    		{
    			return response()->json(false);
    		}
    	}else if($ors == 'jias')
    	{
    		$num = \DB::table('playgou')->select('id','num')->where('id',$id)->first()->num;
    		if($num && $num < 999)
    		{
    			$res = \DB::table('playgou')->where('id',$id)->update(['num'=>$num + 1 ]);
    			if($res)
    			{
    				return response()->json($num + 1);
    			}else
    			{
    				return response()->json(false);
    			}
    		}else
    		{
    			return response()->json(false);
    		}
    	}else if($ors == 'del')
    	{
    		$res = \DB::table('playgou')->delete($id);
    		if($res)
    		{
    			return response()->json(1);
    		}else
    		{
    			return response()->json(false);
    		}
    	}
    }

    public function payment(Request $request)
    {	
    	$uid = \session('Home')->id;
    	$ids = $request->data;
    	if(!$ids) return back();
    	$id = Base64_decode($ids);
    	$id = substr($id,0,-1);
    	$id = explode(',',$id);
    	$title = getwebpage($request->path());
        $address = \DB::table('address')->select('status','id','shen','shi','qu','name','phone','tails','zipcode','lebel','uid')->where('uid',$uid)->get();
        $district = \DB::table('district')->select('id','name','level','upid')->where('level',1)->get();

    	return view('Newpro.Home.pay.payment',['title'=>$title,'address'=>$address,'district'=>$district]);
    }

    public function addressajax(Request $request)
    {
    	$id = $request->id;
    	$ors = $request->ors;
    	if($ors == 'shen')
    	{
    		$ors = 2;
    	}else if($ors == 'shi')
    	{
    		$ors = 3;
    	}
    		$data = \DB::table('district')->select('id','name','level','upid')->where('upid',$id)->where('level',$ors)->get();
    		if($data)
    		{
    			return response()->json($data);
    		}else
    		{
    			return response()->json(false);
    		}
    	
    }

    public function addressadd(Request $request)
    {
    	$uid = \session('Home')->id;
    	$ors = $request->ors;
    	$data = $request->data;
    	
    	if($ors == 'add')
    	{
    		$data['uid'] = $uid;
    		$data['time'] = time();
    		$data['uptime'] = time();
    		$data['status'] = 0;

    		$id = \DB::table('address')->insertGetid($data);
    		if($id)
    		{
    			$data['id'] = $id;
    			return response()->json($data);
    		}else
    		{
    			return response()->json(false);
    		}
    	}
    }

    public function addressstatus(Request $request)
    {	
    	$uid = \session('Home')->id;
    	$id = $request->id;
    	$res = \DB::table('address')->where('uid',$uid)->update(['status'=>0]);
    	$ress = \DB::table('address')->where('id',$id)->update(['status'=>1]);
    	if($ress && $res)
    	{
    		return response()->json(true);
    	}else
    	{
    		return response()->json(false);
    	}
    }

    public function addressdel(Request $request)
    {
    	$id = $request->id;
    	$res = \DB::table('address')->delete($id);
    	if($res)
    	{
    		return response()->json(true);
    	}else
    	{
    		return response()->json(false);
    	}
    }
}
