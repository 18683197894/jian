<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function productindex()
    {	
    	$data = \DB::table('product_l')
    		->select('id','title','time','pid','level','uptime')
    		->where('level',1)
    		->orderBy('time')
    		->get();

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
    			->first();
    	if(!$pdata)
    	{
    		return back()->with(['info'=>'数据不存在！']);
    	}
    	$data = \DB::table('product_l')->select('id','time','uptime','pid','level','title')
    			->where('pid',$id)
    			->where('level',2)
    			->orderBy('time')
    			->get();
    	return view('Admin.product.classindex',['title'=>'分类管理','data'=>$data,'pdata'=>$pdata]);
    }

    public function classadd($id)
    {	
    	$pdata = \DB::table('product_l')->select('id','time','uptime','pid','level','title')
    			->where('id',$id)
    			->first();
    	if(!$pdata)
    	{
			return back()->with(['info'=>'数据不存在！']);
    	}
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

    public function goodsindex($id)
    {	
    
    	$pdata = \DB::table('product_l')->select('id','pid','title')->where('id',$id)->first();
    	if(!$pdata)
    	{
    		return back()->with(['info'=>'数据不存在！']);
    	}

    	$data = \DB::table('product_l')
    			->select('id','title','pid','time','uptime','level','model','brand','spec','num','remarks','titleimg')
    			->where('pid',$id)
    			->orderBy('time')
    			->get();
    	return view('Admin.product.goodsindex',['title'=>'产品管理','pdata'=>$pdata,'data'=>$data]);
    }

    public function goodsadd($id)
    {
    	$pdata = \DB::table('product_l')->select('id','title','pid','level')->where('id',$id)->first();
    	if(!$pdata)
    	{
    		return back()->with('info','数据不存在！');
    	}
    	return view('Admin.product.goodsadd',['title'=>'产品添加','pdata'=>$pdata]);
    }

    public function goodsadds(Request $request)
    {
    	$data = $request->except("_token");

    	$this->validate($request,[
    		'title'=>'required|max:15',
    		'brand'=>'required|max:15',
    		'model'=>'max:30',
    		'spec'=>'max:30',
    		'num'=>'max:5',
    		'remarks'=>'max:120',
    		'titleimg'=>'image|file',
    		],[
    		'title.required'=>'产品名称不能为空！',
    		'title.max'=>'产品名称最大15位！',
    		'brand.required'=>'品牌不能为空！',
    		'brand.max'=>'品牌最大15位！',
    		'model.max'=>'型号最大30位',
    		'spec.max'=>'规格最大30位',
    		'num.max'=>'数量最大5位',
    		'remarks.max'=>'备注最大120位',
    		'titleimg.image'=>'上传的文件不是图片类型！',
    		'titleimg.file'=>'图片上传不成功！',
    		]);
    	
    	$fileName = '';
    	if($request->hasFile('titleimg'))
    	{
    		if($request->file('titleimg')->isValid())
    		{ 
          //获取后缀名
    			$ext=$request->file('titleimg')->extension();
    			
          //获取新名
    			$fileName=time().mt_rand(10000,99999).'.'.$ext;
          //执行移动
    			$request->file('titleimg')->move('./uploads/product/img/',$fileName);
          //添加数据
                $data['titleimg']=$fileName;
    		}
    	}

    	$data['time'] = time();
    	$data['uptime'] = $data['time'];
    	$data['level'] = 3;

    	$res = \DB::table('product_l')->insert($data);
    	if($res)
    	{
    		return redirect('/newpro/index/package/product/goodsindex/'.$data['pid'])->with('info','添加成功！');
    	}else
    	{
    		if(file_exists('./uploads/product/img/'.$fileName))
    		{
    			@unlink('./uploads/product/img/'.$fileName);
    		}

    		return back()->with('info','添加失败！');
    	}
    }

    public function goodsedit($id)
    {
    	$data = \DB::table('product_l')
    			->select('id','title','pid','time','uptime','level','model','brand','spec','num','remarks','titleimg')
    			->where('id',$id)
    			->first();
    	if(!$data)
    	{
    		return back()->with('info','数据不存在！');
    	}

    	return view('Admin.product.goodsedit',['title'=>'产品修改','data'=>$data]);

    }

    public function goodsedits(Request $request)
    {
    	$data = $request->except("_token");

    	$this->validate($request,[
    		'title'=>'required|max:15',
    		'brand'=>'required|max:15',
    		'model'=>'max:30',
    		'spec'=>'max:30',
    		'num'=>'max:5',
    		'remarks'=>'max:120',
    		'titleimg'=>'image|file',
    		],[
    		'title.required'=>'产品名称不能为空！',
    		'title.max'=>'产品名称最大15位！',
    		'brand.required'=>'品牌不能为空！',
    		'brand.max'=>'品牌最大15位！',
    		'model.max'=>'型号最大30位',
    		'spec.max'=>'规格最大30位',
    		'num.max'=>'数量最大5位',
    		'remarks.max'=>'备注最大120位',
    		'titleimg.image'=>'上传的文件不是图片类型！',
    		'titleimg.file'=>'图片上传不成功！',
    		]);
    	
    	$fileName = '';
    	if($request->hasFile('titleimg'))
    	{
    		if($request->file('titleimg')->isValid())
    		{ 
          //获取后缀名
    			$ext=$request->file('titleimg')->extension();
    			
          //获取新名
    			$fileName=time().mt_rand(10000,99999).'.'.$ext;
          //执行移动
    			$request->file('titleimg')->move('./uploads/product/img/',$fileName);
          //添加数据
                $data['titleimg']=$fileName;
    		}
    	}

    	$data['time'] = time();
    	$data['uptime'] = $data['time'];
    	$data['level'] = 3;
    	$jiuimg = \DB::table('product_l')->select('titleimg')->where('id',$data['id'])->first()->titleimg;
    	$res = \DB::table('product_l')->where('id',$data['id'])->update($data);
    	if($res)
    	{	
    		if($fileName !== '')
    		{
    			if(file_exists('./uploads/product/img/'.$jiuimg))
    			{
    				@unlink('./uploads/product/img/'.$jiuimg);
    			}
    		}
    		return redirect('/newpro/index/package/product/goodsindex/'.$data['pid'])->with('info','更新成功！');
    	}else
    	{
    		if(file_exists('./uploads/product/img/'.$fileName))
    		{
    			@unlink('./uploads/product/img/'.$fileName);
    		}
    		return back()->with('info','更新失败！');
    	}
    }

    public function goodsdel(Request $request)
    {
    	$id = $request->id;
    	$img = \DB::table('product_l')->select('titleimg')->where('id',$id)->first()->titleimg;

    	$res = \DB::table('product_l')->delete($id);

    	if($res)
    	{	
    		if(file_exists('./uploads/product/img/'.$img))
    		{
    			@unlink('./uploads/product/img/'.$img);
    		}
    		return response()->json(1);
    	}else
    	{
			return response()->json(2);
    	}
    }
}
