<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" name="viewport" />
    <link rel="stylesheet" href="{{ asset('/new/home/question/css/public.css') }}"/>
    <link rel="stylesheet" href="{{ asset('/new/home/question/css/resident.css') }}"/>
    <title>常住人口</title>
</head>
<body>
    <img src="{{ asset('/new/home/question/img/bg.jpg') }}" alt="" class="bg"/>
<div class="title">织金样板房调查</div>
<div class="brief">品质生活 从这里开始</div>
<div class="container-box">
    <form action="{{ url('/newpro/zhijin/questionnaire/service') }}" method="GET">
            <input type="hidden" name="id" value="{{ $data->id }}">

        <div class="content">
            <div class="you">4.家庭常住人数：<span>*</span></div>
            <div class="click">
                <label class="loop">
                    <input type="radio" @if($data->resident == '一人') checked="checked" @endif value="一人" name="population"/> <span>一人</span>
                </label>
                <label class="loop">
                    <input type="radio" @if($data->resident == '二人') checked="checked" @endif value="二人" name="population"/> <span>二人</span>
                </label>
                <label class="loop">
                    <input type="radio" @if($data->resident == '三人') checked="checked" @endif value="三人" name="population"/> <span>三人</span>
                </label>
                <label class="loop">
                    <input type="radio" @if($data->resident == '四人') checked="checked" @endif value="四人" name="population"/> <span>四人</span>
                </label>
                <label class="loop">
                    <input type="radio" @if($data->resident == '五人及以上') checked="checked" @endif value="五人及以上" name="population"/> <span>五人及以上</span>
                </label>
            </div>
            <div class="xuanz">请选择您的家庭常住人数</div>
        </div>
        <div class="Next">
            <a href="{{ url('/newpro/zhijin/questionnaire/qccupation?sid=') }}{{ $data->id }}">上一页</a>
            <a href="javascript:;" class="Next_a">下一页</a>
        </div>
    </form>
</div>
<script src="{{ asset('/new/home/question/js/jquery-1.8.3.js') }}"></script>
<script src="{{ asset('/new/home/question/js/resident.js') }}"></script>
<script src="{{ asset('/new/home/question/js/public.js') }}"></script>
</body>
</html>