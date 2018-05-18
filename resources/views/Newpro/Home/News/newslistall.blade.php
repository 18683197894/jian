@extends('Newpro.Home.public')

@section('css')
<link rel="stylesheet" href="{{ asset('/new/home/newslist/newslist.css') }}">
@endsection('css')

@section('content')
<div class="banner">
    <img src="{{ asset('/new/home/newslist/img/News_bg.png') }}" alt=""/>
    
</div>

<div class="information">
    <div class="title">
        <div class="auto">
        @foreach($lei as $k => $v)
            <a href="javascript:" @if($avtive == $v->title) class="avtive" @endif>{{ $v->title }}</a>
        @endforeach
        <a href="javascript:" @if($avtive == '常见问答') class="avtive" @endif>常见问答</a>
        </div>
    </div>

    <div class="Nws">
        <!--左边-->
        <div class="information_left">
            <i></i>
            <!--循环的资料-->
            <div class="data">
                @foreach($lei as $k => $v)
                <div pid="{{ $v->id }}" @if(count($v->news) < 12) init="false" @else init="true"@endif index="{{ count($v->news) }}" class="xuanx @if($avtive == $v->title) avtive @endif">
                    @foreach($v->news as $kk => $vv)
                    <a href="{{ url('/newpro/newslist/play') }}/{{ $vv->id }}" class="loop">
                        <img src="{{ asset('/uploads/news/titleimg/') }}/{{  $vv->titleimg }}" alt="{{ $vv->title }}"/>
                        <div class="loop_right">
                            <div class="name">{{ $vv->title }}</div>
                            <div class="content">
                                {{ $vv->leicon }}
                            </div>
                            <div class="time">
                                <span>浏览数：{{ $vv->click }}</span>
                                <span class="i"></span>
                                <span>{{ date('Y-m-d',$vv->time) }}</span>
                            </div>
                        </div>
                    </a>
                    @endforeach
                <div class="more" @if(count($v->news) < 12) style="display:block" @else style="display:none" @endif>暂无更多</div>

                </div>
                @endforeach
                <div class="xuanx @if($avtive == '常见问答') avtive @endif " pid="inter" index="{{ count($inter) }}" @if(count($inter) < 20) init="false" @else init="true" @endif>
                    @foreach($inter as $k => $v)
                    
                        <div class="wenda">
                            <div class="wen" id="{{ $v->id }}">
                                {{ $v->title }}
                                <span class="add">+</span>
                            </div>
                            <div class="da">
                                {{ $v->content }}
                            </div>
                        </div>
                    
                    @endforeach
                    <div class="more" @if(count($inter) < 20) style="display:block" @else style="display:none" @endif>暂无更多</div>

                </div>
            </div>
        </div>
        <!--右边-->
       <div class="Hotspot">
                <div class="Hotspot_name">热点点击</div>
                <div class="Hotspot_loop">
                    @foreach($hot as $k => $v)
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
@endsection('content')

@section('js')
<script src="{{ asset('/new/home/newslist/newslist.js') }}"></script>
@endsection('js')