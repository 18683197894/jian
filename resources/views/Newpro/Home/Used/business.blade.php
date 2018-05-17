@extends('Newpro.Home.public')

@section('css')
<link rel="stylesheet" href="{{ asset('/new/home/business/business.css') }}">
@endsection('css')

@section('content')
<!--banner-->
<div class="banner">
    <img src="{{ asset('./new/home/business/img/cooperation_banner.png') }}" alt=""/>
</div>
<!--合作流程-->
<div class="Process">
    <div class="Title">
        <div class="name">
            合作流程
        </div>
        <div class="xiaobiao">Business cooperation</div>
    </div>
    <div class="Step">
        <a href="javascript:;">
            浏览网站认识我们
            <span>1</span>
        </a>
        <a href="javascript:;">
            浏览网站认识我们
            <span>2</span>
        </a>
        <a href="javascript:;">
            浏览网站认识我们
            <span>3</span>
        </a>
        <a href="javascript:;">
            浏览网站认识我们
            <span>4</span>
        </a>
        <a href="javascript:;">
            浏览网站认识我们
            <span>5</span>
        </a>
        <a href="javascript:;">
            浏览网站认识我们
            <span>6</span>
        </a>
    </div>
</div>

<div class="zhidian">
    <i></i><span>我们关于合作的研究和沟通是无框架的，欢迎您的致电！</span>
</div>
<div class="Cll">
    <i>商务合作联系可拨打右边电话 0831-8888598</i>
    <span>资料邮件可发送至邮箱 market@jianshanglianmeng.com</span>
</div>
@endsection('content')

@section('js')

@endsection('js')