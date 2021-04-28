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

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		
		<?php canada_info_post_thumbnail(); ?>
		<div style="text-align: left; margin-left: 1rem;"><?php _e('Date published', 'canada-info');?> <?php the_time('F jS, Y'); ?> <?php _e('Created by', 'canada-info');?> <?php the_author_posts_link(); ?>.</div>
	</header><!-- .entry-header -->
	
	<div class="entry-content">
		<?php
		the_content();

		wp_link_pages(
			array(
				'before'   => '<nav class="page-links" aria-label="' . esc_attr__( 'Page', 'canada-info' ) . '">',
				'after'    => '</nav>',
				/* translators: %: Page number. */
				'pagelink' => esc_html__( 'Page %', 'canada-info' ),
			)
		);
		?>
	</div><!-- .entry-content -->

	

	<?php if ( ! is_singular( 'attachment' ) ) : ?>
		<?php get_template_part( 'template-parts/post/author-bio' ); ?>
	<?php endif; ?>

</article><!-- #post-<?php the_ID(); ?> -->
