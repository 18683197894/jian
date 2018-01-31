<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" name="viewport" />
    <link rel="stylesheet" href="{{ asset('/new/home/question/css/public.css') }}"/>
    <link rel="stylesheet" href="{{ asset('/new/home/question/css/style.css') }}"/>
    <title>期望装修风格</title>
</head>
<body>
<img src="{{ asset('/new/home/question/img/bg.jpg') }}" alt="" class="bg"/>
<div class="title">织金样板房调查</div>
<div class="brief">品质生活 从这里开始</div>
<div class="content">
    <div class="you">4.您期望的家庭装修风格：<span>*</span></div>
    <div class="click">
        <input type="hidden" name="id" value="{{ $id }}"/>

        <label class="loop">
            <input type="radio" value="中式风格" name="style"/> <span>中式风格</span>
        </label>
        <label class="loop">
            <input type="radio" value="现代风格" name="style"/> <span>现代风格</span>
        </label>
        <label class="loop">
            <input type="radio" value="美式风格" name="style"/> <span>美式风格</span>
        </label>
        <label class="loop">
            <input type="radio" value="北欧风格" name="style"/> <span>北欧风格</span>
        </label>
        <label class="loop">
            <input type="radio" value="其他" name="style"/> <span>其他</span>
        </label>
    </div>
</div>
<div class="Next">
    <a href="javascript:;">完成问卷调查</a>
</div>
<script src="{{ asset('/new/home/question/js/jquery-1.8.3.js') }}"></script>
<script src="{{ asset('/new/home/question/js/stylezhijin.js') }}"></script>
</body>
</html>
