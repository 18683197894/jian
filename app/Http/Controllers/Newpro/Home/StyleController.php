<?php

namespace App\Http\Controllers\Newpro\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StyleController extends Controller
{
    public function styleindex(Request $request)
    {	
    	$title = getwebpage($request->path());
    	$data = \DB::table('packages')->select('id','title')->get();
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
    	$qing = \DB::table('qing')->select('money')->first()->money;
    	return view('Newpro.Home.Product.styleindex',['title'=>$title,'data'=>$data,'qing'=>$qing,'path'=>$request->path()]);
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

        $over = \DB::table('playgou')->where('uid',$user->id)->where('tus',$ors)->where('pid',$id)->first();
        
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
        
        $data = [
                    'pid'=>$id,
                    'name' => \DB::table('door')->select('id','title')->where('id',$id)->first()->title,
                    'tus' => $ors,
                    'time'=>time(),
                    'num' => $num,
                    'status' => 0,
                    'uid'=>$user->id
                    ];
        // return response()->json($data);
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
