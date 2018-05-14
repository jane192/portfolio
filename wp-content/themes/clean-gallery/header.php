<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Clean Gallery
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>

<body <?php body_class('animated fadeIn'); ?> id='sitemainbody' itemscope='itemscope' itemtype='http://schema.org/WebPage'>

<?php if ( !(cleangallery_get_option('hide_top_bar')) ) {
    get_template_part( 'template-parts/content', 'top' );
} ?>

<div class='cgal-site-header-outer'>
<div class='cgal-site-header-inner'>
<header id='masthead' class='cgal-site-header' itemscope='itemscope' itemtype='http://schema.org/WPHeader' role='banner'>

<?php if ( get_header_image() ) : ?>

<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" style="display: block;">
    <img src="<?php header_image(); ?>" width="<?php echo esc_attr(get_custom_header()->width); ?>" height="<?php echo esc_attr(get_custom_header()->height); ?>" alt="" class="cleangallery-header-image"/>
</a>

<?php else: ?>

<div class='cgal-site-branding'>
<?php if ( has_custom_logo() ) : ?>
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" style="display: block;">
        <img src="<?php echo esc_url( cleangallery_custom_logo() ); ?>" alt="" class="header-image"/>
      </a>
<?php else: ?>
    <?php if(is_home() || is_front_page()) { ?>
      <h1 class="cgal-site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
      <h2 class="cgal-site-description"><?php bloginfo( 'description' ); ?></h2>
      <?php } else { ?>
      <p class="cgal-site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
      <p class="cgal-site-description"><?php bloginfo( 'description' ); ?></p>
      <?php } ?>
<?php endif; ?>
</div>

<div class='cgal-site-header-banner'>
<?php dynamic_sidebar( 'header-right' ); ?>
</div>

<?php endif; ?>

</header>
</div>
</div>

<div class='nav-primary-cover-wrap'>
<div class='nav-primary-cover'>
<nav class='nav-primary' id='primary-navigation' itemscope='itemscope' itemtype='http://schema.org/SiteNavigationElement' role='navigation'>
<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'menu-primary-navigation', 'menu_class' => 'menu pg-nav-menu menu-primary', 'fallback_cb' => 'cleangallery_fallback_menu', ) ); ?>
</nav>
</div>
</div> <!-- .nav-primary-cover-wrap -->