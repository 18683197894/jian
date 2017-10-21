<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    public function newsadd(){
    	return view('Admin.news.add',['title'=>'新闻添加']);
    }
    public function newsadds(Request $request){
        
    	$data = $request->except('_token');
		$this->validate($request,[
		    'title' => 'required|min:2|max:30',
		    'yuan'	=> 'required',
		    'leicon'=>'required|min:10|max:46',
		    'titleimg'=>'required',
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
    		return redirect('/jslmadmin/newsindex')->with(['info'=>'添加成功']);
    	}else{
    		@unlink('./uploads/news/titleimg/'.$fileName);
    		return back()->withInput()->with(['info'=>'发表失败']);

    	}

    }
    public function newsindex(Request $request){
    	
    	$num = isset($request->num) ? $request->num : 0;
    	$key = isset($request->key) ? $request->key : '';
    	if($num == 0){
    		$data = \DB::table('news')->where('title','like','%'.$key.'%')->orderBy('time','desc')->paginate(10);
    	}elseif($num==1){
    		$data = \DB::table('news')->where('lei',$num)->where('title','like','%'.$key.'%')->orderBy('time','desc')->paginate(10);
    	}elseif($num==2){
    		$data = \DB::table('news')->where('lei',$num)->where('title','like','%'.$key.'%')->orderBy('time','desc')->paginate(10);
    	}    	
    	return view('Admin.news.index',['title'=>'新闻列表','data'=>$data,'request'=>$request->all()]);
    }

    public function newsedit($id){
    	$data = \DB::table('news')->where('id',$id)->first();
    	return view('Admin.news.edit',['title'=>'编辑新闻','data'=>$data]);
    }
    public function newsedits(Request $request){
    	$data = $request->except('_token');
		$this->validate($request,[
		    'title' => 'required|min:2|max:30',
		    'yuan'	=> 'required',
		    'leicon'=>'required',
		    'content' =>'required',
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
    		return redirect('jslmadmin/newsindex')->with('info','更新成功');
    	}else{
    		return back()->with('info','更新失败 内容未更改！');
    	}
    }

    public function newsajaxshan(Request $request){

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

    public function newsajaxzhi(Request $request){
    	$res = \DB::table('news')->where('zhi',1)->first();

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
