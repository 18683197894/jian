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
        $news = \DB::table('hfnews')->select('id','title','time','pidname')->orderBy('time','desc')->skip(0)->take(3)->get();
        
        $key = \DB::table('webpage')->where('id',4)->first();
    	return view('properties.hfhx',['news'=>$news,'title'=>$key->titles,'keyworlds'=>$key->keyworlds,'description'=>$key->description]);
    }

    function details($id)
    {   
        $data = \DB::table('details')->select('id','title','titles','keyworlds','description','time','pidname','content')->where('id',$id)->first();
        if(!$data)
        {
            return back();
        }        
        return view('properties.details',['data'=>$data,'title'=>$data->titles,'keyworlds'=>$data->keyworlds,'description'=>$data->description]);
    }

    function hfnewslist()
    {   
        $data = \DB::table('hfnews')->select('id','title','time','click','leicon','pidname')->orderBy('time','desc')->paginate(8);
        
        return view('properties.hfnewslist',['data'=>$data,'title'=>'织金新闻动态','keyworlds'=>'建商网,建商联盟,织金新闻动态,织金织金万都铭城,织金东方巴黎','description'=>'建商网,建商联盟,织金新闻动态,织金织金万都铭城,织金东方巴黎']);
    }

    function hfnewsplay($id)
    {   
        $re = \DB::table('hfnews')->select('id','title','click')->orderBy('click','desc')->get();

        $data = \DB::table('hfnews')->select('id','title','time','click','content','titles','keyworlds','description','pidname')->where('id',$id)->first();
        $data->click += 1;
        \DB::table('hfnews')->where('id',$id)->update(['click'=>$data->click]);

        return view('properties.hfnewsplay',['re'=>$re,'data'=>$data,'title'=>$data->titles,'keyworlds'=>$data->keyworlds,'description'=>$data->description]);
    }
}
