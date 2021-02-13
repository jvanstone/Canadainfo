<?php
/**
 * Header.php
 *
 * This is the template that displays all of the <head> section and everything up until main.
 *
 * 
 * @package Canadian Guide
 * @subpackage canadian_guide
 * @since 1.0.0
 */
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->

<html <?php language_attributes(); ?>>
    
    <head>
        <meta charset="<?php bloginfo( 'charset' , 'canadian_guide' ); ?>" />
        <meta name="viewport" content="width=device-width" />
        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>

    <div id="wrapper" class="container-fluid">

    <header id="header">
        <div id="site-title">
            <?php //if ( is_front_page() || is_home() || is_front_page() && is_home() ) { echo '<h1>'; } ?>
        <h1> <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_html_e( get_bloginfo( 'name' ) ); ?>" rel="home"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></a></h1>
        <div id="site-description"><?php bloginfo( 'description' ); ?></div>
            <?php //if ( is_front_page() || is_home() || is_front_page() && is_home() ) { echo '</h1>'; } ?>
        </div>
    
    </header>

    <!-- Top Navigation Menu -->
    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Menu</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <?php
            //make wp_mav_menu use bootstrap
            wp_nav_menu( array( 
                'theme_location' => 'mobile-menu', 
                'menu_class' => 'navbar-nav',
                'add_li_class' => 'nav-item',
                'container' => false
                )); 
            ?>
        </div>
    </nav>

    <div id="container">
        <img src="<?php header_image(); ?>" class="header-image" alt="" />
