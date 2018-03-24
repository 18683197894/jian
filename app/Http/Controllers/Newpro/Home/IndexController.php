<?php

namespace App\Http\Controllers\Newpro\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index(Request $request)
    {	

    	$news =\DB::table('news')
                        ->select('id','titleimg','title','leicon','time')
                        ->where('szhi',1)
                        ->orderBy('time','desc')
                        ->get()->toArray();

    	$count =count($news);
        if($count < 8)
        {
            $newss = \DB::table('news')
                        ->select('id','titleimg','title','leicon','time')
                        ->where('szhi',0)
                        ->orderBy('time','desc')
                        ->offset(0)
                        ->limit(8 - $count)
                        ->get()->toArray();
            $news = array_merge($news,$newss);
        }
        //d
        $titles = getwebpage();
        $case = \DB::table('case')
        ->select('id','title','effect1','effect2','huxing','fengge','yusuan')
        ->where('or',5)
        ->orderBy(\DB::raw('RAND()'))
        ->take(4)
        ->get();

        foreach ($case as $kk => $vv) 
        {   
            $vv->eff = array();
            $vv->keting = explode(',', $vv->effect2)[0];
            
            $ass1 = explode(',', $vv->effect1);
            $ass2 = explode(',', $vv->effect2);
            array_shift($ass1);
            array_shift($ass2);
            
            $arr=array_combine($ass1,$ass2);
            $arr = $this->shuffle_assoc($arr);

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
        $plate = \DB::table('newslei')->select('id','img','title','time')->orderby('time','desc')->offset(0)->limit(10)->get();
        foreach($plate as $k => $v)
        {
            $plate[$k]->news = \DB::table('news')->select('id','title','time')->where('pid',$v->id)->offset(0)->limit(4)->orderBy('time','desc')->get();
        }
    	return view('Newpro.Home.Index.index',['title'=>$titles,'news'=>$news,'case'=>$case,'plate'=>$plate]);
    }
    public function shuffle_assoc($list) {  
            if (!is_array($list)) return $list;  
               
            $keys = array_keys($list);  
            shuffle($keys);  
            $random = array();  
            foreach ($keys as $key)  
            $random[$key] = $this->shuffle_assoc($list[$key]);  
            return $random;  
         }
}
