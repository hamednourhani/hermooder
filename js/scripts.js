
jQuery(document).ready(function($){
	
	// setTimeout(function(){ 
	// 	window.loading_screen.finish();
	//  }, 1000);

	// $('nav.main-menu').scrollToFixed({
	// 	minWidth : 945,
	// });

    $('aside,article').onScreen({
	   container: window,
	   direction: 'vertical',
	  
	   doIn: function() {
	     // Do something to the matched elements as they come in
	   },
	   doOut: function() {
	    // Do something to the matched elements as they get off scren
	   },
	   tolerance: 0,
	   throttle: 250,
	   toggleClass: 'onScreen',
	   lazyAttr: null,
	   lazyPlaceholder: 'someImage.jpg',
	   debug: false
	});

	$('a#register-show').click(function(event){
		event.preventDefault();
		$('.register-container').toggleClass('form-display');
		$('.login-container').removeClass('form-display');
	});

	$('a#login-show').click(function(event){
		event.preventDefault();
		$('.login-container').toggleClass('form-display');
		$('.register-container').removeClass('form-display');
	});

	// setTimeout(function(){
	// 	window.loading_screen.finish();
	// },2000);
	
	$('a#menu-toggler').click(function(){
		console.log('click on menu toggler');
		var responsive_container = $('div#responsive-menu');
		var close_button = responsive_container.children('a#close-responsive');
		var body_wrapper = $('.body-wrapper');
		var menu_height = $(window).height();
		responsive_container.css('height',menu_height).addClass('show-menu');
		

		close_button.click(function(event){
			//event.stopPropagination();
			responsive_container.removeClass('show-menu');
		});

		// body_wrapper.click(function(event){
		// 	event.stopPropagination();
		// 	responsive_container.removeClass('show-menu');

		// });
	});
	
});	
		