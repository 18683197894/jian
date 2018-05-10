<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{   
    public function newsleiadd()
    {
        return view('Admin.news.newsleiadd',['title'=>'板块添加']);
    }
    public function newsleiadds(Request $request)
    {
        $data = $request->except('_token');
        $this->validate($request,[
            'title' => 'required|min:2|max:10',
            'img'=>'required|image',
            'titles' => 'required|min:2|max:60',
            'keyworlds' => 'required|min:6|max:255',
            'description' => 'required|min:10|max:255'
        ],[
            'title.required'=>'标题不能为空',
            'title.min'=>'标题最少2位',
            'title.max'=>'标题最大10位',
            'img.required'=>'未上传图片',
            'img.image'=>'请上传图片类型的文件',
            'titles.required'=>'网页标题不能为空',
            'titles.min'=>'网页标题最少2位',
            'titles.max'=>'网页标题最大60位',
            'keyworlds.required'=>'网页关键字不能为空',
            'keyworlds.min'=>'网页关键字最少6位',
            'keyworlds.max'=>'网页关键字最大255位',
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
        $data = \DB::table('newslei')->select('id','title','time','img')->orderBy('time','desc')->paginate(10);
        return view('Admin.news.newsleiindex',['title'=>'板块列表','data'=>$data]);
    }

    public function newsleiedit($id)
    {
        $data = \DB::table('newslei')->select('id','title','time','img','titles','keyworlds','description')->where('id',$id)->first();
        return view('Admin.news.leiedit',['title'=>'板块编辑','data'=>$data]);
    }

    public function newsleiedits(Request $request)
    {
        $id = $request->id;
        $data =  $request->except("_token","id");
        $this->validate($request,[
            'title' => 'required|min:2|max:10',
            'img'   => 'image',
            'titles' => 'required|min:2|max:60',
            'keyworlds' => 'required|min:6|max:255',
            'description' => 'required|min:10|max:255'
        ],[
            'title.required'=>'标题不能为空',
            'title.min'=>'标题最少2位',
            'title.max'=>'标题最大10位',
            'img.image'=>'请上传图片类型的文件',
            'titles.required'=>'网页标题不能为空',
            'titles.min'=>'网页标题最少2位',
            'titles.max'=>'网页标题最大60位',
            'keyworlds.required'=>'网页关键字不能为空',
            'keyworlds.min'=>'网页关键字最少6位',
            'keyworlds.max'=>'网页关键字最大255位',
            'description.required'=>'网页内容描述不能为空',
            'description.min'=>'网页内容描述最少10位',
            'description.max'=>'网页内容描述最大255位'
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
        $page = $request->input('page',1);

        $key = isset($request->key) ? $request->key : '';
        $path = $request->path();
        $data = \DB::table('news')->select('id','title','time','yuan','pid','click','titleimg','zhi','szhi')->where('title','like','%'.$key.'%')->where('pid',$id)->orderBy('time','desc')->paginate(10);
        $tit = \DB::table('newslei')->select('id','title')->where('id',$id)->first()->title;
        $data->appends(['key'=>$key]);
        return view('Admin.news.index',['path'=>$path,'page'=>$page,'title'=>'新闻文章管理','data'=>$data,'request'=>$request->all(),'pid'=>$id,'tit'=>$tit]);
    }

    public function newsadd($id){
    	return view('Admin.news.add',['title'=>'新闻添加','pid'=>$id]);
    }
    public function newsadds(Request $request){
        
    	$data = $request->except('_token');

		$this->validate($request,[
		    'title' => 'required|min:2|max:60',
		    'yuan'	=> 'required',
		    'leicon'=>'required|min:10|max:255',
		    'titleimg'=>'image',
		    'content' =>'required|max:50000',
            'titles' => 'required|min:2|max:60',
            'keyworlds' => 'required|min:6|max:255',
            'description' => 'required|min:10|max:255'

 		],[
			'title.required'=>'标题不能为空',
			'title.min'=>'标题最少2位',
			'title.max'=>'标题最大60位',
            'titles.required'=>'网页标题不能为空',
            'titles.min'=>'网页标题最少2位',
            'titles.max'=>'网页标题最大60位',
            'keyworlds.required'=>'网页关键字不能为空',
            'keyworlds.min'=>'网页关键字最少6位',
            'keyworlds.max'=>'网页关键字最大255位',
            'description.required'=>'网页内容描述不能为空',
            'description.min'=>'网页内容描述最少10位',
            'description.max'=>'网页内容描述最大255位',
			'yuan.required'=>'来源不能为空',
            'leicon.required'=>'简介不能为空',
            'leicon.min'=>'简介最少10位',
			'leicon.max'=>'简介最大255位',
            'titleimg.image'=>'请上传图片类型的文件',
            'content.required'=>'内容不能为空',
			'content.max'=>'内容不能超过50000字'

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
    	}else
        {
            $data['titleimg'] = 'default.jpg';
        }

        $data['content'] = preg_replace('/(width="[1-9]*") (height="[1-9]*")\/>/','$1 height="100%"/>',$data['content']);
        $data['content'] = preg_replace('/(height="[1-9]*") (width="[1-9]*")\/>/','height="100%" $2/>',$data['content']);
        $data['content'] = preg_replace('/(title=".*?") (alt=".*?"\/>)/','$1 height="100%" $2',$data['content']);
    	$data['szhi'] = 0;
        $res = \DB::table('news')->insert($data);
    	if($res){
    		return redirect('/jslmadmin/newslei/newsindex/'.$data['pid'])->with(['info'=>'添加成功']);
    	}else{
            if($data['titleimg'] != 'default.jpg')
            {
                @unlink('./uploads/news/titleimg/'.$data['titleimg']);
            }
    		return back()->withInput()->with(['info'=>'发表失败']);

    	}

    }
    

    public function newsedit(Request $request,$id){
        $page = $request->input('page',1);
        $data = \DB::table('news')->where('id',$id)->first();
        return view('Admin.news.edit',['title'=>'新闻文章更新','data'=>$data,'page'=>$page]);
    	
    }
    public function newsedits(Request $request){
    	$data = $request->except('_token','page');
		$this->validate($request,[
		    'title' => 'required|min:2|max:60',
		    'yuan'	=> 'required',
		    'leicon'=>'required|min:10|max:255',
		    'content' =>'required|max:50000',
            'titimg' => 'image',
            'titles' => 'required|min:2|max:60',
            'keyworlds' => 'required|min:6|max:255',
            'description' => 'required|min:10|max:255'
 		],[
			'title.required'=>'标题不能为空',
			'title.min'=>'标题最少2位',
			'title.max'=>'标题最大60位',
			'yuan.required'=>'来源不能为空',
			'leicon.required'=>'简介不能为空',
            'leicon.min'=>'简介最少10位',
            'leicon.max'=>'简介最大255位',
			'titles.min'=>'网页标题最少2位',
            'titles.max'=>'网页标题最大60位',
            'keyworlds.required'=>'网页关键字不能为空',
            'keyworlds.min'=>'网页关键字最少6位',
            'keyworlds.max'=>'网页关键字最大255位',
            'description.required'=>'网页内容描述不能为空',
            'description.min'=>'网页内容描述最少10位',
            'titleimg.image'=>'请上传图片类型的文件',
            'description.max'=>'网页内容描述最大255位',
            'content.required'=>'内容不能为空',
			'content.max'=>'内容不能超过50000字'
		]);
 
		
		if($request->HasFile('titleimg')){
			if($request->file('titleimg')->isValid()){
		        $img = \DB::table('news')->where('id',$request->id)->first()->titleimg;
				$ext = $request->file('titleimg')->extension();
				$newimg = time().mt_rand(100,900).'.'.$ext;
				$request->file('titleimg')->move('./uploads/news/titleimg',$newimg);
				$data['titleimg'] = $newimg;
                if($img !== 'default.jpg')
                { 
                    @unlink('./uploads/news/titleimg/'.$img);
                }
			}
		}
        $data['content'] = preg_replace('/(width="[1-9]*") (height="[1-9]*")\/>/','$1 height="100%"/>',$data['content']);
        $data['content'] = preg_replace('/(height="[1-9]*") (width="[1-9]*")\/>/','height="100%" $2/>',$data['content']);
        $data['content'] = preg_replace('/(title=".*?") (alt=".*?"\/>)/','$1 height="100%" $2',$data['content']);
    	$res = \DB::table('news')->where('id',$request->id)->update($data);

    	if($res){
    		return redirect('jslmadmin/newslei/newsindex/'.$data['pid'].'?page='.$request->input('page',1))->with('info','更新成功');
    	}else{
    		return back()->with('info','更新失败 内容未更改！');
    	}
    }

    public function newsdel(Request $request){

    	$id = $request->id;
    	$img = \DB::table('news')->where('id',$id)->first()->titleimg;
    	$res = \DB::table('news')->where('id',$id)->delete();

    	if($res){
    		$ban = \DB::table('banimg')->select('id','pid','img')->where('pid',$id)->first();
            if($ban)
            {   
                \DB::table('banig')->delete($ban->id);
                @unlink('./uploads/news/banimg/'.$ban->img);
            }
    		if( $img !== 'default.jpg'){
    			@unlink('./uploads/news/titleimg/'.$img);
    		}
    		return response()->json(1);
    	}else{
    		return response()->json(2);

    	}
    }

    public function newszhi(Request $request){
    	$res = \DB::table('news')->select('id')->where('zhi',1)->where('pid',$request->pid)->get();
        if(count($res) >= 4)
        {
        return response()->json(2);
        }else
        {
        return response()->json(1);
        }

    }

    public function newszhiindex($id)
    {
        $title = \DB::table('newslei')
                ->select('id','title')
                ->where('id',$id)
                ->first();
        if(!$title)
        {
            return back()->with(['info'=>'数据不存在']);
        }
        $data = \DB::table('news')
                ->join('banimg','news.id','=','banimg.pid')
                ->select('news.*','banimg.img as banimg')
                ->where('news.pid',$id)
                ->where('news.zhi',1)
                ->get();
        return view('Admin.news.newszhiindex',['title'=>'置顶文章管理','titles'=>$title,'data'=>$data]);
    }

    public function ban($id)
    {
        $data = \DB::table('newsban')
        ->select('id','pid','title','con')
        ->where('pid',$id)
        ->first();
        return view('Admin.news.banadd',['title'=>'置顶文章介绍修改','data'=>$data,'pid'=>$id]);
    }

    public function bans(request $request)
    {
        $data = $request->except("_token",'ors');
        $this->validate($request,[
            'title' => 'required|min:4|max:20',
            'con' => 'required|min:4|max:255'
            ],[
            'title.required' => '标题不能为空',
            'title.min' => '标题长度最小4位最大20位',
            'title.max' => '标题长度最小4位最大20位',
            'con.required' => '介绍不能为空',
            'con.min' => '介绍长度最小4位最大20位',
            'con.max' => '介绍长度最小4位最大20位'
            ]);

        if($request->ors == 'add')
        {
            $res = \DB::table('newsban')->insert($data);
            if($res)
            {
                return redirect('/jslmadmin/newslei/newszhiindex/'.$data['pid'])->with(['info'=>'置顶板块介绍修改成功']);
            }else
            {
                return back()->with(['info'=>'数据库写入失败']);
            }
        }
        if($request->ors == 'edit')
        {
            $res = \DB::table('newsban')->update($data);
            
                return redirect('/jslmadmin/newslei/newszhiindex/'.$data['pid'])->with(['info'=>'置顶板块介绍修改成功']);
        }
    }

    public function zhiadd($id)
    {
        $data = \DB::table('news')
                ->select('id','zhi','pid','title')
                ->where('id',$id)
                ->first();

        if(!$data || $data->zhi == 1)
        {
            return back()->with(['info'=>'数据不存在或已置顶']);
        }

        return view('Admin.news.zhiadd',['title'=>'置顶文章','data'=>$data]);

    }

    public function zhiadds(Request $request)
    {
        $this->validate($request,[
            'img'=>'required|image'
            ],[
            'img.required' => '未上传图片',
            'img.image'    => '请上传图片类型的文件'
            ]);

        if($request->hasFile('img'))
        {
            if($request->file('img')->isValid())
            {
                $hou = $request->file('img')->extension();
                $newimg = date('YmdHis',time()).rand(1000,9999).'.'.$hou;
                $request->file('img')->move('./uploads/news/banimg',$newimg);
                if(file_exists('./uploads/news/banimg/'.$newimg))
                {
                    $a = \DB::table('banimg')->insert(['pid'=>$request->id,'img'=>$newimg]);
                    $b = \DB::table('news')->where('id',$request->id)->update(['zhi'=>1]);
                    if($a && $b)
                    {
                        return redirect('jslmadmin/newslei/newsindex/'.$request->pid)->with(['info'=>'置顶成功']);
                    }else
                    {
                        \DB::table('banimg')->delete($a);
                        \DB::table('news')->where('id',$request->id)->update(['zhi',0]);
                        return back()->with(['info'=>'置顶失败！数据库写入失败。']);

                    }

                }else
                {
                    return back()->with(['info'=>'图片移动失败！']);

                }
            }else
            {
            return back()->with(['info'=>'图片上传失败！']);
            }
        }else
        {
            return back()->with(['info'=>'未上传图片']);
        }
       
    }

    public function zhiedit($id)
    {
        $data = \DB::table('news')
                ->select('id','zhi','pid','title')
                ->where('id',$id)
                ->first();

        if(!$data || $data->zhi == 0)
        {
            return back()->with(['info'=>'数据不存在或未置顶']);
        }

        return view('Admin.news.zhiedit',['title'=>'置顶文章修改','data'=>$data]);
    }

    public function zhiedits(Request $request)
    {
        $this->validate($request,[
            'img'=>'required|image'
            ],[
            'img.required' => '未上传图片',
            'img.image'    => '请上传图片类型的文件'
            ]);
            if($request->hasFile('img'))
            {
                if($request->file('img')->isValid())
                {

                    $res = \DB::table('banimg')->select('id','img')->where('pid',$request->id)->first();
                    if($res)
                    {

                        $hou = $request->file('img')->extension();
                        $newname = date('YmdHis',time()).rand(1111,9999).'.'.$hou;
                        $request->file('img')->move('./uploads/news/banimg',$newname);

                        if(file_exists('./uploads/news/banimg/'.$newname))
                        {
                            $ors = \DB::table('banimg')->where('id',$res->id)->update(['img'=>$newname]);
                            if($ors)
                            {
                                @unlink('./uploads/news/banimg/'.$res->img);
                                return redirect('/jslmadmin/newslei/newszhiindex/'.$request->pid)->with(['info'=>'更新成功']);

                            }else
                            {   
                                @unlink('./uploads/news/banimg/'.$newname);
                                return back()->with(['info'=>'数据库写入失败']);                                
                            }
                        }else
                        {
                            return back()->with(['info'=>'图片移入失败']);
                        }

                    }else
                    {   
                        \DB::table('news')->where('id',$request->id)->update(['zhi'=>0]);
                        return back()->with(['info'=>'数据不存在']);
                    }

                }else
                {
                    return back()->with(['info'=>'图片上传失败']);
                }
            }else
            {
                return back()->with(['info'=>'未上传图片']);
            }
    }

    public function zhidel(Request $request)
    {
        $res = \DB::table('news')->select('id','zhi','pid')->where('id',$request->id)->where('zhi',1)->first();
        if($res)
        {
            $img = \DB::table('banimg')->select('id','img')->where('pid',$res->id)->first();
            if($img)
            {   
                
                
                \DB::table('news')->where('id',$res->id)->update(['zhi'=>0]);
                \DB::table('banimg')->delete($img->id);
                @unlink('./uploads/news/banimg/'.$img->img);
                return response()->json(1);

            }else
            {   
                
                \DB::table('news')->where('id',$res->id)->update(['zhi'=>0]);
                return response()->json(1);
            }
        }else
        {
            return response()->json(3);
        }
    }

    public function szhiadd(Request $request)
    {
        $id = $request->id;
        $ors = $request->ors;
        
        if($ors == 0)
        {   
            $count = \DB::table('news')->select('id')->where('szhi',1)->get();
            if($count->count() >= 8)
            {
                return response()->json(3);
            }
            $res = \DB::table('news')->where('id',$id)->update(['szhi'=>1]);
            if($res)
            {
                return response()->json(1);
            }else
            {
                return response()->json(2);
            }
        }
        if($ors == 1)
        {
            $res = \DB::table('news')->where('id',$id)->update(['szhi'=>0]);
            if($res)
            {
                return response()->json(1);
            }else
            {
                return response()->json(2);
            }
        }
    }

    public function szhiindex(Request $request)
    {   
        $path = $request->input('path',null);
        $data = \DB::table('news')->select('id','title','time','yuan','pid','click','titleimg','zhi','szhi')->where('szhi',1)->get();
        return view('Admin.news.szhiindex',['path'=>$path,'data'=>$data,'title'=>'首页置顶管理']);
    }

}

