<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>{{ config('app.name') }}</title>
	<script src="{{ asset('/js/jquery-1.8.3.min.js') }}"></script>
	<link href="{{ asset('/home/lunpo/css/style.css') }}" rel="stylesheet" />
<script type="text/javascript" src="{{ asset('/home/lunpo/js/startMove.js') }}"></script>
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
	
	var time=setInterval(autoplay,3000);
	oDiv.onmouseover=function(){
		clearInterval(time);
	}
	oDiv.onmouseout=function(){
		time=setInterval(autoplay,3000);
	}

}
</script>
	<style>
		*{
			margin:0px;
			padding:0px;
			font-family: "Microsoft YaHei" ! important;
		}
		#hades{
			width:100%;
			height:107px;
			border-bottom:2px solid #000;
			
			
		}
		
		#hade_content{
			width:1100px;
			height:130px;
			/*border:1px solid red;*/
			margin:0 auto;
		}
		#hade_1{
		width:1100px;
		height:70px;
		/*border:1px solid red;*/
		}

		#hade_1_1{
			width:420px;
			height:70px;
			/*border:1px solid red;*/
			float:left;
		

		}
		#hade_img_1{
			margin-top:10px;
			float:left;
			width:146px;
			height:48px;
			
			
		}
		#hade_1_2{
			width:675px;
			height:70px;
			/*border:1px solid red;*/
			float:right;
		}
		#hade_1_2_1{
			width:170px;
			height:70px;
			/*border:1px solid red;*/
			float:left;
			color:red;
			line-height:70px;
		}
		#hade_1_2_2{
			width:170px;
			height:70px;
			/*border:1px solid red;*/
			float:left;
			color:red;
			line-height:70px;
		}
		#hade_1_2_3{
			width:280px;
			height:70px;
			/*border:1px solid red;*/
			float:right;
		}
		#hade_2{
		width:1100px;
		height:34px;
		/*border:1px solid red;*/

		}

		#menu {
		font-size: 15px;
		font-weight: bolder;
		}
		#menu li{
		list-style-image: none;
		list-style-type: none;
		background-color: #fff;
		/*border-left:8px;*/
/*		border-right-width: 1px;
		border-right-style: solid;
		border-right-color: #000000;*/
		float: left;
		}
		#menu li a{
		color: #000;
		text-decoration: none;
		margin: 0px;
		padding-top: 8px;
		display: block; /* 作为一个块 */
		padding-right: 20px; /* 设置块的属性 */
		padding-bottom: 7px;
		padding-left: 21px;
		text-align:center;
		}
		#menu li a:hover{
		/*background-color: red;*/
		color:red;
		border-bottom:2px solid red;
		}
		#hade_2_1{
			padding-left:70px;
			width:800px;
			height:33px;
			/*border:1px solid red;*/
			margin:0 auto;
		}
		#content{
			width:100%;
			height:500px;
		}
		#content_img_1{
			width:100%;
			height:500px;
			/*border:1px solid red;*/
			background-image:url(./home/images/xuli.png);
			/*background-repeat:no-repeat;*/
			background-size: cover; 
			/*-moz-background-size: cover;*/
			
			position:absolute;
		}
		#content_1{
			width:900px;
			height:450px;
			border-left:2px solid #516975;
			margin :0 auto;
			/*position:relative;*/
			margin-top:25px;
			box-shadow: -10px -3px 10px #516975;
		}
		#box{
		width:600px;
		height:450px;
		/*border:1px solid red;*/
		float:left;
		}
		
		#content_1_2{
		width:300px;
		height:450px;
		/*border:1px solid red;*/
		float:right;
		background:#fff;
		}
		#content_1_2_1{
			width:255px;
			height:150px;
			border-bottom:1.5px solid #e5e5e5;
			margin-left:15px;
		}
		#content_1_2_2{
			width:255px;
			height:200px;
			border-bottom:1.5px solid #e5e5e5;
			margin-left:15px;
		}
		#content_1_2_3{
			width:280px;
			height:70px;
			/*border:1px solid #e5e5e5;*/
			margin-left:15px;
		}
		#p1{
			font-size:17px;
			font-weight:600;
			margin-top:15px; 
		}
		#p2{
			color:#c6c6c6;
			margin-top:3px;
			font-size: 14px;
		}
		#nve{
			width:200px;
			height: 25px;
			/*border:1px solid red;   */
			margin-top:10px;
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
			margin-top:5px;

		}
		#dian2{
			width:220px;
			height:40px;
			float:left;
			margin-top:5px;
			/*border:1px solid red;*/
			line-height: 40px;
		}
		#content_2{
			width:100%;
			/*height:400px;*/
			/*border:1px solid red;*/
			position:absolute;

		}
		#content_2_1{
			width:1100px;
			height:400px;
			/*border:1px solid red;*/
			margin:0 auto;
			background-color:#f5f5f5;
			margin-top:40px;
			position:relative

		}
		#content_2_2{
			width:1100px;
			height:500px;
			/*border:1px solid red;*/
			margin:0 auto;
			background-color:#f5f5f5;
			margin-top:30px;
			position:relative


		}
		#content_2_1_1{
			width:1100px;
			height:70px;
			/*border:1px solid red;*/
		}
		#content_2_1_1_1{
			width:1100px;
			height:35px;
			border-bottom:3px solid #dadada;
		}
		#content_2_1_1_1_1{
			width:80px;
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
			width:1108px;
			height:325px;
			/*border:1px solid red;*/
		}
		#content_2_1_2_1{
			width:274px;
			height:320px;
			/*border: 1px solid red;*/
			float:left;
			/*margin-right: 1px;*/
		
		}
		#content_2_1_2_2{
			width:274px;
			height:320px;
			/*border: 1px solid red;*/
			float:left;
			margin-left:4px;
		}
		#content_2_1_2_3{
			width:274px;
			height:320px;
			/*border: 1px solid red;*/
			float:left;
			margin-left:4px;
			
		}
		#content_2_1_2_4{
			width:274px;
			height:320px;
			/*border: 1px solid red;*/
			float:left;
			margin-left:4px;
			
		}
		#tu_1{
			width:266px;
			height:200px;
			/*border:1px solid red;*/
		}
	</style>
</head>
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
						<img src="{{ asset('/home/images/hade_2.png') }}" alt="">
						<span>装修公司实力认证</span>
					</div>
					<div id="hade_1_2_3">
						
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
	<!-- 头 -->
	<!-- *************** -->
	<div id="content">
		<div id="content_img_1">
			<div id="content_1">
				<div id="box">

	<ul id="pic_list">
		<li style="z-index:2;opacity:1;fliter:alpha(opacity=100);">
        <a href="#"><img width="600" height="390" src="{{ asset('/home/lunpo/img/pic_1.jpg')}}" alt="" /></a></li>
		<li><a href="#"><img width="600" height="390" src="{{ asset('/home/lunpo/img/pic_2.jpg')}}" alt="" /></a></li>
		<li><a href="#"><img width="600" height="390" src="{{ asset('/home/lunpo/img/pic_3.jpg')}}" alt="" /></a></li>
		<li><a href="#"><img width="600" height="390" src="{{ asset('/home/lunpo/img/pic_4.jpg')}}" alt="" /></a></li>
		<li><a href="#"><img width="600" height="390" src="{{ asset('/home/lunpo/img/pic_5.jpg')}}" alt="" /></a></li>
		<li><a href="#"><img width="600" height="390" src="{{ asset('/home/lunpo/img/pic_6.jpg')}}" alt="" /></a></li>
		<li><a href="#"><img width="600" height="390" src="{{ asset('/home/lunpo/img/pic_7.jpg')}}" alt="" /></a></li>
		<li><a href="#"><img width="600" height="390" src="{{ asset('/home/lunpo/img/pic_8.jpg')}}" alt="" /></a></li>
		<li><a href="#"><img width="600" height="390" src="{{ asset('/home/lunpo/img/pic_9.jpg')}}" alt="" /></a></li>
		<li><a href="#"><img width="600" height="390" src="{{ asset('/home/lunpo/img/pic_11.jpg')}}" alt="" /></a></li>
		<li><a href="#"><img width="600" height="390" src="{{ asset('/home/lunpo/img/pic_12.jpg')}}" alt="" /></a></li>
		<li><a href="#"><img width="600" height="390" src="{{ asset('/home/lunpo/img/pic_13.jpg')}}" alt="" /></a></li>
		<li><a href="#"><img width="600" height="390" src="{{ asset('/home/lunpo/img/pic_14.jpg')}}" alt="" /></a></li>
		<li><a href="#"><img width="600" height="390" src="{{ asset('/home/lunpo/img/pic_15.jpg')}}" alt="" /></a></li>
		<li><a href="#"><img width="600" height="390" src="{{ asset('/home/lunpo/img/pic_16.jpg')}}" alt="" /></a></li>
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
        <li><h2></h2></li>
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
			<li class="active"><a href="javascript:void(0)"><img width="64" height="34" src="{{ asset('/home/lunpo/img/pic_1.jpg')}}" alt="" /></a></li>
			<li><a href="javascript:void(0)"><img width="64" height="34" src="{{ asset('/home/lunpo/img/pic_2.jpg')}}" alt="" /></a></li>
			<li><a href="javascript:void(0)"><img width="64" height="34" src="{{ asset('/home/lunpo/img/pic_3.jpg')}}" alt="" /></a></li>
			<li><a href="javascript:void(0)"><img width="64" height="34" src="{{ asset('/home/lunpo/img/pic_4.jpg')}}" alt="" /></a></li>
			<li><a href="javascript:void(0)"><img width="125" height="70" src="{{ asset('/home/lunpo/img/pic_5.jpg')}}" alt="" /></a></li>
			<li><a href="javascript:void(0)"><img width="64" height="34" src="{{ asset('/home/lunpo/img/pic_6.jpg')}}" alt="" /></a></li>
			<li><a href="javascript:void(0)"><img width="64" height="34" src="{{ asset('/home/lunpo/img/pic_7.jpg')}}" alt="" /></a></li>
			<li><a href="javascript:void(0)"><img width="62" height="34" src="{{ asset('/home/lunpo/img/pic_8.jpg')}}" alt="" /></a></li>
			<li><a href="javascript:void(0)"><img width="64" height="34" src="{{ asset('/home/lunpo/img/pic_9.jpg')}}" alt="" /></a></li>
			<li><a href="javascript:void(0)"><img width="64" height="34" src="{{ asset('/home/lunpo/img/pic_11.jpg')}}" alt="" /></a></li>
			<li><a href="javascript:void(0)"><img width="64" height="34" src="{{ asset('/home/lunpo/img/pic_12.jpg')}}" alt="" /></a></li>
			<li><a href="javascript:void(0)"><img width="64" height="34" src="{{ asset('/home/lunpo/img/pic_13.jpg')}}" alt="" /></a></li>
			<li><a href="javascript:void(0)"><img width="64" height="34" src="{{ asset('/home/lunpo/img/pic_14.jpg')}}" alt="" /></a></li>
			<li><a href="javascript:void(0)"><img width="64" height="34" src="{{ asset('/home/lunpo/img/pic_15.jpg')}}" alt="" /></a></li>
			<li><a href="javascript:void(0)"><img width="64" height="34" src="{{ asset('/home/lunpo/img/pic_16.jpg')}}" alt="" /></a></li>
		</ul>
	</div>
	
	<a href="javascript:void(0)" id="btn_prev" class="btn"></a>
	<a href="javascript:void(0)" id="btn_next" class="btn showBtn"></a>

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
					<div style="padding-top:15px;">
					<span style="color:#c6c6c6;font-size:12px;">楼盘均价</span>
					<span style="font-size:22px;color:red;font-weight:590">9900/1平方</span>
					<span style="color:#c6c6c6;font-size:12px">(2015年参考价)</span>
					</div>
					</div>
					<div id="content_1_2_2">
					<div style="padding-top:20px">
						<span style="font-size:15px;color:#848484">开盘时间:&nbsp;2015年2月7日</span>
					</div>
					<div style="padding-top:12px">
						<span style="font-size:15px;color:#848484">入住时间:&nbsp;2017年7月1日</span>
					</div>
					<div style="padding-top:12px">
						<span style="font-size:15px;color:#848484">物业类型:&nbsp;建筑综合体 写字楼...</span>
					</div>
					<div style="padding-top:12px">
						<span style="font-size:15px;color:#848484">楼盘地址:&nbsp;宜宾市临港经济开发区护国</span>
					</div>
					<div style="padding-top:5px">
						<span style="font-size:15px;color:#848484">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;路与长翠路交叉口</span><div style="float:right;width:25px;height:25px;margin-right:23px;position:relative;" id="content_1_2_3">
						<a href=""><div class="pin icon"></div></a>
					</div>
					
					</div>
					
						
					</div>
					<div id="content_1_2_3">
						<div id="dian1">
							<img style="margin-top:5px;margin-left:6px" src="{{ asset('/home/images/dian.gif') }}" alt="">
						</div>
						<div id="dian2">
							<span style="font-size:15px;color:red;font-weight:600">0831-8209999&nbsp;&nbsp;咨询楼盘信息</span>
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
							<div style="width:80px;height:20px;margin-top:10px">
							<span style="font-size:18px;font-weight:600;color:#4b4b4b"> &nbsp;楼盘户型</span>	
							</div>
						</div>
						<div id="content_2_1_1_1_2">
							<div style="width:120px;height:20px;margin-top:11px">
							<span style="font-size:16px;font-weight:550;color:#747474"> &nbsp;Real estate</span>			
							</div>
						</div>
					</div>
				</div>

				<div id="content_2_1_2">
					<div id="content_2_1_2_1">
						<div id="tu_1">
							<img style="width:100%;height:100%" src="{{ asset('home/images/huxing/hu_1.png') }}" alt="">
						</div>
					</div>
					<div id="content_2_1_2_2">
						<div id="tu_1">
							<img style="width:100%;height:100%" src="{{ asset('home/images/huxing/hu_2.png') }}" alt="">
							
						</div>
					</div>
					<div id="content_2_1_2_3">
						<div id="tu_1">
							<img style="width:100%;height:100%" src="{{ asset('home/images/huxing/hu_3.png') }}" alt="">
							
						</div>
					</div>
					<div id="content_2_1_2_4">
						<div id="tu_1">
							<img style="width:100%;height:100%" src="{{ asset('home/images/huxing/hu_4.png') }}" alt="">
							
						</div>
					</div>
				</div>
			</div>

			<div id="content_2_2">
				<div id="content_2_1_1">
					<div id="content_2_1_1_1">
						<div id="content_2_1_1_1_1">
							<div style="width:80px;height:20px;margin-top:10px">
							<span style="font-size:18px;font-weight:600;color:#4b4b4b"> &nbsp;户型详情</span>	
							</div>
						</div>
						<div id="content_2_1_1_1_2">
							<div style="width:120px;height:20px;margin-top:11px">
							<span style="font-size:16px;font-weight:550;color:#747474"> &nbsp;Unit details</span>			
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
</body>

</html>