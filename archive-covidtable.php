<?php
/**
 * Template Name: Covid Tables
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Canadainfo
 * @subpackage  canadainfo
 * @since 1.0.0
 */

get_header();

$description = get_the_archive_description();
?>

<?php if ( have_posts() ) : ?>

	<header class="entry-header">
		<?php the_archive_title( '<h1 class="entry-title ">', '</h1>' ); ?>
		<?php if ( $description ) : ?>
			<h3 class="entry-content" style="text-align: center;"><?php echo wp_kses_post( wpautop( $description ) ); ?></h3>
		<?php endif; ?>
	</header><!-- .page-header -->

	<?php while ( have_posts() ) : ?>
		<?php the_post(); ?>
		<?php get_template_part( 'template-parts/content/content', get_theme_mod( 'display_excerpt_or_full_post', 'full' ) ); ?>
	<?php endwhile; ?>

	<?php canadainfo_the_posts_navigation(); ?>

<?php else : ?>
	<?php get_template_part( 'template-parts/content/content-none' ); ?>
<?php endif; ?>

<?php get_footer(); ?>
