@extends('heads')
	<script src="{{ asset('/js/jquery-1.8.3.min.js') }}"></script>
	<link href="{{ asset('/home/lunpo/css/style.css') }}" rel="stylesheet" />
<script type="text/javascript" src="{{ asset('/home/lunpo/js/startMove.js') }}"></script>
@section('css')
	<link href="{{ asset('/home/images/hfhx/common.css') }}" rel="stylesheet" />

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
	<!-- 	<div id="content_6" style="margin-top:65px">
			<div id="content_6_1" >
				<div id="content_2_1_1">
					<div id="content_2_1_1_1">
						<div id="content_2_1_1_1_1">
							<div style="width:90px;height:20px;margin-top:10px">
							<span style="font-size:19px;font-weight:600;color:#4b4b4b"> &nbsp;户型动态</span>	
							</div>
						</div>
						<div id="content_2_1_1_1_2">
							<div style="width:120px;height:20px;margin-top:11px">
							<span style="font-size:18px;font-weight:550;color:#747474"> &nbsp;Real estate</span>			
							</div>
						</div>
					</div>
				</div>

			
			</div>
			</div> -->

		<div id="content_5" style="margin-top:65px">
			<div id="content_5_1" >
				<div id="content_2_1_1">
					<div id="content_2_1_1_1">
						<div id="content_2_1_1_1_1">
							<div style="width:90px;height:20px;margin-top:10px">
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

@endsection('content')