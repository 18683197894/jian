<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" name="viewport" />
    <link rel="stylesheet" href="{{ asset('/new/home/question/css/public.css') }}"/>
    <link rel="stylesheet" href="{{ asset('/new/home/question/css/room_number.css') }}"/>
    <title>您的房号</title>
</head>
<body>
<img src="{{ asset('/new/home/question/img/bg.jpg') }}" alt="" class="bg"/>
<div class="title">织金样板房调查</div>
<div class="brief">品质生活 从这里开始</div>
<div class="content">
    <div class="you">3. 您的房号（例：2栋1号）：<span>*</span></div>
    <form action="{{ url('/newpro/zhijin/questionnaire/changzhu') }}" method="GET">
    <input type="text" name="fanghao" class="number"/>
        <input type="hidden" name="id" value="{{ $id }}"/>
        </form>
    <div class="room">请输入您的房间号</div>
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
<script src="{{ asset('/new/home/question/js/room_number.js') }}"></script>

</body>
</html>