// remap jQuery to $
(function($){})(window.jQuery);


/* trigger when page is ready */
$(document).ready(function (){

	// menu popdown js
	jQuery('#main-menu-slider').click(function(e) {
		e.preventDefault();
		jQuery('#menu-main-nav').toggle('ease');
	});

});



/* optional triggers

$(window).load(function() {
	
});

$(window).resize(function() {
	
});

*/