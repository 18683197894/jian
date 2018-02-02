@extends('Newpro.Home.publicused')

@section('css')
    <link rel="stylesheet" href="{{ asset('new/home/case/play.css') }}"/>

@endsection('css')

@section('content')
<div class="Case_contact">
    <div class="current">当前位置：<a href="#">首页</a> > <a href="#">完整案例</a> > <a href="#">案例详情</a></div>
    <div class="box1">
        <div class="title">贵州织金万都铭城港式</div>
        <div class="brief">
            <span>小户型</span><span>现代</span><span>8万-12万</span>
        </div>
        <div class="Carousel">
            <!--轮播-->
            <div class="win" index="{{ count($data->effect2) }}">
                <div class="box">
                    @foreach($data->effect2 as $k => $v)
                    <div @if($loop->first) style="left:0" class="num1" @endif  index="{{ $loop->index }}"><img  src="{{ asset('/uploads/case/img/') }}/{{ $v }}" style="display: inline;"></div>
                    
                    @endforeach
                </div>
                <div class="leftB">&lt;</div>
                <div class="rightB">&gt;</div>
                <ul class="con1_leftul">
                @foreach($data->effect1 as $k => $v)
                    <li id="index{{ $loop->index }}" @if($loop->first) style="display:block" @else style="display:none" @endif >{{ $v }}</li>
                @endforeach
                </ul>
            </div>
            <!--右边-->
            <div  class="Carousel_right">
                <div class="information">
                    <div class="title">我家也要设计成这样</div>
                    <input type="text" placeholder="请输入你的姓名"/>
                    <input type="text" placeholder="请输入你的电话"/>
                    <button>立即提交</button>
                </div>
                <div class="Customer">
                    <div class="kefu">在线客服 :</div>
                    <div class="Customer_zx">
                        <i></i>
                        <span>2022509729</span>
                    </div>
                    <div class="kefu">咨询电话 :</div>
                    <div class="Customer_zx">
                        <em></em>
                        <span>400-188-6585</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="course">
            <div class="title">施工流程</div>
            <div class="contact">
                <div class="loop">
                    <em>
                        <span>准备开工</span>
                    </em>
                    <div class="loop_img">
                        <img src="img/150995022227089.png" alt=""/>
                    </div>
                </div>
                <div class="loop">
                    <em>
                        <span>准备开工</span>
                    </em>
                    <div class="loop_img">
                        <img src="img/150995022227089.png" alt=""/>
                    </div>
                </div>
                <div class="loop">
                    <em>
                        <span>准备开工</span>
                    </em>
                    <div class="loop_img">
                        <img src="img/150995022227089.png" alt=""/>
                    </div>
                </div>
                <div class="loop">
                    <em>
                        <span>准备开工</span>
                    </em>
                    <div class="loop_img">
                        <img src="img/150995022227089.png" alt=""/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection('content')

@section('js')
<script src="{{ asset('/new/home/case/play.js') }}"></script>
@endsection('js')