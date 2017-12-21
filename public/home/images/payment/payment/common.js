	
	$('.payment_hader > ul > li > div').on('click',function(){
		$('.payment_hader_defult').removeClass('payment_hader_defult');
		$(this).attr('class','payment_hader_defult');

		// $('.payment_hader_butdel').removeClass('payment_hader_butdel');
		$("button[name='del']").css('display','block');
		$(this).find("button[name='del']").css('display','none');
		return false;
	})
	$('.payment_hader_but > button').on('click',function(){
		alert(2)
		return false;
	})
			

	var MyModal = (function() {
	function modal(fn) {
		this.fn = fn; //点击确定后的回调函数
		this._addClickListen();
	}
	modal.prototype = {
		show: function() {
			$('.m-modal').fadeIn(100);
			$('.m-modal').children('.m-modal-dialog').animate({
				"margin-top": "100px"
			}, 250);
		},
		_addClickListen: function() {
			var that = this;
			$(".m-modal").find('*').on("click", function(event) {
				event.stopPropagation(); //阻止事件冒泡
			});
			// .m-modal,
			$(".m-modal-close,.m-btn-cancel").on("click", function(event) {
				that.hide();
			});
			$(".m-btn-sure").on("click", function(event) {
				var a = aa();
				if( a == 1 )
				{
					that.fn();
					that.hide();
				}else
				{
					alert('失败');
				}
				
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

var m1 = new MyModal.modal(function() {

			});

$('.btn1').on("click", function() {
				m1.show();
			});

//地址验证
function aa(){

	return 1;
}