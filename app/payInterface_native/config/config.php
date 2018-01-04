<?php
class Config_wechat{
    private $cfg = array(
        'url'=>'https://pay.swiftpass.cn/pay/gateway',
        'mchId'=>'102585335014',//测试商户号，商户上线需改为自己正式的
        'key'=>'b8770c61ddf911e40393d5addb87f1a0',//测试密钥，商户上线需改为自己正式的
        'version'=>'2.0',
		'notify_url'=>'www.jianshanglianmeng.com/payment/wechat/notify'//异步回调通知地址，商户上线需改为自己正式的
       );
    
    public function C($cfgName){
        return $this->cfg[$cfgName];
    }
}
?>