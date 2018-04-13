<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<title><?php echo wp_get_document_title(); ?></title>
		<?php wp_head(); ?>
</head>

<body>

	<header>
		<?php wp_nav_menu(array(
			'theme_location'  => 'menu',
			'container' => 'nav',
			'container_class' => 'clearfix', 
			'menu_class'      => 'clearfix',
		) ); ?>
	</header>