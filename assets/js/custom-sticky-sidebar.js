(function($) {
    "use strict";
    jQuery(document).ready(function($) {	

		//sticky sidebar
		    var at_body = jQuery("body");
		    var at_window = jQuery(window);

	   		if(at_body.hasClass('at-sticky-sidebar')){
	            if(at_body.hasClass('right-s-barr')){
	                jQuery('#secondary, #primary').theiaStickySidebar();
	            }
	            else{
	                jQuery('#secondary, #primary').theiaStickySidebar();
	            }
	        }
  });

})(jQuery);	        
