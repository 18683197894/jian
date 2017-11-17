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
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>软包套餐</a></li>
        <li class="active">时尚包</li>
      </ol>
    </section>
        <div class="col-xs-12" >
          <div class="box">

            <div class="box-header">
           
              <h3 class="box-title"> <br>风格列表 - <a href="{{ url('/admin/package/ruan/fgadd') }}/{{ $pid }}">添加风格</a></h3>
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
                  <th style="width: 7%;  text-align:center;">ID</th>
                  <th style="width: 12%; text-align:center;">标题</th>
                  <th style="width: 15%; text-align:center;">简介标题</th>
                  <th style="width: 25$; text-align:center;">简介内容</th>
                  <th style="width: 16%; text-align:center;">展示图片</th>
                  <th style="width: 10%; text-align:center;">创建时间</th>
                  <th style="width: 15%; text-align:center;">操作</th>
                </tr>
                </thead>
                <tbody>
@if(isset($data) and count($data) > 0 )
	@foreach($data as $k => $v)
                <tr>
                  <td class="id" style="width: 9%;text-align: center;vertical-align: middle">{{ $v->id }}</td>
                  <td style="width: 12%;text-align: center;vertical-align: middle">{{ $v->title }}</td>
                  <td style="width: 15%;text-align: center;vertical-align: middle">{{ $v->con }}</td>
                  <td style="width: 25$;text-align: center;vertical-align: middle">{{ $v->content }}</td>
                  <td style="width: 17%;text-align: center;vertical-align: middle"><a href="{{ asset('uploads/ruan/img/') }}/{{$v->img}}"><img src="{{ asset('uploads/ruan/img/') }}/{{$v->img}}" width="170px" height="100px" alt=""></a></td>
                  <td style="width: 10%;text-align: center;vertical-align: middle">{{ date("Y年m月d日",$v->time) }}</td>
                  <td style="width: 15%;text-align: center;vertical-align: middle">
                  	<a href="#" class="on" index="
@if($v->status == 1)
2
@else
1
@endif 
                    ">
@if($v->status == 1)
停用
@else
启用
@endif 
                    </a>&nbsp;&nbsp;
                    <a href="{{ url('admin/package/ruan/fenggeedit') }}/{{ $v->id }}">编辑</a>&nbsp;&nbsp;
                  	<a href="#" class="del">删除</a>&nbsp;&nbsp;
                  	<a href="{{ url('admin/package/ruan/fg/column/') }}/{{ $v->id }}">栏目管理</a>
                  </td>
                </tr>
    @endforeach($data as $k => $v)
@else
                <tr>
                  <td style="text-align: center;vertical-align: middle" colspan="7">未找到风格</td>
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

         $.ajax('/admin/package/ruan/fgdel',{
            type : 'post',
            data :{id:id},
            success : function(data){
             console.log(data);
              if(data ==1)
              {
                tr.empty();
                alert('删除成功！');
              }else if(data ==2)
              {
                alert('删除失败！');
              }else if(data ==3)
              {
                alert('删除失败 请先删除子栏目在执行删除！');
                

              }
            },
            error : function(data){
              alert('删除失败 请重试!');
            },
            dateType : 'json'
         })
  })
  $(".on").on('click',function(){
          var index = $(this).attr('index');
          var id = $(this).parents('tr').find('.id').html();
          var on = $(this);
         $.ajaxSetup({
          headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
          
          });
         if(index == 1)
         {

         $.ajax('/admin/package/ruan/fgajax',{
            type : 'post',
            data :{id:id},
            success : function(data){
              if(data ==1)
              {
                on.html('停用');
                on.attr('index',2);
                alert('启用成功！');
              }else if(data ==2)
              {
                alert('启用失败！');
              }else if(data ==3)
              {
                alert('启用失败 请先添加栏目后启用！');
                

              }else if(data == 4)
              {
                alert('启用失败 最大启用数4 请先停用后再启用');
              }
            },
            error : function(data){
              alert('启用失败 请重试!');
            },
            dateType : 'json'
         })
        }else if(index == 2)
        {
         $.ajax('/admin/package/ruan/fgajaxs',{
            type : 'post',
            data :{id:id},
            success : function(data){
              if(data ==1)
              {
                on.html('启用');
                on.attr('index',1);
                alert('停用成功！');
              }else if(data ==2)
              {
                alert('停用失败！');
              }
            },
            error : function(data){
              alert('停用失败 请重试!');
            },
            dateType : 'json'
         })
        }
  })

</script>
@endsection('js')