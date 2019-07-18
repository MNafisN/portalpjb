<?php
/**
 * Slider container template
 *
 * This template can be overridden by copying it to yourtheme/maxslider/ directory.
 *
 * @author  The CSSIgniter Team
 * @package MaxSlider/Templates
 * @version 1.1.0
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}


$slider   = $template_vars['slider'];
$template = $template_vars['template'];

//MaxSlider()->enqueue_slider_css( $slider );
palermo_enqueue_background_slider_css( $slider );

$slider_classes = implode( ' ', apply_filters( 'maxslider_slider_classes', array(
	//'maxslider',
	'ci-slider',
	'ci-content-slider',
	'loading',
), $slider ) );

?>

<div
	id="ci-slider-<?php echo esc_attr( $slider['id'] ); ?>"
	class="<?php echo esc_attr( $slider_classes ); ?>"
	<?php echo $slider['data_string']; ?>
>
	<ul class="slides">
		<?php
			foreach ( $slider['slides'] as $slide ) {
				MaxSlider()->get_template_part( 'slide', $template, array(
					'slider'   => $slider,
					'slide'    => $slide,
					'template' => $template,
				) );
			}
		?>
	</ul>
</div>