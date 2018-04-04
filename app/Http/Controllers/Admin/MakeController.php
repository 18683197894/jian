<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MakeController extends Controller
{
    

    public function caseplay(Request $request)
    {
    	$key = isset($request->key) ? $request->key : '';
    	$data = \DB::table('caseplay')
    	->join('case','caseplay.uid','=','case.id')
    	->select('caseplay.id','caseplay.phone','caseplay.name','caseplay.time','caseplay.content','case.id as uid','case.title')
    	->where('caseplay.name','like','%'.$key.'%')
    	->orderBy('time','desc')->paginate(10);

    	

    	if( count($data) <= 0 )
    	{
    	$data = \DB::table('caseplay')
    	->join('case','caseplay.uid','=','case.id')
    	->select('caseplay.id','caseplay.phone','caseplay.name','caseplay.time','caseplay.content','case.id as uid','case.title')
    	->where('caseplay.phone','like','%'.$key.'%')
    	->orderBy('time','desc')->paginate(10);
    	}

    	return view('Admin.make.caseplay',['title'=>'案例页装修设计预约','data'=>$data,'request'=>$request->all()]);

    }

    public function caseplayajax(Request $request)
    {
    	$arr = $request->except("_token");
    	$arr['status'] = 1;
    	$res = \DB::table('caseplay')->where('id',$arr['id'])->update($arr);
    	
    	if($res)
    	{
    		return response()->json(1);
    	}else
    	{
    		return response()->json(2);

    	}
    }

    public function caseplaydeldel(Request $request)
    {
    	$id = $request->id;

    	$res = \DB::table('caseplay')->delete($id);
    	if($res)
    	{
    		return response()->json(1);
    	}else
    	{
    		return response()->json(2);

    	}
    }
}
