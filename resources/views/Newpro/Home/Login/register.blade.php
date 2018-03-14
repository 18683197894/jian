<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <script src="{{ asset('/js/jquery-1.8.3.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('/new/home/public/base.css') }}"/>
    <link rel="stylesheet" href="{{ asset('/new/home/login/register.css') }}"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>注册</title>
</head>
<body>
<div class="register">
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
    <div class="content">
        <img src="{{ asset('/new/home/login/img/login.png') }}" alt="" class="logins_bg"/>
        <div class="Account">
            <form action="{{ url('/newpro/registers') }}" method="post">
                <div class="title">新用户注册</div>
                {{ csrf_field() }}
                <label id="label_2">
                    <input type="text" name="name" value="{{ old('name') }}" class="yans" value="" placeholder="用户名">
                    <span>用户名格式错误</span>
                    <span>该用户名已存在</span>
                </label>
                <label id="label_3">
                    <input type="password" class="yans" value="{{ old('password') }}" name="password" placeholder="密码">
                    <span>密码格式错误</span>
                </label>
                <label id="label_4">
                    <input type="text" class="yans" value="{{ old('phone') }}" name="phone" placeholder="手机号">
                    <span >手机号格式错误</span>
                    <span >手机号已存在</span>
                </label>
                <label id="label_5">
                    <input type="text" name="yan" placeholder="验证码">
                    <button id="button1" onclick="return false;">获取验证码</button>
                    <button id="button3" onclick="return false;">获取验证码</button>
                </label>
                <label id="label_6">
                    <button id="button2" onclick="return false;">立即注册</button>
                </label>
                <label class="wj">
                    <a href="{{ url('/newpro/login') }}" id="label_5_a1">已有账号？ 登入</a>
                </label>
            </form>
        </div>
    </div>
</div>

</body>
<script src="{{ asset('/new/home/login/register.js') }}"></script>
</html>