<?php get_header(); ?>

<main class="main">
	<?php get_template_part( 'part-hero' ); ?>

	<article class="item-entry">
		<div class="item-entry-content">
			<p><?php esc_html_e( 'The page you were looking for can not be found! Perhaps try searching?', 'palermo' ); ?></p>
			<?php get_search_form(); ?>
		</div>
	</article>

</main>

<?php get_footer(); ?>
