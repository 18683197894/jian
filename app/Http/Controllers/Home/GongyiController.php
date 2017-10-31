<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GongyiController extends Controller
{
    public function index($id)
    {	
    	$zhi = \DB::table('gongyinews')->where('pid',$id)->where('zhi',1)->first();
        $data = \DB::table('gongyinews')->where('pid',$id)->orderBy('time')->paginate(12);
        $xun = \DB::table('gongyinews')->orderby('click','desc')->skip(0)->take(10)->get();
        $qi  = \DB::table('gongyi')
            ->where('id','!=',$id)
            ->orderBy(\DB::raw('RAND()'))
            ->take(5)
            ->get();
        $tit = \DB::table('gongyi')->where('id',$id)->first();
        
        return view('home.gongyi.index',['title'=>$tit->titles,'keyworlds'=>$tit->keyworlds,'description'=>$tit->description,'data'=>$data,'zhi'=>$zhi,'xun'=>$xun,'qi'=>$qi,'tit'=>$tit]);
    }
    public function play(Request $request,$id)
    {
		$qi  = \DB::table('gongyi')->orderby('time','desc')->skip(0)->take(6)->get();
        $xun = \DB::table('gongyinews')->orderby('click','desc')->skip(0)->take(10)->get();
        $data = \DB::table('gongyinews')->where('id',$id)->first();
        if( $data ==null )
        {   
            return back();
        }
        $num = $data->click + 1;
        \DB::table('gongyinews')->where('id',$id)->update(['click'=>$num]);
        return view('home.gongyi.play',['data'=>$data,'title'=>$data->titles,'keyworlds'=>$data->keyworlds,'description'=>$data->description,'qi'=>$qi,'xun'=>$xun]);
    }
}
