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
		     <li><a href="{{ url('jsgw/aboutus') }}">企业简介</a></li>
			 <li class="jsliactive"><a href="{{ url('jsgw/tuandui') }}">运营团队</a></li>
			 <li><a href="{{ url('jsgw/zhanlui') }}">发展战略</a></li>
			 <li><a href="{{ url('jsgw/goujia') }}">组织构架</a></li>
			 <li ><a href="{{ url('jsgw/contact') }}">联系我们</a></li>
		  </ul>
	   </div>
       <div class="about-tuandui1"><h1>专业的运营团队</h1><p>建商联盟具有经验丰富的运营管理、市场推广、财务审核和后勤保障团队，精细化的数据分析和风险管控能力，确保业务正常运行。公司运营管理团队具有丰富的实践经验，对整个家居建材构成了科学的管理体系，是一批具有创新意识和强烈社会责任感，更注重为消费者和商家提供精细化服务，充分利用“互联网+”，整合资源，开拓家具建材新局面，打造全新生态圈。</p></div>
	   <div class="about-tuandui2"><h1>第三方顾问团队</h1><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;A：十余年专业经验法律顾问团   团队具有行政性、专业性、咨议性、服务性、非常设性等特征，团队律师均由法治机构专家组成，具有丰富的从业经验和专业优势<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;B：集专业理论和实践于一身的营销策划团队  团队成员均有在4A级传媒公司从业经验，不仅具有敏锐的市场观察力、判断力，还具有睿智的想象能力和娴熟的表达技巧。<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;C：专业品牌推广团队  团队成员具有500强企业从业经验，拥有良好的协作意识，能快速把品牌曝光于各种媒体中。
</p></div>
   </div>
<div style="clear:both;"></div>
@endsection('content')