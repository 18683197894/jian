<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    function index(){
    	$data = \DB::table('gongyi')->offset(0)->limit(10)->get();
    	$plate = \DB::table('plate')->offset(0)->limit(10)->get();
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
    		$plate[$k]->news = \DB::table('platenews')->where('pid',$v->id)->offset(0)->limit(4)->orderBy('time','desc')->get();
    	}
    	
    	return view('home.index',['data'=>$data,'plate'=>$plate,'case'=>$case]);
    }

    
}
