<?php

namespace App\Http\Controllers\Newpro\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function product(Request $request)
    {	
    	$product = \DB::table('product_l')->select('id','title','time','titleimg','level')->where('level',1)->get();
    	$goods = \DB::table('product_l')->select('id','title','time','titleimg','pid','level','brand','model','spec','num','remarks')->where('level',2)->orderBy('time','desc')->get();
    	
        $titles = [];
        foreach($product as $k => $v)
    	{
    		if($v->titleimg != null)
    		{
    			$v->imgs = explode(',',$v->titleimg);
    		}
            $titles[$k] = $v->title;

    		$v->goods = [];
    		foreach($goods as $kk => $vv)
    		{
    			if($vv->pid == $v->id)
    			{
    				$v->goods[$kk] = $vv;
                    $vv->img = explode(',',$vv->titleimg)[0];

    			}
    		}
    	}
        $avtive = $request->input('pid',$titles[0]);
        if(!in_array($avtive,$titles))
        {   

            $avtive = $titles[0];
        }
    	$title = getwebpage($request->path());
    	return view('Newpro.Home.Product.productindex',['title'=>$title,'product'=>$product,'avtive'=>$avtive]);
    }

    public function productplay($id)
    {
        $goods = \DB::table('product_l')
                ->select('id','title','time','titleimg','pid','level','brand','model','spec','num','remarks','content','titles','keyworlds','description')
                ->where('id',$id)
                ->first();
        if(!$goods)
        {
            return redirect('/newpro/product');
        }

        $product = \DB::table('product_l')->select('id','title','time','titleimg','level')->where('level',1)->get();

        foreach($product as $k => $v)
        {
            if($v->titleimg != null)
            {
                $v->imgs = explode(',',$v->titleimg);
            }
        }

        $goods->imgs = explode(',',$goods->titleimg);
        
        $other = \DB::table('product_l')
        ->select('id','title','time')->where('pid',$goods->pid)
        ->where('id','!=',$id)
        ->orderBy('time','desc')
        ->offset(0)
        ->limit(5)
        ->get();

        $title['title'] = $goods->titles;
        $title['keyworlds'] = $goods->keyworlds;
        $title['description'] = $goods->description;

        return view('Newpro.Home.Product.productplay',['title'=>$title,'goods'=>$goods,'product'=>$product,'other'=>$other]);
    }
}
