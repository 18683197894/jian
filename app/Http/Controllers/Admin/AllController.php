<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AllController extends Controller
{
    public function all()
    {	
    	$data = \DB::table('all')->get();
    	return view('Admin.all.all',['title'=>'包管理','data'=>$data]);
    }

    public function alladd()
    {
    	return view('Admin.all.alladd',['title'=>'添加包']);
    }

    public function alladds(Request $request)
    {
    	$data = $request->except("_token");
    	$this->validate($request,[
		    'title' => 'required|min:2|max:8',
		    'con'	=> 'required|min:20|max:150',
		    'img'=>'required|image',
 		],[
			'title.required'=>'标题不能为空',
			'title.min'=>'标题最少2位',
			'title.max'=>'标题最大8位',
			'con.required'=>'简介不能为空',
            'con.min'=>'简介最少20位',
            'con.max'=>'简介最大150位',
			'img.required'=>'未上传图片',
			'img.image'=>'请上传图片类型的文件'


		]);

		$data['time'] = time();
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
    			$request->file('img')->move('./uploads/all/img/',$fileName);
          //添加数据
    			$data['img']=$fileName;
    		}else{
    		return back()->withInput()->with(['info'=>'图片上传失败']);

    		}
    	}else{
    		return back()->withInput()->with(['info'=>'图片上传失败']);
    	}
    	
		$res = \DB::table('all')->insert($data);
    	if($res){
    		return redirect('admin/package/all')->with(['info'=>'添加成功']);
    	}else{
    		@unlink('./uploads/all/img/'.$fileName);
    		return back()->withInput()->with(['info'=>'添加失败']);

    	}
    }

    public function alledit($id)
    {
    	$data = \DB::table('all')->where('id',$id)->first();

    	return view('Admin.all.alledit',['title'=>'包编辑','data'=>$data]);
    }

    public function alledits(Request $request)
    {
    	$data = $request->except("_token");
    	$this->validate($request,[
		    'title' => 'required|min:2|max:8',
		    'con'	=> 'required|min:20|max:150',
		    'img'=>'image',
 		],[
			'title.required'=>'标题不能为空',
			'title.min'=>'标题最少2位',
			'title.max'=>'标题最大8位',
			'con.required'=>'简介不能为空',
            'con.min'=>'简介最少20位',
            'con.max'=>'简介最大150位',
			'img.image'=>'请上传图片类型的文件'

		]);

		//判断是否上传图片
       if($request->hasFile('img')){

        //判断图片是否有效
        if($request->file('img')->isValid()){
          $img = \DB::table('all')->where('id',$data['id'])->first()->img;
          //获取后缀名
          $ext=$request->file('img')->extension();
          
          //获取新名
          $fileName=time().mt_rand(10000,99999).'.'.$ext;
          //执行移动
          $request->file('img')->move('./uploads/all/img/',$fileName);

          //删除老图片
          if(file_exists('./uploads/all/img/'.$img))
          {
            unlink('./uploads/all/img/'.$img);
          }
          //添加数据
          $data['img']=$fileName;

        }else{
          return back()->with('info','图片上传失败');
        }

       }   	

       $res = \DB::table('all')->where('id',$data['id'])->update($data);
  
       if($res)
       {

       	return redirect('admin/package/all')->with(['info'=>'更新成功']);
       }
       else{
       	return back()->with(['info'=>'更新失败 数据未作更改！']);
       }
    }

    public function pei($id)
    {

    	$tit = \DB::table('all')->where('id',$id)->first()->title;
    	$data = \DB::table('pei')->where('pid',$id)->get();
    	return view('Admin.all.pei',['title'=>'包配置管理','data'=>$data,'id'=>$id,'tit'=>$tit]);
    }

    public function peiadd($id)
    {
    	return view('Admin.all.peiadd',['title'=>'添加配置','id'=>$id]);
    }

    public function peiadds(Request $request)
    {	
    	$id = $request->id;
    	$data = $request->except('_token','id');
    	$this->validate($request,[
    		'title'=>'required|min:1|max:10'
    		],[
    		'title.required'=>'标题不能为空',
    		'title.min'=>'标题最小2位最大10位',
    		'title.max'=>'标题最小2位最大10位'
    		]);
    	$data['time'] = time();
    	
    	$data['pid']=$id;
    	$data['sid'] = 0;
    	
    	$res = \DB::table('pei')->insert($data);

    	if($res)
    	{
    		return redirect('admin/package/all/pei/'.$id)->with(['info'=>'添加成功']);
    	}else
    	{
    		return back()->with(['info'=>'添加失败']);
    	}
    }

    public function peiedit($id)
    {
    	$data = \DB::table('pei')->where('id',$id)->first();
    	return view('Admin.all.peiedit',['title'=>'配置更新','data'=>$data]);
    }

    public function peiedits(Request $request)
    {
    	$data = $request->except("_token");
    	$this->validate($request,[
    		'title'=>'required|min:1|max:10'
    		],[
    		'title.required'=>'标题不能为空',
    		'title.min'=>'标题最小2位最大10位',
    		'title.max'=>'标题最小2位最大10位'
    		]);

    	$res = \DB::table('pei')->where('id',$data['id'])->update($data);
    	if($res)
    	{
    		return redirect('admin/package/all/pei/'.$data['pid'])->with(['info'=>'更新成功']);
    	}else
    	{
    		return back()->with(['info'=>'更新失败!数据未作更改！']);
    	}
    }

    public function sub($id)
    {	

    	$data = \DB::table('pei')->where('sid',$id)->get();
    	$res = \DB::table('pei')->where('id',$id)->first();
    	$tit = $res->title;
    	$pid = $res->pid;
    	$id = $id;
    	return view('Admin.all.sub',['title'=>'配置详情','data'=>$data,'pid'=>$pid,'tit'=>$tit,'id'=>$id]);
    }

    public function subadd($pid)
    {
    	return view('Admin.all.subadd',['title'=>'添加子类','pid'=>$pid]);
    }

    public function subadds(Request $request)
    {
    	$data = $request->except("_token");
    	$this->validate($request,[
    		'title'=>'required|min:1|max:10'
    		],[
    		'title.required'=>'标题不能为空',
    		'title.min'=>'标题最小2位最大10位',
    		'title.max'=>'标题最小2位最大10位'
    		]);
    	$data['time'] = time();
    	$data['pid'] = 0;

    	$p3 = $data['title'];
    	$p22 = \DB::table('pei')->where('id',$data['sid'])->first();
    	$p2 = $p22->title;

    	$p1 = \DB::table('all')->where('id',$p22->pid)->first()->title;
    	$data['path'] = $p1.'->'.$p2.'->'.$p3;
    	
    	$res = \DB::table('pei')->insert($data);
    	if($res)
    	{
    		return redirect('admin/package/all/pei/sub/'.$data['sid'])->with(['info'=>'添加成功']);
    	}else
    	{
    		return back()->with(['info'=>'添加失败！']);
    	}

    }

    public function subedit($id)
    {	

    	$data = \DB::table('pei')->where('id',$id)->first();
    	return view('Admin.all.subedit',['title'=>'子类更新','data'=>$data]);
    }

    public function subedits(Request $request)
    {
    	$data = $request->except("_token");
    	$this->validate($request,[
    		'title'=>'required|min:1|max:10'
    		],[
    		'title.required'=>'标题不能为空',
    		'title.min'=>'标题最小2位最大10位',
    		'title.max'=>'标题最小2位最大10位'
    		]);
    	$p3 = $data['title'];
    	$p22 = \DB::table('pei')->where('id',$data['sid'])->first();
    	$p2 = $p22->title;

    	$p1 = \DB::table('all')->where('id',$p22->pid)->first()->title;
    	$data['path'] = $p1.'->'.$p2.'->'.$p3;
    	$res = \DB::table('pei')->where('id',$data['id'])->update($data);
    	if($res)
    	{
    		return redirect('admin/package/all/pei/sub/'.$data['sid'])->with(['info'=>'更新成功']);
    	}else
    	{
    		return back()->with(['info'=>'更新失败！数据未更改']);
    	}
    }

    public function subdel(Request $request)
    {
    	$id = $request->id;

    	$res = \DB::table('pei')->delete($id);

    	if($res)
    	{
    		return response()->json(1);
    	}else
    	{
    		return response()->json(2);
    	}
    } 

    public function peidel(Request $request)
    {
    	$id = $request->except("_token");

    	$data = \DB::table('pei')->where('sid',$id)->get();

    	if(count($data) > 0 && $data != null )
    	{
    		return response()->json(3);
    	}
    	$res = \DB::table('pei')->delete($id);

    	if($res)
    	{
    		return response()->json(1);
    	}else
    	{
    		return response()->json(2);
    	}
    }

    public function zi($id)
    {	
    	$data = \DB::table('zi')->where('pid',$id)->get();
    	$tit = \DB::table('all')->where('id',$id)->first()->title;
    	return view('Admin.all.zi',['title'=>'子包管理','tit'=>$tit,'id'=>$id,'data'=>$data]);
    }
    public function ziadd($id)
    {
    	return view('Admin.all.ziadd',['title'=>'子包添加','pid'=>$id]);
    }
    public function ziadds(Request $request)
    {
    	$data = $request->except("_token");
    	
    	$this->validate($request,[
		    'title' => 'required|min:2|max:10',
		    'con'	=> 'required|min:10|max:120',
		    'img'=>'required|image',
		    'jia'=>'required|numeric'

 		],[
			'title.required'=>'标题不能为空',
			'title.min'=>'标题最少2位',
			'title.max'=>'标题最大8位',
			'con.required'=>'简介不能为空',
            'con.min'=>'简介最少10位',
            'con.max'=>'简介最大120位',
			'img.image'=>'请上传图片类型的文件',
			'img.required'=>'未上传图片',
			'jia.required'=>'请填写价格',
			'jia.numeric'=>'价格输入错误',	

		]);

    	if($request->hasFile('img'))
    	{
    		if($request->file('img')->isValid())
    		{ 
          //获取后缀名
    			$ext=$request->file('img')->extension();
    			
          //获取新名
    			$fileName=time().mt_rand(10000,99999).'.'.$ext;
          //执行移动
    			$request->file('img')->move('./uploads/all/img/',$fileName);
          //添加数据
    			$data['img']=$fileName;
    		}else{
    		return back()->withInput()->with(['info'=>'图片上传失败']);

    		}
    	}else{
    		return back()->withInput()->with(['info'=>'图片上传失败']);
    	}

    	$data['time'] = time();

    	$res = \DB::table('zi')->insert($data);

    	if($res)
    	{
    		return redirect('admin/package/all/zi/'.$data['pid'])->with(['info'=>'添加成功']);
    	}else
    	{
    		return back()->with(['info'=>'添加失败']);
    	}

    }

    public function ziedit($id)
    {	
    	$data = \DB::table('zi')->where('id',$id)->first();
    	return view('Admin.all.ziedit',['title'=>'子包更新','data'=>$data]);
    }

    public function ziedits(Request $request)
    {
    	$data = $request->except('_token');
    	$this->validate($request,[
		    'title' => 'required|min:2|max:10',
		    'con'	=> 'required|min:10|max:120',
		    'img'=>'image',
		    'jia'=>'required|numeric'

 		],[
			'title.required'=>'标题不能为空',
			'title.min'=>'标题最少2位',
			'title.max'=>'标题最大8位',
			'con.required'=>'简介不能为空',
            'con.min'=>'简介最少10位',
            'con.max'=>'简介最大120位',
			'img.image'=>'请上传图片类型的文件',
			'jia.required'=>'请填写价格',
			'jia.numeric'=>'价格输入错误',	

		]);

		if($request->hasFile('img')){

        //判断图片是否有效
        if($request->file('img')->isValid()){
          $img = \DB::table('zi')->where('id',$data['id'])->first()->img;
          //获取后缀名
          $ext=$request->file('img')->extension();
          
          //获取新名
          $fileName=time().mt_rand(10000,99999).'.'.$ext;
          //执行移动
          $request->file('img')->move('./uploads/all/img/',$fileName);

          //删除老图片
          if(file_exists('./uploads/all/img/'.$img))
          {
            unlink('./uploads/all/img/'.$img);
          }
          //添加数据
          $data['img']=$fileName;

        }else{
          return back()->with('info','图片上传失败');
        }
    	}
        $res = \DB::table('zi')->where('id',$data['id'])->update($data);

        if($res)
        {
        	return redirect('/admin/package/all/zi/'.$data['pid'])->with(['info'=>'更新成功']);
        }else
        {
        	return back()->with(['info'=>'更新失败！数据未更改']);
        }

	}

	public function zidel(Request $request)
	{
		$id = $request->id;

		$img = \DB::table('zi')->where('id',$id)->first();
        $pack = \DB::table('pack')->select('id','paths')->get();
        foreach( $pack as $k => $v )
        {
            $v->paths = explode('+',$v->paths);
            foreach( $v->paths as $kk => $vv )
            {
                if( $vv == $img->id )
                {
                    return response()->json(3);
                }
            }
        }
        $res = \DB::table('zi')->delete($id);
			
			if($res)
			{
				if(file_exists('./uploads/all/img/'.$img->img))
				{
					unlink('./uploads/all/img/'.$img->img);
				}
				return response()->json(1);
			}else
			{
				return response()->json(2);
			}
		
	}

	public function pack()
	{  
        $bao = \DB::table('zi')->select('id','title','jia')->get();

		$data = \DB::table('pack')->select('id','title','con','time','paths')->orderBy('time','desc')->get();
        foreach( $data  as $k => $v)
        {
            $v->paths = explode('+',$v->paths);
        }
        foreach( $data as $kk => $vv )
        {   
            $vv->jia = 0;
            $vv->path = '';
            foreach( $vv->paths as $o => $u)
            {
                foreach( $bao as $a => $b )
                {
                    if( $u == $b->id )
                    {   
                        $vv->path.='+'.$b->title;
                        $vv->jia += $b->jia;
                    }
                }
            }

            $vv->path = trim($vv->path,'+');
            
        }
        // dd($data);
		return view('Admin.all.pack',['title'=>'套餐管理','data'=>$data]);
	}

	public function packadd()
	{	
		$ji = \DB::table('zi')->select('id','title')->where('pid',1)->get();
		$chu = \DB::table('zi')->select('id','title')->where('pid',2)->get();
		$wei = \DB::table('zi')->select('id','title')->where('pid',3)->get();
		return view('Admin.all.packadd',['title'=>'添加套餐','ji'=>$ji,'wei'=>$wei,'chu'=>$chu]);
	}

	public function packadds(Request $request)
	{
		$data = $request->except('_token','ji','wei','chu','img1','img2','img3');
		$this->validate($request,[
		    'title' => 'required|min:2|max:10',
		    'con'	=> 'required|min:10|max:120',
		    'img1'=>'required|image',
		    'img2'=>'required|image',
		    'img3'=>'required|image',
		    'ji' =>'required',
		    'wei' =>'required',
		    'chu' =>'required'
		    

 		],[
			'title.required'=>'标题不能为空',
			'title.min'=>'标题最少2位',
			'title.max'=>'标题最大8位',
			'con.required'=>'简介不能为空',
            'con.min'=>'简介最少10位',
            'con.max'=>'简介最大120位',
			'img1.image'=>'请上传图片类型的文件',
			'img1.required'=>'未上传图片',
			'img2.image'=>'请上传图片类型的文件',
			'img2.required'=>'未上传图片',
			'img3.image'=>'请上传图片类型的文件',
			'img3.required'=>'未上传图片',

		]);

		if($request->hasFile('img1'))
    	{
    		if($request->file('img1')->isValid())
    		{ 
          //获取后缀名
    			$ext=$request->file('img1')->extension();
    			
          //获取新名
    			$img1=time().mt_rand(10000,99999).'.'.$ext;
          //执行移动
    			$request->file('img1')->move('./uploads/all/pack/',$img1);
          //添加数据
    			// $data['img']=$fileName;
    		}else{
    		return back()->withInput()->with(['info'=>'图片1上传失败']);

    		}
    	}else{
    		return back()->withInput()->with(['info'=>'图片1上传失败']);
    	}

    	if($request->hasFile('img2'))
    	{
    		if($request->file('img2')->isValid())
    		{ 
          //获取后缀名
    			$ext=$request->file('img2')->extension();
    			
          //获取新名
    			$img2=time().mt_rand(10000,99999).'.'.$ext;
          //执行移动
    			$request->file('img2')->move('./uploads/all/pack/',$img2);
          //添加数据
    			// $data['img2']=$fileName;
    		}else{
    		return back()->withInput()->with(['info'=>'图片2上传失败']);

    		}
    	}else{
    		return back()->withInput()->with(['info'=>'图片2上传失败']);
    	}

    	if($request->hasFile('img3'))
    	{
    		if($request->file('img3')->isValid())
    		{ 
          //获取后缀名
    			$ext=$request->file('img3')->extension();
    			
          //获取新名
    			$img3=time().mt_rand(10000,99999).'.'.$ext;
          //执行移动
    			$request->file('img3')->move('./uploads/all/pack/',$img3);
          //添加数据
    			// $data['img3']=$fileName;
    		}else{
    		return back()->withInput()->with(['info'=>'图片3上传失败']);

    		}
    	}else{
    		return back()->withInput()->with(['info'=>'图片3上传失败']);
    	}
    	// $ji = \DB::table('zi')->select('id','jia')->where('id',$request->ji)->first();
    	// $wei = \DB::table('zi')->select('id','jia')->where('id',$request->wei)->first();
    	// $chu = \DB::table('zi')->select('id','jia')->where('id',$request->chu)->first();
    	
    	$data['paths'] = $request->ji.'+'.$request->chu.'+'.$request->wei;
    	// $data['path'] = $ji->title.'+'.$chu->title.'+'.$wei->title;
    	$data['time'] = time();
    	$data['status'] = 0;
    	// $data['jia'] = $ji->jia + $wei->jia + $chu->jia;
    	$data['img'] = $img1.','.$img2.','.$img3;

    	$res = \DB::table('pack')->insert($data);
    	if($res)
    	{
    		return redirect('/admin/package/all/pack')->with(['info'=>'添加成功']);
    	}else
    	{
    		if(file_exists('./uploads/all/pack/'.$img1))
    		{
    			unlink('./uploads/all/pack/'.$img1);
    		}
    		if(file_exists('./uploads/all/pack/'.$img2))
    		{
    			unlink('./uploads/all/pack/'.$img2);
    		}
    		if(file_exists('./uploads/all/pack/'.$img3))
    		{
    			unlink('./uploads/all/pack/'.$img3);
    		}

    		return back()->with(['info'=>'添加失败']);
    	}
		
	}

	public function packdel(Request $request)
	{
		$id = $request->id;
		$data = \DB::table('pack')->where('id',$id)->first();

		$img = explode(',',$data->img );

		$res = \DB::table('pack')->delete($id);

		if($res)
		{
			foreach($img as $k => $v)
			{
				if ( file_exists('./uploads/all/pack/'.$v) )
				{
				unlink('./uploads/all/pack/'.$v);
				}
			}

			return response()->json(1);
		}else
		{
			return response()->json(2);
		}

	}

    public function packedit($id)
    {
        $data = \DB::table('pack')->where('id',$id)->first();
        $data->paths = explode('+',$data->paths);
        
        $or1 = \DB::table('zi')->where('pid',1)->get();
        $or2 = \DB::table('zi')->where('pid',2)->get();
        $or3 = \DB::table('zi')->where('pid',3)->get();

        return view('Admin.all.packedit',['title'=>'套餐编辑','data'=>$data,'or1'=>$or1,'or2'=>$or2,'or3'=>$or3]);
    }

    public function packedits(Request $request)
    {
        $data = $request->except('_token','ji','wei','chu','img1','img2','img3');
        $this->validate($request,[
            'title' => 'required|min:2|max:10',
            'con'   => 'required|min:10|max:120',
            'img1'=>'image|file',
            'img2'=>'image|file',
            'img3'=>'image|file',
            'ji' =>'required',
            'wei' =>'required',
            'chu' =>'required'
            

        ],[
            'title.required'=>'标题不能为空',
            'title.min'=>'标题最少2位',
            'title.max'=>'标题最大8位',
            'con.required'=>'简介不能为空',
            'con.min'=>'简介最少10位',
            'con.max'=>'简介最大120位',
            'img1.image'=>'请上传图片类型的文件',
            'img1.file'=>'图片上传失败',
            'img2.image'=>'请上传图片类型的文件',
            'img2.file'=>'图片上传失败',
            'img3.image'=>'请上传图片类型的文件',
            'img3.file'=>'图片上传失败',

        ]);

        if($request->hasFile('img1'))
        {
            if($request->file('img1')->isValid())
            { 
          //获取后缀名
                $ext=$request->file('img1')->extension();
                
          //获取新名
                $img1=time().mt_rand(10000,99999).'.'.$ext;
          //执行移动
                $request->file('img1')->move('./uploads/all/pack/',$img1);
          //添加数据
                // $data['img']=$fileName;
            }else{
            return back()->withInput()->with(['info'=>'图片1上传失败']);

            }
        }else{
            $img1 = false;
        }

        if($request->hasFile('img2'))
        {
            if($request->file('img2')->isValid())
            { 
          //获取后缀名
                $ext=$request->file('img2')->extension();
                
          //获取新名
                $img2=time().mt_rand(10000,99999).'.'.$ext;
          //执行移动
                $request->file('img2')->move('./uploads/all/pack/',$img2);
          //添加数据
                // $data['img2']=$fileName;
            }else{
            return back()->withInput()->with(['info'=>'图片2上传失败']);

            }
        }else{
            $img2 = false;
        }

        if($request->hasFile('img3'))
        {
            if($request->file('img3')->isValid())
            { 
          //获取后缀名
                $ext=$request->file('img3')->extension();
                
          //获取新名
                $img3=time().mt_rand(10000,99999).'.'.$ext;
          //执行移动
                $request->file('img3')->move('./uploads/all/pack/',$img3);
          //添加数据
                // $data['img3']=$fileName;
            }else{
            return back()->withInput()->with(['info'=>'图片3上传失败']);

            }
        }else{
            $img3 = false;
        }

        $data['paths'] = $request->ji.'+'.$request->chu.'+'.$request->wei;
        $res = \DB::table('pack')->select('img')->where('id',$request->id)->first();
        $img = explode(',',$res->img);
        $im = $img;
        if( $img1 != false )
        {
            $img[0] = $img1;
        }
        if( $img2 != false )
        {
            $img[1] = $img2;
        }
        if( $img3 != false )
        {
            $img[2] = $img3;
        }
        
        $data['img'] = implode(',',$img);
        
        $result = \DB::table('pack')->where('id',$request->id)->update($data);
        
        if($result)
        {
            if( $img1 != false && file_exists('./uploads/all/pack/'.$im[0]))
            {
                @unlink('./uploads/all/pack/'.$im[0]);
            }
            if( $img2 != false && file_exists('./uploads/all/pack/'.$im[1]))
            {
                @unlink('./uploads/all/pack/'.$im[1]);
            }
            if( $img3 != false && file_exists('./uploads/all/pack/'.$im[2]))
            {
                @unlink('./uploads/all/pack/'.$im[2]);
            }
            return redirect('admin/package/all/pack')->with(['info'=>'更新成功']);
        }else
        {
            if( $img3 != false && file_exists('./uploads/all/pack/'.$img1) )
            {
                @unlink('./uploads/all/pack/'.$img1);
            }
            if( $img3 != false && file_exists('./uploads/all/pack/'.$img2) )
            {
                @unlink('./uploads/all/pack/'.$img2);
            }
            if( $img3 != false && file_exists('./uploads/all/pack/'.$img3) )
            {
                @unlink('./uploads/all/pack/'.$img3);
            }

            return back()->with(['info'=>'更新失败!']);
        }
    }
}
