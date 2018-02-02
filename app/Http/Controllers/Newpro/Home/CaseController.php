<?php

namespace App\Http\Controllers\Newpro\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CaseController extends Controller
{
    public function index(Request $request)
    {	
    	$titles = getwebpage($request->path());
    	$wan = \DB::table('case')
    		->select('id','title','huxing','fengge','yusuan','or','time','effect2')
    		->where('or',5)
    		->orderBy('time','desc')
    		->Paginate(8);
        
    	$zai = \DB::table('case')
    			->select('id','title','huxing','fengge','yusuan','or','time','img1','img2','img3','img4')
    			->whereBetween('or',[1,4])
    		    ->orderBy('time','desc')
    			->skip(0)
    			->take(8)
    			->get();

    	$request->setTrustedProxies(array('10.32.0.1/16'));  
		$ip = $request->getClientIp();

		$set = \Cache::get($ip.'case',1);
		
    	
    	$countwan = $wan->total();
    	$countzai = \DB::table('case')->select('id')->whereBetween('or',[1,4])->count();
    
    	if($countwan <= 0 )
    	{
    		$wan = \DB::table('case')
    		->select('id','title','huxing','fengge','yusuan','or','time','effect2')
    		->where('or',5)
    		->inRandomOrder()
    		->skip(0)
    		->take(8)
    		->get();
    	}

    	if($countzai <= 0 )
    	{
    		$zai = \DB::table('case')
    		->select('id','title','huxing','fengge','yusuan','or','time','img1','img2','img3','img4')
    		->whereBetween('or',[1,4])
    		->inRandomOrder()
    		->offset(0)
    		->limit(8)
    		->get();
    		
    	}
    		foreach ($zai as $key => $value) {
    			if($value->or == 1)
    			{
    				$value->img = explode(',',$value->img1)[0];
    			}
    			if($value->or == 2)
    			{
    				$value->img = explode(',',$value->img2)[0];
    			}
    			if($value->or == 3)
    			{
    				$value->img = explode(',',$value->img3)[0];
    			}
    			if($value->or == 4)
    			{
    				$value->img = explode(',',$value->img4)[0];
    			}
    		}
    	
    		foreach($wan as $k => $v)
    		{
    			$v->img = explode(',',$v->effect2)[0];
    		}

    	$arr[0] = array('全部','小户型','二室','三室','四室','公寓','别墅','复式','自建','其他');
    	$arr[1] = array('全部','地中海','中式','港式','美式','欧式','混搭','田园','现代','新古典','东南亚','日式','宜家','北欧','简欧','简约','韩式','法式','工业风','新中式','其他');
    	$arr[2] = array('全部','5万以下','5万-8万','8万-12万','12万-18万','18万-30万','30万-50万','50万以上','其他');
    	return view('Newpro.Home.Case.index',['set'=>$set,'arr'=>$arr,'title'=>$titles,'wan'=>$wan,'zai'=>$zai,'countwan'=>$countwan,'countzai'=>$countzai]);
    }

    function setajax(Request $request)
    {	
    	$request->setTrustedProxies(array('10.32.0.1/16'));  
		$ip = $request->getClientIp(); 

    	$id = $request->id;
    	if($id==1 || $id ==2)
    	{
    		\Cache::put($ip.'case',$id,30);
    	}
    	
    }

    public function getmoreajax(request $request)
    {
        $count = $request->count;
        $num = $request->num;
        $huxing = $request->huxing;
        $fengge = $request->fengge;
        $yusuan = $request->yusuan;
        $a='=';
        $b='=';
        $c='=';
        if($huxing == '全部')
        {
            $a='!=';
        }
        if($fengge == '全部')
        {
            $b='!=';
        }
        if($yusuan == '全部')
        {
            $c='!=';
        }
        
        $data = \DB::table('case')
                ->select('id','title','huxing','fengge','yusuan','or','time','img1','img2','img3','img4','time')
                ->whereBetween('or',[1,4])
                ->where('huxing',$a,$huxing)
                ->where('fengge',$b,$fengge)
                ->where('yusuan',$c,$yusuan)
                ->orderBy('time','desc')
                ->skip($num)
                ->take(8)
                ->get();
        if(count($data) <= 0)
        {
            return response()->json(2);
        }
        foreach ($data as $key => $value) {
                if($value->or == 1)
                {
                    $value->img = explode(',',$value->img1)[0];
                }
                if($value->or == 2)
                {
                    $value->img = explode(',',$value->img2)[0];
                }
                if($value->or == 3)
                {
                    $value->img = explode(',',$value->img3)[0];
                }
                if($value->or == 4)
                {
                    $value->img = explode(',',$value->img4)[0];
                }
            }
        
           
        $data[0]->num = $num+$data->count();
        return response()->json($data);

    }

    public function zaiajax(request $request)
    {
        $huxing = $request->huxing;
        $fengge = $request->fengge;
        $yusuan = $request->yusuan;
        $a='=';
        $b='=';
        $c='=';
        if($huxing == '全部')
        {
            $a='!=';
        }
        if($fengge == '全部')
        {
            $b='!=';
        }
        if($yusuan == '全部')
        {
            $c='!=';
        }
        $data = \DB::table('case')
                ->select('id','title','huxing','fengge','yusuan','or','time','img1','img2','img3','img4','time')
                ->whereBetween('or',[1,4])
                ->where('huxing',$a,$huxing)
                ->where('fengge',$b,$fengge)
                ->where('yusuan',$c,$yusuan)
                ->orderBy('time','desc')
                ->skip(0)
                ->take(8)
                ->get();
        if(count($data) <= 0)
        {
            $data = \DB::table('case')
            ->select('id','title','huxing','fengge','yusuan','or','time','img1','img2','img3','img4')
            ->whereBetween('or',[1,4])
            ->inRandomOrder()
            ->offset(0)
            ->limit(8)
            ->get();
            $data[0]->ors = 2;

        }else
        {
            $data[0]->count = \DB::table('case')
                ->select('id','title','huxing','fengge','yusuan','or','time','img1','img2','img3','img4','time')
                ->whereBetween('or',[1,4])
                ->where('huxing',$a,$huxing)
                ->where('fengge',$b,$fengge)
                ->where('yusuan',$c,$yusuan)
                ->count();
            $data[0]->num = 8;
            $data[0]->ors = 1;
        }
        foreach ($data as $key => $value) {
                if($value->or == 1)
                {
                    $value->img = explode(',',$value->img1)[0];
                }
                if($value->or == 2)
                {
                    $value->img = explode(',',$value->img2)[0];
                }
                if($value->or == 3)
                {
                    $value->img = explode(',',$value->img3)[0];
                }
                if($value->or == 4)
                {
                    $value->img = explode(',',$value->img4)[0];
                }
            }
        return response()->json($data);
    }

    public function pagemoreajax(Request $request)
    {
        $page = $request->page;
        $huxing = $request->huxing;
        $fengge = $request->fengge;
        $yusuan = $request->yusuan;
        $a='=';
        $b='=';
        $c='=';
        if($huxing == '全部')
        {
            $a='!=';
        }
        if($fengge == '全部')
        {
            $b='!=';
        }
        if($yusuan == '全部')
        {
            $c='!=';
        }

        $res = \DB::table('case')
            ->select('id','title','huxing','fengge','yusuan','or','time','effect2')
            ->where('or',5)
            ->where('huxing',$a,$huxing)
            ->where('fengge',$b,$fengge)
            ->where('yusuan',$c,$yusuan)
            ->orderBy('time','desc')
            ->Paginate(8,['*'],'page',$page);
            foreach($res as $k => $v)
            {
                $v->img = explode(',',$v->effect2)[0];
            }
        $res->setPath("http://www.jianshanglianmeng.com/newpro/case/index");
        $data['url'] = htmlspecialchars_decode($res->links());
        $data['data'] =$res->items();
       return response()->json($data);
    }

    public function wanajax(Request $request)
    {
        $page = $request->page;
        $huxing = $request->huxing;
        $fengge = $request->fengge;
        $yusuan = $request->yusuan;
        $a='=';
        $b='=';
        $c='=';
        if($huxing == '全部')
        {
            $a='!=';
        }
        if($fengge == '全部')
        {
            $b='!=';
        }
        if($yusuan == '全部')
        {
            $c='!=';
        }

        $wan = \DB::table('case')
            ->select('id','title','huxing','fengge','yusuan','or','time','effect2')
            ->where('or',5)
            ->where('huxing',$a,$huxing)
            ->where('fengge',$b,$fengge)
            ->where('yusuan',$c,$yusuan)
            ->orderBy('time','desc')
            ->Paginate(8);
            $countwan = $wan->total();
        $wan->setPath("http://www.jianshanglianmeng.com/newpro/case/index");
        
            if($countwan <= 0 )
            {
                $data = \DB::table('case')
                ->select('id','title','huxing','fengge','yusuan','or','time','effect2')
                ->where('or',5)
                ->inRandomOrder()
                ->skip(0)
                ->take(8)
                ->get();
                $data[0]->ors = 2;
                $data[0]->count = 0;
            }else
            {   
                $data = $wan->items();
                $data[0]->ors = 1;
                $data[0]->count = $wan->total();
                $data[0]->url = htmlspecialchars_decode($wan->links()); ;
            }
            foreach($data as $k => $v)
            {
                $v->img = explode(',',$v->effect2)[0];
            }
            return response()->json($data);
    }

    public function play($id)
    {
        $data = \DB::table('case')
        ->select('id','title','huxing','fengge','yusuan','titles','keyworlds','description','or','img1','img2','img3','img4','time','effect1','effect2')
        ->where('id',$id)
        ->where('or',5)
        ->first();

        if(!$data)
        {
            return back()->with(['info'=>'数据不存在']);
        }
        $title['titles'] = $data->titles;
        $title['keyworlds'] = $data->keyworlds;
        $title['description'] = $data->description;
        
        if($data->or == 5)
        {
            $a = explode(',',$data->effect1);
            $b = explode(',',$data->effect2);
            $data->img =array_combine($a,$b);
            $data->img1 = explode(',',$data->img1);
            $data->img2 = explode(',',$data->img2);
            $data->img3 = explode(',',$data->img3);
            $data->img4 = explode(',',$data->img4);
            $data->effect2 = explode(',',$data->effect2);
            $data->effect1 = explode(',',$data->effect1);
            
            return view('Newpro.Home.Case.play',['title'=>$title,'data'=>$data]);
        }else
        {
            return back();
        }
    }
}
    

        
                    