<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RuanController extends Controller
{


    public function fgadd($id){
    	return view('admin.ruan.fgadd',['title'=>'风格添加','pid'=>$id]);
    }
    public function fgadds(Request $request){
    	$data = $request->except('_token');
		$this->validate($request,[
		    'title' => 'required|min:3|max:10',
		    'con'	=> 'required|min:4|max:12',
		    'content'=>'required|min:20|max:180',
		    'img'=>'required',
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
    	$url='';
    	if($data['pid'] ==1){
    		$url = '/admin/package/ruan/fashion';
    	}elseif($data['pid'] ==2){
    		$url = '/admin/package/ruan/joylity';
    	}elseif($data['pid'] ==3){
    		$url = '/admin/package/ruan/peghid';
    	}
		$res = \DB::table('fengge')->insert($data);
    	if($res){
    		return redirect($url)->with(['info'=>'添加成功']);
    	}else{
    		@unlink('./uploads/ruan/img/'.$fileName);
    		return back()->withInput()->with(['info'=>'添加失败']);

    	}
    }


    public function fashion(){
    	$data = \DB::table('fengge')->where('pid',1)->get();
    	return view('admin.ruan.fashion',['title'=>'时尚包','data'=>$data,'pid'=>1]);
    }
    public function joylity(){
    	$data = \DB::table('fengge')->where('pid',2)->get();
    	return view('admin.ruan.fashion',['title'=>'质享包','data'=>$data,'pid'=>2]);
    }
    public function peghid(){
    	$data = \DB::table('fengge')->where('pid',3)->get();
    	return view('admin.ruan.fashion',['title'=>'臻藏包','data'=>$data,'pid'=>3]);
    }

    public function fenggeedit($id){
    	$data = \DB::table('fengge')->where('id',$id)->first();
    	return view('admin.ruan.fenggeedit',['title'=>'风格编辑','data'=>$data]);
    }
    public function fenggeedits(Request $request,$id){

    	$data =  $request->except("_token");
		$this->validate($request,[
		    'title' => 'required|min:3|max:10',
		    'con'	=> 'required|min:4|max:15',
		    'content'=>'required|min:20|max:180',
 		],[
			'title.required'=>'标题不能为空',
			'title.min'=>'标题最少3位最大10位',
			'title.max'=>'标题最少3位最大10位',
			'con.required'=>'简介标题不能为空',
            'con.min'=>'简介标题最少4位最大15位',
            'con.max'=>'简介标题最少4位最大15位',
            'content.required'=>'简介内容不能为空',
            'content.min'=>'简介内容最少20位最大180位',
			'content.max'=>'简介内容最少20位最大180位'
		]);
    	$de = \DB::table('fengge')->where('id',$id)->first();
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

       $res = \DB::table('fengge')->where('id',$id)->update($data);
    	$url='';
    	if($de->pid ==1){
    		$url = '/admin/package/ruan/fashion';
    	}elseif($de->pid  ==2){
    		$url = '/admin/package/ruan/joylity';
    	}elseif($de->pid  ==3){
    		$url = '/admin/package/ruan/peghid';
    	}
       if($res)
       {

       	return redirect($url)->with(['info'=>'更新成功']);
       }
       else{
       	return back()->with(['info'=>'更新失败 数据未作更改！']);
       }
    }
    public function fgajax(Request $request)
    {
    	$id = $request->id;
    	$arr = [];
    	$arr = \DB::table('column')->where('pid',$id)->get();

    	if(count($arr) <=0 )
    	{
    		return response()->json(3);
    	}
    	$pid = $arr[0]->fid;
    	
    	$num = \DB::table('fengge')->where('pid',$pid)->where('status',1)->get();

    	if(count($num) >= 4 )
    	{
    		return response()->json(4);
    	}

    	$res = \DB::table('fengge')->where('id',$id)->update(['status'=>1]);

    	if($res)
    	{
    		return response()->json(1);
    	}else
    	{
    		return response()->json(2);

    	}
    }
    public function fgdel(Request $request)
    {
    	$id = $request->id;

    	$da = [];
    	$da = \DB::table('column')->where('pid',$id)->get();

    	if( count($da) >0)
    	{
    		return response()->json(3);
    	}
    	$img = \DB::table('fengge')->where('id',$id)->first()->img;

    	$res = \DB::table('fengge')->delete($id);
    	if($res)
    	{    	

    		if(file_exists('./uploads/ruan/img/'.$img))
    		{
    		unlink('./uploads/ruan/img/'.$img);
    		}
    		return response()->json(1);
    	}else
    	{
    		return response()->json(2);
    	}
    }
    public function fgajaxs(Request $request)
    {
    	$id = $request->id;
    	$res = \DB::table('fengge')->where('id',$id)->update(['status'=>0]);
    	if($res)
    	{
    		return response()->json(1);
    	}else
    	{
    		return response()->json(2);
    	}
    }
    public function column($id){
    	$data = \DB::table('column')->where('pid',$id)->get();
    	$res = \DB::table('fengge')->where('id',$id)->first();
    	$pid = $res->pid;
    	$tit = $res->title;
    	return view('admin.ruan.column',['title'=>'风格栏目','pid'=>$pid,'tit'=>$tit,'id'=>$id,'data'=>$data]);
    }

    public function columnadd($id){
    	return view('admin.ruan.columnadd',['id'=>$id,'title'=>'栏目添加']);
    }

    public function columnadds(Request $request){
    	$data = $request->except("_token");
    	$this->validate($request,[
    		'title'=>'required|min:2|max:10'
    		],[
    		'title.required'=>'标题不能为空',
    		'title.min'=>'标题最小2位最大10位',
    		'title.max'=>'标题最小2位最大10位'
    		]);
    	$data['time'] = time();
    	$da = \DB::table('fengge')->where('id',$data['pid'])->first();
    	$pa1 = $da->title;
    	$data['fid']=$da->pid;
    	$pa2 = '';
    	if($da->pid == 1)
    	{
    		$pa2 = '时尚包';
    	}
    	if($da->pid == 2)
    	{
    		$pa2 = '质享包';
    	}
    	if($da->pid == 3)
    	{
    		$pa2 = '臻藏包';
    	}

    	$data['path'] = $pa2.'->'.$pa1.'->'.$data['title'];
    	$res = \DB::table('column')->insert($data);

    	if($res)
    	{
    		return redirect('admin/package/ruan/fg/column/'.$data['pid'])->with(['info'=>'添加成功']);
    	}else
    	{
    		return back()->with(['info'=>'添加失败']);
    	}
    }

    public function columnedit($id){
    	$data = \DB::table('column')->where('id',$id)->first();
    	return view('admin.ruan.columnedit',['title'=>'栏目编辑','data'=>$data]);
    }
    public function columnedits(Request $request,$id){
    	$pid = $request->pid;
	 	$data = $request->except("_token","pid");
		$this->validate($request,[
			'title'=>'required|min:2|max:10'
			],[
			'title.required'=>'标题不能为空',
			'title.min'=>'标题最小2位最大10位',
			'title.max'=>'标题最小2位最大10位'
			]);
		$dd = explode("->",$data['path']);
		array_splice($dd,2,1,$data['title']);
		$path = implode("->",$dd);
		$data['path'] = $path;
		$res = \DB::table('column')->where('id',$id)->update($data);

		if($res)
		{
			return redirect('/admin/package/ruan/fg/column/'.$pid)->with(['info'=>'更新成功']);
		}else
		{
			return back()->with(['info'=>'更新失败 数据未作更改！!']);
		}
    }

    public function columnajax(Request $request){
    	$id = $request->id;
    	$data = [];
    	$data = \DB::table('subclass')->where('pid',$id)->get();
    	if(count($data) > 0)
    	{
    		return response()->json(3);
    	}

    	$res = \DB::table('column')->delete($id);
    	if($res)
    	{
    		return response()->json(1);
    	}else
    	{
    		return response()->json(2);

    	}

    }

    public function subclass($id){
    	$dd = \DB::table('column')->where('id',$id)->first();
    	$fid = $dd->fid;
    	$data = \DB::table('subclass')->where('pid',$id)->get();
    	return view('admin.ruan.subclass',['data'=>$data,'title'=>'栏目子类','fid'=>$fid,'dd'=>$dd]);
    }
    public function subclassadd($id){

    	return view('admin.ruan.subclassadd',['id'=>$id,'title'=>'子类添加']);
    }

    public function subclassadds(Request $request){
    	$data = $request->except('_token');
    	$this->validate($request,[
		    'title' => 'required|min:1|max:10',
		    'specations'=>'nullable|min:1|max:30',
		    'brand'=>'nullable|min:1|max:20',
		    'num'=>'required|min:1|max:5',
		    'jia'=>'required|numeric'
 		],[
			'title.required'=>'标题不能为空',
			'title.min'=>'标题最少1位最大10位',
			'title.max'=>'标题最少1位最大10位',
            'specations.min'=>'规格最少1位最大30位',
			'specations.max'=>'规格最少1位最大30位',
			'brand.min'=>'材质最少1位最大30位',
			'brand.max'=>'材质最少1位最大30位',
			'num.required'=>'数量不能为空',
			'num.min'=>'数量最小1位',
			'num.max'=>'数量最大5位',
			'jia.required'=>'请填写价格',
			'jia.numeric'=>'价格输入错误（最多保留2位小数点）'

		]);
		$dd = \DB::table('column')->where('id',$data['pid'])->first();
		$data['fid'] = $dd->fid;
		$data['sid'] = $dd->pid;
		$data['path'] = $dd->path.'->'.$data['title'];
    	$data['time'] = time();
		
		$res = \DB::table('subclass')->insert($data);

		if($res)
		{
			return redirect('/admin/package/ruan/fg/column/subclass/'.$data['pid'])->with(['info'=>'添加成功']);
		}else
		{
			return back()->with(['info'=>'添加失败 数据类型错误']);
		}
    }

    public function subclassedit($id){
    	$data = \DB::table('subclass')->where('id',$id)->first();
    	return view('admin.ruan.subclassedit',['title'=>'子类编辑','data'=>$data]);
    }
    public function subclassedits(Request $request){
    	$id = $request->id;
    	$data = $request->except('_token','id');
    	$this->validate($request,[
		    'title' => 'required|min:1|max:10',
            'specations'    => 'nullable|min:1|max:30',
            'brand'=>'nullable|min:1|max:30',
            'num'=>'required|min:1|max:5',
            'jia'=>'required|numeric'
 		],[
			'title.required'=>'标题不能为空',
            'title.min'=>'标题最少1位最大30位',
            'title.max'=>'标题最少1位最大30位',
            'specations.min'=>'规格最少1位最大30位',
            'specations.max'=>'规格最少1位最大30位',
            'brand.min'=>'材质最少1位最大30位',
            'brand.max'=>'材质最少1位最大30位',
            'num.required'=>'数量不能为空',
            'num.min'=>'数量最小1位',
            'num.max'=>'数量最大5位',
            'jia.required'=>'请填写价格',
            'jia.numeric'=>'价格输入错误（最多保留2位小数点）'

		]);

		$pp = \DB::table('subclass')->where('id',$id)->first();

		$pa = $pp->path;
		$arr = explode('->', $pa);
		array_splice($arr,3,1,$data['title']);
		$data['path'] = implode('->',$arr);

		$res = \DB::table('subclass')->where('id',$id)->update($data);
		if($res)
		{
			return redirect('admin/package/ruan/fg/column/subclass/'.$pp->pid)->with(['info'=>'更新成功!']);
		}else{
			return back()->with(['info'=>'更新失败 数据未作更改!']);
		}
    }
    public function subclassajax(Request $request){
    	$id = $request->id;
    	$res = \DB::table('subclass')->delete($id);
    	if($res)
    	{
    		return response()->json(1);
    	}else
    	{
    		return response()->json(2);

    	}
    }
    public function add()
    {
    	// $title = ['沙发','地板','电视','茶几','电视柜','装饰柜','点灯','窗帘'];
    	// $num = [1120,115.02,56245,500.55,111,555.36,36,88,894,66.22];
    	// $gui = ['990*550*66','444*8445,455','4451*59*445','464*898*666','452*488*1321'];
    	// $jian = [1,2,3,5,6,7,4,1,8];
    	// $pai = ['美的','三星','小米','LG','TLE','爱丽丝','喜马拉雅山','阿尔卡特','建商联盟大品牌'];

    	// for($i=0;$i<=5;$i++)
    	// {
    	// 	$arr = [];
    	// 	$arr['title'] = array_rand($title);
    	// 	$arr['specations'] = array_rand($gui);
    	// 	$arr['num'] = array_rand($jian);
    	// 	$arr['brand'] = array_rand($pai);
    	// 	$arr['jia'] = array_rand($num);
    	// }
    }
}
