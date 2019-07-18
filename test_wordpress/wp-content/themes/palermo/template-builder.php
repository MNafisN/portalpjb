<?php
	/*
	 * Template Name: Page Builder
	 */
?>

<?php get_header(); ?>

<?php if ( 1 != get_post_meta( get_queried_object_id(), 'palermo_hide_content', true ) ) : ?>
	<main class="main">
		<?php while ( have_posts() ) : the_post(); ?>
			<article id="entry-<?php the_ID(); ?>" <?php post_class( 'entry' ); ?>>
				<div class="entry-content">
					<?php the_content(); ?>
				</div>
			</article>
		<?php endwhile; ?>
	</main>
<?php endif; ?>

<?php get_footer(); ?>
