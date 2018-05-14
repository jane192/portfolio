<?php
/**
 * Clean Gallery Theme Customizer.
 *
 * @package Clean Gallery
 */

if ( ! class_exists( 'WP_Customize_Control' ) ) {return NULL;}

class CleanGallery_Customize_Button_Control extends WP_Customize_Control {
        public $type = 'button';
        protected $button_tag = 'button';
        protected $button_class = 'button button-primary';
        protected $button_href = 'javascript:void(0)';
        protected $button_target = '';
        protected $button_onclick = '';
        protected $button_tag_id = '';

        public function render_content() {
        ?>
        <span class="center">
        <?php
        echo '<' . esc_html($this->button_tag);
        if (!empty($this->button_class)) {
            echo ' class="' . esc_attr($this->button_class) . '"';
        }
        if ('button' == $this->button_tag) {
            echo ' type="button"';
        }
        else {
            echo ' href="' . esc_url($this->button_href) . '"' . (empty($this->button_tag) ? '' : ' target="' . esc_attr($this->button_target) . '"');
        }
        if (!empty($this->button_onclick)) {
            echo ' onclick="' . esc_js($this->button_onclick) . '"';
        }
        if (!empty($this->button_tag_id)) {
            echo ' id="' . esc_attr($this->button_tag_id) . '"';
        }
        echo '>';
        echo esc_html($this->label);
        echo '</' . esc_html($this->button_tag) . '>';
        ?>
        </span>
        <?php
        }
}

class CleanGallery_Customize_Static_Text_Control extends WP_Customize_Control {
    public $type = 'static-text';

    public function __construct( $manager, $id, $args = array() ) {
        parent::__construct( $manager, $id, $args );
    }

    protected function render_content() {
        if ( ! empty( $this->label ) ) :
            ?><span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span><?php
        endif;

        if ( ! empty( $this->description ) ) :
            ?><div class="description customize-control-description"><?php

            echo wp_kses_post( $this->description );

            ?></div><?php
        endif;

    }

}

class CleanGallery_Recommended_Plugins extends WP_Customize_Control {
    public $type = 'recommended_wpplugins';
    
    public function render_content() {
        $plugins = array(
        'wp-pagenavi' => array( 
            'link'  => esc_url( admin_url('plugin-install.php?tab=plugin-information&plugin=wp-pagenavi' ) ),
            'text'  => __( 'WP-PageNavi', 'clean-gallery' ),
            'desc'  => __( 'WP-PageNavi plugin helps to display numbered page navigation of this theme.<br/><br/>Just install and activate the plugin.', 'clean-gallery' ),
            ),
        'regenerate-thumbnails' => array( 
            'link'  => esc_url( admin_url('plugin-install.php?tab=plugin-information&plugin=regenerate-thumbnails' ) ),
            'text'  => __( 'Regenerate Thumbnails', 'clean-gallery' ),
            'desc'  => __( 'Regenerate Thumbnails plugin helps you to regenerate your thumbnails to match with this theme. Install and activate the plugin. From the left hand navigation menu, click Tools &gt; Regen. Thumbnails. On the next screen, click Regenerate All Thumbnails.', 'clean-gallery' ),
            ),
        );
        foreach ( $plugins as $plugin) {
            echo wp_kses_post('<p>'.$plugin['desc'].'</p>');
            echo wp_kses_post('<p style="background:#fff;border:1px solid #ddd;color:#000;padding:10px;font-size:120%;font-style:normal;font-weight:bold;"><i class="fa fa-wordpress" aria-hidden="true"></i> <a style="margin-left:8px;font-weight:bold;color:#000" href="' . esc_url($plugin['link']) .'" target="_blank">' . esc_attr($plugin['text']) .' </a></p>');
        }
    }
}

function cleangallery_register_theme_customizer( $wp_customize ) {

    if(method_exists('WP_Customize_Manager', 'add_panel')):
        $wp_customize->add_panel('cleangallery_main_options_panel', array( 'title' => esc_html__('Theme Options', 'clean-gallery'), 'priority' => 10, ));
    endif;

    $wp_customize->get_section( 'title_tagline' )->panel = 'cleangallery_main_options_panel';
    $wp_customize->get_section( 'title_tagline' )->priority = 20;
    $wp_customize->get_section( 'colors' )->panel = 'cleangallery_main_options_panel';
    $wp_customize->get_section( 'colors' )->priority = 40;

    $wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
    $wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
    $wp_customize->get_setting( 'background_color' )->transport = 'postMessage';

    $wp_customize->add_section( 'sc_cleangallery_getting_started', array( 'title' => esc_html__( 'Getting Started', 'clean-gallery' ), 'description' => __( 'Thanks for your interest in Clean Gallery! If you have any questions or run into any trouble, please visit us the following links. We will get you fixed up!', 'clean-gallery' ), 'panel' => 'cleangallery_main_options_panel', 'priority' => 5, ) );

    $wp_customize->add_setting( 'cleangallery_options[documentation]', array( 'default' => '', 'sanitize_callback' => '__return_false', ) );

    $wp_customize->add_control( new CleanGallery_Customize_Button_Control( $wp_customize, 'cleangallery_documentation_control', array( 'label' => esc_html__( 'Documentation', 'clean-gallery' ), 'section' => 'sc_cleangallery_getting_started', 'settings' => 'cleangallery_options[documentation]', 'type' => 'button', 'button_tag' => 'a', 'button_class' => 'button button-primary', 'button_href' => 'https://themesdna.com/clean-gallery-wordpress-theme/', 'button_target' => '_blank', ) ) );

    $wp_customize->add_setting( 'cleangallery_options[contact]', array( 'default' => '', 'sanitize_callback' => '__return_false', ) );

    $wp_customize->add_control( new CleanGallery_Customize_Button_Control( $wp_customize, 'cleangallery_contact_control', array( 'label' => esc_html__( 'Contact Us', 'clean-gallery' ), 'section' => 'sc_cleangallery_getting_started', 'settings' => 'cleangallery_options[contact]', 'type' => 'button', 'button_tag' => 'a', 'button_class' => 'button button-primary', 'button_href' => 'https://themesdna.com/contact/', 'button_target' => '_blank', ) ) );

    // Main Text Color
    $wp_customize->add_setting( 'cleangallery_options[body_text_color]', array( 'default' => '#7b7d80', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_hex_color' ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cleangallery_body_text_color_control', array( 'label' => esc_html__( 'Main Text Color', 'clean-gallery' ), 'section' => 'colors', 'settings' => 'cleangallery_options[body_text_color]' ) ) );

    // Main Link Color
    $wp_customize->add_setting( 'cleangallery_options[link_color]', array( 'default' => '#555555', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_hex_color' ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cleangallery_link_color_control', array( 'label' => esc_html__( 'Main Link Color', 'clean-gallery' ), 'section' => 'colors', 'settings' => 'cleangallery_options[link_color]' ) ) );

    // Main Link Hover Color
    $wp_customize->add_setting( 'cleangallery_options[link_hover_color]', array( 'default' => '#000000', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_hex_color' ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cleangallery_link_hover_color_control', array( 'label' => esc_html__( 'Main Link Hover Color', 'clean-gallery' ), 'section' => 'colors', 'settings' => 'cleangallery_options[link_hover_color]' ) ) );

    // General Headings Color
    $wp_customize->add_setting( 'cleangallery_options[headings_color]', array( 'default' => '#000000', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_hex_color' ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cleangallery_headings_color_control', array( 'label' => esc_html__( 'General Headings Color', 'clean-gallery' ), 'section' => 'colors', 'settings' => 'cleangallery_options[headings_color]' ) ) );

    // Social Bar Background
    $wp_customize->add_setting( 'cleangallery_options[social_bar_bg_color]', array( 'default' => '#333333', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_hex_color' ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cleangallery_social_bar_bg_color_control', array( 'label' => esc_html__( 'Social Bar Background', 'clean-gallery' ), 'section' => 'colors', 'settings' => 'cleangallery_options[social_bar_bg_color]' ) ) );

    // Social Buttons Color
    $wp_customize->add_setting( 'cleangallery_options[social_color]', array( 'default' => '#ffffff', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_hex_color' ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cleangallery_social_color_control', array( 'label' => esc_html__( 'Social Buttons Color', 'clean-gallery' ), 'section' => 'colors', 'settings' => 'cleangallery_options[social_color]' ) ) );

    // Social Buttons Hover Color
    $wp_customize->add_setting( 'cleangallery_options[social_hover_color]', array( 'default' => '#dddddd', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_hex_color' ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cleangallery_social_hover_color_control', array( 'label' => esc_html__( 'Social Buttons Hover Color', 'clean-gallery' ), 'section' => 'colors', 'settings' => 'cleangallery_options[social_hover_color]' ) ) );

    // Header Background
    $wp_customize->add_setting( 'cleangallery_options[header_bg_color]', array( 'default' => '#ffffff', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_hex_color' ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cleangallery_header_bg_color_control', array( 'label' => esc_html__( 'Header Background', 'clean-gallery' ), 'section' => 'colors', 'settings' => 'cleangallery_options[header_bg_color]' ) ) );

    // Header Border
    $wp_customize->add_setting( 'cleangallery_options[header_bd_color]', array( 'default' => '#ebebec', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_hex_color' ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cleangallery_header_bd_color_control', array( 'label' => esc_html__( 'Header Border', 'clean-gallery' ), 'section' => 'colors', 'settings' => 'cleangallery_options[header_bd_color]' ) ) );

    // Header Widget Title Color
    $wp_customize->add_setting( 'cleangallery_options[header_banner_headings_color]', array( 'default' => '#3a3c3d', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_hex_color' ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cleangallery_header_banner_headings_color_control', array( 'label' => esc_html__( 'Header Widget Title Color', 'clean-gallery' ), 'section' => 'colors', 'settings' => 'cleangallery_options[header_banner_headings_color]' ) ) );

    // Header Widget Text Color
    $wp_customize->add_setting( 'cleangallery_options[header_banner_color]', array( 'default' => '#7b7d80', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_hex_color' ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cleangallery_header_banner_color_control', array( 'label' => esc_html__( 'Header Widget Text Color', 'clean-gallery' ), 'section' => 'colors', 'settings' => 'cleangallery_options[header_banner_color]' ) ) );

    // Header Widget Link Color
    $wp_customize->add_setting( 'cleangallery_options[header_banner_link_color]', array( 'default' => '#96999d', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_hex_color' ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cleangallery_header_banner_link_color_control', array( 'label' => esc_html__( 'Header Widget Link Color', 'clean-gallery' ), 'section' => 'colors', 'settings' => 'cleangallery_options[header_banner_link_color]' ) ) );

    // Header Widget Link Hover Color
    $wp_customize->add_setting( 'cleangallery_options[header_banner_linkh_color]', array( 'default' => '#000000', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_hex_color' ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cleangallery_header_banner_linkh_color_control', array( 'label' => esc_html__( 'Header Widget Link Hover Color', 'clean-gallery' ), 'section' => 'colors', 'settings' => 'cleangallery_options[header_banner_linkh_color]' ) ) );

    // Menu Background
    $wp_customize->add_setting( 'cleangallery_options[menu_bg_color]', array( 'default' => '#ffffff', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_hex_color' ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cleangallery_menu_bg_color_control', array( 'label' => esc_html__( 'Menu Background', 'clean-gallery' ), 'section' => 'colors', 'settings' => 'cleangallery_options[menu_bg_color]' ) ) );

    // Menu Shadow
    $wp_customize->add_setting( 'cleangallery_options[menu_shadow_color]', array( 'default' => '#d2d2d3', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_hex_color' ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cleangallery_menu_shadow_color_control', array( 'label' => esc_html__( 'Menu Shadow', 'clean-gallery' ), 'section' => 'colors', 'settings' => 'cleangallery_options[menu_shadow_color]' ) ) );

    // Menu Link
    $wp_customize->add_setting( 'cleangallery_options[menu_color]', array( 'default' => '#333333', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_hex_color' ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cleangallery_menu_color_control', array( 'label' => esc_html__( 'Menu Link', 'clean-gallery' ), 'section' => 'colors', 'settings' => 'cleangallery_options[menu_color]' ) ) );

    // Menu Link Hover
    $wp_customize->add_setting( 'cleangallery_options[menu_hover_color]', array( 'default' => '#666666', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_hex_color' ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cleangallery_menu_hover_color_control', array( 'label' => esc_html__( 'Menu Link Hover', 'clean-gallery' ), 'section' => 'colors', 'settings' => 'cleangallery_options[menu_hover_color]' ) ) );

    // Sub Menu Background
    $wp_customize->add_setting( 'cleangallery_options[sub_menu_bg_color]', array( 'default' => '#f6f6f6', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_hex_color' ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cleangallery_sub_menu_bg_color_control', array( 'label' => esc_html__( 'Sub Menu Background', 'clean-gallery' ), 'section' => 'colors', 'settings' => 'cleangallery_options[sub_menu_bg_color]' ) ) );

    // Sub Menu Border
    $wp_customize->add_setting( 'cleangallery_options[sub_menu_bd_color]', array( 'default' => '#dddddd', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_hex_color' ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cleangallery_sub_menu_bd_color_control', array( 'label' => esc_html__( 'Sub Menu Border', 'clean-gallery' ), 'section' => 'colors', 'settings' => 'cleangallery_options[sub_menu_bd_color]' ) ) );

    // Home Post Title Color
    $wp_customize->add_setting( 'cleangallery_options[post_box_headings_color]', array( 'default' => '#222222', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_hex_color' ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cleangallery_post_box_headings_color_control', array( 'label' => esc_html__( 'Home Post Title Color', 'clean-gallery' ), 'section' => 'colors', 'settings' => 'cleangallery_options[post_box_headings_color]' ) ) );

    // Home Post Title Hover Color
    $wp_customize->add_setting( 'cleangallery_options[post_box_headingsh_color]', array( 'default' => '#888888', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_hex_color' ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cleangallery_post_box_headingsh_color_control', array( 'label' => esc_html__( 'Home Post Title Hover Color', 'clean-gallery' ), 'section' => 'colors', 'settings' => 'cleangallery_options[post_box_headingsh_color]' ) ) );

    // Singular Post Background Color
    $wp_customize->add_setting( 'cleangallery_options[post_bg_color]', array( 'default' => '#ffffff', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_hex_color' ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cleangallery_post_bg_color_control', array( 'label' => esc_html__( 'Post Background Color', 'clean-gallery' ), 'section' => 'colors', 'settings' => 'cleangallery_options[post_bg_color]' ) ) );

    // Singular Post Border Color
    $wp_customize->add_setting( 'cleangallery_options[post_bd_color]', array( 'default' => '#e0e0e0', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_hex_color' ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cleangallery_post_bd_color_control', array( 'label' => esc_html__( 'Post Border Color', 'clean-gallery' ), 'section' => 'colors', 'settings' => 'cleangallery_options[post_bd_color]' ) ) );

    // Singular Post Header Background Color
    $wp_customize->add_setting( 'cleangallery_options[post_header_bg_color]', array( 'default' => '#f6f6f6', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_hex_color' ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cleangallery_post_header_bg_color_control', array( 'label' => esc_html__( 'Post Header Background Color', 'clean-gallery' ), 'section' => 'colors', 'settings' => 'cleangallery_options[post_header_bg_color]' ) ) );

    // Singular Post Header Border Color
    $wp_customize->add_setting( 'cleangallery_options[post_header_bd_color]', array( 'default' => '#e9e9e9', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_hex_color' ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cleangallery_post_header_bd_color_control', array( 'label' => esc_html__( 'Post Header Border Color', 'clean-gallery' ), 'section' => 'colors', 'settings' => 'cleangallery_options[post_header_bd_color]' ) ) );

    // Post Title Color
    $wp_customize->add_setting( 'cleangallery_options[post_headings_color]', array( 'default' => '#222222', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_hex_color' ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cleangallery_post_headings_color_control', array( 'label' => esc_html__( 'Post Title Color', 'clean-gallery' ), 'section' => 'colors', 'settings' => 'cleangallery_options[post_headings_color]' ) ) );

    // Post Title Hover Color
    $wp_customize->add_setting( 'cleangallery_options[post_headings_hover_color]', array( 'default' => '#000000', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_hex_color' ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cleangallery_post_headings_hover_color_control', array( 'label' => esc_html__( 'Post Title Hover Color', 'clean-gallery' ), 'section' => 'colors', 'settings' => 'cleangallery_options[post_headings_hover_color]' ) ) );

    // Sidebar Widget Background Color
    $wp_customize->add_setting( 'cleangallery_options[sidebar_widget_bg_color]', array( 'default' => '#ffffff', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_hex_color' ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cleangallery_sidebar_widget_bg_color_control', array( 'label' => esc_html__( 'Sidebar Widget Background Color', 'clean-gallery' ), 'section' => 'colors', 'settings' => 'cleangallery_options[sidebar_widget_bg_color]' ) ) );

    // Sidebar Widget Border Color
    $wp_customize->add_setting( 'cleangallery_options[sidebar_widget_bd_color]', array( 'default' => '#e0e0e0', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_hex_color' ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cleangallery_sidebar_widget_bd_color_control', array( 'label' => esc_html__( 'Sidebar Widget Border Color', 'clean-gallery' ), 'section' => 'colors', 'settings' => 'cleangallery_options[sidebar_widget_bd_color]' ) ) );

    // Sidebar Widget Title Color
    $wp_customize->add_setting( 'cleangallery_options[sidebar_headings_color]', array( 'default' => '#3a3c3d', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_hex_color' ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cleangallery_sidebar_headings_color_control', array( 'label' => esc_html__( 'Sidebar Widget Title Color', 'clean-gallery' ), 'section' => 'colors', 'settings' => 'cleangallery_options[sidebar_headings_color]' ) ) );

    // Sidebar Widget Title Background Color
    $wp_customize->add_setting( 'cleangallery_options[sidebar_headings_bg_color]', array( 'default' => '#f6f6f6', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_hex_color' ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cleangallery_sidebar_headings_bg_color_control', array( 'label' => esc_html__( 'Sidebar Widget Title Background Color', 'clean-gallery' ), 'section' => 'colors', 'settings' => 'cleangallery_options[sidebar_headings_bg_color]' ) ) );

    // Sidebar Widget Title Border Color
    $wp_customize->add_setting( 'cleangallery_options[sidebar_headings_bd_color]', array( 'default' => '#e9e9e9', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_hex_color' ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cleangallery_sidebar_headings_bd_color_control', array( 'label' => esc_html__( 'Sidebar Widget Title Border Color', 'clean-gallery' ), 'section' => 'colors', 'settings' => 'cleangallery_options[sidebar_headings_bd_color]' ) ) );

    // Tag Cloud Link Color
    $wp_customize->add_setting( 'cleangallery_options[tag_cloud_color]', array( 'default' => '#666666', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_hex_color' ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cleangallery_tag_cloud_color_control', array( 'label' => esc_html__( 'Tag Cloud Link Color', 'clean-gallery' ), 'section' => 'colors', 'settings' => 'cleangallery_options[tag_cloud_color]' ) ) );

    // Tag Cloud Link Background
    $wp_customize->add_setting( 'cleangallery_options[tag_cloud_bg_color]', array( 'default' => '#f6f6f6', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_hex_color' ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cleangallery_tag_cloud_bg_color_control', array( 'label' => esc_html__( 'Tag Cloud Link Background', 'clean-gallery' ), 'section' => 'colors', 'settings' => 'cleangallery_options[tag_cloud_bg_color]' ) ) );

    // Tag Cloud Link Border
    $wp_customize->add_setting( 'cleangallery_options[tag_cloud_bd_color]', array( 'default' => '#e9e9e9', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_hex_color' ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cleangallery_tag_cloud_bd_color_control', array( 'label' => esc_html__( 'Tag Cloud Link Border', 'clean-gallery' ), 'section' => 'colors', 'settings' => 'cleangallery_options[tag_cloud_bd_color]' ) ) );

    // Tag Cloud Link Hover Color
    $wp_customize->add_setting( 'cleangallery_options[tag_cloud_hover_color]', array( 'default' => '#000000', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_hex_color' ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cleangallery_tag_cloud_hover_color_control', array( 'label' => esc_html__( 'Tag Cloud Link Hover Color', 'clean-gallery' ), 'section' => 'colors', 'settings' => 'cleangallery_options[tag_cloud_hover_color]' ) ) );

    // Tag Cloud Link Hover Background
    $wp_customize->add_setting( 'cleangallery_options[tag_cloud_hover_bg_color]', array( 'default' => '#eeeeee', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_hex_color' ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cleangallery_tag_cloud_hover_bg_color_control', array( 'label' => esc_html__( 'Tag Cloud Link Hover Background', 'clean-gallery' ), 'section' => 'colors', 'settings' => 'cleangallery_options[tag_cloud_hover_bg_color]' ) ) );

    // Tag Cloud Link Hover Border
    $wp_customize->add_setting( 'cleangallery_options[tag_cloud_hover_bd_color]', array( 'default' => '#e9e9e9', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_hex_color' ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cleangallery_tag_cloud_hover_bd_color_control', array( 'label' => esc_html__( 'Tag Cloud Link Hover Border', 'clean-gallery' ), 'section' => 'colors', 'settings' => 'cleangallery_options[tag_cloud_hover_bd_color]' ) ) );

    // Footer Background Color
    $wp_customize->add_setting( 'cleangallery_options[footer_bg_color]', array( 'default' => '#222222', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_hex_color' ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cleangallery_footer_bg_color_control', array( 'label' => esc_html__( 'Footer Background Color', 'clean-gallery' ), 'section' => 'colors', 'settings' => 'cleangallery_options[footer_bg_color]' ) ) );

    // Footer Border Color
    $wp_customize->add_setting( 'cleangallery_options[footer_bd_color]', array( 'default' => '#0a0c0e', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_hex_color' ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cleangallery_footer_bd_color_control', array( 'label' => esc_html__( 'Footer Border Color', 'clean-gallery' ), 'section' => 'colors', 'settings' => 'cleangallery_options[footer_bd_color]' ) ) );

    // Footer Widget Title Color
    $wp_customize->add_setting( 'cleangallery_options[footer_headings_color]', array( 'default' => '#ffffff', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_hex_color' ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cleangallery_footer_headings_color_control', array( 'label' => esc_html__( 'Footer Widget Title Color', 'clean-gallery' ), 'section' => 'colors', 'settings' => 'cleangallery_options[footer_headings_color]' ) ) );

    // Footer Text Color
    $wp_customize->add_setting( 'cleangallery_options[footer_text_color]', array( 'default' => '#7b7d80', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_hex_color' ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cleangallery_footer_text_color_control', array( 'label' => esc_html__( 'Footer Text Color', 'clean-gallery' ), 'section' => 'colors', 'settings' => 'cleangallery_options[footer_text_color]' ) ) );

    // Footer Link Color
    $wp_customize->add_setting( 'cleangallery_options[footer_link_color]', array( 'default' => '#96999d', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_hex_color' ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cleangallery_footer_link_color_control', array( 'label' => esc_html__( 'Footer Link Color', 'clean-gallery' ), 'section' => 'colors', 'settings' => 'cleangallery_options[footer_link_color]' ) ) );

    // Footer Link Hover Color
    $wp_customize->add_setting( 'cleangallery_options[footer_link_hover_color]', array( 'default' => '#ffffff', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_hex_color' ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cleangallery_footer_link_hover_color_control', array( 'label' => esc_html__( 'Footer Link Hover Color', 'clean-gallery' ), 'section' => 'colors', 'settings' => 'cleangallery_options[footer_link_hover_color]' ) ) );

    // Copyright Background Color
    $wp_customize->add_setting( 'cleangallery_options[copyright_bg_color]', array( 'default' => '#000000', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_hex_color' ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cleangallery_copyright_bg_color_control', array( 'label' => esc_html__( 'Copyright Background Color', 'clean-gallery' ), 'section' => 'colors', 'settings' => 'cleangallery_options[copyright_bg_color]' ) ) );

    // Copyright Text Color
    $wp_customize->add_setting( 'cleangallery_options[copyright_color]', array( 'default' => '#96999d', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_hex_color' ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cleangallery_copyright_color_control', array( 'label' => esc_html__( 'Copyright Text Color', 'clean-gallery' ), 'section' => 'colors', 'settings' => 'cleangallery_options[copyright_color]' ) ) );

    // Post Options
    $wp_customize->add_section( 'sc_cleangallery_posts', array( 'title' => esc_html__( 'Post Options', 'clean-gallery' ), 'panel' => 'cleangallery_main_options_panel', 'priority' => 260 ) );

    $wp_customize->add_setting( 'cleangallery_options[hide_posted_date]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'cleangallery_sanitize_checkbox', ) );

    $wp_customize->add_control( 'cleangallery_hide_posted_date_control', array( 'label' => esc_html__( 'Hide Posted Date', 'clean-gallery' ), 'section' => 'sc_cleangallery_posts', 'settings' => 'cleangallery_options[hide_posted_date]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'cleangallery_options[hide_post_author]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'cleangallery_sanitize_checkbox', ) );

    $wp_customize->add_control( 'cleangallery_hide_post_author_control', array( 'label' => esc_html__( 'Hide Post Author', 'clean-gallery' ), 'section' => 'sc_cleangallery_posts', 'settings' => 'cleangallery_options[hide_post_author]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'cleangallery_options[hide_post_categories]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'cleangallery_sanitize_checkbox', ) );

    $wp_customize->add_control( 'cleangallery_hide_post_categories_control', array( 'label' => esc_html__( 'Hide Post Categories', 'clean-gallery' ), 'section' => 'sc_cleangallery_posts', 'settings' => 'cleangallery_options[hide_post_categories]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'cleangallery_options[hide_post_tags]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'cleangallery_sanitize_checkbox', ) );

    $wp_customize->add_control( 'cleangallery_hide_post_tags_control', array( 'label' => esc_html__( 'Hide Post Tags', 'clean-gallery' ), 'section' => 'sc_cleangallery_posts', 'settings' => 'cleangallery_options[hide_post_tags]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'cleangallery_options[hide_comments_link]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'cleangallery_sanitize_checkbox', ) );

    $wp_customize->add_control( 'cleangallery_hide_comments_link_control', array( 'label' => esc_html__( 'Hide Comment Link', 'clean-gallery' ), 'section' => 'sc_cleangallery_posts', 'settings' => 'cleangallery_options[hide_comments_link]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'cleangallery_options[hide_thumbnail_single]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'cleangallery_sanitize_checkbox', ) );

    $wp_customize->add_control( 'cleangallery_hide_thumbnail_single_control', array( 'label' => esc_html__( 'Hide Thumbnails from Posts/Pages', 'clean-gallery' ), 'section' => 'sc_cleangallery_posts', 'settings' => 'cleangallery_options[hide_thumbnail_single]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'cleangallery_options[hide_author_bio_box]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'cleangallery_sanitize_checkbox', ) );

    $wp_customize->add_control( 'cleangallery_hide_author_bio_box_control', array( 'label' => esc_html__( 'Hide Author Bio Box', 'clean-gallery' ), 'section' => 'sc_cleangallery_posts', 'settings' => 'cleangallery_options[hide_author_bio_box]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'cleangallery_options[read_more_text]', array( 'default' => 'Read More', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_text_field', ) );

    $wp_customize->add_control( 'cleangallery_read_more_text_control', array( 'label' => esc_html__( 'Read More Text', 'clean-gallery' ), 'section' => 'sc_cleangallery_posts', 'settings' => 'cleangallery_options[read_more_text]', 'type' => 'text', ) );

    // Social Links
    $wp_customize->add_section( 'sc_cleangallery_sociallinks', array( 'title' => esc_html__( 'Social Links', 'clean-gallery' ), 'panel' => 'cleangallery_main_options_panel', 'priority' => 480, ));

    $wp_customize->add_setting( 'cleangallery_options[facebooklink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'cleangallery_facebooklink_control', array( 'label' => esc_html__( 'Facebook URL', 'clean-gallery' ), 'section' => 'sc_cleangallery_sociallinks', 'settings' => 'cleangallery_options[facebooklink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'cleangallery_options[twitterlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'cleangallery_twitterlink_control', array( 'label' => esc_html__( 'Twitter URL', 'clean-gallery' ), 'section' => 'sc_cleangallery_sociallinks', 'settings' => 'cleangallery_options[twitterlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'cleangallery_options[googlelink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) ); 

    $wp_customize->add_control( 'cleangallery_googlelink_control', array( 'label' => esc_html__( 'Google Plus URL', 'clean-gallery' ), 'section' => 'sc_cleangallery_sociallinks', 'settings' => 'cleangallery_options[googlelink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'cleangallery_options[pinterestlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'cleangallery_pinterestlink_control', array( 'label' => esc_html__( 'Pinterest URL', 'clean-gallery' ), 'section' => 'sc_cleangallery_sociallinks', 'settings' => 'cleangallery_options[pinterestlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'cleangallery_options[linkedinlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'cleangallery_linkedinlink_control', array( 'label' => esc_html__( 'Linkedin Link', 'clean-gallery' ), 'section' => 'sc_cleangallery_sociallinks', 'settings' => 'cleangallery_options[linkedinlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'cleangallery_options[instagramlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'cleangallery_instagramlink_control', array( 'label' => esc_html__( 'Instagram Link', 'clean-gallery' ), 'section' => 'sc_cleangallery_sociallinks', 'settings' => 'cleangallery_options[instagramlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'cleangallery_options[flickrlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'cleangallery_flickrlink_control', array( 'label' => esc_html__( 'Flickr Link', 'clean-gallery' ), 'section' => 'sc_cleangallery_sociallinks', 'settings' => 'cleangallery_options[flickrlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'cleangallery_options[youtubelink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'cleangallery_youtubelink_control', array( 'label' => esc_html__( 'Youtube URL', 'clean-gallery' ), 'section' => 'sc_cleangallery_sociallinks', 'settings' => 'cleangallery_options[youtubelink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'cleangallery_options[vimeolink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'cleangallery_vimeolink_control', array( 'label' => esc_html__( 'Vimeo URL', 'clean-gallery' ), 'section' => 'sc_cleangallery_sociallinks', 'settings' => 'cleangallery_options[vimeolink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'cleangallery_options[soundcloudlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'cleangallery_soundcloudlink_control', array( 'label' => esc_html__( 'Soundcloud URL', 'clean-gallery' ), 'section' => 'sc_cleangallery_sociallinks', 'settings' => 'cleangallery_options[soundcloudlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'cleangallery_options[lastfmlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'cleangallery_lastfmlink_control', array( 'label' => esc_html__( 'Lastfm URL', 'clean-gallery' ), 'section' => 'sc_cleangallery_sociallinks', 'settings' => 'cleangallery_options[lastfmlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'cleangallery_options[githublink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'cleangallery_githublink_control', array( 'label' => esc_html__( 'Github URL', 'clean-gallery' ), 'section' => 'sc_cleangallery_sociallinks', 'settings' => 'cleangallery_options[githublink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'cleangallery_options[bitbucketlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'cleangallery_bitbucketlink_control', array( 'label' => esc_html__( 'Bitbucket URL', 'clean-gallery' ), 'section' => 'sc_cleangallery_sociallinks', 'settings' => 'cleangallery_options[bitbucketlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'cleangallery_options[tumblrlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'cleangallery_tumblrlink_control', array( 'label' => esc_html__( 'Tumblr URL', 'clean-gallery' ), 'section' => 'sc_cleangallery_sociallinks', 'settings' => 'cleangallery_options[tumblrlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'cleangallery_options[digglink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'cleangallery_digglink_control', array( 'label' => esc_html__( 'Digg URL', 'clean-gallery' ), 'section' => 'sc_cleangallery_sociallinks', 'settings' => 'cleangallery_options[digglink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'cleangallery_options[deliciouslink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'cleangallery_deliciouslink_control', array( 'label' => esc_html__( 'Delicious URL', 'clean-gallery' ), 'section' => 'sc_cleangallery_sociallinks', 'settings' => 'cleangallery_options[deliciouslink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'cleangallery_options[stumblelink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'cleangallery_stumblelink_control', array( 'label' => esc_html__( 'Stumbleupon Link', 'clean-gallery' ), 'section' => 'sc_cleangallery_sociallinks', 'settings' => 'cleangallery_options[stumblelink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'cleangallery_options[redditlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'cleangallery_redditlink_control', array( 'label' => esc_html__( 'Reddit Link', 'clean-gallery' ), 'section' => 'sc_cleangallery_sociallinks', 'settings' => 'cleangallery_options[redditlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'cleangallery_options[dribbblelink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'cleangallery_dribbblelink_control', array( 'label' => esc_html__( 'Dribbble Link', 'clean-gallery' ), 'section' => 'sc_cleangallery_sociallinks', 'settings' => 'cleangallery_options[dribbblelink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'cleangallery_options[behancelink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'cleangallery_behancelink_control', array( 'label' => esc_html__( 'Behance Link', 'clean-gallery' ), 'section' => 'sc_cleangallery_sociallinks', 'settings' => 'cleangallery_options[behancelink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'cleangallery_options[codepenlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'cleangallery_codepenlink_control', array( 'label' => esc_html__( 'Codepen Link', 'clean-gallery' ), 'section' => 'sc_cleangallery_sociallinks', 'settings' => 'cleangallery_options[codepenlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'cleangallery_options[jsfiddlelink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'cleangallery_jsfiddlelink_control', array( 'label' => esc_html__( 'JSFiddle Link', 'clean-gallery' ), 'section' => 'sc_cleangallery_sociallinks', 'settings' => 'cleangallery_options[jsfiddlelink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'cleangallery_options[stackoverflowlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'cleangallery_stackoverflowlink_control', array( 'label' => esc_html__( 'Stack Overflow Link', 'clean-gallery' ), 'section' => 'sc_cleangallery_sociallinks', 'settings' => 'cleangallery_options[stackoverflowlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'cleangallery_options[stackexchangelink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'cleangallery_stackexchangelink_control', array( 'label' => esc_html__( 'Stack Exchange Link', 'clean-gallery' ), 'section' => 'sc_cleangallery_sociallinks', 'settings' => 'cleangallery_options[stackexchangelink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'cleangallery_options[bsalink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'cleangallery_bsalink_control', array( 'label' => esc_html__( 'BuySellAds Link', 'clean-gallery' ), 'section' => 'sc_cleangallery_sociallinks', 'settings' => 'cleangallery_options[bsalink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'cleangallery_options[slidesharelink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'cleangallery_slidesharelink_control', array( 'label' => esc_html__( 'SlideShare Link', 'clean-gallery' ), 'section' => 'sc_cleangallery_sociallinks', 'settings' => 'cleangallery_options[slidesharelink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'cleangallery_options[skypeusername]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_text_field' ) );

    $wp_customize->add_control( 'cleangallery_skypeusername_control', array( 'label' => esc_html__( 'Skype Username', 'clean-gallery' ), 'section' => 'sc_cleangallery_sociallinks', 'settings' => 'cleangallery_options[skypeusername]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'cleangallery_options[emailaddress]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'cleangallery_sanitize_email' ) );

    $wp_customize->add_control( 'cleangallery_emailaddress_control', array( 'label' => esc_html__( 'Email Address', 'clean-gallery' ), 'section' => 'sc_cleangallery_sociallinks', 'settings' => 'cleangallery_options[emailaddress]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'cleangallery_options[rsslink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'cleangallery_rsslink_control', array( 'label' => esc_html__( 'RSS Feed URL', 'clean-gallery' ), 'section' => 'sc_cleangallery_sociallinks', 'settings' => 'cleangallery_options[rsslink]', 'type' => 'text' ) );

    // Header
    $wp_customize->add_section( 'sc_cleangallery_header', array( 'title' => esc_html__( 'Header', 'clean-gallery' ), 'panel' => 'cleangallery_main_options_panel', 'priority' => 400 ) );

    $wp_customize->add_setting( 'cleangallery_options[hide_top_bar]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'cleangallery_sanitize_checkbox', ) );

    $wp_customize->add_control( 'cleangallery_hide_top_bar_control', array( 'label' => esc_html__( 'Hide Top Bar', 'clean-gallery' ), 'section' => 'sc_cleangallery_header', 'settings' => 'cleangallery_options[hide_top_bar]', 'type' => 'checkbox', ) );

     // Footer   
    $wp_customize->add_section( 'sc_cleangallery_footer', array( 'title' => esc_html__( 'Footer', 'clean-gallery' ), 'panel' => 'cleangallery_main_options_panel', 'priority' => 440 ) );

    $wp_customize->add_setting( 'cleangallery_options[hide_footer_widgets]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'cleangallery_sanitize_checkbox', ) );

    $wp_customize->add_control( 'cleangallery_hide_footer_widgets_control', array( 'label' => esc_html__( 'Hide Footer Widgets', 'clean-gallery' ), 'section' => 'sc_cleangallery_footer', 'settings' => 'cleangallery_options[hide_footer_widgets]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'cleangallery_options[footer_text]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'cleangallery_sanitize_html', ) );

    $wp_customize->add_control( 'cleangallery_footer_text_control', array( 'label' => esc_html__( 'Footer copyright notice', 'clean-gallery' ), 'section' => 'sc_cleangallery_footer', 'settings' => 'cleangallery_options[footer_text]', 'type' => 'text', ) );

    $wp_customize->add_setting( 'cleangallery_options[hide_credit]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'cleangallery_sanitize_checkbox', ) );

    $wp_customize->add_control( 'cleangallery_hide_credit_control', array( 'label' => esc_html__( 'Hide Theme Designer Credits', 'clean-gallery' ), 'section' => 'sc_cleangallery_footer', 'settings' => 'cleangallery_options[hide_credit]', 'type' => 'checkbox', ) );

    // Recommended Plugins
    $wp_customize->add_section( 'sc_recommended_plugins', array( 'title' => esc_html__( 'Recommended Plugins', 'clean-gallery' ), 'panel' => 'cleangallery_main_options_panel', 'priority' => 880 ));

    $wp_customize->add_setting( 'cleangallery_options[recommended_plugins]', array( 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'cleangallery_sanitize_recommended_plugins' ) );

    $wp_customize->add_control( new CleanGallery_Recommended_Plugins( $wp_customize, 'cleangallery_recommended_plugins_control', array( 'label' => esc_html__( 'Recommended Plugins', 'clean-gallery' ), 'section' => 'sc_recommended_plugins', 'settings' => 'cleangallery_options[recommended_plugins]', 'type' => 'recommended_wpplugins' ) ) );

    $wp_customize->add_section( 'sc_cleangallery_upgrade', array( 'title' => esc_html__( 'Upgrade to Pro', 'clean-gallery' ), 'priority' => 200 ) );

    $wp_customize->add_setting( 'cleangallery_options[upgrade_text]', array( 'default' => '', 'sanitize_callback' => '__return_false', ) );

    $wp_customize->add_control( new CleanGallery_Customize_Static_Text_Control( $wp_customize, 'cleangallery_upgrade_text_control', array(
        'label'       => esc_html__( 'Clean Gallery Pro', 'clean-gallery' ),
        'section'     => 'sc_cleangallery_upgrade',
        'settings' => 'cleangallery_options[upgrade_text]',
        'description' => esc_html__( 'Do you enjoy Clean Gallery? Upgrade to Clean Gallery Pro now and get:', 'clean-gallery' ).
            '<ul class="cleangallery-customizer-pro-features">' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'More Color Options', 'clean-gallery' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'Font Options / Google Web Fonts', 'clean-gallery' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'Layout Options (full-width / content+sidebar / sidebar+content)', 'clean-gallery' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'Custom Page Templates (full-width / content+sidebar / sidebar+content)', 'clean-gallery' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'Custom Widgets (Social Widget, About Me Widget, Recent/Popular/Random Posts widgets with thumbnails)', 'clean-gallery' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( '2 Header Layouts (full-width header or header+728x90 ad)', 'clean-gallery' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'Many Widget Areas', 'clean-gallery' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'Advanced Post Navigation', 'clean-gallery' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'Built-in Related Posts with Thumbnails', 'clean-gallery' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'Built-in Share Buttons', 'clean-gallery' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'Author Bio Box with Social Buttons', 'clean-gallery' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'Search Engine Optimized', 'clean-gallery' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'WooCommerce Support', 'clean-gallery' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'More Customizer options...', 'clean-gallery' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'Priority Support', 'clean-gallery' ) . '</li>' .
            '</ul>'.
            '<strong><a href="'.CLEANGALLERY_PROURL.'" class="button button-primary" target="_blank"><i class="fa fa-shopping-cart"></i> ' . esc_html__( 'Upgrade To Clean Gallery Pro', 'clean-gallery' ) . '</a></strong>'
    ) ) );

}

function cleangallery_sanitize_checkbox( $input ) {
    if ( $input == 1 ) {
        return 1;
    } else {
        return '';
    }
}

function cleangallery_sanitize_html( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}

function cleangallery_sanitize_email( $input ) {

    if ( '' != $input && is_email( $input ) ) {
        $input = sanitize_email( $input );
    } else {
        $input = '';
    }
    return $input;
}

add_action( 'customize_register', 'cleangallery_register_theme_customizer' );

function cleangallery_customizer_js_scripts() {    
    wp_enqueue_script('cleangallery-theme-customizer-js', get_template_directory_uri() . '/admin/js/customizer.js', array( 'jquery', 'customize-preview' ), NULL, true);
}
add_action( 'customize_preview_init', 'cleangallery_customizer_js_scripts' );
?>