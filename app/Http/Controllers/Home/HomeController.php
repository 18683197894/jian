<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class HomeController extends Controller
{
    public function shoppingcart()
    {   
        $uid = \session('Home')->id;
        // $data = \DB::table('playgou')
        // ->join('column','playgou.pid','=','column.id')
        // ->select('playgou.id','playgou.pid','playgou.tus','playgou.num','playgou.time','column.title','column.id as zid')
        // ->where('playgou.uid',$uid)
        // ->where('playgou.status',1)
        // ->orderBy('playgou.time','desc')
        // ->get();
        $column = \DB::table('column')->select('id','title')->get();
        $subclass = \DB::table('subclass')->select('id','jia','title','pid')->get();
        $data = \DB::table('playgou')->select('id','tus','time','pid','num','status')->where('uid',$uid)->orderBy('time','desc')->get();

        foreach($data as $k => $v)
        {   
            if( $v->tus == '软包' )
            {   
                $v->dan = 0;
                $v->jia = 0;
                $v->ziname = [];
                foreach( $column as $kk => $vv )
                {
                    if( $v->pid == $vv->id)
                    {
                        $v->title = $vv->title;
                        $v->zid   = $vv->id;
                    }
                }

                foreach( $subclass as $kkk => $vvv )
                {
                    if( $v->zid == $vvv->pid )
                    {   $v->dan += $vvv->jia ;
                        $v->jia += ( $vvv->jia) * $v->num;
                        $v->ziname[$kkk]=$vvv->title;
                    }
                }

            }
            
        }
        // dd($data);
    	$title = '购物车';
        $keyworlds = '建商网，建商联盟，购物车,软包,全包';
        $description = '建商网，建商联盟，购物车,软包,全包';
        return view('Home.payment.shoppingcart',['data'=>$data,'title'=>$title,'keyworlds'=>$keyworlds,'description'=>$description]);
    }

    function numajax(Request $request){
        
        $id = $request->id;
        $st = $request->st;
        // $data = \DB::table('playgou')->select('id','num')->where('id',$id)->first();
        if($st == '-')
        {
            $num = $request->num - 1;
        }

        if($st == '+')
        {
            $num = $request->num + 1;
        }

        if($num < 1 || $num >10)
        {
        return false;
        }

        \DB::table('playgou')->where('id',$id)->update(['num'=>$num]);
        
    }


    public function payment(Request $request)
    {   

        $dataid = preg_replace('/^(.*)zlss6fj9edolxsweesaz/','',$request->data);
        
        $dataid = Base64_decode($dataid,true);
        $dataid = preg_replace("/jswladmin121442206718683197894/",'',$dataid);
        
        if( $dataid == '' || $dataid== null )
        {
            return back();
        }
        $dataid = trim($dataid,'_');
        $dataid = explode('_',$dataid);
        $pays = [];
        foreach( $dataid as $k => $v )
        {   
                $pays[$k]= \DB::table('playgou')
                ->join('column','column.id','=','playgou.pid')
                ->select('playgou.id','column.id as cid','column.path','column.title as name','playgou.tus','playgou.time','playgou.num','playgou.uid')
                ->where('playgou.id',$v)
                ->where('playgou.status',1)
                ->where('playgou.uid',\session('Home')->id)
                ->first();
        }
        $subclass = \DB::table('subclass')->select('id','title','specations','brand','pid','sid','fid','jia','num')->get();
        
        foreach( $pays as $kk => $vv )
        {   
            $vv->jia = 0;
            $vv->subclass = [];
            foreach( $subclass as $kkk => $vvv )
            {
                if($vvv->pid == $vv->cid)
                {   
                    $vv->jia += $vvv->jia * $vv->num;
                    $vv->subclass[$kkk] = $vvv;
                }
            }
        }
        $total = 0;
        foreach( $pays as $ke => $va )
        {   
            $va->paths = explode('->',$va->path);
            $va->paths = $va->paths[0].' '.$va->paths[1].' '.$va->paths[2];
            $total += $va->jia;
        }
        
        $di = \DB::table('district')->select('id','name','level')->where('level',1)->get();
        $address = \DB::table('address')->select('id','name','phone','shen','shi','qu','tails','zipcode','status','time')->where('uid',\session('Home')->id)->orderBy('time')->get();
        $default = null;
        if( count($address) > 0 )
        {   
        
            foreach( $address as $key => $value )
            {
                if( $value->status == 1 )
                {
                    $default = $value;
                }
            }
        }
        $title = '提交订单';
        $keyworlds = '建商网，建商联盟，购物车，提交订单';
        $description = '建商网，建商联盟，购物车，提交订单';
        return view('Home.payment.payment',['dataids'=>$request->data,'total'=>$total,'default'=>$default,'pays'=>$pays,'address'=>$address,'shen'=>$di,'title'=>$title,'keyworlds'=>$keyworlds,'description'=>$description]);
    }

    public function payments(Request $request)
    {   
        $res = \DB::table('orders')->where('status',0)->where('uid',\session('Home')->id)->first();
        if($res)
        {
            if( time() - $res->addtime < 190000)
            {
                $title = '支付订单';
                $keyworlds = '建商网，建商联盟，购物车，提交订单';
                $description = '建商网，建商联盟，购物车，提交订单';
                return view('Home.payment/payments',['data'=>$res,'title'=>$title,'keyworlds'=>$keyworlds,'description'=>$description]);
            }else
            {
                $resss = \DB::table('orders')->delete($res->id);
                $ress = \DB::table('detail')->where('orderid',$res->id)->delete();
                if($ress && $resss)
                {
                echo "<script> alert('订单已失效'); window.location.href='/home/shoppingcart' </script>";
                return false;

                }else
                {
                    return back;
                }
          }
            
        }

        $dataid = preg_replace('/^(.*)zlss6fj9edolxsweesaz/','',$request->dataid);
        $dataid = Base64_decode($dataid,true);
        $dataids = preg_replace("/jswladmin121442206718683197894/",'',$dataid);
        $dataids = trim($dataids,'_');
        $dataid = explode('_',$dataids);
        
        $invoice = $request->invoice?1:0;
        $risk = $request->risk?200:0;
        $remarks = $request->remarks?$request->remarks:'无备注';
        $subclass = \DB::table('subclass')->select('id','title','specations','brand','pid','sid','fid','jia','num')->get();

        $pays=[];
        $total = 0;
        foreach( $dataid as $k => $v )
        {
            $pays[$k] = \DB::table('playgou')->select('id','pid','num','name')->where('id',$v)->first();
        }
        foreach( $pays as $kk => $vv )
        {   
            $vv->jia = 0;
            $vv->jias = 0;
            foreach( $subclass as $kkk => $vvv )
            {
                if($vvv->pid == $vv->pid)
                {   
                    $vv->jia += $vvv->jia * $vv->num;
                    $vv->jias += $vvv->jia;
                }
            }
            $total += $vv->jia;
        }
        $token = '';
        for($i=1;$i<=50;$i++){
        $token .= chr(rand(97,122));
        }
        $dizhi = \DB::table('address')->select('shen','shi','qu','name','phone','tails','zipcode','lebel')->where('id',$request->dizhi)->first();
        $data['uid'] = \session('Home')->id;
        $data['linkman'] = $dizhi->name;
        $data['address'] = $dizhi->shen.$dizhi->shi.$dizhi->qu.$dizhi->tails;
        $data['lebel'] = $dizhi->lebel?$dizhi->lebel:'无地址标签';
        $data['code'] = $dizhi->zipcode;
        $data['remarks'] = $remarks;
        $data['invoice'] = $invoice;
        $data['risk'] = $risk;
        $data['phone'] = $dizhi->phone;
        $data['addtime'] = time();
        $data['total'] = $total + $risk;
        $data['status'] = 0;
        $data['_token'] = time().rand(1000000,9999999);
       
        $ordersid = \DB::table('orders')->insertGetId($data);

        if($ordersid)
        {
            foreach($pays as $kkk => $vvv)
            {   
                $arr = [];
                $arr['orderid'] = $ordersid;
                $arr['tus'] = '软包';
                $arr['pid'] = $vvv->pid;
                $arr['name'] = $vvv->name;
                $arr['prince'] = $vvv->jias;
                $arr['num'] = $vvv->num;
                \DB::table('detail')->insert($arr);
            }

        }else
        {
            return back();
        }

        $title = '支付订单';
        $keyworlds = '建商网，建商联盟，购物车，提交订单';
        $description = '建商网，建商联盟，购物车，提交订单';
        return view('Home.payment/payments',['data'=>$data,'title'=>$title,'keyworlds'=>$keyworlds,'description'=>$description]);
    }

    public function goudel(Request $request)
    {   
        $res = \DB::table('playgou')->delete($request->id);
        if($res)
        {
            return response()->json(1);
        }else
        {
            return response()->json(2);
        }
    }
    public function dizhiajax(Request $request)
    {
        $id = $request->id;
        $oer = $request->oer;
        
        $data = \DB::table('district')->select('id','name','level','upid')->where('level',$oer)->where('upid',$id)->get();
        return response()->json($data);
        
    }

    public function address(Request $request)
    {   
        $data = $request->except("_token");
        $id = \session('Home')->id;
        $data['uid'] = $id;
        $data['status'] = 0;
        $data['time'] = time();
        $data['uptime'] = time();

        
        $addressnum = \DB::table('address')->select('id','uid','status')->where('uid',$id)->count();

        if($addressnum <= 0)
        {
            $data['status'] = 1;
        }
        if($addressnum >=4)
        {
            return response()->json('errors');
        }   
            
        $res = \DB::table('address')->insertGetId($data);
        if($res)
        {
            return response()->json($res);
        }else
        {
            return response()->json('error');
        }
    }

    public function editaddress(Request $request)
    {   
        $data = \DB::table('address')->select('id','name','phone','shen','shi','qu','tails','zipcode','lebel','dizhis')->where('id',$request->id)->where('uid',\session('Home')->id)->first();
        $arr = explode(',',$data->dizhis);
        $data->shens = $arr['0'];
        $data->shis = $arr['1'];
        $data->qus = $arr['2'];
        // $shi = \DB::table('details')->select('id','name','upid','level')->where('id',$data->shis)->first(); 
        $data->shiss = \DB::table('district')->select('id','name','level','upid')->where('level',2)->where('upid',$data->shens)->get();
        $data->quss = \DB::table('district')->select('id','name','level','upid')->where('level',3)->where('upid',$data->shis)->get();
        
        if($data)
        {
            return response()->json($data);
        }else
        {
            return response()->json(2);
        }
    }

    public function addressedit(Request $request)
    {
        $data = $request->except("_token");
        $data['uptime'] = time();
        $res = \DB::table('address')->where('id',$data['id'])->update($data);
        if($res)
        {
            return response()->json(1);
        }else
        {
            return response()->json(2);
        }
    }
    public function addressdel(Request $request)
    {   
        $res = \DB::table('address')->delete($request->id);
        if($res)
        {
            return response()->json(1);
        }else
        {
            return response()->json(2);
        }
    }

    public function addressstatus(Request $request)
    {
        $uid = \session('Home')->id;
        $id = $request->id;
        $res = \DB::table('address')->where('uid',$uid)->where('status',1)->update(['status'=>0]);

        if($res)
        {   
            $data = \DB::table('address')->where('id',$id)->first();
            \DB::table('address')->where('id',$id)->update(['status'=>1]);
            $data = \DB::table('address')->where('id',$id)->first();
            return response()->json($data);
        }else
        {
            return response()->json(2);
        }
    }
    public function cs()
    {	
    	// $data = \DB::table('hfnews')->get();
    	// $pre = '/www.zheng.com/';

    	// foreach( $data as $k => $v )
    	// {
    	// 	$v->content = preg_replace($pre,'www.jianshanglianmeng.com', $v->content);
    	// }
    	// // dd($data);
    	// foreach( $data as $kk => $vv )
    	// {
    	// 	$arr['content'] = $vv->content;
    	// 	\DB::table('hfnews')->where('id',$vv->id)->update($arr);
    	// }

     //    $content = \DB::table('hfnews')->select('content')->where('id',2)->first()->content;
     //    preg_match_all('/\/uploads\/ueditor\/image\/.*?.jpeg/',$content,$str);
     //    dd($content);
    	// return 'ok';
    	
    }
}