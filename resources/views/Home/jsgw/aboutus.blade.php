@extends('heads')

@section('css')
<link rel="stylesheet" href="{{ asset('home/jsgw/css/common.css') }}">
@endsection('css')

@section('content')
	
   <div class="js-about">
       <div class="js-about-ad"></div>
       <div class="js-about-tit">
	      <ul>
		     <li class="jsliactive"><a href="{{ url('jsgw/aboutus') }}">企业简介</a></li>
			 <li><a href="{{ url('jsgw/tuandui') }}">运营团队</a></li>
			 <li><a href="{{ url('jsgw/zhanlui') }}">发展战略</a></li>
		  </ul>
	   </div><div style="clear:both;"></div>
       <div class="js-about-intr">
	       <div class="js-about-con"><h1>四川建商网络科技有限公司</h1><p>&nbsp; &nbsp; &nbsp; &nbsp;旗下建商网，一个注重互惠共赢的创新型企业，以&ldquo;互联网+&rdquo;思维，整合线上、线下、物流、服务四大资源，实现家居建材全产业链的资源融合与渠道融通，构建全新家居建材生态产业链，根据现代消费者特性提供个性化的解决方案，为消费者提供建材产品以及完整家居解决方案，形成了一套以&ldquo;一站式消费体验和一体化解决方案&rdquo;为标准的更完善的企业与个人服务体系，树立了领先业界的典范。</p>
<p>&nbsp; &nbsp; &nbsp; &nbsp;以市场为导向，紧随消费者需求，建商联盟坚持&ldquo;以消费者为核心、实现多方共赢&rdquo;的服务理念，打造全新&ldquo;互联网+消费全返&rdquo;的商业模式，颠覆传统的消费观，让消费者在建商网所搭建的&ldquo;新零售&rdquo;家居建材平台中，实现&ldquo;消费即投资，投资即收益&rdquo;的消费追求，保障消费者在建材交易中的消费权益。</p>
<p>&nbsp; &nbsp; &nbsp; &nbsp;为深入贯彻多方共赢意识，建商网将一如既往地以专业、精准的服务，真诚在乎每一位客户的托付，努力建立中国&ldquo;新一代建商典范&rdquo;的新形象，推动中国建材行业走向更高峰！</p></div>
	   </div>
	   <div class="js-about-bt"><p>企业定位</p></div>
	   <div class="js-about-bt1"></div>
	   <div class="js-about-bt"><p>企业优势</p></div>
	   <div class="js-about-bt2">
	      <div class="about-bt2-1"><img src="{{ asset('home/jsgw/css/btt-1.jpg') }}" /><h1>全新消费模式</h1><p>消费即投资，投资即收益</p><p>打造全新“互联网+消费全返”的商业模式</p><p>消费者到消费商，参与商家的利益共享</p><p>把消费变成一种对企业的投资行为</p></div>
		  <div class="about-bt2-1"><img src="{{ asset('home/jsgw/css/btt-2.jpg') }}" /><h1>线上线下资源整合</h1><p>资源集结、有求必应</p><p>互联网渠道构建全国范围的销售与服务网上平台</p><p>家居建材全产业链资源整合融合、渠道融通</p><p>海量精准信息资源库，为消费者提供精准服务</p></div>
		  <div class="about-bt2-1"><img src="{{ asset('home/jsgw/css/btt-3.jpg') }}" /><h1>构建全新产品生态圈</h1><p>绿色供应、利益共享</p><p>简化服务环节、清晰产品供应链</p><p>提供品类繁多且符合现代消费者需求的产品</p><p>保证出售产品均为厂商正品</p><p>启用行内专业评估机构把控产品质量</p></div>
		  <div class="about-bt2-2"><img src="{{ asset('home/jsgw/css/btt-4.jpg') }}" /><h1>服务标准化</h1><p>一体化服务、个性体验</p><p>坚持“以消费者为核心，实现多方共赢”的理念</p><p>重构线上、线下、物流与服务</p><p>一站式消费体验</p><p>一体化解决方案</p></div>	   
	   </div>
	   <div class="js-about-bt"><p>企业文化</p></div>
	   <div class="js-about-bt3"></div>
	   <div class="js-about-bt"><p>企业愿景</p></div>
	   <div class="js-about-bt4"></div>
	   <div class="js-about-bt5">
	       <p>全面启动互联网+家居建材服务平台；</p>
		   <p>以“新零售”的方式，为消费者提供全新优化的家居建材解决方案；</p>
		   <p>以互联网思维颠覆传统家居建材行业，打造一个把消费转化成为投资行为的家居建材平台。</p>·
	   </div>
   </div>
<div style="clear:both;"></div>	

@endsection('content')