@extends('Newpro.Home.publiccenter')

@section('css')
<link rel="stylesheet" href="{{ asset('new/home/center/my_notice.css') }}">
@endsection('css')

@section('content')
<div class="contact_right">
        <div class="title">消息通知</div>
        <div class="logistics">
            <a href="javascript:;" class="avtive">全部消息</a>
            <a href="javascript:;">物流动态</a>
        </div>
        <div class="con">
            <div class="loop avtive">暂无消息</div>
            <div class="loop">暂无物流动态</div>
        </div>
    </div>
@endsection('content')

@section('js')
<script src="{{ asset('/new/home/center/my_notice.js') }}"></script>
@endsection('js')