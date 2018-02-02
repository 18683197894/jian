<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" name="viewport" />
    <link rel="stylesheet" href="{{ asset('/new/home/question/css/public.css') }}"/>
    <link rel="stylesheet" href="{{ asset('/new/home/question/css/money.css') }}"/>
    <title>为了获得喜欢的装修效果，您更愿意投入多少资金？</title>
</head>
<body>
    <img src="{{ asset('/new/home/question/img/bg.jpg') }}" alt="" class="bg"/>
<div class="title">织金样板房调查</div>
<div class="brief">品质生活 从这里开始</div>
<div class="container-box">
    <form action="{{ url('/newpro/zhijin/questionnaire/intelligence') }}" method="GET">
            <input type="hidden" name="id" value="{{ $data->id }}">
        <div class="content">
            <div class="you">8.为了获得喜欢的装修效果，您更愿意投入多少资金？：<span>*</span></div>
            <div class="click">
                <label class="loop">
                    <input type="radio" @if($data->money == '10-15万' ) checked="checked" @endif  value="10-15万" name="money"/> <span>10-15万</span>
                </label>
                <label class="loop">
                    <input type="radio" @if($data->money == '15-20万' ) checked="checked" @endif  value="15-20万" name="money"/> <span>15-20万</span>
                </label>
                <label class="loop">
                    <input type="radio" @if($data->money == '20-25万' ) checked="checked" @endif value="20-25万" name="money"/> <span>20-25万</span>
                </label>
                <label class="loop">
                    <input type="radio" @if($data->money == '25-30万' ) checked="checked" @endif value="25-30万" name="money"/> <span>25-30万</span>
                </label>
                <label class="loop">
                    <input type="radio" @if($data->money == '30万及以上' ) checked="checked" @endif value="30万及以上" name="money"/> <span>30万及以上</span>
                </label>
            </div>
            <div class="xuanz">请选择您更愿意投入多少资金</div>
        </div>
        <div class="Next">
            <a href="{{ url('/newpro/zhijin/questionnaire/style?sid=') }}{{ $data->id }}">上一个</a>
            <a href="javascript:;" class="Next_a">下一页</a>
        </div>
    </form>
</div>
<script src="{{ asset('/new/home/question/js/jquery-1.8.3.js') }}"></script>
<script src="{{ asset('/new/home/question/js/money.js') }}"></script>
<script src="{{ asset('/new/home/question/js/public.js') }}"></script>
</body>
</html>
