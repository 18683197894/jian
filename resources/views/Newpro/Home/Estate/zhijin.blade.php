@extends('Newpro.Home.publicused')

@section('css')
<link rel="stylesheet" href="{{ asset('/new/home/estate/zhijin/zhijin.css') }}">
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
    <div class="dontai">
        <div class="title">
            <div class="boder">
                <div class="left">楼盘动态</div>
                <div class="right">Real estate</div>
            </div>
        </div>
        <div class="tab">
            <a href="javascript:;" class="">项目详情</a>
            <a href="javascript:;" class="avtive">万都超市</a>
            <a href="javascript:;">产品品鉴</a>
        </div>
        <div class="mask">
            <div class="mask_loop">
                <div class="auto">
                    <a href="{{ url('/newpro/estate/zhijin/inter/15') }}">项目介绍</a>
                    <a href="{{ url('/newpro/estate/zhijin/inter/12') }}">入驻商家</a>
                    <a href="{{ url('/newpro/estate/zhijin/inter/18') }}">运营管理</a>
                    <a href="{{ url('/newpro/estate/zhijin/inter/20') }}">集团实力</a>
                    <a href="{{ url('/newpro/estate/zhijin/inter/21') }}">工程进度</a>
                </div>
            </div>
            <div class="mask_loop">
                <div class="auto2">
                    <a href="{{ url('/newpro/estate/zhijin/inter/25') }}">盛大开业</a>
                    <a href="{{ url('/newpro/estate/zhijin/inter/26') }}">超市简介</a>
                    <a href="{{ url('/newpro/estate/zhijin/inter/28') }}">喜事酒</a>
                    <a href="{{ url('/newpro/estate/zhijin/inter/29') }}">外租区招商</a>
                </div>
            </div>
            <div class="mask_loop">
                <div class="auto2">
                    <a href="{{ url('/newpro/estate/zhijin/inter/31') }}">五星级住宅</a>
                    <a href="{{ url('/newpro/estate/zhijin/inter/32') }}">潮流小金库</a>
                    <a href="{{ url('/newpro/estate/zhijin/inter/35') }}">复式小公寓</a>
                    <a href="{{ url('/newpro/estate/zhijin/inter/36') }}">买铺抽汽车</a>
                </div>
            </div>
        </div>
    </div>
    <div class="New">
        <div class="title">
            <div class="boder">
                <div class="left">新闻动态</div>
                <div class="right">Estate dynamic</div>
                <a href="{{ url('/newpro/estate/zhijin/newslist') }}" class="More">查看更多新闻</a>
            </div>
        </div>
        <div class="xinwen">
        	@foreach($data as $k => $v)
            <a href="{{ url('/newpro/estate/zhijin/newsplay/') }}/{{ $v->id }}" class="loop">
                <span>{{ $v->pidname }}</span>
                <div class="name">{{ $v->title }}</div>
            </a>
            @endforeach
            
        </div>
    </div>
    <div class="D_max">
        <div class="title">
            <div class="boder">
                <div class="left">预览户型</div>
                <div class="right">Real estate</div>
            </div>
        </div>
        <div class="huxintu">
            <a href="{{ url('http://720yun.com/t/185j5denun1?pano_id=7140817') }}" class="loop" target="_blank">
                <img src="{{ asset('/new/home/estate/zhijin/img/huxin_A.png') }}" alt=""/>
                <i>点击360度预览</i>
            </a>
            <a href="{{ url('http://720yun.com/t/901j5d4Ouk1?pano_id=7266428') }}" class="loop" target="_blank">
                <img src="{{ asset('/new/home/estate/zhijin/img/huxin_B.png') }}" alt=""/>
                <i>点击360度预览</i>
            </a>
            <a href="{{ url('http://vr.justeasy.cn/view/982727.html') }}" class="loop" target="_blank">
                <img src="{{ asset('/new/home/estate/zhijin/img/huxin_C.jpg') }}" alt=""/>
                <i>点击360度预览</i>
            </a>
        </div>
    </div>
    <div class="Drawing">
        <div class="title">
            <div class="boder">
                <div class="left">楼盘户型</div>
                <div class="right">Real estate</div>
            </div>
        </div>
        <div class="Drawing_img">
            <a href="{{ url('/newpro/estate/zhijin/details?ors=A_1huxing') }}" target="_blank">
                <img src="{{ asset('/new/home/estate/zhijin/img/a_1.jpg') }}" alt=""/>
                <div class="name">A户型</div>
                <div class="daxiao">
                    <div class="left">2室2厅2卫</div>
                    <div class="right">126.6㎡</div>
                </div>
                <div class="daishou">待售</div>
            </a>
            <a href="{{ url('/newpro/estate/zhijin/details?ors=B_1huxing') }}" target="_blank">
                <img src="{{ asset('/new/home/estate/zhijin/img/b_1.jpg') }}" alt=""/>
                <div class="name">B户型</div>
                <div class="daxiao">
                    <div class="left">3室2厅2卫</div>
                    <div class="right">102.2㎡</div>
                </div>
                <div class="daishou">待售</div>
            </a>
            <a href="{{ url('/newpro/estate/zhijin/details?ors=C_1huxing') }}" target="_blank">
                <img src="{{ asset('/new/home/estate/zhijin/img/c_1.jpg') }}" alt=""/>
                <div class="name">C户型</div>
                <div class="daxiao">
                    <div class="left">2室1厅1卫</div>
                    <div class="right">86.55㎡</div>
                </div>
                <div class="daishou">待售</div>
            </a>
        </div>
    </div>
</div>
@endsection('content')

@section('js')
<script src="{{ asset('/new/home/estate/zhijin/zhijin.js') }}"></script>
@endsection('js')