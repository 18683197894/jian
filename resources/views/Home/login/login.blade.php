<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>{{ config('app.name') }}@if(!empty($title))  - {{$title}}@endif</title>
<link href="{{ asset('home/images/images/common.css') }}" rel="stylesheet" type="text/css" />

</head>
	<style>
	#hade-a{
			width:100%;
			height:36px;
			background-color: #f5f5f5;
		}
		#hade-b{
			width:1200px;
			height:36px;
			margin:0 auto;
		}
		#login{
			width:294px;
			height:36px;
			float:right;

		}
		#login ul{
			width:294px;
			height:36px;
			overflow: hidden;
		}
		#login ul li a{
			color:#a6a6a6;

		}
		#loginli1{
			font-size: 16px;
			float:left;
			line-height: 36px;
			font-weight: normal;
			color:#a6a6a6;
			font-family: 'Hiragino Sans GB', 'Microsoft Yahei', '微软雅黑', Arial, sans-serif;
			/*cursor:pointer;*/
		}
		#loginli2{
			width:10px;
			height:17px;
			float:left;
			margin-right: 10px;
			margin-top: 10px;
			border-right:1px solid #ccc;
		}
		#hade-con{
			width:100%;
		}
		#con1{
			width:1200px;
			height:100px;
			margin:10px auto;
		}
		#con1img1{
			width:170px;
			height:57px;
			float:left;
			margin-top: 20px;
		}
		#con1 ul{
			float:left;
			width:500px;
			height:40px;
			margin-top:30px;
		}
		#con1 ul li {
			float:left;
		}
		#con1li1,#con1li3{
			width:17px;
			height:17px;
			float:left;
			margin-top:16px;
			margin-left:20px;
		}
		#con1li2,#con1li4{
			font-weight: normal;
			font-size: 16px;
			color:#E12E32;
			margin-top: 13px;
			margin-left: 10px;
		}
		#con1li5{
			width:20px;
			height:30px;
			margin-right: 10px;
			float:left;
			margin-top: 10px;
			border-right:1px solid #ccc;
		}
		#con1li6{
			font-weight: normal;
			font-size: 16px;
			color:#666;
			    font-family:"微软雅黑","黑体","宋体";
			margin-top: 13px;
			margin-left: 10px;
		}
		#con2{
			width:1200px;
			height:500px;
			margin:20px auto;

		}
		#con2-a{
			width:623px;
			height:415px;
			float:left;
			margin-left:50px; 
		}
		#con2-b{
			width:340px;
			height:340px;
			float:left;
			margin-top: 40px;
			margin-left: 100px;
			border:1px solid #ccc;
		}
		#con2-b-1{
			width:260px;
			height:340px;
			margin:0 auto;
		}
		#con2-b-1 label {
			width:260px;
			height:50px;
			display: block;
			margin:0 auto;

		}
		#label_1{
			padding-top: 20px;
			text-align: center;
			margin-bottom: 10px;
		}
		#label_1 span{
			line-height: 50px;
			font-weight: 600;
			font-size: 20px;
			color:#E12E32;
		}
		#label_3{
			padding-top:4px;
		}
		#label_2 input,#label_3 input{
			width:260px;
			height:35px;
			border:1px solid #ccc;
			margin-top: 10px;
			color:#333;
			font-size: 16px;
			text-indent: 10px;
			border-radius: 3px 3px 3px 3px;
		}
		#label_4{
			padding-top: 20px;
		}
		#label_4 button{
			width:260px;
			height:37px;
			text-align:center;
			background-color:#E12E32;
			color:#fff;
			border-radius: 3px 3px 3px 3px;
			cursor:pointer;
			font-weight: normal;
			font-size: 17px;
			border:none;
		}
		#label_4 button:active{
			background-color:#B71212;
		}
		#label_5{
			padding-top: 5px;
		}
		#label_5 #label_5_a1{
			font-weight: normal;
			font-size:14px;
			color:red;
			float:left;
		}
		#label_5 #label_5_a2{
			font-weight: normal;
			font-size:14px;
			color:#333;
			float:right;
		}
	</style>
<body>
	<div id="hade-a"> 
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
				<li id="con1li6">欢迎登入</li>
			</ul>
		</div>
		<div id="con2">
			<div id="con2-a">
				<img src="{{ asset('home/images/logo/1.png') }}" alt="">
			</div>
			<div id="con2-b">
				<div id="con2-b-1">
				<label id="label_1" for="">
					<span>账号登入</span>
				</label>
				<label id="label_2">
					<input type="text" placeholder="用户名">
				</label>
				<label id="label_3">
					<input type="password" placeholder="密码">
					
				</label>
				<label id="label_4">
					<button>立即登入</button>
				</label>
				<label id="label_5">
					<a id="label_5_a1" href="{{ url('home/register') }}">还没有账号？ 注册</a>
					<a id="label_5_a2" href="">忘记密码？</a>
				</label>
				</div>
			</div>
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
</html>