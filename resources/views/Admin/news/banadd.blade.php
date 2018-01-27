@extends('Admin.index')

@section('css')

@endsection('css')

@section('content')
    <section class="content-header">
      <h1>
        置顶文章介绍修改
        <!-- <small>Control panel</small> -->

      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/jslmadmin/newslei/newszhiindex/') }}/{{ $pid }}"><i class="fa fa-dashboard"></i>置顶文章列表</a></li>
        <li class="active">置顶文章介绍修改</li>
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
            @if(empty($data))
            <form role="form" action="{{ url('/jslmadmin/newslei/newszhiindex/bans') }}" method="post" enctype="multipart/form-data">
				    {{ csrf_field() }}
              <div class="box-body">
               
                <div class="form-group">
                  <label for="exampleInputEmail1">标题</label>
                  <input type="text"  name="title" value="{{ old('title') }}" class="form-control" id="exampleInputEmail1" placeholder="标题">
                </div>
                <input type="hidden" name="pid" value="{{ $pid }}">
                <input type="hidden" name="ors" value="add">
                
                <div id="leicon" class="form-group">
                  <label>简介</label>
                  <textarea name="con" class="form-control" rows="2" placeholder="Enter ...">{{ old('con') }}</textarea>
                </div>
                 

              </div>
              <!-- /.box-body -->
		
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">添加</button>
              </div>
            </form>
            @else
            <form role="form" action="{{ url('/jslmadmin/newslei/newszhiindex/bans') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
              <div class="box-body">
               
                <div class="form-group">
                  <label for="exampleInputEmail1">标题</label>
                  <input type="text"  name="title" value="{{ $data->title }}" class="form-control" id="exampleInputEmail1" placeholder="标题">
                </div>
                <input type="hidden" name="pid" value="{{ $pid }}">
                <input type="hidden" name="ors" value="edit">
                
                <div id="leicon" class="form-group">
                  <label>简介</label>
                  <textarea name="con" class="form-control" rows="2" placeholder="Enter ...">{{ $data->con }}</textarea>
                </div>
                 

              </div>
              <!-- /.box-body -->
    
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">更新</button>
              </div>
            </form>
            @endif
          </div>
          </div>


@endsection('content')
@section('js')
          
   
          
    
        
         
@endsection('js')