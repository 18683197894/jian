@extends('heads')

@section('css')
<link href="{{ asset('home/images/houseroom/common.css') }}" rel="stylesheet" type="text/css" />

@endsection('css')

@section('content')
<div class="pricead">
	<img src="{{ asset('home/images/houseroom/z-price.jpg') }}" alt="">
	<div class="prica">
	<div class="pric">
		<div class="pric1">
			<div class="pric1div1">
				<span class="pric1div1span1">装修计算器</span>
				<span class="pric1div1span2">今天已有 10000 名客户获得装修预算</span>
			</div>
			
				<form action="" class="pric1div2">
					
					<label for="" class="label1">
						<span class="label1span1" style="display:none">请输入 1 ~ 999 的整数</span>
						<span class="label1span2">房屋面积：</span>
						<input class ="text" type="text" placeholder="输入你的房屋面积">
						<font>㎡</font>
					</label>
					<label for="" class="label2">
						<span class="label2span1">房屋户型：</span>
<div class="demo">
	<dl class="select" style="margin-left:8px">
		<dt class="dt1" >1厅</dt>
		<dd>
			<ul>
				<li><a href="#">1厅</a></li>
				<li><a href="#">2厅</a></li>
				<li><a href="#">3厅</a></li>
			</ul>
		</dd>
	</dl>	
</div>

<div class="demo">
	<dl class="select" style="margin-left:12px">
		<dt class="dt2">1厨</dt>
		<dd>
			<ul>
				<li><a href="#">1厨</a></li>
				<li><a href="#">2厨</a></li>
				<li><a href="#">3厨</a></li>
			</ul>
		</dd>
	</dl>	
</div>
<div class="demo">
	<dl class="select" style="margin-left:12px">
		<dt class="dt3">1卫</dt>
		<dd>
			<ul>
				<li><a href="#">1卫</a></li>
				<li><a href="#">2卫</a></li>
				<li><a href="#">3卫</a></li>
			</ul>
		</dd>
	</dl>	
</div>
					</label>
						<label for="" class="label3">
						<span class="label3span1" style="display:none">号码格式错误</span>
						<span class="label3span2">手机号码：</span>
						<input class ="phone" type="text" placeholder="输入你的电话号码">
					</label>
				</form>
			
		</div>
	<button class="button"><span>开始<br>计算</span></button>
		<div class="pric2">
			<div class="pric2div1"> 
				<span class="pric2div1span1">你家的装修预算</span>
				<span class="pric2div1span2">&nbsp;&nbsp;?&nbsp;&nbsp;</span>
				<span class="pric2div1span3">元</span> 
			</div>
			<ul>
				<li class="pirc2li1">
					<span class="pirc2span1">材料费：</span>
					<span class="pirc2span2">xxxxx</span>
					<span class="pirc2span3">元</span>
				</li>
				<li class="pirc2li2">
					<span class="pirc2span1">人工费：</span>
					<span class="pirc2span2">xxxxx</span>
					<span class="pirc2span3">元</span>
				</li>
				<li class="pirc2li2">
					<span class="pirc2span1">设计费：</span>
					<span class="pirc2span2">xxxxx</span>
					<span class="pirc2span3">元</span>
				</li>
				<li class="pirc2li2">
					<span class="pirc2span1">质检费：</span>
					<span class="pirc2span2">xxxxx</span>
					<span class="pirc2span3">元</span>
				</li>

			</ul>
		</div>
	</div>
		
	</div>
</div>

	  <div class="price-1"><p>建商联盟 透明家装修  品质放心</p><div class="price-1-1"><span class="price-1-a">报价前置 预算透明</span><span class="price-1-b">零增项  预算即结算</span><span class="price-1-c">全外套餐 高性价比</span><span class="price-1-d">工厂直采 直省预算</span></div></div>
	  
	  <div class="price-2">
	      <div class="price-21"></div>
		  <div class="price-22">
		     <div class="price-221"><b>报价前置  预算透明</b><p>套餐报价规范  三步选包  组出新家</p><span class="price-222">基装包</span><span class="price-33"></span><span class="price-223">厨房包</span><span class="price-33"></span><span class="price-224">卫浴包</span><span class="price-34"></span><span class="price-225">你的新家</span></div>
		  </div>
	  </div>
	  
	  <div class="price-3z">
	     <div class="price-31z">
		     <div class="price-33z"><b>0增项  预算即结算</b><p>装修项严格交底  杜绝恶意漏项</p><span class="price-33z-1">一口价</span><span class="price-33z-2">项目透明</span><span class="price-33z-3">预算直观</span></div>
		 </div>
		 <div class="price-32z"></div>		 
	  </div>
	  
	  <div class="price-4">
	      <div class="price-41"></div>
		  <div class="price-42">
		     <div class="price-421"><b>全包套餐  高性价比</b><p>再也不为选材苦恼  省心  省事</p><span class="price-422">包主辅材</span><span class="price-423">包人工</span><span class="price-424">包厨电</span><span class="price-425">包售后</span></div>
		  </div>
	  </div>
	  
	  <div class="price-5z">
	     <div class="price-51z">
		     <div class="price-53z"><b>F2C工厂直采</b><p>工厂直供到家  减少中间商赚差价</p><p>大品牌  绿色环保主材  品质保证</p></div>
		 </div>
		 <div class="price-52z"></div>		 
	  </div>
	  <div class="price-6"></div>
@endsection('content')

@section('js')
	<script src="{{ asset('home/images/houseroom/common.js') }}"></script>
@endsection('js')