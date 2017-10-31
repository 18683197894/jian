@extends('Admin.index')

@section('css')

@endsection('css')

@section('content')
    <section class="content-header">
      <h1>
        子类编辑
        <!-- <small>Control panel</small> -->

      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/admin/package/all/pei/') }}/{{ $data->sid }}"><i class="fa fa-dashboard"></i>子类列表</a></li>
        <li class="active">更新子类</li>
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
            <form role="form" action="{{ url('admin/package/all/pei/subedits') }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
              <div class="box-body">
                   <input type="hidden" name="id" value="{{ $data->id }}">
                   <input type="hidden" name="sid" value="{{ $data->sid }}">
                <div class="form-group">
                  <label for="exampleInputPassword1">子类标题</label>

                  <input type="text" name="title" value="{{ $data->title  }}" class="form-control" id="exampleInputPassword1" placeholder="子类标题">
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
                 
@endsection('js')@extends('Admin.index')

@section('css')

@endsection('css')

@section('content')
    <section class="content-header">
      <h1>
        子类编辑
        <!-- <small>Control panel</small> -->

      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/admin/package/all/pei/sub/') }}/{{ $data->sid }}"><i class="fa fa-dashboard"></i>子类列表</a></li>
        <li class="active">更新子类</li>
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
            <form role="form" action="{{ url('admin/package/all/peiedits') }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
              <div class="box-body">
                   <input type="hidden" name="id" value="{{ $data->id }}">
                <div class="form-group">
                  <label for="exampleInputPassword1">子类标题</label>

                  <input type="text" name="title" value="{{ $data->title  }}" class="form-control" id="exampleInputPassword1" placeholder="子类标题">
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