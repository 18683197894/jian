<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>{{ config('app.name') }}</title>
	<style>
	*{
		margin:0px;
		padding:0px;
	}
	#hade{
		width:1600px;
		height:102px;
		border-bottom:2px solid #000;
		/*border:1px solid red;*/
	}
	#hade_1{
		height:68px;
		/*border:1px solid red;*/
	}
	#hade_2{
		height:32px;
		margin:0px auto;
		
	}
	#hade_2_1{
		width:880px;
		margin:0px auto;
	}
	#hade_1_1{
		float:left;
		width:450px;
		/*border:1px solid red;*/
	}
	#hade_img_1{
		margin-top:7px;
		float:right;
		width:155px;
		height:50px;
	}
	#hade_1_2{
		float:right;
		height:67px;
		width:1000px;
		/*border:1px solid red;*/
		
		font-weight:550;
		font-size:14px;
	}
	#menu { 
	font:12px verdana, arial, sans-serif; /* 设置文字大小和字体样式 */
	}
	#menu, #menu li {
	list-style:none; 
	padding:0; 
	margin:0; 
	}
	#menu li { 
    float:left; 
    }	
	#menu li a {
	display:block; 
	padding:4px 12px; /* 设置内边距 */
	background:#3A4953; /* 设置背景色 */
	color:#fff; /* 设置文字颜色 */
	text-decoration:none; 

	}

	#menu li a {
	display:block; 
	width:60px; /* 设置宽度 */
	height:25px; /* 设置高度 */
	line-height:25px; /* 设置行高 */
	text-align:center; /* 居中对齐文字 */
	background:#fff; /* 设置背景色 */
	color:#000; /* 设置文字颜色 */
	text-decoration:none; /* 去掉下划线 */
	
	}

	#menu li a:hover {
	/*background:#146C9C; /* 变换背景色 */
	color:red; /* 变换文字颜色 */
	border-bottom:2px solid red;
	}

	#menu li a.last {
	border-right:0; /* 去掉左侧边框 */
	}
	#menu li a.more {
	color:red; /* 去掉左侧边框 */
	border-bottom:2px solid red;
	}

	</style>
</head>
<body>

		<div id="hade">
			<div id="hade_1">
				<div id="hade_1_1">
					<img id="hade_img_1" src="{{ asset('/home/images/logo.png') }}" alt="">
				</div>
				<div id="hade_1_2">
					
					<div style="float:left;color:red;line-height:67px;">
						<img src="{{ asset('/home/images/hade_2.png') }}" alt="">
						<span>免费量房与报价</span>
					</div>
					
					<div style="float:left;color:red;padding-left:15px;line-height: 67px;">
						<img src="{{ asset('/home/images/hade_1.png') }}" alt="">
						<span>装修公司实力认证</span>
					</div>
					
					<div style="float:left;padding-left:30px;line-height:67px;">
						<form action="">
							<input  style="width:150px;height:20px;border:1.5px solid #ccc"  placeholder="海量效果任你选
							" type="text" anme="name">
							<input type="submit" value="提交">
						</form>
						
					</div>
				</div>
			</div>
			<div id="hade_2">
				<div id="hade_2_1">
				<ul id="menu">
				 <li><a href="#" class="more">首页</a></li>
				 <li><a href="#">建筑风格</a></li>
				 <li><a href="#">建筑工程</a></li>
				 <li><a href="#">精装房</a></li>
				 <li><a href="#">建商家装</a></li>
				 <li><a href="#">建商网</a></li>
				 <li><a href="#" class="last">联系我们</a></li>
				</ul>
				</div>
			</div>
		</div>
    </div>
</body>
</html>