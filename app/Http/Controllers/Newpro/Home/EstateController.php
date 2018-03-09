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
}
