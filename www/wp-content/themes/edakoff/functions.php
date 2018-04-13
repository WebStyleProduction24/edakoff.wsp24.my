<?php

function enqueue_styles() {
	wp_enqueue_style( 'whitesquare-style', get_stylesheet_uri());
	wp_register_style('font-style', 'http://fonts.googleapis.com/css?family=Oswald:400,300');
	wp_enqueue_style( 'font-style');
	wp_register_style('reset', get_template_directory_uri().'/css/reset.css');	
	wp_enqueue_style( 'reset');
	wp_register_style( 'fonts', get_template_directory_uri().'/css/fonts.css');
	wp_enqueue_style( 'fonts');


	wp_register_style( 'icons', get_template_directory_uri().'/css/icons.css');
	wp_enqueue_style( 'icons');
	wp_register_style('debootstrap', get_template_directory_uri().'/css/debootstrap.css');
	wp_enqueue_style('debootstrap');
}
add_action('wp_enqueue_scripts', 'enqueue_styles');

function my_scripts_method() {
    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js');
    wp_enqueue_script( 'jquery' );
    wp_register_script( 'menu', get_template_directory_uri().'/js/menu.js');
    wp_enqueue_script( 'menu' );
}    
 
add_action( 'wp_enqueue_scripts', 'my_scripts_method' );

register_nav_menus(array(
	'menu'    => 'Главное',
	'footer-1'    => 'Подвал 1',
	'footer-2' => 'Подвал 2'
));

add_action( 'admin_init', 'eg_settings_api_init' );
function eg_settings_api_init() {

	add_settings_section(
		'eg_setting_section',
		'Дополнительные пользовательские настройки',
		'eg_setting_section_callback_function',
		'general'
	);

	add_settings_field(
		'phone_1',
		'Номер телефона в <i>header</i> и <i>footer</i>',
		'eg_setting_callback_phone_1',
		'general',
		'eg_setting_section'
	);

	register_setting( 'general', 'phone_1' );
}

function eg_setting_section_callback_function() {
	echo '<p>Вывод данных в <i>header</i> и <i>footer</i></p>';
}

function eg_setting_callback_phone_1() {
	echo '<input 
		name="phone_1" 
		type="text"
		placeholder="+7 (800) 800-00-00" 
		value="' . get_option( 'phone_1' ) . '"
	/>';
}

function phone_1() {
	$phone_1 = get_option( 'phone_1' );
	$phone_1 = str_replace(' ', '', $phone_1);
	$phone_1 = str_replace('-', '', $phone_1);
	$phone_1 = str_replace('(', '', $phone_1);
	$phone_1 = str_replace(')', '', $phone_1);
	echo $phone_1;
}


?>