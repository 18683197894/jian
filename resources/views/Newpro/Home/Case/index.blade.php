@extends('Newpro.Home.public')

@section('css')
<link rel="stylesheet" href="{{ asset('/new/home/case/case.css') }}">
@endsection('css')

@section('content')
<div class="Case">
    <div class="title">
        <div class="auto">
            <a href="javascript:;" class=" @if($set==1) avtive @endif  dians" >完整案例</a>
            <a href="javascript:;" class=" @if($set==2) avtive @endif dians" >在建案例</a>
        </div>
    </div>
   
    <div class="contact">
        <div id="wan" class="Choice @if($set==1) avtive @endif">
            <div class="Choice_type">
                <div class="Choice_type1 wan1">
                    <div class="type_left">户型</div>
                    <div class="type_right">
                    	@foreach($arr[0] as $k => $v)
                        <a href="javascript:;"  >{{ $v }}</a>
                        @endforeach
                    </div>
                </div>
                <div class="Choice_type2 wan2">
                    <div class="type_left">风格</div>
                    <div class="type_right">
                        @foreach($arr[1] as $k => $v)
                        <a href="javascript:;"  >{{ $v }}</a>
                        @endforeach
                    </div>
                </div>
                <div class="Choice_type3 wan3">
                    <div class="type_left">预算</div>
                    <div class="type_right">
                        @foreach($arr[2] as $k => $v)
                        <a href="javascript:;"  >{{ $v }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="lookup">完整案列共找到 <span class="wancount">{{ $countwan }}</span>个</div>
            <div class="lookup wantui" @if($countwan <= 0) style="display:block" @else style="display:none" @endif>其他案例推荐</div>
			
            <div class="show">
            
            	@foreach($wan as $k => $v)
                <a href="{{ url('/newpro/case/play/') }}/{{ $v->id }}">
                    <div class="show_auto">
                        <img src="{{ asset('/uploads/case/img/') }}/{{ $v->img }}" alt="{{ $v->title }}"/>
                        <div class="show_name">
                            <div class="name">{{ $v->title }}</div>
                            <div class="norms"><span>{{ $v->huxing }}</span><span>{{ $v->fengge }}</span><span>{{ $v->yusuan }}</span></div>
                        </div>
                    </div>
                </a>
                @endforeach
           </div>
           <div class="page">
			{{ $wan->links() }}
           	
           </div>
			
            
        </div>
        
        <div id="zai" class="Choice NO2 @if($set==2) avtive @endif">
            <div class="Choice_type">
                <div class="Choice_type1 zai1">
                    <div class="type_left">户型</div>
                    <div class="type_right">
                    	@foreach($arr[0] as $k => $v)
                        <a href="javascript:;"  >{{ $v }}</a>
                        @endforeach
                    </div>
                </div>
                <div class="Choice_type2 zai2">
                    <div class="type_left">风格</div>
                    <div class="type_right">
                        @foreach($arr[1] as $k => $v)
                        <a href="javascript:;"  >{{ $v }}</a>
                        @endforeach
                    </div>
                </div>
                <div class="Choice_type3 zai3">
                    <div class="type_left">预算</div>
                    <div class="type_right">
                        @foreach($arr[2] as $k => $v)
                        <a href="javascript:;"  >{{ $v }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="lookup">在建案例共找到 <span class="zaicount">{{ $countzai }}</span>个</div>
            <div class="lookup zaitui" @if($countzai <= 0) style="display:block" @else style="display:none" @endif>其他案例推荐</div>
            
            <div class="show">
            @foreach($zai as $k => $v)
                <a href="{{ url('/newpro/case/zaiplay/') }}/{{ $v->id }}">
                    <div class="show_auto">
                        <img src="{{ asset('/uploads/case/img/') }}/{{ $v->img }}" alt="{{ $v->title }}"/>
                        <div class="show_name">
                            <div class="show_name_title">{{ $v->title }}</div>
                            <div class="con_span">
                                <span>{{ $v->huxing }}</span>
                                <span>{{$v->fengge}}</span>
                                <span>{{$v->yusuan}}</span>
                            </div>
                            <div class="Speed">
                                <div class="loop @if($v->or >=1) avtive @endif">
                                    <em></em>
                                    <span>准备开工</span>
                                </div>
                                <div class="loop @if($v->or >=2) avtive @endif">
                                    <em></em>
                                    <span>水电阶段</span>
                                </div>
                                <div class="loop @if($v->or >=3) avtive @endif">
                                    <em></em>
                                    <span>瓦木阶段</span>
                                </div>
                                <div class="loop @if($v->or >=4) avtive @endif">
                                    <em></em>
                                    <span>油漆阶段</span>
                                </div>
                                <div class="loop ">
                                    <em></em>
                                    <span>竣工阶段</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
               @endforeach
                
            </div>
            <div class="dian" count="{{ $countzai }}" num="{{ $zai->count() }}" @if($countzai > $zai->count()) style="display:block" @else style="display:none" @endif>
				<button class="button1">点击加载更多</button>
				<button class="button2" style="display:none">暂无更多内容</button>
				</div>
			
        </div>
    </div>
</div>
@endsection('content')

@section('js')
<script src="{{ asset('/new/home/case/case.js') }}"></script>
@endsection('js')

<!-- <ul class="pagination">   
        <li class="disabled"><span>上一页</span></li>   
        <li class="active"><span>1</span></li>
        <li><a href="http://www.zheng.com/newpro/case/index?page=2">2</a></li> 
        <li><a href="http://www.zheng.com/newpro/case/index?page=2" rel="next">下一页</a></li>
</ul> -->