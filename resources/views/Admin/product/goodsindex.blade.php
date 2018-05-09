@extends('Admin.index')

@section('css')

@endsection('css')

@section('content')
<section class="content-header" style="text-align:center">
      <h1>
        {{ $pdata->title }} -- 产品管理
        <!-- <small>Control panel</small> -->

      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('/newpro/index/package/productindex')}}"><i class="fa fa-dashboard"></i>分类管理</a></li>
        <li class="active">产品</li>
      </ol>
    </section>
  
  <section class="content">

  <div class="box">
  <div class="box-header">
           
              <h3 class="box-title"> <br> <a href="{{ url('/newpro/index/package/product/goodsadd/') }}/{{ $pdata->id }}">添加产品</a></h3>
            </div>
            <div class="box-header">
       @if (session('info'))
        <div style="height:40px;line-height:10px;" class="alert alert-danger">
        {{ session('info') }}
        </div>
      @else
             

      @endif
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
              <div class="row"><div class="col-sm-12"><table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                <thead>
                <tr role="row">
                <th style="text-align:center" class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" >ID</th>
                <th style="text-align:center" class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" >名称</th>
                <th style="text-align:center" class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" >品牌</th>
                <th style="text-align:center" class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" >型号</th>
                <th style="text-align:center" class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" >规格</th>
                <th style="text-align:center" class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" >数量</th>
                <th style="text-align:center;width:20%" class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" >描述</th>
                <th style="text-align:center;width:15%" class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" >展示图片</th>
                <th style="text-align:center" class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" >最后操作时间</th>
                <th style="text-align:center" class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" >操作</th>
               </thead>

@if( isset($data) and count($data) > 0)                
@foreach($data as $k => $v)     
                <tr role="row" class="odd" index="{{$v->id}}">

                  <td style="text-align: center;vertical-align: middle">{{ $v->id }}</td>
                  <td style="width:18%;text-align: left;vertical-align: middle">{{ $v->title }}</td>
                  <td style="text-align: center;vertical-align: middle">{{ $v->brand }}</td>
                  <td style="text-align: center;vertical-align: middle">{{ $v->model }}</td>
                  <td style="text-align: center;vertical-align: middle">{{ $v->spec }}</td>
                  <td style="text-align: center;vertical-align: middle">{{ $v->num }}</td>
                  <td style="width:20%;text-align: left;  vertical-align: middle">{{ $v->remarks }}</td>
                  <td style="text-align: center;vertical-align: middle"><a target="_blank" href="{{ url('/uploads/product/img') }}/{{ $v->imgs[0] }}"> <img width="80px" height="100px" src="{{ asset('/uploads/product/img') }}/{{ $v->imgs[0] }}" alt=""> </a></td>
                  <td style="text-align: center;vertical-align: middle">{{ date('Y-m-d H:i:s',$v->uptime) }}</td>
                  <td style="text-align: center;vertical-align: middle"> <a href="{{ url('/newpro/index/package/product/goodsedit') }}/{{$v->id}}?page={{ $page }}">修改</a>&nbsp;&nbsp;&nbsp;<a class="del" href="javascript:;">删除</a></td>
                
                </tr>
@endforeach
@else
<tr role="row" class="odd">
  <td style="text-align: center;vertical-align: middle" colspan="10">未找到产品</td>
</tr>
@endif 

              </table>
               <div class="row">
               <div class="col-sm-5">
               </div>
               <div class="col-sm-7">
              <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
                {{ $data->links() }}
              </div>
              </div>
              </div>
            
            </div>
            <!-- /.box-body -->
          

              </div>
            
            <!-- /.box-body -->
          </div>
  </section>
@endsection('content')

@section('js')
<script>
  $('.del').on('click',function(){
    var tr = $(this).parents('tr');
    id = tr.attr('index');
    $.ajax('/newpro/index/package/product/goodsdel',{
      type:'post',
      data:{id:id,_token:$("meta[name='csrf-token']").attr('content')},
      success:function(data)
      {
        if(data == 1)
        {
          alert('删除成功！');
          tr.css('display','none');
        }else
        {
          alert('删除失败！');
        }
      },
      error:function(data)
      {
        alert('删除失败！');
      }
    })
  })
</script>
@endsection('js')