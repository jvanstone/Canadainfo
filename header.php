<?php
/**
 * Header.php
 *
 * This is the template that displays all of the <head> section and everything up until main.
 *
 * @category   WordPress_Theme
 * @package    Canada_Info
 * @author     Vanstone Online <jason@vanstoneonline.com>
 * @license    GPL 3.0 http://www.gnu.org/licenses/gpl-3.0.html
 * @link       https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @since      1.0.0
 */

?>
<!doctype html>
<html <?php language_attributes(); ?> <?php canada_info_the_html_classes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<?php wp_head(); ?>
</head>

<body id="cookieConsent" <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="wrapper" class="site container-fluid">  
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'canada-info' ); ?></a>

	<?php get_template_part( 'template-parts/header/site-header' ); ?>

	<!-- <div id="content" class="site-content"> -->
		<!-- <div id="primary" class="content-area"> -->
		<main>
