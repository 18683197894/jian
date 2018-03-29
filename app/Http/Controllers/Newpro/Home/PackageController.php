<?php

namespace App\Http\Controllers\Newpro\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PackageController extends Controller
{

	public function jizhuangindex(Request $request)
	{	
		$data = \DB::table('package')->select('id','name','ors','money')->get();
		$title = getwebpage($request->path());
		return view('Newpro.Home.Package.jizhuangindex',['title'=>$title,'ors'=>'jizhuang','data'=>$data,'path'=>$request->path()]);
	}

	public function ruanzhuangindex(Request $request)
	{
		$data = \DB::table('package')->select('id','name','ors','money')->get();
		$title = getwebpage($request->path());
		return view('Newpro.Home.Package.ruanzhuangindex',['title'=>$title,'ors'=>'ruanzhuang','data'=>$data,'path'=>$request->path()]);
	}

	public function zhinengindex(Request $request)
	{
		$data = \DB::table('package')->select('id','name','ors','money')->get();
		$title = getwebpage($request->path());
		return view('Newpro.Home.Package.zhinengindex',['title'=>$title,'ors'=>'zhineng','data'=>$data,'path'=>$request->path()]);
	}

	public function playgou(Request $request)
	{
		$uid = \session('Home')->id;
		if(!$uid)
		{
			return response()->json('添加失败！请先登入');
		}
		$ids = $request->except("_token");
		$data['pid'] = '';

		if(isset($data))

		foreach($ids as $k => $v)
		{
			$data['pid'] .= $v.',';
		}
		$data['pid'] = substr($data['pid'],0,-1);
		$data['uid'] = $uid;
		$data['name'] = '自定义套餐包';
		$data['time'] = time();
		$data['status'] = 0;
		$data['num'] = 1;
		$data['tus'] = '套餐包';
		$res = \DB::table('playgou')->insert($data);
		if($res)
		{
			return response()->json(1);
		}{
			return response()->json('添加失败！');
		}
	}

	function playgouors(Request $request)
	{
		$uid = \session('Home')->id;
		$data = \DB::table('orders')->select('id','name','status')->where('uid',$uid)->where('status','>=',1)->get();
		// return response()->json($data);		
		if($data->count() > 0)
		{
			return response()->json(1);
		}else
		{
			return response()->json(false);
		}
	}
}
