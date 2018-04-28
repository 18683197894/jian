@extends('Admin.index')

@section('css')

@endsection('css')

@section('content')
<section class="content-header" style="text-align:center">
      <h1>
        产品管理
        <!-- <small>Control panel</small> -->

      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>产品管理</a></li>
        <li class="active">产品</li>
      </ol>
    </section>
  
  <section class="content">

  <div class="box">
  <div class="box-header">
           
              <h3 class="box-title"> <br> <a href="{{ url('/newpro/index/package/productadd') }}">添加产品</a></h3>
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
                <th style="text-align:center" class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" >标题</th>
                <th style="text-align:center" class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" >添加时间</th>
                <th style="text-align:center" class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" >操作</th>
               </thead>

@if( isset($data) and count($data) > 0)                
@foreach($data as $k => $v)     
                <tr role="row" class="odd" index="{{$v->id}}">

                  <td style="text-align: center;vertical-align: middle">{{ $v->id }}</td>
                  <td style="text-align: center;vertical-align: middle">{{ $v->title }}</td>
                  <td style="text-align: center;vertical-align: middle">{{ date('Y-m-d H:i:s',$v->time) }}</td>
                  <td style="text-align: center;vertical-align: middle"> <a href="{{ url('/newpro/index/package/productedit') }}/{{$v->id}}">修改</a> <a href="javascript;">删除</a> <a href="">子类管理</a> </td>
                
                </tr>
@endforeach
@else
<tr role="row" class="odd">
  <td style="text-align: center;vertical-align: middle" colspan="4">未找到订单</td>
</tr>
@endif
              </table>

              </div>
            </div>
            <!-- /.box-body -->
          </div>
  </section>
@endsection('content')

@section('js')

@endsection('js')