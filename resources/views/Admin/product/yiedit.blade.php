@extends('Admin.index')

@section('css')

@endsection('css')

@section('content')
    <section class="content-header">
      <h1>
        意向金报价修改
        <!-- <small>Control panel</small> -->

      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/admin/product/style/index') }}"><i class="fa fa-dashboard"></i>风格列表</a></li>
        <li class="active">更新意向金报价</li>
      </ol>
    </section>

            <div class="col-md-12">
          <!-- general form elements -->
          
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
            <form role="form" action="{{ url('/admin/product/style/yiedits') }}/{{ $data->id }}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
              <div class="box-body">

                <div class="form-group">
                  <label for="exampleInputPassword1">报价（每平米）</label>
                  <input type="text" name="money" value="{{ $data->money  }}" class="form-control" id="exampleInputPassword1" placeholder="报价（每平米）">
                </div>
                 

              </div>
              <!-- /.box-body -->
	
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">更新</button>
              </div>
            </form>
          
          </div>


@endsection('content')
@section('js')
                 
@endsection('js')