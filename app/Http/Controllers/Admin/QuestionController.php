<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuestionController extends Controller
{
    public function zhijinindex(Request $request)
    {
    	$data = \DB::table('question')
    			->select('id','time','or','ors','ip','name','phone','qccupation','service','care','resident','style','money','intelligence','door','feel')
    			->where('ors','织金')
    			->where('or',1)
    			->paginate(12);
    	return view('Admin.question.zhijinindex',['title'=>'织金调查问卷','data'=>$data]);
    }

    public function defuindex(Request $request)
    {
    	dd(2);
    }
}
