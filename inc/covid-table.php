<?php

/**
 *  Insert COVID Table into post
 * 
 *  @link 
 */
function ci_insert_covidtable() {
	ob_start();
	$args = array(
		'post_type'      => 'covidtable',
		'post_status'    => 'publish',
		'posts_per_page' => 2,
		'orderby'        => 'title',
		'order'          => 'ASC',
	);

	$the_query = new WP_Query( $args );

	if( $the_query->have_posts() ) :
		while ( $the_query->have_posts() ) :
				$the_query->the_post();
             the_content();
		return ob_get_clean();
		endwhile; 
		wp_reset_postdata(); 
	endif;

}
add_shortcode( 'covid-table', 'ci_insert_covidtable' );
