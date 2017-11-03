<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JsgwController extends Controller
{
    //关于建商
    public function aboutus(){
        $key = \DB::table('webpage')->select('titles','keyworlds','description')->where('id',5)->first();
    	return view('home.jsgw.aboutus',['title'=>$key->titles,'keyworlds'=>$key->keyworlds,'description'=>$key->description]);
    }
    //运营团队
    public function tuandui(){
        $key = \DB::table('webpage')->select('titles','keyworlds','description')->where('id',6)->first();
    	return view('home.jsgw.tuandui',['title'=>$key->titles,'keyworlds'=>$key->keyworlds,'description'=>$key->description]);
    }
    //发展战略
    public function zhanlui(){
        $key = \DB::table('webpage')->select('titles','keyworlds','description')->where('id',7)->first();
    	return view('home.jsgw.zhanlui',['title'=>$key->titles,'keyworlds'=>$key->keyworlds,'description'=>$key->description]);
    }
    //联系方式
    public function contact(){
        $key = \DB::table('webpage')->select('titles','keyworlds','description')->where('id',8)->first();
    	return view('home.jsgw.contact',['title'=>$key->titles,'keyworlds'=>$key->keyworlds,'description'=>$key->description]);
    }
    //用人理念
    public function job1(){
        $key = \DB::table('webpage')->select('titles','keyworlds','description')->where('id',9)->first();
    	return view('home.jsgw.job1',['title'=>$key->titles,'keyworlds'=>$key->keyworlds,'description'=>$key->description]);
    }
    //新零售平台
    public function ls(){
        $key = \DB::table('webpage')->select('titles','keyworlds','description')->where('id',10)->first();
    	return view('home.jsgw.ls',['title'=>$key->titles,'keyworlds'=>$key->keyworlds,'description'=>$key->description]);
    }
    //精装房项目
    public function jzf(){
        $key = \DB::table('webpage')->select('titles','keyworlds','description')->where('id',11)->first();
    	return view('home.jsgw.jzf',['title'=>$key->titles,'keyworlds'=>$key->keyworlds,'description'=>$key->description]);
    }
    //线下体验馆
    public function tyg(){
        $key = \DB::table('webpage')->select('titles','keyworlds','description')->where('id',12)->first();
    	return view('home.jsgw.tyg',['title'=>$key->titles,'keyworlds'=>$key->keyworlds,'description'=>$key->description]);
    }
    //招聘职位 
    public function job5(){
        $key = \DB::table('webpage')->select('titles','keyworlds','description')->where('id',13)->first();
    	return view('home.jsgw.job5',['title'=>$key->titles,'keyworlds'=>$key->keyworlds,'description'=>$key->description]);
    }
    public function job6(){
        $key = \DB::table('webpage')->select('titles','keyworlds','description')->where('id',14)->first();
    	return view('home.jsgw.job6',['title'=>$key->titles,'keyworlds'=>$key->keyworlds,'description'=>$key->description]);
    }

    //设计风格
    public function design($id=0){
        $dess = ['简欧设计','现代设计','地中海设计','中式设计','美式设计','田园设计'];
        $key = \DB::table('webpage')->select('titles','keyworlds','description')->where('id',15)->first();
        return view('home.jsgw.design',['title'=>$key->titles,'keyworlds'=>$key->keyworlds,'description'=>$key->description,'id'=>$id,'dess'=>$dess]);
    }
    //设计量房
    public function amount(){
        $key = \DB::table('webpage')->select('titles','keyworlds','description')->where('id',16)->first();
        return view('home.jsgw.amount',['title'=>$key->titles,'keyworlds'=>$key->keyworlds,'description'=>$key->description]);
    }
    //news新闻
    public function news($id){
        $zhi = \DB::table('news')->select('id','title','time','leicon','click','titleimg')->where('pid',$id)->where('zhi',1)->first();
        $data = \DB::table('news')->select('id','title','time')->where('pid',$id)->orderBy('time','desc')->paginate(12);
        $xun = \DB::table('news')->select('id','title','click')->orderby('click','desc')->skip(0)->take(10)->get();
        $qi  = \DB::table('newslei')
            ->select('id','title','img')
            ->where('id','!=',$id)
            ->get();
        $tit = \DB::table('newslei')->where('id',$id)->first();
        
        return view('home.jsgw.news',['title'=>$tit->titles,'keyworlds'=>$tit->keyworlds,'description'=>$tit->description,'data'=>$data,'zhi'=>$zhi,'xun'=>$xun,'qi'=>$qi,'tit'=>$tit]);
    }
    public function newslist($id){

        $qi  = \DB::table('newslei')->select('id','title','img')->orderby('time','desc')->get();
        $xun = \DB::table('news')->select('id','title','click')->orderby('click','desc')->skip(0)->take(10)->get();
        $data = \DB::table('news')->select('id','title','click','yuan','content','time','pid','titles','keyworlds','description')->where('id',$id)->first();
        if( $data ==null )
        {   
            return back();
        }
        $num = $data->click + 1;
        \DB::table('news')->where('id',$id)->update(['click'=>$num]);
        $tit = \DB::table('newslei')->select('id','title')->where('id',$data->pid)->first();
        return view('home.jsgw.newslist',['data'=>$data,'title'=>$data->titles,'keyworlds'=>$data->keyworlds,'description'=>$data->description,'qi'=>$qi,'xun'=>$xun,'tit'=>$tit]);
    }

    public function franchise(){
        $key = \DB::table('webpage')->select('titles','keyworlds','description')->where('id',21)->first();
        return view('home.jsgw.franchise',['title'=>$key->titles,'keyworlds'=>$key->keyworlds,'description'=>$key->description,'es' =>1]);
    }

    public function zmajax(Request $request)
    {   
        $data = $request->except('_token');
        $data['time'] = time();
        $name = \DB::table('framchise')->where('name',$data['name'])->first();

        if($name)
        {
            if($data['name'] == $name->name && $data['email'] == $name->email && $data['phone'] == $name->phone)
            {
                return response()->json(3);
            }else
            {
                \DB::table('framchise')->delete($name->id);
            }
        }

        $res = \DB::table('framchise')->insert($data);
        if($res)
        {
            return response()->json(1);
        }else
        {
            return response()->json(2);

        }
    }
    public function honest()
    {
        $key = \DB::table('webpage')->select('titles','keyworlds','description')->where('id',22)->first();
        return view('home.jsgw.honest',['title'=>$key->titles,'keyworlds'=>$key->keyworlds,'description'=>$key->description,'es' =>2]);
    }

    public function cgs()
    {
        $key = \DB::table('webpage')->select('titles','keyworlds','description')->where('id',23)->first();
        return view('home.jsgw.cgs',['title'=>$key->titles,'keyworlds'=>$key->keyworlds,'description'=>$key->description,'es' =>3]);

    }

    public function supply()
    {
        $key = \DB::table('webpage')->select('titles','keyworlds','description')->where('id',26)->first();
        return view('home.jsgw.supply',['title'=>$key->titles,'keyworlds'=>$key->keyworlds,'description'=>$key->description,'es' =>4]);

    }
}
