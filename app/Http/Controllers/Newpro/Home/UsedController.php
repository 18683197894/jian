<?php

namespace App\Http\Controllers\Newpro\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsedController extends Controller
{
    public function about(Request $request)
    {
    	$title = getwebpage($request->path());
    	$ors = $request->input('ors','about');
    	$ars = array('about','team','strategy','framework','contact');
    	if( !in_array($ors,$ars) )
    	{
    		$ors = 'about';
    	}
    	return 	view('Newpro.Home.Used.about',['title'=>$title,'ors'=>$ors]);
    }
     
    public function business(Request $request)
    {
        $title = getwebpage($request->path());
        return view('Newpro.Home.Used.business',['title'=>$title]);
    }
}
