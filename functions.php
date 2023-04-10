<?php
/**
 * Functions and definitions
 * @package Dat
 */

/**
 * The theme version.
 */

define('DAT_VERSION', wp_get_theme()->get('Version'));

// Theme settings.
require_once 'classes/class-theme-settings.php';
global $theme_options;
$theme_settings = new Theme_Settings();
$theme_options = $theme_settings->get_settings();

// Theme support.
require_once 'classes/class-theme-support.php';

// Theme support.
require_once 'classes/class-theme-hook.php';

// Block styles.
require_once 'inc/block-styles.php';

// Woocommerce hook.
if (class_exists('WooCommerce')) {
    require_once 'woocommerce/class-wc-theme.php';
}

// Maintenance
$pos = strpos( $_SERVER['REQUEST_URI'] , 'wp-login.php');

if( $pos == false ){

    global $theme_options;

    $site_maintenance = is_array($theme_options) && isset($theme_options['site_maintenance']) ? (boolean)$theme_options['site_maintenance'] : false;

    if( !is_user_logged_in() && $site_maintenance ){

        if($_SERVER['REQUEST_URI'] != '/maintenance/'){
            wp_redirect(get_home_url().'/maintenance/');
            exit();
        }
    }
}