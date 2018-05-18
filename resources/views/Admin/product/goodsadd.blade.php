@extends('Admin.index')

@section('css')

@endsection('css')

@section('content')
<section class="content-header">
      <h1>
        {{ $pdata->title }} -- 产品添加
        <!-- <small>Control panel</small> -->

      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/newpro/index/package/product/goodsindex/') }}/{{ $pdata->id }}"><i class="fa fa-dashboard"></i>产品列表</a></li>
        <li class="active">添加产品</li>
      </ol>
    </section>

            <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
       @if (session('info'))
        <div style="height:30px; line-height:30px;" class="alert-danger">
        {{ session('info') }}
        </div>
      @endif
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div class="file_add" style="display:none">
            <div class="form-group" index="1">
                  <label for="exampleInputFile">展示图片1（必选 默认为列表展示图片）</label>
                  <input type="file" name="xxx" id="exampleInputFile">
                </div>
              
            </div>
            <form role="form" action="{{ url('/newpro/index/package/product/goodsadds') }}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
              <div class="box-body">
               
                <div class="form-group">
                  <label for="exampleInputEmail1">产品名称：</label>
                  <input type="hidden" name="pid" value="{{ $pdata->id }}">
                  <input type="text"  name="title" value="{{ old('title') }}" class="form-control" id="exampleInputEmail1" placeholder="产品名称">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">品牌：</label>
                  <input type="text"  name="brand" value="{{ old('brand') }}" class="form-control" id="exampleInputEmail1" placeholder="品牌">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">型号：</label>
                  <input type="text"  name="model" value="{{ old('model') }}" class="form-control" id="exampleInputEmail1" placeholder="型号">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">规格：</label>
                  <input type="text"  name="spec" value="{{ old('spec') }}" class="form-control" id="exampleInputEmail1" placeholder="规格">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">数量：</label>
                  <input type="text"  name="num" value="{{ old('num') }}" class="form-control" id="exampleInputEmail1" placeholder="数量">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">描述：</label>
                  <input type="text"  name="remarks" value="{{ old('remarks') }}" class="form-control" id="exampleInputEmail1" placeholder="描述">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">网页标题</label>
                  <input type="text"  name="titles" value="{{ old('titles') }}" class="form-control" id="exampleInputEmail1" placeholder="网页标题">
                </div>
                
                <div class="form-group">
                  <label>网页关键字</label>
                  <textarea class="form-control" name="keyworlds" rows="2" placeholder="网页关键字 ...">{{ old('keyworlds') }}</textarea>
                </div>

                <div class="form-group">
                  <label>网页内容描述</label>
                  <textarea class="form-control" name="description" rows="2" placeholder="网页内容描述 ...">{{ old('description') }}</textarea>
                </div>
              

                <div class="form-group" index="1">
                  <label for="exampleInputFile">展示图片1（必选 默认为列表展示图片）</label>
                  <input type="file" name="titleimg1" id="exampleInputFile">
                </div>

                 <div class="form-group add"><label for="exampleInputFile"><button Onclick="return false">+</button></label></div>

      
              </div>
              <!-- /.box-body -->
	           <div style="width:900px">
                @include('UEditor::head')
                <script id="container" name="content" type="text/plain" >
                @php
                  echo old('content');
                @endphp
                </script> 
            </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">添加</button>
              </div>
            </form>
          </div>
          </div>
@endsection('content')

@section('js')
<script type="text/javascript">
    var ue = UE.getEditor('container')
        ue.ready(function() {
        ue.execCommand('serverparam', '_token', '{{ csrf_token() }}');//此处为支持laravel5 csrf ,根据实际情况修改,目的就是设置 _token 值.    
        
    });
</script> 

<script>
  $(".add").on('click',function(){
    var div = $('.file_add > .form-group').clone(true);
    var index = Number(div.attr('index')) + 1;
    $('.file_add > .form-group').attr('index',index);
    if(index >= 9)
    {
      alert('超出限制！');
      return false;
    }
    div.attr('index',index)
    div.find('label').html('展示图片'+index+'（可选）');
    div.find('input').attr('name','titleimg'+index);
    div.css('display','block');
    $(this).before(div);
  })
</script>
@endsection('js')