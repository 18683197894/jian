@extends('Admin.index')

@section('css')

@endsection('css')

@section('content')
    <section class="content-header">
      <h1>
        添加URL网页
        <!-- <small>Control panel</small> -->

      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('admin/config/webpage') }}"><i class="fa fa-dashboard"></i>URL列表</a></li>
        <li class="active">URL网页添加</li>
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
            <form role="form" action="{{ url('admin/config/webpage/adds') }}" method="post">
				{{ csrf_field() }}
              <div class="box-body">

               <div class="form-group">
                  <label for="exampleInputEmail1">URL地址</label>
                  <input type="text"  name="url" value="{{ old('url') }}" class="form-control" id="exampleInputEmail1" placeholder="URL地址">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">网页名称</label>
                  <input type="text"  name="title" value="{{ old('title') }}" class="form-control" id="exampleInputEmail1" placeholder="网页名称">
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