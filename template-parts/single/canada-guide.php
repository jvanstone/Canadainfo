<?php 
/**
 * Template Name: Guide Page
 * Description: Takes the Post Category { About } and displays the content on this page
 * Created by: Vanstone Online - Jason Vanstone
 *

 * @package Canada Info
 * @subpackage canada_info
 * @since 1.0.0
 *
 */

get_header();
?>

<main id="content">


	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'entry' ); ?>

			<?php
			$args = array( 
				'posts_per_page'  => 10, 
				'offset'          => 0, 
				'category'        => 2,
				'orderby'         => 'date',
				'order'           => 'ASC', 
			);

	$myposts = get_posts( $args );
	foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="card mb-3">
				<div class="row guide-card-row">
					<div class="col-md-4 guide-card">
						<a href="<?php the_permalink(); ?>"><?php echo get_the_post_thumbnail( $page->ID, 'thumbnail', 'class=img-fluid' ); ?>
					</div>
					<div class="col-md-8">
						<div class="card-body">
							<h5 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
	
							<div class="card-text"><?php the_excerpt(); ?></div>
						</div> 
					</div>
				</div> 
			</div>  
		</article>
	<?php endforeach; 
	wp_reset_postdata();?>

	<?php if ( comments_open() && ! post_password_required() ) { comments_template( '', true ); } ?>
	<?php endwhile; endif; 
	?>
	<footer class="footer">
	<?php get_template_part( 'nav', 'below-single' ); ?>
	</footer>
</main>

<?php get_sidebar(); ?>
<?php get_footer(); ?>