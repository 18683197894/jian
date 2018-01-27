<?php

namespace App\Http\Controllers\Newpro\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index(Request $request)
    {	

    	$news =\DB::table('news')
    			->select('id','titleimg','title','leicon')
    			->inRandomOrder()
    			->offset(0)
    			->limit(8)
    			->get();
    	
        $titles = getwebpage();
    	return view('Newpro.Home.Index.index',['title'=>$titles,'news'=>$news]);
    }
}
