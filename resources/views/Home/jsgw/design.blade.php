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

		</ul>
	</div>
	<div id="dessj0" class="des3con" style=" {{ $id ==0 ? "display:block":"display:none" }}" >
		<ul>
			<div class="conli1"><img src="{{ asset('home/images/design/jian_7.jpg') }}" alt=""></div>
			<li class="conli2"><img src="{{ asset('home/images/design/jian_2.jpg') }}" alt=""><span>餐厅</span><div></div></li>
			<li class="conli2"><img src="{{ asset('home/images/design/jian_3.jpg') }}" alt=""><span>卧室</span><div></div></li>
			<li class="conli2"><img src="{{ asset('home/images/design/jian_1.jpg') }}" alt=""><span>卧室</span><div></div></li>
			<li class="conli3"><img src="{{ asset('home/images/design/jian_4.jpg') }}" alt=""><span>浴室</span><div></div></li>
			<li class="conli3"><img src="{{ asset('home/images/design/jian_5.jpg') }}" alt=""><span>儿童房</span><div></div></li>
			<li class="conli3"><img src="{{ asset('home/images/design/jian_6.jpg') }}" alt=""><span>电视机墙</span><div></div></li>
		</ul>
	</div>
	<div id="dessj1" class="des3con" style=" {{ $id ==1 ? "display:block":"display:none" }}">
		<ul>
			<div class="conli1"><img src="{{ asset('home/images/design/xian_4.jpg') }}" alt=""></div>
			<li class="conli2"><img src="{{ asset('home/images/design/xian_1.jpg') }}" alt=""><span>客厅</span><div></div></li>
			<li class="conli2"><img src="{{ asset('home/images/design/xian_2.jpg') }}" alt=""><span>厨房</span><div></div></li>
			<li class="conli2"><img src="{{ asset('home/images/design/xian_3.jpg') }}" alt=""><span>餐厅</span><div></div></li>
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