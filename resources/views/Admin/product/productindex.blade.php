@extends('Admin.index')

@section('css')

@endsection('css')

@section('content')
<section class="content-header" style="text-align:center">
      <h1>
        分类管理
        <!-- <small>Control panel</small> -->

      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>分类管理</a></li>
        <li class="active">分类</li>
      </ol>
    </section>
  
  <section class="content">

  <div class="box">
  <div class="box-header">
           
              <h3 class="box-title"> <br> <a href="{{ url('/newpro/index/package/productadd') }}">添加分类</a></h3>
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
                <th style="text-align:center" class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" >标题</th>
                <th style="text-align:center" class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" >图标</th>
                <th style="text-align:center" class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" >反转图标</th>
                <th style="text-align:center" class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" >最后操作时间</th>
                <th style="text-align:center" class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" >操作</th>
               </thead>

@if( isset($data) and count($data) > 0)                
@foreach($data as $k => $v)     
                <tr role="row" class="odd" index="{{$v->id}}">

                  <td style="text-align: center;vertical-align: middle">{{ $v->id }}</td>
                  <td style="text-align: center;vertical-align: middle">{{ $v->title }}</td>
                  <td style="text-align: center;vertical-align: middle">@if($v->titleimg)<a target="_blank" href="{{ url('/uploads/product/img') }}/{{ $v->imgs[0] }}"> <img  src="{{ asset('/uploads/product/img') }}/{{ $v->imgs[0] }}" alt=""> </a>@endif</td>
                  <td style="text-align: center;vertical-align: middle">@if($v->titleimg)<a target="_blank" href="{{ url('/uploads/product/img') }}/{{ $v->imgs[1] }}"> <img  src="{{ asset('/uploads/product/img') }}/{{ $v->imgs[1] }}" alt=""> </a>@endif</td>
                  <td style="text-align: center;vertical-align: middle">{{ date('Y-m-d H:i:s',$v->uptime) }}</td>
                  <td style="text-align: center;vertical-align: middle"> <a href="{{ url('/newpro/index/package/productedit') }}/{{$v->id}}">修改</a>&nbsp;&nbsp;&nbsp;<a class="del" href="javascript:;">删除</a>&nbsp;&nbsp;&nbsp;<a href="{{ url('/newpro/index/package/product/goodsindex/') }}/{{ $v->id }}">产品管理</a> </td>
                
                </tr>
@endforeach
@else
<tr role="row" class="odd">
  <td style="text-align: center;vertical-align: middle" colspan="6">未找到分类</td>
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
		id = tr.attr('index');
		$.ajax('/newpro/index/package/productdel',{
			type:'post',
			data:{id:id,_token:$("meta[name='csrf-token']").attr('content')},
			success:function(data)
			{
				if(data == 1)
        {
          alert('删除成功！');
          tr.css('display','none');
        }else if(data == 2)
        {
          alert('删除失败！');
        }else if(data == 3)
        {
          alert('请先删除分类下所有产品后再删除此分类！');
        }else
        {
          alert('删除失败！');
        }
			},
			error:function(data)
			{
				alert('删除失败！');
			}
		})
	})
</script>
@endsection('js')