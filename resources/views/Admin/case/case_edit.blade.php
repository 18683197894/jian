@extends('Admin.index')

@section('css')

@endsection('css')

@section('content')
    <section class="content-header">
      <h1>
        案例修改
        <!-- <small>Control panel</small> -->

      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('admin/case/index') }}"><i class="fa fa-dashboard"></i>案例管理</a></li>
        <li class="active">更新案例</li>
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
            <form role="form" action="{{ url('/admin/case/index/case_edits') }}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
              <div class="box-body">
               
                <div class="form-group">
                  <label for="exampleInputEmail1">案例标题</label>
                  <input type="text"  name="title" value="{{ $data->title }}" class="form-control" id="exampleInputEmail1" placeholder="新闻标题">
                </div>
                <input type="hidden" name="id" value="{{ $data->id }}">
                <input type="hidden" name="page" value="{{ $page }}">
                <div class="form-group">
                  <label id="lei">户型选择</label>
                  <select name="huxing" class="form-control">
                    <option value="小户型" @if($data->huxing =='小户型') selected="selected" @endif>小户型</option>
                    <option  value="二室" @if($data->huxing =='二室') selected="selected" @endif>二室</option>
                    <option  value="三室" @if($data->huxing  =='三室') selected="selected" @endif>三室</option>
                    <option  value="四室" @if($data->huxing  =='四室') selected="selected" @endif>四室</option>
                    <option  value="公寓" @if($data->huxing  =='公寓') selected="selected" @endif>公寓</option>
                    <option  value="别墅" @if($data->huxing  =='别墅') selected="selected" @endif>别墅</option>
                    <option  value="复式" @if($data->huxing  =='复式') selected="selected" @endif>复式</option>
                    <option  value="自建" @if($data->huxing  =='自建') selected="selected" @endif>自建</option>
                    <option  value="其他" @if($data->huxing  =='其他') selected="selected" @endif>其他</option>
                  </select>
                </div>
  
                <div class="form-group">
                  <label id="lei">风格选择</label>
                  <select name="fengge" class="form-control">
                    <option value="地中海" @if($data->fengge  =='地中海') selected="selected" @endif>地中海</option>
                    <option  value="中式" @if($data->fengge =='中式') selected="selected" @endif>中式</option>
                    <option  value="港式" @if($data->fengge =='港式') selected="selected" @endif>港式</option>
                    <option  value="美式" @if($data->fengge =='美式') selected="selected" @endif>美式</option>
                    <option  value="欧式" @if($data->fengge =='欧式') selected="selected" @endif>欧式</option>
                    <option  value="混搭" @if($data->fengge =='混搭') selected="selected" @endif>混搭</option>
                    <option  value="田园" @if($data->fengge =='田园') selected="selected" @endif>田园</option>
                    <option  value="现代" @if($data->fengge =='现代') selected="selected" @endif>现代</option>
                    <option  value="新古典" @if($data->fengge =='新古典') selected="selected" @endif>新古典</option>
                    <option  value="东南亚" @if($data->fengge =='东南亚') selected="selected" @endif>东南亚</option>
                    <option  value="日式" @if($data->fengge =='日式') selected="selected" @endif>日式</option>
                    <option  value="宜家" @if($data->fengge =='宜家') selected="selected" @endif>宜家</option>
                    <option  value="北欧" @if($data->fengge =='北欧') selected="selected" @endif>北欧</option>
                    <option  value="简欧" @if($data->fengge =='简欧') selected="selected" @endif>简欧</option>
                    <option  value="简约" @if($data->fengge =='简约') selected="selected" @endif>简约</option>
                    <option  value="简约" @if($data->fengge =='简美') selected="selected" @endif>简美</option>
                    <option  value="韩式" @if($data->fengge =='韩式') selected="selected" @endif>韩式</option>
                    <option  value="法式" @if($data->fengge =='法式') selected="selected" @endif>法式</option>
                    <option  value="工业风" @if($data->fengge =='工业风') selected="selected" @endif>工业风</option>
                    <option  value="新中式" @if($data->fengge =='新中式') selected="selected" @endif>新中式</option>
                    <option  value="清水房" @if($data->fengge =='清水房') selected="selected" @endif>清水房</option>
                    <option  value="其他" @if($data->fengge =='其他') selected="selected" @endif>其他</option>
                  </select>
                </div>

                <div class="form-group">
                  <label id="lei">预算选择</label>
                  <select name="yusuan" class="form-control">
                    <option value="5万-10万"   @if($data->yusuan =='5万-10万')  selected="selected" @endif>5万-10万</option>
                    <option  value="10万-15万" @if($data->yusuan =='10万-15万')   selected="selected" @endif>10万-15万</option>
                    <option  value="15万-20万"  @if($data->yusuan =='15万-20万')  selected="selected" @endif>15万-20万</option>
                    <option  value="20万-25万" @if($data->yusuan =='20万-25万') selected="selected" @endif>20万-25万</option>
                    <option  value="25万-30万" @if($data->yusuan =='25万-30万') selected="selected" @endif>25万-30万</option>
                    <option  value="30万-35万" @if($data->yusuan =='30万-35万') selected="selected" @endif>30万-35万</option>
                    <option  value="35万-40万" @if($data->yusuan =='35万-40万') selected="selected" @endif>35万-40万</option>
                    <option  value="40万-45万" @if($data->yusuan =='40万-45万') selected="selected" @endif>40万-45万</option>
                    <option  value="45万-50万" @if($data->yusuan =='45万-50万') selected="selected" @endif>45万-50万</option>
                    <option  value="50万以上"  @if($data->yusuan =='50万以上')  selected="selected" @endif>50万以上</option>
                    <option  value="其他"      @if($data->yusuan =='其他')      selected="selected" @endif>其他</option>
                    
                    
                  </select>
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">网页标题</label>
                  <input type="text"  name="titles" value="{{ $data->titles }}" class="form-control" id="exampleInputEmail1" placeholder="网页标题">
                </div>
                
                 <div class="form-group">
                  <label for="exampleInputEmail1">网页关键字</label>
                  <input type="text"  name="keyworlds" value="{{ $data->keyworlds }}" class="form-control" id="exampleInputEmail1" placeholder="网页关键字">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">网页内容描述</label>
                  <input type="text"  name="description" value="{{ $data->description }}" class="form-control" id="exampleInputEmail1" placeholder="网页内容描述">
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