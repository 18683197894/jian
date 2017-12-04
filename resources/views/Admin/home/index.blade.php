@extends('Admin.index')

@section('css')

@endsection('css')

@section('content')
    <section class="content-header" style="text-align:center">
      <h1>用户管理</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>用户管理</a></li>
        <li class="active">用户管理</li>
      </ol>
    </section>
        <div class="col-xs-12" >
          <div class="box">

         
 				@if (session('info'))
				<div style="height:40px;line-height:10px;" class="alert alert-danger">
				{{ session('info') }}
				</div>
				@endif
            <!-- /.box-header -->
            <div class="box-body">
             <form action="{{url('jslmadmin/userhome/index')}}" method="get">
        <div class="row">
         <div class="col-md-2">
           
            <div class="box-header">
           
              <!-- <h3 class="box-title"><a href="{{ url('/admin/case/add') }}">添加案例</a></h3> -->
            </div>
            
          </div>
        
        <div class="col-md-4 col-md-offset-6">
          <div class="input-group input-group-sm">
            <input type="text" name="key" value="{{ $request['key'] or '' }}" class="form-control" placeholder="输入用户名或手机号搜索">
               <span class="input-group-btn">
                 <button type="submit" class="btn btn-info btn-flat">Go!</button>
               </span>
          </div>
        </div>
        </div>
      </form>
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th style="text-align:center;">ID</th>
                  <th style="text-align:center;">用户名</th>
                  <th style="text-align:center;">手机号</th>
                  <th style="text-align:center;">TA购物车</th>
                  <th style="text-align:center;">TA订单</th>
                  <th style="text-align:center;">注册时间</th>
                  <th style="text-align:center;">最近登入</th>
                  <th style="text-align:center;">状态</th>
                  <th style="text-align:center;">操作</th>
              
                </tr>
                </thead>
                <tbody>
@if(isset($data) and count($data) > 0 )
	@foreach($data as $k => $v)
                <tr>
                  <td class="id" style="text-align: center;vertical-align: middle">{{ $v->id }}</td>
                  <td class="id" style="text-align: center;vertical-align: middle">{{ $v->name }}</td>
                  <td class="id" style="text-align: center;vertical-align: middle">{{ $v->phone }}</td>
                  <td class="id" style="text-align: center;vertical-align: middle"><a href="{{ url('/jslmadmin/userhome/playgou') }}/{{ $v->id }}">{{ $v->gou }}</a></td>
                  <td class="id" style="text-align: center;vertical-align: middle"><a href="">{{ $v->id }}</a></td>
                  <td class="id" style="text-align: center;vertical-align: middle">{{ date('Y-m-d H:i:s',$v->time) }}</td>
                  <td class="id" style="text-align: center;vertical-align: middle">{{ date('Y-m-d H:i:s',$v->uptime) }}</td>
                  <td class="id" style="text-align: center;vertical-align: middle">@if($v->status == 1) 正常 @else 禁止登陆 @endif</td>
                  <td class="id" style="text-align: center;vertical-align: middle"><a href="#" class="status">@if($v->status == 1) 禁用 @else 启用 @endif</a></td>
                 
                </tr>
    @endforeach($data as $k => $v)
@else
                <tr>
                  <td style="text-align: center;vertical-align: middle" colspan="8">未找到数据</td>
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
  $('.status').on('click',function(){
  		var id = $(this).parents('tr').find('td').eq(0).html();
  		var status = $(this).parents('tr').find('td > .status ');
  		var status_rm = $(this).parents('tr').find('td').eq(7);
  		
  		$.ajax('/jslmadmin/userhome/index/statusajax',{
  			type : 'post',
  			data : {id:id,_token:$("meta[name='csrf-token']").attr('content')},
  			success : function(data)
  			{
  				if( data == 3 )
  				{
  					alert('找不到该用户!');
  				}else if( data == 2 )
  				{
  					alert('数据库写入失败！');
  				}else if( data == 0 )
  				{	
  					status.html('启用');
  					status_rm.html('禁用登入');
  					alert('禁用成功！');
  				}else if( data == 1 )
  				{	
  					status.html('禁用');
  					status_rm.html('正常');
  					alert('启用成功！');
  				}
  			},
  			error : function(data)
  			{
  				alert('数据异常');
  			}
  		})
  })

</script>
@endsection('js')