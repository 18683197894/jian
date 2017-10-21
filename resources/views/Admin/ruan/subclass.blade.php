@extends('admin.index')

@section('css')

@endsection('css')

@section('content')
    <section class="content-header" style="text-align:center">
      <h1>
@if($fid ==1)
时尚包
@elseif($fid ==2)
质享包
@else
臻藏包
@endif
        <!-- <small>Control panel</small> -->

      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('admin/package/ruan/fg/column/') }}/{{ $dd->pid }}"><i class="fa fa-dashboard"></i>栏目列表</a></li>
        <li class="active">子类管理</li>
      </ol>
    </section>
        <div class="col-xs-12">
          <div class="box" >

            <div class="box-header">
           
              <h3 class="box-title"> <br>{{ $dd->title }}子类管理 - <a href="{{ url('/admin/package/ruan/fg/column/subclassadd') }}/{{ $dd->id }}">添加子类</a></h3>
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
                  <th style="width: 7%; text-align:center;">ID</th>
                  <th style="width:12%; text-align:center;">标题</th>
                  <th style="width:13%; text-align:center;">规格</th>
                  <th style="width:13%; text-align:center;">品牌</th>
                  <th style="width:8%; text-align:center;">数量</th>
                  <th style="width:8%; text-align:center;">价格</th>
                  <th style="width:18%; text-align:center;">路径</th>
                  <th style="width:13%; text-align:center;">创建时间</th>
                  <th style="width:15%; text-align:center;">操作</th>
                </tr>
                </thead>
                <tbody>
@if(isset($data) and count($data) > 0 )
	@foreach($data as $k => $v)
                <tr>
                  <td class ="id" style="width: 7%;text-align: center;vertical-align: middle">{{ $v->id }}</td>
                  <td style="width:12%;text-align: center;vertical-align: middle">{{ $v->title }}</td>
                  <td style="width:13%; text-align: center;vertical-align: middle">{{ $v->specations }}</td>
                  <td style="width:13%;text-align: center;vertical-align: middle">{{ $v->brand }}</td>
                  <td style="width:8%;text-align: center;vertical-align: middle">{{ $v->num }}</td>
                  <td style="width:8%;text-align: center;vertical-align: middle">{{ $v->jia }}</td>
                  <td style="width:18%; text-align: center;vertical-align: middle">{{ $v->path }}</td>
                  <td style="width:13%;text-align: center;vertical-align: middle">{{ date("Y年m月d日",$v->time) }}</td>
                  <td style="width:15%;text-align: center;vertical-align: middle">
                  	<a href="{{ url('admin/package/ruan/fg/column/subclassedit') }}/{{ $v->id }}">编辑</a>&nbsp;&nbsp;
                  	<a href="#" class="del">删除</a>&nbsp;&nbsp;
                  </td>
                </tr>
    @endforeach($data as $k => $v)
@else
                <tr>
                  <td style="text-align: center;vertical-align: middle" colspan="8">未找到{{ $dd->title }}下的子类</td>
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

         $.ajax('/admin/package/ruan/fg/column/subclassajax',{
            type : 'post',
            data :{id:id},
            success : function(data){
              if(data ==1)
              {
                tr.empty();
                alert('删除成功！')
              }elseif(data ==2)
              {
                alert('删除失败！')
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