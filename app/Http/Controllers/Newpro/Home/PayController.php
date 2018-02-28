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
}
