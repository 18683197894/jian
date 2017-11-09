@extends('heads')

@section('css')

@endsection('css')
<style>
	.all1{
		width:100%;
		height:500px;
		background-image:url(/home/images/allcse/1.png);
		background-repeat: no-repeat;
		background-size: 100% 100%
		filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='/home/images/allcse/1.png',sizingMethod='scale');
	}
	.all1con{
		width:673px;
		height:500px;
		display:block;
		margin: 0 auto;
		padding-top: 64px;
	}
	.all1conn{
		width:673px;
		height:366px;
		background: rgba(255,255,255,0.7);
		text-align: center;
	}
	.alldiv{
		width:400px;
		height:110px;
		margin:0 auto;
		padding-top: 48px;
	}
	.allspan1{
		font-size: 90px;
		display:block;
		font-weight: 600;
		float:left;
		margin-left: 76px;
		font-family:'Microsoft JhengHei';
		color:#F4993C;letter-spacing:2px;
	}
	.allspan2{
	    font-size: 40px;
		font-weight: 600;
		float:left;
		color:#F4993C;
		display:block;
		margin-left: 5px;
		margin-top: 53px;
		font-family: "Times New Roman", Times, serif;
		
		letter-spacing:1px;

	}
	.allapan3{
		display:block;
		font-family: "Times New Roman", Times, serif;
		color:#2F2E40;
		font-size: 3.5em;
		font-weight: 900;
		font-style: normal;
		margin-top:-2px;
		letter-spacing:3px;
		margin-left: 208px;
		float:left;
	}
	.alldiv2{
		float:left;
		margin-left:157px;
		width:372px;
		height:44px;
		margin-top: 10px;
		background-color:#000;
		text-align: center;
	}
	.alldiv2 span{
		line-height: 44px;
		color:#fff;
		letter-spacing:4px;
		font-size: 26px;
	}
	.allhead{
		width:100%;
		height:64px;
		background-color:#f5f5f5;
	}
	.allhead_1{
		width:406px;
		height:64px;
		margin:0 auto;
	}
	.allhead_1_1{
		width:130px;
		height:62px;
		float:left;
		border-bottom:2px solid #E12E32;
	}
	.allhead_1_2{
		width:130px;
		height:62px;
		float:right;
	}
	.allhead_1_1 img{
		float:left;
		margin-top: 16px;
	}
	.allhead_1_2 img{
		float:left;
		margin-top: 15px;
	}
	.allhead_1_1 a{
		line-height: 69px;
		font-size: 20px;font-family:Arial,Helvetica,sans-serif;
		margin-left: 6px;
		color:#E33A3D;
	}
	.allhead_1_2 a{
		font-size: 20px;
		line-height: 68px;
		margin-left: 7px;font-family:Arial,Helvetica,sans-serif;
		color:#5B5B5B;

	}
	.allcon1{
		width:100%;
		height:580px;
		background-color:#fff;
	}
	.allcon11{
		width:1200px;
		height:580px;
		margin:0 auto;
	}
	.allcon1head{
		width:450px;
		height:114px;
		margin:0 auto;
		text-align: center;
	}
	.allcon1span1{
		display: block;
		width:450px;
		height:30px;
		font-size: 21px;
		margin-top: 35px;
		color:#333;font-family:Arial,Helvetica,sans-serif;
	}
	.allcon1span2{
		display: block;
		width:450px;
		height:30px;
		font-size: 17px;
		color:#5A5A5A;
		font-family:'Microsoft Yahei',Arial,Helvetica,sans-serif;
		letter-spacing:3px;
	}
	.allcon1ul{
		width:450px;
		height:50px;
		overflow: hidden;
		display: block;
	}
	.allcon1li{

		width:91px;
		overflow: hidden;
		float:left;

		display: block;
		margin-top: 10px; 
		color:#fff;
		cursor:pointer;
		border:1px solid #E12E32;
		height:23px;
		font-size: 17px;
		background-color:#E12E32;    
		-moz-user-select:none;/*火狐*/
 	    -webkit-user-select:none;/*webkit浏览器*/
   		-ms-user-select:none;/*IE10*/
   		-khtml-user-select:none;/*早期浏览器*/
    	user-select:none;
	}
	.allcon1li1{
		width:91px;
		overflow: hidden;
		cursor:pointer;
		float:left;
		display: block;
		color:#666;
		height:23px;
		border:1px solid #666;
		margin-left:85px;
		font-size: 17px;
		margin-top: 10px; 
		background-color:#fff;    
		-moz-user-select:none;/*火狐*/
    	-webkit-user-select:none;/*webkit浏览器*/
    	-ms-user-select:none;/*IE10*/
    	-khtml-user-select:none;/*早期浏览器*/
      	user-select:none;
	}
	.allcon1div{
		width:1200px;
		height:465px;
		margin:0 auto;
		position:relative;
	}
	.allcon1divul{
		width:1200px;
		height:397px;
		overflow: hidden;
		display: block;
		position: absolute;
		top:0px;
		left:0px;
	}
	.allcon1divnone{
		position: absolute;
		width:1200px;
		height:395px;
		top:0px;
		left:0px;
		overflow: hidden;
		display: none;
		background:rgba(0,0,0,0.8);
	}
	.allcon1divnonediv{
		
		height:395px;
		margin:0 auto;
		overflow:hidden; 
			
	}
	.allcon1divnonediv ul{
		width:100px;
		height:375px;
		float:left;

	}
	.allcon1divnonediv ul title{
		width:100px;
		height:30px;
		color:#fff;
		display:block;
		font-size: 16px;
		padding-top: 15px;
		text-align: center;
		float:left;
	}
	.allcon1divnonediv ul li{
		display: block;
		width:100px;
		height:20px;text-align: center;
		color:#fff;
		font-size: 14px;
		float:left;
	}
	.allcon1divli{
		width:394px;
		height:397px;
		overflow: hidden;
		float:left;
		background-color:#F5F5F5;
		position:relative;
		display: block;
	}
	.allcon1divli1{
		float:left;
		width:395px;
		height:397px;
		margin-left:8px;
		background-color:#F5F5F5;
		overflow: hidden;
		position:relative;
		display: block;
	}
	.allcon1divuldiv1{
		position: absolute;
		top:0;
		left:0;
		width:394px;
		height:397px;
		cursor: pointer;
	}
	.allcon1divuldiv2{
		position: absolute;
		width:270px;
		height:235px;
		top:50px;
		left:62px;
		display:none;cursor: pointer;
		background:rgba(0,0,0,0.6);
	}
	.allcon1divuldiv2 span{
		display: block;
		width:240px;
		height:205px;
		margin: 0 auto;
		margin-top: 15px;
		
		border:1px solid #BDA95F;

	}
	.allcon1divuldiv2 span p{
		font-weight: normal;
		font-style: normal;
		font-size: 16px;
		color:#fff;
		padding:10px 20px 10px 20px;
	}
	.allcon1divspan1{
		margin-left: 15px;
		margin-top: 5px;
		display:block;
		width:120px;
		height:20px;
		font-size: 19px;
		color:#482819;
		font-weight: 600;
		letter-spacing:2px;

	}
	.allcon1divspan2{
		margin-left: 15px;
		margin-top: 10px;
		display:block;
		width:220px;
		font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
		height:20px;
		font-weight: normal;
		font-style: normal;
		letter-spacing:3px;
		font-size: 16px;
		color:#482819;
		float:left;

	}
	.allcon1divspan3{
		padding-left: 10px;
		margin-top:-10px;
		display:block;
		width:120px;
		height:40px;
		font-weight: normal;
		font-style: normal;
		font-size: 23px;
		color:#E12E32;
		float:right;
		display: block;
	}
	.allcon1divdiv{
		position:absolute;
		bottom:0px;
		left:454px;
		width:290px;
		height:67px;
		border:1px solid #fff;
		background: url(/home/images/allcse/xian.png) no-repeat center center;
		margin:0 auto;
	}
	.allcon1divdiv a{
		font-weight: normal;
		font-style: normal;
		font-size: 17px;
		color:#727272;
		display: block;
		width:115px;
		height:29px;
		border:1px solid #999;
		margin:0 auto;
		margin-top: 16px;
		line-height: 29px;
		border-radius:7px;
		text-align: center;
	}
	.allcon1divdiv a:hover {text-decoration:underline;padding-bottom: 2px} 
	.allcon2{
		width:100%;
		padding-bottom: 40px;
		overflow: hidden;
		background-color:#f5f5f5;
	}
	.allcon2_head{
		width:1200px;
		height:93px;
		margin:0 auto;
		text-align: center;
	}
	.allcon2_head span{
		font-size: 22px;
		color:#333;
		line-height: 113px;
		font-weight: normal;
		font-style: normal;
	}
	.allcon2_1{
		width:1200px;
		height:410px;
		margin:0 auto;
		overflow: hidden;
	}
	.allcon2_1_1{
		width:904px;
		height:410px;
		float:left;
	}
	.allcon2_1_2{
		width:296px;
		background-color:#fff;
		height:410px;
		float:right;
	}
	.allcon_1_2_1{
		width:270px;
		height:410px;
		float:right;
	}
	.allcon_1_2_1_0_0{
		width:270;
		float:right;
		height:73px;
		background:url(/home/images/allcse/a.png) no-repeat center center;
	}
	.allcon_1_2_1_0_1{
		width:270;
		float:right;
		height:73px;
		background:url(/home/images/allcse/b.png) no-repeat center center;
	}
	.allcon_1_2_1_0_2{
		width:270;
		float:right;
		height:73px;
		background:url(/home/images/allcse/c.png) no-repeat center center;
	}
	.allcon_1_2_1_0_0 span,.allcon_1_2_1_0_1 span,.allcon_1_2_1_0_2 span{
		display: block;
		font-weight: 600;
		font-style: normal;
		font-size: 20px;
		width:150px;
		height:20px;
		margin-left: 6px;
		margin-top: 40px;
		color:#666;
	}
	.allcon_1_2_1_2{
		width:265px;
		float:right;
		margin-top: 20px;
		height:200px;
	}
	.allcon_1_2_1_2span1{
		display: block;
		font-weight: normal;
		font-style: normal;
		font-size: 16px;
		color:#5C5C5C;
		width:215px;
		float:left;
		margin-top: 20px;
	}
	.allcon_1_2_1_2span2{
		display: block;
		width:240px;
		float:left;
		font-weight: normal;
		font-style: normal;
		font-size: 17px;
		color:#DF2F31;
		
	}
	.allcon_1_2_1_3{
		width:265px;
		height:50px;
		float:right;
		margin-top: 15px;
	}
	.allcon_1_2_1_3span1{
		margin-top: 18px;
		float:left;
		display: block;
		margin-right: 12px;
		font-weight: 600;
		font-size: 15px;
		color:#323232;
	}
	.allcon_1_2_1_3span2{
		line-height: 50px;
		font-weight: normal;
		font-style: normal;
		float:left;
		font-weight: 500;
		font-size: 30px;
		color:#E22D34;
	}

.win_2,.win_1,.win_0{
	
	width:904px;height:410px;margin:0px auto;position:relative;
	overflow: hidden;
}
.box_2,.box_1,.box_0{
	width:100%;height:100%;position: relative;
}
.box_2 div,.box_1 div,.box_0 div{
	width:100%;height: 100%;position: absolute;left:-100%;font-size: 70px;text-align: center;line-height: 300px;top:0;color:#fff;
}
.rightB_2,.rightB_1,.rightB_0{
		-moz-user-select:none;/*火狐*/
    	-webkit-user-select:none;/*webkit浏览器*/
    	-ms-user-select:none;/*IE10*/
    	-khtml-user-select:none;/*早期浏览器*/
      	user-select:none;
	width:40px;height:40px;font-size: 30px;color:#fff;background: rgba(0,0,0,0.5);position: absolute;right:0;top:45%;line-height:40px;text-align: center;cursor: pointer;display: block;font-family: "宋体";
}
.leftB_2,.leftB_1,.leftB_0{
		-moz-user-select:none;/*火狐*/
    	-webkit-user-select:none;/*webkit浏览器*/
    	-ms-user-select:none;/*IE10*/
    	-khtml-user-select:none;/*早期浏览器*/
      	user-select:none;
	width:40px;height:40px;font-size: 30px;color:#fff;background: rgba(0,0,0,0.5);position: absolute;left:0;top:45%;line-height:40px;text-align: center;cursor: pointer;display: block;font-family: "宋体";
}
	.allcon3{
		width:100%;
		height:376px;
		overflow: hidden;

		background-color: #fff;
	}
	.allcon3ul{
		width:1200px;
		height:284px;
		overflow: hidden;
		display:block;
		margin:0 auto;
	}
	.allconli1{
		width:294px;
		height:284px;
		display: block;
		overflow: hidden;
		position:relative;
		float:left;
	}
	.allconli2{
		width:295px;
		height:284px;
		display: block;
		overflow: hidden;
		float:left;
		margin-left: 7px;
		position:relative;
	}
	.allcon3ul li img{
		position: absolute;
		top:0;
		left:0;
		width:100%;
		height:100%;
	}
	.allcon3ul li div{
		width:70px;
		height:60px;
		position: absolute;
		top:112px;
		left:106px;
		text-align: center;
		background: rgba(0,0,0,0.5);
	}
	.allcon3ul li div {
		font-weight: normal;
		font-style: normal;
		font-size: 22px;
		line-height: 60px;
		color:#fff;
	}
	.allcon4{
		width:100%;
		height:692px;
		background-color: #fff;
	}
	.allcon4ul{
		width:499px;
		height:47px;
		margin:0 auto;
		overflow: hidden;
		display: block;
	}
	.allcon4li1{
		width:131px;
		height:22px;
		text-align: center;
		color:#656565;
		font-style: normal;
		font-weight: normal;
		float:left;
		font-size: 17px;
		line-height: 22px;
		cursor:pointer;
		border:1px solid #676767;
		-moz-user-select:none;/*火狐*/
    	-webkit-user-select:none;/*webkit浏览器*/
    	-ms-user-select:none;/*IE10*/
    	-khtml-user-select:none;/*早期浏览器*/
      	user-select:none;
	}
	.allcon4li2{
		width:131px;
		height:22px;
		text-align: center;
		color:#656565;
		font-style: normal;
		font-weight: normal;
		float:left;
		font-size: 17px;
		border:1px solid #676767;
		margin-left: 50px;
		cursor:pointer;
		line-height: 22px;
		-moz-user-select:none;/*火狐*/
    	-webkit-user-select:none;/*webkit浏览器*/
    	-ms-user-select:none;/*IE10*/
    	-khtml-user-select:none;/*早期浏览器*/
      	user-select:none;
		
	}
	#color{
		background-color: #E12E32;
		color:#fff;
		border:1px solid #E12E32;
	}
	.allcon4_1{
		width:100%;
		height:552px;
		position: relative;
	}
	.allcon4_1 img{
		width:100%;
		height:552px;
		top:0;
		left:0;
		position: absolute;
	}
	.con40_1_1,.con41_1_1,.con42_1_1{
		position: relative;
		width:1200px;
		height:552px;
		margin:0 auto;
	}
	.con40_1_1_1,.con41_1_1_1,.con42_1_1_1{
		width:400px;
		height:150px;
		float:left;
		margin-top: 398px;
		margin-left: 40px;

	}
	.con40_1_1_1 title,.con41_1_1_1 title,.con42_1_1_1 title{
		display: block;
		float:left;
		font-size: 53px;
		font-weight: normal;
		font-style: normal;
		color:#fff;
	}
	.con40_1_1_1 div,.con41_1_1_1 div,.con42_1_1_1 div{
		width:32px;
		height:10px;
		border-top:3px solid #E22E31;
		float:left;clear:both;
		margin-left: 5px;
		margin-top: -5px;
	}
	.con40_1_1_1 span,.con41_1_1_1 span,.con42_1_1_1 span{
		display:block;
		float:left;
		font-size: 16px;
		color:#FEFFFF;clear:both;		
		font-weight: normal;
		font-style: normal;
	}
	.con40_1_1_2,.con41_1_1_2,.con42_1_1_2{
		width:347px;
		height:552px;		

		float:right;
		background: rgba(0,0,0,0.6);
	}
	.con40_1_1_2 ul,.con41_1_1_2 ul,.con42_1_1_2 ul{
		display: block;
		overflow:hidden;
		width:347px;
		height:347px;
		margin-top: 125px;
	}
	.con40li1,.con41li1,.con42li1{
		display:block;
		width:347px;
		height:41px;
		font-weight: normal;
		font-style: normal;
		font-size: 18px;
		line-height: 40px;
		text-indent: 40px;
		color:#fff;
		-moz-user-select:none;/*火狐*/
    	-webkit-user-select:none;/*webkit浏览器*/
    	-ms-user-select:none;/*IE10*/
    	-khtml-user-select:none;/*早期浏览器*/
      	user-select:none;
		cursor:default;
	}
	.con40li2,.con41li2,.con42li2{
		-moz-user-select:none;/*火狐*/
    	-webkit-user-select:none;/*webkit浏览器*/
    	-ms-user-select:none;/*IE10*/
    	-khtml-user-select:none;/*早期浏览器*/
      	user-select:none;
		display:block;
		cursor:default;
		width:347px;
		height:41px;
		font-weight: normal;
		font-style: normal;
		font-size: 18px;
		line-height: 40px;
		margin-top: 20px;
		color:#fff;
		text-indent: 40px;
	}
	.con40_1_1_2 ul li:hover,.con41_1_1_2 ul li:hover,.con42_1_1_2 ul li:hover{
		background-color:#E12E32;
	}
	#con4index{
		background: #E12E32;
	}
	.allcon5{
		width:100%;
		height:475px;
		background:url(/home/images/allcse/di.png) no-repeat 100% 100%;
	}
	.allcon5 ul {
		width:550px;
		height:330px;
		margin:0 auto;
		display: block;
	}
	.con5li1{
		display:block;
		font-size: 22px;
		font-weight: 500;
		font-style: normal;
		text-align: center;
		color:#E22D32;
		padding-top: 45px;

		margin-bottom: 95px;
		letter-spacing:1px;
	}
	.con5li2{
		display:block;
		font-size: 22px;
		font-weight: 500;
		font-style: normal;
		text-align: center;
		color:#333;	
		line-height: 32px;
		letter-spacing:1px;
	}
	.con5li3{
		display:block;
		font-size: 22px;
		font-weight: 500;
		letter-spacing:1px;
		font-style: normal;
		text-align: center;
		color:#333;	
		margin-top: 20px;
	}
	.con5li4{
		display:block;
		font-size: 22px;
		font-weight: 500;
		letter-spacing:1px;
		font-style: normal;
		text-align: center;
		margin-top: 10px;
		color:#333;	
	}
</style>
@section('content')
<div class="all1">
	<div class="all1con">
		<div class="all1conn">
		
		<div class="alldiv">
		<span class="allspan1">699</span>
			<span class="allspan2">元/㎡</span>	
		</div>
		<span class="allapan3">从毛坯到精装</span>
		<div class="alldiv2">
		<span >千元的品质 &nbsp;一半的价格</span>
			
		</div>
		</div>
	</div>
</div>

<div class="allhead">
	<div class="allhead_1">
		<div class="allhead_1_1">
			<img  data-original="{{ asset('home/images/allcse/4.png') }}" alt="">
			<a href="{{ asset('/package/allcse') }}">全包套餐</a>
		</div>
		<div class="allhead_1_2">
			<img  data-original="{{ asset('home/images/allcse/3.png') }}" alt="">
			<a href="{{ url('package/softroll') }}">软包套餐</a>
		</div>
	</div>
</div>
<div class="allcon1">
	<div class="allcon11">
		<div class="allcon1head">
			<span class="allcon1span1">基准包 + 厨房包 + 卫浴包</span>
			<span class="allcon1span2">选择合适你的套餐厨房卫浴搭配</span>
			<ul class="allcon1ul" index="0">
				@if( isset($all) and count($all) >0 )
				@foreach( $all as $k => $v )
				<li @if( $loop->first ) class="allcon1li" @else class="allcon1li1" @endif>{{ $v->title }}</li>
				@endforeach
				@endif
				<!-- <li >厨房包</li>
				<li class="allcon1li1">卫浴包</li> -->
			</ul>
		</div>
		@if( isset($all) and count($all) >0 )
		@foreach( $all as $kk => $vv )
		<div  id="allcon1_{{ $kk }}" class="allcon1div" @if( $loop->first )  @else style="display:none" @endif >
			
			<ul class="allcon1divul">
				@if( isset($vv->zi) and count($vv->zi) >0 )
				@foreach( $vv->zi as $kkk => $vvv )
				<li  @if( $loop->first ) class="allcon1divli" @else class="allcon1divli1" @endif>

				<div class="allcon1divuldiv1">

				<img  src="{{ asset('uploads/all/img') }}/{{ $vvv->img }}" alt="" width="100%" height="333px">
				<span class="allcon1divspan1">{{ $vvv->title }}</span>
				<span class="allcon1divspan2">Comfortable package</span>
				<span class="allcon1divspan3">{{ $vvv->jia }}元</span>
				
				</div>
					<div class="allcon1divuldiv2">
						<span><p>{{ $vvv->con }}</p></span>
					</div>
				</li>
				@endforeach
				@endif
			</ul>
			<div class="allcon1divnone"  style="display:none">
				<div class="allcon1divnonediv" style="width:{{ $vv->width }}">
					@foreach($vv->pack as $c => $s)
					<ul>
						<title>{{$s->title}}</title>
						@foreach($s->pei as $l => $m)
						<li>{{$m->title}}</li>
						@endforeach
					</ul>
					@endforeach

					
				</div>
			</div>
			<div class="allcon1divdiv">
				<a href="javascript:void(0);">查看整装内容</a>
			</div>
		</div>
		@endforeach
		@endif

	
	</div>
</div>
<div class="allcon2">
	<div class="allcon2_head"><span>经典套餐推荐</span></div>
	
	@if( isset($age) and count($age) >0 )
	@foreach( $age as $i => $j )
	<div class="allcon2_1" @if( $loop->first )  @else style="margin-top:20px;"  @endif>
		<div class="allcon2_1_1">
			<div class="win_{{ $loop->index }}">
				<div class="box_{{ $loop->index }}">
					@foreach( $j->img as $m => $f )
					<div class="color{{ $loop->index + 1 }}" @if( $loop->first ) style="left:0" @endif ><img  data-original="{{ asset('uploads/all/pack/') }}/{{ $f }}" width="100%" height="100%" alt=""></div>
					@endforeach
	<!-- 				<div class="color{{ $loop->index + 1 }}"><img  data-original="{{ asset('home/images/allcse/11.png') }}" alt=""></div>
					<div class="color{{ $loop->index + 1 }}"><img  data-original="{{ asset('home/images/allcse/12.png') }}" alt=""></div> -->
				</div>
				<div class="leftB_{{ $loop->index }}">&lt;</div>
				<div class="rightB_{{ $loop->index }}">&gt;</div>
			</div>
		</div>
		<div class="allcon2_1_2">
			<div class="allcon_1_2_1">
				<div class="allcon_1_2_1_0_{{ $loop->index }}">
					<span>{{ $j->title }}</span>
				</div>
				<div class="allcon_1_2_1_2">
					<span class="allcon_1_2_1_2span2">{{ $j->path }}</span>
					<span class="allcon_1_2_1_2span1">{{ $j->con }}sda啊实打实大声道阿萨飒飒的啊实打实大声道啊实打实大声道啊啊啊大大</span>
				</div>
				<div class="allcon_1_2_1_3">
					<span class="allcon_1_2_1_3span1">¥</span>
					<span class="allcon_1_2_1_3span2">{{ $j->jia }}元</span>
				</div>
			</div>
		</div>
		
	</div>
	@endforeach
	@endif
	

</div>
<div class="allcon3">
	<div class="allcon2_head"><span>装修风格</span></div>
	<ul class="allcon3ul">
		<li class="allconli1"><img  data-original="{{ asset('home/images/allcse/13.png') }}" alt=""><a href="{{ url('/design/0') }}"><div style="display:none">简欧</div></a></li>
		<li class="allconli2"><img  data-original="{{ asset('home/images/allcse/14.png') }}" alt=""><a href="{{ url('/design/1') }}"><div style="display:none">现代</div></a></li>
		<li class="allconli2"><img  data-original="{{ asset('home/images/allcse/15.png') }}" alt=""><a href="{{ url('/design/2') }}"><div style="display:none">地中海</div></a></li>
		<li class="allconli2"><img  data-original="{{ asset('home/images/allcse/16.png') }}" alt=""><a href="{{ url('/design/3') }}"><div style="display:none">中式</div></a></li>
	</ul>
</div>

<div class="allcon4">
	<div class="allcon2_head"><span>装饰不同的家</span></div>
	<ul class="allcon4ul">
		<li id="color" class="allcon4li1">健康环保的家</li>
		<li class="allcon4li2">智能科技的家</li>
		<li class="allcon4li2">舒适人性的家</li>
	</ul>
	
	<div  id="con4index0" class="allcon4_1">
		<img  class="con40img" src="{{ asset('home/images/allcse/con40_3.png') }}" alt="">
		<div class="con40_1_1">
			<div class="con40_1_1_1" style="display:none">
				<title>01</title>
				<div></div>
				<span>绿色环保, 100%不含石棉、苯、甲醇等有害物质</span>
				<span>食用级辅助粘贴, A级防火, 防潮防水自洁效果好</span>
			</div>
			<div class="con40_1_1_1" style="display:none">
				<title>02</title>
				<div></div>
				<span>绿色环保, 100%不含石棉、苯、甲醇等有害物质</span>
				<span>食用级辅助粘贴, A级防火, 防潮防水自洁效果好</span>
			</div>
			<div class="con40_1_1_1" style="display:none">
				<title>03</title>
				<div></div>
				<span>绿色环保, 100%不含石棉、苯、甲醇等有害物质</span>
				<span>食用级辅助粘贴, A级防火, 防潮防水自洁效果好</span>
			</div>
			<div class="con40_1_1_1">
				<title>04</title>
				<div></div>
				<span>绿色环保, 100%不含石棉、苯、甲醇等有害物质</span>
				<span>食用级辅助粘贴, A级防火, 防潮防水自洁效果好</span>
			</div>
			
			<div class="con40_1_1_2">
				<ul>
					<li class="con40li1">全系标配德国进口都芳漆</li>
					<li class="con40li2">建商·定制除甲醇地板</li>
					<li class="con40li2">建商·定制美缝</li>
					<li id="con4index" class="con40li2">建商·定制踢脚线</li>
				</ul>
			</div>
		</div>
	</div>
	
	<div  id="con4index1" class="allcon4_1" style="display:none">
      <img  class="con41img" src="{{ asset('home/images/allcse/con41_3.png') }}" alt="">
		<div class="con41_1_1">
			<div class="con41_1_1_1" style="display:none">
				<title>01</title>
				<div></div>
				<span>绿色环保, 100%不含石棉、苯、甲醇等有害物质</span>
				<span>食用级辅助粘贴, A级防火, 防潮防水自洁效果好</span>
			</div>
			<div class="con41_1_1_1" style="display:none">
				<title>02</title>
				<div></div>
				<span>绿色环保, 100%不含石棉、苯、甲醇等有害物质</span>
				<span>食用级辅助粘贴, A级防火, 防潮防水自洁效果好</span>
			</div>
			<div class="con41_1_1_1" style="display:none">
				<title>03</title>
				<div></div>
				<span>绿色环保, 100%不含石棉、苯、甲醇等有害物质</span>
				<span>食用级辅助粘贴, A级防火, 防潮防水自洁效果好</span>
			</div>
			<div class="con41_1_1_1">
				<title>04</title>
				<div></div>
				<span>绿色环保, 100%不含石棉、苯、甲醇等有害物质</span>
				<span>食用级辅助粘贴, A级防火, 防潮防水自洁效果好</span>
			</div>
			
			<div class="con41_1_1_2">
				<ul>
					<li class="con41li1">感应灯</li>
					<li class="con41li2">静音锁</li>
					<li class="con41li2">小厨宝</li>
					<li id="con4index" class="con41li2">3M进水器</li>
					
				</ul>
			</div>
		</div>
	</div>
	
	<div  id="con4index2" class="allcon4_1" style="display:none">
		<img  class="con42img" src="{{ asset('home/images/allcse/con42_3.png') }}" alt="">
		<div class="con42_1_1">
			<div class="con42_1_1_1" style="display:none">
				<title>01</title>
				<div></div>
				<span>绿色环保, 100%不含石棉、苯、甲醇等有害物质</span>
				<span>食用级辅助粘贴, A级防火, 防潮防水自洁效果好</span>
			</div>
			<div class="con42_1_1_1" style="display:none">
				<title>02</title>
				<div></div>
				<span>绿色环保, 100%不含石棉、苯、甲醇等有害物质</span>
				<span>食用级辅助粘贴, A级防火, 防潮防水自洁效果好</span>
			</div>
			<div class="con42_1_1_1" style="display:none">
				<title>03</title>
				<div></div>
				<span>绿色环保, 100%不含石棉、苯、甲醇等有害物质</span>
				<span>食用级辅助粘贴, A级防火, 防潮防水自洁效果好</span>
			</div>
			<div class="con42_1_1_1">
				<title>04</title>
				<div></div>
				<span>绿色环保, 100%不含石棉、苯、甲醇等有害物质</span>
				<span>食用级辅助粘贴, A级防火, 防潮防水自洁效果好</span>
			</div>
			<div class="con42_1_1_1" style="display:none">
				<title>05</title>
				<div></div>
				<span>绿色环保, 100%不含石棉、苯、甲醇等有害物质</span>
				<span>食用级辅助粘贴, A级防火, 防潮防水自洁效果好</span>
			</div>
			
			<div class="con42_1_1_2">
				<ul>
					<li class="con42li1">晾衣架</li>
					<li class="con42li2">浴巾架</li>
					<li class="con42li2">智能消毒柜</li>
					<li id="con4index" class="con42li2">智能灶具</li>
					<li class="con42li2">一体马桶</li>
				</ul>
			</div>
		</div>
	</div>
</div>
<div class="allcon5">
	<ul>
		<li class="con5li1">标准化施工</li>
		<li class="con5li2">先进50/80施工管理, 五步放线, 施工层次分明</li>
		<li class="con5li2">水电隐蔽工程, 严格交底 定位一目了然</li>
		<li class="con5li3">安心售后, 质保到家</li>
		<li class="con5li4">专设售后专线/1分钟相应/2小时回复/24小时上门服务</li>
	</ul>
</div>
<script>
	$(".con40_1_1_2 > ul > li").on('click',function(){
		$(".con40_1_1_2 > ul > li").attr('id','');
		$(this).attr('id','con4index');
		$(".con40_1_1_1").css('display','none');
		var index = $(this).index();
	
		$(".con40img").attr('src',"/home/images/allcse/con40_"+index+'.png');
		$(".con40_1_1_1").eq(index).css('display','block');
	})
	$(".con41_1_1_2 > ul > li").on('click',function(){
		$(".con41_1_1_2 > ul > li").attr('id','');
		$(this).attr('id','con4index');
		$(".con41_1_1_1").css('display','none');
		var index = $(this).index();
	
		$(".con41img").attr('src',"/home/images/allcse/con41_"+index+'.png');
		$(".con41_1_1_1").eq(index).css('display','block');
	})
	$(".con42_1_1_2 > ul > li").on('click',function(){
		$(".con42_1_1_2 > ul > li").attr('id','');
		$(this).attr('id','con4index');
		$(".con42_1_1_1").css('display','none');
		var index = $(this).index();
	
		$(".con42img").attr('src',"/home/images/allcse/con42_"+index+'.png');
		$(".con42_1_1_1").eq(index).css('display','block');
	})

	$(".allcon4ul >li").on('click',function(){
		$(".allcon4ul >li").attr('id','index')
		$(this).attr('id','color');
		$(".allcon4_1").css('display','none');
		var index = $(this).index();
		$("#con4index"+index).css('display','block');
	})

	$(".allcon3ul > li").hover(function(){
		$(this).find("div").css('display','block');
	},function(){
		$(this).find("div").css('display','none');
	})
	
$(function(){
	var win=$(".win_0");
	var divs=$(".box_0 div");
	var num1=0;  //ǰݵ±
	var num2=0;
	$(".rightB_0").click(function(){

		divs.stop(true,true);
		var temp=num1;
		num1--;
		if(num1==-1){
			num1=2;
		}
		divs.eq(num1).css("left",904).animate({left:0});
		divs.eq(temp).animate({left:-904});
	});
	$(".leftB_0").click(function(){
	
		divs.stop(true,true);
		// divs.finish();
		var temp=num1;
		num1++;
		if(num1==3){
			num1=0;
		}
		divs.eq(num1).css("left",-904).animate({left:0});
		divs.eq(temp).animate({left:904});
	});
})

$(function(){
	var win=$(".win_1");
	var divs=$(".box_1 div");
	var num1=0; 
	var num2=0;
	$(".rightB_1").click(function(){

		divs.stop(true,true);
		var temp=num1;
		num1--;
		if(num1==-1){
			num1=2;
		}
		divs.eq(num1).css("left",904).animate({left:0});
		divs.eq(temp).animate({left:-904});
	});
	$(".leftB_1").click(function(){
	
		divs.stop(true,true);
		// divs.finish();
		var temp=num1;
		num1++;
		if(num1==3){
			num1=0;
		}
		divs.eq(num1).css("left",-904).animate({left:0});
		divs.eq(temp).animate({left:904});
	});
})
$(function(){
	var win=$(".win_2");
	var divs=$(".box_2 div");
	var num1=0;  //ǰݵ±
	var num2=0;
	$(".rightB_2").click(function(){

		divs.stop(true,true);
		var temp=num1;
		num1--;
		if(num1==-1){
			num1=2;
		}
		divs.eq(num1).css("left",904).animate({left:0});
		divs.eq(temp).animate({left:-904});
	});
	$(".leftB_2").click(function(){
	
		divs.stop(true,true);
		// divs.finish();
		var temp=num1;
		num1++;
		if(num1==3){
			num1=0;
		}
		divs.eq(num1).css("left",-904).animate({left:0});
		divs.eq(temp).animate({left:904});
	});
})

$("#ul1 > li").on('clcik',function(){
	//设置所以LI标签不显示
	$("#ul1 > li").find("a").css('display','noen');
	//设置当前元素显示
	$(this).find("a").css('display','block');
})

$('.allcon1ul > li').on('click',function(){
			var index = $('.allcon1ul').attr('index');
			if( index ==1 )
			{
				$('.allcon1divnone').css('display','block');
			}
			if( index ==0 )
			{
				$('.allcon1divnone').css('display','none');

			}
			$('.allcon1ul > li').css('color','#666');
			$('.allcon1ul > li').css('background-color','#fff');
			$('.allcon1ul > li').css('border','1px solid #666');
			$(this).css('color','#fff');
			$(this).css('background-color','#E12E32');
			$(this).css('border','1px solid #E12E32');

			var index = $(this).index();
			$(".allcon1div").css('display','none');
			$("#allcon1_"+index).css('display','block');

		});
			$(".allcon1divul li").hover(
				function () {

					$(this).find('.allcon1divuldiv2').css('display','block');
				},
				function () {
					$(this).find('.allcon1divuldiv2').css('display','none');
				}
			);

			$(".allcon1divdiv a").on('click',function(){
				var css = $(this).parents('.allcon1div').find('.allcon1divnone').css('display');

				$(this).parents('.allcon1div').find('.allcon1divnone').slideToggle(300);
				if( css == 'none' )
				{
					$('.allcon1ul').attr('index',1);
				}
				if( css == 'block' )
				{
					$('.allcon1ul').attr('index',0);
				}
				
			})
			 $(function() {

      		$("img").lazyload({effect: "fadeIn"});
     		 $("img").lazyload({ threshold :180});
			});
</script>
@endsection('content')
