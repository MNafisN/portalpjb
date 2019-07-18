<?php get_header(); ?>

<main class="main">
	<?php while ( have_posts() ) : the_post(); ?>
		<?php
			$subtitle      = get_post_meta( get_the_ID(), 'subtitle', true );
			$hide_featured = get_post_meta( get_the_ID(), 'hide_featured', true );
			$price_text    = get_post_meta( get_the_ID(), 'price_text', true );
		?>
		<article id="entry-<?php the_ID(); ?>" <?php post_class( 'entry' ); ?>>
			<h1 class="entry-title"><?php the_title(); ?></h1>

			<?php if ( ! empty( $subtitle ) ) : ?>
				<p class="entry-subtitle"><?php echo wp_kses( $subtitle, palermo_get_allowed_tags( 'guide' ) ); ?></p>
			<?php endif; ?>

			<?php if ( ! empty( $price_text ) ) : ?>
				<p class="entry-price"><?php echo wp_kses( $price_text, palermo_get_allowed_tags( 'guide' ) ); ?></p>
			<?php endif; ?>

			<?php if ( has_post_thumbnail() && 1 != $hide_featured ) : ?>
				<figure class="entry-thumb">
					<a class="ci-lightbox" href="<?php echo esc_url( palermo_get_image_src( get_post_thumbnail_id(), 'large' ) ); ?>">
						<?php the_post_thumbnail(); ?>
					</a>
				</figure>
			<?php endif; ?>

			<div class="entry-content">
				<?php the_content(); ?>
			</div>
		</article>
	<?php endwhile; ?>
</main>

<?php get_footer(); ?>
