@extends('Admin.index')

@section('css')

@endsection('css')

@section('content')
    <section class="content-header">
      <h1>织金调查问卷</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>调查问卷</a></li>
        <li class="active">织金调查问卷</li>
      </ol>
    </section>
        <div class="col-xs-12" >
          <div class="box">
          <br>
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
                  <th style="text-align:center;">ID</th>
                  <th style="text-align:center;">姓名</th>
                  <th style="text-align:center;">手机</th>
                  <th style="text-align:center;">职业</th>
                  <th style="text-align:center;">常住人口</th>
                  <th style="text-align:center;">装修服务</th>
                  <th style="text-align:center;">手机</th>
                  <th style="text-align:center;">手机</th>
                  <th style="text-align:center;">手机</th>
                  <th style="text-align:center;">手机</th>
                  <th style="text-align:center;">手机</th>
                  <th style="text-align:center;">手机</th>
                  
                </tr>
                </thead>
                <tbody>
@if(isset($data) and count($data) > 0 )
	@foreach($data as $k => $v)
                <tr>
                  <td class="id" style="text-align: center;vertical-align: middle">{{ $v->id }}</td>
                </tr>
    @endforeach($data as $k => $v)
@else
                <tr>
                  <td style="text-align: center;vertical-align: middle" colspan="5">没有数据</td>
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

         $.ajax('/admin/gongyi/lei/del',{
            type : 'post',
            data :{id:id},
            success : function(data){
             
              if(data ==1)
              {
                tr.empty();
                alert('删除成功！');
              }else if(data ==2)
              {
                alert('删除失败！');
              }else if(data ==3)
              {
                alert('删除失败 请先删除子文章在执行删除！');
                

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