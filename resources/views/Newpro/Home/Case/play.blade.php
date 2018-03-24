@extends('Newpro.Home.public')

@section('css')
    <link rel="stylesheet" href="{{ asset('new/home/case/play.css') }}"/>

@endsection('css')

@section('content')
<div class="Case_contact">
    <div class="current">当前位置：<a href="{{ url('/') }}">首页</a> > <a href="{{ url('/newpro/case/playindex?a=1') }}">完整案例</a> > <a href="#">案例详情</a></div>
    <div class="box1">
        <div class="title">{{ $data->title }}</div>
        <div class="brief">
            <span>{{ $data->huxing }}</span><span>{{ $data->fengge }}</span><span>{{ $data->yusuan }}</span>
        </div>
        <div class="Carousel">
            <!--轮播-->
            <div class="win" index="{{ count($data->effect2) }}">
                <div class="box">
                    @if($a == null)
                    @foreach($data->eff as $k => $v)
                    <div @if($loop->first) style="left:0" class="num1" @endif  index="{{ $loop->index }}"><img  src="{{ asset('/uploads/case/img/') }}/{{ $v }}" style="display: inline;"></div>
                    @endforeach
                    @else
                    @foreach($data->eff as $k => $v)
                    <div @if($b == $v) style="left:0" class="num1" @endif index="{{ $loop->index }}"><img  src="{{ asset('/uploads/case/img/') }}/{{ $v }}" style="display: inline;"></div>
                    @endforeach
                    @endif
                </div>
                <div class="leftB">&lt;</div>
                <div class="rightB">&gt;</div>
                <ul class="con1_leftul">
                @if($a == null)
                @foreach($data->eff as $kk => $vv)
                    <li id="index{{ $loop->index }}" @if($loop->first) style="display:block" @else style="display:none" @endif >{{ $kk }}</li>
                @endforeach
                @else
                @foreach($data->eff as $kk => $vv)
                    <li id="index{{ $loop->index }}" @if($kk == $a) style="display:block" @else style="display:none" @endif >{{ $kk }}</li>
                @endforeach
                @endif
                </ul>
            </div>
            <!--右边-->
            <div class="con1_right">
                    <div class="con1_right_con1" index="{{ $data->id }}">
                        <title>我家也要设计成这样</title>
                        <label for="">
                            <input type="text"  placeholder="你的姓名" >
                            <span>请输入你的姓名</span>
                        </label>
                        <label for="">
                            <input type="text"  placeholder="你的电话">
                            <span>请输入你的电话</span>
                        </label>
                        <button>立即提交</button>
                    </div>
                    <div class="con1_right_con2">
                        <label for="" class="label1">

                            <title>在线客服 :</title>
                            <em></em>
                            <span>2022509729</span>
                        </label>
                        <label for="" class="label2">

                            <title>咨询电话 :</title>
                            <em></em>
                            <span>400-188-6585</span>
                        </label>
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
                        @foreach($data->img1 as $k => $v)
                        <a target="_blank" href="{{ url('/uploads/case/img') }}/{{ $v }}"><img src="{{ asset('/uploads/case/img') }}/{{ $v }}" alt=""/></a>
                        @endforeach
                    </div>
                </div>
                <div class="loop">
                    <em>
                        <span>水电阶段</span>
                    </em>
                    <div class="loop_img">
                        @foreach($data->img2 as $k => $v)
                        <a target="_blank" href="{{ url('/uploads/case/img') }}/{{ $v }}"><img src="{{ asset('/uploads/case/img') }}/{{ $v }}" alt=""/></a>
                        @endforeach
                    </div>
                </div>
                <div class="loop">
                    <em>
                        <span>泥木阶段</span>
                    </em>
                    <div class="loop_img">
                        @foreach($data->img3 as $k => $v)
                        <a target="_blank" href="{{ url('/uploads/case/img') }}/{{ $v }}"><img src="{{ asset('/uploads/case/img') }}/{{ $v }}" alt=""/></a>
                        @endforeach
                    </div>
                </div>
                <div class="loop">
                    <em>
                        <span>油漆阶段</span>
                    </em>
                    <div class="loop_img">
                        @foreach($data->img4 as $k => $v)
                        <a target="_blank" href="{{ url('/uploads/case/img') }}/{{ $v }}"><img src="{{ asset('/uploads/case/img') }}/{{ $v }}" alt=""/></a>
                        @endforeach                        
                    </div>
                </div>
                <div class="xian"></div>
            </div>
        </div>
    </div>
</div>
@endsection('content')

@section('js')
<script src="{{ asset('/new/home/case/play.js') }}"></script>
@endsection('js')