<?php
/**
 * Displays the site header.
 *
 * @category   WordPress_Theme
 * @package    Canada_Info
 * @subpackage canada_info
 * @author     Vanstone Online <jason@vanstoneonline.com>
 * @license    GPL 3.0 http://www.gnu.org/licenses/gpl-3.0.html
 * @link       https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @since      1.0.0
 */

$wrapper_classes  = 'site-header';
$wrapper_classes .= has_custom_logo() ? ' has-logo' : '';
$wrapper_classes .= ( true === get_theme_mod( 'display_title_and_tagline', true ) ) ? ' has-title-and-tagline' : '';
$wrapper_classes .= has_nav_menu( 'primary' ) ? ' has-menu' : '';
?>


	<?php get_template_part( 'template-parts/header/site-branding' ); ?>
	<?php get_template_part( 'template-parts/header/site-nav' ); ?>

<!-- #masthead -->
