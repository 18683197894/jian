<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PackageController extends Controller
{
    public function packageindex(Request $request)
    {	
    	$data = \DB::table('package')->select('id','name','ors','money','time')
    		->orderBy('time','desc')
    		->get();
    	foreach($data as $k => $v)
    	{
    		if($v->ors !== '智能')
    		{
    			$v->money = $v->money.'/㎡';
    		}
    	}
    	return view('Admin.package.packageindex',['title'=>'包管理','data'=>$data]);
    }

    public function packageadd(Request $request)
    {
    	return view('Admin.package.packageadd',['title'=>'添加包']);
    }

    public function packageadds(Request $request)
    {
    	$data = $request->except("_token");
    	$this->validate($request,[
		    'name' => 'required|min:2|max:10',
		    'ors'	=> 'required|min:1|max:10',
		    'money'=>'required|min:2|max:30'
 		],[
			'name.required'=>'包名称不能为空',
			'name.min'=>'包名称最少2位',
			'name.max'=>'包名称最大10位',
			'ors.required'=>'包属性不能为空',
			'money.required'=>'价格不能为空'

		]);
    	
    	$data['time'] = time();
    	$res = \DB::table('package')->insert($data);
    	if($res)
    	{
    		return redirect('/newpro/index/package/packageindex')->with(['info'=>'添加成功！']);
    	}else
    	{
    		return back()->with(['info'=>'添加失败！']);
    	}
    }

    public function packageedit(Request $request)
    {
    	$id = $request->id;
    	$data = \DB::table('package')->select('id','ors','name','money')->where('id',$id)->first();
    	if(!$data)
    	{
    		return back()->with(['info'=>'数据不存在！']);
    	}

    	return view('Admin.package.packageedit',['title'=>'包编辑','data'=>$data]);
    }

    public function packageedits(Request $request)
    {
    	$data = $request->except("_token");
    	$this->validate($request,[
		    'name' => 'required|min:2|max:10',
		    'ors'	=> 'required|min:1|max:10',
		    'money'=>'required|min:2|max:30'
 		],[
			'name.required'=>'包名称不能为空',
			'name.min'=>'包名称最少2位',
			'name.max'=>'包名称最大10位',
			'ors.required'=>'包属性不能为空',
			'money.required'=>'价格不能为空'
		]);

		$res = \DB::table('package')->where('id',$data['id'])->update($data);
		if($res)
		{
    		return redirect('/newpro/index/package/packageindex')->with(['info'=>'更新成功！']);

		}else
		{
    		return redirect('/newpro/index/package/packageindex')->with(['info'=>'更新失败！数据未作更改']);
		}
    }

    public function packagedel(Request $request)
    {
    	$id = $request->id;
    	$res = \DB::table('package')->delete($id);
    	if($res)
    	{
    	return response()->json(1);
    	}else
    	{
    		return response()->json('删除失败！');
    	}
    }
}
