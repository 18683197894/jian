<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PropertiesController extends Controller
{
    function index(){
    	return view('properties.index');
    }
    function cs(){
    	return view('properties.cs');
    }
}
