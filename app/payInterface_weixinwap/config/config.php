<?php
class Config_weixinweb{
    private $cfg = array(
		//�ӿ������ַ���̶����䣬�����޸�
        'url'=>'https://pay.swiftpass.cn/pay/gateway',
		//�����̻��ţ��̻����Ϊ�Լ���
        'mchId'=>'102585335014',
		//������Կ���̻����Ϊ�Լ���
        'key'=>'b8770c61ddf911e40393d5addb87f1a0',
        //֧���ص���ַ
        'notify_url' => 'www.jianshanglianmeng.com/webpro/weixinweb/notify',
		//�汾��Ĭ��2.0
        'version'=>'2.0'
       );
    
    public function C($cfgName){
        return $this->cfg[$cfgName];
    }
}
?>