@extends('Newpro.Home.public')

@section('css')
<link rel="stylesheet" href="{{ asset('new/home/smart/ressmartunity/ressmartunity.css') }}">
@endsection('css')

@section('content')
<!--banner图-->
<div class="residence_banner">
    <img src="{{ asset('new/home/smart/ressmartunity/img/residence_banner.png') }}" alt=""/>
</div>
<!--住宅地产智慧社区-->
<div class="Real_estate">
    <div class="title">
        住宅地产智慧社区
    </div>
    <div class="brief">一站式智慧社区解决方案</div>
    <div class="system">
        <div class="system_auto">
            <a href="javascript:;">
                <img src="{{ asset('new/home/smart/ressmartunity/img/Access.png') }}" alt=""/>
                <div class="name">社区门禁系统</div>
            </a>
            <a href="javascript:;">
                <img src="{{ asset('new/home/smart/ressmartunity/img/Parking.png') }}" alt=""/>
                <div class="name">停车管理系统</div>
            </a>
            <a href="javascript:;">
                <img src="{{ asset('new/home/smart/ressmartunity/img/Fire.png') }}" alt=""/>
                <div class="name">消防报警系统</div>
            </a>
            <a href="javascript:;">
                <img src="{{ asset('new/home/smart/ressmartunity/img/equipment.png') }}" alt=""/>
                <div class="name">设备监控系统</div>
            </a>
        </div>
    </div>
</div>
<!--轻松实现“互联网+物业”-->
<div class="network">
    <div class="title">轻松实现“互联网+物业”</div>
    <div class="brief">智慧物业管理系统可实现业主与管理者无缝联系</div>
    <div class="contact">
        <!--背景图片-->
        <div class="network_bg">
            <img src="{{ asset('new/home/smart/ressmartunity/img/system_bg.png') }}" alt=""/>
        </div>
        <div class="network_bg1">
            <img src="{{ asset('new/home/smart/ressmartunity/img/system_bg1.png') }}" alt=""/>
        </div>
        <div class="Property">
            <div class="Property_first opacity">
                <div class="Property_left">
                    <div class="Property_js">
                        <div class="biaoti">1.</div>
                        <div class="neirong">
                            与物业公司合作共赢
                            快速低成本实现物业管理
                            移动化。
                        </div>
                    </div>
                    <div class="Property_img">
                        <img src="{{ asset('new/home/smart/ressmartunity/img/Property1.png') }}" alt=""/>
                    </div>
                </div>
                <div class="Property_left">
                    <div class="Property_js">
                        <div class="biaoti">3.</div>
                        <div class="neirong">
                            智慧社区管理平台定制
                            量身定制专属平台
                            实现品牌转型升级。
                        </div>
                    </div>
                    <div class="Property_img">
                        <img src="{{ asset('new/home/smart/ressmartunity/img/Property3.png') }}" alt=""/>
                    </div>
                </div>
            </div>
            <div class="Property_first">
                <div class="Property_left">
                    <div class="Property_img">
                        <img src="{{ asset('new/home/smart/ressmartunity/img/Property2.png') }}" alt=""/>
                    </div>
                    <div class="Property_js">
                        <div class="biaoti">2.</div>
                        <div class="neirong">
                            智慧社区管理平台
                            打造专属平台
                            实现品牌转型升级。
                        </div>
                    </div>
                </div>
                <div class="Property_left">
                    <div class="Property_img">
                        <img src="{{ asset('new/home/smart/ressmartunity/img/Property4.png') }}" alt=""/>
                    </div>
                    <div class="Property_js">
                        <div class="biaoti">4.</div>
                        <div class="neirong">
                            专业提供物业管理系统
                            提升品质，降低成本
                            增加收益，实现软硬件完
                            美结合，无线互联互通。
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!--最好的智慧生活服务商-->
<div class="Service">
    <div class="title">智慧生活服务商</div>
    <div class="brief">智慧物业管理系统可实现业主与管理者无缝联系</div>
    <div class="contact">
        <a href="javascript:;">
            <div class="Service_img">
                <img src="{{ asset('new/home/smart/ressmartunity/img/Service_img1.png') }}" alt=""/>
            </div>
            <div class="Service_right">
                <span>智慧社区生态圈</span>
                <div>物业管家、邻里圈、邻里圈、跑腿服务、智能家居、邻里社交、社区服务、生活服务、健康服务。</div>
            </div>
        </a>
        <a href="javascript:;">
            <div class="Service_img">
                <img src="{{ asset('new/home/smart/ressmartunity/img/Service_img2.png') }}" alt=""/>
            </div>
            <div class="Service_right">
                <span>贴身的物业管家</span>
                <div>报事报修、语音播报、抢单派单、设备巡检、移动考勤、停车收费、工单管理。</div>
            </div>
        </a>
        <a href="javascript:;">
            <div class="Service_img">
                <img src="{{ asset('new/home/smart/ressmartunity/img/Service_img3.png') }}" alt=""/>
            </div>
            <div class="Service_right">
                <span>把握身边 赢在未来</span>
                <div>语音播报、订单列表、抢单派单、账单明细、配送管理、优惠券管理、商品管理、批发商城、采购订单。</div>
            </div>
        </a>
        <a href="javascript:;">
            <div class="Service_img">
                <img src="{{ asset('new/home/smart/ressmartunity/img/Service_img4.png') }}" alt=""/>
            </div>
            <div class="Service_right">
                <span>贴身的移动POS</span>
                <div>扫码支付、我要贷款、商户收款、明细查询。</div>
            </div>
        </a>
    </div>
</div>
@endsection('content')

@section('js')

@endsection('js')