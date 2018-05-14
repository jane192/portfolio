<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
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
    <h1 class="page-title"><?php /* translators: %s: search query. */ printf( esc_html__( 'Search Results for: %s', 'clean-gallery' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
</header><!-- .page-header -->

<?php if(have_posts()) : ?>
<?php while(have_posts()) : the_post(); ?>

    <?php
    /*
     * Include the Post-Format-specific template for the content.
     * If you want to override this in a child theme, then include a file
     * called content-___.php (where ___ is the Post Format name) and that will be used instead.
     */
    get_template_part( 'template-parts/content', 'search' );
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