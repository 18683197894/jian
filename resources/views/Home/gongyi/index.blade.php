@extends('heads')
@section('css')

<link rel="stylesheet" href="{{ asset('home/images/news/common.css') }}">

@endsection('css')

@section('content')

  <div class="z-news">
       <div class="z-news1"></div>
	   <div class="z-news-con">
	       <div class="z-loc">当前位置：<a href="{{ url('/')}}">首页</a>&gt;&gt;<a href="#" onclick="return false">{{ $tit->title }}</a></div>
	       <div class="z-news-con-l">
		       <ul>
		       @if(isset($zhi) && count($zhi) > 0)
			      <li class="z-n-li0"><b>{{ $zhi->title }}</b><p><span class="z-n-ps1">{{ date("Y年m月d日 H:i:s",$zhi->time) }}</span><span class="z-n-ps2">{{ $zhi->click }}</span></p><img src="{{ asset('/uploads/gongyi/newsimg/') }}/{{ $zhi->titleimg }}" width="640" height="250" /><span class="z-n-ps3">{{ $zhi->leicon }}</span><a href="{{ url('/home/gongyi/play/') }}/{{ $zhi->id }}">查看全文</a></li>
		       @endif
				@if(isset($data) && count($data) > 0)	
				@foreach($data as $k => $v)			  
				  <li class="z-n-li1"><a href="{{ url('/home/gongyi/play/') }}/{{ $v->id }}">{{ $v->title }}</a><span>{{ date('Y-m-d',$v->time) }}</span></li>
				@endforeach
				@else
				<li style="margin-left:320px;margin-top:30px">未找到文章</li>
				@endif
			   </ul><div style="clear:both;"></div>
			   <div class="z-page" style="text-algin:center">{{ $data->links() }}</div>
		   </div>
	       <div class="z-news-con-r">
		      <div class="z-news-r-1">
			     <p>工艺推荐</p>
			     <ul>
			     @if(isset($qi) && count($qi) > 0)
					@foreach($qi as $kkk => $vvv)
				    <li><img src="{{ asset('uploads/gongyi/img/') }}/{{ $vvv->img }}" width="120" height="60"/><a href="{{ url('/home/gongyi/list/') }}/{{ $vvv->id }}"><b>@php echo mb_substr($vvv->title,0,19,'utf8')."‥" @endphp</b></a><span></span></li>
				 	@endforeach
				 @else
				    <li style="margin-left:190px;margin-top:30px">未找到</li>
				
				 @endif
				 </ul>
			  </div>
			  <div style="clear:both;"></div>		  
			  <div class="z-news-r-2">
			      <p>热点点击</p>
				  <ul>
				  	@if(isset($xun) && count($xun)>0)
				  	@foreach($xun as $kk => $vv)
				     <li><a href="{{ url('/home/gongyi/play/') }}/{{ $vv->id }}">@php echo mb_substr($vv->title,0,26,'utf8')."‥" @endphp</a></li> 
					@endforeach
				  	@endif

				  </ul>
			  </div>
		   </div>
	   </div>
  </div>
@endsection('content')