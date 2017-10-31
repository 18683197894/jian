<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MakeController extends Controller
{
    public function indexpropermake(Request $request)
    {	
    	$key = isset($request->key) ? $request->key : '';
    	$data = \DB::table('lpyy')->select('id','phone','content','time','loupan')->where('phone','like','%'.$key.'%')->orderBy('time','desc')->paginate(10);
    	return view('admin.make.indexpropermake',['title'=>'首页楼盘看房预约','data'=>$data,'request'=>$request->all()]);
    }

    public function indexpropermakeajax(Request $request)
    {	
    	$arr = $request->except("_token");
    	$arr['status'] = 1;
    	$res = \DB::table('lpyy')->where('id',$arr['id'])->update($arr);
    	
    	if($res)
    	{
    		return response()->json(1);
    	}else
    	{
    		return response()->json(2);

    	}
    }

    public function indexpropermakedel(Request $request)
    {
    	$id = $request->id;

    	$res = \DB::table('lpyy')->delete($id);
    	if($res)
    	{
    		return response()->json(1);
    	}else
    	{
    		return response()->json(2);

    	}
    }

    public function indexationmake(Request $request)
    {
    	$key = isset($request->key) ? $request->key : '';
    	$data = \DB::table('zxyy')->select('id','phone','content','time')->where('phone','like','%'.$key.'%')->orderBy('time','desc')->paginate(10);

    	return view('admin.make.indexationmake',['title'=>'首页装修报价预约','data'=>$data,'request'=>$request->all()]);
    }

    public function indexationmakeajax(Request $request)
    {
    	$arr = $request->except("_token");
    	$arr['status'] = 1;
    	$res = \DB::table('zxyy')->where('id',$arr['id'])->update($arr);
    	
    	if($res)
    	{
    		return response()->json(1);
    	}else
    	{
    		return response()->json(2);

    	}
    }

    public function indexactionmakedel(Request $request)
    {
    	$id = $request->id;

    	$res = \DB::table('zxyy')->delete($id);
    	if($res)
    	{
    		return response()->json(1);
    	}else
    	{
    		return response()->json(2);

    	}
    }

    public function franchisezm(Request $request)
    {
    	$key = isset($request->key) ? $request->key : '';
    	$data = \DB::table('framchise')->select('id','phone','name','time','email','content')->where('name','like','%'.$key.'%')->orderBy('time','desc')->paginate(10);

    	if( count($data) <= 0 )
    	{
    	$data = \DB::table('framchise')->select('id','phone','name','time','email','content')->where('phone','like','%'.$key.'%')->orderBy('time','desc')->paginate(10);

    	}

    	return view('admin.make.franchisezm',['title'=>'合作伙伴招募','data'=>$data,'request'=>$request->all()]);
    }

    public function franchisezmajax(Request $request)
    {
    	$arr = $request->except("_token");
    	$arr['status'] = 1;
    	$res = \DB::table('framchise')->where('id',$arr['id'])->update($arr);
    	
    	if($res)
    	{
    		return response()->json(1);
    	}else
    	{
    		return response()->json(2);

    	}
    }

    public function franchisezmdel(Request $request)
    {
    	$id = $request->id;

    	$res = \DB::table('framchise')->delete($id);
    	if($res)
    	{
    		return response()->json(1);
    	}else
    	{
    		return response()->json(2);

    	}
    }

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

    	return view('admin.make.caseplay',['title'=>'案例页装修设计预约','data'=>$data,'request'=>$request->all()]);

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
