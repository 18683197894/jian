<?php

namespace App\Http\Controllers\Newpro\Home;
require('../app/payInterface_alipay/request.php');
require('../app/payInterface_native/request.php');
use payInterface_native;
use payInterface_alipay;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
date_default_timezone_set('Asia/Shanghai');

class PayController extends Controller
{
    public function shoppingcart(request $request)
    {	
    	$title = getwebpage($request->path());
    	$uid = \session('Home')->id;
    	$data = \DB::table('playgou')
              ->join('door','playgou.pid','=','door.id')
              ->select('playgou.id','playgou.pid','playgou.tus','playgou.time','playgou.num','playgou.uid','door.main','door.nomain','door.model','door.pid as ppid','door.title as name')
              ->where('playgou.uid',$uid)
              ->orderBy('time','desc')
              ->get();
    	$qing = \DB::table('qing')->first()->money;
    	$style = \DB::table('style')
      ->join('packages','style.pid','=','packages.id')
      ->select('style.id','style.title','packages.title as titles')
      ->get();
        foreach($data as $k => $v)
      {
          if($v->tus == 'main')
          {
            $v->name = $v->name.' （主流品牌）';
            $v->money = $v->main;
          }else if($v->tus == 'nomain')
          {
            $v->name = $v->name.' （非主流品牌）';
            $v->money = $v->nomain;
          }else if($v->tus == 'model')
          {
            $v->name = $v->name.' （样板间）';
            $v->money = $v->model;
          }else if($v->tus == 'qing')
          {
            $v->name = $v->name.' （清水房）';
            $v->money = $qing.'/每平方';
          }
          foreach($style as $kk => $vv)
          {
            if($v->ppid == $vv->id)
            {
              $v->path = $vv->titles.' '.$vv->title;
            }
          }
      }
    	return view('Newpro.Home.Pay.shoppingcart',['title'=>$title,'data'=>$data]);
    }
    public function shoppingcartajax(Request $request)
    {
    	$ors = $request->ors;
    	$id = $request->id;
    	$num = $request->num;
    	// return response()->json(1);
    	if($ors == 'qing')
    	{
    		$res = \DB::table('playgou')->where('id',$id)->update(['num'=>$num]);
    		if($res)
    		{
    			return response()->json($num);
    		}else
    		{
    			return response()->json(false);
    		}
    	}else if($ors == 'jian')
    	{
    		$num = \DB::table('playgou')->select('id','num')->where('id',$id)->first()->num;
    		if($num && $num != 1)
    		{
    			$res = \DB::table('playgou')->where('id',$id)->update(['num'=>$num - 1 ]);
    			if($res)
    			{
    				return response()->json($num - 1);
    			}else
    			{
    				return response()->json(false);
    			}
    		}else
    		{
    			return response()->json(false);
    		}
    	}else if($ors == 'jia')
    	{
    		$num = \DB::table('playgou')->select('id','num')->where('id',$id)->first()->num;
    		if($num && $num < 10)
    		{
    			$res = \DB::table('playgou')->where('id',$id)->update(['num'=>$num + 1 ]);
    			if($res)
    			{
    				return response()->json($num + 1);
    			}else
    			{
    				return response()->json(false);
    			}
    		}else
    		{
    			return response()->json(false);
    		}
    	}else if($ors == 'jias')
    	{
    		$num = \DB::table('playgou')->select('id','num')->where('id',$id)->first()->num;
    		if($num && $num < 999)
    		{
    			$res = \DB::table('playgou')->where('id',$id)->update(['num'=>$num + 1 ]);
    			if($res)
    			{
    				return response()->json($num + 1);
    			}else
    			{
    				return response()->json(false);
    			}
    		}else
    		{
    			return response()->json(false);
    		}
    	}else if($ors == 'del')
    	{
    		$res = \DB::table('playgou')->delete($id);
    		if($res)
    		{
    			return response()->json(1);
    		}else
    		{
    			return response()->json(false);
    		}
    	}
    }

    public function payment(Request $request)
    {	
    	$uid = \session('Home')->id;
    	$ids = $request->data;
    	if(!$ids) return back();
    	$id = Base64_decode($ids);
    	$id = substr($id,0,-1);
    	$id = explode(',',$id);
    	$title = getwebpage($request->path());
        $address = \DB::table('address')->select('status','id','shen','shi','qu','name','phone','tails','zipcode','lebel','uid')->where('uid',$uid)->get();
        $district = \DB::table('district')->select('id','name','level','upid')->where('level',1)->get();
        $data = [];
        foreach($id as $k => $v)
        {   

            $data[$k] = \DB::table('playgou')
              ->join('door','playgou.pid','=','door.id')
              ->select('playgou.id','playgou.pid','playgou.tus','playgou.time','playgou.num','playgou.uid','door.main','door.nomain','door.model','door.pid as ppid','door.title as name')
              ->where('playgou.id',$v)
              ->orderBy('time','desc')
              ->first();
        }
        if( !isset( $data[0]->tus )  )
        {
            return redirect('/newpro/shoppingcart');
        }

        $qing = \DB::table('qing')->first()->money;
        $style = \DB::table('style')
      ->join('packages','style.pid','=','packages.id')
      ->select('style.id','style.title','packages.title as titles')
      ->get();
      $moenyss = 0;
        foreach($data as $k => $v)
      {
          if($v->tus == 'main')
          {
            $v->name = $v->name.' （主流品牌）';
            $v->money = $v->main;
            $v->moneys = $v->money * $v->num;
          }else if($v->tus == 'nomain')
          {
            $v->name = $v->name.' （非主流品牌）';
            $v->money = $v->nomain;
            $v->moneys = $v->money * $v->num;
          }else if($v->tus == 'model')
          {
            $v->name = $v->name.' （样板间）';
            $v->money = $v->model;
            $v->moneys = $v->money * $v->num;
          }else if($v->tus == 'qing')
          {
            $v->name = $v->name.' （清水房）';
            $v->money = $qing.'/每平方';
            $v->moneys = $qing * $v->num;
          }
          $moenyss += $v->moneys;
          foreach($style as $kk => $vv)
          {
            if($v->ppid == $vv->id)
            {
              $v->path = $vv->titles.' '.$vv->title;
            }
          }
      }
      $addressstatus= [];
        if($address->count() > 0)
        {
            foreach($address as $kk => $vv)
            {
                if($vv->status==1)
                {
                    $dizhi = $vv->shen.$vv->shi.$vv->tails;
                    $name = $vv->name.' '.$vv->phone;
                    $addressstatus = array('dizhi'=>$dizhi,'name'=>$name,'id'=>$vv->id);
                }
            }
        }
    	return view('Newpro.Home.Pay.payment',['addressstatus'=>$addressstatus,'moenyss'=>$moenyss,'title'=>$title,'address'=>$address,'district'=>$district,'data'=>$data]);
    }

    public function addressajax(Request $request)
    {
    	$id = $request->id;
    	$ors = $request->ors;
    	if($ors == 'shen')
    	{
    		$ors = 2;
    	}else if($ors == 'shi')
    	{
    		$ors = 3;
    	}
    		$data = \DB::table('district')->select('id','name','level','upid')->where('upid',$id)->where('level',$ors)->get();
    		if($data)
    		{
    			return response()->json($data);
    		}else
    		{
    			return response()->json(false);
    		}
    	
    }

    public function addressadd(Request $request)
    {
    	$uid = \session('Home')->id;
    	$ors = $request->ors;
    	$data = $request->data;
    	
    	if($ors == 'add')
    	{
    		$data['uid'] = $uid;
    		$data['time'] = time();
    		$data['uptime'] = time();
    		$data['status'] = 0;

    		$id = \DB::table('address')->insertGetid($data);
    		if($id)
    		{
    			$data['id'] = $id;
    			return response()->json($data);
    		}else
    		{
    			return response()->json(false);
    		}
    	}else if($ors == 'edit')
        {
            $data['uptime'] = time();
            $res = \DB::table('address')->where('id',$data['id'])->update($data);
            if($res)
            {
                return response()->json($data);
            }else
            {
                return response()->json(false);
            }
        }
    }

    public function addressstatus(Request $request)
    {	
    	$uid = \session('Home')->id;
    	$id = $request->id;
    	$res = \DB::table('address')->where('uid',$uid)->update(['status'=>0]);
    	$ress = \DB::table('address')->where('id',$id)->update(['status'=>1]);
    	if($ress && $res)
    	{
    		return response()->json(true);
    	}else
    	{
    		return response()->json(false);
    	}
    }

    public function addressdel(Request $request)
    {
    	$id = $request->id;
    	$res = \DB::table('address')->delete($id);
    	if($res)
    	{
    		return response()->json(true);
    	}else
    	{
    		return response()->json(false);
    	}
    }

    public function addressgetedit(Request $request)
    {
        $id = $request->id;
        $data = \DB::table('address')->select('id','name','phone','shen','shi','qu','tails','zipcode','lebel','dizhis')->where('id',$id)->first();
        if($data)
        {   
            $data->addressid = explode(',',$data->dizhis);
            $shipid = \DB::table('district')->select('id','upid')->where('id',$data->addressid[1])->first()->upid;
            $data->shis = \DB::table('district')->select('id','name','level','upid')->where('upid',$shipid)->get();
            $qupid = \DB::table('district')->select('id','upid')->where('id',$data->addressid[2])->first()->upid;
            $data->qus = \DB::table('district')->select('id','name','level','upid')->where('upid',$qupid)->get();
            return response()->json($data);
        }else
        {
            return response()->json(false);
        }
    }

    public function payments(Request $request)
    {       

        $title = getwebpage($request->path());
        $uid = \session('Home')->id;
        $datas = $request->except("_token");
        $ids = substr($datas['payid'],0,-1);
        $idss = explode(',',$ids);
        $data = [];
        if(!$ids || !$datas['dizhiid'])
        {
            echo "<script> alert('订单创建失败！'); window.location.href='/newpro/shoppingcart' </script>";
        }

        $ress = \DB::table('orders')->where('zid',$ids)->where('uid',$uid)->where('status',0)->first();
        if($ress)
        {   
        
            $weixin = $ress->weixinimg;
            $zhifubao = $ress->zhifubaoimg;
            return view('Newpro.Home.Pay.payments',['title'=>$title,'orders'=>$ress,'weixin'=>$weixin,'zhifubao'=>$zhifubao]);
            
        }

        foreach($idss as $k => $v)
        {   

            $data[$k] = \DB::table('playgou')
              ->join('door','playgou.pid','=','door.id')
              ->select('playgou.id','playgou.pid','playgou.tus','playgou.num','playgou.uid','door.main','door.nomain','door.model','door.pid as ppid','door.title as name')
              ->where('playgou.id',$v)
              ->first();
        }
        $qing = \DB::table('qing')->first()->money;
        $style = \DB::table('style')
        ->join('packages','style.pid','=','packages.id')
        ->select('style.id','style.title','packages.title as titles')
        ->get();
      $moenyss = 0;
        foreach($data as $k => $v)
      {
          if($v->tus == 'main')
          {
            $v->name = $v->name.' （主流品牌）';
            $v->money = $v->main;
            $v->moneys = $v->money * $v->num;
          }else if($v->tus == 'nomain')
          {
            $v->name = $v->name.' （非主流品牌）';
            $v->money = $v->nomain;
            $v->moneys = $v->money * $v->num;
          }else if($v->tus == 'model')
          {
            $v->name = $v->name.' （样板间）';
            $v->money = $v->model;
            $v->moneys = $v->money * $v->num;
          }else if($v->tus == 'qing')
          {
            $v->name = $v->name.' （清水房）';
            $v->money = $qing;
            $v->moneys = $qing * $v->num;
          }
          $moenyss += $v->moneys;
          foreach($style as $kk => $vv)
          {
            if($v->ppid == $vv->id)
            {
              $v->path = $vv->titles.' '.$vv->title;
            }
          }
      }
      $address = \DB::table('address')->where('id',$datas['dizhiid'])->first();

      $orders['uid'] = $uid;
      $orders['linkman'] = $address->name;
      $orders['address'] = $address->shen.$address->shi.$address->qu.' '.$address->tails;
      $orders['code'] = $address->zipcode;
      $orders['remarks'] = $request->input('remarks')?$request->input('remarks'):'无备注';
      $orders['risk'] = $request->input('risk')?200:0;
      $orders['invoice'] = $request->input('invoice')?'是':'否';
      if($orders['invoice'] == '是')
      {
        $orders['invoice_tou'] = $request->input('invoice_tou',$orders['linkman']);
        $orders['invoice_ors'] = $request->input('invoice_ors','个人');
      }else
      {
        $orders['invoice_tou'] = '否';
        $orders['invoice_ors'] = '否';
      }
      // $orders['total'] = $moenyss + $orders['risk'];
      $orders['total'] = 0.01;
      $orders['status'] = 0;
      $orders['zid'] = $ids;
      $orders['addtime'] = time();
      $orders['phone'] = $address->phone;
      $orders['lebel'] = $address->lebel?$address->lebel:'无';
      $orders['_token'] = date("YmdHis",time()).rand(1000,9999);
      
      $res = \DB::table('orders')->insertGetid($orders);
      if($res)
      {
        foreach($data as $kkk => $vvv)
        {   
            $arr = [];
            $arr['orderid'] = $res;
            $arr['tus'] = $vvv->tus;
            $arr['pid'] = $vvv->pid;
            $arr['name'] = $vvv->name;
            $arr['prince'] = $vvv->money;
            $arr['num'] = $vvv->num;
            $arr['ors'] = $vvv->path;
            \DB::table('detail')->insert($arr);
        }
            foreach($idss as $l => $j)
            {
                \DB::table('playgou')->delete($j);
            }
            $orderss = \DB::table('orders')->where('id',$res)->first();

            $total = (int) preg_replace('/\..*/','',$orderss->total * 100);
           
            $wechat = new payInterface_native\request_wechat();
            $wechat_url = $wechat->index(['_token'=>$orderss->_token,'addtime'=>$orderss->addtime,'total'=>$total],'submitOrderInfo')['code_img_url'];
                
            $alipay = new payInterface_alipay\request_alipay();
            $alipay_url = $alipay->index(['_token'=>$orderss->_token,'addtime'=>$orderss->addtime,'total'=>$total],'submitOrderInfo')['code_img_url'];
            
            if( empty($wechat_url) || empty($alipay_url) )
            {   
                \DB::table('orders')->delete($res->id);
                \DB::table('detail')->where('orderid',$res->id)->delete();
                echo "<script> alert('订单创建失败！'); window.location.href='/newpro/shoppingcart' </script>";
                return false;
            }

            \DB::table('orders')->where('id',$res)->update(['weixinimg'=>$wechat_url,'zhifubaoimg'=>$alipay_url]);
            return view('Newpro.Home.Pay.payments',['title'=>$title,'orders'=>$orderss,'weixin'=>$wechat_url,'zhifubao'=>$alipay_url]);
      }else
      {
            echo "<script> alert('订单创建失败！'); window.location.href='/newpro/shoppingcart' </script>";
      }

    }

    public function paymentsget(Request $request)
    {
        $id = $request->id;
        $uid = \session('Home')->id;

        $res = \DB::table('orders')->select('id','_token','status','uid','create_id','addtime')->where('id',$id)->where('uid',$uid)->first();
        if($res)
        {
            
                if($res->status == 1 && !empty($res->create_id))
                {
                    return response()->json(1);
                }else
                {
                    return response()->json(2);
                }  

        }else
        {
            return response()->json(4);
        }
         

    }
}
