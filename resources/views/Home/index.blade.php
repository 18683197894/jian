@extends('heads')
@section('css')
<link rel="stylesheet" href="{{ asset('/home/images/index/index.css') }}">
@endsection('css')

@section('content')
	<div id="index_1">
		<div id="index_1_1">
				<div class="bannerbox">

					<div class="Homebanner">
						<ul>
							<li class="Load cur" style="z-index:99;width:100%">
								<img width="100%" src="{{ asset('home/lunpo/index/1-1.png') }}" alt="">

							</li>
							<li class="Load" style="width:100%">
								<img width="100%" src="{{ asset('home/lunpo/index/1-1.png') }}" alt="">

							</li>
							<li class="Load" style="width:100%"><img width="100%" src="{{ asset('home/lunpo/index/1-1.png') }}" alt="">

							</li>
						</ul>
						<div class="Homeleft"><</div>
						<div class="Homeright">></div>
						<div class="Homedot"><a href="javascript:;" class="cur">1</a><a href="javascript:;">2</a><a href="javascript:;">3</a></div>
					</div>
				    
				</div>
		</div>
		<div id="index_2">
		<div id="index_2_1">
			<div id="index_head">
				<ul>
					<li id="index_lil"><span class="dian">预约楼盘看房</span></li>
					<li id="index_li"><span  class="dian">装修快速报价</span></li>
				</ul>
			</div>
			<div id="indexnone">
				<span id="indexspan1">电话不能留空 !</span>
				<span id="indexspan2">电话有误 请从新填写 !</span>
				<span id="indexspan3">电话不能留空 !</span>
				<span id="indexspan4">电话有误 请从新填写 !</span>
			</div>
			<div id="index_1_1_2" class="kuai0">
				<div id="table_1">
					<label id="lblSelect">
					<select id="selectPointOfInterest" class="select" title="选择楼盘">
					<option value="浙商临港新天地">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;浙商.临港新天地</option>
					<option value="德福公元">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;德福公元</option>
					<option value="织金万都铭城">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;织金万都铭城</option>
					</select>
					</label>
				</div>
				<div id="table_2">
				    <div class="input_control">
				        <input type="text" class="form_input" placeholder="填写手机号码预约看房"/>
				    </div>
				</div>
				<div id="table_3">
				       <button id="button1">提交号码</button>    
				</div>
			</div>
			<div id="index_1_1_3" class="kuai1" style="display:none">
				<div id="table_4">
				    <div id="input_control2">
				        <input type="text" class="form_input" placeholder="填写手机号码快速装修"/>
				    </div>
				</div>
				<div id="table_3">
				    	<button id="button2">提交号码</button>    
				</div>
			</div>
		</div>
	</div>
	</div>

		
	</div>

<!--中间内容-->
<div class="z-con">
    <div class="z-con1"><!--服务-->
	   <div class="z-con1-1">
	       <div class="z-con1-01"><b>省钱装修</b><p>全程6大免费服务</p></div>
		   <div class="z-con1-02"><b>免费预算报价</b><p>预算看不懂，我帮你</p></div>
		   <div class="z-con1-03"><b>全屋装修包</b><p>装修界的金点子</p></div>
		   <div class="z-con1-04"><b>装修分期贷</b><p>轻松装修不再愁</p></div>
	   </div>
	</div>

	<div class="z-con_4"> <!-- 楼盘推荐 -->
		<div class="head">
			<p class="head_1">Selling real estate</p>
			<b>楼盘推荐</b>	
			<p class="head_2">公司品质保障 &nbsp;放心服务 &nbsp;全程包忧</p>	
		</div>
		<ul>
			<li class="z-con_4_lil"> <a href="{{ url('/propertieszshx') }}"> <img  data-original="{{ asset('home/images/index/6.png') }}" alt=""> <span>浙商.临港新天地</span> </li></a>
			<li class="z-con_4_li"> <a href="{{ url('/propertiesdfhx') }}"><img  data-original="{{ asset('home/images/index/7.png') }}" alt=""> <span>德福公元</span> </li></a>
			<li class="z-con_4_li"> <a href="{{ url('/propertieshfhx') }}"><img  data-original="{{ asset('home/images/index/zj.jpg') }}" alt=""> <span>织金万都铭城</span> </li></a>
		</ul>
   	</div>
   	<div class="z-con_5"> <!-- 德系工艺品质保障 -->
   		<div class="head2">
			<p class="head_1_1">Decoration service process</p>
			<b>德系工艺品质保障</b>	
			<p class="head_2_2">公司品质保障 &nbsp;放心服务 &nbsp;全程包忧</p>	
		</div>
		<ul class="z-con_5_1">
			<li class="con_5_li1"><span class="con_5_span1"></span><span class="con_5_span_2">快速报价</span><span class="con_5_span_3"></span></li>
			<li class="con_5_li2"><span class="con_5_span2"></span><span class="con_5_span_2">线下体验</span><span class="con_5_span_4"></span></li>
			<li class="con_5_li3"><span class="con_5_span3"></span><span class="con_5_span_2">量房设计沟通</span><span class="con_5_span_6"></span></li>
			<li class="con_5_li4"><span class="con_5_span4"></span><span class="con_5_span_2">对比方案</span></li>
			<li class="con_5_li5"><span class="con_5_span5"></span><span class="con_5_span_2">签订合同</span><span class="con_5_span_3"></span></li>
			<li class="con_5_li6"><span class="con_5_span6"></span><span class="con_5_span_2">标准化施工</span><span class="con_5_span_5"></span></li>
			<li class="con_5_li7"><span class="con_5_span7"></span><span class="con_5_span_2">五星质检验收</span><span class="con_5_span_6"></span></li>
			<li class="con_5_li8"><span class="con_5_span8"></span><span class="con_5_span_2">金牌质保 售后无忧</span></li>
		</ul>
   	</div>
  	
  	<div class="z-con_6"> <!-- 装修套餐 -->
  		<div class="head">
			<p class="head_1">Decoration course</p>
			<b>装修软包</b>	
			<p class="head_2">公司品质保障 &nbsp;放心服务 &nbsp;全程包忧</p>	
		</div>
		<div class="con6_1">
			<a href="{{ url('/package/softroll') }}"><div class="con6_1_1"> <span>时尚包</span></div></a>
		</div>
		<div class="con6_2">
			<div class="con6_2_1">
				<a href="{{ url('/package/softroll') }}"><div> <span>新古典</span> </div></a>
			</div>
			<div class="con6_2_2"><a href="{{ url('/package/softroll') }}"><div> <span>现代</span> </div></a></div>
			<div class="con6_2_3"><a href="{{ url('/package/softroll') }}"><div> <span>美式</span> </div></a></div>
		</div>
  	</div>

  	<div class="z-con_7"> <!-- 真实案例 -->
  		<div class="head">
			<p class="head_1">Real case scen ario</p>
			<b>真实案例</b>	
			<p class="head_2">千家小区真实案例&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;装修心得随手粘来</p>	
		</div>
		@if(count($case) > 0 )
		<div class="zcon_7_1">
			<ul>	
				@foreach($case as $j => $h)
				<li @if( $loop->first ) class="zcon7_li" @else class="zcon7_lil" @endif>  <span class="zcon7_span1"><a href="{{ url('home/case/index/play') }}/{{ $h->id }}" target="_blank"><img  data-original="{{ asset('uploads/case/img/') }}/{{ $h->keting }}" alt=""></a></span>   <span class="zcon7_span_2"> <a href="{{ url('home/case/index/play') }}/{{ $h->id }}" target="_blank"><font>{{ $h->title }}</font></a><span>{{ $h->huxing }} {{ $h->fengge }} {{ $h->yusuan }}</span> </span>   <span class="zcon7_span_{{ $loop->index +3 }}"></span></li>
				@endforeach
						
			</ul>
		</div>
		@endif
		@if(count($case) > 0 )
		<div class="zcon_7_2">
			@foreach($case as $l => $m)
			<div @if($loop->first) class="zcon_7_2_divl" @else class="zcon_7_2_div" @endif>
				@foreach($m->eff as $n => $o)
				<div class="zcon_7_2_{{ $loop->index + 1 }}">
					<div class="zcon_7_img"><a href="{{ url('home/case/index/play') }}/{{ $m->id }}/{{ str_replace('/','',$n) }}" target="_blank"><img  data-original="{{ asset('/uploads/case/img') }}/{{ $o }}" alt=""></a></div>
					<div class="zcon_7_2_zi"><span>{{ $n }}</span></div>
				</div>
				@endforeach
				<!-- <div class="zcon_7_2_2">
					<div class="zcon_7_img"><img src="{{ asset('/home/images/index/con7_2_img1.png') }}" alt=""></div>
					<div class="zcon_7_2_zi"><span>卧室</span></div>
				</div> -->
			</div>
			@endforeach
			
		</div>
		@endif
  	</div>

	<div class="z-con_8"> <!-- 装修工艺 -->
		 <div class="head">
			<p class="head_1">Decoration process</p>
			<b>装修工艺</b>	
			<p class="head_2">公司品质保障 &nbsp;放心服务 &nbsp;全程包忧</p>	
		</div>

		<div class="zcon8_1">
			<div class="zcon8_head">
				<div class="zcon8_head1">
					
				</div>
				<div class="zcon8_head2">
					@if( !empty($data) )
					@foreach($data as $k => $v)
						<span
					    @if ($loop->first)
					        
					    @else
							style="margin-left:8px;"
					    @endif
						><a href="{{ url('home/gongyi/list/') }}/{{ $v->id }}">{{ $v->title }}</a></span>
					@endforeach
					@endif					
				</div>
			</div>
			<div class="zcon8_centent">
				<div class="zcon8_centent_1">
					<span>统一着装形象,统一施工标准,严格执行公司施工规范。</span>
					<span>休息时间,停止噪音施工,防止扰民,我们将为业主提供最贴心的建议和服务。</span>
					<span>一切为了业主最完美的装修施工,并充分尊重业主意见。</span>
				</div>
				<div class="zcon8_centent_2">
					<ul>
					@if( !empty($data) )
					@foreach($data as $kk => $vv)
						<li id="con8" class="zcon8_img_{{ $kk + 1 }}"> <a href="{{ url('home/gongyi/list/') }}/{{ $vv->id }}" ><img  data-original="{{ asset('uploads/gongyi/img/') }}/{{ $vv->img }}" alt=""> <div style="display:none"><span>{{ $vv->title }}</span></div></a> </li>
					@endforeach
					@endif	
					</ul>
				</div>
			</div>
		</div>	
	</div> 





	<div class="z-con2"><!---建材选购-->
	    <div class="z-huoban-1"><p class="z-hb-1">Building materials</p><b>建材选购</b><p class="z-hb-2">国内外知名厂家直供&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;品质生活从心开始</p></div>
		<ul>
		   <li class="z-xg-lil"><img  data-original="{{asset('home/images/index/con2_1.png')}}" /></li>
		   <li class="z-xg-lil"><img  data-original="{{asset('home/images/index/con2_2.png')}}" /></li>
		   <li class="z-xg-lil"><img  data-original="{{asset('home/images/index/con2_3.png')}}" /></li>
		   <li class="z-xg-lir"><img  data-original="{{asset('home/images/index/con2_4.png')}}" /></li>
		   <li class="z-xg-lil"><img  data-original="{{asset('home/images/index/con2_5.png')}}" /></li>
		   <li class="z-xg-lil"><img  data-original="{{asset('home/images/index/con2_6.png')}}" /></li>
		   <li class="z-xg-lil"><img  data-original="{{asset('home/images/index/con2_7.png')}}" /></li>
		   <li class="z-xg-lir"><img  data-original="{{asset('home/images/index/con2_8.png')}}" /></li>
		   <li class="z-xg-lil"><img  data-original="{{asset('home/images/index/con2_9.png')}}" /></li>
		   <li class="z-xg-lil"><img  data-original="{{asset('home/images/index/con2_10.png')}}" /></li>
		   <li class="z-xg-lil"><img  data-original="{{asset('home/images/index/con2_11.png')}}" /></li>
		   <li class="z-xg-lir"><img  data-original="{{asset('home/images/index/con2_12.png')}}" /></li>
		</ul> 
	</div>
	<div class="z-con3"><!--知识-->
	    <div class="z-huoban-1"><p class="z-hb-1">Knowledge corner</p><b>知识学堂</b><p class="z-hb-2">零基础学装修&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;三分钟了解全屋装修</p></div>
		<ul>
		@if( isset($plate) && !empty($plate))
			@foreach($plate as $g => $h)
				<li 
				@if($loop->first)
				class="zcon3_lil"
				@else
				class="zcon3_li"
				@endif
				>
					<a href="{{ url('home/plate/list') }}/{{ $h->id }}"><img  data-original="{{ asset('/uploads/plate/img') }}/{{ $h->img }}" alt=""></a>
					<div>
						@if(!empty($h->news))
							@foreach($h->news as $gg => $hh)
							 <span>	<a href="{{ url('home/plate/play/') }}/{{ $hh->id }}">{{ mb_substr($hh->title,0,20,'utf8') }}</a> @if( ( time() - $hh->time ) <= 259200 ) <img src="{{ asset('home/images/uu.gif') }}" alt=""> @endif </span>
							@endforeach
						@endif
					</div>
				</li>
			@endforeach
		@endif

		</ul>
	</div>
	
	<div class="z-huoban"><!--合作伙伴-->
	    <div class="z-huoban-1"><p class="z-hb-1">Partner</p><b>合作伙伴</b><p class="z-hb-2">公司品质保障 &nbsp;放心服务 &nbsp;全程包忧</p></div>
		<ul>
		   <li class="z-hb-lil"><img  data-original="{{asset('home/images/index/hb_2.jpg')}}" /></li>
		   <li class="z-hb-lil"><img  data-original="{{asset('home/images/index/hb_3.jpg')}}" /></li>
		   <li class="z-hb-lil"><img  data-original="{{asset('home/images/index/hb_4.jpg')}}" /></li>
		   <li class="z-hb-lil"><img  data-original="{{asset('home/images/index/hb_1.jpg')}}" /></li>
		   <li class="z-hb-lir"><img  data-original="{{asset('home/images/index/z-hb.jpg')}}" /></li>
		   <li class="z-hb-lil"><img  data-original="{{asset('home/images/index/z-hb.jpg')}}" /></li>
		   <li class="z-hb-lil"><img  data-original="{{asset('home/images/index/z-hb.jpg')}}" /></li>
		   <li class="z-hb-lil"><img  data-original="{{asset('home/images/index/z-hb.jpg')}}" /></li>
		   <li class="z-hb-lil"><img  data-original="{{asset('home/images/index/z-hb.jpg')}}" /></li>
		   <li class="z-hb-lir"><img  data-original="{{asset('home/images/index/z-hb.jpg')}}" /></li>
		</ul>
	</div>
	
</div>
	<script>
		$("#button1").on('click',function(){
			var hu = $('.select option:selected').val();
			var phone = $('.form_input').eq(0).val();
			if(phone==''){
				$('#indexspan1').css('display','block')
				$('#indexspan2').css('display','none')
				return false;
			}
			var myreg = /^(((13[0-9]{1})|(15[0-9]{1})|(18[0-9]{1}))+\d{8})$/; 
		    if(!myreg.test(phone)) 
	       { 
				$('#indexspan1').css('display','none')
				$('#indexspan2').css('display','block')
	            return false; 
	       }
			 $.ajaxSetup({
		      headers: {
		      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		      }
		      
		      });

	       $.ajax('/home/loupanajax',{
	       		type:'post',
	       		//传递的参数
	       		data:{hu:hu,phone:phone},
	       		//返回成功的信息 data是后台返回的数据
	       		success:function(data){
	       			if(data ==1 ){
	       				$('.form_input').eq(0).val('');
	       				$('#indexspan1').css('display','none')
						$('#indexspan2').css('display','none')
						$('#indexspan3').css('display','none')
						$('#indexspan4').css('display','none')
	       				alert('预约成功！工作人员会尽快与您联系');
	       			}
	       			if(data ==2){
	       				alert('预约失败！你已经预约过了');
	       			}
	       			if(data ==3){
	       				alert('预约失败！请稍后再试');
	       			}
	       		},
	       		//错误信息
	       		error:function(data){
	       			alert('数据异常！请稍后再试');
	       		},
	       		dataType:'json'
	       }) 

			
		})
		
		$("#button2").on('click',function(){
			var phone = $('.form_input').eq(1).val();
			if(phone==''){
				$('#indexspan3').css('display','block')
				$('#indexspan4').css('display','none')
				return false;
			}
			var myreg = /^(((13[0-9]{1})|(15[0-9]{1})|(18[0-9]{1}))+\d{8})$/; 
		    if(!myreg.test(phone)) 
	       { 
				$('#indexspan3').css('display','none')
				$('#indexspan4').css('display','block')
	            return false; 
	       } 
	       $.ajaxSetup({
		      headers: {
		      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		      }
		      
		      });

	       $.ajax('/home/zhuangxiuajax',{
	       		type:'post',
	       		data:{phone:phone},
	       		success:function(data){
	       			if(data ==1 ){
	       				$('#indexspan1').css('display','none')
						$('#indexspan2').css('display','none')
						$('#indexspan3').css('display','none')
						$('#indexspan4').css('display','none')
	       				$('.form_input').eq(1).val('');
	       				alert('预约成功！工作人员会尽快与您联系');
	       			}
	       			if(data ==2){
	       				alert('预约失败！你已经预约过了');
	       			}
	       			if(data ==3){
	       				alert('预约失败！请稍后再试');
	       			}
	       		},
	       		error:function(data){
	       			alert('数据异常！请稍后再试');
	       		},
	       		dataType:'json'
	       }) 
			
		})



	$("#index_head>ul>li").on('click',function(){
			$('#indexspan1').css('display','none')
			$('#indexspan2').css('display','none')
			$('#indexspan3').css('display','none')
			$('#indexspan4').css('display','none')
		$.each($("#index_head>ul>li"),function(i,n){
			$(this).css('border-bottom','0px');
			$(this).attr('index',i);
		})
		$(this).css('border-bottom','2px solid #fff');
		var index = $(this).attr('index');
		$(".kuai0").css('display','none');
		$(".kuai1").css('display','none');
		$(".kuai"+index).css('display','block');
	});

		$(document).ready(function(){
		
		$(".index_btn li").hover(function(){
			$(this).find("div").stop(true).animate({top:-280},300);	 
		},function(){
			$(this).find("div").stop(true).animate({top:-0},300);
	});
	
});
$("#con8 a").hover(
  function () {
    var img = $(this).find('img');
    var div = $(this).find('div');
    img.css('opacity','0.5');
    div.css('display','block');
  },
  function () {
    var div = $(this).find('div');
    var img = $(this).find('img');
    div.css('display','none');
    img.css('opacity','1');
  }
);
	

		
	  $(function() {

      $("img").lazyload({effect: "fadeIn"});
      $("img").lazyload({ threshold :180});

  });
	</script>
<script src="{{ asset('home/lunpo/index/banner.js') }}"></script>

@endsection('content')