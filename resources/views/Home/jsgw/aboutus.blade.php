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
			 <li><a href="{{ url('jsgw/goujia') }}">组织构架</a></li>
			 <li ><a href="{{ url('jsgw/contact') }}">联系我们</a></li>
		  </ul>
	   </div><div style="clear:both;"></div>
       <div class="js-about-intr">
	       <div class="js-about-con"><h1>四川建商网络科技有限公司</h1><p>&nbsp; &nbsp; &nbsp; &nbsp;四川建商网络科技有限公司（以下简称“建商科技”），是建商联盟旗下商业
地产投资及运营的专业化服务平台,以国际前沿商业模式为蓝本，秉承“长期持有，
稳健经营”的原则，引进国际前沿的商业运营理念，实行统一规划、统一招商、统
一运营、统一管理的经营模式，实现物业资产的持续增值。</p>
<p>&nbsp; &nbsp; &nbsp; &nbsp;建商科技的主营业务为商业地产投资及运营管理，依托“大地产”模式，同时
拓展外部资源，内外结合，不断丰富购物、休闲、娱乐、生活服务主题，打造“大
商业”平台模式，构建创新型城市生活广场。</p>
<p>&nbsp; &nbsp; &nbsp; &nbsp;开发项目均从城市人群多层面的需求着手，开创性地推出“跨界合作”，在商
业模式引入文化艺术、生态环保、美食休闲、时尚娱乐、互动数码、圈层社交、自
然科普、亲子育乐、健康养生、公益慈善等十大体验功能，使得商业空间不仅仅只
是一个购物中心，更是未来城市消费者的社交中心、娱乐中心、休闲中心、公益中
心、生态中心、健康中心、亲子中心、科普中心、文化中心、时尚中心。各个功能
板块之间形成互动，引导消费者的合理流动，产生复合效应，满足全客层“一站式
体验消费”需求，打造建商科技在商业地产独一无二的竞争优势。</p></div>
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