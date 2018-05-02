<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function productindex()
    {	
    	$data = \DB::table('product_l')->select('id','title','time','pid','level','uptime')->where('level',1)->orderBy('time','desc')->get();

    	return view('Admin.product.productindex',['title'=>'产品管理','data'=>$data]);
    }
    public function productadd()
    {	
    	return view('Admin.product.productadd',['title'=>'产品添加']);
    }

    public function productadds(Request $request)
    {	
    	$this->validate($request,[
    		'title' => 'required|max:10'
    		],[
    		'title.required' => '标题不能为空',
    		'title.max' => '标题最大10位'
    		]);

    	$data['title'] = $request->input('title');
    	$data['time'] = time();
    	$data['uptime'] = $data['time'];
    	$data['pid'] = 0;
    	$data['level'] = 1;
    	$res = \DB::table('product_l')->insert($data);
    	if($res)
    	{
    		return redirect('/newpro/index/package/productindex')->with(['info'=>'添加成功！']);
    	}else
    	{
    		return back()->withInput()->with(['info'=>'数据库写入失败！']);
    	}
    }

    public function productedit($id)
    {
    	$data = \DB::table('product_l')->select('id','title')->where('id',$id)->first();
    	if(!$data)
    	{
    		return redirect('/newpro/index/package/productindex')->with(['info'=>'数据不存在！']);
    	}

    	return view('Admin.product.productedit',['title'=>'修改产品','data'=>$data]);
    }

    public function productedits(Request $request)
    {	
    	$this->validate($request,[
    		'id'=>'required',
    		'title'=>'required|max:10'
    		],[
    		'id.required'=>'参数ID不存在！',
    		'title.required'=>'标题不能为空！',
    		'title.max'=>'标题最大10位'
    		]);
    		
    	$data['title'] = $request->input('title');
    	$data['uptime'] = time();
    	$res = \DB::table('product_l')->where('id',$request->input('id'))->update($data);
    	if($res)
    	{
    		return redirect('/newpro/index/package/productindex')->with('info','更新成功！');
    	}else
    	{
    		return back()->with('info','数据库写入失败！');
    	}
    }

    public function productdel(Request $request)
    {	
    	$id = $request->input('id');
    	$data = \DB::table('product_l')->select('id')->where('pid',$id)->where('level',2)->get();
    	if(count($data) > 0)
    	{
    		return response()->json(3);
    	}
    	$res = \DB::table('product_l')->delete($id);
    	if($res)
    	{
    		return response()->json(1);
    	}else{
    		return response()->json(2);
    	}
    }

    public function calssindex($id)
    {
    	$pdata = \DB::table('product_l')->select('id','time','uptime','pid','level','title')
    			->where('id',$id)
    			->where('level',1)
    			->first();
    	$data = \DB::table('product_l')->select('id','time','uptime','pid','level','title')
    			->where('pid',$id)
    			->where('level',2)
    			->get();
    	return view('Admin.product.classindex',['title'=>'分类管理','data'=>$data,'pdata'=>$pdata]);
    }

    public function classadd($id)
    {	
    	$pdata = \DB::table('product_l')->select('id','time','uptime','pid','level','title')
    			->where('id',$id)
    			->where('level',1)
    			->first();
    	return view('Admin.product.classadd',['title'=>'分类添加','id'=>$id,'pdata'=>$pdata]);
    }

    public function classadds(Request $request)
    {
    	$this->validate($request,[
    		'pid'=>'required',
    		'title'=>'required|max:10'
    		],[
    		'pid.required'=>'参数ID不存在！',
    		'title.required'=>'标题不能为空！',
    		'title.max'=>'标题最大10位'
    		]);

    	$data = $request->except("_token");
    	$data['time'] = time();
    	$data['uptime'] = $data['time'];
    	$data['level'] = 2;
    	$res = \DB::table('product_l')->insert($data);

    	if($res)
    	{
    		return redirect('/newpro/index/package/product/classindex/'.$data["pid"])->with(['info'=>'添加成功！']);
    	}else
    	{
    		return back()->with(['info'=>'数据库写入失败！']);
    	}
    }

    public function classedit($id)
    {
    	$data = \DB::table('product_l')->select('id','title','pid')->where('id',$id)->first();
    	if(!$data)
    	{
    		return back()->with(['info'=>'数据不存在！']);
    	}

    	return view('Admin.product.classedit',['title'=>'修改分类','data'=>$data]);
    }

    public function classedits(Request $request)
    {
    	$this->validate($request,[
    		'id'=>'required',
    		'title'=>'required|max:10'
    		],[
    		'id.required'=>'参数ID不存在！',
    		'title.required'=>'标题不能为空！',
    		'title.max'=>'标题最大10位'
    		]);
    	$data['title'] = $request->input('title');
    	$data['uptime'] = time();

    	$res = \DB::table('product_l')->where('id',$request->input('id'))->update($data);
    	if($res)
    	{
    		return redirect('/newpro/index/package/product/classindex/'.$request->input('pid'))->with('info','修改成功！');
    	}else
    	{
    		return back()->with('info','数据库写入失败！');
    	}

    }

    public function classdel(Request $request)
    {
    	$id = $request->id;
    	$data = \DB::table('product_l')->select('id')->where('pid',$id)->where('level',3)->get();
    	if(count($data) > 0)
    	{
    		return response()->json(3);
    	}
    	$res = \DB::table('product_l')->delete($id);
    	if($res)
    	{
    		return response()->json(1);
    	}else
    	{
    		return response()->json(2);
    	}
    }
}
