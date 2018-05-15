@extends('Admin.index')

@section('css')

@endsection('css')

@section('content')
    <section class="content-header">
      <h1>
        问答添加
        <!-- <small>Control panel</small> -->

      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/jslmadmin/newslei/interlocution/interindex') }}"><i class="fa fa-dashboard"></i>问答列表</a></li>
        <li class="active">添加问答</li>
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
            <div class="input_add" index="1" style="display:none">
              <div class="form-group">
                  <label for="exampleInputEmail1">问答标题</label>
                  <input type="text"  name="title" value="" class="form-control" id="exampleInputEmail1" placeholder="问答标题">
                </div>
                <div class="form-group">
                  <label>内容</label>
                  <textarea class="form-control" name="content" rows="3" placeholder="内容 ..."></textarea>
                </div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{ url('/jslmadmin/newslei/interlocution/interadds') }}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
              <div class="box-body">
                <div>
                <div class="form-group">
                  <label for="exampleInputEmail1">问答标题（*）</label>
                  <input type="text"  name="title" value="{{ old('title') }}" class="form-control" id="exampleInputEmail1" placeholder="问答标题">
                </div>
                <div class="form-group">
                  <label>内容（*）</label>
                  <textarea class="form-control" name="content" rows="3" placeholder="内容 ...">{{ old('content') }}</textarea>
                </div>
                </div>
                
                 <div class="form-group add"><label for="exampleInputFile"><button class="but_add" onclick="return false">+</button></label></div>

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
      <script>
      $('.but_add').on('click',function(){
        var inp = $('.input_add').clone();

        var index = inp.attr('index');
        if(Number(index) == 10)
        {
          return false;
        }
        var index_s = Number(index) + 1;

        inp.find('.form-group').eq(0).find('label').html('问答标题（可选）');
        inp.find('input').val('');
        inp.find('input').attr('name','title'+index);
        inp.find('textarea').val('');
        inp.find('textarea').attr('name','content'+index);
        inp.removeClass('input_add');
        inp.css('display','block');
        

        $('.input_add').attr('index',index_s);
        $('.add').before("<br>");
        $('.add').before(inp);
      })
      </script>
@endsection('js')