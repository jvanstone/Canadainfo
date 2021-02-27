<?php 
/**
 * Template Name: About Page
 * Description: Takes the Post Category { About } and displays the content on this page 
 * Created by: Vanstone Online - Jason Vanstone
 *
 * 
 */
?>

<?php get_header(); ?>

<main id="content" class="guide_width">


    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  
    <?php get_template_part( 'entry' ); ?>
    
    <?php
    $args = array( 
        'posts_per_page' => 3, 
        'offset'=> 0, 
        'category' => 8,
        'orderby'         => 'date',
        'order'            => 'ASC', );

    $myposts = get_posts( $args );
    foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
        <div class="card mb-3" style="max-width: 500px;">
            <div class="row g-0">
                <div class="col-md-4">
                    <?php echo get_the_post_thumbnail( $page->ID, 'thumbnail' ); ?>
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title"><?php the_title(); ?></h5>
                        <a href="<?php the_permalink(); ?>"></a>
                        <p class="card-text"><?php $content = apply_filters( 'the_content', get_the_content() ); echo $content;?></p>
                    </div> 
                </div>
            </div>   
        </div>
    <?php endforeach; 
    wp_reset_postdata();?>

  
    <?php if ( comments_open() && ! post_password_required() ) { comments_template( '', true ); } ?>
    <?php endwhile; endif; ?>
    
    <footer class="footer">
    <?php get_template_part( 'nav', 'below-single' ); ?>
    </footer>
</main>

<?php get_sidebar(); ?>
<?php get_footer(); ?>