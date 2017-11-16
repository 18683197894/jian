<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
class AdminController extends Controller
{
    function index(){
    	$data = \DB::table('gongyi')->select('id','img','title')->offset(0)->limit(10)->get();
    	$plate = \DB::table('plate')->select('id','img','title','time')->orderby('time','desc')->offset(0)->limit(10)->get();
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
    	return view('Home.index',['data'=>$data,'plate'=>$plate,'case'=>$case,'keyworlds'=>$key->keyworlds,'description'=>$key->description]);
    }

    public function sou(Request $request)
    {   
        $key = isset($request->con)?trim($request->con):'';
        $arr = array();
       
        $plate = \DB::table('platenews')->select('id','title','time','pid','click')->where('title','like','%'.$key.'%')->orderby('time','desc')->get();
        $gongyi = \DB::table('gongyinews')->select('id','title','time','zhi','click')->where('title','like','%'.$key.'%')->orderby('time','desc')->get();
        $data = \DB::table('news')->select('id','title','time','yuan','click')->where('title','like','%'.$key.'%')->orderBy('time','desc')->get();
        
        $xun1 = \DB::table('news')->select('id','title','time','yuan','click')->get()->toArray();
        $xun2 = \DB::table('gongyinews')->select('id','title','zhi','time','click')->get()->toArray();
        $xun3 = \DB::table('platenews')->select('id','title','time','pid','click')->get()->toArray();
        $xun = array_merge($xun1,$xun2,$xun3);
       
        $other = [];
        $paginator = [];
         function num($num1,$num2,$arr)
            {
                if(is_array($num1) && is_array($num2) && is_array($arr) )
                {
                     array_multisort($num1,SORT_NUMERIC,SORT_DESC,$num2,SORT_NUMERIC,SORT_DESC,$arr);
                }
                return $arr;
            }
        
        $arr = array_merge($data->toArray(),$gongyi->toArray(),$plate->toArray());
        
        if( count($arr) > 0 )
        {

        foreach( $arr as $aa => $bb )
        {
            $num1[$aa] = $bb->click;
            $num2[$aa] = $bb->time;
        }
        $arr = num($num1,$num2,$arr);
        
        //分页显示条数
        $perPage = 10;
        //判断页面分页url是第几页
        if( $request->has('page') )
        {
            $current_page = $request->input('page');
            $current_page = $current_page <=0?1:$current_page;
        }else
        {
            $current_page = 1;
        }
        //数组切片 获取当前页的数据
        $item = array_slice($arr,($current_page - 1) * $perPage,$perPage);

        //获取总数
        $total = count($arr);

        //手动创建分页 等同于 paginate() 
        //传递数据到分页模型 ：当前页的数据，每页显示条数，第几页
        $paginator = new LengthAwarePaginator($item,$total,$perPage,$current_page,[
            'path' => Paginator::resolveCurrentPath(), //设置分页的地址
            'pageName' => 'page',  //页面url第几页的标识 可无 默认page
            ]);

        //设置分页的地址
        // $paginator ->setPath(Paginator::resolveCurrentPath());

        //将搜索条件写入分页链接
        $paginator->appends(['con'=>$key]);
         
        }else
        {
          
            shuffle($xun);
            $other = array_slice($xun,0,12);
            foreach( $other as $key => $value )
            {
                $click[$key] = $value->click;
                $time[$key] = $value->time; 
            }
            
           
            $other = num($click,$time,$other);
            

        }
        // $xun = \DB::table('news')->select('id','title')->orderby('click','desc')->skip(0)->get();
        foreach( $xun as $z => $v )
        {
            $cl[$z] = $v->click;
            $ti[$z] = $v->time;
        }
        $xuns = num($cl,$ti,$xun);
        $xuns  = array_slice($xuns,0,10);

        return view('Home.sou.sou',['other'=>$other,'title'=>$key,'data'=>$paginator,'request'=>$request->all(),'xun'=>$xuns]);
    }
}
