@extends('Newpro.Home.public')

@section('css')
<link rel="stylesheet" href="{{ asset('/new/home/index/index.css') }}">
<link rel="stylesheet" href="{{ asset('/new/home/bannerList/bannerList.css') }}">
@endsection('css')

@section('content')
<!--banner图 轮播-->
<div class="banner">
    <ul class="">
        <li><a href="javascript:;"><img src="{{ asset('/new/home/index/img/banner1.png') }}" alt=""></a></li>
        <li><a href="javascript:;"><img src="{{ asset('/new/home/index/img/banner2.png') }}" alt=""></a></li>
    </ul>
    <div class="left-btn"></div>
    <div class="right-btn"></div>
    <div class="img-btn-list"></div>
</div>
<!--智能社区-->
<div class="Intelligence">
    <a href="javascript:;">
        <img src="{{ asset('/new/home/index/img/Furnishing.png') }}" alt=""/>
        <span class="title">智能家居</span>
        <span class="brief">健康智能家居系统</span>
        <i></i>
        <!--隐藏栏目-->
        <div class="hide">
            <div class="hide_title NO1">智能家居系统</div>
            <div class="connet">
                <span></span>
                <em>智能灯光系统</em>
            </div>
            <div class="connet">
                <span></span>
                <em>智能安防系统</em>
            </div>
            <div class="connet">
                <span></span>
                <em>家电控制系统</em>
            </div>
            <div class="connet">
                <span></span>
                <em>影音娱乐系统</em>
            </div>
        </div>
    </a>
    <a href="javascript:;">
        <img src="{{ asset('/new/home/index/img/Community.png') }}" alt=""/>
        <span class="title">智慧社区</span>
        <span class="brief">建商智家智慧社区</span>
        <i></i>
        <!--隐藏栏目-->
        <div class="hide">
            <div class="hide_title NO2">智家智慧社区</div>
            <div class="connet">
                <span></span>
                <em>智能家居</em>
            </div>
            <div class="connet">
                <span></span>
                <em>智慧物业</em>
            </div>
            <div class="connet">
                <span></span>
                <em>社区O2O</em>
            </div>
            <div class="connet">
                <span></span>
                <em>云数据管理</em>
            </div>
        </div>
    </a>
    <a href="javascript:;">
        <img src="{{ asset('/new/home/index/img/Trading.png') }}" alt=""/>
        <span class="title">智慧商圈</span>
        <span class="brief">商业地产智慧管理系统</span>
        <i></i>
        <!--隐藏栏目-->
        <div class="hide">
            <div class="hide_title NO3">商业地产管理</div>
            <div class="connet">
                <span></span>
                <em>智慧门禁管理</em>
            </div>
            <div class="connet">
                <span></span>
                <em>智慧电梯管理</em>
            </div>
            <div class="connet">
                <span></span>
                <em>智慧停车管理</em>
            </div>
            <div class="connet">
                <span></span>
                <em>智慧能源管理</em>
            </div>
        </div>
    </a>
    <a href="javascript:;">
        <img src="{{ asset('/new/home/index/img/The_trip.png') }}" alt=""/>
        <span class="title">智慧文旅</span>
        <span class="brief">文旅地产智慧管理系统</span>
        <i></i>
        <!--隐藏栏目-->
        <div class="hide">
            <div class="hide_title NO4">文旅地产管理</div>
            <div class="connet">
                <span></span>
                <em>旅游地产管理</em>
            </div>
            <div class="connet">
                <span></span>
                <em>旅游地产服务</em>
            </div>
            <div class="connet">
                <span></span>
                <em>O2O互动营销</em>
            </div>
            <div class="connet">
                <span></span>
                <em>云数据管理</em>
            </div>
        </div>
    </a>
</div>
<!--案列-->
<div class="Case">
    <div class="title">工程案列</div>
    <div class="brief">我们积累了各行业丰富的案例和经验</div>
    <div class="Case_loop">
        <a href="javascript:;">
            <img src="{{ asset('/new/home/index/img/Case1.png') }}" alt=""/>
            <div class="hide">
                <div class="hide_aout">
                    <div class="title">孵化园项目</div>
                    <i></i>
                    <div class="content">

                    </div>
                </div>
            </div>
        </a>
        <a href="javascript:;">
            <img src="{{ asset('/new/home/index/img/Case2.png') }}" alt=""/>
            <div class="hide">
                <div class="hide_aout">
                    <div class="title">织金万都名城</div>
                    <i></i>
                    <div class="content">
                        贵州省5个100工程；贵州省100个城市综合体之一；织金县唯一城市综合体；织金县重点招商引资项目；织金指定返乡创业基地；县重点招商引资项目；
                    </div>
                </div>
            </div>
        </a>
        <a href="javascript:;">
            <img src="{{ asset('/new/home/index/img/Case3.png') }}" alt=""/>
            <div class="hide">
                <div class="hide_aout">
                    <div class="title">德福公元</div>
                    <i></i>
                    <div class="content">
                        宜宾德福公元项目位于四川省宜宾市宜宾县，地块位于金江大道南侧，场地内高差较大。本项目位于宜宾县城北新区，是未来宜宾县新的行政、商住、和金融中心。
                    </div>
                </div>
            </div>
        </a>
        <a href="javascript:;">
            <img src="{{ asset('/new/home/index/img/Case4.png') }}" alt=""/>
            <div class="hide">
                <div class="hide_aout">
                    <div class="title">浙商.临港新天地</div>
                    <i></i>
                    <div class="content">
                        浙商·临港新天地是由宜宾浙商西部金融科技城发展有限公司打造的集金融、科技、现代服务业、大型商业于一体的纯商业综合体项目。
                    </div>
                </div>
            </div>
        </a>

        <a href="javascript:;">
            <img src="{{ asset('/new/home/index/img/Case5.png') }}" alt=""/>
            <div class="hide">
                <div class="hide_aout">
                    <div class="title">丽雅置地（丽雅时代）</div>
                    <i></i>
                    <div class="content">
                        丽雅时代，丽雅置地南溪一号作品，19万方超大综合体，傲立未来中央CBD上，聚合政务、首启多核建筑模式，即将创领一站式都会享受、助推新区跨越式发展。
                    </div>
                </div>
            </div>
        </a>
        <a href="javascript:;">
            <img src="{{ asset('/new/home/index/img/Case6.png') }}" alt=""/>
            <div class="hide">
                <div class="hide_aout">
                    <div class="title">鲁能山水原著</div>
                    <i></i>
                    <div class="content">
                        “Garden city”花园城市的开发理念，依托七星山、凤凰溪、宋家坡公园、栖凤公园得天独厚的自然生态资源。
                    </div>
                </div>
            </div>
        </a>
        <a href="javascript:;">
            <img src="{{ asset('/new/home/index/img/Case7.png') }}" alt=""/>
            <div class="hide">
                <div class="hide_aout">
                    <div class="title">五粮液集团</div>
                    <i></i>
                    <div class="content">
                        集团公司已发展成为以酒业为核心主业、多元化发展（现代机械制造、高分子材料、现代包装、现代物流为支柱产业）的产业格局。
                    </div>
                </div>
            </div>
        </a>
        <a href="javascript:;">
            <img src="{{ asset('/new/home/index/img/Case8.png') }}" alt=""/>
            <div class="hide">
                <div class="hide_aout">
                    <div class="title">远达房产</div>
                    <i></i>
                    <div class="content">
                        简洁的造型和优雅的线条辅以国际流行的色调和非对称性的手法，彰显都市感和现代感，表现出居住者的品味。
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>
<!--动态新闻-->
<div class="News">
    <div class="title">动态新闻</div>
    <div class="brief">记录我们成长的每一步</div>
    <div class="News_show">
        <a href="javascript:;">
            <img src="{{ asset('/new/home/index/img/News1.png') }}" alt=""/>
            <div class="content">
                <div class="titlel">人脸识别购物形式在各国推广</div>
                <div class="brief1">
                    在过去的一年中，人脸识别技术被评选为2017年科技行业五大突破之一。近年来，人脸识别技术快速发展、应用广泛，影响了人们生活的方方面面。其中“人脸识别购物”应用得到了世界多国的推崇
                </div>
                <span class="See">查看详情</span>
            </div>
        </a>
        <a href="javascript:;">
            <img src="{{ asset('/new/home/index/img/News2.png') }}" alt=""/>
            <div class="content">
                <div class="titlel">人脸识别购物形式在各国推广</div>
                <div class="brief1">
                    在过去的一年中，人脸识别技术被评选为2017年科技行业五大突破之一。近年来，人脸识别技术快速发展、应用广泛，影响了人们生活的方方面面。其中“人脸识别购物”应用得到了世界多国的推崇
                </div>
                <span class="See">查看详情</span>
            </div>
        </a>
        <a href="javascript:;">
            <img src="{{ asset('/new/home/index/img/News3.png') }}" alt=""/>
            <div class="content">
                <div class="titlel">人脸识别购物形式在各国推广</div>
                <div class="brief1">
                    在过去的一年中，人脸识别技术被评选为2017年科技行业五大突破之一。近年来，人脸识别技术快速发展、应用广泛，影响了人们生活的方方面面。其中“人脸识别购物”应用得到了世界多国的推崇
                </div>
                <span class="See">查看详情</span>
            </div>
        </a>
        <a href="javascript:;">
            <img src="{{ asset('/new/home/index/img/News4.png') }}" alt=""/>
            <div class="content">
                <div class="titlel">人脸识别购物形式在各国推广</div>
                <div class="brief1">
                    在过去的一年中，人脸识别技术被评选为2017年科技行业五大突破之一。近年来，人脸识别技术快速发展、应用广泛，影响了人们生活的方方面面。其中“人脸识别购物”应用得到了世界多国的推崇
                </div>
                <span class="See">查看详情</span>
            </div>
        </a>

        <a href="javascript:;">
            <img src="{{ asset('/new/home/index/img/News5.png') }}" alt=""/>
            <div class="content">
                <div class="titlel">人脸识别购物形式在各国推广</div>
                <div class="brief1">
                    在过去的一年中，人脸识别技术被评选为2017年科技行业五大突破之一。近年来，人脸识别技术快速发展、应用广泛，影响了人们生活的方方面面。其中“人脸识别购物”应用得到了世界多国的推崇
                </div>
                <span class="See">查看详情</span>
            </div>
        </a>
        <a href="javascript:;">
            <img src="{{ asset('/new/home/index/img/News6.png') }}" alt=""/>
            <div class="content">
                <div class="titlel">人脸识别购物形式在各国推广</div>
                <div class="brief1">
                    在过去的一年中，人脸识别技术被评选为2017年科技行业五大突破之一。近年来，人脸识别技术快速发展、应用广泛，影响了人们生活的方方面面。其中“人脸识别购物”应用得到了世界多国的推崇
                </div>
                <span class="See">查看详情</span>
            </div>
        </a>
        <a href="javascript:;">
            <img src="{{ asset('/new/home/index/img/News7.png') }}" alt=""/>
            <div class="content">
                <div class="titlel">人脸识别购物形式在各国推广</div>
                <div class="brief1">
                    在过去的一年中，人脸识别技术被评选为2017年科技行业五大突破之一。近年来，人脸识别技术快速发展、应用广泛，影响了人们生活的方方面面。其中“人脸识别购物”应用得到了世界多国的推崇
                </div>
                <span class="See">查看详情</span>
            </div>
        </a>
        <a href="javascript:;">
            <img src="{{ asset('/new/home/index/img/News8.png') }}" alt=""/>
            <div class="content">
                <div class="titlel">人脸识别购物形式在各国推广</div>
                <div class="brief1">
                    在过去的一年中，人脸识别技术被评选为2017年科技行业五大突破之一。近年来，人脸识别技术快速发展、应用广泛，影响了人们生活的方方面面。其中“人脸识别购物”应用得到了世界多国的推崇
                </div>
                <span class="See">查看详情</span>
            </div>
        </a>
    </div>
</div>
<!--战略合作-->
<div class="cooperation">
    <div class="auto">
        <div class="title">战略合作</div>
        <div class="brief">记录我们成长的每一步</div>
        <div class="cooperation_logo">
            <!--第1个加样式-->
            <a href="javascript:;" class="add_class">
                <!--多加一个容器实现突破垂直居中-->
                <div class="vertical">
                    <div class="add_div">
                        <img src="{{ asset('/new/home/index/img/logo1.png') }}" alt="" class="img_od"/>
                        <img src="{{ asset('/new/home/index/img/logo1_H.png') }}" alt="" class="img_hover"/>
                    </div>
                </div>

            </a>
            <a href="javascript:;">
                <!--多加一个容器实现突破垂直居中-->
                <div class="vertical">
                    <div class="add_div">
                        <img src="{{ asset('/new/home/index/img/logo1.png') }}" alt="" class="img_od"/>
                        <img src="{{ asset('/new/home/index/img/logo1_H.png') }}" alt="" class="img_hover"/>
                    </div>
                </div>

            </a>
            <a href="javascript:;">
                <!--多加一个容器实现突破垂直居中-->
                <div class="vertical">
                    <div class="add_div">
                        <img src="{{ asset('/new/home/index/img/logo1.png') }}" alt="" class="img_od"/>
                        <img src="{{ asset('/new/home/index/img/logo1_H.png') }}" alt="" class="img_hover"/>
                    </div>
                </div>

            </a>
            <a href="javascript:;">
                <!--多加一个容器实现突破垂直居中-->
                <div class="vertical">
                    <div class="add_div">
                        <img src="{{ asset('/new/home/index/img/logo1.png') }}" alt="" class="img_od"/>
                        <img src="{{ asset('/new/home/index/img/logo1_H.png') }}" alt="" class="img_hover"/>
                    </div>
                </div>

            </a>
            <a href="javascript:;">
                <!--多加一个容器实现突破垂直居中-->
                <div class="vertical">
                    <div class="add_div">
                        <img src="{{ asset('/new/home/index/img/logo1.png') }}" alt="" class="img_od"/>
                        <img src="{{ asset('/new/home/index/img/logo1_H.png') }}" alt="" class="img_hover"/>
                    </div>
                </div>

            </a>
            <a href="javascript:;">
                <!--多加一个容器实现突破垂直居中-->
                <div class="vertical">
                    <div class="add_div">
                        <img src="{{ asset('/new/home/index/img/logo1.png') }}" alt="" class="img_od"/>
                        <img src="{{ asset('/new/home/index/img/logo1_H.png') }}" alt="" class="img_hover"/>
                    </div>
                </div>

            </a>
            <!--第7个加样式-->
            <a href="javascript:;" class="add_class">
                <!--多加一个容器实现突破垂直居中-->
                <div class="vertical">
                    <div class="add_div">
                        <img src="{{ asset('/new/home/index/img/logo1.png') }}" alt="" class="img_od"/>
                        <img src="{{ asset('/new/home/index/img/logo1_H.png') }}" alt="" class="img_hover"/>
                    </div>
                </div>

            </a>
            <a href="javascript:;">
                <!--多加一个容器实现突破垂直居中-->
                <div class="vertical">
                    <div class="add_div">
                        <img src="{{ asset('/new/home/index/img/logo1.png') }}" alt="" class="img_od"/>
                        <img src="{{ asset('/new/home/index/img/logo1_H.png') }}" alt="" class="img_hover"/>
                    </div>
                </div>

            </a>
            <a href="javascript:;">
                <!--多加一个容器实现突破垂直居中-->
                <div class="vertical">
                    <div class="add_div">
                        <img src="{{ asset('/new/home/index/img/logo1.png') }}" alt="" class="img_od"/>
                        <img src="{{ asset('/new/home/index/img/logo1_H.png') }}" alt="" class="img_hover"/>
                    </div>
                </div>

            </a>
            <a href="javascript:;">
                <!--多加一个容器实现突破垂直居中-->
                <div class="vertical">
                    <div class="add_div">
                        <img src="{{ asset('/new/home/index/img/logo1.png') }}" alt="" class="img_od"/>
                        <img src="{{ asset('/new/home/index/img/logo1_H.png') }}" alt="" class="img_hover"/>
                    </div>
                </div>

            </a>
            <a href="javascript:;">
                <!--多加一个容器实现突破垂直居中-->
                <div class="vertical">
                    <div class="add_div">
                        <img src="{{ asset('/new/home/index/img/logo1.png') }}" alt="" class="img_od"/>
                        <img src="{{ asset('/new/home/index/img/logo1_H.png') }}" alt="" class="img_hover"/>
                    </div>
                </div>

            </a>
            <a href="javascript:;">
                <!--多加一个容器实现突破垂直居中-->
                <div class="vertical">
                    <div class="add_div">
                        <img src="{{ asset('/new/home/index/img/logo1.png') }}" alt="" class="img_od"/>
                        <img src="{{ asset('/new/home/index/img/logo1_H.png') }}" alt="" class="img_hover"/>
                    </div>
                </div>

            </a>
        </div>
    </div>
</div>
@endsection('content')

@section('js')
<script src="{{ asset('new/home/bannerList/bannerList.js') }}"></script>

@endsection('js')