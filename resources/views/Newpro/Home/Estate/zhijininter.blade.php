@extends('Newpro.Home.public')

@section('css')
<link rel="stylesheet" href="{{ asset('/new/home/estate/zhijin/zhijin.css') }}">
<link rel="stylesheet" href="{{ asset('/new/home/estate/zhijin/zhijininter.css') }}">
@endsection('css')

@section('content')
<div class="content">
    <div class="estate_zj">
        <div class="auto">
            <div class="img">
                <div class="img_top">
                    <a href="javascript:;" class="avtive">
                        <img src="{{ asset('/new/home/estate/zhijin/img/estate_zj1.png') }}" alt=""/>
                    </a>
                    <a href="javascript:;" class="">
                        <img src="{{ asset('/new/home/estate/zhijin/img/estate_zj2.png') }}" alt=""/>
                    </a>
                </div>
                <div class="img_click">
                    <a href="javascript:;" class="avtive">
                        <img src="{{ asset('/new/home/estate/zhijin/img/estate_zj1.png') }}" alt=""/>
                    </a>
                    <a href="javascript:;" class="">
                        <img src="{{ asset('/new/home/estate/zhijin/img/estate_zj2.png') }}" alt=""/>
                    </a>

                </div>
            </div>
            <div class="loupan">
                <div class="top">
                    <div class="name">织金.织金万都铭城</div>
                    <p>贵州-毕节</p>
                    <div class="nve">
                        <div>商业区</div>
                        <div>低密度</div>
                        <div>改善盘</div>
                    </div>
                    <div class="jiage">
                        <span>楼盘均价</span><span class="num">3800/m²</span><span>(2017年参考价)</span>
                    </div>
                </div>
                <div class="time">
                    <div class="time_loop">开盘时间: </div>
                    <div class="time_loop">入住时间: </div>
                    <div class="time_loop">物业类型: 商铺 住宅</div>
                    <div class="time_loop">楼盘地址: 织金县金北大道与环城路交叉口</div>
                </div>
                <div class="lianx">
                    <img src="{{ asset('/new/home/estate/defu/img/estate_dian.gif') }}" alt=""/>
                    <span>400-188-6585  咨询楼盘信息</span>
                </div>
            </div>
        </div>
    </div>
    <div class="zhijin_page">
        <div class="top">
            <div class="left">{{ $data->title }}</div>
            <a href="{{ url('/newpro/estate/zhijin') }}" class="right">返回</a>
        </div>
        <div class="content_con">
            <div class="con_left">
                @php echo $data->content @endphp
            </div>
            <div class="con_right">
                <a href="{{ url('/newpro/estate/zhijin/newslist') }}" class="title">楼盘动态</a>
                <ul>
                    <li><a href="javascript:;" class="title">项目详情</a></li>
                    <li><a href="{{ url('/newpro/estate/zhijin/inter/15') }}" class="xiaobt">项目介绍</a></li>
                    <li><a href="{{ url('/newpro/estate/zhijin/inter/12') }}" class="xiaobt">部分入驻商家</a></li>
                    <li><a href="{{ url('/newpro/estate/zhijin/inter/18') }}" class="xiaobt">运营管理</a></li>
                    <li><a href="{{ url('/newpro/estate/zhijin/inter/20') }}" class="xiaobt">集团实力</a></li>
                    <li><a href="{{ url('/newpro/estate/zhijin/inter/21') }}" class="xiaobt">工程进度</a></li>
                </ul>
                <ul>
                    <li><a href="javascript:;" class="title">万都超市</a></li>
                   	<a href="{{ url('/newpro/estate/zhijin/inter/25') }}" class="xiaobt">盛大开业</a>
                    <a href="{{ url('/newpro/estate/zhijin/inter/26') }}" class="xiaobt">超市简介</a>
                    <a href="{{ url('/newpro/estate/zhijin/inter/28') }}" class="xiaobt">喜事酒</a>
                    <a href="{{ url('/newpro/estate/zhijin/inter/29') }}" class="xiaobt">外租区招商</a>
                </ul>
                <ul>
                    <li><a href="javascript:;" class="title">产品品鉴</a></li>
                    <a href="{{ url('/newpro/estate/zhijin/inter/31') }}" class="xiaobt">五星级住宅</a>
                    <a href="{{ url('/newpro/estate/zhijin/inter/32') }}" class="xiaobt">潮流小金库</a>
                    <a href="{{ url('/newpro/estate/zhijin/inter/35') }}" class="xiaobt">复式小公寓</a>
                    <a href="{{ url('/newpro/estate/zhijin/inter/36') }}" class="xiaobt">买铺抽汽车</a>
                </ul>
            </div>
        </div>
        <div class="dianji">

        </div>
    </div>
</div>
@endsection('content')

@section('js')
<script src="{{ asset('/new/home/estate/zhijin/zhijininter.js') }}"></script>
@endsection('js')