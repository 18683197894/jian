<!doctype html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <title>{{ config('app.name') }}@if(!empty($title))  - {{$title}}@endif</title>
<link href="{{ asset('home/images/images/common.css') }}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="{{ asset('/home/images/payment/shoppingcart/common.css') }}">
<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="{{ asset('/js/jquery-1.8.3.min.js') }}"></script>
</head>
<body>
        <div id="hade-a">
                <div id="hade-b">
                        <div id="login">
                                <ul>
                                        <li id="loginli1">热线电话：400-188-6585</li>
                                        <li id="loginli2"></li>
                                        <li id="loginli1"><a href="{{ asset('/home/shoppingcart') }}">购物车</a></li>
                                        <li id="loginli2"></li>
                                        <li id="loginli1"><a href="#">{{ \session('Home')->name }}</a></li>
                                </ul>
                        </div>
                </div>
        </div>
        <div id="hade-con">
                <div id="con1">
                        <a href="{{ asset('/') }}"><img id="con1img1" src="{{ asset('/home/images/logo.png') }}" alt=""></a>
                        <ul>
                                <li id="con1li1"><img src="{{ asset('/home/images/hade_2.png') }}" alt=""></li>
                                <li id="con1li2">免费量房与报价</li>
                                <li id="con1li3"><img src="{{ asset('/home/images/hade_1.png') }}" alt=""></li>
                                <li id="con1li4">装修公司实力认证</li>
                                <li id="con1li5"> </li>
                                <li id="con1li6">提交订单</li>
                        </ul>
                </div>
                <div class="payment_hader">
                        <title>选择收货地址</title>
                        <ul class="dizhiul">
                                <li class="dizhili" style="display:none">
                                <div>

                                        <title></title>
                                        <span></span>
                                        <div>
                                        <button name="edit" style="margin-left:21px;" class="payment_hader_butl">编辑</button>
                                        <button name="del"  class="payment_hader_butd"  style='display:block'>删除</button>
                                        </div>

                                </div>
                                </li>
                                @if(count($address) > 0)
                                @foreach($address as $z => $j)
                                <li index="{{ $j->id }}">
                                <div @if($j->status == 1) class="payment_hader_defult" @endif>

                                        <title name="">{{ $j->shen.$j->shi }} （{{$j->name}}）</title>
                                        <span>{{ $j->tails }}</span>
                                        <div>
                                        <button name="edit" style="margin-left:21px;" class="payment_hader_butl">编辑</button>
                                        <button name="del"  class="payment_hader_butd" @if($j->status == 1) style='display:none' @endif >删除</button>
                                        </div>

                                </div>
                                </li>
                                @endforeach
                                @endif

                        </ul>
                        <button class="btn1">使用新地址</button>
                </div>

                <div class="m-modal">
                        <div class="m-modal-dialog">
                                <div class="m-top">
                                        <h3 class="m-modal-title">
                                                添加收货地址
                                        </h3>
                                        <span class="m-modal-close">&times;</span>
                                </div>
                                <div class="m-middle">
                                        <!--content-->
                                        <label class="paymentfrom1_1" for="" style="padding-top:7px;">
                                                <input type="text" class="payment_input_name" name="name"  placeholder="姓名">
                                                <input type="text" class="payment_input_phone" name="phone"  placeholder="手机号">
                                        </label>

                                        <label class="paymentfrom1_1 paymentselect" for="" style="height:55px;margin-top:15px;" >
<div class="demo">
        <dl class="select">
                <dt class="dt1" index="">选择省</dt>
                <dd>
                        <ul class="paymentshens">
                                <li class="paymentshen"><a href="#" index="00" title="选择省">选择省</a></li>
                                @foreach( $shen as $k => $v )
                                <li class="paymentshen"><a href="#" index="{{ $v->id }}" title="{{ $v->name }}">{{ $v->name }}</a></li>
                                @endforeach
                        </ul>
                </dd>
        </dl>
</div>

<div class="demo">
        <dl class="select" style="margin-left:12px">
                <dt class="dt2" index="">选择市</dt>
                <dd>
                        <ul class="paymentshis">
                                <li class="paymentshi"><a href="#" index="">选择市</a></li>
                        </ul>
                </dd>
        </dl>
</div>
<div class="demo">
        <dl class="select" style="margin-left:12px">
                <dt class="dt3" index="">选择区</dt>
                <dd>
                        <ul class="paymentqus">
                                <li class="paymentqu"><a href="#" index="00">选择区</a></li>
                        </ul>
                </dd>
        </dl>
</div>
                                        </label>
                                        <label class="paymentfrom1_1" for="" style="height:47px;">
                                                <div class="paymentdetailsdiv">
                                                <textarea name="paymentdetails" id="" class="paymentdetails" placeholder="详细地址"></textarea>
                                                </div>
                                        </label>
                                        <label class="paymentfrom1_1" for="">
                                                <input type="text" class="payment_input_zipcode" name="zipcode"  placeholder="邮编">
                                                <input type="text" class="payment_input_lebel" name="lebel"  placeholder="地址标签">
                                        </label>


                                </div>
                                <div class="m-bottom">
                                        <button class="m-btn-sure">确定</button>
                                        <button class="m-btn-edit" style="display:none">更新</button>
                                        <button class="m-btn-cancel">取消</button>
                                </div>
                        </div>
                </div>

                <div class="payment_con" >
                    <div class="payment_con_con">
                        <div class="payment_con_hader">
                            <title>确认订单信息</title>
                            <ul>
                                <li class="payment_con_hader_li1">商品信息</li>
                                <li class="payment_con_hader_li2">商品属性</li>
                                <li class="payment_con_hader_li3">单价</li>
                                <li class="payment_con_hader_li4">数量</li>
                                <li class="payment_con_hader_li5">小计</li>
                            </ul>
                        </div>
                        <div class="payment_concon">

                            <div class="payment_content">
                            @foreach( $pays as $k => $v )
                                <div class="payment_content">
                                    <ul class="payment_content_hader">
                                        <li class="payment_con_hader_li1">{{ $v->name }}</li>
                                        <li class="payment_con_hader_li2">{{ $v->paths }}</li>
                                        <li class="payment_con_hader_li3">---</li>
                                        <li class="payment_con_hader_li4">{{$v->num}}</li>
                                        <li class="payment_con_hader_li5" style="font-size:19px;">{{$v->jia}}.00元</li>
                                    </ul>
                                    @foreach($v->subclass as $kk => $vv)
                                    <ul class="payment_content_sub">
                                        <li class="payment_content_sub1">{{ $vv->title }}</li>
                                        <li class="payment_content_sub2">{{ $vv->specations }}</li>
                                        <li class="payment_content_sub3">{{ $vv->jia }}</li>
                                        <li class="payment_content_sub4">{{ $vv->num }}</li>
                                        <li class="payment_content_sub5">{{ $vv->jia * $v->num }}.00</li>
                                    </ul>
                                    @endforeach
                                </div>
                            @endforeach
                            </div>

                        </div>
                        <form action="{{ url('/home/shoppingcart/payments') }}"  method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="dataid" value="{{ $dataids }}">
                        
                        <div class="payment_buttom">
                            <ul>
                                <li class="payment_buttom_li1">
                                    <div class="mycheck" style="margin-left:12px;margin-top:10px;margin-right:8px">  
                                    <input type="checkbox" value="1" id="checkbox1" name="invoice" />  
                                    <label for="checkbox1"></label>  
                                    </div> 
                                    <span>开具发票</span>
                                </li>
                                <li class="payment_buttom_li2">
                                    <div>0.00</div>
                                    <span>运送方式：普通快递（免邮）</span>
                                </li>
                                <li class="payment_buttom_li3">
                                    <span>给卖家留言</span>
                                    <input type="text" class="payment_buttom_li3ipt" name="remarks" placeholder="选填：填写内容已和卖家协商确认">
                                </li>
                                <li class="payment_buttom_li4">
                                    <span>运费险：</span>
                                    <div class="mycheck" style="margin-left:12px;margin-top:10px;margin-right:10px">  
                                    <input type="checkbox" value="1" id="checkbox2" name="risk" />  
                                    <label for="checkbox2"></label>  
                                    </div> 
                                    <em>运费险</em>
                                    <span>卖家送，确认收货前可退可赔</span>
                                    <div class="yunfeixian">200.00</div>
                                </li>
                            </ul>
                            <div class="payment_buttom_div">
                                <div>{{ $total }}.00</div>
                                <em>￥</em>
                                <span>合计（含运费）</span>

                            </div>
                            
                        </div>
                        <div class="payment_buttom_sub">
                                <div class="payment_buttom_sub_1">
                                    <div>{{ $total }}.00</div>
                                    <em>￥</em>
                                    <span>实付款：</span>
                                </div>
                                <div class="payment_buttom_sub_2">
                                    <div>@if($default != null) {{ $default->tails }} @else 请先添加地址！  @endif</div>
                                    <span>寄送至：</span>
                                </div>
                                <div class="payment_buttom_sub_3">
                                    <div>@if($default != null) {{ $default->name }} {{ $default->phone }}@else 请先添加地址！  @endif</div>
                                    <span>收货人：</span>
                                </div>
                                <div class="payment_buttom_sub_5">
                                    <span>当前有未支付的订单 请先 <a href="#" Onclick="payment_pay()">支付</a> 或 <a href="#" Onclick="payment_paydel();return false;">取消订单</a> 后再创建新订单！</span>
                                </div>
                                <div class="payment_buttom_sub_4">
                                    <button class="payment_submit">提交订单</button>
                                </div>
                        </div>
                        </form>
                    </div>
                </div>

        </div>

<div class="z-bot">
    <div class="z-bot1">
            <ul>
                    <li class="z-li2">关于建商</li>
                        <li><a href="{{ url('/jsgw/aboutus') }}">建商介绍</a></li>
                        <li><a href="{{ url('/jsgw/tuandui') }}">建商团队</a></li>
                        <li><a href="{{ url('/jsgw/zhanlui') }}">发展战略</a></li>
                </ul>
                <ul>
                   <li class="z-li2">建商服务</li>
                  <li><a href="{{ url('/jsgw/contact') }}">联系方式</a></li>
                </ul>
                <ul>
                   <li class="z-li2">建商标准</li>
                  <!--  <li><a href="">客厅验收标准</a></li>
                   <li><a href="">客厅验收标准</a></li>
                   <li><a href="">客厅验收标准</a></li>
                   <li><a href="">客厅验收标准</a></li> -->
                </ul>
                <div class="z-li3">
                   <b>联系我们</b>
                   <p class="z-p1 z-p0">服务热线：400-188-6585</p>
                   <p class="z-p1">邮箱：market@jianshanglianmeng.com</p>
                   <p class="z-p2">总部地址：</p><p class="z-p3">四川省宜宾市临港经济开发区西南互联网产业基地522</p>
                </div>
                <div class="z-li4"><b>关注我们</b></div>
        </div>
        <div class="z-bot2">
            <div class="z-bot2-1">CopyRight 2017-2020建商联盟版权所有   ICP备案：蜀ICP备17010220号 </div>
        </div>
</div>
</body>
<script src="{{ asset('/home/images/payment/payment/common.js') }}"></script>
</html>