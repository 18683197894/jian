@extends('heads')

@section('css')
<link rel="stylesheet" href="{{ asset('home/jsgw/css/common.css') }}">
@endsection('css')

@section('content')
<div style="clear:both;"></div>

   <div class="js-about">
       <div class="js-about-ad"></div>
       <div class="js-about-tit">
	      <ul>
		     <li class="jsliactive"><a href="{{ url('jsgw/ls') }}">新零售平台</a></li>
			 <li><a href="{{ url('jsgw/jzf') }}">精装房项目</a></li>
			 <li><a href="{{ url('jsgw/tyg') }}">线下体验馆</a></li>
		  </ul>
	   </div><div style="clear:both;"></div>
       <div class="chanye-ls">
	         <h1>零售改变　　从新开始</h1>
			 <div class="chanye-b"></div>
			 <div class="chanye-b1"><span>现在，建商网家居建材新平台在等你</span><p>线上+线下+物流+服务，核心是以消费者为中心的会员、支付、库存、服务等方面数据的全面打通，构建家居建材全新生态链，提升产业转型升级。</p><span style="margin-top:70px;color:#343434;">建商网"将装修，线下服务数据化"</span></div>
			 <div class="chanye-b2">
			     <div class="chanye-b2-1">
				     <b>线上+线下+物流+服务</b>
					 <p>流量入口、多端支持、品牌丰富</p>
					 <p>整合物流配送体系，物流全程可视化，专业高效</p>
					 <p>合作品牌，厂商源头供货，管理移动化</p>
					 <p>专属售后服务，精准配送服务，顾问式定制服务</p>
					 <b style="margin-top:40px;">精准优质的客户群</b>
					 <p>优质服务贯穿全程，用户粘性更高，实现多方共赢</p>
					 <b style="margin-top:40px;">优化供应链，实现全渠道的数据化运营</b>
					 <p>全新的资质认证、规则保障、交易更安全</p>
					 <b style="margin-top:40px;">品牌丰富、数据选品、采购结算平台化运作</b>
					 <p>ERP升级、更便捷的线上线下流量打通，24小时不打烊</p>
				 </div>
			 </div>
	   </div>
	   <div class="chanye-hui">
	        <div class="chanye-hui1">
			   <span>建商网能帮你做什么</span><p>让用户“足不出户，尽享服务”的互联网家居一站式服务平台<br>一站式家居网上平台，提供装饰建材、家具、家电、家饰家纺、建材、服务，提供更专业、快捷、丰富、诚信的全新网上购物体验。</p>
			</div>
	   </div>
	   <div class="chanye-bai">
	       <div class="chanye-bai1">
		        <b>建商网商城开设</b>
				<span>B2B2C的交易平台，为入驻商提供多维度交易空间，商家入驻并开通自己的店铺通过家居商城广大的客户群体达成商品交易，增加销售渠道，扩大销售范围，增加销售金额，延伸品牌影响力。</span>
				<p>建立建商网商城店铺</p>
				<p>店铺整体设计装修</p>
				<p>店铺banner首页设计装修</p>
				<p>高端产品详情页设计，增强用户体验</p>
		   </div>
	   </div>
	   <div class="chanye-hei">
	      <div class="chanye-hei1">
		      <div class="chanye-hei2">
	            <b>大数据支撑</b>
				<span>材料、装饰、监理、物流、服务</span>
				<p>利用大数据对大量消费者提供产品精准营销</p>
				<p>实时解决故障、问题及缺馅的根源</p>
				<p>使用点击分析和数据挖掘来规避欺诈行为</p>
			  </div>
	      </div>
	   </div>
	   
   </div>
<div style="clear:both;"></div>
@endsection('content')