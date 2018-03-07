@extends('Newpro.Home.publiccenter')

@section('css')
<link rel="stylesheet" href="{{ asset('/new/home/center/my_modify.css') }}">
@endsection('css')

@section('content')
<div class="contact_right">
        <div class="title">密码修改</div>
        <div class="used">
            <span>原密码</span>
            <input type="password" name="yuan" placeholder="输入原密码"/>
            <div class="used_cw">密码错误！</div>
        </div>
        <div class="used">
            <span>新密码</span>
            <input type="password" name="new" placeholder="输入新密码"/>
            <input type="password" name="news" placeholder="确认新密码"/>
            <div class="used_mm">密码不一致！</div>
        </div>
        <a href="javascript:;" class="tijiao">提交</a>
    </div>
@endsection('content')

@section('js')
<script src="{{ asset('/new/home/center/my_modify.js') }}"></script>

@endsection('js')