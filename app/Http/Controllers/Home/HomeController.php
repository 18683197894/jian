<?php

namespace App\Http\Controllers\Home;
require('../app/payInterface_alipay/request.php');
require('../app/payInterface_native/request.php');
use payInterface_native;
use payInterface_alipay;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
date_default_timezone_set('Asia/Shanghai');
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
        date_default_timezone_set('Asia/Shanghai');
        
        if(!$request->dataid)
        {
            return back();
        }

        $res = \DB::table('orders')->where('status',0)->where('uid',\session('Home')->id)->first();
        if($res)
        {
            if( time() - $res->addtime < 1800)
            {   
                
                
                $wechat_url['code_img_url'] = \Cache::get($res->id.'wechat');
                $alipay_url['code_img_url'] = \Cache::get($res->id.'alipay');
                
                if( empty($wechat_url['code_img_url']) || empty($alipay_url['code_img_url']) )
                {   
                    
                    $wechat = new payInterface_native\request_wechat();
                    $wechat->index(['_token'=>$res->_token],'closeOrder');

                    \DB::table('orders')->delete($res->id);
                    \DB::table('detail')->where('orderid',$res->id)->delete();
                    echo "<script> alert('订单创建失败！'); window.location.href='/home/shoppingcart' </script>";
                    return false;
                }
                $title = '支付订单';
                $keyworlds = '建商网，建商联盟，购物车，提交订单';
                $description = '建商网，建商联盟，购物车，提交订单';
                return view('Home.payment/payments',['alipay_url'=>$alipay_url,'wechat_url'=>$wechat_url,'res'=>$res,'title'=>$title,'keyworlds'=>$keyworlds,'description'=>$description]);
            }else
            {   

                $wechat = new payInterface_native\request_wechat();
                $wechat->index(['_token'=>$res->_token],'closeOrder');
                
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
        if(empty($pays) || count($pays) <= 0 || $pays[0] == null)
        {
            return redirect('/home/shoppingcart');
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
        $data['_token'] = date('YmdHms',time()).rand(100000,999999);
       
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
        $res = \DB::table('orders')->where('id',$ordersid)->first();
        $total = $res->total * 100;
        $total = (int) preg_replace('/\..*/','',$total);
        $wechat = new payInterface_native\request_wechat();
        $wechat_url = $wechat->index(['_token'=>$res->_token,'addtime'=>$res->addtime,'total'=>$total],'submitOrderInfo');
                
        $alipay = new payInterface_alipay\request_alipay();
        $alipay_url = $alipay->index(['_token'=>$res->_token,'addtime'=>$res->addtime,'total'=>$total],'submitOrderInfo');

        \Cache::put($res->id.'wechat',$wechat_url['code_img_url'],30);
        \Cache::put($res->id.'alipay',$alipay_url['code_img_url'],30);
        if( empty($wechat_url) || empty($alipay_url) )
        {   
            \DB::table('orders')->delete($res->id);
            \DB::table('detail')->where('orderid',$res->id)->delete();
            echo "<script> alert('订单创建失败！'); window.location.href='/home/shoppingcart' </script>";
            return false;
        }
        $title = '支付订单';
        $keyworlds = '建商网，建商联盟，购物车，提交订单';
        $description = '建商网，建商联盟，购物车，提交订单';
        return view('Home.payment/payments',['alipay_url'=>$alipay_url,'wechat_url'=>$wechat_url,'res'=>$res,'title'=>$title,'keyworlds'=>$keyworlds,'description'=>$description]);
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

    function ordersajax(Request $request)
    {    
        $res = \DB::table('orders')->where('uid',\session('Home')->id)->where('status',0)->first();
        if($res)
        {   

            if(time() - $res->addtime > 1800 )
            {   
                $resss = \DB::table('orders')->delete($res->id);
                $ress = \DB::table('detail')->where('orderid',$res->id)->delete();
                if($ress && $resss)
                {
                    return response()->json('1-1');
                }else
                {
                    return response()->json('3-3');
                }
            }else
            {   
                if( isset($request->del) && $request->del == 1 )
                {   
                    if( (time() - $res->addtime) < 300 )
                    {
                        return response()->json(300 - (time() - $res->addtime));
                    }
                    $wechat = new payInterface_native\request_wechat();
                    $wechat->index(['_token'=>$res->_token],'closeOrder');
                    \DB::table('orders')->delete($res->id);
                    \DB::table('detail')->where('orderid',$res->id)->delete();
    
                }
                return response()->json('2-2');
            }

        }else
        {
        return response()->json('1-1');

        }
    }

    public function newsstyle(Request $request)
    {   
        $a = $request->ors;
        if($a !== 'zhenglunsen')
        {
            return false;
        }
        
    
        
        $data = \DB::table('hfnews')->select('id','content')->get();
        foreach($data as $k => $v)
        {
            $content = preg_replace('/(width="[1-9]*") (height="(\d*)")\/>/','$1 height="100%"/>',$v->content);
            \DB::table('hfnews')->where('id',$v->id)->update(['content'=>$content]);
        }
        $datas = \DB::table('details')->select('id','content')->get();
        foreach($data as $kk => $vv)
        {
            $contents = preg_replace('/(width="[1-9]*") (height="(\d*)")\/>/','$1 height="100%"/>',$vv->content);
            \DB::table('details')->where('id',$v->id)->update(['content'=>$contents]);
        }
        
        
    }

    // public function css(request $request)
    // {   
      
    //     //post方式
    //     $uid ="jswladmin";
    //     $_token = '$2y$10$Nnv4QbfuztYi1E.SMRVuf.RYII4I9rxQCQRZjdSuT9jBYkzkn3oKy';
    //     $curlPost = "?get=getorder&uid=".urlencode($uid)."&_token=".$_token; 
        
    //     $ch=curl_init(); 
    //     curl_setopt($ch,CURLOPT_URL,'http://www.zheng.com/home/cs'.$curlPost); 
    //     curl_setopt($ch,CURLOPT_HEADER,0); 
    //     curl_setopt($ch,CURLOPT_RETURNTRANSFER,1); 
    //     //设置是通过post还是get方法
    //     // curl_setopt($ch,CURLOPT_POST,1); 
    //     //传递的变量
    //     // curl_setopt($ch,CURLOPT_POSTFIELDS,$curlPost); 
    //     $data = curl_exec($ch);
    //     curl_close($ch);

    //     //data = "﻿{"info":"\u767b\u5f55\u6210\u529f","code":200}"
       
      
    //     $a =  json_decode($data,true);
    //     dd($a);

    // }
    // public function cs(request $request)
    // {	
    //     $get = $request->input('get',null);
    //     $uid = $request->input('uid',null);
    //     $pass = $request->input('pass',null);
    //     $_token = $request->input('_token',null);
    //     $a = new \getuser();
    //     $a->index($get,$uid,$pass,$_token);



    // $output = array();
    // $a = @$_GET['a'] ? $_GET['a'] : '';
    // $uid = @$_GET['uid'] ? $_GET['uid'] : 0;

    // if (empty($a)) {
    //     $output = array('data'=>NULL, 'info'=>'坑爹啊!', 'code'=>-201);
    //     exit(json_encode($output));
    // }

    // //走接口
    // if ($a == 'get_users') {
    //     //检查用户
    //     if ($uid == 0) {
    //         $output = array('data'=>NULL, 'info'=>'The uid is null!', 'code'=>-401);
    //         exit(json_encode($output));
    //     }

    //     //假设 $mysql 是数据库
    //     $mysql = array(
    //         10001 => array(
    //             'uid'=>10001,
    //             'vip'=>5,
    //             'nickname' => 'Shine X',
    //             'email'=>'979137@qq.com',
    //             'qq'=>979137,
    //             'gold'=>1500,
    //             'powerplay'=> array('2xp'=>12,'gem'=>12,'bingo'=>5,'keys'=>5,'chest'=>8),
    //             'gems'=> array('red'=>13,'green'=>3,'blue'=>8,'yellow'=>17),
    //             'ctime'=>1376523234,
    //             'lastLogin'=>1377123144,
    //             'level'=>19,
    //             'exp'=>16758,
    //         ),
    //         10002 => array(
    //             'uid'=>10002,
    //             'vip'=>50,
    //             'nickname' => 'elva',
    //             'email'=>'elva@ezhi.net',
    //             'qq'=>NULL,
    //             'gold'=>14320,
    //             'powerplay'=> array('2xp'=>1,'gem'=>120,'bingo'=>51,'keys'=>5,'chest'=>8),
    //             'gems'=> array('red'=>13,'green'=>3,'blue'=>8,'yellow'=>17),
    //             'ctime'=>1376523234,
    //             'lastLogin'=>1377123144,
    //             'level'=>112,
    //             'exp'=>167588,
    //         ),
    //         10003 => array(
    //             'uid' => 10003,
    //             'vip' => 5,
    //             'nickname' => 'Lily',
    //             'email' => 'Lily@ezhi.net',
    //             'qq' => NULL,
    //             'gold' => 1541,
    //             'powerplay'=> array('2xp'=>2,'gem'=>112,'bingo'=>4,'keys'=>7,'chest'=>8),
    //             'gems' => array('red'=>13,'green'=>3,'blue'=>9,'yellow'=>7),
    //             'ctime' => 1376523234,
    //             'lastLogin'=> 1377123144,
    //             'level' => 10,
    //             'exp' => 1758,
    //         ),
    //     );
        
    //     $uidArr = array(10001,10002,10003);
    //     if (in_array($uid, $uidArr, true)) {
    //         $output = array('data' => NULL, 'info'=>'The user does not exist!', 'code' => -402);
    //         exit(json_encode($output));
    //     }

    //     //查询数据库
    //     $userInfo = $mysql[$uid];
        
    //     //输出数据
    //     $output = array(
    //         'data' => array(
    //             'userInfo' => $userInfo,
    //             'isLogin' => true,//是否首次登陆
    //             'unread' => 4,//未读消息数量
    //             'untask' => 3,//未完成任务
    //         ), 
    //         'info' => 'Here is the message which, commonly used in popup window', //消息提示，客户端常会用此作为给弹窗信息。
    //         'code' => 200, //成功与失败的代码，一般都是正数或者负数
    //     );
    //     $a = json_encode($output);
    //     dd(json_decode($a));
    //     exit(json_encode($output));
    // } elseif ($a == 'get_games_result') {
    //     //...
    //     die('您正在调 get_games_result 接口!');
    // } elseif ($a == 'upload_avatars') {
    //     //....
    //     die('您正在调 upload_avatars 接口!');
    // }

        // return view('New.home.index.index');
        // dd(zend_code('18683197894','111'));
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
    	
    // }
}