<?php

class Theme_Support
{

    /**
     * Constructor.
     *
     * @access public
     */
    public function __construct()
    {
        add_action('after_setup_theme', [ $this, 'action_setup' ]);
        add_action('after_setup_theme', [ $this, 'action_content_width' ], 0);
    }

    /**
     * Adds theme-supports.
     *
     * @access public
     * @return void
     */
    public function action_setup()
    {

        $suffix = defined('SCRIPT_DEBUG') && SCRIPT_DEBUG ? '' : '.min';

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');
        add_theme_support('post-thumbnails');

        /*
        * Switch default core markup to output valid HTML5.
        * The comments block uses the markup from the comments template.
        */
        add_theme_support(
            'html5',
            [
                'comment-form',
                'comment-list',
            ]
        );

        // Add support for Block Styles.
        add_theme_support('wp-block-styles');

            // Enqueue editor styles.
        add_theme_support('editor-styles');

        $editorStyle = array(
            './assets/css/poppins.min.css',
            './assets/css/theme-layout'.$suffix.'.css',
            'style.css',
        );

        $editorStyle = apply_filters( '_theme_add_editor_style', $editorStyle );

        add_editor_style( $editorStyle );

        // Add support for responsive embedded content.
        add_theme_support('responsive-embeds');

        add_theme_support('custom-spacing');
        add_theme_support('custom-units', array( "px", "em", "rem", "%", "vw", "vh" ));
        add_theme_support('align-wide');
        add_theme_support('block-templates');
        add_theme_support('menus');
        //add_theme_support('widgets');
    }

    /**
     * Set the content width based on the theme's design and stylesheet.
     *
     * Priority 0 to make it available to lower priority callbacks.
     *
     * @global int $content_width Content width.
     * @access public
     */
    public function action_content_width()
    {
        // This variable is intended to be overruled from themes.
        // Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
		// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
        $GLOBALS['content_width'] = apply_filters('_theme_content_width', 1024);
    }
}

new Theme_Support();
