
( function( $ ) {
	wp.customize( 'responsive_layout', function( value ) {
		value.bind( function( newval ) {
			var dim = newval.split(',');
			$('#customize-preview iframe').width(dim[0]).height(dim[1]);
			if(dim[0] >= 600) {
				$("input[type=radio][value=left]").prop("checked",true);
			}
		} );
	} );
} )( jQuery );
