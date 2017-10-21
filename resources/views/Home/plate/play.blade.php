@extends('heads')

@section('css')
<link rel="stylesheet" href="{{ asset('home/images/news/common.css') }}">

@endsection('css')

@section('content')
  <div class="z-news">
       <div class="z-news1"></div>
	   <div class="z-news-con">
	       <div class="z-loc">当前位置：<a href="{{ url('/') }}">首页</a>&gt;&gt;<a href="{{ url('/home/plate/list/') }}/{{ $data->pid }}">{{ $data->yuan }}</a>&gt;&gt;<a href="#" onclick="return false">文章详情</a></div>
	       <div class="z-news-con-ls">
		       <div class="z-news-con-tit">{{ $data->title }}</div>
			   <div class="z-news-con-titda"><span class="z-n-ps1">来源：{{ $data->yuan }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;日期：{{ date('Y年m月d日',$data->time) }}</span><span class="z-n-ps2">{{ $data->click }}</span></div>
			   <div class="z-news-detail">
			   	@php     echo $data->content     @endphp
			   </div>
		   </div>
	       <div class="z-news-con-r">
		      <div class="z-news-r-1">
			     <p>板块推荐</p>
			     <ul>
			     @if(isset($qi) && count($qi) > 0)
					@foreach($qi as $kkk => $vvv)
				    <li><img src="{{ asset('uploads/plate/img/') }}/{{ $vvv->img }}" width="120" height="60"/><a href="{{ url('/home/plate/list/') }}/{{ $vvv->id }}"><b>@php echo mb_substr($vvv->title,0,19,'utf8')."‥" @endphp</b></a><span></span></li>
				 	@endforeach
				 @else
				    <li style="margin-left:190px;margin-top:30px">未找到板块</li>
				
				 @endif
				 </ul>
			  </div>
			  <div style="clear:both;"></div>		  
			  <div class="z-news-r-2">
			      <p>热点点击</p>
				  <ul>
				  	@if(isset($xun) && count($xun)>0)
				  	@foreach($xun as $kk => $vv)
				     <li><a href="{{ url('/home/plate/play/') }}/{{ $vv->id }}">@php echo mb_substr($vv->title,0,26,'utf8')."‥" @endphp</a></li> 
					@endforeach
				  	@endif
				  </ul>
			  </div>
		   </div>
	   </div>
  </div>
@endsection('content')