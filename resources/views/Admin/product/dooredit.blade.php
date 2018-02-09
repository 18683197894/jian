@extends('Admin.index')

@section('css')

@endsection('css')

@section('content')
    <section class="content-header">
      <h1>
        户型编辑
        <!-- <small>Control panel</small> -->

      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/admin/product/style/doorindex') }}/{{ $data->pid }}"><i class="fa fa-dashboard"></i>户型管理</a></li>
        <li class="active">更新户型</li>
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
            <form role="form" action="{{ url('admin/product/style/dooredits') }}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
              <div class="box-body">
               <input type="hidden" name="id" value="{{ $data->id }}">
               <input type="hidden" name="pid" value="{{ $data->pid }}">
                <div class="form-group">
                  <label for="exampleInputEmail1">户型</label>
                  <input type="text"  name="title" value="{{ $data->title }}" class="form-control" id="exampleInputEmail1" placeholder="户型">
                </div>
                
            
                <div class="form-group">
                  <label for="exampleInputPassword1">主流品牌报价</label>
                  <input type="text" name="main" value="{{ $data->main }}" class="form-control" id="exampleInputPassword1" placeholder="主流品牌报价">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">主流品牌说明</label>
                  <input type="text" name="mains" value="{{ $data->mains }}" class="form-control" id="exampleInputPassword1" placeholder="主流品牌说明">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">非主流品牌报价（可选）</label>
                  <input type="text" name="nomain" value="{{ $data->nomain }}" class="form-control" id="exampleInputPassword1" placeholder="非主流品牌报价">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">非主流品牌说明</label>
                  <input type="text" name="nomains" value="{{ $data->nomains }}" class="form-control" id="exampleInputPassword1" placeholder="非主流品牌说明">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">样板间报价（可选）</label>
                  <input type="text" name="model" value="{{ $data->model }}" class="form-control" id="exampleInputPassword1" placeholder="样板间报价">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">样板间说明</label>
                  <input type="text" name="models" value="{{ $data->models }}" class="form-control" id="exampleInputPassword1" placeholder="样板间说明">
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