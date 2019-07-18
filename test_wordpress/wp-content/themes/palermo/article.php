<article id="entry-<?php the_ID(); ?>" <?php post_class( 'item-entry' ); ?>>
	<?php if ( has_post_thumbnail() ) : ?>
		<figure class="item-entry-thumb">
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail( 'palermo_item' ); ?>
			</a>
		</figure>
	<?php endif; ?>

	<div class="item-entry-content">
		<h1 class="item-entry-title">
			<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		</h1>

		<?php if ( in_array( get_post_type(), array( 'post' ), true ) ) : ?>
			<div class="item-entry-meta">
				<time class="entry-time" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time>
				 &bull;
				<?php esc_html_e( 'Posted in:', 'palermo' ); ?> <?php the_category( ', ' ); ?>
			</div>
		<?php endif; ?>

		<?php the_excerpt(); ?>

		<a href="<?php the_permalink(); ?>" class="btn btn-read-more">
			<?php echo wp_kses( __( 'Read More <i class="fa fa-angle-right"></i>', 'palermo' ), array( 'i' => array( 'class' => true ) ) ); ?>
		</a>
	</div>
</article>
