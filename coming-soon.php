<?php
/**
 * Template Name: Coming Soon
 *
 * This is the template that displays all of the <head> section and everything up until main.
 *
 * 
 * @package Canada Info
 * @subpackage canada_info
 * @since 1.0.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    
    <head>
        <meta charset="<?php bloginfo( 'charset' , 'canada_info' ); ?>" />
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

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header>
    <?php if ( is_singular() ) {
    echo '<h1 class="" >';
    } else {
    echo '<h2 class="">';
    } ?>
    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a>
    <?php if ( is_singular() ) {
    echo '</h1>';
    } else {
    echo '</h2>';
    } ?> 
    <?php if ( ! is_search() ) { get_template_part( 'entry', 'meta' ); } ?>
    </header>
    <?php get_template_part( 'entry', ( is_front_page() || is_home() || is_front_page() && is_home() || is_archive() || is_search() ? 'summary' : 'content' ) ); ?>
    <?php if ( is_singular() ) { get_template_part( 'entry-footer' ); } ?>
</article>
   
    </div> <!-- End Wrapper -->
      
 </body>
</html>
