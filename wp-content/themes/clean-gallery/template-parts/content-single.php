<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Clean Gallery
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('cgal-singularitem'); ?>>

    <header class="entry-header">
        <?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
            <div class="entry-meta">
                    <?php cleangallery_posted_on(); ?>
            </div><!-- .entry-meta -->
    </header><!-- .entry-header -->

    <div class="entry-content clearfix">
            <?php
            if ( has_post_thumbnail() ) {
                if ( 1 === cleangallery_get_option('hide_thumbnail_single') ) {
                } else { ?>
                    <a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_post_thumbnail('cleangallery-singleimg', array('class' => 'cleangallery-single-post-thumbnail')); ?></a>
                <?php }
            }

            the_content( /* translators: %s: post title. */ sprintf(__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'clean-gallery' ), the_title( '<span class="screen-reader-text">"', '"</span>', false )) );

            wp_link_pages( array(
             'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'clean-gallery' ) . '</span>',
             'after'       => '</div>',
             'link_before' => '<span>',
             'link_after'  => '</span>',
             'separator'   => '',
             ) );
            ?>
    </div><!-- .entry-content -->

    <footer class="entry-footer">
        <?php cleangallery_entry_footer(); ?>
    </footer><!-- .entry-footer -->

</article>