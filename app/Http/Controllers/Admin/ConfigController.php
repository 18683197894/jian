<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConfigController extends Controller
{   
    public function add()
    {
        return view('Admin.config.add',['title'=>'添加URL网页']);
    }
    public function adds(Request $request)
    {
        $data = $request->except('_token');
        $this->validate($request,[
            'titles' => 'required|min:2|max:60',
            'keyworlds' => 'required|min:6|max:30',
            'description' => 'required|min:10|max:120',
            'url' => 'required|min:1|max:255',
            'title' => 'required|min:1|max:30'
        ],[
            'titles.required'=>'网页标题不能为空',
            'titles.min'=>'网页标题最少2位最大60位',
            'titles.max'=>'网页标题最少2位最大15位',
            'keyworlds.required'=>'网页关键字不能为空',
            'keyworlds.min'=>'网页关键字最少6位最大30位',
            'keyworlds.max'=>'网页关键字最少6位最大30位',
            'description.required'=>'网页内容描述不能为空',
            'description.min'=>'网页内容描述最少10位',
            'description.max'=>'网页内容描述最大120位',
            'url.required'=>'url不能为空',
            'url.min'=>'url最少1位',
            'url.max'=>'url最大255位',
            'title.required'=>'网页名称不能为空',
            'title.min'=>'网页名称最少1位',
            'title.max'=>'网页名称最大30位'
        ]);

        $res = \DB::table('webpage')->insert($data);
        if($res)
        {
            return redirect('/admin/config/webpage')->with(['info'=>'添加成功！']);
        }else
        {
            return back()->withInput()->with(['info'=>'数据库写入失败！']);
        }
    }
    public function webpage()
    {	
    	$data = \DB::table('webpage')->paginate(13);
    	return view('Admin.config.webpage',['title'=>'网页关键字','data'=>$data]);
    }
    
    public function webpageedit($id)
    {
    	$data = \DB::table('webpage')->where('id',$id)->first();
    	return view('Admin.config.webpageedit',['title'=>'网页关键字更新','data'=>$data]);
    }

    public function webpageedits(Request $request)
    {
    	$data = $request->except('_token');
    	$this->validate($request,[
            'titles' => 'required|min:2|max:60',
            'keyworlds' => 'required|min:6|max:30',
            'description' => 'required|min:10|max:120',
            'url' => 'required|min:1|max:255',
            'title' => 'required|min:1|max:30'
 		],[
            'titles.required'=>'网页标题不能为空',
            'titles.min'=>'网页标题最少2位最大60位',
            'titles.max'=>'网页标题最少2位最大15位',
            'keyworlds.required'=>'网页关键字不能为空',
            'keyworlds.min'=>'网页关键字最少6位最大30位',
            'keyworlds.max'=>'网页关键字最少6位最大30位',
            'description.required'=>'网页内容描述不能为空',
            'description.min'=>'网页内容描述最少10位最大120位',
            'description.max'=>'网页内容描述最少10位最大120位',
            'url.required'=>'url不能为空',
            'url.min'=>'url最少1位',
            'url.max'=>'url最大255位',
            'title.required'=>'网页名称不能为空',
            'title.min'=>'网页名称最少1位',
            'title.max'=>'网页名称最大30位'
		]);

		$res = \DB::table('webpage')->where('id',$data['id'])->update($data);

		if($res)
		{
			return redirect('/admin/config/webpage')->with('info','更新成功');
		}else
		{
			return back()->with('info','更新失败');
		}
    }
}
