<?php

namespace App\Http\Controllers\Newpro\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuestionController extends Controller
{	
	public function defuindex(Request $request)
    {	
    return view('Newpro.Home.Question.defuindex',['or'=>1]);
    }

    public function defuname(Request $request)
    {	
    		return view('Newpro.Home.Question.zhiname',['title'=>'你的名字']);
    }

    public function zhijinindex(Request $request)
    {	
    			return view('Newpro.Home.Question.zhijinindex',['or'=>1]);
    }

    public function zhijinname(Request $request)
    {	
    		return view('Newpro.Home.Question.zhijinname',['title'=>'你的名字']);
    }

    public function defuphone(Request $request)
    {	
    	$request->setTrustedProxies(array('10.32.0.1/16'));  
		$ip = $request->getClientIp();
    	$name = $request->name;

    	if(!$ip || !$name)
    	{	
    		return redirect('/newpro/defu/questionnaire/index')->with(['info'=>'数据无法提交']);
    	}
    	$res = \DB::table('question')
    		->where('ors','德福')
    		->where('ip',$ip)
    		->where('or','=',1)
    		->where('name',$name)
    		->first();
    	if($res)
    	{
    		return redirect('/newpro/defu/questionnaire/index')->with(['info'=>'你已参与过调查']);
    	}else
    	{	
    		$ress = \DB::table('question')
    		->where('ors','德福')
    		->where('ip',$ip)
    		->where('or','!=',1)
    		->where('name',$name)
    		->first();
    		
    		if(!$ress)
    		{
    			$id = \DB::table('question')
    			->insertGetId(['ip'=>$ip,'or'=>0,'ors'=>'德福','name'=>$name]);
    			if($id)
    			{
    				return view('Newpro.Home.Question.defuphone',['id'=>$id]);

    			}else
    			{
    				return redirect('/newpro/defu/questionnaire/index')->with(['info'=>'无法继续完成调查']);
    			}
    		}else
    		{
    				return view('Newpro.Home.Question.defuphone',['id'=>$ress->id]);

    		}
    		
    	}

    }
    public function zhijinphone(Request $request)
    {	
    	$request->setTrustedProxies(array('10.32.0.1/16'));  
		$ip = $request->getClientIp();
    	$name = $request->name;

    	if(!$ip || !$name)
    	{	
    		return redirect('/newpro/zhijin/questionnaire/index')->with(['info'=>'数据无法提交']);
    	}
    	$res = \DB::table('question')
    		->where('ors','织金')
    		->where('ip',$ip)
    		->where('or','=',1)
    		->where('name',$name)
    		->first();
    	if($res)
    	{
    		return redirect('/newpro/zhijin/questionnaire/index')->with(['info'=>'你已参与过调查']);
    	}else
    	{	
    		$ress = \DB::table('question')
    		->where('ors','织金')
    		->where('ip',$ip)
    		->where('or','!=',1)
    		->where('name',$name)
    		->first();
    		
    		if(!$ress)
    		{
    			$id = \DB::table('question')
    			->insertGetId(['ip'=>$ip,'or'=>0,'ors'=>'织金','name'=>$name]);
    			if($id)
    			{
    				return view('Newpro.Home.Question.zhijinphone',['id'=>$id]);

    			}else
    			{
    				return redirect('/newpro/zhijin/questionnaire/index')->with(['info'=>'无法继续完成调查']);
    			}
    		}else
    		{
    				return view('Newpro.Home.Question.zhijinphone',['id'=>$ress->id]);

    		}
    		
    	}

    }

    public function defufanghao(Request $request)
    {
    	$id = $request->id;
    	$phone = $request->phone;
    	if(!$id || !$phone)
    	{
    		return redirect('/newpro/defu/questionnaire/index')->with(['info'=>'数据无法提交']);
    	}

    	$res = \DB::table('question')
    		->where('ors','德福')
    		->where('id',$id)
    		->where('or','!=',1)
    		->first();
    	if($res)
    	{
    		\DB::table('question')->where('id',$id)->update(['phone'=>$phone]);
    		return view('Newpro.Home.Question.defufanghao',['id'=>$id]);
    	}else
    	{
    		return redirect('/newpro/defu/questionnaire/index')->with(['info'=>'无法继续完成调查']);
    	}
    }

    public function zhijinfanghao(Request $request)
    {
    	$id = $request->id;
    	$phone = $request->phone;
    	if(!$id || !$phone)
    	{
    		return redirect('/newpro/zhijin/questionnaire/index')->with(['info'=>'数据无法提交']);
    	}

    	$res = \DB::table('question')
    		->where('ors','织金')
    		->where('id',$id)
    		->where('or','!=',1)
    		->first();
    	if($res)
    	{
    		\DB::table('question')->where('id',$id)->update(['phone'=>$phone]);
    		return view('Newpro.Home.Question.zhijinfanghao',['id'=>$id]);
    	}else
    	{
    		return redirect('/newpro/zhijin/questionnaire/index')->with(['info'=>'无法继续完成调查']);
    	}
    }

    public function defufengge(Request $request)
    {	

    	$id = $request->id;
    	$chuangzhu = $request->click;
    	if(!$id || !$chuangzhu)
    	{
    		return redirect('/newpro/defu/questionnaire/index')->with(['info'=>'数据无法提交']);
    	}
    	$res = \DB::table('question')
    		->where('ors','德福')
    		->where('id',$id)
    		->where('or','!=',1)
    		->first();
    	if($res)
    	{
    		\DB::table('question')->where('id',$id)->update(['chuangzhu'=>$chuangzhu]);
    		return view('Newpro.Home.Question.defufengge',['id'=>$id]);
    	}else
    	{
    		return redirect('/newpro/defu/questionnaire/index')->with(['info'=>'无法继续完成调查']);
    	}
    }

    public function zhijinfengge(Request $request)
    {	

    	$id = $request->id;
    	$chuangzhu = $request->click;
    	if(!$id || !$chuangzhu)
    	{
    		return redirect('/newpro/zhijin/questionnaire/index')->with(['info'=>'数据无法提交']);
    	}
    	$res = \DB::table('question')
    		->where('ors','织金')
    		->where('id',$id)
    		->where('or','!=',1)
    		->first();
    	if($res)
    	{
    		\DB::table('question')->where('id',$id)->update(['chuangzhu'=>$chuangzhu]);
    		return view('Newpro.Home.Question.zhijinfengge',['id'=>$id]);
    	}else
    	{
    		return redirect('/newpro/zhijin/questionnaire/index')->with(['info'=>'无法继续完成调查']);
    	}
    }

    public function defuchangzhu(Request $request)
    {	

    	$id = $request->id;
    	$fanghao = $request->fanghao;
    	if(!$id || !$fanghao)
    	{
    		return redirect('/newpro/defu/questionnaire/index')->with(['info'=>'数据无法提交']);
    	}
    	$res = \DB::table('question')
    		->where('ors','德福')
    		->where('id',$id)
    		->where('or','!=',1)
    		->first();
    	if($res)
    	{
    		\DB::table('question')->where('id',$id)->update(['fanghao'=>$fanghao]);
    		return view('Newpro.Home.Question.defuchangzhu',['id'=>$id]);
    	}else
    	{
    		return redirect('/newpro/defu/questionnaire/index')->with(['info'=>'无法继续完成调查']);
    	}
    }

    public function zhijinchangzhu(Request $request)
    {	

    	$id = $request->id;
    	$fanghao = $request->fanghao;
    	if(!$id || !$fanghao)
    	{
    		return redirect('/newpro/zhijin/questionnaire/index')->with(['info'=>'数据无法提交']);
    	}
    	$res = \DB::table('question')
    		->where('ors','织金')
    		->where('id',$id)
    		->where('or','!=',1)
    		->first();
    	if($res)
    	{
    		\DB::table('question')->where('id',$id)->update(['fanghao'=>$fanghao]);
    		return view('Newpro.Home.Question.zhijinchangzhu',['id'=>$id]);
    	}else
    	{
    		return redirect('/newpro/zhijin/questionnaire/index')->with(['info'=>'无法继续完成调查']);
    	}
    }

    function defuors(Request $request)
    {
    	$id = $request->id;
    	$fengge = $request->fengge;
    	if(!$id || !$fengge)
    	{
    		return response()->json(2);
    	}
    	$res = \DB::table('question')
    		->where('ors','德福')
    		->where('id',$id)
    		->where('or','!=',1)
    		->first();
    	if($res)
    	{
    		\DB::table('question')->where('id',$id)->update(['fengge'=>$fengge,'or'=>1]);
    		return response()->json(1);
    	}else
    	{
    		return response()->json(2);
    		
    	}
    }

    function zhijinors(Request $request)
    {
    	$id = $request->id;
    	$fengge = $request->fengge;
    	if(!$id || !$fengge)
    	{
    		return response()->json(2);
    	}
    	$res = \DB::table('question')
    		->where('ors','织金')
    		->where('id',$id)
    		->where('or','!=',1)
    		->first();
    	if($res)
    	{
    		\DB::table('question')->where('id',$id)->update(['fengge'=>$fengge,'or'=>1]);
    		return response()->json(1);
    	}else
    	{
    		return response()->json(2);
    		
    	}
    }
}
