@extends('Admin.index')

@section('css')

@endsection('css')

@section('content')
    <section class="content-header" style="text-align:center">
      <h1>{{ $tit }} - 包管理</h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('admin/package/all') }}"><i class="fa fa-dashboard"></i>包列表</a></li>
        <li class="active">子包管理</li>
      </ol>
    </section>
        <div class="col-xs-12">
          <div class="box">

            <div class="box-header">
           
              <h3 class="box-title"> <br><a href="{{ url('/admin/package/all/ziadd') }}/{{ $id }}">添加子包</a></h3>
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
                  <th style="width:10%;text-align:center;">ID</th>
                  <th style="width:10%;text-align:center;">包名称</th>
                  <th style="width:20%;text-align:center;">包介绍</th>
                  <th style="width:25%;text-align:center;">展示图片</th>
                  <th style="width:10%;text-align:center;">价格</th>
                  <th style="width:15%;text-align:center;">创建时间</th>
                  <th style="width:10%;text-align:center;">操作</th>
                </tr>
                </thead>
                <tbody>
@if(isset($data) and count($data) > 0 )
  @foreach($data as $k => $v)
                <tr>
                  <td class="id" style="text-align: center;vertical-align: middle">{{ $v->id }}</td>
                  <td style="text-align: center;vertical-align: middle">{{ $v->title }}</td>
                  <td style="text-align: center;vertical-align: middle">{{ $v->con }}</td>
                  <td style="text-align: center;vertical-align: middle"><img width="200px" height="120px" src="{{ asset('uploads/all/img') }}/{{ $v->img }}" alt=""></td>
                  <td style="text-align: center;vertical-align: middle">{{ $v->jia }}</td>
                  <td style="text-align: center;vertical-align: middle">{{ date("Y年m月d日",$v->time) }}</td>
                  <td style="text-align: center;vertical-align: middle">
                    
                    <a href="{{ url('admin/package/all/ziedit') }}/{{ $v->id }}">编辑</a>&nbsp;&nbsp;
                    <a href="#" class="del">删除</a>&nbsp;&nbsp;
                  </td>
                </tr>
    @endforeach($data as $k => $v)
@else
                <tr>
                  <td style="text-align: center;vertical-align: middle" colspan="7">未找到包</td>
                </tr>
@endif

                </tbody>
   
              </table>
            </div>
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

         $.ajax('/admin/package/all/zidel',{
            type : 'post',
            data :{id:id},
            success : function(data){
             
              if(data ==1)
              {
                tr.empty();
                alert('删除成功！')
              }else if(data ==2)
              {
                alert('删除失败！')
              }else if(data ==3)
              {
                alert('删除失败！请先删除套餐后再删除 ');
                

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