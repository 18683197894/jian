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
    <!--banner图样式-->
    <!--头部样式-->
    <link rel="stylesheet" href="{{ asset('/new/home/public/header.css') }}"/>
    <script src="{{ asset('/js/jquery-1.8.3.min.js') }}"></script>
    <!--首页样式-->
@yield('css')
    <!--尾部样式-->
    <link rel="stylesheet" href="{{ asset('/new/home/public/footer.css') }}"/>
    <title>{{ $title['title'] or '建商联盟' }}</title>
</head>
<body>
<!--头部-->
<div class="header">
    <div class="Log_on">
        <div class="auto">
            <a href="javascript:;">热线电话：0831-8888598</a>
            @if(!session('Home'))
            <a href="{{ url('/newpro/register') }}">注册</a>
            <a href="{{ url('/newpro/login') }}">登录</a>
            @else 
            <a href="{{ url('/newpro/center/my_orders') }}">个人中心</a>
            <a href="javascript:;">{{ session('Home')->name }}</a>
            @endif
        </div>
    </div>
    <div class="header_atou">
        <div class=header_top>
        <a href="{{ url('/') }}" class="Logo_a"><img src="{{ asset('/new/home/publicused/img/logo.png') }}" alt="" class="Logo"/></a>
            <div class="search">
                <a href="javascript:;" class="link">
                    <img src="{{ asset('/new/home/publicused/img/header_gg.png') }}" alt=""/>
                    免费量房与报价
                </a>
                <a href="javascript:;" class="link">
                    <img src="{{ asset('/new/home/login/img/hade_1.png') }}" alt=""/>
                    装修公司实力认证
                </a>
                <div class="search_i">
                    <form action="{{ asset('/newpro/home/sou') }}" method="get" name="sou">
                    <input type="text" name="sou" value="@if(isset($request['sou'])){{$request['sou']}}@endif" placeholder="搜索新闻动态"/>
                    <div class="click">
                        <a href="javascript:;"><img src="{{ asset('/new/home/publicused/img/search_i.png') }}" alt=""/></a>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <?php 

            $navs = \DB::table('nav')
            ->select('nav.id','nav.title','nav.pid','webpage.url','webpage.titles')
            ->join('webpage','nav.pid','=','webpage.id')
            ->orderBy('status')
            ->get();
            
       ?>
        <div class="nav">
            @foreach($navs as $k => $v)
            <a href="{{ $v->url }}" @if(isset($title) && $title['title'] == $v->titles ) class="avtive" @endif>{{ $v->title }}</a>
            @endforeach
            
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

@yield('js')
<script src="{{ asset('/new/home/public/header.js') }}"></script>
</body>
</html>