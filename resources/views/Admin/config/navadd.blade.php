@extends('Admin.index')

@section('css')

@endsection('css')

@section('content')
    <section class="content-header">
      <h1>
        添加导航栏目
        <!-- <small>Control panel</small> -->

      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('admin/config/nav') }}"><i class="fa fa-dashboard"></i>首页导航栏目</a></li>
        <li class="active">首页导航栏目添加</li>
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
            <form role="form" action="{{ url('admin/config/nav/navadds') }}" method="post">
				{{ csrf_field() }}
              <div class="form-group">
                  <label>添加导航页</label>
                  <select class="form-control" name="pid">
                    @foreach($data as $k =>$v )
                    <option value="{{ $v->id }}">{{ $v->title }}</option>
                    @endforeach
                  </select>
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