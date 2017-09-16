@extends('heads')

@section('css')
	<style>
		.des1{
			width:100%;
			height:500px;

		}
		.des1 img{
			width:100%;
			height:500px;
		}
		.des2{
			width:100%;
			height:520px;
		}
		.des2_1{
			width:1200px;
			height:495px;
			margin:0px auto;
			margin-top: 45px;
		}
		.pic_1{
			width:332px;
			height:494px;
			overflow: hidden;
			float:left;
		}

		.pic_2,.pic_5{
			width:320px;
			height:247px;
			float:left;
			overflow: hidden;
		}
		.pic_3,.pic_4{
			width:548px;
			height:247px;
			float:left;
			overflow: hidden;
		}

		.des2_1 div img{
			width:100%;
			height:100%;
		    -webkit-transform: scale(1);
		    -webkit-transition: 1s;
		}
		.des2_1 div img:hover{
		    -webkit-transform: scale(1.05);
		}
		.des3{
			width:1200px;
			margin:0 auto;
			height:100%;
		}
		.des3nva{
			width:1200px;
			height:50px;
			margin:0 auto;
		}

		.desnvaul{
			overflow:hidden;
			display:block;
			width:718px;
			height:50px;
			margin:0 auto;
		}
		.desnvaul li{
			font-size: 20px;
			overflow:hidden;
			line-height: 50px;
			font-weight: 500;
			float:left; cursor:pointer ;
			margin:0px 18px 0px 18px;
		}
		.desnvaul li:hover{
			color:red;
		}
		.des3con{
			width:1200px;
			height:568px;
			margin-top: 10px;
			padding-bottom: 50px;
		}
		.conli1{
			width:361px;
			height:568px;
			overflow: hidden;
			float:left;
			border-right:2px solid #fff;
		}

		.conli2{
			width:264px;
			height:278px;
			overflow: hidden;
			float:left;
			border-left:15px solid #fff;
			border-bottom:12px solid #fff;
		}
		.conli3{
			width:263px;
			height:278px;
			overflow: hidden;
			float:left;
			border-left:16px solid #fff;
		}
		.des3con ul li img{
			width:100%;
			height:100%;
			position:absolute;
			top:0;overflow: hidden;
			left:0;
			z-index:100;
		}
		.des3con ul li{
			position:relative;
		}
		.des3con ul li span{
			position:absolute;
			top:0px;
			left:0px;
			background: rgba(70,70,70,0.65);
			width:100%;
			height:100%;
			z-index:101;
			overflow: hidden;
			text-align: center;
			font-family:"Times New Roman",Georgia,Serif;
			line-height: 278px;
			font-size: 22px;
			font-weight: 500;
			display: none;
			color:#fff;
		}
		.des3con ul li div{
			width:14px;
			height:5px;
			border-bottom:1px solid #fff;
			position: absolute;
			top:150px;
			left:124px;
			z-index:101;
			display: none;
		}
		.color{
			color:red;
		}
	</style>
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

<script>
		$(".desnvaul>li").on('click',function(i,n){
			$(".desnvaul>li").attr('class','');
			$(this).attr('class','color');
			var index = $(this).attr('index');
			$(".des3con").css('display','none');
			$("#dessj"+index).css('display','block');
		})
		$(".des3con> ul > li").hover(
		  function () {
		    var span = $(this).find("span");
		    var div = $(this).find("div");
		    span.css('display','block');
		    div.css('display','block');
		},
		  function () {
		    var span = $(this).find("span");
		    var div = $(this).find("div");
		   	span.css('display','none');
		    div.css('display','none');
		  }
		);
</script>
@endsection('content')