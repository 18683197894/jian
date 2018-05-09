<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PropertiesController extends Controller
{
    public function detailsadd(){
    	return view('Admin.properties.detailsadd',['title'=>'织金动态添加']);
    }

    public function detailsadds(Request $request)
    {
       
    	$data = $request->except("_token");
    	$this->validate($request, [
        'title' => 'required|max:20|min:2',
        'pidname' => 'required',
        'titles' => 'required|max:60|min:2',
        'keyworlds' => 'required|max:255|min:10',
        'description' => 'required|max:255|min:10',
        'content' => 'required|max:20000'
    ],[
    	'title.required' => '标题不能为空',
    	'title.max' => '标题长度最大20位',
    	'title.min' => '标题长度最小2位',
    	'titles.required' => '网页标题不能为空',
    	'titles.max' => '网页标题长度最大60位',
    	'titles.min' => '网页标题长度最小2位',
    	'pidname.required' => '所属父类不能为空',
    	'keyworlds.required' => '网页关键字不能为空',
    	'keyworlds.max' => '网页关键字长度最大255位',
    	'keyworlds.min' => '网页关键字长度最小10位',
    	'description.required' => '网页内容描述不能为空',
    	'description.max' => '网页内容描述长度最大255位',
    	'description.min' => '网页内容描述长度最小10位',
    	'content.required' => '内容不能为空',
    	'content.max' => '内容长度超过20000位'
    ]);

    	$data['time'] = time();
    	$res = \DB::table('details')->insert($data);
    	if( $res ){
    		return "添加成功：<a href='/admin/properties/detailsadd'>继续添加</a> &nbsp;&nbsp;<a href='/admin/properties/details'>返回列表</a>";
    	}else
    	{
    		return back()->withInput()->with(['info'=>'数据库写入失败']);
    	}
    }

    public function hfnewsadd()
    {
        return view('Admin.properties.hfnewsadd',['title'=>'织金新闻添加']);
    }

    public function hfnewsadds(Request $request)
    {
        $data = $request->except("_token");
        $this->validate($request, [
        'title' => 'required|max:30|min:2',
        'pidname' => 'required',
        'titles' => 'required|max:60|min:2',
        'keyworlds' => 'required|max:255|min:10',
        'description' => 'required|max:255|min:10',
        'content' => 'required|max:20000',
        'leicon' => 'required|max:255|min:10'
    ],[
        'title.required' => '标题不能为空',
        'title.max' => '标题长度最大30位',
        'title.min' => '标题长度最小2位',
        'titles.required' => '网页标题不能为空',
        'titles.max' => '网页标题长度最大60位',
        'titles.min' => '网页标题长度最小2位',
        'pidname.required' => '所属父类不能为空',
        'keyworlds.required' => '网页关键字不能为空',
        'keyworlds.max' => '网页关键字长度最大255位',
        'keyworlds.min' => '网页关键字长度最小10位',
        'description.required' => '网页内容描述不能为空',
        'description.max' => '网页内容描述长度最大255位',
        'description.min' => '网页内容描述长度最小10位',
        'content.required' => '内容不能为空',
        'leicon.max' => '简介长度最大255位',
        'leicon.min' => '简介长度最小10位',
        'leicon.required' => '简介不能为空',
        'content.max' => '内容长度超过20000位'
    ]);
        $data['time'] = time();
        $data['click'] = 0;
        $data['status'] = 1;
        $res = \DB::table('hfnews')->insert($data);
        if( $res ){
            return "添加成功：<a href='/admin/properties/hfnewsadd'>继续添加</a> &nbsp;&nbsp;<a href='/admin/properties/hfnews'>返回列表</a>";
        }else
        {
            return back()->withInput()->with(['info'=>'数据库写入失败']);
        }
    }

    public function details()
    {
        $data = \DB::table('details')->select('id','time','title','titles','keyworlds','pidname')->orderBy('time','desc')->paginate(10);
        return view('Admin.properties.details',['title'=>'织金楼盘动态管理','data'=>$data]);
    }

    public function detailsedit($id)
    {
        $data = \DB::table('details')->select('pidname','id','title','titles','keyworlds','description','content')->where('id',$id)->first();
        return view('Admin.properties.detailsedit',['title'=>'织金新闻编辑','data'=>$data]);
    }
    public function detailsedits(Request $request)
    {
        $data = $request->except("_token");
        $this->validate($request, [
        'title' => 'required|max:30|min:2',
        'pidname' => 'required',
        'titles' => 'required|max:30|min:2',
        'keyworlds' => 'required|max:255|min:10',
        'description' => 'required|max:255|min:10',
        'content' => 'required|max:20000'
    ],[
        'title.required' => '标题不能为空',
        'title.max' => '标题长度最大60位',
        'title.min' => '标题长度最小2位',
        'titles.required' => '网页标题不能为空',
        'titles.max' => '网页标题长度最大60位',
        'titles.min' => '网页标题长度最小2位',
        'pidname.required' => '所属父类不能为空',
        'keyworlds.required' => '网页关键字不能为空',
        'keyworlds.max' => '网页关键字长度最大255位',
        'keyworlds.min' => '网页关键字长度最小10位',
        'description.required' => '网页内容描述不能为空',
        'description.max' => '网页内容描述长度最大255位',
        'description.min' => '网页内容描述长度最小10位',
        'content.required' => '内容不能为空'
    ]);
        $res = \DB::table('details')->where('id',$data['id'])->update($data);

        if($res)
        {
            return redirect('/admin/properties/details')->with(['info'=>'更新成功！']);
        }else
        {
            return back()->with(['info'=>'更新失败！内容未作更改']);
        }
    }

    public function detailsdel(request $request)
    {
        $res = \DB::table('details')->delete($request->id);

        if($res)
        {
            return response()->json(1);
        }else
        {
            return response()->json(2);
        }
    }

    public function hfnews()
    {
        $data = \DB::table('hfnews')->select('id','time','title','titles','keyworlds','pidname','click')->orderBy('time','desc')->paginate(10);
        return view('Admin.properties.hfnews',['title'=>'织金新闻动态管理','data'=>$data]);
    }

    public function hfnewsedit($id)
    {
        $data = \DB::table('hfnews')->select('pidname','id','title','titles','leicon','keyworlds','description','content')->where('id',$id)->first();
        return view('Admin.properties.hfnewsedit',['title'=>'织金新闻编辑','data'=>$data]);
    }

    public function hfnewsedits(Request $request)
    {
        $data = $request->except("_token");
        $this->validate($request, [
        'title' => 'required|max:30|min:2',
        'pidname' => 'required',
        'titles' => 'required|max:60|min:2',
        'keyworlds' => 'required|max:255|min:10',
        'description' => 'required|max:255|min:10',
        'content' => 'required|max:20000',
        'leicon' => 'required|max:255|min:10'
    ],[
        'title.required' => '标题不能为空',
        'title.max' => '标题长度最大30位',
        'title.min' => '标题长度最小2位',
        'titles.required' => '网页标题不能为空',
        'titles.max' => '网页标题长度最大60位',
        'titles.min' => '网页标题长度最小2位',
        'pidname.required' => '所属父类不能为空',
        'keyworlds.required' => '网页关键字不能为空',
        'keyworlds.max' => '网页关键字长度最大255位',
        'keyworlds.min' => '网页关键字长度最小10位',
        'description.required' => '网页内容描述不能为空',
        'description.max' => '网页内容描述长度最大255位',
        'description.min' => '网页内容描述长度最小10位',
        'content.required' => '内容不能为空',
        'leicon.max' => '简介长度最大255位',
        'leicon.min' => '简介长度最小10位',
        'leicon.required' => '简介不能为空',
        'content.max' => '内容长度超过20000位'
    ]);
    
         $res = \DB::table('hfnews')->where('id',$data['id'])->update($data);

        if($res)
        {
            return redirect('/admin/properties/hfnews')->with(['info'=>'更新成功！']);
        }else
        {
            return back()->with(['info'=>'更新失败！内容未作更改']);
        }
    }

    public function hfnewsdel(Request $request)
    {   
        // $content = \DB::table('hfnews')->select('content')->where('id',$request->id)->first()->content;

        // preg_match_all('/\/uploads\/ueditor\/image\/\d*\.(png|jpeg|jpg)/',$content,$str);

        // if( count($str) >0 )
        // {
        //     foreach( $str[0] as $k => $v )
        //     {
        //         @unlink('.'.$v);
        //     }

        // }

        $res = \DB::table('hfnews')->delete($request->id);

        if($res)
        {
            return response()->json(1);
        }else
        {
            return response()->json(2);
        }
    }
}
