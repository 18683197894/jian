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
        <li><a href="{{ url('/admin/case/index?page=') }}{{ $page }}"><i class="fa fa-dashboard"></i>案例列表</a></li>
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
            <div class="form-group inp_add" index="1" style="display:none">
                  <label for="exampleInputEmail1">效果图1</label>
                  <input type="text"  name="custom_title1" value="{{ old('title') }}" class="form-control" id="exampleInputEmail1" placeholder="标题">
                  <label for="exampleInputFile">效果图1</label>
                  <input type="file" name="custom_img1" id="exampleInputFile">
              </div>
            <form role="form" action="{{ url('admin/case/upds') }}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputFile">展示效果图（可选 默认效果图1）</label>
                  <input type="file" name="suoimg" id="exampleInputFile">
                </div>
                <br>
                 <input type="hidden" name="id" value="{{ $data->id }}">
                 <input type="hidden" name="or" value="{{ $data->or }}">
                 <input type="hidden" name="page" value="{{ $page }}">
                
              <div class="form-group">
                  <label for="exampleInputEmail1">效果图1（必选）</label>
                  <input type="text"  name="custom_title1" value="{{ old('title') }}" class="form-control" id="exampleInputEmail1" placeholder="标题">
                  <label for="exampleInputFile">效果图1（必选）</label>
                  <input type="file" name="custom_img1" id="exampleInputFile">
              </div>
              <br>
              <div class="form-group add"><label for="exampleInputFile"><button Onclick="return false">+</button></label></div>


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
       <script>
          $('.add').click(function(){
            var inp = $('.inp_add').clone();
            var index = inp.attr('index');
            index = Number(index) + 1;
            if(index == 9)
            {
              return false;
            }

            inp.css('display','block');
            inp.removeClass('inp_add');
            inp.find('label').eq(0).html('效果图'+index);
            inp.find('label').eq(1).html('效果图'+index);
            inp.find('input').eq(0).attr('name','custom_title'+index)
            inp.find('input').eq(1).attr('name','custom_img'+index)
            $('.inp_add').attr('index',index);
            $(this).before("<br>");
            $(this).before(inp);
          })
       </script>
@endsection('js')