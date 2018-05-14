@extends('Admin.index')

@section('css')

@endsection('css')

@section('content')
    <section class="content-header" style="text-align:center">
      <h1>
        订单管理
        <!-- <small>Control panel</small> -->

      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>订单管理</a></li>
        <li class="active">所有订单</li>
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
        <div class="row">
        
        <div class="col-md-2 col-md-offset-6"> 
          <button id="dump_current" target="blank" class="btn btn-info">导出当前页</button>
          &nbsp;&nbsp;&nbsp;
          <!-- <a href="{{ url('/jslmadmin/payment/index/dump_all') }}" target="blank" class="btn btn-info">导出所有</a> -->
          <button id="dump_all" class="btn btn-info">导出所有</button>
        </div>

        <div class="col-md-4">
          <form action="{{url('jslmadmin/payment/index')}}" method="get">
              <div class="input-group input-group-sm">
                <input id="input" type="text" name="key" page="{{ $page }}" key='{{ $key }}' value="{{ $request['key'] or '' }}" class="form-control" placeholder="订单号搜索">
                   <span class="input-group-btn">
                     <button type="submit" class="btn btn-info btn-flat">Go!</button>
                   </span>
              </div>
            </div>
          </form>

        </div>
        <br>
              <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
              <div class="row"><div class="col-sm-12"><table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                <thead>
                <tr role="row">
                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" >ID</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"  style="text-align:center;">订单号</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"  style="text-align:center;">属性</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"  style="text-align:center;">创建人</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"  style="text-align:center;">备注</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"  style=" width:20%;text-align:center;">收货人信息</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"  style="text-align:center;">发票</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"  style="text-align:center;">平台订单号</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"  style="text-align:center;">金额</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"  style="text-align:center;">支付方式</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"  style="text-align:center;">创建时间</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"  style="text-align:center;">支付时间</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"  style="width:5%;text-align:center;">状态</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"  style="text-align:center;">操作</th>
                </tr>
               </thead>

@if( isset($data) and count($data) > 0)                
@foreach($data as $k => $v)     
                <tr role="row" class="odd">
                  <td style="text-align: center;vertical-align: middle">{{ $v->id }}</td>
                  <td style="text-align: center;vertical-align: middle">{{ $v->_token }}</td>
                  <td style="text-align: center;vertical-align: middle">{{ $v->name }}</td>
                  <td style="text-align: center;vertical-align: middle">{{ $v->names }}</td>
                  <td style="text-align: center;vertical-align: middle">{{ $v->remarks }}</td>
                  <td style="text-align: left;vertical-align: middle">{{ $v->linkman }} {{ $v->phone }} {{ $v->address }}</td>
                  <td style="text-align: center;vertical-align: middle">@if($v->invoice == 0) 无 @else 是 @endif</td>
                  <td style="text-align: center;vertical-align: middle">{{ $v->create_id }}</td>
                  <td style="text-align: center;vertical-align: middle">{{ $v->total }}</td>
                  <td style="text-align: center;vertical-align: middle">{{ $v->payors }}</td>
                  <td style="text-align: center;vertical-align: middle">{{ date('Y-m-d H:i:s',$v->addtime[0]) }}</td>
                  <td style="text-align: center;vertical-align: middle">@if(isset($v->addtime[1])){{ date('Y-m-d H:i:s',$v->addtime[1]) }} @endif</td>
                  <td style="text-align: center;vertical-align: middle">{{ $v->status }}</td>
                  <td style="text-align: center;vertical-align: middle"><a href="{{ url('/jslmadmin/payment/index/shopping/') }}/{{ $v->id }}">商品详情</a></td>
                </tr>
@endforeach
@else
<tr role="row" class="odd">
  <td style="text-align: center;vertical-align: middle" colspan="12">未找到订单</td>
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
<script>
        $('#dump_all').on('click',function(){  
            // url = '/jslmadmin/payment/index/dump_all';
            // window.open(url);
            // return false;
            var $eleForm = $("<form method='get'></form>");  
  
            $eleForm.attr("action","/jslmadmin/payment/index/dump_all");  
  
            $(document.body).append($eleForm);  
  
            //提交表单，实现下载  
            $eleForm.submit();  
        });  

        $('#dump_current').on('click',function(){
          var page = $('#input').attr('page');
          var key = $('#input').attr('key');

          var $eleForm = $("<form method='get'> <input type='text' name='page' value='"+page+"' > <input type='text' name='key' value='"+key+"' > </form>");  
  
            $eleForm.attr("action","/jslmadmin/payment/index/dump_current");  
  
            $(document.body).append($eleForm);  
  
            //提交表单，实现下载  
            $eleForm.submit();

        })
        </script>
@endsection('js')