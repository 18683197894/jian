@extends('heads')
@section('css')
<script src="{{ asset('home/lunpo/index/banner.js') }}"></script>
<style>
	#index_1{
		width:100%;
		height:600px;
		position:relative;
	}
	#index_1_1{
		width:100%;
		height:600px;
		position:absolute;
		z-index:100;
	}

	#index_2{
		width:100%;
		height:130px;
		position: absolute;
		z-index:101;
		/*top:0px;*/

	}
	#index_2_1{
		width:950px;
		height:130px;
		background-color:#fff;
		margin:0 auto;
		border-radius:6px 6px 6px 6px;
		background:rgba(0,0,0,0.5);
		margin-top: 420px;
		position: relative;
	}
.bannerbox{width:100%;position:relative;overflow:hidden;}
/*#888484*/
.Homebanner{width:100%;position:relative;height:600px;overflow:hidden;}
.Homebanner ul{width:100%;position:absolute;height:600px;}
.Homebanner ul li{width:100%;height:600px;position:absolute;overflow:hidden;}
.Homebanner ul li img{width:1900px;position:absolute;left:50%;top:0px;display:block;margin-left:-950px;height:600px;}
.Homeleft,.Homeright{background:rgba(136,132,132,0.8);;font-family:"宋体";width:50px;height:50px;line-height:50px;text-align:center;font-size:40px;color:#fff;position:absolute;top:45%;cursor:pointer;transition:all .2s ease;opacity:0;z-index:899999}
.Homeleft{left:-60px;}
.Homeright{right:-60px;}

.bannerbox:hover .Homeleft{left:0px;opacity:1}
.bannerbox:hover .Homeright{right:0px;opacity:1}

.Homedot{position:absolute;width:100%;text-align:center;z-index:999;bottom:20px;}
.Homedot a{display:inline-block;margin:0px 7px;height:16px;width:16px;line-height:1000px;overflow:hidden;background-color:#fff;border-radius: 9999px}
.Homedot a.cur{background-color:yellow;border-radius: 9999px}
	#index_head{
		width:240px;
		height:50px;
		float:left;
		margin-left:40px;
	}
	#indexnone{
		width:400px;
		height:50px;
		float:left;
		position:relative;
	}
	#indexspan1{
		position:absolute;
		font-size: 16px;
		color:red;
		top:30px;
		left:170px;
		display:none;
	}
	#indexspan2{
		position:absolute;
		font-size: 16px;
		color:red;
		top:30px;
		left:145px;
		display:none;
	}
	#indexspan3{
		position:absolute;
		font-size: 16px;
		color:red;
		top:30px;
		left:32px;
		display:none;
	}
	#indexspan4{
		position:absolute;
		font-size: 16px;
		color:red;
		top:30px;
		left:15px;
		display:none;
	}
	#index_lil{
	margin-top: 15px;
	overflow:hidden;
	float:left;
	border-bottom:2px solid #fff;
	cursor:pointer;
	}
	#index_li{
	overflow:hidden;
	float:left;
	margin-top: 15px;
	margin-left:10px;
	cursor:pointer;
	}
	#index_head ul li span{
		display:block;
		font-weight:500;
		font-style: normal;
		font-size:18px;
		color:#fff;
		margin-bottom:3px;

	}

	#index_1_1_2{
		width:870px;
		height:78px;
		margin: 0 auto;
		margin-top: 10px;
	}
	#index_1_1_3{
		width:650px;
		height:78px;
		margin: 0 auto;
		margin-top: 10px;
		margin-right: 155px;
	}
 	#table_1{
 		width:240px;
 		height:70px;
 		float:left;
 		margin-top: 5px;
 	}
  	#table_2{
 		width:415px;
 		height:70px;
 		margin-top: 5px;
 		float:left;
 		margin-left: 10px;

 	}
  	#table_3{
 		width:190px;
 		margin-top: 5px;
 		height:70px;
 		float:left;
 		margin-left: 10px;
 	}

	select#selectPointOfInterest
	{
	   width                    : 180pt;
	   height                   : 35pt;
	   line-height              : 35pt;
	   padding-right            : 20pt;
	   /*text-indent              : 15vf
	   pt;*/
	   text-align               : left;
	   vertical-align           : middle;
	   border                   : 1px solid #fff;
	   -moz-border-radius       : 6px;
	   -webkit-border-radius    : 6px;
	   border-radius            : 6px;
	   -webkit-appearance       : none;
	   -moz-appearance          : none;
	   appearance               : none;
	   font-family              : Arial,  Calibri, Tahoma, Verdana;
	   font-size                : 1.5em;
	   font-weight              : 500;
	   color                    : #bababa;
	   cursor                   : pointer;
	   outline                  : none;

	}
	select#selectPointOfInterest option
	{
	    padding             : 4px 10px 4px 10px;
	    font-size           : 12pt;
	    font-weight         : normal;
	}
	select#selectPointOfInterest option[selected]{ font-weight:bold;}
	select#selectPointOfInterest option:nth-child(even) { background-color:#f5f5f5;}
	label#lblSelect{ position: relative; display: inline-block;}
	label#lblSelect::after
	{
	    content                 : "\25bc";
	    position                : absolute;
	    top                     : 0;
	    right                   : 0;
	    bottom                  : 0;
	    width                   : 20pt;
	    line-height             : 35pt;
	    vertical-align          : middle;
	    text-align              : center;
	    background              : #fff;
	    color                   : #bababa;
	   -moz-border-radius       : 0 6px 6px 0;
	   -webkit-border-radius    : 0 6px 6px 0;
	    border-radius           : 0 6px 6px 0;
	    pointer-events          : none;

	}
		#input_control{
		  width:415px;
		  margin:0px auto;

		}
		#table_2 input[type="text"],#btn1,#btn2{
		  box-sizing: border-box;
		  text-align:center;
		  font-size:1.5em;
		  height:46px;
		  border-radius:6px;
		  border:1px solid #fff;
		  line-height: 46px;
		  margin-top: 1px;
		  color:#6a6f77;
		  -web-kit-appearance:none;
		  -moz-appearance: none;
		  display:block;
		  outline:0;
		  padding:0 1em;
		  text-decoration:none;
		  width:100%;
		}

		#table_2 ::-moz-placeholder { 
		  color: #bababa;
		  font-size: 14pt;
		}
		#table_2 ::-moz-placeholder {
		  color: #bababa;
		  font-size: 14pt;

		}
		#table_2 input::-webkit-input-placeholder{
		  color: #bababa;
		  font-size: 14pt;

		}
		#table_3 button{
			width:190px;
			height:46px;
			background-color: #F2AB2B;
			border-radius: 6px;
			cursor:pointer;
			margin-top: 1px;
			border-style:none; 
			font-size:1.5em;
			color:#fff;
			font-weight: 500;
		}
		#table_3 button:hover{
			background-color: #F9CB2B;
			border-color: #ADADAD;
		}
		.z-con_4{
			width:1200px;
			height:590px;
			padding-top:50px;
			margin:0 auto;
		}

		.head2{
			width:900px;
			height:90px;
			margin:0 auto;
			/*border:1px solid red;*/
			background: url(home/images/index/head.png) no-repeat center center;
		}
		.head_1_1{
			width:900px;
			height:26px;
			color:#999;
			text-align:center;
			font-size:18px;
			margin:0;
			display:block;
		}
		.head_2_2{
			width:900px;
			height:26px;
			color:#999;
			display:block;
			text-align:center;
			font-weight:normal;
			font-style:normal;

		}

		.head2 b{
			width:900px;
			height:35px;
			color:#333;
			font-size:22px;
			text-align:center;
			line-height: 35px;
			display:block;
			font-weight:normal;
			font-style:normal;
		}
		.head{
			width:700px;
			height:90px;
			margin:0 auto;
			background: url(home/images/index/z-hx.jpg) no-repeat center center;
		}
		.head b{
			width:700px;
			height:35px;
			color:#333;
			font-size:22px;
			text-align:center;
			line-height: 35px;
			display:block;
			font-weight:normal;
			font-style:normal;
		}
		.head_1{
			width:700px;
			height:26px;
			color:#999;
			text-align:center;
			font-size:18px;
			font-weight: normal;
			font-style: normal;
			margin:0;
			display:block;
		}

		.head_2{
			width:700px;
			height:26px;
			color:#999;
			display:block;
			text-align:center;
			font-weight:normal;
			font-style:normal;

		}
		.z-con_4 ul{
			width:1200px;
			margin-top:15px;
			padding:0;

		}
		.z-con_4_lil{
			width:394px;
			height:480px;
			float:left;
			overflow:hidden;
		}
		.z-con_4_li{
			width:395px;
			height:480px;
			margin-left:8px;
			float:left;
			overflow:hidden;
			padding:0;
		}
		.z-con_4 ul li img{
			width:100%;
			height:435px;
		}
		.z-con_4 ul li span{
			width:400px;
			height:30px;
			text-align: center;
			font-weight:normal;
			font-style: normal;
			font-size: 20px;
			display: block;
			color:#333;
			margin-top: 10px;
			padding-right:5px;

		}
		.z-con_5{
			width:1200px;
			height:277px;
			/*border:1px solid red;*/
			margin:0 auto;
			padding-top: 50px;
		}
		.z-con_5_1{
			width:1200px;
			height:170px;
			margin:0 auto;
			padding:0;
			margin-top: 15px;
			background-color:#f5f5f5;
			/*border:1px solid red;*/
		}
		.con_5_li1,.con_5_li5{
			width:260px;
			height:85px;
			/*border:1px solid red;*/
			overflow:hidden;
			float:left;
			margin-left:54px;
			line-height: 85px;
		}
		.con_5_li2,.con_5_li6{
			width:281px;
			height:85px;
			/*border:1px solid red;*/
			overflow:hidden;
			line-height: 85px;
			float:left;
		}
		.con_5_li4,.con_5_li8{
			width:295px;
			height:85px;
			/*border:1px solid red;*/
			overflow:hidden;
			line-height: 85px;
			float:left;
		}
		.con_5_li3,.con_5_li7{
			width:310px;
			height:85px;
			/*border:1px solid red;*/
			overflow:hidden;
			line-height: 85px;
			float:left;
		}
		.con_5_span1{
			margin-top: 12px;
			width:60px;
			height:60px;
			float:left;
			display:block;
			background: url(home/images/index/9.png) no-repeat center center;

		}
		.con_5_span2{
			margin-top: 12px;
			width:60px;
			height:60px;
			float:left;
			display:block;
			background: url(home/images/index/10.png) no-repeat center center;

		}
		.con_5_span3{
			margin-top: 12px;
			width:60px;
			height:60px;
			float:left;
			display:block;
			background: url(home/images/index/11.png) no-repeat center center;

		}
		.con_5_span4{
			margin-top: 12px;
			width:60px;
			height:60px;
			float:left;
			display:block;
			background: url(home/images/index/12.png) no-repeat center center;

		}
		.con_5_span5{
			margin-top: 12px;
			width:60px;
			height:60px;
			float:left;
			display:block;
			background: url(home/images/index/13.png) no-repeat center center;

		}
		.con_5_span6{
			margin-top: 12px;
			width:60px;
			height:60px;
			float:left;
			display:block;
			background: url(home/images/index/14.png) no-repeat center center;

		}
		.con_5_span7{
			margin-top: 12px;
			width:60px;
			height:60px;
			float:left;
			display:block;
			background: url(home/images/index/15.png) no-repeat center center;

		}
		.con_5_span8{
			margin-top: 12px;
			width:60px;
			height:60px;
			float:left;
			display:block;
			background: url(home/images/index/16.png) no-repeat center center;

		}
		.con_5_span_2{
			font-size: 25px;
			color:#666;
			font-weight: normal;
			float:left;
			margin-left: 15px;
		}
		.con_5_span_4{
			width:41px;
			height:21px;
			background:url(home/images/index/jian.png) no-repeat center center;
			float:right;
			margin-right:30px;
			margin-top: 33px;
		}
		.con_5_span_5,.con_5_span_6,.con_5_span_3{
			width:41px;
			height:21px;
			background:url(home/images/index/jian.png) no-repeat center center;
			float:right;
			margin-right:20px;
			margin-top: 33px;
		}
		.z-con_6{
			width:1200px;
			height:586px;
			padding-top: 50px;
			margin:0 auto;
		}
		.con6_1{
			width:596px;
			height:482px;
			float:left;
			background:url(home/images/index/con6_1.png) no-repeat center center;
			margin-top: 15px;
		}
		.con6_2{
			width:596px;
			height:480px;
			float:right;
			margin-top: 15px;
			/*border:1px solid red;*/

		}
		.con6_1_1{
			width:455px;
			height:220px;
			background:rgba(96,96,96,0.7);
			margin:0 auto;
			margin-top:130px;
			text-align: center;
		}
		.con6_1_1 span{
			line-height: 220px;
			font-weight: normal;
			font-size: 20px;
			color:#fff;
			font-weight: normal;
			font-style: normal;
		}
		.con6_2_1{
			width:596px;
			float:left;
			height:238px;
			background: url(home/images/index/con6_2.png) no-repeat center center;
		}
		.con6_2_2{
			width:294px;
			margin-top: 8px;
			float:left;
			height:235px;
			background: url(home/images/index/con6_3.png) no-repeat center center;
		}
		.con6_2_3{
			width:294px;
			height:235px;
			margin-top: 8px;
			float:right;
			background: url(home/images/index/con6_4.png) no-repeat center center;
		}
		.con6_2_1 div{
			width:250px;
			height:120px;
			margin:0 auto;
			margin-top: 59px;
			background:rgba(96,96,96,0.7);
			text-align: center;
		}
		.con6_2_1 div span,.con6_2_2 div span,.con6_2_3 div span{
			line-height: 120px;
			font-weight: normal;
			font-size: 20px;
			color:#fff;
			font-weight: normal;
			font-style: normal;
		}
		.con6_2_2 div,.con6_2_3 div{
			width:250px;
			height:120px;
			margin:0 auto;
			margin-top: 57px;
			background:rgba(96,96,96,0.7);
			text-align: center;
		}
		.z-con_7{
			width:1200px;
			height:550px;
			margin:0 auto;
			padding-top: 50px;
		}
		.zcon_7_1{
			width:1200px;
			height:270px;
			margin-top: 15px;
			background-color: #f5f5f5;
		}
		.zcon_7_2{
			width:1200px;
			height:156px;
			margin-top: 12px;
			background-color: #f5f5f5;
		}
		.zcon_7_1 ul{
			width:1200px;
			height:270px;
			margin:0;
			background-color:#FDFFFE;
			padding:0;			
		}
		.zcon7_li{
			overflow:hidden;
			height:270px;
			width:295px;
			background-color:#f5f5f5;
			float:left;
		}
		.zcon7_lil{
			overflow:hidden;
			width:295px;
			/*margin-left:6px;*/
			background-color:#f5f5f5;
			border-left:6px solid #fff;
			height:270px;
			float:left;
		}
		.zcon7_span1{
			width:296px;
			height:180px;
			display: block;
		}
		.zcon7_span1 img{
			width:100%;
			height:100%;
		}
		
		.zcon7_span_2{
			width:200px;
			height:75px;
			display:block;
			float:left;
			margin-top:10px;
			margin-left: 13px;
		}
		.zcon7_span_2 font{
			font-size: 18px;
			width:200px;
			font-weight: normal;
			color:#666;
			display: block;
			float:left;
			margin-top: 10px;
			float:left;
		}
		.zcon7_span_2 span{
			width:200px;
			display: block;
			font-size: 15px;
			margin-top: 10px;
			float:left;
			font-weight: normal;
			color:#666;
		}
		.zcon7_span_3{
			width:62px;
			height:62px;
			display:block;
			background:url(home/images/index/con7_span_1.png) no-repeat center center;
			float:right;
			margin-top:19px;
			margin-right: 10px;
		}
		.zcon7_span_4{
			width:62px;
			height:62px;
			display:block;
			background:url(home/images/index/con7_span_2.png) no-repeat center center;
			float:right;
			margin-top:9px;
			margin-right: 10px;
		}
		.zcon7_span_5{
			width:62px;
			height:62px;
			display:block;
			background:url(home/images/index/con7_span_3.png) no-repeat center center;
			float:right;
			margin-top:9px;
			margin-right: 10px;
		}
		.zcon7_span_6{
			width:62px;
			height:62px;
			display:block;
			background:url(home/images/index/con7_span_4.png) no-repeat center center;
			float:right;
			margin-top:9px;
			margin-right: 10px;
		}
		.zcon_7_2_divl{
			width:296px;
			height:156px;
			float:left;
		}
		.zcon_7_2_div{
			width:296px;
			height:156px;
			float:left;
			border-left:5px solid #fff;
		}
		.zcon_7_2_1{
			width:146px;
			height:156px;
			float:left;
		}
		.zcon_7_2_2{
			float:left;
			width:146px;
			height:156px;
			border-left:4px solid #fff;			
		}
		.zcon_7_img{
			width:95px;
			height:95px;
			margin-left:25.5px;
			margin-top:8px;
			border-radius: 999px;
			overflow: hidden;
			
		}
		.zcon_7_img img{
			/*width:100%;*/
			height:100%;
		}
		.zcon_7_2_zi{
			width:144px;
			height:52px;
			/* border:1px solid red; */
			text-align:center;
		}
		.zcon_7_2_zi span{
			font-weight: normal;
			font-size:15px;
			display: block;
			margin-top:15px;
			color:#333;
		}
.z-con3{width:1200px;height:550px;margin:0 auto;}
		.z-con3 ul{
			width:1200px;
			height:444px;
			display:block;
			margin-top:15px;
			background-color:#f5f5f5;
		}
		.zcon3_lil{
			width:394px;
			height:443px;
			display:block;
			float:left;
			overflow:hidden;
		}
		.zcon3_li{
			width:395px;
			height:443px;
			display:block;
			border-left: 8px solid #fff;
			float:left;
			overflow:hidden;
		}
		.z-con3 ul li img{
			width:100%;
			height:280px;
			float:left;
			display:block;
		}
		.z-con3 ul li div{
			float:left;
			width:392px;
			height:150px;
			display:block;
			margin-top:8px;
		}
		.z-con3 ul li a{
			display:block;
			font-weight:normal;
			font-style:normal;
			font-size:16px;
			color:#333;
			margin-top:12px;
			margin-left:15px;
		}
		.z-con3 ul li a:hover{
			color:red;
		}		
		.z-con_8{
			width:100%;
			/*height:850px;*/
			margin:0 auto;
			padding-top:50px;
		}
		.zcon8_1{
			width:100%;
			height:755px;
			background:url(home/images/index/con8.png) no-repeat center center;
			margin-top: 15px;

		}
		
		.zcon8_head{
			width:1200px;
			height:80px;
			margin:0 auto;
		}
		.zcon8_head1{
			width:268px;
			height:25px;
			border-bottom:3px solid #E12E32;
			margin:0 auto;
		}
		.zcon8_head2{
			width:1200px;
			height:55px;
			margin: 0 auto;
			text-align: center;
		}
		.zcon8_head2 span{
			height:55px;
			/*width:1100px;*/
			margin:0 auto;
			line-height: 55px;
			font-weight:600;
			font-size:20px;
			color:#3a3a3a;
			font-family: 'NSimSun', 'Hiragino Sans GB', 'Microsoft Yahei', '微软雅黑', Arial, sans-serif;
		}
		

		.zcon8_head2 span a:hover{
			color:#DF2F32;
		}
		.zcon8_centent{
			width:1200px;
			/*height:600px;*/
			margin:0 auto;
			margin-top: 8px;
		}
		.zcon8_centent_1{
			width:600px;
			height:80px;
			margin:0 auto;
			text-align:center;
		}
		.zcon8_centent_1 span{
			font-weight: 500;
			font-style: normal;
			font-size: 17px;
			color:#666;
			display:block;
		}
		.zcon8_centent_2{
			width:1200px;
			/*height:520px;*/
			margin:0 auto;
			margin-top: 5px;
		}
		.zcon8_img_1{
		width:234px;
		height:256px;
		overflow:hidden;
		float:left;
		position:relative;
		}
		.zcon8_img_2,.zcon8_img_3,.zcon8_img_4,.zcon8_img_5{
		width:234px;
		height:256px;
		overflow:hidden;
		float:left;
		margin-left:7px;
		position:relative;
		margin-bottom:7px;
		}
		.zcon8_img_6{
		width:234px;
		height:256px;
		position:relative;
		overflow:hidden;
		float:left;
		}
		.zcon8_img_7,.zcon8_img_8,.zcon8_img_9,.zcon8_img_10{
		width:234px;
		height:256px;
		position:relative;
		overflow:hidden;
		float:left;
		margin-left:7px;
		/*margin-bottom:5px;*/
		}
		.zcon8_centent_2 ul li img{
			width:236px;
			height:258px;
			position:absolute;
		}
		.zcon8_centent_2 ul li div{
			width:236px;
			height:258px;
			position:absolute;
			text-align: center;
		}
		.zcon8_centent_2 ul li span{
			line-height: 258px;
			font-weight: 600;
			font-style: normal;
			color:#DF2F32;
			/*position:absolute;*/
			font-family: 'NSimSun', 'Hiragino Sans GB', 'Microsoft Yahei', '微软雅黑', Arial, sans-serif;
			font-size: 22px;
		}

</style>
@endsection('css')

@section('content')
	<div id="index_1">
		<div id="index_1_1">
				<div class="bannerbox">

					<div class="Homebanner">
						<ul>
							<li class="Load cur" style="z-index:99">
								<img width="100%" src="{{ asset('home/lunpo/index/1.png') }}" alt="">

							</li>
							<li class="Load">
								<img width="100%" src="{{ asset('home/lunpo/index/1.png') }}" alt="">

							</li>
							<li class="Load"><img width="100%" src="{{ asset('home/lunpo/index/1.png') }}" alt="">

							</li>
						</ul>
						<div class="Homeleft"><</div>
						<div class="Homeright">></div>
						<div class="Homedot"><a href="javascript:;" class="cur">1</a><a href="javascript:;">2</a><a href="javascript:;">3</a></div>
					</div>
				    
				</div>
		</div>
		<div id="index_2">
		<div id="index_2_1">
			<div id="index_head">
				<ul>
					<li id="index_lil"><span class="dian">预约楼盘看房</span></li>
					<li id="index_li"><span  class="dian">装修快速报价</span></li>
				</ul>
			</div>
			<div id="indexnone">
				<span id="indexspan1">电话不能留空 !</span>
				<span id="indexspan2">电话有误 请从新填写 !</span>
				<span id="indexspan3">电话不能留空 !</span>
				<span id="indexspan4">电话有误 请从新填写 !</span>
			</div>
			<div id="index_1_1_2" class="kuai0">
				<div id="table_1">
					<label id="lblSelect">
					<select id="selectPointOfInterest" class="select" title="选择楼盘">
					<option value="浙商临港新天地">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;浙商.临港新天地</option>
					<option value="德福公元">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;德福公元</option>
					<option value="华富御景庄团">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;华富御景庄团</option>
					</select>
					</label>
				</div>
				<div id="table_2">
				    <div class="input_control">
				        <input type="text" class="form_input" placeholder="填写手机号码预约看房"/>
				    </div>
				</div>
				<div id="table_3">
				       <button id="button1">提交号码</button>    
				</div>
			</div>
			<div id="index_1_1_3" class="kuai1" style="display:none">
				<div id="table_2">
				    <div id="input_control">
				        <input type="text" class="form_input" placeholder="填写手机号码快速装修"/>
				    </div>
				</div>
				<div id="table_3">
				    	<button id="button2">提交号码</button>    
				</div>
			</div>
		</div>
	</div>
	</div>

		
	</div>

<!--中间内容-->
<div class="z-con">
    <div class="z-con1"><!--服务-->
	   <div class="z-con1-1">
	       <div class="z-con1-01"><b>省钱装修</b><p>全程6大免费服务</p></div>
		   <div class="z-con1-02"><b>免费预算报价</b><p>预算看不懂，我帮你</p></div>
		   <div class="z-con1-03"><b>全屋装修包</b><p>装修界的金点子</p></div>
		   <div class="z-con1-04"><b>装修分期贷</b><p>轻松装修不再愁</p></div>
	   </div>
	</div>

	<div class="z-con_4"> <!-- 楼盘推荐 -->
		<div class="head">
			<p class="head_1">Selling real estate</p>
			<b>楼盘推荐</b>	
			<p class="head_2">公司品质保障 &nbsp;放心服务 &nbsp;全程包忧</p>	
		</div>
		<ul>
			<li class="z-con_4_lil"> <a href="{{ url('/propertieszshx') }}"> <img  data-original="{{ asset('home/images/index/6.png') }}" alt=""> <span>浙商.临港新天地</span> </li></a>
			<li class="z-con_4_li"> <a href="{{ url('/propertiesdfhx') }}"><img  data-original="{{ asset('home/images/index/7.png') }}" alt=""> <span>德福公元</span> </li></a>
			<li class="z-con_4_li"> <a href="{{ url('/propertieshfhx') }}"><img  data-original="{{ asset('home/images/index/8.png') }}" alt=""> <span>华富.御景庄园</span> </li></a>
		</ul>
   	</div>
   	<div class="z-con_5"> <!-- 德系工艺品质保障 -->
   		<div class="head2">
			<p class="head_1_1">Decoration service process</p>
			<b>德系工艺品质保障</b>	
			<p class="head_2_2">公司品质保障 &nbsp;放心服务 &nbsp;全程包忧</p>	
		</div>
		<ul class="z-con_5_1">
			<li class="con_5_li1"><span class="con_5_span1"></span><span class="con_5_span_2">快速报价</span><span class="con_5_span_3"></span></li>
			<li class="con_5_li2"><span class="con_5_span2"></span><span class="con_5_span_2">线下体验</span><span class="con_5_span_4"></span></li>
			<li class="con_5_li3"><span class="con_5_span3"></span><span class="con_5_span_2">量房设计沟通</span><span class="con_5_span_6"></span></li>
			<li class="con_5_li4"><span class="con_5_span4"></span><span class="con_5_span_2">对比方案</span></li>
			<li class="con_5_li5"><span class="con_5_span5"></span><span class="con_5_span_2">签订合同</span><span class="con_5_span_3"></span></li>
			<li class="con_5_li6"><span class="con_5_span6"></span><span class="con_5_span_2">标准化施工</span><span class="con_5_span_5"></span></li>
			<li class="con_5_li7"><span class="con_5_span7"></span><span class="con_5_span_2">五星质检验收</span><span class="con_5_span_6"></span></li>
			<li class="con_5_li8"><span class="con_5_span8"></span><span class="con_5_span_2">金牌质保 售后无忧</span></li>
		</ul>
   	</div>
  	
  	<div class="z-con_6"> <!-- 装修套餐 -->
  		<div class="head">
			<p class="head_1">Decoration course</p>
			<b>装修软包</b>	
			<p class="head_2">公司品质保障 &nbsp;放心服务 &nbsp;全程包忧</p>	
		</div>
		<div class="con6_1">
			<a href="{{ url('/package/softroll') }}"><div class="con6_1_1"> <span>时尚包</span></div></a>
		</div>
		<div class="con6_2">
			<div class="con6_2_1">
				<a href="{{ url('/package/softroll') }}"><div> <span>新古典</span> </div></a>
			</div>
			<div class="con6_2_2"><a href="{{ url('/package/softroll') }}"><div> <span>现代</span> </div></a></div>
			<div class="con6_2_3"><a href="{{ url('/package/softroll') }}"><div> <span>美式</span> </div></a></div>
		</div>
  	</div>

  	<div class="z-con_7"> <!-- 真实案例 -->
  		<div class="head">
			<p class="head_1">Real case scen ario</p>
			<b>真实案例</b>	
			<p class="head_2">千家小区真实案例&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;装修心得随手粘来</p>	
		</div>
		@if(count($case) > 0 )
		<div class="zcon_7_1">
			<ul>	
				@foreach($case as $j => $h)
				<li @if( $loop->first ) class="zcon7_li" @else class="zcon7_lil" @endif>  <span class="zcon7_span1"><a href="{{ url('home/case/index/play') }}/{{ $h->id }}" target="_blank"><img  data-original="{{ asset('uploads/case/img/') }}/{{ $h->keting }}" alt=""></a></span>   <span class="zcon7_span_2"> <a href="{{ url('home/case/index/play') }}/{{ $h->id }}" target="_blank"><font>{{ $h->title }}</font></a><span>{{ $h->huxing }} {{ $h->fengge }} {{ $h->yusuan }}</span> </span>   <span class="zcon7_span_{{ $loop->index +3 }}"></span></li>
				@endforeach
						
			</ul>
		</div>
		@endif
		@if(count($case) > 0 )
		<div class="zcon_7_2">
			@foreach($case as $l => $m)
			<div @if($loop->first) class="zcon_7_2_divl" @else class="zcon_7_2_div" @endif>
				@foreach($m->eff as $n => $o)
				<div class="zcon_7_2_{{ $loop->index + 1 }}">
					<div class="zcon_7_img"><a href="{{ url('home/case/index/play') }}/{{ $m->id }}" target="_blank"><img  data-original="{{ asset('/uploads/case/img') }}/{{ $o }}" alt=""></a></div>
					<div class="zcon_7_2_zi"><span>{{ $n }}</span></div>
				</div>
				@endforeach
				<!-- <div class="zcon_7_2_2">
					<div class="zcon_7_img"><img src="{{ asset('/home/images/index/con7_2_img1.png') }}" alt=""></div>
					<div class="zcon_7_2_zi"><span>卧室</span></div>
				</div> -->
			</div>
			@endforeach
			
		</div>
		@endif
  	</div>

	<div class="z-con_8"> <!-- 装修工艺 -->
		 <div class="head">
			<p class="head_1">Decoration process</p>
			<b>装修工艺</b>	
			<p class="head_2">公司品质保障 &nbsp;放心服务 &nbsp;全程包忧</p>	
		</div>

		<div class="zcon8_1">
			<div class="zcon8_head">
				<div class="zcon8_head1">
					
				</div>
				<div class="zcon8_head2">
					@if( !empty($data) )
					@foreach($data as $k => $v)
						<span
					    @if ($loop->first)
					        
					    @else
							style="margin-left:8px;"
					    @endif
						><a href="{{ url('home/gongyi/list/') }}/{{ $v->id }}">{{ $v->title }}</a></span>
					@endforeach
					@endif					
				</div>
			</div>
			<div class="zcon8_centent">
				<div class="zcon8_centent_1">
					<span>统一着装形象,统一施工标准,严格执行公司施工规范。</span>
					<span>休息时间,停止噪音施工,防止扰民,我们将为业主提供最贴心的建议和服务。</span>
					<span>一切为了业主最完美的装修施工,并充分尊重业主意见。</span>
				</div>
				<div class="zcon8_centent_2">
					<ul>
					@if( !empty($data) )
					@foreach($data as $kk => $vv)
						<li id="con8" class="zcon8_img_{{ $kk + 1 }}"> <a href="{{ url('home/gongyi/list/') }}/{{ $vv->id }}" ><img  data-original="{{ asset('uploads/gongyi/img/') }}/{{ $vv->img }}" alt=""> <div style="display:none"><span>{{ $vv->title }}</span></div></a> </li>
					@endforeach
					@endif	
					</ul>
				</div>
			</div>
		</div>	
	</div> 





	<div class="z-con2"><!---建材选购-->
	    <div class="z-huoban-1"><p class="z-hb-1">Building materials</p><b>建材选购</b><p class="z-hb-2">国内外知名厂家直供&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;品质生活从心开始</p></div>
		<ul>
		   <li class="z-xg-lil"><img  data-original="{{asset('home/images/index/con2_1.png')}}" /></li>
		   <li class="z-xg-lil"><img  data-original="{{asset('home/images/index/con2_2.png')}}" /></li>
		   <li class="z-xg-lil"><img  data-original="{{asset('home/images/index/con2_3.png')}}" /></li>
		   <li class="z-xg-lir"><img  data-original="{{asset('home/images/index/con2_4.png')}}" /></li>
		   <li class="z-xg-lil"><img  data-original="{{asset('home/images/index/con2_5.png')}}" /></li>
		   <li class="z-xg-lil"><img  data-original="{{asset('home/images/index/con2_6.png')}}" /></li>
		   <li class="z-xg-lil"><img  data-original="{{asset('home/images/index/con2_7.png')}}" /></li>
		   <li class="z-xg-lir"><img  data-original="{{asset('home/images/index/con2_8.png')}}" /></li>
		   <li class="z-xg-lil"><img  data-original="{{asset('home/images/index/con2_9.png')}}" /></li>
		   <li class="z-xg-lil"><img  data-original="{{asset('home/images/index/con2_10.png')}}" /></li>
		   <li class="z-xg-lil"><img  data-original="{{asset('home/images/index/con2_11.png')}}" /></li>
		   <li class="z-xg-lir"><img  data-original="{{asset('home/images/index/con2_12.png')}}" /></li>
		</ul> 
	</div>
	<div class="z-con3"><!--知识-->
	    <div class="z-huoban-1"><p class="z-hb-1">Knowledge corner</p><b>知识学堂</b><p class="z-hb-2">零基础学装修&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;三分钟了解全屋装修</p></div>
		<ul>
		@if( isset($plate) && !empty($plate))
			@foreach($plate as $g => $h)
				<li 
				@if($loop->first)
				class="zcon3_lil"
				@else
				class="zcon3_li"
				@endif
				>
					<a href="{{ url('home/plate/list') }}/{{ $h->id }}"><img    data-original="{{ asset('/uploads/plate/img') }}/{{ $h->img }}" alt=""></a>
					<div>
						@if(!empty($h->news))
							@foreach($h->news as $gg => $hh)
								<a href="{{ url('home/plate/play/') }}/{{ $hh->id }}">{{ mb_substr($hh->title,0,22,'utf8') }}</a>
							@endforeach
						@endif
					</div>
				</li>
			@endforeach
		@endif

		</ul>
	</div>
	
	<div class="z-huoban"><!--合作伙伴-->
	    <div class="z-huoban-1"><p class="z-hb-1">Partner</p><b>合作伙伴</b><p class="z-hb-2">公司品质保障 &nbsp;放心服务 &nbsp;全程包忧</p></div>
		<ul>
		   <li class="z-hb-lil"><img  data-original="{{asset('home/images/index/hb_2.jpg')}}" /></li>
		   <li class="z-hb-lil"><img  data-original="{{asset('home/images/index/hb_3.jpg')}}" /></li>
		   <li class="z-hb-lil"><img  data-original="{{asset('home/images/index/hb_4.jpg')}}" /></li>
		   <li class="z-hb-lil"><img  data-original="{{asset('home/images/index/hb_1.jpg')}}" /></li>
		   <li class="z-hb-lir"><img  data-original="{{asset('home/images/index/z-hb.jpg')}}" /></li>
		   <li class="z-hb-lil"><img  data-original="{{asset('home/images/index/z-hb.jpg')}}" /></li>
		   <li class="z-hb-lil"><img  data-original="{{asset('home/images/index/z-hb.jpg')}}" /></li>
		   <li class="z-hb-lil"><img  data-original="{{asset('home/images/index/z-hb.jpg')}}" /></li>
		   <li class="z-hb-lil"><img  data-original="{{asset('home/images/index/z-hb.jpg')}}" /></li>
		   <li class="z-hb-lir"><img  data-original="{{asset('home/images/index/z-hb.jpg')}}" /></li>
		</ul>
	</div>
	
</div>
	<script>
		$("#button1").on('click',function(){
			var hu = $('.select option:selected').val();
			var phone = $('.form_input').eq(0).val();
			if(phone==''){
				$('#indexspan1').css('display','block')
				$('#indexspan2').css('display','none')
				return false;
			}
			var myreg = /^(((13[0-9]{1})|(15[0-9]{1})|(18[0-9]{1}))+\d{8})$/; 
		    if(!myreg.test(phone)) 
	       { 
				$('#indexspan1').css('display','none')
				$('#indexspan2').css('display','block')
	            return false; 
	       }
			 $.ajaxSetup({
		      headers: {
		      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		      }
		      
		      });

	       $.ajax('/home/loupanajax',{
	       		type:'post',
	       		//传递的参数
	       		data:{hu:hu,phone:phone},
	       		//返回成功的信息 data是后台返回的数据
	       		success:function(data){
	       			if(data ==1 ){
	       				$('.form_input').eq(0).val('');
	       				alert('预约成功！工作人员会尽快与您联系');
	       			}
	       			if(data ==2){
	       				alert('预约失败！你已经预约过了');
	       			}
	       			if(data ==3){
	       				alert('预约失败！请稍后再试');
	       			}
	       		},
	       		//错误信息
	       		error:function(data){
	       			alert('数据异常！请稍后再试');
	       		},
	       		dataType:'json'
	       }) 

			
		})
		
		$("#button2").on('click',function(){
			var phone = $('.form_input').eq(1).val();
			if(phone==''){
				$('#indexspan3').css('display','block')
				$('#indexspan4').css('display','none')
				return false;
			}
			var myreg = /^(((13[0-9]{1})|(15[0-9]{1})|(18[0-9]{1}))+\d{8})$/; 
		    if(!myreg.test(phone)) 
	       { 
				$('#indexspan3').css('display','none')
				$('#indexspan4').css('display','block')
	            return false; 
	       } 
	       $.ajaxSetup({
		      headers: {
		      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		      }
		      
		      });

	       $.ajax('/home/zhuangxiuajax',{
	       		type:'post',
	       		data:{phone:phone},
	       		success:function(data){
	       			if(data ==1 ){
	       				$('.form_input').eq(1).val('');
	       				alert('预约成功！工作人员会尽快与您联系');
	       			}
	       			if(data ==2){
	       				alert('预约失败！你已经预约过了');
	       			}
	       			if(data ==3){
	       				alert('预约失败！请稍后再试');
	       			}
	       		},
	       		error:function(data){
	       			alert('数据异常！请稍后再试');
	       		},
	       		dataType:'json'
	       }) 
			
		})



	$("#index_head>ul>li").on('click',function(){
			$('#indexspan1').css('display','none')
			$('#indexspan2').css('display','none')
			$('#indexspan3').css('display','none')
			$('#indexspan4').css('display','none')
		$.each($("#index_head>ul>li"),function(i,n){
			$(this).css('border-bottom','0px');
			$(this).attr('index',i);
		})
		$(this).css('border-bottom','2px solid #fff');
		var index = $(this).attr('index');
		$(".kuai0").css('display','none');
		$(".kuai1").css('display','none');
		$(".kuai"+index).css('display','block');
	});

		$(document).ready(function(){
		
		$(".index_btn li").hover(function(){
			$(this).find("div").stop(true).animate({top:-280},300);	 
		},function(){
			$(this).find("div").stop(true).animate({top:-0},300);
	});
	
});
$("#con8 a").hover(
  function () {
    var img = $(this).find('img');
    var div = $(this).find('div');
    img.css('opacity','0.5');
    div.css('display','block');
  },
  function () {
    var div = $(this).find('div');
    var img = $(this).find('img');
    div.css('display','none');
    img.css('opacity','1');
  }
);
	

		
	  $(function() {

      $("img").lazyload({effect: "fadeIn"});
      $("img").lazyload({ threshold :180});

  });
	</script>

<!-- <script src="{{ asset('home/lazyload/jquery.lazyload.js?v=1.9.1') }}"></script> -->
@endsection('content')