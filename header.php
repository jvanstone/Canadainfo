<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="wrapper">

<header id="header">
    <div id="site-title">
        <?php //if ( is_front_page() || is_home() || is_front_page() && is_home() ) { echo '<h1>'; } ?>
       <h1> <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_html( get_bloginfo( 'name' ) ); ?>" rel="home"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></a></h1>
       <div id="site-description"><?php bloginfo( 'description' ); ?></div>
        <?php //if ( is_front_page() || is_home() || is_front_page() && is_home() ) { echo '</h1>'; } ?>
    </div>
 
</header>
<?php vo_nav_menu(); ?>
<img src="<?php header_image(); ?>" class="header-image" alt="" />

<div id="container">

