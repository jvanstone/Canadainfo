<?php
/**
 * Template Name: Guides Available
 *
 * This is the template that displays all Info Guides that are avaialble.
 *
 * @category   WordPress_Theme
 * @package    Canada_Info
 * @author     Vanstone Online <jason@vanstoneonline.com>
 * @license    GPL 3.0 http://www.gnu.org/licenses/gpl-3.0.html
 * @link       https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @since      1.0.0
 */


get_header();

$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
?>
<article>
		<header class="entry-header">
			<h1 class="entry-title">Canada Info Issues Available</h1>
		</header><!-- .entry-header -->

	<div class="entry-content">

	<?php canada_info_post_thumbnail(); ?>

		<?php if ( ! empty( $term->description ) ): ?>
		<div class="archive-description">
			<?php echo esc_html( $term->description ); ?>
		</div>
		<?php endif; ?>

		<?php if ( have_posts() ): while ( have_posts() ): the_post(); ?>

		<div id="post-<?php the_ID(); ?>" <?php post_class( 'post clearfix' ); ?>>
			<h1 class="post-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
			<div class="content">
				<div class="entry">
					<?php the_content( __( 'Full story…' ) ); ?>
				</div>
			</div>
		</div><!--// end #post-XX -->
		</div><!-- .entry-content -->

		</article>

		<?php endwhile; ?>

		<div class="navigation clearfix">
			<div class="alignleft"><?php next_posts_link( '« Previous Entries' ); ?></div>
			<div class="alignright"><?php previous_posts_link( 'Next Entries »' ); ?></div>
		</div>

		<?php else: ?>

		<h2 class="post-title">No News in <?php echo apply_filters( 'the_title', $term->name ); ?></h2>
		<div class="content clearfix">
			<div class="entry">
				<p>It seems there isn't anything happening in <strong><?php echo apply_filters( 'the_title', $term->name ); ?></strong> right now. Check back later, something is bound to happen soon.</p>
			</div>
		</div>

		<?php endif; ?>

<?php get_footer(); ?>
