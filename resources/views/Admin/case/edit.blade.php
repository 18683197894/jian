@extends('Admin.index')

@section('css')

@endsection('css')

@section('content')
    <section class="content-header">
      <h1>
      &nbsp;{{ $data->ors }}
        <!-- <small>Control panel</small> -->
      

      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/admin/case/index') }}"><i class="fa fa-dashboard"></i>案例列表</a></li>
        <li class="active">进度更新</li>
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
            <form role="form" action="{{ url('admin/case/edits') }}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
              <div class="box-body">
               
                <div class="form-group">
                  <label for="exampleInputFile">效果图（必选）</label>
                  <input type="file" name="img1" id="exampleInputFile">
                </div>
                 <div class="form-group">
                  <label for="exampleInputFile">效果图（可选）</label>
                  <input type="file" name="img2" id="exampleInputFile">
                </div>
                 <div class="form-group">
                  <label for="exampleInputFile">效果图（可选）</label>
                  <input type="file" name="img3" id="exampleInputFile">
                </div>
                 <div class="form-group">
                  <label for="exampleInputFile">效果图（可选）</label>
                  <input type="file" name="img4" id="exampleInputFile">
                </div>
                 <div class="form-group">
                  <label for="exampleInputFile">效果图（可选）</label>
                  <input type="file" name="img5" id="exampleInputFile">
                </div>
                 <div class="form-group">
                  <label for="exampleInputFile">效果图（可选）</label>
                  <input type="file" name="img6" id="exampleInputFile">
                </div>
                 <input type="hidden" name="id" value="{{ $data->id }}">
                 <input type="hidden" name="or" value="{{ $data->or }}">

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