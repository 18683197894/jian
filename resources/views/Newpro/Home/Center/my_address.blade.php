@extends('Newpro.Home.publiccenter')

@section('css')
<link rel="stylesheet" href="{{ asset('new/home/center/my_address.css') }}">
@endsection('css')

@section('content')
<div class="contact_right">
        <div class="title">收货地址</div>
        <div class="address">
        @foreach($address as $k => $v)
            <div class="loop" index="{{ $v->id }}">
                <div class="name">{{ $v->name }}</div>
                <div class="Telephone">{{ $v->phone }}</div>
                <div class="dizhi">{{ $v->shen.' '.$v->shi.' '.$v->qu.' '.$v->tails }}</div>
                <div class="shanc">
                    <a href="javascript:;">删除</a>
                    <a href="javascript:;" class="bianji">编辑</a>
                </div>
            </div>
        @endforeach
            <div class="loop add">
                <img src="{{ asset('/new/home/center/img/address.png') }}" alt=""/>
                <div class="add_n">添加新地址</div>
            </div>
            <div style="display:none" class="loop addressspan" index="00">
                <div class="name"></div>
                <div class="Telephone"></div>
                <div class="dizhi"></div>
                <div class="shanc">
                    <a href="javascript:;">删除</a>
                    <a href="javascript:;" class="bianji">编辑</a>
                </div>
            </div>
        </div>
        <div class="fill">
            <div class="loop">
                <input type="text" name="name" placeholder="请输入姓名"/>
                <input type="text" name="phone" placeholder="请输入电话"/>
                <div class="sanjild">
                    <div class="linkage shen" >
                        <div class="selected">选择省</div>
                        <ul class="down">
                        @foreach($shens as $k => $v)
                            <li>
                                <a  href="javascript:;" title="{{ $v->name }}"  index="{{ $v->id }}">{{ $v->name }}</a>
                            </li>
                        @endforeach
                        </ul>
                    </div>
                    <div class="linkage shi">
                        <div class="selected">选择市</div>
                        <ul class="down">
                            <li>
                                <a href="javascript:;">选择市</a>
                            </li>
                        </ul>
                    </div>
                    <div class="linkage qu">
                        <div class="selected">选择区</div>
                        <ul class="down">
                            <li>
                                <a href="javascript:;">选择区</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <input type="text" name="tails" placeholder="请输入地址"/>
                <input type="text" name="zipcode" placeholder="请输入邮编"/>

            </div>
            <div class="bott">
                <button>确定</button>
                <button style="display:none">更新</button>
                <button class="cancel">取消</button>
            </div>
        </div>
    </div>
@endsection('content')

@section('js')
<script src="{{ asset('new/home/center/my_address.js') }}"></script>
@endsection('js')