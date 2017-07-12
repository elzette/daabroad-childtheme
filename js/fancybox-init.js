(function( $ ) {

	// Fancybox settings
	$( '.fancybox' ).fancybox({
			closeClick : true,
			maxWidth : 700,
			maxHeight : 600,
			fitToView	: false,
			width : '80%',
			height : 'auto',
			autoSize	: false,
			helpers : {
			  overlay : {
			      css : {
			        'background' : 'rgba(0, 87, 157, 0.9)'
			      }
			   }
			}
	});

})( jQuery );
