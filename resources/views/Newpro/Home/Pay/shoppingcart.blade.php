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
    <link rel="stylesheet" href="{{ asset('/new/home/pay/shoppingcart.css') }}">
    <script src="{{ asset('/js/jquery-1.8.3.min.js') }}"></script>

    <link rel="stylesheet" href="{{ asset('/new/home/public/footer.css') }}"/>
    <title>{{ $title['title'] or '建商联盟' }}</title>
    <title>购物车</title>
</head>
<body>
<div class="nav_top">
    <div class="auto">
        <a href="javascript:;">热线电话：0831-8888598</a>
        <span></span>
        <a href="{{ url('/newpro/center/my_orders') }}">个人中心</a>
        <span></span>
        <a href="javascript:;">{{ session('Home')->name }}</a>
    </div>
</div>

<div class="contact">
    <div class="contact_logo">
        <a href="{{ url('/') }}"><img src="{{ asset('/home/images/logo.png') }}" alt="" class="logo"/></a>
    
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
        <span class="gwc">购物车</span>
    </div>
    <div  class="shopping">
        <ul class="top">
            <li><!-- <input type="checkbox" id="" class="quan" ><span>全选</span> --></li>
            <li class="mc">名称</li>
            <li class="name">基装包</li>
            <li class="name">软装包</li>
            <li class="name">智能包</li>
            <li class="cz">操作</li>
        </ul>
       
        @if($data->count() > 0)
        @foreach($data as $k => $v)
        <ul class="con">
            <li><input index="xuan" id="{{ $v->id }}" name="asa" type="radio"><span>选择</span></li>
            <li class="mc">{{ $v->name }}</li>
            <li class="name">
            <div class="name_top">{{ $v->datas[0]->name }}</div>
            <div class="name_bo">{{ $v->datas[0]->money }}/㎡</div>
            </li>
             <li class="name">
            <div class="name_top">{{ $v->datas[1]->name }}</div>
            <div class="name_bo">{{ $v->datas[1]->money }}/㎡</div>
            </li>
             <li class="name">
            @if(isset($v->datas[2]))
            <div class="name_top">{{ $v->datas[2]->name }}</div>
            <div class="name_bo">{{ $v->datas[2]->money }}/㎡</div>
            @endif
            </li>
            <li class="cz"><i>×</i></li>
        </ul>
        @endforeach
        
        @endif
        <div class="Settlement">
            <!-- <div class="shop">共 <span>1</span> 件商品 已选择 <span>1</span> 件</div> -->
            <div class="money">
                <div class="Total">请输入房屋面积：<input type="text" name="rom" placeholder="单位/㎡"></div>
                <button>去结算</button>
            </div>
        </div>
    </div >
</div>


<!--尾部-->
<div class="footer">
    <div class="auto">
        <div class="about">
            <div class="title">关于建商</div>
            <i></i>
            <a href="{{ url('/newpro/about?ors=about') }}" class="about_loop">建商简介</a>
            <a href="{{ url('/newpro/about?ors=team') }}" class="about_loop">运营团队</a>
            <a href="{{ url('/newpro/about?ors=strategy') }}" class="about_loop">发展战略</a>
            <a href="{{ url('/newpro/about?ors=framework') }}" class="about_loop">组织构架</a>
            <a href="{{ url('/newpro/about?ors=contact') }}" class="about_loop">联系我们</a>
        </div>
        <div class="about">
            <div class="title">建商项目</div>
            <i></i>
            <a href="{{ url('/newpro/smarthome') }}" class="about_loop">智能家居</a>
            <a href="{{ url('/newpro/ressmartunity') }}" class="about_loop">住宅智慧社区</a>
            <a href="{{ url('/newpro/businsmart') }}" class="about_loop">商业智慧商圈</a>
        </div>
        <div class="about">
            <div class="title">建商服务</div>
            <i></i>
            <a href="{{ url('/newpro/case/index') }}" class="about_loop">工程案例</a>
            <a href="{{ url('/newpro/package/jizhuang') }}" class="about_loop">建商家装</a>
        </div>
        <div class="contact">
            <div class="title">联系我们</div>
            <i></i>
            <a href="javascript:;" class="about_loop">服务热线：0831-8888598</a>
            <a href="javascript:;" class="about_loop">电子邮箱：market@jianshanglianmeng.com</a>
            <a href="javascript:;" class="about_loop">总部地址：宜宾市临港经济开发区西南互联网基地522室</a>
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
<div class="copyright"><span>CopyRight 2017-2020 建商联盟版权所有 ICP备案：</span><i>蜀ICP备17010220</i></div>
<script src="{{ asset('/new/home/pay/shoppingcart.js') }}"></script>

</body>
</html>