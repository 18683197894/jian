<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuestionController extends Controller
{
    public function zhijinindex(Request $request)
    {
    	$data = \DB::table('question')
    			->select('id','time','or','ors','ip','name','sex','phone','qccupation','service','care','resident','style','money','intelligence','door','feel')
    			->where('ors','织金')
    			->where('or',1)
    			->orderBy('time','desc')
    			->paginate(8);
    	if($data->count() > 0)
    	{
    		foreach($data as $k => $v)
    		{
    			$v->care = array_filter( explode(',',$v->care));
    			$v->feel = explode(',',$v->feel);
    		}


    	}
    	
    	return view('Admin.question.zhijinindex',['title'=>'织金调查问卷','data'=>$data]);
    }

    public function defuindex(Request $request)
    {
    	$data = \DB::table('question')
    			->select('id','time','or','ors','ip','name','sex','phone','qccupation','service','care','resident','style','money','intelligence','door','feel')
    			->where('ors','德福')
    			->where('or',1)
    			->orderBy('time','desc')
    			->paginate(8);
    	if($data->count() > 0)
    	{
    		foreach($data as $k => $v)
    		{
    			$v->care = array_filter( explode(',',$v->care));
    			$v->feel = explode(',',$v->feel);
    		}


    	}
    	
    	return view('Admin.question.defuindex',['title'=>'德福调查问卷','data'=>$data]);
    }

    public function indexdel(Request $request)
    {
    	$id = $request->id;
    	$res = \DB::table('question')->delete($id);
    	if($res)
    	{
    		return response()->json(1);
    	}else
    	{
    		return response()->json(2);
    	}
    }
}
