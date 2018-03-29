@extends('Newpro.Home.public')

@section('css')
<link rel="stylesheet" href="{{ asset('/new/home/smart/smarthome/smarthome.css') }}">

@endsection('css')

@section('content')
<!--banner图-->
<div class="Furnishing_banner">
    <img src="{{ asset('new/home/smart/smarthome/img/Furnishing_banner.png') }}" alt=""/>
</div>
<div class="ship">
    <video src="{{ asset('http://121.43.168.49/index.php?share/fileProxy&path=%7BuserShare%7D%3A100%2Fzhineng.mp4') }}"  controls="controls">
    </video>
</div>    
<div class="F_Life">
    <img src="{{ asset('new/home/smart/smarthome/img/F_Life.png') }}" alt="" class="F_Life_img" />
    <img src="{{ asset('new/home/smart/smarthome/img/F_Life1.png') }}" alt="" class="F_Life_img1" />
</div>

<div class="pattern">
    <div class="fl">
        <img src="{{ asset('new/home/smart/smarthome/img/pattern_l.png') }}" alt=""/>
    </div>
    <div class="pattern_auto">
        <div class="get_home">
            <div class="get_l">
                <div class="title">回家模式</div>
                <i></i>
                <div class="contact">
                    劳累了一天之后回到家门口，只需要通过指纹扫描打开智能指纹锁，玄关的灯光会自动打开。背景音乐会随之响起，空调、电视、窗帘缓缓打开，让家的温馨围绕着您。
                </div>
            </div>
            <div class="get_r">
                <img src="{{ asset('new/home/smart/smarthome/img/get_home.png') }}" alt=""/>
            </div>
        </div>
        <div class="from_home">
            <div class="from_l">
                <img src="{{ asset('new/home/smart/smarthome/img/from_home.png') }}" alt=""/>
            </div>
            <div class="from_r">
                <div class="title">离家模式</div>
                <i></i>
                <div class="contact">
                    当没人在家的时候，布防模式正在运行，玄关、窗户、走廊处的门窗磁传感器和人体传感器一旦触发，智能摄像机将立即录像，并拨打报警电话提醒你，全方位守护家庭安全。
                </div>
            </div>
        </div>
        <div class="get_home">
            <div class="get_l">
                <div class="title">安防模式</div>
                <i></i>
                <div class="contact">
                    出差在外，总惦记着家里？只要打开APP，就可随时随地查看家中动态，还可以通过APP远程控制检查门窗、燃气、水电等设备的状态。出差在外，总惦记着家里？只要打开APP，就可随时随地查看家中动态，还可以通过APP远程控制检查门窗、燃气、水电等设备的状态。
                </div>
            </div>
            <div class="get_r">
                <img src="{{ asset('new/home/smart/smarthome/img/get_home.png') }}" alt="" class="get_r_img1" />
                <img src="{{ asset('new/home/smart/smarthome/img/from_home.png') }}" alt="" class="get_r_img2" />
            </div>
        </div>
    </div>
    <div class="fl">
        <img src="{{ asset('new/home/smart/smarthome/img/pattern_r.png') }}" alt=""/>
    </div>

</div>
@endsection('content')

@section('js')

@endsection('js')