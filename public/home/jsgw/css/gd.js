$(document).ready(function() {

			var curr_margin_top = parseInt($(".newl").css("margin-top"));

			var advLen = $(".newl div").length;

			var step = parseInt($(".newl div").css("height"));

			var adv_index = 0;

			function getTop(){

				var curr_margin_top = parseInt($(".newl").css("margin-top"));

				return curr_margin_top;

			}

			function setTop(top){

				$(".newl").css("margin-top",top);

				console.info("setTop---"+getTop());

			}

			

			function showAdvhref(){

				console.info("showAdvhref");

				adv_index++;

				var _top = getTop()-step;

				if(adv_index>=advLen){

					_top = 0;	

					adv_index = 0;

				}	

				setTop(_top);

				

			}

			setInterval(showAdvhref,4000);

	/*

	$("#nav ul li a.solutions").hover(function() {

			$("#menu-popup .solutions").show();

			$("#nav ul li a").addClass("solutions_hover");

		});*/

$("#nav ul li a").mouseenter(function(){



		var idx = $(this).attr("index");



		$("#menu-popup .popup").hide();



		$("#menu-popup .popup:nth-child("+idx+")").show();

		var _bclass = $(this).attr("bclass");



		var bclass = _bclass +"_hover";



		$(this).removeClass(_bclass);



		$(this).addClass(bclass);



		



	})



	



	$("#nav ul li a").mouseleave(function(){



		var bclass = $(this).attr("bclass");



		$(this).removeClass(bclass+"_hover");

		$(this).addClass(bclass);



	})



	





$("#menu-popup .popup").mouseleave(function(){



		$("#menu-popup .popup").hide();		



	})

	

	$('#slide-show-items li').hide();

	var currentSlide = -1;

	var prevSlide = null;

	var slides = $('#slide-show-items li');

	var interval = null;

	var FADE_SPEED = 200;

	var DELAY_SPEED = 5000;

	var html = '<ul id="slide-show-count">'

	for(var i = slides.length - 1; i >= 0; i--) {

		html += '<li id="slide' + i + '" class="slide"><a href="javascript:void(0);">' + '' + '</a></li>';

	}

	html += '</ul>';

	$('#banner').append(html);

	for(var i = slides.length - 1; i >= 0; i--) {

		$('#slide' + i).bind("click", {

			index : i

		}, function(event) {

			currentSlide = event.data.index;

		});

	};

	if(slides.length <= 1) {

		$('.slide').hide();

	}

	nextSlide();

	function nextSlide() {

		if(currentSlide >= slides.length - 1) {

			currentSlide = 0;

		} else {

			currentSlide++

		}

		gotoSlide(currentSlide);

	}



	function gotoSlide(slideNum) {

		if(slideNum != prevSlide) {

			// prev slide fadeOut, currentSlide fadeIn

			if(prevSlide != null) {

				$(slides[prevSlide]).stop().fadeOut();

				$('#slide' + prevSlide).removeClass('selectedTab');

			}

			$('#slide' + currentSlide).addClass('selectedTab');

			$(slides[slideNum]).stop().fadeIn(FADE_SPEED);

			$('#slide' + slideNum).addClass('selectedTab');

			$('#slide' + prevSlide).removeClass('selectedTab');

			prevSlide = currentSlide;

			if(interval != null) {

				clearInterval(interval);

			}

			interval = setInterval(nextSlide, DELAY_SPEED);

		}

	}
(function(){  
	$('.index_pro ul li').hide();
	var currentSlide = -1;
	var prevSlide = null;
	var slides = $('.index_pro ul li');
	var interval = null;
	var FADE_SPEED = 300;
	var DELAY_SPEED = 5000;
	nextSlide();
	function nextSlide (){
		if (currentSlide >= slides.length -1){
			currentSlide = 0;
		}else{
			currentSlide++
		}
		gotoSlide(currentSlide);
	}
	function gotoSlide(slideNum){
		if (slideNum != prevSlide){
			if (prevSlide != null){
				$(slides[prevSlide]).stop().fadeOut();
			}
			$(slides[slideNum]).stop().fadeIn( FADE_SPEED );
			prevSlide = currentSlide;
			if (interval != null){
				clearInterval(interval);
			}
			interval = setInterval(nextSlide, DELAY_SPEED);
				}
	}	   
})()

});