
( function( $ ) {

	wp.customize( 'title_alignment', function( value ) {
		value.bind( function( newval ) {
			if( window.innerWidth < 600 ) {
				$('.site-title').css('text-align', newval);
				$('.site-description').css('text-align', newval);
			}
		} );
	} );
	wp.customize( 'responsive_layout', function( value ) {
		value.bind( function( newval ) {
			var dim = newval.split(',');
			if(dim[0] >= 600) {
				$('.site-title').css('text-align', 'left');
				$('.site-description').css('text-align', 'left');
			}
		} );
	} );
} )( jQuery );