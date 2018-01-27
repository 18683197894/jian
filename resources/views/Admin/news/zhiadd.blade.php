@extends('Admin.index')

@section('css')

@endsection('css')

@section('content')
    <section class="content-header">
      <h1>
        置顶新闻添加
        <!-- <small>Control panel</small> -->

      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('jslmadmin/newslei/newsindex/') }}/{{ $data->pid }}"><i class="fa fa-dashboard"></i>新闻列表</a></li>
        <li class="active">置顶新闻添加</li>
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
            <form role="form" action="{{ url('/jslmadmin/newslei/newszhiindex/zhiadds') }}" method="post" enctype="multipart/form-data">
				      {{ csrf_field() }}
              <div class="box-body">
               <input type="hidden" name="pid"  value="{{ $data->pid }}">
               <input type="hidden" name="id"  value="{{ $data->id }}">
                <div class="form-group">
                  <label for="exampleInputEmail1">新闻标题</label>
                  <input type="text"  name="title" readonly="value" value="{{ $data->title }}" class="form-control" id="exampleInputEmail1" placeholder="新闻标题">
                </div>

                <div class="form-group">
                  <label for="exampleInputFile">轮播展示图片</label>
                  <input type="file" name="img" id="exampleInputFile">
                </div>
                 

              </div>
		
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">添加</button>
              </div>
            </form>
          </div>
          </div>


@endsection('content')
@section('js')
          
     
          
    
        
         
@endsection('js')