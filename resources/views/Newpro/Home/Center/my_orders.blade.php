@extends('Newpro.Home.publiccenter')

@section('css')
<link rel="stylesheet" href="{{ asset('new/home/center/my_orders.css') }}">
@endsection('css')

@section('content')
<div class="contact_right">
        <div class="title">我的订单</div>
        <div class="My_order">
            <a href="javascript:;" @if($orss == 'pay_s') class="avtive" @endif>全部订单</a>
            <a href="javascript:;" @if($orss == 'pay_y') class="avtive" @endif>已支付</a>
            <a href="javascript:;" @if($orss == 'pay_n') class="avtive" @endif>待支付</a>
        </div>
        <div class="goods">

            <div class="goods_loop avtive">
                @foreach($data as $k => $v)
                <div class="goods_loop_a">
                    <div class="top">
                        <div class="auto">
                            <div class="left">
                                <div class="left_title">{{ $v->statuss }}</div>
                                <div class="time">
                                    <span>{{ date('Y年m月d日 H:i:s',$v->addtime) }}</span>
                                    <i></i>
                                    <span>订单号：{{ $v->_token }}</span>
                                    <i></i>
                                    <span>在线支付</span>
                                </div>
                            </div>
                            <div class="right">
                                订单金额：<span>{{ $v->total }}</span>元
                            </div>
                        </div>
                    </div>
                    <div class="shop">
                        <div class="auto">
                            <div class="left">
                                <div class="name"></div>
                                <div class="con"></div>
                            </div>
                            <div class="right">
                                <a href="javascript:;">订单详情</a>
                            </div>
                            @if($v->status == 0)
                            <div class="jili">
                                <a href="{{ url('/newpro/payments?payid=') }}{{ $v->zid.',' }}">立即支付</a>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="xinc">
                        <div class="auto">
                            <div class="left">
                                <div class="Detailed_name">名称</div>
                                <div class="shuxin">属性</div>
                                <div class="num">数量</div>
                            </div>
                            @foreach($v->detail as $kk => $vv)
                            <div class="left">
                                <div class="Detailed_name">{{ $vv->name }}</div>
                                <div class="shuxin">{{ $vv->ors }}</div>
                                <div class="num">{{ $vv->num }}</div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            
            <div class="goods_loop">

                @foreach($data as $k => $v)
                @if($v->status ==1)
                <div class="goods_loop_a">
                    <div class="top">
                        <div class="auto">
                            <div class="left">
                                <div class="left_title">{{ $v->statuss }}</div>
                                <div class="time">
                                    <span>{{ date('Y年m月d日 H:i:s',$v->addtime) }}</span>
                                    <i></i>
                                    <span>订单号：{{ $v->_token }}</span>
                                    <i></i>
                                    <span>在线支付</span>
                                </div>
                            </div>
                            <div class="right">
                                订单金额：<span>{{ $v->total }}</span>元
                            </div>
                        </div>
                    </div>
                    <div class="shop">
                        <div class="auto">
                            <div class="left">
                                <div class="name"></div>
                                <div class="con"></div>
                            </div>
                            <div class="right">
                                <a href="javascript:;">订单详情</a>
                            </div>
                            @if($v->status == 0)
                            <div class="jili">
                                <a href="{{ url('/newpro/payments?payid=') }}{{ $v->zid.',' }}">立即支付</a>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="xinc">
                        <div class="auto">
                            <div class="left">
                                <div class="Detailed_name">名称</div>
                                <div class="shuxin">属性</div>
                                <div class="num">数量</div>
                            </div>
                            @foreach($v->detail as $kk => $vv)
                            <div class="left">
                                <div class="Detailed_name">{{ $vv->name }}</div>
                                <div class="shuxin">{{ $vv->ors }}</div>
                                <div class="num">{{ $vv->num }}</div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
            
            <div class="goods_loop">
                 @foreach($data as $k => $v)
                @if($v->status ==0)
                <div class="goods_loop_a">
                    <div class="top">
                        <div class="auto">
                            <div class="left">
                                <div class="left_title">{{ $v->statuss }}</div>
                                <div class="time">
                                    <span>{{ date('Y年m月d日 H:i:s',$v->addtime) }}</span>
                                    <i></i>
                                    <span>订单号：{{ $v->_token }}</span>
                                    <i></i>
                                    <span>在线支付</span>
                                </div>
                            </div>
                            <div class="right">
                                订单金额：<span>{{ $v->total }}</span>元
                            </div>
                        </div>
                    </div>
                    <div class="shop">
                        <div class="auto">
                            <div class="left">
                                <div class="name"></div>
                                <div class="con"></div>
                            </div>
                            <div class="right">
                                <a href="javascript:;">订单详情</a>
                            </div>
                            @if($v->status == 0)
                            <div class="jili">
                                <a href="{{ url('/newpro/payments?payid=') }}{{ $v->zid.',' }}">立即支付</a>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="xinc">
                        <div class="auto">
                            <div class="left">
                                <div class="Detailed_name">名称</div>
                                <div class="shuxin">属性</div>
                                <div class="num">数量</div>
                            </div>
                            @foreach($v->detail as $kk => $vv)
                            <div class="left">
                                <div class="Detailed_name">{{ $vv->name }}</div>
                                <div class="shuxin">{{ $vv->ors }}</div>
                                <div class="num">{{ $vv->num }}</div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
        </div>
    </div>
@endsection('content')

@section('js')
<script src="{{ asset('/new/home/center/my_orders.js') }}"></script>
@endsection('js')