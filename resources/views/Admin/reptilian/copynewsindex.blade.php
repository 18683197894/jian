@extends('Admin.index')

@section('css')
<style>
	.pace{-webkit-pointer-events:none;pointer-events:none;-webkit-user-select:none;-moz-user-select:none;user-select:none}
	/*.pace .pace-progress{background:#fff;position:fixed;z-index:2000;top:0;right:100%;width:100%;height:2px}*/
	.pace-inactive{display:none;}
	.pace .pace-progress-inner{position:absolute;right:0;width:100px;height:100%;box-shadow:0 0 10px #fff,0 0 5px #fff;opacity:1;-webkit-transform:rotate(3deg) translate(0px,-4px);-moz-transform:rotate(3deg) translate(0px,-4px);-ms-transform:rotate(3deg) translate(0px,-4px);-o-transform:rotate(3deg) translate(0px,-4px);transform:rotate(3deg) translate(0px,-4px)}
	.pace .pace-activity{position:fixed;z-index:2000;top:15px;right:42.5%;width:14px;height:14px;border:solid 2px transparent;border-top-color:#fff;border-left-color:#fff;border-radius:10px;-webkit-animation:pace-spinner 400ms linear infinite;-moz-animation:pace-spinner 400ms linear infinite;-ms-animation:pace-spinner 400ms linear infinite;-o-animation:pace-spinner 400ms linear infinite;animation:pace-spinner 400ms linear infinite}@media (max-width: 767px){.pace .pace-activity{top:15px;right:15px;width:14px;height:14px}}@-webkit-keyframes pace-spinner{0%{-webkit-transform:rotate(0deg);transform:rotate(0deg)}100%{-webkit-transform:rotate(360deg);transform:rotate(360deg)}}@-moz-keyframes pace-spinner{0%{-moz-transform:rotate(0deg);transform:rotate(0deg)}100%{-moz-transform:rotate(360deg);transform:rotate(360deg)}}@-o-keyframes pace-spinner{0%{-o-transform:rotate(0deg);transform:rotate(0deg)}100%{-o-transform:rotate(360deg);transform:rotate(360deg)}}@-ms-keyframes pace-spinner{0%{-ms-transform:rotate(0deg);transform:rotate(0deg)}100%{-ms-transform:rotate(360deg);transform:rotate(360deg)}}@keyframes pace-spinner{0%{transform:rotate(0deg);transform:rotate(0deg)}100%{transform:rotate(360deg);transform:rotate(360deg)}}
	.pace-none{display:none;}
	.pace-block{display:block;}
</style>
@endsection('css')

@section('content')
<div class="pace  pace-inactive">
<div class="pace-progress" data-progress-text="100%" data-progress="99" style="transform: translate3d(100%, 0px, 0px);">
  <div class="pace-progress-inner"></div>
</div>
<div class="pace-activity"></div>
</div>

<section class="content-header">
      <h1>
       	新闻文章爬取
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/jslmadmin/newsleiindex') }}"><i class="fa fa-dashboard"></i>新闻板块</a></li>
        <li class="active">爬取新闻</li>
      </ol>
    </section>
    <section class="content">

      <div class="box box-warning" >
            <div class="box-header with-border">
              <h3 class="box-title">getNews</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form">
                <style>
                .lei{display:none;}
				.avtion{display:block;}
                </style>
                <div  class="form-group">
                  <label>目标地址</label>
                  <select name="url" class="form-control" onchange="return selected()">
                    <option  index="0" value="http://www.jia360.com/index/getNews" selected="selected">腾讯家居</option>
                    <option  index="1" value="http://news.jiaju.sina.com.cn/">新浪家居</option>
                  </select>
                </div>

				<div class="lei avtion">
                <div class="form-group">
                  <label>分类</label>
                  <select name='cid' class="form-control">
                    <option   value="16">要闻</option>
                    <option   value="8">大咖说</option>
                    <option   value="7">图文直播</option>
                    <option   value="2">企业</option>
                    <option   value="18">人物</option>
                    <option   value="17">深度</option>
                  </select>
                </div>
				
				<div class="form-group">
                  <label for="exampleInputEmail1">开始页 &nbsp;默认0为最新</label>
                  <input type="text" name="start" class="form-control" value="0" id="exampleInputEmail1" >
                </div>

                <div class="form-group">
                  <label>页数</label>
                  <select name="page" class="form-control">
                    <option   value="1">1</option>
                    <option   value="2">2</option>
                    <option   value="3">3</option>
                    <option   value="4">4</option>
                    <option   value="5">5</option>
                    <option   value="6">6</option>
                    <option   value="7">7</option>
                    <option   value="8">8</option>
                    <option   value="9">9</option>
                    <option   value="10">10</option>
                  </select>
                </div>

				</div>
				<div class="lei">

					<div class="form-group">
	                  <label>分类</label>
	                  <select name='cid' class="form-control">
	                    <option   value="p-">首页</option>
	                    <option   value="list-jiaju-a40o1p">看点</option>
	                    <option   value="list-jiaju-a41o1p">观点</option>
	                    <option   value="list-jiaju-a42o1p">企业</option>
	                    <option   value="list-jiaju-a43o1p">真言2018</option>
                  	  </select>
                	</div>
					
					 <div class="form-group">
                  		<label for="exampleInputEmail1">开始页 &nbsp;默认0为最新</label>
                  		<input type="text" name="start" class="form-control" value="0" id="exampleInputEmail1" >
                	</div>
                	
                	<div class="form-group">
	                  <label>页数</label>
	                  <select name="page" class="form-control">
	                    <option   value="1">1</option>
	                    <option   value="2">2</option>
	                    <option   value="3">3</option>
	                  </select>
	                </div>

				</div>

				<div class="form-group">
                  <label>版本</label>
                  <select name="pid" class="form-control">
                  	@foreach($pid as $k => $v)
                    <option   value="{{ $v->id }}">{{ $v->title }}</option>
                    @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">TITLE关键字过滤  &nbsp;“-”分割</label>
                  <input type="text" name="key" class="form-control" placeholder="默认为空" id="exampleInputEmail1" >
                </div>

              </form>
              <div class="box-footer text-center" style="margin-top:50px">
    				<button type="button" class="btn btn-default btn-lrg ajax" title="Ajax Request">
        				<i class="fa fa-spin "></i>&nbsp; 爬取新闻 <!-- fa-refresh -->
    				</button>
              </div>
                
            </div>
            <!-- /.box-body -->

          </div>
      

    </section>

@endsection('content')

@section('js')
<script>
	$(function(){
		selected()
	})
	
	
	function selected()
	{
		var index = $('select[name="url"] option:selected').attr('index');
		$('.lei').removeClass('avtion');
		$('.lei').eq(index).addClass('avtion');
	}

	$('.ajax').one('click',function(){
			getnews()
	})

	function getnews()
	{	
	

		var url = $('select[name="url"] option:selected').val();
		var data = getform(url)
		
		if(data == 'false')
		{	
			$('.ajax').one('click',getnews);
			return false;
		}
		
		$('.form-group > input').attr('disabled','disabled');
		$('.form-group > select').attr('disabled','disabled');
		// $('.ajax i').addClass('fa-refresh')
		$('.ajax').html('<i class="fa fa-spin fa-refresh "></i>&nbsp; 正在爬取');
		$('.pace-inactive').css('display','block');

		$.ajax(data.urls,{
			type : 'POST',
			data : data,
			ansyc : false,
			success : function(data)
			{
				if(data.status == 'no')
				{
					restore(data.error);
				}else if(data.status == 'ok')
				{
					alert(data.info);
					window.location.href = data.redirect;
				}else
				{
					restore('爬取失败!');
				}
				
				

			},
			error : function(err)
			{	
				restore('爬取失败!')
			}
		})

		
		
	}

	function restore(info)
	{
		setTimeout(function () { 
			
			if(info != false)
			{
				alert(info);
			}
			$('.ajax').html('<i class="fa fa-spin "></i>&nbsp; 爬取新闻');
			$('.pace-inactive').css('display','none');
			$('.form-group > input').removeAttr('disabled');
			$('.form-group > select').removeAttr('disabled');
			$('.ajax').one('click',getnews);
			}, 1000);
	}

	function getform(url)
	{	
		var data = {};
		if(url == 'http://www.jia360.com/index/getNews')
		{	
			var urls = '/reptilian/copynews_tx';
		}else if(url == "http://news.jiaju.sina.com.cn/")
		{
			var urls = '/reptilian/copynews_xl';
		}else
		{
			return 'false';
		}
		data = 
		{	
			url:url,
			cid:$('.avtion > div > select[name="cid"] option:selected').val(),
			start:$('.avtion > div > input[name="start"]').val(),
			pid:$('select[name="pid"] option:selected').val(),
			page:$('.avtion > div > select[name="page"] option:selected').val(),
			key:$('input[name="key"]').val(),
			_token:$("meta[name='csrf-token']").attr('content'),
			urls:urls
		}

		if(!/^[0-9]+$/.test(data.start)){
    		alert("开始页请输入请输入数字!");
    		return 'false';
		}
		return data;
		
	}
</script>
@endsection('js')