@extends('heads')
	<script src="{{ asset('/js/jquery-1.8.3.min.js') }}"></script>
	<link href="{{ asset('/home/lunpo/css/style.css') }}" rel="stylesheet" />
<script type="text/javascript" src="{{ asset('/home/lunpo/js/startMove.js') }}"></script>

@section('css')
	<link href="{{ asset('/home/images/zshx/common.css') }}" rel="stylesheet" />

@endsection('css')

@section('content')
	<!-- *************** -->
	<div id="content">
		<div id="content_img_1">
			<div id="content_1">
				<div id="box">

	<ul id="pic_list">
		<li style="z-index:2;opacity:1;fliter:alpha(opacity=100);">
        <a href="#"><img width="750" height="430" src="{{ asset('/home/images/zshx/pic_1.jpg')}}" alt="" /></a></li>
		<li><a href="#"><img width="750" height="430" src="{{ asset('/home/images/zshx/pic_2.jpg')}}" alt="" /></a></li>
		<li><a href="#"><img width="750" height="430" src="{{ asset('/home/images/zshx/pic_4.jpg')}}" alt="" /></a></li>
		<li><a href="#"><img width="750" height="430" src="{{ asset('/home/images/zshx/pic_5.jpg')}}" alt="" /></a></li>
		<li><a href="#"><img width="750" height="430" src="{{ asset('/home/images/zshx/pic_6.jpg')}}" alt="" /></a></li>
		<li><a href="#"><img width="750" height="430" src="{{ asset('/home/images/zshx/pic_7.jpg')}}" alt="" /></a></li>
		<li><a href="#"><img width="750" height="430" src="{{ asset('/home/images/zshx/pic_8.jpg')}}" alt="" /></a></li>
		<li><a href="#"><img width="750" height="430" src="{{ asset('/home/images/zshx/pic_9.jpg')}}" alt="" /></a></li>
	</ul>
	
	<!-- <div class="mark"></div> -->

	<ul id="text_list">
		<li><h2 class="show"><a href="#"></a></h2></li>
		<li><h2></h2></li>
		<li><h2></h2></li>
		<li><h2></h2></li>
		<li><h2></h2></li>
        <li><h2></h2></li>
        <li><h2></h2></li>
        <li><h2></h2></li>
	</ul>
	
	<div id="ico_list">
		<ul>
			<li class="active"><a href="javascript:void(0)"><img width="64" height="40" src="{{ asset('/home/images/zshx/pic_1.jpg')}}" alt="" /></a></li>
			<li><a href="javascript:void(0)"><img width="64" height="40" src="{{ asset('/home/images/zshx/pic_2.jpg')}}" alt="" /></a></li>
			<li><a href="javascript:void(0)"><img width="64" height="40" src="{{ asset('/home/images/zshx/pic_4.jpg')}}" alt="" /></a></li>
			<li><a href="javascript:void(0)"><img width="64" height="40" src="{{ asset('/home/images/zshx/pic_5.jpg')}}" alt="" /></a></li>
			<li><a href="javascript:void(0)"><img width="64" height="40" src="{{ asset('/home/images/zshx/pic_6.jpg')}}" alt="" /></a></li>
			<li><a href="javascript:void(0)"><img width="64" height="40" src="{{ asset('/home/images/zshx/pic_7.jpg')}}" alt="" /></a></li>
			<li><a href="javascript:void(0)"><img width="62" height="34" src="{{ asset('/home/images/zshx/pic_8.jpg')}}" alt="" /></a></li>
			<li><a href="javascript:void(0)"><img width="64" height="40" src="{{ asset('/home/images/zshx/pic_9.jpg')}}" alt="" /></a></li>
		</ul>
	</div>
	
	<a style="display:none" href="javascript:void(0)" id="btn_prev" class="btn"></a>
	<a style="display:none" href="javascript:void(0)" id="btn_next" class="btn showBtn"></a>

				</div>
				<div id="content_1_2">
					<div id="content_1_2_1">
						<p id="p1">浙商.临港新天地</p>
						<p id="p2">周边·南岸</p>
					<div id="nve">
					
						<div id="nve_1" > 地段好 </div>		
						<div id="nve_2">交通便利</div>		
						<div id="nve_3">商业区</div>		
					
					</div>
					<div style="padding-top:20px;">
					<span style="color:#c6c6c6;font-size:13px;">楼盘均价</span>
					<span style="font-size:24px;color:red;font-weight:600">9900/m²</span>
					<span style="color:#c6c6c6;font-size:13px">(2015年参考价)</span>
					</div>
					</div>
					<div id="content_1_2_2">
					<div style="padding-top:20px">
						<span style="font-size:16px;color:#848484">开盘时间:&nbsp;2015年2月7日</span>
					</div>
					<div style="padding-top:16px">
						<span style="font-size:15px;color:#848484">入住时间:&nbsp;2017年7月1日</span>
					</div>
					<div style="padding-top:16px">
						<span style="font-size:15px;color:#848484">物业类型:&nbsp;建筑综合体 写字楼...</span>
					</div>
					<div style="padding-top:16px">
						<span style="font-size:15px;color:#848484">楼盘地址:&nbsp;宜宾市临港经济开发区护国</span>
					</div>
					<div style="padding-top:5px;position:relative">
						<span style="font-size:16px;color:#848484">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;路与长翠路交叉口</span>
						<!-- <a href=""><div style="position:absolute;left:208px;bottom:6px " class="pin icon"></div></a> -->
					
					
					</div>
					
						
					</div>
					<div id="content_1_2_3">
						<div id="dian1">
							<img style="margin-top:5px;margin-left:6px" src="{{ asset('/home/images/dian.gif') }}" alt="">
						</div>
						<div id="dian2">
							<span style="font-size:16px;color:red;font-weight:600">0831-8209999&nbsp;&nbsp;咨询楼盘信息</span>
						</div>
					</div>
				</div>

			</div>
		</div>

	</div>
		<div id="content_2">
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
					<div  id="content_2_1_2_1">
						<div index="1"  class="content1" id="tu_1">
							<img style="width:100%;height:100%" src="{{ asset('home/images/zshx/1.png') }}" alt="">
						</div>
						<div index="1"  class="content1" id="tu_2">
							<span style="font-size:18px;font-weight:500;color:#f6f6f6">A户型</span>
						</div>
						<div id="tu_3">
							<div id="tu_3_1">
								<span style="font-size:16px;font-weight:500;color:#666">一房一厅</span>
								
							</div>
							<div id="tu_3_2">
								<span style="font-size:16px;font-weight:500;color:#666">62.0㎡</span>
								
							</div>
						</div>
						<div id="tu_4">
							<span style="font-size:15px;color:#f6f6f6;font-weight:500">待售</span>
						</div>
					</div>
					<div  id="content_2_1_2_2">
						<div index="2" class="content1" id="tu_1">
							<img style="width:100%;height:100%" src="{{ asset('home/images/zshx/2.png') }}" alt="">			
						</div>
					    <div index="2" class="content1" id="tu_2">
							<span style="font-size:18px;font-weight:500;color:#f6f6f6">B户型</span>
						</div>
						<div id="tu_3">
							<div id="tu_3_1">
								<span style="font-size:16px;font-weight:500;color:#666">一房一厅</span>
							</div>
							<div id="tu_3_2">
								<span style="font-size:16px;font-weight:500;color:#666">51.0㎡</span>
							</div>
						</div>
						<div id="tu_4">
							<span style="font-size:15px;color:#f6f6f6;font-weight:500">待售</span>
						</div>

					</div>
					<div  id="content_2_1_2_3">
						<div index="3" class="content1" id="tu_1">
							<img style="width:100%;height:100%" src="{{ asset('home/images/zshx/3.png') }}" alt="">
						</div>
						<div index="3" class="content1" id="tu_2_1">
							<span style="font-size:18px;font-weight:500;color:#f6f6f6">C户型</span>
						</div>
						<div id="tu_3">
							<div id="tu_3_1">
								<span style="font-size:16px;font-weight:500;color:#666">一房一厅</span>
								
							</div>
							<div id="tu_3_2">
								<span style="font-size:16px;font-weight:500;color:#666">52.0㎡</span>
								
							</div>
						</div>	
						<div id="tu_4">
							<span style="font-size:15px;color:#f6f6f6;font-weight:500">待售</span>
						</div>

					</div>
					<div  id="content_2_1_2_4">
						<div index="4" class="content1" id="tu_1">
							<img style="width:100%;height:100%" src="{{ asset('home/images/zshx/4.png') }}" alt="">	
						</div>
						<div index="4" class="content1" id="tu_2">
							<span style="font-size:18px;font-weight:500;color:#f6f6f6">D户型</span>
						</div>
						<div id="tu_3">
							<div id="tu_3_1">
								<span style="font-size:16px;font-weight:500;color:#666">一房一厅</span>
								
							</div>
							<div id="tu_3_2">
								<span style="font-size:16px;font-weight:500;color:#666">54.0㎡</span>
								
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
					<img style="width:100%;height:100%" srcc="{{ asset('./home/images/zshx/hu_1.png') }}" src="{{ asset('./home/images/zshx/hu_1.png') }}" alt="">
				</div>
				<div id="content_2_4">
					<div id="xiang_1">
						<div id="xiang_1_1">
							<span style="font-size:24px;font-weight:600;color:#4c4c4c">浙商新天地A户型</span>
						</div>
						<div id="xiang_1_2">
							<span style="font-size:17px;font-weight:500;color:#4c4c4c">居住情况:一房一厅</span>
						</div>
						<div id="xiang_1_3">
							<span style="font-size:17px;font-weight:500;color:#4c4c4c">建筑面积: 62.0㎡</span>
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
						<div style="padding-top:18px" id="xiang_2_1"> <span style="font-size:17px;font-weight:500;color:#4c4c4c">参考均价：</span> </div>
						<div style="margin-top:5px" id="xiang_2_2"> <span style="font-size:17px;font-weight:500;color:#4c4c4c">参考总价：</span> </div>
					</div>
					<div id="xiang_3">
						<div id="xiang_3_1">
							<span style="font-size:17px;font-weight:500;color:#4c4c4c">户型分布：</span>
						</div>
						<div id="xiang_3_2">
							<span style="font-size:17px;font-weight:500;color:#4c4c4c">户型解读：</span>
						</div>
						<div id="xiang_3_3">
						<div>
							<span style="font-size:17px;font-weight:500;color:#4c4c4c">1, 360度°全落地玻璃幕墙采光, 光线充沛视野宽阔 ;</span><br>
							
						</div>
						<div style="padding-top:10px;">
							<span style="font-size:17px;font-weight:500;color:#4c4c4c">2, 3.6米豪宅层高设计, 使居住空间更宽敞 ;</span><br>
							
						</div>
						<div style="padding-top:10px;">
							<span style="font-size:17px;font-weight:500;color:#4c4c4c">3, 干湿分区, 宽绰餐厅与客厅, 简约实用空间, 居家功能集聚完善 ;</span><br>
							
						</div>						
						<div style="padding-top:10px;">
							<span style="font-size:17px;font-weight:500;color:#4c4c4c">4, 客厅、卧室、卫生间、厨房、书房等多种功能复合 ;</span><br>
							
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
					<img style="width:100%;height:100%" srcc="{{ asset('./home/images/zshx/hu_2.png') }}" alt="">
				</div>
				<div id="content_2_4">
					<div id="xiang_1">
						<div id="xiang_1_1">
							<span style="font-size:24px;font-weight:600;color:#4c4c4c">浙商新天地B户型</span>
						</div>
						<div id="xiang_1_2">
							<span style="font-size:17px;font-weight:500;color:#4c4c4c">居住情况:一房一厅</span>
						</div>
						<div id="xiang_1_3">
							<span style="font-size:17px;font-weight:500;color:#4c4c4c">建筑面积: 51.0㎡</span>
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
						<div style="padding-top:18px" id="xiang_2_1"> <span style="font-size:17px;font-weight:500;color:#4c4c4c">参考均价：</span> </div>
						<div style="margin-top:5px" id="xiang_2_2"> <span style="font-size:17px;font-weight:500;color:#4c4c4c">参考总价：</span> </div>
					</div>
					<div id="xiang_3">
						<div id="xiang_3_1">
							<span style="font-size:17px;font-weight:500;color:#4c4c4c">户型分布：</span>
						</div>
						<div id="xiang_3_2">
							<span style="font-size:17px;font-weight:500;color:#4c4c4c">户型解读：</span>
						</div>
						<div id="xiang_3_3">
						<div>
							<span style="font-size:17px;font-weight:500;color:#4c4c4c">1, 360度°全落地玻璃幕墙采光, 光线充沛视野宽阔 ;</span><br>
							
						</div>
						<div style="padding-top:10px;">
							<span style="font-size:17px;font-weight:500;color:#4c4c4c">2, 3.6米豪宅层高设计, 使居住空间更宽敞 ;</span><br>
							
						</div>
						<div style="padding-top:10px;">
							<span style="font-size:17px;font-weight:500;color:#4c4c4c">3, 干湿分区, 宽绰餐厅与客厅, 简约实用空间, 居家功能集聚完善 ;</span><br>
							
						</div>						
						<div style="padding-top:10px;">
							<span style="font-size:17px;font-weight:500;color:#4c4c4c">4, 客厅、卧室、卫生间、厨房、书房等多种功能复合 ;</span><br>
							
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
					<img style="width:100%;height:100%" srcc="{{ asset('./home/images/zshx/hu_3.png') }}" alt="">
				</div>
				<div id="content_2_4">
					<div id="xiang_1">
						<div id="xiang_1_1">
							<span style="font-size:24px;font-weight:600;color:#4c4c4c">浙商新天地C户型</span>
						</div>
						<div id="xiang_1_2">
							<span style="font-size:17px;font-weight:500;color:#4c4c4c">居住情况:一房一厅</span>
						</div>
						<div id="xiang_1_3">
							<span style="font-size:17px;font-weight:500;color:#4c4c4c">建筑面积: 52.0㎡</span>
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
						<div style="padding-top:18px" id="xiang_2_1"> <span style="font-size:17px;font-weight:500;color:#4c4c4c">参考均价：</span> </div>
						<div style="margin-top:5px" id="xiang_2_2"> <span style="font-size:17px;font-weight:500;color:#4c4c4c">参考总价：</span> </div>
					</div>
					<div id="xiang_3">
						<div id="xiang_3_1">
							<span style="font-size:17px;font-weight:500;color:#4c4c4c">户型分布：</span>
						</div>
						<div id="xiang_3_2">
							<span style="font-size:17px;font-weight:500;color:#4c4c4c">户型解读：</span>
						</div>
						<div id="xiang_3_3">
						<div>
							<span style="font-size:17px;font-weight:500;color:#4c4c4c">1, 360度°全落地玻璃幕墙采光, 光线充沛视野宽阔 ;</span><br>
							
						</div>
						<div style="padding-top:10px;">
							<span style="font-size:17px;font-weight:500;color:#4c4c4c">2, 3.6米豪宅层高设计, 使居住空间更宽敞 ;</span><br>
							
						</div>
						<div style="padding-top:10px;">
							<span style="font-size:17px;font-weight:500;color:#4c4c4c">3, 干湿分区, 宽绰餐厅与客厅, 简约实用空间, 居家功能集聚完善 ;</span><br>
							
						</div>						
						<div style="padding-top:10px;">
							<span style="font-size:17px;font-weight:500;color:#4c4c4c">4, 客厅、卧室、卫生间、厨房、书房等多种功能复合 ;</span><br>
							
						</div>							
						</div>
					</div>
				</div>
			</div>
			<div style="display:none" class="content_4" id="content_2_2">
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
					<img style="width:100%;height:100%" srcc="{{ asset('./home/images/zshx/hu_4.png') }}" alt="">
				</div>
				<div id="content_2_4">
					<div id="xiang_1">
						<div id="xiang_1_1">
							<span style="font-size:24px;font-weight:600;color:#4c4c4c">浙商新天地D户型</span>
						</div>
						<div id="xiang_1_2">
							<span style="font-size:17px;font-weight:500;color:#4c4c4c">居住情况:一房一厅</span>
						</div>
						<div id="xiang_1_3">
							<span style="font-size:17px;font-weight:500;color:#4c4c4c">建筑面积: 54.0㎡</span>
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
						<div style="padding-top:18px" id="xiang_2_1"> <span style="font-size:17px;font-weight:500;color:#4c4c4c">参考均价：</span> </div>
						<div style="margin-top:5px" id="xiang_2_2"> <span style="font-size:17px;font-weight:500;color:#4c4c4c">参考总价：</span> </div>
					</div>
					<div id="xiang_3">
						<div id="xiang_3_1">
							<span style="font-size:17px;font-weight:500;color:#4c4c4c">户型分布：</span>
						</div>
						<div id="xiang_3_2">
							<span style="font-size:17px;font-weight:500;color:#4c4c4c">户型解读：</span>
						</div>
						<div id="xiang_3_3">
						<div>
							<span style="font-size:17px;font-weight:500;color:#4c4c4c">1, 360度°全落地玻璃幕墙采光, 光线充沛视野宽阔 ;</span><br>
							
						</div>
						<div style="padding-top:10px;">
							<span style="font-size:17px;font-weight:500;color:#4c4c4c">2, 3.6米豪宅层高设计, 使居住空间更宽敞 ;</span><br>
							
						</div>
						<div style="padding-top:10px;">
							<span style="font-size:17px;font-weight:500;color:#4c4c4c">3, 干湿分区, 宽绰餐厅与客厅, 简约实用空间, 居家功能集聚完善 ;</span><br>
							
						</div>						
						<div style="padding-top:10px;">
							<span style="font-size:17px;font-weight:500;color:#4c4c4c">4, 客厅、卧室、卫生间、厨房、书房等多种功能复合 ;</span><br>
							
						</div>							
						</div>
					</div>
				</div>
			</div>
		</div>
		</div>


	<script src="{{ asset('home/images/dfhx/common.js') }}"></script>
	
@endsection('content')

