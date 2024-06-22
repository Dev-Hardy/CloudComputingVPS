				/* =========================
            CAROUSEL 
        =========================*/
		
        $(document).ready(function() {
          $("#owl-demo").owlCarousel({
            autoPlay: 3000, //Set AutoPlay to 3 seconds
            items : 3,
            itemsDesktop : [1199,3],
            itemsDesktopSmall : [979,2]
         
          });
        });

        
    /* ==============================================
			PARALLAX
		=============================================== */	
		
		$.fn.parallax = function(options) {
 
			var windowHeight = $(window).height();
	 
			// Establish default settings
			var settings = $.extend({
				speed        : 0.15
			}, options);
	 
			// Iterate over each object in collection
			return this.each( function() {
	 
				// Save a reference to the element
				var $this = $(this);
	 
				// Set up Scroll Handler
				$(document).scroll(function(){
	 
						var scrollTop = $(window).scrollTop();
							var offset = $this.offset().top;
							var height = $this.outerHeight();
	 
				// Check if above or below viewport
				if (offset + height <= scrollTop || offset >= scrollTop + windowHeight) {
					return;
				}
	 
				var yBgPosition = Math.round((offset - scrollTop) * settings.speed);
	 
					 // Apply the Y Background Position to Set the Parallax Effect
					$this.css('background-position', 'center ' + yBgPosition + 'px');
					
				});
			});
		}
	
		$('.parallax').parallax({
			speed : 0.15
		});