@extends('Admin.index')

@section('css')

@endsection('css')

@section('content')
<section class="content-header">
      <h1>
        产品修改
        <!-- <small>Control panel</small> -->

      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/newpro/index/package/product/goodsindex/') }}/{{ $data->pid }}"><i class="fa fa-dashboard"></i>产品列表</a></li>
        <li class="active">更新产品</li>
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
            <div class="form-group" index="{{ $count }}">
                  <label for="exampleInputFile">展示图片1（必选 默认为列表展示图片）</label>
                  <input type="file" name="titleimg1" id="exampleInputFile">
                </div>
              
            </div>
            <form role="form" action="{{ url('/newpro/index/package/product/goodsedits') }}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
              <div class="box-body">
               
                <div class="form-group">
                  <label for="exampleInputEmail1">产品名称：</label>
                  <input type="hidden" name="id" value="{{ $data->id }}">
                  <input type="hidden" name="pid" value="{{ $data->pid }}">
                  <input type="text"  name="title" value="{{ $data->title }}" class="form-control" id="exampleInputEmail1" placeholder="产品名称">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">品牌：</label>
                  <input type="text"  name="brand" value="{{ $data->brand }}" class="form-control" id="exampleInputEmail1" placeholder="品牌">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">型号：</label>
                  <input type="text"  name="model" value="{{ $data->model }}" class="form-control" id="exampleInputEmail1" placeholder="型号">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">规格：</label>
                  <input type="text"  name="spec" value="{{ $data->spec }}" class="form-control" id="exampleInputEmail1" placeholder="规格">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">数量：</label>
                  <input type="text"  name="num" value="{{ $data->num }}" class="form-control" id="exampleInputEmail1" placeholder="数量">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">描述：</label>
                  <input type="text"  name="remarks" value="{{ $data->remarks }}" class="form-control" id="exampleInputEmail1" placeholder="备注">
                </div>
                
                <div class="form-group">
                  <label for="exampleInputEmail1">网页标题</label>
                  <input type="text"  name="titles" value="{{ $data->titles }}" class="form-control" id="exampleInputEmail1" placeholder="网页标题">
                </div>
                
                 <div class="form-group">
                  <label for="exampleInputEmail1">网页关键字</label>
                  <input type="text"  name="keyworlds" value="{{ $data->keyworlds }}" class="form-control" id="exampleInputEmail1" placeholder="网页关键字">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">网页内容描述</label>
                  <input type="text"  name="description" value="{{ $data->description }}" class="form-control" id="exampleInputEmail1" placeholder="网页内容描述">
                </div>

                <div class="form-group">
                  <label for="exampleInputFile">列表展示图片（可选）</label>
                  <input type="file" name="titleimg1" id="exampleInputFile">
                </div>
                <div class="form-group"><label for="exampleInputFile">追加展示图片:</label></div>
                <div class="form-group add"><label for="exampleInputFile"><button Onclick="return false">+</button></label></div>
              
              </div>
              <!-- /.box-body -->
              <div style="width:900px">
                @include('UEditor::head')
                <script id="container" name="content" type="text/plain" >
                <?php
                  echo $data->content;
                ?>
                </script> 
            </div>
	
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">更新</button>
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