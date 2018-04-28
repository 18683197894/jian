<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function productindex()
    {	
    	$data = \DB::table('product_l')->select('id','title','time')->orderBy('time','desc')->get();

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

    public function productedits(Requets $request)
    {
    	$data = $request->except("_token");
    	dd($data);
    }
}
