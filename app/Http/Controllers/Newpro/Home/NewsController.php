<?php

namespace App\Http\Controllers\Newpro\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{   
    public function newslistall(Request $request)
    {
        $title = getwebpage($request->path());
        $lei = \DB::table('newslei')->select('id','title')->get();
        foreach($lei as $k => $v)
        {   
            $lei_s[$k] = $v->title; 
            $v->news = \DB::table('news')->select('id','pid','title','titleimg','leicon','time','click')->where('pid',$v->id)->orderBy('time','desc')->offset(0)->limit(12)->get();
        }
        array_push($lei_s,'常见问答');
        $hot = \DB::table('news')->select('id','pid','title','titleimg','leicon','time','click')->orderBy('click','desc')->offset(0)->limit(10)->get();
        $avtive = $request->input('pid',false);

        $inter = \DB::table('interlocution')
                ->select('id','title','content','time','click')
                ->orderBy('time','desc')
                ->offset(0)
                ->limit(20)
                ->get();
        if(!in_array($avtive,$lei_s))
        {   
            $avtive = $lei_s[0];
        }

        return view('Newpro.Home.News.newslistall',['title'=>$title,'lei'=>$lei,'hot'=>$hot,'avtive'=>$avtive,'inter'=>$inter]);
    }

    function newslistget(Request $request)
    {   
        $pid = $request->pid;
        $index = $request->index;
        
        if($pid == 'inter')
        {
            $data = \DB::table('interlocution')->select('id','title','content','time','click')->orderBy('time','desc')->offset($index)->limit(20)->get();
            if($data)
            {
                $data[0]->count = count($data);
                if($data[0]->count < 20)
                {
                    $data[0]->init = false;
                }
                $data[0]->index = $data[0]->count +$index ;
                foreach($data as $k => $v)
                {
                    $v->date = date('Y-m-d',$v->time);
                }
                return response()->json($data);

            }else
            {
                return response()->json(false);
            }
        }

        $data = \DB::table('news')->select('id','pid','title','titleimg','leicon','time','click')->where('pid',$pid)->orderBy('time','desc')->offset($index)->limit(12)->get();
        if($data)
        {
            $data[0]->count = count($data);
            if($data[0]->count < 12)
            {
                $data[0]->init = false;
            }
            $data[0]->index = $data[0]->count +$index ;
            foreach($data as $k => $v)
            {
                $v->date = date('Y-m-d',$v->time);
            }
            return response()->json($data);

        }else
        {
            return response()->json(false);
        }
    }

   

    public function newsplay($id)
    {
        $data = \DB::table('news')
                ->select('id','title','yuan','time','titleimg','content','click','pid','leicon','keyworlds','description','titles')
                ->where('id',$id)
                ->first();
        if(!$data)
        {
            return back()->with(['info'=>'数据不存在']);
        }

        $title = [
            'title'=> $data->titles,
            'keyworlds'=> $data->keyworlds,
            'description'=> $data->description,
        ];
        \DB::table('news')->where('id',$data->id)->update(['click'=>$data->click + 1]);
        $ban = \DB::table('newslei')->select('id','title','img')->get();
        $pid = \DB::table('newslei')->select('id','title')->where('id',$data->pid)->first();
        $click = \DB::table('news')->select('titleimg','id','click','title')->orderBy('click','desc')->offset(0)->limit(10)->get();
        // dd($click);
        return view('Newpro.Home.News.newsplay',['data'=>$data,'title'=>$title,'pid'=>$pid,'ban'=>$ban,'click'=>$click]);
    }

    public function sou(Request $request)
    {
        $key = $request->input('sou');
        $data = \DB::table('news')->select('id','title','leicon','time','click','titleimg','pid','zhi')
                ->where('title','like','%'.$key.'%')
                // ->where('zhi','!=',1)
                ->orderBy('time','desc')
                ->paginate(12);
        
        $data->appends(['sou'=>$key]);
        $tus = [];
        if($data->count() <= 0)
        {
            $tus = \DB::table('news')->select('id','title','leicon','time','click','titleimg','pid','zhi')
                    // ->where('zhi','!=',1)
                    ->orderBy('time','desc')
                    ->offset(0)
                    ->limit(8)
                    ->get();
        }else
        {
            foreach($data as $k => $v)
            {
                $v->title = preg_replace('/'.$key.'/','<b style="color:#E12E32">'.$key.'</b>',$v->title);
            }
        }
        $ors = \DB::table('newslei')
                ->select('id','title')
                ->get();
        if( count($ors) > 0 )
        {   
            foreach($ors as $k => $v)
            {
                $v->data = \DB::table('news')
                            ->select('id','title','leicon','click')
                            ->where('pid',$v->id)
                            ->orderBy('click','desc')
                            ->offset(0)
                            ->limit(5)
                            ->get();
            }
        }
        return view('Newpro.Home.News.sou',['data'=>$data,'tus'=>$tus,'ors'=>$ors,'request'=>$request->all()]);
    }
}
