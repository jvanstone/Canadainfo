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

<main id="content" style="text-align: center;">


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
        <div class="card mb-3" style="max-width: 500px; text-align: center;">
            <div class="row g-0">
                <div class="col-md-4">
                <a href="<?php the_permalink(); ?>"><?php echo get_the_post_thumbnail( $page->ID, 'thumbnail' ); ?></a>
                </div>
                <div class="col-md-8">
                    <div class="card-body" style="text-align: center;">
                        <h5 class="card-title" style="text-align: center;"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                        <?php $content = apply_filters( 'the_content', get_the_content() ); ?>
                        <div class="card-text" style="text-align: center;"><?php echo $content;?></div>
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