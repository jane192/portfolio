<?php
/**
 * Clean Gallery functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Clean Gallery
 */

define( 'CLEANGALLERY_PROURL', 'https://themesdna.com/clean-gallery-pro-wordpress-theme/' );
define( 'CLEANGALLERY_CONTACTURL', 'https://themesdna.com/contact/' );
define( 'CLEANGALLERY_THEMEOPTIONSDIR', get_template_directory() . '/admin' );
require_once( CLEANGALLERY_THEMEOPTIONSDIR . '/customizer.php' );

function cleangallery_get_option($option) {
    $cleangallery_options = get_option('cleangallery_options');
    if ((is_array($cleangallery_options)) && (array_key_exists($option, $cleangallery_options))) {
        return $cleangallery_options[$option];
    }
    else {
        return '';
    }
}

if ( ! function_exists( 'cleangallery_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function cleangallery_setup() {

    global $wp_version;

    /*
     * Make theme available for translation.
     * Translations can be filed in the /languages/ directory.
     * If you're building a theme based on Clean Gallery, use a find and replace
     * to change 'clean-gallery' to the name of your theme in all the template files.
     */
    load_theme_textdomain( 'clean-gallery', get_template_directory() . '/languages' );

    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    /*
     * Let WordPress manage the document title.
     * By adding theme support, we declare that this theme does not use a
     * hard-coded <title> tag in the document head, and expect WordPress to
     * provide it for us.
     */
    add_theme_support( 'title-tag' );

    /*
     * Enable support for Post Thumbnails on posts and pages.
     *
     * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
     */
    add_theme_support( 'post-thumbnails' );

    // Set the default Post Thumbnail size by cropping the image from top left:
    //set_post_thumbnail_size( 198, 198, array( 'top', 'left')  ); // 50 pixels wide by 50 pixels tall, crop from the top left corner
    if ( function_exists( 'add_image_size' ) ) {
        add_image_size( 'cleangallery-homeimg',  248, 248, true );
        add_image_size( 'cleangallery-singleimg',  770, 450, true );
    }

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus( array(
    'primary' => __('Primary Menu', 'clean-gallery')
    ) );

    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    $markup = array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' );
    add_theme_support( 'html5', $markup );

    add_theme_support( 'custom-logo', array(
        'height'      => 90,
        'width'       => 420,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array( 'cgal-site-title', 'cgal-site-description' ),
    ) );

    // Support for Custom Header
    add_theme_support( 'custom-header', apply_filters( 'cleangallery_custom_header_args', array(
    'default-image'          => '',
    'default-text-color'     => '000000',
    'width'                  => 1186,
    'height'                 => 250,
    'flex-height'            => true,
    'wp-head-callback'       => 'cleangallery_header_style',
    'uploads'                => true,
    ) ) );

    // Set up the WordPress core custom background feature.
    $background_args = array(
            'default-color'          => 'eeeeee',
            'default-image'          => '',
            'default-repeat'         => 'repeat',
            'default-position-x'     => 'left',
            'wp-head-callback'       => '_custom_background_cb',
            'admin-head-callback'    => 'admin_head_callback_func',
            'admin-preview-callback' => 'admin_preview_callback_func',
    );
    add_theme_support( 'custom-background', apply_filters( 'cleangallery_custom_background_args', $background_args) );

    // Support for Custom Editor Style
    add_editor_style( 'css/editor-style.css' );

}
endif;
add_action( 'after_setup_theme', 'cleangallery_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function cleangallery_content_width() {
    $GLOBALS['content_width'] = apply_filters( 'cleangallery_content_width', 767 );
}
add_action( 'after_setup_theme', 'cleangallery_content_width', 0 );

/**
 * Enqueue scripts and styles.
 */
function cleangallery_scripts() {
    wp_enqueue_style('cleangallery-maincss', get_stylesheet_uri(), array(), NULL);
    wp_enqueue_style('font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), NULL );
    wp_enqueue_style('cleangallery-webfont', '//fonts.googleapis.com/css?family=Roboto:400,400italic,700,700italic|Domine:400,700&subset=latin,latin-ext', array(), NULL);

    wp_enqueue_script('fitvids', get_template_directory_uri() .'/js/jquery.fitvids.js', array( 'jquery' ), NULL, true);
    wp_enqueue_script('resizesensor', get_template_directory_uri() .'/js/ResizeSensor.js', array( 'jquery' ), NULL, true);
    wp_enqueue_script('theia-sticky-sidebar', get_template_directory_uri() .'/js/theia-sticky-sidebar.js', array( 'jquery' ), NULL, true);
    wp_enqueue_script('cleangallery-customjs', get_template_directory_uri() .'/js/custom.js', array( 'jquery' ), NULL, true);

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'cleangallery_scripts' );

/**
 * Enqueue IE compatible scripts and styles.
 */
function cleangallery_ie_scripts() {
    wp_enqueue_script( 'cleangallery-html5shiv', get_template_directory_uri(). '/js/html5shiv.js', array(), NULL, false);
    wp_script_add_data( 'cleangallery-html5shiv', 'conditional', 'lt IE 9' );

    wp_enqueue_script( 'cleangallery-respond', get_template_directory_uri(). '/js/respond.js', array(), NULL, false );
    wp_script_add_data( 'cleangallery-respond', 'conditional', 'lt IE 9' );
}
add_action( 'wp_enqueue_scripts', 'cleangallery_ie_scripts' );

/**
 * Enqueue customizer styles.
 */
function cleangallery_enqueue_customizer_styles() {
    wp_enqueue_style( 'cleangallery-customizer-styles', get_template_directory_uri() . '/admin/css/customizer-styles.css', array(), NULL );
    wp_enqueue_style('font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), NULL );
}
add_action( 'customize_controls_enqueue_scripts', 'cleangallery_enqueue_customizer_styles' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function cleangallery_widgets_init() {

register_sidebar(array(
    'id' => 'header-right',
    'name' => __( 'Header Right', 'clean-gallery' ),
    'description' => __( 'Widgets of this sidebar are located on the right-hand side of the site-header.', 'clean-gallery' ),
    'before_widget' => '<div id="%1$s" class="header-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>'));

register_sidebar(array(
    'id' => 'main-sidebar',
    'name' => __( 'Main Sidebar', 'clean-gallery' ),
    'description' => __( 'Widgets of this sidebar are located on your site-sidebar.', 'clean-gallery' ),
    'before_widget' => '<div id="%1$s" class="side-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h3 class="widget-title"><span>',
    'after_title' => '</span></h3>'));

register_sidebar(array(
    'id' => 'top-fullwidth-area',
    'name' => __( 'Top Full Width Area', 'clean-gallery' ),
    'description' => __( 'Widgets of this sidebar are located at the bottom of the site-header.', 'clean-gallery' ),
    'before_widget' => '<div id="%1$s" class="full-width-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>'));

register_sidebar(array(
    'id' => 'bottom-fullwidth-area',
    'name' => __( 'Bottom Full Width Area', 'clean-gallery' ),
    'description' => __( 'Widgets of this sidebar are located above the site-footer.', 'clean-gallery' ),
    'before_widget' => '<div id="%1$s" class="full-width-bottom-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>'));

register_sidebar(array(
    'id' => 'top-content',
    'name' => __( 'Top Content', 'clean-gallery' ),
    'description' => __( 'Widgets of this sidebar are located at the top of the posts/pages.', 'clean-gallery' ),
    'before_widget' => '<div id="%1$s" class="top-content-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>'));

register_sidebar(array(
    'id' => 'bottom-content',
    'name' => __( 'Bottom Content', 'clean-gallery' ),
    'description' => __( 'Widgets of this sidebar are located at the bottom of the posts/pages.', 'clean-gallery' ),
    'before_widget' => '<div id="%1$s" class="bottom-content-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>'));

register_sidebar(array(
    'id' => 'top-footer',
    'name' => __( 'Top Footer', 'clean-gallery' ),
    'description' => __( 'Widgets of this sidebar are located at the top of the footer.', 'clean-gallery' ),
    'before_widget' => '<div id="%1$s" class="top-footer-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>'));

register_sidebar(array(
    'id' => 'bottom-footer',
    'name' => __( 'Bottom Footer', 'clean-gallery' ),
    'description' => __( 'Widgets of this sidebar are located at the bottom of the footer.', 'clean-gallery' ),
    'before_widget' => '<div id="%1$s" class="bottom-footer-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>'));

register_sidebar(array(
    'id' => 'footer-1',
    'name' => __( 'Footer 1', 'clean-gallery' ),
    'description' => __( 'Widgets of this sidebar are located on the column 1 in the footer.', 'clean-gallery' ),
    'before_widget' => '<div id="%1$s" class="footer-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>'));

register_sidebar(array(
    'id' => 'footer-2',
    'name' => __( 'Footer 2', 'clean-gallery' ),
    'description' => __( 'Widgets of this sidebar are located on the column 2 in the footer.', 'clean-gallery' ),
    'before_widget' => '<div id="%1$s" class="footer-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>'));

register_sidebar(array(
    'id' => 'footer-3',
    'name' => __( 'Footer 3', 'clean-gallery' ),
    'description' => __( 'Widgets of this sidebar are located on the column 3 in the footer.', 'clean-gallery' ),
    'before_widget' => '<div id="%1$s" class="footer-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>'));

register_sidebar(array(
    'id' => 'footer-4',
    'name' => __( 'Footer 4', 'clean-gallery' ),
    'description' => __( 'Widgets of this sidebar are located on the column 4 in the footer.', 'clean-gallery' ),
    'before_widget' => '<div id="%1$s" class="footer-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>'));

}
add_action( 'widgets_init', 'cleangallery_widgets_init' );

// Get custom-logo URL
function cleangallery_custom_logo() {
    if ( ! has_custom_logo() ) {return;}
    $cleangallery_custom_logo_id = get_theme_mod( 'custom_logo' );
    $cleangallery_logo = wp_get_attachment_image_src( $cleangallery_custom_logo_id , 'full' );
    return $cleangallery_logo[0];
}

// Get our wp_nav_menu() fallback, wp_page_menu(), to show a "Home" link as the first item
function cleangallery_page_menu_args( $args ) {
    $args['show_home'] = true;
    return $args;
}
add_filter( 'wp_page_menu_args', 'cleangallery_page_menu_args' );

// Category ids in post class
function cleangallery_category_id_class($classes) {
        global $post;
        foreach((get_the_category($post->ID)) as $category)
            $classes [] = 'wpcat-' . $category->cat_ID . '-id';
            return $classes;
}
add_filter('post_class', 'cleangallery_category_id_class');

// Change excerpt length
function cleangallery_excerpt_length($length) {
    if ( is_admin() ) {
        return $length;
    }
    return 12;
}
add_filter('excerpt_length', 'cleangallery_excerpt_length');

// Change excerpt more word
function cleangallery_excerpt_more() {
       $readmoretext = esc_html__('Read More', 'clean-gallery');
        if ( cleangallery_get_option('read_more_text') ) {
                $readmoretext = esc_html(cleangallery_get_option('read_more_text'));
        }
       return $readmoretext;
}

// Adds custom classes to the array of body classes.
function cleangallery_body_classes( $classes ) {
    // Adds a class of group-blog to blogs with more than 1 published author.
    if ( is_multi_author() ) {
        $classes[] = 'group-blog';
    }
    if ( is_singular() ) {
            $classes[] = 'cleangallery-singular';
    }
    if ( is_404() ) {
            $classes[] = 'cleangallery-404';
    }
    if ( (is_page_template( 'template-left-sidebar.php' )) ) {
            $classes[] = 'cleangallery-left-sidebar';
    }
    if ( (is_page_template( 'template-full-width.php' )) || (is_page_template( 'template-sitemap.php' )) ) {
        $classes[] = 'cleangallery-full-width';
    }   
    return $classes;
}
add_filter( 'body_class', 'cleangallery_body_classes' );

// Author bio box
function cleangallery_add_author_bio_box() {
     $content = '<div class="authorbioboxwrap"><div class="authorbioboxtop"><div class="authorbioboxgravatar">'. get_avatar( get_the_author_meta('email') , 80 ) .'</div><div class="authorbioboxtext"><h4>'.__( 'Author: ', 'clean-gallery' ).'<span>'. get_the_author_link() .'</span></h4>'. get_the_author_meta('description',get_query_var('author') ) .'</div></div></div>';
    echo wp_kses_post( $content );
}

function cleangallery_fallback_menu() {
   wp_page_menu( array(
        'sort_column'  => 'menu_order, post_title',
        'menu_id'      => 'menu-primary-navigation',
        'menu_class'   => 'menu pg-nav-menu menu-primary',
        'container'    => 'ul',
        'echo'         => true,
        'link_before'  => '',
        'link_after'   => '',
        'before'       => '',
        'after'        => '',
        'item_spacing' => 'discard',
        'walker'       => '',
    ) );
}

/**
 * Other theme functions
 */
require get_template_directory() . '/admin/template-tags.php';
require_once get_template_directory() . '/admin/custom.php';
?>