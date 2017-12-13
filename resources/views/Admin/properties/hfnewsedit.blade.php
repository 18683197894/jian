@extends('Admin.index')

@section('css')

@endsection('css')

@section('content')
    <section class="content-header">
      <h1>
        楼盘动态更新
        <!-- <small>Control panel</small> -->
      </h1>
     <ol class="breadcrumb">
        <li><a href="{{ url('admin/properties/hfnews') }}"><i class="fa fa-dashboard"></i>新闻列表</a></li>
        <li class="active">更新新闻</li>
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
            <form role="form" action="{{ url('admin/properties/hfnewsedits') }}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
              <div class="box-body">
               
                <div class="form-group">
                  <label for="exampleInputEmail1">新闻标题</label>
                  <input type="text"  name="title" value="{{ $data->title }}" class="form-control" id="exampleInputEmail1" placeholder="新闻标题">
                </div>
                <input type="hidden" name="id" value="{{ $data->id }}">
              
              <div class="form-group">
                  <label>变更父类</label>
                  <select class="form-control" name="pidname">
                    <option value="销售动态" @if($data->pidname == "销售动态") selected="selected" @endif>销售动态</option>
                    <option value="楼盘新闻" @if($data->pidname == "楼盘新闻") selected="selected" @endif>楼盘新闻</option>
                    <option value="楼盘公告" @if($data->pidname == "楼盘公告") selected="selected" @endif>楼盘公告</option>
                  
                  </select>
                </div>

                <div id="leicon" class="form-group">
                  <label>新闻简介</label>
                  <textarea name="leicon" class="form-control" rows="2" placeholder="Enter ...">{{ $data->leicon }}</textarea>
                </div>

              <div class="form-group">
                  <label for="exampleInputEmail1">网页标题</label>
                  <input type="text"  name="titles" value="{{ $data->titles  }}" class="form-control" id="exampleInputEmail1" placeholder="网页标题">
                </div>
                
                 <div class="form-group">
                  <label for="exampleInputEmail1">网页关键字</label>
                  <input type="text"  name="keyworlds" value="{{ $data->keyworlds  }}" class="form-control" id="exampleInputEmail1" placeholder="网页关键字">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">网页内容描述</label>
                  <input type="text"  name="description" value="{{ $data->description  }}" class="form-control" id="exampleInputEmail1" placeholder="网页内容描述">
                </div>             

              </div>
              <!-- /.box-body -->
@include('UEditor::head')

<script id="container" name="content" type="text/plain" >

@php
 echo $data->content;
@endphp
</script>			
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">更新</button>
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