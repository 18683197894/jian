<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PropertiesController extends Controller
{
    function zshx(){
    	return view('properties.zshx',['title'=>'浙商临港新天地']);
    }

    function dfhx(){
    	return view('properties.dfhx',['title'=>'德福庄园']);
    }
    function hfhx(){
    	return view('properties.hfhx',['title'=>'华富御景庄园']);
    }
}
