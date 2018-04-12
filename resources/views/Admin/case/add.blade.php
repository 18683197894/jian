@extends('Admin.index')

@section('css')

@endsection('css')

@section('content')
    <section class="content-header">
      <h1>
        案例添加
        <!-- <small>Control panel</small> -->

      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('admin/case/index') }}"><i class="fa fa-dashboard"></i>案例管理</a></li>
        <li class="active">添加案例</li>
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
            <form role="form" action="{{ url('admin/case/adds') }}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
              <div class="box-body">
               
                <div class="form-group">
                  <label for="exampleInputEmail1">案例标题</label>
                  <input type="text"  name="title" value="{{ old('title') }}" class="form-control" id="exampleInputEmail1" placeholder="新闻标题">
                </div>
                
                <div class="form-group">
                  <label id="lei">户型选择</label>
                  <select name="huxing" class="form-control">
                    <option value="小户型">小户型</option>
                    <option  value="二室">二室</option>
                    <option  value="三室">三室</option>
                    <option  value="四室">四室</option>
                    <option  value="公寓">公寓</option>
                    <option  value="别墅">别墅</option>
                    <option  value="复式">复式</option>
                    <option  value="自建">自建</option>
                    <option  value="其他">其他</option>
                  </select>
                </div>
  
                <div class="form-group">
                  <label id="lei">风格选择</label>
                  <select name="fengge" class="form-control">
                    <option value="地中海">地中海</option>
                    <option  value="中式">中式</option>
                    <option  value="港式">港式</option>
                    <option  value="美式">美式</option>
                    <option  value="欧式">欧式</option>
                    <option  value="混搭">混搭</option>
                    <option  value="田园">田园</option>
                    <option  value="现代">现代</option>
                    <option  value="新古典">新古典</option>
                    <option  value="东南亚">东南亚</option>
                    <option  value="日式">日式</option>
                    <option  value="宜家">宜家</option>
                    <option  value="北欧">北欧</option>
                    <option  value="简欧">简欧</option>
                    <option  value="简约">简约</option>
                    <option  value="简约">简美</option>
                    <option  value="韩式">韩式</option>
                    <option  value="法式">法式</option>
                    <option  value="工业风">工业风</option>
                    <option  value="新中式">新中式</option>
                    <option  value="其他">其他</option>
                  </select>
                </div>

                <div class="form-group">
                  <label id="lei">预算选择</label>
                  <select name="yusuan" class="form-control">
                    <option value="5万以下">5万以下</option>
                    <option  value="5万-8万">5万-8万</option>
                    <option  value="8万-12万">8万-12万</option>
                    <option  value="12万-18万">12万-18万</option>
                    <option  value="18万-30万">18万-30万</option>
                    <option  value="30万-50万">30万-50万</option>
                    <option  value="50万以上">50万以上</option>
                    <option  value="其他">其他</option>
                    
                    
                  </select>
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">网页标题</label>
                  <input type="text"  name="titles" value="{{ old('titles') }}" class="form-control" id="exampleInputEmail1" placeholder="网页标题">
                </div>
                
                 <div class="form-group">
                  <label for="exampleInputEmail1">网页关键字</label>
                  <input type="text"  name="keyworlds" value="{{ old('keyworlds') }}" class="form-control" id="exampleInputEmail1" placeholder="网页关键字">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">网页内容描述</label>
                  <input type="text"  name="description" value="{{ old('description') }}" class="form-control" id="exampleInputEmail1" placeholder="网页内容描述">
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