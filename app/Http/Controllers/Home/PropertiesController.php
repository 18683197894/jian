<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PropertiesController extends Controller
{
    function zshx(){
        $key = \DB::table('webpage')->where('id',2)->first();
    	return view('properties.zshx',['title'=>$key->titles,'keyworlds'=>$key->keyworlds,'description'=>$key->description]);
    }

    function dfhx(){
        $key = \DB::table('webpage')->where('id',3)->first();
    	return view('properties.dfhx',['title'=>$key->titles,'keyworlds'=>$key->keyworlds,'description'=>$key->description]);
    }
    function hfhx(){
        $key = \DB::table('webpage')->where('id',4)->first();
    	return view('properties.hfhx',['title'=>$key->titles,'keyworlds'=>$key->keyworlds,'description'=>$key->description]);
    }
}
