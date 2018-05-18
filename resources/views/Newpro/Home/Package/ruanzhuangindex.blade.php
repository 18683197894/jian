@extends('Newpro.Home.public')

@section('css')
<link rel="stylesheet" href="{{ asset('/new/home/package/ruanzhuang/ruanzhuangindex.css') }}">
<link rel="stylesheet" href="{{ asset('/new/home/bannerList/bannerList.css') }}">
<link rel="stylesheet" href="{{ asset('/new/home/package/public.css') }}">
@endsection('css')

@section('content')
<!--banner-->
<div class="Banner PC">
    <img src="{{ asset('/new/home/package/ruanzhuang/img/Soft_Banner.jpg') }}" alt="建商家装软装包"/>
</div>
<div class="Banner MO">
    <img src="{{ asset('/new/home/package/ruanzhuang/img/Soft_Banner1.jpg') }}" alt="建商家装软装包"/>
</div>

<div class="Basic_bag">
    <div class="juzhong">
    <a href="{{ url('/newpro/package/jizhuang') }}" class="Bas">
        <img src="{{ asset('/new/home/package/jizhuang/img/Basic_bag.png')}}" alt="" class="No"/>
        <img src="{{ asset('/new/home/package/jizhuang/img/Basic_baga.png')}}" alt="" class="av"/>
    </a>
    <a href="{{ url('/newpro/package/ruanzhuang') }}" class="Sof avtive">
        <img src="{{ asset('/new/home/package/jizhuang/img/Soft_bag.png')}}" alt="" class="No"/>
        <img src="{{ asset('/new/home/package/jizhuang/img/Soft_baga.png')}}" alt="" class="av"/>
    </a>
    <a href="{{ url('/newpro/package/zhineng') }}">
        <img src="{{ asset('/new/home/package/jizhuang/img/Intelligence_bag.png')}}" alt="" class="No"/>
        <img src="{{ asset('/new/home/package/jizhuang/img/Intelligence_baga.png')}}" alt="" class="av"/>
    </a>
    </div>
</div>
<div class="Propaganda">
    <div class="Propaganda_l">
        <img src="{{ asset('/new/home/package/ruanzhuang/img/Propaganda1.png') }}" alt="建商家装软装包,现代北欧宜居宜家"/>
    </div>
    <div class="Propaganda_r">
        <div class="Propaganda_Top">
            <img src="{{ asset('/new/home/package/ruanzhuang/img/Propaganda2.png') }}" alt="建商家装软装包,个性化软装方案"/>
            <img src="{{ asset('/new/home/package/ruanzhuang/img/Propaganda3.png') }}" alt="建商家装软装包,个性化软装方案"/>
        </div>
        <div class="Propaganda_Top">
            <img src="{{ asset('/new/home/package/ruanzhuang/img/Propaganda4.png') }}" alt="建商家装软装包,围绕几何,色彩,灯光,为你构造空间美学"/>
            <img src="{{ asset('/new/home/package/ruanzhuang/img/Propaganda5.png') }}" alt="建商家装软装包,围绕几何,色彩,灯光,为你构造空间美学"/>
        </div>
    </div>
</div>
<!--专属您家的软装方案-->
<div class="Plan">
    <div class="Title">专属您家的软装方案</div>
    <div class="Icon">
        <img src="{{ asset('/new/home/package/ruanzhuang/img/Icon1.png') }}" alt=""/>
        <img src="{{ asset('/new/home/package/ruanzhuang/img/Icon2.png') }}" alt=""/>
        <img src="{{ asset('/new/home/package/ruanzhuang/img/Icon3.png') }}" alt=""/>
        <img src="{{ asset('/new/home/package/ruanzhuang/img/Icon4.png') }}" alt=""/>
        <img src="{{ asset('/new/home/package/ruanzhuang/img/Icon5.png') }}" alt="" class="none"/>
    </div>
    <!--软装方案图 轮播-->
    <div class="banner Pc">
        <ul class="">
            <li><a href="javascript:;"><img src="{{ asset('/new/home/package/ruanzhuang/img/Plan_banner1.jpg') }}" alt="建商家装软装包,美式风格"></a></li>
            <li><a href="javascript:;"><img src="{{ asset('/new/home/package/ruanzhuang/img/Plan_banner2.jpg') }}" alt="建商家装软装包,现代风格"></a></li>
            <li><a href="javascript:;"><img src="{{ asset('/new/home/package/ruanzhuang/img/Plan_banner3.jpg') }}" alt="建商家装软装包,北欧风格"></a></li>
        </ul>
        <div class="left-btn"></div>
        <div class="right-btn"></div>
        <div class="img-btn-list"></div>
    </div>
    <div class="banner Mo">
    <ul class="">
        <li><a href=" "><img src="{{ asset('/new/home/package/ruanzhuang/img/Plan_mo1.jpg') }}" alt="建商家装软装包,美式风格"></a></li>
        <li><a href="javascript:;"><img src="{{ asset('/new/home/package/ruanzhuang/img/Plan_mo2.jpg') }}" alt="建商家装软装包,现代风格"></a></li>
        <li><a href="javascript:;"><img src="{{ asset('/new/home/package/ruanzhuang/img/Plan_mo3.jpg') }}" alt="建商家装软装包,北欧风格"></a></li>
    </ul>
    <div class="left-btn"></div>
    <div class="right-btn"></div>
    <div class="img-btn-list"></div>
</div>
</div>
<!--严苛进行基装　严选主材品牌-->
<div class="Brand">
    <div class="Title">优选品牌　经久耐用</div>
    <div class="Show">
        <a href="#">
            <img src="{{ asset('/new/home/package/ruanzhuang/img/Soft_Brand1.png') }}" alt="建商家装,E1级环保中纤板"/>
            <div class="text">
                <span class="name">E1级环保中纤板</span>
                <span>植物纤维为原料，品质安全放心</span>
                <span>坚固耐用，容易清洁</span>
            </div>
        </a>
        <a href="#">
            <img src="{{ asset('/new/home/package/ruanzhuang/img/Soft_Brand2.png') }}" alt="建商家装,涂料绿色安全 不含甲醛"/>
            <div class="text">
                <span class="name">涂料绿色安全 不含甲醛</span>
                <span>材料绿色安全，安心入住</span>
                <span>涂料各项均满足国家环保要求</span>
            </div>
        </a>
        <a href="#">
            <img src="{{ asset('/new/home/package/ruanzhuang/img/Soft_Brand3.png') }}" alt="建商家装,稳定的结构"/>
            <div class="text">
                <span class="name">稳定的结构</span>
                <span>科学的结构设计</span>
                <span>美观自然，适合您的家</span>
            </div>
        </a>
        <a href="#">
            <img src="{{ asset('/new/home/package/ruanzhuang/img/Soft_Brand4.png') }}" alt="建商家装,抗曲性 承重性强"/>
            <div class="text">
                <span class="name">抗曲性 承重性强</span>
                <span>一二线品牌专线定制</span>
                <span>延长您的家具使用</span>
            </div>
        </a>
    </div>
</div>
<!--标准套餐 随心搭配-->
<div class="Package">
    <div class="Name">基装做好才是好</div>
    <div class="jie">基装主材包+软装包+智能家居包</div>
    <div class="Show">
        <div class="Loop">
            <a href="javascript:;" class="">
                <img src="{{ asset('/new/home/package/jizhuang/img/Basic_Package1.png') }}" alt="基装主材包" class="P_img"/>
                <div class="Contact">
                    <div class="Basic_name">Package A</div>
                    <i></i>
                    <div class="Basic_Class">基装主材包</div>
                    <div class="Price">￥<span class="Num">958</span><span class="danwei">元/㎡</span></div>
                </div>
                <img src="{{ asset('/new/home/package/jizhuang/img/Basic_Selected.png') }}" alt="基装主材包" class="Basic_Selected"/>
            </a>
        </div>
        <div class="Loop Se">
            <a href="javascript:;" class="avtive">
                <img src="{{ asset('/new/home/package/jizhuang/img/Basic_Package2.png') }}" alt="软装包" class="P_img"/>
                <div class="Contact">
                    <div class="Basic_name">Package B</div>
                    <i></i>
                    <div class="Basic_Class">软装包</div>
                    <div class="Price">￥<span class="Num">296</span><span class="danwei">元/㎡</span></div>
                </div>
                <img src="{{ asset('/new/home/package/jizhuang/img/Basic_Selected.png') }}" alt="软装包" class="Basic_Selected"/>
            </a>
        </div>
        <div class="Loop zhi">
            <a href="javascript:;" class="">
                <img src="{{ asset('/new/home/package/jizhuang/img/Basic_Package3.png') }}" alt="智能家居包" class="P_img"/>
                <div class="Contact">
                    <div class="Basic_name">Package C</div>
                    <i></i>
                    <div class="Basic_Class">智能家居包</div>
                    <div class="Price">￥<span class="Num">21124.6</span></div>
                </div>
                <img src="{{ asset('/new/home/package/jizhuang/img/Basic_Selected.png') }}" alt="智能家居包" class="Basic_Selected"/>
            </a>
        </div>
    </div>
    <div class="jizhuang">
        <div class="Style_top">
            <img src="{{ asset('/new/home/package/jizhuang/img/jizhuang1.png') }}" alt=""/>
            <div class="Style_Bot">
            	@foreach($data as $k => $v)
            	@if($v->ors == '基装')
                <a href="javascript:;" class="jz" index="{{ $v->id }}">
                    <div class="feng">{{ $v->name }}</div>
                    <div class="jiner">￥<span class="Num">{{ $v->money }}</span><span class="danwei">元/㎡</span></div>
                    <img src="{{ asset('/new/home/package/jizhuang/img/Basic_gou.png') }}" alt="" class="Basic_gou"/>
                </a>
                @endif
                @endforeach
            </div>
        </div>
    </div>
    <div  class="Style avtive">
        <div class="Style_top">
            <img src="{{ asset('/new/home/package/jizhuang/img/Basic_Style.png') }}" alt=""/>
            <div class="Style_Bot">
                @foreach($data as $k => $v)
            	@if($v->ors == '软装')
                <a href="javascript:;" class="fg" index="{{ $v->id }}">
                    <div class="feng">{{ $v->name }}</div>
                    <div class="jiner">￥<span class="Num">{{ $v->money }}</span><span class="danwei">元/㎡</span></div>
                    <img src="{{ asset('/new/home/package/jizhuang/img/Basic_gou.png') }}" alt="" class="Basic_gou"/>
                </a>
               @endif
               @endforeach
            </div>
        </div>
    </div>
    <div class="Ai">
        <div class="Style_top">
            <img src="{{ asset('/new/home/package/jizhuang/img/AI.png') }}" alt=""/>
            <div class="Style_Bot">
                @foreach($data as $k => $v)
            	@if($v->ors == '智能')
                <a href="javascript:;" class="zhin"index="{{ $v->id }}" >
                    <div class="feng">{{ $v->name }}</div>
                    <div class="jiner">￥<span class="danwei">{{ $v->money }}</span></div>
                    <img src="{{ asset('/new/home/package/jizhuang/img/Basic_gou.png') }}" alt="" class="Basic_gou"/>
                </a>
                @endif
                @endforeach
            </div>
        </div>
    </div>
    <div class="My_Choice">
        <img src="{{ asset('/new/home/package/jizhuang/img/My_Choice.png') }}" alt=""/>
        <div class="Choice_Bot">
            
        </div>
    </div>
    <div class="Cart">
        @if(session('Home'))
        	<a href="javascript:;" class="playgou">加入购物车</a>
    	@else
        	<a href="{{ url('/newpro/login?path=') }}{{ $path }}" class="playgou">加入购物车</a>
    	@endif
    </div>
</div>
@endsection('content')

@section('js')
<script src="{{ asset('/new/home/package/public.js') }}"></script>
<script src="{{ asset('new/home/bannerList/bannerList.js') }}"></script>

<script>
    //bannerͼ
    bannerListFn(
            $(".banner.Pc"),
            $(".img-btn-list"),
            $(".left-btn"),
            $(".right-btn"),
            2000,
            true
    );
     bannerListFn(
            $(".banner.Mo"),
            $(".img-btn-list"),
            $(".left-btn"),
            $(".right-btn"),
            2000,
            true
    );
    //    $(".banner ul li:gt(1)").remove()
</script>
@endsection('js')