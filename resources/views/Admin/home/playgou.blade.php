@extends('Admin.index')

@section('css')

@endsection('css')

@section('content')
    <section class="content-header" style="text-align:center">
      <h1>{{ $title }}</h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('jslmadmin/userhome/index') }}"><i class="fa fa-dashboard"></i>用户管理</a></li>
        <li class="active">购物车</li>
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
        
       <!--  <div class="col-md-4 col-md-offset-6">
          <div class="input-group input-group-sm">
            <input type="text" name="key" value="{{ $request['key'] or '' }}" class="form-control" placeholder="输入用户名或手机号搜索">
               <span class="input-group-btn">
                 <button type="submit" class="btn btn-info btn-flat">Go!</button>
               </span>
          </div>
        </div> -->
        </div>
      </form>
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th width="10%"  style=" text-align:center;">ID</th>
                  <th width="25%"  style="text-align:center;">包名称</th>
                  <th width="15%"  style="text-align:center;">所属风格</th>
                  <th width="10%"  style="text-align:center;">价格</th>
                  <th width="10%"  style="text-align:center;">数量</th>
                  <th width="20%"  style="text-align:center;">创建时间</th>
                  <th width="10%"  style="text-align:center;">操作</th>
                </tr>
                </thead>
                <tbody>
@if(isset($data) and count($data) > 0 )
	@foreach($data as $k => $v)
                <tr>
                  <td class="id" style="text-align: center;vertical-align: middle">{{ $v->id }}</td>
                  <td class="id" style="text-align: center;vertical-align: middle">{{ $v->name }}</td>
                  <td class="id" style="text-align: center;vertical-align: middle">{{ $v->path }}</td>
                  <td class="id" style="text-align: center;vertical-align: middle">{{ $v->money }}</td>
                  <td class="id" style="text-align: center;vertical-align: middle">{{ $v->num }}</td>
                  <td class="id" style="text-align: center;vertical-align: middle">{{ date('Y-m-d H:i:s',$v->time) }}</td>
                  <td class="id" style="text-align: center;vertical-align: middle"></td>
                 
                </tr>
    @endforeach($data as $k => $v)
@else
                <tr>
                  <td style="text-align: center;vertical-align: middle" colspan="7">未找到数据</td>
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
  

</script>
@endsection('js')