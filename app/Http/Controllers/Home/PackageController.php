<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PackageController extends Controller
{
    public function allcse(){
        $key = \DB::table('webpage')->select('titles','keyworlds','description')->where('id',18)->first();
        $all = \DB::table('all')->select('id','title','con','img')->get();
        $zi =\DB::table('zi')->select('id','title','con','img','pid','jia')->get();
        $pack = \DB::table('pei')->select('id','title','pid')->where('sid',0)->get();
        $sub = \DB::table('pei')->select('id','title','sid')->where('sid','!=',0)->get();
        $age = \DB::table('pack')->select('id','title','con','img','paths')->get();

        foreach( $age as $q => $e )
        {   
            $e->path='';
            $e->jia =0;
            $e->img = explode(',',$e->img);
            $e->paths = explode('+',$e->paths);
            foreach( $e->paths as $aa => $bb)
            {
                foreach( $zi as $aaa => $bbb)
                {
                    if( $bb == $bbb->id )
                    {
                        $e->path .= '+'.$bbb->title;
                        $e->jia += $bbb->jia;
                    }
                }
            }
            $e->path = trim($e->path,'+');
        }
        // dd($age);
       

        foreach ($all as $k => $v) {
            $v->zi = [];
            foreach($zi as $kk => $vv)
            {   
                
                if($v->id == $vv->pid)
                {   

                    $v->zi[$kk] = $vv;
                }
            }
        }
        
        foreach ($all as $e => $a) {
            $a->pack = array();
            foreach ($pack as $s => $u) {
                if($a->id == $u->pid)
                {
                    $a->pack[$s] = $u;
                }
            }
        }
         
        foreach($all as $kkkk => $vvvv){
            foreach ($vvvv->pack as $j => $c) {
                $c->pei = [];
                foreach ($sub as $l => $o) {
                    if($o->sid == $c->id)
                    {
                        $c->pei[$l] = $o;
                    }
                }
               
            }
        }
        foreach( $all as $i => $j )
        {
            $j->width = (count($j->pack) * 100).'px';
        }
        
    	return view('Home.package.allcse',['all'=>$all,'age'=>$age,'title'=>$key->titles,'keyworlds'=>$key->keyworlds,'description'=>$key->description]);
    }

    public function softroll(){
    	$soft1 = \DB::table('fengge')->where('status',1)->orderBy('time')->get();
    	$column = \DB::table('column')->orderBy('time')->get();

    	foreach($soft1 as $k => $v)
    	{	$soft1[$k]->cc = [];
    		foreach($column as $kk =>$vv)
    	{
    		if($vv->pid == $soft1[$k]->id)
    		{	
    			$soft1[$k]->cc[$kk] = $vv;
    			
    		}
    	}
    	}

    	foreach($soft1 as $i=>$j)
    	{	
            $ee = reset($soft1[$i]->cc);
            $soft1[$i]->tit = $ee->title;
            $soft1[$i]->ss  = \DB::table('subclass')->where('pid',$ee->id)->get();
    	}
    	
    	$arr1 = [];
    	$arr2 = [];
    	$arr3 = [];

    	foreach($soft1 as $o => $u)
    	{
    		if($u->pid == 1)
    		{
    			$arr1[$o] = $u;
    		}
    		if($u->pid == 2)
    		{
    			$arr2[$o] = $u;
    		}
    		if($u->pid == 3)
    		{
    			$arr3[$o] = $u;
    		}
    	}
        
        $key = \DB::table('webpage')->select('titles','keyworlds','description')->where('id',19)->first();
    	
    	return view('Home.package.softroll',['title'=>$key->titles,'keyworlds'=>$key->keyworlds,'description'=>$key->description,'arr1'=>$arr1,'arr2'=>$arr2,'arr3'=>$arr3]);
    }

    public function houseroom(){
        $key = \DB::table('webpage')->select('titles','keyworlds','description')->where('id',20)->first();

    	return view('Home.package.houseroom',['title'=>$key->titles,'keyworlds'=>$key->keyworlds,'description'=>$key->description]); 
    }
    public function ajax(Request $request)
    {
    	$id = $request->id;
    	$data = \DB::table('subclass')->select('title','specations','brand','num')->where('pid',$id)->get();
    	if($data)
    	{
    		return response()->json($data);
    	}else
    	{
    		return response()->json(1);
    	}
    }
}
