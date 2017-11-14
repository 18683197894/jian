<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CaseController extends Controller
{
    function index(Request $request)
    {	
    	$request->setTrustedProxies(array('10.32.0.1/16'));  
		$ip = $request->getClientIp(); 

		// \Cache::put($ip.'1', '全部',5);
		// \Cache::put($ip.'2', '全部',5);
		// \Cache::put($ip.'3', '全部',5);
    	$ip1 = \Cache::get($ip.'1','全部');
    	$ip2 = \Cache::get($ip.'2','全部');
    	$ip3 = \Cache::get($ip.'3','全部');
		if($ip1 == '全部')
		{
			$wh1 = '!=';
		}else
		{
			$wh1 = '=';

		}
		
		if($ip2 == '全部')
		{
			$wh2 = '!=';
		}else
		{
			$wh2 = '=';

		}
		
		if($ip3 == '全部')
		{
			$wh3 = '!=';
		}else
		{
			$wh3 = '=';

		}
		
    	$data = \DB::table('case')->select('id','title','or','huxing','fengge','yusuan','effect2','time')->where('or','5')->where('huxing',$wh1,$ip1)->where('fengge',$wh2,$ip2)->where('yusuan',$wh3,$ip3)->orderBy('time','desc')->paginate(12);
    	$count = \DB::table('case')->select('id')->where('or','5')->where('huxing',$wh1,$ip1)->where('fengge',$wh2,$ip2)->where('yusuan',$wh3,$ip3)->count();
    	foreach ($data as $k => $v) {
    		$v->effect2 = explode(',',$v->effect2)[0];
    	}

    	$tui = [];
    	if( count($data) <=0 )
    	{
    		$tui = \DB::table('case')
    		->select('id','title','or','huxing','fengge','yusuan','effect2')
		   	->where('or','5')
		    ->orderBy(\DB::raw('RAND()'))
		    ->take(8)
		    ->get();
		    foreach ($tui as $kk => $vv) {
    		$vv->effect2 = explode(',',$vv->effect2)[0];
    	}
    	}
    	$key = \DB::table('webpage')->where('id',24)->first();

    	$arr1 = array('全部','小户型','二室','三室','四室','公寓','别墅','复式','自建','其他');
    	$arr2 = array('全部','地中海','中式','港式','美式','欧式','混搭','田园','现代','新古典','东南亚','日式','宜家','北欧','简欧','简约','韩式','法式','工业风','新中式','其他');
    	$arr3 = array('全部','5万以下','5万-8万','8万-12万','12万-18万','18万-30万','30万-50万','50万以上','其他');
    	return view('home.case.index',['title'=>$key->titles,'keyworlds'=>$key->keyworlds,'description'=>$key->description,'data'=>$data,'arr1'=>$arr1,'arr2'=>$arr2,'arr3'=>$arr3,'ip1'=>$ip1,'ip2'=>$ip2,'ip3'=>$ip3,'tui'=>$tui,'count'=>$count]);
    }

    public function tiaoajax(Request $request)
    {	
    	$request->setTrustedProxies(array('10.32.0.1/16'));  
		$ip = $request->getClientIp(); 

    	$ips = $request->ip;
    	$value = $request->value;
    	if($ips == 'ip1')
    	{
    		\Cache::put($ip.'1',$value,10);
    		return response()->json(1);
    	}

    	if($ips == 'ip2')
    	{
    		\Cache::put($ip.'2',$value,10);
    		return response()->json(1);
    	}

    	if($ips == 'ip3')
    	{
    		\Cache::put($ip.'3',$value,10);
    		return response()->json(1);
    	}

    	return response()->json(2);
    }

    public function zaiindex(Request $request)
    {
		$request->setTrustedProxies(array('10.32.0.1/16'));  
		$ip = $request->getClientIp(); 

		// \Cache::put($ip.'1', '全部',5);
		// \Cache::put($ip.'2', '全部',5);
		// \Cache::put($ip.'3', '全部',5);
    	$ip1 = \Cache::get($ip.'11','全部');
    	$ip2 = \Cache::get($ip.'22','全部');
    	$ip3 = \Cache::get($ip.'33','全部');
		if($ip1 == '全部')
		{
			$wh1 = '!=';
		}else
		{
			$wh1 = '=';

		}
		
		if($ip2 == '全部')
		{
			$wh2 = '!=';
		}else
		{
			$wh2 = '=';

		}
		
		if($ip3 == '全部')
		{
			$wh3 = '!=';
		}else
		{
			$wh3 = '=';

		}
		
    	$data = \DB::table('case')->select('id','title','or','huxing','fengge','yusuan','img1','img2','img3','img4')->where('or','!=',0)->where('or','!=',5)->where('huxing',$wh1,$ip1)->where('fengge',$wh2,$ip2)->where('yusuan',$wh3,$ip3)->orderBy('time','desc')->offset(0)->limit(5)->get();
    	$count = \DB::table('case')->select('id')->where('or','!=',0)->where('or','!=',5)->where('huxing',$wh1,$ip1)->where('fengge',$wh2,$ip2)->where('yusuan',$wh3,$ip3)->count();

    	foreach ($data as $k => $v) {
    		if($v->or == 1)
    		{
    			$v->effect2 = explode(',',$v->img1)[0];
    		}
    		if($v->or == 2)
    		{
    			$v->effect2 = explode(',',$v->img2)[0];
    		}
    		if($v->or == 3)
    		{
    			$v->effect2 = explode(',',$v->img3)[0];
    		}
    		if($v->or == 4)
    		{
    			$v->effect2 = explode(',',$v->img4)[0];
    		}
    	}

    	$tui = [];
    	if( count($data) <=0 )
    	{
    		$tui = \DB::table('case')
		   	->where('or','!=',0)
		   	->where('or','!=',5)
		    ->orderBy(\DB::raw('RAND()'))
		    ->take(5)
		    ->get();
		    foreach ($tui as $kk => $vv) {
    			if($vv->or == 1)
	    		{
	    			$vv->effect2 = explode(',',$vv->img1)[0];
	    		}
	    		if($vv->or == 2)
	    		{
	    			$vv->effect2 = explode(',',$vv->img2)[0];
	    		}
	    		if($vv->or == 3)
	    		{
	    			$vv->effect2 = explode(',',$vv->img3)[0];
	    		}
	    		if($vv->or == 4)
	    		{
	    			$vv->effect2 = explode(',',$vv->img4)[0];
	    		}
    	}
    	}
        $key = \DB::table('webpage')->where('id',25)->first();
    	
    	$arr1 = array('全部','小户型','二室','三室','四室','公寓','别墅','复式','自建','其他');
    	$arr2 = array('全部','地中海','中式','港式','美式','欧式','混搭','田园','现代','新古典','东南亚','日式','宜家','北欧','简欧','简约','韩式','法式','工业风','新中式','其他');
    	$arr3 = array('全部','5万以下','5万-8万','8万-12万','12万-18万','18万-30万','30万-50万','50万以上','其他');
    	return view('home.case.zaiindex',['title'=>$key->titles,'keyworlds'=>$key->keyworlds,'description'=>$key->description,'data'=>$data,'arr1'=>$arr1,'arr2'=>$arr2,'arr3'=>$arr3,'ip1'=>$ip1,'ip2'=>$ip2,'ip3'=>$ip3,'tui'=>$tui,'count'=>$count]);
    }
    public function zaiajax(Request $request)
    {	

		$request->setTrustedProxies(array('10.32.0.1/16'));  
		$ip = $request->getClientIp(); 

    	$ips = $request->ip;
    	$value = $request->value;

    	if($ips == 'ip1')
    	{
    		\Cache::put($ip.'11',$value,10);
    		return response()->json(1);
    	}

    	if($ips == 'ip2')
    	{
    		\Cache::put($ip.'22',$value,10);
    		return response()->json(1);
    	}

    	if($ips == 'ip3')
    	{
    		\Cache::put($ip.'33',$value,10);
    		return response()->json(1);
    	}

    	return response()->json(2);
    }

    public function jiaajax(Request $request)
    {
    	(int)$count = $request->count;
    	(int)$num = $request->num;

		$request->setTrustedProxies(array('10.32.0.1/16'));  
		$ip = $request->getClientIp(); 

		// \Cache::put($ip.'1', '全部',5);
		// \Cache::put($ip.'2', '全部',5);
		// \Cache::put($ip.'3', '全部',5);
    	$ip1 = \Cache::get($ip.'11','全部');
    	$ip2 = \Cache::get($ip.'22','全部');
    	$ip3 = \Cache::get($ip.'33','全部');
    	if($ip1 == '全部')
		{
			$wh1 = '!=';
		}else
		{
			$wh1 = '=';

		}
		
		if($ip2 == '全部')
		{
			$wh2 = '!=';
		}else
		{
			$wh2 = '=';

		}
		
		if($ip3 == '全部')
		{
			$wh3 = '!=';
		}else
		{
			$wh3 = '=';

		}
    	if( $num >= $count )
    	{
    		return response()->json(2);
    	}
    	$data = \DB::table('case')->select('time','id','effect2','img1','img2','img3','img4','or','title','fengge','yusuan','huxing')->where('or','!=',0)->where('or','!=',5)->where('huxing',$wh1,$ip1)->where('fengge',$wh2,$ip2)->where('yusuan',$wh3,$ip3)->orderBy('time','desc')->offset($num)->limit(5)->get();
    	
        foreach ($data as $k => $v) {
    		if($v->or == 1)
    		{
    			$v->effect2 = explode(',',$v->img1)[0];
    		}
    		if($v->or == 2)
    		{
    			$v->effect2 = explode(',',$v->img2)[0];
    		}
    		if($v->or == 3)
    		{
    			$v->effect2 = explode(',',$v->img3)[0];
    		}
    		if($v->or == 4)
    		{
    			$v->effect2 = explode(',',$v->img4)[0];
    		}
    	}
    	return response($data);
    }

    public function play($id)
    {	
    	$data = \DB::table('case')->select('id','title','fengge','huxing','yusuan','img1','img2','img3','img4','effect1','effect2','titles','keyworlds','description')->where('or',5)->where('id',$id)->first();
    	if($data == null)
    	{
    		return redirect('/home/case/index');
    	}
    	$data->effect1 = explode(',',$data->effect1);
    	$data->effect2 = explode(',',$data->effect2);
    	$data->img1    = explode(',',$data->img1);
    	$data->img2    = explode(',',$data->img2);
    	$data->img3    = explode(',',$data->img3);
    	$data->img4    = explode(',',$data->img4);
    	
    	return view('home.case.play',['title'=>$data->titles,'keyworlds'=>$data->keyworlds,'description'=>$data->description,'data'=>$data]);
    }
    public function playajax(Request $request)
    {
    	$uid = $request->uid;
    	$name = $request->name;
    	$phone = $request->phone;

    	$data = \DB::table('caseplay')->select('id')->where('name',$name)->where('phone',$phone)->where('uid',$uid)->where('status',0)->first();
    	if(count($data) >= 1 )
    	{
    		return response()->json(3);
    	}

    	$data1 = \DB::table('caseplay')->select('id','uid')->where('name',$name)->where('phone',$phone)->where('status',0)->where('uid','!=',$uid)->first();
    	
    	if(count($data1) >= 1 )
    	{	
    		$da = [];
    		$da['uid'] = $uid;
    		$da['time'] = time();
   
    		$res = \DB::table('caseplay')->where('id',$data1->id)->update($da);
    		if($res)
    		{
    			return response()->json(1);
    		}else
    		{
    			return response()->json(2);
    		}
    	}

    	$data2 = \DB::table('caseplay')->select('id','uid','name','name')->orwhere('phone',$phone)->where('status',0)->first();
    	if( count($data2) >=1 )
    	{
    		$da = [];
    		$da['uid'] = $uid;
    		$da['time'] = time();
    		$da['name'] = $name;
    		$res = \DB::table('caseplay')->where('id',$data2->id)->update($da);
    		if($res)
    		{
    			return response()->json(1);
    		}else
    		{
    			return response()->json(2);
    		}
    	}

        $arr = $request->except("_token");
        $arr['time'] = time();
        $res = \DB::table('caseplay')->insert($arr);
        if($res)
            {
                return response()->json(1);
            }else
            {
                return response()->json(2);
            }
    }

    public function indexurl(Request $request)
    {
    	$c = $request->c;
    	$a = $request->a;
    	$request->setTrustedProxies(array('10.32.0.1/16'));  
		$ip = $request->getClientIp(); 

		if($c == 'ip1')
		{
			\Cache::put($ip.'1',$a,5);
			\Cache::put($ip.'2','全部',5);
			\Cache::put($ip.'3','全部',5);

		}
		if($c == 'ip2')
		{
			\Cache::put($ip.'2',$a,5);
			\Cache::put($ip.'1','全部',5);
			\Cache::put($ip.'3','全部',5);

		}
		if($c == 'ip3')
		{	

			\Cache::put($ip.'3',$a,5);
			\Cache::put($ip.'2','全部',5);
			\Cache::put($ip.'1','全部',5);

		}

		return redirect('/home/case/index/');
    }

    public function zaiplay($id)
    {
    	$data = \DB::table('case')->select('id','title','huxing','fengge','yusuan','or','img1','img2','img3','img4','titles','keyworlds','description')->where('id',$id)->where('or','!=',5)->where('or','!=',0)->first();
    	if($data == null)
    	{
    		return redirect('/home/case/zaiindex');
    	}

    	if($data->or >= 1)
    	{
    		$data->img1 = explode(',',$data->img1);
    		$data->effect2 = $data->img1[0];
    	}else{
    		
    	}
    	if($data->or >= 2)
    	{
    		$data->img2 = explode(',',$data->img2);
    		$data->effect2 = $data->img2[0];

    	}
    	if($data->or >= 3)
    	{
    		$data->img3 = explode(',',$data->img3);
    		$data->effect2 = $data->img3[0];

    	}
    	if($data->or >= 4)
    	{
    		$data->img4 = explode(',',$data->img4);
    		$data->effect2 = $data->img4[0];

    	}
		

    	return view('home.case.zaiplay',['title'=>$data->titles,'keyworlds'=>$data->keyworlds,'description'=>$data->description,'data'=>$data]);
    }

    public function zaiurl(Request $request)
    {
		$c = $request->c;
    	$a = $request->a;
    
    	$request->setTrustedProxies(array('10.32.0.1/16'));  
		$ip = $request->getClientIp(); 

		if($c == 'pi1')
		{	

			\Cache::put($ip.'11',$a,5);
			\Cache::put($ip.'22','全部',5);
			\Cache::put($ip.'33','全部',5);

		}
		if($c == 'pi2')
		{
			\Cache::put($ip.'22',$a,5);
			\Cache::put($ip.'11','全部',5);
			\Cache::put($ip.'33','全部',5);

		}
		if($c == 'pi3')
		{	

			\Cache::put($ip.'33',$a,5);
			\Cache::put($ip.'22','全部',5);
			\Cache::put($ip.'11','全部',5);

		}

		return redirect('/home/case/zaiindex/');
    }
}
