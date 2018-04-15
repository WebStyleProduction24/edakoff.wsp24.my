<?php
function vgpc_body_default($post_id)
{
	global $vgpc_wp_query;
	
	/* Load Config Values */
	$vgpc_class_sufix 	= get_post_meta($post_id, 'vgpc_class_sufix', true);
	$vgpc_class_sufix	= (empty($vgpc_class_sufix)) ? "" : sanitize_text_field($vgpc_class_sufix);
	
	$vgpc_bg_image 		= get_post_meta($post_id, 'vgpc_bg_image', true);
	$vgpc_bg_image		= (empty($vgpc_bg_image)) ? "" : sanitize_text_field($vgpc_bg_image);
	
	$vgpc_isbg_color 	= get_post_meta($post_id, 'vgpc_isbg_color', true);
	$vgpc_isbg_color	= intval($vgpc_isbg_color);
	
	$vgpc_bg_color 		= get_post_meta($post_id, 'vgpc_bg_color', true);
	$vgpc_bg_color		= (empty($vgpc_bg_color)) ? "#F1F1F1" : sanitize_text_field($vgpc_bg_color);
	
	$vgpc_wmargin 		= get_post_meta($post_id, 'vgpc_wmargin', true);
	$vgpc_wmargin		= (empty($vgpc_wmargin)) ? "0px 0px" : sanitize_text_field($vgpc_wmargin);
	
	$vgpc_wpadding 		= get_post_meta($post_id, 'vgpc_wpadding', true);
	$vgpc_wpadding		= (empty($vgpc_wpadding)) ? "10px 5px" : sanitize_text_field($vgpc_wpadding);
	
	$vgpc_imargin 		= get_post_meta($post_id, 'vgpc_imargin', true);
	$vgpc_imargin		= (empty($vgpc_imargin)) ? "0px 5px" : sanitize_text_field($vgpc_imargin);
	
	$vgpc_ipadding 		= get_post_meta($post_id, 'vgpc_ipadding', true);
	$vgpc_ipadding		= (empty($vgpc_ipadding)) ? "10px 10px" : sanitize_text_field($vgpc_ipadding);
	
	$vgpc_isibg_color 	= get_post_meta($post_id, 'vgpc_isibg_color', true);
	$vgpc_isibg_color	= intval($vgpc_isibg_color);
	
	$vgpc_ibg_color 	= get_post_meta($post_id, 'vgpc_ibg_color', true);
	$vgpc_ibg_color		= (empty($vgpc_ibg_color)) ? "#ffffff" : sanitize_text_field($vgpc_ibg_color);
	
	$vgpc_itext_color 	= get_post_meta($post_id, 'vgpc_itext_color', true);
	$vgpc_itext_color	= (empty($vgpc_itext_color)) ? "#333333" : sanitize_text_field($vgpc_itext_color);
	
	$vgpc_ilink_color 	= get_post_meta($post_id, 'vgpc_ilink_color', true);
	$vgpc_ilink_color	= (empty($vgpc_ilink_color)) ? "#0088cc" : sanitize_text_field($vgpc_ilink_color);
	
	
	$vgpc_row_carousel 	= get_post_meta($post_id, 'vgpc_row_carousel', true);
	$vgpc_row_carousel	= (empty($vgpc_row_carousel)) ? 1 : intval($vgpc_row_carousel);
	
	$vgpc_items_visible = get_post_meta($post_id, 'vgpc_items_visible', true);
	$vgpc_items_visible	= (empty($vgpc_items_visible)) ? 4 : intval($vgpc_items_visible);
	
	$vgpc_desktop_number 	= get_post_meta($post_id, 'vgpc_desktop_number', true);
	$vgpc_desktop_number	= (empty($vgpc_desktop_number)) ? "[1170,4]" : sanitize_text_field($vgpc_desktop_number);
	
	$vgpc_sdesktop_number 	= get_post_meta($post_id, 'vgpc_sdesktop_number', true);
	$vgpc_sdesktop_number	= (empty($vgpc_sdesktop_number)) ? "[980,3]" : sanitize_text_field($vgpc_sdesktop_number);
	
	$vgpc_tablet_number 	= get_post_meta($post_id, 'vgpc_tablet_number', true);
	$vgpc_tablet_number		= (empty($vgpc_tablet_number)) ? "[800,3]" : sanitize_text_field($vgpc_tablet_number);
	
	$vgpc_stablet_number 	= get_post_meta($post_id, 'vgpc_stablet_number', true);
	$vgpc_stablet_number	= (empty($vgpc_stablet_number)) ? "[650,2]" : sanitize_text_field($vgpc_stablet_number);
	
	$vgpc_mobile_number 	= get_post_meta($post_id, 'vgpc_mobile_number', true);
	$vgpc_mobile_number		= (empty($vgpc_mobile_number)) ? "[450,1]" : sanitize_text_field($vgpc_mobile_number);
	
	$vgpc_slide_speed 		= get_post_meta($post_id, 'vgpc_slide_speed', true);
	$vgpc_slide_speed		= (empty($vgpc_slide_speed)) ? "200" : sanitize_text_field($vgpc_slide_speed);
	
	$vgpc_page_speed 		= get_post_meta($post_id, 'vgpc_page_speed', true);
	$vgpc_page_speed		= (empty($vgpc_page_speed)) ? "800" : sanitize_text_field($vgpc_page_speed);
	
	$vgpc_rewind_speed 	= get_post_meta($post_id, 'vgpc_rewind_speed', true);
	$vgpc_rewind_speed	= (empty($vgpc_rewind_speed)) ? "1000" : sanitize_text_field($vgpc_rewind_speed);
	
	$vgpc_enable_autoplay 	= get_post_meta($post_id, 'vgpc_enable_autoplay', true);
	$vgpc_enable_autoplay	= intval($vgpc_enable_autoplay);
	$vgpc_enable_autoplay	= ($vgpc_enable_autoplay) ? 'true' : 'false';
	
	$vgpc_auto_speed 	= get_post_meta($post_id, 'vgpc_auto_speed', true);
	$vgpc_auto_speed	= (empty($vgpc_auto_speed)) ? "5000" : sanitize_text_field($vgpc_auto_speed);
	
	$vgpc_stop_hover 	= get_post_meta($post_id, 'vgpc_stop_hover', true);
	$vgpc_stop_hover	= intval($vgpc_stop_hover);
	$vgpc_stop_hover	= ($vgpc_stop_hover) ? 'true' : 'false';
	
	$vgpc_next_preview 	= get_post_meta($post_id, 'vgpc_next_preview', true);
	$vgpc_next_preview	= intval($vgpc_next_preview);
	$vgpc_next_preview	= ($vgpc_next_preview) ? 'true' : 'false';
	
	$vgpc_scroll_page 	= get_post_meta($post_id, 'vgpc_scroll_page', true);
	$vgpc_scroll_page	= intval($vgpc_scroll_page);
	$vgpc_scroll_page	= ($vgpc_scroll_page) ? 'true' : 'false';
	
	$vgpc_pagination 	= get_post_meta($post_id, 'vgpc_pagination', true);
	$vgpc_pagination	= intval($vgpc_pagination);
	$vgpc_pagination	= ($vgpc_pagination) ? 'true' : 'false';
	
	$vgpc_pagination_number = get_post_meta($post_id, 'vgpc_pagination_number', true);
	$vgpc_pagination_number	= intval($vgpc_pagination_number);
	$vgpc_pagination_number	= ($vgpc_pagination_number) ? 'true' : 'false';
	
	$vgpc_mouse_drag 	= get_post_meta($post_id, 'vgpc_mouse_drag', true);
	$vgpc_mouse_drag	= intval($vgpc_mouse_drag);
	$vgpc_mouse_drag	= ($vgpc_mouse_drag) ? 'true' : 'false';
	
	$vgpc_touch_drag 	= get_post_meta($post_id, 'vgpc_touch_drag', true);
	$vgpc_touch_drag	= intval($vgpc_touch_drag);
	$vgpc_touch_drag	= ($vgpc_touch_drag) ? 'true' : 'false';
	
	$vgpc_left_offset 	= get_post_meta($post_id, 'vgpc_left_offset', true);
	$vgpc_left_offset	= (empty($vgpc_left_offset)) ? "0" : sanitize_text_field($vgpc_left_offset);
	
	
	$vgpc_category 		= get_post_meta($post_id, 'vgpc_category', true);
	$vgpc_category		= (empty($vgpc_category)) ? 'all' : sanitize_text_field($vgpc_category);
	
	$vgpc_carousel_type = get_post_meta($post_id, 'vgpc_carousel_type', true);
	$vgpc_carousel_type	= (empty($vgpc_carousel_type)) ? "latest" : sanitize_text_field($vgpc_carousel_type);
	
	$vgpc_number_posts 	= get_post_meta($post_id, 'vgpc_number_posts', true);
	$vgpc_number_posts	= (empty($vgpc_number_posts)) ? 12 : intval($vgpc_number_posts);
	
	$vgpc_post_title 	= get_post_meta($post_id, 'vgpc_post_title', true);
	$vgpc_post_title	= intval($vgpc_post_title);
	
	$vgpc_post_category = get_post_meta($post_id, 'vgpc_post_category', true);
	$vgpc_post_category	= intval($vgpc_post_category);
	
	$vgpc_post_author 	= get_post_meta($post_id, 'vgpc_post_author', true);
	$vgpc_post_author	= intval($vgpc_post_author);
	
	$vgpc_post_date 	= get_post_meta($post_id, 'vgpc_post_date', true);
	$vgpc_post_date		= intval($vgpc_post_date);
	
	$vgpc_post_image 	= get_post_meta($post_id, 'vgpc_post_image', true);
	$vgpc_post_image	= intval($vgpc_post_image);
	
	$vgpc_image_size 	= get_post_meta($post_id, 'vgpc_image_size', true);
	$vgpc_image_size	= (empty($vgpc_image_size)) ? "medium" : sanitize_text_field($vgpc_image_size);
	
	$vgpc_post_desc 	= get_post_meta($post_id, 'vgpc_post_desc', true);
	$vgpc_post_desc		= intval($vgpc_post_desc);
	
	$vgpc_desc_lenght 	= get_post_meta($post_id, 'vgpc_desc_lenght', true);
	$vgpc_desc_lenght	= (empty($vgpc_desc_lenght)) ? "200" : sanitize_text_field($vgpc_desc_lenght);
	
	$vgpc_readmore 		= get_post_meta($post_id, 'vgpc_readmore', true);
	$vgpc_readmore		= intval($vgpc_readmore);
		
	/* Query Data */
	switch($vgpc_carousel_type) {
		case "older":
			$args = array(
				'post_status' 		=> 'publish',
				'orderby' 			=> 'date',
				'order' 			=> 'ASC',
				'posts_per_page' 	=> $vgpc_number_posts,
			);
			$args = ($vgpc_category == 'all') ? $args : array_merge($args, array("cat" => $vgpc_category));
		break;
		case "featured":
			$args = array(
				'post_status' 	=> 'publish',
				'meta_query' 	=> array(
					array(
						'key' 	=> '_featured',
						'value' => 'yes',
				)),
				'posts_per_page' 	=> $vgpc_number_posts,
			);
			$args = ($vgpc_category == 'all') ? $args : array_merge($args, array("cat" => $vgpc_category));
		break;		
		case "latest":
		default:
			$args = array(
				'post_status' 		=> 'publish',
				'orderby' 			=> 'date',
				'order' 			=> 'DESC',
				'posts_per_page' 	=> $vgpc_number_posts,
			);
			$args = ($vgpc_category == 'all') ? $args : array_merge($args, array("cat" => $vgpc_category));
		break;
	}
	$vgpc_wp_query 		= new WP_Query($args);
	$vgpc_total_items 	= count($vgpc_wp_query->posts);
	$vgpc_total_loop 	= ceil($vgpc_total_items/$vgpc_row_carousel);
	$vgpc_key_loop   	= 0;
	
	/* Start HTML & CSS & Javascript */
	$vgpc_css = $vgpc_html = $vgpc_script = '';
	
	
	/* CSS Block */
	if($vgpc_total_items)
	{
		$vgpc_css = '
		<style type="text/css">
		#vgpc-wrapper'.$post_id.' {
			margin: '.$vgpc_wmargin.';
			padding: '.$vgpc_wpadding.';'.
			(($vgpc_isbg_color) ? 'background-color: '.$vgpc_bg_color.';' : '') .'
		}
		#vgpc-wrapper'.$post_id.' .vgpc-item-i {
			margin: '.$vgpc_imargin.';
			padding: '.$vgpc_ipadding.';			
			color:  '.$vgpc_itext_color.';'.
			(($vgpc_isibg_color) ? 'background-color: '.$vgpc_ibg_color.';' : '') .'
		}
		#vgpc-wrapper'.$post_id.' .vgpc-item-i a {
			color:  '.$vgpc_ilink_color.';
		}		
		</style>';
	}
	
	
	/* HTML Block */
	$vgpc_html .= '<div id="vgpc-wrapper'.$post_id.'" class="vgpc-wrapper theme-default owl-carousel '.$vgpc_class_sufix.'">';
		if($vgpc_total_items)
		{
			for($i = 0; $i < $vgpc_total_loop; $i ++)
			{
				$vgpc_html .= '<div class="vgpc-item">';
				for($m = 0; $m < $vgpc_row_carousel; $m ++)
				{
					$vgpc_post_id = $vgpc_wp_query->posts[$vgpc_key_loop]->ID;
					if(!isset($vgpc_post_id)) continue;
					
					$vgpc_wp_query->the_post($vgpc_post_id); global $post;
					
					$vgpc_key_loop 		= $vgpc_key_loop + 1;					
					$vgpc_thumb 		= wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), $vgpc_image_size);
					$vgpc_thumb_url 	= $vgpc_thumb['0'];
					$vgpc_desc      	= vgpc_substrwords($post->post_content, $vgpc_desc_lenght);
					$vgpc_categories 	= vgpc_get_categories(get_the_ID());
					$vgpc_author		= get_the_author_meta("display_name", $post->post_author);
					$vgpc_post_created	= date("F d, Y", strtotime($post->post_date));
					
					$vgpc_html .= '<div class="vgpc-item-i">';
						
						if($vgpc_post_image)
						{
							$vgpc_html .= '<div class="vgpc-image-block">';
								$vgpc_html .= '<a href="'.get_permalink().'" title="'.get_the_title().'">';
									$vgpc_html .= '<img alt="'.get_the_title().'" src="'.$vgpc_thumb_url.'" />';
								$vgpc_html .= '</a>';								
							$vgpc_html .= '</div>';
						}
						
						if($vgpc_post_title || $vgpc_post_category || $vgpc_post_author || $vgpc_post_date || $vgpc_post_desc || $vgpc_readmore)
						{
							$vgpc_html .= '<div class="vgpc-text-block">';
							
								if($vgpc_post_title)
								{
									$vgpc_html .= '<h3 class="vgpc-post-title">';
										$vgpc_html .= '<a href="'.get_permalink().'" title="'.get_the_title().'">';
											$vgpc_html .= get_the_title();
										$vgpc_html .= '</a>';
									$vgpc_html .= '</h3>';
								}
								
								if($vgpc_post_category)
								{
									$vgpc_html .= '<div class="vgpc-post-category">'.__("Categories: ", "vgpc").$vgpc_categories.'</div>';
								}
								
								if($vgpc_post_desc)
								{
									$vgpc_html .= '<div class="vgpc-post-desc">'.$vgpc_desc.'</div>';
								}
								
								if($vgpc_post_author || $vgpc_post_date)
								{
									$vgpc_html .= '<div class="vgpc-post-author">';
									$vgpc_html .= ($vgpc_post_author) ? __("By", "vgpc").': '.$vgpc_author.'. ' : '';
									$vgpc_html .= ($vgpc_post_date) ? __("Published", "vgpc").': '.$vgpc_post_created : '';
									$vgpc_html .= '</div>';
								}
								
								if($vgpc_readmore)
								{
									$vgpc_html .= '<div class="vgpc-post-readmore"><a href="'.get_permalink().'" title="'.get_the_title().'">'.__("Read more", "vgpc").'</a></div>';
								}
								
							$vgpc_html .= '</div>';
						}
					$vgpc_html .= '</div>';					
				}
				$vgpc_html .= '</div>';				
			}
			$post    = "";
		}
		else
		{
			return "No item found. Please check your config!";
		}
	$vgpc_html .= '</div>';
	
	/* Reset Query */
	wp_reset_postdata();
	
	/* Javascript Block */
	if($vgpc_total_items)
	{
		$vgpc_script = '
		<script type="text/javascript">
		jQuery(document).ready(function($) {
			$("#vgpc-wrapper'.$post_id.'").owlCarousel({
				items: 				'.$vgpc_items_visible.',
				itemsDesktop: 		'.$vgpc_desktop_number.',
				itemsDesktopSmall: 	'.$vgpc_sdesktop_number.',
				itemsTablet: 		'.$vgpc_tablet_number.',
				itemsTabletSmall: 	'.$vgpc_stablet_number.',
				itemsMobile: 		'.$vgpc_mobile_number.',				
				slideSpeed: 		'.$vgpc_slide_speed.',
				paginationSpeed: 	'.$vgpc_page_speed.',
				rewindSpeed: 		'.$vgpc_rewind_speed.',				
				autoPlay: 			'.$vgpc_enable_autoplay.',
				stopOnHover: 		'.$vgpc_stop_hover.',				
				navigation: 		'.$vgpc_next_preview.',
				scrollPerPage: 		'.$vgpc_scroll_page.',
				pagination: 		'.$vgpc_pagination.',
				paginationNumbers: 	'.$vgpc_pagination_number.',
				mouseDrag: 			'.$vgpc_mouse_drag.',
				touchDrag: 			'.$vgpc_touch_drag.',
				navigationText: 	["'.__("Prev", "vgpc").'", "'.__("Next", "vgpc").'"],
				leftOffSet: 		'.$vgpc_left_offset.',
			});
		});
		</script>';
	}
	
	return $vgpc_css . $vgpc_html . $vgpc_script;
}