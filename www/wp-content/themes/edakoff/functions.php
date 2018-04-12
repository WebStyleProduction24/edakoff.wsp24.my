<?php

function enqueue_styles() {
	wp_enqueue_style( 'whitesquare-style', get_stylesheet_uri());
	wp_register_style('font-style', 'http://fonts.googleapis.com/css?family=Oswald:400,300');
	wp_enqueue_style( 'font-style');
}
add_action('wp_enqueue_scripts', 'enqueue_styles');

function my_scripts_method() {
    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js');
    wp_enqueue_script( 'jquery' );
}    
 
add_action( 'wp_enqueue_scripts', 'my_scripts_method' );

register_nav_menus(array(
	'menu'    => 'Главное',
	'footer-1'    => 'Подвал 1',
	'footer-2' => 'Подвал 2'
));

?>