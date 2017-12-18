//开始总价赋值
$(document).ready(function(){
	tail();
})

//计算选中的总价
function tail()
{
	var aa =0;
	var num =0;
	$("input[name='checkbox']:checked:checked").each(function(i,n){
		num ++;
		aa += parseInt($(this).siblings('.shopping1_con_litotai').html());
	})
	
	$('.numnum').html(num);
	$('.shopping_tailli2 > em').html(aa);
}
//计算单个物品的总价
function dantail(li,num){
	var dan = parseInt(li.parent('.shopping1_con_linum').prev('.shopping1_con_lispan').html());
	li.parent('.shopping1_con_linum').siblings('.shopping1_con_litotai').html(dan*num+'元');
}

//物品数量加减写入数据库
function numajax(id,st,num)
{	
	
	$.ajax('/home/shoppingcart/numajax',{
		type : 'get',
		'async' : 'false',
		data : {id:id,st:st,num:num}
		// error : function(data)
		// {
		// 	alert('操作过快！请重试');
		// 	return false;
		// }
	})

}

//全选
$('#checkbox_aa').on('click',function(){

	$("input[name='checkbox']").attr('checked',true);
	tail();
})

//单个物品选中或取消 
$("input[name='checkbox']").on('click',function(){
	$('#checkbox_aa').removeAttr('checked');
	tail();
})

$('.num1').on('click',function(){
	var id = $(this).parent('.shopping1_con_linum').attr('index');
	var num = $(this).siblings('span').html();

	if(num <=1)
	{
		return false ;
	}

	 numajax(id,'-',num);
	 var num2 = num -1;
	
	$(this).siblings('span').html(num2);
	dantail($(this),num2);
	tail();
})

$('.num2').on('click',function(){
	var id = $(this).parent('.shopping1_con_linum').attr('index');
	var num = $(this).prev('span').html();
	if(num >= 10)
	{
		return false ;
	}
	numajax(id,'+',num);
	var num2 = Number(num) +1;

	$(this).prev('span').html(num2);
	dantail($(this),num2);
	tail();
})