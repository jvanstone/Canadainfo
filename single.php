<?php
/**
 * This part is used to display posts. 
 *
 * This is the template that displays all of the <main> section and everything up until footer
 *
 * 
 * @package Canada Info
 * @subpackage canada_info
 * @since 1.0.0
 */
?>

<?php get_header(); ?>

<main id="content">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <?php get_template_part( 'entry' ); ?>
        <?php if ( comments_open() && ! post_password_required() ) { comments_template( '', true ); } ?>
        <?php endwhile; endif; ?>
    <footer class="footer">
        <?php get_template_part( 'nav', 'below-single' ); ?>
    </footer>
</main>

<?php get_sidebar(); ?>
<?php get_footer(); ?>