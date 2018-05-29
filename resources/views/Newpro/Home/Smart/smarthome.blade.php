@extends('Newpro.Home.public')

@section('css')
<link rel="stylesheet" href="{{ asset('/new/home/smart/smarthome/smarthome.css') }}">

@endsection('css')

@section('content')
<!--banner图-->
<div class="Furnishing_banner">
    <img src="{{ asset('new/home/smart/smarthome/img/Furnishing_banner.png') }}" alt="建商智能家居"/>
</div>
<div class="ship">
    <!-- <video src="{{ asset('http://121.43.168.49/index.php?share/fileProxy&path=%7BuserShare%7D%3A100%2Fzhineng.mp4') }}"  controls="controls"> -->
    <video src="{{ asset('/new/home/smart/smarthome/img/zhineng.mp4') }}"  controls="controls">
    </video>
</div>    
<div class="F_Life">
    <img src="{{ asset('new/home/smart/smarthome/img/F_Life.png') }}" alt="" class="F_Life_img" />
    <img src="{{ asset('new/home/smart/smarthome/img/F_Life1.png') }}" alt="" class="F_Life_img1" />
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
            <img src="{{ asset('new/home/smart/smarthome/img/Pattern1.png') }}" alt="智能家居回家模式" class="fl"/>
        </div>
        <div class="Loop">
            <div class="text2">
                <div class="name">离家模式</div>
                <i class="bd"></i>
                <div class="Contact">
                    当没人在家的时候，布防模式正在运行，玄关、窗户、走廊处的门窗磁传感器和人体传感器一旦触发，智能摄像机将立即录像，并拨打报警电话提醒你，全方位守护家庭安全。
                </div>
            </div>
            <img src="{{ asset('new/home/smart/smarthome/img/Pattern2.png') }}" alt="智能家居离家模式" class="fl"/>
        </div>
        <div class="Loop">
            <div class="text">
                <div class="name">安防模式</div>
                <i class="bd"></i>
                <div class="Contact">
                    出差在外，总惦记着家里？只要打开APP，就可随时随地查看家中动态，还可以通过APP远程控制检查门窗、燃气、水电等设备的状态。
                </div>
            </div>
            <img src="{{ asset('new/home/smart/smarthome/img/Pattern3.png') }}" alt="智能家居安防模式" class="fl"/>
        </div>
    </div>
</div>
<!--遥控-->
<div class="Remote">
    <div class="Title">精彩生活 智能相随</div>
    <div class="Brief">遥控一按 智能畅所欲</div>
    <div class="Show">
        <a href=" ">
            <img src="{{ asset('new/home/smart/smarthome/img/Remote1.png') }}" alt="智能遥控全新体验"/>
        </a>
        <a href="javascript:;">
            <img src="{{ asset('new/home/smart/smarthome/img/Remote2.png') }}" alt="智能联动对话家电"/>
        </a>
        <a href="javascript:;">
            <img src="{{ asset('new/home/smart/smarthome/img/Remote3.png') }}" alt="定时遥控合理规划"/>
        </a>
        <a href="javascript:;">
            <img src="{{ asset('new/home/smart/smarthome/img/Remote4.png') }}" alt="场景模式一键掌控"/>
        </a>
    </div>
</div>
<div class="Choice">
    <div class="top">
        <span class="avtive">
            <a href="javascript:;">影音娱乐</a>
        </span>
         <span>
            <a href="javascript:;">智能照明</a>
        </span>
         <span>
            <a href="javascript:;">舒适便利</a>
        </span>
         <span>
            <a href="javascript:;">安防监控</a>
        </span>
    </div>
    <div class="tabpanel">
        <div class="Loop avtive">
            <div class="pleasure">
                <div class="name">影音娱乐</div>
                <p>
                    影音娱乐是每个智能家居的核心，即使是最简单的系统，控制多个影音源也是件复杂的事，
                    使用建商智能影音解决方案，您可以集成HIFI音乐、高清视频、高清环绕音效、大电视或投影幕布，定制灯光效果，
                    设计出令人惊叹的家庭影音娱乐系统，体验极致影音效果！
                </p>
            </div>
            <div class="layout">
                <img src="{{ asset('new/home/smart/smarthome/img/Choice1.jpg') }}" alt="简单易操作的家庭娱乐空间"/>
                <div class="layout_div">
                    <div class="layout_bt">简单易操作的家庭娱乐空间</div>
                    <p>
                        影音娱乐是每个智能家居的核心， 即使是最简单的系统， 控制多个影音源 也是件复杂的事。使用建商智能影音解决方案，
                        您可以集成HIFI音乐，高清视频，高清环绕音效，大电视或投影幕布，定制灯光效果，设计出令人惊叹的家庭影音娱乐系统，
                        体验极致影音效果！
                    </p>
                </div>
            </div>
            <div class="layout">
                <img src="{{ asset('new/home/smart/smarthome/img/Choice2.jpg') }}" alt="从单个房间到整个住宅" class="Choice_img"/>
                <div class="layout_div">
                    <div class="layout_bot">从单个房间到整个住宅</div>
                    <p class="la_p">
                        我们将改变您聆听音乐的方式，您可以在整个家分享音乐，或只在某个房间欣赏特定的歌曲列表。您一定会喜欢这种随心所欲聆听您喜爱的高保真音乐的方式。
                        <br/>
                        您可以体验与音乐互动的震撼效果，通过触控屏、电视、或是手机上的用户界面，来浏览您的音乐，并按您最喜爱的艺术家或是专辑进行排列查找。
                    </p>
                </div>
            </div>
        </div>
        <div class="Loop">
            <div class="pleasure">
                <div class="name">智能照明</div>
                <p>
                    智能照明以其精细、 高效能的方式， 影响您家中的氛围， 搭配您家中的装修风格增添美感， 并带给您方便和节能的生活环境。
                    无论您想要调亮／调暗房间或是整个家中的任何灯光，只需一键。或者，让灯光按照您的生活方式智能运行，无需任何操作。不只是智能， 而且聪明绝顶。
                </p>
            </div>
            <div class="layout">
                <img src="{{ asset('new/home/smart/smarthome/img/Choice3.jpg') }}" alt="建商智能家居远程控制"/>
                <div class="layout_div">
                    <div class="layout_bt">远程控制</div>
                    <p>
                        即使出门在外，只需拿出手机轻轻一点，便能随时随地控制家中灯光的开启与关闭。从此不用担心出门忘记关灯。下班回家前，也能提前亮灯照亮回家的路。
                    </p>
                </div>
            </div>
            <div class="layout">
                <img src="{{ asset('new/home/smart/smarthome/img/Choice4.jpg') }}" alt="建商智能家居无线照明" class="Choice_img"/>
                <div class="layout_div">
                    <div class="layout_bot">无线照明</div>
                    <p class="la_p">
                        只需轻轻一按，即可开启或关闭多个房间灯光或全屋灯光。房间无人时能自动关闭照明。您的房子甚至可以在您外出的时候交替开启灯光，模拟出家中有人的样子。
                    </p>
                </div>
            </div>
            <div class="layout">
                <img src="{{ asset('new/home/smart/smarthome/img/Choice5.jpg') }}" alt="建商智能家居场景设置"/>
                <div class="layout_div">
                    <div class="layout_bt">场景设置</div>
                    <p>
                        只需一次轻触操作即可实现多路灯光场景的转换；还可得到想要的灯光和电器的组合场景，如回家模式、离家模式、会客模式、就餐模式、影院模式、夜起模式等。
                    </p>
                </div>
            </div>
        </div>
        <div class="Loop">
            <div class="pleasure">
                <div class="name">舒适便利</div>
                <p>
                    一个智能的家应该是舒适的、节能的。创造舒适的居家不仅限于调控温度、湿度，自动窗帘，
                    热水器在您回家的时候自动开启，还可以通过程控技术最大化实现节能。我们与世界领导品牌合作，将地暖、新风、地源热录等系统集成到您家中的智能系统。
                </p>
            </div>
            <div class="layout">
                <img src="{{ asset('new/home/smart/smarthome/img/Choice6.jpg') }}" alt="建商智能家居温度控制"/>
                <div class="layout_div">
                    <div class="layout_bt">温度控制</div>
                    <p>
                        利用温控器或手机触屏上的用户界面调整温度环境。按照季节变化调整温度湿度。甚至连沙发都不用离开就点燃壁炉。
                    </p>
                </div>
            </div>
            <div class="layout">
                <img src="{{ asset('new/home/smart/smarthome/img/Choice7.jpg') }}" alt="建商智能家居可视对讲" class="Choice_img"/>
                <div class="layout_div">
                    <div class="layout_bot">可视对讲</div>
                    <p class="la_p">
                        视频对讲连接速度快，画质高，音频保真度好。现在就将门铃换成一个优雅的对讲门口机，不用离开沙发就能知道谁在敲门。轻轻一按，就能在同一个界面上打开门锁。
                    </p>
                </div>
            </div>
            <div class="layout">
                <img src="{{ asset('new/home/smart/smarthome/img/Choice8.jpg') }}" alt="建商智能家居室外控制"/>
                <div class="layout_div">
                    <div class="layout_bt">室外控制</div>
                    <p>
                        让舒适和便利超越墙壁延伸到您的屋外天地。
                    </p>
                </div>
            </div>
        </div>
        <div class="Loop">
            <div class="pleasure">
                <div class="name">安防监控</div>
                <p>
                    建商智能系统可以整合您的灯光、门锁、安防系统、视频录像等等，让您的家更安全。利用Control 4手机app，
                    您可以随时查看家中的一切。让您无论在家或出门在外都能安心放心。
                </p>
            </div>
            <div class="layout">
                <img src="{{ asset('new/home/smart/smarthome/img/Choice9.jpg') }}" alt="建商智能家居解锁和锁闭"/>
                <div class="layout_div">
                    <div class="layout_bt">解锁和锁闭</div>
                    <p>
                        您可毫不费力地锁闭或解锁您的安防系统，当您出门在外，只需按下“离家”，启动警报和监控摄像头，并锁闭所有房门。
                    </p>
                </div>
            </div>
            <div class="layout">
                <img src="{{ asset('new/home/smart/smarthome/img/Choice10.jpg') }}" alt="建商智能家居门锁和提醒" class="Choice_img"/>
                <div class="layout_div">
                    <div class="layout_bot">门锁和提醒</div>
                    <p class="la_p">
                        轻松查看和管理门锁，给予或收回进出房屋的权限。在出现异常时接收到提醒，例如地下室管线泄漏或车库门未关。
                        监控家中情况，无论你离开家多远，控制权就在您手中。
                    </p>
                </div>
            </div>
            <div class="layout">
                <img src="{{ asset('new/home/smart/smarthome/img/Choice11.jpg') }}" alt="建商智能家居视频监控"/>
                <div class="layout_div">
                    <div class="layout_bt">视频监控</div>
                    <p>
                        无论你在家中或在外，都能远程通过移动设备实时监控摄像头画面。
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="Core">
    <div class="biaoti">核心技术</div>
    <div class="Core_p">
        <p>建商致力于提供世界级的人工智能软硬件产品，引领未来生活。</p>
        <p>源自德国的精湛工业设计和对品质的执着追求，</p>
        <p>为用户带来智能科技技术的跨越式变革，让用户畅享高品质、精彩的智能生活。</p>
    </div>
</div>
<div class="Passive">
    <div class="biaoti">无线无源技术</div>
    <div class="Core_p">
        <p>与有线的解决方案相比，建商的无线无源技术无需电线、电池，也无需维护，具有最大程度的灵活性和无与伦比的便捷</p>
        <p>性，开辟了规划和安装智能控制系统的全新时代，灵活、安装成本低廉，且没有额外的电路费用。而在后期改造项目中，</p>
        <p>也可以轻松调整无线部件，适应各种变化。建商无线无源技术至今已经成功被应用于全球超过50万栋建筑物中。</p>
    </div>
</div>
<div class="Bus">
    <div class="about">
        <img src="{{ asset('new/home/smart/smarthome/img/Bus1.png') }}" alt="建商智能家居H-BUS总线技术"/>
        <div class="Bus_fr">
            <div class="biaoti">H-BUS总线技术</div>
            <div class="Core_p">
                <p>
                    我们的研发团队经过多年的资源、技术整合，对多种智能协议的转换、兼容进行了深入的研究、测试和整合，
                    成功研发了支持几乎市面上所有主流智能协议转换与兼容的H-BUS总线控制技术，
                    同时兼容Savant、Crestron、AMX、SIEMENS、Johnson、Honeywell、LOYTEC、Control4等主流智能控制平台，
                    如，并在品质、功能、稳定性和成本之间实现良好的平衡，为消费者提供多元的选择。
                </p>
            </div>
        </div>
    </div>
</div>
<div class="Experience">
    <div class="biaoti">全球智能家居体验中心</div>
    <div class="Core_p">
        <p>秉承德国工业精神以及对品质的无尽追求，建商携开创性的智能技术和产品 </p>
        <p>来到中国，为中国消费者带来优雅舒适、安全可靠的智能生活体验。</p>
    </div>
</div>
<div class="Advantage">
    <div class="baioti">我们的优势</div>
    <span class="xian"></span>
    <span class="xiaobt">为您提供可靠的技术保障，让您无忧畅想智慧生活</span>
    <div class="jieshao">
        <a href="javascript:;">
            <img src="{{ asset('new/home/smart/smarthome/img/Advantage1.png') }}" alt="建商智能家居32项品控管理方法"/>
            <div class="jieshao_bt">32项品控管理方法</div>
            <p>严格执行32项细致品控管理，施工规范细致</p>
        </a>
        <a href="javascript:;">
            <img src="{{ asset('new/home/smart/smarthome/img/Advantage2.png') }}" alt="建商智能家居15年资深设计团队"/>
            <div class="jieshao_bt">15年资深设计团队</div>
            <p>拥有从业15年的资深智能家居设计师团队</p>
        </a>
        <a href="javascript:;">
            <img src="{{ asset('new/home/smart/smarthome/img/Advantage3.png') }}" alt="建商智能家居1000+成功项目"/>
            <div class="jieshao_bt">1000+成功项目</div>
            <p>超过1000个项目，每一个系统都经过精密的编程与调试</p>
        </a>
        <a href="javascript:;">
            <img src="{{ asset('new/home/smart/smarthome/img/Advantage4.png') }}" alt="建商智能家居360度无忧售后服务"/>
            <div class="jieshao_bt">360度无忧售后服务</div>
            <p>1小时极速响应，1个工作日内提供解决方案</p>
        </a>
    </div>
</div>
@endsection('content')

@section('js')
<script>
     $(".Choice .top span").click(function(){
        $(".Choice .top span").removeClass("avtive").eq($(this).index()).addClass("avtive");
        $(".tabpanel .Loop").removeClass("avtive").eq($(this).index()).addClass("avtive")
    });
</script>
@endsection('js')