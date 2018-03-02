<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" name="viewport" />
    <link rel="stylesheet" href="{{ asset('/new/home/question/css/public.css') }}"/>
    <link rel="stylesheet" href="{{ asset('/new/home/question/css/defuors.css') }}"/>
    <title>效果图选择</title>
</head>
<body>
<img src="{{ asset('/new/home/question/img/bg.jpg') }}" alt="" class="bg"/>
<div class="title">德福样板房效果图查看</div>
<div class="brief">品质生活 从这里开始</div>
<div class="effects">
    <div class="xians">
        <div class="bt">您选择的是下列装修风格(点击按钮查看)</div>
        @foreach($datas[10] as $k => $v)
        <a href="{{ $v }}">{{ $k }}</a>
        @endforeach
    </div>
    <div class="tuijian">
        <div class="bt">根据您的选择为您推荐下列装修风格(点击按钮查看)</div>
        @foreach($datas as $k => $v)
            @if($k != 10)
                @foreach($v as $kk => $vv)
                    <a href="{{ $vv }}">{{ $kk }}</a>
                @endforeach
            @endif
        @endforeach
    </div>
    @foreach($datas[10] as $k => $v)
        <img src="{{ asset('/new/home/question/img/'.$k.'.jpg') }}" alt="" class="yusuan"/>
        
        @endforeach
    <!--<a href="https://yun.kujiale.com/design/3FO4LP7XDXQO/show">A2户型北欧风格</a>-->
    <!--<a href="https://yun.kujiale.com/design/3FO4LR54M0S9/show">A2户型美式风格</a>-->
    <!--<a href="https://yun.kujiale.com/design/3FO4LR546MGN/show">A2户型现代风格</a>-->
    <!--<a href="https://yun.kujiale.com/design/3FO4LR55T8OV/show">B1户型北欧风格</a>-->
    <!--<a href="https://yun.kujiale.com/design/3FO4LPI8G9FO/show">B1户型美式风格</a>-->
    <!--<a href="https://yun.kujiale.com/design/3FO4LP7XALPO/show">B1户型现代风格</a>-->
    <!--<a href="https://yun.kujiale.com/design/3FO4LP7XN4QF/show">B2户型北欧风格</a>-->
    <!--<a href="https://yun.kujiale.com/design/3FO4LP7X2455/show">B2户型美式风格</a>-->
    <!--<a href="https://yun.kujiale.com/design/3FO4LQQBIT2H/show">B2户型现代风格</a>-->
    <!--<a href="https://yun.kujiale.com/design/3FO4LPILYPOA/show">C1户型北欧风格</a>-->
    <!--<a href="https://yun.kujiale.com/design/3FO4LPHL330G/show">C1户型美式风格</a>-->
    <!--<a href="https://yun.kujiale.com/design/3FO4LPHVP39P/show">C1户型现代风格</a>-->

    <!--<a href="https://yun.kujiale.com/design/3FO4LR53MC1V/show">C2户型北欧风格</a>-->
    <!--<a href="https://yun.kujiale.com/design/3FO4LR53DCQ7/show">C2户型美式风格</a>-->
    <!--<a href="https://yun.kujiale.com/design/3FO4LR53TEH0/show">C2户型现代风格</a>-->

    <!--<a href="https://yun.kujiale.com/design/3FO4LR66RLK8/show">C3户型北欧风格</a>-->
    <!--<a href="https://yun.kujiale.com/design/3FO4LR67MS69/show">C3户型美式风格</a>-->
    <!--<a href="https://yun.kujiale.com/design/3FO4LR66KJ54/show">C3户型现代风格</a>-->

                    
            
</div>
</body>
</html>