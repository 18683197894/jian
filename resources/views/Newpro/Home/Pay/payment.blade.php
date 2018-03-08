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
        <a href="javascript:;">热线电话：400-188-6585</a>
        <span></span>
        <a href="{{ url('/newpro/center/my_orders') }}">个人中心</a>
        <span></span>
        <a href="javascript:;">{{ session('Home')->name }}</a>
    </div>
</div>
<div class="contact">
    <div class="contact_logo">
        <img src="{{ asset('/home/images/logo.png') }}" alt="" class="logo"/>
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
        @foreach($data as $k=>$v)
        <ul class="con" index="{{ $v->id }}">
            <li class="shop">{{ $v->name }}</li>
            <li class="Attribute">{{ $v->path }}</li>
            <li class="Price">{{ $v->money }}</li>
            <li class="Number">{{ $v->num }}</li>
            <li class="Subtotal">{{ $v->moneys }}元</li>
        </ul>
        @endforeach
    </div>
    <div class="invoice">
    <form action="{{ url('/newpro/payments') }}" method="post">
                {{ csrf_field() }}
        <div class="left">
            <div class="in_click">
                <input type="checkbox" name="invoice"/>
                <span>开具发票</span>
            </div>
            <div class="fapiao">
                <div class="input">
                    <input type="text" name="invoice_tou" placeholder="输入发票抬头"/>
                    <input type="text" name="invoice_ors" placeholder="输入纳税号"/>
                </div>
               
                <div class="liuyan">
                    <div class="text">给卖家留言</div>
                    <input name="remarks" type="text" placeholder="选填：填写内容已和卖家协商确认"/>
                </div>
            </div>
        </div>
        <div class="right">
            <div class="Postage">
                <span>运送方式：普通快递（免邮）</span>
                <i>0.00</i>
            </div>
            <div class="Insurance">
                <div class="name">运费险：</div>
                <input name="risk" type="checkbox"/>
                <i>运费险</i>
                <div class="jies">卖家送，确认收货前可退可赔</div>
                <div class="number">200.00</div>
            </div>
        </div>
        </form>
    </div>
    <div class="jiesuan">
        <i>{{ $moenyss }}</i>
        <span>￥</span>
        <div>合计（含运费）</div>
    </div>
    <div class="payment_buttom_sub">
        <div class="payment_buttom_sub_1">
            <i class="moneyss">{{ $moenyss }}</i>
            <span>￥</span>
            <div>合计（含运费）</div>
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
            <a href="javascript:;" class="about_loop">建商介绍</a>
            <a href="javascript:;" class="about_loop">建商团队</a>
            <a href="javascript:;" class="about_loop">建商文化</a>
            <a href="javascript:;" class="about_loop">联系我们</a>
        </div>
        <div class="about">
            <div class="title">建商项目</div>
            <i></i>
            <a href="javascript:;" class="about_loop">智能家居</a>
            <a href="javascript:;" class="about_loop">智慧地产</a>
            <a href="javascript:;" class="about_loop">智慧商圈</a>
            <a href="javascript:;" class="about_loop">智慧文旅</a>
        </div>
        <div class="about">
            <div class="title">建商服务</div>
            <i></i>
            <a href="javascript:;" class="about_loop">建商工程</a>
            <a href="javascript:;" class="about_loop">精装房</a>
            <a href="javascript:;" class="about_loop">建商家装</a>
            <a href="javascript:;" class="about_loop">建商网</a>
        </div>
        <div class="contact">
            <div class="title">联系我们</div>
            <i></i>
            <a href="javascript:;" class="about_loop">服务热线：400-188-6585</a>
            <a href="javascript:;" class="about_loop">电子邮箱：market@jianshanglianmeng.com</a>
            <a href="javascript:;" class="about_loop">总部地址：四川省宜宾市临港经济开发区西南互联网基地522室</a>
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
<div class="copyright">CopyRight 2017-2020 建商联盟版权所有 ICP备案：蜀ICP备17010220</div>
<script src="{{ asset('/new/home/pay/payment.js') }}"></script>

</body>
</html>