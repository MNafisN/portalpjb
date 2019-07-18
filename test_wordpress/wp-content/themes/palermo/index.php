<?php get_header(); ?>

<main class="main">
	<?php get_template_part( 'part-hero' ); ?>

	<?php while ( have_posts() ) : the_post(); ?>

		<?php get_template_part( 'article', get_post_type() ); ?>

	<?php endwhile; ?>

	<?php palermo_posts_pagination(); ?>
</main>

<?php get_footer(); ?>
