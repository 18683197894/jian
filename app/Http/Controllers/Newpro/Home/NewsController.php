<?php

namespace App\Http\Controllers\Newpro\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    public function newslist(Request $request,$id)
    {
    	$titles = \DB::table('newslei')
    		->select('id','title','img','titles','keyworlds','description')
    		->where('id',$id)
    		->first();
    	if(!$titles)
    	{
    		return back()->with(['info'=>'列表不存在']);
    	}
        $title = [
            'title'=> $titles->title,
            'keyworlds'=> $titles->keyworlds,
            'description'=> $titles->description,
        ];
    	$data = \DB::table('news')
    			->select('id','title','leicon','time','click','titleimg','pid','zhi')
    			->where('pid',$id)
    			// ->where('zhi','!=',1)
    			->orderBy('time','desc')
    			->paginate(8);
    	
    	$ors = \DB::table('newslei')
    			->select('id','title')
    			->where('id','!=',$id)
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
    	$zhi = \DB::table('news')
    			->join('banimg','news.id','=','banimg.pid')
    			->select('news.id','news.title','news.pid','banimg.img')
    			->where('news.pid',$id)
    			->offset(0)
    			->limit(4)
    			->get();
    	$zhis = \DB::table('newsban')->select('title','con')->where('pid',$id)->get();


    	return view('Newpro.Home.News.newslist',['title'=>$title,'titles'=>$titles,'data'=>$data,'ors'=>$ors,'zhis'=>$zhis,'zhi'=>$zhi]);
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
        \DB::table('news')->update(['click'=>$data->click + 1]);
        $ban = \DB::table('newslei')->select('id','title','img')->get();
        $pid = \DB::table('newslei')->select('id','title')->where('id',$data->pid)->first();
        $click = \DB::table('news')->select('titleimg','id','click','title')->orderBy('click','desc')->offset(0)->limit(10)->get();
        // dd($click);
        return view('Newpro.Home.News.newsplay',['data'=>$data,'title'=>$title,'pid'=>$pid,'ban'=>$ban,'click'=>$click]);
    }

    
}
