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
            'titles' => 'required|min:2|max:30',
            'keyworlds' => 'required|min:6|max:120',
            'description' => 'required|min:10|max:120',
            'url' => 'required|min:1|max:255',
            'title' => 'required|min:1|max:30'
        ],[
            'titles.required'=>'网页标题不能为空',
            'titles.min'=>'网页标题最少2位',
            'titles.max'=>'网页标题最少2位最大30位',
            'keyworlds.required'=>'网页关键字不能为空',
            'keyworlds.min'=>'网页关键字最少6位',
            'keyworlds.max'=>'网页关键字最大120位',
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
        $data['time'] = time();

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
    	$data = \DB::table('webpage')->orderBy('time','desc')->paginate(13);
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
            'titles' => 'required|min:2|max:30',
            'keyworlds' => 'required|min:6|max:120',
            'description' => 'required|min:10|max:120',
            'url' => 'required|min:1|max:255',
            'title' => 'required|min:1|max:30'
 		],[
            'titles.required'=>'网页标题不能为空',
            'titles.min'=>'网页标题最少2位',
            'titles.max'=>'网页标题最少2位最大30位',
            'keyworlds.required'=>'网页关键字不能为空',
            'keyworlds.min'=>'网页关键字最少6位',
            'keyworlds.max'=>'网页关键字最大120位',
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

		$res = \DB::table('webpage')->where('id',$data['id'])->update($data);

		if($res)
		{
			return redirect('/admin/config/webpage')->with('info','更新成功');
		}else
		{
			return back()->with('info','更新失败');
		}
    }

    public function nav()
    {   
        $data = \DB::table('nav')
        ->join('webpage','nav.pid','=','webpage.id')
        ->select('nav.id','nav.title','nav.status','nav.pid','webpage.url')
        ->orderBy('nav.status')
        ->get();
        
        return view('Admin.config.nav',['title'=>'首页导航栏目','data'=>$data]);
    }
    public function navadd()
    {   
        $data = \DB::table('webpage')->select('id','title')->orderBy('time','desc')->get();
        return view('Admin.config.navadd',['title'=>'首页导航栏目添加','data'=>$data]);
    }
    public function navadds(Request $request)
    {
        $data = $request->except("_token");
        $res = \DB::table('webpage')->where('id',$data['pid'])->first();
        $data['title'] = $res->title;
        $count = \DB::table('nav')->select('id')->count();
        if($count <= 0)
        {
            $data['status'] = 1;
        }else
        {
            $data['status'] = $count + 1;
        }
        $res = \DB::table('nav')->insert($data);
        if(!$res)
        {
            return back()->withInput()->with(['info'=>'数据库写入失败！']);
        }else
        {
            return redirect('/admin/config/nav')->with(['info'=>'添加成功！']);
        }
    }
    public function navedit(Request $request)
    {
        $data = \DB::table('nav')->select('id','title','status')->where('id',$request->id)->first();
        if($data)
        {
            return view('Admin.config.navedit',['title'=>'首页栏目修改','data'=>$data]);
        }else
        {
            return back()->with(['info'=>'数据不存在！']);
        }
    }

    public function navedits(Request $request)
    {
        $data = $request->except("_token","id");
         $this->validate($request,[
            'title' => 'required|min:1|max:30'
        ],[
            
            'title.required'=>'栏目名称不能为空',
            'title.min'=>'栏目名称最少1位',
            'title.max'=>'栏目名称最大30位'
        ]);
        $res = \DB::table('nav')->where('id',$request->id)->update($data);
        if($res)
        {
            return redirect('/admin/config/nav')->with(['info'=>'修改成功！']);
        }else
        {
            return back()->with(['info'=>'修改失败！']);
        }
    }
    public function navdelajax(Request $request)
    {   
        $res = \DB::table('nav')->delete($request->id);
        if($res)
        {       
            $data = \DB::table('nav')->select('id','title','status')->orderBy('status')->get();
            if(count($data) <= 0)
            {
                return response()->json(1);
            }
            $num = 1;
            foreach($data as $k => $v)
            {
                \DB::table('nav')->where('id',$v->id)->update(['status'=>$num]);
                $num ++;
            }

            return response()->json(1);
        }else
        {
            return response()->json(2);
        }
        
    }

    public function navshang(Request $request)
    {
        $id = $request->id;
        $res = \DB::table('nav')->where('id',$id)->first();
        $res_s = \DB::table('nav')->where('status',$res->status - 1)->first();
        if(!$res)
        {
            return response()->json(4);
        }

        if(!$res_s)
        {
            return response()->json(3);
        }
        // return response()->json($res->title.'-'.$res_s->title);

        
        \DB::beginTransaction();
        try{ 
           $a =  \DB::table('nav')->where('id',$res->id)->update(['status' => $res->status-1]);
           $b =  \DB::table('nav')->where('id',$res_s->id)->update(['status' => $res->status]);
            if($a && $b)
            {
                \DB::commit(); 
                return response()->json(1);
            }

            }catch (\Exception $e){ 
                \DB::rollBack(); 
                return response()->json(2);
            }


    }

    public function navxia(Request $request)
    {
        $id = $request->id;
        $res = \DB::table('nav')->where('id',$id)->first();
        $res_s = \DB::table('nav')->where('status',$res->status + 1)->first();
        if(!$res)
        {
            return response()->json(4);
        }

        if(!$res_s)
        {
            return response()->json(3);
        }
        // return response()->json($res->title.'-'.$res_s->title);

        
        \DB::beginTransaction();
        try{ 
           $a =  \DB::table('nav')->where('id',$res->id)->update(['status' => $res->status + 1]);
           $b =  \DB::table('nav')->where('id',$res_s->id)->update(['status' => $res->status]);
            if($a && $b)
            {
                \DB::commit(); 
                return response()->json(1);
            }

            }catch (\Exception $e){ 
                \DB::rollBack(); 
                return response()->json(2);
            }

    }
}
