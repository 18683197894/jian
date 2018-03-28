<?php

namespace App\Http\Controllers\Newpro\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CenterController extends Controller
{
    public function my_orders(Request $request)
    {
    	$title = getwebpage($request->path());
    	$id = \session('Home')->id;
    	$data = \DB::table('orders')->select('id','status','addtime','_token','total','zid')->where('uid',$id)->orderBy('addtime','desc')->get();
    	$orss = $request->input('ors','pay_s');
    	foreach($data as $k => $v)
    	{	
    		if($v->status == 0)
    		{
    			$v->statuss = '未支付';
    		}else if($v->status == 1)
    		{
    			$v->statuss = '已支付';
    		}
    		$v->times = explode(',',$v->addtime);

    		// $v->detail = \DB::table('detail')->select('name','num','ors')->where('orderid',$v->id)->get();
    	} 	
    	
    	return view('Newpro.Home.Center.my_orders',['title'=>$title,'ors'=>'my_orders','data'=>$data,'orss'=>$orss]);
    }
    public function my_orders_details(Request $request)
    {	
    	$id = $request->id;
    	$data = \DB::table('orders')->select('id','address','linkman','phone','status','addtime','_token','total','zid','payors','name','totals')->where('id',$id)->first();
    	$data->times = explode(',',$data->addtime);
    	$data->detail = \DB::table('detail')->select('name','prince','num','ors')->where('orderid',$data->id)->get();
    	// dd($data);
    	$title = getwebpage($request->path());
    	return view('Newpro.Home.Center.my_orders_details',['data'=>$data,'title'=>$title,'ors'=>'my_orders_details']);
    }

    public function my_address(Request $request)
    {
    	$title = getwebpage($request->path());
    	$address = \DB::table('address')->select('id','phone','name','tails','zipcode','shen','shi','qu')->where('uid',\session('Home')->id)->get();
    	$shens = \DB::table('district')->select('id','name','level','upid')->where('level',1)->get();
    	return view('Newpro.Home.Center.my_address',['title'=>$title,'ors'=>'my_address','shens'=>$shens,'address'=>$address]);
    }

    public function my_modify(Request $request)
    {
    	$title = getwebpage($request->path());
    	return view('Newpro.Home.Center.my_modify',['title'=>$title,'ors'=>'my_modify']);
    }

    public function passajax(Request $request)
    {
    	$yuan = $request->yuan;
    	$newp = $request->newp;
    	$newp_s = $request->newp_s;
    	$id = \DB::table('user_home')->select('id','password')->where('id',\session('Home')->id)->first();
    	if(!$id)
    	{
    		return response()->json(4);
    	}

    	if(!\Hash::check($yuan,$id->password))
    	{
    		return response()->json(2);
    	}

    	if(\Hash::check($newp,$id->password))
    	{
    		return response()->json(3);
    	}

    	$res = \DB::table('user_home')->where('id',$id->id)->update(['password'=>\Hash::make($newp)]);
    	if($res)
    	{
    		return response()->json(1);
    	}else
    	{
    		return response()->json(5);
    	}

    }

    public function my_notice(Request $request)
    {
    	$title = getwebpage($request->path());
    	return view('Newpro.Home.Center.my_notice',['title'=>$title,'ors'=>'my_notice']);
    }

    public function my_personal(Request $request)
    {
    	$title = getwebpage($request->path());
    	$data = \DB::table('orders')->select('status','id')->where('uid',\session('Home')->id)->get();
    	$a = 0;
    	$b = 0;
    	$user = \DB::table('user_home')->select('id','phone','img','name','names')->where('id',\session('Home')->id)->first();
    	if($data)
    	{
    		foreach($data as $k => $v)
    		{
    			if($v->status == 0)
    			{
    				$a += 1;
    			}else if($v->status == 1)
    			{
    				$b += 1;
    			}
    		}
    	}
    	return view('Newpro.Home.Center.my_personal',['user'=>$user,'title'=>$title,'ors'=>'my_personal','a'=>$a,'b'=>$b]);
    }

    public function my_metion(Request $request)
    {
    	$title = getwebpage($request->path());
    	$data = \DB::table('user_home')->where('id',\session('Home')->id)->first();
    	if($data->date)
    	{
    		$data->date = substr($data->date,0,10);
    		$data->dates = explode('-',$data->date);
    	}

    	return view('Newpro.Home.Center.my_metion',['title'=>$title,'ors'=>'my_metion','data'=>$data]);
    }

    public function my_metionajax(Request $request)
    {
    	$names = $request->names;
    	$date = $request->date;
    	$sex = $request->sex;
    	if(!$names || !$date || !$sex)
    	{
    		return response()->json(3);
    	}
    	$data = ['names'=>$names,'date'=>$date,'sex'=>$sex,'uptime'=>time()];
    		// return response()->json($data);

    	$res = \DB::table('user_home')->where('id',\session('Home')->id)->update($data);
		if($res)
		{
    		return response()->json(1);

		}else{
    		return response()->json(2);

		} 	
    }
    public function my_metionpost(Request $request)
    {	
    	$this->validate($request,[
    		'img'=>'required|image'
    		],[
    		'img.required'=>'未上传图片',
    		'img.image' => '上传的文件不是图片'
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
                $request->file('img')->move('./uploads/user/img/',$fileName);
                $res = \DB::table('user_home')->select('id','img')->where('id',\session('Home')->id)->first();
                $res_s = \DB::table('user_home')->update(['img'=>$fileName]);
                if($res_s)
                {
                	if(file_exists('./uploads/user/img/'.$res->img))
                	{
                		@unlink('./uploads/user/img/'.$res->img);
                		return back();
                	}else
                	{
                		\DB::table('user_home')->update(['img'=>$res->img]);
                		@unlink('./uploads/user/img/'.$fileName);
                		return back();
                	}
                }
   			}else
   			{
   				return back()->with(['info'=>'图片上传失败！']);
   			}
   		}else
   		{
   			return back()->with(['info'=>'图片上传失败！']);
   		}
    }
}
