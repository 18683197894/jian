@extends('Admin.index')

@section('css')

@endsection('css')

@section('content')
    <section class="content-header" style="text-align:center">
      <h1>
@if($pid ==1)
时尚包
@elseif($pid ==2)
质享包
@else
臻藏包
@endif
        <!-- <small>Control panel</small> -->

      </h1>
      <ol class="breadcrumb">
        <li><a href="
@if($pid ==1)
/admin/package/ruan/fashion
@elseif($pid ==2)
/admin/package/ruan/joylity
@else
/admin/package/ruan/peghid
@endif
        "><i class="fa fa-dashboard"></i>风格列表</a></li>
        <li class="active">栏目管理</li>
      </ol>
    </section>
        <div class="col-xs-12">
          <div class="box">

            <div class="box-header">
           
              <h3 class="box-title"> <br>{{ $tit }}栏目 - <a href="{{ url('/admin/package/ruan/fg/columnadd') }}/{{ $id }}">添加栏目</a></h3>
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
                  <th style="width:15%;text-align:center;">ID</th>
                  <th style="width:15%;text-align:center;">标题</th>
                  <th style="width:25%;text-align:center;">路径</th>
                  <th style="width:10%;text-align:center;">总价</th>
                  <th style="width:20%;text-align:center;">创建时间</th>
                  <th style="width:20%;text-align:center;">操作</th>
                </tr>
                </thead>
                <tbody>
@if(isset($data) and count($data) > 0 )
	@foreach($data as $k => $v)
                <tr>
                  <td class="id" style="width:15%;text-align: center;vertical-align: middle">{{ $v->id }}</td>
                  <td style="width:15%;text-align: center;vertical-align: middle">{{ $v->title }}</td>
                  <td style="width:25%;text-align: center;vertical-align: middle">{{ $v->path }}</td>
                  <td style="width:10%;text-align: center;vertical-align: middle">{{ $v->jia }}</td>
                  <td style="width:15%;text-align: center;vertical-align: middle">{{ date("Y年m月d日",$v->time) }}</td>
                  <td style="width:20%;text-align: center;vertical-align: middle">
                  	<a href="{{ url('admin/package/ruan/fg/columnedit') }}/{{ $v->id }}">编辑</a>&nbsp;&nbsp;
                  	<a href="#" class="del">删除</a>&nbsp;&nbsp;
                  	<a href="{{ url('admin/package/ruan/fg/column/subclass/') }}/{{ $v->id }}">子类详情</a>
                  </td>
                </tr>
    @endforeach($data as $k => $v)
@else
                <tr>
                  <td style="text-align: center;vertical-align: middle" colspan="5">未找到栏目</td>
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

         $.ajax('/admin/package/ruan/fg/columnajax',{
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
                alert('删除失败 请先删除子类在执行删除！');
                

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