<?php

namespace App\Http\Controllers\Newpro\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StyleController extends Controller
{
    public function styleindex(Request $request)
    {	
    	$title = getwebpage($request->path());
    	$data = \DB::table('packages')->select('id','title')->get();
    	if($data->count() > 0)
    	{
    		foreach($data as $k => $v)
    		{
    			$v->style = \DB::table('style')->select('id','title','con','content','img','status','time','pid')->where('pid',$v->id)->orderBY('time')->get();
    			foreach($v->style as $kk => $vv)
    			{	
    			$vv->door = \DB::table('door')->select('id','title','pid','main','nomain','model','time','mains','nomains','models')->where('pid',$vv->id)->get();
    			}
    		}
    	}
    	$qing = \DB::table('qing')->select('money')->first()->money;
    	return view('Newpro.Home.Product.styleindex',['title'=>$title,'data'=>$data,'qing'=>$qing]);
    }
}
