<?php
function check_login() {
    if ( is_user_logged_in() ) 
    {
        // code
    }
}
add_action('init', 'check_login');


function canadian_guide_document_title_separator( $sep ) {
    $sep = '|';
    return $sep;
}
add_filter( 'document_title_separator', 'canadian_guide_document_title_separator' );

function canadian_guide_title( $title ) {
    if ( $title == '' ) {
    return '...';
    } else {
    return $title;
    }
}
add_filter( 'the_title', 'canadian_guide_title' );

add_filter( 'the_content_more_link', 'canadian_guide_read_more_link' );
function canadian_guide_read_more_link() {
    if ( ! is_admin() ) {
    return ' <a href="' . esc_url( get_permalink() ) . '" class="more-link">...</a>';
    }
}

add_filter( 'excerpt_more', 'canadian_guide_excerpt_read_more_link' );
function canadian_guide_excerpt_read_more_link( $more ) {
    if ( ! is_admin() ) {
    global $post;
    return ' <a href="' . esc_url( get_permalink( $post->ID ) ) . '" class="more-link">...</a>';
    }
}

add_filter( 'intermediate_image_sizes_advanced', 'canadian_guide_image_insert_override' );
    function canadian_guide_image_insert_override( $sizes ) {
    unset( $sizes['medium_large'] );
    return $sizes;
}


add_action( 'wp_head', 'canadian_guide_pingback_header' );
function canadian_guide_pingback_header() {
    if ( is_singular() && pings_open() ) {
    printf( '<link rel="pingback" href="%s" />' . "\n", esc_url( get_bloginfo( 'pingback_url' ) ) );
    }
}
add_action( 'comment_form_before', 'canadian_guide_enqueue_comment_reply_script' );
function canadian_guide_enqueue_comment_reply_script() {
    if ( get_option( 'thread_comments' ) ) {
    wp_enqueue_script( 'comment-reply' );
    }
}
function canadian_guide_custom_pings( $comment ) {
?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo comment_author_link(); ?></li>
<?php
}

add_filter( 'get_comments_number', 'canadian_guide_comment_count', 0 );
function canadian_guide_comment_count( $count ) {
    if ( ! is_admin() ) {
        global $id;
        $get_comments = get_comments( 'status=approve&post_id=' . $id );
        $comments_by_type = separate_comments( $get_comments );

        return count( $comments_by_type['comment'] );
    } else {
        return $count;
    }
}