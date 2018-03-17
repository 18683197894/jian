@extends('Admin.index')

@section('css')

@endsection('css')

@section('content')
    <section class="content-header">
      <h1>智能家居调查问卷</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>调查问卷</a></li>
        <li class="active">智能家居调查问卷</li>
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
                  <th style="text-align:center;">年龄</th>
                  <th style="text-align:center;">了解智能家居?</th>
                  <th style="text-align:center;">理想中的智能家居！</th>
                  <th style="text-align:center;">是否有兴趣安装智能家居</th>
                  <th style="text-align:center;">购买智能家居的原因？</th>
                  <th style="text-align:center;">不购买智能家居的原因？</th>
                  <th style="text-align:center;">选购智能家居注重哪些因素？</th>
                  <th style="text-align:center;">最感兴趣的智能家居功能！</th>
                  <th style="text-align:center;">从哪里了解智能家居？</th>
                  <th style="text-align:center;">家庭月收入！</th>
                  <th style="text-align:center;">理想中智能家居的理想价位？</th>
                  <th style="text-align:center;">现今的家用电器方便吗？</th>
                  <th style="text-align:center;">填写时间</th>
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
                  <td  style="text-align: center;vertical-align: middle">{{ $v->age }}</td>
                  <td  style="text-align: center;vertical-align: middle">{{ $v->contact }}</td>
                  <td  style="text-align: center;vertical-align: middle">@foreach($v->describe as $kk => $vv) <p>{{ $vv }}</p>  @endforeach</td>
                  <td  style="text-align: center;vertical-align: middle">{{ $v->interest }}</td>
                  <td  style="text-align: center;vertical-align: middle">@foreach($v->purchase as $kk => $vv) <p>{{ $vv }}</p>  @endforeach</td>
                  <td  style="text-align: center;vertical-align: middle">@foreach($v->nopurchase as $kk => $vv) <p>{{ $vv }}</p>  @endforeach</td>
                  <td  style="text-align: center;vertical-align: middle">@foreach($v->careabout as $kk => $vv) <p>{{ $vv }}</p>  @endforeach</td>
                  <td  style="text-align: center;vertical-align: middle">@foreach($v->functions as $kk => $vv) <p>{{ $vv }}</p>  @endforeach</td>
                  <td  style="text-align: center;vertical-align: middle">{{ $v->channel }}</td>
                  <td  style="text-align: center;vertical-align: middle">{{ $v->income }}</td>
                  <td  style="text-align: center;vertical-align: middle">{{ $v->reasonableprice }}</td>
                  <td  style="text-align: center;vertical-align: middle">{{ $v->operation }}</td>
                  <td  style="text-align: center;vertical-align: middle">{{ date('Y-m-d H:i:s',$v->time) }}</td>
                  <td  style="text-align: center;vertical-align: middle"><a class="del" href="javascript:;">删除</a></td>
                  
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