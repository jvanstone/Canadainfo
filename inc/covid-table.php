<?php
/**
 *  Insert COVID Table into post
 *
 */
function ci_insert_covidtable() {
	ob_start();
	$ci_post_type = 'covidtable';
	$args = array(
		'post_type'      => $ci_post_type,
		'post_status'    => 'publish',
		'posts_per_page' => 1,
		'orderby'        => 'title',
		'order'          => 'ASC',
	);

	$the_query = new WP_Query( $args );

	if( $the_query->have_posts() ) :
		while ( $the_query->have_posts() ) :
				$the_query->the_post();
			?> 
			<h3><?php the_title(); ?></h3>
			<?php
				the_content();

			?>
			<h3><a href="<?php echo get_post_type_archive_link( $ci_post_type ); ?>">View past COVID Numbers in Canada.</a></h3>
			<?php
		endwhile;
		wp_reset_postdata();
	endif;
	return ob_get_clean();
}
add_shortcode( 'covid-table', 'ci_insert_covidtable' );
