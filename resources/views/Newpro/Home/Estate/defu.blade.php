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
                    <a href="javascript:;" class="avtive" >
                        <img src="{{ asset('/new/home/estate/defu/img/estate_df1.jpg')}}" alt=""/>
                    </a>
                    <a href="javascript:;" class="">
                        <img src="{{ asset('/new/home/estate/defu/img/estate_df2.jpg')}}" alt=""/>
                    </a>
                    <a href="javascript:;" class="">
                        <img src="{{ asset('/new/home/estate/defu/img/estate_df3.jpg')}}" alt=""/>
                    </a>
                    <a href="javascript:;" class="">
                        <img src="{{ asset('/new/home/estate/defu/img/estate_df4.jpg')}}" alt=""/>
                    </a>
                    <a href="javascript:;" class="">
                        <img src="{{ asset('/new/home/estate/defu/img/estate_df5.jpg')}}" alt=""/>
                    </a>
                    <a href="javascript:;" class="">
                        <img src="{{ asset('/new/home/estate/defu/img/estate_df6.jpg')}}" alt=""/>
                    </a>
                    <a href="javascript:;" class="">
                        <img src="{{ asset('/new/home/estate/defu/img/estate_df7.jpg')}}" alt=""/>
                    </a>
                    <a href="javascript:;" class="">
                        <img src="{{ asset('/new/home/estate/defu/img/estate_df8.jpg')}}" alt=""/>
                    </a>
                </div>
                <div class="img_click">
                    <a href="javascript:;" class="avtive">
                        <img src="{{ asset('/new/home/estate/defu/img/estate_df1.jpg')}}" alt=""/>
                    </a>
                    <a href="javascript:;" class="">
                        <img src="{{ asset('/new/home/estate/defu/img/estate_df2.jpg')}}" alt=""/>
                    </a>
                    <a href="javascript:;" class="">
                        <img src="{{ asset('/new/home/estate/defu/img/estate_df3.jpg')}}" alt=""/>
                    </a>
                    <a href="javascript:;" class="">
                        <img src="{{ asset('/new/home/estate/defu/img/estate_df4.jpg')}}" alt=""/>
                    </a>
                    <a href="javascript:;" class="">
                        <img src="{{ asset('/new/home/estate/defu/img/estate_df5.jpg')}}" alt=""/>
                    </a>
                    <a href="javascript:;" class="">
                        <img src="{{ asset('/new/home/estate/defu/img/estate_df6.jpg')}}" alt=""/>
                    </a>
                    <a href="javascript:;" class="">
                        <img src="{{ asset('/new/home/estate/defu/img/estate_df7.jpg')}}" alt=""/>
                    </a>
                    <a href="javascript:;" class="avtive">
                        <img src="{{ asset('/new/home/estate/defu/img/estate_df8.jpg')}}" alt=""/>
                    </a>
                </div>
            </div>
            <div class="loupan">
                <div class="top">
                    <div class="name">德福公元</div>
                    <p>周边·柏溪</p>
                    <div class="nve">
                        <div> 商租房 </div>
                        <div>交通便利</div>
                        <div>商业区</div>
                    </div>
                    <div class="jiage">
                        <span>楼盘均价</span><!-- <span class="num">4100/m²</span><span>(2015年参考价)</span> -->
                    </div>
                </div>
                <div class="time">
                    <div class="time_loop">开盘时间: </div>
                    <div class="time_loop">入住时间: </div>
                    <div class="time_loop">物业类型: 商铺 住宅</div>
                    <div class="time_loop">楼盘地址: 宜宾县城北新区君毅路德福公元</div>
                </div>
                <div class="lianx">
                    <img src="{{ asset('/new/home/estate/defu/img/estate_dian.gif')}}" alt=""/>
                    <span>0831-8888298  咨询楼盘信息</span>
                </div>
            </div>
        </div>
    </div>
<!--德福-->
<div class="D_max">
    <div class="title">
        <div class="boder">
            <div class="left">预览户型</div>
            <div class="right">Real estate</div>
        </div>
    </div>
    <div class="huxintu">
        <a href="https://yun.kujiale.com/design/3FO4LR54MUVI/show" class="loop" target="_blank">
            <img src="{{ asset('/new/home/estate/defu/img/df_hxA.jpg')}}" alt=""/>
            <i>点击360度预览</i>
            <span>A1户型-现代风格</span>
        </a>
        <a href="https://yun.kujiale.com/design/3FO4LR54CN4G/show" class="loop" target="_blank">
            <img src="{{ asset('/new/home/estate/defu/img/df_hxA_m.jpg')}}" alt=""/>
            <i>点击360度预览</i>
            <span>A1户型-美式风格</span>
        </a>
        <a href="https://yun.kujiale.com/design/3FO4LR54FF3A/show" class="loop" target="_blank">
            <img src="{{ asset('/new/home/estate/defu/img/df_hxA_o.jpg')}}" alt=""/>
            <i>点击360度预览</i>
            <span>A1户型-北欧风格</span>
        </a>
        <a href="https://yun.kujiale.com/design/3FO4LR54M0S9/show" class="loop" target="_blank">
            <img src="{{ asset('/new/home/estate/defu/img/df_hxA2.jpg')}}" alt=""/>
            <i>点击360度预览</i>
            <span>A2户型-美式风格</span>
        </a>
        <a href="https://yun.kujiale.com/design/3FO4LP7XDXQO/show" class="loop" target="_blank">
            <img src="{{ asset('/new/home/estate/defu/img/df_hxA2_o.jpg')}}" alt=""/>
            <i>点击360度预览</i>
            <span>A2户型-北欧风格</span>
        </a>
        <a href="https://yun.kujiale.com/design/3FO4LR546MGN/show" class="loop" target="_blank">
            <img src="{{ asset('/new/home/estate/defu/img/df_hxA2_x.jpg')}}" alt=""/>
            <i>点击360度预览</i>
            <span>A2户型-现代风格</span>
        </a>
        <a href="https://yun.kujiale.com/design/3FO4LPI8G9FO/show" class="loop" target="_blank">
            <img src="{{ asset('/new/home/estate/defu/img/df_hxB.png')}}" alt=""/>
            <i>点击360度预览</i>
            <span>B1户型-美式风格</span>
        </a>
        <a href="https://yun.kujiale.com/design/3FO4LR55T8OV/show" class="loop">
            <img src="{{ asset('/new/home/estate/defu/img/df_hxB_o.jpg')}}" alt=""/>
            <i>点击360度预览</i>
            <span>B1户型-北欧风格</span>
        </a>
        <a href="https://yun.kujiale.com/design/3FO4LP7XALPO/show" class="loop" target="_blank">
            <img src="{{ asset('/new/home/estate/defu/img/df_hxB_x.jpg')}}" alt=""/>
            <i>点击360度预览</i>
            <span>B1户型-现代风格</span>
        </a>
        <a href="https://yun.kujiale.com/design/3FO4LP7XN4QF/show" class="loop" target="_blank">
            <img src="{{ asset('/new/home/estate/defu/img/df_hxB2_o.jpg')}}" alt=""/>
            <i>点击360度预览</i>
            <span>B2户型-北欧风格</span>
        </a>
        <a href="https://yun.kujiale.com/design/3FO4LP7X2455/show" class="loop">
            <img src="{{ asset('/new/home/estate/defu/img/df_hxB2_m.jpg')}}" alt=""/>
            <i>点击360度预览</i>
            <span>B2户型-美式风格</span>
        </a>
        <a href="https://yun.kujiale.com/design/3FO4LQQBIT2H/show" class="loop" target="_blank">
            <img src="{{ asset('/new/home/estate/defu/img/df_hxB2_x.jpg')}}" alt=""/>
            <i>点击360度预览</i>
            <span>B2户型-现代风格</span>
        </a>
        <a href="https://yun.kujiale.com/design/3FO4LPILYPOA/show" class="loop" target="_blank">
            <img src="{{ asset('/new/home/estate/defu/img/df_hxC.jpg')}}" alt=""/>
            <i>点击360度预览</i>
            <span>C1户型-北欧风格</span>
        </a>
        <a href="https://yun.kujiale.com/design/3FO4LPHL330G/show" class="loop" target="_blank">
            <img src="{{ asset('/new/home/estate/defu/img/df_hxC_m.jpg')}}" alt=""/>
            <i>点击360度预览</i>
            <span>C1户型-美式风格</span>
        </a>
        <a href="https://yun.kujiale.com/design/3FO4LPHVP39P/show" class="loop" target="_blank">
            <img src="{{ asset('/new/home/estate/defu/img/df_hxC_x.jpg')}}" alt=""/>
            <i>点击360度预览</i>
            <span>C1户型-现代风格</span>
        </a>
        <a href="https://yun.kujiale.com/design/3FO4LR53MC1V/show" class="loop" target="_blank">
            <img src="{{ asset('/new/home/estate/defu/img/df_hxC2_o.jpg')}}" alt=""/>
            <i>点击360度预览</i>
            <span>C2户型-北欧风格</span>
        </a>
        <a href="https://yun.kujiale.com/design/3FO4LR53TEH0/show" class="loop" target="_blank">
            <img src="{{ asset('/new/home/estate/defu/img/df_hxC2.jpg')}}" alt=""/>
            <i>点击360度预览</i>
            <span>C2户型-现代风格</span>
        </a>
        <a href="https://yun.kujiale.com/design/3FO4LR53DCQ7/show" class="loop" target="_blank">
            <img src="{{ asset('/new/home/estate/defu/img/df_hxC2_m.jpg')}}" alt=""/>
            <i>点击360度预览</i>
            <span>C2户型-美式风格</span>
        </a>
        <a href="https://yun.kujiale.com/design/3FO4LR67MS69/show" class="loop" target="_blank">
            <img src="{{ asset('/new/home/estate/defu/img/df_hxC3.png')}}" alt=""/>
            <i>点击360度预览</i>
            <span>C3户型-美式风格</span>
        </a>
        <a href="https://yun.kujiale.com/design/3FO4LR66KJ54/show" class="loop" target="_blank">
            <img src="{{ asset('/new/home/estate/defu/img/df_hxC3_x.jpg')}}" alt=""/>
            <i>点击360度预览</i>
            <span>C3户型-现代风格</span>
        </a>
        <a href="https://yun.kujiale.com/design/3FO4LR66RLK8/show" class="loop" target="_blank">
            <img src="{{ asset('/new/home/estate/defu/img/df_hxC3_o.jpg')}}" alt=""/>
            <i>点击360度预览</i>
            <span>C3户型-北欧风格</span>
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
            <a href="{{ url('/newpro/estate/defu/details?ors=A1huxing') }}" target="_blank">
                <img src="{{ asset('/new/home/estate/defu/img/a1.png')}}" alt=""/>
                <div class="huxin">A1户型</div>
                <div class="pingmi">
                    <span class="left">3室2厅2卫</span>
                    <span class="right">121.22㎡</span>
                </div>
                <div class="zhuangtai">待售</div>
            </a>
            <a href="{{ url('/newpro/estate/defu/details?ors=A2huxing') }}" target="_blank">
                <img src="{{ asset('/new/home/estate/defu/img/A2.png')}}" alt=""/>
                <div class="huxin">A2户型</div>
                <div class="pingmi">
                    <span class="left">3室2厅1厨2卫</span>
                    <span class="right">130.10㎡</span>
                </div>
                <div class="zhuangtai">待售</div>
            </a>
            <a href="{{ url('/newpro/estate/defu/details?ors=B1huxing') }}" target="_blank">
                <img src="{{ asset('/new/home/estate/defu/img/B1.png')}}" alt=""/>
                <div class="huxin">B1户型</div>
                <div class="pingmi">
                    <span class="left">3室2厅1厨2卫</span>
                    <span class="right">133.31㎡</span>
                </div>
                <div class="zhuangtai">待售</div>
            </a>
            <a href="{{ url('/newpro/estate/defu/details?ors=B2huxing') }}" target="_blank">
                <img src="{{ asset('/new/home/estate/defu/img/B2.png')}}" alt=""/>
                <div class="huxin">B2户型</div>
                <div class="pingmi">
                    <span class="left">3室2厅1厨2卫</span>
                    <span class="right">130.23㎡</span>
                </div>
                <div class="zhuangtai">待售</div>
            </a>
            <a href="{{ url('/newpro/estate/defu/details?ors=E1-1huxing') }}" target="_blank">
                <img src="{{ asset('/new/home/estate/defu/img/E1-1.png')}}" alt=""/>
                <div class="huxin">E1-1户型</div>
                <div class="pingmi">
                    <span class="left">1室2厅2卫</span>
                    <span class="right">121.22㎡</span>
                </div>
                <div class="zhuangtai">待售</div>
            </a>
            <a href="{{ url('/newpro/estate/defu/details?ors=E1-2huxing') }}" target="_blank">
                <img src="{{ asset('/new/home/estate/defu/img/E1-2.png')}}" alt=""/>
                <div class="huxin">E1-2户型</div>
                <div class="pingmi">
                    <span class="left">2室2厅2卫</span>
                    <span class="right">121.2㎡</span>
                </div>
                <div class="zhuangtai">待售</div>
            </a>
            <a href="{{ url('/newpro/estate/defu/details?ors=E1-3huxing') }}" target="_blank">
                <img src="{{ asset('/new/home/estate/defu/img/E1-3.png')}}" alt=""/>
                <div class="huxin">E1-3户型</div>
                <div class="pingmi">
                    <span class="left">3室2厅2卫</span>
                    <span class="right">121.22㎡</span>
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