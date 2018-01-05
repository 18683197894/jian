<?php
/**
 * 支付接口调测例子
 * ================================================================
 * index 进入口，方法中转
 * submitOrderInfo 提交订单信息
 * queryOrder 查询订单
 * 
 * ================================================================
 */
namespace payInterface_native;
require('../app/payInterface_native/Utils.class.php');
require('../app/payInterface_native/config/config.php');
require('../app/payInterface_native/class/RequestHandler.class.php');
require('../app/payInterface_native/class/ClientResponseHandler.class.php');
require('../app/payInterface_native/class/PayHttpClient.class.php');
use ClientResponseHandler_wechat;
use RequestHandler_wechat;
use PayHttpClient_wechat;
use Config_wechat;
use Utils_wechat;
Class Request_wechat{
    //$url = 'http://192.168.1.185:9000/pay/gateway';

    private $resHandler = null;
    private $reqHandler = null;
    private $pay = null;
    private $cfg = null;
    
    public function __construct(){
		file_put_contents("huidiao.txt", date("Y-m-d H:i:s",time()).",时间:construct".PHP_EOL,FILE_APPEND);
        $this->Request();
    }

    public function Request(){
		file_put_contents("huidiao.txt", date("Y-m-d H:i:s",time()).",时间:request".PHP_EOL,FILE_APPEND);
        $this->resHandler = new ClientResponseHandler_wechat();
        $this->reqHandler = new RequestHandler_wechat();
        $this->pay = new PayHttpClient_wechat();
        $this->cfg = new Config_wechat();

        $this->reqHandler->setGateUrl($this->cfg->C('url'));
        $this->reqHandler->setKey($this->cfg->C('key'));
    }
    	
	
    public function index($res,$methods){
        // $method = isset($_REQUEST['method'])?$_REQUEST['method']:'submitOrderInfo';
        $method = $methods;
        switch($method){
            case 'submitOrderInfo'://提交订单
                return $this->submitOrderInfo($res);
            break;
            case 'queryOrder'://查询订单
                $this->queryOrder();
            break;
            case 'submitRefund'://提交退款
                $this->submitRefund();
            break;
            case 'queryRefund'://查询退款
                $this->queryRefund();
            break;
			case 'closeOrder'://关闭订单
                $this->closeOrder($res);
            break;
            case 'callback':
                $this->callback();
            break;
        }
    }
    
    /**
     * 提交订单信息
     */
    public function submitOrderInfo($res){
        $_POST['total_fee'] =$res['total'];
        $_POST['time_start'] = date('YmdHms',$res['addtime']);
        $_POST['time_expire'] = date('YmdHms',$res['addtime'] + 5000);
        $this->reqHandler->setReqParams($_POST,array('method'));
        $this->reqHandler->setParameter('service','pay.weixin.native');//接口类型
        $this->reqHandler->setParameter('mch_id',$this->cfg->C('mchId'));//必填项，商户号，由平台分配
        $this->reqHandler->setParameter('version',$this->cfg->C('version'));
		$this->reqHandler->setParameter('op_shop_id','1314');
		$this->reqHandler->setParameter('device_info','建商联盟');
		
		$this->reqHandler->setParameter('body','建商联盟');
		
		$this->reqHandler->setParameter('mch_create_ip','127.0.0.1');
		$this->reqHandler->setParameter('out_trade_no',$res['_token'].'wechat');
	
		$this->reqHandler->setParameter('op_device_id','建商联盟');
		$this->reqHandler->setParameter('limit_credit_pay','1');
		//this->reqHandler->setParameter('goods_tag','1fds');
        //$this->reqHandler->setParameter('groupno','8111100093');
        //通知地址，必填项，接收平台通知的URL，需给绝对路径，255字符内格式如:http://wap.tenpay.com/tenpay.asp
        //$notify_url = 'http://'.$_SERVER['HTTP_HOST'];
        //$this->reqHandler->setParameter('notify_url',$notify_url.'/payInterface/request.php?method=callback');
		$this->reqHandler->setParameter('notify_url',$this->cfg->C('notify_url'));
        $this->reqHandler->setParameter('nonce_str',mt_rand(time(),time()+rand()));//随机字符串，必填项，不长于 32 位
        $this->reqHandler->createSign();//创建签名
        $data = $this->reqHandler->getAllParameters();
        // var_dump($data);
        $data = Utils_wechat::toXml($data);
        
        $this->pay->setReqContent($this->reqHandler->getGateURL(),$data);
        if($this->pay->call()){
            $this->resHandler->setContent($this->pay->getResContent());
            $this->resHandler->setKey($this->reqHandler->getKey());
            if($this->resHandler->isTenpaySign()){

                //当返回状态与业务结果都为0时才返回支付二维码，其它结果请查看接口文档
                if($this->resHandler->getParameter('status') == 0 && $this->resHandler->getParameter('result_code') == 0){
                    $arr = array('code_img_url'=>$this->resHandler->getParameter('code_img_url'),
                                           'code_url'=>$this->resHandler->getParameter('code_url'),
                                           'code_status'=>$this->resHandler->getParameter('code_status'));
                    return $arr;
                }else{
                    echo json_encode(array('status'=>500,'msg'=>'Error Code:'.$this->resHandler->getParameter('err_code').' Error Message:'.$this->resHandler->getParameter('err_msg')));
                    // exit();
                }
            }
            echo json_encode(array('status'=>500,'msg'=>'Error Code:'.$this->resHandler->getParameter('status').' Error Message:'.$this->resHandler->getParameter('message')));
        }else{
            echo json_encode(array('status'=>500,'msg'=>'Response Code:'.$this->pay->getResponseCode().' Error Info:'.$this->pay->getErrInfo()));
        }
    }

    /**
     * 查询订单
     */
    public function queryOrder(){
        $this->reqHandler->setReqParams($_POST,array('method'));
        $reqParam = $this->reqHandler->getAllParameters();
        if(empty($reqParam['transaction_id']) && empty($reqParam['out_trade_no'])){
            echo json_encode(array('status'=>500,
                                   'msg'=>'请输入商户订单号,平台订单号!'));
            exit();
        }
        $this->reqHandler->setParameter('version',$this->cfg->C('version'));
        $this->reqHandler->setParameter('service','unified.trade.query');//接口类型：
	
        $this->reqHandler->setParameter('mch_id',$this->cfg->C('mchId'));//必填项，商户号，由平台分配
        $this->reqHandler->setParameter('nonce_str',mt_rand(time(),time()+rand()));//随机字符串，必填项，不长于 32 位
        $this->reqHandler->createSign();//创建签名
        $data = Utils_wechat::toXml($this->reqHandler->getAllParameters());

        $this->pay->setReqContent($this->reqHandler->getGateURL(),$data);
        if($this->pay->call()){
            $this->resHandler->setContent($this->pay->getResContent());
            $this->resHandler->setKey($this->reqHandler->getKey());
            if($this->resHandler->isTenpaySign()){
                $res = $this->resHandler->getAllParameters();
                Utils_wechat::dataRecodes('查询订单',$res);
                //支付成功会输出更多参数，详情请查看文档中的7.1.4返回结果
                echo json_encode(array('status'=>200,'msg'=>'查询订单成功，请查看result.txt文件！','data'=>$res));
                exit();
            }
            echo json_encode(array('status'=>500,'msg'=>'Error Code:'.$this->resHandler->getParameter('status').' Error Message:'.$this->resHandler->getParameter('message')));
        }else{
            echo json_encode(array('status'=>500,'msg'=>'Response Code:'.$this->pay->getResponseCode().' Error Info:'.$this->pay->getErrInfo()));
        }
    }
    
    /**
     * 提交退款
     */
    public function submitRefund(){
        $this->reqHandler->setReqParams($_POST,array('method'));
        $reqParam = $this->reqHandler->getAllParameters();
        if(empty($reqParam['transaction_id']) && empty($reqParam['out_trade_no'])){
            echo json_encode(array('status'=>500,
                                   'msg'=>'请输入商户订单号或平台订单号!'));
            exit();
        }
        $this->reqHandler->setParameter('version',$this->cfg->C('version'));
        $this->reqHandler->setParameter('service','unified.trade.refund');//接口类型
        $this->reqHandler->setParameter('mch_id',$this->cfg->C('mchId'));//必填项，商户号，由平台分配
        $this->reqHandler->setParameter('nonce_str',mt_rand(time(),time()+rand()));//随机字符串，必填项，不长于 32 位
        $this->reqHandler->setParameter('op_user_id',$this->cfg->C('mchId'));//必填项，操作员帐号,默认为商户号

        $this->reqHandler->createSign();//创建签名
        $data = Utils_wechat_wechat::toXml($this->reqHandler->getAllParameters());//将提交参数转为xml，目前接口参数也只支持XML方式

        $this->pay->setReqContent($this->reqHandler->getGateURL(),$data);
        if($this->pay->call()){
            $this->resHandler->setContent($this->pay->getResContent());
            $this->resHandler->setKey($this->reqHandler->getKey());
            if($this->resHandler->isTenpaySign()){
                //当返回状态与业务结果都为0时才返回，其它结果请查看接口文档
                if($this->resHandler->getParameter('status') == 0 && $this->resHandler->getParameter('result_code') == 0){
                    /*$res = array('transaction_id'=>$this->resHandler->getParameter('transaction_id'),
                                 'out_trade_no'=>$this->resHandler->getParameter('out_trade_no'),
                                 'out_refund_no'=>$this->resHandler->getParameter('out_refund_no'),
                                 'refund_id'=>$this->resHandler->getParameter('refund_id'),
                                 'refund_channel'=>$this->resHandler->getParameter('refund_channel'),
                                 'refund_fee'=>$this->resHandler->getParameter('refund_fee'),
                                 'coupon_refund_fee'=>$this->resHandler->getParameter('coupon_refund_fee'));*/
                    $res = $this->resHandler->getAllParameters();
                    Utils_wechat_wechat::dataRecodes('提交退款',$res);
                    echo json_encode(array('status'=>200,'msg'=>'退款成功,请查看result.txt文件！','data'=>$res));
                    exit();
                }else{
                    echo json_encode(array('status'=>500,'msg'=>'Error Code:'.$this->resHandler->getParameter('err_code').' Error Message:'.$this->resHandler->getParameter('err_msg')));
                    exit();
                }
            }
            echo json_encode(array('status'=>500,'msg'=>'Error Code:'.$this->resHandler->getParameter('status').' Error Message:'.$this->resHandler->getParameter('message')));
        }else{
            echo json_encode(array('status'=>500,'msg'=>'Response Code:'.$this->pay->getResponseCode().' Error Info:'.$this->pay->getErrInfo()));
        }
    }

    /**
     * 查询退款
     */
    public function queryRefund(){
        $this->reqHandler->setReqParams($_POST,array('method'));
        if(count($this->reqHandler->getAllParameters()) === 0){
            echo json_encode(array('status'=>500,
                                   'msg'=>'请输入商户订单号,平台订单号,商户退款单号,平台退款单号!'));
            exit();
        }
        $this->reqHandler->setParameter('version',$this->cfg->C('version'));
        $this->reqHandler->setParameter('service','unified.trade.refundquery');//接口类型
        $this->reqHandler->setParameter('mch_id',$this->cfg->C('mchId'));//必填项，商户号，由平台分配
        $this->reqHandler->setParameter('nonce_str',mt_rand(time(),time()+rand()));//随机字符串，必填项，不长于 32 位
        
        $this->reqHandler->createSign();//创建签名
        $data = Utils_wechat_wechat::toXml($this->reqHandler->getAllParameters());//将提交参数转为xml，目前接口参数也只支持XML方式

        $this->pay->setReqContent($this->reqHandler->getGateURL(),$data);//设置请求地址与请求参数
        if($this->pay->call()){
            $this->resHandler->setContent($this->pay->getResContent());
            $this->resHandler->setKey($this->reqHandler->getKey());
            if($this->resHandler->isTenpaySign()){
                //当返回状态与业务结果都为0时才返回，其它结果请查看接口文档
                if($this->resHandler->getParameter('status') == 0 && $this->resHandler->getParameter('result_code') == 0){
                    /*$res = array('transaction_id'=>$this->resHandler->getParameter('transaction_id'),
                                  'out_trade_no'=>$this->resHandler->getParameter('out_trade_no'),
                                  'refund_count'=>$this->resHandler->getParameter('refund_count'));
                    for($i=0; $i<$res['refund_count']; $i++){
                        $res['out_refund_no_'.$i] = $this->resHandler->getParameter('out_refund_no_'.$i);
                        $res['refund_id_'.$i] = $this->resHandler->getParameter('refund_id_'.$i);
                        $res['refund_channel_'.$i] = $this->resHandler->getParameter('refund_channel_'.$i);
                        $res['refund_fee_'.$i] = $this->resHandler->getParameter('refund_fee_'.$i);
                        $res['coupon_refund_fee_'.$i] = $this->resHandler->getParameter('coupon_refund_fee_'.$i);
                        $res['refund_status_'.$i] = $this->resHandler->getParameter('refund_status_'.$i);
                    }*/
                    $res = $this->resHandler->getAllParameters();
                    Utils_wechat::dataRecodes('查询退款',$res);
                    echo json_encode(array('status'=>200,'msg'=>'查询成功,请查看result.txt文件！','data'=>$res));
                    exit();
                }else{
                    echo json_encode(array('status'=>500,'msg'=>'Error Code:'.$this->resHandler->getParameter('err_code')));
                    exit();
                }
            }
            echo json_encode(array('status'=>500,'msg'=>$this->resHandler->getContent()));
        }else{
            echo json_encode(array('status'=>500,'msg'=>'Response Code:'.$this->pay->getResponseCode().' Error Info:'.$this->pay->getErrInfo()));
        }
    }
    /**
     * 关闭订单
     */
    public function closeOrder($data){
        
        $this->reqHandler->setReqParams(['out_trade_no'=>$data['_token'].'wechat'],array('method'));
        $reqParam = $this->reqHandler->getAllParameters();
        if(empty($reqParam['transaction_id']) && empty($reqParam['out_trade_no'])){
            echo json_encode(array('status'=>500,
                                   'msg'=>'请输入商户订单号或平台订单号!'));
            // exit();
        }
        $this->reqHandler->setParameter('version',$this->cfg->C('version'));
        $this->reqHandler->setParameter('service','unified.trade.close');//接口类型
        $this->reqHandler->setParameter('mch_id',$this->cfg->C('mchId'));//必填项，商户号，由平台分配
        $this->reqHandler->setParameter('nonce_str',mt_rand(time(),time()+rand()));//随机字符串，必填项，不长于 32 位
        $this->reqHandler->createSign();//创建签名
        $data = Utils_wechat::toXml($this->reqHandler->getAllParameters());

        $this->pay->setReqContent($this->reqHandler->getGateURL(),$data);
        if($this->pay->call()){
            $this->resHandler->setContent($this->pay->getResContent());
            $this->resHandler->setKey($this->reqHandler->getKey());
            if($this->resHandler->isTenpaySign()){
                $res = $this->resHandler->getAllParameters();
                Utils_wechat::dataRecodes('关闭订单',$res);
                //支付成功会输出更多参数，详情请查看文档中的7.1.4返回结果
                //echo json_encode(array('status'=>200,'msg'=>'查询订单成功，请查看result.txt文件！','data'=>$res));
                // exit();
                return false;
            }
            return false;
            echo json_encode(array('status'=>500,'msg'=>'Error Code:'.$this->resHandler->getParameter('status').' Error Message:'.$this->resHandler->getParameter('message')));
        }else{
            return false;
            echo json_encode(array('status'=>500,'msg'=>'Response Code:'.$this->pay->getResponseCode().' Error Info:'.$this->pay->getErrInfo()));
        }
    }
    /**
     * 后台异步通知处理
     */
    public function callback(){
        		
        $xml = file_get_contents('php://input');
		file_put_contents('pay/wechat/1.txt',$xml);//检测是否执行callback方法，如果执行，会生成1.txt文件，且文件中的内容就是通知参数
        $this->resHandler->setContent($xml);
		
        $this->resHandler->setKey($this->cfg->C('key'));
        if($this->resHandler->isTenpaySign())
        {
              
            if($this->resHandler->getParameter('status') == 0 && $this->resHandler->getParameter('result_code') == 0)
            {
               
                $_token = preg_replace('/wechat/','',$this->resHandler->getParameter('out_trade_no'));
				$res = \DB::table('orders')->where('_token',$_token)->where('status',0)->first();

                if(!$res)
                {
                   return false; 
                   exit;
                }
                $total = $res->total * 100;
                $total = preg_replace('/\..*/','',$total);
                $create_id = $this->resHandler->getParameter('transaction_id');
                $total_fee = $this->resHandler->getParameter('total_fee');
				//校验单号和金额是否一致，更改订单状态等业务处理
				if($total_fee == $total)
                {
                     
                        \DB::table('orders')->where('id',$res->id)->update(['create_id'=>$create_id,'status'=>1]);
                        $status = \DB::table('orders')->where('id',$res->id)->first()->status;
                        if($status ==1)
                        {   

                            Utils_wechat::dataRecodes('接口回调收到通知参数',$this->resHandler->getAllParameters());
                            echo 'success';
                            file_put_contents('pay/wechat/2.txt',1);//如果生成2.txt,说明前一步的输出success是有执行
                            $str = '感谢订购建商联盟产品，请记住你的订单号：'.$_token.'wechat';

                            $detail = \DB::table('detail')->select('id','orderid','pid')->where('orderid',$res->id)->get();
                            zend_code($res->phone,$str);
                            
                            foreach( $detail as $k => $v )
                            {
                                \DB::table('playgou')->where('pid',$v->pid)->delete();
                            }

                            exit();
                        }else
                        {   
                            exit;
                        }
                        
                    

                }else
                {
                   return false; 
                   exit;
                }
			
                
            }else{
                echo 'failure1';
                exit();
            }
        }else{
            echo 'failure2';
        }
    }
}

?>