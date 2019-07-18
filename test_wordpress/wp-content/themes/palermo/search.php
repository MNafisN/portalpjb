<?php get_header(); ?>

<main class="main">
	<?php get_template_part( 'part-hero' ); ?>

	<?php
		global $wp_query;

		$found = $wp_query->found_posts;
		$none  = esc_html__( 'No results found. Please broaden your terms and search again.', 'palermo' );
		$one   = esc_html__( 'Just one result found. We either nailed it, or you might want to broaden your terms and search again.', 'palermo' );
		$many  = sprintf( _n( '%d result found.', '%d results found.', $found, 'palermo' ), $found );
	?>

	<article class="item-entry">
		<div class="item-entry-content">
			<p><?php palermo_e_inflect( $found, $none, $one, $many ); ?></p>
			<?php if ( $found < 2 ) {
				get_search_form();
			} ?>
		</div>
	</article>

	<?php while ( have_posts() ) : the_post(); ?>

		<?php get_template_part( 'article', get_post_type() ); ?>

	<?php endwhile; ?>

	<?php palermo_posts_pagination(); ?>
</main>

<?php get_footer(); ?>
