@extends('Newpro.Home.public')

@section('css')
<link rel="stylesheet" href="{{ asset('/new/home/package/jizhuang/jizhuangindex.css') }}">
<link rel="stylesheet" href="{{ asset('/new/home/package/public.css') }}">
@endsection('css')

@section('content')
<!--banner-->
<div class="banner">
    <img src="{{ asset('/new/home/package/jizhuang/img/Basic_banner.jpg')}}" alt=""/>
</div>

<div class="Basic_bag">
    <div class="juzhong">
    <a href="{{ url('/newpro/package/jizhuang') }}" class="Bas avtive">
        <img src="{{ asset('/new/home/package/jizhuang/img/Basic_bag.png')}}" alt="" class="No"/>
        <img src="{{ asset('/new/home/package/jizhuang/img/Basic_baga.png')}}" alt="" class="av"/>
    </a>
    <a href="{{ url('/newpro/package/ruanzhuang') }}" class="Sof">
        <img src="{{ asset('/new/home/package/jizhuang/img/Soft_bag.png')}}" alt="" class="No"/>
        <img src="{{ asset('/new/home/package/jizhuang/img/Soft_baga.png')}}" alt="" class="av"/>
    </a>
    <a href="{{ url('/newpro/package/zhineng') }}">
        <img src="{{ asset('/new/home/package/jizhuang/img/Intelligence_bag.png')}}" alt="" class="No"/>
        <img src="{{ asset('/new/home/package/jizhuang/img/Intelligence_baga.png')}}" alt="" class="av"/>
    </a>
    </div>
</div>
<!--严苛进行基装　严选主材品牌-->
<div class="Brand">
    <div class="Title">严苛进行基装　严选主材品牌</div>
    <div class="Show">
        <a href="#">
            <img src="{{ asset('/new/home/package/jizhuang/img/Brand1.png')}}" alt=""/>
            <div class="text">
                <span class="name">汇聚全国一线设计师</span>
                <span>遵循人体工学原理</span>
                <span>完美搭配，舒适享受家</span>
            </div>
        </a>
        <a href="#">
            <img src="{{ asset('/new/home/package/jizhuang/img/Brand2.png')}}" alt=""/>
            <div class="text">
                <span class="name">坚持原材料和产地可追溯</span>
                <span>经验丰富的产品设计，采购，研发</span>
                <span>团队，选材优质，产品可靠</span>
            </div>
        </a>
        <a href="#">
            <img src="{{ asset('/new/home/package/jizhuang/img/Brand3.png')}}" alt=""/>
            <div class="text">
                <span class="name">严苛的生产工艺</span>
                <span>层层监督，严格把控。</span>
                <span>工艺考究，品质有保障</span>
            </div>
        </a>
        <a href="#">
            <img src="{{ asset('/new/home/package/jizhuang/img/Brand4.png')}}" alt=""/>
            <div class="text">
                <span class="name">整合全球一线供应商</span>
                <span>F2C直采，省去中间环节</span>
                <span>高性价比，直供到家。</span>
            </div>
        </a>
    </div>
</div>
<!--基装主材项目-->
<div class="Project">
    <div class="Title">基装主材项目</div>
    <img src="{{ asset('/new/home/package/jizhuang/img/Project.jpg') }}" alt="" class="Project_img"/>
</div>
<!--基装做好才是好-->
<div class="Good">
    <div class="Title">基装做好才是好</div>
    <div class="Show">
        <div class="Left">
            <a href="javascript:;" class="Top">
                <img src="{{ asset('/new/home/package/jizhuang/img/Good1.png') }}" alt=""/>
                <div class="text">
                    顶面、墙面基层及阴阳角找平找直处理
                </div>
            </a>
            <a href="javascript:;" class="Bottom">
                <img src="{{ asset('/new/home/package/jizhuang/img/Good2.png') }}" alt=""/>
                <div class="text">
                    乳胶漆（立邦净味120二合一）
                </div>
            </a>
        </div>
        <div class="Right">
            <div class="Top">
                <a href="javascript:;" class="Top_l">
                    <img src="{{ asset('/new/home/package/jizhuang/img/Good3.png') }}" alt=""/>
                    <div class="text">严苛门槛石铺贴</div>
                </a>
                <a href="javascript:;" class="Top_r">
                    <img src="{{ asset('/new/home/package/jizhuang/img/Good4.png') }}" alt=""/>
                    <div class="text">轻钢龙骨纸面石膏板平顶</div>
                </a>
            </div>
            <div class="bottom">
                <a href="javascript:;" class="Top_l">
                    <img src="{{ asset('/new/home/package/jizhuang/img/Good5.png') }}" alt=""/>
                    <div class="text">专注家装十五年，寻找对生活有品质的你</div>
                </a>
                <a href="javascript:;" class="Top_r">
                    <img src="{{ asset('/new/home/package/jizhuang/img/Good6.png') }}" alt=""/>
                    <div class="text">以家为核心，实力见证  匠心品质</div>
                </a>
            </div>
        </div>
    </div>
</div>
<!--标准化施工-->
<div class="Standard">
    <div class="Name">标准化施工</div>
    <div class="con">先进 50/80 施工管理，5步放线 施工层次分明</div>
    <div class="con">水电隐蔽工程 严格交底 定位一目了然</div>
    <div class="jiange">安心售后，质保到家</div>
    <div class="bot">专设售后专线/1分钟响应/2小时回复/24小时上门服务</div>
</div>
<!--匠心，让我们精益求精-->
<div class="Originality">
    <div class="Title">匠心，让我们精益求精</div>
    <div class="Show">
        <a href="javascript:;">
            <img src="{{ asset('/new/home/package/jizhuang/img/Originality1.png') }}" alt=""/>
        </a>
        <a href="javascript:;">
            <img src="{{ asset('/new/home/package/jizhuang/img/Originality2.png') }}" alt=""/>
        </a>
        <a href="javascript:;">
            <img src="{{ asset('/new/home/package/jizhuang/img/Originality3.png') }}" alt=""/>
        </a>
        <a href="javascript:;">
            <img src="{{ asset('/new/home/package/jizhuang/img/Originality4.png') }}" alt=""/>
        </a>
        <a href="javascript:;">
            <img src="{{ asset('/new/home/package/jizhuang/img/Originality5.png') }}" alt=""/>
        </a>
        <a href="javascript:;">
            <img src="{{ asset('/new/home/package/jizhuang/img/Originality6.png') }}" alt=""/>
        </a>
        <a href="javascript:;">
            <img src="{{ asset('/new/home/package/jizhuang/img/Originality7.png') }}" alt=""/>
        </a>
        <a href="javascript:;">
            <img src="{{ asset('/new/home/package/jizhuang/img/Originality8.png') }}" alt=""/>
        </a>
        <a href="javascript:;">
            <img src="{{ asset('/new/home/package/jizhuang/img/Originality9.png') }}" alt=""/>
        </a>
        <a href="javascript:;">
            <img src="{{ asset('/new/home/package/jizhuang/img/Originality10.png') }}" alt=""/>
        </a>
        <a href="javascript:;">
            <img src="{{ asset('/new/home/package/jizhuang/img/Originality11.png') }}" alt=""/>
        </a>
        <a href="javascript:;">
            <img src="{{ asset('/new/home/package/jizhuang/img/Originality12.png') }}" alt=""/>
        </a>
    </div>
</div>
<!--标准套餐 随心搭配-->
<!--标准套餐 随心搭配-->
<div class="Package">
    <div class="Name">基装做好才是好</div>
    <div class="jie">基装主材包+软装包+智能家居包</div>
    <div class="Show">
        <div class="Loop">
            <a href="javascript:;" class="avtive">
                <img src="{{ asset('/new/home/package/jizhuang/img/Basic_Package1.png') }}" alt="" class="P_img"/>
                <div class="Contact">
                    <div class="Basic_name">Package A</div>
                    <i></i>
                    <div class="Basic_Class">基装主材包</div>
                    <div class="Price">￥<span class="Num">958</span><span class="danwei">元/㎡</span></div>
                </div>
                <img src="{{ asset('/new/home/package/jizhuang/img/Basic_Selected.png') }}" alt="" class="Basic_Selected"/>
            </a>
        </div>
        <div class="Loop Se">
            <a href="javascript:;" class="">
                <img src="{{ asset('/new/home/package/jizhuang/img/Basic_Package2.png') }}" alt="" class="P_img"/>
                <div class="Contact">
                    <div class="Basic_name">Package B</div>
                    <i></i>
                    <div class="Basic_Class">软装包</div>
                    <div class="Price">￥<span class="Num">296</span><span class="danwei">元/㎡</span></div>
                </div>
                <img src="{{ asset('/new/home/package/jizhuang/img/Basic_Selected.png') }}" alt="" class="Basic_Selected"/>
            </a>
        </div>
        <div class="Loop zhi">
            <a href="javascript:;" class="">
                <img src="{{ asset('/new/home/package/jizhuang/img/Basic_Package3.png') }}" alt="" class="P_img"/>
                <div class="Contact">
                    <div class="Basic_name">Package C</div>
                    <i></i>
                    <div class="Basic_Class">智能家居包</div>
                    <div class="Price">￥<span class="Num">25880</span></div>
                </div>
                <img src="{{ asset('/new/home/package/jizhuang/img/Basic_Selected.png') }}" alt="" class="Basic_Selected"/>
            </a>
        </div>
    </div>
    <div class="jizhuang avtive">
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
    <div class="Style">
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
        <a href="{{ url('/newpro/login?path=') }}{{ $path }}">加入购物车</a>
    @endif
    </div>
</div>
@endsection('content')

@section('js')
<script src="{{ asset('/new/home/package/public.js') }}"></script>
@endsection('js')