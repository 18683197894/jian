@extends('heads')
@section('css')

<!-- <link rel="stylesheet" href="{{ asset('home/images/news/common.css') }}"> -->
<style>
/*--新闻--*/
.z-news{width:100%;height:100%;margin:0 auto;background:#fafafa;padding-bottom:60px;}
.z-news1{width:100%;height:500px;margin:0 auto;overflow:hidden;background:url(/home/images/news/z-xw.jpg) no-repeat center center;}
.z-news-con{width:1200px;height:auto;margin:0 auto;overflow:hidden;}
.z-loc{width:1200px;height:45px;line-height:45px;margin:0 auto;}
.z-news-conn{float:left;width:715px;}
.z-news-con-l{width:715px;float:left;height:auto;float:left;display:inline;overflow:hidden;border:1px solid #f3f3f3;background:#fff;border-top:none;margin-top:10px;padding-top:30px;}

.z-n-li0 {border-bottom:1px solid #eaeaea;width:650px;margin-left:34px;padding:0px 0px 12px 0px;}
.z-n-li0 a{width:650px;height:26px;line-height:26px;display:block;background:url(/home/images/news/z-ljt.jpg) no-repeat center right;color:#333;font-size:14px;text-indent:570px;font-size:16px;}
.z-n-li0 a:hover{color:#0033FF;font-size:16px;}
.z-news-con-l b{width:680px;height:27px;display:block;color:#333;font-size:16px;font-style:normal;font-weight:normal;}
.z-news-con-l p{padding:0;margin:0;width:650px;height:27px;display:block;color:#999;font-size:12px;}
.z-n-ps1{float:left;display:inline;}
.z-n-ps2{float:right;display:inline;background:url(/home/images/news/z-yan.jpg)  no-repeat center left;text-align:left;text-indent:24px;}
.z-n-ps3{width:650px;height:40px;display:block;color:#666;display:block;font-size:14px;padding-top:12px;}
.z-news-con-l img{width:650px;}
.z-n-li1{width:650px;height:38px;line-height:38px;border-bottom:1px solid #eaeaea;margin-left:34px;font-size:14px;background:url(/home/images/news/z-lis.jpg) no-repeat center left;text-indent:20px;}
.z-n-li1 a{width:500px;height:38px;line-height:38px;display:block;float:left;}
.z-n-li1 span{float:right;display:inline;color:#999;font-size:12px;}
.z-page{width:650px;height:auto;margin:0 auto;padding-top:15px;padding-bottom:15px;overflow:hidden;}
.z-page a{color:#999;border:1px solid #999;}
.z-page a:hover{color:#fff;background:#0033FF;border:1px solid #0033FF;}
.z-pg-1{width:60px;height:25px;line-height:25px;text-align:center;display:block;float:left;margin-right:10px;}
.z-pg-2{display:block;float:left;width:25px;height:25px;line-height:25px;margin-right:5px;text-align:center;}
.z-pg-3{display:block;float:left;width:25px;height:25px;line-height:25px;margin-right:5px;text-align:center;background:#0033FF;}

.z-news-con-r{width:450px;height:auto;float:right;display:inline;overflow:hidden;border-top:none;margin-top:10px;}
.z-news-r-1{width:448px;height: auto;border-bottom:1px solid #f3f3f3;border:1px solid #f3f3f3;background:#fff;}
.z-news-r-1 p{padding:0;margin:0;width:176px;height:40px;line-height:40px;color:#fff;background:#008CD6;text-align:center;display:block;font-size:18px;}
.z-news-r-1 ul{padding:0;width:448px;border-top:1px solid #f3f3f3;margin:0;display:block;}
.z-news-r-1 ul li{width:420px;height:65px;margin-top:15px;margin-left:15px;}
.z-news-r-1 ul li img{float:left;margin-right:10px;margin-top:5px;margin:0 auto;}
.z-news-r-1 ul li b{width:290px;height:26px;font-size:14px;display:block;float:right;margin:0 auto;font-style:normal;font-weight:normal;color:#333;}
/*.z-news-r-1 ul li span{width:290px;height:34px;font-size:12px;display:block;text-indent:25px;float:right;color:#999;}*/

.z-news-r-2{width:448px;height:auto;margin-top:16px;overflow:hidden;border:1px solid #f3f3f3;background:#fff;}
.z-news-r-2 p{padding:0;margin:0;width:176px;height:40px;line-height:40px;color:#fff;background:#008CD6;text-align:center;display:block;font-size:18px;}
.z-news-r-2 ul{padding:0;width:448px;border-top:1px solid #f3f3f3;margin-bottom:15px;display:block;height:331px;background:url(/home/images/news/z-paili.jpg) no-repeat center left;padding-top:15px;}
.z-news-r-2 ul li{padding:0;width:430px;height:33px;line-height:33px;text-indent:45px;background:url(/home/images/news/z-ljt2.jpg) no-repeat center right;font-size:14px;}
/*新闻详情页*/
.z-news-con-ls{width:715px;height:auto;float:left;display:inline;overflow:hidden;border:1px solid #f3f3f3;background:#fff;border-top:none;margin-top:50px;}
.z-news-con-tit{width:680px;height:40px;line-height:40px;text-align:center;border-bottom:1px dotted #f3f3f3;font-size:22px;margin:15px 0px 0px 18px;color:#333;}
.z-news-con-titda{width:360px;height:25px;line-height:25px;margin:0 auto;}
.z-news-detail{width:650px;padding:15px;line-height:2em;text-align:left;margin:0 auto;color:#5A646C;height:auto!important;min-height:843px;overflow:hidden;}
	.pagination {
  display: inline-block;
  padding-left: 0;
  margin: 20px 0;
  border-radius: 4px;
}
.pagination > li {
  display: inline;
}
.pagination > li > a,
.pagination > li > span {
  position: relative;
  float: left;
  padding: 6px 12px;
  margin-left: -1px;
  line-height: 1.42857143;
  color: #337ab7;
  text-decoration: none;
  background-color: #fff;
  border: 1px solid #ddd;
}
.pagination > li:first-child > a,
.pagination > li:first-child > span {
  margin-left: 0;
  border-top-left-radius: 4px;
  border-bottom-left-radius: 4px;
}
.pagination > li:last-child > a,
.pagination > li:last-child > span {
  border-top-right-radius: 4px;
  border-bottom-right-radius: 4px;
}
.pagination > li > a:hover,
.pagination > li > span:hover,
.pagination > li > a:focus,
.pagination > li > span:focus {
  z-index: 2;
  color: #23527c;
  background-color: #eee;
  border-color: #ddd;
}
.pagination > .active > a,
.pagination > .active > span,
.pagination > .active > a:hover,
.pagination > .active > span:hover,
.pagination > .active > a:focus,
.pagination > .active > span:focus {
  z-index: 3;
  color: #fff;
  cursor: default;
  background-color: #337ab7;
  border-color: #337ab7;
}
.pagination > .disabled > span,
.pagination > .disabled > span:hover,
.pagination > .disabled > span:focus,
.pagination > .disabled > a,
.pagination > .disabled > a:hover,
.pagination > .disabled > a:focus {
  color: #777;
  cursor: not-allowed;
  background-color: #fff;
  border-color: #ddd;
}
.pagination-lg > li > a,
.pagination-lg > li > span {
  padding: 10px 16px;
  font-size: 18px;
  line-height: 1.3333333;
}
.pagination-lg > li:first-child > a,
.pagination-lg > li:first-child > span {
  border-top-left-radius: 6px;
  border-bottom-left-radius: 6px;
}
.pagination-lg > li:last-child > a,
.pagination-lg > li:last-child > span {
  border-top-right-radius: 6px;
  border-bottom-right-radius: 6px;
}
.pagination-sm > li > a,
.pagination-sm > li > span {
  padding: 5px 10px;
  font-size: 12px;
  line-height: 1.5;
}
.pagination-sm > li:first-child > a,
.pagination-sm > li:first-child > span {
  border-top-left-radius: 3px;
  border-bottom-left-radius: 3px;
}
.pagination-sm > li:last-child > a,
.pagination-sm > li:last-child > span {
  border-top-right-radius: 3px;
  border-bottom-right-radius: 3px;
}
	</style>
@endsection('css')

@section('content')

  <div class="z-news">
       <div class="z-news1"></div>
	   <div class="z-news-con">
	       <div class="z-loc">当前位置：<a href="{{ url('/')}}">首页</a>&gt;&gt;<a href="#" onclick="return false">搜索</a></div>
	       <div class="z-news-conn">
	       <div class="z-news-con-l">
		       <ul>
		      
				@if(isset($data) && count($data) > 0)	
				@foreach($data as $k => $v)			  
				  <li class="z-n-li1"><a href="@if( isset($v->yuan) ) {{ url('/news/list/') }}/{{ $v->id }} @endif @if( isset($v->zhi) ) {{ url('/home/gongyi/play/') }}/{{ $v->id }} @endif @if( isset($v->pid) ) {{ url('/home/plate/play/') }}/{{ $v->id }} @endif">{{ $v->title }}</a><span>{{ date('Y-m-d',$v->time) }}</span></li>
				@endforeach
				@else
				<li style="margin-left:320px;margin-bottom:30px;font-size:15px">未搜索到文章</li>

				@endif
			   </ul><div style="clear:both;"></div>
			   @if( count($data) > 0) 
			   <div class="z-page" style="text-algin:center">{{ $data->links() }}</div>
			   @endif
		   </div>
		   @if(isset($other) && count($other) > 0)	
		   <div class="z-news-con-l">
		   		<title style="width:100px;margin:0 auto;display:block;font-size:16px;padding-left:22px;">其他文章推荐</title>
		       <ul>
		
				@foreach($other as $z => $s)			  
				  <li class="z-n-li1"><a href="@if( isset($s->yuan) ) {{ url('/news/list/') }}/{{ $s->id }} @endif @if( isset($s->zhi) ) {{ url('/home/gongyi/play/') }}/{{ $s->id }} @endif @if( isset($s->pid) ) {{ url('/home/plate/play/') }}/{{ $s->id }} @endif">{{ $s->title }}</a><span>{{ date('Y-m-d',$s->time) }}</span></li>
				@endforeach

				
			   </ul><div style="clear:both;"></div>
			   
		   </div>
		   @endif
		   </div>

	       <div class="z-news-con-r">
		   

			  <div style="clear:both;"></div>		  
			  <div class="z-news-r-2">
			      <p>热点点击</p>
				  <ul>
				  	@if(isset($xun) && count($xun)>0)
				  	@foreach($xun as $kk => $vv)
				     <li><a href="@if( isset($vv->yuan) ) {{ url('/news/list/') }}/{{ $vv->id }} @endif @if( isset($vv->zhi) ) {{ url('/home/gongyi/play/') }}/{{ $vv->id }} @endif @if( isset($vv->pid) ) {{ url('/home/plate/play/') }}/{{ $vv->id }} @endif">@php echo mb_substr($vv->title,0,26,'utf8')."‥" @endphp</a></li> 
					@endforeach
				  	@endif

				  </ul>
			  </div>
		   </div>
	   </div>
  </div>
@endsection('content')