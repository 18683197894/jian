@extends('Newpro.Home.publiccenter')

@section('css')
<link rel="stylesheet" href="{{ asset('/new/home/center/my_personal.css') }}">
@endsection('css')

@section('content')
 <div class="contact_right">
        <div class="Personal_top">
            <div class="auto">
                <div class="left">
                    <img src="{{ asset('/new/home/center/img/touxiang.png') }}" alt=""/>
                    <div class="xinxi">
                        <div class="name">{{ session('Home')->name }}</div>
                        <!-- <div class="gexin">开启装逼生活</div> -->
                        <a href="{{ url('/newpro/center/my_metion') }}" style="margin-top:15px">修改个人资料></a>
                    </div>
                </div>
                <div class="left">
                    <div class="zhanghao">账号安全：<span>普通</span></div>
                    <div class="shouji">绑定手机：{{ session('Home')->phone }}</div>
                    <!-- <div class="youxiang">绑定邮箱：12345678911@qq.com</div> -->
                </div>
            </div>
        </div>
        <div class="Personal_dd">
            <div class="auto">
                <div class="loop">
                    <img src="{{ asset('/new/home/center/img/daizhifu.png') }}" alt=""/>
                    <div class="text">
                        <div class="num">待支付订单：<span>{{ $a }}</span></div>
                        <a href="{{ url('newpro/center/my_orders?ors=pay_n') }}">查看待支付订单></a>
                    </div>
                </div>
                <div class="loop">
                    <img src="{{ asset('/new/home/center/img/shouhuo.png') }}" alt=""/>
                    <div class="text">
                        <div class="num">待收货订单：<span>{{ $b }}</span></div>
                        <a href="{{ url('newpro/center/my_orders?ors=pay_y') }}">查看待收货订单></a>
                    </div>
                </div>
            </div>
        </div>
 </div>
@endsection('content')

@section('js')

@endsection('js')