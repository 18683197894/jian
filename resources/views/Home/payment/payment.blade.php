<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>{{ config('app.name') }}@if(!empty($title))  - {{$title}}@endif</title>
<link href="{{ asset('home/images/images/common.css') }}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="{{ asset('/home/images/payment/shoppingcart/common.css') }}">
<meta name="csrf-token" content="{{ csrf_token() }}">
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
				<li id="con1li6">提交订单</li>
			</ul>
		</div>
		<div class="payment_hader">
			<title>选择收货地址</title>
			<ul class="dizhiul">
				<li class="dizhili" style="display:none">
				<div>

					<title></title>
					<span></span>
					<div>
					<button name="edit" style="margin-left:21px;" class="payment_hader_butl">编辑</button>
					<button name="del"  class="payment_hader_butd"  style='display:block'>删除</button>
					</div>

				</div>
				</li>
				@if(count($address) > 0)
				@foreach($address as $z => $j)
				<li index="{{ $j->id }}">
				<div @if($j->status == 1) class="payment_hader_defult" @endif>

					<title name="">{{ $j->shen.$j->shi }} （{{$j->name}}）</title>
					<span>{{ $j->tails }}</span>
					<div>
					<button name="edit" style="margin-left:21px;" class="payment_hader_butl">编辑</button>
					<button name="del"  class="payment_hader_butd" @if($j->status == 1) style='display:none' @endif >删除</button>
					</div>

				</div>
				</li>
				@endforeach
				@endif
				
			</ul>
			<button class="btn1">使用新地址</button>
		</div>
		
		<div class="m-modal">
			<div class="m-modal-dialog">
				<div class="m-top">
					<h3 class="m-modal-title">
						添加收货地址
					</h3>
					<span class="m-modal-close">&times;</span>
				</div>
				<div class="m-middle">
					<!--content-->
					<label class="paymentfrom1_1" for="" style="padding-top:7px;">
						<input type="text" class="payment_input_name" name="name"  placeholder="姓名">
						<input type="text" class="payment_input_phone" name="phone"  placeholder="手机号">
					</label>

					<label class="paymentfrom1_1 paymentselect" for="" style="height:55px;margin-top:15px;" >
<div class="demo">
	<dl class="select">
		<dt class="dt1" index="">选择省</dt>
		<dd>
			<ul class="paymentshens">
				<li class="paymentshen"><a href="#" index="00" title="选择省">选择省</a></li>
				@foreach( $shen as $k => $v )
				<li class="paymentshen"><a href="#" index="{{ $v->id }}" title="{{ $v->name }}">{{ $v->name }}</a></li>
				@endforeach
			</ul>
		</dd>
	</dl>	
</div>

<div class="demo">
	<dl class="select" style="margin-left:12px">
		<dt class="dt2" index="">选择市</dt>
		<dd>
			<ul class="paymentshis">
				<li class="paymentshi"><a href="#" index="">选择市</a></li>
			</ul>
		</dd>
	</dl>	
</div>
<div class="demo">
	<dl class="select" style="margin-left:12px">
		<dt class="dt3" index="">选择区</dt>
		<dd>
			<ul class="paymentqus">
				<li class="paymentqu"><a href="#" index="00">选择区</a></li>
			</ul>
		</dd>
	</dl>	
</div>
					</label>
					<label class="paymentfrom1_1" for="" style="height:47px;">
						<div class="paymentdetailsdiv">
						<textarea name="paymentdetails" id="" class="paymentdetails" placeholder="详细地址"></textarea>
						</div>
					</label>
					<label class="paymentfrom1_1" for="">
						<input type="text" class="payment_input_zipcode" name="zipcode"  placeholder="邮编">
						<input type="text" class="payment_input_lebel" name="lebel"  placeholder="地址标签">
					</label>

					
				</div>
				<div class="m-bottom">
					<button class="m-btn-sure">确定</button>
					<button class="m-btn-edit" style="display:none">更新</button>
					<button class="m-btn-cancel">取消</button>
				</div>
			</div>
		</div>

		<div class="payment_con" >
			
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
<script src="{{ asset('/home/images/payment/payment/common.js') }}"></script>
</html>

