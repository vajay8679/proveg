$(function() {
    /* Demo Scripts for Bootstrap Carousel and Animate.css */


	//Function to animate slider captions 
	function doAnimations( elems ) {
		//Cache the animationend event in a variable
		var animEndEv = 'webkitAnimationEnd animationend';
		
		elems.each(function () {
			var $this = $(this),
				$animationType = $this.data('animation');
			   $this.addClass($animationType).one(animEndEv, function () {
				$this.removeClass($animationType);
			});
		});
	}
	
	//Variables on page load 
	var $myCarousel = $('#home-slider'),
		$firstAnimatingElems = $myCarousel.find('.item:first').find("[data-animation ^= 'animated']");
		
	//Initialize carousel 
	$myCarousel.carousel();
	
	//Animate captions in first slide on page load 
	doAnimations($firstAnimatingElems);
	
	//Pause carousel  
	$myCarousel.carousel('pause');
	
	
	//Other slides to be animated on carousel slide event 
	$myCarousel.on('slide.bs.carousel', function (e) {
		var $animatingElems = $(e.relatedTarget).find("[data-animation ^= 'animated']");
		doAnimations($animatingElems);
	});  
	

   
		//	Project Scroll Js	
		$('#home-blog .item').each(function(){
				
		  var next = $(this).next();
		  if (!next.length) {
			next = $(this).siblings(':first');
		  }
		  next.children(':first-child').clone().appendTo($(this));
		  
		  for (var i=0;i<1;i++) {
			next=next.next();
			if (!next.length) {
				next = $(this).siblings(':first');
			}
			
			next.children(':first-child').clone().appendTo($(this));
		  }
		});
		$('#related-projects .item').each(function(){
				
		  var next = $(this).next();
		  if (!next.length) {
			next = $(this).siblings(':first');
		  }
		  next.children(':first-child').clone().appendTo($(this));
		  
		  for (var i=0;i<1;i++) {
			next=next.next();
			if (!next.length) {
				next = $(this).siblings(':first');
			}
			
			next.children(':first-child').clone().appendTo($(this));
		  }
		});
	//Client Slider	
	if($(".plogo-slider").length){$(".plogo-slider").owlCarousel({autoPlay:3000,items:7,pagination:false,itemsMobile:[480,1],itemsDesktop:[1199,3],itemsDesktopSmall:[979,3]});}	
	/* Accordion Js */
	$('.collapse').on('shown.bs.collapse', function() {$(this).parent().find(".fa-chevron-circle-right").removeClass("fa-chevron-circle-right").addClass("fa-chevron-circle-down");}).on('hidden.bs.collapse', function(){$(this).parent().find(".fa-chevron-circle-down").removeClass("fa-chevron-down").addClass("fa-chevron-circle-right");});	
	//------PhotoBox Js------------//		
     !(function(){
          'use stnonerict';
		// finally, initialize photobox on all retrieved images
		jQuery('#gallery').photobox('.photobox_a');
	jQuery('#gallery').photobox('.photobox_a:first', { thumbs:false, time:0 }, imageLoaded);
	function imageLoaded(){
		console.log('image has been loaded...'
		);
	}
	
	
			// finally, initialize photobox on all retrieved images
		jQuery('#gallery1').photobox('.photobox_a');
	jQuery('#gallery1').photobox('.photobox_a:first', { thumbs:false, time:0 }, imageLoaded);
	function imageLoaded(){
		console.log('image has been loaded...'
		);
	}
    
})();





});