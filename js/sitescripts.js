(function( $ ) {

	var ww = document.body.clientWidth;
	if ( ww >= 1024 ) {

		// Adding home news title border
		$( '<div id="chartdiv"></div>' ).prependTo( '.home .home-welcome' );
		$( '<div class="home-welcome"><div id="chartdiv"></div></div>' ).insertAfter( '.meet-the-team .nav-primary' );

		// Adding search animation thingy
		$( 'li.search input[type="search"]' ).hide();
		if ( $( 'li.search input[type="search"]:hidden' ) ) {
			$( '<button class="search-open"><span>Search</span></button>' ).insertBefore( 'li.search .search-form [type="submit"]' );
			$( 'li.search .search-form [type="submit"]' ).hide();
			$( '.search-open' ).on( 'click touchstart', function(e){
 				e.preventDefault();
 				$( 'li.search .search-open' ).hide();
 				$( 'li.search .search-form [type="submit"]' ).show();
 				$( 'li.search input[type="search"]' ).show().animate( {'left': '+=200px'}, 'slow' );
 			});
 		}
	}

	// Do some changing with header on scroll
	$( window ).scroll(function() {
		var scroll = $( window ).scrollTop();
		if (scroll >= 110) {
			$( '.home .site-header' ).addClass( 'scroll' );
		} else {
			$( '.home .site-header' ).removeClass( 'scroll' ) ;
		}
	});

	// Adding class for swirl background animation
	$( '.home .site-header' ).addClass( 'swirl' );

	//Adding map to home and team page
	$( '<span class="hr"></span>' ).insertAfter( '.home-latest-news .widgettitle' );

	// Styling home page event list
	if ( $( '.tribe-events-list-widget-events' ).length < 2 ) {
			$( '.home-events-widget' ).addClass( 'one-event' );
	}

	// Animating newsletter bit
	$( '.indicates-required, .firstname, .lastname, .countries' ).hide();
	$( '.email' ).focusin(function(){
			$( '.indicates-required, .firstname, .lastname, .countries' ).fadeIn( 800 );
	});

	// Adding svg arrows inline to post navigation
	$( '.nav-previous' )
			.prepend( '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0" y="0" viewBox="0 0 7 12" xml:space="preserve"><path d="M7,12V9L3.5,6L7,3V0L0,6L7,12z"/></svg>');
	$( '.nav-next' )
			.append(' <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0" y="0" viewBox="0 0 7 12" xml:space="preserve"><path d="M0,0v3L3.5,6L0,9v3l7-6L0,0z"/></svg>');

	// Adding back to top button
	$( '.site-container' ).prepend( '<a href="#top" class="backToTop"></a>' );
	$( '.site-container' ).attr( 'id', 'top' );

	$( '.backToTop' ).on( 'click touchstart', function(e){
	 		e.preventDefault();
	 		$( 'html,body' ).animate( {scrollTop:0}, 'slow' );
	 		return false;
 	});

	$( document ).scroll( function() {
    	var y = $( this ).scrollTop();
			if ( y > 800 ) {
	        	$( '.backToTop' ).fadeIn();
			} else {
				$( '.backToTop' ).fadeOut();
			}
	});

})( jQuery );
