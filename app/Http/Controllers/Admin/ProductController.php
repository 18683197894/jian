<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function productindex()
    {	

    	$data = \DB::table('product_l')
    		->select('id','title','time','pid','level','uptime','titleimg')
    		->where('level',1)
    		->orderBy('time')
    		->get();
    	foreach($data as $k => $v)
    	{
    		if($v->titleimg)
    		{
    			$v->imgs = explode(',',$v->titleimg);
    		}
    	}
    	return view('Admin.product.productindex',['title'=>'产品管理','data'=>$data]);
    }
    public function productadd()
    {	
    	return view('Admin.product.productadd',['title'=>'产品添加']);
    }

    public function productadds(Request $request)
    {	
    	$this->validate($request,[
    		'title' => 'required|max:10',
    		'titleimg1' =>'required|image|file',
    		'titleimg2' =>'required|image|file'
    		],[
    		'title.required' => '标题不能为空',
    		'title.max' => '标题最大10位',
    		'titleimg1.required' => '未上传图片（图标）',
    		'titleimg1.image' => '请上传图片类型的文件（图标）',
    		'titleimg1.file' => '图片上传失败（图标）',
    		'titleimg2.required' => '未上传图片（反转图标）',
    		'titleimg2.image' => '请上传图片类型的文件（反转图标）',
    		'titleimg2.file' => '图片上传失败（反转图标）'

    		]);

    	$imgs = '';
    	$fileName1 = '';
    	$fileName2 = '';
    	if($request->hasFile('titleimg1'))
    	{
    		if($request->file('titleimg1')->isValid())
    		{ 
          //获取后缀名
    			$ext=$request->file('titleimg1')->extension();
    			
          //获取新名
    			$fileName1=time().mt_rand(10000,99999).'.'.$ext;
          //执行移动
    			$request->file('titleimg1')->move('./uploads/product/img/',$fileName1);
          //添加数据
                $imgs=$fileName1;
    		}else
    		{
    			return back()->with('info','图片上传失败！');
    		}
    	}else
    	{
    		return back()->with('info','图片上传失败！');
    	}

    	if($request->hasFile('titleimg2'))
    	{
    		if($request->file('titleimg2')->isValid())
    		{ 
          //获取后缀名
    			$ext=$request->file('titleimg2')->extension();
    			
          //获取新名
    			$fileName2=time().mt_rand(10000,99999).'.'.$ext;
          //执行移动
    			$request->file('titleimg2')->move('./uploads/product/img/',$fileName2);
          //添加数据
                $imgs.=','.$fileName2;
    		}else
    		{	
    			@unlink('./uploads/product/img/'.$fileName1);
    			return back()->with('info','图片上传失败！');
    		}
    	}else
    	{
    		@unlink('./uploads/product/img/'.$fileName1);
    		return back()->with('info','图片上传失败！');
    	}

    	$data['titleimg'] = $imgs;
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
    		@unlink('./uploads/product/img/'.$fileName1);
    		@unlink('./uploads/product/img/'.$fileName2);
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
    		'title' => 'required|max:10',
    		'titleimg1' =>'image|file',
    		'titleimg2' =>'image|file'
    		],[
    		'title.required' => '标题不能为空',
    		'title.max' => '标题最大10位',
    		'titleimg1.image' => '请上传图片类型的文件（图标）',
    		'titleimg1.file' => '图片上传失败（图标）',
    		'titleimg2.image' => '请上传图片类型的文件（反转图标）',
    		'titleimg2.file' => '图片上传失败（反转图标）'

    		]);
    	$imgs = \DB::table('product_l')->select('titleimg')->where('id',$request->id)->first()->titleimg;
    	$img1 = substr($imgs,0,strpos($imgs,','));
    	$img2 = substr($imgs,strpos($imgs,',')+1);
    	$delimg1 = $img1;
    	$delimg2 = $img2;
    	$init_1 = false;
    	$init_2 = false;
    	if($request->hasFile('titleimg1'))
    	{
    		if($request->file('titleimg1')->isValid())
    		{ 
          //获取后缀名
    			$ext=$request->file('titleimg1')->extension();
    			
          //获取新名
    			$fileName1=time().mt_rand(10000,99999).'.'.$ext;
          //执行移动
    			$request->file('titleimg1')->move('./uploads/product/img/',$fileName1);
          //添加数据
                $img1 = $fileName1;
                $init_1 = true;
    		}
    	}

    	if($request->hasFile('titleimg2'))
    	{
    		if($request->file('titleimg2')->isValid())
    		{ 
          //获取后缀名
    			$ext=$request->file('titleimg2')->extension();
    			
          //获取新名
    			$fileName2=time().mt_rand(10000,99999).'.'.$ext;
          //执行移动
    			$request->file('titleimg2')->move('./uploads/product/img/',$fileName2);
          //添加数据
                $img2 = $fileName2;
                $init_2 = true;
    		}
    	}
    	$data['titleimg'] = $img1.','.$img2;
    	$data['title'] = $request->input('title');
    	$data['uptime'] = time();
    	$res = \DB::table('product_l')->where('id',$request->input('id'))->update($data);
    	if($res)
    	{	
    		if($init_1)
    		{
    			@unlink('./uploads/product/img/'.$delimg1);
    		}
    		if($init_2)
    		{
    			@unlink('./uploads/product/img/'.$delimg2);
    		}
    		return redirect('/newpro/index/package/productindex')->with('info','更新成功！');
    	}else
    	{	
    		if($init_1)
    		{
    			@unlink('./uploads/product/img/'.$fileName1);
    		}
    		if($init_2)
    		{
    			@unlink('./uploads/product/img/'.$fileName2);
    		}
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
    	$img = \DB::table('product_l')->select('titleimg')->where('id',$id)->first()->titleimg;
    	$res = \DB::table('product_l')->delete($id);
    	if($res)
    	{	
    		if($img)
    		{
    			$imgs = explode(',',$img);
    			foreach ($imgs as $key => $value) 
    			{
    				@unlink('./uploads/product/img/'.$value);
    			}
    		}
    		return response()->json(1);
    	}else{
    		return response()->json(2);
    	}
    }



    public function goodsindex(Request $request,$id)
    {	
        $page = $request->input('page',1);
    	$pdata = \DB::table('product_l')->select('id','pid','title')->where('id',$id)->first();
    	if(!$pdata)
    	{
    		return back()->with(['info'=>'数据不存在！']);
    	}

    	$data = \DB::table('product_l')
    			->select('id','title','pid','time','uptime','level','model','brand','spec','num','remarks','titleimg')
    			->where('pid',$id)
    			->orderBy('time','desc')
    			->paginate(4);
    	foreach($data as $k => $v)
    	{
    		$v->imgs = explode(',',$v->titleimg);
    	}

    	return view('Admin.product.goodsindex',['title'=>'产品管理','pdata'=>$pdata,'data'=>$data,'page'=>$page]);
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
    	$data = $request->except("_token",'titleimg1','titleimg2','titleimg3','titleimg4','titleimg5','titleimg6',
    		'titleimg7','titleimg8');

    	$this->validate($request,[
    		'title'=>'required|max:120',
    		'brand'=>'required|max:15',
    		'model'=>'max:30',
    		'spec'=>'max:30',
    		'num'=>'max:5',
    		'remarks'=>'max:120',
    		'titleimg1'=>'required|image|file',
    		'titleimg2'=>'image|file',
    		'titleimg3'=>'image|file',
    		'titleimg4'=>'image|file',
    		'titleimg5'=>'image|file',
    		'titleimg6'=>'image|file',
    		'titleimg7'=>'image|file',
    		'titleimg8'=>'image|file',
    		'content' => 'max:20000',
    		'titles' => 'required|min:2|max:60',
            'keyworlds' => 'required|min:6|max:255',
            'description' => 'required|min:10|max:255'
    		],[
    		'title.required'=>'产品名称不能为空！',
    		'title.max'=>'产品名称最大120位！',
    		'brand.required'=>'品牌不能为空！',
    		'brand.max'=>'品牌最大15位！',
    		'model.max'=>'型号最大30位',
    		'spec.max'=>'规格最大30位',
    		'num.max'=>'数量最大5位',
    		'remarks.max'=>'备注最大120位',
    		'titleimg1.required'=>'展示图片1：未上传！',
    		'titleimg1.image'=>'展示图片1：上传的文件不是图片类型！',
    		'titleimg1.file'=>'展示图片1：上传不成功！',
    		'titleimg2.image'=>'展示图片1：上传的文件不是图片类型！',
    		'titleimg2.file'=>'展示图片1：上传不成功！',
    		'titleimg3.image'=>'展示图片1：上传的文件不是图片类型！',
    		'titleimg3.file'=>'展示图片1：上传不成功！',
    		'titleimg4.image'=>'展示图片1：上传的文件不是图片类型！',
    		'titleimg4.file'=>'展示图片1：上传不成功！',
    		'titleimg5.image'=>'展示图片1：上传的文件不是图片类型！',
    		'titleimg5.file'=>'展示图片1：上传不成功！',
    		'titleimg6.image'=>'展示图片1：上传的文件不是图片类型！',
    		'titleimg6.file'=>'展示图片1：上传不成功！',
    		'titleimg7.image'=>'展示图片1：上传的文件不是图片类型！',
    		'titleimg7.file'=>'展示图片1：上传不成功！',
    		'titleimg8.image'=>'展示图片1：上传的文件不是图片类型！',
    		'titleimg8.file'=>'展示图片1：上传不成功！',
    		'content.max'=>'内容超出限制，最大两万字！',
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
    	
    	
    	if($request->hasFile('titleimg1'))
    	{
    		if($request->file('titleimg1')->isValid())
    		{ 
          //获取后缀名
    			$ext=$request->file('titleimg1')->extension();
    			
          //获取新名
    			$fileName=time().mt_rand(10000,99999).'.'.$ext;
          //执行移动
    			$request->file('titleimg1')->move('./uploads/product/img/',$fileName);
          //添加数据
                $data['titleimg']=$fileName;
    		}else
    		{
    			return back()->with('图片上传失败！');
    		}
    	}else
    	{
    		return back()->with('图片上传失败！');
    	}

    	for($i=2; $i<=8; $i++)
    	{
    		if($request->hasFile('titleimg'.$i))
    		{
    			if($request->file('titleimg'.$i)->isValid())
    			{ 
			      //获取后缀名
						$ext=$request->file('titleimg'.$i)->extension();
						
			      //获取新名
						$fileName=time().mt_rand(10000,99999).'.'.$ext;
			      //执行移动
						$request->file('titleimg'.$i)->move('./uploads/product/img/',$fileName);
			      //添加数据
			            $data['titleimg'] .= ','.$fileName;
    			}
    		}
    	}

    	$data['time'] = time();
    	$data['uptime'] = $data['time'];
    	$data['level'] = 2;
    	$res = \DB::table('product_l')->insert($data);
    	if($res)
    	{
    		return redirect('/newpro/index/package/product/goodsindex/'.$data['pid'])->with('info','添加成功！');
    	}else
    	{
    		$imgs = explode(',',$data['titleimg']);
    		foreach($imgs as $k => $v)
    		{
    			if(file_exists('./uploads/product/img/'.$v))
    			{
    				@unlink('./uploads/product/img/'.$v);
    			}
    		}

    		return back()->with('info','添加失败！');
    	}
    }

    public function goodsedit(Request $request,$id)
    {   
        $page = $request->input('page',1);

    	$data = \DB::table('product_l')
    			->select('id','title','pid','keyworlds','titles','description','content','time','uptime','level','model','brand','spec','num','remarks','titleimg')
    			->where('id',$id)
    			->first();
    	if(!$data)
    	{
    		return back()->with('info','数据不存在！');
    	}

    	$count = count(explode(',',$data->titleimg));
    	return view('Admin.product.goodsedit',['title'=>'产品修改','data'=>$data,'count'=>$count,'page'=>$page]);

    }

    public function goodsedits(Request $request)
    {
    	$data = $request->except("_token",'titleimg1','titleimg2','titleimg3','titleimg4','titleimg5','titleimg6',
    		'titleimg7','titleimg8','page');

    	$this->validate($request,[
    		'title'=>'required|max:120',
    		'brand'=>'required|max:15',
    		'model'=>'max:30',
    		'spec'=>'max:30',
    		'num'=>'max:5',
    		'remarks'=>'max:120',
    		'titleimg1'=>'image|file',
    		'titleimg2'=>'image|file',
    		'titleimg3'=>'image|file',
    		'titleimg4'=>'image|file',
    		'titleimg5'=>'image|file',
    		'titleimg6'=>'image|file',
    		'titleimg7'=>'image|file',
    		'titleimg8'=>'image|file',
    		'content' => 'max:20000',
    		'titles' => 'required|min:2|max:60',
            'keyworlds' => 'required|min:6|max:255',
            'description' => 'required|min:10|max:255'

    		],[
    		'title.required'=>'产品名称不能为空！',
    		'title.max'=>'产品名称最大120位！',
    		'brand.required'=>'品牌不能为空！',
    		'brand.max'=>'品牌最大15位！',
    		'model.max'=>'型号最大30位',
    		'spec.max'=>'规格最大30位',
    		'num.max'=>'数量最大5位',
    		'remarks.max'=>'备注最大120位',
    		'titleimg1.image'=>'列表展示图片：上传的文件不是图片类型！',
    		'titleimg1.file'=>'列表展示图片：上传不成功！',
    		'titleimg2.image'=>'展示图片1：上传的文件不是图片类型！',
    		'titleimg2.file'=>'展示图片1：上传不成功！',
    		'titleimg3.image'=>'展示图片1：上传的文件不是图片类型！',
    		'titleimg3.file'=>'展示图片1：上传不成功！',
    		'titleimg4.image'=>'展示图片1：上传的文件不是图片类型！',
    		'titleimg4.file'=>'展示图片1：上传不成功！',
    		'titleimg5.image'=>'展示图片1：上传的文件不是图片类型！',
    		'titleimg5.file'=>'展示图片1：上传不成功！',
    		'titleimg6.image'=>'展示图片1：上传的文件不是图片类型！',
    		'titleimg6.file'=>'展示图片1：上传不成功！',
    		'titleimg7.image'=>'展示图片1：上传的文件不是图片类型！',
    		'titleimg7.file'=>'展示图片1：上传不成功！',
    		'titleimg8.image'=>'展示图片1：上传的文件不是图片类型！',
    		'titleimg8.file'=>'展示图片1：上传不成功！',
    		'content.max'=>'内容超出限制，最大两万字！',
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
    	
    	$imgs = \DB::table('product_l')->select('titleimg')->where('id',$request->id)->first()->titleimg;
    	$init = false;
    	if($request->hasFile('titleimg1'))
    	{
    		if($request->file('titleimg1')->isValid())
    		{

          //获取后缀名
    			$ext=$request->file('titleimg1')->extension();
    			
          //获取新名
    			$fileName_new=time().mt_rand(10000,99999).'.'.$ext;
          //执行移动
    			$request->file('titleimg1')->move('./uploads/product/img/',$fileName_new);
          //添加数据
    			$img1 = substr($imgs,0,strpos($imgs,','))?substr($imgs,0,strpos($imgs,',')):$imgs;

    			$init = true;
                $imgs = str_replace($img1,$fileName_new,$imgs);
                
    		}
    	}

    	$img_adds = [];
    	for($i=2; $i<=8; $i++)
    	{
    		if($request->hasFile('titleimg'.$i))
    		{
    			if($request->file('titleimg'.$i)->isValid())
    			{ 
			      //获取后缀名
						$ext=$request->file('titleimg'.$i)->extension();
						
			      //获取新名
						$fileName=time().mt_rand(10000,99999).'.'.$ext;
			      //执行移动
						$request->file('titleimg'.$i)->move('./uploads/product/img/',$fileName);
			      //添加数据
			            $imgs .= ','.$fileName;
			            $img_adds[$i] = $fileName;
    			}
    		}
    	}

    	$data['uptime'] = time();
    	$data['titleimg'] = $imgs;
    	$res = \DB::table('product_l')->where('id',$data['id'])->update($data);
    	if($res)
    	{	
    		if($init !== false)
    		{
    			if(file_exists('./uploads/product/img/'.$img1))
    			{
    				@unlink('./uploads/product/img/'.$img1);
    			}
    		}
    		return redirect('/newpro/index/package/product/goodsindex/'.$data['pid'].'?page='.$request->input('page',1))->with(['info'=>'更新成功！','edit_id'=>$data['id']]);
    	}else
    	{
    		if($init !== false)
    		{
    			$img_adds[9] = $fileName_new;
    		}

    		foreach($img_adds as $k => $v)
    		{
    			if(file_exists('./uploads/product/img/'.$v))
    			{
    				@unlink('./uploads/product/img/'.$v);
    			}
    		}
    		return back()->with('info','更新失败！');
    	}
    }

    public function goodsdel(Request $request)
    {
    	$id = $request->id;
    	$img = \DB::table('product_l')->select('titleimg','content')->where('id',$id)->first();
    	$content = $img->content;
    	$imgs =explode(',',$img->titleimg);
		    	
    	$pre = '/\/uploads\/ueditor\/image\/(\d*?\.(jpeg|jpg|png))/';
    	$a = preg_match_all($pre,$content,$arr);
    	if($a)
    	{
    		foreach($arr[1] as $k => $v)
    		{
    			if(file_exists('./uploads/ueditor/image/'.$v))
    			{
    				@unlink('./uploads/ueditor/image/'.$v);
    			}
    		}
    	}

    	$res = \DB::table('product_l')->delete($id);

    	if($res)
    	{	
    		foreach($imgs as $k => $v)
    		{
				if(file_exists('./uploads/product/img/'.$v))
    			{
    				@unlink('./uploads/product/img/'.$v);
    			}
    		}
    		
    		return response()->json(1);
    	}else
    	{
			return response()->json(2);
    	}
    }
}
