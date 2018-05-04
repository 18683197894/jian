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
    	$data = \DB::table('playgou')
              ->select('id','pid','tus','time','num','uid','name')
              ->where('uid',$id)
              ->orderBy('time','desc')
              ->paginate(15);
      foreach($data as $k => $v)
      {
        $v->pid = explode(',',$v->pid);
        $v->pids =[];
        $v->path = '';
        foreach($v->pid as $kk => $vv)
        {
          $v->pids[$kk] = \DB::table('package')->select('name','ors','money')->where('id',$vv)->first();
          $v->path .= $v->pids[$kk]->name.'+';
        }
         $v->path = substr($v->path,0,-1);
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

