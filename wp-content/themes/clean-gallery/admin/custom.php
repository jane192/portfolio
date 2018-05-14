<?php
/**
 * Decides how posts should be displayed on Homepage, Category Pages, Archive Pages and Search Pages
 *
 * @package Clean Gallery
 */

// Customizer Options
function cleangallery_customizer_css() {
?>
<style type="text/css">
body,button,input,select,textarea{color:<?php echo esc_attr( cleangallery_get_option('body_text_color') ); ?>;}
a{color:<?php echo esc_attr( cleangallery_get_option('link_color') ); ?>;}
a:hover{color:<?php echo esc_attr( cleangallery_get_option('link_hover_color') ); ?>;}
h1,h2,h3,h4,h5,h6{color:<?php echo esc_attr( cleangallery_get_option('headings_color') ); ?>;}

.cgal-social-navigation-outer{background:<?php echo esc_attr( cleangallery_get_option('social_bar_bg_color') ); ?>;}
.cgal-social-navigation-menu li a{color:<?php echo esc_attr( cleangallery_get_option('social_color') ); ?>;}
.cgal-social-navigation-menu li a:hover{color:<?php echo esc_attr( cleangallery_get_option('social_hover_color') ); ?>;}
.cgal-site-header-outer{background:<?php echo esc_attr( cleangallery_get_option('header_bg_color') ); ?>;border-bottom-color:<?php echo esc_attr( cleangallery_get_option('header_bd_color') ); ?>;}
.cgal-site-header-banner .header-widget .widget-title, .cgal-site-header-banner .header-widget .widget-title a{color:<?php echo esc_attr( cleangallery_get_option('header_banner_headings_color') ); ?>;}
.cgal-site-header-banner{color:<?php echo esc_attr( cleangallery_get_option('header_banner_color') ); ?>;}
.cgal-site-header-banner a{color:<?php echo esc_attr( cleangallery_get_option('header_banner_link_color') ); ?>;}
.cgal-site-header-banner a:hover{color:<?php echo esc_attr( cleangallery_get_option('header_banner_linkh_color') ); ?>;}


.nav-primary-cover-wrap{background:<?php echo esc_attr( cleangallery_get_option('menu_bg_color') ); ?>;}
<?php if ( cleangallery_get_option('menu_shadow_color') ) { ?>.nav-primary-cover-wrap{-webkit-box-shadow:0 1px 0 <?php echo esc_attr( cleangallery_get_option('menu_shadow_color') ); ?>,0 1px 3px rgba(0,0,0,.2); -moz-box-shadow:0 1px 0 <?php echo esc_attr( cleangallery_get_option('menu_shadow_color') ); ?>,0 1px 3px rgba(0,0,0,.2); box-shadow:0 1px 0 <?php echo esc_attr( cleangallery_get_option('menu_shadow_color') ); ?>,0 1px 3px rgba(0,0,0,.2);}<?php } ?>
.pg-nav-menu a, .responsive-menu-icon::before, .pg-nav-menu.responsive-menu > .menu-item-has-children:before, .pg-nav-menu.responsive-menu .menu-open.menu-item-has-children:before, .pg-nav-menu.responsive-menu > .page_item_has_children:before, .pg-nav-menu.responsive-menu .menu-open.page_item_has_children:before{color:<?php echo esc_attr( cleangallery_get_option('menu_color') ); ?>;}
.pg-nav-menu a:hover,.pg-nav-menu .current-menu-item > a, .pg-nav-menu .current_page_item > a, .nav-primary a:hover,.nav-primary .current-menu-item > a,.nav-primary .current_page_item > a,.nav-primary .sub-menu .current-menu-item > a:hover, .nav-primary .children .current_page_item > a:hover, .nav-primary .sub-menu .current-menu-item > a, .nav-primary .children .current_page_item > a{color:<?php echo esc_attr( cleangallery_get_option('menu_hover_color') ); ?>;}
.nav-primary .sub-menu, .nav-primary .children{background-color:<?php echo esc_attr( cleangallery_get_option('sub_menu_bg_color') ); ?>;}
.pg-nav-menu .sub-menu a, .pg-nav-menu .children a{border-color:<?php echo esc_attr( cleangallery_get_option('sub_menu_bd_color') ); ?>;}
.pg-nav-menu .sub-menu li:first-child a, .pg-nav-menu .children li:first-child a{border-top-color:<?php echo esc_attr( cleangallery_get_option('sub_menu_bd_color') ); ?>;}
@media only screen and (min-width: 1207px) {.nav-primary .pg-nav-menu > li > a{border-right-color:<?php echo esc_attr( cleangallery_get_option('sub_menu_bd_color') ); ?>;}.nav-primary .pg-nav-menu > li:first-child > a{border-left-color:<?php echo esc_attr( cleangallery_get_option('sub_menu_bd_color') ); ?>;}}

.cgal-singularitem, .navigation.post-navigation, .navigation.post-navigation-mod, .authorbioboxwrap, .entry-related-items, #comments, .comment .reply a{background:<?php echo esc_attr( cleangallery_get_option('post_bg_color') ); ?>;}
.cgal-singularitem, .navigation.post-navigation, .navigation.post-navigation-mod, .authorbioboxwrap, .entry-related-items, #comments, .comment .comment-meta .comment-author .avatar, .comment .reply a{border-color:<?php echo esc_attr( cleangallery_get_option('post_bd_color') ); ?>;}
.cgal-singularitem header.entry-header, .cgal-singularitem .entry-footer, .comment-list .comment .comment-body, .comment-list .pingback .comment-body{background:<?php echo esc_attr( cleangallery_get_option('post_header_bg_color') ); ?>;}
.cgal-singularitem header.entry-header, .cgal-singularitem .entry-footer, .comment-list .comment .comment-body, .comment-list .pingback .comment-body{border-bottom-color:<?php echo esc_attr( cleangallery_get_option('post_header_bd_color') ); ?>;}
.entry-title, .entry-title a {color:<?php echo esc_attr( cleangallery_get_option('post_headings_color') ); ?>;}
.entry-title a:hover {color:<?php echo esc_attr( cleangallery_get_option('post_headings_hover_color') ); ?>;}
.postbox .entry-title, .postbox .entry-title a {color:<?php echo esc_attr( cleangallery_get_option('post_box_headings_color') ); ?>;}
.postbox .entry-title a:hover {color:<?php echo esc_attr( cleangallery_get_option('post_box_headingsh_color') ); ?>;border-color:<?php echo esc_attr( cleangallery_get_option('post_box_headingsh_color') ); ?>;}

.cgal-sidebar-widgets .side-widget, .fullwidth-area .full-width-widget, .fullwidth-area-bottom .full-width-bottom-widget, .content-top .top-content-widget, .content-bottom .bottom-content-widget,.error404 .page-content{background:<?php echo esc_attr( cleangallery_get_option('sidebar_widget_bg_color') ); ?>;border-color:<?php echo esc_attr( cleangallery_get_option('sidebar_widget_bd_color') ); ?>;}
.cgal-sidebar-widgets .side-widget .widget-title, .fullwidth-area .full-width-widget .widget-title, .fullwidth-area-bottom .full-width-bottom-widget .widget-title, .content-top .top-content-widget .widget-title, .content-bottom .bottom-content-widget .widget-title{color:<?php echo esc_attr( cleangallery_get_option('sidebar_headings_color') ); ?>;background:<?php echo esc_attr( cleangallery_get_option('sidebar_headings_bg_color') ); ?>;border-bottom-color:<?php echo esc_attr( cleangallery_get_option('sidebar_headings_bd_color') ); ?>;}
.cgal-sidebar-widgets .side-widget .widget-title a, .fullwidth-area .full-width-widget .widget-title a, .fullwidth-area-bottom .full-width-bottom-widget .widget-title a, .content-top .top-content-widget .widget-title a, .content-bottom .bottom-content-widget .widget-title a{color:<?php echo esc_attr( cleangallery_get_option('sidebar_headings_color') ); ?>;}
.widget_tag_cloud a{color:<?php echo esc_attr( cleangallery_get_option('tag_cloud_color') ); ?>;background:<?php echo esc_attr( cleangallery_get_option('tag_cloud_bg_color') ); ?>;border-color:<?php echo esc_attr( cleangallery_get_option('tag_cloud_bd_color') ); ?>;}
.widget_tag_cloud a:hover{color:<?php echo esc_attr( cleangallery_get_option('tag_cloud_hover_color') ); ?>;background:<?php echo esc_attr( cleangallery_get_option('tag_cloud_hover_bg_color') ); ?>;border-color:<?php echo esc_attr( cleangallery_get_option('tag_cloud_hover_bd_color') ); ?>;}
.site-footer-cover-wrap{background:<?php echo esc_attr( cleangallery_get_option('footer_bg_color') ); ?>;border-top-color:<?php echo esc_attr( cleangallery_get_option('footer_bd_color') ); ?>;}
.site-footer .widget-title, .site-footer .widget-title a {color:<?php echo esc_attr( cleangallery_get_option('footer_headings_color') ); ?>;}
.site-footer {color:<?php echo esc_attr( cleangallery_get_option('footer_text_color') ); ?>;}
.site-footer a {color:<?php echo esc_attr( cleangallery_get_option('footer_link_color') ); ?>;}
.site-footer a:hover {color:<?php echo esc_attr( cleangallery_get_option('footer_link_hover_color') ); ?>;}
.site-info-cover-wrap {background: <?php echo esc_attr( cleangallery_get_option('copyright_bg_color') ); ?>}
.site-info, .site-info a {color: <?php echo esc_attr( cleangallery_get_option('copyright_color') ); ?>}
<?php if ( 1 === cleangallery_get_option('hide_posted_date') ) { ?>.posted-on {display: none;}<?php } ?>
<?php if ( 1 === cleangallery_get_option('hide_post_author') ) { ?>.byline {display: none;} .single .byline, .group-blog .byline {display: none;}<?php } ?>
<?php if ( 1 === cleangallery_get_option('hide_post_categories') ) { ?>.cat-links {display: none;}<?php } ?>
<?php if ( 1 === cleangallery_get_option('hide_post_tags') ) { ?>.tags-links {display: none;}<?php } ?>
<?php if ( 1 === cleangallery_get_option('hide_comments_link') ) { ?>.comments-link {display: none;}<?php } ?>
</style>
    <?php
}
add_action( 'wp_head', 'cleangallery_customizer_css' );

// Header styles
if ( ! function_exists( 'cleangallery_header_style' ) ) :
function cleangallery_header_style() {
  $header_text_color = get_header_textcolor();
  if ( get_theme_support( 'custom-header', 'default-text-color' ) === $header_text_color ) { return; }
  ?>
  <style type="text/css">
  <?php if ( ! display_header_text() ) : ?>
    .cgal-site-title, .cgal-site-description {position: absolute;clip: rect(1px, 1px, 1px, 1px);}
  <?php else : ?>
    .cgal-site-title, .cgal-site-title a, .cgal-site-description {color: #<?php echo esc_attr( $header_text_color ); ?>;}
  <?php endif; ?>
  </style>
  <?php
}
endif;
?>