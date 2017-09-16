@extends('heads')
	<script src="{{ asset('/js/jquery-1.8.3.min.js') }}"></script>
	<link href="{{ asset('/home/lunpo/css/style.css') }}" rel="stylesheet" />
<script type="text/javascript" src="{{ asset('/home/lunpo/js/startMove.js') }}"></script>

@section('css')
<style>
		#content{
			width:100%;
			height:540px;
		}
		#content_img_1{
			width:100%;
			height:540px;
			/*border:1px solid red;*/
			background-image:url(./home/images/xuli.png);
			/*background-repeat:no-repeat;*/
			background-size: cover; 
			/*-moz-background-size: cover;*/
			padding-top:35px;
			/*position:absolute;*/
		}
		#content_1{
			width:1100px;
			height:500px;
			border-left:2px solid #516975;
			margin :0 auto;
			/*position:relative;*/
			box-shadow: -10px -3px 10px #516975;
		}
		#box{
		width:750px;
		height:500px;
		/*border:1px solid red;*/
		float:left;
		}
		
		#content_1_2{
		width:350px;
		height:500px;
		/*border:1px solid red;*/
		float:right;
		background:#fff;
		}
		#content_1_2_1{
			width:290px;
			height:150px;
			border-bottom:1.5px solid #e5e5e5;
			margin-left:18px;
		}
		#content_1_2_2{
			width:290px;
			height:200px;
			border-bottom:1.5px solid #e5e5e5;
			margin-left:18px;
		}
		#content_1_2_3{
			width:290px;
			height:70px;
			/*border:1px solid #e5e5e5;*/
			margin-left:18px;
		}
		#p1{
			font-size:20px;
			font-weight:600;
			margin-top:18px; 
			color:#4b4b4b;
		}
		#p2{
			color:#c6c6c6;
			margin-top:5px;
			font-size: 15px;
		}
		#nve{
			width:200px;
			height: 25px;
			/*border:1px solid red;   */
			margin-top:8px;
		}
		#nve_1{
			width:40px;
			color:#B3AF99;
			font-size: 12px;
			background-color: #fff098;
			float:left;
		
		}
		#nve_2{
			width:50px;
			color:#B3AF99;
			font-size: 12px;
			background-color: #fff098;
			float:left;
			margin-left:10px;
		}
		#nve_3{
			width:40px;
			color:#B3AF99;
			font-size: 12px;
			background-color: #fff098;
			margin-left:10px;
			float:left;
		}

.pin.icon{color:#000;position:absolute;margin-left:2px;margin-top:2px;width:12px;height:12px;border:solid 1px currentColor;border-radius:7px 7px 7px 0;-webkit-transform:rotate(-45deg);transform:rotate(-45deg);}
.pin.icon:before{content:'';position:absolute;left:3px;top:3px;width:4px;height:4px;border:solid 1px currentColor;border-radius:3px;}
		#dian1{
			width:40px;
			height:40px;
			/*border:1px solid red;*/
			float:left;
			margin-top:13px;

		}
		#dian2{
			width:250px;
			height:40px;
			float:left;
			margin-top:13px;
			/*border:1px solid red;*/
			line-height: 40px;
		}
		#content_2{
			width:100%;
			/*height:400px;*/
			/*border:1px solid red;*/
			/*position:absolute;*/

		}
		#content_2_1{
			width:1200px;
			/*height:410px;*/
			/*border:1px solid red;*/
			margin:0 auto;
			background-color:#f5f5f5;
			margin-top:35px;
			/*position:relative*/

		}
		#content_2_2{
			width:1200px;
			height:590px;
			/*border:1px solid red;*/
			margin:0 auto;
			background-color:#f5f5f5;
			margin-top:25px;
            /*position: absolute;*/
			
		}
		#xuan{
			width:1200px;
			height:610px;
			/*border:1px solid red;*/
			margin:0 auto;
			/*background-color:#f5f5f5;*/
			/*margin-top:20px;*/
            /*position: absolute;*/
            padding-bottom: 20px;
			
		}
		#content_2_1_1{
			width:1200px;
			height:70px;
			/*border:1px solid red;*/
		}
		#content_2_1_1_1{
			width:1200px;
			height:35px;
			border-bottom:3px solid #dadada;
		}
		#content_2_1_1_1_1{
			width:87px;
			height:35px;
			margin-left:20px;
			border-bottom:3px solid #000;
			float:left;
		}
		#content_2_1_1_1_2{
			width:160px;
			height:35px;
			/*margin-left:16px;*/
			border-bottom:3px solid red;
			float:left;
		}

		#content_2_1_2{
			width:1200px;
			height:340px;
			/*border:1px solid red;*/
		}
		#content_2_1_2_1{
			width:292px;
			height:340px;
			/*border: 1px solid red;*/
			float:left;
			/*margin-right: 1px;*/
			/*cursor:pointer ;*/
		
		}
		#content_2_1_2_2{
			width:292px;
			height:340px;
			/*border: 1px solid red;*/
			float:left;
			margin-left:10px;
			/*cursor:pointer ;*/

		}
		#content_2_1_2_3{
			width:292px;
			height:340px;
			/*border: 1px solid red;*/
			float:left;
			margin-left:10px;
			/*cursor:pointer ;*/

			
		}
		#content_2_1_2_4{
			width:293px;
			height:360px;
			/*border: 1px solid red;*/
			float:left;
			margin-left:10px;
			/*cursor:pointer ;*/

			
		}
		#tu_1{
			width:294px;
			height:230px;
			/*border:1px solid red;*/
			cursor:pointer ;

		}
		#tu_2{
			width:294px;
			height:30px;
			background-color:#adadab;
			text-align: center;
			line-height: 30px;
			/*margin:0 auto;*/
			cursor:pointer ;

		}
		#tu_2_1{
			width:294px;
			height:30px;
			background-color:#adadab;	
			text-align: center;
			line-height: 30px;
		}
		#tu_3{
			width:294px;
			height:30px;
			margin-top: 4px;
			/*border:1px solid red;*/
		}
		#tu_3_1{
			width:80px;
			height:30px;
			/*border:1px solid red;*/
			float:left;
			line-height: 30px;
		}
		#tu_3_2{
			width:53px;
			height:30px;
			/*border:1px solid red;*/
			float:right;
			line-height: 30px;

		}
		#tu_4{
			width:40px;
			height:23px;
			background-color:#E12E32;
			line-height: 23px;
			text-align: center;
			margin-left:8px;
			margin-top: 2px;
		}
		#content_2_3{
			width:620px;
			height:470px;
			/*border:1px solid red;*/
			float:left;
			margin-left:25px;
			margin-top: 10px;
		}
	    #content_2_4{
			width:490px;
			height:450px;
			/*border:1px solid red;*/
			float:left;
			margin-top: 10px;
			margin-left:35px;
		}
		#xiang_1{
			width:490px;
			height:170px;
			border-bottom:1.5px solid #e5e5e5;
		}
		#xiang_2{
			width:490px;
			height:90px;
			border-bottom:1.5px solid #e5e5e5;
			
		}
		#xiang_3{
			width:510px;
			height:235px;
			/*border:1px solid red;*/
		}
		#xiang_1_1{
			width:400px;
			height:35px;
			/*border:1px solid red;*/
			line-height:35px;
		}
		#xiang_1_2{
			width:400px;
			height:22px;
			/*border:1px solid red;*/
			line-height:22px;
			margin-top:10px;
		}
		#xiang_1_3{
			width:400px;
			height:22px;
			/*border:1px solid red;*/
			line-height:22px;
			margin-top:7px;
		}
		#xiang_1_4{
			width:450px;
			height:32px;
			/*border:1px solid red;*/
			margin-top: 8px;
			line-height: 32px;
		}
		#xiang_3_1{
			width:500px;
			height:20px;
			/*border:1px solid red;*/
			margin-top:13px;
		}
		#xiang_3_2{
			width:85px;
			height:20px;
			/*border:1px solid red;*/
			margin-top: 8px;
			float:left;
		}
		#xiang_3_3{
			width:422px;
			height:190px;
			float:left;
			margin-top: 8px;
			/*border:1px solid red;*/
		}
		</style>
@endsection('css')

@section('content')
	<!-- *************** -->
	<div id="content">
		<div id="content_img_1">
			<div id="content_1">
				<div id="box">

	<ul id="pic_list">
		<li style="z-index:2;opacity:1;fliter:alpha(opacity=100);">
        <a href="#"><img width="750" height="430" src="{{ asset('/home/images/zshx/pic_1.jpg')}}" alt="" /></a></li>
		<li><a href="#"><img width="750" height="430" src="{{ asset('/home/images/zshx/pic_2.jpg')}}" alt="" /></a></li>
		<li><a href="#"><img width="750" height="430" src="{{ asset('/home/images/zshx/pic_4.jpg')}}" alt="" /></a></li>
		<li><a href="#"><img width="750" height="430" src="{{ asset('/home/images/zshx/pic_5.jpg')}}" alt="" /></a></li>
		<li><a href="#"><img width="750" height="430" src="{{ asset('/home/images/zshx/pic_6.jpg')}}" alt="" /></a></li>
		<li><a href="#"><img width="750" height="430" src="{{ asset('/home/images/zshx/pic_7.jpg')}}" alt="" /></a></li>
		<li><a href="#"><img width="750" height="430" src="{{ asset('/home/images/zshx/pic_8.jpg')}}" alt="" /></a></li>
		<li><a href="#"><img width="750" height="430" src="{{ asset('/home/images/zshx/pic_9.jpg')}}" alt="" /></a></li>
	</ul>
	
	<!-- <div class="mark"></div> -->

	<ul id="text_list">
		<li><h2 class="show"><a href="#"></a></h2></li>
		<li><h2></h2></li>
		<li><h2></h2></li>
		<li><h2></h2></li>
		<li><h2></h2></li>
        <li><h2></h2></li>
        <li><h2></h2></li>
        <li><h2></h2></li>
	</ul>
	
	<div id="ico_list">
		<ul>
			<li class="active"><a href="javascript:void(0)"><img width="64" height="40" src="{{ asset('/home/images/zshx/pic_1.jpg')}}" alt="" /></a></li>
			<li><a href="javascript:void(0)"><img width="64" height="40" src="{{ asset('/home/images/zshx/pic_2.jpg')}}" alt="" /></a></li>
			<li><a href="javascript:void(0)"><img width="64" height="40" src="{{ asset('/home/images/zshx/pic_4.jpg')}}" alt="" /></a></li>
			<li><a href="javascript:void(0)"><img width="64" height="40" src="{{ asset('/home/images/zshx/pic_5.jpg')}}" alt="" /></a></li>
			<li><a href="javascript:void(0)"><img width="64" height="40" src="{{ asset('/home/images/zshx/pic_6.jpg')}}" alt="" /></a></li>
			<li><a href="javascript:void(0)"><img width="64" height="40" src="{{ asset('/home/images/zshx/pic_7.jpg')}}" alt="" /></a></li>
			<li><a href="javascript:void(0)"><img width="62" height="34" src="{{ asset('/home/images/zshx/pic_8.jpg')}}" alt="" /></a></li>
			<li><a href="javascript:void(0)"><img width="64" height="40" src="{{ asset('/home/images/zshx/pic_9.jpg')}}" alt="" /></a></li>
		</ul>
	</div>
	
	<a style="display:none" href="javascript:void(0)" id="btn_prev" class="btn"></a>
	<a style="display:none" href="javascript:void(0)" id="btn_next" class="btn showBtn"></a>

				</div>
				<div id="content_1_2">
					<div id="content_1_2_1">
						<p id="p1">浙商.临港新天地</p>
						<p id="p2">周边·南岸</p>
					<div id="nve">
					
						<div id="nve_1" > 地段好 </div>		
						<div id="nve_2">交通便利</div>		
						<div id="nve_3">商业区</div>		
					
					</div>
					<div style="padding-top:20px;">
					<span style="color:#c6c6c6;font-size:13px;">楼盘均价</span>
					<span style="font-size:24px;color:red;font-weight:600">9900/1平方</span>
					<span style="color:#c6c6c6;font-size:13px">(2015年参考价)</span>
					</div>
					</div>
					<div id="content_1_2_2">
					<div style="padding-top:20px">
						<span style="font-size:16px;color:#848484">开盘时间:&nbsp;2015年2月7日</span>
					</div>
					<div style="padding-top:16px">
						<span style="font-size:15px;color:#848484">入住时间:&nbsp;2017年7月1日</span>
					</div>
					<div style="padding-top:16px">
						<span style="font-size:15px;color:#848484">物业类型:&nbsp;建筑综合体 写字楼...</span>
					</div>
					<div style="padding-top:16px">
						<span style="font-size:15px;color:#848484">楼盘地址:&nbsp;宜宾市临港经济开发区护国</span>
					</div>
					<div style="padding-top:5px;position:relative">
						<span style="font-size:16px;color:#848484">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;路与长翠路交叉口</span>
						<a href=""><div style="position:absolute;left:208px;bottom:6px " class="pin icon"></div></a>
					
					
					</div>
					
						
					</div>
					<div id="content_1_2_3">
						<div id="dian1">
							<img style="margin-top:5px;margin-left:6px" src="{{ asset('/home/images/dian.gif') }}" alt="">
						</div>
						<div id="dian2">
							<span style="font-size:16px;color:red;font-weight:600">0831-8209999&nbsp;&nbsp;咨询楼盘信息</span>
						</div>
					</div>
				</div>

			</div>
		</div>

	</div>
		<div id="content_2">
			<div id="content_2_1">
				<div id="content_2_1_1">
					<div id="content_2_1_1_1">
						<div id="content_2_1_1_1_1">
							<div style="width:90px;height:20px;margin-top:10px">
							<span style="font-size:19px;font-weight:600;color:#4b4b4b"> &nbsp;楼盘户型</span>	
							</div>
						</div>
						<div id="content_2_1_1_1_2">
							<div style="width:120px;height:20px;margin-top:11px">
							<span style="font-size:18px;font-weight:550;color:#747474"> &nbsp;Real estate</span>			
							</div>
						</div>
					</div>
				</div>

				<div id="content_2_1_2">
					<div  id="content_2_1_2_1">
						<div index="1"  class="content1" id="tu_1">
							<img style="width:100%;height:100%" src="{{ asset('home/images/zshx/1.png') }}" alt="">
						</div>
						<div index="1"  class="content1" id="tu_2">
							<span style="font-size:18px;font-weight:500;color:#f6f6f6">A户型</span>
						</div>
						<div id="tu_3">
							<div id="tu_3_1">
								<span style="font-size:16px;font-weight:500;color:#666">一房一厅</span>
								
							</div>
							<div id="tu_3_2">
								<span style="font-size:16px;font-weight:500;color:#666">62.0㎡</span>
								
							</div>
						</div>
						<div id="tu_4">
							<span style="font-size:15px;color:#f6f6f6;font-weight:500">待售</span>
						</div>
					</div>
					<div  id="content_2_1_2_2">
						<div index="2" class="content1" id="tu_1">
							<img style="width:100%;height:100%" src="{{ asset('home/images/zshx/2.png') }}" alt="">			
						</div>
					    <div index="2" class="content1" id="tu_2">
							<span style="font-size:18px;font-weight:500;color:#f6f6f6">B户型</span>
						</div>
						<div id="tu_3">
							<div id="tu_3_1">
								<span style="font-size:16px;font-weight:500;color:#666">一房一厅</span>
							</div>
							<div id="tu_3_2">
								<span style="font-size:16px;font-weight:500;color:#666">51.0㎡</span>
							</div>
						</div>
						<div id="tu_4">
							<span style="font-size:15px;color:#f6f6f6;font-weight:500">待售</span>
						</div>

					</div>
					<div  id="content_2_1_2_3">
						<div index="3" class="content1" id="tu_1">
							<img style="width:100%;height:100%" src="{{ asset('home/images/zshx/3.png') }}" alt="">
						</div>
						<div index="3" class="content1" id="tu_2_1">
							<span style="font-size:18px;font-weight:500;color:#f6f6f6">C户型</span>
						</div>
						<div id="tu_3">
							<div id="tu_3_1">
								<span style="font-size:16px;font-weight:500;color:#666">一房一厅</span>
								
							</div>
							<div id="tu_3_2">
								<span style="font-size:16px;font-weight:500;color:#666">52.0㎡</span>
								
							</div>
						</div>	
						<div id="tu_4">
							<span style="font-size:15px;color:#f6f6f6;font-weight:500">待售</span>
						</div>

					</div>
					<div  id="content_2_1_2_4">
						<div index="4" class="content1" id="tu_1">
							<img style="width:100%;height:100%" src="{{ asset('home/images/zshx/4.png') }}" alt="">	
						</div>
						<div index="4" class="content1" id="tu_2">
							<span style="font-size:18px;font-weight:500;color:#f6f6f6">D户型</span>
						</div>
						<div id="tu_3">
							<div id="tu_3_1">
								<span style="font-size:16px;font-weight:500;color:#666">一房一厅</span>
								
							</div>
							<div id="tu_3_2">
								<span style="font-size:16px;font-weight:500;color:#666">54.0㎡</span>
								
							</div>
						</div>
						<div id="tu_4">
							<span style="font-size:15px;color:#f6f6f6;font-weight:500">待售</span>
						</div>

					</div>
				</div>
			</div>
		<div id="xuan">
			<div class="content_1" id="content_2_2">
				<div id="content_2_1_1">
					<div id="content_2_1_1_1">
						<div id="content_2_1_1_1_1">
							<div style="width:87px;height:20px;margin-top:10px">
							<span style="font-size:19px;font-weight:600;color:#4b4b4b"> &nbsp;户型详情</span>	
							</div>
						</div>
						<div id="content_2_1_1_1_2">
							<div style="width:120px;height:20px;margin-top:11px">
							<span style="font-size:18px;font-weight:550;color:#747474"> &nbsp;Unit details</span>			
							</div>
						</div>
					</div>
				</div>
				<div id="content_2_3">
					<img style="width:100%;height:100%" src="{{ asset('./home/images/zshx/hu_1.png') }}" alt="">
				</div>
				<div id="content_2_4">
					<div id="xiang_1">
						<div id="xiang_1_1">
							<span style="font-size:24px;font-weight:600;color:#4c4c4c">浙商新天地A户型</span>
						</div>
						<div id="xiang_1_2">
							<span style="font-size:17px;font-weight:500;color:#4c4c4c">居住情况:一房一厅</span>
						</div>
						<div id="xiang_1_3">
							<span style="font-size:17px;font-weight:500;color:#4c4c4c">建筑面积: 62.0㎡</span>
						</div>
						<div id="xiang_1_4">
							<span style="font-size:16px;background-color:red;color:#f6f6f6">待售</span>
							<span style="margin-left:5px;font-size:16px;background-color:#C0AAD9;color:#f6f6f6">平层</span>
							<span style="margin-left:5px;font-size:16px;background-color:#DF9FA0;color:#f6f6f6">高入户</span>
							<span style="margin-left:5px;font-size:16px;background-color:#D4B97E;color:#f6f6f6">采光好</span>
							<span style="margin-left:5px;font-size:16px;background-color:#9AC78C;color:#f6f6f6">精装</span>
						</div>
					</div>
					<div id="xiang_2">
						<div style="padding-top:18px" id="xiang_2_1"> <span style="font-size:17px;font-weight:500;color:#4c4c4c">参考均价：</span> </div>
						<div style="margin-top:5px" id="xiang_2_2"> <span style="font-size:17px;font-weight:500;color:#4c4c4c">参考总价：</span> </div>
					</div>
					<div id="xiang_3">
						<div id="xiang_3_1">
							<span style="font-size:17px;font-weight:500;color:#4c4c4c">户型分布：</span>
						</div>
						<div id="xiang_3_2">
							<span style="font-size:17px;font-weight:500;color:#4c4c4c">户型解读：</span>
						</div>
						<div id="xiang_3_3">
						<div>
							<span style="font-size:17px;font-weight:500;color:#4c4c4c">1, 360度°全落地玻璃幕墙采光, 光线充沛视野宽阔 ;</span><br>
							
						</div>
						<div style="padding-top:10px;">
							<span style="font-size:17px;font-weight:500;color:#4c4c4c">2, 3.6米豪宅层高设计, 使居住空间更宽敞 ;</span><br>
							
						</div>
						<div style="padding-top:10px;">
							<span style="font-size:17px;font-weight:500;color:#4c4c4c">3, 干湿分区, 宽绰餐厅与客厅, 简约实用空间, 居家功能集聚完善 ;</span><br>
							
						</div>						
						<div style="padding-top:10px;">
							<span style="font-size:17px;font-weight:500;color:#4c4c4c">4, 客厅、卧室、卫生间、厨房、书房等多种功能复合 ;</span><br>
							
						</div>							
						</div>
					</div>
				</div>
			</div>
			
			<div style="display:none" class="content_2" id="content_2_2">
				<div id="content_2_1_1">
					<div id="content_2_1_1_1">
						<div id="content_2_1_1_1_1">
							<div style="width:87px;height:20px;margin-top:10px">
							<span style="font-size:19px;font-weight:600;color:#4b4b4b"> &nbsp;户型详情</span>	
							</div>
						</div>
						<div id="content_2_1_1_1_2">
							<div style="width:120px;height:20px;margin-top:11px">
							<span style="font-size:18px;font-weight:550;color:#747474"> &nbsp;Unit details</span>			
							</div>
						</div>
					</div>
				</div>
				<div id="content_2_3">
					<img style="width:100%;height:100%" src="{{ asset('./home/images/zshx/hu_2.png') }}" alt="">
				</div>
				<div id="content_2_4">
					<div id="xiang_1">
						<div id="xiang_1_1">
							<span style="font-size:24px;font-weight:600;color:#4c4c4c">浙商新天地B户型</span>
						</div>
						<div id="xiang_1_2">
							<span style="font-size:17px;font-weight:500;color:#4c4c4c">居住情况:一房一厅</span>
						</div>
						<div id="xiang_1_3">
							<span style="font-size:17px;font-weight:500;color:#4c4c4c">建筑面积: 62.0㎡</span>
						</div>
						<div id="xiang_1_4">
							<span style="font-size:16px;background-color:red;color:#f6f6f6">待售</span>
							<span style="margin-left:5px;font-size:16px;background-color:#C0AAD9;color:#f6f6f6">平层</span>
							<span style="margin-left:5px;font-size:16px;background-color:#DF9FA0;color:#f6f6f6">高入户</span>
							<span style="margin-left:5px;font-size:16px;background-color:#D4B97E;color:#f6f6f6">采光好</span>
							<span style="margin-left:5px;font-size:16px;background-color:#9AC78C;color:#f6f6f6">精装</span>
						</div>
					</div>
					<div id="xiang_2">
						<div style="padding-top:18px" id="xiang_2_1"> <span style="font-size:17px;font-weight:500;color:#4c4c4c">参考均价：</span> </div>
						<div style="margin-top:5px" id="xiang_2_2"> <span style="font-size:17px;font-weight:500;color:#4c4c4c">参考总价：</span> </div>
					</div>
					<div id="xiang_3">
						<div id="xiang_3_1">
							<span style="font-size:17px;font-weight:500;color:#4c4c4c">户型分布：</span>
						</div>
						<div id="xiang_3_2">
							<span style="font-size:17px;font-weight:500;color:#4c4c4c">户型解读：</span>
						</div>
						<div id="xiang_3_3">
						<div>
							<span style="font-size:17px;font-weight:500;color:#4c4c4c">1, 360度°全落地玻璃幕墙采光, 光线充沛视野宽阔 ;</span><br>
							
						</div>
						<div style="padding-top:10px;">
							<span style="font-size:17px;font-weight:500;color:#4c4c4c">2, 3.6米豪宅层高设计, 使居住空间更宽敞 ;</span><br>
							
						</div>
						<div style="padding-top:10px;">
							<span style="font-size:17px;font-weight:500;color:#4c4c4c">3, 干湿分区, 宽绰餐厅与客厅, 简约实用空间, 居家功能集聚完善 ;</span><br>
							
						</div>						
						<div style="padding-top:10px;">
							<span style="font-size:17px;font-weight:500;color:#4c4c4c">4, 客厅、卧室、卫生间、厨房、书房等多种功能复合 ;</span><br>
							
						</div>							
						</div>
					</div>
				</div>
			</div>
			<div style="display:none" class="content_3" id="content_2_2">
				<div id="content_2_1_1">
					<div id="content_2_1_1_1">
						<div id="content_2_1_1_1_1">
							<div style="width:87px;height:20px;margin-top:10px">
							<span style="font-size:19px;font-weight:600;color:#4b4b4b"> &nbsp;户型详情</span>	
							</div>
						</div>
						<div id="content_2_1_1_1_2">
							<div style="width:120px;height:20px;margin-top:11px">
							<span style="font-size:18px;font-weight:550;color:#747474"> &nbsp;Unit details</span>			
							</div>
						</div>
					</div>
				</div>
				<div id="content_2_3">
					<img style="width:100%;height:100%" src="{{ asset('./home/images/zshx/hu_3.png') }}" alt="">
				</div>
				<div id="content_2_4">
					<div id="xiang_1">
						<div id="xiang_1_1">
							<span style="font-size:24px;font-weight:600;color:#4c4c4c">浙商新天地C户型</span>
						</div>
						<div id="xiang_1_2">
							<span style="font-size:17px;font-weight:500;color:#4c4c4c">居住情况:一房一厅</span>
						</div>
						<div id="xiang_1_3">
							<span style="font-size:17px;font-weight:500;color:#4c4c4c">建筑面积: 62.0㎡</span>
						</div>
						<div id="xiang_1_4">
							<span style="font-size:16px;background-color:red;color:#f6f6f6">待售</span>
							<span style="margin-left:5px;font-size:16px;background-color:#C0AAD9;color:#f6f6f6">平层</span>
							<span style="margin-left:5px;font-size:16px;background-color:#DF9FA0;color:#f6f6f6">高入户</span>
							<span style="margin-left:5px;font-size:16px;background-color:#D4B97E;color:#f6f6f6">采光好</span>
							<span style="margin-left:5px;font-size:16px;background-color:#9AC78C;color:#f6f6f6">精装</span>
						</div>
					</div>
					<div id="xiang_2">
						<div style="padding-top:18px" id="xiang_2_1"> <span style="font-size:17px;font-weight:500;color:#4c4c4c">参考均价：</span> </div>
						<div style="margin-top:5px" id="xiang_2_2"> <span style="font-size:17px;font-weight:500;color:#4c4c4c">参考总价：</span> </div>
					</div>
					<div id="xiang_3">
						<div id="xiang_3_1">
							<span style="font-size:17px;font-weight:500;color:#4c4c4c">户型分布：</span>
						</div>
						<div id="xiang_3_2">
							<span style="font-size:17px;font-weight:500;color:#4c4c4c">户型解读：</span>
						</div>
						<div id="xiang_3_3">
						<div>
							<span style="font-size:17px;font-weight:500;color:#4c4c4c">1, 360度°全落地玻璃幕墙采光, 光线充沛视野宽阔 ;</span><br>
							
						</div>
						<div style="padding-top:10px;">
							<span style="font-size:17px;font-weight:500;color:#4c4c4c">2, 3.6米豪宅层高设计, 使居住空间更宽敞 ;</span><br>
							
						</div>
						<div style="padding-top:10px;">
							<span style="font-size:17px;font-weight:500;color:#4c4c4c">3, 干湿分区, 宽绰餐厅与客厅, 简约实用空间, 居家功能集聚完善 ;</span><br>
							
						</div>						
						<div style="padding-top:10px;">
							<span style="font-size:17px;font-weight:500;color:#4c4c4c">4, 客厅、卧室、卫生间、厨房、书房等多种功能复合 ;</span><br>
							
						</div>							
						</div>
					</div>
				</div>
			</div>
			<div style="display:none" class="content_4" id="content_2_2">
				<div id="content_2_1_1">
					<div id="content_2_1_1_1">
						<div id="content_2_1_1_1_1">
							<div style="width:87px;height:20px;margin-top:10px">
							<span style="font-size:19px;font-weight:600;color:#4b4b4b"> &nbsp;户型详情</span>	
							</div>
						</div>
						<div id="content_2_1_1_1_2">
							<div style="width:120px;height:20px;margin-top:11px">
							<span style="font-size:18px;font-weight:550;color:#747474"> &nbsp;Unit details</span>			
							</div>
						</div>
					</div>
				</div>
				<div id="content_2_3">
					<img style="width:100%;height:100%" src="{{ asset('./home/images/zshx/hu_4.png') }}" alt="">
				</div>
				<div id="content_2_4">
					<div id="xiang_1">
						<div id="xiang_1_1">
							<span style="font-size:24px;font-weight:600;color:#4c4c4c">浙商新天地D户型</span>
						</div>
						<div id="xiang_1_2">
							<span style="font-size:17px;font-weight:500;color:#4c4c4c">居住情况:一房一厅</span>
						</div>
						<div id="xiang_1_3">
							<span style="font-size:17px;font-weight:500;color:#4c4c4c">建筑面积: 62.0㎡</span>
						</div>
						<div id="xiang_1_4">
							<span style="font-size:16px;background-color:red;color:#f6f6f6">待售</span>
							<span style="margin-left:5px;font-size:16px;background-color:#C0AAD9;color:#f6f6f6">平层</span>
							<span style="margin-left:5px;font-size:16px;background-color:#DF9FA0;color:#f6f6f6">高入户</span>
							<span style="margin-left:5px;font-size:16px;background-color:#D4B97E;color:#f6f6f6">采光好</span>
							<span style="margin-left:5px;font-size:16px;background-color:#9AC78C;color:#f6f6f6">精装</span>
						</div>
					</div>
					<div id="xiang_2">
						<div style="padding-top:18px" id="xiang_2_1"> <span style="font-size:17px;font-weight:500;color:#4c4c4c">参考均价：</span> </div>
						<div style="margin-top:5px" id="xiang_2_2"> <span style="font-size:17px;font-weight:500;color:#4c4c4c">参考总价：</span> </div>
					</div>
					<div id="xiang_3">
						<div id="xiang_3_1">
							<span style="font-size:17px;font-weight:500;color:#4c4c4c">户型分布：</span>
						</div>
						<div id="xiang_3_2">
							<span style="font-size:17px;font-weight:500;color:#4c4c4c">户型解读：</span>
						</div>
						<div id="xiang_3_3">
						<div>
							<span style="font-size:17px;font-weight:500;color:#4c4c4c">1, 360度°全落地玻璃幕墙采光, 光线充沛视野宽阔 ;</span><br>
							
						</div>
						<div style="padding-top:10px;">
							<span style="font-size:17px;font-weight:500;color:#4c4c4c">2, 3.6米豪宅层高设计, 使居住空间更宽敞 ;</span><br>
							
						</div>
						<div style="padding-top:10px;">
							<span style="font-size:17px;font-weight:500;color:#4c4c4c">3, 干湿分区, 宽绰餐厅与客厅, 简约实用空间, 居家功能集聚完善 ;</span><br>
							
						</div>						
						<div style="padding-top:10px;">
							<span style="font-size:17px;font-weight:500;color:#4c4c4c">4, 客厅、卧室、卫生间、厨房、书房等多种功能复合 ;</span><br>
							
						</div>							
						</div>
					</div>
				</div>
			</div>
		</div>
		</div>

</body>
<script>
		$('.content1').on('click',function(i,n){
			var index ='.content_'+$(this).attr('index');
			// alert(index);
			$('.content_1').css('display','none');
			$('.content_2').css('display','none');
			$('.content_3').css('display','none');
			$('.content_4').css('display','none');
			$(index).css('display','block');

		})
</script>
<script type="text/javascript">
window.onload=function(){
	var aPicLi=document.getElementById('pic_list').getElementsByTagName('li');
	var aTextLi=document.getElementById('text_list').getElementsByTagName('li');
	var aIcoLi=document.getElementById('ico_list').getElementsByTagName('li');
	var oIcoUl=document.getElementById('ico_list').getElementsByTagName('ul')[0];
	var oPrev=document.getElementById('btn_prev');
	var oNext=document.getElementById('btn_next');
	var oDiv=document.getElementById('box');
	var i=0;
	var iNowUlLeft=0;
	var iNow=0;
	
	oPrev.onclick=function(){
		if(iNowUlLeft>0){
			iNowUlLeft--;
			oUlleft();
		}
		oPrev.className=iNowUlLeft==0?'btn':'btn showBtn';
		oNext.className=iNowUlLeft==(aIcoLi.length-7)?'btn':'btn showBtn';
	}
	
	oNext.onclick=function(){
		if(iNowUlLeft<aIcoLi.length-7){
			iNowUlLeft++;
			oIcoUl.style.left=-aIcoLi[0].offsetWidth*iNowUlLeft+'px';
		}
		oPrev.className=iNowUlLeft==0?'btn':'btn showBtn';
		oNext.className=iNowUlLeft==(aIcoLi.length-7)?'btn':'btn showBtn';
	}
	
	for(i=0;i<aIcoLi.length;i++){
		aIcoLi[i].index=i;
		aIcoLi[i].onclick=function(){
			if(iNow==this.index){
				return false;
			}
			iNow=this.index;
			tab();
		}
	}
	
	function tab(){
		for(i=0;i<aIcoLi.length;i++){
			aIcoLi[i].className='';
			aPicLi[i].style.filter='alpha(opacity:0)';
			aPicLi[i].style.opacity=0;
			aTextLi[i].getElementsByTagName('h2')[0].className='';
			miaovStopMove( aPicLi[i]);
		}
		aIcoLi[iNow].className='active';
		//aPicLi[this.index].style.filter='alpha(opacity:100)';
		//aPicLi[this.index].style.opacity=1;
		miaovStartMove(aPicLi[iNow],{opacity:100},MIAOV_MOVE_TYPE.BUFFER);
		aTextLi[iNow].getElementsByTagName('h2')[0].className='show';
	}
	
	function oUlleft(){
		oIcoUl.style.left=-aIcoLi[0].offsetWidth*iNowUlLeft+'px';
	}
	
	function autoplay(){
		iNow++;
		if(iNow>=aIcoLi.length){
			iNow=0;
		}
		if(iNow<iNowUlLeft){
			iNowUlLeft=iNow;
		}else if(iNow>=iNowUlLeft+7){
			iNowUlLeft=iNow-6;
		}
		oPrev.className=iNowUlLeft==0?'btn':'btn showBtn';
		oNext.className=iNowUlLeft==(aIcoLi.length-7)?'btn':'btn showBtn';
		oUlleft();
		tab();
	}
	
	var time=setInterval(autoplay,5000);
	oDiv.onmouseover=function(){
		clearInterval(time);
	}
	// oDiv.onmouseout=function(){
	// 	time=setInterval(autoplay,5000);
	// }

}
</script>
@endsection('content')

