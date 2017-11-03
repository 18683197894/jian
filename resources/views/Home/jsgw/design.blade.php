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
			<div class="conli1"><img src="{{ asset('home/images/design/jian_3.jpg') }}" alt=""></div>
			<li class="conli2"><img src="{{ asset('home/images/design/jian_5.jpg') }}" alt=""><span>床</span><div></div></li>
			<li class="conli2"><img src="{{ asset('home/images/design/jian_1.jpg') }}" alt=""><span>衣柜</span><div></div></li>
			<li class="conli2"><img src="{{ asset('home/images/design/jian_7.jpg') }}" alt=""><span>卧室</span><div></div></li>
			<li class="conli3"><img src="{{ asset('home/images/design/jian_2.jpg') }}" alt=""><span>卧室</span><div></div></li>
			<li class="conli3"><img src="{{ asset('home/images/design/jian_4.jpg') }}" alt=""><span>床</span><div></div></li>
			<li class="conli3"><img src="{{ asset('home/images/design/jian_6.jpg') }}" alt=""><span>餐厅</span><div></div></li>
		</ul>
	</div>
	<div id="dessj1" class="des3con" style=" {{ $id ==1 ? "display:block":"display:none" }}">
		<ul>
			<div class="conli1"><img src="{{ asset('home/images/design/xian_4.jpg') }}" alt=""></div>
			<li class="conli2"><img src="{{ asset('home/images/design/xian_1.jpg') }}" alt=""><span>餐厅</span><div></div></li>
			<li class="conli2"><img src="{{ asset('home/images/design/xian_2.jpg') }}" alt=""><span>客厅</span><div></div></li>
			<li class="conli2"><img src="{{ asset('home/images/design/xian_3.jpg') }}" alt=""><span>卧室</span><div></div></li>
			<li class="conli3"><img src="{{ asset('home/images/design/xian_5.jpg') }}" alt=""><span>电视墙</span><div></div></li>
			<li class="conli3"><img src="{{ asset('home/images/design/xian_7.jpg') }}" alt=""><span>沙发</span><div></div></li>
			<li class="conli3"><img src="{{ asset('home/images/design/xian_6.jpg') }}" alt=""><span>儿童房</span><div></div></li>
		</ul>
	</div>
	<div id="dessj2" class="des3con" style=" {{ $id ==2 ? "display:block":"display:none" }}">
		<ul>
			<div class="conli1"><img src="{{ asset('home/images/design/di_5.jpg') }}" alt=""></div>
			<li class="conli2"><img src="{{ asset('home/images/design/di_1.jpg') }}" alt=""><span>床</span><div></div></li>
			<li class="conli2"><img src="{{ asset('home/images/design/di_2.jpg') }}" alt=""><span>客厅</span><div></div></li>
			<li class="conli2"><img src="{{ asset('home/images/design/di_3.jpg') }}" alt=""><span>沙发</span><div></div></li>
			<li class="conli3"><img src="{{ asset('home/images/design/di_4.jpg') }}" alt=""><span>阳台</span><div></div></li>
			<li class="conli3"><img src="{{ asset('home/images/design/di_6.jpg') }}" alt=""><span>餐厅</span><div></div></li>
			<li class="conli3"><img src="{{ asset('home/images/design/di_7.jpg') }}" alt=""><span>卧室</span><div></div></li>
		</ul>
	</div>
	<div id="dessj3" class="des3con" style=" {{ $id ==3 ? "display:block":"display:none" }}">
		<ul>
			<div class="conli1"><img src="{{ asset('home/images/design/zhong_6.jpg') }}" alt=""></div>
			<li class="conli2"><img src="{{ asset('home/images/design/zhong_1.jpg') }}" alt=""><span>卧室</span><div></div></li>
			<li class="conli2"><img src="{{ asset('home/images/design/zhong_2.jpg') }}" alt=""><span>餐厅</span><div></div></li>
			<li class="conli2"><img src="{{ asset('home/images/design/zhong_3.jpg') }}" alt=""><span>电视机墙</span><div></div></li>
			<li class="conli3"><img src="{{ asset('home/images/design/zhong_4.jpg') }}" alt=""><span>卧室</span><div></div></li>
			<li class="conli3"><img src="{{ asset('home/images/design/zhong_5.jpg') }}" alt=""><span>餐厅</span><div></div></li>
			<li class="conli3"><img src="{{ asset('home/images/design/zhong_7.jpg') }}" alt=""><span>摆件</span><div></div></li>
		</ul>
	</div>
	<div id="dessj4" class="des3con" style=" {{ $id ==4 ? "display:block":"display:none" }}">
		<ul>
			<div class="conli1"><img src="{{ asset('home/images/design/mei_7.jpg') }}" alt=""></div>
			<li class="conli2"><img src="{{ asset('home/images/design/mei_1.jpg') }}" alt=""><span>卧室</span><div></div></li>
			<li class="conli2"><img src="{{ asset('home/images/design/mei_3.jpg') }}" alt=""><span>电视机墙</span><div></div></li>
			<li class="conli2"><img src="{{ asset('home/images/design/mei_4.jpg') }}" alt=""><span>客厅</span><div></div></li>
			<li class="conli3"><img src="{{ asset('home/images/design/mei_2.jpg') }}" alt=""><span>床</span><div></div></li>
			<li class="conli3"><img src="{{ asset('home/images/design/mei_5.jpg') }}" alt=""><span>卫生间</span><div></div></li>
			<li class="conli3"><img src="{{ asset('home/images/design/mei_6.jpg') }}" alt=""><span>餐厅</span><div></div></li>
		</ul>
	</div>
	<div id="dessj5" class="des3con" style=" {{ $id ==5 ? "display:block":"display:none" }}">
		<ul>
			<div class="conli1"><img src="{{ asset('home/images/design/tian_1.jpg') }}" alt=""></div>
			<li class="conli2"><img src="{{ asset('home/images/design/tian_2.jpg') }}" alt=""><span>餐厅</span><div></div></li>
			<li class="conli2"><img src="{{ asset('home/images/design/tian_3.jpg') }}" alt=""><span>卧室</span><div></div></li>
			<li class="conli2"><img src="{{ asset('home/images/design/tian_4.jpg') }}" alt=""><span>卧室</span><div></div></li>
			<li class="conli3"><img src="{{ asset('home/images/design/tian_5.jpg') }}" alt=""><span>餐厅</span><div></div></li>
			<li class="conli3"><img src="{{ asset('home/images/design/tian_6.jpg') }}" alt=""><span>卫生间</span><div></div></li>
			<li class="conli3"><img src="{{ asset('home/images/design/tian_7.jpg') }}" alt=""><span>儿童房</span><div></div></li>
		</ul>
	</div>

</div>


<script src="{{ asset('home/images/design/common.js') }}"></script>

@endsection('content')