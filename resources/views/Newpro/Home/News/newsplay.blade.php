@extends('Newpro.Home.public')

@section('css')
<link rel="stylesheet" href="{{ asset('/new/home/newslist/newsplay.css') }}">
@endsection('css')

@section('content')
<div class="banner">
    <img src="{{ asset('/new/home/newslist/img/News_bg.png') }}" alt=""/>
</div>

<div class="contact">
    <div class="position">
        当前位置：<a href="{{ url('/') }}">首页</a>><a href="{{ url('/newpro/newslist?pid=') }}{{ $pid->title }}">{{ $pid->title }}</a>><a href="javascript:;">新闻详情</a>
    </div>
    <div class="NewS">
        <div class="NewS_Left">
            <div class="title">{{ $data->title }}</div>
            <div class="time">
                来源：{{ $data->yuan }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;日期：{{ date('Y年m月d日',$data->time) }}
                <span>{{ $data->click }}</span>
            </div>
            <div class="detail" style="font-size:16px">
                @php     echo $data->content     @endphp
            </div>
        </div>
        <div class="NewS_Right">
        	@if($ban->count() > 0)
            <div class="plate">
                <div class="plate_name">新闻板块推荐</div>
                <ul>
                	@foreach($ban as $k => $v)
                    <li>
                        <a href="{{ url('/newpro/newslist?pid=') }}{{ $v->title }}">
                            <img src="{{ asset('/uploads/news/img/') }}/{{ $v->img }}" alt=""/>
                            <span>{{ $v->title }}</span>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="Hotspot">
                <div class="Hotspot_name">热点点击</div>
                <div class="Hotspot_loop">
                	@foreach($click as $k => $v)
                    <a href="{{ url('/newpro/newslist/play') }}/{{ $v->id }}">
                        <div class="num">{{ $loop->index + 1 }}</div>
                        <div class="name">{{ $v->title }}</div>
                        <i></i>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection('content')

@section('js')

@endsection('js')