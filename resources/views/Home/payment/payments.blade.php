<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>{{ config('app.name') }}@if(!empty($title))  - {{$title}}@endif</title>
<link href="{{ asset('home/images/images/common.css') }}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="{{ asset('/home/images/payment/shoppingcart/common.css') }}">
<script src="{{ asset('/js/jquery-1.8.3.min.js') }}"></script>
</head>
<body>
	<div id="hade-a"> 
		<div id="hade-b">
			<div id="login">
				<ul>
					<li id="loginli1">热线电话：400-188-6585</li>
					<li id="loginli2"></li>
					<li id="loginli1"><a href="{{ asset('/home/shoppingcart') }}">购物车</a></li>
					<li id="loginli2"></li>
					<li id="loginli1"><a href="{{ asset('/home/login') }}">{{ \session('Home')->name }}</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div id="hade-con">
		<div id="con1">
			<a href="{{ asset('/') }}"><img id="con1img1" src="{{ asset('/home/images/logo.png') }}" alt=""></a>
			<ul>
				<li id="con1li1"><img src="{{ asset('/home/images/hade_2.png') }}" alt=""></li>
				<li id="con1li2">免费量房与报价</li>
				<li id="con1li3"><img src="{{ asset('/home/images/hade_1.png') }}" alt=""></li>
				<li id="con1li4">装修公司实力认证</li>
				<li id="con1li5"> </li>
				<li id="con1li6">确认订单</li>
			</ul>
		</div>
		
	</div>
	
<div class="z-bot">
    <div class="z-bot1">
	    <ul>
		    <li class="z-li2">关于建商</li>
			<li><a href="{{ url('/jsgw/aboutus') }}">建商介绍</a></li>
			<li><a href="{{ url('/jsgw/tuandui') }}">建商团队</a></li>
			<li><a href="{{ url('/jsgw/zhanlui') }}">发展战略</a></li>
		</ul>
		<ul>
		   <li class="z-li2">建商服务</li>
		  <li><a href="{{ url('/jsgw/contact') }}">联系方式</a></li>
		</ul>
		<ul>
		   <li class="z-li2">建商标准</li>
		  <!--  <li><a href="">客厅验收标准</a></li>
		   <li><a href="">客厅验收标准</a></li>
		   <li><a href="">客厅验收标准</a></li>
		   <li><a href="">客厅验收标准</a></li> -->
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
<script src="{{ asset('/home/images/payment/shoppingcart/common.js') }}"></script>
</html>

