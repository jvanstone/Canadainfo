<?php
/**
 * Template Name: About Page
 * Description: Takes the Post Category { About } and displays the content on this page
 * Created by: Vanstone Online - Jason Vanstone
 *
 * Removed links to single post  - >  the_permalink()
 *
 * @package Canada Info
 * @subpackage canada_info
 * @since 1.0.0
 *
 */

?>

<?php get_header(); ?>

<main id="content" style="text-align: center;">

<?php

if ( have_posts() ) : while ( have_posts() ) : the_post();
			get_template_part( 'entry' );
				$args = array(
					'posts_per_page' => 3,
					'offset'         => 0,
					'category'       => 8,
					'orderby'        => 'date',
					'order'          => 'ASC',
				);

				$myposts = get_posts( $args );
				foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
					<div class="card mb-3" style="max-width: 500px; text-align: center; margin:0 auto;">
						<div class="row g-0">
							<div class="col-12 col-md-4">
							<?php echo get_the_post_thumbnail( $page->ID, 'thumbnail' ); ?>
							</div>
							<div class="col-12 col-md-8">
								<div class="card-body" style="text-align: center;">
									<h5 class="card-title" style="text-align: center;"><?php the_title(); ?></h5>
									<?php $content = apply_filters( 'the_content', get_the_content() ); ?>
									<div class="card-text" style="text-align: center;"><?php __( $content ); ?></div>
								</div> 
							</div>
						</div>   
					</div>	
					<?php
				endforeach;
				wp_reset_postdata();
	
				if ( comments_open() && ! post_password_required() ) { comments_template( '', true ); } ?>

	<footer class="footer">
	<?php get_template_part( 'nav', 'below-single' ); ?>
	</footer>

</main>
<?php get_footer(); ?>
