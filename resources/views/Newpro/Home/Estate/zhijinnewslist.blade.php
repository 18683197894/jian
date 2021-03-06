@extends('Newpro.Home.public')

@section('css')
<link rel="stylesheet" href="{{ asset('/new/home/estate/zhijin/zhijin.css') }}">
<link rel="stylesheet" href="{{ asset('/new/home/estate/zhijin/zhijinnewslist.css') }}">
@endsection('css')

@section('content')
<div class="content">
    <div class="estate_zj">
        <div class="auto">
            <div class="img">
                <div class="img_top">
                    <a href="javascript:;" class="avtive">
                        <img src="{{ asset('/new/home/estate/zhijin/img/estate_zj1.png') }}" alt=""/>
                    </a>
                    <a href="javascript:;" class="">
                        <img src="{{ asset('/new/home/estate/zhijin/img/estate_zj2.png') }}" alt=""/>
                    </a>
                </div>
                <div class="img_click">
                    <a href="javascript:;" class="avtive">
                        <img src="{{ asset('/new/home/estate/zhijin/img/estate_zj1.png') }}" alt=""/>
                    </a>
                    <a href="javascript:;" class="">
                        <img src="{{ asset('/new/home/estate/zhijin/img/estate_zj2.png') }}" alt=""/>
                    </a>

                </div>
            </div>
            <div class="loupan">
                <div class="top">
                    <div class="name">织金.织金万都铭城</div>
                    <p>贵州-毕节</p>
                    <div class="nve">
                        <div>商业区</div>
                        <div>低密度</div>
                        <div>改善盘</div>
                    </div>
                    <div class="jiage">
                        <span>楼盘均价</span><span class="num">3800/m²</span><span>(2017年参考价)</span>
                    </div>
                </div>
                <div class="time">
                    <div class="time_loop">开盘时间: </div>
                    <div class="time_loop">入住时间: </div>
                    <div class="time_loop">物业类型: 商铺 住宅</div>
                    <div class="time_loop">楼盘地址: 织金县金北大道与环城路交叉口</div>
                </div>
                <div class="lianx">
                    <img src="{{ asset('/new/home/estate/defu/img/estate_dian.gif') }}" alt=""/>
                    <span>400-188-6585  咨询楼盘信息</span>
                </div>
            </div>
        </div>
    </div>
    <div class="zhijin_New">
        <div class="top">
            <div class="left">新闻动态</div>
            <a href="{{ url('/newpro/estate/zhijin/') }}" class="right">返回</a>
        </div>

        @foreach($data as $k => $v)
        <div class="loop">
            <div class="left">{{ $v->pidname }}</div>
            <div class="right">
                <a href="{{ url('/newpro/estate/zhijin/newsplay/') }}/{{ $v->id }}" class="title">{{ $v->title }}</a>
                <div class="jianjie">
                    {{ $v->leicon }}
                    <a href="{{ url('/newpro/estate/zhijin/newsplay/') }}/{{ $v->id }}">【详情】</a>
                </div>
            </div>
        </div>
        @endforeach
      <div class="page"> {{ $data->links() }}</div>
    </div>
</div>
@endsection('content')

@section('js')

@endsection('js')