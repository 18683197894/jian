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
        
        <div class="col-md-2 col-md-offset-5"> 
          <button id="dump_current" target="blank" class="btn btn-info">导出当前页</button>
          &nbsp;&nbsp;&nbsp;
          <!-- <a href="{{ url('/jslmadmin/payment/index/dump_all') }}" target="blank" class="btn btn-info">导出所有</a> -->
          <button id="dump_all" class="btn btn-info">导出所有</button>
        </div>
        
        <div class="col-md-5">
        <form action="{{ url('admin/paymentdiy/diyindex') }}" method="get">
        <div class="form-group col-md-4" >
                  <select name="status" class="form-control">
                    <option value="A" @if(isset($request['status']) && $request['status']  == 'A' ) selected="selected" @endif >所有订单</option>
                    <option value="1" @if(isset($request['status']) && $request['status']  == '1' ) selected="selected" @endif >已支付</option>
                    <option value="0" @if(isset($request['status']) && $request['status']  == '0' ) selected="selected" @endif>未支付</option>
                  </select>
        </div>
          <div class="input-group input-group-sm">
            <input type="text" id="input" name="key" page="{{ $request['page'] or 1 }}" key="{{ $request['key'] or '' }}" status="{{ $request['status'] or 'A' }}" value="{{ $request['key'] or '' }}" class="form-control" placeholder="订单号搜索">
               <span class="input-group-btn">
                 <button type="submit" class="btn btn-info btn-flat">Go!</button>
               </span>
          </div>
        </form>
        </div>
        </div>
        <br>
      
              <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
              <div class="row"><div class="col-sm-12"><table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                <thead>
                <tr role="row">
                <th style="text-align:center" class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" >ID</th>
                <th style="text-align:center" class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" >姓名</th>
                <th style="text-align:center" class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" >电话</th>
                <th style="text-align:center" class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" >楼盘</th>
                <th style="text-align:center" class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" >合同号</th>
                <th style="text-align:center" class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" >房号</th>
                <th style="text-align:center" class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" >备注</th>
                <th style="text-align:center" class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" >金额</th>
                <th style="text-align:center" class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" >订单号</th>
                <th style="text-align:center" class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" >支付方式</th>
                <th style="text-align:center" class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" >订单生成时间</th>
                <th style="text-align:center" class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" >订单支付时间</th>
                <th style="text-align:center" class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" >第三方订单号</th>
                <th style="text-align:center" class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" >支付状态</th>
                <th style="text-align:center" class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" >操作</th>
                
                </tr>
               </thead>

@if( isset($data) and count($data) > 0)                
@foreach($data as $k => $v)     
                <tr role="row" class="odd" index="{{$v->id}}">
                  <td style="text-align: center;vertical-align: middle">{{ $v->id }}</td>
                  <td style="text-align: center;vertical-align: middle">{{ $v->name }}</td>
                  <td style="text-align: center;vertical-align: middle">{{ $v->phone }}</td>
                  <td style="text-align: center;vertical-align: middle">{{ $v->ors }}</td>
                  <td style="text-align: center;vertical-align: middle">{{ $v->contract }}</td>
                  <td style="text-align: center;vertical-align: middle">{{ $v->room }}</td>
                  <td style="text-align: center;vertical-align: middle">{{ $v->remarks }}</td>
                  <td style="text-align: center;vertical-align: middle">{{ $v->total }}</td>
                  <td style="text-align: center;vertical-align: middle">{{ $v->_token }}</td>
                  <td style="text-align: center;vertical-align: middle">{{ $v->payors or ''}}</td>
                  <td style="text-align: center;vertical-align: middle">{{ date('Y-m-d H:i:s',$v->time[0]) }}</td>
                  <td style="text-align: center;vertical-align: middle">{{ isset($v->time[1])?date('Y-m-d H:i:s',$v->time[1]):'' }}</td>
                  <td style="text-align: center;vertical-align: middle">{{ $v->create_id or '' }}</td>
                  <td style="text-align: center;vertical-align: middle"> @if($v->status == 0) 未支付 @elseif($v->status == 1) 已支付 @endif </td>
                  <td style="text-align: center;vertical-align: middle"> @if($v->status == 0) <a style="cursor:pointer" class="del">删除</a> @endif </td>
                  
                </tr>
@endforeach
@else
<tr role="row" class="odd">
  <td style="text-align: center;vertical-align: middle" colspan="15">未找到订单</td>
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

            var $eleForm = $("<form class='dump' method='get'></form>");  
  
            $eleForm.attr("action","/jslmadmin/payment/diyindex/diy_dump_all");  
  
            $(document.body).append($eleForm);  
  
            //提交表单，实现下载  
            $('.dump').submit();  
            // $("form[name='dump']").submit();  

        });  

        $('#dump_current').on('click',function(){
          var page = $('#input').attr('page');
          var key = $('#input').attr('key');
          var status = $('#input').attr('status');

          var $eleForm = $("<form method='get'> <input type='text' name='page' value='"+page+"' > <input type='text' name='status' value='"+status+"' > <input type='text' name='key' value='"+key+"' > </form>");  
  
            $eleForm.attr("action","/jslmadmin/payment/diyindex/diy_dump_current");  
  
            $(document.body).append($eleForm);  
  
            //提交表单，实现下载  
            $eleForm.submit();

        })
        </script>

</script>


<script>
  $('.del').on('click',function(){
    var tr = $(this).parents('tr');
    var id = tr.attr('index');

    $.ajax('/admin/paymentdiy/diyindexdel',{
      type : 'post',
      data : {id:id,_token:$("meta[name='csrf-token']").attr('content')},
      success : function(data)
      {
        if(data !== 1)
        {
          alert(data);
          return false;
        }else
        {
          alert('删除成功！');
          tr.css('display','none');
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