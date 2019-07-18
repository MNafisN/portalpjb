<?php
	add_action( 'admin_init', 'palermo_cpt_page_add_metaboxes' );
	add_action( 'save_post', 'palermo_cpt_page_update_meta' );

	function palermo_cpt_page_add_metaboxes() {
		add_meta_box( 'palermo-page-meta', esc_html__( 'Page Options', 'palermo' ), 'palermo_add_page_meta_box', 'page', 'normal', 'high' );
		add_meta_box( 'palermo-tpl-room-listing', esc_html__( 'Room Listing Options', 'palermo' ), 'palermo_add_cpt_page_room_listing_meta_box', 'page', 'normal', 'high' );
	}

	function palermo_cpt_page_update_meta( $post_id ) {

		if ( ! palermo_can_save_meta( 'page' ) ) {
			return;
		}

		update_post_meta( $post_id, 'palermo_hide_content', palermo_sanitize_checkbox_ref( $_POST['palermo_hide_content'] ) );

		update_post_meta( $post_id, 'room_listing_base_category', intval( $_POST['room_listing_base_category'] ) );
		update_post_meta( $post_id, 'room_listing_filter', in_array( $_POST['room_listing_filter'], array( 'only_offers', 'no_offers' ) ) ? $_POST['room_listing_filter'] : '' );
		update_post_meta( $post_id, 'room_listing_posts_per_page', palermo_sanitize_intval_or_empty( $_POST['room_listing_posts_per_page'] ) );

		palermo_sanitize_background_metabox_tab( $post_id );
	}

	function palermo_add_page_meta_box( $object, $box ) {
		palermo_prepare_metabox( 'page' );

		?><div class="ci-cf-wrap"><?php
			palermo_metabox_open_tab( esc_html__( 'Options', 'palermo' ) );
				palermo_metabox_guide( esc_html__( 'You can hide the whole content area of the page by checking the box below. You may want to do so when creating a page whose sole purpose is to display a slideshow or a video.', 'palermo' ) );
				palermo_metabox_checkbox( 'palermo_hide_content', 1, esc_html__( 'Hide the content area.', 'palermo' ) );
			palermo_metabox_close_tab();

			palermo_background_metabox_tab( $object, $box );
		?></div><?php
	}

	function palermo_add_cpt_page_room_listing_meta_box( $object, $box ) {
		palermo_prepare_metabox( 'page' );

		?><div class="ci-cf-wrap"><?php
			palermo_metabox_open_tab( '' );
				$category = get_post_meta( $object->ID, 'room_listing_base_category', true );

				palermo_metabox_guide( esc_html__( "Select a base category. Only items from the selected category and sub-categories will be displayed. If you don't select one (i.e. empty) all items will be shown.", 'palermo' ) );
				?>
				<p>
					<label for="room_listing_base_category"><?php esc_html_e( 'Base category:', 'palermo' ); ?></label>
					<?php
						wp_dropdown_categories( array(
							'selected'          => $category,
							'name'              => 'room_listing_base_category',
							'show_option_none'  => ' ',
							'option_none_value' => 0,
							'taxonomy'          => 'palermo_room_category',
							'hierarchical'      => 1,
							'show_count'        => 1,
							'hide_empty'        => 0,
						) );
					?>
				</p>
				<?php

				$options = array();
				for ( $i = 2; $i <= 3; $i ++ ) {
					$options[ $i ] = sprintf( _n( '%s Column', '%s Columns', $i, 'palermo' ), $i );
				}

				$options = array(
					''            => esc_html__( 'All rooms', 'palermo' ),
					'only_offers' => esc_html__( 'Only rooms on offer', 'palermo' ),
					'no_offers'   => esc_html__( 'Only rooms not on offer', 'palermo' ),
				);
				palermo_metabox_dropdown( 'room_listing_filter', $options, esc_html__( 'Room filter:', 'palermo' ) );

				palermo_metabox_guide( sprintf( __( 'Set the number of items per page that you want to display. Setting this to <code>-1</code> will show <strong>all items</strong>, while setting it to <code>0</code> or leaving it empty, will follow the global option set from <em>Settings -> Reading</em>, currently set to <strong>%s items per page</strong>.', 'palermo' ), get_option( 'posts_per_page' ) ) );
				palermo_metabox_input( 'room_listing_posts_per_page', esc_html__( 'Items per page:', 'palermo' ) );
			palermo_metabox_close_tab();
		?></div><?php

		palermo_bind_metabox_to_page_template( 'palermo-tpl-room-listing', 'template-listing-room.php', 'tpl_room_listing' );
	}
