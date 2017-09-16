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
			 <li><a href="{{ url('jsgw/tuandui') }}">运营团队</a></li>
			 <li><a href="{{ url('jsgw/zhanlui') }}">发展战略</a></li>
			 <li class="jsliactive"><a href="{{ url('jsgw/contact') }}">联系我们</a></li>
		  </ul>
	   </div><div style="clear:both;"></div>
       <div class="contact">
	       <div class="contact-l">
		        <div class="contact-l1">如果您是品牌厂商或本地商户，想要寻求新的增长机会，寻求更好的货源，更好的销售；如果你有一腔热血，愿意加入我们一起开拓新的事业，可与我们进行联系！</div>
				<div class="contact-con"><h1>四川建商网络科技有限公司</h1>
<p>工作时间：周一至周六  上午9：00~下午18：00<br />
财富热线：400-188-6585<br />
邮箱：service@jianshanglianmeng.com<br />
地址：四川省宜宾市临港经济开发区龙头山路199号2号楼西南互联网产业基地522<br />
网址：www.jianshanglianmeng.com<br />
投诉建议：185-8291-5788<br />
<img src="/xy_UpLoadFile/content/f_2017525_112515.jpg" width="416" height="233" alt="" /></p></div>
		   </div>
		   
	   </div>
   </div>
<div style="clear:both;"></div>
@endsection(''content)