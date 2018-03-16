<?php

namespace App\Http\Controllers\Newpro\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StyleController extends Controller
{
    public function styleindex(Request $request)
    {	
    	$title = getwebpage($request->path());
    	$data = \DB::table('packages')->select('id','title')->where('id',1)->get();
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

        $qing = \DB::table('qing')->where('id',1)->select('id','money','name','path')->first();
    	$yi = \DB::table('qing')->where('id',2)->select('id','money','name','path')->first();
    	return view('Newpro.Home.Product.styleindex',['title'=>$title,'data'=>$data,'qing'=>$qing,'path'=>$request->path(),'yi'=>$yi]);
    }
    public function paygouajax(Request $request)
    {
        $id = $request->id;
        $ors = $request->ors;
        $num = $request->input('num',1);
        $user = $request->session()->get('Home',null);
        if(!$user)
        {
            return response()->json(3);
        }
        if($ors == 'qing')
        {
            $over = \DB::table('playgou')->where('uid',$user->id)->where('tus',$ors)->first();
        }else if($ors == 'yi')
        {
            $over = \DB::table('playgou')->where('uid',$user->id)->where('tus',$ors)->first();
        }else
        {
            $over = \DB::table('playgou')->where('uid',$user->id)->where('tus',$ors)->where('pid',$id)->first();

        }

        
        if($over)
        {   
            if($ors == 'qing')
            {
                \DB::table('playgou')->where('id',$over->id)->update(['num'=>$num]);
                return response()->json(1);
            }

            $num = $over->num + 1;
            \DB::table('playgou')->where('id',$over->id)->update(['num'=>$num]);
            return response()->json(1);

        }
        if($ors == 'qing')
        {   
            $qings = \DB::table('qing')->select('id','name','path','money')->where('id',1)->first();
            $data = [
                    'pid'=>0,
                    'name' => $qings->name,
                    'tus' => 'qing',
                    'time'=>time(),
                    'num' => $num,
                    'status' => 0,
                    'uid'=>$user->id
                    ];
        }else if($ors == 'yi')
        {   
            $yis = \DB::table('qing')->select('id','name','path','money')->where('id',2)->first();
            $data = [
                    'pid'=>0,
                    'name' => $yis->name,
                    'tus' => 'yi',
                    'time'=>time(),
                    'num' => $num,
                    'status' => 0,
                    'uid'=>$user->id
                    ];
        }else
        {
           $data = [
                'pid'=>$id,
                'name' => \DB::table('door')->select('id','title')->where('id',$id)->first()->title,
                'tus' => $ors,
                'time'=>time(),
                'num' => $num,
                'status' => 0,
                'uid'=>$user->id
                ]; 
        }
        
        $res = \DB::table('playgou')->insert($data);
        if($res)
        {
            return response()->json(1);
        }else
        {
            return response()->json(2);
        }
    }
}
