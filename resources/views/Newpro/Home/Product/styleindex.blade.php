@extends('Newpro.Home.publicused')

@section('css')
<link rel="stylesheet" href="{{ asset('/new/home/product/styleindex.css') }}">
@endsection('css')

@section('content')
<div class="banner">
    <div class="contact">
        <div class="money">
            <span class="Num">699</span>
            <span class="Company">元/㎡</span>
        </div>
        <div class="reach">从毛坯到精装</div>
        <div class="quality">千元的品质  一半的价格</div>
    </div>
</div>

<div class="Soft_title">
    <div class="auto">
        <img src="{{ asset('/new/home/product/img/Soft_title.png') }}" alt=""/>
        <a href="javascript:;">建商家装</a>
    </div>
</div>
<div class="Soft_home">
    <div class="perfect">
        <div class="title">完美软装才是家</div>
        <div class="perfect_rb">
            <a href="javascript:;">
                <img src="{{ asset('/new/home/product/img/rz-1.png') }}" alt=""/>
                <div class="name">汇聚全球一线设计师</div>
                <div class="contact">遵循人体工学原理完美搭配，舒适家享受</div>
            </a>
            <a href="javascript:;">
                <img src="{{ asset('/new/home/product/img/rz-2.png') }}" alt=""/>
                <div class="name">坚持原材料和产地可追溯</div>
                <div class="contact">经验丰富的产品设计 、采购、研发团队，选材优质，产品可靠</div>
            </a>
            <a href="javascript:;">
                <img src="{{ asset('/new/home/product/img/rz-3.png') }}" alt=""/>
                <div class="name">严苛的生产工艺</div>
                <div class="contact">层层监督，严格把控,工艺考究，品质有保障</div>
            </a>
            <a href="javascript:;">
                <img src="{{ asset('/new/home/product/img/rz-4.png') }}" alt=""/>
                <div class="name">整合全球一线供应商</div>
                <div class="contact">F2C直采，省去中间环节,高性价比，直供到家</div>
            </a>
        </div>
    </div>
    @if(count($data) > 0)
    @foreach($data as $k => $v)
    <div class="fashion one{{ $loop->index + 1 }}">
        <div class="title">{{ $v->title }}</div>
        <div class="contact">
            <div class="Style">
                @foreach($v->style as $kk => $vv)
                <a href="javascript:;"@if($loop->first) class="avtive" @endif>{{ $vv->title }}</a>
                @endforeach
            </div>
            <div class="detailed">
                @if(count($v->style) >0 )
                @foreach($v->style as $kkk => $vvv)
                <div class="detailed_img @if( $loop->first ) avtive @endif">
                    <div class="detailed_top NO{{ $loop->index + 1 }}" style="background: url('{{ asset('/uploads/ruan/img/'.$vvv->img) }}');">
                        <div class="introduce">
                            <div class="title">{{ $vvv->con }}</div>
                            <div class="neirong">
                                {{ $vvv->content }}
                            </div>
                        </div>
                    </div>
                    <ul>
                        <li>
                            <div class="Choice">选择</div>
                            <div class="Housing">套餐名</div>
                            <div class="Package">套餐包说明</div>
                            <div class="Price">套餐价格（人民币）</div>
                        </li>
                        @if(count($vvv->door) > 0)
                        @foreach($vvv->door as $kkkk => $vvvv)
                        <li>
                            <div class="Choice"><input type="radio" value="{{ $vvvv->id }}" index="main"  feel="{{ $vvvv->main }}" name="Choice{{ $v->id }}"> </input></div>
                            <div class="Housing">{{ $vvvv->title }}/主流品牌</div>
                            <div class="Package">（{{ $vvvv->mains }}）</div>
                            <div class="Price">{{ $vvvv->main }}元</div>
                        </li>
                        @if($vvvv->nomain != null)
                        <li>
                            <div class="Choice"><input type="radio" value="{{ $vvvv->id }}" index="nomain" feel="{{ $vvvv->nomain }}" name="Choice{{ $v->id }}"> </input></div>
                            <div class="Housing">{{ $vvvv->title }}/非主流品牌</div>
                            <div class="Package">（{{$vvvv->nomains}}）</div>
                            <div class="Price">{{ $vvvv->nomain }}元</div>
                        </li>
                        @endif
                        @if($vvvv->model != null)
                        <li>
                            <div class="Choice"><input type="radio" value="{{ $vvvv->id }}" index="model" feel="{{ $vvvv->model }}" name="Choice{{ $v->id }}"> </input></div>
                            <div class="Housing">{{ $vvvv->title }}/样板间</div>
                            <div class="Package">（{{$vvvv->models}}）</div>
                            <div class="Price">{{ $vvvv->model }}元</div>
                        </li>
                        @endif
                        <li>
                            <div class="Choice"><input type="radio" value="{{ $vvvv->id }}" index="qing" feel="{{ $qing }}" name="Choice{{ $v->id }}"> </input></div>
                            <div class="Housing">{{ $vvvv->title }}/清水房</div>
                            <div class="Package">（含硬装，厨房地柜，吊柜，卫生间洁柜）</div>
                            <div class="Price">{{ $qing }}元 / 每平方</div>
                        </li>
                        @endforeach
                        @endif
                    </ul>
                    <div class="purchase">
                        <div class="auto">
                            <span>￥</span>
                            <span>0</span>
                            <a @if(!session('Home')) href="{{ url('/newpro/login?path=') }}{{ $path }}" @else href="javascript:;" class="paygou" @endif >加入购物车</a>
                            <a @if(!session('Home')) href="{{ url('/newpro/login?path=') }}{{ $path }}" @else href="javascript:;" class="paygou" @endif href="javascript:;">去支付</a>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
                
            </div>
        </div>
    </div>
    @endforeach
    @endif
</div>


@endsection('content')

@section('js')
<script src="{{ asset('/new/home/product/styleindex.js') }}"></script>
            <script>
            $("input[type='radio']").on('click',function(){
                var money = $(this).attr('feel');
                $(this).parents('.fashion').find('.auto > span ').eq(1).html(money);
            });
                $('.paygou').on('click',function(){
                    var id = $(this).parents('.fashion').find("input[type='radio']:checked").val();
                    var ors = $(this).parents('.fashion').find("input[type='radio']:checked").attr('index');
                    if(id == null || ors == null)
                    {
                        alert('请先选择产品!');
                        return false;
                    }
                    $.ajax('/newpro/style/paygouajax',{
                        type : 'post',
                        data : {id:id,ors:ors,_token:$("meta[name='csrf-token']").attr('content')},
                        success : function(data)
                        {   
                            if(data == 1 )
                            {
                                alert('加入购物车成功！');
                            }
                            if(data == 2)
                            {
                                alert('加入购物车失败!');
                            }
                            if(data == 3)
                            {
                                alert('未登入!');
                                window.location.href="/newpro/login?path=/newpro/style";
                            }
                        },
                        error : function(data)
                        {
                            alert('购物车加入失败！');
                            return false;
                        }
                    })
                })
            </script>
@endsection('js')