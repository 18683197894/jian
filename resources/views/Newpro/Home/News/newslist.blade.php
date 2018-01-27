@extends('Newpro.Home.publicused')

@section('css')
<link rel="stylesheet" href="{{ asset('/new/home/newslist/newslist.css') }}">
@endsection('css')

@section('content')
<div class="banner">
    <img src="{{ asset('/new/home/newslist/img/News_bg.png') }}" alt=""/>
</div>

<div class="information">
    <div class="title">{{ $title->title }} <img src="{{ asset('/new/home/newslist/img/red_x.png') }}" alt=""/></div>

    <div class="Nws">
        <!--左边-->
        <div class="information_left">
            <i></i>
            @if(count($zhi) > 0)
            <div class="titel">{{ $zhis->title or '推荐新闻' }}</div>
            <div class="brief ">{{ $zhis->title or '' }}</div>
            <!--轮播-->
            <div class="area">

                <a id="prev" class="prevBtn qq" href="javascript:void(0)"></a>

                <a id="next" class="nextBtn qq" href="javascript:void(0)"></a>

                <div id="js" class="js">

                    <div class="box01">
                    @foreach($zhi as $i => $j)
                        <div class="banner1">
                            <img onClick="location.href='{{ url('/newpro/newslist/play/'.$j->id) }}'"  width="100%" height="100%" src="{{ asset('uploads/news/banimg') }}/{{ $j->img }}">
                            <a href="{{ url('/newpro/newslist/play/'.$j->id) }}"><div class="titlel">{{ $j->title }}</div></a>
                        </div>
                    @endforeach
                    </div>
                    <div class="bg"></div>

                    <div id="jsNav" class="jsNav">

                        <a class="trigger imgSelected" href="javascript:void(0)"></a>

                        <a class="trigger" href="javascript:void(0)"></a>

                        <a class="trigger" href="javascript:void(0)"></a>

                        <a class="trigger" href="javascript:void(0)"></a>

                    </div>

                </div>

            </div>
            @endif
            <!--循环的资料-->
            <div class="data">
                @if(count($data) > 0)
                @foreach($data as $k => $v)
                <a href="javascript:;" class="loop">
                    <img src="{{ asset('/new/home/newslist/img/Nws_loop.png') }}" alt=""/>
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
            <div class="paging">
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