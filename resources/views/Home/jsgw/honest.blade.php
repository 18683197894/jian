@extends('jsgw')

@section('css')
	<link rel="stylesheet" href="{{ asset('home/jsgw/honest/common.css') }}">
@endsection('css')

@section('content')
<div class="hon_1">
	<img  data-original="{{ asset('home/jsgw/honest/1.png') }}" width="100%" height="100%" alt="">
</div>
<div class="hon_2">
	<div class="hon2_head">
		<title>廉洁规章要求</title>
		<span>建商联盟采购业务人员包括：建商联盟员工、代理人、谈判代表以及利益关系人。利益关系人系指</span>
		<span>建商联盟员工配偶、三代内亲属及其他关系密切的亲属、朋友。</span>
		<div style="clear:both;"></div>
	</div>
	<div class="hon2_con1">
		<img  data-original="{{ asset('home/jsgw/honest/2.png') }}" alt="">
		<div class="hon2_condiv">
			<div class="hon2_condiv_div" style="margin-left:50px;">
				<title>廉洁有违行为</title><span></span>
			</div>
			<ul style="margin-left:50px;">
			<li>一，供应商不得对建商联盟采购业务人员实施下列有违廉洁合作的行为（但不</li>
			<li>限于）。</li>
			<li>1.给付或承诺给付现金、有奖证券、购物卡、支付凭证等各类有价物品。</li>
			<li>2.以专家费、咨询费、劳务费等各种名义赠与股份、现金、有价证券、购物</li>
			<li>卡、支付凭证等各类物品。</li>
			<li>3.安排旅游、有限娱乐、非正常宴请活动、安排法律或已知商业惯例所禁止的</li>
			<li>活动，例如赌博等。</li>
			<li>4.报销或支付应由采购人员承担的费用。</li>
			<li>5.同意采购业务人员及其利益关系人在本企业兼职，持股。</li>
			<li>6.不等为其住房装修、婚丧嫁娶、家属和子女的工作安排以及出国、</li>
			<li>外出旅游等提供方便。</li>
			<li>7.出借钱财、进行投融资。</li>
			<li>8.利益第三方实施贿赂或变相贿赂。</li>
			</ul>
			<span class="hon2_condiv_red" style="margin-left:50px;">如有违反，按照签署的业务合作备忘录中廉洁合作协议处理。</span>
		</div>
		<div style="clear:both;"></div>

	</div>
	<div class="hon2_con2" style="margin-top:80px">
		<div class="hon2_condiv">
			<div class="hon2_condiv_div">
				<title>廉洁零容忍行为</title><span></span>
			</div>
			<ul>
		    <li>二，建商联盟采购业务人员零容忍行为（但不限于）。</li>	
			<li>1.员工之间或于供应商串通舞弊蓄意谋求不当利益。</li>
			<li>2.在采购活动中蓄意伪造文档，弄虚作假影响合理决策。</li>
			<li>卡、支付凭证等各类物品。</li>
			<li>3.向供应商收取贿赂，报销个人费用，私自接受供应商不当馈赠，不当接受供</li>
			<li>应商款待，参与赌博活动等涉及有价活动。</li>
			<li>4.不得要求或者接受供应商为其住房装修，婚丧嫁娶，利益关系人的工作安排</li>
			<li>以及出国，外出旅游等提供方便。</li>
			<li>5.未主动申报关联供应商，投资或任职关联供应商等。</li>
			<li>6.泄露公司的商业秘密或未经授权泄露采购机密信息，干扰采购过程的公平性</li>
			<li>，谋取个人私利等。</li>
			</ul>
			<span class="hon2_condiv_red">如有违反，按照签署的业务合作备忘录中廉洁合作协议处理。</span>
		</div>
		<img  data-original="{{ asset('home/jsgw/honest/3.png') }}" alt="">
		<div style="clear:both;"></div>

	</div>
</div>
<div class="con_3">
	<div class="con3_con">
		<title>投诉及举报方式</title>
		<div style="width:600;padding-left:20px">
		<span style="margin-top:35px">反舞弊专员邮箱：Server@jianshanglianmeng.com</span>
		<span style="margin-top:25px">书信地址:四川省宜宾市临港经济开发区西南互联网产业基地522</span>
		<span style="margin-top:25px">建商联盟反舞弊专员:是建商联盟设立独立第三方，负责监督、受</span>
		<span style="margin-top:10px">理于处理建商联盟所以舞弊操作相关事项，直属建商联盟总裁领导。</span>
		<span style="margin-top:25px">建商联盟承诺所以举报信息，基于“申慎、永久保密”的原则，对</span>
		<span style="margin-top:10px">于举报单位、举报人以及举报内容将严格保密。</span>
		</div>
	</div>
		<div style="clear:both;"></div>

</div>
@endsection('content')

@section('js')
<script>
			$(function() {
      		$("img").lazyload({effect: "fadeIn"});
     		 $("img").lazyload({ threshold :180});
			});
</script>
@endsection('js')