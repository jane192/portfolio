<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Clean Gallery
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

<header class="page-header">
<?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>
<?php the_archive_description( '<div class="taxonomy-description">', '</div>' ); ?>
</header>

<?php if(have_posts()) : ?>
<?php while(have_posts()) : the_post(); ?>

    <?php
    /*
     * Include the Post-Format-specific template for the content.
     * If you want to override this in a child theme, then include a file
     * called content-___.php (where ___ is the Post Format name) and that will be used instead.
     */
    get_template_part( 'template-parts/content', get_post_format() );
    ?>

<?php endwhile; ?>

<div class="clear"></div>
<?php cleangallery_site_paging_nav(); ?>

<?php else : ?>

  <?php get_template_part( 'template-parts/content', 'none' ); ?>

<?php endif; ?>

</main><!-- #main -->
</div><!-- #primary -->

<div class='content-bottom clearfix' id='content-bottom'>
<?php dynamic_sidebar( 'bottom-content' ); ?>
</div>

</div>
</div>

<?php get_sidebar(); ?>
</div>

<div class="clear"></div>
<div class='fullwidth-area-bottom clearfix' id='fullwidth-area-bottom'>
<?php dynamic_sidebar( 'bottom-fullwidth-area' ); ?>  
</div>

</div><!-- #content -->
</div>
</div>

<?php get_footer(); ?>