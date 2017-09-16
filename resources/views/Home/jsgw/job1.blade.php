@extends('heads')
@section('css')
@endsection('css')
<link rel="stylesheet" href="{{ asset('home/jsgw/css/common.css') }}">
@section('content')
   <div class="js-about">
       <div class="js-job-ad"></div>
	   <div class="js-job-1"><b>用人理念</b><p>招最好的人，给最大的空间，看最后的结果，让优秀人才脱颖而出。<br>
“家居建材运营平台，最有价值的就是人。我们的办公室、服务器会折旧，但一个公司，始终在增值的就是公司的每一位员工。”
“对于一个人才，我们更多注重的是，你能不能够创造，为自身创造价值，给用户带来更好的体验，这是建商联盟所关心的，所看重的。”
</p></div>
       <div class="js-job-2">
	      <ul>
		    <li><p>能力决定岗位<br>贡献决定价值</p></li>
			<li><img src="{{ asset('home/jsgw/css/job11.jpg') }}" /></li>
			<li><p>让员工更出色<br>使公司更卓越</p></li>
			<li><img src="{{ asset('home/jsgw/css/job22.jpg') }}" /></li>
			<li><img src="{{ asset('home/jsgw/css/job33.jpg') }}" /></li>
			<li><p>心与心沟通<br>各抒已见</p></li>
			<li><img src="{{ asset('home/jsgw/css/job44.jpg') }}" /></li>
			<li><p>人适其位<br>位适其人<br>全能发展</p></li>
		  </ul>
	   </div>
       <div class="js-job-3">
          <h1>公司福利</h1> 
		  <div class="js-job-31"></div>
		  <div class="js-job-32">
		       <p>购买五险一金</p>
			   <p>法定带薪假日</p>
			   <p>中餐补贴</p>
			   <p>公司定期组织员工健康体检</p>
			   <p>公司定期组织旅游,生日会,团队聚餐</p>
			   <p>重大节日发放相应礼品/礼金</p>
			   <p>内/外培训机会多，提升空间大</p>
			   <p>八小时工作制，环境宽松，氛围好</p>
		  </div>
       </div>
   </div>
<div style="clear:both;"></div>

@endsection('content')