<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="{{ asset('home/images/images/common.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('home/images/images/heads.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('home/lunpo/index/main.css') }}" rel="stylesheet" type="text/css" />
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="keywords"content="@if(empty($keyworlds))建商网@else{{ $keyworlds }}@endif"> 
<meta name="description"content="@if(empty($description))建商网@else{{ $description }}@endif"> 
<script src="{{ asset('/js/jquery-1.8.3.min.js') }}"></script>
<title>{{ config('app.name') }}@if(!empty($title))  - {{$title}}@endif</title>
@yield('css')
</head>


<body>
	<!-- <div id="hade-a"> 
		<div id="hade-b">
			<div id="login">
				<ul>
					<li id="loginli1"><a href="{{ asset('/home/login') }}">登入</a></li>
					<li id="loginli2"></li>
					<li id="loginli1"><a href="{{ asset('/home/register') }}">注册</a></li>
					<li id="loginli2"></li>
					<li id="loginli1">热线电话：400-188-6585</li>
				</ul>
			</div>
		</div>
	</div> -->
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
					    <img  src="{{ asset('/home/images/hade_1.png') }}" alt="">
						<span>装修公司实力认证</span>	
					</div>

					<div id="hade_1_2_3">
						<form action="{{ url('home/sou') }}" method="GET">
							<input type="text" name="con" value="@if( isset($request['con'])  ){{ trim($request['con'])}}@endif" />
							<button>搜索</button>
						</form>
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
		<li><a href="{{ url('/jsgw/contact') }}">联系我们</a></li>
	</ul>
	<!--隐藏盒子-->
	<div id="box-1" class="hidden-box hidden-loc-index">
		<div id="div1">
			<span>关于建商 ></span>
			<ul id="solid">
				<li><a href="{{ url('/jsgw/aboutus') }}">关于建商</a></li>
				<li><a href="{{ url('/jsgw/tuandui') }}">运营团队</a></li>
				<li><a href="{{ url('/jsgw/zhanlui') }}">发展战略</a></li>
				<li><a href="{{ url('/jsgw/goujia') }}">组织构架</a></li>
				<li><a href="{{ url('/jsgw/contact') }}">联系方式</a></li>
				
			</ul>
		</div>
		<div id="div2">
			<span>建商产业 ></span>
			<ul id="solid">
				<li><a href="{{ url('/jsgw/ls') }}">新零售平台</a></li>
				<li><a href="{{ url('/jsgw/jzf') }}">精装房项目</a></li>
				<li><a href="{{ url('/jsgw/tyg') }}">线下体验馆</a></li>
			</ul>
		</div>
		<div id="div3">
			<span>建商招聘 ></span>
			<ul>
				<li><a href="{{ url('/jsgw/job1') }}">用人理念</a></li>
				<li><a href="{{ url('/jsgw/job5') }}">建设招聘</a></li>
			</ul>
		</div>
	
	</div>
	<div id="box-2" class="hidden-box hidden-loc-us">
		<div id="div2">
			<span>新闻动态 ></span>
			<ul>
				<li><a href="{{ url('/news/1') }}">公司公告</a></li>
				<li><a href="{{ url('/news/2') }}">公司新闻</a></li>
				<li><a href="{{ url('/news/6') }}">行业动态</a></li>
			</ul>
		</div>
	</div>
	<div id="box-3" class="hidden-box hidden-loc-info">
		<!-- <div id="div1">
			<span>全包套餐 ></span>
			<ul>
				<li><a href="{{ url('/jsgw/aboutus') }}">套餐一</a></li>
				<li><a href="{{ url('/jsgw/tuandui') }}">套餐二</a></li>
				<li><a href="{{ url('/jsgw/zhanlui') }}">套餐三</a></li>
				
			</ul>
		</div> -->
		<div id="div2">
			<span>软包套餐 ></span>
			<ul id="solid">
				<li><a href="{{ url('/package/houseroom') }}">装修报价</a></li>
				<li><a href="{{ url('/package/softroll') }}">软包套餐</a></li>
			</ul>
		</div>
		<div id="div3">
			<span>楼盘推荐 ></span>
			<ul>
				<li style="width:90px"><a  href="{{ url('/propertieszshx') }}">浙商新天地</a></li>
				<li style="width:70px"><a  href="{{ url('/propertiesdfhx') }}">德福公元</a></li>
				<li style="width:800px"><a href="{{ url('/propertieshfhx') }}">织金东方巴黎</a></li>
			</ul>
		</div>
	</div>
    <div id="box-4" class="hidden-box  box04">
		<div id="div3">
			<span>建商案例 ></span>
			<ul>
				<li><a href="{{ url('/home/case/index') }}">完整案例</a></li>
				<li><a href="{{ url('/home/case/zaiindex') }}">在建案例</a></li>
			</ul>
		</div>
	</div>
    <div id="box-5" class="hidden-box  box05">
		<div id="div3">
			<span>设计风格 ></span>
			<ul>
				<li><a href="{{ url('/amount') }}">设计量房</a></li>
				<li><a href="{{ url('/design') }}">设计风格</a></li>
			</ul>
		</div>
	</div>
    <div id="box-6" class="hidden-box box06">
		<div id="div3">
			<span>招商采购 ></span>
			<ul id="solid">
				<li><a href="{{ url('/jsgw/supply') }}">产品供应</a></li>
				<li><a href="{{ url('/jsgw/cgs') }}">采购商入驻</a></li>
				
			</ul>
		</div>
		<div id="div2">
			<span>&nbsp;</span>
			<ul>
				<li style="width:100px"><a href="{{ url('jsgw/franchise') }}">合作伙伴招募</a></li>
				<li><a href="{{ url('jsgw/honest') }}">廉洁规章</a></li>
			</ul>
		</div>
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
			<li><a href="{{ url('/jsgw/aboutus') }}">建商介绍</a></li>
			<li><a href="{{ url('/jsgw/tuandui') }}">建商团队</a></li>
			<li><a href="{{ url('/jsgw/zhanlui') }}">发展战略</a></li>
			<!-- <li><a href="">联系方式</a></li> -->
		</ul>
		<ul>
		   <li class="z-li2">建商服务</li>
		   <li><a href="{{ url('/jsgw/contact') }}">联系方式</a></li>
		<!--    <li><a href="">联系方式</a></li>
		   <li><a href="">联系方式</a></li>
		   <li><a href="">联系方式</a></li>
		   <li><a href="">联系方式</a></li> -->
		</ul>
		<ul>
		   <li class="z-li2">建商标准</li>
		 <!--   <li><a href="">客厅验收标准</a></li>
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
<script src="{{ asset('home/lazyload/jquery.lazyload.js?v=1.9.1') }}"></script>
<script src="{{ asset('home/lunpo/index/main.js') }}"></script>
</body>
@yield('js')


</html>
	
