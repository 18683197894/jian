@extends('Admin.index')

@section('css')

@endsection('css')

@section('content')
    <section class="content-header" style="text-align:center">
      <h1>风格列表</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>产品管理</a></li>
        <li class="active">风格列表</li>
      </ol>
    </section>
        <div class="col-xs-12" >
          <div class="box">
          
            <div class="box-header" style="padding:0; padding-top:20px;">
              <h3 class="box-title col-xs-1"> <br><a href="{{ url('/admin/product/style/styleadd') }}">添加风格</a>  </h3>
              <h3 class="box-title col-xs-2"> <br> <a href="{{ url('/admin/product/style/qingedit') }}">修改清水房报价</a> </h3>
            <div class="form-group col-xs-2">
                  <form action="{{ url('/admin/product/style/index') }}" method="GET">
                  <label>筛选</label>
                  <select name="bao" class="form-control">
                  <option value="00">全部包</option>
                  @foreach($packages as $k => $v)
                    <option @if($bao == $v->id ) selected="selected" @endif value="{{ $v->id }}">{{ $v->title }}</option>
                  @endforeach
                  </select>
                  </form>
          </div>
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
                  <th style=" text-align:center;">ID</th>
                  <th style=" text-align:center;">标题</th>
                  <th style=" text-align:center;">所属包</th>
                  <th style=" text-align:center;">简介标题</th>
                  <th style="width:30%; text-align:center;">简介内容</th>
                  <th style=" text-align:center;">展示图片</th>
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
                  <td style="text-align: center;vertical-align: middle">{{ $v->ptitle }}</td>
                  <td style="text-align: center;vertical-align: middle">{{ $v->con }}</td>
                  <td style="text-align: center;vertical-align: middle">{{ $v->content }}</td>
                  <td style="text-align: center;vertical-align: middle"><a href="{{ asset('uploads/ruan/img/') }}/{{$v->img}}"><img src="{{ asset('uploads/ruan/img/') }}/{{$v->img}}" width="170px" height="100px" alt=""></a></td>
                  <td style="text-align: center;vertical-align: middle">{{ date("Y年m月d日",$v->time) }}</td>
                  <td style="text-align: center;vertical-align: middle">
                    <a href="{{ url('admin/product/style/styleedit') }}/{{ $v->id }}">编辑</a>&nbsp;&nbsp;
                  	<a href="#" class="del">删除</a>&nbsp;&nbsp;
                  	<a href="{{ url('admin/product/style/doorindex') }}/{{ $v->id }}">户型管理</a>
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

         $.ajax('/admin/product/style/styledel',{
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
  
  
  $("select[name='bao'] > option").on('click',function(){
    $('form').submit();
  });

</script>
@endsection('js')