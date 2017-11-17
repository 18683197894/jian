@extends('Admin.index')

@section('css')

@endsection('css')

@section('content')
    <section class="content-header">
      <h1>板块管理</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>知识学堂</a></li>
        <li class="active">板块管理</li>
      </ol>
    </section>
        <div class="col-xs-12" >
          <div class="box">

            <div class="box-header">
           
              <h3 class="box-title"> <br>模块列表 - <a href="{{ url('admin/plate/add') }}">添加模块</a></h3>
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
                  <th style="width: 15%;  text-align:center;">ID</th>
                  <th style="width: 15%; text-align:center;">标题</th>
                  <th style="width: 25%; text-align:center;">展示图片</th>
                  <th style="width: 15%; text-align:center;">创建时间</th>
                  <th style="width: 25%; text-align:center;">操作</th>
                </tr>
                </thead>
                <tbody>
@if(isset($data) and count($data) > 0 )
	@foreach($data as $k => $v)
                <tr>
                  <td class="id" style="width: 15%;text-align: center;vertical-align: middle">{{ $v->id }}</td>
                  <td style="width: 15%;text-align: center;vertical-align: middle">{{ $v->title }}</td>
                  <td style="width: 25%;text-align: center;vertical-align: middle"><a href="{{ asset('uploads/plate/img/') }}/{{$v->img}}"><img src="{{ asset('uploads/plate/img/') }}/{{$v->img}}" width="200px" height="100px" alt=""></a></td>
                  <td style="width: 15%;text-align: center;vertical-align: middle">{{ date("Y年m月d日",$v->time) }}</td>
                  <td style="width: 25%;text-align: center;vertical-align: middle">
                    <a href="{{ url('admin/plate/edit') }}/{{ $v->id }}">编辑</a>&nbsp;&nbsp;
                  	<a href="#" class="del">删除</a>&nbsp;&nbsp;
                  	<a href="{{ url('admin/plate/newslist/') }}/{{ $v->id }}">文章管理</a>
                  </td>
                </tr>
    @endforeach($data as $k => $v)
@else
                <tr>
                  <td style="text-align: center;vertical-align: middle" colspan="5">未找到模块</td>
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

         $.ajax('/admin/plate/del',{
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