@extends('heads')

@section('css')
<link rel="stylesheet" href="{{ asset('home/jsgw/css/common.css') }}">
@endsection('css')

@section('content')
<div style="clear:both;"></div>
   <div class="js-about">
       <div class="js-about-ad"></div>
       <div class="js-about-tit">
	      <ul>
		     <li><a href="{{ url('jsgw/ls') }}">新零售平台</a></li>
			 <li><a href="{{ url('jsgw/jzf') }}">精装房项目</a></li>
			 <li class="jsliactive"><a href="{{ url('jsgw/tyg') }}">线下体验馆</a></li>
		  </ul>
	   </div><div style="clear:both;"></div>
       <div class="about-jzf"><p>建商网建材家居馆又称为O2O家居体验馆，是O2O模式下为消费者提供省时、省力、省钱的一站式家装购物解决方案的零售终端体验店，它打破了传统卖场简单的店铺租赁关系，而是建商网与商家共同合作营造的一种互赢互利、轻松便捷的购物环境。</p><b>体验理念</b></div>
	   <div class="about-tyg">
	       <ul>
		      <li class="tyg11">专注于装修、建材、家居垂直领域的电子商务平台</li>
			  <li class="tyg12">利用“互联网+“为家装用户提供质高价优的产品和家装服务。</li>
			  <li class="tyg13">以客户为先的理念，提供先行赔付、正品保障、金牌施工等特色服务</li>
		   </ul>
	   </div>
	   
       <div class="about-jzf1">
	       <div class="about-tyg1">
		      <div class="jzf300">体验中心</div>
		      <div class="jzf200">
			   <p class="tyg16">线下体验馆以体验+场景的模式陈列产品</p>
			   <p class="tyg17">浏览过程中感受不同品牌、系列的特点</p>
			   <p class="tyg18">让消费者真实感受装修效果、身临其景,同时产品价格、折扣统一标示</p>
			  </div>
		   </div>
	   </div>	
   </div>
<div style="clear:both;"></div>
@endsection('content')