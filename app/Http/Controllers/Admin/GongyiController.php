<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GongyiController extends Controller
{
    public function index()
    {
    	$data = \DB::table('gongyi')->orderBy('time','desc')->paginate(10);
    	return view('Admin.gongyi.index',['title'=>'工艺列表','data'=>$data]);
    }
    public function leiadd()
    {
    	return view('Admin.gongyi.leiadd',['title'=>'添加工艺']);
    }

    public function leiadds(Request $request)
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
            'titles.min'=>'网页标题最大10位',
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
    			$request->file('img')->move('./uploads/gongyi/img/',$fileName);
          //添加数据
    			$data['img']=$fileName;
    		}else{
    		return back()->withInput()->with(['info'=>'图片上传失败']);

    		}
    	}else{
    		return back()->withInput()->with(['info'=>'图片上传失败']);
    	}

    	$res = \DB::table('gongyi')->insert($data);
    	if($res)
    	{
    		return redirect('/Admin/gongyi/lei/list')->with(['info'=>'添加成功']);
    	}else
    	{	
    		unlink('./uploads/gongyi/img/'.$data['img']);
    		return back()->withInput()->with(['info'=>'添加失败！请重试']);
    	}
    }
    public function edit($id)
    {
    	$data = \DB::table('gongyi')->where('id',$id)->first();
    	return view('Admin.gongyi.edit',['title'=>'工艺编辑','data'=>$data]);
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
			'title.min'=>'标题最少2位',
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

    	$de = \DB::table('gongyi')->where('id',$id)->first();
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
          $request->file('img')->move('./uploads/gongyi/img/',$fileName);

          //删除老图片
          if(file_exists('./uploads/gongyi/img/'.$img))
          {
            unlink('./uploads/gongyi/img/'.$img);
          }
          //添加数据
          $data['img']=$fileName;

        }else{
          return back()->with('info','图片上传失败');
        }

       } 

       $res = \DB::table('gongyi')->where('id',$id)->update($data);

       if($res)
       {
       	return redirect('Admin/gongyi/lei/list')->with(['info'=>'更新成功']);
       }else
       {
       	return back()->with(['info'=>'更新失败！数据未更改']);
       }
    }

    public function newslist(Request $request,$id)
    {	
    	$key = isset($request->key) ? $request->key : '';
    	$plate = \DB::table('gongyi')->select('id','title')->get();
    	$data = \DB::table('gongyinews')->select('id','title','titleimg','time','click','pid','zhi')->where('title','like','%'.$key.'%')->where('pid',$id)->orderBy('time','desc')->paginate(10);
    	foreach( $data as $k => $v )
        {
            foreach( $plate as $kk => $vv )
            {
                if( $v->pid == $vv->id )
                {
                    $v->yuan = $vv->title;
                }
            }
        }
        $tit = \DB::table('gongyi')->select('title','id')->where('id',$id)->first()->title;
        $data->appends(['key'=>$key]);
    	return view('Admin.gongyi.newslist',['title'=>'工艺文章管理','data'=>$data,'request'=>$request->all(),'pid'=>$id,'tit'=>$tit]);
    
    }
    public function gongyinewsadd($id)
    {           
    	return view('Admin.gongyi.gongyinewsadd',['title'=>'工艺文章添加','pid'=>$id]);
    }

    public function gongyinewsadds(Request $request)
    {
    	$data = $request->except('_token');
		$this->validate($request,[
		    'title' => 'required|min:2|max:30',
		    'leicon'=>'required|min:10|max:255',
		    'titleimg'=>'required|image',
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
			'leicon.max'=>'简介最大255位',
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
		// $data['yuan']=\DB::table('gongyi')->where('id',$data['pid'])->first()->title;
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
    			$request->file('titleimg')->move('./uploads/gongyi/newsimg',$fileName);
          //添加数据
    			$data['titleimg']=$fileName;
    		}else{
    		return back()->withInput()->with(['info'=>'图片上传失败']);

    		}
    	}else{
    		return back()->withInput()->with(['info'=>'图片上传失败']);
    	}
		
    	$res = \DB::table('gongyinews')->insert($data);
    	if($res){
    		return redirect('/Admin/gongyi/lei/newslist/'.$data['pid'])->with(['info'=>'添加成功！']);
    	}else{
    		@unlink('./uploads/gongyi/newsimg'.$fileName);
    		return back()->withInput()->with(['info'=>'添加失败！请重试']);

    	}
    }

    public function newsedit($id)
    {
    	$data = \DB::table('gongyinews')->where('id',$id)->first();
    	return view('Admin.gongyi.newsedit',['title'=>'工艺文章更新','data'=>$data]);
    }

    public function newsedits(Request $request)
    {	
 
    	$data = $request->except('_token');
		$this->validate($request,[
		    'title' => 'required|min:2|max:30',
		    'leicon'=>'required|min:10|max:255',
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
			'titleimg.image'=>'请上传图片类型的文件',
            'content.required'=>'内容不能为空',
			'content.max'=>'内容不能超过20000字',
            'titles.required'=>'网页标题不能为空',
            'titles.min'=>'网页标题最少2位',
            'titles.max'=>'网页标题最大30位',
            'leicon.min'=>'简介最少10位',
            'leicon.max'=>'简介最大255位',
            'keyworlds.required'=>'网页关键字不能为空',
            'keyworlds.min'=>'网页关键字最少6位',
            'keyworlds.max'=>'网页关键字最大120位',
            'description.required'=>'网页内容描述不能为空',
            'description.min'=>'网页内容描述最少10位',
            'description.max'=>'网页内容描述最大255位'
		]);

		
		if($request->HasFile('titleimg')){
			if($request->file('titleimg')->isValid()){
		        $img = \DB::table('gongyinews')->where('id',$request->id)->first()->titleimg;
		        
				$ext = $request->file('titleimg')->extension();
				$newimg = time().mt_rand(100,900).'.'.$ext;
				$request->file('titleimg')->move('./uploads/gongyi/newsimg',$newimg);

				if(file_exists('./uploads/gongyi/newsimg/'.$img)){
					@unlink('./uploads/gongyi/newsimg/'.$img);
				}

				$data['titleimg'] = $newimg;
			}
		}
    	
    	$res = \DB::table('gongyinews')->where('id',$request->id)->update($data);

    	if($res){
    		return redirect('/Admin/gongyi/lei/newslist/'.$data['pid'])->with('info','更新成功');
    	}else{
    		return back()->with('info','更新失败 内容未更改！');
    	}
    }
    public function newsdel(Request $request)
    {
    	$id = $request->id;
    	$img = \DB::table('gongyinews')->where('id',$id)->first()->titleimg;
    	$res = \DB::table('gongyinews')->where('id',$id)->delete();

    	if($res){
    		
    		if(file_exists('./uploads/gongyi/newsimg/'.$img)){
    			unlink('./uploads/gongyi/newsimg/'.$img);
    		}
    		 return response()->json(1);
    	}else{
    		return response()->json(2);

    	}
    }
    public function newszhi(Request $request)
    {	

    	$res = \DB::table('gongyinews')->select('id')->where('zhi',1)->where('pid',$request->pid)->first();

    	if($res)
    	{
    		\DB::table('gongyinews')->where('id',$res->id)->update(['zhi'=>0]);
    		$da = \DB::table('gongyinews')->where('id',$request->id)->update(['zhi'=>1]);
    		if($da)
    		{
    			return response()->json(1);
    		}else
    		{
    			return response()->json(2);
    		}
    	}else
    	{
    		$da = \DB::table('gongyinews')->where('id',$request->id)->update(['zhi'=>1]);
    		if($da)
    		{
    			return response()->json(1);
    		}else
    		{
    			return response()->json(2);
    		}
    	}
    }
    public function del(Request $request){
    	$id = $request->id;
    	$da = [];
    	$da = \DB::table('gongyinews')->where('pid',$id)->get();

    	if( count($da) >0)
    	{
    		return response()->json(3);
    	}
    	$img = \DB::table('gongyi')->where('id',$id)->first()->img;

    	$res = \DB::table('gongyi')->delete($id);
    	if($res)
    	{    	

    		if(file_exists('./uploads/gongyi/img/'.$img))
    		{
    		unlink('./uploads/gongyi/img/'.$img);
    		}
    		return response()->json(1);
    	}else
    	{
    		return response()->json(2);
    	}    	
    }
}
