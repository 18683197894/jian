<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('/new/home/login/login.css') }}"/>
    <script src="{{ asset('/js/jquery-1.8.3.min.js') }}"></script>

    <title>登录</title>
</head>
<body>
<div class="logins">
    <div class="logins_top">
       <a href="{{ url('/') }}"> <img src="{{ asset('/home/images/logo.png') }}" alt="" class="Logo"/></a>
        <div class="search">
            <a href="javascript:;" class="link">
                <img src="{{ asset('/new/home/publicused/img/header_gg.png') }}" alt=""/>
                免费量房与报价
            </a>
            <a href="javascript:;" class="link">
                <img src="{{ asset('/new/home/login/img/hade_1.png') }}" alt=""/>
                装修公司实力认证
            </a>
        </div>
    </div>
    <div class="content clearfloat">
        <img src="{{ asset('/new/home/login/img/login.png') }}" alt="" class="logins_bg"/>
        <div class="Account">
        <form action="{{ url('/newpro/logins') }}" method="post">
				{{ csrf_field() }}
        		<input type="hidden" name="path" value="{{ $path }}">
            <div class="title">账号登录</div>
            <label id="label_2">
                <input type="text" name="name" value="{{ old('name') }}" placeholder="用户名">
            </label>
            <label id="label_3">
                <input type="password" name="password" placeholder="密码">
            </label>
            <span id="lod" >{{ \session('info') }}</span>
            <label id="label_4" @if(\session('info')) style="margin-top:0" @endif>
                <span>立即登入</span>
            </label>
            <label class="wj">
                <a href="{{ url('/newpro/register') }}" id="label_5_a1">还没有账号？ 注册</a>
                <a href="" id="label_5_a2">忘记密码？</a>
            </label>
        </div>
       </form>
    </div>
</div>
</body>
<script src="{{ asset('/new/home/login/login.js') }}"></script>
</html>