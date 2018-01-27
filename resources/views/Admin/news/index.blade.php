@extends('Admin.index')

@section('css')

@endsection('css')

@section('content')
    <section class="content-header" style="text-align:center">
      <h1>
        {{ $tit }} - 新闻文章管理
        <!-- <small>Control panel</small> -->

      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/jslmadmin/newsleiindex') }}"><i class="fa fa-dashboard"></i>新闻板块列表</a></li>
        <li class="active">文章管理</li>
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
      <form action="{{url('jslmadmin/newslei/newsindex')}}/{{ $pid }}" method="get">
        <div class="row">
         <div class="col-md-2">
           
            <div class="box-header">
           
              <h3 class="box-title" style="width:300px;"><a href="{{ url('/jslmadmin/newslei/newsadd/') }}/{{ $pid }}">添加文章</a>
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <a href="{{ url('/jslmadmin/newslei/newszhiindex/') }}/{{ $pid }}">置顶文章管理</a></h3>
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
              <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
              <div class="row"><div class="col-sm-12"><table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                <thead>
                <tr role="row">
                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" style="width: 7%;">ID</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"  style="width: 15%; text-align:center;">标题</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"  style="width: 8%; text-align:center;">来源</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"  style="width: 20%; text-align:center;">展示图片</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"  style="width: 18%; text-align:center;">发表时间</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"  style="width: 10%; text-align:center;">点击率</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"  style="width: 15%; text-align:center;">操作</th>
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
                  </a>&nbsp;&nbsp;<a class="shan" href="#" onclick="return false;">删除&nbsp;</a>&nbsp;&nbsp;
                  @if($v->zhi == 0)<a href="javascript:;" index="{{ $v->pid }}" class="zhi">移入列表置顶</a>@else <a href="javascript:;" index="{{ $v->pid }}" >已置顶 @endif
                  </td>
                </tr>
@endforeach
@else
<tr role="row" class="odd">
  <td style="text-align: center;vertical-align: middle" colspan="9">未找到文章</td>
</tr>
@endif
              </table>

              </div></div><div class="row"><div class="col-sm-5"></div><div class="col-sm-7">
              <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
                {{ $data->links() }}
              </div></div></div></div>
            </div>
            <!-- /.box-body -->
          </div>
  </section>
@endsection('content')
@section('js')

       <script>
       $(".zhi").on('click',function(){
        
        
        var id = $(this).parents('tr').find('td').eq(0).html();
        var tr = $(this).parents('tr');
        
        var pid = $(this).attr('index');
         $.ajaxSetup({
          headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
          
          })

         $.ajax('/jslmadmin/newslei/newszhi',{
            type:'post',
            data:{id:id,pid:pid},
            success:function(data){
              if(data ==1 ){
              window.location.href='/jslmadmin/newslei/newszhiindex/zhiadd/'+id;
              
              return false;

              }
              if(data ==2){
                alert('置顶失败！置顶位已满');
                return false;
              }
            },
            error:function(data){
              alert('数据异常！请稍后再试');
            },
            dataType:'json'
         }) 

       })


       $(".shan").on('click',function(){
       
        var id = $(this).parents('tr').find('td').eq(0).html();
        var tr = $(this).parents('tr');

         $.ajaxSetup({
          headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
          
          })

         $.ajax('/jslmadmin/newslei/newsdel',{
            type:'post',
            data:{id:id},
            success:function(data){
              if(data ==1 ){
              alert('删除成功!');
               tr.empty();
              }
              if(data ==2){
                alert('删除失败！');
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