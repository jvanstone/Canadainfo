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

    <header id="header" class="row justify-start align-middle"> 
       
            <?php theme_prefix_the_custom_logo()?>
       
        <div id="site-title">
            <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_html_e( get_bloginfo( 'name' ) ); ?>" rel="home"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></a></h1>
            <h3 id="site-description"><?php bloginfo( 'description' ); ?></h3>
        </div>  
    </header>
    
    <div class="col-12">
    <img src="<?php header_image(); ?>" class=".img-fluid header-image" alt="<?php echo esc_html_e( get_bloginfo( 'name' ) ); ?>" />

    <!-- Top Navigation Menu -->
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <?php
            //make wp_mav_menu use bootstrap
            wp_nav_menu( array( 
                'theme_location' => 'primary', 
                'menu_class' => 'navbar-nav',
                'add_li_class' => 'nav-item col-md-4',
                'container' => false
                )); 
            ?>
        </div>
    </nav>
    </div>

   