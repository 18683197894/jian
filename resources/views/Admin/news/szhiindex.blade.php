@extends('Admin.index')

@section('css')

@endsection('css')

@section('content')
    <section class="content-header" style="text-align:center">
      <h1>
        置顶文章管理
        <!-- <small>Control panel</small> -->

      </h1>
      <ol class="breadcrumb">
        <li><a href="@if($path) {{ url($path) }} @else url('/jslmadmin/newsleiindex') @endif"><i class="fa fa-dashboard"></i>返回</a></li>
        <li class="active">置顶文章管理</li>
      </ol>
    </section>

  <section class="content">
  <div class="box">
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
                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" >ID</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"  style=" text-align:center;">标题</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"  style=" text-align:center;">来源</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"  style=" text-align:center;">展示图片</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"  style=" text-align:center;">发表时间</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"  style=" text-align:center;">点击率</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"  style=" text-align:center;">操作</th>
                </tr>
               </thead>

@if( isset($data) and count($data) > 0)                
@foreach($data as $k => $v)     
                <tr role="row" class="odd">
                  <td style="text-align: center;vertical-align: middle">{{ $v->id }}</td>
                  <td style="text-align: center;vertical-align: middle">{{ $v->title }}</td>
                  <td style="text-align: center;vertical-align: middle">{{ $v->yuan }}</td>
                  <td style="text-align: center;vertical-align: middle"><a href="{{ url('/uploads/news/titleimg/') }}/{{$v->titleimg }}"><img src="{{ asset('/uploads/news/titleimg/') }}/{{$v->titleimg }}" width="170px" height="70px" alt=""></a></td>
                  <td style="text-align: center;vertical-align: middle">{{ date("Y-m-d H:i:s",$v->time) }}</td>
                  <td style="text-align: center;vertical-align: middle">{{ $v->click }}</td>
                  <td style="text-align: center;vertical-align: middle"><a href="{{ url('/jslmadmin/newslei/newsedit') }}/{{ $v->id }}">编辑
                  <a href="javascript:;" index="{{ $v->id }}" class="szhi">移出首页置顶</a>
                  </td>
                </tr>
@endforeach
@else
<tr role="row" class="odd">
  <td style="text-align: center;vertical-align: middle" colspan="9">未找到文章</td>
</tr>
@endif
              </table>

             
            </div>
            <!-- /.box-body -->
          </div>
  </section>
@endsection('content')
@section('js')

       <script>
      

       $(".szhi").on('click',function(){
        var id = $(this).attr('index');
        var tr = $(this).parents('tr');
        var ors = 1;
        th = $(this);
         $.ajax('/jslmadmin/newslei/newsszhiindex/szhiadd',{
            type:'post',
            data:{id:id,ors:ors,_token:$('meta[name="csrf-token"]').attr('content')},
            success:function(data){
              if(data == 1)
              {
                alert('取消置顶成功');
                tr.remove();
                return false;

              }else if(data ==2)
              {
                alert('取消置顶失败！刷新页面后重试');
                return false;
              }         
            },
            error:function(data){
              alert('数据异常！请稍后再试');
            },
            dataType:'json'
         }) 

       })
       

       </script>
          
    
        
         
@endsection('js')