$(document).ready(function(){

		$('#pleaseWait-slider').flexslider({
			animation: "slide",
			directionNav: false,
			controlNav: false,
			direction: "vertical",
			slideshowSpeed: 1000,
			animationSpeed: 500,
			smoothHeight: false,
			startAt: 1
		});
	
	$(window).load(function() {
		/*
			Preloader
		*/
		
		$('#preloader').delay(1000).fadeOut('slow',function(){$(this).remove();});	

		/*Scrollr*/
		// Init Skrollr
		
		if(!(/Android|iPhone|iPad|iPod|BlackBerry|Windows Phone/i).test(navigator.userAgent || navigator.vendor || window.opera)){
		    skrollr.init({
		        forceHeight: false
		    });
		}

		else{
			$("#platform").css({
				"transform": "scale(4)",
				"margin-top": "140px"
			});
		}

		$("img.img-responsive-custom").each(function(){
			$(this).removeAttr("width");
			$(this).removeAttr("height");
		})

	});

});



