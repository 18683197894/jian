@extends('Admin.index')

@section('css')

@endsection('css')

@section('content')
    <section class="content-header">
      <h1>首页导航栏目</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>网站配置</a></li>
        <li class="active">首页导航栏目</li>
      </ol>
    </section>
        <div class="col-xs-12" >
          <div class="box">
          <div class="box-header">
           
              <h3 class="box-title"> <br><a href="{{ url('/admin/config/nav/add') }}">添加栏目</a></h3>
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
                  <th style="text-align:center;">栏目名称</th>
                  <th style="text-align:center;">URL</th>
                  <th style="text-align:center;">排序(order字段)</th>
                  <th style="text-align:center;">操作</th>
                 
                </tr>
                </thead>
                <tbody>
@if(count($data) > 0 )
	@foreach($data as $k => $v)
                <tr>
                  <td class="id" style="text-align: center;vertical-align: middle">{{ $v->id }}</td>
                  <td style="text-align: center;vertical-align: middle">{{ $v->title }}</td>
                  <td style="text-align: center;vertical-align: middle">{{ $v->url }}</td>
                  <td style="text-align: center;vertical-align: middle">{{ $v->status }}</td>
                  <td style="text-align: center;vertical-align: middle"><a href="{{ url('/home/config/nav/edit') }}/{{ $v->id }}">编辑</a> 
                  <a class="del" href="javascript:" >&nbsp;&nbsp;&nbsp;删除</a>
                  <a class="shang" href="javascript:" >&nbsp;&nbsp;&nbsp;上移</a>
                  <a class="xia" href="javascript:" >&nbsp;&nbsp;&nbsp;下降</a>
                  </td>
                
                </tr>
    @endforeach($data as $k => $v)
@else
                <tr>
                  <td style="text-align: center;vertical-align: middle" colspan="5">未找到数据</td>
                </tr>
@endif

                </tbody>
   
              </table>
            </div>
            <div class="row"><div class="col-sm-5"></div><div class="col-sm-7">
              <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
                
              </div></div></div>
           </div>
           </div>
@endsection('content')

@section('js')
<script>
  $('.del').on('click',function(){
    var id = $(this).parents('tr').find('.id').html();
    var tr = $(this).parents('tr');
    $.ajax('/admin/config/nav/navdelajax',{
      type : 'post',
      data : {id:id,_token:$("meta[name='csrf-token']").attr("content")},
      success : function(data)
      {
        if(data == 1)
        {
          alert('删除成功！');
          tr.empty();
        }
        if(data ==2)
        {
          alert('删除失败！');
          return false;
        }
      },
      error : function(data)
      {
        alert('删除失败！');
      }
    })
  })

  $('.shang').on('click',function(){
    var id = $(this).parents('tr').find('.id').html();
    var tr = $(this).parents('tr');
    
    $.ajax('/admin/config/nav/navshang',{
      type : 'post',
      data : {id:id,_token:$("meta[name='csrf-token']").attr("content")},
      success : function(data)
      {
        if( data ==4 )
        {
          alert('移动失败，数据不存在！');
          return false;
        }
        if( data == 3 )
        {
          alert('移动失败，已达到顶点！');
          return false;
        }
        if( data == 1 )
        {
          alert('移动成功!');
        }
        if( data == 2 )
        {
          alert('移动失败！事务处理失败！');
        }
      },
      error : function(data)
      {
        alert('删除失败！');
      }
    })
  })

  
</script>
@endsection('js')