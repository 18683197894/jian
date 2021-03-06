@extends('Admin.index')

@section('css')

@endsection('css')

@section('content')
    <section class="content-header">
      <h1>网页关键字</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>网站配置</a></li>
        <li class="active">网页关键字</li>
      </ol>
    </section>
        <div class="col-xs-12" >
          <div class="box">
          <div class="box-header">
           
              <h3 class="box-title"> <br><a href="{{ url('/admin/config/wepage/add') }}">添加URL网页</a></h3>
            </div>
         
 				@if (session('info'))
				<div style="height:40px;line-height:10px;" class="alert alert-danger">
				{{ session('info') }}
				</div>
				@endif
            <!-- /.box-header -->
            <div class="box-body">
       <br>
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th style="text-align:center;">ID</th>
                  <th style="text-align:center;">网页</th>
                  <th style="text-align:center;">URL</th>
                  <th style="text-align:center;">网页标题</th>
                  <th style="width:30%;text-align:center;">网页关键字</th>
                  <th style="width:30%;text-align:center;">网页内容描述</th>
                  <th style="width:8%;text-align:center;">操作</th>
                </tr>
                </thead>
                <tbody>
@if(isset($data) and count($data) > 0 )
	@foreach($data as $k => $v)
                <tr>
                  <td class="id" style="text-align: center;vertical-align: middle;@if( session('edit_id') == $v->id ) color:red @endif">{{ $v->id }}</td>
                  <td style="text-align: center;vertical-align: middle">{{ $v->title }}</td>
                  <td style="text-align: center;vertical-align: middle"><a href="{{ url( $v->url ) }}" target="_blank">{{ $v->url }}</a></td>
                  <td style="text-align: center;vertical-align: middle">{{ $v->titles }}</td>
                  <td style="text-align: left;vertical-align: middle">{{ $v->keyworlds }}</td>
                  <td class="content" style=" text-align: left;vertical-align: middle">{{ $v->description }}</td>
                  <td style="text-align: center;vertical-align: middle">
                    <a href="{{ url('admin/config/webpage/edit/') }}/{{ $v->id }}?page={{ $page }}" >编辑</a>&nbsp;&nbsp;
                  	<a href="javascript:;" class="del">删除</a>
                  	
                  </td>
                </tr>
    @endforeach($data as $k => $v)
@else
                <tr>
                  <td style="text-align: center;vertical-align: middle" colspan="7">未找到预约数据</td>
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

         $.ajax('/admin/config/webpage/del',{
            type : 'post',
            data :{id:id},
            success : function(data){
             
              if(data ==1)
              {
                tr.css('display','none');
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