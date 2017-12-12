@extends('Admin.index')

@section('css')

@endsection('css')

@section('content')
    <section class="content-header">
      <h1>
        织金新闻添加
        <!-- <small>Control panel</small> -->

      </h1>
      <ol class="breadcrumb">
        <!-- <li class="active">添加新闻</li> -->
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
            <form role="form" action="{{ url('admin/properties/hfnewsadds') }}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
              <div class="box-body">
               
                <div class="form-group">
                  <label for="exampleInputEmail1">新闻标题</label>
                  <input type="text"  name="title" value="{{ old('title') }}" class="form-control" id="exampleInputEmail1" placeholder="新闻标题">
                </div>
                 
                 <div class="form-group">
                  <label>父类板块</label>
                  <select class="form-control" name="pidname">
                    
                    <option value="销售动态">销售动态</option>
                    <option value="楼盘新闻">楼盘新闻</option>
                    <option value="楼盘公告">楼盘公告</option>
                    
                  </select>
                </div>

                <div id="leicon" class="form-group">
                  <label>新闻简介</label>
                  <textarea name="leicon" class="form-control" rows="2" placeholder="Enter ...">{{ old('leicon') }}</textarea>
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">网页标题</label>
                  <input type="text"  name="titles" value="{{ old('titles') }}" class="form-control" id="exampleInputEmail1" placeholder="网页标题">
                </div>
                
                 <div class="form-group">
                  <label for="exampleInputEmail1">网页关键字</label>
                  <input type="text"  name="keyworlds" value="{{ old('keyworlds') }}" class="form-control" id="exampleInputEmail1" placeholder="网页关键字">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">网页内容描述</label>
                  <input type="text"  name="description" value="{{ old('description') }}" class="form-control" id="exampleInputEmail1" placeholder="网页内容描述">
                </div>
                 

              </div>
              <!-- /.box-body -->
@include('UEditor::head')

<script id="container" name="content" type="text/plain" >
@php
 echo old('content');
@endphp
</script>			
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
    var ue = UE.getEditor('container', { initialFrameWidth: 746,})

        ue.ready(function() {
        ue.execCommand('serverparam', '_token', '{{ csrf_token() }}');//此处为支持laravel5 csrf ,根据实际情况修改,目的就是设置 _token 值.    
    });
</script>        
          
    
        
         
@endsection('js')