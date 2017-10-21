@extends('heads')

@section('css')
	<link rel="stylesheet" href="{{ asset('home/images/amount/common.css') }}">
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
<script src="{{ asset('home/images/amount/common.js') }}"></script>
@endsection('content')