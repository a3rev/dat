<?php
/**
 * Block styles.
 *
 * @package BlockPress
 */

/**
 * Register block styles
 */

function _theme_register_block_styles()
{

    if (function_exists('register_block_style')) {
        register_block_style( // phpcs:ignore WPThemeReview.PluginTerritory.ForbiddenFunctions.editor_blocks_register_block_style
            'core/template-part',
            array(
                'name'  => 'sticky-header',
                'label' => __('Sticky header'),
            )
        );
    }
}

add_action('after_setup_theme', '_theme_register_block_styles');
