@extends('Newpro.Home.public')

@section('css')
<link rel="stylesheet" href="{{ asset('/new/home/package/zhineng/zhinengindex.css') }}">
<link rel="stylesheet" href="{{ asset('/new/home/package/public.css') }}">
@endsection('css')

@section('content')
<div class="Banner">
    <img src="{{ asset('/new/home/package/zhineng/img/Intelligence_Banner.jpg') }}" alt=""/>
</div>

<div class="Basic_bag">
    <div class="juzhong">
    <a href="{{ url('/newpro/package/jizhuang') }}" class="Bas">
        <img src="{{ asset('/new/home/package/jizhuang/img/Basic_bag.png')}}" alt="" class="No"/>
        <img src="{{ asset('/new/home/package/jizhuang/img/Basic_baga.png')}}" alt="" class="av"/>
    </a>
    <a href="{{ url('/newpro/package/ruanzhuang') }}" class="Sof">
        <img src="{{ asset('/new/home/package/ruanzhuang/img/Soft_bag.png')}}" alt="" class="No"/>
        <img src="{{ asset('/new/home/package/jizhuang/img/Soft_baga.png')}}" alt="" class="av"/>
    </a>
    <a href="{{ url('/newpro/package/zhineng') }}" class="avtive">
        <img src="{{ asset('/new/home/package/zhineng/img/Intelligence_bag.png')}}" alt="" class="No"/>
        <img src="{{ asset('/new/home/package/jizhuang/img/Intelligence_baga.png')}}" alt="" class="av"/>
    </a>
    </div>
</div>
<!--智能生活场景呈现-->
<div class="Scene">
    <div class="Title">智能生活场景呈现</div>
    <img src="{{ asset('/new/home/package/zhineng/img/Intelligence_Scene.jpg') }}" alt="" class="Scene_bg"/>
</div>
<!--模式-->
<div class="Pattern">
    <div class="Auto">
        <div class="Loop">
            <div class="text">
                <div class="name">回家模式</div>
                <i class="bd"></i>
                <div class="Contact">
                    劳累了一天之后回到家门口，只需要通过指纹扫描打开智能指纹锁，玄关的灯光会自动打开。背景音乐会随之响起，空调、电视、窗帘缓缓打开，让家的温馨围绕着您。
                </div>
            </div>
            <img src="{{ asset('/new/home/package/zhineng/img/Pattern1.png') }}" alt="" class="fl"/>
        </div>
        <div class="Loop">
            <div class="text2">
                <div class="name">离家模式</div>
                <i class="bd"></i>
                <div class="Contact">
                    当没人在家的时候，布防模式正在运行，玄关、窗户、走廊处的门窗磁传感器和人体传感器一旦触发，智能摄像机将立即录像，并拨打报警电话提醒你，全方位守护家庭安全。
                </div>
            </div>
            <img src="{{ asset('/new/home/package/zhineng/img/Pattern2.png') }}" alt="" class="fl"/>
        </div>
        <div class="Loop">
            <div class="text">
                <div class="name">安防模式</div>
                <i class="bd"></i>
                <div class="Contact">
                    出差在外，总惦记着家里？只要打开APP，就可随时随地查看家中动态，还可以通过APP远程控制检查门窗、燃气、水电等设备的状态。
                </div>
            </div>
            <img src="{{ asset('/new/home/package/zhineng/img/Pattern3.png') }}" alt="" class="fl"/>
        </div>
    </div>
</div>
<!--遥控-->
<div class="Remote">
    <div class="Title">精彩生活 智能相随</div>
    <div class="Brief">遥控一按 智能畅所欲</div>
    <div class="Show">
        <a href="javascript:;">
            <img src="{{ asset('/new/home/package/zhineng/img/Remote1.png') }}" alt=""/>
        </a>
        <a href="javascript:;">
            <img src="{{ asset('/new/home/package/zhineng/img/Remote2.png') }}" alt=""/>
        </a>
        <a href="javascript:;">
            <img src="{{ asset('/new/home/package/zhineng/img/Remote3.png') }}" alt=""/>
        </a>
        <a href="javascript:;">
            <img src="{{ asset('/new/home/package/zhineng/img/Remote4.png') }}" alt=""/>
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
            <a href="javascript:;" class="avtive">
                <img src="{{ asset('/new/home/package/jizhuang/img/Basic_Package3.png') }}" alt="" class="P_img"/>
                <div class="Contact">
                    <div class="Basic_name">Package C</div>
                    <i></i>
                    <div class="Basic_Class">智能家居包</div>
                    <div class="Price">￥<span class="Num">21124.6</span></div>
                </div>
                <img src="{{ asset('/new/home/package/jizhuang/img/Basic_Selected.png') }}" alt="" class="Basic_Selected"/>
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
    <div class="Ai avtive">
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

@endsection('js')