@extends('Newpro.Home.public')

@section('css')
<link rel="stylesheet" href="{{ asset('/new/home/newslist/sou.css') }}">
@endsection('css')

@section('content')
<div class="banner">
    <img src="{{ asset('/new/home/newslist/img/News_bg.png') }}" alt=""/>
</div>

<div class="information">
    <div class="title">搜索新闻<img src="{{ asset('/new/home/newslist/img/red_x.png') }}" alt=""/></div>
    <div class="inf_a"> 
        <a href="{{ url('/newpro/newslist/1') }}"  class="avtive" >搜索新闻</a>
        
    </div>
    <div class="Nws">
        <!--左边-->
        <div class="information_left">
            <i></i>
          
            <!--循环的资料-->
            <div class="data">
                @if(count($data) > 0)
                @foreach($data as $k => $v)
                <a href="{{ url('/newpro/newslist/play') }}/{{ $v->id }}" class="loop">
                    <img src="@if($v->titleimg[0] == 'h') {{ $v->titleimg }} @else {{ asset('/uploads/news/titleimg/'.$v->titleimg) }} @endif" alt=""/>
                    <div class="loop_right">
                        <div class="name">@php echo $v->title @endphp</div>
                        <div class="content">
                            {{ $v->leicon }}
                        </div>
                        <div class="time">
                            <span>浏览数：{{ $v->click }}</span>
                            <span class="i"></span>
                            <span>{{ date('Y-m-d',$v->time) }}</span>
                        </div>
                    </div>
                </a>
                @endforeach
                @else
				<a href="javascript:;" class="loop">
                    <div style="width:100%;height:30px;display:block;text-algin:center">
                       没有找的关于 @if(isset($request['sou'])){{$request['sou']}}@endif 的新闻
                    </div>
                </a>
                <a href="javascript:;" class="loop">
                    <div style="width:100%;height:30px;display:block;text-algin:center">
                       其他新闻推荐
                    </div>

                </a>
                @foreach($tus as $k => $v)
                <a href="{{ url('/newpro/newslist/play') }}/{{ $v->id }}" class="loop">
                    <img src="{{ asset('/uploads/news/titleimg/') }}/{{  $v->titleimg }}" alt=""/>
                    <div class="loop_right">
                        <div class="name">{{ $v->title }}</div>
                        <div class="content">
                            {{ $v->leicon }}
                        </div>
                        <div class="time">
                            <span>浏览数：{{ $v->click }}</span>
                            <span class="i"></span>
                            <span>{{ date('Y-m-d',$v->time) }}</span>
                        </div>
                    </div>
                </a>
                @endforeach
                @endif
            </div>
            <div class="page">
            	{{ $data->links() }}
                <!-- <div class="paging_r">
                    <a href="javascript:;" class="Previous">上一页</a>
                    <a href="javascript:;" class="avtive">1</a>
                    <a href="javascript:;">2</a>
                    <a href="javascript:;">3</a>
                    <a href="javascript:;">4</a>
                    <a href="javascript:;">5</a>
                    <a href="javascript:;">...</a>
                    <a href="javascript:;">21</a>
                    <a href="javascript:;" class="Previous">下一页</a>
                </div> -->
            </div>
        </div>
        <!--右边-->
        <div class="Notice">
        	@if(count($ors) > 0)
        	@foreach($ors as $key => $val)
            <div class="Notice_first">
                <i></i>
                <div class="name"><a href="{{ url('/newpro/newslist?pid=') }}{{ $val->title }}">{{ $val->title }}</a></div>
                @if(count($val->data) > 0 )
                @foreach($val->data as $keys => $value)
                <a href="{{ url('/newpro/newslist/play/'.$value->id) }}" class="loop">
                    <span>{{ $value->title }}</span>
                    <div class="content">@if(mb_strlen($value->leicon) > 55 ) {{ mb_substr($value->leicon,0,55,'utf8') }} 
                    ... @else {{ $value->leicon }}  @endif </div>
                </a>
                @endforeach()
                @else
				<a href="javascript:;" class="loop">暂无更多新闻推荐</a>
                @endif
            </div>
            @endforeach
            @endif
        </div>
    </div>

</div>
@endsection('content')

@section('js')
<script src="{{ asset('/new/home/newslist/sou.js') }}"></script>
@endsection('js')