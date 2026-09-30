<?php
/**
 * Functions and definitions
 * @package Dat
 */

/**
 * The theme version.
 */

define('DAT_VERSION', wp_get_theme( get_template() )->get('Version'));

// Theme settings.
require_once 'classes/class-theme-settings.php';
global $theme_options, $pos;
$theme_settings = new Theme_Settings();
$theme_options = $theme_settings->get_settings();

// Theme support.
require_once 'classes/class-theme-support.php';

// Theme support.
require_once 'classes/class-theme-hook.php';

// Block styles.
require_once 'inc/block-styles.php';
require_once 'inc/patterns.php';

// Woocommerce hook.
if (class_exists('WooCommerce')) {
    require_once 'woocommerce/class-wc-theme.php';
    require_once 'inc/wc-patterns.php';
}

// Maintenance
$request_uri = isset( $_SERVER['REQUEST_URI'] ) ? sanitize_text_field( wp_unslash( $_SERVER['REQUEST_URI'] ) ) : '';
$pos = strpos( $request_uri , 'wp-login.php');

if( class_exists('\A3Rev\DKeeper\Doorkeeper') ){

    $wp_hide_login      = get_option( 'wp_hide_login' );
    $wp_hide_login_slug = get_option( 'wp_hide_login_slug' );

    $wp_hide_login_slug2 = $wp_hide_login_slug;

    if( $wp_hide_login_slug !== '' ){
        $wp_hide_login_slug = '/'.$wp_hide_login_slug;
        $wp_hide_login_slug2 = $wp_hide_login_slug.'/';
    }else{
        $wp_hide_login_slug = '/wp-login.php';
    }

    if( $wp_hide_login == 'yes' && $request_uri == $wp_hide_login_slug ){
        $pos = true;
    }

    if( $wp_hide_login == 'yes' && $request_uri == $wp_hide_login_slug2 ){
        $pos = true;
    }

}

if( $pos === false ){

    global $theme_options;

    $site_maintenance = is_array($theme_options) && isset($theme_options['site_maintenance']) ? (boolean)$theme_options['site_maintenance'] : false;

    $is_ajax_login = strpos( $request_uri , 'admin-ajax.php');

    if( !is_user_logged_in() && $site_maintenance && !$is_ajax_login ){
        if( $request_uri != '/maintenance/' ){
            wp_redirect(get_home_url().'/maintenance/');
            exit();
        }
    }
}

//https://core.trac.wordpress.org/ticket/58366
/*
add_filter('register_block_type_args', function ($settings, $name) {
    if ($name === 'core/shortcode') {
        $settings['render_callback'] = function ($attributes, $content) {
                return $content;
        };
    }
    return $settings;
}, 10, 2);
*/
