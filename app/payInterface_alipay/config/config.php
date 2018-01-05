<?php
// namespace Config_alipay;
class Config_alipay{
    private $cfg = array(
        'url'=>'https://pay.swiftpass.cn/pay/gateway',	//支付请求url，无需更改
        'mchId'=>'102585335014',//测试商户号，商户上线需改为自己正式的
        'key'=>'b8770c61ddf911e40393d5addb87f1a0',//测试密钥，商户上线需改为自己正式的
		'notify_url'=>'http://www.jianshanglianmeng.com/payment/alipay/notify',//测试通知url，此处默认为空格商户需更改为自己的，保证能被外网访问到（否则支付成功后收不到服务器所发通知）
		
        'version'=>'2.0'		//版本号
       );
    
    public function C($cfgName){
        return $this->cfg[$cfgName];
    }
}
?>