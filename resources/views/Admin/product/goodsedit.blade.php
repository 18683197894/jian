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
                  <label for="exampleInputEmail1">备注：</label>
                  <input type="text"  name="remarks" value="{{ $data->remarks }}" class="form-control" id="exampleInputEmail1" placeholder="备注">
                </div>

                <div class="form-group">
                  <label for="exampleInputFile">展示图片（可选）</label>
                  <input type="file" name="titleimg" id="exampleInputFile">
                </div>
      
              </div>
              <!-- /.box-body -->
	
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">添加</button>
              </div>
            </form>
          </div>
          </div>
@endsection('content')

@section('js')

@endsection('js')