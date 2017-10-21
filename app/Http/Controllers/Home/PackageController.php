<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PackageController extends Controller
{
    public function allcse(){
    	return view('Home.package.allcse');
    }

    public function softroll(){
    	$soft1 = \DB::table('fengge')->where('status',1)->orderBy('time')->get();
    	$column = \DB::table('column')->orderBy('time')->get();

    	foreach($soft1 as $k => $v)
    	{	$soft1[$k]->cc = [];
    		foreach($column as $kk =>$vv)
    	{
    		if($vv->pid == $soft1[$k]->id)
    		{	
    			array_push($soft1[$k]->cc,$vv);
    			
    		}
    	}
    	}
    	foreach($soft1 as $i=>$j)
    	{	
    		$soft1[$i]->ss= \DB::table('subclass')->where('pid',$j->cc[0]->id)->get();
    		$soft1[$i]->tit = $soft1[$i]->cc[0]->title;
    	}
    	
    	$arr1 = [];
    	$arr2 = [];
    	$arr3 = [];
    	foreach($soft1 as $o => $u)
    	{
    		if($u->pid == 1)
    		{
    			array_push($arr1,$u);
    		}
    		if($u->pid == 2)
    		{
    			array_push($arr2,$u);
    		}
    		if($u->pid == 3)
    		{
    			array_push($arr3,$u);
    		}
    	}
    	
    	return view('home.package.softroll',['title'=>'软包套餐','arr1'=>$arr1,'arr2'=>$arr2,'arr3'=>$arr3]);
    }

    public function houseroom(){
    	return view('home.package.houseroom'); 
    }
    public function ajax(Request $request)
    {
    	$id = $request->id;
    	$data = \DB::table('subclass')->select('title','specations','brand','num')->where('pid',$id)->get();
    	if($data)
    	{
    		return response()->json($data);
    	}else
    	{
    		return response()->json(1);
    	}
    }
}
