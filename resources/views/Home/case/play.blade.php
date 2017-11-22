@extends('heads')

@section('css')
<link href="{{ asset('home/images/case/index/play.css') }}" rel="stylesheet" type="text/css" />

@endsection('css')

@section('content')
	<div class="play_heads">
	<div class="zaiplay1head">
			<span>当前位置：&nbsp;<a href="{{ url('/') }}">首页</a> > <a href="{{ url('home/case/index') }}">完整案例</a> > 案例详情</span>
		</div>
		<title>{{ $data->title }}</title>
		<ul>
			<li><a href="{{ url('home/case/indexurl?c=ip1&a=') }}{{ $data->huxing }}">{{ $data->huxing }}</a></li>
			<li><a href="{{ url('home/case/indexurl?c=ip2&a=') }}{{ $data->fengge }}">{{ $data->fengge }}</a></li>
			<li><a href="{{ url('home/case/indexurl?c=ip3&a=') }}{{ $data->yusuan }}">{{ $data->yusuan }}</a></li>
		</ul>
	</div>
	<div class="play_con1">
		<div class="con1_left">
			
				<div class="win" index="{{ count($eff) }}" >
					<div class="box">
						@foreach($eff as $k => $v)
						<div @if( $es == str_replace('/','',$k) ) style="left:0" class="num1" @endif  index="{{ $loop->index }}"><img  data-original="{{ asset('/uploads/case/img/') }}/{{ $v }}" alt=""></div>
						@endforeach
					</div>
					<div class="leftB">&lt;</div>
					<div class="rightB">&gt;</div>
					<ul class="con1_leftul">
						@foreach($eff as $kk => $vv)
						<li id="index{{ $loop->index }}" @if($es == str_replace('/','',$kk) ) style="display:block" @else style="display:none" @endif) >{{ $kk }}</li>
						@endforeach
					</ul>
				</div>
					
			</div>
		
		<div class="con1_right">
			<div class="con1_right_con1" index="{{ $data->id }}">
				<title>我家也要设计成这样</title>
				<label for="">
					<input type="text"  placeholder="你的姓名" >
					<span>请输入你的姓名</span>
				</label>
				<label for="">
					<input type="text"  placeholder="你的电话">
					<span>请输入你的电话</span>
				</label>
				<button>立即提交</button>
			</div>
			<div class="con1_right_con2">
				<label for="" class="label1">
					
					<title>在线客服 :</title>
					<em></em>
					<span>2022509729</span>
				</label>
				<label for="" class="label2">
					
					<title>咨询电话 :</title>
					<em></em>
					<span>400-188-6585</span>
				</label>
			</div>
		</div>
	</div>
	<div class="caseplaycon2">
		<div class="caseplaycon2_head">
			<span>施工流程</span>
		</div>
		<div class="caseplaycon2_con">
			<div class="caseplaycon2_con_div">
				<em><span>准备开工</span></em>
				<ul>
					@foreach($data->img1 as $kkk => $vvv)
					<li><a href="{{ asset('/uploads/case/img') }}/{{ $vvv }}" target="_blank"><img  data-original="{{ asset('/uploads/case/img') }}/{{ $vvv }}" alt=""></a></li>
					@endforeach
				</ul>
				<div style="clear:both"></div>
			</div>
			<div class="caseplaycon2_con_div">
				<em><span>水电阶段</span></em>
				<ul>
					@foreach($data->img2 as $kkkk => $vvvv)
					<li><a href="{{ asset('/uploads/case/img') }}/{{ $vvvv }}"  target="_blank"><img  data-original="{{ asset('/uploads/case/img') }}/{{ $vvvv }}" alt=""></a></li>
					@endforeach
				</ul>
				<div style="clear:both"></div>
			</div>
			<div class="caseplaycon2_con_div">
				<em><span>泥木阶段</span></em>
				<ul>
					@foreach($data->img3 as $j => $k)
					<li><a href="{{ asset('/uploads/case/img') }}/{{ $k }}" target="_blank"><img  data-original="{{ asset('/uploads/case/img') }}/{{ $k }}" alt=""></a></li>
					@endforeach
				</ul>
				<div style="clear:both"></div>
			</div>
			<div class="caseplaycon2_con_div">
				<em><span>油漆阶段</span></em>
				<ul>
					@foreach($data->img4 as $h => $l)
					<li><a href="{{ asset('/uploads/case/img') }}/{{ $l }}" target="_blank"><img  data-original="{{ asset('/uploads/case/img') }}/{{ $l }}" alt=""></a></li>
					@endforeach
				</ul>
				<div style="clear:both"></div>
			</div>
		</div>
	</div>
@endsection('content')

@section('js')
	<!-- // <script src="{{ asset('home/images/case/index/play.js') }}"></script> -->

	<script>
	$(function(){
	var nu = $(".win").attr('index');
	var win=$(".win");
	var divs=$(".box div");
	var num1=$('.num1').attr('index');  
	var num2=0;

	$(".leftB").click(function(){

		divs.stop(true,true);
		var temp=num1;
		num1--;
		if(num1==-1){
			num1=nu -1 ;
		}
		var index = divs.eq(num1).attr('index')
		
		$('.con1_leftul > li').css('display','none');
		$('#index'+index).css('display','block');
		divs.eq(num1).css("left",904).animate({left:0});
		divs.eq(temp).animate({left:-904});
	});
	$(".rightB").click(function(){
	
		divs.stop(true,true);
		// divs.finish();
		var temp=num1;
		num1++;
		if(num1==nu){
			num1=0;
		}
		var index = divs.eq(num1).attr('index')
		$('.con1_leftul > li').css('display','none');
		$('#index'+index).css('display','block');
		// alert(divs.eq(num1).attr('index'))
		divs.eq(num1).css("left",-904).animate({left:0});
		divs.eq(temp).animate({left:904});
	});
});
			$(function() {

      		$("img").lazyload({effect: "fadeIn"});
     		 $("img").lazyload({ threshold :180});
			});
	</script>
	
@endsection('js')

