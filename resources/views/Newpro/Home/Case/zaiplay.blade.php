@extends('Newpro.Home.publicused')

@section('css')
<link rel="stylesheet" href="{{ asset('/new/home/case/zaiplay.css') }}">
@endsection('css')

@section('content')
<div class="building_contact">
    <div class="current">当前位置：<a href="{{ url('/') }}">首页</a> > <a href="{{ url('/newpro/case/playindex?a=2') }}">在建案例</a> > <a href="#">在建案例详情</a></div>
    <div class="contact">
        <div class="case3con">
            <img src="{{ asset('/uploads/case/img') }}/{{ $data->img }}" alt="" class="case3con_img"/>
            <div class="conright">
                <title>{{ $data->title }}</title>
                <div class="con_span">
                    <a href="javascript:;">{{ $data->huxing }}</a>
                    <a href="javascript:;">{{ $data->fengge }}</a>
                    <a href="javascript:;">{{ $data->yusuan }}</a>
                </div>
                <ul class="con_con">
                    <li @if($data->or >=1) class="avtive" @endif>
                        <em></em>
                        <span>准备开工</span>
                    </li>
                   
                    <li @if($data->or >=2) class="avtive" @endif>
                        <em></em>
                        <span>水电阶段</span>
                    </li>
                    
                    <li @if($data->or >=3) class="avtive" @endif>
                        <em></em>
                        <span>泥木阶段</span>
                    </li>
                    
                    <li @if($data->or >=4) class="avtive" @endif>
                        <em></em>
                        <span>油漆阶段</span>
                    </li>
                    <li class="">
                        <em></em>
                        <span>已竣工</span>
                    </li>
                </ul>
            </div>
        </div>
        <div class="contact_process">
            <div class="title">施工流程</div>
            <div class="contact_details">
                @if($data->img1 != false)
                <div class="loop">
                    <em><span>准备开工</span></em>
                    <div class="loop_img">
                    	@foreach($data->img1 as $k => $v)
                        <a target="_blank" href="{{ url('/uploads/case/img') }}/{{ $v }}">
                            <img src="{{ asset('/uploads/case/img') }}/{{ $v }}" alt=""/>
                        </a>
                        @endforeach
                    </div>
                </div>
				@endif
				@if($data->img2 != false)
                <div class="loop">
                    <em><span>水电阶段</span></em>
                    <div class="loop_img">
						@foreach($data->img2 as $k => $v)
                        <a target="_blank" href="{{ url('/uploads/case/img') }}/{{ $v }}">
                            <img src="{{ asset('/uploads/case/img') }}/{{ $v }}" alt=""/>
                        </a>
                        @endforeach
                    </div>
                </div>
                @endif
                @if($data->img3)
                <div class="loop">
                    <em><span>泥木阶段</span></em>
                    <div class="loop_img">
                        @foreach($data->img3 as $k => $v)
                        <a target="_blank" href="{{ url('/uploads/case/img') }}/{{ $v }}">
                            <img src="{{ asset('/uploads/case/img') }}/{{ $v }}" alt=""/>
                        </a>
                        @endforeach
                    </div>
                </div>
                @endif
                @if($data->img4)
                 <div class="loop">
                    <em><span>油漆阶段</span></em>
                    <div class="loop_img">
                        @foreach($data->img4 as $k => $v)
                        <a target="_blank" href="{{ url('/uploads/case/img') }}/{{ $v }}">
                            <img src="{{ asset('/uploads/case/img') }}/{{ $v }}" alt=""/>
                        </a>
                        @endforeach
                    </div>
                </div>
                @endif
                <div class="xian"></div>
            </div>
        </div>
    </div>
</div>
@endsection('content')

@section('js')
<script src="{{ asset('/new/home/case/zaiplay.css') }}"></script>
@endsection('js')