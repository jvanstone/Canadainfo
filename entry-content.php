<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 *
 * @package Canada Info
 * @subpackage  canada_info
 * @since 1.0.0
 */

get_header();
?>

<div class="entry-content">
    <?php if ( has_post_thumbnail() ) : ?>
    <a href="<?php $src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'feature', false ); echo esc_url( $src[0] ); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('large'); ?></a>
    <?php endif; ?>

    <?php the_content(); ?>
    
    <div class="entry-links"><?php wp_link_pages(); ?></div>
</div>