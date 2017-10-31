@extends('Admin.index')

@section('css')

@endsection('css')

@section('content')
    <section class="content-header">
      <h1>
        套餐添加
        <!-- <small>Control panel</small> -->

      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('admin/package/all') }}"><i class="fa fa-dashboard"></i>套餐列表</a></li>
        <li class="active">添加套餐</li>
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
            <form role="form" action="{{ url('admin/package/all/packadds') }}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
              <div class="box-body">
               
                <div class="form-group">
                  <label for="exampleInputEmail1">套餐名称</label>
                  <input type="text"  name="title" value="{{ old('title') }}" class="form-control" id="exampleInputEmail1" placeholder="套餐名称">
                </div>
      
                
                
                <div id="leicon" class="form-group">
                  <label>套餐简介</label>
                  <textarea name="con" class="form-control" rows="2" placeholder="Enter ...">{{ old('套餐简介') }}</textarea>
                </div>
              
              <div class="form-group">
                  <label>基装包</label>
                  <select class="form-control" name="ji">
                    @foreach($ji as $k => $v )
                    <option value="{{ $v->id }}">{{ $v->title }}</option>
                    @endforeach
                  </select>
                </div>

                 

                 <div class="form-group">
                  <label>厨房包</label>
                  <select class="form-control" name="chu">
                    @foreach($chu as $kkk => $vvv )
                    <option value="{{ $vvv->id }}">{{ $vvv->title }}</option>
                    @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label>卫浴包</label>
                  <select class="form-control" name="wei">
                     @foreach($wei as $kk => $vv )
                    <option value="{{ $vv->id }}">{{ $vv->title }}</option>
                    @endforeach
                  </select>
                </div>
                
                <div class="form-group">
                  <label for="exampleInputFile">展示图片（1）</label>
                  <input type="file" name="img1" id="exampleInputFile">
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">展示图片（2）</label>
                  <input type="file" name="img2" id="exampleInputFile">
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">展示图片（3）</label>
                  <input type="file" name="img3" id="exampleInputFile">
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