@extends('Admin.index')

@section('css')

@endsection('css')

@section('content')
    <section class="content-header">
      <h1>
        包添加
        <!-- <small>Control panel</small> -->

      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('newpro/index/package/packageindex') }}"><i class="fa fa-dashboard"></i>包列表</a></li>
        <li class="active">添加包</li>
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
            <form role="form" action="{{ url('newpro/index/package/packageadds') }}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
              <div class="box-body">
               
                <div class="form-group">
                  <label for="exampleInputEmail1">包名称：</label>
                  <input type="text"  name="name" value="{{ old('name') }}" class="form-control" id="exampleInputEmail1" placeholder="包名称">
                </div>
      
                <div class="form-group">
                  <label>包属性：</label>
                  <select name="ors" class="form-control">
                    <option @if( old('ors') =='基装') selected="selected" @endif value="基装">基装</option>
                    <option @if( old('ors') =='软装') selected="selected" @endif value="软装">软装</option>
                    <option @if( old('ors') =='智能') selected="selected" @endif value="智能">智能</option>
                  </select>
                </div>
                
                <div class="form-group">
                  <label for="exampleInputEmail1">价格：（基装和软装价格单位为㎡ 智能包为1）</label>
                  <input type="text"  name="money" value="{{ old('money') }}" class="form-control" id="exampleInputEmail1" placeholder="价格">
                </div>
                <!-- <div id="leicon" class="form-group">
                  <label>简介内容</label>
                  <textarea name="con" class="form-control" rows="2" placeholder="Enter ...">{{ old('con') }}</textarea>
                </div> -->
              
                 

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