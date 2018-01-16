<?php

namespace App\Http\Controllers\Newpro\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index(Request $request)
    {	
    	$titles = \DB::table('webpage')->select('url','id','keyworlds','description','titles')->where('url','/')->first();
    	$title=[];
    	if($titles)
    	{
    		$title['titles'] = $titles->titles;
    		$title['keyworlds'] = $titles->keyworlds;
    		$title['description'] = $titles->description;
    	}
    	return view('Newpro.home.index.index',['title'=>$title]);
    }
}