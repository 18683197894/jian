@extends('Admin.index')

@section('css')

@endsection('css')

@section('content')
    <section class="content-header">
      <h1>
        套餐更新
        <!-- <small>Control panel</small> -->

      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('admin/package/all/pack') }}"><i class="fa fa-dashboard"></i>套餐列表</a></li>
        <li class="active">更新套餐</li>
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
            <form role="form" action="{{ url('admin/package/all/packedits') }}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
              <div class="box-body">
               
                <div class="form-group">
                  <label for="exampleInputEmail1">套餐名称</label>
                  <input type="text"  name="title" value="{{ $data->title }}" class="form-control" id="exampleInputEmail1" placeholder="套餐名称">
                </div>
      
                
                
                <div id="leicon" class="form-group">
                  <label>套餐简介</label>
                  <textarea name="con" class="form-control" rows="2" placeholder="Enter ...">{{ $data->con }}</textarea>
                </div>
              <input type="hidden" name="id" value="{{ $data->id }}">
              <div class="form-group">
                  <label>基装包</label>
                  <select class="form-control" name="ji">
                    @foreach($or1 as $k => $v )
                    <option value="{{ $v->id }}" @if($data->paths[0] == $v->id ) selected="selected" @endif >{{ $v->title }}</option>
                    @endforeach
                  </select>
                </div>

                 

                 <div class="form-group">
                  <label>厨房包</label>
                  <select class="form-control" name="chu">
                    @foreach($or2 as $kkk => $vvv )
                    <option value="{{ $vvv->id }}" @if($data->paths[1] == $vvv->id ) selected="selected" @endif>{{ $vvv->title }}</option>
                    @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label>卫浴包</label>
                  <select class="form-control" name="wei">
                     @foreach($or3 as $kk => $vv )
                    <option value="{{ $vv->id }}" @if($data->paths[2] == $vv->id ) selected="selected" @endif>{{ $vv->title }}</option>
                    @endforeach
                  </select>
                </div>
                
                <div class="form-group">
                  <label for="exampleInputFile">展示图片1（可选）</label>
                  <input type="file" name="img1" id="exampleInputFile">
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">展示图片2（可选）</label>
                  <input type="file" name="img2" id="exampleInputFile">
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">展示图片3（可选）</label>
                  <input type="file" name="img3" id="exampleInputFile">
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