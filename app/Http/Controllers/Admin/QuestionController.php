<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuestionController extends Controller
{
    public function zhijinindex(Request $request)
    {
    	$data = \DB::table('question')
    			->select('id','time','or','ors','ip','name','sex','phone','qccupation','service','care','resident','style','money','intelligence','door','feel')
    			->where('ors','织金')
    			->where('or',1)
    			->orderBy('time','desc')
    			->paginate(8);
    	if($data->count() > 0)
    	{
    		foreach($data as $k => $v)
    		{
    			$v->care = array_filter( explode(',',$v->care));
    			$v->feel = explode(',',$v->feel);
    		}


    	}
    	
    	return view('Admin.question.zhijinindex',['title'=>'织金调查问卷','data'=>$data]);
    }

    public function defuindex(Request $request)
    {
    	$data = \DB::table('question')
    			->select('id','time','or','ors','ip','name','sex','phone','qccupation','service','care','resident','style','money','intelligence','door','feel')
    			->where('ors','德福')
    			->where('or',1)
    			->orderBy('time','desc')
    			->paginate(8);
    	if($data->count() > 0)
    	{
    		foreach($data as $k => $v)
    		{
    			$v->care = array_filter( explode(',',$v->care));
    			$v->feel = explode(',',$v->feel);
    		}


    	}
    	
    	return view('Admin.question.defuindex',['title'=>'德福调查问卷','data'=>$data]);
    }

    public function indexdel(Request $request)
    {
    	$id = $request->id;
        $ors = $request->input('ors',null);
        if($ors == 'smart')
        {
            $res = \DB::table('smartquestion')->delete($id);
            if($res)
            {
                return response()->json(1);
            }else
            {
                return response()->json(2);
            }
        }
    	$res = \DB::table('question')->delete($id);
    	if($res)
    	{
    		return response()->json(1);
    	}else
    	{
    		return response()->json(2);
    	}
    }

    public function defusmartindex()
    {
        $data = \DB::table('smartquestion')
        ->select('id','time','name','sex','age','careabout','channel','contact','describe','functions','income','interest','nopurchase','purchase','reasonableprice','operation')
        ->orderBy('time','desc')
        ->paginate(5);
        if($data->count() > 0)
        {
            foreach($data as $k => $v)
            {
                $v->describe = explode(',',$v->describe);
                $v->purchase = explode(',',$v->purchase);
                $v->nopurchase = explode(',',$v->nopurchase);
                $v->careabout = explode(',',$v->careabout);
                $v->functions = explode(',',$v->functions);
            }
        }
        return view('Admin.question.defusmartindex',['title'=>'智能家居调查问卷','data'=>$data]);
    }
}
