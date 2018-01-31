<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" name="viewport" />
    <link rel="stylesheet" href="{{ asset('/new/home/question/css/public.css') }}"/>
    <link rel="stylesheet" href="{{ asset('/new/home/question/css/index.css') }}"/>
    <title>德福公元问卷调查</title>
</head>
<body>
<div class="home">
    <img src="{{ asset('/new/home/question/img/defu.jpg') }}" alt=""/>
</div>

@if(!session('info'))
<a href="{{ url('/newpro/defu/questionnaire/name') }}" class="footer">开始填写</a>
@else
<a href="javascript:;" class="footer">无法完成调查</a>
@endif
</body>
</html>