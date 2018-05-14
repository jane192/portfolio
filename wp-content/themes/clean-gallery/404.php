<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
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

<div id="primary" class="content-area">
<main id="main" class="site-main" role="main">

<header class="page-header">
        <h1 class="page-title"><?php esc_html_e( 'Oops! That page can not be found.', 'clean-gallery' ); ?></h1>
</header><!-- .page-header -->
 
<div class="page-content">
        <p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'clean-gallery' ); ?></p> 
        <p><?php get_search_form(); ?></p>
        <p><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php esc_html_e( 'Back to Homepage', 'clean-gallery' ); ?></a></p>

        <?php the_widget( 'WP_Widget_Recent_Posts' ); ?>

        <div>
            <h2><?php esc_html_e( 'Most Used Categories', 'clean-gallery' ); ?></h2>
            <ul>
            <?php
                    wp_list_categories( array(
                            'orderby'    => 'count',
                            'order'      => 'DESC',
                            'show_count' => 1,
                            'title_li'   => '',
                            'number'     => 10,
                    ) );
            ?>
            </ul>
        </div>

        <?php
            /* translators: %1$s: smiley */
            $archive_content = '<p>' . sprintf( __( 'Try looking in the monthly archives. %1$s', 'clean-gallery' ), convert_smilies( ':)' ) ) . '</p>';
            the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$archive_content" );
        ?>

        <?php the_widget( 'WP_Widget_Tag_Cloud' ); ?>

</div>

</main><!-- #main -->
</div><!-- #primary -->

</div>
</div>
</div>

<?php get_sidebar(); ?>

<div class="clear"></div>
<div class='fullwidth-area-bottom clearfix' id='fullwidth-area-bottom'>
<?php dynamic_sidebar( 'bottom-fullwidth-area' ); ?>
</div>

</div><!-- #content -->
</div>
</div>

<?php get_footer(); ?>