<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <!--网站SEO关键词优化-->
    <meta name="keywords" content="{{ $title->keyworlds or '建商联盟' }}">
    <meta name="description" content="{{ $title->description or '建商联盟' }}">
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
    <link rel="stylesheet" href="{{ asset('/new/home/publicused/publicused.css') }}"/>
    <link rel="stylesheet" href="{{ asset('/new/home/public/footer.css') }}"/>
    <script src="{{ asset('/js/jquery-1.8.3.min.js') }}"></script>
    

    <title>{{ $title->titles or '建商联盟' }}</title>
@yield('css')
</head>
<body>

<div class="header">
    <div class="header_atou">
        <div class=header_top>
            <img src="{{ asset('/new/home/publicused/img/logo.png') }}" alt="" class="Logo"/>
            <div class="search">
                <a href="javascript:;" class="link">
                    <img src="{{ asset('/new/home/publicused/img/header_gg.png') }}" alt=""/>
                    免费量房与报价
                </a>
                <a href="javascript:;" class="link">
                    <img src="{{ asset('/new/home/publicused/img/header_gg.png') }}" alt=""/>
                    免费量房与报价
                </a>
                <div class="search_i">
                    <input type="text" placeholder="海量效果图任你选"/>
                    <div class="click">
                        <img src="{{ asset('/new/home/publicused/img/search_i.png') }}" alt=""/>
                    </div>
                </div>
            </div>
        </div>
        <div class="nav">
            <a href="{{ url('/') }}">首页</a>
            <a href="javascript:;">设计风格</a>
            <a href="javascript:;">建商工程</a>
            <a href="javascript:;">精装房</a>
            <a href="javascript:;">建商家装</a>
            <a href="javascript:;">建商网</a>
            <a href="javascript:;">联系我们</a>
        </div>
        <a href="javascript:;" class="botton">
            <span></span>
            <span></span>
            <span></span>
        </a>
    </div>

</div>

@yield('content')
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
@yield('js')
<script src="{{ asset('/new/home/public/header.js') }}"></script>
</body>
</html>