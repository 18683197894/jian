<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
    <link rel="stylesheet" href="{{ asset('/new/home/question/css/defusmartpublic.css')}}"/>
    <link rel="stylesheet" href="{{ asset('/new/home/question/css/defusmarthome.css')}}"/>
    <title>智能家居市场调研问答卷</title>
</head>
<body>
<img src="{{ asset('/new/home/question/img/smartbj.jpg')}}" alt="" class="bg" />

<div class="title">
智能家居市场调研问答卷
<div class="Music">
    <audio id="bgMusic" src="{{ asset('/new/home/question/img/huijia.mp3') }}" autoplay="autoplay" loop="loop"></audio>
</div>
</div>
<div class="brief">品质生活 从这里开始</div>
<div class="container-box">
    <div class="content box1 avtive">
        <div class="you">1. 您的姓名：<span>*</span></div>
        <input type="text" class="name "/>
        <div class="Sex">
            <label class="left">
                <input type="radio" value="男" name="Sex"/> <span>男</span>
            </label>
            <label class="left">
                <input type="radio" value="女" name="Sex"/> <span>女</span>
            </label>
        </div>
        <div class="Ok"></div>
    </div>
    <div class="content box2">
        <div class="you">2. 您接触过远程控制家电或其他物体的智能控制系统吗?</div>
        <div class="box2_xuan">
            <label class="box2_r">
                <input type="radio" value="没接触" name="box2_r"/> <span>没接触</span>
            </label>
            <label class="box2_r">
                <input type="radio" value="听说过" name="box2_r"/> <span>听说过</span>
            </label>
            <label class="box2_r">
                <input type="radio" value="有一定了解，没见过" name="box2_r"/> <span>有一定了解，没见过</span>
            </label>
            <label class="box2_r">
                <input type="radio" value="接触过" name="box2_r"/> <span>接触过</span>
            </label>
            <div class="Ok"></div>
        </div>
    </div>
    <div class="content box3">
        <div class="you">3.请描绘一下您眼中的智能家居系统。[多选题]   </div>
        <div class="box3_xuan">
            <label class="box3_r">
                <input type="checkbox" value="家有异常情况，系统能准确判断，及时通知并报警" name="box3"/> <span>有家有异常情况，系统能准确判断，及时通知并报警</span>
            </label>
            <label class="box3_r">
                <input type="checkbox" value="灯光和窗帘是感应或程控式，不需要手动控制开关" name="box3"> <span>灯光和窗帘是感应或程控式，不需要手动控制开关</span>
            </label>
            <label class="box3_r">
                <input type="checkbox" value="有一定了解，在外可以通过移动终端打开家的热水器" name="box3"> <span>有一定了解，在外可以通过移动终端打开家的热水器</span>
            </label>
            <label class="box3_r">
                <input type="checkbox" value="在上班的时候可以查看家里冰箱的储备状况" name="box3"/> <span>在上班的时候可以查看家里冰箱的储备状况</span>
            </label>
            <label class="box3_r">
                <input type="checkbox" value="电饭煲按照设定程序以做出对应的食物" name="box3"/> <span>电饭煲按照设定程序以做出对应的食物</span>
            </label>
            <div class="Ok"></div>
        </div>
    </div>
    <div class="content box4">
        <div class="you">4.您是否有兴趣为自己未来的家安装智能家居产品？</div>
        <div class="box4_xuan">
            <label class="box4_r">
                <input type="radio" value="是的，很有兴趣" name="box4"/> <span>是的，很有兴趣 </span>
            </label>
            <label class="box4_r">
                <input type="radio" value="有兴趣，但暂无打算" name="box4"/> <span>有兴趣，但暂无打算</span>
            </label>
            <label class="box4_r">
                <input type="radio" value="无兴趣" name="box4"/> <span>无兴趣</span>
            </label>
            <div class="Ok"></div>
        </div>
    </div>
    <div class="content box5">
        <div class="you">5.如果您想购买一套智能家居系统，您购买的原因是什么？[多选题]</div>
        <div class="box5_xuan">
            <label class="box5_r">
                <input type="checkbox" value="生活所需" name="box5"/> <span>生活所需</span>
            </label>
            <label class="box5_r">
                <input type="checkbox" value="方便实用" name="box5"> <span>方便实用</span>
            </label>
            <label class="box5_r">
                <input type="checkbox" value="追求时尚科技" name="box5"> <span>追求时尚科技</span>
            </label>
            <label class="box5_r">
                <input type="checkbox" value="身边的人推荐" name="box5"/> <span>身边的人推荐</span>
            </label>
            <div class="Ok"></div>
        </div>
    </div>
    <div class="content box6">
        <div class="you">6.如果您不想购买一套智能家居系统，您不购买的原因是什么？[多选题]</div>
        <div class="box6_xuan">
            <label class="box6_r">
                <input type="checkbox" value="价格偏高" name="box6"/> <span>价格偏高</span>
            </label>
            <label class="box6_r">
                <input type="checkbox" value="安全问题" name="box6"> <span>安全问题</span>
            </label>
            <label class="box6_r">
                <input type="checkbox" value="后期服务" name="box6"> <span>后期服务</span>
            </label>
            <label class="box6_r">
                <input type="checkbox" value="产品操作过于复杂" name="box6"/> <span>产品操作过于复杂</span>
            </label>
            <div class="Ok"></div>
        </div>
    </div>
    <div class="content box7">
        <div class="you">7.您选购智能家居产品更注重以下哪种因素？</div>
        <div class="box7_xuan">
            <label class="box7_r">
                <input type="checkbox" value="高档外观" name="box7"/> <span>高档外观 </span>
            </label>
            <label class="box7_r">
                <input type="checkbox" value="产品性能" name="box7"/> <span>产品性能</span>
            </label>
            <label class="box7_r">
                <input type="checkbox" value="产品价格" name="box7"/> <span>产品价格</span>
            </label>
            <label class="box7_r">
                <input type="checkbox" value="产品服务" name="box7"/> <span>产品服务</span>
            </label>
            <label class="box7_r">
                <input type="checkbox" value="其他" name="box7"/> <span>其他</span>
            </label>
            <div class="Ok"></div>
        </div>
    </div>
    <div class="content box8">
        <div class="you">8.以下智能家居功能中您最感兴趣的是？[多选题]</div>
        <div class="box8_xuan">
            <label class="box8_r">
                <input type="checkbox" value="智能安全监控" name="box8"/> <span>智能安全监控</span>
            </label>
            <label class="box8_r">
                <input type="checkbox" value="紧急呼叫系统" name="box8"> <span>紧急呼叫系统</span>
            </label>
            <label class="box8_r">
                <input type="checkbox" value="智能个人健康管理和医疗系统" name="box8"> <span>智能个人健康管理和医疗系统</span>
            </label>
            <label class="box8_r">
                <input type="checkbox" value="智能灯光、窗帘控制系统" name="box8"/> <span>智能灯光、窗帘控制系统</span>
            </label>
            <label class="box8_r">
                <input type="checkbox" value="远程家电控制" name="box8"/> <span>远程家电控制</span>
            </label>
            <label class="box8_r">
                <input type="checkbox" value="信息服务（新闻、股市、天气）" name="box8"/> <span>信息服务（新闻、股市、天气）</span>
            </label>
            <label class="box8_r">
                <input type="checkbox" value="智能家庭影音控制系统" name="box8"/> <span>智能家庭影音控制系统</span>
            </label>
            <label class="box8_r">
                <input type="checkbox" value="背景音乐系统" name="box8"/> <span>背景音乐系统</span>
            </label>
            <label class="box8_r">
                <input type="checkbox" value="其他" name="box8"/> <span>其他</span>
            </label>
            <div class="Ok"></div>
        </div>
    </div>
    <div class="content box9">
        <div class="you">9.您通过什么渠道了解到智能家居产品？[多选题]</div>
        <div class="box9_xuan">
            <label class="box9_r">
                <input type="checkbox" value="广告" name="box9"/> <span>广告</span>
            </label>
            <label class="box9_r">
                <input type="checkbox" value="报纸" name="box9"> <span>报纸</span>
            </label>
            <label class="box9_r">
                <input type="checkbox" value="互联网" name="box9"> <span>互联网</span>
            </label>
            <label class="box9_r">
                <input type="checkbox" value="其他" name="box9"/> <span>其他</span>
            </label>
            <div class="Ok"></div>
        </div>
    </div>
    <div class="content box10">
        <div class="you">10.您的家庭月收入是多少?</div>
        <div class="box10_xuan">
            <label class="box10_r">
                <input type="radio" value="5000元以下" name="box10"/> <span>5000元以下</span>
            </label>
            <label class="box10_r">
                <input type="radio" value="5001元-20000元" name="box10"/> <span>5001元-20000元</span>
            </label>
            <label class="box10_r">
                <input type="radio" value="20001-50000元" name="box10"/> <span>20001-50000元</span>
            </label>
            <label class="box10_r">
                <input type="radio" value="5万元及以上" name="box10"/> <span>5万元及以上</span>
            </label>
            <div class="Ok"></div>
        </div>
    </div>
    <div class="content box11">
        <div class="you">11.您认为一套智能家居系统的合理价位是多少？</div>
        <div class="box11_xuan">
            <label class="box11_r">
                <input type="radio" value="5000元以下" name="box11"/> <span>5000元以下</span>
            </label>
            <label class="box11_r">
                <input type="radio" value="5000元-10000元" name="box11"/> <span>5000元-10000元</span>
            </label>
            <label class="box11_r">
                <input type="radio" value="10000元-20000元" name="box11"/> <span>10000元-20000元</span>
            </label>
            <label class="box11_r">
                <input type="radio" value="2万元及以上" name="box11"/> <span>2万元及以上</span>
            </label>
            <div class="Ok"></div>
        </div>
    </div>
    <div class="content box12">
        <div class="you">12.您认为当今家用电器的操作性方便吗？</div>
        <div class="box12_xuan">
            <label class="box12_r">
                <input type="radio" value="一般" name="box12"/> <span>一般</span>
            </label>
            <label class="box12_r">
                <input type="radio" value="不行" name="box12"/> <span>不行</span>
            </label>
            <label class="box12_r">
                <input type="radio" value="很好" name="box12"/> <span>很好</span>
            </label>
            <label class="box12_r">
                <input type="radio" value="有待改进" name="box12"/> <span>有待改进</span>
            </label>
            <div class="Ok"></div>
        </div>
    </div>
    <div class="content box13">
        <div class="you">13.您的年龄:</div>
        <div class="box13_xuan">
            <label class="box13_r">
                <input type="radio" value="18岁~29岁" name="box13"/> <span>18岁~29岁</span>
            </label>
            <label class="box13_r">
                <input type="radio" value="30岁~39岁" name="box13"/> <span>30岁~39岁</span>
            </label>
            <label class="box13_r">
                <input type="radio" value="40岁~49岁" name="box13"/> <span>40岁~49岁</span>
            </label>
            <label class="box13_r">
                <input type="radio" value="50岁以上" name="box13"/> <span>50岁以上</span>
            </label>
        </div>
    </div>
    <div class="Next">
        <a href="javascript:;" class="Upper_a">上一个</a>
        <a href="javascript:;" class="Next_a">下一页</a>
    </div>
</div>
<div class="Ok_oder"></div>

<script src="{{ asset('/js/jquery-1.8.3.min.js') }}"></script>
<script src="{{ asset('/new/home/question/js/defusmarthome.js')}}"></script>
<script>
    var Mu = 0;
    var music = $("#bgMusic");
    $(".Music").click(function(){
        Mu++;
        if(Mu%2 == 0 ){
            music[0].play();
            $(".Music").removeClass("avtive");
        }else{
            music[0].pause();
            $(".Music").addClass("avtive");
        }
    });
</script>
</body>
</html>