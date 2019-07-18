<?php get_header(); ?>

<main class="main">
	<?php while ( have_posts() ) : the_post(); ?>
		<article id="entry-<?php the_ID(); ?>" <?php post_class( 'entry' ); ?>>
			<h1 class="entry-title"><?php the_title(); ?></h1>

			<?php if ( get_theme_mod( 'single_date', 1 ) || get_theme_mod( 'single_categories', 1 ) ) : ?>
				<div class="entry-meta">
					<?php if ( get_theme_mod( 'single_date', 1 ) ) : ?>
						<time class="entry-time" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time>
					<?php endif; ?>

					<?php if ( get_theme_mod( 'single_date', 1 ) && get_theme_mod( 'single_categories', 1 ) ) : ?>
						 &bull;
					<?php endif; ?>

					<?php if ( get_theme_mod( 'single_categories', 1 ) ) : ?>
						<?php esc_html_e( 'Posted in:', 'palermo' ); ?> <?php the_category( ', ' ); ?>
					<?php endif; ?>
				</div>
			<?php endif; ?>

			<?php if ( has_post_thumbnail() && get_theme_mod( 'single_featured', 1 ) ) : ?>
				<figure class="entry-thumb">
					<a class="ci-lightbox" href="<?php echo esc_url( palermo_get_image_src( get_post_thumbnail_id(), 'large' ) ); ?>">
						<?php the_post_thumbnail(); ?>
					</a>
				</figure>
			<?php endif; ?>

			<div class="entry-content">
				<?php the_content(); ?>
				<?php wp_link_pages(); ?>
			</div>

			<?php if ( get_theme_mod( 'single_tags', 1 ) && has_tag() ) : ?>
				<div class="entry-tags">
					<?php the_tags( '', '' ); ?>
				</div>
			<?php endif; ?>

			<?php if ( get_theme_mod( 'single_comments', 1 ) ) {
				comments_template();
			} ?>
		</article>
	<?php endwhile; ?>
</main>

<?php get_footer(); ?>
