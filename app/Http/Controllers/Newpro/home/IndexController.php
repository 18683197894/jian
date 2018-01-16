<?php

namespace App\Http\Controllers\Newpro\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index(Request $request)
    {	
    	$title = \DB::table('webpage')->select('url','id','keyworlds','description','titles')->where('url','/')->get()->toArray()[0];
    	
    	return view('Newpro.Home.Index.index',['title'=>$title]);
    }
}
