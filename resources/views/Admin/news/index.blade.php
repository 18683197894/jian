@extends('Admin.index')

@section('css')

@endsection('css')

@section('content')
    <section class="content-header">
      <h1>
        新闻列表
        <!-- <small>Control panel</small> -->

      </h1>
      <ol class="breadcrumb">
        <li class="active"><a href="{{ url('jslmadmin/newsadd') }}">添加新闻</a></li>
      </ol>
    </section>

  <section class="content">
  <div class="box">
            <div class="box-header">
       @if (session('info'))
        <div class="text-danger">
        {{ session('info') }}
        </div>
      @else
              <h3 class="box-title">Data Table With Full Features</h3>

      @endif
            </div>
            <!-- /.box-header -->
            <div class="box-body">
      <form action="{{url('/jslmadmin/newsindex')}}" method="get">
        <div class="row">
         <div class="col-md-2">
           <div class="form-group">
            <select class="form-control" name="num">
              <option value="0"
              @if(!empty($request['num']) && $request['num']==0)
              selected="selected"
              @endif
              >所有新闻</option>
              <option value="1"
              @if(!empty($request['num']) && $request['num']==1)
              selected="selected"
              @endif
              >普通新闻</option>
              <option value="2"
              @if(!empty($request['num']) && $request['num']==2)
              selected="selected"
              @endif
              >企业新闻</option>
             
            </select>
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
                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" style="width: 100px;">ID</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"  style="width: 270px; text-align:center;">标题</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"  style="width: 180px; text-align:center;">来源</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"  style="width: 158px; text-align:center;">分类</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"  style="width: 200px; text-align:center;">展示图片</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"  style="width: 165px; text-align:center;">发表时间</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"  style="width: 175px; text-align:center;">点击率</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"  style="width: 180px; text-align:center;">操作</th>
                </tr>
               </thead>

@if( isset($data) and count($data) > 0)                
@foreach($data as $k => $v)     
                <tr role="row" class="odd">
                  <td style="text-align: center;vertical-align: middle">{{ $v->id }}</td>
                  <td style="text-align: center;vertical-align: middle">{{ $v->title }}</td>
                  <td style="text-align: center;vertical-align: middle">{{ $v->yuan }}</td>
                  <td style="text-align: center;vertical-align: middle">
                    @if( $v->lei == 1 )
                      普通新闻
                    @else
                      企业新闻
                    @endif
                  </td>
                  <td style="text-align: center;vertical-align: middle"><a href="{{ url('/uploads/news/titleimg/') }}/{{$v->titleimg }}"><img src="{{ asset('/uploads/news/titleimg/') }}/{{$v->titleimg }}" width="170px" height="70px" alt=""></a></td>
                  <td style="text-align: center;vertical-align: middle">{{ date("Y-m-d H:i:s",$v->time) }}</td>
                  <td style="text-align: center;vertical-align: middle">{{ $v->click }}</td>
                  <td style="text-align: center;vertical-align: middle"><a href="{{ url('jslmadmin/newsedit') }}/{{ $v->id }}">编辑
                  </a>&nbsp;&nbsp;<a class="shan" href="#" onclick="return false;">删除
                  &nbsp;</a>&nbsp;&nbsp;<a class="zhi" href="#" 
                  @if($v->zhi ==1)
                  index="hui" style="opacity: 0.6"
                  @endif
                   onclick="return false;" >置顶</a></td>
                </tr>
@endforeach
@else
<tr role="row" class="odd">
  <td style="text-align: center;vertical-align: middle" colspan="9">未查到新闻</td>
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
       $(".zhi[index!='hui']").on('click',function(){
        var css = $(this).attr('index');
    
        if(css =="hui")
        {
          return false;
        }
        var id = $(this).parents('tr').find('td').eq(0).html();
        var zhi = $(this);
        var yuan = $("a[index='hui']");

         $.ajaxSetup({
          headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
          
          })

         $.ajax('/jslmadmin/newsajaxzhi',{
            type:'post',
            data:{id:id},
            success:function(data){
              if(data ==1 ){
                yuan.css('opacity','1');
                yuan.attr('index','hhh');
               
                zhi.css('opacity','0.6');
                zhi.attr('index','hui');
              alert('置顶成功');
               
              }
              if(data ==2){
                alert('置顶失败！');
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

         $.ajax('/jslmadmin/newsajaxshan',{
            type:'post',
            data:{id:id},
            success:function(data){
              if(data ==1 ){
              alert('删除成功');
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