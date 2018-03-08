<!DOCTYPE html>
<html>
<head lang="en">
       <meta charset="UTF-8">
    <!--网站SEO关键词优化-->
    <meta name="keywords" content="{{ $title['keyworlds'] or '建商联盟' }}">
    <meta name="description" content="{{ $title['description'] or '建商联盟' }}">
    <!--禁止手机自动缩放-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <!--让IE的文档模式永远都是最新的-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!--使用Webkit引擎及V8引擎进行排版及运算-->
    <meta http-equiv="X-UA-Compatible" content="IE=Edge，chrome=1">
    <!--清楚默认样式-->
    <link rel="stylesheet" href="{{ asset('/new/home/public/base.css') }}"/>
    <!--首页样式-->
    <!--尾部样式-->
    <link rel="stylesheet" href="{{ asset('/new/home/pay/payments.css') }}">
    <script src="{{ asset('/js/jquery-1.8.3.min.js') }}"></script>

    <link rel="stylesheet" href="{{ asset('/new/home/public/footer.css') }}"/>
    <title>{{ $title['title'] or '建商联盟' }}</title>
</head>
<body>
<div class="nav_top">
    <div class="auto">
        <a href="javascript:;">热线电话：400-188-6585</a>
        <span></span>
        <a href="{{ url('/newpro/center/my_orders') }}">个人中心</a>
        <span></span>
        <a href="javascript:;">{{ session('Home')->name }}</a>
    </div>
</div>
<div class="contact">
    <div class="contact_logo">
        <img src="{{ asset('/home/images/logo.png') }}" alt="" class="logo"/>
        <div class="contact_logo_r">
            <a href="javascript:;">
                <img src="{{ asset('/new/home/publicused/img/header_gg.png') }}" alt=""/>
                免费量房与报价
            </a>
            <a href="javascript:;">
                <img src="{{ asset('/new/home/login/img/hade_1.png') }}" alt=""/>
                装修公司实力认证
            </a>
        </div>
        <span class="gwc">支付订单</span>
    </div>
    <div class="payment">
        <div class="Success">
            <div class="top">
                <img src="{{ asset('/new/home/pay/img/goug.png') }}" alt=""/>
                <div class="title">
                    <div class="left">
                        <div class="name">订单提交成功</div>
                        <!-- <div class="neir">请于 <i>30分钟</i> 内完成支付 超时将取消订单</div> -->
                    </div>
                    <div class="right">应付金额：<i>{{ $orders->total }} 元</i></div>
                </div>
            </div>
            <div class="Order" index="{{ $orders->id }}">
                <p>订单号：<span>{{ $orders->_token }}</span></p>
                <p>收货信息：<i>  {{ $orders->address }}</i></p>
                <p>商品名称：<i></i></p>
                <p>配送时间：<i>不限收货时间</i></p>
                <p>发票信息：<i>{{ $orders->invoice }}</i></p>
            </div>
        </div>
        <div class="mode">
            <div class="title">选择一下支付方式付款</div>
            <div class="platform">

                <div class="biaoti">支付平台</div>
                <div class="Choice">
                    <div class="left">
                        <img src="{{ asset('new/home/pay/img/weixin.png') }}" alt=""/>
                        <img src="{{ $weixin }}" alt="" class="weixin"/>
                    </div>
                    <div class="left">
                        <img src="{{ asset('new/home/pay/img/zhifubao.png') }}" alt=""/>
                        <img src="{{ $zhifubao }}" alt="" class="weixin"/>
                    </div>
                </div>
            </div>
            <div class="paid" style="display:none">
              支付成功！ <span>30</span> 秒后自动跳转<a href="{{ url('/newpro/center/my_orders') }}">个人中心</a>
            </div>
        </div>
        
    </div>
</div>

<!--尾部-->
<div class="footer">
    <div class="auto">
        <div class="about">
            <div class="title">关于建商</div>
            <i></i>
            <a href="javascript:;" class="about_loop">建商介绍</a>
            <a href="javascript:;" class="about_loop">建商团队</a>
            <a href="javascript:;" class="about_loop">建商文化</a>
            <a href="javascript:;" class="about_loop">联系我们</a>
        </div>
        <div class="about">
            <div class="title">建商项目</div>
            <i></i>
            <a href="javascript:;" class="about_loop">智能家居</a>
            <a href="javascript:;" class="about_loop">智慧地产</a>
            <a href="javascript:;" class="about_loop">智慧商圈</a>
            <a href="javascript:;" class="about_loop">智慧文旅</a>
        </div>
        <div class="about">
            <div class="title">建商服务</div>
            <i></i>
            <a href="javascript:;" class="about_loop">建商工程</a>
            <a href="javascript:;" class="about_loop">精装房</a>
            <a href="javascript:;" class="about_loop">建商家装</a>
            <a href="javascript:;" class="about_loop">建商网</a>
        </div>
        <div class="contact">
            <div class="title">联系我们</div>
            <i></i>
            <a href="javascript:;" class="about_loop">服务热线：400-188-6585</a>
            <a href="javascript:;" class="about_loop">电子邮箱：market@jianshanglianmeng.com</a>
            <a href="javascript:;" class="about_loop">总部地址：四川省宜宾市临港经济开发区西南互联网基地522室</a>
        </div>
        <div class="code">
            <div class="title">关注我们</div>
            <i></i>
            <div class="QR">
                <img src="{{ asset('/new/home/public/img/QR1.png') }}" alt=""/>
                <span>建商官网订阅号</span>
            </div>
            <div class="QR">
                <img src="{{ asset('/new/home/public/img/QR2.png') }}" alt=""/>
                <span>建商官网服务号</span>
            </div>
        </div>
    </div>
</div>
<!--版权-->
<div class="copyright">CopyRight 2017-2020 建商联盟版权所有 ICP备案：蜀ICP备17010220</div>
<script src="{{ asset('/new/home/pay/payments.js') }}"></script>

</body>
</html>