@extends('Admin.index')

@section('css')

@endsection('css')

@section('content')
    <section class="content-header">
      <h1>德福调查问卷</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>调查问卷</a></li>
        <li class="active">德福调查问卷</li>
      </ol>
    </section>
        <div class="col-xs-12" >
          <div class="box">
          <br>
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
                  <th style="text-align:center;">ID</th>
                  <th style="text-align:center;">姓名</th>
                  <th style="text-align:center;">性别</th>
                  <th style="text-align:center;">手机</th>
                  <th style="text-align:center;">职业</th>
                  <th style="text-align:center;">常住人口</th>
                  <th style="text-align:center;">装修服务</th>
                  <th style="text-align:center;">在意的方面</th>
                  <th style="text-align:center;">装修风格</th>
                  <th style="text-align:center;">资金</th>
                  <th style="text-align:center;">添加智能设备</th>
                  <th style="text-align:center;">户型</th>
                  <th style="text-align:center;">体验厅感受</th>
                  <th style="text-align:center;">时间</th>
                  <th style="text-align:center;">操作</th>
                </tr>
                </thead>
                <tbody>
@if(isset($data) and count($data) > 0 )
	@foreach($data as $k => $v)
                <tr>
                  <td class="id" style="text-align: center;vertical-align: middle">{{ $v->id }}</td>
                  <td  style="text-align: center;vertical-align: middle">{{ $v->name }}</td>
                  <td  style="text-align: center;vertical-align: middle">{{ $v->sex }}</td>
                  <td  style="text-align: center;vertical-align: middle">{{ $v->phone }}</td>
                  <td  style="text-align: center;vertical-align: middle">{{ $v->qccupation }}</td>
                  <td  style="text-align: center;vertical-align: middle">{{ $v->resident }}</td>
                  <td  style="text-align: center;vertical-align: middle">{{ $v->service }}</td>
                  <td  style="text-align: center;vertical-align: middle"> @foreach($v->care as $kk => $vv) <p>{{ $vv }}</p> @endforeach </td>
                  <td  style="text-align: center;vertical-align: middle">{{ $v->style }}</td>
                  <td  style="text-align: center;vertical-align: middle">{{ $v->money }}</td>
                  <td  style="text-align: center;vertical-align: middle">{{ $v->intelligence }}</td>
                  <td  style="text-align: center;vertical-align: middle">{{ $v->door }}</td>
                  <td  style="text-align: center;vertical-align: middle">
                  	<p>房屋设计效果 : {{ $v->feel[0] }}</p>
                  	<p>VR体验感受 : {{ $v->feel[1] }}</p>
                  	<p>套餐内容 : {{ $v->feel[2] }}</p>
                  	<p>套餐价格 : {{ $v->feel[3] }}</p>
                  	<p>智能产品 : {{ $v->feel[4] }}</p>
                  </td>
                  <td  style="text-align: center;vertical-align: middle">{{ date('Y年m月d日',$v->time) }}</td>
                  <td  style="text-align: center;vertical-align: middle">@if(session('Admin')->status == 1)<a class="del" href="javascript:;">删除</a>@endif</td>
                </tr>
    @endforeach($data as $k => $v)
@else
                <tr>
                  <td style="text-align: center;vertical-align: middle" colspan="15">没有数据</td>
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

         $.ajax('/admin/question/index/del',{
            type : 'post',
            data :{id:id},
            success : function(data){
             
              if(data ==1)
              {
                tr.empty();
                alert('删除成功！');
              }else
              {
                alert('删除失败！');
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