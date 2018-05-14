<?php
if ( ! function_exists( 'cleangallery_posted_date' ) ) :
/**
 * Prints HTML with meta information for the current post-date.
 */
function cleangallery_posted_date() {
    $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
    if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
        $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
    }
    $time_string = sprintf( $time_string, esc_attr( get_the_date( 'c' ) ), esc_html( get_the_date() ), esc_attr( get_the_modified_date( 'c' ) ), esc_html( get_the_modified_date() ) );
    $posted_on = sprintf( /* translators: %s: post date. */ _x( '<span class="screen-reader-text">Posted on </span>%s', 'post date', 'clean-gallery' ), '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>&nbsp;&nbsp;' );
    echo '<span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.
}
endif;

if ( ! function_exists( 'cleangallery_post_comments' ) ) :
/**
 * Prints HTML with meta information for the comments.
 */
function cleangallery_post_comments() {
    if ( comments_open() ) {
        echo '<span class="comments-link"><i class="fa fa-comments" aria-hidden="true"></i> ';
        comments_popup_link( __( 'Leave a comment', 'clean-gallery' ), __( '1 Comment', 'clean-gallery' ), __( '% Comments', 'clean-gallery' ) );
        echo '</span>';
    }
}
endif;

/**
 * Post meta, navigations, site titles functions
 *
 * @package Clean Gallery
 */

// Display Post Meta
if ( ! function_exists( 'cleangallery_posted_on' ) ) :
function cleangallery_posted_on() {
    $posted_on = sprintf(
        /* translators: %s: post date. */ _x( '<i class="fa fa-calendar"></i> Posted on <a href="%1$s" rel="bookmark"><time class="entry-date published updated" datetime="%2$s" itemprop="datePublished">%3$s</time></a>', 'post date', 'clean-gallery' ), esc_url( get_permalink() ), esc_attr( get_the_date( 'c' ) ), esc_html( get_the_date() )
    );
    $byline = sprintf(
        /* translators: %s: post author. */ _x( '<i class="fa fa-user"></i> by <span class="author vcard" itemscope="itemscope" itemtype="http://schema.org/Person" itemprop="author"><a class="url fn n" href="%1$s"><span itemprop="name">%2$s</span></a></span>', 'post author', 'clean-gallery' ), esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ), esc_html( get_the_author() )
    );
    echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.
    if ( comments_open() ) {
        echo '<span class="comments-link"><i class="fa fa-comments"></i> ';
        comments_popup_link( __( 'Leave a comment', 'clean-gallery' ), __( '1 Comment', 'clean-gallery' ), __( '% Comments', 'clean-gallery' ) );
        echo '</span>';
    }
}
endif;

if ( ! function_exists( 'cleangallery_entry_footer' ) ) :
function cleangallery_entry_footer() {
    if ( 'post' == get_post_type() ) {
        /* translators: used between list items, there is a space after the comma */
        $categories_list = get_the_category_list( esc_html__( ', ', 'clean-gallery' ) );
        if ( $categories_list ) {
            /* translators: 1: list of categories. */
            printf( '<span class="cat-links">' . __( '<i class="fa fa-folder-open"></i> Posted in %1$s', 'clean-gallery' ) . '</span>', $categories_list ); // WPCS: XSS OK.
        }
        /* translators: used between list items, there is a space after the comma */
        $tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'clean-gallery' ) );
        if ( $tags_list ) {
            /* translators: 1: list of tags. */
            printf( '<span class="tags-links">' . __( '<i class="fa fa-tags"></i> Tagged %1$s', 'clean-gallery' ) . '</span>', $tags_list ); // WPCS: XSS OK.
        }
    }
    edit_post_link( __( 'Edit', 'clean-gallery' ), '<span class="edit-link"><i class="fa fa-pencil"></i> ', '</span>' );
}
endif;

if ( ! function_exists( 'cleangallery_wp_pagenavi' ) ) :
function cleangallery_wp_pagenavi() {
    ?>
    <nav class="navigation posts-navigation clearfix" role="navigation">
        <?php wp_pagenavi(); ?>
    </nav><!-- .navigation -->
    <?php
}
endif;

if ( ! function_exists( 'cleangallery_site_paging_nav' ) ) :
function cleangallery_site_paging_nav() {
    if ( function_exists( 'wp_pagenavi' ) ) {
        cleangallery_wp_pagenavi();
    } else {
        the_posts_navigation(array('prev_text' => __( '&larr; Older posts', 'clean-gallery' ), 'next_text' => __( 'Newer posts &rarr;', 'clean-gallery' )));
    }
}
endif;
?>