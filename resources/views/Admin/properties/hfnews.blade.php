@extends('Admin.index')

@section('css')

@endsection('css')

@section('content')
    <section class="content-header" style="text-align:center">
      <h1>
       织金新闻动态管理
        <!-- <small>Control panel</small> -->

      </h1>
      
    </section>

  <section class="content">
  <div class="box">
       @if (session('info'))
            <div class="box-header">
      
            <div style="height:40px;line-height:10px;" class="alert alert-danger">
              {{ session('info') }}
           </div>
            </div>
             @endif
            <!-- /.box-header -->
            <div class="box-body">
      <form action="" method="get">
        <div class="row">
         <div class="col-md-2">
           
            <div class="box-header">
           
              <h3 class="box-title"><a href="{{ url('admin/properties/hfnewsadd') }}">添加新闻</a></h3>
            </div>
            
          </div>
        
     
        </div>
      </form>
              <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
              <div class="row"><div class="col-sm-12"><table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                <thead>
                <tr role="row">
                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" style="width: 5%;">ID</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"  style="width: 15%; text-align:center;">标题</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"  style="width: 7%; text-align:center;">父类</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"  style="width: 7%; text-align:center;">点击</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"  style="width: 12%; text-align:center;">创建时间</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"  style="width: 18%; text-align:center;">网页标题</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"  style="width: 26%; text-align:center;">网页关键字</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"  style="width: 10%; text-align:center;">操作</th>
                </tr>
               </thead>

@if( isset($data) and count($data) > 0)                
@foreach($data as $k => $v)     
                <tr role="row" class="odd">
                  <td style="text-align: center;vertical-align: middle">{{ $v->id }}</td>
                  <td style="text-align: center;vertical-align: middle">{{ $v->title }}</td>
                  <td style="text-align: center;vertical-align: middle">{{ $v->pidname }}</td>
                  <td style="text-align: center;vertical-align: middle">{{ $v->click }}</td>
                  <td style="text-align: center;vertical-align: middle">{{ date('Y-m-d H:i:s',$v->time) }}</td>
                  <td style="text-align: center;vertical-align: middle">{{ $v->titles }}</td>
                  <td style="text-align: center;vertical-align: middle">{{ $v->keyworlds }}</td>
                  <td style="text-align: center;vertical-align: middle"><a href="{{ url('/admin/properties/hfnewsedit') }}/{{ $v->id }}">编辑</a> &nbsp;&nbsp;<a  class="shan" href="#" onclick="return false;">删除</a></td>
                </tr>
@endforeach
@else
<tr role="row" class="odd">
  <td style="text-align: center;vertical-align: middle" colspan="7">未找到动态</td>
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
       $(".shan").on('click',function(){
       
        var id = $(this).parents('tr').find('td').eq(0).html();
        var tr = $(this).parents('tr');
      
         $.ajaxSetup({
          headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
          
          })

         $.ajax('/admin/properties/hfnewsdel',{
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