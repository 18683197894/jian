<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="{{ asset('home/images/images/common.css') }}" rel="stylesheet" type="text/css" />
<meta name="csrf-token" content="{{ csrf_token() }}">
	<script src="{{ asset('/js/jquery-1.8.3.min.js') }}"></script>

	<title>{{ config('app.name') }}  
@if(!empty($title))
	- {{$title}}
@endif</title>
@yield('css')
<link href="{{ asset('home/images/jsgw/common.css') }}" rel="stylesheet" type="text/css" />

</head>





<body>
<div id="heads">
	<div id="heads_con">
		<div id="heads_1">
			<img src="{{ asset('home/images/logo.png') }}" alt="" />
		</div>
		<ul>
			<a href="{{ asset('/') }}"><li >首页</li></a>
			<a href="{{ asset('/') }}"><li
			@if($title == '产品供应')
			style="color:#E12E32;border-bottom:3px solid #E12E32;"
			@endif
			>产品供应</li></a>
			<a href="{{ asset('/jsgw/cgs') }}"><li
			@if($es == 3)
			style="color:#E12E32;border-bottom:3px solid #E12E32;"
			@endif
			>采购商入驻</li></a>
			<a href="{{ asset('/jsgw/franchise') }}"><li
			@if($es == 1)
			style="color:#E12E32;border-bottom:3px solid #E12E32;"
			@endif
			>合作伙伴招募</li></a>
			<a href="{{ asset('/jsgw/honest') }}"><li
			@if($es == 2)
			style="color:#E12E32;border-bottom:3px solid #E12E32;"
			@endif
			>廉洁规章</li></a>
		</ul>
		<div id="heads_3">
			<a href="#"><img src="{{ asset('home/images/right.png') }}" alt="" /></a>
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
@yield('js')
</html>
	
