@extends('jsgw')

@section('css')
<link href="{{ asset('home/images/cgs/common.css') }}" rel="stylesheet" type="text/css" />

@endsection('css')



@section('content')
<div class="cg-zs"></div>
   <div class="cg-zst">
       <div class="zs-tit"><b>采购商入驻</b><p>建商联盟建材采购是线上与线下大数据相结合，通过“互联网+”进行产品在线采购、供应商管理、物流和金融托管服务。</p></div>
	   <div class="zs-t1">
	       <div class="zs-t1-0"><b>工厂直供  服务更到位</b><span>Factory direct supply</span><p>磁砖、家俱、卫浴、烟机灶具、整机配件。上千品类，诚信认证服务商，服务更优质。</p></div>
	       <div class="zs-t1-1"><b>透明采购  成本问题</b><span>Transparent procurement</span><p>采购公平比价，优质严选货源，合理竟争机制，新老供应商合作更融洽。</p></div>
		   <div class="zs-t1-2"><b>资金周转理快捷</b><span>Cash flow faster</span><p>资深采购金融专家顾问式一对一运营服务，资金周转更灵活，更有效。</p></div>
		   <div class="zs-t1-3"><b>全球供应商资源</b><span>Global supplier  resources</span><p>家居建材全行业覆盖，原产地货源，品牌原厂授权直供，品类丰富，适度竟争，成本直线下降。</p></div>
		   <div class="zs-t1-4"><b>管家式运营服务</b><span>Butler  service</span><p>为装饰公司、设计公司、建筑公司众多采购商提供一对一专业服务，实时匹配采购需求，采购厂家推荐。</p></div>
	   </div>	   
   </div>
   <div class="cg-zsx">
        <div class="cg-zsx-tit">产品与服务</div>
		<ul>
		    <li><img src="{{ asset('home/images/cgs/cg-100.jpg') }}" /></li>
			<li><p>我们的产品</p><span>家居建材全品供货、加工、服务及物流与金融服务</span></li>
			<li><img src="{{ asset('home/images/cgs/cg-101.jpg') }}" /></li>
			<li><p>我们的服务</p><span>严选——为企业寻找新品、新供应商<br>挑选——为企业挑选和建议适合的品类<br>物流——为企业采购提供仓储运输保证<br>金融——协助家装用户办理家装贷</span></li>
		</ul><div style="clear:both;"></div>
		<div class="cg-zs-p1"><p>我们的优势</p><span>建商联盟采购平台通过线上与线下数据打通，帮助企业采购互联网化，扩大企业采购的途径，减少采购供应链的层级，让采购更透明，在降低采购成本的同时提高采购效率，让采购不再成为企业发展的瓶颈！</span></div>
		<div class="cg-zs-p2"><img src="{{ asset('home/images/cgs/cg-102.jpg') }}" width="390" height="290" /><b>平台优势</b><p>1、丰富的严选建材供应商<br>2、PC+移动端<br>3、大数据据推荐，搭建国内垂直建材采购平台</p></div>
		<div class="cg-zs-p3"><img src="{{ asset('home/images/cgs/cg-103.jpg') }}" width="390" height="290" /><b>丰富的采购场景</b><p>1、便捷的平台化操作<br>2、满足企业普通采购和战略寻源<br>3、快速响应的点对点多样化采购场景</p></div>
		<div class="cg-zs-p4"><img src="{{ asset('home/images/cgs/cg-104.jpg') }}" width="390" height="290" /><b>在线OA</b><p>1、需求管理  物流与监控<br>2、支付管理  招标询价  协议采购中心<br>3、订单管理  支付管理</p></div>
		
   </div>
@endsection('content')

@section('js')

@endsection('js')