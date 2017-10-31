@extends('Admin.index')

@section('css')

@endsection('css')

@section('content')
    <section class="content-header">
      <h1>
        子包编辑
        <!-- <small>Control panel</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('admin/package/all/zi') }}/{{ $data->pid }}"><i class="fa fa-dashboard"></i>子包列表</a></li>
        <li class="active">子包更新</li>
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
            <form role="form" action="{{ url('admin/package/all/ziedits') }}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
              <div class="box-body">
               
                <div class="form-group">
                  <label for="exampleInputEmail1">子包名称</label>
                  <input type="text"  name="title" value="{{ $data->title }}" class="form-control" id="exampleInputEmail1" placeholder="子包名称">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">价格</label>
                  <input type="text"  name="jia" value="{{ $data->jia }}" class="form-control" id="exampleInputEmail1" placeholder="价格">
                </div>
                <input type="hidden" name="id" value="{{ $data->id }}">
                <input type="hidden" name="pid" value="{{ $data->pid }}">
                <div id="leicon" class="form-group">
                  <label>简介内容</label>
                  <textarea name="con" class="form-control" rows="2" placeholder="Enter ...">{{ $data->con }}</textarea>
                </div>
              

                <div class="form-group">
                  <label for="exampleInputFile">展示图片( 可选 )</label>
                  <input type="file" name="img" id="exampleInputFile">
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