@extends('Newpro.Home.public')

@section('css')
<link rel="stylesheet" href="{{ asset('/new/home/smart/businsmart/businsmart.css') }}">
@endsection('css')

@section('content')
<!--banner-->
<div class="Trading_banner">
    <img src="{{ asset('/new/home/smart/businsmart/img/Trading_banner.png') }}" alt=""/>
</div>

<div class="Trading_Real">
    <div class="name">住宅地产智慧商圈</div>
    <div class="Trading_Real_brief">一站式智慧社区解决方案</div>
    <div class="Access">
        <div class="Access_text">
            <div class="Access_text_auto">
                <div class="E_title">Intelligent entrance gua</div>
                <div class="titel">智慧门禁管理模式</div>
                <i></i>
                <div class="contact">
                    智慧门禁管理模块在公共区域设立通道闸机，无论内部工作人员还是外来访客均需通过权限认证后方可通过闸机，有效预防外来人员随意进出大厦，严格的控制了人员的活动区域。对于人员的进出有准确的时间记录，并将流量沉淀在系统当中，为之后的商业转化沉淀信息。
                </div>
                <div class="Access_a">
                    <span>高效辨认身份</span>
                    <span>数据长时留存</span>
                    <span>隐性数据引流</span>
                    <span>精准录入出入信息</span>
                    <span>杜绝闲人打扰与安全隐患</span>
                </div>
            </div>
        </div>
        <img src="{{ asset('new/home/smart/businsmart/img/Access_img.png') }}" alt="" class="Access_img"/>
    </div>
</div>

<div class="Elevator">
    <div class="Elevator_Modular">
        <div class="title">智慧电梯模块</div>
        <i></i>
        <a href="javascript:;">分层乘梯授权</a>
        <a href="javascript:;">数据长时留存</a>
        <a href="javascript:;">延长使用寿命</a>
        <a href="javascript:;">节约能源降低成本</a>
        <a href="javascript:;">隐性数据引流</a>
        <a href="javascript:;">杜绝闲人打扰与安全隐患</a>
    </div>
</div>

<div class="Parking">
    <div class="title">智慧停车管理模块</div>
    <div class="Parking_auto">
        <a href="javascript:;">
            <img src="{{ asset('/new/home/smart/businsmart/img/Parking1.png') }}" alt=""/>
            <div class="text">手机支付费用</div>
        </a>
        <a href="javascript:;">
            <img src="{{ asset('/new/home/smart/businsmart/img/Parking2.png') }}" alt=""/>
            <div class="text">进出无需人工管理</div>
        </a>
        <a href="javascript:;">
            <img src="{{ asset('/new/home/smart/businsmart/img/Parking3.png') }}" alt=""/>
            <div class="text">数据长时留存</div>
        </a>
        <a href="javascript:;">
            <img src="{{ asset('/new/home/smart/businsmart/img/Parking4.png') }}" alt=""/>
            <div class="text">自动记录车牌与计费</div>
        </a>
    </div>
</div>

<img src="{{ asset('/new/home/smart/businsmart/img/energy.png') }}" alt="" class="energy"/>
@endsection('content')

@section('js')

@section('js')