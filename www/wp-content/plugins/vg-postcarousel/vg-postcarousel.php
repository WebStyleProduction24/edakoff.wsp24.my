<?php
/*
Plugin Name: VG PostCarousel
Plugin URI: http://themeforest.net/user/vinawebsolutions/portfolio
Description: Post Carousel for Wordpress. You can set unlimited carousel anywhere via short-codes and easy admin setting.
Author: VinaWebSolutions
Version: 1.1
Author URI: http://themeforest.net/user/vinawebsolutions/portfolio
*/

/* If this file is called directly, abort. */
if(!defined('WPINC')) {
	die;
}

/* Defined Global Variants */
define('vgpc_plugin_url', WP_PLUGIN_URL . '/' . plugin_basename(dirname(__FILE__)) . '/');
define('vgpc_plugin_dir', plugin_dir_path(__FILE__));
define('vgpc_is_admin', is_admin());

/* Require Once Library */
require_once(plugin_dir_path(__FILE__) . 'includes/vgpc-meta.php');
require_once(plugin_dir_path(__FILE__) . 'includes/vgpc-functions.php');

/* Load Init Scripts */
function vgpc_init_scripts()
{
	// load js, css for fontend
	if(!vgpc_is_admin)
	{
		wp_enqueue_script('jquery');
		wp_enqueue_script('owl.carousel', 	plugins_url('/includes/js/owl.carousel.js' , __FILE__) , array('jquery'));
		wp_enqueue_style('owl.carousel', 	vgpc_plugin_url . 'includes/css/owl.carousel.css');
		wp_enqueue_style('owl.theme', 		vgpc_plugin_url. 'includes/css/owl.theme.css');
	}
	
	// load css, js for backend
	if(vgpc_is_admin)
	{
		wp_enqueue_style('wp-color-picker');
		wp_enqueue_script('vgpc_color_picker', 	plugins_url('/includes/js/color-picker.js', __FILE__), array('wp-color-picker'), false, true);
		wp_enqueue_style('vnadmin', 			vgpc_plugin_url . 'vnadmin/css/vnadmin.css');
		wp_enqueue_script('vnadmin', 			plugins_url('vnadmin/js/vnadmin.js' , __FILE__) , array('jquery'));
	}
}
add_action("init", "vgpc_init_scripts");


/* Add Action Upload Function and Filter for Shortcode */
add_action('admin_enqueue_scripts', 'wp_enqueue_media');
add_filter('widget_text', 'do_shortcode');

/* Register Activation */
function vgpc_activation()
{
	$vgpc_version= "1.0";
	update_option('vgpc_version', $vgpc_version);
	
	$vgpc_customer_type= "commercial";
	update_option('vgpc_customer_type', $vgpc_customer_type);

}
register_activation_hook(__FILE__, 'vgpc_activation');


/* Display Carousel */
function vgpc_display($atts, $content = null) 
{
	$atts 			= shortcode_atts(array('id' => ""), $atts);
	$post_id 		= $atts['id'];
	$vgpc_theme 	= get_post_meta($post_id, 'vgpc_theme', true);
	
	if(empty($vgpc_theme)) return __("Carousel ID: {$post_id} not found!", "vgpc");
	
	$vgpc_theme 	= vgpc_get_theme_path($vgpc_theme);
	$vgpc_display 	= "";
	
	require_once($vgpc_theme["dir"] . "/index.php");
	wp_enqueue_style('vgpc-style-carousel', $vgpc_theme["url"] . '/style.css');
	$vgpc_display .= call_user_func($vgpc_theme["func"], $post_id);
	
	return $vgpc_display;
}
add_shortcode('vgpc', 'vgpc_display');


/* Register Admin Menu */
function vgpc_menu_settings(){
	include(plugin_dir_path(__FILE__) . 'vgpc-settings.php');	
}

function vgpc_menu_init() {
	add_submenu_page('edit.php?post_type=vgpc', __('About VGPC', 'menu-wpt'), __('About VGPC', 'menu-wpt'), 'manage_options', 'vgpc_menu_settings', 'vgpc_menu_settings');	
}
add_action('admin_menu', 'vgpc_menu_init');