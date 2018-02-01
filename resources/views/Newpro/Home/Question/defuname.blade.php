<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" name="viewport" />
    <link rel="stylesheet" href="{{ asset('/new/home/question/css/public.css') }}"/>
    <link rel="stylesheet" href="{{ asset('/new/home/question/css/name.css') }}"/>
    <title>请输入您的姓名</title>
</head>
<body>
    <img src="{{ asset('/new/home/question/img/bg.jpg') }}" alt="" class="bg"/>
    <div class="title">德福样板房调查</div>
    <div class="brief">品质生活 从这里开始</div>
    <div class="container-box">
        <div class="content">
        <form action="{{ url('/newpro/defu/questionnaire/phone') }}" method="GET">
            <div class="you">1. 您的姓名：<span>*</span></div>
            <input type="text" name="name" value="@if(isset($data)) {{ $data->name }} @endif" class="name pub"
            />
            <div class="tishi">请输入您的姓名</div>
            <div class="hanzi">请输入您的中文姓名</div>
            <div class="Sex">
            @if( isset($data))
                <input type="hidden" name="id" value="{{ $data->id }}">
            @endif
                <label class="left">
                    <input type="radio" value="男" @if(isset($data) && $data->sex == '男') checked="checked" @endif name="sex"/> <span>男</span>
                </label>
                <label class="left">
                    <input type="radio" value="女" @if(isset($data) && $data->sex == '女') checked="checked" @endif name="sex"/> <span>女</span>
                </label>
            </form>
            </div>
            <div class="xuanz">请选择您的性别</div>
        </div>
        <div class="Next">
            <a href="{{ url('/newpro/defu/questionnaire/index') }}">上一页</a>
            <a href="javascript:;" class="Next_a">下一页</a>
        </div>
    </div>
<script src="{{ asset('/new/home/question/js/jquery-1.8.3.js') }}"></script>
<script src="{{ asset('/new/home/question/js/name.js') }}"></script>
<script src="{{ asset('/new/home/question/js/public.js') }}"></script>
</body>
</html>