<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CaseController extends Controller
{
    public function add()
    {
    	return view('Admin.case.add',['title'=>'添加案例']);

    }

    public function adds(Request $request)
    {
    	$data = $request->except("_token");
    	$this->validate($request,[
		    'title' => 'required|min:2|max:20',
            'titles' => 'required|min:2|max:20',
            'keyworlds' => 'required|min:6|max:255',
            'description' => 'required|min:10|max:255'
 		],[
			'title.required'=>'标题不能为空',
			'title.min'=>'标题最少2位',
			'title.max'=>'标题最大20位',
            'titles.required'=>'网页标题不能为空',
            'titles.min'=>'网页标题最少2位',
            'titles.max'=>'网页标题最大20位',
            'keyworlds.required'=>'网页关键字不能为空',
            'keyworlds.min'=>'网页关键字最少6位',
            'keyworlds.max'=>'网页关键字最大255位',
            'description.required'=>'网页内容描述不能为空',
            'description.min'=>'网页内容描述最少10位',
            'description.max'=>'网页内容描述最大255位'
		]); 

    $data['time'] = time();
		$data['uptime'] = $data['time'];
		$data['or'] = 0;
		$data['ors'] = '-> 准备开工';
		$res = \DB::table('case')->insert($data);
    	if($res)
    	{
    		return redirect('/admin/case/index')->with(['info'=>'添加成功']);
    	}else
    	{	
    		
    		return back()->withInput()->with(['info'=>'添加失败！请重试']);
    	}
    }

    public function index(Request $request)
    {   
    	$key = isset($request->key) ? $request->key : '';
    	$page = $request->input('page',1);
    	$data = \DB::table('case')->where('title','like','%'.$key.'%')->select('id','title','huxing','fengge','yusuan','or','time')->orderBy('time','desc')->paginate(13);
    	
    	return view('Admin.case.index',['title'=>'案例管理','data'=>$data,'request'=>$request->all(),'page'=>$page]);
    }

    function case_edit(Request $request,$id)
    {   
        $page = $request->input('page',1);

        $data = \DB::table('case')->select('id','title','huxing','fengge','yusuan','titles','keyworlds','description')->where('id',$id)->first();
        if(!$data)
        {
            return redirect('/admin/case/index?page='.$page)->with('info','数据不存在!');
        }

        return view('Admin.case.case_edit',['title'=>'案例修改','data'=>$data,'page'=>$page]);

    }

    function case_edits(Request $request)
    {
        $data = $request->except('_token','page');
        $this->validate($request,[
            'title' => 'required|min:2|max:20',
            'titles' => 'required|min:2|max:20',
            'keyworlds' => 'required|min:6|max:255',
            'description' => 'required|min:10|max:255'
        ],[
            'title.required'=>'标题不能为空',
            'title.min'=>'标题最少2位',
            'title.max'=>'标题最大20位',
            'titles.required'=>'网页标题不能为空',
            'titles.min'=>'网页标题最少2位',
            'titles.max'=>'网页标题最大20位',
            'keyworlds.required'=>'网页关键字不能为空',
            'keyworlds.min'=>'网页关键字最少6位',
            'keyworlds.max'=>'网页关键字最大255位',
            'description.required'=>'网页内容描述不能为空',
            'description.min'=>'网页内容描述最少10位',
            'description.max'=>'网页内容描述最大255位'
        ]); 
        $data['uptime'] = time();
        $res = \DB::table('case')->where('id',$data['id'])->update($data);
        if($res)
        {
            return redirect('/admin/case/index?page='.$request->input('page',1))->with(['info'=>'修改成功！','edit_id'=>$data['id']]);
        }else
        {
            return back()->with('info','修改失败！');
        }
        dd($data);
    }

    public function edit($id)
    {	
    	$data = \DB::table('case')->where('id',$id)->first();
    	if($data->or == 4)
    	{
    	return view('Admin.case.upd',['title'=>'进度更新','data'=>$data]);

    	}
    	return view('Admin.case.edit',['title'=>'进度更新','data'=>$data]);
    }
    public function edits(Request $request)
    {
    	$data = $request->except("_token","img1","img2","img3","img4","img5","img6");
    	$this->validate($request,[
		   
		    'img1'=>'required|image|file',
		    'img2'=>'image|file',
		    'img3'=>'image|file',
		    'img4'=>'image|file',
        'img5'=>'image|file',
		    'img6'=>'image|file'
 		],[
			'img1.required'=>'未上传图片(效果图1)',
			'img1.image'=>'请上传图片类型的文件(效果图1)',
			'img2.image'=>'请上传图片类型的文件(效果图2)',
			'img3.image'=>'请上传图片类型的文件(效果图3)',
			'img4.image'=>'请上传图片类型的文件(效果图4)',
			'img5.image'=>'请上传图片类型的文件(效果图5)',
			'img6.image'=>'请上传图片类型的文件(效果图6)',
			'img1.file'=>'上传失败（效果图1）',
			'img2.file'=>'上传失败（效果图2）',
			'img3.file'=>'上传失败（效果图3）',
			'img4.file'=>'上传失败（效果图4）',
      'img5.file'=>'上传失败（效果图5）',
			'img6.file'=>'上传失败（效果图5）'
            
		]); 

    	switch ($data['or']) {
    		case 0:
    			$data['or'] = 1;
    			$data['ors'] = '准备开工 -> 水电阶段';	
    		break;

    		case 1:
    			$data['or'] = 2;
    			$data['ors'] = '水电阶段 -> 瓦木阶段';	
    		break;
    		case 2:
    			$data['or'] = 3;
    			$data['ors'] = '瓦木阶段 -> 油漆阶段';	
    		break;
    		case 3:
    			$data['or'] = 4;
    			$data['ors'] = '油漆阶段 -> 竣工阶段';	
    		break;
    	}
    	$data['img'.$data['or']] = array();
		for($i = 1; $i <= 6; $i++)
		{
			if($request->hasFile('img'.$i))
    	{
    		if($request->file('img'.$i)->isValid())
    		{ 
          //获取后缀名
    			$ext=$request->file('img'.$i)->extension();
    			
          //获取新名
    			$fileName=time().mt_rand(10000,99999).'.'.$ext;
          //执行移动
    			$request->file('img'.$i)->move('./uploads/case/img/',$fileName);
          //添加数据
    			
    			 array_push($data['img'.$data['or']],$fileName);
    		}
    	}
		}
		$img = $data['img'.$data['or']];
		$data['img'.$data['or']] = implode(",",$data['img'.$data['or']]);
		
		$res = \DB::table('case')->where('id',$data['id'])->update($data);

       if($res)
       {
       	return redirect('admin/case/index')->with(['info'=>'更新成功']);
       }else
       {
       	foreach ($img as $k => $v) 
       	{
       		unlink("./uploads/case/img/".$v);
       	}
       	return back()->with(['info'=>'更新失败!']);
       }
    }

        public function upds(Request $request)
        {
            
            $this->validate($request,[
           
            'suoimg'=>'image|file',
            'custom_title1'=>'required|max:30',
            'custom_img1'=>'required|image|file',
            
            ],[
            'suoimg.image'=>'请上传图片类型的文件(展示图片)',
            'suoimg.file'=>'上传失败（展示图片）',
            'custom_title1.required'=>'未上传图片标题(效果图1)',
            'custom_title1.max'=>'图片标题最大30位(效果图1)',
            'custom_img1.required'=>'未上传图片（效果图1）',
            'custom_img1.image'=>'请上传图片类型的文件(效果图1)',
            'custom_img1.file'=>'上传失败(效果图1)'
            ]); 

            $data['effect1'] = '';
            $data['effect2'] = '';
            $data['id'] = $request->id;
            if($request->hasFile('suoimg'))
            {
                 if($request->file('suoimg')->isValid())
                 { 
                  //获取后缀名
                     $ext=$request->file('suoimg')->extension();
                        
                  //获取新名
                     $fileName=time().mt_rand(10000,99999).'.'.$ext;
                  //执行移动
                     $request->file('suoimg')->move('./uploads/case/img/',$fileName);
                  //添加数据
                        $data['suoimg']=$fileName;
                 }
            }

            for($i=1; $i<=8; $i++)
            {
                if($request->hasFile('custom_img'.$i) && $request->input('custom_title'.$i))
                {
                     if($request->file('custom_img'.$i)->isValid())
                     { 
                      //获取后缀名
                         $ext=$request->file('custom_img'.$i)->extension();
                            
                      //获取新名
                         $fileName=time().mt_rand(10000,99999).'.'.$ext;
                      //执行移动
                         $request->file('custom_img'.$i)->move('./uploads/case/img/',$fileName);
                      //添加数据
                            $data['effect1'] .=','.$request->input('custom_title'.$i);
                            $data['effect2'] .= ','.$fileName;
                     }
                }
            }

            $data['effect1'] = substr($data['effect1'],1);
            $data['effect2'] = substr($data['effect2'],1);
            $data['or'] = 5;
            $data['ors'] = '已竣工';
            $res = \DB::table('case')->where('id',$data['id'])->update($data);
            if($res)
            {
                 return redirect('admin/case/index?page='.$request->input('page',1))->with(['info'=>'更新成功']);
            }else
            {    
                if(isset($data['suoimg']))
                {
                    if(file_exists('./uploads/case/img/'.$data['suoimg']))
                    {
                        @unlink('./uploads/case/img/'.$data['suoimg']);
                    }
                }
                
                $imgs = explode(',',$data['effect2']);
                foreach($imgs as $k => $v)
                {
                    if(file_exists('./uploads/case/img/'.$v))
                    {
                        @unlink('./uploads/case/img/'.$v);
                    }
                }
                                
                return back()->with(['info'=>'更新失败!']);
           }
        }
  //   public function upds(Request $request)
  //   {
  //   	$data = $request->except("_token","keting","woshi","cufang","xishou","ciwo","yangtai","shufang","ertong","laor","custom_img1","custom_img2","custom_title1","custom_title2");
  //   	$this->validate($request,[
		   
		//     'keting'=>'required|image|file',
		//     'woshi'=>'required|image|file',
		//     'cufang'=>'required|image|file',
  //           'xishou'=>'required|image|file',
  //           'ciwo'=>'image|file',
  //           'yangtai'=>'image|file',
  //           'shufang'=>'image|file',
  //           'ertong'=>'image|file',
  //           'laor'=>'image|file',
		//     'suoimg'=>'image|file',
  //           'custom_title1'=>'max:10',
  //           'custom_title2'=>'max:10',
  //           'custom_img1'=>'image|file',
  //           'custom_img2'=>'image|file',
		    
 	// 	],[
		// 	'keting.required'=>'未上传图片(客厅)',
		// 	'keting.image'=>'请上传图片类型的文件(客厅)',
		// 	'keting.file'=>'上传失败（客厅）',
		// 	'woshi.required'=>'未上传图片(卧室)',
		// 	'woshi.image'=>'请上传图片类型的文件(卧室)',
		// 	'woshi.file'=>'上传失败（卧室）',
		// 	'cufang.required'=>'未上传图片(厨房)',
		// 	'cufang.image'=>'请上传图片类型的文件(厨房/餐厅)',
		// 	'cufang.file'=>'上传失败（厨房/餐厅）',
		// 	'xishou.required'=>'未上传图片(洗手间)',
		// 	'xishou.image'=>'请上传图片类型的文件(洗手间)',
		// 	'ciwo.file'=>'上传失败(次卧)',
  //           'ciwo.image'=>'请上传图片类型的文件(次卧)',
  //           'yangtai.file'=>'上传失败(阳台)',
  //           'yangtai.image'=>'请上传图片类型的文件(阳台)',
  //           'shufang.file'=>'上传失败(书房)',
  //           'shufang.image'=>'请上传图片类型的文件(书房)',
  //           'ertong.file'=>'上传失败(儿童房)',
  //           'ertong.image'=>'请上传图片类型的文件(儿童房)',
  //           'laor.file'=>'上传失败(老人房)',
  //           'laor.image'=>'请上传图片类型的文件(老人房)',
  //           'custom_img1.file'=>'上传失败(自定义效果图1)',
  //           'custom_img1.image'=>'请上传图片类型的文件(自定义效果图1)',
  //           'custom_img2.file'=>'上传失败(自定义效果图2)',
  //           'custom_img2.image'=>'请上传图片类型的文件(自定义效果图2)',
  //           'custom_title1.max'=>'自定义效果图1 标题最大10位',
  //           'custom_title2.max'=>'自定义效果图2 标题最大10位'
            
		// ]); 
        
		// if($request->hasFile('suoimg'))
  //   	{
  //   		if($request->file('suoimg')->isValid())
  //   		{ 
  //         //获取后缀名
  //   			$ext=$request->file('suoimg')->extension();
    			
  //         //获取新名
  //   			$fileName=time().mt_rand(10000,99999).'.'.$ext;
  //         //执行移动
  //   			$request->file('suoimg')->move('./uploads/case/img/',$fileName);
  //         //添加数据
  //               $data['suoimg']=$fileName;
  //   		}
  //   	}

  //       if($request->hasFile('keting'))
  //       {
  //           if($request->file('keting')->isValid())
  //           { 
  //         //获取后缀名
  //               $ext=$request->file('keting')->extension();
                
  //         //获取新名
  //               $fileName=time().mt_rand(10000,99999).'.'.$ext;
  //         //执行移动
  //               $request->file('keting')->move('./uploads/case/img/',$fileName);
  //         //添加数据
  //               $data['effect1']='客厅';
  //               $data['effect2']=$fileName;
  //           }
  //       }

  //   	if($request->hasFile('woshi'))
  //   	{
  //   		if($request->file('woshi')->isValid())
  //   		{ 
  //         //获取后缀名
  //   			$ext=$request->file('woshi')->extension();
    			
  //         //获取新名
  //   			$fileName=time().mt_rand(10000,99999).'.'.$ext;
  //         //执行移动
  //   			$request->file('woshi')->move('./uploads/case/img/',$fileName);
  //         //添加数据
  //   			$data['effect1'] .=',卧室';
  //               $data['effect2'] .=','.$fileName;
  //   		}
  //   	}

  //   	if($request->hasFile('cufang'))
  //   	{
  //   		if($request->file('cufang')->isValid())
  //   		{ 
  //         //获取后缀名
  //   			$ext=$request->file('cufang')->extension();
    			
  //         //获取新名
  //   			$fileName=time().mt_rand(10000,99999).'.'.$ext;
  //         //执行移动
  //   			$request->file('cufang')->move('./uploads/case/img/',$fileName);
  //         //添加数据
  //   			$data['effect1'] .=',厨房/餐厅';
  //               $data['effect2'] .=','.$fileName;
  //   		}
  //   	}

  //   	if($request->hasFile('xishou'))
  //   	{
  //   		if($request->file('xishou')->isValid())
  //   		{ 
  //         //获取后缀名
  //   			$ext=$request->file('xishou')->extension();
    			
  //         //获取新名
  //   			$fileName=time().mt_rand(10000,99999).'.'.$ext;
  //         //执行移动
  //   			$request->file('xishou')->move('./uploads/case/img/',$fileName);
  //         //添加数据
  //   			$data['effect1'] .=',洗手间';
  //               $data['effect2'] .=','.$fileName;
  //   		}
  //   	}

  //       if($request->hasFile('ciwo'))
  //       {
  //           if($request->file('ciwo')->isValid())
  //           { 
  //         //获取后缀名
  //               $ext=$request->file('ciwo')->extension();
                
  //         //获取新名
  //               $fileName=time().mt_rand(10000,99999).'.'.$ext;
  //         //执行移动
  //               $request->file('ciwo')->move('./uploads/case/img/',$fileName);
  //         //添加数据
  //               $data['effect1'] .=',次卧';
  //               $data['effect2'] .=','.$fileName;
  //           }
  //       }
  //       if($request->hasFile('yangtai'))
  //       {
  //           if($request->file('yangtai')->isValid())
  //           { 
  //         //获取后缀名
  //               $ext=$request->file('yangtai')->extension();
                
  //         //获取新名
  //               $fileName=time().mt_rand(10000,99999).'.'.$ext;
  //         //执行移动
  //               $request->file('yangtai')->move('./uploads/case/img/',$fileName);
  //         //添加数据
  //               $data['effect1'] .=',阳台';
  //               $data['effect2'] .=','.$fileName;
  //           }
  //       } 
  //       if($request->hasFile('shufang'))
  //       {
  //           if($request->file('shufang')->isValid())
  //           { 
  //         //获取后缀名
  //               $ext=$request->file('shufang')->extension();
                
  //         //获取新名
  //               $fileName=time().mt_rand(10000,99999).'.'.$ext;
  //         //执行移动
  //               $request->file('shufang')->move('./uploads/case/img/',$fileName);
  //         //添加数据
  //               $data['effect1'] .=',书房';
  //               $data['effect2'] .=','.$fileName;
  //           }
  //       }

  //       if($request->hasFile('ertong'))
  //       {
  //           if($request->file('ertong')->isValid())
  //           { 
  //         //获取后缀名
  //               $ext=$request->file('ertong')->extension();
                
  //         //获取新名
  //               $fileName=time().mt_rand(10000,99999).'.'.$ext;
  //         //执行移动
  //               $request->file('ertong')->move('./uploads/case/img/',$fileName);
  //         //添加数据
  //               $data['effect1'] .=',儿童房';
  //               $data['effect2'] .=','.$fileName;
  //           }
  //       }
  //       if($request->hasFile('laor'))
  //       {
  //           if($request->file('laor')->isValid())
  //           { 
  //         //获取后缀名
  //               $ext=$request->file('laor')->extension();
                
  //         //获取新名
  //               $fileName=time().mt_rand(10000,99999).'.'.$ext;
  //         //执行移动
  //               $request->file('laor')->move('./uploads/case/img/',$fileName);
  //         //添加数据
  //               $data['effect1'] .=',老人房';
  //               $data['effect2'] .=','.$fileName;
  //           }
  //       }

  //       if($request->hasFile('custom_img1'))
  //       {
  //           if($request->file('custom_img1')->isValid())
  //           { 
  //               $name = $request->input('custom_title1','效果图');
  //         //获取后缀名
  //               $ext=$request->file('custom_img1')->extension();
                
  //         //获取新名
  //               $fileName=time().mt_rand(10000,99999).'.'.$ext;
  //         //执行移动
  //               $request->file('custom_img1')->move('./uploads/case/img/',$fileName);
  //         //添加数据
  //               $data['effect1'] .=','.$name;
  //               $data['effect2'] .=','.$fileName;
  //           }
  //       }
  //       if($request->hasFile('custom_img2'))
  //       {
  //           if($request->file('custom_img2')->isValid())
  //           { 
  //               $name = $request->input('custom_title2','效果图');
  //         //获取后缀名
  //               $ext=$request->file('custom_img2')->extension();
                
  //         //获取新名
  //               $fileName=time().mt_rand(10000,99999).'.'.$ext;
  //         //执行移动
  //               $request->file('custom_img2')->move('./uploads/case/img/',$fileName);
  //         //添加数据
  //               $data['effect1'] .=','.$name;
  //               $data['effect2'] .=','.$fileName;
  //           }
  //       }

  //   	$data['or'] = 5;
  //   	$data['ors'] = '已竣工';
        
  //   	$res = \DB::table('case')->where('id',$data['id'])->update($data);

  //   	if($res)
  //      	{
  //      		return redirect('admin/case/index')->with(['info'=>'更新成功']);
  //      	}else
  //      	{
 	// 		if(file_exists('./uploads/case/img/'.$data['keting']))
 	// 		{
 	// 			unlink('./uploads/case/img/'.$data['keting']);
 	// 		}
 			 			
 	// 		if(file_exists('./uploads/case/img/'.$data['woshi']))
 	// 		{
 	// 			unlink('./uploads/case/img/'.$data['woshi']);
 	// 		} 			
 	// 		if(file_exists('./uploads/case/img/'.$data['cufang']))
 	// 		{
 	// 			unlink('./uploads/case/img/'.$data['cufang']);
 	// 		}
 	// 		if(file_exists('./uploads/case/img/'.$data['xishou']))
 	// 		{
 	// 			unlink('./uploads/case/img/'.$data['xishou']);
 	// 		}
  //      	return back()->with(['info'=>'更新失败!']);
  //      }
  //   }

    public function del(Request $request)
    {
    	$id = $request->id;

    	$data = \DB::table('case')->where('id',$id)->first();
    	$arr = array();
        if($data->suoimg !== null)
        {
            @unlink('./uploads/case/img/'.$data->suoimg);
        }

    	if($data->img1 != null)
    	{	
    		
    		$img1 = explode(',',$data->img1);
            $arr = array_merge($arr,$img1);
    	}
        if($data->img2 != null)
        {   
            
            $img2 = explode(',',$data->img2);
            $arr = array_merge($arr,$img2);
        }
        if($data->img3 != null)
        {   
            
            $img3 = explode(',',$data->img3);
            $arr = array_merge($arr,$img3);
        }
        if($data->img4 != null)
        {   
            
            $img4 = explode(',',$data->img4);
            $arr = array_merge($arr,$img4);
        }
    	
        if( count($arr) > 0 )
        {
            foreach ($arr as $k => $v) 
            {
                if(file_exists('./uploads/case/img/'.$v))
                {
                    @unlink('./uploads/case/img/'.$v);
                }
            }  
        }

    			
        if($data->effect2 != null)
        {   
            $da = explode(',',$data->effect2);
            foreach ($da as $Kk => $vv) 
            {
                if(file_exists('./uploads/case/img/'.$vv))
                {
                    @unlink('./uploads/case/img/'.$vv);
                }
            }
        }

        

    	$res = \DB::table('case')->delete($id);

    	if($res)
    	{
    		return response()->json(1);
    	}else
    	{
    		return response()->json(2);
    	}
    }

    public function tedit(Request $request,$id)
    {
        $data = \DB::table('case')->select('id','title','or')->where('id',$id)->first();
        if(!$data || $data->or >=5)
        {
            return redirect('/admin/case/index')->with(['info'=>'数据不存在！']);
        }
        $data->ors = '跳过进度更新';
        $page = $request->input('page',1);
        return view('Admin.case.upd',['title'=>'更新','data'=>$data,'page'=>$page]);
    }

}
