<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <!--网站SEO关键词优化-->
    <meta name="keywords" content="{{ $title['keyworlds'] or '建商联盟' }}">
    <meta name="description" content="{{ $title['description'] or '建商联盟' }}">
    <!--禁止手机自动缩放-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <!--让IE的文档模式永远都是最新的-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!--使用Webkit引擎及V8引擎进行排版及运算-->
    <meta http-equiv="X-UA-Compatible" content="IE=Edge，chrome=1">
    <!--清楚默认样式-->
    <link rel="stylesheet" href="{{ asset('/new/home/public/base.css') }}"/>
    <!--首页样式-->
    <!--尾部样式-->
    <link rel="stylesheet" href="{{ asset('/new/home/pay/payment.css') }}">
    <script src="{{ asset('/js/jquery-1.8.3.min.js') }}"></script>

    <link rel="stylesheet" href="{{ asset('/new/home/public/footer.css') }}"/>
    <title>{{ $title['title'] or '建商联盟' }}</title>
   
</head>
<body>
<div class="nav_top">
    <div class="auto">
        <a href="javascript:;">热线电话：0831-8888298</a>
        <span></span>
        <a href="{{ url('/newpro/center/my_orders') }}">个人中心</a>
        <span></span>
        <a href="javascript:;">{{ session('Home')->name }}</a>
    </div>
</div>
<div class="contact">
    <div class="contact_logo">
        <a href="{{ url('/') }}"><img src="{{ asset('/home/images/logo.png') }}" alt="" class="logo"/></a>
        <div class="contact_logo_r">
            <a href="javascript:;">
                <img src="{{ asset('/new/home/publicused/img/header_gg.png') }}" alt=""/>
                免费量房与报价
            </a>
            <a href="javascript:;">
                <img src="{{ asset('/new/home/login/img/hade_1.png') }}" alt=""/>
                装修公司实力认证
            </a>
        </div>
        <span class="gwc">提交订单</span>
    </div>
    <div class="Order">
        <div class="address">
            <div class="title">选择收货地址</div>
            <div class="dizhi">
                @if($address->count() > 0)
                @foreach($address as $k => $v)
                <span @if($v->status == 1) class="avtive" @endif index ="{{ $v->id }}">
                    <div class="name">{{ $v->name }} （{{ $v->phone }}）</div>
                    <div class="con">{{ $v->shen.$v->shi.' '.$v->tails }}</div>
                    <div class="operation">
                        <button class="addressedit">编辑</button>
                        <button class="delete">删除</button>
                    </div>
                </span>
                @endforeach
                @endif
                <span class="addressspan" style="display:none">
                    <div class="name">四川省成都市 （樊恩材）</div>
                    <div class="con">四川省成都市 （樊恩材）四川省成都市 （樊恩材）</div>
                    <div class="operation">
                        <button class="addressedit">编辑</button>
                        <button class="delete">删除</button>
                    </div>
                </span>
                
            </div>
            <div class="New">
                <a class="addresors" href="javascript:;">使用新地址</a>
                <div class="add" index="0">
                    <div class="modal_title">
                        添加收货地址
                        <span>×</span>
                    </div>
                    <div class="fill">
                        <input type="text" name="name" placeholder="姓名" class="left"/>
                        <input type="text" name="phone" placeholder="手机号" class="right"/>
                    </div>
                    <div class="fill">
                        <div class="linkage shen">
                            <div index="00" class="selected">选择省</div>
                            <ul class="down">
                            @foreach($district as $k => $v)
                                <li><a href="javascript:;" index="{{ $v->id }}">{{ $v->name }}</a></li>
                            @endforeach
                            </ul>
                        </div>
                        <div class="linkage shi">
                            <div index="00" class="selected">选择市</div>
                            <ul class="down">
                                <li class="lishi"><a href="javascript:;" index="00">选择市</a></li>
                            </ul>
                        </div>
                        <div class="linkage qu ">
                            <div index="00" class="selected" >选择区</div>
                            <ul class="down">
                                <li><a href="javascript:;" index="00">选择区</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="fill">
                        <input type="text" name="tails" placeholder="详细地址" class="xiangxi"/>
                    </div>
                    <div class="fill">
                        <input type="text" name="zipcode" placeholder="邮编" class="left"/>
                        <input type="text" name="lebel" placeholder="标签" class="right"/>
                    </div>
                    <div class="Submit">
                        <div class="left">
                            <button class="cancel">取消</button>
                        </div>
                        <div class="left">
                            <button class="determines" >确定</button>
                            <button class="determine" style="display: none">更新</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="details">
        <div class="title">确认订单信息</div>
        <ul class="top">
            <li class="shop">商品信息</li>
            <li class="Attribute">商品属性</li>
            <li class="Price">单价</li>
            <li class="Number">数量</li>
            <li class="Subtotal">小计</li>
        </ul>
        
        @if(count($data) > 0)
        
        <ul class="con payid" index="{{ $data->id }}">
            <li class="shop">{{ $data->name }}</li>
            <li class="Attribute">{{ substr($data->path,1) }}</li>
            <li class="Price">--</li>
            <li class="Number">{{ $data->num }}</li>
            <li class="Subtotal">{{ $data->moneys }}元</li>
        </ul>
            @foreach($data->datas as $kk => $vv)
                @if($vv->ors !== '智能')
                <ul class="con xiao" index="">
                <li class="shop"></li>
                <li class="Attribute">{{ $vv->name }}</li>
                <li class="Price">{{ $vv->money }}/㎡</li>
                <li class="Number">{{ $rom }}</li>
                <li class="Subtotal">{{ $vv->moneys }}元</li>
                </ul>
                @else
                <ul class="con xiao" index="">
                <li class="shop"></li>
                <li class="Attribute">{{ $vv->name }}</li>
                <li class="Price">{{ $vv->money }}元</li>
                <li class="Number">1</li>
                <li class="Subtotal">{{ $vv->moneys }}元</li>
                </ul>
                @endif
            @endforeach
    
        @endif

    </div>
    <div class="invoice">
    <form action="{{ url('/newpro/payments') }}" method="post">
                {{ csrf_field() }}
        <div class="left">
            <div class="in_click">
                <input type="checkbox" name="invoice"/>
                <span>开具发票</span>
            </div>
            
        </div>
        <div class="right">
            <div class="liuyan">
                <div class="text">给卖家留言</div>
                <input name="remarks" type="text" placeholder="选填：填写内容已和卖家协商确认"/>
            </div>
            <!-- <div class="Postage">
                <span>运送方式：普通快递（免邮）</span>
                <i>0.00</i>
            </div>
            <div class="Insurance">
                <div class="name">运费险：</div>
                <input name="risk" type="checkbox"/>
                <i>运费险</i>
                <div class="jies">卖家送，确认收货前可退可赔</div>
                <div class="number">200.00</div>
            </div> -->
        </div>
        
    </div>
    <div class="jiesuan">
        <div class="fapiao">
            <div class="input">
                <input type="hidden" name="rom" value="{{ $rom }}" placeholder="输入发票抬头"/>
                <input type="text" name="invoice_tou" placeholder="输入发票抬头"/>
                <input type="text" name="invoice_ors" placeholder="输入纳税号"/>
            </div>
        </div>
        <i>{{ $moenyss }}</i>
        <span>￥</span>
        <div class="hej">合计（含运费）</div>
    </div>
    </form>
    <div class="payment_buttom_sub">
        <div class="payment_buttom_sub_1">
            <i class="moneyss">8000</i>
            <span>￥</span>
            <div>支付定金：</div>
        </div>
        <div class="payment_buttom_sub_2">寄送至：<span>@if(isset($addressstatus['dizhi'])) {{ $addressstatus['dizhi'] }} @endif</span></div>
        <div class="payment_buttom_sub_2">收货人：<span>@if(isset($addressstatus['name'])) {{ $addressstatus['name'] }} @endif</span></div>
        <div class="payment_buttom_sub_3" index="@if(isset($addressstatus['id'])) {{ $addressstatus['id'] }} @endif">
            <button>提交订单</button>
        </div>
    </div>
</div>


<!--尾部-->
<div class="footer">
    <div class="auto">
        <div class="about">
            <div class="title">关于建商</div>
            <i></i>
            <a href="{{ url('/newpro/about?ors=about') }}" class="about_loop">建商简介</a>
            <a href="{{ url('/newpro/about?ors=team') }}" class="about_loop">运营团队</a>
            <a href="{{ url('/newpro/about?ors=strategy') }}" class="about_loop">发展战略</a>
            <a href="{{ url('/newpro/about?ors=framework') }}" class="about_loop">组织构架</a>
            <a href="{{ url('/newpro/about?ors=contact') }}" class="about_loop">联系我们</a>
        </div>
        <div class="about">
            <div class="title">建商项目</div>
            <i></i>
            <a href="{{ url('/newpro/smarthome') }}" class="about_loop">智能家居</a>
            <a href="{{ url('/newpro/ressmartunity') }}" class="about_loop">住宅智慧社区</a>
            <a href="{{ url('/newpro/businsmart') }}" class="about_loop">商业智慧商圈</a>
        </div>
        <div class="about">
            <div class="title">建商服务</div>
            <i></i>
            <a href="{{ url('/newpro/case/index') }}" class="about_loop">工程案例</a>
            <a href="{{ url('/newpro/package/jizhuang') }}" class="about_loop">建商家装</a>
        </div>
        <div class="contact">
            <div class="title">联系我们</div>
            <i></i>
            <a href="javascript:;" class="about_loop">服务热线：0831-8888598</a>
            <a href="javascript:;" class="about_loop">电子邮箱：market@jianshanglianmeng.com</a>
            <a href="javascript:;" class="about_loop">总部地址：宜宾市临港经济开发区西南互联网基地522室</a>
        </div>
        <div class="code">
            <div class="title">关注我们</div>
            <i></i>
            <div class="QR">
                <img src="{{ asset('/new/home/public/img/QR1.png') }}" alt=""/>
                <span>建商官网订阅号</span>
            </div>
            <div class="QR">
                <img src="{{ asset('/new/home/public/img/QR2.png') }}" alt=""/>
                <span>建商官网服务号</span>
            </div>
        </div>
    </div>
</div>
<!--版权-->
<div class="copyright"><span>CopyRight 2017-2020 建商联盟版权所有 ICP备案：</span><i>蜀ICP备17010220</i></div>
<script src="{{ asset('/new/home/pay/payment.js') }}"></script>

</body>
</html>