<?php
/**
 * Locations Taxonomy: Guide Page Layout
 * 
 * 
 * @package Canada Info
 * @subpackage canadian-guide
 * 
 * 
 */


get_header();

$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
?>

<main id="content" class="guide_width">

    <div class="card bg-dark text-black col-12">
    <?php 

      if ( have_posts() ) {
        while ( have_posts() ) {
            the_post();
   

         /* grab the url for the full size featured image */
          $featured_img_url = get_the_post_thumbnail_url(); 
           echo '<img src="' .esc_url($featured_img_url). '" class="card-img img-fluid" alt="">';
       
        }
      }
      
      ?>
      <div class="card-img-overlay">
        <h5 class="card-title">Canada Info <?php echo apply_filters( 'the_title', $term->name ); ?></h5>
  
      </div>
    </div>


    <?php if ( !empty( $term->description ) ): ?>
    <div class="archive-description">
      <?php echo esc_html($term->description); ?>
    </div>
    <?php endif; ?>

    <?php if ( have_posts() ): while ( have_posts() ): the_post(); ?>

    <div id="post-<?php the_ID(); ?>" <?php post_class('post clearfix'); ?>>
      <h2 class="post-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
      <div class="content">
       
        <div class="entry">
          <?php the_content( __('Full story…') ); ?>
        </div>
      </div>
    </div><!--// end #post-XX -->

    <?php endwhile; ?>

    <div class="navigation clearfix">
      <div class="alignleft"><?php next_posts_link('« Previous Entries') ?></div>
      <div class="alignright"><?php previous_posts_link('Next Entries »') ?></div>
    </div>

    <?php else: ?>

    <h2 class="post-title">No News in <?php echo apply_filters( 'the_title', $term->name ); ?></h2>
    <div class="content clearfix">
      <div class="entry">
        <p>It seems there isn't anything happening in <strong><?php echo apply_filters( 'the_title', $term->name ); ?></strong> right now. Check back later, something is bound to happen soon.</p>
      </div>
    </div>

    <?php endif; ?>
 
    </main>
  <div class="secondary-content">
    <?php get_sidebar(); ?>
  </div><!--// end .secondary-content -->

<?php get_footer(); ?>