<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PlateController extends Controller
{
    public function list(Request $request,$id)
    {
		$zhi = \DB::table('platenews')->select('id','time','click','title','titleimg','leicon')->where('pid',$id)->where('zhi',1)->first();
        $data = \DB::table('platenews')->select('id','title','time')->where('pid',$id)->orderBy('time')->paginate(12);
        $xun = \DB::table('platenews')->select('id','title','click')->orderby('click','desc')->skip(0)->take(10)->get();
        $qi  = \DB::table('plate')->select('id','title','img','time')->where('id','!=',$id)->orderby('time','desc')->skip(0)->take(6)->get();
        $tit = \DB::table('plate')->select('id','titles','title','keyworlds','description')->where('id',$id)->first();
        
        return view('home.plate.index',['title'=>$tit->titles,'keyworlds'=>$tit->keyworlds,'description'=>$tit->description,'data'=>$data,'zhi'=>$zhi,'xun'=>$xun,'qi'=>$qi,'tit'=>$tit]);
    }

    public function play($id)
    {
		$qi  = \DB::table('plate')->select('id','title','img','time')->orderby('time','desc')->skip(0)->take(6)->get();
        $xun = \DB::table('platenews')->select('id','title','click')->orderby('click','desc')->skip(0)->take(10)->get();
        $data = \DB::table('platenews')->select('id','title','click','yuan','content','time','pid','titles','keyworlds','description')->where('id',$id)->first();
        if( $data ==null )
        {   
            return back();
        }
        $num = $data->click + 1;
        \DB::table('platenews')->where('id',$id)->update(['click'=>$num]);
        return view('home.plate.play',['data'=>$data,'title'=>$data->titles,'keyworlds'=>$data->keyworlds,'description'=>$data->description,'qi'=>$qi,'xun'=>$xun]);
    }
}
