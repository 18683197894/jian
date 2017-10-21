@extends('heads')
@section('css')


<link href="{{ asset('home/images/case/zaiindex/common.css') }}" rel="stylesheet" type="text/css" />

@endsection('css')

@section('content')
	<div class="case1">
		<ul>
			<li><a href="{{ asset('home/case/index') }}">完整案例</a></li>
			<li><a href="{{ asset('home/case/zaiindex') }}" class="border">在建案例</a></li>
		</ul>
	</div>
	<div class="case2">
		
		<div class="left">
			<ul>
				<li class="li1">户型</li>
				<li class="li2">风格</li>
				<li class="li1">预算</li>
			</ul>
		</div>
		
		<div class="right">
			
			<ul class="rightul1" index="ip1">
			@foreach($arr1 as $kk => $vv)
				<li 
				@if($loop->first)
				class="rightli1_1"
				@else
				class="rightli1_2"
				@endif
				@if($vv == $ip1)
				id="color" index=1
				@endif 

				  >{{$vv}}</li>
				
			@endforeach
			</ul>
			
			<ul class="rightul2" index="ip2">
			@foreach($arr2 as $kkk => $vvv)
				<li 
				@if($loop->first || $loop->index == 16)
				class="rightli2_1"
				@else
				class="rightli2_2"
				@endif
				@if($vvv == $ip2)
				id="color" index=1
				@endif 
				  >{{$vvv}}
				  </li>
				
			@endforeach
			
			</ul>

			<ul class="rightul3" index="ip3">
			@foreach($arr3 as $kkkk => $vvvv)
				<li 
				@if($loop->first)
				class="rightli1_1"
				@else
				class="rightli1_2"
				@endif
				@if($vvvv == $ip3)
				id="color" index=1
				@endif 
				  >{{$vvvv}}</li>
				
			@endforeach
			</ul>
		</div>
	</div>
	<div class="case3">
		<div class="case3head">
			<span>在建案列共找到 {{ $count }} 个</span>
		</div>
		<div class="divdiv">
		@if( count($data) > 0 )
		@foreach($data as $k => $v )
		
		<div class="case3con">
			<div class="casecon">
				<a href="{{ url('home/case/zaiindex/play') }}/{{ $v->id }}" target="_blank"><img src="{{ asset('uploads/case/img/') }}/{{ $v->effect2 }}" alt=""></a>
				<div class="conright">
					<a href="{{ url('home/case/zaiindex/play') }}/{{ $v->id }}" target="_blank"><title>{{ $v->title }}</title></a>
					<div class="con_span">
						<span class="conspan1">{{ $v->huxing }}</span><span class="conspan2">{{ $v->fengge }}</span><span class="conspan2">{{ $v->yusuan }}</span>
					</div>
					<ul class="con_con">
						<li id="con_li1">
							<em @if($v->or >= 1) style="border:2px solid #00AF62" @endif></em>
							<span @if($v->or >= 1) style="color:#00AF62" @endif>准备开工</span>
						</li>
						<li id="con_li2">
							<em @if($v->or >= 2) style="border:2px solid #00AF62" @endif></em>
							<span @if($v->or >= 2) style="color:#00AF62" @endif>水电阶段</span>
						</li>
						<li id="con_li3">
							<em @if($v->or >= 3) style="border:2px solid #00AF62" @endif></em>
							<span @if($v->or >= 3) style="color:#00AF62" @endif>瓦木阶段</span>
						</li>
						<li id="con_li4">
							<em @if($v->or >= 4) style="border:2px solid #00AF62" @endif></em>
							<span @if($v->or >= 4) style="color:#00AF62" @endif>油漆阶段</span>
						</li>
						<li id="con_li5">
							<em @if($v->or >= 5) style="border:2px solid #00AF62" @endif></em>
							<span @if($v->or >= 5) style="color:#00AF62" @endif>竣工阶段</span>
						</li>
					</ul>
				</div>
			</div>
		</div>
		@endforeach
		@endif
		
		@if(count($tui) > 0)
		<span class="span">其他案例推荐</span><br>
		@foreach($tui as $kk => $vv )
		<div class="case3con">
			<div class="casecon">
				<a href="{{ url('home/case/zaiindex/play') }}/{{ $vv->id }}" target="_blank"><img src="{{ asset('uploads/case/img/') }}/{{ $vv->effect2 }}" alt=""></a>
				<div class="conright">
					<a href="{{ url('home/case/zaiindex/play') }}/{{ $vv->id }}" target="_blank"><title>{{ $vv->title }}</title></a>
					<div class="con_span">
						<span class="conspan1">{{ $vv->huxing }}</span><span class="conspan2">{{ $vv->fengge }}</span><span class="conspan2">{{ $vv->yusuan }}</span>
					</div>
					<ul class="con_con">
						<li>
							<em @if($vv->or >= 1) style="border:2px solid #00AF62" @endif></em>
							<span @if($vv->or >= 1) style="color:#00AF62" @endif>准备开工</span>
						</li>
						<li>
							<em @if($vv->or >= 2) style="border:2px solid #00AF62" @endif></em>
							<span @if($vv->or >= 2) style="color:#00AF62" @endif>水电阶段</span>
						</li>
						<li>
							<em @if($vv->or >= 3) style="border:2px solid #00AF62" @endif></em>
							<span @if($vv->or >= 3) style="color:#00AF62" @endif>瓦木阶段</span>
						</li>
						<li>
							<em @if($vv->or >= 4) style="border:2px solid #00AF62" @endif></em>
							<span @if($vv->or >= 4) style="color:#00AF62" @endif>油漆阶段</span>
						</li>
						<li>
							<em @if($vv->or >= 5) style="border:2px solid #00AF62" @endif></em>
							<span @if($vv->or >= 5) style="color:#00AF62" @endif>竣工阶段</span>
						</li>
					</ul>
				</div>
			</div>
		</div>
		@endforeach
		@endif
		
		</div>
		@if($count > $data->count() )
		<div class="dian" count="{{ $count }}" num="{{ $data->count() }}">
			<button class="button1">点击加载更多</button>
			<button class="button2" style="display:none">暂无更多内容</button>
		</div>
		@endif
	</div>
		
		
		
		

@endsection('content')

@section('js')
	<script src="{{ asset('home/images/case/zaiindex/common.js') }}"></script>
	
@endsection('js')