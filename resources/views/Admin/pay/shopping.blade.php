@extends('Admin.index')

@section('css')

@endsection('css')

@section('content')
    <section class="content-header" style="text-align:center">
      <h1>
        订单商品详情
        <!-- <small>Control panel</small> -->

      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/jslmadmin/payment/index') }}"><i class="fa fa-dashboard"></i>订单列表</a></li>
        <li class="active">订单商品详情</li>
      </ol>
    </section>

  <section class="content">
  <div class="box">
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
                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" >ID</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"  style="text-align:center;">名称</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"  style="text-align:center;">分类</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"  style="text-align:center;">路径</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"  style="text-align:center;">单价</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"  style="text-align:center;">数量</th>
                </tr>
               </thead>

@if( isset($data) and count($data) > 0)                
@foreach($data as $k => $v)     
                <tr role="row" class="odd">
                  <td style="text-align: center;vertical-align: middle">{{ $v->id }}</td>
                  <td style="text-align: center;vertical-align: middle">{{ $v->name }}</td>
                  <td style="text-align: center;vertical-align: middle">{{ $v->tus }}</td>
                  <td style="text-align: center;vertical-align: middle"> <a href="{{ url('admin/package/ruan/fg/column/subclass/') }}/{{ $v->sub_id }}" target="_blank">{{ $v->path }}</a></td>
                  <td style="text-align: center;vertical-align: middle">{{ $v->prince }}</td>
                  <td style="text-align: center;vertical-align: middle">{{ $v->num }}</td>
                </tr>
@endforeach
@else
<tr role="row" class="odd">
  <td style="text-align: center;vertical-align: middle" colspan="6">未找到商品</td>
</tr>
@endif
              </table>

              </div></div><div class="row"><div class="col-sm-5"></div><div class="col-sm-7">
              <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
                {{ $data->links() }}
              </div></div></div></div>
            </div>
            <!-- /.box-body -->
          </div>
  </section>
@endsection('content')
@section('js')

@endsection('js')