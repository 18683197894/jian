@extends('Newpro.Home.public')

@section('css')
<link rel="stylesheet" href="{{ asset('/new/home/product/productplay.css') }}">
@endsection('css')

@section('content')
<div class="banner">
    <img src="{{ asset('/new/home/product/img/Product_bannrr.jpg') }}" alt=""/>
</div>
<div class="Product_page">
    <div class="Title">
        <div class="name">产品展示</div>
        <div class="En">Prouduct Display</div>
        <i class="xh"></i>
    </div>
    <div class="Sort">
        
        @foreach($product as $k => $v)
        <a href="{{ url('/newpro/product?pid=') }}{{ $v->title }}" @if( $goods->pid == $v->id ) class="avtive" @endif>
            <img src="{{ asset('/uploads/product/img') }}/{{ $v->imgs[0] }}" alt="" class="default"/>
            <img src="{{ asset('/uploads/product/img') }}/{{ $v->imgs[1] }}" alt="" class="hove"/>
            <span class="name">{{ $v->title }}</span>
        </a>
      	@endforeach

    </div>
    <div class="Shop">
        <div class="tupian">
            <div class="bg_left">
                <div class="show">
                        <img src="{{ asset('/uploads/product/img/') }}/{{ $goods->imgs[0] }}" alt="">
                    <div class="mask"></div>
                </div>
                <div class="smallshow">
                    <p class="prev prevnone"></p>
                    <div class="middle_box">
                        <ul class="middle">
                        @foreach($goods->imgs as $k => $v)
                            <li><img src="{{ asset('/uploads/product/img/') }}/{{ $v }}" alt=""></li>
                        @endforeach
                        </ul>
                    </div>
                    <p class="next "></p>
                </div>
            </div>
            <div class="bg_right">
                <div class="bigshow">
                    <div class="bigitem">
                        <img src="{{ asset('/uploads/product/img/') }}/{{ $goods->imgs[0] }}" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="pgd">
            <div class="tit">
                {{ $goods->title }}
            </div>
            <div class="tagcon">
                <div class="tag">{{ $goods->brand }}</div>
            </div>
            <div class="msg">型号：{{ $goods->model }}</div>
            <div class="pit">
                产品尺寸：{{ $goods->spec }}
            </div>
            <div class="zixun">
                <a href="tencent://message/?uin=2022509729&Site=2022509729&Menu=yes" class="ljzx">立即咨询</a>
                <i>产品详情：</i>
                <span>{{ $goods->remarks }}</span>
            </div>
        </div>
        <div class="attribute">
            <div class="qita">
                <div class="title">其他产品</div>
                @foreach($other as $k => $v)
                <a href='{{ url("/newpro/product/play/{$v->id}") }}' class="sop">
                    {{$v->title}}
                </a>
                @endforeach
            </div>
            <div class="co">
                <div class="bod">
                    <a href="javascript:;">
                        产品详情
                    </a>
                </div>
                <div class="conne">
                    <!--这里面是产品详情介绍-->
                    <?php
                    	echo $goods->content;
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div style="height: 200px"></div>
@endsection('content')

@section('js')
<script src="{{ asset('/new/home/product/mag.js') }}"></script>
<script>
    $(function(){
        /*
         show  //正常状态的框
         bigshow   // 放大的框的盒子
         smallshow  //缩小版的框
         mask   //放大的区域（黑色遮罩）
         bigitem  //放大的框
         */
        var obj = new mag('.show', '.bigshow','.smallshow','.mask','.bigitem');
        obj.init();
    });
</script>
@endsection('js')