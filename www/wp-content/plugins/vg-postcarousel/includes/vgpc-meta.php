<?php
/* Post Type Register */
function vgpc_posttype_register()
{
	$labels = array(
		'name' 					=> _x('VG PostCarousel', 'vgpc'),
		'singular_name' 		=> _x('VG PostCarousel', 'vgpc'),
		'add_new' 				=> _x('VG New Carousel', 'vgpc'),
		'add_new_item' 			=> __('VG New Carousel'),
		'edit_item' 			=> __('Edit Carousel'),
		'new_item' 				=> __('VG New Carousel'),
		'view_item' 			=> __('VG View Carousel'),
		'search_items' 			=> __('Search Carousel'),
		'not_found' 			=>  __('Nothing found'),
		'not_found_in_trash' 	=> __('Nothing found in Trash'),
		'parent_item_colon' 	=> ''
	);
 
	$args = array(
		'labels' 				=> $labels,
		'public' 				=> true,
		'publicly_queryable' 	=> true,
		'show_ui' 				=> true,
		'query_var' 			=> true,
		'menu_icon' 			=> null,
		'rewrite' 				=> true,
		'capability_type' 		=> 'post',
		'hierarchical' 			=> false,
		'menu_position' 		=> null,
		'supports' 				=> array('title'),
		'menu_icon' 			=> vgpc_plugin_url . 'includes/images/icon-carousel.png',
	);

	register_post_type('vgpc', $args);
}
add_action('init', 'vgpc_posttype_register');


/* Meta Boxes */
function meta_boxes_vgpc()
{
	$screens = array('vgpc');
	foreach($screens as $screen)
	{
		add_meta_box('vgpc_metabox',__('VG PostCarousel Options', 'vgpc'), 'meta_boxes_vgpc_input', $screen);
	}
}
add_action('add_meta_boxes', 'meta_boxes_vgpc');


/* Meta Boxed Input */
function meta_boxes_vgpc_input($post)
{
	global $post;
	
	wp_nonce_field('meta_boxes_vgpc_input', 'meta_boxes_vgpc_input_nonce');
	
	$vgpc_class_sufix 	= get_post_meta($post->ID, 'vgpc_class_sufix', true);
	$vgpc_class_sufix	= (empty($vgpc_class_sufix)) ? "" : sanitize_text_field($vgpc_class_sufix);
	
	$vgpc_theme 		= get_post_meta($post->ID, 'vgpc_theme', true);
	$vgpc_theme			= (empty($vgpc_theme)) ? "default" : sanitize_text_field($vgpc_theme);
	
	$vgpc_bg_image 		= get_post_meta($post->ID, 'vgpc_bg_image', true);
	$vgpc_bg_image		= (empty($vgpc_bg_image)) ? "" : sanitize_text_field($vgpc_bg_image);
	
	$vgpc_isbg_color 	= get_post_meta($post->ID, 'vgpc_isbg_color', true);
	$vgpc_isbg_color	= intval($vgpc_isbg_color);
	
	$vgpc_bg_color 		= get_post_meta($post->ID, 'vgpc_bg_color', true);
	$vgpc_bg_color		= (empty($vgpc_bg_color)) ? "#F1F1F1" : sanitize_text_field($vgpc_bg_color);
	
	$vgpc_wmargin 		= get_post_meta($post->ID, 'vgpc_wmargin', true);
	$vgpc_wmargin		= (empty($vgpc_wmargin)) ? "0px 0px" : sanitize_text_field($vgpc_wmargin);
	
	$vgpc_wpadding 		= get_post_meta($post->ID, 'vgpc_wpadding', true);
	$vgpc_wpadding		= (empty($vgpc_wpadding)) ? "10px 5px" : sanitize_text_field($vgpc_wpadding);
	
	$vgpc_imargin 		= get_post_meta($post->ID, 'vgpc_imargin', true);
	$vgpc_imargin		= (empty($vgpc_imargin)) ? "0px 5px" : sanitize_text_field($vgpc_imargin);
	
	$vgpc_ipadding 		= get_post_meta($post->ID, 'vgpc_ipadding', true);
	$vgpc_ipadding		= (empty($vgpc_ipadding)) ? "10px 10px" : sanitize_text_field($vgpc_ipadding);
	
	$vgpc_isibg_color 	= get_post_meta($post->ID, 'vgpc_isibg_color', true);
	$vgpc_isibg_color	= intval($vgpc_isibg_color);
	
	$vgpc_ibg_color 	= get_post_meta($post->ID, 'vgpc_ibg_color', true);
	$vgpc_ibg_color		= (empty($vgpc_ibg_color)) ? "#ffffff" : sanitize_text_field($vgpc_ibg_color);
	
	$vgpc_itext_color 	= get_post_meta($post->ID, 'vgpc_itext_color', true);
	$vgpc_itext_color	= (empty($vgpc_itext_color)) ? "#333333" : sanitize_text_field($vgpc_itext_color);
	
	$vgpc_ilink_color 	= get_post_meta($post->ID, 'vgpc_ilink_color', true);
	$vgpc_ilink_color	= (empty($vgpc_ilink_color)) ? "#0088cc" : sanitize_text_field($vgpc_ilink_color);
	
	
	$vgpc_row_carousel 	= get_post_meta($post->ID, 'vgpc_row_carousel', true);
	$vgpc_row_carousel	= (empty($vgpc_row_carousel)) ? 1 : intval($vgpc_row_carousel);
	
	$vgpc_items_visible = get_post_meta($post->ID, 'vgpc_items_visible', true);
	$vgpc_items_visible	= (empty($vgpc_items_visible)) ? 4 : intval($vgpc_items_visible);
	
	$vgpc_desktop_number 	= get_post_meta($post->ID, 'vgpc_desktop_number', true);
	$vgpc_desktop_number	= (empty($vgpc_desktop_number)) ? "[1170,4]" : sanitize_text_field($vgpc_desktop_number);
	
	$vgpc_sdesktop_number 	= get_post_meta($post->ID, 'vgpc_sdesktop_number', true);
	$vgpc_sdesktop_number	= (empty($vgpc_sdesktop_number)) ? "[980,3]" : sanitize_text_field($vgpc_sdesktop_number);
	
	$vgpc_tablet_number 	= get_post_meta($post->ID, 'vgpc_tablet_number', true);
	$vgpc_tablet_number		= (empty($vgpc_tablet_number)) ? "[800,3]" : sanitize_text_field($vgpc_tablet_number);
	
	$vgpc_stablet_number 	= get_post_meta($post->ID, 'vgpc_stablet_number', true);
	$vgpc_stablet_number	= (empty($vgpc_stablet_number)) ? "[650,2]" : sanitize_text_field($vgpc_stablet_number);
	
	$vgpc_mobile_number 	= get_post_meta($post->ID, 'vgpc_mobile_number', true);
	$vgpc_mobile_number		= (empty($vgpc_mobile_number)) ? "[450,1]" : sanitize_text_field($vgpc_mobile_number);
	
	$vgpc_slide_speed 		= get_post_meta($post->ID, 'vgpc_slide_speed', true);
	$vgpc_slide_speed		= (empty($vgpc_slide_speed)) ? "200" : sanitize_text_field($vgpc_slide_speed);
	
	$vgpc_page_speed 		= get_post_meta($post->ID, 'vgpc_page_speed', true);
	$vgpc_page_speed		= (empty($vgpc_page_speed)) ? "800" : sanitize_text_field($vgpc_page_speed);
	
	$vgpc_rewind_speed 		= get_post_meta($post->ID, 'vgpc_rewind_speed', true);
	$vgpc_rewind_speed		= (empty($vgpc_rewind_speed)) ? "1000" : sanitize_text_field($vgpc_rewind_speed);
	
	$vgpc_enable_autoplay 	= get_post_meta($post->ID, 'vgpc_enable_autoplay', true);
	$vgpc_enable_autoplay	= intval($vgpc_enable_autoplay);
	
	$vgpc_auto_speed 		= get_post_meta($post->ID, 'vgpc_auto_speed', true);
	$vgpc_auto_speed		= (empty($vgpc_auto_speed)) ? "5000" : sanitize_text_field($vgpc_auto_speed);
	
	$vgpc_stop_hover 		= get_post_meta($post->ID, 'vgpc_stop_hover', true);
	$vgpc_stop_hover		= intval($vgpc_stop_hover);
	
	$vgpc_next_preview 		= get_post_meta($post->ID, 'vgpc_next_preview', true);
	$vgpc_next_preview		= intval($vgpc_next_preview);
	
	$vgpc_scroll_page 		= get_post_meta($post->ID, 'vgpc_scroll_page', true);
	$vgpc_scroll_page		= intval($vgpc_scroll_page);
	
	$vgpc_pagination 		= get_post_meta($post->ID, 'vgpc_pagination', true);
	$vgpc_pagination		= intval($vgpc_pagination);
	
	$vgpc_pagination_number = get_post_meta($post->ID, 'vgpc_pagination_number', true);
	$vgpc_pagination_number	= intval($vgpc_pagination_number);
	
	$vgpc_mouse_drag 		= get_post_meta($post->ID, 'vgpc_mouse_drag', true);
	$vgpc_mouse_drag		= intval($vgpc_mouse_drag);
	
	$vgpc_touch_drag 		= get_post_meta($post->ID, 'vgpc_touch_drag', true);
	$vgpc_touch_drag		= intval($vgpc_touch_drag);
	
	$vgpc_left_offset		= get_post_meta($post->ID, 'vgpc_left_offset', true);
	$vgpc_left_offset		= (empty($vgpc_left_offset)) ? "0" : sanitize_text_field($vgpc_left_offset);
	
	
	$vgpc_category 			= get_post_meta($post->ID, 'vgpc_category', true);
	$vgpc_category			= (empty($vgpc_category)) ? "all" : sanitize_text_field($vgpc_category);
	$vgpc_category			= explode(",", $vgpc_category);
	
	$vgpc_carousel_type 	= get_post_meta($post->ID, 'vgpc_carousel_type', true);
	$vgpc_carousel_type		= (empty($vgpc_carousel_type)) ? "latest" : sanitize_text_field($vgpc_carousel_type);
	
	$vgpc_number_posts 		= get_post_meta($post->ID, 'vgpc_number_posts', true);
	$vgpc_number_posts		= (empty($vgpc_number_posts)) ? 12 : intval($vgpc_number_posts);
	
	$vgpc_post_title 		= get_post_meta($post->ID, 'vgpc_post_title', true);
	$vgpc_post_title		= intval($vgpc_post_title);
		
	$vgpc_post_category 	= get_post_meta($post->ID, 'vgpc_post_category', true);
	$vgpc_post_category		= intval($vgpc_post_category);
	
	$vgpc_post_author 		= get_post_meta($post->ID, 'vgpc_post_author', true);
	$vgpc_post_author		= intval($vgpc_post_author);
	
	$vgpc_post_date 		= get_post_meta($post->ID, 'vgpc_post_date', true);
	$vgpc_post_date			= intval($vgpc_post_date);
	
	$vgpc_post_image 		= get_post_meta($post->ID, 'vgpc_post_image', true);
	$vgpc_post_image		= intval($vgpc_post_image);
	
	$vgpc_image_size 		= get_post_meta($post->ID, 'vgpc_image_size', true);
	$vgpc_image_size		= (empty($vgpc_image_size)) ? "medium" : sanitize_text_field($vgpc_image_size);
	
	$vgpc_post_desc 		= get_post_meta($post->ID, 'vgpc_post_desc', true);
	$vgpc_post_desc			= intval($vgpc_post_desc);
	
	$vgpc_desc_lenght 		= get_post_meta($post->ID, 'vgpc_desc_lenght', true);
	$vgpc_desc_lenght		= (empty($vgpc_desc_lenght)) ? "200" : sanitize_text_field($vgpc_desc_lenght);
	
	$vgpc_readmore 			= get_post_meta($post->ID, 'vgpc_readmore', true);
	$vgpc_readmore			= intval($vgpc_readmore);
	
	$vgpc_bbg_color 		= get_post_meta($post->ID, 'vgpc_bbg_color', true);
	$vgpc_bbg_color			= (empty($vgpc_bbg_color)) ? "#23b2dd" : sanitize_text_field($vgpc_bbg_color);
	
	$vgpc_btext_color 		= get_post_meta($post->ID, 'vgpc_btext_color', true);
	$vgpc_btext_color		= (empty($vgpc_btext_color)) ? "#FFFFFF" : sanitize_text_field($vgpc_btext_color);
		
	$vgpc_hotbg_color 		= get_post_meta($post->ID, 'vgpc_hotbg_color', true);
	$vgpc_hotbg_color		= (empty($vgpc_hotbg_color)) ? "##FF0000" : sanitize_text_field($vgpc_hotbg_color);
	
	$vgpc_hottext_color 	= get_post_meta($post->ID, 'vgpc_hottext_color', true);
	$vgpc_hottext_color		= (empty($vgpc_hottext_color)) ? "#FFFFFF" : sanitize_text_field($vgpc_hottext_color);
?>
    <div class="vn-settings">
		
		<!-- Shortcode Block -->
		<div class="option-box shortcode-block">
			<p class="option-title"><?php esc_html_e("Shortcode", "vgpc"); ?></p>
			<p class="option-info"><?php esc_html_e("Copy this shortcode and paste on page or post where you want to display carousel.", "vgpc"); ?><br /><?php esc_html_e("Use PHP code to your themes file to display carousel.", "vgpc"); ?></p>
			<textarea cols="50" rows="1" onClick="this.select();" >[vgpc <?php echo 'id="'.$post->ID.'"';?>]</textarea>
			<br /><br />
			<?php esc_html_e("PHP Code", "vgpc"); ?>:<br />
			<textarea cols="50" rows="1" onClick="this.select();" ><?php echo '<?php echo do_shortcode("[vgpc id='; echo "'".$post->ID."']"; echo '"); ?>'; ?></textarea>  
		</div>
		
		
		<!-- Notice Message -->
		<div class="option-box notice-message" style="margin-top: 20px; color: red; font-size: 16px;">
			You're using <b>Trial Version</b>. You can buy <b>Full Version</b> here: <a target="_blank" href="http://codecanyon.net/item/vg-postcarousel-post-carousel-for-wordpress/13558067?ref=VinaWebSolutions">http://codecanyon.net/item/x/13558067</a>.
			</a>
		</div>
		
		
		<!-- Tab Header Block -->
        <ul class="tab-nav"> 
            <li nav="1" class="nav1 active"><?php esc_html_e("Global Setting", "vgpc"); ?></li>
            <li nav="2" class="nav2"><?php esc_html_e("Carousel Setting", "vgpc"); ?></li>
            <li nav="3" class="nav3"><?php esc_html_e("Posts Setting", "vgpc"); ?></li>
        </ul>
        
		<!-- Tab Content Block -->
		<ul class="box">
            <li style="display: block;" class="box1 tab-box active">
				<div class="control-group">
					<div class="control-label"><label><?php _e('Widget Class Suffix', 'vgpc'); ?>:</label></div>
					<div class="controls"><input type="text" size="20" name="vgpc_class_sufix" value="<?php echo esc_attr($vgpc_class_sufix); ?>" /></div>
				</div>
				
				<div class="control-group">
					<div class="control-label"><label><?php _e('Carousel Theme', 'vgpc'); ?>:</label></div>
					<div class="controls">
						<select name="vgpc_theme">							
							<?php
								$vgpc_all_themes = vgpc_get_all_themes();
								foreach($vgpc_all_themes as $key => $theme) {
									echo '<option value="'.$theme.'"'.(($vgpc_theme == $theme) ? ' selected="selected"' : '').'>'.$theme.'</option>';
								}
							?>
						</select>
					</div>
				</div>
								
				<div class="control-group hidden">
					<div class="control-label"><label><?php _e('Background Image', 'vgpc'); ?>:</label></div>
					<div class="controls">
						<select name="vgpc_bg_image">
							<option><?php _e('No Background', 'vgpc'); ?></option>
						</select>
					</div>
				</div>
				
				<div class="control-group">
					<div class="control-label"><label><?php _e('Use Background Color', 'vgpc'); ?>:</label></div>
					<div class="controls">
						<fieldset class="radio btn-group btn-group-yesno">
							<input type="radio" value="0" name="vgpc_isbg_color"<?php echo !$vgpc_isbg_color ? ' checked="checked"' : ""; ?>>
							<label><?php _e('No', 'vgpc'); ?></label>
							<input type="radio" value="1" name="vgpc_isbg_color"<?php echo $vgpc_isbg_color ? ' checked="checked"' : ""; ?>>
							<label><?php _e('Yes', 'vgpc'); ?></label>
						</fieldset>
					</div>
				</div>
				
				<div class="control-group">
					<div class="control-label"><label><?php _e('Background Color', 'vgpc'); ?>:</label></div>
					<div class="controls">
						<input type="text" name="vgpc_bg_color" id="vgpc_bg_color" value="<?php echo esc_attr($vgpc_bg_color); ?>" />
					</div>
				</div>
				
				<div class="control-group">
					<div class="control-label"><label><?php _e('Widget Margin', 'vgpc'); ?>:</label></div>
					<div class="controls"><input type="text" size="20" name="vgpc_wmargin" value="<?php echo esc_attr($vgpc_wmargin); ?>" /></div>
				</div>
				
				<div class="control-group">
					<div class="control-label"><label><?php _e('Widget Padding', 'vgpc'); ?>:</label></div>
					<div class="controls"><input type="text" size="20" name="vgpc_wpadding" value="<?php echo esc_attr($vgpc_wpadding); ?>" /></div>
				</div>
				
				<hr>
				<div class="control-group">
					<div class="control-label"><label><?php _e('Item Margin', 'vgpc'); ?>:</label></div>
					<div class="controls"><input type="text" size="20" name="vgpc_imargin" value="<?php echo esc_attr($vgpc_imargin); ?>" /></div>
				</div>
				
				<div class="control-group">
					<div class="control-label"><label><?php _e('Item Padding', 'vgpc'); ?>:</label></div>
					<div class="controls"><input type="text" size="20" name="vgpc_ipadding" value="<?php echo esc_attr($vgpc_ipadding); ?>" /></div>
				</div>
				
				<div class="control-group">
					<div class="control-label"><label><?php _e('Use Item Background Color', 'vgpc'); ?>:</label></div>
					<div class="controls">
						<fieldset class="radio btn-group btn-group-yesno">							
							<input type="radio" value="0" name="vgpc_isibg_color"<?php echo !$vgpc_isibg_color ? ' checked="checked"' : ""; ?>>
							<label><?php _e('No', 'vgpc'); ?></label>
							<input type="radio" value="1" name="vgpc_isibg_color"<?php echo $vgpc_isibg_color ? ' checked="checked"' : ""; ?>>
							<label><?php _e('Yes', 'vgpc'); ?></label>
						</fieldset>
					</div>
				</div>
				
				<div class="control-group">
					<div class="control-label"><label><?php _e('Item Background Color', 'vgpc'); ?>:</label></div>
					<div class="controls">
						<input type="text" name="vgpc_ibg_color" id="vgpc_ibg_color" value="<?php echo esc_attr($vgpc_ibg_color); ?>" />
					</div>
				</div>
				
				<div class="control-group">
					<div class="control-label"><label><?php _e('Item Text Color', 'vgpc'); ?>:</label></div>
					<div class="controls">
						<input type="text" name="vgpc_itext_color" id="vgpc_itext_color" value="<?php echo esc_attr($vgpc_itext_color); ?>" />
					</div>
				</div>
				
				<div class="control-group">
					<div class="control-label"><label><?php _e('Item Link Color', 'vgpc'); ?>:</label></div>
					<div class="controls">
						<input type="text" name="vgpc_ilink_color" id="vgpc_ilink_color" value="<?php echo esc_attr($vgpc_ilink_color); ?>" />
					</div>
				</div>
            </li>
			
            <li style="display: none;" class="box2 tab-box ">
				<div class="control-group">
					<div class="control-label"><label><?php _e('Row of Carousel', 'vgpc'); ?>:</label></div>
					<div class="controls"><input type="text" size="20" name="vgpc_row_carousel" value="<?php echo esc_attr($vgpc_row_carousel); ?>" /></div>
				</div>
				
				<div class="control-group">
					<div class="control-label"><label><?php _e('Items Visible', 'vgpc'); ?>:</label></div>
					<div class="controls"><input type="text" size="20" name="vgpc_items_visible" value="<?php echo esc_attr($vgpc_items_visible); ?>" /></div>
				</div>
				
				<div class="control-group">
					<div class="control-label"><label><?php _e('Desktop - Column Number', 'vgpc'); ?>:</label></div>
					<div class="controls"><input type="text" size="20" name="vgpc_desktop_number" value="<?php echo esc_attr($vgpc_desktop_number); ?>" /></div>
				</div>
				
				<div class="control-group">
					<div class="control-label"><label><?php _e('S Desktop - Column Number', 'vgpc'); ?>:</label></div>
					<div class="controls"><input type="text" size="20" name="vgpc_sdesktop_number" value="<?php echo esc_attr($vgpc_sdesktop_number); ?>" /></div>
				</div>
				
				<div class="control-group">
					<div class="control-label"><label><?php _e('Tablet - Column Number', 'vgpc'); ?>:</label></div>
					<div class="controls"><input type="text" size="20" name="vgpc_tablet_number" value="<?php echo esc_attr($vgpc_tablet_number); ?>" /></div>
				</div>
				
				<div class="control-group">
					<div class="control-label"><label><?php _e('S Tablet - Column Number', 'vgpc'); ?>:</label></div>
					<div class="controls"><input type="text" size="20" name="vgpc_stablet_number" value="<?php echo esc_attr($vgpc_stablet_number); ?>" /></div>
				</div>
				
				<div class="control-group">
					<div class="control-label"><label><?php _e('Mobile - Column Number', 'vgpc'); ?>:</label></div>
					<div class="controls"><input type="text" size="20" name="vgpc_mobile_number" value="<?php echo esc_attr($vgpc_mobile_number); ?>" /></div>
				</div>
				
				<hr>
				<div class="control-group">
					<div class="control-label"><label><?php _e('Slide Speed', 'vgpc'); ?>:</label></div>
					<div class="controls"><input type="text" size="20" name="vgpc_slide_speed" value="<?php echo esc_attr($vgpc_slide_speed); ?>" /></div>
				</div>
				
				<div class="control-group">
					<div class="control-label"><label><?php _e('Pagination Speed', 'vgpc'); ?>:</label></div>
					<div class="controls"><input type="text" size="20" name="vgpc_page_speed" value="<?php echo esc_attr($vgpc_page_speed); ?>" /></div>
				</div>
				
				<div class="control-group">
					<div class="control-label"><label><?php _e('Rewind Speed', 'vgpc'); ?>:</label></div>
					<div class="controls"><input type="text" size="20" name="vgpc_rewind_speed" value="<?php echo esc_attr($vgpc_rewind_speed); ?>" /></div>
				</div>
				
				<div class="control-group">
					<div class="control-label"><label><?php _e('AutoPlay', 'vgpc'); ?>:</label></div>
					<div class="controls">
						<fieldset class="radio btn-group btn-group-yesno">							
							<input type="radio" value="0" name="vgpc_enable_autoplay"<?php echo !$vgpc_enable_autoplay ? ' checked="checked"' : ""; ?>>
							<label><?php _e('No', 'vgpc'); ?></label>
							<input type="radio" value="1" name="vgpc_enable_autoplay"<?php echo $vgpc_enable_autoplay ? ' checked="checked"' : ""; ?>>
							<label><?php _e('Yes', 'vgpc'); ?></label>
						</fieldset>
					</div>
				</div>
				
				<div class="control-group hidden">
					<div class="control-label"><label><?php _e('AutoPlay Speed', 'vgpc'); ?>:</label></div>
					<div class="controls"><input type="text" size="20" name="vgpc_auto_speed" value="<?php echo esc_attr($vgpc_auto_speed); ?>" /></div>
				</div>
				
				<div class="control-group">
					<div class="control-label"><label><?php _e('Stop On Hover', 'vgpc'); ?>:</label></div>
					<div class="controls">
						<fieldset class="radio btn-group btn-group-yesno">
							<input type="radio" value="0" name="vgpc_stop_hover"<?php echo !$vgpc_stop_hover ? ' checked="checked"' : ""; ?>>
							<label><?php _e('No', 'vgpc'); ?></label>
							<input type="radio" value="1" name="vgpc_stop_hover"<?php echo $vgpc_stop_hover ? ' checked="checked"' : ""; ?>>
							<label><?php _e('Yes', 'vgpc'); ?></label>
						</fieldset>
					</div>
				</div>
				
				<div class="control-group">
					<div class="control-label"><label><?php _e('Next & Preview Buttons', 'vgpc'); ?>:</label></div>
					<div class="controls">
						<fieldset class="radio btn-group btn-group-yesno">
							<input type="radio" value="0" name="vgpc_next_preview"<?php echo !$vgpc_next_preview ? ' checked="checked"' : ""; ?>>
							<label><?php _e('Hide', 'vgpc'); ?></label>
							<input type="radio" value="1" name="vgpc_next_preview"<?php echo $vgpc_next_preview ? ' checked="checked"' : ""; ?>>
							<label><?php _e('Show', 'vgpc'); ?></label>
						</fieldset>
					</div>
				</div>
				
				<div class="control-group">
					<div class="control-label"><label><?php _e('Scroll Per Page', 'vgpc'); ?>:</label></div>
					<div class="controls">
						<fieldset class="radio btn-group btn-group-yesno">
							<input type="radio" value="0" name="vgpc_scroll_page"<?php echo !$vgpc_scroll_page ? ' checked="checked"' : ""; ?>>
							<label><?php _e('No', 'vgpc'); ?></label>
							<input type="radio" value="1" name="vgpc_scroll_page"<?php echo $vgpc_scroll_page ? ' checked="checked"' : ""; ?>>
							<label><?php _e('Yes', 'vgpc'); ?></label>
						</fieldset>
					</div>
				</div>
				
				<div class="control-group">
					<div class="control-label"><label><?php _e('Pagination', 'vgpc'); ?>:</label></div>
					<div class="controls">
						<fieldset class="radio btn-group btn-group-yesno">
							<input type="radio" value="0" name="vgpc_pagination"<?php echo !$vgpc_pagination ? ' checked="checked"' : ""; ?>>
							<label><?php _e('Hide', 'vgpc'); ?></label>
							<input type="radio" value="1" name="vgpc_pagination"<?php echo $vgpc_pagination ? ' checked="checked"' : ""; ?>>
							<label><?php _e('Show', 'vgpc'); ?></label>
						</fieldset>
					</div>
				</div>
				
				<div class="control-group">
					<div class="control-label"><label><?php _e('Pagination Numbers', 'vgpc'); ?>:</label></div>
					<div class="controls">
						<fieldset class="radio btn-group btn-group-yesno">
							<input type="radio" value="0" name="vgpc_pagination_number"<?php echo !$vgpc_pagination_number ? ' checked="checked"' : ""; ?>>
							<label><?php _e('No', 'vgpc'); ?></label>
							<input type="radio" value="1" name="vgpc_pagination_number"<?php echo $vgpc_pagination_number ? ' checked="checked"' : ""; ?>>
							<label><?php _e('Yes', 'vgpc'); ?></label>
						</fieldset>
					</div>
				</div>
				
				<div class="control-group">
					<div class="control-label"><label><?php _e('Mouse Drag', 'vgpc'); ?>:</label></div>
					<div class="controls">
						<fieldset class="radio btn-group btn-group-yesno">
							<input type="radio" value="0" name="vgpc_mouse_drag"<?php echo !$vgpc_mouse_drag ? ' checked="checked"' : ""; ?>>
							<label><?php _e('No', 'vgpc'); ?></label>
							<input type="radio" value="1" name="vgpc_mouse_drag"<?php echo $vgpc_mouse_drag ? ' checked="checked"' : ""; ?>>
							<label><?php _e('Yes', 'vgpc'); ?></label>
						</fieldset>
					</div>
				</div>
				
				<div class="control-group">
					<div class="control-label"><label><?php _e('Touch Drag', 'vgpc'); ?>:</label></div>
					<div class="controls">
						<fieldset class="radio btn-group btn-group-yesno">
							<input type="radio" value="0" name="vgpc_touch_drag"<?php echo !$vgpc_touch_drag ? ' checked="checked"' : ""; ?>>
							<label><?php _e('No', 'vgpc'); ?></label>
							<input type="radio" value="1" name="vgpc_touch_drag"<?php echo $vgpc_touch_drag ? ' checked="checked"' : ""; ?>>
							<label><?php _e('Yes', 'vgpc'); ?></label>
						</fieldset>
					</div>
				</div>
				
				<div class="control-group">
					<div class="control-label"><label><?php _e('Left Offset', 'vgpc'); ?>:</label></div>
					<div class="controls"><input type="text" size="20" name="vgpc_left_offset" value="<?php echo esc_attr($vgpc_left_offset); ?>" /></div>
				</div>
            </li>
			
            <li style="display: none;" class="box3 tab-box ">
				<div class="control-group">
					<div class="control-label"><label><?php _e('Category to Filter', 'vgpc'); ?>:</label></div>
					<div class="controls">
						<select class="dropdown" name="vgpc_category[]" multiple="true">						
							<option value="0"<?php echo (in_array('all', $vgpc_category)) ? ' selected="selected"' : ""; ?>><?php _e('All Categories', 'vgpc'); ?></option>
							<?php echo vgpc_build_list_categories(0, $vgpc_category); ?>							
						</select>
					</div>
				</div>
				
				<div class="control-group">
					<div class="control-label"><label><?php _e('Carousel Type', 'vgpc'); ?>:</label></div>
					<div class="controls">
						<select class="dropdown" name="vgpc_carousel_type">
							<option value="latest"<?php echo ($vgpc_carousel_type == 'latest') ? ' selected="selected"' : ""; ?>><?php _e('Latest Published', 'vgpc'); ?></option>
							<option value="older"<?php echo ($vgpc_carousel_type == 'older') ? ' selected="selected"' : ""; ?>><?php _e('Older Published', 'vgpc'); ?></option>
							<option value="featured"<?php echo ($vgpc_carousel_type == 'featured') ? ' selected="selected"' : ""; ?>><?php _e('Featured Posts', 'vgpc'); ?></option>							
						</select>
					</div>
				</div>
				
				<div class="control-group">
					<div class="control-label"><label><?php _e('Number of Posts', 'vgpc'); ?>:</label></div>
					<div class="controls"><input type="text" size="20" name="vgpc_number_posts" value="<?php echo esc_attr($vgpc_number_posts); ?>" /></div>
				</div>
				
				<hr>
				<div class="control-group">
					<div class="control-label"><label><?php _e('Post Title', 'vgpc'); ?>:</label></div>
					<div class="controls">
						<fieldset class="radio btn-group btn-group-yesno">
							<input type="radio" value="0" name="vgpc_post_title"<?php echo !$vgpc_post_title ? ' checked="checked"' : ""; ?>>
							<label><?php _e('Hide', 'vgpc'); ?></label>
							<input type="radio" value="1" name="vgpc_post_title"<?php echo $vgpc_post_title ? ' checked="checked"' : ""; ?>>
							<label><?php _e('Show', 'vgpc'); ?></label>
						</fieldset>
					</div>
				</div>
				
				<div class="control-group">
					<div class="control-label"><label><?php _e('Post Category', 'vgpc'); ?>:</label></div>
					<div class="controls">
						<fieldset class="radio btn-group btn-group-yesno">
							<input type="radio" value="0" name="vgpc_post_category"<?php echo !$vgpc_post_category ? ' checked="checked"' : ""; ?>>
							<label><?php _e('Hide', 'vgpc'); ?></label>
							<input type="radio" value="1" name="vgpc_post_category"<?php echo $vgpc_post_category ? ' checked="checked"' : ""; ?>>
							<label><?php _e('Show', 'vgpc'); ?></label>
						</fieldset>
					</div>
				</div>
				
				<div class="control-group">
					<div class="control-label"><label><?php _e('Post Author', 'vgpc'); ?>:</label></div>
					<div class="controls">
						<fieldset class="radio btn-group btn-group-yesno">
							<input type="radio" value="0" name="vgpc_post_author"<?php echo !$vgpc_post_author ? ' checked="checked"' : ""; ?>>
							<label><?php _e('Hide', 'vgpc'); ?></label>
							<input type="radio" value="1" name="vgpc_post_author"<?php echo $vgpc_post_author ? ' checked="checked"' : ""; ?>>
							<label><?php _e('Show', 'vgpc'); ?></label>
						</fieldset>
					</div>
				</div>
				
				<div class="control-group">
					<div class="control-label"><label><?php _e('Post Created Date', 'vgpc'); ?>:</label></div>
					<div class="controls">
						<fieldset class="radio btn-group btn-group-yesno">
							<input type="radio" value="0" name="vgpc_post_date"<?php echo !$vgpc_post_date ? ' checked="checked"' : ""; ?>>
							<label><?php _e('Hide', 'vgpc'); ?></label>
							<input type="radio" value="1" name="vgpc_post_date"<?php echo $vgpc_post_date ? ' checked="checked"' : ""; ?>>
							<label><?php _e('Show', 'vgpc'); ?></label>
						</fieldset>
					</div>
				</div>
				
				<div class="control-group">
					<div class="control-label"><label><?php _e('Post Image', 'vgpc'); ?>:</label></div>
					<div class="controls">
						<fieldset class="radio btn-group btn-group-yesno">
							<input type="radio" value="0" name="vgpc_post_image"<?php echo !$vgpc_post_image ? ' checked="checked"' : ""; ?>>
							<label><?php _e('Hide', 'vgpc'); ?></label>
							<input type="radio" value="1" name="vgpc_post_image"<?php echo $vgpc_post_image ? ' checked="checked"' : ""; ?>>
							<label><?php _e('Show', 'vgpc'); ?></label>
						</fieldset>
					</div>
				</div>
				
				<div class="control-group">
					<div class="control-label"><label><?php _e('Post Image Size', 'vgpc'); ?>:</label></div>
					<div class="controls">
						<select name="vgpc_image_size">
							<option value="thumbnail"<?php echo ($vgpc_image_size == 'thumbnail') ? ' selected="selected"' : ""; ?>><?php _e('Thumbnail', 'vgpc'); ?></option>
							<option value="medium"<?php echo ($vgpc_image_size == 'medium') ? ' selected="selected"' : ""; ?>><?php _e('Medium', 'vgpc'); ?></option>
							<option value="large"<?php echo ($vgpc_image_size == 'large') ? ' selected="selected"' : ""; ?>><?php _e('Large', 'vgpc'); ?></option>
							<option value="full"<?php echo ($vgpc_image_size == 'full') ? ' selected="selected"' : ""; ?>><?php _e('Full Size', 'vgpc'); ?></option>
						</select>
					</div>
				</div>
				
				<div class="control-group">
					<div class="control-label"><label><?php _e('Post Description', 'vgpc'); ?>:</label></div>
					<div class="controls">
						<fieldset class="radio btn-group btn-group-yesno">
							<input type="radio" value="0" name="vgpc_post_desc"<?php echo !$vgpc_post_desc ? ' checked="checked"' : ""; ?>>
							<label><?php _e('Hide', 'vgpc'); ?></label>
							<input type="radio" value="1" name="vgpc_post_desc"<?php echo $vgpc_post_desc ? ' checked="checked"' : ""; ?>>
							<label><?php _e('Show', 'vgpc'); ?></label>
						</fieldset>
					</div>
				</div>
				
				<div class="control-group">
					<div class="control-label"><label><?php _e('Description Lenght', 'vgpc'); ?>:</label></div>
					<div class="controls"><input type="text" size="20" name="vgpc_desc_lenght" value="<?php echo esc_attr($vgpc_desc_lenght); ?>" /></div>
				</div>
				
				<div class="control-group">
					<div class="control-label"><label><?php _e('Read More Button', 'vgpc'); ?>:</label></div>
					<div class="controls">
						<fieldset class="radio btn-group btn-group-yesno">
							<input type="radio" value="0" name="vgpc_readmore"<?php echo !$vgpc_readmore ? ' checked="checked"' : ""; ?>>
							<label><?php _e('Hide', 'vgpc'); ?></label>
							<input type="radio" value="1" name="vgpc_readmore"<?php echo $vgpc_readmore ? ' checked="checked"' : ""; ?>>
							<label><?php _e('Show', 'vgpc'); ?></label>
						</fieldset>
					</div>
				</div>
				
				<div class="control-group hidden">
					<div class="control-label"><label><?php _e('Button Backgound Color', 'vgpc'); ?>:</label></div>
					<div class="controls">
						<input type="text" name="vgpc_bbg_color" id="vgpc_bbg_color" value="<?php echo esc_attr($vgpc_bbg_color); ?>" />
					</div>
				</div>
				
				<div class="control-group hidden">
					<div class="control-label"><label><?php _e('Button Text Color', 'vgpc'); ?>:</label></div>
					<div class="controls">
						<input type="text" name="vgpc_btext_color" id="vgpc_btext_color" value="<?php echo esc_attr($vgpc_btext_color); ?>" />
					</div>
				</div>
				
				<div class="control-group hidden">
					<div class="control-label"><label><?php _e('Featured - Backgound Color', 'vgpc'); ?>:</label></div>
					<div class="controls">
						<input type="text" name="vgpc_hotbg_color" id="vgpc_hotbg_color" value="<?php echo esc_attr($vgpc_hotbg_color); ?>" />
					</div>
				</div>
				
				<div class="control-group hidden">
					<div class="control-label"><label><?php _e('Featured - Text Color', 'vgpc'); ?>:</label></div>
					<div class="controls">
						<input type="text" name="vgpc_hottext_color" id="vgpc_hottext_color" value="<?php echo esc_attr($vgpc_hottext_color); ?>" />
					</div>
				</div>
            </li>
        </ul>
    </div>
<?php
}

/* Meta Boxed Save */
function meta_boxes_vgpc_save($post_id)
{

	// Check if our nonce is set.
	if(! isset($_POST['meta_boxes_vgpc_input_nonce']))
		return $post_id;

	$nonce = $_POST['meta_boxes_vgpc_input_nonce'];

	// Verify that the nonce is valid.
	if(! wp_verify_nonce($nonce, 'meta_boxes_vgpc_input'))
		return $post_id;

	// If this is an autosave, our form has not been submitted, so we don't want to do anything.
	if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) 
		return $post_id;

	
	/* OK, its safe for us to save the data now. */
	$vgpc_class_sufix 	= $_POST['vgpc_class_sufix'];
	$vgpc_class_sufix	= (empty($vgpc_class_sufix)) ? "" : sanitize_text_field($vgpc_class_sufix);
	update_post_meta($post_id, 'vgpc_class_sufix', $vgpc_class_sufix);
	
	$vgpc_theme 		= $_POST['vgpc_theme'];
	$vgpc_theme			= (empty($vgpc_theme)) ? "all" : sanitize_text_field($vgpc_theme);
	update_post_meta($post_id, 'vgpc_theme', $vgpc_theme);
	
	$vgpc_bg_image 		= $_POST['vgpc_bg_image'];
	$vgpc_bg_image		= (empty($vgpc_bg_image)) ? "" : sanitize_text_field($vgpc_bg_image);
	update_post_meta($post_id, 'vgpc_bg_image', $vgpc_bg_image);
	
	$vgpc_isbg_color 	= $_POST['vgpc_isbg_color'];
	$vgpc_isbg_color	= intval($vgpc_isbg_color);
	update_post_meta($post_id, 'vgpc_isbg_color', $vgpc_isbg_color);
	
	$vgpc_bg_color 		= $_POST['vgpc_bg_color'];
	$vgpc_bg_color		= (empty($vgpc_bg_color)) ? "#F1F1F1" : sanitize_text_field($vgpc_bg_color);
	update_post_meta($post_id, 'vgpc_bg_color', $vgpc_bg_color);
	
	$vgpc_wmargin 		= $_POST['vgpc_wmargin'];
	$vgpc_wmargin		= (empty($vgpc_wmargin)) ? "0px 0px" : sanitize_text_field($vgpc_wmargin);
	update_post_meta($post_id, 'vgpc_wmargin', $vgpc_wmargin);
	
	$vgpc_wpadding 		= $_POST['vgpc_wpadding'];
	$vgpc_wpadding		= (empty($vgpc_wpadding)) ? "10px 5px" : sanitize_text_field($vgpc_wpadding);
	update_post_meta($post_id, 'vgpc_wpadding', $vgpc_wpadding);
	
	$vgpc_imargin 		= $_POST['vgpc_imargin'];
	$vgpc_imargin		= (empty($vgpc_imargin)) ? "0px 5px" : sanitize_text_field($vgpc_imargin);
	update_post_meta($post_id, 'vgpc_imargin', $vgpc_imargin);
	
	$vgpc_ipadding 		= $_POST['vgpc_ipadding'];
	$vgpc_ipadding		= (empty($vgpc_ipadding)) ? "10px 10px" : sanitize_text_field($vgpc_ipadding);
	update_post_meta($post_id, 'vgpc_ipadding', $vgpc_ipadding);
	
	$vgpc_isibg_color 	= $_POST['vgpc_isibg_color'];
	$vgpc_isibg_color	= intval($vgpc_isibg_color);
	update_post_meta($post_id, 'vgpc_isibg_color', $vgpc_isibg_color);
	
	$vgpc_ibg_color 	= $_POST['vgpc_ibg_color'];
	$vgpc_ibg_color		= (empty($vgpc_ibg_color)) ? "#ffffff" : sanitize_text_field($vgpc_ibg_color);
	update_post_meta($post_id, 'vgpc_ibg_color', $vgpc_ibg_color);
	
	$vgpc_itext_color 	= $_POST['vgpc_itext_color'];
	$vgpc_itext_color	= (empty($vgpc_itext_color)) ? "#333333" : sanitize_text_field($vgpc_itext_color);
	update_post_meta($post_id, 'vgpc_itext_color', $vgpc_itext_color);
	
	$vgpc_ilink_color 	= $_POST['vgpc_ilink_color'];
	$vgpc_ilink_color	= (empty($vgpc_ilink_color)) ? "#0088cc" : sanitize_text_field($vgpc_ilink_color);
	update_post_meta($post_id, 'vgpc_ilink_color', $vgpc_ilink_color);
	
	
	$vgpc_row_carousel 	= $_POST['vgpc_row_carousel'];
	$vgpc_row_carousel	= (empty($vgpc_row_carousel)) ? 1 : intval($vgpc_row_carousel);
	update_post_meta($post_id, 'vgpc_row_carousel', $vgpc_row_carousel);
	
	$vgpc_items_visible = $_POST['vgpc_items_visible'];
	$vgpc_items_visible	= (empty($vgpc_items_visible)) ? 4 : intval($vgpc_items_visible);
	update_post_meta($post_id, 'vgpc_items_visible', $vgpc_items_visible);
	
	$vgpc_desktop_number 	= $_POST['vgpc_desktop_number'];
	$vgpc_desktop_number	= (empty($vgpc_desktop_number)) ? "[1170,4]" : sanitize_text_field($vgpc_desktop_number);
	update_post_meta($post_id, 'vgpc_desktop_number', $vgpc_desktop_number);
	
	$vgpc_sdesktop_number 	= $_POST['vgpc_sdesktop_number'];
	$vgpc_sdesktop_number	= (empty($vgpc_sdesktop_number)) ? "[980,3]" : sanitize_text_field($vgpc_sdesktop_number);
	update_post_meta($post_id, 'vgpc_sdesktop_number', $vgpc_sdesktop_number);
	
	$vgpc_tablet_number 	= $_POST['vgpc_tablet_number'];
	$vgpc_tablet_number		= (empty($vgpc_tablet_number)) ? "[800,3]" : sanitize_text_field($vgpc_tablet_number);
	update_post_meta($post_id, 'vgpc_tablet_number', $vgpc_tablet_number);
	
	$vgpc_stablet_number 	= $_POST['vgpc_stablet_number'];
	$vgpc_stablet_number	= (empty($vgpc_stablet_number)) ? "[650,2]" : sanitize_text_field($vgpc_stablet_number);
	update_post_meta($post_id, 'vgpc_stablet_number', $vgpc_stablet_number);
	
	$vgpc_mobile_number 	= $_POST['vgpc_mobile_number'];
	$vgpc_mobile_number		= (empty($vgpc_mobile_number)) ? "[450,1]" : sanitize_text_field($vgpc_mobile_number);
	update_post_meta($post_id, 'vgpc_mobile_number', $vgpc_mobile_number);
	
	$vgpc_slide_speed 		= $_POST['vgpc_slide_speed'];
	$vgpc_slide_speed		= (empty($vgpc_slide_speed)) ? "200" : sanitize_text_field($vgpc_slide_speed);
	update_post_meta($post_id, 'vgpc_slide_speed', $vgpc_slide_speed);
	
	$vgpc_page_speed 		= $_POST['vgpc_page_speed'];
	$vgpc_page_speed		= (empty($vgpc_page_speed)) ? "800" : sanitize_text_field($vgpc_page_speed);
	update_post_meta($post_id, 'vgpc_page_speed', $vgpc_page_speed);
	
	$vgpc_rewind_speed 		= $_POST['vgpc_rewind_speed'];
	$vgpc_rewind_speed		= (empty($vgpc_rewind_speed)) ? "1000" : sanitize_text_field($vgpc_rewind_speed);
	update_post_meta($post_id, 'vgpc_rewind_speed', $vgpc_rewind_speed);
	
	$vgpc_enable_autoplay 	= $_POST['vgpc_enable_autoplay'];
	$vgpc_enable_autoplay	= intval($vgpc_enable_autoplay);
	update_post_meta($post_id, 'vgpc_enable_autoplay', $vgpc_enable_autoplay);
	
	$vgpc_auto_speed 		= $_POST['vgpc_auto_speed'];
	$vgpc_auto_speed		= (empty($vgpc_auto_speed)) ? "5000" : sanitize_text_field($vgpc_auto_speed);
	update_post_meta($post_id, 'vgpc_auto_speed', $vgpc_auto_speed);
	
	$vgpc_stop_hover 		= $_POST['vgpc_stop_hover'];
	$vgpc_stop_hover		= intval($vgpc_stop_hover);
	update_post_meta($post_id, 'vgpc_stop_hover', $vgpc_stop_hover);
	
	$vgpc_next_preview 		= $_POST['vgpc_next_preview'];
	$vgpc_next_preview		= intval($vgpc_next_preview);
	update_post_meta($post_id, 'vgpc_next_preview', $vgpc_next_preview);
	
	$vgpc_scroll_page 		= $_POST['vgpc_scroll_page'];
	$vgpc_scroll_page		= intval($vgpc_scroll_page);
	update_post_meta($post_id, 'vgpc_scroll_page', $vgpc_scroll_page);
	
	$vgpc_pagination 		= $_POST['vgpc_pagination'];
	$vgpc_pagination		= intval($vgpc_pagination);
	update_post_meta($post_id, 'vgpc_pagination', $vgpc_pagination);
	
	$vgpc_pagination_number = $_POST['vgpc_pagination_number'];
	$vgpc_pagination_number	= intval($vgpc_pagination_number);
	update_post_meta($post_id, 'vgpc_pagination_number', $vgpc_pagination_number);
	
	$vgpc_mouse_drag 		= $_POST['vgpc_mouse_drag'];
	$vgpc_mouse_drag		= intval($vgpc_mouse_drag);
	update_post_meta($post_id, 'vgpc_mouse_drag', $vgpc_mouse_drag);
	
	$vgpc_touch_drag 		= $_POST['vgpc_touch_drag'];
	$vgpc_touch_drag		= intval($vgpc_touch_drag);
	update_post_meta($post_id, 'vgpc_touch_drag', $vgpc_touch_drag);
	
	$vgpc_left_offset		= $_POST['vgpc_left_offset'];
	$vgpc_left_offset		= (empty($vgpc_left_offset)) ? "0" : sanitize_text_field($vgpc_left_offset);
	update_post_meta($post_id, 'vgpc_left_offset', $vgpc_left_offset);
	
	
	$vgpc_category 			= $_POST['vgpc_category'];
	$vgpc_category 			= (is_array($vgpc_category)) ? implode(",", $vgpc_category) : $vgpc_category;	
	$vgpc_category			= (empty($vgpc_category)) ? "all" : sanitize_text_field($vgpc_category);
	update_post_meta($post_id, 'vgpc_category', $vgpc_category);
	
	$vgpc_carousel_type 	= $_POST['vgpc_carousel_type'];
	$vgpc_carousel_type		= (empty($vgpc_carousel_type)) ? "latest" : sanitize_text_field($vgpc_carousel_type);
	update_post_meta($post_id, 'vgpc_carousel_type', $vgpc_carousel_type);
	
	$vgpc_number_posts 		= $_POST['vgpc_number_posts'];
	$vgpc_number_posts		= intval($vgpc_number_posts);
	update_post_meta($post_id, 'vgpc_number_posts', $vgpc_number_posts);
	
	$vgpc_post_title 		= $_POST['vgpc_post_title'];
	$vgpc_post_title		= intval($vgpc_post_title);
	update_post_meta($post_id, 'vgpc_post_title', $vgpc_post_title);
		
	$vgpc_post_category 	= $_POST['vgpc_post_category'];
	$vgpc_post_category		= intval($vgpc_post_category);
	update_post_meta($post_id, 'vgpc_post_category', $vgpc_post_category);
		
	$vgpc_post_author 		= $_POST['vgpc_post_author'];
	$vgpc_post_author		= intval($vgpc_post_author);
	update_post_meta($post_id, 'vgpc_post_author', $vgpc_post_author);
	
	$vgpc_post_date 		= $_POST['vgpc_post_date'];
	$vgpc_post_date			= intval($vgpc_post_date);
	update_post_meta($post_id, 'vgpc_post_date', $vgpc_post_date);
	
	$vgpc_post_image 		= $_POST['vgpc_post_image'];
	$vgpc_post_image		= intval($vgpc_post_image);
	update_post_meta($post_id, 'vgpc_post_image', $vgpc_post_image);
	
	$vgpc_image_size 		= $_POST['vgpc_image_size'];
	$vgpc_image_size		= (empty($vgpc_image_size)) ? "medium" : sanitize_text_field($vgpc_image_size);
	update_post_meta($post_id, 'vgpc_image_size', $vgpc_image_size);
	
	$vgpc_post_desc 		= $_POST['vgpc_post_desc'];
	$vgpc_post_desc		= intval($vgpc_post_desc);
	update_post_meta($post_id, 'vgpc_post_desc', $vgpc_post_desc);
	
	$vgpc_desc_lenght 		= $_POST['vgpc_desc_lenght'];
	$vgpc_desc_lenght		= (empty($vgpc_desc_lenght)) ? "200" : sanitize_text_field($vgpc_desc_lenght);
	update_post_meta($post_id, 'vgpc_desc_lenght', $vgpc_desc_lenght);
	
	$vgpc_readmore 			= $_POST['vgpc_readmore'];
	$vgpc_readmore			= intval($vgpc_readmore);
	update_post_meta($post_id, 'vgpc_readmore', $vgpc_readmore);
	
	$vgpc_bbg_color 		= $_POST['vgpc_bbg_color'];
	$vgpc_bbg_color			= (empty($vgpc_bbg_color)) ? "#23b2dd" : sanitize_text_field($vgpc_bbg_color);
	update_post_meta($post_id, 'vgpc_bbg_color', $vgpc_bbg_color);
	
	$vgpc_btext_color 		= $_POST['vgpc_btext_color'];
	$vgpc_btext_color		= (empty($vgpc_btext_color)) ? "#FFFFFF" : sanitize_text_field($vgpc_btext_color);
	update_post_meta($post_id, 'vgpc_btext_color', $vgpc_btext_color);
		
	$vgpc_hotbg_color 		= $_POST['vgpc_hotbg_color'];
	$vgpc_hotbg_color		= (empty($vgpc_hotbg_color)) ? "##FF0000" : sanitize_text_field($vgpc_hotbg_color);
	update_post_meta($post_id, 'vgpc_hotbg_color', $vgpc_hotbg_color);
	
	$vgpc_hottext_color 	= $_POST['vgpc_hottext_color'];
	$vgpc_hottext_color		= (empty($vgpc_hottext_color)) ? "#FFFFFF" : sanitize_text_field($vgpc_hottext_color);
	update_post_meta($post_id, 'vgpc_hottext_color', $vgpc_hottext_color);
}
add_action('save_post', 'meta_boxes_vgpc_save');