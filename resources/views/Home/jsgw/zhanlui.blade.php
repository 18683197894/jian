@extends('heads')
@section('css')
<link rel="stylesheet" href="{{ asset('home/jsgw/css/common.css') }}">
@endsection('css')

@section('content')
   <div class="js-about">
       <div class="js-about-ad"></div>
       <div class="js-about-tit">
	      <ul>
		     <li><a href="{{ url('jsgw/aboutus') }}">企业简介</a></li>
			 <li><a href="{{ url('jsgw/tuandui') }}">运营团队</a></li>
			 <li class="jsliactive"><a href="{{ url('jsgw/zhanlui') }}">发展战略</a></li>
		  </ul>
	   </div>
	   <div class="fazhan1">
	       <p>不断完善平台服务，做家居行业最有价值的品牌，统一化，标准化，一体化，专业化服务。<br>我们致力于打造一个千亿级的互联网家居企业，成为家居行业的标杆型服务平台。</p>
		   <b>家居建材市场规模超4万亿，互联网渗透率低，潜力巨大！</b>
		   <div class="fazhan1-1"></div>
		   <div class="fazhan1-2"><strong style="margin-left:140px;">2016年家居建材互联网渗透率</strong><strong style="margin-left:145px;">网购与o2o带动电商销售</strong><strong style="margin-left:135px;">互联网张背景下、家居建材线上销售</strong></div>
       </div>
	   <div class="fazhan2">
	       <div class="fazhan2-1">
		       <div class="fazhan1-1-1"><span>经济效益明显</span><p>解决商家和消费者长期的矛盾和信息不对称问题，实现双方共赢</p><p>有效的对接社会闲散资源</p><p>有利于民生</p><p>让共享经济在网上家居商城领域扎根</p><p>满足用户花最少的钱买到最好的产品及服务诉求</p></div>
		   </div>
	   </div>
	   <div class="fazhan3">
	        <span>提升建商网</span>
			<p>品牌效益大力发展相关的家居建材产品</p>
			<p>有利于提升政府形象</p>
			<p>取缔长期存在具有重大市场隐患的家居行业乱象</p>
			<p>响应国家号召消灭建材家居行业无人监管现象</p>
	   </div>
	   <div class="fanzhan4">
	       <div class="fanzhan4-1">
		       <div class="fazhan4-1-1"><span>建商网发展项目</span><p>是现化服务业与传统行业相结合的新“引擎”</p><p>多种配套服务于一体</p><p>为消费者提供便利服务</p><p>有利于提升市场竞争力和城市品位</p><p>改变交易市场零乱局面</p></div>
		   </div>
	   </div>
	   <div class="fanzhan5">
	       <span>提高就业率</sapn>
		   <p>项目建成后会和各个建材家居商家互惠共赢，本项目可直接提供800个以上就业岗位，带动地方人才就业，带动地方经济发展完善地方产业，对地方建设具有较大积极作用。</p>
		   <img src="{{ asset('home/jsgw/css/dc3.jpg') }}" />
	   </div>
   </div>
<div style="clear:both;"></div>
@endsection('content')