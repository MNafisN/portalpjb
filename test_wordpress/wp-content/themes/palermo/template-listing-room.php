<?php
/**
 * Template Name: Rooms Listing
 */
?>

<?php get_header(); ?>

<?php if ( 1 != get_post_meta( get_queried_object_id(), 'palermo_hide_content', true ) ) : ?>
	<?php while ( have_posts() ) : the_post(); ?>

		<main class="main">
			<?php get_template_part( 'part-hero' ); ?>

			<?php if ( get_the_content() ) : ?>
				<div class="entry-content">
					<?php the_content(); ?>
				</div>
			<?php endif; ?>

			<?php
				$cpt_taxonomy   = 'palermo_room_category';
				$base_category  = get_post_meta( get_the_ID(), 'room_listing_base_category', true );
				$show_offers    = get_post_meta( get_the_ID(), 'room_listing_filter', true );
				$posts_per_page = get_post_meta( get_the_ID(), 'room_listing_posts_per_page', true );

				$args = array(
					'post_type' => 'palermo_room',
					'paged'     => palermo_get_page_var(),
				);

				if ( $posts_per_page >= 1 ) {
					$args['posts_per_page'] = $posts_per_page;
				} elseif ( $posts_per_page <= - 1 ) {
					$args['posts_per_page'] = - 1;
				} else {
					$args['posts_per_page'] = get_option( 'posts_per_page' );
				}

				if ( ! empty( $base_category ) and $base_category >= 1 ) {
					$args['tax_query'] = array(
						array(
							'taxonomy'         => $cpt_taxonomy,
							'field'            => 'term_id',
							'terms'            => intval( $base_category ),
							'include_children' => true,
						),
					);
				}

				if ( 'only_offers' === $show_offers ) {
					$args['meta_query'] = array(
						array(
							'key'   => 'on_offer',
							'value' => '1',
						),
					);
				} elseif ( 'no_offers' === $show_offers ) {
					$args['meta_query'] = array(
						array(
							'key'     => 'on_offer',
							'value'   => '1',
							'compare' => '!=',
						),
					);
				}

				$q = new WP_Query( $args );
			?>

			<?php if ( $q->have_posts() ) : ?>
				<?php while ( $q->have_posts() ) : $q->the_post(); ?>

					<?php get_template_part( 'article', get_post_type() ); ?>

				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
			<?php endif; ?>

			<?php palermo_posts_pagination( array(), $q ); ?>
		</main>

	<?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>
