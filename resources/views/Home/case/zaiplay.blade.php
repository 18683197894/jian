@extends('heads')

@section('css')
<link href="{{ asset('home/images/case/zaiindex/zaiplay.css') }}" rel="stylesheet" type="text/css" />

@endsection('css')

@section('content')
	<div class="zaiplay1">
	<div class="zaiplay1head">
			<span>当前位置：&nbsp;<a href="{{ url('/') }}">首页</a> > <a href="{{ url('home/case/zaiindex') }}">在建案例</a> > 案例详情</span>
		</div>
		<div class="case3con">
			<div class="casecon">
				<img  data-original="{{ asset('uploads/case/img/') }}/{{ $data->effect2 }}" alt="">
				<div class="conright">
					<title>{{ $data->title }}</title>
					<div class="con_span">
						<a href="{{ url('home/case/zaiplay/zaiurl') }}?c=pi1&a={{ $data->huxing }}"><span class="conspan1">{{ $data->huxing }}</span></a><a href="{{ url('home/case/zaiplay/zaiurl') }}?c=pi2&a={{ $data->fengge }}"><span class="conspan2">{{ $data->fengge }}</span></a><a href="{{ url('home/case/zaiplay/zaiurl') }}?c=pi3&a={{ $data->yusuan }}"><span class="conspan2">{{ $data->yusuan }}</span></a>
					</div>
					<ul class="con_con">
						<li id="con_li1">
							<em @if($data->or >= 1) style="border:2px solid #00AF62" @endif></em>
							<span @if($data->or >= 1) style="color:#00AF62" @endif>准备开工</span>
						</li>
						<li id="con_li2">
							<em @if($data->or >= 2) style="border:2px solid #00AF62" @endif></em>
							<span @if($data->or >= 2) style="color:#00AF62" @endif>水电阶段</span>
						</li>
						<li id="con_li3">
							<em @if($data->or >= 3) style="border:2px solid #00AF62" @endif></em>
							<span @if($data->or >= 3) style="color:#00AF62" @endif>瓦木阶段</span>
						</li>
						<li id="con_li4">
							<em @if($data->or >= 4) style="border:2px solid #00AF62" @endif></em>
							<span @if($data->or >= 4) style="color:#00AF62" @endif>油漆阶段</span>
						</li>
						<li id="con_li5">
							<em @if($data->or >= 5) style="border:2px solid #00AF62" @endif></em>
							<span @if($data->or >= 5) style="color:#00AF62" @endif>竣工阶段</span>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="zaiplaycon2">
		<div class="caseplaycon2_head">
			<span>施工流程</span>
		</div>
			<div class="caseplaycon2_con">
					@if( $data->img1 !=null )
					<div class="caseplaycon2_con_div">
						<em><span>准备开工</span></em>
						<ul>
							@foreach($data->img1 as $kkk => $vvv)
							<li><a href="{{ asset('/uploads/case/img') }}/{{ $vvv }}" target="_blank"><img  data-original="{{ asset('/uploads/case/img') }}/{{ $vvv }}" alt=""></a></li>
							@endforeach
						</ul>
						<div style="clear:both"></div>
					</div>
					@endif
					@if( $data->img2 !=null )
					<div class="caseplaycon2_con_div">
						<em><span>水电阶段</span></em>
						<ul>
							@foreach($data->img2 as $kkkk => $vvvv)
							<li><a href="{{ asset('/uploads/case/img') }}/{{ $vvvv }}"  target="_blank"><img  data-original="{{ asset('/uploads/case/img') }}/{{ $vvvv }}" alt=""></a></li>
							@endforeach
						</ul>
						<div style="clear:both"></div>
					</div>
					@endif
					@if( $data->img3 !=null )
					<div class="caseplaycon2_con_div">
						<em><span>泥木阶段</span></em>
						<ul>
							@foreach($data->img3 as $j => $k)
							<li><a href="{{ asset('/uploads/case/img') }}/{{ $k }}" target="_blank"><img  data-original="{{ asset('/uploads/case/img') }}/{{ $k }}" alt=""></a></li>
							@endforeach
						</ul>
						<div style="clear:both"></div>
					</div>
					@endif
					@if( $data->img4 !=null )
					<div class="caseplaycon2_con_div">
						<em><span>油漆阶段</span></em>
						<ul>
							@foreach($data->img4 as $h => $l)
							<li><a href="{{ asset('/uploads/case/img') }}/{{ $l }}" target="_blank"><img  data-original="{{ asset('/uploads/case/img') }}/{{ $l }}" alt=""></a></li>
							@endforeach
						</ul>
						<div style="clear:both"></div>
					</div>
					@endif
				</div>
	</div>
@endsection('content')

@section('js')
<script>
			$(function() {
      		$("img").lazyload({effect: "fadeIn"});
     		 $("img").lazyload({ threshold :180});
			});
</script>
@endsection('js')
