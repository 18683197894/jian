@extends('Admin.index')

@section('css')

@endsection('css')

@section('content')
    <section class="content-header">
      <h1>
        栏目编辑
        <!-- <small>Control panel</small> -->

      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/admin/package/ruan/fg/column/') }}/{{ $data->pid }}"><i class="fa fa-dashboard"></i>栏目列表</a></li>
        <li class="active">更新栏目</li>
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
            <form role="form" action="{{ url('admin/package/ruan/fg/columnedits') }}/{{ $data->id }}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
              <div class="box-body">
                   <input type="hidden" name="pid" value="{{ $data->pid }}">
                   <input type="hidden" name="path" value="{{ $data->path }}">
                <div class="form-group">
                  <label for="exampleInputPassword1">栏目标题</label>

                  <input type="text" name="title" value="{{ $data->title  }}" class="form-control" id="exampleInputPassword1" placeholder="简介标题">
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