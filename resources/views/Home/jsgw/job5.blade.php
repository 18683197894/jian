@extends('heads')
@section('css')
@endsection('css')
<link rel="stylesheet" href="{{ asset('home/jsgw/css/common.css') }}">
@section('content')
  
<div style="clear:both;"></div>
   <div class="js-about66">
       <div class="js-job-ad"></div>
	   <div class="js-jobs1">
	      <div class="js-jobs1-left">
		      <div class="js-job-title">招聘职位：设计师</div>
			  <div class="js-job-time">发布者：建商网　　　　职位发布日期：2011-5-5</div>
			  <div class="js-job-con"><p>1、有良好的设计能力，思路开阔，富有创造力，能独立完成设计稿； <br />
2、熟练操作3DMAX、PHOTOSHOP及CORELDRAW等软件； <br />
3、有1年以上行业经验，富有责任心，具有良好的团队精神； <br />
4、年龄要求：23-32岁左右 <br />
5、能长期出差</p></div>
		  </div>
	      <div class="js-jobs1-right">
		    <ul>
		       <li><a href="{{ url('jsgw/job5') }}">设计师</a></li>
		       <li><a href="{{ url('jsgw/job6') }}">销售业务代表</a></li>
		    </ul>
		  </div>
	   </div>
   </div>
<div style="clear:both;"></div>
@endsection('content')