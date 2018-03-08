@extends('Newpro.Home.publiccenter')

@section('css')
<link rel="stylesheet" href="{{ asset('new/home/center/my_orders_details.css') }}">
@endsection('css')

@section('content')
<div class="contact_right">
        <div class="title">服务记录</div>
        <div class="dindanh">订单号：5566644125632154</div>
        <div class="Order">
            <div class="state">已收货</div>
            <div class="Speed">
                <div class="Place avtive">
                    <span class="text">下单</span>
                    <span class="time">{{ date('Y年m月d日 H:i:s',$data->times[0]) }}</span>
                </div>
                <div class="payment @if($data->status == 1) avtive @endif">
                    <span class="text">付款</span>
                    <span class="time">@if($data->status == 1) {{ date('Y年m月d日 H:i:s',$data->times[1]) }} @endif</span>
                </div>
                <div class="Distribution @if($data->status == 2) avtive @endif">
                    <span class="text">配货</span>
                    <span class="time">@if($data->status == 2) {{ date('Y年m月d日 H:i:s',$data->times[2]) }} @endif</span>
                </div>
                <div class="Acceptance @if($data->status == 3) avtive @endif">
                    <span class="text">交货</span>
                    <span class="time">@if($data->status == 3) {{ date('Y年m月d日 H:i:s',$data->times[3]) }} @endif</span>
                </div>
                <div class="Success @if($data->status == 4) avtive @endif">
                    <span class="text">交易成功</span>
                    <span class="time">@if($data->status == 4) {{ date('Y年m月d日 H:i:s',$data->times[4]) }} @endif</span>
                </div>
            </div>
            <div class="Shop">
                <div class="Shop_top">
                    <div class="shop_loop">商品名称</div>
                    <div class="shop_loop">属性</div>
                    <div class="shop_loop">数量</div>
                    <div class="shop_loop">价格</div>
                </div>
                @foreach($data->detail as $k => $v)
                <div class="Shop_top">
                    <div class="shop_loop">{{ $v->name }}</div>
                    <div class="shop_loop">{{ $v->ors }}</div>
                    <div class="shop_loop">{{ $v->num }}</div>
                    <div class="shop_loop">{{ $v->prince }}</div>
                </div>
                @endforeach
            </div>
            <div class="personal">
                <div class="biaoti">个人信息</div>
                <div class="name">姓 名： {{ $data->linkman }}</div>
                <div class="name">联系电话： {{ $data->phone }}</div>
                <div class="name">收货地址： {{ $data->address }}</div>
            </div>
            <div class="personal">
                <div class="biaoti">支付及时间</div>
                <div class="name">支付方式： @if($data->payors) {{ $data->payors }} @else 未支付 @endif</div>
                <div class="name">完成时间： @if( isset($data->times[1]) ) {{ date('Y年m月d日 H:i:s',$data->times[1]) }} @else 未支付 @endif</div>
            </div>
        </div>
    </div>
@endsection('content')

@section('js')
<script src="{{ asset('new/home/center/my_orders_details.js') }}"></script>
@endsection('js')