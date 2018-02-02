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

<div class="title">织金样板房调查</div>
<div class="brief">品质生活 从这里开始</div>
<div class="container-box">
    <form action="{{ url('/newpro/zhijin/questionnaire/feel') }}" method="GET">
            <input type="hidden" name="id" value="{{ $data->id }}">
        <div class="content">
            <div class="you">10.您购买的户型：<span>*</span></div>
            <div class="click">
                <label class="loop">
                    <input type="radio" @if($data->door == 'A户型' ) checked="checked" @endif value="A户型" name="door"/> <span>A户型</span>
                </label>
                <label class="loop">
                    <input type="radio" @if($data->door == 'B户型' ) checked="checked" @endif value="B户型" name="door"/> <span>B户型</span>
                </label>
                <label class="loop">
                    <input type="radio" @if($data->door == 'C户型' ) checked="checked" @endif value="C户型" name="door"/> <span>C户型</span>
                </label>
                
            </div>
            <div class="xuanz">请选择您购买的户型</div>
        </div>
        <div class="Next">
            <a href="{{ url('/newpro/zhijin/questionnaire/intelligence?sid=') }}{{ $data->id }}">上一页</a>
            <a href="javascript:;" class="Next_a">下一页</a>
        </div>
    </form>
</div>
<script src="{{ asset('/new/home/question/js/jquery-1.8.3.js') }}"></script>
<script src="{{ asset('/new/home/question/js/door.js') }}"></script>
<script src="{{ asset('/new/home/question/js/public.js') }}"></script>
</body>
</html>