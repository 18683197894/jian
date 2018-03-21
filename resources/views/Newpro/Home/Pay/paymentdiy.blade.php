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
    <!--使用Webkit引擎及V8引擎进行排版及运算-->
    <meta http-equiv="X-UA-Compatible" content="IE=Edge，chrome=1">
    <!--清楚默认样式-->
    <link rel="stylesheet" href="{{ asset('/new/home/public/base.css') }}"/>
    <link rel="stylesheet" href="{{ asset('/new/home/pay/payment_top.css') }}"/>
    <link rel="stylesheet" href="{{ asset('/new/home/pay/paymentdiy.css') }}"/>
    <title>{{ $title['title'] or '建商联盟' }}</title>
</head>
<body>

<div class="Personal_top">
    <div class="Personal_logo">
        <a href="{{ url('/') }}"><img src="{{ asset('/new/home/public/img/logo.png') }}" alt="" class="Logo"/></a>
        <div class="Personal_logo_r">
            <a href="javascript:;">
                <img src="{{ asset('/new/home/publicused/img/header_gg.png') }}" alt=""/>
                免费量房与报价
            </a>
            <a href="javascript:;">
                <img src="{{ asset('/new/home/login/img/hade_1.png') }}" alt=""/>
                装修公司实力认证
            </a>
        </div>
        <span class="gwc">支付订单</span>
    </div>
</div>

<div class="New_payment">
    <div class="Title">
        <i></i><span>订单支付</span>
    </div>
    <div class="Data">
        <form action="{{ url('/newspro/payment/diyindexs') }}" method="POST">
         {{ csrf_field() }}
        <div class="Data_NO1">
            <div class="D_input">
                <span>合同编号：</span>
                <input type="text" name="contract" value="{{ old('contract') }}" class="contract"/>
            </div>
            <div class="D_input">
                <span>楼盘：</span>
                <select name="ors">
                    <option value ="浙商新天地" selected = "selected">浙商新天地</option>
                    <option value ="德福公元">德福公元</option>
                    <option value="织金万都铭城">织金万都铭城</option>
                </select>
                <i></i>
            </div>
        </div>
        <div class="Data_NO1">
            <div class="D_input">
                <span>付款人姓名：</span>
                <input type="text" value="{{ old('name') }}" name="name" class="name"/>
            </div>
            <div class="D_input">
                <span>房号：</span>
                <input type="text" value="{{ old('room') }}" name="room" class="room"/>
            </div>
            <div class="D_input">
                <span>金额：</span>
                <input type="text" value="{{ old('total') }}" name="total" class="Money"/>
            </div>
        </div>
        <div class="Data_NO1">
            <div class="D_input">
                <span>联系电话：</span>
                <input type="text" value="{{ old('phone') }}" name="phone" class="Phone"/>
            </div>
            <div class="D_input">
                <span>备注</span>
                <input type="text" value="{{ old('remarks') }}" name="remarks" />
            </div>
        </div>
        <div class="bott">
            <div class="Prompt">
                @if (count($errors) > 0)
    <div  class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li style="color:red">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
            </div>
            <a href="javascript:;">确认支付</a>
        </div>
        </form>
    </div>
</div>

<script src="{{ asset('/js/jquery-1.8.3.min.js') }}"></script>
<script src="{{ asset('/new/home/pay/paymentdiy.js') }}"></script>
</body>
</html>