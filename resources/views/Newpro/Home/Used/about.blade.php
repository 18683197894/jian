@extends('Newpro.Home.public')
@section('css')
<link rel="stylesheet" href="{{ asset('/new/home/about/about.css') }}">
@endsection('css')

@section('content')
<div class="banner">
    <img src="{{ asset('/new/home/about/img/aboutus.jpg') }}" alt=""/>
</div>

<div class="contact">
    <div class="Choice">
        <div class="Choice_a">
            <a href="javascript:;" class="@if( $ors == 'about' ) avtive @endif">企业简介</a>
            <a href="javascript:;" class="@if( $ors == 'team' ) avtive @endif">运营团队</a>
            <a href="javascript:;" class="@if( $ors == 'framework' ) avtive @endif">组织构架</a>
            <a href="javascript:;" class="@if( $ors == 'contact' ) avtive @endif">联系我们</a>
        </div>
    </div>
    <div class="Sorts">
        <!--企业简介-->
        <div class="Sorts_lower @if( $ors == 'about' ) avtive @endif">
            <div class="explain">
                <div class="text">
                    <div>四川建商网络科技有限公司</div>
                    <p>
                        四川建商网络科技有限公司（以下简称“建商科技”），是建商联盟旗下商业
                        地产投资及运营的专业化服务平台,以国际前沿商业模式为蓝本，秉承“长期持有，
                        稳健经营”的原则，引进国际前沿的商业运营理念，实行统一规划、统一招商、统
                        一运营、统一管理的经营模式，实现物业资产的持续增值。
                    </p>
                    <p>
                        建商科技的主营业务为商业地产投资及运营管理，依托“大地产”模式，同时
                        拓展外部资源，内外结合，不断丰富购物、休闲、娱乐、生活服务主题，打造“大
                        商业”平台模式，构建创新型城市生活广场。
                    </p>
                    <p>
                        开发项目均从城市人群多层面的需求着手，开创性地推出“跨界合作”，在商
                        业模式引入文化艺术、生态环保、美食休闲、时尚娱乐、互动数码、圈层社交、自
                        然科普、亲子育乐、健康养生、公益慈善等十大体验功能，使得商业空间不仅仅只
                        是一个购物中心，更是未来城市消费者的社交中心、娱乐中心、休闲中心、公益中
                        心、生态中心、健康中心、亲子中心、科普中心、文化中心、时尚中心。各个功能
                        板块之间形成互动，引导消费者的合理流动，产生复合效应，满足全客层“一站式
                        体验消费”需求，打造建商科技在商业地产的竞争优势。
                    </p>
                </div>
                <img src="{{ asset('/new/home/about/img/bgs.jpg') }}" alt=""/>
            </div>
            <div class="Location">
                <div class="title">企业定位 <img src="{{ asset('/new/home/about/img/sanjiao.jpg') }}" alt=""/></div>
                <img src="{{ asset('/new/home/about/img/about1.jpg') }}" alt="" class="Location_bg"/>
            </div>
            <div class="votes">
                <div class="title">企业优势 <img src="{{ asset('/new/home/about/img/sanjiao.jpg') }}" alt=""/></div>
                <div class="votes_auto">
                    <a href="javascript:;">
                        <img src="{{ asset('/new/home/about/img/btt-1.jpg') }}" alt=""/>
                        <div>智慧家居新时代</div>
                        <p>以智慧全力守护你的家，更便捷、更智能、更节能</p>
                        <p>为你私人定制全屋智能解决方案，尽享惬意和舒适</p>
                        <p>以贴心服务为核心桥接家庭与社会</p>
                        <p>智能控制、智能照明、影音娱乐、智能安防，更出众</p>
                    </a>
                    <a href="javascript:;">
                        <img src="{{ asset('/new/home/about/img/btt-2.jpg') }}" alt=""/>
                        <div>线上线下资源整合</div>
                        <p>资源集结、有求必应</p>
                        <p>互联网渠道构建全国范围的销售与服务网上平台</p>
                        <p>家居建材全产业链资源整合融合、渠道融通</p>
                        <p>海量精准信息资源库，为消费者提供精准服务</p>
                    </a>
                    <a href="javascript:;">
                        <img src="{{ asset('/new/home/about/img/btt-3.jpg') }}" alt=""/>
                        <div>构建全新产品生态圈</div>
                        <p>绿色供应、利益共享</p>
                        <p>简化服务环节、清晰产品供应链</p>
                        <p>提供品类繁多且符合现代消费者需求的产品</p>
                        <p>保证出售产品均为厂商正品</p>
                        <p>启用行内专业评估机构把控产品质量</p>
                    </a>
                    <a href="javascript:;">
                        <img src="{{ asset('/new/home/about/img/btt-4.jpg') }}" alt=""/>
                        <div>服务标准化</div>
                        <p>一体化服务、个性体验</p>
                        <p>坚持“以消费者为核心，实现多方共赢”的理念</p>
                        <p>重构线上、线下、物流与服务</p>
                        <p>一站式消费体验</p>
                        <p>一体化解决方案</p>
                    </a>
                </div>
            </div>
            <div class="Culture">
                <div class="title">企业文化 <img src="{{ asset('/new/home/about/img/sanjiao.jpg') }}" alt=""/></div>
                <img src="{{ asset('/new/home/about/img/lianli.jpg') }}" alt="" class="Location_bg_w"/>
                 <img src="{{ asset('/new/home/about/img/lianli1.jpg') }}" alt="" class="Location_bg_w1"/>
            </div>
            <div class="vision">
                <div class="title">企业愿景 <img src="{{ asset('/new/home/about/img/sanjiao.jpg') }}" alt=""/></div>
                <div class="vision_auto">
                    <img src="{{ asset('/new/home/about/img/yj.jpg') }}" alt="" class="yj" />
                    <img src="{{ asset('/new/home/about/img/yj1.jpg') }}" alt="" class="yj1" />
                    <div class="text">
                        <p>全面启动互联网+家居建材服务平台；</p>
                        <p>以互联网思维颠覆传统家居建材行业，打造一个把消费转化成为投资行为的家居建材平台；</p>
                        <p>“智慧家”从建商联盟开始，你的家居整体解决方案服务商！</p>
                    </div>
                </div>
            </div>
        </div>
        <!--运营团队-->
        <div class="Sorts_lower @if( $ors == 'team' ) avtive @endif">
            <div class="team">
                <div class="loop">
                    <img src="{{ asset('/new/home/about/img/tuandui1.jpg') }}" alt=""/>
                    <div class="data">
                        <div class="title">专业的运营团队</div>
                        <div class="data_p">
                            建商联盟具有经验丰富的运营管理、市场推广、财务审核和后勤保障团队，精细化的数据分析和风险管控能力，
                            确保业务正常运行。公司运营管理团队具有丰富的实践经验，对整个家居建材构成了科学的管理体系，
                            是一批具有创新意识和强烈社会责任感，更注重为消费者和商家提供精细化服务，充分利用“互联网+”，
                            整合资源，开拓家具建材新局面，打造全新生态圈。
                        </div>
                    </div>
                </div>
                <div class="loop">
                    <div class="data">
                        <div class="title_t">第三方顾问团队</div>
                        <div class="data_t">
                            <p>
                                A：十余年专业经验法律顾问团   团队具有行政性、专业性、咨议性、服务性、非常设性等特征，团队律师均由法治机构专家组成，具有丰富的从业经验和专业优势
                            </p>
                            <p>
                                B：集专业理论和实践于一身的营销策划团队  团队成员均有在4A级传媒公司从业经验，不仅具有敏锐的市场观察力、判断力，还具有睿智的想象能力和娴熟的表达技巧。
                            </p>
                            <p>
                                C：专业品牌推广团队  团队成员具有500强企业从业经验，拥有良好的协作意识，能快速把品牌曝光于各种媒体中。
                            </p>
                        </div>
                    </div>
                    <img src="{{ asset('/new/home/about/img/tuandui2.jpg') }}" alt=""/>
                </div>
            </div>
        </div>
        <!--发展战略-->
        
        <!--组织架构-->
        <div class="Sorts_lower @if( $ors == 'framework' ) avtive @endif" >
            <img src="{{ asset('/new/home/about/img/zuzhi.jpg') }}" alt="" class="zuzhi"/>
        </div>
        <!--联系我们-->
        <div class="Sorts_lower @if( $ors == 'contact' ) avtive @endif" >
           <div class="linked">
               <span class="linked_top">
                   如果您是品牌厂商或本地商户，想要寻求新的增长机会，寻求更好的货源，更好的销售；如果你有一腔热血，愿意加入我们一起开拓新的事业，可与我们进行联系！
               </span>
               <div class="linked_con">
                   <span class="name">四川建商网络科技有限公司</span>
                   <p>
                       工作时间：周一至周六  上午9：00~下午18：00
                   </p>
                   <p>
                       财富热线：0831-8888598
                   </p>
                   <p>
                       地址：四川省宜宾市临港经济开发区龙头山路199号2号楼西南互联网产业基地522
                   </p>
                   <p>
                       网址：www.jianshanglianmeng.com
                   </p>
                   <p>
                       投诉建议：0831-8888598
                   </p>
               </div>
           </div>
        </div>
    </div>
</div>
@endsection('content')

@section('js')
<script src="{{ asset('/new/home/about/about.js') }}"></script>
@endsection('js')