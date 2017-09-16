<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="{{ asset('home/images/images/common.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('home/images/images/heads.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('home/lunpo/index/main.css') }}" rel="stylesheet" type="text/css" />
<meta name="csrf-token" content="{{ csrf_token() }}">
	<script src="{{ asset('/js/jquery-1.8.3.min.js') }}"></script>

	<title>{{ config('app.name') }}  
@if(!empty($title))
	- {{$title}}
@endif</title>
</head>


@yield('css')


<body>
	<div id="hades">
		<div id="hade_content">
			
			<div id="hade_1">
				<div id="hade_1_1">
					<img id="hade_img_1" src="{{ asset('/home/images/logo.png') }}" alt="">
				</div>
				<div id="hade_1_2">
					<div id="hade_1_2_1">
						<img  src="{{ asset('/home/images/hade_2.png') }}" alt="">
						<span>免费量房与报价</span>
					</div>

					<div id="hade_1_2_2">
					    <img  src="{{ asset('/home/images/hade_2.png') }}" alt="">
						<span>免费量房与报价</span>	
					</div>

					<div id="hade_1_2_3">
						
					</div>
		
										
				</div>
			</div>
			
<div id="hade_2">
<!--nav-->
<div class="nav">
	<!--导航条-->
	<ul class="nav-main">
        <li> <a href="{{ url('/') }}">建商首页</a></li>
		<li id="li-1">关于建商</li>
		<li id="li-2">新闻动态</li>
		<li id="li-3">产品服务</li>
		<li id="li-4">建商案例</li>
		<li id="li-5">设计风格</li>
		<li id="li-6">招商采购</li>
		<li><a href="http://www.jianshanglianmeng.com">建商商城</a></li>
		<li id="li-7">联系我们</li>
	</ul>
	<!--隐藏盒子-->
	<div id="box-1" class="hidden-box hidden-loc-index">
		<ul>
			<li id="box1_li1"><span>关于建商</span></li>
			<li id="box1_li2"> <a href="{{ url('/jsgw/aboutus') }}"><img src="{{ asset('home/images/haed/bs1.jpg') }}" alt="" /></a> </li>
			<li id="box1_li3">
				<span id="box1_span1"><img style="width:10px;height:10px" src="{{ asset('home/images/haed/sanjiao.jpg') }}" alt="" /><a href="{{ url('/jsgw/aboutus') }}">关于建商</a></span>
				<span id="box1_span1"><img style="width:10px;height:10px" src="{{ asset('home/images/haed/sanjiao.jpg') }}" alt="" /><a href="{{ url('/jsgw/tuandui') }}">运营团队</a></span>
				<span id="box1_span1"><img style="width:10px;height:10px" src="{{ asset('home/images/haed/sanjiao.jpg') }}" alt="" /><a href="{{ url('jsgw/zhanlui') }}">发展战略</a></span>
				<span id="box1_span1"><img style="width:10px;height:10px" src="{{ asset('home/images/haed/sanjiao.jpg') }}" alt="" /><a href="">组织构架</a></span>
				<span id="box1_span1"><img style="width:10px;height:10px" src="{{ asset('home/images/haed/sanjiao.jpg') }}" alt="" /><a href="">建商文化</a></span>
				<span id="box1_span1"><img style="width:10px;height:10px" src="{{ asset('home/images/haed/sanjiao.jpg') }}" alt="" /><a href="{{ url('jsgw/contact') }}">联系方式</a></span>
			</li>
		</ul>
		<ul id="box1_ul2">
            <li id="box1_li1"><span>建商产业</span></li>
			<li id="box1_li2"><a href="{{ url('jsgw/ls') }}"><img src="{{ asset('home/images/haed/bs2.jpg') }}" alt="" /></a></li>
			<li id="box1_li3">
				<span id="box1_span1"><img style="width:10px;height:10px" src="{{ asset('home/images/haed/sanjiao.jpg') }}" alt="" /><a href="{{ url('jsgw/ls') }}">新零售平台</a></span>
				<span id="box1_span1"><img style="width:10px;height:10px" src="{{ asset('home/images/haed/sanjiao.jpg') }}" alt="" /><a href="{{ url('jsgw/jzf') }}">精装房</a></span>
				<span id="box1_span1"><img style="width:10px;height:10px" src="{{ asset('home/images/haed/sanjiao.jpg') }}" alt="" /><a href="{{ url('jsgw/tyg') }}">线下体验馆</a></span>
			</li>
		</ul>
		<ul id="box1_ul3">
            <li id="box1_li1"><span>建商招聘</span></li>
			<li id="box1_li2"><a href="{{ url('jsgw/job1') }}"><img src="{{ asset('home/images/haed/bs3.jpg') }}" alt="" /></a> </li>
			<li id="box1_li3">
				<span id="box1_span1"><img  src="{{ asset('home/images/haed/sanjiao.jpg') }}" alt="" /><a href="{{ url('jsgw/job1') }}">用人理念</a></span>
				<span id="box1_span1"><img  src="{{ asset('home/images/haed/sanjiao.jpg') }}" alt="" /><a href="{{ url('jsgw/job5') }}">招聘职位</a></span>
			</li>
		</ul>

	</div>
	<div id="box-2" class="hidden-box hidden-loc-us">
		<ul id="box2_ul">
            <li id="box1_li1"><span>新闻动态</span></li>
			<li id="box1_li2"><img src="{{ asset('home/images/haed/bs3.jpg') }}" alt="" /></li>
			<li id="box1_li3">
				<span id="box1_span1"><img  src="{{ asset('home/images/haed/sanjiao.jpg') }}" alt="" /><a href="">公司公告</a></span>
				<span id="box1_span1"><img  src="{{ asset('home/images/haed/sanjiao.jpg') }}" alt="" /><a href="">公司动态</a></span>
				<span id="box1_span1"><img  src="{{ asset('home/images/haed/sanjiao.jpg') }}" alt="" /><a href="">行业动态</a></span>
			</li>
		</ul>
	</div>
	<div id="box-3" class="hidden-box hidden-loc-info">
		<ul>
			<li id="box3_li1">套餐推荐</li>
			<li id="box3_li2"><img src="{{ asset('home/images/haed/bs3.jpg') }}" alt="" /></li>
			<li id="box3_li3">
				<span ><img  src="{{ asset('home/images/haed/sanjiao.jpg') }}" alt="" /><a href="">套餐一</a></span>
				<span ><img  src="{{ asset('home/images/haed/sanjiao.jpg') }}" alt="" /><a href="">套餐二</a></span>
				<span ><img  src="{{ asset('home/images/haed/sanjiao.jpg') }}" alt="" /><a href="">套餐三</a></span>
				<span ><img  src="{{ asset('home/images/haed/sanjiao.jpg') }}" alt="" /><a href="">套餐四</a></span>
				<span ><img  src="{{ asset('home/images/haed/sanjiao.jpg') }}" alt="" /><a href="">套餐五</a></span>
			</li>
		</ul>	
		<ul>
			<li id="box3_li1">商城大类</li>
			<li id="box3_li2"><img src="{{ asset('home/images/haed/bs3.jpg') }}" alt="" /></li>
			<li id="box3_li33">
				<span ><img  src="{{ asset('home/images/haed/sanjiao.jpg') }}" alt="" /><a href="">类一</a></span>
				<span ><img  src="{{ asset('home/images/haed/sanjiao.jpg') }}" alt="" /><a href="">类一</a></span>
				<span ><img  src="{{ asset('home/images/haed/sanjiao.jpg') }}" alt="" /><a href="">类一</a></span>
				<span ><img  src="{{ asset('home/images/haed/sanjiao.jpg') }}" alt="" /><a href="">类一</a></span>
				<span ><img  src="{{ asset('home/images/haed/sanjiao.jpg') }}" alt="" /><a href="">类一</a></span>
				<span ><img  src="{{ asset('home/images/haed/sanjiao.jpg') }}" alt="" /><a href="">类一</a></span>
				<span ><img  src="{{ asset('home/images/haed/sanjiao.jpg') }}" alt="" /><a href="">类一</a></span>
				<span ><img  src="{{ asset('home/images/haed/sanjiao.jpg') }}" alt="" /><a href="">类一</a></span>
				<span ><img  src="{{ asset('home/images/haed/sanjiao.jpg') }}" alt="" /><a href="">类一</a></span>
				<span ><img  src="{{ asset('home/images/haed/sanjiao.jpg') }}" alt="" /><a href="">类一</a></span>

		</ul>
		<ul>
			<li id="box3_li1">楼盘推荐</li>
			<li id="box3_li2"><img src="{{ asset('home/images/haed/bs3.jpg') }}" alt="" /></li>
			<li id="box3_li3">
				<span ><img  src="{{ asset('home/images/haed/sanjiao.jpg') }}" alt="" /><a href="{{ url('propertieszshx') }}">浙商.临港新天地</a></span>
				<span ><img  src="{{ asset('home/images/haed/sanjiao.jpg') }}" alt="" /><a href="{{ url('propertiesdfhx') }}">德福公元</a></span>
				<span ><img  src="{{ asset('home/images/haed/sanjiao.jpg') }}" alt="" /><a href="{{ url('propertieshfhx') }}">华富.御景庄园</a></span>
			</li>
		</ul>
	</div>
    <div id="box-4" class="hidden-box  box04">
		<ul id="box2_ul">
            <li id="box1_li1"><span>建商案例</span></li>
			<li id="box1_li2"><img src="{{ asset('home/images/haed/bs3.jpg') }}" alt="" /></li>
			<li id="box1_li3">
				<span id="box1_span1"><img  src="{{ asset('home/images/haed/sanjiao.jpg') }}" alt="" /><a href="">工程案例</a></span>
				<span id="box1_span1"><img  src="{{ asset('home/images/haed/sanjiao.jpg') }}" alt="" /><a href="">精装案例</a></span>
				<span id="box1_span1"><img  src="{{ asset('home/images/haed/sanjiao.jpg') }}" alt="" /><a href="">精装房</a></span>
			</li>
		</ul>
	</div>
    <div id="box-5" class="hidden-box  box05">
		<ul id="box2_ul">
            <li id="box1_li1"><span>设计风格</span></li>
			<li id="box1_li2"><img src="{{ asset('home/images/haed/bs3.jpg') }}" alt="" /></li>
			<li id="box1_li3">
				<span id="box1_span1"><img  src="{{ asset('home/images/haed/sanjiao.jpg') }}" alt="" /><a href="">设计风格一</a></span>
				<span id="box1_span1"><img  src="{{ asset('home/images/haed/sanjiao.jpg') }}" alt="" /><a href="">设计风格二</a></span>
				<span id="box1_span1"><img  src="{{ asset('home/images/haed/sanjiao.jpg') }}" alt="" /><a href="">设计风格三</a></span>
				<span id="box1_span1"><img  src="{{ asset('home/images/haed/sanjiao.jpg') }}" alt="" /><a href="">设计风格四</a></span>
			</li>
		</ul>
	</div>
    <div id="box-6" class="hidden-box box06">
		<ul id="box2_ul">
            <li id="box1_li1"><span>招商采购</span></li>
			<li id="box1_li2"><img src="{{ asset('home/images/haed/bs3.jpg') }}" alt="" /></li>
			<li id="box1_li3">
				<span id="box1_span1"><img  src="{{ asset('home/images/haed/sanjiao.jpg') }}" alt="" /><a href="">设计风格一</a></span>
				<span id="box1_span1"><img  src="{{ asset('home/images/haed/sanjiao.jpg') }}" alt="" /><a href="">设计风格二</a></span>
				<span id="box1_span1"><img  src="{{ asset('home/images/haed/sanjiao.jpg') }}" alt="" /><a href="">设计风格三</a></span>
			</li>
		</ul>
	</div>
    <div id="box-7" class="hidden-box  box07">
	<!-- ********** -->
	</div>

</div>


			</div>
		</div>
	</div>
	<!-- 头 -->
@yield('content')
<!--页脚信息-->
<div style="clear:both;"></div>
<div class="z-bot">
    <div class="z-bot1">
	    <ul>
		    <li class="z-li2">关于建商</li>
			<li><a href="">建商介绍</a></li>
			<li><a href="">建商团队</a></li>
			<li><a href="">建商文化</a></li>
			<li><a href="">联系方式</a></li>
		</ul>
		<ul>
		   <li class="z-li2">建商服务</li>
		   <li><a href="">联系方式</a></li>
		   <li><a href="">联系方式</a></li>
		   <li><a href="">联系方式</a></li>
		   <li><a href="">联系方式</a></li>
		   <li><a href="">联系方式</a></li>
		</ul>
		<ul>
		   <li class="z-li2">建商标准</li>
		   <li><a href="">客厅验收标准</a></li>
		   <li><a href="">客厅验收标准</a></li>
		   <li><a href="">客厅验收标准</a></li>
		   <li><a href="">客厅验收标准</a></li>
		</ul>
		<div class="z-li3">
		   <b>联系我们</b>
		   <p class="z-p1 z-p0">服务热线：400-188-6585</p>
		   <p class="z-p1">邮箱：market@jianshanglianmeng.com</p>
		   <p class="z-p2">总部地址：</p><p class="z-p3">四川省宜宾市临港经济开发区西南互联网产业基地522</p>
		</div>
		<div class="z-li4"><b>关注我们</b></div>
	</div>
	<div class="z-bot2">
	    <div class="z-bot2-1">CopyRight 2017-2020建商联盟版权所有   ICP备案：蜀ICP备17010220号 </div>
	</div>
</div>
</body>
	<script src="{{ asset('home/lunpo/index/main.js') }}"></script>

</html>
	
