<?php
/******
 * 
 *  Template Name: About
 * 
 * 
 */


global $post;
$aboutposts = get_posts( array(
	'posts_per_page' => 3,
	'offset'         => 0,
	'category'       => 8,
	'orderby'        => 'date',
	'order'          => 'ASC',
) );
echo ' Test';
//if ( $aboutposts ) :
	foreach ( $aboutposts as $aboutpost ) :
		setup_postdata( $aboutpost );  ?>
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
		// endif;
?>
<footer class="footer">
<?php get_template_part( 'nav', 'below-single' ); ?>
</footer>