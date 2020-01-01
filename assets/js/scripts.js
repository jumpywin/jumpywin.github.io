(function($) {
    "use strict";
    jQuery(document).ready(function() {
		 var top_news = jQuery('#main-slider');
			top_news.show().owlCarousel({
				items : 2,
				singleItem : true,
				responsive: true,
				navigation : true,
				navigationText : ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
			});	
			//Submenu Dropdown Toggle
		    if($('.main-menu  li.menu-item-has-children ul').length){
		        $('.main-menu  li.menu-item-has-children').append('<div class="dropdown-btn"><Span class="fa fa-angle-down"></span></div>');
		        //Dropdown Button
		        $('.main-menu li.menu-item-has-children .dropdown-btn').on('click', function() {
		            $(this).prev('ul').slideToggle(500);
		        });
		        //Disable dropdown parent link
		        $('.navigation  li.menu-item-has-children > a').on('click', function(e) {
		            e.preventDefault();
		        });
	    	}
    	    //Click event to scroll to top
    		//Check to see if the window is top if not then display button
			jQuery(window).scroll(function($){
				if (jQuery(this).scrollTop() > 100) {
					jQuery('.scrolltop').addClass('activetop');
					jQuery('.scrolltop').fadeIn();
				} else {
					jQuery('.scrolltop').fadeOut();
				}
			});
			
			//Click event to scroll to top
			jQuery('.scrolltop').click(function($){
				jQuery('html, body').animate({scrollTop : 0},800);
				return false;
			});

			//fancybox
			jQuery('.fancybox').fancybox();	
					
	
	       
		    
    });

})(jQuery);