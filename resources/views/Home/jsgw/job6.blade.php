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
		      <div class="js-job-title">招聘职位：销售业务代表</div>
			  <div class="js-job-time">发布者：建商网　　　　职位发布日期：2011-5-5</div>
			  <div class="js-job-con"><div>1、性格外向、表达能力强，具有较强的沟通能力及交际技巧，具有<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>相关会展工作经验或糖酒会工作经验一年以上；<br />
2、富有责任心、有良好的业务心态，勇于挑战自己，热爱销售工作；<br />
3、年龄要求：23-32岁左右，男女不限。</div>
<div>4、能长期出差</div></div>
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