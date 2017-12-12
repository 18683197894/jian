@extends('heads')
	<script src="{{ asset('/js/jquery-1.8.3.min.js') }}"></script>
	<link href="{{ asset('/home/lunpo/css/style.css') }}" rel="stylesheet" />
<script type="text/javascript" src="{{ asset('/home/lunpo/js/startMove.js') }}"></script>
@section('css')
	<link href="{{ asset('/home/images/hfnewslist/common.css') }}" rel="stylesheet" />

@endsection('css')
@section('content')
	<!-- *************** -->
	<div id="content">
		<div id="content_img_1">
			<div id="content_1">
				<div id="box">

	<ul id="pic_list">
		<li style="z-index:2;opacity:1;fliter:alpha(opacity=100);">
        <a href="#"><img width="750" height="430" src="{{ asset('/home/images/hfhx/2.png')}}" alt="" /></a></li>
		<li><a href="#"><img width="750" height="430" src="{{ asset('/home/images/hfhx/3.png')}}" alt="" /></a></li>
	</ul>
	
	<!-- <div class="mark"></div> -->

	<ul id="text_list">
		<li><h2 class="show"><a href="#"></a></h2></li>
		<li><h2></h2></li>
	</ul>
	
	<div id="ico_list">
		<ul>
			<li class="active"><a href="javascript:void(0)"><img width="64" height="40" src="{{ asset('/home/images/hfhx/2.png')}}" alt="" /></a></li>
			<li><a href="javascript:void(0)"><img width="64" height="40" src="{{ asset('/home/images/hfhx/3.png')}}" alt="" /></a></li>
		</ul>
	</div>
	
	<a style="display:none" href="javascript:void(0)" id="btn_prev" class="btn"></a>
	<a style="display:none" href="javascript:void(0)" id="btn_next" class="btn showBtn"></a>

				</div>
				<div id="content_1_2">
					<div id="content_1_2_1">
						<p id="p1">织金.织金万都铭城</p>
						<p id="p2">贵州-毕节</p>
					<div id="nve">
					
						<div id="nve_1" >商业区</div>		
						<div id="nve_2">低密度</div>		
						<div id="nve_3">改善盘</div>		
					
					</div>
					<div style="padding-top:20px;">
					<span style="color:#c6c6c6;font-size:13px;">楼盘均价</span>
					<span style="font-size:24px;color:red;font-weight:600">3800/m²</span>
					<span style="color:#c6c6c6;font-size:13px">(2017年参考价)</span>
					</div>
					</div>
					<div id="content_1_2_2">
					<div style="padding-top:20px">
						<span style="font-size:15px;color:#848484">开盘时间:&nbsp;<!-- 2016年6月18日 --></span>
					</div>
					<div style="padding-top:12px">
						<span style="font-size:15px;color:#848484">入住时间:&nbsp;<!-- 2017年 --></span>
					</div>
					<div style="padding-top:12px">
						<span style="font-size:15px;color:#848484">物业类型:&nbsp;商铺 住宅</span>
					</div>
					<div style="padding-top:12px;position: relative;">
						<span style="font-size:15px;color:#848484">楼盘地址:&nbsp;织金县金北大道与环城路交叉口</span>
						<!-- <div style="position: absolute;right:25px;bottom:6px" class="pin icon"></div> -->
					</div>
	
					
						
					</div>
					<div id="content_1_2_3">
						<div id="dian1">
							<img style="margin-top:5px;margin-left:6px" src="{{ asset('/home/images/dian.gif') }}" alt="">
						</div>
						<div id="dian2">
							<span style="font-size:16px;color:red;font-weight:600">400-188-6585&nbsp;&nbsp;咨询楼盘信息</span>
						</div>
					</div>
				</div>

			</div>
		</div>

	</div>	

	<div id="content_7" style="margin-top:0px;">
			<div id="content_7_1">
				<div id="content_2_1_1">
					<div id="content_2_1_1_1">
						<div id="content_2_1_1_1_1">
							<div style="height:20px;margin-top:10px;">
							<span style="font-size:19px;font-weight:600;color:#4b4b4b;padding:0 8px 0px 8px"> &nbsp;新闻动态</span>	
							</div>
						</div>
						<div id="content_2_1_1_1_2">
							<div style="height:20px;margin-top:11px">
							<span style="font-size:18px;font-weight:600;color:#474747;display:block;"> &nbsp;<a href="{{ url('/propertieshfhx/') }}">返回</a></span>			
							</div>
						</div>
					</div>
				</div>

				<div id="content_7_1_2">
					@if(!empty($data))
					@foreach($data as $k => $v)
					<div class="content_7_1_2_div">
						<ul>
							<li style="display:block">{{ $v->pidname }}</li>
							<li @if( $v->click >= 500 ) style="display:block" @else style="display:none" @endif>热门点击</li>
							<li @if( time() - $v->time < 259200) style="display:block" @else style="display:none" @endif>最新新闻</li>
						</ul>
						
						<div class="content_7_1_2_right">
							<a href="{{ url('/propertieshfhx/newslist/play/')}}/{{ $v->id }}"><title>{{ $v->title }}</title></a>
							<span>{{ $v->leicon }}<a href="{{ url('/propertieshfhx/newslist/play/')}}/{{ $v->id }}"><em>【详情】</em></a></span>
						</div>
					</div>
					@endforeach
					@endif
				</div>
				
				<div class="dian" count="" num="=">
					<!-- <button class="button1">点击加载更多</button> -->
					<!-- <button class="button2" style="display:none">暂无更多内容</button> -->
					{{ $data->links() }}
				</div>

			</div>
		</div>
			



	<script src="{{ asset('home/images/dfhx/common.js') }}"></script>

@endsection('content')