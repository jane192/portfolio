<?php 
/**
 * Template Name: Full Width, no sidebar(s)
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

    <?php get_template_part( 'template-parts/content', 'page' ); ?>

    <?php
    // If comments are open or we have at least one comment, load up the comment template
    if ( comments_open() || get_comments_number() ) :
            comments_template();
    endif;
    ?>

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