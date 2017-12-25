	//地址选中
	$('.payment_hader > ul > li > div').on('click',function(){
		var aaa = $('.m-modal').css('display');
		var div= $(this);
		if(aaa == 'block')
		{
			return false;
		}
		var id = $(this).parent('li').attr('index');
		var cla = $(this).attr('class');
		if(cla == 'payment_hader_defult')
		{
			return false;
		}
		$.ajax('/home/shoppingcart/payment/addressstatus',{
			type : 'get',
			data : {id:id},
			success : function(data)
			{
				if( data == 1 )
				{
					$('.payment_hader_defult').removeClass('payment_hader_defult');
					div.attr('class','payment_hader_defult');
					$("button[name='del']").css('display','block');
					div.find("button[name='del']").css('display','none');
					return false;
				}
				if( data == 2 )
				{
					alert('选中失败！');
					return false;
				}
			},
			error : function(data)
			{
				alert('选中失败！');
				return false;
			},
			dataType : 'json'
		})

		
	})
	//删除
	$('.payment_hader_butd').on('click',function(){
		var li = $(this).parents('li');
		var id = li.attr('index');

		$.ajax('/home/shoppingcart/payment/addressdel',{
			type : 'post',
			data : {id:id,_token:$("meta[name='csrf-token']").attr('content')},
			success : function(data)
			{
				if(data ==1 )
				{	
					li.remove();
					alert('删除成功！');
					return false;
				}
				if(data == 2)
				{	
					alert('删除失败！');
					return false;
				}
			},
			error : function(data)
			{
				alert('删除失败！');
				return false;
			},
			dataType : 'json'
		})
		return false;
	})
			

	//模态框
	var MyModal = (function() {
	function modal(fn) {
		this.fn = fn; //点击确定后的回调函数
		this._addClickListen();
	}
	modal.prototype = {
		show: function(edit,li) {
			dizhidel();
			$('.m-modal').fadeIn(100);
			$('.m-modal').children('.m-modal-dialog').animate({
				"margin-top": "100px"
			}, 250);

			if(edit == 'edit')
			{
				$('.m-modal-title').html('更新收货地址');
				var id = li.attr('index');
				var res = edits(id);

				if(res == false)
				{
					var $modal = $('.m-modal');
					$modal.children('.m-modal-dialog').animate({
						"margin-top": "-100%"
					}, 500);
					$modal.fadeOut(100);
					return false;
				}
				$('.m-modal-title').attr('index',id);

			}
			
		},
		_addClickListen: function() {
			var that = this;
			$(".m-modal").find('*').on("click", function(event) {
				event.stopPropagation(); //阻止事件冒泡
			});
			// .m-modal,
			$(".m-modal-close,.m-btn-cancel").on("click", function(event) {
				that.hide();$("body").css('overflow','scroll');
			});
			$('.m-btn-edit').on('click',function(event){
				var a =aa();
				if(a == false)
				{
					return false;
				}
				
				var id = $('.m-modal-title').attr('index');
				$.ajax('/home/shoppingcart/payment/addressedit',{
					type : 'post',
					data : {'id':id,dizhis:a['dizhis'],name:a['name'],phone:a['phone'],shen:a['shen'],shi:a['shi'],qu:a['qu'],tails:a['tails'],zipcode:a['zipcode'],lebel:a['lebel'],_token:$("meta[name='csrf-token']").attr('content')},
					success : function(data)
					{	
						if(data == 1 )
						{
							alert('更新成功！');
							var idd =$(".dizhiul li[index="+id+"]");
							idd.find('title').html(a['shen']+a['shi']+' '+'('+a['name']+')');
							idd.find('span').html(a['tails']);
							dizhidel();
							that.hide();


						}
						if(data == 2)
						{
							alert('地址更新失败！');
						}
					},
					error : function(data)
					{
						alert('更新失败！');
						return false;
					},
					dataType : 'json'
				})
			})
			$(".m-btn-sure").on("click", function(event) {
				var a = aa();
				if(a == false)
				{
					return false;
				}
				$.ajax('/home/shoppingcart/payment/address',{
					type : 'post',
					data : {dizhis:a['dizhis'],name:a['name'],phone:a['phone'],shen:a['shen'],shi:a['shi'],qu:a['qu'],tails:a['tails'],zipcode:a['zipcode'],lebel:a['lebel'],_token:$("meta[name='csrf-token']").attr('content')},
					success : function(data)
					{	
						 
						if(data == 'error')
						{
							alert('地址添加失败！')
						}
						if(data == 'errors')
						{
							alert('地址达到上限！请先删除');
						}

						alert('添加成功！');
						dizhidel();
						var dizhili = $('.dizhili').eq(0).clone(true);
						dizhili.css('display','block');
						dizhili.find('title').html(a['shen']+a['shi']+' '+'('+a['name']+')');
						dizhili.find('span').html(a['tails']);
						$('.dizhiul').append(dizhili);
						$('.dizhili').attr('index',data);

						// that.fn();
						that.hide();
					},
					error : function(data)
					{	
						
						alert('添加失败！');
						return false;
					},
					dataType : 'json'
				})
				
			});
		},
		hide: function() {
			var $modal = $('.m-modal');
			$modal.children('.m-modal-dialog').animate({
				"margin-top": "-100%"
			}, 500);
			$modal.fadeOut(100);
		}

	};
	return {
		modal: modal
	}
})();

//更新赋值表单数据
function edits(id)
{	
	var res = false;
	$.ajax('/home/sohppingcart/payment/editaddress',{
		type : 'get',
		data: {id:id},
		async : false,
		success : function(data)
		{
			if(data == 2)
			{

			 res = false;
			}
			$('.payment_input_name').val(data['name']);
			$('.payment_input_phone').val(data['phone']);
			$('.paymentdetails').val(data['tails']);
			$('.payment_input_zipcode').val(data['zipcode']);
			$('.payment_input_lebel').val(data['lebel']);
			$('.dt1').html(data['shen']);
			$('.dt2').html(data['shi']);
			$('.dt3').html(data['qu']);
			$('.dt1').attr('index',data['shens']);
			$('.dt2').attr('index',data['shis']);
			$('.dt3').attr('index',data['qus']);
			$.each(data['shiss'],function(i,n){
				var li = $('.paymentshi').eq(0).clone(true);

				li.find('a').html(n['name']);
				li.find('a').attr('index',n['id']);
				$('.paymentshis').append(li);
		
				})
			$.each(data['quss'],function(i,n){
				var li = $('.paymentqu').eq(0).clone(true);

				li.find('a').html(n['name']);
				li.find('a').attr('index',n['id']);
				$('.paymentqus').append(li);
		
				})
			res = true;

		},
		error : function(data)
		{
			alert('加载失败！');
			res = false;
		},
		dataType : 'json'

	})
	return res;
}

//表单清空
function dizhidel()
{
	$('.payment_input_name').val('');
	$('.payment_input_phone').val('');
	$('.paymentdetails').val('');
	$('.payment_input_zipcode').val('');
	$('.payment_input_lebel').val('');
	$('.payment_input_name').css('border','1px solid #ededed');
	$('.payment_input_phone').css('border','1px solid #ededed');
	$('.paymentdetailsdiv').css('border','1px solid #ededed');
	$('.payment_input_zipcode').css('border','1px solid #ededed');
	$('.payment_input_lebel').css('border','1px solid #ededed');
	$('.dt1').css('border','1px solid #ededed');
	$('.dt2').css('border','1px solid #ededed');
	$('.dt3').css('border','1px solid #ededed');
	$('.dt1').html('选择省');
	$('.dt2').html('选择市');
	$('.dt3').html('选择区');
		var li0 = $('.paymentshi').eq(0).clone(true);
		$('.paymentshis').html('');
		$('.dt2').html('选择市');
		$('.paymentshis').append(li0);

		var li00 = $('.paymentqu').eq(0).clone(true);
		$('.paymentqus').html('');
		$('.paymentqus').append(li00);
		$('.dt3').html('选择区');
		$('.dt3').attr('index','');
		$('.dt2').attr('index','');
		$('.dt1').attr('index','');
		$('.m-modal-title').attr('index','');


}
//地址验证
function aa(){

	$('.payment_input_name').css('border','1px solid #ededed');
	$('.payment_input_phone').css('border','1px solid #ededed');
	$('.dt1').css('border','1px solid #ededed');
	$('.dt2').css('border','1px solid #ededed');
	$('.dt3').css('border','1px solid #ededed');
	$('.paymentdetailsdiv').css('border','1px solid #ededed');
	$('.payment_input_zipcode').css('border','1px solid #ededed');
	
	var name = $('.payment_input_name').val();
	var nameper = /^([\u4E00-\u9FFF]|\w){2,6}$/.test(name);
	if( !nameper )
	{	
		
		$('.payment_input_name').css('border','1px solid red');
		return false;
	}

	var phone = $('.payment_input_phone').val();
	var phoneper = /^[1][3,4,5,7,8][0-9]{9}$/.test(phone);
	if( !phoneper )
	{	
		$('.payment_input_phone').css('border','1px solid red');
		return false;
	}

	var shen = $('.dt1').html();
	if(shen == '选择省')
	{
		$('.dt1').css('border','1px solid red');
		return false;
	}

	var shi = $('.dt2').html();
	if(shi == '选择市')
	{
		$('.dt2').css('border','1px solid red');
		return false;
	}
	var qu = $('.dt3').html();
	if(qu == '选择区')
	{
		$('.dt3').css('border','1px solid red');
		return false;
	}

	var tails =  $('.paymentdetails').val();
	var tailsper = /^.{2,28}$/.test(tails);
	if(!tailsper)
	{
		$('.paymentdetailsdiv').css('border','1px solid red');
		return false;
	}

	var zipcode = $('.payment_input_zipcode').val();
	var zipcodeper = /^\d{6}$/.test(zipcode);
	if(!zipcodeper)
	{
		$('.payment_input_zipcode').css('border','1px solid red');
		return false;
	}

	var lebel = $('.payment_input_lebel').val();

	var arr = new Object();
	// var arr = new Array();
	arr['name'] = name;
	arr['phone'] = phone;
	arr['shen'] = shen;
	arr['shi'] = shi;
	arr['qu'] = qu;
	arr['tails'] = tails;
	arr['zipcode'] = zipcode;
	arr['lebel'] = lebel;
	arr['dizhis'] = $('.dt1').attr('index')+','+$('.dt2').attr('index')+','+$('.dt3').attr('index');

	return arr;


}

var m1 = new MyModal.modal(function() {
			$("body").css('overflow','scroll');
			});

//添加
$('.btn1').on("click", function() {
				m1.show();
				$('.m-modal-title').html('添加收货地址');
				$("body").css({overflow:"hidden"})
				$('.m-btn-edit').css('display','none');
				$('.m-btn-sure').css('display','block');
			});

//更新
$('.payment_hader_butl').on("click", function() {
				var li = $(this).parents('li');
				m1.show('edit',li);
				$("body").css({overflow:"hidden"})
				$('.m-btn-edit').css('display','block');
				$('.m-btn-sure').css('display','none');
			});



// 下拉
	$(".select").each(function(){
		var s=$(this);
		var z=parseInt(s.css("z-index"));
		var dt=$(this).children("dt");
		var dd=$(this).children("dd");
		var _show=function(){dd.slideDown(200);dt.addClass("cur");s.css("z-index",z+1);};   //展开效果
		var _hide=function(){dd.slideUp(200);dt.removeClass("cur");s.css("z-index",z);};    //关闭效果
		dt.click(function(){dd.is(":hidden")?_show():_hide();});
		dd.find("a").click(function(){dt.html($(this).html());_hide();});     
		//选择效果（如需要传值，可自定义参数，在此处返回对应的“value”值 ）
		// $()
		$('.m-top > *').on("click",function(i){ !$(i.target).parents(".select").first().is(s) ? _hide():"";});
		$('.m-middle > *').on("click",function(i){ !$(i.target).parents(".select").first().is(s) ? _hide():"";});
		$('.m-bottom > *').on("click",function(i){ !$(i.target).parents(".select").first().is(s) ? _hide():"";});
		$('input').on("click",function(i){ !$(i.target).parents(".select").first().is(s) ? _hide():"";});
		$('body').on("click",function(i){ !$(i.target).parents(".select").first().is(s) ? _hide():"";});
		$('.m-modal-dialog > *').on("click",function(i){ !$(i.target).parents(".select").first().is(s) ? _hide():"";});
		$('.select > *').on("click",function(i){ !$(i.target).parents(".select").first().is(s) ? _hide():"";});
		$('.paymentdetailsdiv > *').on("click",function(i){ !$(i.target).parents(".select").first().is(s) ? _hide():"";});

		
	})

	//省级
	$('.paymentshen > a').on('click',function(){
		var id = $(this).attr('index');
		$('.dt1').attr('index',id);
		var res = "";
		var li0 = $('.paymentshi').eq(0).clone(true);
		$('.paymentshis').html('');
		$('.dt2').html('选择市');
		$('.dt2').attr('index','');

		$('.paymentshis').append(li0);

		var li00 = $('.paymentqu').eq(0).clone(true);
		$('.paymentqus').html('');
		$('.paymentqus').append(li00);
		$('.dt3').html('选择区');
		$('.dt3').attr('index','');

		if(id == 00)
		{	
			return false
		}
		$.ajax('/home/shoppingcart/payment/dizhiajax',{
			type : 'get',
			data : {id:id,oer:2},
			success : function(data)
			{	
				$.each(data,function(i,n){
				var li = $('.paymentshi').eq(0).clone(true);

				li.find('a').html(n['name']);
				li.find('a').attr('index',n['id']);
				$('.paymentshis').append(li);
		
				})
			},
			error : function(data)
			{
				alert('加载失败！');
				return false;
			},
			dataType : 'json'
		})

	})

	//市级
	$('.paymentshi > a').on('click',function(){
		var id = $(this).attr('index');
		$('.dt2').attr('index',id);
		var li0 = $('.paymentqu').eq(0).clone(true);
		$('.paymentqus').html('');
		$('.paymentqus').append(li0);
		$('.dt3').html('选择区');
		$('.dt3').attr('index','');
		if(id == 00)
		{
			return false;
		}
		$.ajax('/home/shoppingcart/payment/dizhiajax',{
			type : 'get',
			data : {id:id,oer:3},
			success : function(data)
			{	
				$.each(data,function(i,n){
				var li = $('.paymentqu').eq(0).clone(true);

				li.find('a').html(n['name']);
				li.find('a').attr('index',n['id']);
				$('.paymentqus').append(li);
		
				})
			},
			error : function(data)
			{
				alert('加载失败！');
				return false;
			},
			dataType : 'json'
		})
	})
	//区
	$('.paymentqu > a').on('click',function(){
		var id = $(this).attr('index');
		$('.dt3').attr('index',id);
	})


 	//textarea 键盘输入事件
	$('.paymentdetails').keyup(function(){
		var str = $(this).val();

		if( str.length > 28)
		{
			var res = str.substr(0,28);
			$(this).val(res);
			// alert('字数超出限制');

		}
	})
	$('.payment_input_lebel').keyup(function(){
		var str = $(this).val();

		if( str.length > 12)
		{
			var res = str.substr(0,15);
			$(this).val(res);
			// alert('字数超出限制');

		}
	})