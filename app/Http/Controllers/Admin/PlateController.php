<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PlateController extends Controller
{
    public function add()
    {
    	return view('admin.plate.add',['title'=>'添加板块']);
    }
    public function adds(Request $request)
    {
        $data = $request->except('_token');
		$this->validate($request,[
		    'title' => 'required|min:2|max:10',
		    'img'=>'required|image',
            'titles' => 'required|min:2|max:20',
            'keyworlds' => 'required|min:6|max:120',
            'description' => 'required|min:10|max:255'
 		],[
			'title.required'=>'标题不能为空',
			'title.min'=>'标题最少2位',
			'title.max'=>'标题最大10位',
			'img.required'=>'未上传图片',
			'img.image'=>'请上传图片类型的文件',
            'titles.required'=>'网页标题不能为空',
            'titles.min'=>'网页标题最少2位',
            'titles.max'=>'网页标题最大20位',
            'keyworlds.required'=>'网页关键字不能为空',
            'keyworlds.min'=>'网页关键字最少6位',
            'keyworlds.max'=>'网页关键字最大120位',
            'description.required'=>'网页内容描述不能为空',
            'description.min'=>'网页内容描述最少10位',
            'description.max'=>'网页内容描述最大255位'
		]); 
		$data['time']=time();
		$data['status'] = 0;
    	if($request->hasFile('img'))
    	{
    		if($request->file('img')->isValid())
    		{ 
          //获取后缀名
    			$ext=$request->file('img')->extension();
    			
          //获取新名
    			$fileName=time().mt_rand(10000,99999).'.'.$ext;
          //执行移动
    			$request->file('img')->move('./uploads/plate/img/',$fileName);
          //添加数据
    			$data['img']=$fileName;
    		}else{
    		return back()->withInput()->with(['info'=>'图片上传失败']);

    		}
    	}else{
    		return back()->withInput()->with(['info'=>'图片上传失败']);
    	}

    	$res = \DB::table('plate')->insert($data);
    	if($res)
    	{
    		return redirect('/admin/plate/index')->with(['info'=>'添加成功']);
    	}else
    	{	
    		unlink('./uploads/plate/img/'.$data['img']);
    		return back()->withInput()->with(['info'=>'添加失败！请重试']);
    	}   	
    }

    public function index()
    {
    	$data = \DB::table('plate')->orderBy('time','desc')->paginate(10);
    	return view('admin.plate.index',['title'=>'板块管理','data'=>$data]);  	
    }

    public function edit($id)
    {
    	$data = \DB::table('plate')->where('id',$id)->first();
    	return view('admin.plate.edit',['title'=>'模块编辑','data'=>$data]);
    }
    public function edits(Request $request)
    {
		$id = $request->id;
    	$data =  $request->except("_token","id");
		$this->validate($request,[
		    'title' => 'required|min:2|max:10',
		    'img'   => 'image',
            'titles' => 'required|min:2|max:20',
            'keyworlds' => 'required|min:6|max:120',
            'description' => 'required|min:10|max:255'
 		],[
			'title.required'=>'标题不能为空',
			'title.min'=>'标题最大10位',
			'title.max'=>'标题最大10位',
			'img.image'=>'请上传图片类型的文件',
            'titles.required'=>'网页标题不能为空',
            'titles.min'=>'网页标题最少2位',
            'titles.max'=>'网页标题最大20位',
            'keyworlds.required'=>'网页关键字不能为空',
            'keyworlds.min'=>'网页关键字最少6位',
            'keyworlds.max'=>'网页关键字最大120位',
            'description.required'=>'网页内容描述不能为空',
            'description.min'=>'网页内容描述最少10位',
            'description.max'=>'网页内容描述最大255位'
		]);

    	$de = \DB::table('plate')->where('id',$id)->first();
    	$img = $de->img;
    	
       //判断是否上传图片
       if($request->hasFile('img')){

        //判断图片是否有效
        if($request->file('img')->isValid()){

          //获取后缀名
          $ext=$request->file('img')->extension();
          
          //获取新名
          $fileName=time().mt_rand(10000,99999).'.'.$ext;
          //执行移动
          $request->file('img')->move('./uploads/plate/img/',$fileName);

          //删除老图片
          if(file_exists('./uploads/plate/img/'.$img))
          {
            unlink('./uploads/plate/img/'.$img);
          }
          //添加数据
          $data['img']=$fileName;

        }else{
          return back()->with('info','图片上传失败');
        }

       } 

       $res = \DB::table('plate')->where('id',$id)->update($data);

       if($res)
       {
       	return redirect('admin/plate/index')->with(['info'=>'更新成功']);
       }else
       {
       	return back()->with(['info'=>'更新失败！数据未更改']);
       }
    }
    public function newslist(Request $request,$id)
    {
		$key = isset($request->key) ? $request->key : '';
    	
    	$data = \DB::table('platenews')->where('title','like','%'.$key.'%')->where('pid',$id)->orderBy('time','desc')->paginate(10);
    	$data->appends(['key'=>$key]);
    	return view('Admin.plate.newslist',['title'=>'模块文章管理','data'=>$data,'request'=>$request->all(),'pid'=>$id]);
    }
    public function newsadd($id)
    {
    	return view('admin.plate.newsadd',['title'=>'知识学堂文章添加','pid'=>$id]);
    }

    public function newsadds(Request $request)
    {
		$data = $request->except('_token');
		$this->validate($request,[
		    'title' => 'required|min:3|max:30',
		    'leicon'=>'required|min:10|max:120',
		    'titleimg'=>'required|image',
		    'content' =>'required|max:20000',
            'titles' => 'required|min:2|max:30',
            'keyworlds' => 'required|min:6|max:120',
            'description' => 'required|min:10|max:255'
 		],[
			'title.required'=>'标题不能为空',
			'title.min'=>'标题最少3位',
			'title.max'=>'标题最大30位',
            'leicon.required'=>'简介不能为空',
            'leicon.min'=>'简介最少10位',
			'leicon.max'=>'简介最大120位',
			'titleimg.required'=>'未上传图片',
			'titleimg.image'=>'请上传图片类型的文件',
			'content.required'=>'内容不能为空',
            'content.max'=>'内容不能超过20000字',
            'titles.required'=>'网页标题不能为空',
            'titles.min'=>'网页标题最少2位',
            'titles.max'=>'网页标题最大30位',
            'keyworlds.required'=>'网页关键字不能为空',
            'keyworlds.min'=>'网页关键字最少6位',
            'keyworlds.max'=>'网页关键字最大120位',
            'description.required'=>'网页内容描述不能为空',
            'description.min'=>'网页内容描述最少10位',
            'description.max'=>'网页内容描述最大255位'
		]);  

		$data['time']=time();
		$data['yuan']=\DB::table('plate')->where('id',$data['pid'])->first()->title;
		$data['click'] = 0;
		
    	if($request->hasFile('titleimg'))
    	{
    		if($request->file('titleimg')->isValid())
    		{ 
          //获取后缀名
    			$ext=$request->file('titleimg')->extension();
    			
          //获取新名
    			$fileName=time().mt_rand(10000,99999).'.'.$ext;
          //执行移动
    			$request->file('titleimg')->move('./uploads/plate/newsimg',$fileName);
          //添加数据
    			$data['titleimg']=$fileName;
    		}else{
    		return back()->withInput()->with(['info'=>'图片上传失败']);

    		}
    	}else{
    		return back()->withInput()->with(['info'=>'图片上传失败']);
    	}
		
    	$res = \DB::table('platenews')->insert($data);
    	if($res){
    		return redirect('/admin/plate/newslist/'.$data['pid'])->with(['info'=>'添加成功！']);
    	}else{
    		@unlink('./uploads/gongyi/newsimg'.$fileName);
    		return back()->withInput()->with(['info'=>'添加失败！请重试']);

    	}
    }

    public function newsedit($id)
    {
    	$data = \DB::table('platenews')->where('id',$id)->first();
    	return view('admin.plate.newsedit',['title'=>'知识学堂文章更新','data'=>$data]);
    }

    public function newsedits(Request $request)
    {
		$data = $request->except('_token');
		$this->validate($request,[
		    'title' => 'required|min:2|max:30',
		    'leicon'=>'required|min:10|max:120',
		    'titleimg'=>'image',
		    'content' =>'required|max:20000',
            'titles' => 'required|min:2|max:30',
            'keyworlds' => 'required|min:6|max:120',
            'description' => 'required|min:10|max:255'
 		],[
			'title.required'=>'标题不能为空',
			'title.min'=>'标题最少2位',
			'title.max'=>'标题最大30位',
 			'leicon.required'=>'简介不能为空',
            'leicon.min'=>'简介最少10位',
            'leicon.max'=>'简介最大120位',
			'titleimg.image'=>'请上传图片类型的文件',
			'content.required'=>'内容不能为空',
            'content.max'=>'内容不能超过20000字',
            'titles.required'=>'网页标题不能为空',
            'titles.min'=>'网页标题最少2位',
            'titles.max'=>'网页标题最大30位',
            'keyworlds.required'=>'网页关键字不能为空',
            'keyworlds.min'=>'网页关键字最少6位',
            'keyworlds.max'=>'网页关键字最大120位',
            'description.required'=>'网页内容描述不能为空',
            'description.min'=>'网页内容描述最少10位',
            'description.max'=>'网页内容描述最大255位'
		]);

		
		if($request->HasFile('titleimg')){
			if($request->file('titleimg')->isValid()){
		        $img = \DB::table('platenews')->where('id',$request->id)->first()->titleimg;
		        
				$ext = $request->file('titleimg')->extension();
				$newimg = time().mt_rand(100,900).'.'.$ext;
				$request->file('titleimg')->move('./uploads/plate/newsimg',$newimg);

				if(file_exists('./uploads/plate/newsimg/'.$img)){
					@unlink('./uploads/plate/newsimg/'.$img);
				}

				$data['titleimg'] = $newimg;
			}
		}
    	
    	$res = \DB::table('platenews')->where('id',$request->id)->update($data);

    	if($res){
    		return redirect('/admin/plate/newslist/'.$data['pid'])->with('info','更新成功');
    	}else{
    		return back()->with('info','更新失败 内容未更改！');
    	}
    }
    public function newszhi(Request $request)
    {
		$res = \DB::table('platenews')->where('zhi',1)->where('pid',$request->pid)->first();

    	if($res)
    	{
    		\DB::table('platenews')->where('id',$res->id)->update(['zhi'=>0]);
    		$da = \DB::table('platenews')->where('id',$request->id)->update(['zhi'=>1]);
    		if($da)
    		{
    			return response()->json(1);
    		}else
    		{
    			return response()->json(2);
    		}
    	}else
    	{
    		$da = \DB::table('platenews')->where('id',$request->id)->update(['zhi'=>1]);
    		if($da)
    		{
    			return response()->json(1);
    		}else
    		{
    			return response()->json(2);
    		}
    	}
    }

    public function newsdel(Request $request)
    {
		$id = $request->id;
    	$img = \DB::table('platenews')->where('id',$id)->first()->titleimg;
    	$res = \DB::table('platenews')->where('id',$id)->delete();

    	if($res){
    		
    		if(file_exists('./uploads/plate/newsimg/'.$img)){
    			unlink('./uploads/plate/newsimg/'.$img);
    		}
    		 return response()->json(1);
    	}else{
    		return response()->json(2);

    	}
    }

    public function del(Request $request)
    {
		$id = $request->id;
    	$da = [];
    	$da = \DB::table('platenews')->where('pid',$id)->get();

    	if( count($da) >0)
    	{
    		return response()->json(3);
    	}
    	$img = \DB::table('plate')->where('id',$id)->first()->img;

    	$res = \DB::table('plate')->delete($id);
    	if($res)
    	{    	

    		if(file_exists('./uploads/plate/img/'.$img))
    		{
    		unlink('./uploads/plate/img/'.$img);
    		}
    		return response()->json(1);
    	}else
    	{
    		return response()->json(2);
    	}    	
    }
}














