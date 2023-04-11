<?php
/**
 * BlockPress support.
 *
 * @since   6.0.0
 * @package WooCommerce\Classes
 */

use Automattic\Jetpack\Constants;

defined('ABSPATH') || exit;

/**
 * WC_Theme class.
 */
class WC_Theme
{

    /**
     * Theme init.
     */
    public static function init()
    {
        global $theme_options;

        $suffix = defined('SCRIPT_DEBUG') && SCRIPT_DEBUG ? '' : '.min';

        add_filter('woocommerce_enqueue_styles', array( __CLASS__, '_dequeue_styles'));

        add_action('wp_enqueue_scripts', array( __CLASS__, '_enqueue_styles'), 11 );

        // Remove woocommerce_breadcrumb.
        remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);

        // Hide woocommerce_show_page_title.
        add_filter('woocommerce_show_page_title', array( __CLASS__, 'woocommerce_show_page_title' ));

        // This theme doesn't have a traditional sidebar.
        remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);

        // Wrap checkout form elements for styling.
        add_action('woocommerce_checkout_before_order_review_heading', array( __CLASS__, 'before_order_review' ));
        add_action('woocommerce_checkout_after_order_review', array( __CLASS__, 'after_order_review' ));

        remove_action( 'woocommerce_archive_description', 'woocommerce_taxonomy_archive_description', 10 );
        remove_action( 'woocommerce_archive_description', 'woocommerce_product_archive_description', 10 );


        // Add open tag for "woocommerce-product-summary" woocommerce_before_single_product_summary
        add_action('woocommerce_before_single_product_summary', array( __CLASS__, 'woocommerce_before_single_product_summary_open' ));
       
        // Add close tag for "woocommerce-product-summary" woocommerce_after_single_product_summary
        add_action('woocommerce_after_single_product_summary', array( __CLASS__, 'woocommerce_after_single_product_summary_close' ), 0);

        // Change position On Salse Single product page
        remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );
        add_action( 'woocommerce_product_thumbnails', 'woocommerce_show_product_sale_flash', 0 );

        $single_product_title = is_array($theme_options) && isset($theme_options['single_product_title']) ? (boolean)$theme_options['single_product_title'] : false;

        if( $single_product_title === false ){
            // Remove title
            remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
        }

        add_filter('woocommerce_placeholder_img_src', array( __CLASS__, '_woocommerce_placeholder_img_src' ));
        
        add_filter('woocommerce_placeholder_img', array( __CLASS__, '_woocommerce_placeholder_img' ), 10, 3);

        // Register theme features.
        add_theme_support('wc-product-gallery-zoom');
        add_theme_support('wc-product-gallery-lightbox');
        add_theme_support('wc-product-gallery-slider');
        add_theme_support('woocommerce');

        $editorStyle = array(
            './assets/css/woocommerce'.$suffix.'.css',
        );

        $editorStyle = apply_filters( '_theme_wc_add_editor_style', $editorStyle );

        add_editor_style( $editorStyle );

        add_filter( 'default_template_types', array( __CLASS__, 'default_template_types' ), 10 );
 
        
    }

    public static function woocommerce_before_single_product_summary_open(){
        echo '<div class="woocommerce-product-summary">';
    }

    public static function woocommerce_after_single_product_summary_close(){
        echo '</div>';
    }

    public static function _woocommerce_placeholder_img_src( $src ){
        if( file_exists( get_stylesheet_directory() .'/assets/images/placeholder.jpg' ) ){
            $src = get_stylesheet_directory_uri() .'/assets/images/placeholder.jpg';
        }else{
            $src = get_template_directory_uri() .'/assets/images/placeholder.jpg';
        }
        return $src;
    }

    public static function _woocommerce_placeholder_img( $image_html, $size, $dimensions ) {

        $attr = '';

        $dimensions        = wc_get_image_size( $size );

        $default_attr = array(
            'class' => 'woocommerce-placeholder wp-post-image',
            'alt'   => __( 'Placeholder', 'woocommerce' ),
        );

        $attr = wp_parse_args( $attr, $default_attr );

        if( file_exists( get_stylesheet_directory() .'/assets/images/placeholder.jpg' ) ){
            $image = get_stylesheet_directory_uri() .'/assets/images/placeholder.jpg';
        }else{
            $image      =  get_template_directory_uri() .'/assets/images/placeholder.jpg';
        }

        $hwstring   = image_hwstring( $dimensions['width'], $dimensions['height'] );
        $attributes = array();

        foreach ( $attr as $name => $value ) {
            $attribute[] = esc_attr( $name ) . '="' . esc_attr( $value ) . '"';
        }

        $image_html = '<img src="' . esc_url( $image ) . '" ' . $hwstring . implode( ' ', $attribute ) . '/>';

        return $image_html;
    }

    public static function default_template_types( $default_template_types ) {

        $default_template_types['single-product'] = array(
            'title'       => esc_attr__( 'Single product' ),
            'description' => '',
        );

        $default_template_types['archive-product'] = array(
            'title'       => esc_attr__( 'Archive Product' ),
            'description' => '',
        );

        $default_template_types['taxonomy-product_cat'] = array(
            'title'       => esc_attr__( 'Product categories' ),
            'description' => '',
        );

        $default_template_types['taxonomy-product_tag'] = array(
            'title'       => esc_attr__( 'Product tags' ),
            'description' => '',
        );
        
        return $default_template_types;
    }

    public static function _enqueue_styles()
    {

        $suffix = defined('SCRIPT_DEBUG') && SCRIPT_DEBUG ? '' : '.min';

        $addStyle = true;

        $addStyle = apply_filters( '_theme_wc_add_style', $addStyle );

        if( $addStyle ){
            wp_enqueue_style(
                'theme-woocommerce-style',
                get_theme_file_uri('assets/css/woocommerce'.$suffix.'.css'),
                array(),
                DAT_VERSION
            );
        }
    }

    public static function _theme_tweak_layout_result_count_catalog_ordering(){
        remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
        remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
    }

    /**
     * Woocommerce
     * add_filter( 'woocommerce_enqueue_styles', '__return_false' ); */

    public static function _dequeue_styles($enqueue_styles)
    {

        //unset( $enqueue_styles['woocommerce-general'] );  // Remove woocommerce.css
        //unset( $enqueue_styles['woocommerce-layout'] );       // Remove woocommerce-layout.css
        //unset( $enqueue_styles['woocommerce-smallscreen'] );  // Remove the woocommerce-smallscreen.css
        return $enqueue_styles;
    }

    /**
     * custom_woocommerce_template_loop_product_title
     * */

    public static function custom_woocommerce_template_loop_product_title()
    {
        echo '<h3 class="' . esc_attr(apply_filters('woocommerce_product_loop_title_classes', 'woocommerce-loop-product__title')) . '">' . esc_attr(get_the_title()) . '</h3>';
    }

    /**
     * custom_wc_loop_product_title
     * */

    public static function custom_wc_loop_product_title()
    {

        if (is_home() || is_front_page()) {
            remove_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);
            add_action('woocommerce_shop_loop_item_title', array( __CLASS__, 'custom_woocommerce_template_loop_product_title', 10));
        }
    }

    public static function woocommerce_show_page_title($display)
    {
        $display = false;
        return $display;
    }

    /**
     * Wrap checkout order review with a `col2-set` div.
     */
    public static function before_order_review()
    {
        echo '<div class="col2-set">';
    }

    /**
     * Close the div wrapper.
     */
    public static function after_order_review()
    {
        echo '</div>';
    }
}

WC_Theme::init();
