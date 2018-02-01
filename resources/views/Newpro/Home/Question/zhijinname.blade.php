<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" name="viewport" />
   <link rel="stylesheet" href="{{ asset('/new/home/question/css/public.css') }}"/>
    <link rel="stylesheet" href="{{ asset('/new/home/question/css/name.css') }}"/>
    <title>请输入您的姓名</title>
</head>
<body>
    <img src="{{ asset('/new/home/question/img/bg.jpg') }}" alt="" class="bg"/>
    <div class="title">织金样板房调查</div>
    <div class="brief">品质生活 从这里开始</div>
    <div class="content">
        <div class="you">1. 您的姓名：<span>*</span></div>
        <form action="{{ url('/newpro/zhijin/questionnaire/phone') }}" method="get">
        <input type="text" name="name" class="name"/>
        </form>
        <div class="tishi">请输入您的姓名</div>
        <div class="hanzi">请输入您的中文姓名</div>
    </div>
    @if( session('info') )
	<div class="Next">
        <a href="javascript:;" onClick="return false">{{ session('info') }}</a>
    </div>
    @else
	<div class="Next">
        <a href="javascript:;">下一页</a>
    </div>
    @endif
    

<script src="{{ asset('/new/home/question/js/jquery-1.8.3.js') }}"></script>
<script src="{{ asset('/new/home/question/js/name.js') }}"></script>
<script src="{{ asset('/new/home/question/js/public.js') }}"></script>

</body>
</html>