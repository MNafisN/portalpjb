<?php
	$price_text = get_post_meta( get_the_ID(), 'price_text', true );
	$on_offer   = get_post_meta( get_the_ID(), 'on_offer', true );
?>

<article id="entry-<?php the_ID(); ?>" <?php post_class( 'item-entry' ); ?>>
	<?php if ( has_post_thumbnail() ) : ?>
		<figure class="item-entry-thumb">
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail( 'palermo_item' ); ?>

				<?php if ( $on_offer ) : ?>
					<span class="item-entry-offer">
						<?php esc_html_e( 'Offer', 'palermo' ); ?>
					</span>
				<?php endif; ?>
			</a>
		</figure>
	<?php endif; ?>

	<div class="item-entry-content">
		<h1 class="item-entry-title">
			<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		</h1>

		<?php if ( ! empty( $price_text ) ) : ?>
			<p class="entry-price"><?php echo wp_kses( $price_text, palermo_get_allowed_tags( 'guide' ) ); ?></p>
		<?php endif; ?>

		<?php the_excerpt(); ?>

		<a href="<?php the_permalink(); ?>" class="btn btn-read-more">
			<?php echo wp_kses( __( 'Read More <i class="fa fa-angle-right"></i>', 'palermo' ), array( 'i' => array( 'class' => true ) ) ); ?>
		</a>
	</div>
</article>
