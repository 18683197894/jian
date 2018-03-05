<?php

namespace App\Http\Controllers\Newpro\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CenterController extends Controller
{
    public function my_orders(Request $request)
    {
    	$title = getwebpage($request->path());
    	return view('Newpro.Home.Center.my_center',['title'=>$title,'ors'=>'my_orders']);
    }
}
