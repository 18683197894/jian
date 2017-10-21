@extends('heads')

@section('css')
	<link rel="stylesheet" href="{{ asset('home/images/design/common.css') }}">
	
@endsection('css')

@section('content')
<div class="des1">
	<img src="{{ asset('home/images/design/banner.png') }}" alt="">
</div>
<div class="des2">
	<div class="des2_1">
		<div class="pic_1">
			<img  src="{{ asset('home/images/design/2.png') }}" alt="">
			
		</div>
		<div class="pic_2">
			<img src="{{ asset('home/images/design/3.png') }}" alt="">
			
		</div>
		<div class="pic_3">
			<img src="{{ asset('home/images/design/5.png') }}" alt="">
			
		</div>
		<div class="pic_4">
			<img src="{{ asset('home/images/design/4.png') }}" alt="">
			
		</div>
		<div class="pic_5">
			<img src="{{ asset('home/images/design/6.png') }}" alt="">
			
		</div>
	</div>
</div>
<div class="des3">
	<div class="des3nva">
		<ul class="desnvaul">
		@foreach($dess as $k => $v)
			<li index="{{ $loop->index }}" class="{{ $loop->index == $id?"color":"" }}">{{ $v }}</li>
		@endforeach
<!--  			<li index="0" {{ $id ==0 ? "class=color":"" }} >简欧设计</li>
			<li index="1" {{ $id ==1 ? "class=color":"" }} >现代设计</li>
			<li index="2" {{ $id ==2 ? "class=color":"" }} >地中海设计</li>
			<li index="3" {{ $id ==3 ? "class=color":"" }} >中式设计</li>
			<li index="4" {{ $id ==4 ? "class=color":"" }} >美式设计</li>
			<li index="5" {{ $id ==5 ? "class=color":"" }} >田园设计</li> -->
		</ul>
	</div>
	<div id="dessj0" class="des3con" style=" {{ $id ==0 ? "display:block":"display:none" }}" >
		<ul>
			<div class="conli1"><img src="{{ asset('home/images/design/7.png') }}" alt=""></div>
			<li class="conli2"><img src="{{ asset('home/images/design/8.png') }}" alt=""><span>111</span><div></div></li>
			<li class="conli2"><img src="{{ asset('home/images/design/9.png') }}" alt=""><span>洗手间</span><div></div></li>
			<li class="conli2"><img src="{{ asset('home/images/design/10.png') }}" alt=""><span>客厅</span><div></div></li>
			<li class="conli3"><img src="{{ asset('home/images/design/11.png') }}" alt=""><span>阳台</span><div></div></li>
			<li class="conli3"><img src="{{ asset('home/images/design/12.png') }}" alt=""><span>书房</span><div></div></li>
			<li class="conli3"><img src="{{ asset('home/images/design/13.png') }}" alt=""><span>婴儿房</span><div></div></li>
		</ul>
	</div>
	<div id="dessj1" class="des3con" style=" {{ $id ==1 ? "display:block":"display:none" }}">
		<ul>
			<div class="conli1"><img src="{{ asset('home/images/design/7.png') }}" alt=""></div>
			<li class="conli2"><img src="{{ asset('home/images/design/8.png') }}" alt=""><span>厨22房</span><div></div></li>
			<li class="conli2"><img src="{{ asset('home/images/design/9.png') }}" alt=""><span>洗手间</span><div></div></li>
			<li class="conli2"><img src="{{ asset('home/images/design/10.png') }}" alt=""><span>客厅</span><div></div></li>
			<li class="conli3"><img src="{{ asset('home/images/design/11.png') }}" alt=""><span>阳台</span><div></div></li>
			<li class="conli3"><img src="{{ asset('home/images/design/12.png') }}" alt=""><span>书房</span><div></div></li>
			<li class="conli3"><img src="{{ asset('home/images/design/13.png') }}" alt=""><span>婴儿房+</span><div></div></li>
		</ul>
	</div>
	<div id="dessj2" class="des3con" style=" {{ $id ==2 ? "display:block":"display:none" }}">
		<ul>
			<div class="conli1"><img src="{{ asset('home/images/design/7.png') }}" alt=""></div>
			<li class="conli2"><img src="{{ asset('home/images/design/8.png') }}" alt=""><span>厨33房</span><div></div></li>
			<li class="conli2"><img src="{{ asset('home/images/design/9.png') }}" alt=""><span>洗手间</span><div></div></li>
			<li class="conli2"><img src="{{ asset('home/images/design/10.png') }}" alt=""><span>客厅</span><div></div></li>
			<li class="conli3"><img src="{{ asset('home/images/design/11.png') }}" alt=""><span>阳台</span><div></div></li>
			<li class="conli3"><img src="{{ asset('home/images/design/12.png') }}" alt=""><span>书房</span><div></div></li>
			<li class="conli3"><img src="{{ asset('home/images/design/13.png') }}" alt=""><span>婴儿房</span><div></div></li>
		</ul>
	</div>
	<div id="dessj3" class="des3con" style=" {{ $id ==3 ? "display:block":"display:none" }}">
		<ul>
			<div class="conli1"><img src="{{ asset('home/images/design/7.png') }}" alt=""></div>
			<li class="conli2"><img src="{{ asset('home/images/design/8.png') }}" alt=""><span>厨44房</span><div></div></li>
			<li class="conli2"><img src="{{ asset('home/images/design/9.png') }}" alt=""><span>洗手间</span><div></div></li>
			<li class="conli2"><img src="{{ asset('home/images/design/10.png') }}" alt=""><span>客厅</span><div></div></li>
			<li class="conli3"><img src="{{ asset('home/images/design/11.png') }}" alt=""><span>阳台</span><div></div></li>
			<li class="conli3"><img src="{{ asset('home/images/design/12.png') }}" alt=""><span>书房</span><div></div></li>
			<li class="conli3"><img src="{{ asset('home/images/design/13.png') }}" alt=""><span>婴儿房</span><div></div></li>
		</ul>
	</div>
	<div id="dessj4" class="des3con" style=" {{ $id ==4 ? "display:block":"display:none" }}">
		<ul>
			<div class="conli1"><img src="{{ asset('home/images/design/7.png') }}" alt=""></div>
			<li class="conli2"><img src="{{ asset('home/images/design/8.png') }}" alt=""><span>厨55房</span><div></div></li>
			<li class="conli2"><img src="{{ asset('home/images/design/9.png') }}" alt=""><span>洗手间</span><div></div></li>
			<li class="conli2"><img src="{{ asset('home/images/design/10.png') }}" alt=""><span>客厅</span><div></div></li>
			<li class="conli3"><img src="{{ asset('home/images/design/11.png') }}" alt=""><span>阳台</span><div></div></li>
			<li class="conli3"><img src="{{ asset('home/images/design/12.png') }}" alt=""><span>书房</span><div></div></li>
			<li class="conli3"><img src="{{ asset('home/images/design/13.png') }}" alt=""><span>婴儿房</span><div></div></li>
		</ul>
	</div>
	<div id="dessj5" class="des3con" style=" {{ $id ==5 ? "display:block":"display:none" }}">
		<ul>
			<div class="conli1"><img src="{{ asset('home/images/design/7.png') }}" alt=""></div>
			<li class="conli2"><img src="{{ asset('home/images/design/8.png') }}" alt=""><span>厨66房</span><div></div></li>
			<li class="conli2"><img src="{{ asset('home/images/design/9.png') }}" alt=""><span>洗手间</span><div></div></li>
			<li class="conli2"><img src="{{ asset('home/images/design/10.png') }}" alt=""><span>客厅</span><div></div></li>
			<li class="conli3"><img src="{{ asset('home/images/design/11.png') }}" alt=""><span>阳台</span><div></div></li>
			<li class="conli3"><img src="{{ asset('home/images/design/12.png') }}" alt=""><span>书房</span><div></div></li>
			<li class="conli3"><img src="{{ asset('home/images/design/13.png') }}" alt=""><span>婴儿房</span><div></div></li>
		</ul>
	</div>

</div>


<script src="{{ asset('home/images/design/common.js') }}"></script>

@endsection('content')