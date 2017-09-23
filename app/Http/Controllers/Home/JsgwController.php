<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JsgwController extends Controller
{
    //关于建商
    public function aboutus(){
    	return view('home.jsgw.aboutus',['title'=>'企业简介']);
    }
    //运营团队
    public function tuandui(){
    	return view('home.jsgw.tuandui',['title'=>'运营团队']);
    }
    //发展战略
    public function zhanlui(){
    	return view('home.jsgw.zhanlui',['title'=>'发展战略']);
    }
    //联系方式
    public function contact(){
    	return view('home.jsgw.contact',['title'=>'联系方式']);
    }
    //用人理念
    public function job1(){
    	return view('home.jsgw.job1',['title'=>'用人理念']);
    }
    //新零售平台
    public function ls(){
    	return view('home.jsgw.ls',['title'=>'新零售平台']);
    }
    //精装房项目
    public function jzf(){
    	return view('home.jsgw.jzf',['title'=>'精装房项目']);
    }
    //线下体验馆
    public function tyg(){
    	return view('home.jsgw.tyg',['title'=>'线下体验馆']);
    }
    //招聘职位 
    public function job5(){
    	return view('home.jsgw.job5',['title'=>'招聘职位']);
    }
    public function job6(){
    	return view('home.jsgw.job6',['title'=>'招聘职位']);
    }

    //设计风格
    public function design($id=0){
        $dess = ['简欧设计','现代设计','地中海设计','中式设计','美式设计','田园设计'];

        return view('home.jsgw.design',['title'=>'设计风格','id'=>$id,'dess'=>$dess]);
    }
    //设计量房
    public function amount(){
        return view('home.jsgw.amount',['title'=>'设计风格']);
    }
    //news新闻
    public function news(){
        $zhi = \DB::table('news')->where('zhi',1)->first();
        $data = \DB::table('news')->orderBy('time')->paginate(12);
        $xun = \DB::table('news')->orderby('click','desc')->skip(0)->take(10)->get();
        $qi  = \DB::table('news')->where('lei',2)->orderby('time')->skip(0)->take(6)->get();
        
        return view('home.jsgw.news',['title'=>'新闻动态','data'=>$data,'zhi'=>$zhi,'xun'=>$xun,'qi'=>$qi]);
    }
    public function newslist($id){

        $qi  = \DB::table('news')->where('lei',2)->orderby('time')->skip(0)->take(6)->get();
        $xun = \DB::table('news')->orderby('click','desc')->skip(0)->take(10)->get();
        $data = \DB::table('news')->where('id',$id)->first();

        $num = $data->click + 1;
        \DB::table('news')->where('id',$id)->update(['click'=>$num]);
        return view('home.jsgw.newslist',['data'=>$data,'title'=>'新闻详情','qi'=>$qi,'xun'=>$xun]);
    }

}
