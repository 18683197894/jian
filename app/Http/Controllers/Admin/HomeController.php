<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(Request $request)
    {	
   		$key = $request->key?$request->key:'';

   		$perg = '/^(\d){3,11}$/';
   		if( preg_match($perg,$key) )
   		{
   			$data = \DB::table('user_home')->select('id','phone','time','name','uptime','status')->where('phone','like','%'.$key.'%')->paginate(12);
   		}else
   		{
   			$data = \DB::table('user_home')->select('id','phone','time','name','uptime','status')->where('name','like','%'.$key.'%')->paginate(12);
   		}

   		foreach( $data as $k => $v )
   		{
        $v->gou = \DB::table('playgou')->where('uid',$v->id)->count();
   			$v->orders = \DB::table('orders')->where('uid',$v->id)->count();
   		}

   		$data->appends('key',$key);
    	return view('Admin.home.index',['title'=>'用户管理','data'=>$data,'request'=>$request]);
    }

    public function playgou($id)
    {
    	$tit = \DB::table('user_home')->where('id',$id)->first()->name.'的购物车';
    	$qing = \DB::table('qing')->first()->money;
    	$data = \DB::table('playgou')
              ->join('door','playgou.pid','=','door.id')
              ->select('playgou.id','playgou.pid','playgou.tus','playgou.time','playgou.num','playgou.uid','door.main','door.nomain','door.model','door.pid as ppid','door.title as name')
              ->where('playgou.uid',$id)
              ->orderBy('time','desc')
              ->paginate(15);

      $style = \DB::table('style')
      ->join('packages','style.pid','=','packages.id')
      ->select('style.id','style.title','packages.title as titles')
      ->get();
      if($data->count() > 0)
      {

      foreach($data as $k => $v)
      {
          if($v->tus == 'main')
          {
            $v->money = $v->main;
          }else if($v->tus == 'nomain')
          {
            $v->money = $v->nomain;
          }else if($v->tus == 'model')
          {
            $v->money = $v->model;
          }else if($v->tus == 'qing')
          {
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
      }
    	return view('Admin.home.playgou',['data'=>$data,'title'=>$tit]);
    }

    public function statusajax(Request $request)
    {	
    	
    	$na = \DB::table('user_home')->where('id',$request->id)->first();

    	if( $na )
    	{
			$status = $na->status;

			if( $status ==1)
			{
				$status = 0;
			}else if($status == 0)
			{
				$status = 1;
			}
			
			$res = \DB::table('user_home')->where('id',$request->id)->update(['status'=>$status]);
			if( $res )
			{
				return  response()->json($status); 
			}else{
				return	response()->json(2);
			} 		
    	}else
    	{
    		return response()->json(3);
    	}
    }

  
}

