@extends('Admin.index')

@section('css')

@endsection('css')

@section('content')
    <section class="content-header">
      <h1>首页楼盘看房预约</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>用户预约管理</a></li>
        <li class="active">楼盘看房预约</li>
      </ol>
    </section>
        <div class="col-xs-12" >
          <div class="box">

         
 				@if (session('info'))
				<div style="height:40px;line-height:10px;" class="alert alert-danger">
				{{ session('info') }}
				</div>
				@endif
            <!-- /.box-header -->
            <div class="box-body">
             <form action="{{url('admin/indexationmake')}}" method="get">
        <div class="row">
         <div class="col-md-2">
           
            <div class="box-header">
           
             <br>
            </div>
            
          </div>
        
        <div class="col-md-4 col-md-offset-6">
          <div class="input-group input-group-sm">
            <input type="text" name="key" value="{{ $request['key'] or '' }}" class="form-control">
               <span class="input-group-btn">
                 <button type="submit" class="btn btn-info btn-flat">Go!</button>
               </span>
          </div>
        </div>
        </div>
      </form>
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th style="width:15%;text-align:center;">ID</th>
                  <th style="width:20%;text-align:center;">手机号</th>
                  <th style="width:25%;text-align:center;">时间</th>
                  <th style="width:25%;text-align:center;">备注</th>
                  <th style="width:15%;text-align:center;">操作</th>
                </tr>
                </thead>
                <tbody>
@if(isset($data) and count($data) > 0 )
	@foreach($data as $k => $v)
                <tr>
                  <td class="id" style="text-align: center;vertical-align: middle">{{ $v->id }}</td>
                  <td style="text-align: center;vertical-align: middle">{{ $v->phone }}</td>
                  <td style="text-align: center;vertical-align: middle">{{ date("Y年m月d日",$v->time) }}</td>
                  <td class="content" style="width:120px;height:30px; text-align: center;vertical-align: middle">{{ $v->content }}</td>
                  <td style="text-align: center;vertical-align: middle">
                  	<a href="#" class="del">删除</a>
                  	
                  </td>
                </tr>
    @endforeach($data as $k => $v)
@else
                <tr>
                  <td style="text-align: center;vertical-align: middle" colspan="5">未找到预约数据</td>
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
		$('.content').one('dblclick',aaa);

		function aaa(){
			var id = $(this).prevAll('.id').html();
			var con = $(this).html();
			var td = $(this);
			var inp = $("<textarea name='con' cols='40' rows='5' ></textarea>");
			inp.val(con);
			

			$(this).html(inp);
			inp.focus();
			inp.on('blur',function(){
				var newcon = inp.val();
				if ( newcon == '' || newcon == null || newcon == con)
				{	td.html(con);
					td.one('dblclick',aaa);
					return false;
				}
				$.ajax({
					url : '/admin/indexationmakeajax',
					type : 'post',
					dateType : 'json',
					data : {id:id,content:newcon,_token:$('meta[name="csrf-token"]').attr('content')},
					success : function(data)
					{	
						if( data ==1 )
						{	
							td.html(newcon);
							alert('备注成功');
						}else if( data == 2 )
						{
							td.html(con);
							alert('备注失败');
						}
						
					},
					error : function(data)
					{
						td.html(con);
						alert('备注失败');
					}
				})
				td.one('dblclick',aaa);

			})
		}

		$('.del').on('click',function(){
			var id = $(this).parents('tr').find('.id').html();
			var tr = $(this).parents('tr');
			$.ajax({
				url : '/admin/indexactionmakedel',
				type : 'post',
				data : {id:id,_token:$('meta[name="csrf-token"]').attr('content')},
				dataType : 'json',
				success : function(data)
				{
					if( data == 1 )
					{	
						tr.empty();
						alert('删除成功');
					}else if( data == 2 )
					{
						alert('删除失败');
					}
				},
				error : function(data)
				{
					alert('删除失败');
				}
			})
		})
	</script>
@endsection('js')