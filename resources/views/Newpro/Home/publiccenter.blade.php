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
    <!--New_header样式-->
    <!--尾部样式-->
    <link rel="stylesheet" href="{{ asset('/new/home/public/footer.css') }}"/>
    <link rel="stylesheet" href="{{ asset('/new/home/publiccenter/publiccenter.css') }}" />
    <script src="{{ asset('/js/jquery-1.8.3.min.js') }}"></script>
    <title>{{ $title['title'] or '建商联盟' }}</title>
    @yield('css')
</head>
<body>

<div class="nav_top">
    <div class="auto">
        <a href="{{ url('/newpro/shoppingcart') }}">购物车</a>
        <span></span>
        <a href="{{ url('/newpro/center/my_orders') }}">我的订单</a>
        <span></span>
        <a href="{{ url('/') }}">首页</a>
        <span></span>
        <a href="javascript:;">{{ session('Home')->name }}</a>
    </div>
</div>
<div class="Personal_top">
    <div class="Personal_logo">
        <a href="{{ url('/') }}" class="logo_a"><img src="{{ asset('/new/home/publicused/img/logo.png') }}" alt="" class="Logo"/></a>
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
        <span class="gwc">{{ $title['title'] or '个人中心' }}</span>
    </div>
</div>

<div class="contact">
    <div class="contact_left">
        <a href="javascript:;" class="title">订单中心</a>
        <a href="{{ url('/newpro/center/my_orders') }}" @if($ors == 'my_orders') class="avtive" @endif>我的订单</a>
        <!-- <a href="javascript:;" >评价晒单(2)</a> -->

        <a href="javascript:;" class="title">个人中心</a>
        <!-- <a href="" class="">我的个人中心</a> -->
        <a href="{{ url('/newpro/center/my_notice') }}" @if($ors == 'my_notice') class="avtive" @endif class="">消息通知</a>
        <a href="{{ url('/newpro/center/my_address') }}" @if($ors == 'my_address') class="avtive" @endif>收货地址</a>

        <!-- <a href="javascript:;" class="title">售后服务</a>
        <a href="javascript:;" class="">服务记录</a>
        <a href="javascript:;" class="">申请服务</a> -->

        <a href="javascript:;" class="title">账户管理</a>
        <a href="{{ url('/newpro/center/my_personal') }}" class="">个人信息</a>
        <a href="{{ url('/newpro/center/my_modify') }}" @if($ors == 'my_modify') class="avtive" @endif class="">修改密码</a>
    </div>
    @yield('content')
</div>

<div class="snajiao"></div>
<!--尾部-->
<div class="footer">
    <div class="auto">
        <div class="about">
            <div class="title">关于建商</div>
            <i></i>
            <a href="{{ url('/newpro/about?ors=about') }}" class="about_loop">建商简介</a>
            <a href="{{ url('/newpro/about?ors=team') }}" class="about_loop">运营团队</a>
            <!-- <a href="{{ url('/newpro/about?ors=strategy') }}" class="about_loop">发展战略</a> -->
            <a href="{{ url('/newpro/about?ors=framework') }}" class="about_loop">组织构架</a>
            <a href="{{ url('/newpro/about?ors=contact') }}" class="about_loop">联系我们</a>
        </div>
        <div class="about">
            <div class="title">建商项目</div>
            <i></i>
            <a href="{{ url('/newpro/smarthome') }}" class="about_loop">智能家居</a>
            <a href="{{ url('/newpro/package/jizhuang') }}" class="about_loop">建商家装</a>
            <!-- <a href="{{ url('/newpro/ressmartunity') }}" class="about_loop">住宅智慧社区</a> -->
            <!-- <a href="{{ url('/newpro/businsmart') }}" class="about_loop">商业智慧商圈</a> -->
        </div>
        <div class="about">
            <div class="title">建商服务</div>
            <i></i>
            <a href="{{ url('/newpro/case/index') }}" class="about_loop">工程案例</a>
            <a href="{{ url('/newpro/product') }}" class="about_loop">产品展示</a>
            <a href="{{ url('/newpro/newslist?pid=常见问答') }}" class="about_loop">常见问答</a>
            <a href="{{ url('/newpro/used/business') }}" class="about_loop">商务合作</a>
            
            
        </div>
        <div class="contact">
            <div class="title">联系我们</div>
            <i></i>
            <a href="javascript:;" class="about_loop">服务热线：0831-8888598</a>
            <a href="javascript:;" class="about_loop">电子邮箱：market@jianshanglianmeng.com</a>
            <a href="javascript:;" class="about_loop">总部地址：宜宾市临港经济开发区西南互联网基地522</a>
        </div>
        <div class="code">
            <div class="title">关注我们</div>
            <i></i>
            <div class="QR">
                <img src="{{ asset('/new/home/public/img/QR1.png') }}" alt=""/>
                <span>建商官网订阅号</span>
            </div>
            <!-- <div class="QR">
                <img src="{{ asset('/new/home/public/img/QR2.png') }}" alt=""/>
                <span>建商官网服务号</span>
            </div> -->
        </div>
    </div>
</div>
<!--版权-->
<div class="copyright">
<span>CopyRight 2017-2020 建商联盟版权所有 ICP备案：</span><i>蜀ICP备17010220 </i>&nbsp;&nbsp;
<script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1273388296'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s13.cnzz.com/z_stat.php%3Fid%3D1273388296%26show%3Dpic' type='text/javascript'%3E%3C/script%3E"));</script>

</div>

</body>

</html>