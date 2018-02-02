<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" name="viewport" />
    <link rel="stylesheet" href="{{ asset('/new/home/question/css/public.css') }}"/>
    <link rel="stylesheet" href="{{ asset('/new/home/question/css/feel.css') }}"/>
    <title>感谢您光临“建商联盟·万都智慧地产”体验厅，请问您对我们的产品有何感受？</title>
</head>
<body>
<img src="{{ asset('/new/home/question/img/bg.jpg') }}" alt="" class="bg"/>

<div class="title">织金样板房调查</div>
<div class="brief">品质生活 从这里开始</div>
<div class="container-box">
    <form action="{{ url('/newpro/zhijin/questionnaire/ors') }}" method="GET">
            <input type="hidden" name="id" value="{{ $data->id }}">
        <div class="content">
            <div class="you">11.感谢您光临“建商联盟·万都智慧地产”体验厅，请问您对我们的产品有何感受？<span>*</span></div>
            <div class="click">
                <div class="loop">
                    <div class="name">房屋设计效果:</div>
                    <label><input type="radio" @if($data->feel != null && $data->feel[0] == '满意') checked="checked" @endif value="满意" name="feel1"/> <span>满意</span></label>
                    <label><input type="radio" @if($data->feel != null && $data->feel[0] == '一般') checked="checked" @endif value="一般" name="feel1"/> <span>一般</span></label>
                    <label><input type="radio" @if($data->feel != null && $data->feel[0] == '不满意') checked="checked" @endif value="不满意" name="feel1"/> <span>不满意</span></label>
                </div>
                <div class="loop">
                    <div class="name">VR体验感受:</div>
                    <label><input type="radio" @if($data->feel != null && $data->feel[1] == '满意') checked="checked" @endif value="满意" name="feel2"/> <span>满意</span></label>
                    <label><input type="radio" @if($data->feel != null && $data->feel[1] == '一般') checked="checked" @endif value="一般" name="feel2"/> <span>一般</span></label>
                    <label><input type="radio" @if($data->feel != null && $data->feel[1] == '不满意') checked="checked" @endif  value="不满意" name="feel2"/> <span>不满意</span></label>
                </div>
                <div class="loop">
                    <div class="name">套餐内容:</div>
                    <label><input type="radio" @if($data->feel != null && $data->feel[2] == '满意') checked="checked" @endif value="满意" name="feel3"/> <span>满意</span></label>
                    <label><input type="radio" @if($data->feel != null && $data->feel[2] == '一般') checked="checked" @endif value="一般" name="feel3"/> <span>一般</span></label>
                    <label><input type="radio" @if($data->feel != null && $data->feel[2] == '不满意') checked="checked" @endif value="不满意" name="feel3"/> <span>不满意</span></label>
                </div>
                <div class="loop">
                    <div class="name">套餐价格:</div>
                    <label><input type="radio" @if($data->feel != null && $data->feel[3] == '满意') checked="checked" @endif value="满意" name="feel4"/> <span>满意</span></label>
                    <label><input type="radio" @if($data->feel != null && $data->feel[3] == '一般') checked="checked" @endif value="一般" name="feel4"/> <span>一般</span></label>
                    <label><input type="radio" @if($data->feel != null && $data->feel[3] == '不满意') checked="checked" @endif value="不满意" name="feel4"/> <span>不满意</span></label>
                </div>
                <div class="loop">
                    <div class="name">智能产品:</div>
                    <label><input type="radio" @if($data->feel != null && $data->feel[4] == '满意') checked="checked" @endif value="满意" name="feel5"/> <span>满意</span></label>
                    <label><input type="radio" @if($data->feel != null && $data->feel[4] == '一般') checked="checked" @endif value="一般" name="feel5"/> <span>一般</span></label>
                    <label><input type="radio" @if($data->feel != null && $data->feel[4] == '不满意') checked="checked" @endif value="不满意" name="feel5"/> <span>不满意</span></label>
                </div>
            </div>
            <div class="xuanz"></div>
        </div>
        <div class="Next">
            <a href="{{ asset('/newpro/zhijin/questionnaire/door?sid=') }}{{ $data->id }}">上一个</a>
            <a href="javascript:;" class="Next_a">下一页</a>
        </div>
    </form>
</div>

<script src="{{ asset('/new/home/question/js/jquery-1.8.3.js') }}"></script>
<script src="{{ asset('/new/home/question/js/feel.js') }}"></script>
<script src="{{ asset('/new/home/question/js/public.js') }}"></script>
</body>
</html>