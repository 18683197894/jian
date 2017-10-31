<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{   
    public function newsleiadd()
    {
        return view('admin.news.newsleiadd',['title'=>'板块添加']);
    }
    public function newsleiadds(Request $request)
    {
        $data = $request->except('_token');
        $this->validate($request,[
            'title' => 'required|min:2|max:10',
            'img'=>'required|image',
            'titles' => 'required|min:2|max:10',
            'keyworlds' => 'required|min:6|max:30',
            'description' => 'required|min:10|max:120'
        ],[
            'title.required'=>'标题不能为空',
            'title.min'=>'标题最少2位最大10位',
            'title.max'=>'标题最少2位最大10位',
            'img.required'=>'未上传图片',
            'img.image'=>'请上传图片类型的文件',
            'titles.required'=>'网页标题不能为空',
            'titles.min'=>'网页标题最少2位最大10位',
            'titles.max'=>'网页标题最少2位最大10位',
            'keyworlds.required'=>'网页关键字不能为空',
            'keyworlds.min'=>'网页关键字最少6位最大30位',
            'keyworlds.max'=>'网页关键字最少6位最大30位',
            'description.required'=>'网页内容描述不能为空',
            'description.min'=>'网页内容描述最少10位最大120位',
            'description.max'=>'网页内容描述最少10位最大120位'
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
                $request->file('img')->move('./uploads/news/img/',$fileName);
          //添加数据
                $data['img']=$fileName;
            }else{
            return back()->withInput()->with(['info'=>'图片上传失败']);

            }
        }else{
            return back()->withInput()->with(['info'=>'图片上传失败']);
        }

        $res = \DB::table('newslei')->insert($data);
        if($res)
        {
            return redirect('/jslmadmin/newsleiindex')->with(['info'=>'添加成功']);
        }else
        {   
            unlink('./uploads/news/img/'.$data['img']);
            return back()->withInput()->with(['info'=>'添加失败！请重试']);
        }

    }

    public function newsleiindex()
    {
        $data = \DB::table('newslei')->orderBy('time','desc')->paginate(10);
        return view('admin.news.newsleiindex',['title'=>'板块列表','data'=>$data]);
    }

    public function newsleiedit($id)
    {
        $data = \DB::table('newslei')->where('id',$id)->first();
        return view('admin.news.leiedit',['title'=>'板块编辑','data'=>$data]);
    }

    public function newsleiedits(Request $request)
    {
        $id = $request->id;
        $data =  $request->except("_token","id");
        $this->validate($request,[
            'title' => 'required|min:2|max:10',
            'img'   => 'image',
            'titles' => 'required|min:2|max:10',
            'keyworlds' => 'required|min:6|max:30',
            'description' => 'required|min:10|max:120'
        ],[
            'title.required'=>'标题不能为空',
            'title.min'=>'标题最少2位最大10位',
            'title.max'=>'标题最少2位最大10位',
            'img.image'=>'请上传图片类型的文件',
            'titles.required'=>'网页标题不能为空',
            'titles.min'=>'网页标题最少2位最大10位',
            'titles.max'=>'网页标题最少2位最大10位',
            'keyworlds.required'=>'网页关键字不能为空',
            'keyworlds.min'=>'网页关键字最少6位最大30位',
            'keyworlds.max'=>'网页关键字最少6位最大30位',
            'description.required'=>'网页内容描述不能为空',
            'description.min'=>'网页内容描述最少10位最大120位',
            'description.max'=>'网页内容描述最少10位最大120位'
        ]);

        $de = \DB::table('newslei')->where('id',$id)->first();
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
          $request->file('img')->move('./uploads/news/img/',$fileName);

          //删除老图片
          if(file_exists('./uploads/news/img/'.$img))
          {
            unlink('./uploads/news/img/'.$img);
          }
          //添加数据
          $data['img']=$fileName;

        }else{
          return back()->with('info','图片上传失败');
        }

       } 

       $res = \DB::table('newslei')->where('id',$id)->update($data);

       if($res)
       {
        return redirect('jslmadmin/newsleiindex')->with(['info'=>'更新成功']);
       }else
       {
        return back()->with(['info'=>'更新失败！数据未更改']);
       }
    }

    public function newsleidel(Request $request)
    {
        $id = $request->id;
        $da = [];
        $da = \DB::table('news')->where('pid',$id)->get();

        if( count($da) >0)
        {
            return response()->json(3);
        }
        $img = \DB::table('newslei')->where('id',$id)->first()->img;

        $res = \DB::table('newslei')->delete($id);
        if($res)
        {       

            if(file_exists('./uploads/news/img/'.$img))
            {
            unlink('./uploads/news/img/'.$img);
            }
            return response()->json(1);
        }else
        {
            return response()->json(2);
        }       
    }

    public function newsindex(Request $request,$id)
    {
        $key = isset($request->key) ? $request->key : '';
        
        $data = \DB::table('news')->where('title','like','%'.$key.'%')->where('pid',$id)->orderBy('time','desc')->paginate(10);
        
        return view('Admin.news.index',['title'=>'新闻文章管理','data'=>$data,'request'=>$request->all(),'pid'=>$id]);
    }

    public function newsadd($id){
    	return view('Admin.news.add',['title'=>'新闻添加','pid'=>$id]);
    }
    public function newsadds(Request $request){
        
    	$data = $request->except('_token');

		$this->validate($request,[
		    'title' => 'required|min:2|max:30',
		    'yuan'	=> 'required',
		    'leicon'=>'required|min:10|max:46',
		    'titleimg'=>'required|image',
		    'content' =>'required',
            'titles' => 'required|min:2|max:10',
            'keyworlds' => 'required|min:6|max:30',
            'description' => 'required|min:10|max:120'

 		],[
			'title.required'=>'标题不能为空',
			'title.min'=>'标题最少2位最大30位',
			'title.max'=>'标题最少2位最大30位',
            'titles.required'=>'网页标题不能为空',
            'titles.min'=>'网页标题最少2位最大10位',
            'titles.max'=>'网页标题最少2位最大10位',
            'keyworlds.required'=>'网页关键字不能为空',
            'keyworlds.min'=>'网页关键字最少6位最大30位',
            'keyworlds.max'=>'网页关键字最少6位最大30位',
            'description.required'=>'网页内容描述不能为空',
            'description.min'=>'网页内容描述最少10位最大120位',
            'description.max'=>'网页内容描述最少10位最大120位',
			'yuan.required'=>'来源不能为空',
            'leicon.required'=>'简介不能为空',
            'leicon.min'=>'简介最少10位最大46位',
			'leicon.max'=>'简介最少10位最大46位',
			'titleimg.required'=>'未上传图片',
            'titleimg.image'=>'请上传图片类型的文件',
			'content.required'=>'内容不能为空'
		]);  

		$data['time']=time();

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
    			$request->file('titleimg')->move('./uploads/news/titleimg',$fileName);
          //添加数据
    			$data['titleimg']=$fileName;
    		}else{
    		return back()->withInput()->with(['info'=>'图片上传失败']);

    		}
    	}else{
    		return back()->withInput()->with(['info'=>'图片上传失败']);
    	}
		
    	$res = \DB::table('news')->insert($data);
    	if($res){
    		return redirect('/jslmadmin/newslei/newsindex/'.$data['pid'])->with(['info'=>'添加成功']);
    	}else{
    		@unlink('./uploads/news/titleimg/'.$fileName);
    		return back()->withInput()->with(['info'=>'发表失败']);

    	}

    }
    

    public function newsedit($id){
        $data = \DB::table('news')->where('id',$id)->first();
        return view('Admin.news.edit',['title'=>'新闻文章更新','data'=>$data]);
    	
    }
    public function newsedits(Request $request){
    	$data = $request->except('_token');
		$this->validate($request,[
		    'title' => 'required|min:2|max:30',
		    'yuan'	=> 'required',
		    'leicon'=>'required',
		    'content' =>'required',
            'titimg' => 'image',
            'titles' => 'required|min:2|max:10',
            'keyworlds' => 'required|min:6|max:30',
            'description' => 'required|min:10|max:120'
 		],[
			'title.required'=>'标题不能为空',
			'title.min'=>'标题最少2位最大30位',
			'title.max'=>'标题最少2位最大30位',
			'yuan.required'=>'来源不能为空',
			'leicon.required'=>'简介不能为空',
			'titles.min'=>'网页标题最少2位最大10位',
            'titles.max'=>'网页标题最少2位最大10位',
            'keyworlds.required'=>'网页关键字不能为空',
            'keyworlds.min'=>'网页关键字最少6位最大30位',
            'keyworlds.max'=>'网页关键字最少6位最大30位',
            'description.required'=>'网页内容描述不能为空',
            'description.min'=>'网页内容描述最少10位最大120位',
            'titleimg.image'=>'请上传图片类型的文件',
            'description.max'=>'网页内容描述最少10位最大120位',
			'content.required'=>'内容不能为空'
		]);

		
		if($request->HasFile('titleimg')){
			if($request->file('titleimg')->isValid()){
		        $img = \DB::table('news')->where('id',$request->id)->first()->titleimg;
				$ext = $request->file('titleimg')->extension();
				$newimg = time().mt_rand(100,900).'.'.$ext;
				$request->file('titleimg')->move('./uploads/news/titleimg',$newimg);

				if(file_exists('./uploads/news/titleimg/'.$img)){
					unlink('./uploads/news/titleimg/'.$img);
				}

				$data['titleimg'] = $newimg;
			}
		}
    	
    	$res = \DB::table('news')->where('id',$request->id)->update($data);

    	if($res){
    		return redirect('jslmadmin/newslei/newsindex/'.$data['pid'])->with('info','更新成功');
    	}else{
    		return back()->with('info','更新失败 内容未更改！');
    	}
    }

    public function newsdel(Request $request){

    	$id = $request->id;
    	$img = \DB::table('news')->where('id',$id)->first()->titleimg;
    	$res = \DB::table('news')->where('id',$id)->delete();

    	if($res){
    		
    		if(file_exists('./uploads/news/titleimg/'.$img)){
    			unlink('./uploads/news/titleimg/'.$img);
    		}
    		 return response()->json(1);
    	}else{
    		return response()->json(2);

    	}
    }

    public function newszhi(Request $request){
    	$res = \DB::table('news')->where('zhi',1)->where('pid',$request->pid)->first();

    	if($res)
    	{
    		\DB::table('news')->where('id',$res->id)->update(['zhi'=>0]);
    		$da = \DB::table('news')->where('id',$request->id)->update(['zhi'=>1]);
    		if($da)
    		{
    			return response()->json(1);
    		}else
    		{
    			return response()->json(2);
    		}
    	}else
    	{
    		$da = \DB::table('news')->where('id',$request->id)->update(['zhi'=>1]);
    		if($da)
    		{
    			return response()->json(1);
    		}else
    		{
    			return response()->json(2);
    		}
    	}
    }

}
