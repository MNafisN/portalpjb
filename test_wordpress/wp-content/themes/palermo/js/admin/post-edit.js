jQuery(document).ready(function($) {

	$( '.colorpckr' ).each( function() {
		$( this ).wpColorPicker();
	} );

	palermo_handle_depended_fields( 'background_type' );
});

function palermo_handle_depended_fields( id ) {
	var $id = jQuery('#' + id);
	jQuery('body').on('change', $id, function () {
		jQuery('.palermo-depends').each(function () {
			if (id == jQuery(this).data('depends-id') && jQuery(this).data('depends-value') == $id.val()) {
				jQuery(this).show();
			} else {
				jQuery(this).hide();
			}
		});

	});

	$id.change();
}
