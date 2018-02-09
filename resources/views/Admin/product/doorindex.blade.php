@extends('Admin.index')

@section('css')

@endsection('css')

@section('content')
    <section class="content-header" style="text-align:center">
      <h1> {{ $pid->ptitle }} - {{ $pid->title }} - 户型管理</h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/admin/product/style/index') }}"><i class="fa fa-dashboard"></i>风格列表</a></li>
        <li class="active">户型管理</li>
      </ol>
    </section>
        <div class="col-xs-12" >
          <div class="box">
          
            <div class="box-header" >
              <h3 class="box-title col-xs-1"> <br><a href="{{ url('/admin/product/style/dooradd') }}/{{ $pid->id }}">添加户型</a></h3>
           
          </div>
 				@if (session('info'))
				<div style="height:40px;line-height:10px;" class="alert alert-danger">
				{{ session('info') }}
				</div>
				@endif
          
            <!-- /.box-header -->
            <div class="box-body">
            
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th style=" text-align:center;">ID</th>
                  <th style=" text-align:center;">户型</th>
                  <th style=" text-align:center;">主流品牌报价</th>
                  <th style=" text-align:center;">非主流品牌报价</th>
                  <th style=" text-align:center;">样板间房报价</th>
                  <th style=" text-align:center;">操作</th>
        
                </tr>
                </thead>
                <tbody>
@if(isset($data) and count($data) > 0 )
	@foreach($data as $k => $v)
                <tr>
                  <td class="id" style="text-align: center;vertical-align: middle">{{ $v->id }}</td>
                  <td style="text-align: center;vertical-align: middle">{{ $v->title }}</td>
                  <td style="text-align: center;vertical-align: middle">{{ $v->main }} <a href="{{ url('/admin/product/style/mainindex') }}/{{ $v->id }}"> &nbsp;&nbsp;项目管理</a></td>
                  <td style="text-align: center;vertical-align: middle">@if($v->nomain != null) {{ $v->nomain }} <a href="{{ url('/admin/product/style/mainindex') }}/{{ $v->id }}"> &nbsp;&nbsp;项目管理 @endif</td>
                  <td style="text-align: center;vertical-align: middle">@if($v->model != null) {{ $v->model }} <a href=""> &nbsp;&nbsp;项目管理 @endif</td>
                  <td style="text-align: center;vertical-align: middle"><a href="{{ url('/admin/product/style/dooredit') }}/{{ $v->id }}">编辑</a> <a href="javascript:;" class="del">删除</a> </td>
                </tr>
    @endforeach($data as $k => $v)
@else
                <tr>
                  <td style="text-align: center;vertical-align: middle" colspan="6">未找到户型</td>
                </tr>
@endif

                </tbody>  
              </table>
            </div>
            <div class="row"><div class="col-sm-5"></div><div class="col-sm-7">
              <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
                {{ $data->links() }}
              </div></div></div>
           </div>
           </div>
@endsection('content')

@section('js')
<script>
  $(".del").on('click',function(){
          var tr = $(this).parents('tr');
          var id = $(this).parents('tr').find('.id').html();

         $.ajaxSetup({
          headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
          
          });

         $.ajax('/admin/product/style/doordel',{
            type : 'post',
            data :{id:id},
            success : function(data){
             console.log(data);
              if(data ==1)
              {
                tr.empty();
                alert('删除成功！');
              }else
              {
                alert('删除失败！');
              }
            },
            error : function(data){
              alert('删除失败 请重试!');
            },
            dateType : 'json'
         })
  })
</script>
@endsection('js')