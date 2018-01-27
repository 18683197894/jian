@extends('Admin.index')

@section('css')

@endsection('css')

@section('content')
    <section class="content-header" style="text-align:center">
      <h1>
        {{ $titles->title }} - 置顶文章管理
        <!-- <small>Control panel</small> -->

      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/jslmadmin/newslei/newsindex/') }}/{{ $titles->id }}"><i class="fa fa-dashboard"></i>新闻列表</a></li>
        <li class="active">置顶管理</li>
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
            <div class="col-md-2">
           
            <div class="box-header">
           
              <h3 class="box-title" style=""><a href="{{ url('/jslmadmin/newslei/newszhiindex/ban') }}/{{ $titles->id }}">修改置顶板块介绍</a>
              </h3>
            </div>
            
          </div>
            <!-- /.box-header -->
            <div class="box-body">
     
              <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
              <div class="row"><div class="col-sm-12"><table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                <thead>
                <tr role="row">
                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" style="">ID</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"  style=" text-align:center;">标题</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"  style=" text-align:center;">来源</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"  style="text-align:center;">展示图片</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"  style=" text-align:center;">轮播图片</th>
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
                  <td style="text-align: center;vertical-align: middle"><a href="{{ url('/uploads/news/banimg/') }}/{{$v->banimg }}"><img src="{{ asset('/uploads/news/banimg/') }}/{{$v->banimg }}" width="170px" height="70px" alt=""></a></td>
                  <td style="text-align: center;vertical-align: middle">{{ date("Y-m-d H:i:s",$v->time) }}</td>
                  <td style="text-align: center;vertical-align: middle">{{ $v->click }}</td>
                  <td style="text-align: center;vertical-align: middle"><a href="{{ url('/jslmadmin/newslei/newszhiindex/zhiedit/') }}/{{ $v->id }}">编辑
                  </a>&nbsp;&nbsp;<a class="shan" href="javascript:;" >移出置顶
                  &nbsp;</a>&nbsp;&nbsp;</td>
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
              </div></div></div></div>
            </div>
            <!-- /.box-body -->
          </div>
  </section>
@endsection('content')
@section('js')

       <script>
       


       $(".shan").on('click',function(){
       
        var id = $(this).parents('tr').find('td').eq(0).html();
        var tr = $(this).parents('tr');
        
         $.ajaxSetup({
          headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
          
          })

         $.ajax('/jslmadmin/newslei/newszhiindex/zhidel',{
            type:'post',
            data:{id:id},
            success:function(data){
              if(data ==1 ){
              alert('移出成功!');
               tr.empty();
              }
              if(data ==2){
                alert('移出失败！');
              }
              if(data ==3){
                alert('数据不存在！');
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