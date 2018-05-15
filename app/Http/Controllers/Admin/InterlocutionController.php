<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InterlocutionController extends Controller
{
    public function interindex(Request $request)
    {	
    	$data = \DB::table('interlocution')
    		->select('id','title','content','time','click')
    		->orderBy('id','desc')
    		->paginate(10);

    	return view('Admin.interlocution.interindex',['title'=>'常见问答','data'=>$data,'request'=>$request->all()]);
    }

    public function interadd()
    {
    	return view('Admin.interlocution.interadd',['title'=>'问答添加']);
    }

    public function interadds(Request $request)
    {	
    	$this->validate($request,[
    		'title'=>'required|max:255',
    		'content'=>'required|max:2000'
    		],[
    		'title.required'=>'问答标题不能为空！',
    		'title.max'=>'问答标题最大255位！',
    		'content.required'=>'问答内容不能为空！',
    		'content.max'=>'问答内容最大255位！',
    		]);
    	$data[0]['title'] = $request->title;
    	$data[0]['content'] = $request->content; 
    	$data[0]['time'] = time();
    	$data[0]['uptime'] = $data[0]['time'];
    	$data[0]['click'] = 0;

    	for($i=1; $i<=9; $i++)
    	{
    		if($request->input('title'.$i) && $request->input('content'.$i))
    		{
    			$data[$i]['title'] = $request->input('title'.$i);
    			$data[$i]['content'] = $request->input('content'.$i);
    			$data[$i]['time'] = time();
    			$data[$i]['uptime'] = $data[$i]['time'];
    			$data[$i]['click'] = 0;
    			

    		}
    	}
    	
    	// dd($data);
    	$res = \DB::table('interlocution')->insert($data);
    	if($res)
    	{
    		return redirect('/jslmadmin/newslei/interlocution/interindex')->with('info','成功添加 '.count($data).' 条数据！');
    	}else
    	{
    		return back()->with('info','数据库写入失败！');
    	}
    }

    public function interedit(Request $request,$id)
    {
    	$page = $request->input('page',1);
    	$data = \DB::table('interlocution')->select('id','title','content')->where('id',$id)->first();
    	if(!$data)
    	{
    		return redirect('/jslmadmin/newslei/interlocution/interindex')->with('info','数据不存在!');
    	}

    	return view('Admin.interlocution.interedit',['title'=>'问答修改','data'=>$data,'page'=>$page]);
    }

    public function interedits(Request $request)
    {
    	$this->validate($request,[
    		'title'=>'required|max:255',
    		'content'=>'required|max:2000'
    		],[
    		'title.required'=>'问答标题不能为空！',
    		'title.max'=>'问答标题最大255位！',
    		'content.required'=>'问答内容不能为空！',
    		'content.max'=>'问答内容最大255位！',
    		]);

    	$data = $request->except('_token','page');
    	$data['uptime'] = time();

    	$res = \DB::table('interlocution')->where('id',$data['id'])->update($data);
    	if($res)
    	{
    		return redirect('/jslmadmin/newslei/interlocution/interindex?page='.$request->input('page',1))->with('info','更新成功!');
    	}else
    	{
    		return back()->with('info','数据库写入失败！');
    	}
    }

    public function interdel(Request $request)
    {
    	$id = $request->id;
    	$res = \DB::table('interlocution')->delete($id);
    	if($res)
    	{
    		return response()->json(1);
    	}else
    	{
    		return response()->json(2);
    	}
    }
}

