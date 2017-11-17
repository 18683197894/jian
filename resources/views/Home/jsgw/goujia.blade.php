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
			 <li class="jsliactive"><a href="{{ url('jsgw/goujia') }}">组织构架</a></li>
			 <li><a href="{{ url('jsgw/contact') }}">联系我们</a></li>
		  </ul>
	   </div>
		<div style="width:1200px;height:800px;margin:50px auto;" >
			<img src="{{ asset('/home/jsgw/goujia/1.jpg') }}" width="100%" height="100%" alt="">
		</div>	  
   </div>
<div style="clear:both;"></div>
@endsection('content')