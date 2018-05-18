@extends('Admin.index')

@section('css')

@endsection('css')

@section('content')
    <section class="content-header">
      <h1>
        新闻添加
        <!-- <small>Control panel</small> -->

      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('jslmadmin/newslei/newsindex/') }}/{{ $pid }}"><i class="fa fa-dashboard"></i>新闻列表</a></li>
        <li class="active">添加新闻</li>
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
            <form role="form" action="{{ url('jslmadmin/newslei/newsadds') }}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
              <div class="box-body">
               
                <div class="form-group">
                  <label for="exampleInputEmail1">新闻标题</label>
                  <input type="text"  name="title" value="{{ old('title') }}" class="form-control" id="exampleInputEmail1" placeholder="新闻标题">
                </div>
                
                <div class="form-group">
                  <label for="exampleInputPassword1">新闻来源</label>
                  <input type="text" name="yuan" value="{{ old('yuan') }}" class="form-control" id="exampleInputPassword1" placeholder="新闻来源">
                </div>
                
                <input type="hidden" name="pid" value="{{ $pid }}">
                
                <div id="leicon" class="form-group">
                  <label>新闻简介</label>
                  <textarea name="leicon" class="form-control" rows="2" placeholder="Enter ...">{{ old('leicon') }}</textarea>
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


                <div class="form-group">
                  <label for="exampleInputFile">新闻展示图片(可选)</label>
                  <input type="file" name="titleimg" id="exampleInputFile">
                </div>
                 

              </div>
              <!-- /.box-body -->
@include('UEditor::head')
<div style="width:715px">
<script id="container" name="content" type="text/plain" >
@php
 echo old('content');
@endphp
</script>
</div>			
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">添加</button>
              </div>
            </form>
          </div>
          </div>


@endsection('content')
@section('js')
          
<!-- 实例化编辑器 -->
<script type="text/javascript">
    var ue = UE.getEditor('container')
        ue.ready(function() {
        ue.execCommand('serverparam', '_token', '{{ csrf_token() }}');//此处为支持laravel5 csrf ,根据实际情况修改,目的就是设置 _token 值.    
        
    });
</script>        
          
    
        
         
@endsection('js')