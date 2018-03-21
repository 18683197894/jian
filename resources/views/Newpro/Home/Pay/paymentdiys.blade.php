<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <!--网站SEO关键词优化-->
    <meta name="keywords" content="建商联盟，建建商网，建商支付">
    <meta name="description" content="建商联盟，建建商网，建商支付">
    <!--禁止手机自动缩放-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <!--让IE的文档模式永远都是最新的-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--使用Webkit引擎及V8引擎进行排版及运算-->
    <meta http-equiv="X-UA-Compatible" content="IE=Edge，chrome=1">
    <!--清楚默认样式-->
    <link rel="stylesheet" href="{{ asset('/new/home/public/base.css') }}"/>
    <link rel="stylesheet" href="{{ asset('/new/home/pay/payment_top.css') }}"/>
    <link rel="stylesheet" href="{{ asset('/new/home/pay/paymentdiys.css') }}"/>
    <title>确认支付</title>
</head>
<body>

<div class="Personal_top">
    <div class="Personal_logo">
         <a href="{{ url('/') }}"><img src="{{ asset('/new/home/public/img/logo.png') }}" alt="" class="Logo"/></a>
        <div class="Personal_logo_r">
            <a href="javascript:;">
                <img src="{{ asset('/new/home/publicused/img/header_gg.png') }}" alt=""/>
                免费量房与报价
            </a>
            <a href="javascript:;">
                <img src="{{ asset('/new/home/login/img/hade_1.png') }}" alt=""/>
                装修公司实力认证
            </a>
        </div>
        <span class="gwc">在线支付</span>
    </div>
</div>


<div class="method">
    <div class="Title">扫描二维码选择支付<span>(请在20分钟内支付)</span></div>
    <div class="Platform">
        <div class="yinc">
            <div class="Platform_float">
                <img src="{{ asset('new/home/pay/img/weixin.png') }}" alt=""/>
                <img src="{{ $data['wechat_url'] }}" alt="" class="class_a"/>
            </div>
            <div class="Platform_float">
                <img src="{{ asset('new/home/pay/img/zhifubao.png') }}" alt=""/>
            <img src="{{ $data['alipay_url'] }}" alt="" class="class_a"/>
            </div>
        </div>

        <div class="zhifu_Prompt">
            <div class="Title">请核对您的交易信息</div>
            <div class="information" index="{{ $data['id'] }}">
                <span>订单号：{{ $data['_token'] }}</span>
                <span>姓名：{{ $data['name'] }}</span>
                <span>合同编号：{{ $data['contract'] }}</span>
                <span>楼盘：{{ $data['ors'] }}</span>
                <span>房号：{{ $data['room'] }}</span>
                <span>联系电话：{{ $data['phone'] }}</span>
                <span>金额：<i>{{ $data['total'] }}元</i></span>
                <span>备注：{{ $data['remarks'] or '无备注' }}</span>
            </div>
        </div>
        <div class="Success">
            <span> <img src="{{ asset('/new/home/pay/img/goug.png') }}" alt=""/><i>支付成功!</i></span>
            <a href="{{ url('/') }}">返回首页</a>
        </div>
    </div>
</div>

<script src="{{ asset('/js/jquery-1.8.3.min.js') }}"></script>
<script src="{{ asset('/new/home/pay/paymentdiys.js') }}"></script>

</body>
</html>