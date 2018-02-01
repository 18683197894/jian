@extends('Newpro.Home.publicused')

@section('css')
    <link rel="stylesheet" href="{{ asset('new/home/case/play.css') }}"/>

@endsection('css')

@section('content')
<div class="Case_contact">
    <div class="current">当前位置：<a href="{{ url('/') }}">首页</a> > <a href="{{ url('/newpro/case/index') }}">完整案例</a> > <a href="#">案例详情</a></div>
    <div class="box">
        <div class="title">{{ $data->title }}</div>
        <div class="brief">
            <span>{{ $data->huxing }}</span><span>{{ $data->fengge }}</span><span>{{ $data->yusuan }}</span>
        </div>
        <div class="Carousel">
            <!--轮播-->
            <div class="area">

                <a id="prev" class="prevBtn qq" href="javascript:void(0)"><</a>

                <a id="next" class="nextBtn qq" href="javascript:void(0)">></a>

                <div id="js" class="js">

                    <div class="box01">
						@foreach($data->img as $k => $v)
                        <div class="banner1">
                            <img onClick="location.href='#'"  src="{{ url('/uploads/case/img') }}/{{$v}}">
                            <div class="titlel">{{ $k }}</div>
                        </div>
                        @endforeach
                    </div>
                    <div class="bg"></div>
                    <div id="jsNav" class="jsNav">

                        <a class="trigger imgSelected" href="javascript:void(0)"></a>

                        <a class="trigger" href="javascript:void(0)"></a>

                        <a class="trigger" href="javascript:void(0)"></a>

                        <a class="trigger" href="javascript:void(0)"></a>

                    </div>
                </div>

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
                    	@foreach($data->img1 as $k => $v)
                        <img src="{{ asset('/uploads/case/img') }}/{{ $v }}" alt=""/>
                        @endforeach
                    </div>
                </div>
                <div class="loop">
                    <em>
                        <span>水电阶段</span>
                    </em>
                    <div class="loop_img">
                        @foreach($data->img2 as $k => $v)
                        <img src="{{ asset('/uploads/case/img') }}/{{ $v }}" alt=""/>
                        @endforeach
                    </div>
                </div>
                <div class="loop">
                    <em>
                        <span>泥木阶段</span>
                    </em>
                    <div class="loop_img">
                        @foreach($data->img3 as $k => $v)
                        <img src="{{ asset('/uploads/case/img') }}/{{ $v }}" alt=""/>
                        @endforeach
                    </div>
                </div>
                <div class="loop">
                    <em>
                        <span>油漆阶段</span>
                    </em>
                    <div class="loop_img">
                       @foreach($data->img4 as $k => $v)
                        <img src="{{ asset('/uploads/case/img') }}/{{ $v }}" alt=""/>
                        @endforeach
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