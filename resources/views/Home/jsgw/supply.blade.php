@extends('jsgw')

@section('css')
	<style>
	.con_sup1{
		width:100%;
		height:560px;
	}

	.con_sup1 img {
		width:100%;
		height:100%;
	}
	.con_sup2{
		width:1200px;
		height:100%;
		margin:0 auto;
		padding-bottom: 30px;
	}
	.con_sup2 title{
		display:block;
		padding:25px 0px 25px 0px;
		text-align: center;
		font-size: 23px;
		color:#000;
	}
	.con_sup2 ul{
		width:1200px;
		height:100%;
		overflow: hidden;
	}
	.con_sup2li1{
		width:230px;
		height:230px;
		float:left;
		margin-bottom: 20px;
		position:relative;
	}
	.con_sup2li2{
		width:230px;
		height:230px;
		float:left;
		padding-left: 12px;
		padding-bottom: 20px;
		position:relative;
	}
	.con_sup2 ul .con_sup2li2 img{
		width:230px;
		height:230px;
		position:absolute;
		top:0px;
		left:12px;
	}
	.con_sup2 ul .con_sup2li1 img{
		width:230px;
		height:230px;
		position:absolute;
		top:0px;
		left:0px;
	}
	.con_sup2 ul .con_sup2li2 div{
		width:230px;
		height:30px;
		background:rgba(62,62,62,0.75);
		position:absolute;
		left:12px;
		text-align: center;
		bottom:20px;
		display: none;
	}
	.con_sup2 ul .con_sup2li1 div{
		width:230px;
		height:30px;
		background:rgba(62,62,62,0.75);
		position:absolute;
		left:0px;
		text-align: center;
		bottom:0px;
		display: none;
	}
	.con_sup2 ul li div span{
		font-size: 18px;
		color:#fff;
		line-height: 30px;
	}
	</style>
@endsection('css')



@section('content')
	<div class="con_sup1">
		<img src="{{ asset('home/images/supply/11.png') }}" alt="">
	</div>
	<div class="con_sup2">
		<title>产品类别</title>
		<ul>
			<li class="con_sup2li1"><img src="{{ asset('home/images/supply/1.png') }}" alt=""><div><span>瓷砖</span></div></li>
			<li class="con_sup2li2"><img src="{{ asset('home/images/supply/2.png') }}" alt=""><div><span>洁具卫浴</span></div></li>
			<li class="con_sup2li2"><img src="{{ asset('home/images/supply/3.png') }}" alt=""><div><span>集成吊顶</span></div></li>
			<li class="con_sup2li2"><img src="{{ asset('home/images/supply/4.png') }}" alt=""><div><span>定制橱柜</span></div></li>
			<li class="con_sup2li2"><img src="{{ asset('home/images/supply/5.png') }}" alt=""><div><span>门</span></div></li>
			<li class="con_sup2li1"><img src="{{ asset('home/images/supply/6.png') }}" alt=""><div><span>墙面装饰</span></div></li>
			<li class="con_sup2li2"><img src="{{ asset('home/images/supply/7.png') }}" alt=""><div><span>地板</span></div></li>
			<li class="con_sup2li2"><img src="{{ asset('home/images/supply/8.png') }}" alt=""><div><span>定制家具</span></div></li>
			<li class="con_sup2li2"><img src="{{ asset('home/images/supply/9.png') }}" alt=""><div><span>灯饰照明</span></div></li>
			<li class="con_sup2li2"><img src="{{ asset('home/images/supply/10.png') }}" alt=""><div><span>成品家具</span></div></li>
		</ul>
		<div style="clear:both"></div>
	</div>
@endsection('content')

@section('js')
	<script>
		$(".con_sup2 > ul > li").hover(
		  function () 
		  {
		    $(this).find('div').show();
		  },
		  function () 
		  {
		    $(this).find('div').hide();
		  }
		);
	</script>
@endsection('js')