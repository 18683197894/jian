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
    		->select('id','title','huxing','fengge','yusuan','or','time','effect2','suoimg')
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
    	

		$set = \Cookie::get('case',1);
    	
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
                if($v->suoimg == null)
                {
                    $v->img = explode(',',$v->effect2)[0];
                }else
                {
                    $v->img = $v->suoimg;
                }
    		}
    	$arr[0] = array('小户型','二室','三室','四室','公寓','别墅','复式','自建','其他');
    	$arr[1] = array('简欧','简美','港式','美式','欧式','混搭','田园','现代','新古典','东南亚','日式','宜家','北欧','简约','韩式','地中海','中式','法式','工业风','新中式','清水房','其他');
        $arr[2] = array('5万-10万','10万-15万','15万-20万','20万-25万','25万-30万','30万-35万','35万-40万','40万-45万','45万-50万','50万以上','其他');
    	// $arr[2] = array('5万以下','5万-8万','8万-12万','12万-18万','18万-30万','30万-50万','50万以上','其他');
    	return \View::make('Newpro.Home.Case.index',['set'=>$set,'arr'=>$arr,'title'=>$titles,'wan'=>$wan,'zai'=>$zai,'countwan'=>$countwan,'countzai'=>$countzai]);
    }
   
    function setajax(Request $request)
    {	
    	$request->setTrustedProxies(array('10.32.0.1/16'));  
		$ip = $request->getClientIp(); 

    	$id = $request->id;
    	if($id==1 || $id ==2)
    	{  
            \Cookie::queue('case',$id,60);
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
        if($huxing == null)
        {
            $a='!=';
        }
        if($fengge == null)
        {
            $b='!=';
        }
        if($yusuan == null)
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
        if($huxing == null)
        {
            $a='!=';
        }
        if($fengge == null)
        {
            $b='!=';
        }
        if($yusuan == null)
        {
            $c='!=';
        }

        $res = \DB::table('case')
            ->select('id','title','huxing','fengge','yusuan','or','time','effect2','suoimg')
            ->where('or',5)
            ->where('huxing',$a,$huxing)
            ->where('fengge',$b,$fengge)
            ->where('yusuan',$c,$yusuan)
            ->orderBy('time','desc')
            ->Paginate(8,['*'],'page',$page);
            foreach($res as $k => $v)
            {
                if($v->suoimg == null)
                {
                    $v->img = explode(',',$v->effect2)[0];
                }else
                {
                    $v->img = $v->suoimg;
                }
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
        $a = '=';
        $b = '=';
        $c = '=';
        if(!$huxing)
        {
            $a = '!=';
        }
        if(!$fengge)
        {
            $b = '!=';
        }
        if(!$yusuan)
        {
            $c = '!=';
        }

        $wan = \DB::table('case')
            ->select('id','title','huxing','fengge','yusuan','or','time','effect2','suoimg')
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
                ->select('id','title','huxing','fengge','yusuan','or','time','effect2','suoimg')
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
                if($v->suoimg == null)
                {
                    $v->img = explode(',',$v->effect2)[0];
                }else
                {
                    $v->img = $v->suoimg;
                }
            }
            return response()->json($data);
    }

    public function play(Request $request,$id)
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
        $title['title'] = $data->titles;
        $title['keyworlds'] = $data->keyworlds;
        $title['description'] = $data->description;
        
        
            
            $data->img1 = explode(',',$data->img1);
            $data->img2 = explode(',',$data->img2);
            $data->img3 = explode(',',$data->img3);
            $data->img4 = explode(',',$data->img4);
            $data->effect2 = explode(',',$data->effect2);
            $data->effect1 = explode(',',$data->effect1);
            $data->eff = array_combine($data->effect1,$data->effect2);
            $a = $request->input('a',null);
            $b = $request->input('b',null);
            if(!in_array($a,$data->effect1) || !in_array($b,$data->effect2))
            {
                $a = null;$b=null;
            }
            
            return view('Newpro.Home.Case.play',['title'=>$title,'data'=>$data,'a'=>$a,'b'=>$b]);
        
    }

    public function playindex(Request $request)
    {   
        $request->setTrustedProxies(array('10.32.0.1/16'));  
        $ip = $request->getClientIp(); 
        $a = $request->input('a',1);
        if($a == 1)
        {
            \Cache::put($ip.'case',1,50);
        }elseif($a == 2)
        {
            \Cache::put($ip.'case',2,50);
        }
        
        return redirect('/newpro/case/index');

    }

    public function zaiplay(Request $request)
    {
        $id = $request->id;
        $data = \DB::table('case')
            ->select('id','title','huxing','fengge','yusuan','titles','keyworlds','description','or','img1','img2','img3','img4','time')
            ->where('id',$id)
            ->where('or','!=',$id)
            ->first();
        if(!$data)
        {
            return back()->with(['info'=>'数据不存在']);
        }
        $title['title'] = $data->titles;
        $title['keyworlds'] = $data->keyworlds;
        $title['description'] = $data->description;
        $data->img1 = $data->img1?explode(',',$data->img1):false;
        $data->img2 = $data->img2?explode(',',$data->img2):false;
        $data->img3 = $data->img3?explode(',',$data->img3):false;
        $data->img4 = $data->img4?explode(',',$data->img4):false;
        if($data->or == 1)
        {
            $data->img = $data->img1[0];
        }
        if($data->or == 2)
        {
            $data->img = $data->img2[0];
        }
        if($data->or == 3)
        {
            $data->img = $data->img3[0];
        }
        if($data->or == 4)
        {
            $data->img = $data->img4[0];
        }
       
        return view('Newpro.Home.Case.zaiplay',['title'=>$title,'data'=>$data]);
    }

    public function playajax(Request $request)
    {
        $data = $request->except('_token');
        $res = \DB::table('caseplay')->select('id')->where('phone',$data['phone'])->first();
        if($res)
        {
            return response()->json(3);
        }
        $data['status'] = 1;
        $data['time'] = time();
        
        $res_s = \DB::table('caseplay')->insert($data);
        if($res_s)
        {
            return response()->json(1);
        }else
        {
            return response()->json(2);
        }
    }
}
    

        
                    