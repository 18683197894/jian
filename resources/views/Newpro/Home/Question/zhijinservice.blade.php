<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" name="viewport" />
    <link rel="stylesheet" href="{{ asset('/new/home/question/css/public.css') }}"/>
    <link rel="stylesheet" href="{{ asset('/new/home/question/css/service.css') }}"/>
    <title>您更倾向于选择哪种装修服务</title>
</head>
<body>
    <img src="{{ asset('/new/home/question/img/bg.jpg') }}" alt="" class="bg"/>
<div class="title">织金样板房调查</div>
<div class="brief">品质生活 从这里开始</div>
<div class="container-box">
    <form action="{{ url('/newpro/zhijin/questionnaire/care') }}" method="GET">
            <input type="hidden" name="id" value="{{ $data->id }}">
        <div class="content">
            <div class="you">5.您更倾向于选择哪种装修服务：<span>*</span></div>
            <div class="click">
                <label class="loop">
                    <input type="radio" @if($data->service == '一站式服务') checked="checked" @endif value="一站式服务" name="service"/> <span>一站式服务（包工包料含主材含设计）</span>
                </label>
                <label class="loop">
                    <input type="radio" @if($data->service == '自购材料，找装修工') checked="checked" @endif value="自购材料，找装修工" name="service"/> <span>自购材料，找装修工</span>
                </label>
                <label class="loop">
                    <input type="radio" @if($data->service == '自购材料，找家装公司') checked="checked" @endif value="自购材料，找家装公司" name="service"/> <span>自购材料，找家装公司</span>
                </label>
            </div>
            <div class="xuanz">请选择您的您更倾向于选择哪种装修服务</div>
        </div>
        <div class="Next">
            <a href="{{ url('/newpro/zhijin/questionnaire/resident?sid=') }}{{ $data->id }}">上一个</a>
            <a href="javascript:;" class="Next_a">下一页</a>
        </div>
    </form>
</div>
<script src="{{ asset('/new/home/question/js/jquery-1.8.3.js') }}"></script>
<script src="{{ asset('/new/home/question/js/service.js') }}"></script>
<script src="{{ asset('/new/home/question/js/public.js') }}"></script>
</body>
</html>