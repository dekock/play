( function($) {
			 $(document).ready( function() {
				 function checkWidth() {
					 var windowSize = $(window).width();
					  if (windowSize >= 767) {
			 			$(".sidebar").height(Math.max($("#bodycontent").height()));
					  }
				 }
				 checkWidth();
    			// Bind event listener
    			$(window).resize(checkWidth);								 
			});			
			} ) ( jQuery );
