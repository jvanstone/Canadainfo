<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @since Canada_Info  1.0
 */

?>

<div id="nonPrintable">

<article id="post-<?php the_ID(); ?>" <?php post_class( 'printMe' ); ?>>

	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		<?php canada_info_post_thumbnail(); ?>
		
	</header><!-- .entry-header -->


	<div class="entry-content">
		
		<?php
		the_content();
		?>
	</div><!-- .entry-content -->

	<div style="text-align: center;"><?php esc_html_e( 'Date published', 'canada-info' ); ?> <?php the_time( 'F jS, Y' ); ?> <?php esc_html_e( '| Created by the Canadinfo team', 'canada-info' ); ?></div>
	
	 <?php ci_add_print_button(); ?>

</article><!-- #post-<?php the_ID(); ?> -->
</div>