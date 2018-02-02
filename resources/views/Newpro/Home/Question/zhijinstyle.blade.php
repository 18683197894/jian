<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" name="viewport" />
    <link rel="stylesheet" href="{{ asset('/new/home/question/css/public.css') }}"/>
    <link rel="stylesheet" href="{{ asset('/new/home/question/css/style.css') }}"/>
    <title>您更喜欢哪种装修风格</title>
</head>
<body>
    <img src="{{ asset('/new/home/question/img/bg.jpg') }}" alt="" class="bg"/>

<div class="title">织金样板房调查</div>
<div class="brief">品质生活 从这里开始</div>
<div class="container-box">
    <form action="{{ url('/newpro/zhijin/questionnaire/money') }}" method="GET">
            <input type="hidden" name="id" value="{{ $data->id }}">
        <div class="content">
            <div class="you">7.您更喜欢哪种装修风格：<span>*</span></div>
            <div class="click">
                <label class="loop">
                    <input type="radio" @if($data->style == '现代风格' ) checked="checked" @endif value="现代风格" name="style"/> <span>现代风格</span>
                </label>
                <label class="loop">
                    <input type="radio" @if($data->style == '美式风格' ) checked="checked" @endif value="美式风格" name="style"/> <span>美式风格</span>
                </label>
                <label class="loop">
                    <input type="radio" @if($data->style == '北欧风格' ) checked="checked" @endif value="北欧风格" name="style"/> <span>北欧风格</span>
                </label>
                <label class="loop">
                    <input type="radio" @if($data->style == '其他' ) checked="checked" @endif value="其他" name="style"/> <span>其他</span>
                </label>
            </div>
            <div class="xuanz">请选择您更喜欢哪种装修风格</div>
        </div>
        <div class="Next">
            <a href="{{ url('/newpro/zhijin/questionnaire/care?sid=') }}{{ $data->id }}">上一页</a>
            <a href="javascript:;" class="Next_a">下一页</a>
        </div>
    </form>
</div>
<script src="{{ asset('/new/home/question/js/jquery-1.8.3.js') }}"></script>
<script src="{{ asset('/new/home/question/js/style.js') }}"></script>
<script src="{{ asset('/new/home/question/js/public.js') }}"></script>
</body>
</html>
