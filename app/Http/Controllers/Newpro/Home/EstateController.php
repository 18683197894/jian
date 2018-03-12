<?php

namespace App\Http\Controllers\Newpro\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EstateController extends Controller
{
    public function defu(Request $request)
    {
    	$title = getwebpage($request->path());
    	return view('Newpro.Home.Estate.defu',['title'=>$title]);
    }

    public function defudetails(Request $request)
    {
    	$title = getwebpage($request->path());
    	$ors = $request->ors;
    	if( $ors != 'A1huxing' && $ors != 'A2huxing' && $ors != 'B1huxing' && $ors != 'B2huxing' && $ors != 'E1-1huxing' && $ors != 'E1-2huxing' && $ors != 'E1-3huxing')
    	{
    		return redirect('/newpro/estate/defu');
    	}
    	return view('Newpro.Home.Estate.defudetails',['ors'=>$ors]);
    }
    public function zheshang(Request $request)
    {
    	$title = getwebpage($request->path());
    	return view('Newpro.Home.Estate.zheshang',['title'=>$title]);
    }

    public function zheshangdetails(Request $request)
    {
    	$title = getwebpage($request->path());
    	$ors = $request->ors;
    	if( $ors != 'Ahuxing' && $ors != 'Bhuxing' && $ors != 'Chuxing' && $ors != 'Dhuxing')
    	{
    		return redirect('/newpro/estate/zheshang');
    	}
    	return view('Newpro.Home.Estate.zheshangdetails',['ors'=>$ors]);
    }
     public function zhijin(Request $request)
    {
    	$title = getwebpage($request->path());
    	$data = \DB::table('hfnews')
    			->select('id','pidname','title','time')
    			->orderBy('time','desc')
    			->offset(0)
    			->limit(3)
    			->get();

    	return view('Newpro.Home.Estate.zhijin',['title'=>$title,'data'=>$data]);
    }

    public function zhijindetails(Request $request)
    {
    	$title = getwebpage($request->path());
    	$ors = $request->ors;
    	if( $ors != 'A_1huxing' && $ors != 'B_1huxing' && $ors != 'C_1huxing')
    	{
    		return redirect('/newpro/estate/zhijin');
    	}
    	return view('Newpro.Home.Estate.zhijindetails',['ors'=>$ors]);
    }

    public function zhijininter(Request $request)
    {
    	$id = $request->id;
    	$data = \DB::table('details')
    			->select('id','titles','title','keyworlds','description','content')
    			->where('id',$id)
    			->first();
    	if(!$data)
    	{
    		return back();
    	}
    	$title['title'] = $data->titles;
    	$title['keyworlds'] = $data->keyworlds;
    	$title['description'] = $data->description;

    	return view('Newpro.Home.Estate.zhijininter',['data'=>$data,'title'=>$title]);
    }

    public function zhijinnewsplay(Request $request)
    {
    	$id = $request->id;
    	$data = \DB::table('hfnews')
    			->select('id','title','titles','keyworlds','description','time','content','click')
    			->where('id',$id)
    			->first();
    	if(!$data)
    	{
    		return back();
    	}

    	$ors = \DB::table('hfnews')
    			->select('id','title','click')
    			->orderBy('click','desc')
    			->offset(0)
    			->limit(8)
    			->get();

    	$title['title'] = $data->titles;
    	$title['keyworlds'] = $data->keyworlds;
    	$title['description'] = $data->description;
    	return view('Newpro.Home.Estate.zhijinnewsplay',['data'=>$data,'title'=>$title,'ors'=>$ors]);

    }
    public function zhijinnewslist(Request $request)
    {
    	$data = \DB::table('hfnews')
    			->select('id','pidname','title','leicon')
    			->orderBy('time','desc')
    			->paginate(8);
    	$title = getwebpage($request->path());
    	return view('Newpro.Home.Estate.zhijinnewslist',['data'=>$data,'title'=>$title]);

    }
}
