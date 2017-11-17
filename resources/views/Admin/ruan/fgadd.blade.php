@extends('Admin.index')

@section('css')

@endsection('css')

@section('content')
    <section class="content-header">
      <h1>
        风格添加
        <!-- <small>Control panel</small> -->

      </h1>
      <ol class="breadcrumb">
        <li><a href="
@if($pid ==1)
/admin/package/ruan/fashion
@elseif($pid ==2)
/admin/package/ruan/joylity
@else
/admin/package/ruan/peghid
@endif
        "><i class="fa fa-dashboard"></i>风格列表</a></li>
        <li class="active">添加风格</li>
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
            <form role="form" action="{{ url('admin/package/ruan/fgadds') }}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
              <div class="box-body">
               
                <div class="form-group">
                  <label for="exampleInputEmail1">风格标题</label>
                  <input type="text"  name="title" value="{{ old('title') }}" class="form-control" id="exampleInputEmail1" placeholder="风格标题">
                </div>
                
                <div class="form-group">
                  <label id="lei">所属分类</label>
                  <select name="pid" class="form-control">
                    <option value="1">时尚包</option>
                    <option  value="2">质享包</option>
                    <option  value="3">臻藏包</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">简介标题</label>
                  <input type="text" name="con" value="{{ old('con') }}" class="form-control" id="exampleInputPassword1" placeholder="简介标题">
                </div>
                
                
                <div id="leicon" class="form-group">
                  <label>简介内容</label>
                  <textarea name="content" class="form-control" rows="2" placeholder="Enter ...">{{ old('content') }}</textarea>
                </div>
              

                <div class="form-group">
                  <label for="exampleInputFile">展示图片</label>
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