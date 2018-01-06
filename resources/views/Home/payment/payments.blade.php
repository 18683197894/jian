<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
<meta name="csrf-token" content="{{ csrf_token() }}">
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
				<li id="con1li6">支付订单</li>
			</ul>
		</div>
		
	</div>
	<div class="payments">
		<div class="payments_1">
			<img src="{{ asset('/home/images/payment/payments/1.png') }}" alt="">
			<div>
				<ul>
					<li class="payments_1_ul1_1">订单提交成功</li>
					<li class="payments_1_ul1_2">请于 <em style="color:#E63336">{{round( ( 1800 - (time() - $res->addtime ) ) / 60 ) }}分</em> 钟内完成支付 超时将取消订单</li>
				</ul>
				<span>应付金额：<em>{{ $res->total}} 元</em></span>
			</div>
			<ul class="payments_1ul2" index="{{ $res->id }}">
				<li>订单号：&nbsp;&nbsp;<span style="color:#E63336">{{ $res->_token }}</span></li>
				<li>收货信息：&nbsp;&nbsp;{{ $res->address }}</li>
				<li>商品名称：&nbsp;&nbsp;</li>
				<li>配送时间：&nbsp;&nbsp;不限收货时间</li>
				<li>发票信息：&nbsp;&nbsp;@if( $res->invoice == 1 )纸质发票 个人 @else 无发票 @endif</li>
			</ul>
		</div>
		<div class="payments_2">
			<title>选择一下支付方式付款</title>
			<span class="payments_2_span">支付平台</span>
			
			<ul>
				<li><img class="payments_2_img1"  src="{{ asset('/home/images/payment/payments/2.png') }}" alt=""><img src="{{ $wechat_url['code_img_url'] }}" class="payments_2_img2_1" alt=""></li>
				<li><img class="payments_2_img1"  src="{{ asset('/home/images/payment/payments/3.png') }}" alt=""><img src="{{ $alipay_url['code_img_url'] }}" class="payments_2_img2_2" alt=""></li>
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
<script src="{{ asset('/home/images/payment/payments/common.js') }}"></script>
</html>

