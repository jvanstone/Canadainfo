<?php
/**
 * Displays header site branding
 *
 * @category   WordPress_Theme
 * @package    Canada_Info
 * @subpackage canada_info
 * @author     Vanstone Online <jason@vanstoneonline.com>
 * @license    GPL 3.0 http://www.gnu.org/licenses/gpl-3.0.html
 * @link       https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @since      1.0.0
 */

$blog_info    = get_bloginfo( 'name' );
$description  = get_bloginfo( 'description', 'display' );
$show_title   = ( true === get_theme_mod( 'display_title_and_tagline', true ) );
$header_class = $show_title ? 'site-title' : 'screen-reader-text';
?>

<header id="header" class="row justify-start align-middle no-print"> 
		<?php if ( has_custom_logo() && $show_title ) : ?>
			<div class="site-logo"><?php the_custom_logo(); ?></div>
		<?php endif; ?>
		<div id="site-title">
			<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_html( get_bloginfo( 'name' ) ); ?>" rel="home"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></a></h1>
			<h3 id="site-description"><?php bloginfo( 'description' ); ?></h3>
		</div> 
</header><!-- .site-branding -->
