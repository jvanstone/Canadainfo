<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Canada Info
 * @subpackage  canada_info
 * @since 1.0.0
 */

get_header();
?>

<?php get_header(); ?>

<main id="content">
    <article id="post-0" class="post not-found">
        <header class="header">
            <h1 class="entry-title"><?php esc_html_e( 'Not Found', 'canadainfo' ); ?></h1>
        </header>
        <div class="entry-content">
            <p><?php esc_html_e( 'Nothing found for the requested page. Try a search instead?', 'canadainfo' ); ?></p>
            <?php get_search_form(); ?>
        </div>
    </article>
</main>
<?php get_sidebar(); ?>
<?php get_footer(); ?>