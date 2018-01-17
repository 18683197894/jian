<?php
class Config_weixinweb{
    private $cfg = array(
		//接口请求地址，固定不变，无需修改
        'url'=>'https://pay.swiftpass.cn/pay/gateway',
		//测试商户号，商户需改为自己的
        'mchId'=>'102585335014',
		//测试密钥，商户需改为自己的
        'key'=>'b8770c61ddf911e40393d5addb87f1a0',
        //支付回调地址
        'notify_url' => 'www.jianshanglianmeng.com/webpro/weixinweb/notify',
		//版本号默认2.0
        'version'=>'2.0'
       );
    
    public function C($cfgName){
        return $this->cfg[$cfgName];
    }
}
?>