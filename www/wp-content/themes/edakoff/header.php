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

	<header id="top">
		<div class="content">
			<div class="logo"><a href="<?php home_url();?>"><?php echo get_bloginfo('name');?></a></div>
			<?php wp_nav_menu(array(
				'theme_location'  => 'menu',
				'container' => 'nav',
				'container_class' => 'clearfix2', 
				'menu_class'      => 'clearfix2',
				'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul><a href="#" id="pull">Меню</a>',
			) ); ?>
			<div class="phone"><a href="tel:<?php echo phone_1();?>" class="icon-phone"><?php echo get_option('phone_1'); ?></a></div>
		</div>
	</header>