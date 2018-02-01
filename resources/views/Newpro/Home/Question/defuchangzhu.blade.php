<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" name="viewport" />
    <link rel="stylesheet" href="{{ asset('/new/home/question/css/public.css') }}"/>
    <link rel="stylesheet" href="{{ asset('/new/home/question/css/population.css') }}"/>
<script src="{{ asset('/new/home/question/js/jquery-1.8.3.js') }}"></script>

    <title>常住人口</title>
</head>
<body>
<img src="{{ asset('/new/home/question/img/bg.jpg') }}" alt="" class="bg"/>
<div class="title">德福样板房调查</div>
<div class="brief">品质生活 从这里开始</div>
<div class="content">
    <div class="you">4.家庭常住人数：<span>*</span></div>
    <div class="click">
    <form action="{{ url('/newpro/defu/questionnaire/fengge') }}" method="GET">
        <input type="hidden" name="id" value="{{ $id }}"/>

        <label class="loop">
            <input type="radio" value="一人" name="click"/> <span>一人</span>
        </label>
        <label class="loop">
            <input type="radio" value="二人" name="click"/> <span>二人</span>
        </label>
        <label class="loop">
            <input type="radio" value="三人" name="click"/> <span>三人</span>
        </label>
        <label class="loop">
            <input type="radio" value="四人" name="click"/> <span>四人</span>
        </label>
        <label class="loop">
            <input type="radio" value="五人及以上" name="click"/> <span>五人及以上</span>
        </label>
        </form>
    </div>
</div>
@if( session('info') )
	<div class="Next">
        <a href="javascript:;" onClick="return false">{{ session('info') }}</a>
    </div>
    @else
	<div class="Next">
        <a href="javascript:;">下一页</a>
    </div>
    @endif
    <script>
	$(".Next > a").click(function(){
		var changzhu = $("input[type='radio']:checked").val();
		if(changzhu == null)
		{
			return false;
		}else
		{
			$('form').submit();
		}
	})
</script>


</body>
</html>