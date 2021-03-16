<?php
/**
 * Template Name: Coming Soon
 *
 * This is the template that displays all of the <head> section and everything up until main.
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
		<meta name="viewport" content="width=device-width, initial=scale=1 "/>
		<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>

	
	<div id="wrapper" class="container-fluid">  

	<header id="header" class="row justify-start align-middle"> 
	   
			<?php theme_prefix_the_custom_logo()?>
	   
		<div id="site-title">
			<h1 style="text-align: center;"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_html_e( get_bloginfo( 'name' ) ); ?>" rel="home"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></a></h1>
			<h3 id="site-description"><?php bloginfo( 'description' ); ?></h3>
		</div>  
	</header>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	 <header>
		<h1 class="coming-soon">
			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
		</h1>
	</header>

	</article>
   
	</div> <!-- End Wrapper -->
	  
 </body>
</html>

