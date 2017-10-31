@extends('Admin.index')

@section('css')

@endsection('css')

@section('content')
    <section class="content-header">
      <h1>
        子类添加
        <!-- <small>Control panel</small> -->

      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('admin/package/ruan/fg/column/subclass') }}/{{ $id }}"><i class="fa fa-dashboard"></i>子类管理</a></li>
        <li class="active">添加子类</li>
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
            <form role="form" action="{{ url('admin/package/ruan/fg/column/subclassadds') }}" method="post">
				{{ csrf_field() }}
              <div class="box-body">
               
              <input type="hidden" name="pid" value="{{ $id }}">

                <div class="form-group">
                  <label for="exampleInputPassword1">子类标题</label>
                  <input type="text" name="title" value="{{ old('title') }}" class="form-control" id="exampleInputPassword1" placeholder="子类标题">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">规格</label>
                  <input type="text" name="specations" value="{{ old('specations') }}" class="form-control" id="exampleInputPassword1" placeholder="规格">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">材质</label>
                  <input type="text" name="brand" value="{{ old('brand') }}" class="form-control" id="exampleInputPassword1" placeholder="材质">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">数量</label>
                  <input type="text" name="num" value="{{ old('num') }}" class="form-control" id="exampleInputPassword1" placeholder="数量">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">价格</label>
                  <input type="text" name="jia" value="{{ old('jia') }}" class="form-control" id="exampleInputPassword1" placeholder="价格">
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