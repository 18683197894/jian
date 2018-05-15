@extends('Admin.index')

@section('css')

@endsection('css')

@section('content')
    <section class="content-header">
      <h1>
        问答修改
        <!-- <small>Control panel</small> -->

      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/jslmadmin/newslei/interlocution/interindex') }}"><i class="fa fa-dashboard"></i>问答列表</a></li>
        <li class="active">更新问答</li>
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
            <form role="form" action="{{ url('/jslmadmin/newslei/interlocution/interedits') }}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
              <div class="box-body">
               <input type="hidden" name="id" value="{{ $data->id }}">
               <input type="hidden" name="page" value="{{ $page }}">
                <div class="form-group">
                  <label for="exampleInputEmail1">问答标题</label>
                  <input type="text"  name="title" value="{{ $data->title }}" class="form-control" id="exampleInputEmail1" placeholder="问答标题">
                </div>
                <div class="form-group">
                  <label>内容</label>
                  <textarea class="form-control" name="content" rows="3" placeholder="内容 ...">{{ $data->content }}</textarea>
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