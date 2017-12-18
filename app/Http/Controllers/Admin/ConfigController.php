<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConfigController extends Controller
{
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
            'description' => 'required|min:10|max:120'
 		],[
            'titles.required'=>'网页标题不能为空',
            'titles.min'=>'网页标题最少2位最大60位',
            'titles.max'=>'网页标题最少2位最大15位',
            'keyworlds.required'=>'网页关键字不能为空',
            'keyworlds.min'=>'网页关键字最少6位最大30位',
            'keyworlds.max'=>'网页关键字最少6位最大30位',
            'description.required'=>'网页内容描述不能为空',
            'description.min'=>'网页内容描述最少10位最大120位',
            'description.max'=>'网页内容描述最少10位最大120位'
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
