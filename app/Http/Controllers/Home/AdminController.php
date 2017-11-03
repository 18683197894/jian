<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    function index(){
    	$data = \DB::table('gongyi')->select('id','img','title')->offset(0)->limit(10)->get();
    	$plate = \DB::table('plate')->select('id','img','title')->offset(0)->limit(10)->get();
        $case = \DB::table('case')
        ->select('id','title','effect1','effect2','huxing','fengge','yusuan')
        ->where('or',5)
        ->orderBy(\DB::raw('RAND()'))
        ->take(4)
        ->get();
         
        function shuffle_assoc($list) {  
            if (!is_array($list)) return $list;  
               
            $keys = array_keys($list);  
            shuffle($keys);  
            $random = array();  
            foreach ($keys as $key)  
            $random[$key] = shuffle_assoc($list[$key]);  
            return $random;  
         }

        foreach ($case as $kk => $vv) 
        {   
            $vv->eff = array();
            $vv->keting = explode(',', $vv->effect2)[0];
            
            $ass1 = explode(',', $vv->effect1);
            $ass2 = explode(',', $vv->effect2);
            array_shift($ass1);
            array_shift($ass2);

            $arr=array_combine($ass1,$ass2);
            $arr = shuffle_assoc($arr);
            $i = 0;
            foreach($arr as $l => $m)
            {   
                if($i <=1 )
                {
                     $vv->eff[$l] = $m;
                }
                $i ++;
            }
        }
       
    	foreach($plate as $k => $v)
    	{
    		$plate[$k]->news = \DB::table('platenews')->select('id','title')->where('pid',$v->id)->offset(0)->limit(4)->orderBy('time','desc')->get();
    	}
    	
        $key = \DB::table('webpage')->select('titles','keyworlds','description')->where('id',1)->first();
    	return view('home.index',['data'=>$data,'plate'=>$plate,'case'=>$case,'keyworlds'=>$key->keyworlds,'description'=>$key->description]);
    }

    public function sou(Request $request)
    {   
        $key = isset($request->con)?trim($request->con):'';

        $data = \DB::table('news')->select('id','title','time')->where('title','like','%'.$key.'%')->orderBy('time','desc')->paginate(18);
        $data->appends(['con'=>$key]);
        $xun = \DB::table('news')->select('id','title')->orderby('click','desc')->skip(0)->take(10)->get();
        $qi  = \DB::table('newslei')->select('id','title','img')->get();
        $other = [];
        if( count($data) <= 0 )
        {
            $other = \DB::table('news')->select('id','title','time')->orderby( \DB::raw('RAND()') )->take(12)->get();
        }
        return view('home.sou.sou',['other'=>$other,'title'=>$key,'data'=>$data,'request'=>$request->all(),'xun'=>$xun,'qi'=>$qi]);
    }
}
