<?php 
/**
 * Template Name: Sitemap
*/

get_header(); ?>

<div class='cgal-site-content-outer'>
<div class='cgal-site-content-inner'>
<div id="content" class="cgal-site-content">

<div class='fullwidth-area clearfix' id='fullwidth-area'>
<?php dynamic_sidebar( 'top-fullwidth-area' ); ?>
</div>

<div class='site-content-inside'>
<div id='cgal-sitemain-wrapper' class='cgal-sitemain-wrapper' itemscope='itemscope' itemtype='http://schema.org/Blog' role='main'>
<div class='theiaStickySidebar'>

<div class='content-top clearfix' id='content-top'>
<?php dynamic_sidebar( 'top-content' ); ?>
</div>

<div id="primary" class="content-area">
<main id="main" class="site-main" role="main">

<?php while (have_posts()) : the_post(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class('cgal-singularitem cgal-sitemappage'); ?>>

<header class="entry-header">
    <?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
</header><!-- .entry-header -->

<div class="entry-content clearfix">
<div class="postrow">
<div class="postcol-3">
<?php the_widget( 'WP_Widget_Recent_Posts', array( 'title' => __( 'Recent Posts', 'clean-gallery' ), 'number' => 10 ) ); ?>
<?php the_widget( 'WP_Widget_Recent_Comments', array( 'title' => __( 'Recent Comments', 'clean-gallery' ), 'number' => 10 ) ); ?>
</div>
<div class="postcol-3">
<?php the_widget( 'WP_Widget_Pages',  array( 'title' => __( 'Pages', 'clean-gallery' ), 'sortby' => 'menu_order', 'exclude' => null ) ); ?>
</div>
<div class="postcol-3">
<?php the_widget( 'WP_Widget_Categories', array( 'title' => __( 'Categories', 'clean-gallery' ), 'count' => 1, 'hierarchical' => 1, 'dropdown' => 0 ) ); ?>
</div>
<div class="postcol-3">
<?php the_widget( 'WP_Widget_Tag_Cloud', array( 'title' => __( 'Tags', 'clean-gallery' ), 'taxonomy' => 'post_tag' ) ); ?>
<?php the_widget( 'WP_Widget_Archives', array( 'title' => __( 'Archives', 'clean-gallery' ), 'count' => 1, 'dropdown' => 0 ) ); ?>
<h2><?php esc_html_e( 'Authors', 'clean-gallery' ); ?></h2>
<ul><?php wp_list_authors(); ?></ul>
</div>
</div>
</div><!-- .entry-content -->

</article>

<?php endwhile; ?>

</main><!-- #main -->
</div><!-- #primary -->

<div class='content-bottom clearfix' id='content-bottom'>
<?php dynamic_sidebar( 'bottom-content' ); ?>
</div>

</div>
</div>

<?php // get_sidebar(); ?>
</div>

<div class="clear"></div>
<div class='fullwidth-area-bottom clearfix' id='fullwidth-area-bottom'>
<?php dynamic_sidebar( 'bottom-fullwidth-area' ); ?>
</div>

</div><!-- #content -->
</div>
</div>

<?php get_footer(); ?>