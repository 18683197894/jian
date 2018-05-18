@extends('Newpro.Home.public')

@section('css')
<link rel="stylesheet" href="{{ asset('/new/home/product/productindex.css') }}">
@section('css')

@section('content')
<div class="banner">
    <img src="{{ asset('/new/home/product/img/Product_bannrr.jpg') }}" alt=""/>
</div>
<div class="Product_Show">
    <div class="Title">
        <div class="name">产品展示</div>
        <div class="En">Prouduct Display</div>
        <i class="xh"></i>
    </div>
    @if(count($product) > 0)
    <div class="Sort">
      	@foreach($product as $k => $v)
        <a href="javascript:;" @if( $avtive == $v->title ) class="avtive" @endif>
            <img src="{{ asset('/uploads/product/img') }}/{{ $v->imgs[0] }}" alt="建商产品展示" class="default"/>
            <img src="{{ asset('/uploads/product/img') }}/{{ $v->imgs[1] }}" alt="建商产品展示" class="hove"/>
            <span class="name">{{ $v->title }}</span>
        </a>
      	@endforeach

    </div>
    <div class="content">

        @foreach($product as $k => $v)
        <div  class="Loop @if( $avtive == $v->title )  avtive @endif"  >
           @if(count($v->goods) > 0)
            @foreach($v->goods as $kk => $vv)
            <a href="{{ url('/newpro/product/play') }}/{{ $vv->id }}">
                <img src="{{ asset('/uploads/product/img/') }}/{{ $vv->img }}" alt="{{ $vv->title }}"/>
                <div class="word">
                    <div class="name">{{ $vv->title }}</div>
                    <div class="msg">
                        描述：{{ $vv->remarks }}
                    </div>
                    <div class="hvcon">
                        <div class="box">
                            <span class="more">VIEW MORE</span>
                            <div class="hvtit">
                                {{ $vv->title }}
                            </div>
                            <div class="hvwz">
                                描述： {{ $vv->remarks }}
                            </div>
                        </div>
                    </div>
                </div>
            </a>
			@endforeach
			@else
           <div class="on">暂无产品</div>
			@endif

        </div>
		@endforeach
    </div>
    @endif
</div>
@endsection('content')

@section('js')
<script src="{{ asset('/new/home/product/productindex.js') }}"></script>
@endsection('js')