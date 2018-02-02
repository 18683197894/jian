<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" name="viewport" />
     <link rel="stylesheet" href="{{ asset('/new/home/question/css/public.css') }}"/>
    <link rel="stylesheet" href="{{ asset('/new/home/question/css/care.css') }}"/>
    <title>您更倾向于选择哪种装修服务</title>
</head>
<body>
    <img src="{{ asset('/new/home/question/img/bg.jpg') }}" alt="" class="bg"/>
<div class="title">织金样板房调查</div>
<div class="brief">品质生活 从这里开始</div>
<div class="container-box">
    <form action="{{ url('/newpro/zhijin/questionnaire/style') }}" method="GET">
            <input type="hidden" name="id" value="{{ $data->id }}">
        <div class="content">
            <div class="you">6.在您选择装修服务时，您最在意哪个方面？：<span>*</span></div>
            <div class="click">
                <label class="loop">
                    <input type="checkbox" @if($data->care != null && $data->care[0] == '价格') checked="checked" @endif value="价格" name="care1"/> <span>价格）</span>
                </label>
                <label class="loop">
                    <input type="checkbox" @if($data->care != null && $data->care[1] == '设计水平') checked="checked" @endif value="设计水平" name="care2"/> <span>设计水平</span>
                </label>
                <label class="loop">
                    <input type="checkbox" @if($data->care != null && $data->care[2] == '是否省心省事') checked="checked" @endif value="是否省心省事" name="care3"/> <span>是否省心省事</span>
                </label>
                <label class="loop">
                    <input type="checkbox" @if($data->care != null && $data->care[3] == '施工质量与效果') checked="checked" @endif value="施工质量与效果" name="care4"/> <span>施工质量与效果</span>
                </label>
                <label class="loop">
                    <input type="checkbox" @if($data->care != null && $data->care[4] == '施工进度') checked="checked" @endif value="施工进度" name="care5"/> <span>施工进度</span>
                </label>
                <label class="loop">
                    <input type="checkbox" @if($data->care != null && $data->care[5] == '材料的品牌') checked="checked" @endif value="材料的品牌" name="care6"/> <span>材料的品牌</span>
                </label>
                <label class="loop">
                    <input type="checkbox" @if($data->care != null && $data->care[6] == '资金安全保障') checked="checked" @endif value="资金安全保障" name="care7"/> <span>资金安全保障</span>
                </label>
            </div>
            <div class="xuanz">请选择您的您最在意哪个方面</div>
        </div>
        <div class="Next">
            <a href="{{ url('/newpro/zhijin/questionnaire/service?sid=') }}{{ $data->id }}">上一页</a>
            <a href="javascript:;" class="Next_a">下一页</a>
        </div>
    </form>
</div>
<script src="{{ asset('/new/home/question/js/jquery-1.8.3.js') }}"></script>
<script src="{{ asset('/new/home/question/js/care.js') }}"></script>
<script src="{{ asset('/new/home/question/js/public.js') }}"></script>
</body>
</html>