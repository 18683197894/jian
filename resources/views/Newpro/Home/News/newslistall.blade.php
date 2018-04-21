@extends('Newpro.Home.public')

@section('css')
<link rel="stylesheet" href="{{ asset('/new/home/newslist/newslist.css') }}">
@endsection('css')

@section('content')
<div class="banner">
    <img src="{{ asset('/new/home/newslist/img/News_bg.png') }}" alt=""/>
</div>

<div class="information">
    <div class="title">新闻动态<img src="{{ asset('/new/home/newslist/img/red_x.png') }}" alt=""/></div>
    <div class="inf_a"> 
        <a href="{{ url('/newpro/newslist/1') }}" >公司公告</a>
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
                @else
				<a href="javascript:;" class="loop">
                    <div style="width:100%;height:30px;display:block;text-algin:center">
                       没有新闻
                    </div>
                </a>
                @endif
            </div>
            <div class=" page">
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
                <div class="name"><a href="{{ url('/newpro/newslist/') }}/{{ $val->id }}">{{ $val->title }}</a></div>
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
<script src="{{ asset('/new/home/newslist/newslist.js') }}"></script>
@endsection('js')