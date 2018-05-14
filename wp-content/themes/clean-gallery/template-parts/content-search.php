<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Clean Gallery
 */
?>


<div class='post-outer'>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'postbox' ); ?>>

<div class='postboxdata'>

<?php if(has_post_thumbnail()) { ?>
<a href="<?php echo esc_url( get_permalink() ); ?>" class="cgal-thumbnail-link"><?php the_post_thumbnail('cleangallery-homeimg', array('class' => 'cgal-thumbnail', 'title' => get_the_title(), 'itemprop' => 'image')); ?></a>
<?php } else { ?>
<a href="<?php echo esc_url( get_permalink() ); ?>" class="cgal-thumbnail-link"><img src="<?php echo esc_url( get_template_directory_uri() . '/images/no-thumbnail.jpg' ); ?>" class="cgal-thumbnail"/></a>
<?php } ?>

<div class='postboxmask'>
<p class='postboxmask-date'><?php cleangallery_posted_date(); ?></p>
<div class='postboxmask-desc'><?php echo esc_html(get_the_excerpt()); ?></div>
<a href="<?php echo esc_url( get_permalink() ); ?>" class="postboxmask-rmore"><?php echo esc_html(cleangallery_excerpt_more()); ?> <span class="screen-reader-text"><?php the_title(); ?></span></a>
</div>

</div>

<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

</article>
</div><!-- .post-outer -->