<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style>
		.div{
			width:100%;
			height:200px;
			margin:0 auto;
		}
	</style>
</head>
<body>
	<div id="orderInfo">
    <div class="ico_title">支付测试</div>
    <form action="{{ url('/webpro/cspays') }}" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    <div class="form_wrap account">
	
        <div class="form_list">
            <span class="list_title">商品描述：</span>
            <span class="list_val">
                <input name="body" value="测试购买商品" maxlength="64" size="32" placeholder="长度127">
            </span>
            <i>*</i><em>长度64</em>
        </div>
        
        <div class="form_list">
            <span class="list_title">总金额：</span>
            <span class="list_val">
                <input name="total_fee" value="1" placeholder="单位：分">
            </span>
            <i>*</i><em>单位：分 整型</em>
        </div>
        <div class="form_list">
            <span class="list_title">终端IP：</span>
            <span class="list_val">
                <input name="mch_create_ip" vtype="ip" value="127.0.0.1" maxlength="16" placeholder="长度16">
            </span>
            <i>*</i><em>长度16</em>
        </div>
       
        <div class="form_list">
        <button>确定</button>
        </div>
    </div>
    </form>
</div>
</body>
</html>