@extends('heads')

@section('css')
<link href="{{ asset('home/images/softroll/common.css') }}" rel="stylesheet" type="text/css" />


@endsection('css')

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
		<!-- <div class="allhead_1_1">
			<img src="{{ asset('home/images/allcse/2.png') }}" alt="">
			<a href="{{ asset('/package/allcse') }}">全包套餐</a>
		</div> -->
		<div class="allhead_1_2" style="margin-right:135px">
			<img src="{{ asset('home/images/allcse/5.png') }}" alt="">
			<a href="javascript:return false" >软包套餐</a>
		</div>
	</div>
</div>
     <div class="rb-con">
	       <div class="rb-tit">完美软装才是家</div>
		   <div class="rb-si">
		       <ul>
			      <li><img src="{{ asset('home/images/softroll//rz-1.png') }}" width="295" /><b>汇聚全球一线设计师</b><p>遵循人体工学原理<br>完美搭配，舒适家享受</p></li>
				  <li><img src="{{ asset('home/images/softroll//rz-2.png') }}" width="295" /><b>坚持原材料和产地可追溯</b><p>经验丰富的产品设计 、采购、研发团队，选材优质，产品可靠</p></li>
				  <li><img src="{{ asset('home/images/softroll//rz-3.png') }}" width="295" /><b>严苛的生产工艺</b><p>层层监督，严格把控<br>工艺考究，品质有保障</p></li>
				  <li><img src="{{ asset('home/images/softroll//rz-4.png') }}" width="295" /><b>整合全球一线供应商</b><p>F2C直采，省去中间环节<br>高性价比，直供到家</p></li>
			   </ul>
		   </div>

		   <!--套餐明细 begin-->
@if( !empty($arr1) and count($arr1) >0 )
		   <div class="rb-taocan">
		         <div class="rb-taocan-tit">时尚包</div>
                    <div class="ztabmenu7">
                       <ul>
@foreach($arr1 as $k => $v)

                          <li class="
@if($loop->first)
zcli
@endif
                   		  ">{{ $v->title }}</li>

@endforeach()
	           </ul>
                   </div>
		            
		            <div id="ztabcontent1">
@foreach($arr1 as $kk => $vv)
				    
					    <ul class="ztb" 
@if($loop->first)
style="display:block"
@else
style="display:none"
@endif
					    >
						   <li>
						      <div class="rb-tc-img1 rb-tc-img1-1">
						      	<img src="{{ asset('uploads/ruan/img/') }}/{{ $vv->img }}" alt="">
						      		<span class="rb-div">
						    		  <h2>{{ $vv->con }}</h2>
						    		  {{ $vv->content }}
						    		</span>
						      </div>
							  <div class="taocannei">
							    
							   <span>
							    @foreach($vv->cc as $kkk => $vvv)
							    	@if($vvv->pid == $vv->id)
                                      
                                      <a href="javascript: void(0)" index="{{ $vvv->id }}" id="M{{ $loop->index }}"
									@if($loop->first)
									class="menu2"
									@else
									class="menu1"
									@endif
                                      >{{ $vvv->title }}</a>
                                   
                                    @endif
         						@endforeach
         						</span>
								 		  			  
							  </div>
						   </li>
						   					<div id="C0">
					 <div class="c0-tit"><span class="c0-tit-1">{{ $vv->tit }}包含项目</span><span class="c0-tit-2">规格</span><span class="c0-tit-3">材质</span><span class="c0-tit-4">数量</span></div>
				    <div class="c0-con">
				    @foreach($vv->ss as $i =>$j)
					<p><span class="c0-tit-51">{{ $j->title }}</span><span class="c0-tit-52">{{ $j->specations }}</span><span class="c0-tit-53">{{ $j->brand }}</span><span class="c0-tit-54">{{ $j->num }}</span></p>
					@endforeach                             
					</div>   
					 </div>
						
						</ul>

@endforeach()


					</div>
		   						

		   </div> 				

@endif
<!-- **************** -->
@if( !empty($arr2) and count($arr2) >0 )
		   <div class="rb-taocan">
		         <div class="rb-taocan-tit">质享包</div>
                    <div class="ztabmenu8">
                       <ul>
@foreach($arr2 as $k => $v)

                          <li class="
@if($loop->first)
zcli
@endif
                   		  ">{{ $v->title }}</li>

@endforeach()
	           </ul>
                   </div>
		            
		            <div id="ztabcontent2">
@foreach($arr2 as $kk => $vv)
				    
					    <ul class="ztb" 
@if($loop->first)
style="display:block"
@else
style="display:none"
@endif
					    >
						   <li>
						      <div class="rb-tc-img1 rb-tc-img1-1">
						      	<img src="{{ asset('uploads/ruan/img/') }}/{{ $vv->img }}" alt="">
						      		<span class="rb-div">
						    		  <h2>{{ $vv->con }}</h2>
						    		  {{ $vv->content }}
						    		</span>
						      </div>
							  <div class="taocannei">
							    
							   <span>
							    @foreach($vv->cc as $kkk => $vvv)
							    	@if($vvv->pid == $vv->id)
                                      
                                      <a href="javascript: void(0)" index="{{ $vvv->id }}" id="M{{ $loop->index }}"
									@if($loop->first)
									class="menu2"
									@else
									class="menu1"
									@endif
                                      >{{ $vvv->title }}</a>
                                   
                                    @endif
         						@endforeach
         						</span>
								 		  			  
							  </div>
						   </li>
					<div id="C0">
					 <div class="c0-tit"><span class="c0-tit-1">{{ $vv->tit }}包含项目</span><span class="c0-tit-2">规格</span><span class="c0-tit-3">材质</span><span class="c0-tit-4">数量</span></div>
				    <div class="c0-con">
				    @foreach($vv->ss as $i =>$j)
					<p><span class="c0-tit-51">{{ $j->title }}</span><span class="c0-tit-52">{{ $j->specations }}</span><span class="c0-tit-53">{{ $j->brand }}</span><span class="c0-tit-54">{{ $j->num }}</span></p>
					@endforeach                             
					</div>   
					 </div>
						
						</ul>

@endforeach()


					</div>
		   						

		   </div> 				

@endif

<!-- **************** -->
@if( !empty($arr3) and count($arr3) >0 )
		   <div class="rb-taocan">
		         <div class="rb-taocan-tit">臻藏包</div>
                    <div class="ztabmenu9">
                       <ul>
@foreach($arr3 as $k => $v)

                          <li class="
@if($loop->first)
zcli
@endif
                   		  ">{{ $v->title }}</li>

@endforeach()
	           </ul>
                   </div>
		            
		            <div id="ztabcontent3">
@foreach($arr3 as $kk => $vv)
				    
					    <ul class="ztb" 
@if($loop->first)
style="display:block"
@else
style="display:none"
@endif
					    >
						   <li>
						      <div class="rb-tc-img1 rb-tc-img1-1">
						      	<img src="{{ asset('uploads/ruan/img/') }}/{{ $vv->img }}" alt="">
						      		<span class="rb-div">
						    		  <h2>{{ $vv->con }}</h2>
						    		  {{ $vv->content }}
						    		</span>
						      </div>
							  <div class="taocannei">
							    
							   <span>
							    @foreach($vv->cc as $kkk => $vvv)
							    	@if($vvv->pid == $vv->id)
                                      
                                      <a href="javascript: void(0)" index="{{ $vvv->id }}" id="M{{ $loop->index }}"
									@if($loop->first)
									class="menu2"
									@else
									class="menu1"
									@endif
                                      >{{ $vvv->title }}</a>
                                   
                                    @endif
         						@endforeach
         						</span>
								 		  			  
							  </div>
						   </li>
					<div id="C0" style="padding-bottom:60px;">
					 <div class="c0-tit"><span class="c0-tit-1">{{ $vv->tit }}包含项目</span><span class="c0-tit-2">规格</span><span class="c0-tit-3">材质</span><span class="c0-tit-4">数量</span></div>
				    <div class="c0-con">
				    @foreach($vv->ss as $i =>$j)
					<p><span class="c0-tit-51">{{ $j->title }}</span><span class="c0-tit-52">{{ $j->specations }}</span><span class="c0-tit-53">{{ $j->brand }}</span><span class="c0-tit-54">{{ $j->num }}</span></p>
					@endforeach                             
					</div>   
					 </div>
						
						</ul>

@endforeach()


					</div>
		   						

		   </div> 				

@endif

		  <!--套餐明细 over--> 
	 </div>
@endsection('content')

@section('js')
	<script src="{{ asset('home/images/softroll/common.js') }}"></script>

@endsection('js')