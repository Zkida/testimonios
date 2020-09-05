jQuery(document).ready(function($){
	$('.slider-container').slick({
		dots: false,
		prevArrow: $('.slider-wrapper').find(".navs .prev"),
		nextArrow: $('.slider-wrapper').find(".navs .next"),
		arrows: true,
		autoplay: true,
		autoplaySpeed: 3000,
		infinite: true,
		speed: 500,
	});

});

