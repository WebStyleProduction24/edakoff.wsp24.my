<?php
/**
 * 'meta_gallery_carousel' Shortcode
 * 
 * @package Meta slider and carousel with lightbox
 * @since 1.0.0
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

function msacwl_gallery_carousel( $atts, $content ) {
	
	extract(shortcode_atts(array(
		'id'				=> '',	
		'slide_to_show' 	=> '2',
		'slide_to_scroll' 	=> '1',
		'autoplay' 			=> 'true',
		'autoplay_speed' 	=> '3000',
		'speed' 			=> '300',
		'arrows' 			=> 'true',
		'dots' 				=> 'true',
		'show_title' 		=> 'true',
		'show_caption' 		=> 'true',	
	), $atts));
	
	// Taking some globals
	global $post;

	// Taking some variables
	$unique 		= wp_igsp_get_unique();
	$gallery_id 	= !empty($id) 					? $id 		: $post->ID;
	$show_caption 	= ($show_caption == 'false') 	? 'false' 	: 'true';
	$show_title 	= ($show_title == 'false') 		? 'false' 	: 'true';

	// Enqueue required script
	wp_enqueue_script( 'wpos-magnific-script' );
	wp_enqueue_script( 'wpos-slick-jquery' );
	wp_enqueue_script( 'wp-igsp-public-js' );

	// carousel configuration
	$slider_conf = compact('slide_to_show', 'slide_to_scroll', 'autoplay', 'autoplay_speed', 'speed', 'arrows','dots');

	// Getting gallery images
	$images = get_post_meta($gallery_id, '_vdw_gallery_id', true);

	ob_start();
	
	if( $images ): ?>
		<div class="msacwl-carousel-wrap msacwl-row-clearfix">
			<div id="msacwl-carousel-<?php echo $unique; ?>" class="msacwl-carousel">
				<div class="msacwl-gallery-carousel">
				<?php foreach( $images as $image ): 						
					$post_mata_data = get_post($image);?>
					<div class="msacwl-carousel-slide">							
					 <?php echo wp_get_attachment_link($image, 'large');
					if($show_title == 'true' || $show_caption == 'true') { ?>
						<div class="msacwl-gallery-caption">
							<?php if($show_title == 'true') { ?>
									<span class="image_title"><?php echo $post_mata_data->post_title; ?></span>
							<?php }
							 if($show_caption == 'true') { ?>
									<span><?php echo $post_mata_data->post_excerpt; ?></span>
							 <?php } ?>
						</div>
					<?php } ?>
					</div>
					<?php endforeach; ?>
				</div>
				<div class="msacwl-carousel-conf"><?php echo json_encode( $slider_conf ); ?></div><!-- end of-slider-conf -->
			</div><!-- end .msacwl-carousel -->
		</div><!-- end .msacwl-carousel-wrap -->
	<?php endif;
	
	$content .= ob_get_clean();
	return $content;
}

// 'meta_gallery_carousel' Shortcode
add_shortcode( 'meta_gallery_carousel', 'msacwl_gallery_carousel' );