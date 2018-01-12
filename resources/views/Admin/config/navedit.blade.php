@extends('Admin.index')

@section('css')

@endsection('css')

@section('content')
    <section class="content-header">
      <h1>
        导航栏目修改
        <!-- <small>Control panel</small> -->

      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('admin/config/nav') }}"><i class="fa fa-dashboard"></i>首页导航栏目</a></li>
        <li class="active">首页导航栏目修改</li>
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
            <form role="form" action="{{ url('admin/config/nav/navedits') }}" method="post">
				{{ csrf_field() }}
        <input type="hidden" name="id" value="{{ $data->id }}">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">栏目名称</label>
                  <input type="text"  name="title" value="{{ $data->title }}" class="form-control" id="exampleInputEmail1" placeholder="栏目名称">
                </div>
               <div class="form-group">
                  <label for="exampleInputEmail1">URL地址</label>
                  <input type="text"  name="url" value="{{ $data->url }}" class="form-control" id="exampleInputEmail1" placeholder="URL地址">
                </div>
                 

              </div>
              <!-- /.box-body -->
	
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">更新</button>
              </div>
            </form>
          </div>
          </div>


@endsection('content')
@section('js')
                 
@endsection('js')