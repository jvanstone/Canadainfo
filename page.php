<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Canada Info
 * @subpackage canada_info
 * @since 1.0.0
 */

get_header(); ?>

<main id="content">

	<?php // edit_post_link(); Hide the edit link. ?>

	<?php /* Start the Loop */ ?>
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header>
			<h1 class="entry-title col-12 align-middle p-2"><?php the_title(); ?></h1> 
		</header>
		<div class="entry-content">
			<?php if ( has_post_thumbnail() ) {
				the_post_thumbnail();
				}
				the_content();
			?>
				<div class="entry-links"><?php wp_link_pages(); ?></div>
		</div>
	</article>

	<?php if ( comments_open() && ! post_password_required() ) { comments_template( '', true ); } ?>
	<?php endwhile; endif; ?>

</main>

<?php get_footer(); ?>
