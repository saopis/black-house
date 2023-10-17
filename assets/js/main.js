(function($) {
	"use strict"

	///////////////////////////
	// Preloader
	$(window).on('load', function() {
		$("#preloader").delay(600).fadeOut();
	});

	///////////////////////////
	// Scrollspy
	$('body').scrollspy({
		target: '#nav',
		offset: $(window).height() / 2
	});

	///////////////////////////
	// Smooth scroll
	$("#nav .main-nav a[href^='#']").on('click', function(e) {
		e.preventDefault();
		var hash = this.hash;
		$('html, body').animate({
			scrollTop: $(this.hash).offset().top
		}, 600);
	});

	$('#back-to-top').on('click', function(){
		$('body,html').animate({
			scrollTop: 0
		}, 600);
	});

	///////////////////////////
	// Btn nav collapse
	$('#nav .nav-collapse').on('click', function() {
		$('#nav').toggleClass('open');
	});

	///////////////////////////
	// Mobile dropdown
	$('.has-dropdown a').on('click', function() {
		$(this).parent().toggleClass('open-drop');
	});

	///////////////////////////
	// On Scroll
	$(window).on('scroll', function() {
		var wScroll = $(this).scrollTop();

		// Fixed nav
		wScroll > 1 ? $('#nav').addClass('fixed-nav') : $('#nav').removeClass('fixed-nav');

		// Back To Top Appear
		wScroll > 700 ? $('#back-to-top').fadeIn() : $('#back-to-top').fadeOut();
	});

	///////////////////////////
	// magnificPopup
	$('.work').magnificPopup({
		delegate: '.lightbox',
		type: 'image'
	});

	///////////////////////////
	// Owl Carousel
	$('#about-slider').owlCarousel({
		items:1,
		loop:true,
		margin:15,
		nav: true,
		navText : ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
		dots : true,
		autoplay : true,
		animateOut: 'fadeOut'
	});

	$('#testimonial-slider').owlCarousel({
		loop:true,
		margin:15,
		dots : true,
		nav: false,
		autoplay : true,
		responsive:{
			0: {
				items:1
			},
			992:{
				items:2
			}
		}
	});

	/*custome*/
	// magnificPopup
	$('.menu').magnificPopup({
		delegate: '.lightbox',
		type: 'image'
	});

	var focused='';
	$(document).on('mouseover', '#touch-to-search', function(event) {
		event.preventDefault();
		$("#touch-to-search input").show();
		$("#touch-to-search").css({
			width: '280px'
		});
	});
	$(document).on('mouseleave', '#touch-to-search', function(event) {
		event.preventDefault();
		if (focused=='') {
			$("#touch-to-search input").hide();
			$("#touch-to-search").css({
				width: '50px'
			});
		}
		
	});
	$(document).on('focusin', '#touch-to-search input', function(event) {
		event.preventDefault();
		focused='1';
		$("#touch-to-search").css({
			width: '280px'
		});
		$("#touch-to-search input").show();
	});
	$(document).on('focusout', '#touch-to-search input', function(event) {
		event.preventDefault();
		if ($("#touch-to-search input").val()=='') {
			focused='';
		$("#touch-to-search").css({
			width: '50px'
		});
		$("#touch-to-search input").hide();
		}
	});

})(jQuery);
