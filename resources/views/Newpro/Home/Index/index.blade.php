@extends('Newpro.Home.public')

@section('css')
<link rel="stylesheet" href="{{ asset('/new/home/index/index.css') }}">
<link rel="stylesheet" href="{{ asset('/new/home/bannerList/bannerList.css') }}">

@endsection('css')

@section('content')
<!--banner图 轮播-->
<div class="banner Pc">
    <ul class="">
        <li><a href="{{ url('/newpro/package/jizhuang') }}"><img src="{{ asset('/new/home/index/img/ban_1.png') }}" alt="基装包,软装包,智能包,建商家装"></a></li>
        <li><a href="{{ url('/newpro/smarthome') }}"><img src="{{ asset('/new/home/index/img/ban_2.png') }}" alt="建商智能家居,宜宾智能家居,智能系统"></a></li>
        <li><a href="{{ url('/newpro/used/business') }}"><img src="{{ asset('/new/home/index/img/ban_3.png') }}" alt="建商商务合作"></a></li>
    </ul>
    <div class="left-btn"></div>
    <div class="right-btn"></div>
    <div class="img-btn-list"></div>
</div>
<!--banner图 轮播-->
<div class="banner Mo">
    <ul class="">
        <li><a href="{{ url('/newpro/package/jizhuang') }}"><img src="{{ asset('/new/home/index/img/ban_1_mo.png') }}" alt="基装包,软装包,智能包,建商家装"></a></li>
        <li><a href="{{ url('/newpro/smarthome') }}"><img src="{{ asset('/new/home/index/img/ban_2_mo.png') }}" alt="建商智能家居,宜宾智能家居,智能系统"></a></li>
        <li><a href="{{ url('/newpro/used/business') }}"><img src="{{ asset('/new/home/index/img/ban_3_mo.png') }}" alt="建商商务合作"></a></li>
    </ul>
    <div class="left-btn"></div>
    <div class="right-btn"></div>
    <div class="img-btn-list"></div>
</div>

<div class="index_interval">
    <div class="Center">
        <div class="fl">
            <img src="{{ asset('/new/home/index/img/Center1.png') }}"  alt=""/>
            <div class="Center_Text">
                <span>省钱装修</span>
                <span class="Small">全程６大免费服务</span>
            </div>
        </div>
        <div class="fl">
            <img src="{{ asset('/new/home/index/img/Center2.png') }}" alt=""/>
            <div class="Center_Text">
                <span>免费预算报价</span>
                <span class="Small">预算看不懂，我帮你</span>
            </div>
        </div>
        <div class="fl">
            <img src="{{ asset('/new/home/index/img/Center3.png') }}" alt=""/>
            <div class="Center_Text">
                <span>建商装修包</span>
                <span class="Small">装修界的金点子</span>
            </div>
        </div>
        <div class="fl">
            <img src="{{ asset('/new/home/index/img/Center4.png') }}" alt=""/>
            <div class="Center_Text">
                <span>装修分期</span>
                <span class="Small">帮您搞定装修资金</span>
            </div>
        </div>
    </div>
</div>
<!--工程案例-->
<div class="Project">
    <div class="Title">
        <div class="top">Project case</div>
        <div class="bar">
            <div class="text">工程案列</div>
            <div class="bar_l"></div>
            <div class="bar_r"></div>
        </div>
        <div class="bottom">公司品质保障  放心服务  全包无忧</div>
    </div>
    <div class="Show">
        <a href="{{ url('/newpro/estate/zheshang') }}">
            <img src="{{ asset('/new/home/index/img/Project1.png') }}" alt="浙商临港新天地,宜宾临港精装房"/>
            <span>浙商.临港新天地</span>
            <div class="hide">
                <div class="Center">
                    浙商·临港新天地是由宜宾浙商西部金融科技城发展有限公司打造的集金融、科技、现代服务业、大型商业于一体的纯商业综合体项目。
                </div>
            </div>
        </a>
        <a href="{{ url('/newpro/estate/defu') }}">
            <img src="{{ asset('/new/home/index/img/Project2.png') }}" alt="宜宾县德福公元,宜宾县德福公元精装修"/>
            <span>德福公元</span>
            <div class="hide">
                <div class="Center">
                    宜宾德福公元项目位于四川省宜宾市宜宾县，地块位于金江大道南侧，场地内高差较大。本项目位于宜宾县城北新区，是未来宜宾县新的行政、商住、和金融中心。
                </div>
            </div>
        </a>
        <a href="{{ url('/newpro/estate/zhijin') }}">
            <img src="{{ asset('/new/home/index/img/Project3.png') }}" alt="织金万都铭城,贵州织金县万都铭城精装修"/>
            <span>织金.万都铭城</span>
            <div class="hide">
                <div class="Center">
                    贵州省5个100工程；贵州省100个城市综合体之一；织金县唯一城市综合体；织金县重点招商引资项目；织金指定返乡创业基地；县重点招商引资项目；
                </div>
            </div>
        </a>
        <a href="#">
            <img src="{{ asset('/new/home/index/img/Project4.png') }}" alt="临港.会展中心"/>
            <span>临港.会展中心</span>
            <div class="hide">
                <div class="Center">

                </div>
            </div>
        </a>
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

        <a href="https://yun.kujiale.com/design/3FO4L73CL22I/show" class="loop" target="_blank">
            <img src="{{ asset('/new/home/estate/zheshang/img/zheshang_1.jpg')}}" alt="浙商52平米-现代"/>
            <i>点击360度预览</i>
            <span>浙商52平米-现代</span>
        </a>
        <a href="https://yun.kujiale.com/design/3FO4L6XPFOG6/show" class="loop" target="_blank">
            <img src="{{ asset('/new/home/estate/zheshang/img/zheshang_4.jpg')}}" alt="浙商54平米-港式"/>
            <i>点击360度预览</i>
            <span>浙商54平米-港式</span>
        </a>
        <a href="https://yun.kujiale.com/design/3FO4L6SOOABG/show" class="loop" target="_blank">
            <img src="{{ asset('/new/home/estate/zheshang/img/zheshang_9.jpg')}}" alt="浙商64平米-三居港式"/>
            <i>点击360度预览</i>
            <span>浙商64平米-三居港式</span>
        </a>
        <a href="https://yun.kujiale.com/design/3FO4L7VBMHKN/show" class="loop" target="_blank">
            <img src="{{ asset('/new/home/estate/zheshang/img/zheshang_12.jpg')}}" alt="浙商109平米-北欧"/>
            <i>点击360度预览</i>
            <span>浙商109平米-北欧</span>
        </a>
    </div>
</div>
<a href="{{ url('/newpro/estate/zheshang') }}" class="max_more">更多</a>
<!--品质保证-->
<div class="Quality">
    <div class="Title">
        <div class="top">Decoration service process</div>
        <div class="bar">
            <div class="text">服务流程</div>
            <div class="bar_l"></div>
            <div class="bar_r"></div>
        </div>
        <div class="bottom">服务一体化 选材一键式</div>
    </div>
    <div class="Show">
        <div class="xian"></div>
        <a href="javascript:;">
            <div class="name">在线预约</div>
            <span></span>
            <img src="{{ asset('/new/home/index/img/flow1.png') }}" alt="在线预约"/>
        </a>
        <a href="javascript:;">
            <div class="name">实景体验</div>
            <span></span>
            <img src="{{ asset('/new/home/index/img/flow2.png') }}" alt="实景体验"/>
        </a>
        <a href="javascript:;">
            <div class="name">签约下订</div>
            <span></span>
            <img src="{{ asset('/new/home/index/img/flow3.png') }}" alt="签约下订"/>
        </a>
        <a href="javascript:;">
            <div class="name">确认方案</div>
            <span></span>
            <img src="{{ asset('/new/home/index/img/flow4.png') }}" alt="确认方案"/>
        </a>
        <a href="javascript:;">
            <div class="name">标准化施工</div>
            <span></span>
            <img src="{{ asset('/new/home/index/img/flow5.png') }}" alt="标准化施工"/>
        </a>
        <a href="javascript:;">
            <div class="name">五星质检验收</div>
            <span></span>
            <img src="{{ asset('/new/home/index/img/flow6.png') }}" alt="五星质检验收"/>
        </a>
        <a href="javascript:;">
            <div class="name">金牌质保 售后无忧</div>
            <span></span>
            <img src="{{ asset('/new/home/index/img/flow7.png') }}" alt="金牌质保 售后无忧"/>
        </a>

    </div>
</div>
<!--装修套餐-->
<div class="Package">
    <div class="Title">
        <div class="top">Decoration course</div>
        <div class="bar">
            <div class="text">装修套餐</div>
            <div class="bar_l"></div>
            <div class="bar_r"></div>
        </div>
        <div class="bottom">公司品质保障  放心服务  全包无忧</div>
    </div>
    <div class="Show">
        <a href="{{ url('newpro/package/jizhuang') }}" class="Show_One">
            <img src="{{ asset('/new/home/index/img/Package1.png') }}" alt="基装主材包" class="Package_D"/>
            <div class="text">
                <span>基装主材包</span>
            </div>
        </a>
        <a href="{{ url('/newpro/package/ruanzhuang') }}" class="Show_Two">
            <img src="{{ asset('/new/home/index/img/Package2.png') }}" alt="精致软装包" class="Package_D"/>
            <div class="text">
                <span>精致软装包</span>
            </div>
        </a>
        <a href="{{ url('/newpro/package/zhineng') }}" class="Show_Three">
            <img src="{{ asset('/new/home/index/img/Package3.png') }}" alt="智能家居包" class="Package_D"/>
            <div class="text">
                <span>智能家居包</span>
            </div>
        </a>
    </div>
</div>
<!--装修案列-->
@if(count($case) >0)
<div class="Case">
    <div class="Title">
        <div class="top">Real case scenario</div>
        <div class="bar">
            <div class="text">装修案例</div>
            <div class="bar_l"></div>
            <div class="bar_r"></div>
        </div>
        <div class="bottom">发现小区真实案列  与邻居交流装修心得</div>
    </div>
    <div class="Show">
    @foreach($case as $k => $v)
        <div class="Show_a">
            <a href="{{ url('/newpro/case/play/') }}/{{ $v->id }}" class="top">
                <img src="{{ asset('uploads/case/img') }}/{{ $v->keting }}" alt="{{ $v->title }}"/>
                <div class="text">
                    <div class="name">{{ $v->title }}</div>
                    <div class="Label">
                        <span>{{ $v->huxing }}</span>
                        <span>{{ $v->fengge }}</span>
                        <span>{{ $v->yusuan }}</span>
                    </div>
                </div>
            </a>
            <div class="Loop">
            @foreach($v->eff as $kk => $vv)
                <a href="{{ url('/newpro/case/play/') }}/{{ $v->id }}?a={{ $kk }}&b={{ $vv }}">
                    <img src="{{ asset('uploads/case/img') }}/{{ $vv }}" alt="{{ $v->title }}"/>
                    <span>{{ $kk }}</span>
                </a>
            @endforeach
            </div>
        </div>
    @endforeach
    </div>
    <div class="Corner">




    </div>
</div>
@endif

<!--材料选购-->
<div class="Choose">
    <div class="Title">
        <div class="top">Building materials to buy</div>
        <div class="bar">
            <div class="text">建材选购</div>
            <div class="bar_l"></div>
            <div class="bar_r"></div>
        </div>
        <div class="bottom">国内外知名厂家直供    品质生活从心开始</div>
    </div>
    <div class="Show">
        <a href="javascript:;">
            <img src="{{ asset('/new/home/index/img/Choose1.png')}}" alt=""/>
        </a>
        <a href="javascript:;">
            <img src="{{ asset('/new/home/index/img/Choose2.png')}}" alt=""/>
        </a>
        <a href="javascript:;">
            <img src="{{ asset('/new/home/index/img/Choose3.png')}}" alt=""/>
        </a>
        <a href="javascript:;">
            <img src="{{ asset('/new/home/index/img/Choose4.png')}}" alt=""/>
        </a>
        <a href="javascript:;">
            <img src="{{ asset('/new/home/index/img/Choose5.png')}}" alt=""/>
        </a>
        <a href="javascript:;">
            <img src="{{ asset('/new/home/index/img/Choose6.png')}}" alt=""/>
        </a>
        <a href="javascript:;">
            <img src="{{ asset('/new/home/index/img/Choose7.png')}}" alt=""/>
        </a>
        <a href="javascript:;">
            <img src="{{ asset('/new/home/index/img/Choose8.png')}}" alt=""/>
        </a>
        <a href="javascript:;">
            <img src="{{ asset('/new/home/index/img/Choose9.png')}}" alt=""/>
        </a>
        <a href="javascript:;">
            <img src="{{ asset('/new/home/index/img/Choose10.png')}}" alt=""/>
        </a>
    </div>
</div>
@if(count($plate) > 0)
<div class="School">
    <div class="Title">
        <div class="top">Knowledge School</div>
        <div class="bar">
            <div class="text">新闻动态</div>
            <div class="bar_l"></div>
            <div class="bar_r"></div>
        </div>
        <div class="bottom">发现小区真实案列  与邻居交流装修心得</div>
    </div>
    <div class="Show">
    @foreach($plate as $k => $v)
        <div class="Loop">
            <a href="{{ url('/newpro/newslist?pid=') }}{{ $v->title }}" class="Loop_img">
                <img src="{{ asset('uploads/news/img/')}}/{{ $v->img }}" alt="{{ $v->title }}"/>
            </a>
            <div class="text">
            @foreach($v->news as $kk => $vv)
                <a href="{{ url('/newpro/newslist/play/') }}/{{ $vv->id }}">
                <span>@if(mb_strlen($vv->title,'utf8') < 22  ) {{ $vv->title }} @else {{ mb_substr($vv->title,0,21,'utf8') }}... @endif</span>@if(time() - $vv->time < 259200)<i></i><img src="{{ asset('/new/home/index/img/new.png') }}" alt="" class="new">@endif
                </a>
            @endforeach
            </div>
        </div>
    @endforeach
    </div>
</div>
@endif
@endsection('content')

@section('js')
<script src="{{ asset('new/home/index/index.js') }}"></script>
<script src="{{ asset('new/home/bannerList/bannerList.js') }}"></script>
<script>
    //bannerͼ
    bannerListFn(
            $(".banner.Pc"),
            $(".img-btn-list"),
            $(".left-btn"),
            $(".right-btn"),
            4000,
            true
    );
       //bannerͼ
    bannerListFn(
            $(".banner.Mo"),
            $(".img-btn-list"),
            $(".left-btn"),
            $(".right-btn"),
            4000,
            true
    );
    //    $(".banner ul li:gt(1)").remove()
</script>

@endsection('js')


