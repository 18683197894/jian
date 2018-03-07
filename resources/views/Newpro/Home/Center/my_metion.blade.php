@extends('Newpro.Home.publiccenter')

@section('css')
<link rel="stylesheet" href="{{ asset('/new/home/center/my_metion.css') }}">
@endsection('css')

@section('content')
<div class="contact_right">
        <div class="title">个人信息</div>
        <div class="Information">
            <div class="Information_img">
            	@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                <img src="{{ asset('/uploads/user/img/') }}/{{ $data->img }}" alt=""/>
                <form action="{{ url('/newpro/center/my_metion/post') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="file" name="img">
                <button Onclick="return false">设置头像</button>
                </form>
            </div>
            <div class="data">
                <div class="jibn">基本资料</div>
                <div class="name names">姓名：{{ $data->names or '未设置' }}</div>
                <div class="name dates">生日：@if($data->date) {{ $data->date }} @else '未设置' }} @endif</div>
                <div class="name sexs">性别：{{ $data->sex or '未设置' }}</div>
                <!-- <div class="gexin">个性签名：小小程序猿</div> -->
            </div>
            <div class="modify">
                <a href="javascript:;" class="jichu">
                    <img src="{{ asset('/new/home/center/img/modify.png') }}" alt=""/>
                </a>
               <!--  <a href="javascript:;" class="gex">
                    <img src="" alt=""/>
                </a> -->
            </div>
        </div>
        <div class="Basics">
            <div class="Basics_top">
                <div class="Basics_loop">
                    <span>姓名：</span>
                    <input type="text" value="{{ $data->names }}" placeholder="请输入您的姓名"/>
                </div>
                <div class="Basics_loop">
                    <span>性别：</span>
                    <select class="sex_a">
                        <option @if($data->sex == '男') selected="selected" @endif value ="男">男</option>
                        <option @if($data->sex == '女') selected="selected" @endif value ="女">女</option>
                    </select>
                </div>
            </div>
            <div class="yea">
               <span>生日：</span>
               <select name="year" id="year" >
                   <option value="">选择年份</option>
               </select>
               <select name="month" id="month">
                   <option value="">选择月份</option>
               </select>
               <select id="days" class="day">
                   <option value="">选择日期</option>
               </select>
           </div>
            <div class="click_Ok">
                <a href="javascript:;" class="OK">确定</a>
                <a href="javascript:;" class="OK">取消</a>
            </div>
        </div>
        <!-- <div class="gaoji">
            <div class="gaoji_top">
                <span>个性签名：</span>
                <input type="text" placeholder="请输入个性签名"/>
            </div>
            <div class="gaoji_a">
                <a href="javascript:;" class="">确定</a>
                <a href="javascript:;" class="">取消</a>
            </div>
        </div> -->
    </div>
@endsection('content')

@section('js')
<script src="{{ asset('/new/home/center/my_metion.js') }}"></script>

@endsection('js')