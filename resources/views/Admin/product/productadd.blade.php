@extends('Admin.index')

@section('css')

@endsection('css')

@section('content')
<section class="content-header">
      <h1>
        分类添加
        <!-- <small>Control panel</small> -->

      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/newpro/index/package/productindex') }}"><i class="fa fa-dashboard"></i>分类列表</a></li>
        <li class="active">添加分类</li>
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
            <form role="form" action="{{ url('/newpro/index/package/productadds') }}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
              <div class="box-body">
               
                <div class="form-group">
                  <label for="exampleInputEmail1">分类标题：</label>
                  <input type="text"  name="title" value="{{ old('title') }}" class="form-control" id="exampleInputEmail1" placeholder="分类名称">
                </div>
                
                <div class="form-group">
                  <label for="exampleInputFile">图标（必选）</label>
                  <input type="file" name="titleimg1" id="exampleInputFile">
                </div>

                <div class="form-group">
                  <label for="exampleInputFile">反转图标（必选）</label>
                  <input type="file" name="titleimg2" id="exampleInputFile">
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