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
              ->select('id','name','pid','uid','time','status','num','uid')
              ->where('uid',$uid)
              ->orderBy('time','desc')
              ->get();
      foreach($data as $k => $v)
      {
        $v->pids = explode(',',$v->pid);
        $v->datas = [];
        foreach($v->pids as $kk => $vv)
        {
          $v->datas[$kk] = \DB::table('package')->select('id','name','ors','money')->where('id',$vv)->first();
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
    	// $id = explode(',',$id);

      $rom = Base64_decode($request->rom);
      $data = [];
      $moenyss = 0;
      
        $data = \DB::table('playgou')->select('id','name','pid','uid','num')->where('id',$id)->first();
        if(!$data)
        {
          return redirect('/newpro/shoppingcart');
        }
        $data->data = explode(',',$data->pid);
        $data->datas = [];
        $data->path  = '';
        $data->moneys  = 0;
        // dd($data[$k]->data);
        
        foreach($data->data as $kk => $vv)
        { 

          $data->datas[$kk] = \DB::table('package')->select('id','name','ors','money')->where('id',$vv)->first();
          
          if($data->datas[$kk]->ors !=='智能' )
          { 
            $data->datas[$kk]->moneys = $data->datas[$kk]->money * $rom;
            $data->moneys += $data->datas[$kk]->moneys;
          }else
          {
          $data->datas[$kk]->moneys = $data->datas[$kk]->money;
          $data->moneys += $data->datas[$kk]->moneys;
          }
          $data->path = $data->path.'+'.$data->datas[$kk]->name;
        }
        
        $moenyss = $data->moneys;
      
     // dd($data);
    
    	 $title = getwebpage($request->path());
        $address = \DB::table('address')->select('status','id','shen','shi','qu','name','phone','tails','zipcode','lebel','uid')->where('uid',$uid)->get();
        $district = \DB::table('district')->select('id','name','level','upid')->where('level',1)->get();
     
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
     
    	return view('Newpro.Home.Pay.payment',['rom'=>$rom,'addressstatus'=>$addressstatus,'moenyss'=>$moenyss,'title'=>$title,'address'=>$address,'district'=>$district,'data'=>$data]);
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
        $data = [];
 
        if(!$ids)
        {
            echo "<script> alert('订单创建失败！'); window.location.href='/newpro/shoppingcart' </script>";
        }

        $ress = \DB::table('orders')->where('zid',$ids)->where('uid',$uid)->where('status',0)->first();
        if($ress)
        {   

            if(time() - $ress->addtime  <= 3400 )
            {
              $weixin = $ress->weixinimg;
              $zhifubao = $ress->zhifubaoimg;
              return view('Newpro.Home.Pay.payments',['title'=>$title,'orders'=>$ress,'weixin'=>$weixin,'zhifubao'=>$zhifubao]);
            }else
            {
              $token = date("YmdHis",time()).rand(1000,9999);
              $total = (int) preg_replace('/\..*/','',$ress->total * 100);
              $time = time();
              $update = \DB::table('orders')->where('id',$ress->id)->update(['_token'=>$token,'addtime'=>$time]);
              if(!$update)
              {
                  \DB::table('orders')->delete($ress->id);
                  \DB::table('detail')->where('orders',$ress->id)->delete();
                  echo "<script> alert('订单创建失败！'); window.location.href='/newpro/center/my_orders' </script>";
                  return false;
              }

              $wechat = new payInterface_native\request_wechat();
              $wechat_url = $wechat->index(['_token'=>$token,'addtime'=>$time,'total'=>$total],'submitOrderInfo');
                
              $alipay = new payInterface_alipay\request_alipay();
              $alipay_url = $alipay->index(['_token'=>$token,'addtime'=>$time,'total'=>$total],'submitOrderInfo');
            
              if( !isset($wechat_url['code_img_url']) || !isset($alipay_url['code_img_url']) )
              {   
                  \DB::table('orders')->delete($ress->id);
                  \DB::table('detail')->where('orders',$ress->id)->delete();
                  echo "<script> alert('订单创建失败！'); window.location.href='/newpro/center/my_orders' </script>";
                  return false;
              }

              \DB::table('orders')->where('id',$ress->id)->update(['weixinimg'=>$wechat_url['code_img_url'],'zhifubaoimg'=>$alipay_url['code_img_url']]);
              $resss = \DB::table('orders')->where('id',$ress->id)->first();
              return view('Newpro.Home.Pay.payments',['title'=>$title,'orders'=>$resss,'weixin'=>$wechat_url['code_img_url'],'zhifubao'=>$alipay_url['code_img_url']]);

            }
            
        }

          $rom = $request->rom;
          $moenyss = 0;
        
          $data  = \DB::table('playgou')->select('id','name','pid','uid','num')->where('id',$ids)->first();
          $data->data = explode(',',$data->pid);
          $data->datas = [];
          $data->path  = '';
          $data->moneys  = 0;
          // dd($data[$k]->data);
          foreach($data->data as $kk => $vv)
          { 

            $data->datas[$kk] = \DB::table('package')->select('id','name','ors','money')->where('id',$vv)->first();
            
            if($data->datas[$kk]->ors !=='智能' )
            { 
              $data->datas[$kk]->moneys = $data->datas[$kk]->money * $rom;
              $data->moneys += $data->datas[$kk]->moneys;
            }else
            {
              $data->datas[$kk]->moneys = $data->datas[$kk]->money;
              $data->moneys += $data->datas[$kk]->moneys;
            }
              $data->path =$data->path.'+'.$data->datas[$kk]->name;
          }
          $moenyss = $data->moneys;
        
      
      $address = \DB::table('address')->where('id',$datas['dizhiid'])->first();

      $orders['uid'] = $uid;
      $orders['rom'] = $rom;
      $orders['name'] = substr($data->path,1);
      $orders['linkman'] = $address->name;
      $orders['address'] = $address->shen.$address->shi.$address->qu.' '.$address->tails;
      $orders['code'] = $address->zipcode;
      $orders['remarks'] = $request->input('remarks')?$request->input('remarks'):'无备注';
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
      $orders['total'] = 8000;
      $orders['totals'] = $moenyss;
      // $orders['total'] = 200000;
      $orders['status'] = 0;
      $orders['zid'] = $ids;
      $orders['addtime'] = time();
      $orders['phone'] = $address->phone;
      $orders['lebel'] = $address->lebel?$address->lebel:'无';
      $orders['_token'] = date("YmdHis",time()).rand(1000,9999);
    
      $res = \DB::table('orders')->insertGetid($orders);

      if($res)
      { 
        foreach($data->datas as $kkk => $vvv)
        {   
            $arr = [];
            $arr['orderid'] = $res;
            $arr['tus'] = '套餐包';
            $arr['pid'] = $vvv->id;
            $arr['name'] = $vvv->name;
            $arr['prince'] = $vvv->money;
            $arr['ors'] = $vvv->ors;
            if($vvv->ors !== '智能')
            {
            $arr['num'] = $rom;
            }else
            {
            $arr['num'] = 1;
            }
            \DB::table('detail')->insert($arr);
        } 

           
            \DB::table('playgou')->delete($ids);
            
            $orderss = \DB::table('orders')->where('id',$res)->first();

            $total = (int) preg_replace('/\..*/','',$orderss->total * 100);
           
            $wechat = new payInterface_native\request_wechat();
            $wechat_url = $wechat->index(['_token'=>$orderss->_token,'addtime'=>$orderss->addtime,'total'=>$total],'submitOrderInfo');
                
            $alipay = new payInterface_alipay\request_alipay();
            $alipay_url = $alipay->index(['_token'=>$orderss->_token,'addtime'=>$orderss->addtime,'total'=>$total],'submitOrderInfo');
            
            if( !isset($wechat_url['code_img_url']) || !isset($alipay_url['code_img_url']) )
            {   
                \DB::table('orders')->delete($res);
                \DB::table('detail')->where('orderid',$res)->delete();
                echo "<script> alert('订单创建失败！'); window.location.href='/newpro/shoppingcart' </script>";
                return false;
            }

            \DB::table('orders')->where('id',$res)->update(['weixinimg'=>$wechat_url['code_img_url'],'zhifubaoimg'=>$alipay_url['code_img_url']]);
            return view('Newpro.Home.Pay.payments',['title'=>$title,'orders'=>$orderss,'weixin'=>$wechat_url['code_img_url'],'zhifubao'=>$alipay_url['code_img_url']]);
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

    public function diyindex(Request $request)
    {
        $title = getwebpage($request->path());
        return view('Newpro.Home.Pay.paymentdiy',['title'=>$title]);

    }

    public function diyindexs(Request $request)
    {
        $this->validate($request,[
            'contract'=>'required|max:255',
            'remarks'=>'max:255',
            'name'=>'required|max:8',
            'room'=>'required|max:30',
            ],[
            'contract.required'=>'合同号不能为空！',
            'contract.max'=>'合同号输入最大255位！',
            'remarks.max'=>'备注输入最大255位！',
            'name.required'=>'姓名不能为空！',
            'name.max'=>'姓名输入最大8位！',
            'room.required'=>'房号不能为空！',
            'room.max'=>'房号输入最大8位！',
            ]);
        $data = $request->except("_token");
        $data['addtime'] = time();
        $data['status'] = 0;
        $data['_token'] = date('YmdHms',time()).rand(100000,999999);

        $total = $data['total'] * 100;
        $total = (int) preg_replace('/\..*/','',$total);

        $wechat = new payInterface_native\request_wechat();
        $wechat_url = $wechat->index(['_token'=>$data['_token'],'addtime'=>$data['addtime'],'total'=>$total],'submitOrderInfo');
                
        $alipay = new payInterface_alipay\request_alipay();
        $alipay_url = $alipay->index(['_token'=>$data['_token'],'addtime'=>$data['addtime'],'total'=>$total],'submitOrderInfo');

        if( empty($wechat_url) || empty($alipay_url) )
        {   
            echo "<script> alert('订单创建失败！'); window.location.href='/newspro/payment/diyindex' </script>";
            return false;
        }
        $res = \DB::table('orders_diy')->insertGetId($data);

        if($res)
        {   
            $data['id'] = $res;
            $data['wechat_url'] = $wechat_url['code_img_url'];
            $data['alipay_url'] = $alipay_url['code_img_url'];
            return view('Newpro.Home.Pay.paymentdiys',['data'=>$data]);
        }else
        {
            echo "<script> alert('订单创建失败！'); window.location.href='/newspro/payment/diyindex' </script>";
        }
    }
}
