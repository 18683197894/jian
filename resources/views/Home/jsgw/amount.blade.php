@extends('heads')

@section('css')
<style>
	.am1,.am1 img{
		width:100%;
		height:648px;
	}
	.am2{
		width:100%;
		height:565px;
		background-color:#f5f5f5;
	}
	.am2_1{
		width:1200px;
		height:100px;
		text-align: center;
		margin:0 auto;
	}
	.am2_1_span1{
		font-size: 24px;
		color:#E12E18;
		display:block;
		font-weight: 500;
		padding-top: 30px;
	}
	.am2_1_span2{
		font-size: 17px;
		display:block;
		color:#979797;
		margin-top: 3px;
	}
	.am2_2{
		width:1200px;
		height:422px;
		margin:0 auto;
	}

	.am2_2li1{
		width:390px;
		height:333px;
		overflow:hidden;
		position: relative;
		float:left;
	}
	.am2_2li2{
		width:390px;
		height:333px;
		overflow:hidden;
		float:left;
		margin-left: 15px;
		position: relative;
	}
	.am2_2li2 img,.am2_2li1 img,{
		width:100%;
		height:100%;
		position: absolute;
		top:0px;
		left:0px;
		z-index: 100;
	}
	.am2_2li2 div,.am2_2li1 div{
		width:100%;
		height:100%;
		position: absolute;
		top:0px;
		left:0px;
		z-index: 101;
		background: rgba(0,0,0,0.3);
		display:none;
	}
	.am2_2li2 div span,.am2_2li1 span{
		margin:115px 35px 0px 35px;
		display:block;
		font-size: 18px;

		color:#fff;
		
		letter-spacing:2px;
	}
	.am2_2li3{
		width:392px;
		height:89px;
		overflow:hidden;
		text-align: center;
		background: url(home/images/amount/111.png) no-repeat center center;
		float:left;
	}
	.am2_2li4{
		width:395px;
		height:89px;
		overflow:hidden;
		float:left;
		margin-left: 11px;
		text-align: center;
		background: url(home/images/amount/111.png) no-repeat center center;
	}
	.am2_2li5{
		width:390px;
		height:89px;
		overflow:hidden;
		float:right;
		border-right:1px solid #fff;
		margin-left: 10px;
		text-align: center;
		background: url(home/images/amount/111.png) no-repeat center center;
	}
	.am2_span1{
	display:block;
	font-size: 18px;
	font-style: normal;
	font-weight: 500;
	color:#9A9A9A;
	margin-top: 23px;
	}
	.am2_span2{
	display:block;
	font-size: 17px;
	color:#9C9C9C;
	}
	.am3{
		width:100%;
		height:506px;
		background:url(home/images/amount/5.png) no-repeat center center;
	}
	.am3_1{
		width:1200px;
		height:115px;
		text-align: center;
		margin:0 auto;
	}
	.am3_span1{
		font-size: 23px;
		color:#fff;
		display:block;
		padding-top: 32px;
	}
	.am3_span2{
		font-size: 17px;
		color:#D9D8D6;
		display:block;
		padding-top: 2px;
	}
	.am3_span3{
		font-size: 17px;
		color:#D9D8D6;
		display:block;
	}
	.am3_ul{
		width:872px;
		height:250px;
		margin:0 auto;
		margin-top: 40px;
		overflow: hidden;
	}
	.am3_ul1{
		overflow: hidden;
		width:264px;
		height:250px;
		float:left;
	}
	.am3_ul2{
		overflow: hidden;
		width:264px;
		height:250px;
		margin-left:40px;
		float:left;
	}
	.am4{
		height:626px;
		width:100%;
		background-color:#fff;
	}
	.am4_con{
		width:1200px;
		height:626px;
		margin:0 auto;
	}
	.am4_left{
		width:210px;
		margin-top: 42px;
		height:482px;
		float:left;
		margin-left: 20px;
	}
	.am4_right{
		width:966px;
		height:482px;
		float:right;
		margin-top: 42px;
	}
	.am4_left span{
		font-size: 23px;
		font-style: normal;
		letter-spacing:5px;
		display: block;
		margin-top: 30px;
		color:#D92D2D;
		font-family: Helvetica, 'Hiragino Sans GB', 'Microsoft Yahei', '微软雅黑', Arial, sans-serif;
	}
	.am4_left_ul{
		width:200px;
		height:400px;
		margin-left: 5px;
		overflow: hidden;
		margin-top: 10px;
	}
	.am4_left_ul li{
		overflow: hidden;
		display:block;
		width:180px;
		height:50px;
		line-height: 50px;
		margin-top: 8px;
		font-size: 17px;
		letter-spacing:1px;
		font-family: "Arial","Microsoft YaHei","黑体","宋体",sans-serif;
		color:#939393;
		font-style: normal;cursor:pointer ;
	}
	.am4_right_li1{
		width:310px;
		height:530px;
		overflow: hidden;
		float:left;
		display: block;
	}
	.am4_right_li2{
		width:310px;
		height:530px;
		overflow: hidden;
		float:left;
		margin-left: 18px;
		display: block;
	}
	.am4_right_li2 img{
		width:310px;
		height:482px;
		float:left;	
	}
	.am4_right ul li div{
		width:310px;
		height:50px;
		text-align: center;
	}
	.am4_right ul li div span{
		line-height: 40px;
		font-size:17px;
		color:#666;
		font-style:normal;
		font-weight:normal;
	}
	.am5{
		width:100%;
		height:170px;
		background-color:#F5F5F5;
	}
	.am5_con{
		width:1200px;
		height:171px;
		margin:0 auto;
	}
	.am5_li1{
		width:392px;
		height:117px;
		overflow: hidden;
		background-color:#fff;
		margin-top: 27px;
		float:left;
	}
	.am5_li2{
		width:392px;
		height:117px;
		margin-top: 27px;
		overflow: hidden;
		background-color:#fff;
		float:left;
		margin-left: 12px;
	}
	.am5_li2 img,.am5_li1 img{
		width:92px;
		height:92px;
		line-height: 117px;
		margin-top:12.5px;
		margin-left:15px;
		float:left;
	}
	.am5_span1{
		width:150px;
		height:25px;
		display: block;
		line-height: 25px;
		font-size:18px;
		color:#49271B;
		margin-left: 15px;
		margin-top: 35px;
		float:left;
	}
	.am5_span2{
		width:150px;
		height:20px;
		display: block;
		float:left;		
		margin-left: 15px;
		font-size:15px;
		line-height: 20px;
		color:#4F4138;
	}
	.am5_con ul li button{
		width:85px;
		height:38px;
		background-color: #E02D33;
		border:none;
		border-radius: 6px;
		color:#fff;
		font-size: 18px;
		font-style: normal;
		float:right;
		margin-top: -20px;
		margin-right: 25px;cursor:pointer; 
	}
</style>
@endsection('css')

@section('content')
	<div class="am1">
		<img src="{{ asset('home/images/amount/1.png') }}" alt="">
	</div>
	<div class="am2">
		<div class="am2_1">
			<span class="am2_1_span1">为什么要设计量房？</span>
			<span class="am2_1_span2">准确测量 &nbsp;保证装修质量&nbsp;&nbsp;</span>
		</div>
		<div class="am2_2">
			<ul class="am2_ul1">
				<li class="am2_2li1"><img src="{{ asset('home/images/amount/2.png') }}" alt=""><div><span>准确测量房屋各空间的长、宽、高以及门、窗、空调等位置与尺寸数据、避免因尺寸不合而影响施工、保证后期装修质量与效率。</span></div></li>
				<li class="am2_2li2"><img src="{{ asset('home/images/amount/3.png') }}" alt=""><div><span>准确测量房屋各空间的长、宽、高以及门、窗、空调等位置与尺寸数据、避免因尺寸不合而影响施工、保证后期装修质量与效率。</span></div></li>
				<li class="am2_2li2"><img src="{{ asset('home/images/amount/4.png') }}" alt=""><div><span>准确测量房屋各空间的长、宽、高以及门、窗、空调等位置与尺寸数据、避免因尺寸不合而影响施工、保证后期装修质量与效率。</span></div></li>
			</ul>
			<ul class="am2_ul2">
				<li class="am2_2li3"><span class="am2_span1">精准测量-1</span><span class="am2_span2">Accurate measurement</span></li>
				<li class="am2_2li4"><span class="am2_span1">了解房屋-2</span><span class="am2_span2">Understand the house</span></li>
				<li class="am2_2li5"><span class="am2_span1">现场沟通-3</span><span class="am2_span2">On-site communication</span></li>
			</ul>
		</div>
	</div>
	<div class="am3">
		<div class="am3_1">
			<span class="am3_span1">获取专业户型设计方案</span>
			<span class="am3_span2">温馨提示:因部分路气管道与水路设施隐藏在底下，无法从表面进行测量 ; 承重墙体等从表面也难分</span>
			<span class="am3_span3">辨，量房前最好提供房屋建筑水电图和建筑结构图</span>
		</div>
		<ul class="am3_ul">
			<li class="am3_ul1"><img src="{{ asset('home/images/amount/6.jpg') }}" alt=""></li>
			<li class="am3_ul2"><img src="{{ asset('home/images/amount/7.jpg') }}" alt=""></li>
			<li class="am3_ul2"><img src="{{ asset('home/images/amount/8.jpg') }}" alt=""></li>
		</ul>
	</div>
	<div class="am4">
	<div class="am4_con">
		<div class="am4_left">
		
			<span>风格选择+</span>
			<ul class="am4_left_ul">
				<li style="color:#444;font-size:18px">现代简约风格</li>
				<li>地中海风格</li>
				<li>新中式风格</li>
				<li>美式风格</li>
				<li>港式风格</li>
				<li>北欧简约风格</li>
			</ul>
		</div>
		<div class="am4_right">
			<ul id="am4_index0" style="display:block">
				<li class="am4_right_li1"><img src="{{ asset('home/images/amount/9.png') }}" alt=""><div><span>110㎡清爽现代客厅装修1</span></div></li>
				<li class="am4_right_li2"><img src="{{ asset('home/images/amount/10.png') }}" alt=""><div><span>110㎡清爽现代客厅电视墙装修</span></div></li>
				<li class="am4_right_li2"><img src="{{ asset('home/images/amount/11.png') }}" alt=""><div><span>110㎡时尚现代客厅装修</span></div></li>
			</ul>
			<ul id="am4_index1" style="display:none">
				<li class="am4_right_li1"><img src="{{ asset('home/images/amount/9.png') }}" alt=""><div><span>110㎡清爽现代客厅装修2</span></div></li>
				<li class="am4_right_li2"><img src="{{ asset('home/images/amount/10.png') }}" alt=""><div><span>110㎡清爽现代客厅电视墙装修</span></div></li>
				<li class="am4_right_li2"><img src="{{ asset('home/images/amount/11.png') }}" alt=""><div><span>110㎡时尚现代客厅装修</span></div></li>
			</ul>
			<ul id="am4_index2" style="display:none">
				<li class="am4_right_li1"><img src="{{ asset('home/images/amount/9.png') }}" alt=""><div><span>110㎡清爽现代客厅装修3</span></div></li>
				<li class="am4_right_li2"><img src="{{ asset('home/images/amount/10.png') }}" alt=""><div><span>110㎡清爽现代客厅电视墙装修</span></div></li>
				<li class="am4_right_li2"><img src="{{ asset('home/images/amount/11.png') }}" alt=""><div><span>110㎡时尚现代客厅装修</span></div></li>
			</ul>
			<ul id="am4_index3" style="display:none">
				<li class="am4_right_li1"><img src="{{ asset('home/images/amount/9.png') }}" alt=""><div><span>110㎡清爽现代客厅装修4</span></div></li>
				<li class="am4_right_li2"><img src="{{ asset('home/images/amount/10.png') }}" alt=""><div><span>110㎡清爽现代客厅电视墙装修</span></div></li>
				<li class="am4_right_li2"><img src="{{ asset('home/images/amount/11.png') }}" alt=""><div><span>110㎡时尚现代客厅装修</span></div></li>
			</ul>
			<ul id="am4_index4" style="display:none">
				<li class="am4_right_li1"><img src="{{ asset('home/images/amount/9.png') }}" alt=""><div><span>110㎡清爽现代客厅装修5</span></div></li>
				<li class="am4_right_li2"><img src="{{ asset('home/images/amount/10.png') }}" alt=""><div><span>110㎡清爽现代客厅电视墙装修</span></div></li>
				<li class="am4_right_li2"><img src="{{ asset('home/images/amount/11.png') }}" alt=""><div><span>110㎡时尚现代客厅装修</span></div></li>
			</ul>
			<ul id="am4_index5" style="display:none">
				<li class="am4_right_li1"><img src="{{ asset('home/images/amount/9.png') }}" alt=""><div><span>110㎡清爽现代客厅装修6</div></li>
				<li class="am4_right_li2"><img src="{{ asset('home/images/amount/10.png') }}" alt=""><div><span>110㎡清爽现代客厅电视墙装修</span></div></li>
				<li class="am4_right_li2"><img src="{{ asset('home/images/amount/11.png') }}" alt=""><div><span>110㎡时尚现代客厅装修</span></div></li>
			</ul>
		</div>
	</div>
	</div>
	<div class="am5">
		<div class="am5_con">
			<ul>
				<li class="am5_li1"><img src="{{ asset('home/images/amount/12.png') }}" alt=""><span class="am5_span1">我家装修多少钱？</span><span class="am5_span2">20秒快速报价</span><a href="#"><button>快速报价</button></a></li>
				<li class="am5_li2"><img src="{{ asset('home/images/amount/13.png') }}" alt=""><span class="am5_span1">全国直营店查询</span><span class="am5_span2">坚持直营 传承品质</span><a href="#"><button>查直营店</button></a></li>
				<li class="am5_li2"><img src="{{ asset('home/images/amount/14.png') }}" alt=""><span class="am5_span1">预约到店体验</span><span class="am5_span2">先体现在装修很重要</span><a href="#"><button>快速预约</button></a></li>
			</ul>
		</div>
	</div>
	<script>
	$(".am4_left_ul > li").on('click',function(i,n){
		var index = $(this).index();
		$(".am4_left_ul >li").css('color','#939393');
		$(".am4_left_ul >li").css('font-size','17px');
		$(this).css('color','#444');
		$(this).css('font-size','18px');
		$(".am4_right>ul").css('display','none');
		$(".am4_right>ul").eq(index).css('display','block');

	})

	$(".am2_ul1 > li").hover(function () {
		$(this).find('div').css('display','block');
	},function () {
		$(this).find('div').css('display','none');
	});
	</script>
@endsection('content')