@extends('heads')
@section('css')



	
<link href="{{ asset('home/images/case/index/common.css') }}" rel="stylesheet" type="text/css" />


@endsection('css')

@section('content')
	<div class="case1">
		<ul>
			<li><a href="{{ asset('home/case/index') }}" class="border">完整案例</a></li>
			<li><a href="{{ asset('home/case/zaiindex') }}">在建案例</a></li>
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
				id="color" index="1"
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
				id="color" index="1"
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
				id="color" index="1"
				@endif 
				  >{{$vvvv}}</li>
				
			@endforeach
			</ul>
		</div>
	</div>
	<div class="case3">
		<div class="case3head">
			<span>完整案列共找到 {{ $count }} 个</span>
		</div>
		@if(count($data) >0 )
		<ul>
		
			
			@foreach( $data as $k => $v)
			
			<li 
			@if( is_int($loop->index /4) )
			class="caseli1"
			@else
			class="caseli2"
			@endif		
			><a href="{{ url('home/case/index/play') }}/{{ $v->id }}" target="_blank"><img src="{{ asset('uploads/case/img/') }}/{{ $v->effect2 }}" alt=""></a>
			<div>
				<a href="{{ url('home/case/index/play') }}/{{ $v->id }}" target="_blank"><title>{{ $v->title }}</title></a>
				<span>{{ $v->huxing }}</span><span>{{ $v->fengge }}</span><span>{{ $v->yusuan }}</span>
			</div>
			</li>
			
			@endforeach
		
		</ul>
		@endif
		
		@if( count($tui) > 0)
		<ul>
		
			<span class="span">其他案例推荐</span><br>
			@foreach( $tui as $kk => $vv)
			
			<li 
			@if( is_int($loop->index /4) )
			class="caseli1"
			@else
			class="caseli2"
			@endif		
			><a href="{{ url('home/case/index/play') }}/{{ $vv->id }}" target="view_window"><img src="{{ asset('uploads/case/img/') }}/{{ $vv->effect2 }}" alt=""></a>
			<div>
			<a href="{{ url('home/case/index/play') }}/{{ $vv->id }}" target="view_window"><title>{{ $vv->title }}</title></a>
			<span>{{ $vv->huxing }}</span><span>{{ $vv->fengge }}</span><span>{{ $vv->yusuan }}</span></div>
			</li>
			
			@endforeach
		
		</ul>
		@endif
	</div>
		
		<div class="page">
			{{ $data->links() }}
		</div>
		
		

@endsection('content')

@section('js')
	<script src="{{ asset('home/images/case/index/common.js') }}"></script>

	
@endsection('js')