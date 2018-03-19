<?php

namespace App\Http\Controllers\Newpro\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index(Request $request)
    {	

    	$news =\DB::table('news')
                        ->select('id','titleimg','title','leicon','time')
                        ->where('szhi',1)
                        ->orderBy('time','desc')
                        ->get()->toArray();

    	$count =count($news);
        if($count < 8)
        {
            $newss = \DB::table('news')
                        ->select('id','titleimg','title','leicon','time')
                        ->where('szhi',0)
                        ->orderBy('time','desc')
                        ->offset(0)
                        ->limit(8 - $count)
                        ->get()->toArray();
            $news = array_merge($news,$newss);
        }
        //d
        $titles = getwebpage();
    	return view('Newpro.Home.Index.index',['title'=>$titles,'news'=>$news]);
    }
}
