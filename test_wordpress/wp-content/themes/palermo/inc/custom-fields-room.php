<?php
	add_action( 'init', 'palermo_create_room' );

	function palermo_create_room() {
		$labels = array(
			'name'               => esc_html_x( 'Rooms', 'post type general name', 'palermo' ),
			'singular_name'      => esc_html_x( 'Room', 'post type singular name', 'palermo' ),
			'menu_name'          => esc_html_x( 'Rooms', 'admin menu', 'palermo' ),
			'name_admin_bar'     => esc_html_x( 'Room', 'add new on admin bar', 'palermo' ),
			'add_new'            => esc_html__( 'Add New', 'palermo' ),
			'add_new_item'       => esc_html__( 'Add New Room', 'palermo' ),
			'edit_item'          => esc_html__( 'Edit Room', 'palermo' ),
			'new_item'           => esc_html__( 'New Room', 'palermo' ),
			'view_item'          => esc_html__( 'View Room', 'palermo' ),
			'search_items'       => esc_html__( 'Search Rooms', 'palermo' ),
			'not_found'          => esc_html__( 'No Rooms found', 'palermo' ),
			'not_found_in_trash' => esc_html__( 'No Rooms found in the trash', 'palermo' ),
			'parent_item_colon'  => esc_html__( 'Parent Room:', 'palermo' ),
		);

		$args = array(
			'labels'          => $labels,
			'singular_label'  => esc_html_x( 'Room', 'post type singular name', 'palermo' ),
			'public'          => true,
			'show_ui'         => true,
			'capability_type' => 'post',
			'hierarchical'    => false,
			'has_archive'     => false,
			'rewrite'         => array( 'slug' => esc_html_x( 'room', 'post type slug', 'palermo' ) ),
			'menu_position'   => 5,
			'supports'        => array( 'title', 'editor', 'thumbnail' ),
			'menu_icon'       => 'dashicons-admin-home',
		);

		register_post_type( 'palermo_room', $args );

		$labels = array(
			'name'              => esc_html_x( 'Room Categories', 'taxonomy general name', 'palermo' ),
			'singular_name'     => esc_html_x( 'Room Category', 'taxonomy singular name', 'palermo' ),
			'search_items'      => esc_html__( 'Search Room Categories', 'palermo' ),
			'all_items'         => esc_html__( 'All Room Categories', 'palermo' ),
			'parent_item'       => esc_html__( 'Parent Room Category', 'palermo' ),
			'parent_item_colon' => esc_html__( 'Parent Room Category:', 'palermo' ),
			'edit_item'         => esc_html__( 'Edit Room Category', 'palermo' ),
			'update_item'       => esc_html__( 'Update Room Category', 'palermo' ),
			'add_new_item'      => esc_html__( 'Add New Room Category', 'palermo' ),
			'new_item_name'     => esc_html__( 'New Room Category Name', 'palermo' ),
			'menu_name'         => esc_html__( 'Categories', 'palermo' ),
			'view_item'         => esc_html__( 'View Room Category', 'palermo' ),
			'popular_items'     => esc_html__( 'Popular Room Categories', 'palermo' ),
		);
		register_taxonomy( 'palermo_room_category', array( 'palermo_room' ), array(
			'labels'            => $labels,
			'hierarchical'      => true,
			'show_admin_column' => true,
			'rewrite'           => array( 'slug' => esc_html_x( 'room-category', 'taxonomy slug', 'palermo' ) ),
		) );

	}

	add_action( 'load-post.php', 'palermo_room_meta_boxes_setup' );
	add_action( 'load-post-new.php', 'palermo_room_meta_boxes_setup' );
	function palermo_room_meta_boxes_setup() {
		add_action( 'add_meta_boxes', 'palermo_room_add_meta_boxes' );
		add_action( 'save_post', 'palermo_room_save_meta', 10, 2 );
	}

	function palermo_room_add_meta_boxes() {
		add_meta_box( 'palermo-room-box', esc_html__( 'Room Settings', 'palermo' ), 'palermo_room_meta_box', 'palermo_room', 'normal', 'high' );
	}

	function palermo_room_meta_box( $object, $box ) {
		palermo_prepare_metabox( 'palermo_room' );

		?>
		<div class="ci-cf-wrap"><?php
			palermo_metabox_open_tab( esc_html__( 'Appearance', 'palermo' ) );
				palermo_metabox_input( 'subtitle', esc_html__( 'Subtitle:', 'palermo' ) );
				palermo_metabox_checkbox( 'hide_featured', 1, esc_html__( "Don't show the featured image.", 'palermo' ) );
			palermo_metabox_close_tab();

			palermo_metabox_open_tab( esc_html__( 'Amenities', 'palermo' ) );
				palermo_metabox_guide( array(
					wp_kses( __( 'Provide the amenities of the room. Select <em>Add Field</em> as many times as you want to create a list of amenities. You can delete one by clicking on its <em>Remove Me</em> button to it. You may also click and drag the fields to re-arrange them.', 'palermo' ), palermo_get_allowed_tags( 'guide' ) ),
					wp_kses( __( "In order to display the room's amenities, just paste the shortcode <code>[room-amenities]</code> anywhere within the main content.", 'palermo' ), palermo_get_allowed_tags( 'guide' ) ),
				) );
				palermo_metabox_input( 'amenities_title', esc_html__( "Amenities' title", 'palermo' ), array( 'default' => esc_html__( 'Amenities', 'palermo' ) ) );
				?>
				<fieldset class="amenities ci-repeating-fields">
					<div class="inner">
						<?php
							$fields = get_post_meta( $object->ID, 'amenities', true );
							if ( ! empty( $fields ) ) {
								foreach ( $fields as $field ) {
									?>
									<div class="post-field">
										<label><?php esc_html_e( 'Amenity:', 'palermo' ); ?> <input type="text" name="palermo_repeatable_room_amenities_title[]" value="<?php echo esc_attr( $field['title'] ); ?>" class="widefat" /></label>
										<p class="ci-repeating-remove-action"><a href="#" class="button ci-repeating-remove-field"><i class="dashicons dashicons-dismiss"></i><?php esc_html_e( 'Remove me', 'palermo' ); ?></a></p>
									</div>
									<?php
								}
							}
						?>
						<div class="post-field field-prototype" style="display: none;">
							<label><?php esc_html_e( 'Amenity:', 'palermo' ); ?> <input type="text" name="palermo_repeatable_room_amenities_title[]" value="" class="widefat" /></label>
							<p class="ci-repeating-remove-action"><a href="#" class="button ci-repeating-remove-field"><i class="dashicons dashicons-dismiss"></i><?php esc_html_e( 'Remove me', 'palermo' ); ?></a></p>
						</div>
					</div>
					<a href="#" class="ci-repeating-add-field button"><i class="dashicons dashicons-plus-alt"></i><?php esc_html_e( 'Add Field', 'palermo' ); ?></a>
				</fieldset>
				<?php
			palermo_metabox_close_tab();

			palermo_metabox_open_tab( esc_html__( 'Pricing', 'palermo' ) );
				palermo_metabox_guide( wp_kses( __( 'Enter the price text for the room. Include any currency symbols where appropriate (e.g. <code>From &lt;strong>$59&lt;/strong> / night</code>).', 'palermo' ), palermo_get_allowed_tags( 'guide' ) ) );
				palermo_metabox_input( 'price_text', esc_html__( 'Price text:', 'palermo' ) );
				palermo_metabox_checkbox( 'on_offer', 1, esc_html__( 'Room is on offer.', 'palermo' ) );
			palermo_metabox_close_tab();

			palermo_background_metabox_tab( $object, $box );
		?></div><?php
	}

	function palermo_room_save_meta( $post_id, $post ) {

		if ( ! palermo_can_save_meta( 'palermo_room' ) ) {
			return;
		}

		update_post_meta( $post_id, 'hide_featured', palermo_sanitize_checkbox_ref( $_POST['hide_featured'] ) );
		update_post_meta( $post_id, 'subtitle', wp_kses( $_POST['subtitle'], palermo_get_allowed_tags( 'guide' ) ) );

		update_post_meta( $post_id, 'amenities', palermo_sanitize_room_amenities( $_POST ) );
		update_post_meta( $post_id, 'amenities_title', sanitize_text_field( $_POST['amenities_title'] ) );

		update_post_meta( $post_id, 'price_text', wp_kses( $_POST['price_text'], palermo_get_allowed_tags( 'guide' ) ) );
		update_post_meta( $post_id, 'on_offer', palermo_sanitize_checkbox_ref( $_POST['on_offer'] ) );

		palermo_sanitize_background_metabox_tab( $post_id );
	}

	function palermo_sanitize_room_amenities( $POST_array ) {
		if ( empty( $POST_array ) || ! is_array( $POST_array ) ) {
			return false;
		}

		$titles = $POST_array['palermo_repeatable_room_amenities_title'];

		$count = count( $titles );

		$new_fields = array();

		$records_count = 0;
		for ( $i = 0; $i < $count; $i++ ) {
			if ( empty( $titles[ $i ] ) ) {
				continue;
			}

			$new_fields[ $records_count ]['title'] = sanitize_text_field( $titles[ $i ] );
			$records_count++;
		}
		return $new_fields;
	}
