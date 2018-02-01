<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" name="viewport" />
    <link rel="stylesheet" href="{{ asset('/new/home/question/css/public.css') }}"/>
    <link rel="stylesheet" href="{{ asset('/new/home/question/css/qccupation.css') }}"/>
    <title>您的职业</title>
</head>
<body>
    <img src="{{ asset('/new/home/question/img/bg.jpg') }}" alt="" class="bg"/>
<div class="title">德福样板房调查</div>
<div class="brief">品质生活 从这里开始</div>
<div class="container-box">
    <div class="content">
        <div class="you">4.您的职业:<span>*</span></div>
        <div class="click">
    <form action="{{ url('/newpro/defu/questionnaire/resident') }}" method="GET">
            <input type="hidden" name="id" value="{{ $data->id }}">
            <label class="loop">
                <input type="radio" name="qccupation" value="政府/机关干部/公务员" @if($data->qccupation == '政府/机关干部/公务员') checked="checked" @endif name="qccupation"/> <span>政府/机关干部/公务员</span>
            </label>
            <label class="loop">
                <input type="radio" name="qccupation" value="私营企业主" @if($data->qccupation == '私营企业主') checked="checked" @endif name="qccupation"/> <span>私营企业主</span>
            </label>
            <label class="loop">
                <input type="radio" name="qccupation" value="企业高管" @if($data->qccupation == '企业高管') checked="checked" @endif name="qccupation"/> <span>企业高管</span>
            </label>
            <label class="loop">
                <input type="radio" name="qccupation" value="专业人员" @if($data->qccupation == '专业人员') checked="checked" @endif name="qccupation"/> <span>专业人员（医生/律师/记者/教师等）</span>
            </label>
            <label class="loop">
                <input type="radio" name="qccupation" value="自由职业者" @if($data->qccupation == '自由职业者') checked="checked" @endif name="qccupation"/> <span>自由职业者</span>
            </label>
        </form>
        </div>
        <div class="xuanz">请选择您的职业</div>
    </div>
    <div class="Next">
        <a href="{{ url('/newpro/defu/questionnaire/phone?sid=') }}{{ $data->id }}">上一页</a>
        <a href="javascript:;" class="Next_a">下一页</a>
    </div>
</div>
<script src="{{ asset('/new/home/question/js/jquery-1.8.3.js') }}"></script>
<script src="{{ asset('/new/home/question/js/qccupation.js') }}"></script>
<script src="{{ asset('/new/home/question/js/public.js') }}"></script>
</body>
</html>