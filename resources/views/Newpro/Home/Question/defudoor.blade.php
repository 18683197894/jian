<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" name="viewport" />
    <link rel="stylesheet" href="{{ asset('/new/home/question/css/public.css') }}"/>
    <link rel="stylesheet" href="{{ asset('/new/home/question/css/door.css') }}"/>
    <title>您购买的户型</title>
</head>
<body>
<img src="{{ asset('/new/home/question/img/bg.jpg') }}" alt="" class="bg"/>

<div class="title">德福样板房调查</div>
<div class="brief">品质生活 从这里开始</div>
<div class="container-box">
    <form action="{{ url('/newpro/defu/questionnaire/feel') }}" method="GET">
            <input type="hidden" name="id" value="{{ $data->id }}">
        <div class="content">
            <div class="you">10.您购买的户型：<span>*</span></div>
            <div class="click">
                <label class="loop">
                    <input type="radio" @if($data->door == 'A1' ) checked="checked" @endif value="A1" name="door"/> <span>A1</span>
                </label>
                <label class="loop">
                    <input type="radio" @if($data->door == 'A2' ) checked="checked" @endif value="A2" name="door"/> <span>A2</span>
                </label>
                <label class="loop">
                    <input type="radio" @if($data->door == 'B1' ) checked="checked" @endif value="B1" name="door"/> <span>B1</span>
                </label>
                <label class="loop">
                    <input type="radio" @if($data->door == 'B2' ) checked="checked" @endif value="B2" name="door"/> <span>B2</span>
                </label>
                <label class="loop">
                    <input type="radio" @if($data->door == 'C1' ) checked="checked" @endif value="C1" name="door"/> <span>C1</span>
                </label>
                <label class="loop">
                    <input type="radio" @if($data->door == 'C2' ) checked="checked" @endif value="C2" name="door"/> <span>C2</span>
                </label>
                <label class="loop">
                    <input type="radio" @if($data->door == 'C3' ) checked="checked" @endif value="C3" name="door"/> <span>C3</span>
                </label>
            </div>
            <div class="xuanz">请选择您购买的户型</div>
        </div>
        <div class="Next">
            <a href="{{ url('/newpro/defu/questionnaire/intelligence?sid=') }}{{ $data->id }}">上一页</a>
            <a href="javascript:;" class="Next_a">下一页</a>
        </div>
    </form>
</div>
<script src="{{ asset('/new/home/question/js/jquery-1.8.3.js') }}"></script>
<script src="{{ asset('/new/home/question/js/door.js') }}"></script>
<script src="{{ asset('/new/home/question/js/public.js') }}"></script>
</body>
</html>