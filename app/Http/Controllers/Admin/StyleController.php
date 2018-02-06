<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StyleController extends Controller
{
    public function styleindex(Request $request)
    {
    	$data = \DB::table('style')
    			->join('packages','style.pid','=','packages.id')
    			->select('packages.title as ptitle','style.id','style.title','style.con','style.content','style.time','style.status','style.img')
    			->orderBy('style.time','desc')
    			->get();
    	return view('Admin.product.styleindex',['data'=>$data,'title'=>'风格列表']);
    }

    public function styleadd()
    {	
    	$packages = \DB::table('packages')->select('id','title')->get();
  
    	return view('Admin.product.styleadd',['title'=>'风格添加','packages'=>$packages]);
    }

    public function styleadds(Request $request)
    {
    	$data = $request->except('_token');
		$this->validate($request,[
		    'title' => 'required|min:3|max:10',
		    'con'	=> 'required|min:4|max:12',
		    'content'=>'required|min:20|max:180',
		    'img'=>'required',
		    'pid' => 'required'
 		],[
			'title.required'=>'标题不能为空',
			'title.min'=>'标题最少3位最大10位',
			'title.max'=>'标题最少3位最大10位',
			'con.required'=>'简介标题不能为空',
            'con.min'=>'简介标题最少4位最大12位',
            'con.max'=>'简介标题最少4位最大12位',
            'content.required'=>'简介内容不能为空',
            'content.min'=>'简介内容最少20位最大180位',
			'content.max'=>'简介内容最少20位最大180位',
			'img.required'=>'未上传图片',
			'pid.required'=>'包不能为空'
		]); 
		$data['time']=time();
    	if($request->hasFile('img'))
    	{
    		if($request->file('img')->isValid())
    		{ 
          //获取后缀名
    			$ext=$request->file('img')->extension();
    			
          //获取新名
    			$fileName=time().mt_rand(10000,99999).'.'.$ext;
          //执行移动
    			$request->file('img')->move('./uploads/ruan/img/',$fileName);
          //添加数据
    			$data['img']=$fileName;
    		}else{
    		return back()->withInput()->with(['info'=>'图片上传失败']);

    		}
    	}else{
    		return back()->withInput()->with(['info'=>'图片上传失败']);
    	}
    	
		$res = \DB::table('style')->insert($data);
    	if($res){
    		return redirect('/admin/product/style/index')->with(['info'=>'添加成功']);
    	}else{
    		@unlink('./uploads/ruan/img/'.$fileName);
    		return back()->withInput()->with(['info'=>'添加失败']);

    	}
    }

    public function styleedit(Request $request,$id)
    {
    	$packages = \DB::table('packages')->select('id','title')->get();
    	$data = \DB::table('style')
    			->select('id','title','con','content','pid')
    			->where('id',$id)
    			->first();
    	if(!$data)
    	{
    		return back()->with(['info'=>'数据不存在！']);
    	}

    	return view('Admin.product.styleedit',['title'=>'风格修改','data'=>$data,'packages'=>$packages]);
    }

    public function styleedits(Request $request,$id)
    {
    	$data =  $request->except("_token");
		$this->validate($request,[
		    'title' => 'required|min:3|max:10',
		    'con'	=> 'required|min:4|max:15',
		    'content'=>'required|min:20|max:180',
		    'pid' => 'required'
 		],[
			'title.required'=>'标题不能为空',
			'title.min'=>'标题最少3位最大10位',
			'title.max'=>'标题最少3位最大10位',
			'con.required'=>'简介标题不能为空',
            'con.min'=>'简介标题最少4位最大15位',
            'con.max'=>'简介标题最少4位最大15位',
            'content.required'=>'简介内容不能为空',
            'content.min'=>'简介内容最少20位最大180位',
			'content.max'=>'简介内容最少20位最大180位',
			'pid.required'=>'包不能为空'
		]);
    	$de = \DB::table('style')->where('id',$id)->first();
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
          $request->file('img')->move('./uploads/ruan/img/',$fileName);

          //删除老图片
          if(file_exists('./uploads/ruan/img/'.$img))
          {
            unlink('./uploads/ruan/img/'.$img);
          }
          //添加数据
          $data['img']=$fileName;

        }else{
          return back()->with('info','图片上传失败');
        }

       }   	

       $res = \DB::table('style')->where('id',$id)->update($data);
    	
       if($res)
       {

       	return redirect('admin/product/style/index')->with(['info'=>'更新成功']);
       }
       else{
       	return back()->with(['info'=>'更新失败 数据未作更改！']);
       }
    }

    /////////////////////////////////////////////////////////////////////////
    public function packageindex($id)
    {
    	$data = \DB::table('package')
    			->select('id','title','con','img','time','status','pid')
    			->where('pid',$id)
    			->get();
    	$pid = \DB::table('style')
    			->join('packages','style.pid','=','packages.id')
    			->select('packages.title as ptitle','style.id','style.title')
    			->where('style.id',$id)
    			->first();
    	
    	return view('Admin.product.packageindex',['title'=>'包管理','data'=>$data,'pid'=>$pid]);
    }
}
