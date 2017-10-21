@extends('jsgw')

@section('css')
	<link rel="stylesheet" href="{{ asset('home/jsgw/franchise/common.css') }}">

@endsection('css')


@section('content')
<div class="fran_1">
	<div class="fran_1_1"><img src="{{ asset('home/jsgw/franchise/1.png') }}" alt=""></div>
	<div class="fran_1_2">
		<img src="{{ asset('home/jsgw/franchise/2.png') }}" alt="">
		<div class="fran_1_2_1"><ul>
			<li>建商联盟采购业务自成立以来,已与国内数千商家品牌厂商达成战略合作，为国内众多房地产开发商，装修公司，设</li>
			<li>计公司提供采购服务，对全面提高采购效率，且降低采购成本，为业创造价值。现在正招募建材生态链伙伴，携</li>
			<li>手开括亿万级的建材市场，一起为企业客户创造价值。</li>
		</ul></div>
	</div>
</div>
<div class="fran_2">
	<div class="fran_2_con">
		<title class="title">关于企业采购</title>
		<span>建商联盟采购平台采购励志于为企业提供全方位高效采购解决方案。依托海外市场供应商优质资源，结合互联网采购产品</span>
		<span>为企业有效解决寻源渠道窄，品类不丰富，采购效率低，降低采购成本难等采购问题。</span>
		<ul>
			<li class="fran2li1"><div><img src="{{ asset('home/jsgw/franchise/3.png') }}" alt=""></div><b>直供</b></li>
			<li class="fran2li2"></li>
			<li class="fran2li1"><div><img src="{{ asset('home/jsgw/franchise/3.png') }}" alt=""></div><b>降本</b></li>
			<li class="fran2li2"></li>
			<li class="fran2li1"><div><img src="{{ asset('home/jsgw/franchise/3.png') }}" alt=""></div><b>增效</b></li>
			<li class="fran2li2"></li>
			<li class="fran2li3"><div><img src="{{ asset('home/jsgw/franchise/3.png') }}" alt=""></div><b>转型</b></li>
		</ul>
	</div>
</div>
<div class="fran_3">
	<title class="title2">平台价值</title>
	<div class="fran_3_1">
		<img class="fran_img_1" src="{{ asset('home/jsgw/franchise/8.png') }}" alt="">
		<ul>
			<li class="fran_3_li1"><img src="{{ asset('home/jsgw/franchise/9.png') }}" alt=""></li>
			<li class="fran_3_li2"><img src="{{ asset('home/jsgw/franchise/9.png') }}" alt=""></li>
			<li class="fran_3_li2"><img src="{{ asset('home/jsgw/franchise/9.png') }}" alt=""></li>
			<li class="fran_3_li2"><img src="{{ asset('home/jsgw/franchise/9.png') }}" alt=""></li>
		</ul>
		<img class="fran_img_2" src="{{ asset('home/jsgw/franchise/10.png') }}" alt="">
	</div>
</div>
<div class="fran_4">
	<title class="title2">合作资质</title>
	<div class="fran_4_con">
		<ul class="fran_4_ul1">
			<li><img src="{{ asset('home/jsgw/franchise/4_1.png') }}" alt=""><title>专业成熟的团队</title><span>公司具有合法的营业执照，拥有10</span><span>人以上成熟销售，管理咨询，服务</span><span>团队</span></li>
		</ul>
		<ul class="fran_4_ul2">
			<li><img src="{{ asset('home/jsgw/franchise/4_2.png') }}" alt=""><title>采购机制完整</title><span>具有一定的企业客户基础，公司有</span><span>采购咨询，企业采购服务，管理软</span><span>件背景并取得相应成绩</span></li>
		</ul>
		<ul class="fran_4_ul2">
			<li><img src="{{ asset('home/jsgw/franchise/4_3.png') }}" alt=""><title>注重长远发展</title><span>认同建设联盟企业文化，奉行客服</span><span>第一，注重服务，拥有真诚而长远</span><span>合作态度</span></li>
		</ul>
	</div>
</div>
<div class="fran_5">
	<title class="title3">入驻报名</title>
	
	<form action="" class="fran_5_1">
		<input type="text" placeholder="你的姓名">
		<input type="text" placeholder="你的邮箱">
		<input type="text" placeholder="你的电话">
		<button class="button">立即报名</button>
	</form>
	
</div>
@endsection('content')

@section('js')
<script src="{{ asset('home/jsgw/franchise/common.js') }}"></script>

@endsection('js')