@extends('heads')
@section('css')
	<link href="{{ asset('/home/lunpo/css/style.css') }}" rel="stylesheet" />
	<link href="{{ asset('/home/images/hfhx/common.css') }}" rel="stylesheet" />
<!-- <link href="{{ asset('home/images/images/common.css') }}" rel="stylesheet" type="text/css" /> -->
	
@endsection('css')
@section('content')
	<!-- *************** -->
	<div id="content">
		<div id="content_img_1">
			<div id="content_1">
				<div id="box">

	<ul id="pic_list">
		<li style="z-index:2;opacity:1;fliter:alpha(opacity=100);">
        <a href="#"><img width="750" height="430" src="{{ asset('/home/images/hfhx/2.png')}}" alt="" /></a></li>
		<li><a href="#"><img width="750" height="430" src="{{ asset('/home/images/hfhx/3.png')}}" alt="" /></a></li>
	</ul>
	
	<!-- <div class="mark"></div> -->

	<ul id="text_list">
		<li><h2 class="show"><a href="#"></a></h2></li>
		<li><h2></h2></li>
	</ul>
	
	<div id="ico_list">
		<ul>
			<li class="active"><a href="javascript:void(0)"><img width="64" height="40" src="{{ asset('/home/images/hfhx/2.png')}}" alt="" /></a></li>
			<li><a href="javascript:void(0)"><img width="64" height="40" src="{{ asset('/home/images/hfhx/3.png')}}" alt="" /></a></li>
		</ul>
	</div>
	
	<a style="display:none" href="javascript:void(0)" id="btn_prev" class="btn"></a>
	<a style="display:none" href="javascript:void(0)" id="btn_next" class="btn showBtn"></a>

				</div>
				<div id="content_1_2">
					<div id="content_1_2_1">
						<p id="p1">织金.织金万都铭城</p>
						<p id="p2">贵州-毕节</p>
					<div id="nve">
					
						<div id="nve_1" >商业区</div>		
						<div id="nve_2">低密度</div>		
						<div id="nve_3">改善盘</div>		
					
					</div>
					<div style="padding-top:20px;">
					<span style="color:#c6c6c6;font-size:13px;">楼盘均价</span>
					<span style="font-size:24px;color:red;font-weight:600">3800/m²</span>
					<span style="color:#c6c6c6;font-size:13px">(2017年参考价)</span>
					</div>
					</div>
					<div id="content_1_2_2">
					<div style="padding-top:20px">
						<span style="font-size:15px;color:#848484">开盘时间:&nbsp;<!-- 2016年6月18日 --></span>
					</div>
					<div style="padding-top:12px">
						<span style="font-size:15px;color:#848484">入住时间:&nbsp;<!-- 2017年 --></span>
					</div>
					<div style="padding-top:12px">
						<span style="font-size:15px;color:#848484">物业类型:&nbsp;商铺 住宅</span>
					</div>
					<div style="padding-top:12px;position: relative;">
						<span style="font-size:15px;color:#848484">楼盘地址:&nbsp;织金县金北大道与环城路交叉口</span>
						<!-- <div style="position: absolute;right:25px;bottom:6px" class="pin icon"></div> -->
					</div>
	
					
						
					</div>
					<div id="content_1_2_3">
						<div id="dian1">
							<img style="margin-top:5px;margin-left:6px" src="{{ asset('/home/images/dian.gif') }}" alt="">
						</div>
						<div id="dian2">
							<span style="font-size:16px;color:red;font-weight:600">400-188-6585&nbsp;&nbsp;咨询楼盘信息</span>
						</div>
					</div>
				</div>

			</div>
		</div>

	</div>
		<div id="content_6" style="margin-top:65px">
			<div id="content_6_1" >
				<div id="content_2_1_1" style="height:50px">
					<div id="content_2_1_1_1">
						<div id="content_2_1_1_1_1">
							<div style="width:90px;height:20px;margin-top:10px">
							<span style="font-size:19px;font-weight:600;color:#4b4b4b"> &nbsp;楼盘动态</span>	
							</div>
						</div>
						<div id="content_2_1_1_1_2">
							<div style="width:120px;height:20px;margin-top:11px">
							<span style="font-size:18px;font-weight:550;color:#747474"> &nbsp;Real estate</span>			
							</div>
						</div>
					</div>
				</div>
				
				<div id="content_6_1_1">
<div class="general feature_tour">
  <div class="middle">
        <div class="wrapper">

            <div class="tab">
            <a href="#" class="current">项目详情</a>
            <a href="#">万都超市</a>
            <a href="#">产品品鉴</a>
            </div>
                <div class="mask">
                    <div class="maskCon">
                
                        <div id="con1" class="innerCon">
                        	<ul style="margin:0 auto;width:706px">
                        		<a href="{{ url('/propertieshfhx/details/15') }}"><li><span class="bre">项目介绍</span></li></a>
                        		<a href="{{ url('/propertieshfhx/details/12') }}"><li><span class="bree">部分入<br>驻商家</span></li></a>
                        		<a href="{{ url('/propertieshfhx/details/18') }}"><li><span class="bre">运营管理</span></li></a>
                        		<a href="{{ url('/propertieshfhx/details/20') }}"><li><span class="bre">集团实力</span></li></a>
                        		<a href="{{ url('/propertieshfhx/details/21') }}"><li><span class="bre">工程进度</span></li></a>
                        	</ul>
                        </div>
                    
                        <div id="con2" class="innerCon">
                        	<ul style="margin:0 auto;width:568px">
                        		<a href="{{ url('/propertieshfhx/details/25') }}"><li><span class="bre">盛大开业</span></li></a>
                        		<a href="{{ url('/propertieshfhx/details/26') }}"><li><span class="bre">超市简介</span></li></a>
                        		<a href="{{ url('/propertieshfhx/details/28') }}"><li><span class="bree">喜事酒<br>喜事价</span></li></a>
                        		<a href="{{ url('/propertieshfhx/details/29') }}"><li><span class="bre">外租区招商</span></li></a>
                        	</ul>
                        </div>
                    
                        <div id="con3" class="innerCon">
                        	<ul style="margin:0 auto;width:568px">
                        		<a href="{{ url('/propertieshfhx/details/31') }}"><li><span class="bre">五星级住宅</span></li></a>
                        		<a href="{{ url('/propertieshfhx/details/32') }}"><li><span class="bre">潮流小金库</span></li></a>
                        		<a href="{{ url('/propertieshfhx/details/35') }}"><li><span class="bre">复式小公寓</span></li></a>
                        		<a href="{{ url('/propertieshfhx/details/36') }}"><li><span class="bre">买铺抽汽车</span></li></a>
                        	</ul>
                        </div>
                    
                    
                    
                    </div>
                </div>
        </div>
  </div>
</div>
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-3174937-15");
pageTracker._trackPageview();
} catch(err) {}
</script>
				</div>
			
			</div>
			</div>

		<div id="content_7" style="margin-top:35px;">
			<div id="content_7_1">
				<div id="content_2_1_1" style="height:50px">
					<div id="content_2_1_1_1">
						<div id="content_2_1_1_1_1">
							<div style="width:90px;height:20px;margin-top:10px;">
							<span style="font-size:19px;font-weight:600;color:#4b4b4b"> &nbsp;新闻动态</span>	
							</div>
						</div>
						<div id="content_2_1_1_1_2">
							<div style="margin-top:11px">
							<span style="font-size:18px;font-weight:550;color:#747474"> &nbsp;estate dynamic</span>			
							</div>
						</div>
						<div id="content_2_1_1_1_3">
							<div style="width:115px;height:20px;margin-top:11px">
							<a href="{{ url('/propertieshfhx/newslist') }}"><span style="font-size:15px;font-weight:500;color:#747474"> &nbsp;查看更多新闻</span></a>			
							</div>
						</div>
					</div>
				</div>

				<div id="content_7_1_2">
					<ul>
						@if( !empty($news) )
						@foreach( $news as $k => $v )
						<li><span>{{ $v->pidname }}</span><a href="{{ url('/propertieshfhx/newslist/play/')}}/{{ $v->id }}"><title>{{ $v->title }}</title></a></li>
						@endforeach
						@endif
					</ul>
				</div>
			</div>
		</div>

		<div id="content_5" style="margin-top:35px">
			<div id="content_5_1" >
				<div id="content_2_1_1">
					<div id="content_2_1_1_1">
						<div id="content_2_1_1_1_1">
							<div style="width:90px;height:20px;margin-top:10px;">
							<span style="font-size:19px;font-weight:600;color:#4b4b4b"> &nbsp;预览户型</span>	
							</div>
						</div>
						<div id="content_2_1_1_1_2">
							<div style="width:120px;height:20px;margin-top:11px">
							<span style="font-size:18px;font-weight:550;color:#747474"> &nbsp;Real estate</span>			
							</div>
						</div>
					</div>
				</div>

				<div id="content_5_1_2">
					<ul>
						<li id="content_5li1"><img class="em" src="{{ asset('/home/images/hfhx/a.png') }}" alt="" index="1"><em class="em" index="1"><span>点击360度预览</span></em></li>
						<li id="content_5li2"><img class="em" src="{{ asset('/home/images/hfhx/b.png') }}" alt="" index="2"><em class="em" index="2"><span>点击360度预览</span></em></li>
						<li id="content_5li2"><img class="em" src="{{ asset('/home/images/hfhx/c.jpg') }}" alt="" index="3"><em class="em" index="3"><span>点击360度预览</span></em></li>
						<!-- <li id="content_5li2"><img src="" alt=""><em index="4"><span>点击360度预览</span></em></li> -->
					</ul>
				</div>
			</div>
			</div>
			<div id="divv" style="margin:0 auto;width:1200px;height:750px;display:none;">
					<div class="ifhead" style="margin:0 auto;width:1200px;height:50px;text-align: center;line-height:50px;font-size:20px;color:#555;font-weight:600">万都铭城A户型</div>
					<iframe id="ifrPage" index="1" name="ifrPage" src="http://720yun.com/t/185j5denun1?pano_id=7140817" style="margin:0 auto;width:1200px;height:700px;border:none;border:1px solid #666"></iframe>
			</div>
			<script>
			$(function(){
				ready();
			})
			$('#content_5_1_2 > ul > li > em').hover(function(){
				$(this).css('border-bottom','1px solid #888');
			},function(){
				$(this).css('border-bottom','');
				
			});
			$('.em').on('click',function(){
				var index = $(this).attr('index');
				var ind = $('#ifrPage').attr('index');
				if( index == ind)
				{
					$('#divv').slideToggle(300);
					return false;
				}
				if( index == 4 )
				{	
					alert('暂未开通!');
					return false ;
				}
				var str;
				if( index == 1 )
				{	
					$('.ifhead').html('万都铭城A户型');
					str = 'http://720yun.com/t/185j5denun1?pano_id=7140817';
				}
				if( index == 2 )
				{
					$('.ifhead').html('万都铭城B户型');
					str = 'http://720yun.com/t/901j5d4Ouk1?pano_id=7266428';
				}
				if( index == 3 )
				{
					$('.ifhead').html('万都铭城C户型');
					str = 'http://vr.justeasy.cn/view/982727.html';
				}
				if( $('#divv').css('display') == 'none' )
				{
					$('#divv').slideToggle(300);
				}
				$('#ifrPage').attr('src',str);
				$('#ifrPage').attr('index',index);
			})
			</script>
<!-- ******************************************************************************* -->
			<div id="content_2_1">
				<div id="content_2_1_1">
					<div id="content_2_1_1_1">
						<div id="content_2_1_1_1_1">
							<div style="width:90px;height:20px;margin-top:10px">
							<span style="font-size:19px;font-weight:600;color:#4b4b4b"> &nbsp;楼盘户型</span>	
							</div>
						</div>
						<div id="content_2_1_1_1_2">
							<div style="width:120px;height:20px;margin-top:11px">
							<span style="font-size:18px;font-weight:550;color:#747474"> &nbsp;Real estate</span>			
							</div>
						</div>
					</div>
				</div>
				<div id="content_2_1_2">
					<div id="content_2_1_2_1">
						<div index="1"  class="content1"  id="tu_1">
							<img style="width:100%;height:100%" src="{{ asset('home/images/hfhx/a_1.jpg') }}" alt="">
						</div>
						<div index="1"  class="content1"  id="tu_2">
							<span style="font-size:18px;font-weight:500;color:#f6f6f6">A户型</span>
						</div>
						<div id="tu_3">
							<div id="tu_3_1">
								<span style="font-size:16px;font-weight:500;color:#666">三室两厅两卫</span>
								
							</div>
							<div id="tu_3_2">
								<span style="font-size:16px;font-weight:500;color:#666">126.6㎡</span>
								
							</div>
						</div>
						<div id="tu_4">
							<span style="font-size:15px;color:#f6f6f6;font-weight:500">待售</span>
						</div>
					</div>
					<div  id="content_2_1_2_2">
						<div index="2" class="content1" id="tu_1">
							<img style="width:100%;height:100%" src="{{ asset('home/images/hfhx/b_1.jpg') }}" alt="">			
						</div>
					    <div index="2" class="content1" id="tu_2">
							<span style="font-size:18px;font-weight:500;color:#f6f6f6">B户型</span>
						</div>
						<div id="tu_3">
							<div id="tu_3_1">
								<span style="font-size:16px;font-weight:500;color:#666">三室两厅两卫</span>
							</div>
							<div id="tu_3_2">
								<span style="font-size:16px;font-weight:500;color:#666">102.2㎡</span>
							</div>
						</div>
						<div id="tu_4">
							<span style="font-size:15px;color:#f6f6f6;font-weight:500">待售</span>
						</div>

					</div>
					<div  id="content_2_1_2_3">
						<div index="3" class="content1" id="tu_1">
							<img style="width:100%;height:100%" src="{{ asset('home/images/hfhx/c_1.jpg') }}" alt="">
						</div>
						<div index="3" class="content1" id="tu_2_1">
							<span style="font-size:18px;font-weight:500;color:#f6f6f6">C户型</span>
						</div>
						<div id="tu_3">
							<div id="tu_3_1">
								<span style="font-size:16px;font-weight:500;color:#666">2室1厅1卫</span>
								
							</div>
							<div id="tu_3_2">
								<span style="font-size:16px;font-weight:500;color:#666">86.55㎡</span>
								
							</div>
						</div>	
						<div id="tu_4">
							<span style="font-size:15px;color:#f6f6f6;font-weight:500">待售</span>
						</div>

					</div>
				
					
				
				
				</div>
			</div>
		<div id="xuan">
			<div class="content_1" id="content_2_2">
				<div id="content_2_1_1">
					<div id="content_2_1_1_1">
						<div id="content_2_1_1_1_1">
							<div style="width:87px;height:20px;margin-top:10px">
							<span style="font-size:19px;font-weight:600;color:#4b4b4b"> &nbsp;户型详情</span>	
							</div>
						</div>
						<div id="content_2_1_1_1_2">
							<div style="width:120px;height:20px;margin-top:11px">
							<span style="font-size:18px;font-weight:550;color:#747474"> &nbsp;Unit details</span>			
							</div>
						</div>
					</div>
				</div>
				<div id="content_2_3">
					<img style="width:100%;height:100%" srcc="{{ asset('./home/images/hfhx/a_2.jpg') }}" src="{{ asset('./home/images/hfhx/a_2.jpg') }}" alt="">
				</div>
				<div id="content_2_4">
					<div id="xiang_1">
						<div id="xiang_1_1">
							<span style="font-size:24px;font-weight:600;color:#4c4c4c">织金万都铭城A户型</span>
						</div>
						<div id="xiang_1_2">
							<span style="font-size:16px;font-weight:500;color:#4c4c4c">居住情况:三室两厅两卫</span>
						</div>
						<div id="xiang_1_3">
							<span style="font-size:16px;font-weight:500;color:#4c4c4c">建筑面积: 126.6㎡</span>
						</div>
						<div id="xiang_1_4">
							<span style="font-size:16px;background-color:red;color:#f6f6f6">待售</span>
							<span style="margin-left:5px;font-size:16px;background-color:#DF9FA0;color:#f6f6f6">高入户</span>
							<span style="margin-left:5px;font-size:16px;background-color:#D4B97E;color:#f6f6f6">采光好</span>
							<span style="margin-left:5px;font-size:16px;background-color:#9AC78C;color:#f6f6f6">精装</span>
						</div>
					</div>
					<div id="xiang_2">
						<div style="padding-top:18px" id="xiang_2_1"> <span style="font-size:16px;font-weight:500;color:#4c4c4c">参考均价：</span> </div>
						<div style="margin-top:5px" id="xiang_2_2"> <span style="font-size:16px;font-weight:500;color:#4c4c4c">参考总价：</span> </div>
					</div>
					<div id="xiang_3">
						<div id="xiang_3_1">
							<span style="font-size:16px;font-weight:500;color:#4c4c4c">户型分布：</span>
						</div>
						<div id="xiang_3_2">
							<span style="font-size:16px;font-weight:500;color:#4c4c4c">户型解读：</span>
						</div>
						<div id="xiang_3_3">
						<div>
							<span style="font-size:16px;font-weight:500;color:#4c4c4c">1 、两梯田户 ，三面采光，南北通透，享受更多阳光清</span><br>
							<span style="font-size:16px;font-weight:500;color:#4c4c4c">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;风；</span><br>
					
						</div>
						<div style="padding-top:10px;">
							<span style="font-size:16px;font-weight:500;color:#4c4c4c">2 、功能分区合理，实现动静，干湿，主次分区 ；</span><br>
							
						</div>
						<div style="padding-top:10px;">
							<span style="font-size:16px;font-weight:500;color:#4c4c4c">3 、客厅带景观花园阳台，彰显写意人生 ；</span><br>
							
						</div>						
						<div style="padding-top:10px;">
							<span style="font-size:16px;font-weight:500;color:#4c4c4c">4 、卧室带阳台设计，阳光景观，尽显人性化设计 ；</span><br>
							
						</div>
						<div style="padding-top:10px;">
							<span style="font-size:16px;font-weight:500;color:#4c4c4c">5 、奢适套房设计！私享尊贵奢华；</span><br>
							
						</div>								
						</div>
					</div>
				</div>
			</div>
			
			<div style="display:none" class="content_2" id="content_2_2">
				<div id="content_2_1_1">
					<div id="content_2_1_1_1">
						<div id="content_2_1_1_1_1">
							<div style="width:87px;height:20px;margin-top:10px">
							<span style="font-size:19px;font-weight:600;color:#4b4b4b"> &nbsp;户型详情</span>	
							</div>
						</div>
						<div id="content_2_1_1_1_2">
							<div style="width:120px;height:20px;margin-top:11px">
							<span style="font-size:18px;font-weight:550;color:#747474"> &nbsp;Unit details</span>			
							</div>
						</div>
					</div>
				</div>
				<div id="content_2_3">
					<img style="width:100%;height:100%" srcc="{{ asset('./home/images/hfhx/b_2.jpg') }}" alt="">
				</div>
				<div id="content_2_4">
					<div id="xiang_1">
						<div id="xiang_1_1">
							<span style="font-size:24px;font-weight:600;color:#4c4c4c">织金万都铭城B户型</span>
						</div>
						<div id="xiang_1_2">
							<span style="font-size:16px;font-weight:500;color:#4c4c4c">居住情况:三室两厅两卫</span>
						</div>
						<div id="xiang_1_3">
							<span style="font-size:16px;font-weight:500;color:#4c4c4c">建筑面积:102.2㎡</span>
						</div>
						<div id="xiang_1_4">
							<span style="font-size:16px;background-color:red;color:#f6f6f6">待售</span>
							<span style="margin-left:5px;font-size:16px;background-color:#DF9FA0;color:#f6f6f6">高入户</span>
							<span style="margin-left:5px;font-size:16px;background-color:#D4B97E;color:#f6f6f6">采光好</span>
							<span style="margin-left:5px;font-size:16px;background-color:#9AC78C;color:#f6f6f6">精装</span>
						</div>
					</div>
					<div id="xiang_2">
						<div style="padding-top:18px" id="xiang_2_1"> <span style="font-size:16px;font-weight:500;color:#4c4c4c">参考均价：</span> </div>
						<div style="margin-top:5px" id="xiang_2_2"> <span style="font-size:16px;font-weight:500;color:#4c4c4c">参考总价：</span> </div>
					</div>
					<div id="xiang_3">
						<div id="xiang_3_1">
							<span style="font-size:16px;font-weight:500;color:#4c4c4c">户型分布：</span>
						</div>
						<div id="xiang_3_2">
							<span style="font-size:16px;font-weight:500;color:#4c4c4c">户型解读：</span>
						</div>
						<div id="xiang_3_3">
						<div>
							<span style="font-size:16px;font-weight:500;color:#4c4c4c">1 、户型方正 ，功能分区合理 ，实现动铮 、 干湿、 主</span><br>
							<span style="font-size:16px;font-weight:500;color:#4c4c4c">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;次分区；</span><br>
							
						</div>
						<div style="padding-top:10px;">
							<span style="font-size:16px;font-weight:500;color:#4c4c4c">2 、三居设计户型精巧布局 ，多向采光 ，享受更多阳光</span><br>
							<span style="font-size:16px;font-weight:500;color:#4c4c4c">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;清风；</span><br>
							
						</div>
						<div style="padding-top:10px;">
							<span style="font-size:16px;font-weight:500;color:#4c4c4c">3 、客厅带观景阳台 ，从小区园林到私家小花园阳台</span><br>
							<span style="font-size:16px;font-weight:500;color:#4c4c4c">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;，精心营造家的温馨 ；</span><br>
							
						</div>						
						<div style="padding-top:10px;">
							<span style="font-size:16px;font-weight:500;color:#4c4c4c">4 、客厅餐厅通体设计 ，进门即见大户风范；</span><br>
						</div>
						<div style="padding-top:10px;">
							<span style="font-size:16px;font-weight:500;color:#4c4c4c">5 、卧室 、客厅朝南 ，让清新自然迎面而来 ，惬意生活 </span><br>
							<span style="font-size:16px;font-weight:500;color:#4c4c4c">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;，了然于胸。</span><br>
						</div>							
						</div>
					</div>
				</div>
			</div>
			<div style="display:none" class="content_3" id="content_2_2">
				<div id="content_2_1_1">
					<div id="content_2_1_1_1">
						<div id="content_2_1_1_1_1">
							<div style="width:87px;height:20px;margin-top:10px">
							<span style="font-size:19px;font-weight:600;color:#4b4b4b"> &nbsp;户型详情</span>	
							</div>
						</div>
						<div id="content_2_1_1_1_2">
							<div style="width:120px;height:20px;margin-top:11px">
							<span style="font-size:18px;font-weight:550;color:#747474"> &nbsp;Unit details</span>			
							</div>
						</div>
					</div>
				</div>
				<div id="content_2_3">
					<img style="width:100%;height:100%" srcc="{{ asset('./home/images/hfhx/c_2.jpg') }}" alt="">
				</div>
				<div id="content_2_4">
					<div id="xiang_1">
						<div id="xiang_1_1">
							<span style="font-size:24px;font-weight:600;color:#4c4c4c">织金万都铭城C户型</span>
						</div>
						<div id="xiang_1_2">
							<span style="font-size:16px;font-weight:500;color:#4c4c4c">居住情况:2室1厅1卫</span>
						</div>
						<div id="xiang_1_3">
							<span style="font-size:16px;font-weight:500;color:#4c4c4c">建筑面积: 86.55㎡</span>
						</div>
						<div id="xiang_1_4">
							<span style="font-size:16px;background-color:red;color:#f6f6f6">待售</span>
							<span style="margin-left:5px;font-size:16px;background-color:#C0AAD9;color:#f6f6f6">平层</span>
							<span style="margin-left:5px;font-size:16px;background-color:#DF9FA0;color:#f6f6f6">高入户</span>
							<span style="margin-left:5px;font-size:16px;background-color:#D4B97E;color:#f6f6f6">采光好</span>
							<span style="margin-left:5px;font-size:16px;background-color:#9AC78C;color:#f6f6f6">精装</span>
						</div>
					</div>
					<div id="xiang_2">
						<div style="padding-top:18px" id="xiang_2_1"> <span style="font-size:16px;font-weight:500;color:#4c4c4c">参考均价：</span> </div>
						<div style="margin-top:5px" id="xiang_2_2"> <span style="font-size:16px;font-weight:500;color:#4c4c4c">参考总价：</span> </div>
					</div>
					<div id="xiang_3">
						<div id="xiang_3_1">
							<span style="font-size:16px;font-weight:500;color:#4c4c4c">户型分布：</span>
						</div>
						<div id="xiang_3_2">
							<span style="font-size:16px;font-weight:500;color:#4c4c4c">户型解读：</span>
						</div>
						<div id="xiang_3_3">
						<div>
							<span style="font-size:16px;font-weight:500;color:#4c4c4c">1、户型格局精妙 ，南北通透 ，两室朝阳，奢享阳光清风；</span><br>
							
						</div>
						<div style="padding-top:10px;">
							<span style="font-size:16px;font-weight:500;color:#4c4c4c">2、动静分区明确 ，干湿分离 ，营造舒适生活空间；</span><br>
							
						</div>
						<div style="padding-top:10px;">
							<span style="font-size:16px;font-weight:500;color:#4c4c4c">3、客厅餐厅一脉贯通 ，居室更敞亮 ，更通透 ，彰显主人</span><br>
							<span style="font-size:16px;font-weight:500;color:#4c4c4c">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;气派；</span><br>
							
						</div>						
						<div style="padding-top:10px;">
							<span style="font-size:16px;font-weight:500;color:#4c4c4c">4、书房静居一隅 ， 打造书香满溢空司；</span><br> 
						</div>	
						<div style="padding-top:10px;">
							<span style="font-size:16px;font-weight:500;color:#4c4c4c">5、卧室配备观景阳台，阳光满溢，清风常伴身侧；</span><br>
						</div>							
						</div>
					</div>
				</div>
			</div>
			
		
		
		</div>
		</div>


	<script src="{{ asset('home/images/dfhx/common.js') }}"></script>
<script>
	function ready(){
	
	$(".menu a").each(function(){
		$(this).html("<b class='b1'>&nbsp;</b><b class='b2'>"+$(this).html()+"</b><b class='b3'>&nbsp;</b>");
	});
	
	
	$(".checkBox").toggle(
		function(){
			$(this).css("background-position","bottom");
			$(this).attr("rel","checked");
		},
		function(){
			$(this).css("background-position","top");
			$(this).attr("rel","");
		}
	);
	
	$("[name=skypeName]").focus(function(){
		if($(this).val() == "Skype Name") $(this).val("");
	});
	
	$("[name=skypeName]").blur(function(){
		if($(this).val() == "") $(this).val("Skype Name");
	});
	
	
	
	var conInnerConWidth = $(".innerCon").width();
	var conSize = $(".innerCon").size();
	var tabHeight = $(".tab a").height();
	if(!window.cur) window.cur=0;
	
	$(".tab a").click(function(){
		var index = $(".tab a").index(this);
	   slide(conInnerConWidth, tabHeight, index);
		return false;
	});
	
	$(".prev").click(function(){
	   if(window.cur>0) slide(conInnerConWidth, tabHeight, window.cur-1);
		return false;
	});
	
	$(".next").click(function(){
	   if(window.cur<conSize-1) slide(conInnerConWidth, tabHeight, window.cur+1);
		return false;
	});
	
	$(".faq ul a").click(function(){
		var index = $(".faq ul a").index($(this));
		$('html, body').animate({scrollTop: $(".details h1").eq(index).offset().top-15}, 1500);
		return false;
	});
	
	
	$("a[href=#]").live('click', function(event){
		return false;
	});
	
	$(".top a").click(function(){
		$('html, body').animate({scrollTop:0}, 1500);
	});
	
	$("[name=contactForm] .submit").click(function(){$("[name=contactForm]").submit();});
	
	$("[name=contactForm]").submit(function(){
		window.error=0;
		check("contactName","str",3,100);
		check("contactEmail","email",3,55);
		check("contactMsg","str",5,500);
		if(window.error==0){
			$.ajax({type:"POST",url:"ajax.php",data:"act=contact&f1="+$("[name=contactName]").val()+"&f2="+$("[name=contactEmail]").val()+"&f3="+$("[name=contactMsg]").val(),success: function(msg){$("input,textarea").val("");$("[name=contactForm]").html("Your comment is successfully sent");}});
		}
		return false;
	});
	
	$(".user_guide .w40").each(function(i){
		$(this).css("background-position","0 -"+(i-1)*230+"px");
	});
	
	$("[name=getZapleeForm] .submit").click(function(){
		$(this).parent().submit();
	});
	
	$("[name=getZapleeForm]").submit(function(){
		if(!$("[name=skypeName]").val() || $("[name=skypeName]").val() == "Skype Name"){alert("Please enter your Skype Name");$("[name=skypeName]").focus();return false;}
		if(!$("a.checkBox").attr("rel")){alert("Please read Zaplee Privacy/Terms & Conditions and check the box below first");$("a.checkBox").focus();return false;}
		$.ajax({type:"POST",url:"/ajax.php",data:"act=downloadStandart&f1="+$("[name=skypeName]").val(),success: function(msg){window.location = "/app/zaplee.msi";}});
		return false;
	});
	
	$(".downloadHostedForm").submit(function(){
		window.error=0;
		check("downloadFirstName","str",3,100);
		check("downloadLastName","str",3,100);
		check("downloadSkypeId","str",3,55);
		check("downloadEmail","email",3,55);
		if(window.error==0){
			$.ajax({type:"POST",url:"/ajax.php",data:"act=downloadHosted&f1="+$("[name=downloadFirstName]").val()+"&f2="+$("[name=downloadLastName]").val()+"&f3="+$("[name=downloadSkypeId]").val()+"&f4="+$("[name=downloadEmail]").val(),success: function(msg){$(".downloadHostedForm>*").val("");$(".downloadHostedForm").html("Thanks "+$("[name=downloadFirstName]").val()+". We will contact you soon.");}});
		}
		return false;
	});
	
	$(".signUp_hosted").click(function(){
		$("#overlay").show();
	});
	
	$("#closeBox").click(function(){
		$("#overlay").hide();
	});
	
	$(".feature_tour .tab, .feature_tour .nav").addClass("vv");
}

//////////////////////////////////////
function slide(conInnerConWidth, tabHeight, index){
	$(".tab a").removeClass("current");
	$(".tab a").eq(index).addClass("current");
	$(".tab").css("background-position","0 -"+index*tabHeight+"px");
	$(".maskCon").animate({marginLeft:-index*conInnerConWidth+"px"});
	window.cur = index;
}

function scrl(id){
	$('html, body').animate({scrollTop: $("#"+id).offset().top-15}, 1500);
}

function check(fieldName,type,minChar,maxChar,fieldName2,customMsg){
	if(window.error==0){
		var field = $("[name="+fieldName+"]");
		var field2 = $("[name="+fieldName2+"]");
		if(field.val().length<minChar || field.val().length>maxChar){
			window.error=1;
		}
		else if(type=="num" && isNaN(field.val().split(" ").join("").split("-").join("").split("+").join(""))){
			window.error=1;
		}
		else if(type=="email" && (field.val().length<7 || field.val().indexOf("@")<1 || (field.val().indexOf("@")+2)>field.val().lastIndexOf(".") || field.val().lastIndexOf(".")>(field.val().length-2))){
			window.error=1;
		}
		else if(type=="ifSame" && (field.val() != field2.val())){
			window.error=1;
		}
		else if(type=="checkbox"){
			if(!$("['name="+field+"'][checked]").val()) window.error=1;
		}
		if(window.error==1){
			var label =field.prev().html().split("*").join("").split(" :").join("");
			if(customMsg) var msg=customMsg; else var msg="Please check '"+label+"' field!";
			alert(msg);
			field.focus();
		}
	}
}

function focusToSkypename(){
	$("[name=skypeName]").focus();
}


</script>
<script type="text/javascript" src="{{ asset('/home/lunpo/js/startMove.js') }}"></script>

@endsection('content')