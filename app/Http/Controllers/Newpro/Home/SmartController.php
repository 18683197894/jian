<?php

namespace App\Http\Controllers\Newpro\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SmartController extends Controller
{
    public function smarthome()
    {
        $titles = \DB::table('webpage')->select('url','id','keyworlds','description','titles')->where('url','/newpro/smarthome')->get()->toArray()[0];
        return view('Newpro.Home.Smart.smarthome',['title'=>$titles]);
    }
     public function index(Request $request)
    {	
    	$title = \DB::table('webpage')->select('url','id','keyworlds','description','titles')->where('url','/')->get()->toArray()[0];
    	
    	return view('Newpro.Home.Index.index',['title'=>$title]);
    }
}
