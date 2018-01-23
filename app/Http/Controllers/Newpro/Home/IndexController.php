<?php

namespace App\Http\Controllers\Newpro\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index(Request $request)
    {	
        $titles = getwebpage();
    	return view('Newpro.Home.Index.index',['title'=>$titles]);
    }
}
