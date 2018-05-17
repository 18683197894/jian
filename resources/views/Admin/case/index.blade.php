@extends('Admin.index')

@section('css')

@endsection('css')

@section('content')
    <section class="content-header">
      <h1>案例管理</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>案例管理</a></li>
        <li class="active">案例列表</li>
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
             <form action="{{url('admin/case/index')}}" method="get">
        <div class="row">
         <div class="col-md-2">
           
            <div class="box-header">
           
              <h3 class="box-title"><a href="{{ url('/admin/case/add') }}">添加案例</a></h3>
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
                  <th style=" text-align:center;">ID</th>
                  <th style="width:18%; text-align:center;">标题</th>
                  <th style=" text-align:center;">当前进度</th>
                  <th style=" text-align:center;">户型</th>
                  <th style=" text-align:center;">风格</th>
                  <th style=" text-align:center;">预算</th>
                  <th style=" text-align:center;">创建时间</th>
                  <th style=" text-align:center;">操作</th>
                </tr>
                </thead>
                <tbody>
@if(isset($data) and count($data) > 0 )
	@foreach($data as $k => $v)
                <tr>
                  <td class="id" style="text-align: center;vertical-align: middle">{{ $v->id }}</td>
                  <td style="text-align: center;vertical-align: middle">{{ $v->title }}</td>
                  <td style="text-align: center;vertical-align: middle">
                    @if( $v->or ==0 )
                        待更新
                    @elseif($v->or ==1)
                        准备开工
                    @elseif($v->or ==2)
                        水电阶段
                    @elseif($v->or ==3)
                        瓦木阶段
                    @elseif($v->or ==4)
                        油漆阶段
                    @elseif($v->or ==5)
                        已竣工
                    @endif
                  </td>
                  <td style="text-align: center;vertical-align: middle">{{ $v->huxing }}</td>
                  <td style="text-align: center;vertical-align: middle">{{ $v->fengge }}</td>
                  <td style="text-align: center;vertical-align: middle">{{ $v->yusuan }}</td>
                  <td style="text-align: center;vertical-align: middle">{{ date("Y年m月d日",$v->time) }}</td>
                  <td style="text-align: center;vertical-align: middle">
                    @if($v->or != 5)
                    <a href="{{ url('admin/case/edit') }}/{{ $v->id }}">更新进度</a>&nbsp;&nbsp;
                    <a href="{{ url('admin/case/tedit') }}/{{ $v->id }}?page={{ $page }}">跳过更新</a>
                    @endif
                    
                    @if( $v->or >=1 & $v->or < 5 )
                    <a href="{{ url('/newpro/case/zaiplay/') }}/{{ $v->id }}" target="_blank">预览</a>
                      
                    @elseif( $v->or == 5 )
                    <a href="{{ url('/newpro/case/play/') }}/{{ $v->id }}" target="_blank">预览</a>
                    
                    @endif
                    &nbsp;&nbsp;
                    <a href="{{ url('admin/case/index/case_edit/') }}/{{ $v->id }}?page={{ $page }}">编辑</a>&nbsp;&nbsp;
                    <a href="#" class="del">删除</a>&nbsp;&nbsp;

                  </td>
                </tr>
    @endforeach($data as $k => $v)
@else
                <tr>
                  <td style="text-align: center;vertical-align: middle" colspan="8">未找到案例</td>
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

         $.ajax('/admin/case/del',{
            type : 'post',
            data :{id:id},
            success : function(data){
             
              if(data ==1)
              {
                tr.empty();
                alert('删除成功！');
              }else if(data ==2)
              {
                alert('删除失败！');
              }else if(data ==3)
              {
                alert('删除失败 请先删除子文章在执行删除！');
                

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