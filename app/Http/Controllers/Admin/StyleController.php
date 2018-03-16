<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StyleController extends Controller
{
    public function styleindex(Request $request)
    {
    	$bao = $request->input('bao',false);
    	$a = $bao?'=':'!=';
    	if($bao == '00')
    	{
    		$a = '!=';
    	}
    	$data = \DB::table('style')
    			->join('packages','style.pid','=','packages.id')
    			->select('packages.title as ptitle','style.id','style.title','style.con','style.content','style.time','style.status','style.img')
    			->where('style.pid',$a,$bao)
    			->orderBy('style.time','desc')
    			->paginate(5);
    	$data->appends(['bao'=>$bao]);
    	$packages = \DB::table('packages')->select('id','title')->get();
    	return view('Admin.product.styleindex',['bao'=>$bao,'data'=>$data,'title'=>'风格列表','packages'=>$packages]);
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

    public function styledel(Request $request)
    {
        $id = $request->id;
        $data = \DB::table('door')->select('id')->where('pid',$id)->get();
        if(count($data) > 0)
        {
            return response()->json(3);
        }

        $img = \DB::table('style')->select('id','img')->where('id',$id)->first()->img;
        $res = \DB::table('style')->delete($id);

        if($res)
        {
            @unlink('./uploads/ruan/img/'.$img);
            return response()->json(1);
        }else
        {
            return response()->json(2);
        }
    }

    public function qingedit()
    {
    	$data = \DB::table('qing')->select('id','money','name','path')->where('id',1)->first();
    	return view('Admin.product.qingedit',['title'=>'修改清水房报价','data'=>$data]);
    }
    public function yiedit()
    {
        $data = \DB::table('qing')->select('id','money','name','path')->where('id',2)->first();
        return view('Admin.product.yiedit',['title'=>'修改意向金报价','data'=>$data]);
    }

    public function qingedits(Request $request,$id)
    {	
    	$this->validate($request,[
    		'money' => 'required|integer',
            'name' => 'required|min:2|max:10',
            'path' => 'required|min:2|max:20',
    		],[
    		'money.required' => '金额不能为空！',
    		'money.integer' => '金额填写错误！',
            'name.required' => '名称不能为空！',
            'name.min' => '名称最小2位',
            'name.max' => '名称最大10位',
            'path.required' => '属性不能为空！',
            'path.min' => '属性最小2位',
            'path.max' => '属性最大20位'
    		]);
        $money = $request->money;
        $name = $request->name;
    	$path = $request->path;
    	$res = \DB::table('qing')->where('id',$id)->update(['money'=>$money,'name'=>$name,'path'=>$path]);
    	if($res)
    	{
    		return redirect('/admin/product/style/index')->with(['info'=>'修改成功!']);
    	}else
    	{
    		return redirect('/admin/product/style/index')->with(['info'=>'未作修改!']);
    		
    	}
    }
    public function yiedits(Request $request,$id)
    {   
        $this->validate($request,[
            'money' => 'required|integer',
            'name' => 'required|min:2|max:10',
            'path' => 'required|min:2|max:20',
            ],[
            'money.required' => '金额不能为空！',
            'money.integer' => '金额填写错误！',
            'name.required' => '名称不能为空！',
            'name.min' => '名称最小2位',
            'name.max' => '名称最大10位',
            'path.required' => '属性不能为空！',
            'path.min' => '属性最小2位',
            'path.max' => '属性最大20位'
            ]);
        $money = $request->money;
        $name = $request->name;
        $path = $request->path;
        $res = \DB::table('qing')->where('id',$id)->update(['money'=>$money,'name'=>$name,'path'=>$path]);
        if($res)
        {
            return redirect('/admin/product/style/index')->with(['info'=>'修改成功!']);
        }else
        {
            return redirect('/admin/product/style/index')->with(['info'=>'未作修改!']);
            
        }
    }

    /////////////////////////////////////////////////////////////////////////
    public function doorindex($id)
    {
    	$data = \DB::table('door')
    			->select('id','title','pid','main','nomain','model','time')
    			->where('pid',$id)
    			->orderBy('time','desc')
    			->paginate(12);
    	$pid = \DB::table('style')
    			->join('packages','style.pid','=','packages.id')
    			->select('packages.title as ptitle','style.id','style.title')
    			->where('style.id',$id)
    			->first();

    	return view('Admin.product.doorindex',['title'=>'户型管理','data'=>$data,'pid'=>$pid]);
    }

    public function dooradd(Request $request,$id)
    {
    	return view('Admin.product.dooradd',['title'=>'户型添加','pid'=>$id]);
    }

    public function dooradds(Request $request)
    {   

    	$data = $request->except("_token");

    	$this->validate($request,[
    		'title' => 'required|min:3|max:10',
            'main' => 'required|min:3|max:12',
    		'mains' => 'required|min:3|max:50',
            'nomain' => 'nullable|min:3|max:12',
    		'nomains' => 'nullable|min:3|max:50',
            'model' => 'nullable|min:3|max:12',
    		'models' => 'nullable|min:3|max:50'
    		],[
    		'title.required'=>'户型填写为空！',
    		'title.min'=>'户型填写最小3位！',
    		'title.max'=>'户型填写最大10位！',
    		'main.required'=>'主流品牌报价填写为空！',
    		'main.min'=>'主流品牌报价最小3位！',
    		'main.max'=>'主流品牌报价最大12位！',
            'mains.required'=>'主流品牌说明填写为空！',
            'mains.min'=>'主流品牌说明最小3位！',
            'mains.max'=>'主流品牌说明最大50位！',
    		'nomain.min'=>'非主流品牌报价最小3位！',
    		'nomain.max'=>'非主流品牌报价最大12位！',
            'nomains.min'=>'非主流品牌说明最小3位！',
            'nomains.max'=>'非主流品牌说明最大50位！',
    		'model.min'=>'样板间报价最小3位！',
    		'model.max'=>'样板间报价最大12位！',
            'models.min'=>'样板间说明最小3位！',
            'models.max'=>'样板间说明最大50位！',
    		]);
            if($data['nomain'] != null && $data['nomains'] == null )
            {
                return back()->withInput()->with(['info'=>'非主流品牌说明为空！']);
            }
            if($data['model'] != null && $data['models'] == null )
            {
                return back()->withInput()->with(['info'=>'样板间说明为空！']);
            }
    		$data['time'] = time();
    		$res = \DB::table('door')->insert($data);
    		if($res)
    		{
    			return redirect('/admin/product/style/doorindex/'.$data['pid'])->with(['info'=>'添加成功']);
    		}else
    		{
    			return back()->withInput()->with(['info'=>'数据库写入失败！']);
    		}
    }

    public function dooredit($id)
    {
    	$data = \DB::table('door')
    		->select('id','title','main','nomain','model','pid','mains','nomains','models')
    		->where('id',$id)
    		->first();
    	if(!$data)
    	{
    		return back()->with(['info'=>'数据不存在!']);
    	}
    	return view('Admin.product.dooredit',['title'=>'户型编辑','data'=>$data]);
    }

    public function dooredits(Request $request)
    {
    	$data = $request->except("_token");
    	$this->validate($request,[
            'title' => 'required|min:3|max:10',
            'main' => 'required|min:3|max:12',
            'mains' => 'required|min:3|max:50',
            'nomain' => 'nullable|min:3|max:12',
            'nomains' => 'nullable|min:3|max:50',
            'model' => 'nullable|min:3|max:12',
            'models' => 'nullable|min:3|max:50'
            ],[
            'title.required'=>'户型填写为空！',
            'title.min'=>'户型填写最小3位！',
            'title.max'=>'户型填写最大10位！',
            'main.required'=>'主流品牌报价填写为空！',
            'main.min'=>'主流品牌报价最小3位！',
            'main.max'=>'主流品牌报价最大12位！',
            'mains.required'=>'主流品牌说明填写为空！',
            'mains.min'=>'主流品牌说明最小3位！',
            'mains.max'=>'主流品牌说明最大50位！',
            'nomain.min'=>'非主流品牌报价最小3位！',
            'nomain.max'=>'非主流品牌报价最大12位！',
            'nomains.min'=>'非主流品牌说明最小3位！',
            'nomains.max'=>'非主流品牌说明最大50位！',
            'model.min'=>'样板间报价最小3位！',
            'model.max'=>'样板间报价最大12位！',
            'models.min'=>'样板间说明最小3位！',
            'models.max'=>'样板间说明最大50位！',
            ]);
            if($data['nomain'] != null && $data['nomains'] == null )
            {
                return back()->withInput()->with(['info'=>'非主流品牌说明为空！']);
            }
            if($data['model'] != null && $data['models'] == null )
            {
                return back()->withInput()->with(['info'=>'样板间说明为空！']);
            }

    	$res = \DB::table('door')
    			->where('id',$data['id'])
    			->update($data);
    	if($res)
    	{
    		return redirect('/admin/product/style/doorindex/'.$data['pid'])->with(['info'=>'更新成功！']);
    	}else
    	{
    		return redirect('/admin/product/style/doorindex/'.$data['pid'])->with(['info'=>'数据未作更改！']);
    	}
    }
    public function doordel(Request $request)
    {
        $id = $request->id;
        $res = \DB::table('door')->delete($id);
        if($res)
        {
            return response()->json(1);
        }else
        {
        return response()->json(2);

        }
    }
    public function mainindex($id)
    {
    	dd($id);
    }
}
