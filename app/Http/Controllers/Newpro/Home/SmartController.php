<?php

namespace App\Http\Controllers\Newpro\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SmartController extends Controller
{
    public function smarthome(Request $request)
    {	
        $titles = getwebpage($request->path());
        return view('Newpro.Home.Smart.smarthome',['title'=>$titles]);
    }

    public function ressmartunity(request $request)
    {	

        $titles = getwebpage($request->path());
        
        return view('Newpro.Home.Smart.ressmartunity',['title'=>$titles]);
    	
    }
     
}
