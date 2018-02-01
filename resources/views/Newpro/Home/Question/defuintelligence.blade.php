<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" name="viewport" />
    <link rel="stylesheet" href="{{ asset('/new/home/question/css/public.css') }}"/>
    <link rel="stylesheet" href="{{ asset('/new/home/question/css/intelligence.css') }}"/>
    <title>常住人口</title>
</head>
<body>
<img src="{{ asset('/new/home/question/img/bg.jpg') }}" alt="" class="bg"/>
<div class="title">德福样板房调查</div>
<div class="brief">品质生活 从这里开始</div>
<div class="container-box">
    <form action="{{ url('/newpro/defu/questionnaire/door') }}" method="GET">
            <input type="hidden" name="id" value="{{ $data->id }}">
        <div class="content">
            <div class="you">9.在了解智能家居后，您愿意为家庭添置智能产品吗？<span>*</span></div>
            <div class="click">
                <label class="loop">
                    <input type="radio" @if($data->intelligence == '愿意' ) checked="checked" @endif value="愿意" name="intelligence"/> <span>愿意</span>
                </label>
                <label class="loop">
                    <input type="radio" @if($data->intelligence == '考虑中' ) checked="checked" @endif value="考虑中" name="intelligence"/> <span>考虑中</span>
                </label>
                <label class="loop">
                    <input type="radio" @if($data->intelligence == '不愿意' ) checked="checked" @endif value="不愿意" name="intelligence"/> <span>不愿意</span>
                </label>
            </div>
            <div class="xuanz">请选择您愿意为家庭添置智能产品吗</div>
        </div>
        <div class="Next">
            <a href="{{ url('/newpro/defu/questionnaire/money?sid=') }}{{ $data->id }}">上一页</a>
            <a href="javascript:;" class="Next_a">下一页</a>
        </div>
    </form>
</div>
<script src="{{ asset('/new/home/question/js/jquery-1.8.3.js') }}"></script>
<script src="{{ asset('/new/home/question/js/intelligence.js') }}"></script>
<script src="{{ asset('/new/home/question/js/public.js') }}"></script>
</body>
</html>