@extends('Admin.index')

@section('css')

@endsection('css')

@section('content')
    <section class="content-header" style="text-align:center">
      <h1>
        包管理
        <!-- <small>Control panel</small> -->

      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>产品管理</a></li>
        <li class="active">包管理</li>
      </ol>
    </section>
  
  <section class="content">

  <div class="box">
  <div class="box-header">
           
              <h3 class="box-title"> <br> <a href="{{ url('newpro/index/package/packageadd') }}">添加包</a></h3>
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
                <th style="text-align:center" class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" >姓名</th>
                <th style="text-align:center" class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" >属性</th>
                <th style="text-align:center" class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" >价格</th>
                <th style="text-align:center" class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" >操作</th>
               </thead>

@if( isset($data) and count($data) > 0)                
@foreach($data as $k => $v)     
                <tr role="row" class="odd" index="{{$v->id}}">
                  <td style="text-align: center;vertical-align: middle">{{ $v->id }}</td>
                  <td style="text-align: center;vertical-align: middle">{{ $v->name }}</td>
                  <td style="text-align: center;vertical-align: middle">{{ $v->ors }}</td>
                  <td style="text-align: center;vertical-align: middle">{{ $v->money }}</td>
                  <td style="text-align: center;vertical-align: middle">
                  <a style="cursor:pointer" href="{{ url('newpro/index/package/packageedit?id=') }}{{$v->id}}">编辑</a>&nbsp;&nbsp;
                  <a style="cursor:pointer" class="del">删除</a>
                  </td>
                  
                </tr>
@endforeach
@else
<tr role="row" class="odd">
  <td style="text-align: center;vertical-align: middle" colspan="5">未找到订单</td>
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
<script>
  $('.del').on('click',function(){
    var tr = $(this).parents('tr');
    var id = tr.attr('index');

    $.ajax('/newpro/index/package/packagedel',{
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