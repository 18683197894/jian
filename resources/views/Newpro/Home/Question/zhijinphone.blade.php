<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" name="viewport" />
    <link rel="stylesheet" href="{{ asset('/new/home/question/css/public.css') }}"/>
    <link rel="stylesheet" href="{{ asset('/new/home/question/css/phone.css') }}"/>
    <title>您的联系方式</title>
</head>
<body>
    <img src="{{ asset('/new/home/question/img/bg.jpg') }}" alt="" class="bg"/>
<div class="title">织金样板房调查</div>
<div class="brief">品质生活 从这里开始</div>
<div class="container-box">
    <div class="content">
    <form action="{{ url('/newpro/zhijin/questionnaire/qccupation') }}" method="GET">
        <div class="you">2. 您的联系方式（手机号）：<span>*</span></div>
        <input type="text" name="phone" value="{{ $data->phone }}" class="phone"/>
        <input type="hidden" value="{{ $data->id }}" name="id"/>
        <div class="Ok">请输入正确手机号码！</div>
    <form>
    </div>
    <div class="Next">
            <a href="{{ url('/newpro/zhijin/questionnaire/name?sid=') }}{{ $data->id }}">上一页</a>
            <a href="javascript:;" class="Next_a">下一页</a>
        </div>
</div>
<script src="{{ asset('/new/home/question/js/jquery-1.8.3.js') }}"></script>
<script src="{{ asset('/new/home/question/js/phone.js') }}"></script>
<script src="{{ asset('/new/home/question/js/public.js') }}"></script>
</body>
</html>