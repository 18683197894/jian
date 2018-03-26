@extends('Newpro.Home.public')

@section('css')
<link rel="stylesheet" href="{{ asset('/new/home/estate/defu/defu.css') }}">
@endsection('css')

@section('content')
<div class="content">
    <div class="estate_df">
        <div class="auto">
            <div class="img">
                <div class="img_top">
                    <a href="javascript:;" class="avtive">
                        <img src="{{ asset('/new/home/estate/zheshang/img/pic_1.jpg')}}" alt=""/>
                    </a>
                    <a href="javascript:;" class="">
                        <img src="{{ asset('/new/home/estate/zheshang/img/pic_2.jpg')}}" alt=""/>
                    </a>
                    
                    <a href="javascript:;" class="">
                        <img src="{{ asset('/new/home/estate/zheshang/img/pic_4.jpg')}}" alt=""/>
                    </a>
                    <a href="javascript:;" class="">
                        <img src="{{ asset('/new/home/estate/zheshang/img/pic_5.jpg')}}" alt=""/>
                    </a>
                    <a href="javascript:;" class="">
                        <img src="{{ asset('/new/home/estate/zheshang/img/pic_6.jpg')}}" alt=""/>
                    </a>
                    <a href="javascript:;" class="">
                        <img src="{{ asset('/new/home/estate/zheshang/img/pic_7.jpg')}}" alt=""/>
                    </a>
                    <a href="javascript:;" class="">
                        <img src="{{ asset('/new/home/estate/zheshang/img/pic_8.jpg')}}" alt=""/>
                    </a>
                    <a href="javascript:;" class="">
                        <img src="{{ asset('/new/home/estate/zheshang/img/pic_9.jpg')}}" alt=""/>
                    </a>
                </div>
                <div class="img_click">
                    <a href="javascript:;" class="avtive">
                        <img src="{{ asset('/new/home/estate/zheshang/img/pic_1.jpg')}}" alt=""/>
                    </a>
                    <a href="javascript:;" class="">
                        <img src="{{ asset('/new/home/estate/zheshang/img/pic_2.jpg')}}" alt=""/>
                    </a>
                    
                    <a href="javascript:;" class="">
                        <img src="{{ asset('/new/home/estate/zheshang/img/pic_4.jpg')}}" alt=""/>
                    </a>
                    <a href="javascript:;" class="">
                        <img src="{{ asset('/new/home/estate/zheshang/img/pic_5.jpg')}}" alt=""/>
                    </a>
                    <a href="javascript:;" class="">
                        <img src="{{ asset('/new/home/estate/zheshang/img/pic_6.jpg')}}" alt=""/>
                    </a>
                    <a href="javascript:;" class="">
                        <img src="{{ asset('/new/home/estate/zheshang/img/pic_7.jpg')}}" alt=""/>
                    </a>
                    <a href="javascript:;" class="avtive">
                        <img src="{{ asset('/new/home/estate/zheshang/img/pic_8.jpg')}}" alt=""/>
                    </a>
                    <a href="javascript:;" class="avtive">
                        <img src="{{ asset('/new/home/estate/zheshang/img/pic_9.jpg')}}" alt=""/>
                    </a>
                </div>
            </div>
            <div class="loupan">
                <div class="top">
                    <div class="name">浙商.临港新天地</div>
                    <p>周边·南岸</p>
                    <div class="nve">
                        <div> 地段好 </div>
                        <div>交通便利</div>
                        <div>商业区</div>
                    </div>
                    <div class="jiage">
                        <span>楼盘均价</span><span class="num">9900/m²</span><span>(2015年参考价)</span>
                    </div>
                </div>
                <div class="time">
                    <div class="time_loop">开盘时间: 2015年2月7日</div>
                    <div class="time_loop">入住时间: 2017年7月1日</div>
                    <div class="time_loop">物业类型: 建筑综合体 写字楼...</div>
                    <div class="time_loop">楼盘地址: 宜宾市临港经济开发区护国路与长翠路交叉口</div>
                </div>
                <div class="lianx">
                    <img src="{{ asset('/new/home/estate/defu/img/estate_dian.gif')}}" alt=""/>
                    <span>0831-8888298  咨询楼盘信息</span>
                </div>
            </div>
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
        <a href="https://yun.kujiale.com/design/3FO4M0VAOCL0/show" class="loop" target="_blank">
            <img src="{{ asset('/new/home/estate/zheshang/img/zheshang_xd.jpg')}}" alt=""/>
            <i>点击360度预览</i>
            <span>浙商54平米-现代</span>
        </a>
        <a href="https://yun.kujiale.com/design/3FO4M0V1Q71C/show" class="loop" target="_blank">
            <img src="{{ asset('/new/home/estate/zheshang/img/zheshang_gs.jpg')}}" alt=""/>
            <i>点击360度预览</i>
            <span>浙商54平米-港式</span>
        </a>
    </div>
</div>
    <div class="Housing">
        <div class="title">
            <div class="boder">
                <div class="left">  楼盘户型</div>
                <div class="right">  Real estate</div>
            </div>
        </div>
        <div class="img">
            <a href="{{ url('/newpro/estate/zheshang/details?ors=Ahuxing') }}" target="_blank">
                <img src="{{ asset('/new/home/estate/zheshang/img/zheshang1.png')}}" alt=""/>
                <div class="huxin">A1户型</div>
                <div class="pingmi">
                    <span class="left">一房一厅</span>
                    <span class="right">62.0㎡</span>
                </div>
                <div class="zhuangtai">待售</div>
            </a>
            <a href="{{ url('/newpro/estate/zheshang/details?ors=Bhuxing') }}" target="_blank">
                <img src="{{ asset('/new/home/estate/zheshang/img/zheshang2.png')}}" alt=""/>
                <div class="huxin">B户型</div>
                <div class="pingmi">
                    <span class="left">一房一厅</span>
                    <span class="right">51.0㎡</span>
                </div>
                <div class="zhuangtai">待售</div>
            </a>
            <a href="{{ url('/newpro/estate/zheshang/details?ors=Chuxing') }}" target="_blank">
                <img src="{{ asset('/new/home/estate/zheshang/img/zheshang3.png')}}" alt=""/>
                <div class="huxin">C户型</div>
                <div class="pingmi">
                    <span class="left">一房一厅</span>
                    <span class="right">51.0㎡</span>
                </div>
                <div class="zhuangtai">待售</div>
            </a>
            <a href="{{ url('/newpro/estate/zheshang/details?ors=Dhuxing') }}" target="_blank">
                <img src="{{ asset('/new/home/estate/zheshang/img/zheshang4.png')}}" alt=""/>
                <div class="huxin">D户型</div>
                <div class="pingmi">
                    <span class="left">一房一厅</span>
                    <span class="right">54.0㎡</span>
                </div>
                <div class="zhuangtai">待售</div>
            </a>
            
        </div>
    </div>
</div>
@endsection('content')

@section('js')
<script src="{{ asset('/new/home/estate/defu/defu.js') }}"></script>
@endsection('js')