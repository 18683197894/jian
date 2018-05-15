@extends('Admin.index')


@section('css')

@endsection('css')

@section('content')
    <section class="content-header">
      <h1>常见问答列表</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>常见问答</a></li>
        <li class="active">常见问答</li>
      </ol>
    </section>
        <div class="col-xs-12" >
          <div class="box">

            <div class="box-header">
           
              <h3 class="box-title"> <br><a href="{{ url('jslmadmin/newslei/interlocution/interadd') }}">添加问答</a></h3>
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
                  <th style=" text-align:center;">问答</th>
                  <th style=" text-align:center;">内容</th>
                  <th style=" text-align:center;">创建时间</th>
                  <th style=" text-align:center;">操作</th>
                </tr>
                </thead>
                <tbody>
@if(isset($data) and count($data) > 0 )
	@foreach($data as $k => $v)
                <tr>
                  <td class="id" style="text-align: center;vertical-align: middle">{{ $v->id }}</td>
                  <td style="text-align: center;vertical-align: middle">{{ $v->title }}</td>
                  <td style="width:50%;text-align: left;vertical-align: middle">{{ $v->content }}</td>
                  <td style="width:15%;text-align: center;vertical-align: middle">{{ date('Y-m-d H:i:s',$v->time) }}</td>
                  <td style="width:8%;text-align: center;vertical-align: middle">
                  	<a href="{{ url('/jslmadmin/newslei/interlocution/interedit') }}/{{ $v->id }}?page={{ $request['page'] or 1 }}">修改</a>
                  	&nbsp;&nbsp;
                  	<a href="javascript:;" class="del">删除</a>
                  </td>
                  
                  </td>
                </tr>
 @endforeach($data as $k => $v)
@else
                <tr>
                  <td style="text-align: center;vertical-align: middle" colspan="5">未找到问答</td>
                </tr>
@endif

                </tbody>
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

         $.ajax('/jslmadmin/newslei/interlocution/interdel',{
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


