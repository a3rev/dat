<?php

class Theme_Hook
{

    private $theme_json = null;
    private $blocks_supports = null;

    /**
     * Constructor.
     *
     * @access public
     */
    public function __construct()
    {
        add_action('after_setup_theme', [ $this, 'action_hook' ]);

        add_action('wp_ajax_nopriv_ajax_login', [ $this, '_theme_ajax_login' ]);
        add_action('wp_ajax_ajax_login', [ $this, '_theme_ajax_login' ]);

        // Popup login
        add_action('wp_footer', [ $this, '_theme_popup_login' ]);

        // Tweak custom login
        add_action('login_footer', [ $this, '_theme_tweak_custom_login' ], 99);

        add_action('admin_enqueue_scripts', [ $this, '_theme_admin_styles' ]);

        add_filter('the_title', [ $this, '_theme_the_title' ]);

        add_action('wp_enqueue_scripts', [ $this, '_theme_enqueue_styles' ], 0);

    }

    public function webfonts_local(){

        //$fontFaces = file_get_contents( get_template_directory().'/assets/css/poppins.min.css' );

        $fontFaces = "@font-face{font-family:'Poppins';font-style:italic;font-weight:100;font-display:swap;src:url(/wp-content/themes/dat/assets/fonts/poppins/pxiAyp8kv8JHgFVrJJLmE0tDMPKhSkFEkm8.woff2) format('woff2');unicode-range:U+0900-097F,U+1CD0-1CF6,U+1CF8-1CF9,U+200C-200D,U+20A8,U+20B9,U+25CC,U+A830-A839,U+A8E0-A8FB}@font-face{font-family:'Poppins';font-style:italic;font-weight:100;font-display:swap;src:url(/wp-content/themes/dat/assets/fonts/poppins/pxiAyp8kv8JHgFVrJJLmE0tMMPKhSkFEkm8.woff2) format('woff2');unicode-range:U+0100-024F,U+0259,U+1E00-1EFF,U+2020,U+20A0-20AB,U+20AD-20CF,U+2113,U+2C60-2C7F,U+A720-A7FF}@font-face{font-family:'Poppins';font-style:italic;font-weight:100;font-display:swap;src:url(/wp-content/themes/dat/assets/fonts/poppins/pxiAyp8kv8JHgFVrJJLmE0tCMPKhSkFE.woff2) format('woff2');unicode-range:U+0000-00FF,U+0131,U+0152-0153,U+02BB-02BC,U+02C6,U+02DA,U+02DC,U+2000-206F,U+2074,U+20AC,U+2122,U+2191,U+2193,U+2212,U+2215,U+FEFF,U+FFFD}@font-face{font-family:'Poppins';font-style:italic;font-weight:200;font-display:swap;src:url(/wp-content/themes/dat/assets/fonts/poppins/pxiDyp8kv8JHgFVrJJLmv1pVFteOYktMqlap.woff2) format('woff2');unicode-range:U+0900-097F,U+1CD0-1CF6,U+1CF8-1CF9,U+200C-200D,U+20A8,U+20B9,U+25CC,U+A830-A839,U+A8E0-A8FB}@font-face{font-family:'Poppins';font-style:italic;font-weight:200;font-display:swap;src:url(/wp-content/themes/dat/assets/fonts/poppins/pxiDyp8kv8JHgFVrJJLmv1pVGdeOYktMqlap.woff2) format('woff2');unicode-range:U+0100-024F,U+0259,U+1E00-1EFF,U+2020,U+20A0-20AB,U+20AD-20CF,U+2113,U+2C60-2C7F,U+A720-A7FF}@font-face{font-family:'Poppins';font-style:italic;font-weight:200;font-display:swap;src:url(/wp-content/themes/dat/assets/fonts/poppins/pxiDyp8kv8JHgFVrJJLmv1pVF9eOYktMqg.woff2) format('woff2');unicode-range:U+0000-00FF,U+0131,U+0152-0153,U+02BB-02BC,U+02C6,U+02DA,U+02DC,U+2000-206F,U+2074,U+20AC,U+2122,U+2191,U+2193,U+2212,U+2215,U+FEFF,U+FFFD}@font-face{font-family:'Poppins';font-style:italic;font-weight:300;font-display:swap;src:url(/wp-content/themes/dat/assets/fonts/poppins/pxiDyp8kv8JHgFVrJJLm21lVFteOYktMqlap.woff2) format('woff2');unicode-range:U+0900-097F,U+1CD0-1CF6,U+1CF8-1CF9,U+200C-200D,U+20A8,U+20B9,U+25CC,U+A830-A839,U+A8E0-A8FB}@font-face{font-family:'Poppins';font-style:italic;font-weight:300;font-display:swap;src:url(/wp-content/themes/dat/assets/fonts/poppins/pxiDyp8kv8JHgFVrJJLm21lVGdeOYktMqlap.woff2) format('woff2');unicode-range:U+0100-024F,U+0259,U+1E00-1EFF,U+2020,U+20A0-20AB,U+20AD-20CF,U+2113,U+2C60-2C7F,U+A720-A7FF}@font-face{font-family:'Poppins';font-style:italic;font-weight:300;font-display:swap;src:url(/wp-content/themes/dat/assets/fonts/poppins/pxiDyp8kv8JHgFVrJJLm21lVF9eOYktMqg.woff2) format('woff2');unicode-range:U+0000-00FF,U+0131,U+0152-0153,U+02BB-02BC,U+02C6,U+02DA,U+02DC,U+2000-206F,U+2074,U+20AC,U+2122,U+2191,U+2193,U+2212,U+2215,U+FEFF,U+FFFD}@font-face{font-family:'Poppins';font-style:italic;font-weight:400;font-display:swap;src:url(/wp-content/themes/dat/assets/fonts/poppins/pxiGyp8kv8JHgFVrJJLucXtAOvWDSHFF.woff2) format('woff2');unicode-range:U+0900-097F,U+1CD0-1CF6,U+1CF8-1CF9,U+200C-200D,U+20A8,U+20B9,U+25CC,U+A830-A839,U+A8E0-A8FB}@font-face{font-family:'Poppins';font-style:italic;font-weight:400;font-display:swap;src:url(/wp-content/themes/dat/assets/fonts/poppins/pxiGyp8kv8JHgFVrJJLufntAOvWDSHFF.woff2) format('woff2');unicode-range:U+0100-024F,U+0259,U+1E00-1EFF,U+2020,U+20A0-20AB,U+20AD-20CF,U+2113,U+2C60-2C7F,U+A720-A7FF}@font-face{font-family:'Poppins';font-style:italic;font-weight:400;font-display:swap;src:url(/wp-content/themes/dat/assets/fonts/poppins/pxiGyp8kv8JHgFVrJJLucHtAOvWDSA.woff2) format('woff2');unicode-range:U+0000-00FF,U+0131,U+0152-0153,U+02BB-02BC,U+02C6,U+02DA,U+02DC,U+2000-206F,U+2074,U+20AC,U+2122,U+2191,U+2193,U+2212,U+2215,U+FEFF,U+FFFD}@font-face{font-family:'Poppins';font-style:italic;font-weight:500;font-display:swap;src:url(/wp-content/themes/dat/assets/fonts/poppins/pxiDyp8kv8JHgFVrJJLmg1hVFteOYktMqlap.woff2) format('woff2');unicode-range:U+0900-097F,U+1CD0-1CF6,U+1CF8-1CF9,U+200C-200D,U+20A8,U+20B9,U+25CC,U+A830-A839,U+A8E0-A8FB}@font-face{font-family:'Poppins';font-style:italic;font-weight:500;font-display:swap;src:url(/wp-content/themes/dat/assets/fonts/poppins/pxiDyp8kv8JHgFVrJJLmg1hVGdeOYktMqlap.woff2) format('woff2');unicode-range:U+0100-024F,U+0259,U+1E00-1EFF,U+2020,U+20A0-20AB,U+20AD-20CF,U+2113,U+2C60-2C7F,U+A720-A7FF}@font-face{font-family:'Poppins';font-style:italic;font-weight:500;font-display:swap;src:url(/wp-content/themes/dat/assets/fonts/poppins/pxiDyp8kv8JHgFVrJJLmg1hVF9eOYktMqg.woff2) format('woff2');unicode-range:U+0000-00FF,U+0131,U+0152-0153,U+02BB-02BC,U+02C6,U+02DA,U+02DC,U+2000-206F,U+2074,U+20AC,U+2122,U+2191,U+2193,U+2212,U+2215,U+FEFF,U+FFFD}@font-face{font-family:'Poppins';font-style:italic;font-weight:600;font-display:swap;src:url(/wp-content/themes/dat/assets/fonts/poppins/pxiDyp8kv8JHgFVrJJLmr19VFteOYktMqlap.woff2) format('woff2');unicode-range:U+0900-097F,U+1CD0-1CF6,U+1CF8-1CF9,U+200C-200D,U+20A8,U+20B9,U+25CC,U+A830-A839,U+A8E0-A8FB}@font-face{font-family:'Poppins';font-style:italic;font-weight:600;font-display:swap;src:url(/wp-content/themes/dat/assets/fonts/poppins/pxiDyp8kv8JHgFVrJJLmr19VGdeOYktMqlap.woff2) format('woff2');unicode-range:U+0100-024F,U+0259,U+1E00-1EFF,U+2020,U+20A0-20AB,U+20AD-20CF,U+2113,U+2C60-2C7F,U+A720-A7FF}@font-face{font-family:'Poppins';font-style:italic;font-weight:600;font-display:swap;src:url(/wp-content/themes/dat/assets/fonts/poppins/pxiDyp8kv8JHgFVrJJLmr19VF9eOYktMqg.woff2) format('woff2');unicode-range:U+0000-00FF,U+0131,U+0152-0153,U+02BB-02BC,U+02C6,U+02DA,U+02DC,U+2000-206F,U+2074,U+20AC,U+2122,U+2191,U+2193,U+2212,U+2215,U+FEFF,U+FFFD}@font-face{font-family:'Poppins';font-style:italic;font-weight:700;font-display:swap;src:url(/wp-content/themes/dat/assets/fonts/poppins/pxiDyp8kv8JHgFVrJJLmy15VFteOYktMqlap.woff2) format('woff2');unicode-range:U+0900-097F,U+1CD0-1CF6,U+1CF8-1CF9,U+200C-200D,U+20A8,U+20B9,U+25CC,U+A830-A839,U+A8E0-A8FB}@font-face{font-family:'Poppins';font-style:italic;font-weight:700;font-display:swap;src:url(/wp-content/themes/dat/assets/fonts/poppins/pxiDyp8kv8JHgFVrJJLmy15VGdeOYktMqlap.woff2) format('woff2');unicode-range:U+0100-024F,U+0259,U+1E00-1EFF,U+2020,U+20A0-20AB,U+20AD-20CF,U+2113,U+2C60-2C7F,U+A720-A7FF}@font-face{font-family:'Poppins';font-style:italic;font-weight:700;font-display:swap;src:url(/wp-content/themes/dat/assets/fonts/poppins/pxiDyp8kv8JHgFVrJJLmy15VF9eOYktMqg.woff2) format('woff2');unicode-range:U+0000-00FF,U+0131,U+0152-0153,U+02BB-02BC,U+02C6,U+02DA,U+02DC,U+2000-206F,U+2074,U+20AC,U+2122,U+2191,U+2193,U+2212,U+2215,U+FEFF,U+FFFD}@font-face{font-family:'Poppins';font-style:italic;font-weight:800;font-display:swap;src:url(/wp-content/themes/dat/assets/fonts/poppins/pxiDyp8kv8JHgFVrJJLm111VFteOYktMqlap.woff2) format('woff2');unicode-range:U+0900-097F,U+1CD0-1CF6,U+1CF8-1CF9,U+200C-200D,U+20A8,U+20B9,U+25CC,U+A830-A839,U+A8E0-A8FB}@font-face{font-family:'Poppins';font-style:italic;font-weight:800;font-display:swap;src:url(/wp-content/themes/dat/assets/fonts/poppins/pxiDyp8kv8JHgFVrJJLm111VGdeOYktMqlap.woff2) format('woff2');unicode-range:U+0100-024F,U+0259,U+1E00-1EFF,U+2020,U+20A0-20AB,U+20AD-20CF,U+2113,U+2C60-2C7F,U+A720-A7FF}@font-face{font-family:'Poppins';font-style:italic;font-weight:800;font-display:swap;src:url(/wp-content/themes/dat/assets/fonts/poppins/pxiDyp8kv8JHgFVrJJLm111VF9eOYktMqg.woff2) format('woff2');unicode-range:U+0000-00FF,U+0131,U+0152-0153,U+02BB-02BC,U+02C6,U+02DA,U+02DC,U+2000-206F,U+2074,U+20AC,U+2122,U+2191,U+2193,U+2212,U+2215,U+FEFF,U+FFFD}@font-face{font-family:'Poppins';font-style:italic;font-weight:900;font-display:swap;src:url(/wp-content/themes/dat/assets/fonts/poppins/pxiDyp8kv8JHgFVrJJLm81xVFteOYktMqlap.woff2) format('woff2');unicode-range:U+0900-097F,U+1CD0-1CF6,U+1CF8-1CF9,U+200C-200D,U+20A8,U+20B9,U+25CC,U+A830-A839,U+A8E0-A8FB}@font-face{font-family:'Poppins';font-style:italic;font-weight:900;font-display:swap;src:url(/wp-content/themes/dat/assets/fonts/poppins/pxiDyp8kv8JHgFVrJJLm81xVGdeOYktMqlap.woff2) format('woff2');unicode-range:U+0100-024F,U+0259,U+1E00-1EFF,U+2020,U+20A0-20AB,U+20AD-20CF,U+2113,U+2C60-2C7F,U+A720-A7FF}@font-face{font-family:'Poppins';font-style:italic;font-weight:900;font-display:swap;src:url(/wp-content/themes/dat/assets/fonts/poppins/pxiDyp8kv8JHgFVrJJLm81xVF9eOYktMqg.woff2) format('woff2');unicode-range:U+0000-00FF,U+0131,U+0152-0153,U+02BB-02BC,U+02C6,U+02DA,U+02DC,U+2000-206F,U+2074,U+20AC,U+2122,U+2191,U+2193,U+2212,U+2215,U+FEFF,U+FFFD}@font-face{font-family:'Poppins';font-style:normal;font-weight:100;font-display:swap;src:url(/wp-content/themes/dat/assets/fonts/poppins/pxiGyp8kv8JHgFVrLPTucXtAOvWDSHFF.woff2) format('woff2');unicode-range:U+0900-097F,U+1CD0-1CF6,U+1CF8-1CF9,U+200C-200D,U+20A8,U+20B9,U+25CC,U+A830-A839,U+A8E0-A8FB}@font-face{font-family:'Poppins';font-style:normal;font-weight:100;font-display:swap;src:url(/wp-content/themes/dat/assets/fonts/poppins/pxiGyp8kv8JHgFVrLPTufntAOvWDSHFF.woff2) format('woff2');unicode-range:U+0100-024F,U+0259,U+1E00-1EFF,U+2020,U+20A0-20AB,U+20AD-20CF,U+2113,U+2C60-2C7F,U+A720-A7FF}@font-face{font-family:'Poppins';font-style:normal;font-weight:100;font-display:swap;src:url(/wp-content/themes/dat/assets/fonts/poppins/pxiGyp8kv8JHgFVrLPTucHtAOvWDSA.woff2) format('woff2');unicode-range:U+0000-00FF,U+0131,U+0152-0153,U+02BB-02BC,U+02C6,U+02DA,U+02DC,U+2000-206F,U+2074,U+20AC,U+2122,U+2191,U+2193,U+2212,U+2215,U+FEFF,U+FFFD}@font-face{font-family:'Poppins';font-style:normal;font-weight:200;font-display:swap;src:url(/wp-content/themes/dat/assets/fonts/poppins/pxiByp8kv8JHgFVrLFj_Z11lFd2JQEl8qw.woff2) format('woff2');unicode-range:U+0900-097F,U+1CD0-1CF6,U+1CF8-1CF9,U+200C-200D,U+20A8,U+20B9,U+25CC,U+A830-A839,U+A8E0-A8FB}@font-face{font-family:'Poppins';font-style:normal;font-weight:200;font-display:swap;src:url(/wp-content/themes/dat/assets/fonts/poppins/pxiByp8kv8JHgFVrLFj_Z1JlFd2JQEl8qw.woff2) format('woff2');unicode-range:U+0100-024F,U+0259,U+1E00-1EFF,U+2020,U+20A0-20AB,U+20AD-20CF,U+2113,U+2C60-2C7F,U+A720-A7FF}@font-face{font-family:'Poppins';font-style:normal;font-weight:200;font-display:swap;src:url(/wp-content/themes/dat/assets/fonts/poppins/pxiByp8kv8JHgFVrLFj_Z1xlFd2JQEk.woff2) format('woff2');unicode-range:U+0000-00FF,U+0131,U+0152-0153,U+02BB-02BC,U+02C6,U+02DA,U+02DC,U+2000-206F,U+2074,U+20AC,U+2122,U+2191,U+2193,U+2212,U+2215,U+FEFF,U+FFFD}@font-face{font-family:'Poppins';font-style:normal;font-weight:300;font-display:swap;src:url(/wp-content/themes/dat/assets/fonts/poppins/pxiByp8kv8JHgFVrLDz8Z11lFd2JQEl8qw.woff2) format('woff2');unicode-range:U+0900-097F,U+1CD0-1CF6,U+1CF8-1CF9,U+200C-200D,U+20A8,U+20B9,U+25CC,U+A830-A839,U+A8E0-A8FB}@font-face{font-family:'Poppins';font-style:normal;font-weight:300;font-display:swap;src:url(/wp-content/themes/dat/assets/fonts/poppins/pxiByp8kv8JHgFVrLDz8Z1JlFd2JQEl8qw.woff2) format('woff2');unicode-range:U+0100-024F,U+0259,U+1E00-1EFF,U+2020,U+20A0-20AB,U+20AD-20CF,U+2113,U+2C60-2C7F,U+A720-A7FF}@font-face{font-family:'Poppins';font-style:normal;font-weight:300;font-display:swap;src:url(/wp-content/themes/dat/assets/fonts/poppins/pxiByp8kv8JHgFVrLDz8Z1xlFd2JQEk.woff2) format('woff2');unicode-range:U+0000-00FF,U+0131,U+0152-0153,U+02BB-02BC,U+02C6,U+02DA,U+02DC,U+2000-206F,U+2074,U+20AC,U+2122,U+2191,U+2193,U+2212,U+2215,U+FEFF,U+FFFD}@font-face{font-family:'Poppins';font-style:normal;font-weight:400;font-display:swap;src:url(/wp-content/themes/dat/assets/fonts/poppins/pxiEyp8kv8JHgFVrJJbecnFHGPezSQ.woff2) format('woff2');unicode-range:U+0900-097F,U+1CD0-1CF6,U+1CF8-1CF9,U+200C-200D,U+20A8,U+20B9,U+25CC,U+A830-A839,U+A8E0-A8FB}@font-face{font-family:'Poppins';font-style:normal;font-weight:400;font-display:swap;src:url(/wp-content/themes/dat/assets/fonts/poppins/pxiEyp8kv8JHgFVrJJnecnFHGPezSQ.woff2) format('woff2');unicode-range:U+0100-024F,U+0259,U+1E00-1EFF,U+2020,U+20A0-20AB,U+20AD-20CF,U+2113,U+2C60-2C7F,U+A720-A7FF}@font-face{font-family:'Poppins';font-style:normal;font-weight:400;font-display:swap;src:url(/wp-content/themes/dat/assets/fonts/poppins/pxiEyp8kv8JHgFVrJJfecnFHGPc.woff2) format('woff2');unicode-range:U+0000-00FF,U+0131,U+0152-0153,U+02BB-02BC,U+02C6,U+02DA,U+02DC,U+2000-206F,U+2074,U+20AC,U+2122,U+2191,U+2193,U+2212,U+2215,U+FEFF,U+FFFD}@font-face{font-family:'Poppins';font-style:normal;font-weight:500;font-display:swap;src:url(/wp-content/themes/dat/assets/fonts/poppins/pxiByp8kv8JHgFVrLGT9Z11lFd2JQEl8qw.woff2) format('woff2');unicode-range:U+0900-097F,U+1CD0-1CF6,U+1CF8-1CF9,U+200C-200D,U+20A8,U+20B9,U+25CC,U+A830-A839,U+A8E0-A8FB}@font-face{font-family:'Poppins';font-style:normal;font-weight:500;font-display:swap;src:url(/wp-content/themes/dat/assets/fonts/poppins/pxiByp8kv8JHgFVrLGT9Z1JlFd2JQEl8qw.woff2) format('woff2');unicode-range:U+0100-024F,U+0259,U+1E00-1EFF,U+2020,U+20A0-20AB,U+20AD-20CF,U+2113,U+2C60-2C7F,U+A720-A7FF}@font-face{font-family:'Poppins';font-style:normal;font-weight:500;font-display:swap;src:url(/wp-content/themes/dat/assets/fonts/poppins/pxiByp8kv8JHgFVrLGT9Z1xlFd2JQEk.woff2) format('woff2');unicode-range:U+0000-00FF,U+0131,U+0152-0153,U+02BB-02BC,U+02C6,U+02DA,U+02DC,U+2000-206F,U+2074,U+20AC,U+2122,U+2191,U+2193,U+2212,U+2215,U+FEFF,U+FFFD}@font-face{font-family:'Poppins';font-style:normal;font-weight:600;font-display:swap;src:url(/wp-content/themes/dat/assets/fonts/poppins/pxiByp8kv8JHgFVrLEj6Z11lFd2JQEl8qw.woff2) format('woff2');unicode-range:U+0900-097F,U+1CD0-1CF6,U+1CF8-1CF9,U+200C-200D,U+20A8,U+20B9,U+25CC,U+A830-A839,U+A8E0-A8FB}@font-face{font-family:'Poppins';font-style:normal;font-weight:600;font-display:swap;src:url(/wp-content/themes/dat/assets/fonts/poppins/pxiByp8kv8JHgFVrLEj6Z1JlFd2JQEl8qw.woff2) format('woff2');unicode-range:U+0100-024F,U+0259,U+1E00-1EFF,U+2020,U+20A0-20AB,U+20AD-20CF,U+2113,U+2C60-2C7F,U+A720-A7FF}@font-face{font-family:'Poppins';font-style:normal;font-weight:600;font-display:swap;src:url(/wp-content/themes/dat/assets/fonts/poppins/pxiByp8kv8JHgFVrLEj6Z1xlFd2JQEk.woff2) format('woff2');unicode-range:U+0000-00FF,U+0131,U+0152-0153,U+02BB-02BC,U+02C6,U+02DA,U+02DC,U+2000-206F,U+2074,U+20AC,U+2122,U+2191,U+2193,U+2212,U+2215,U+FEFF,U+FFFD}@font-face{font-family:'Poppins';font-style:normal;font-weight:700;font-display:swap;src:url(/wp-content/themes/dat/assets/fonts/poppins/pxiByp8kv8JHgFVrLCz7Z11lFd2JQEl8qw.woff2) format('woff2');unicode-range:U+0900-097F,U+1CD0-1CF6,U+1CF8-1CF9,U+200C-200D,U+20A8,U+20B9,U+25CC,U+A830-A839,U+A8E0-A8FB}@font-face{font-family:'Poppins';font-style:normal;font-weight:700;font-display:swap;src:url(/wp-content/themes/dat/assets/fonts/poppins/pxiByp8kv8JHgFVrLCz7Z1JlFd2JQEl8qw.woff2) format('woff2');unicode-range:U+0100-024F,U+0259,U+1E00-1EFF,U+2020,U+20A0-20AB,U+20AD-20CF,U+2113,U+2C60-2C7F,U+A720-A7FF}@font-face{font-family:'Poppins';font-style:normal;font-weight:700;font-display:swap;src:url(/wp-content/themes/dat/assets/fonts/poppins/pxiByp8kv8JHgFVrLCz7Z1xlFd2JQEk.woff2) format('woff2');unicode-range:U+0000-00FF,U+0131,U+0152-0153,U+02BB-02BC,U+02C6,U+02DA,U+02DC,U+2000-206F,U+2074,U+20AC,U+2122,U+2191,U+2193,U+2212,U+2215,U+FEFF,U+FFFD}@font-face{font-family:'Poppins';font-style:normal;font-weight:800;font-display:swap;src:url(/wp-content/themes/dat/assets/fonts/poppins/pxiByp8kv8JHgFVrLDD4Z11lFd2JQEl8qw.woff2) format('woff2');unicode-range:U+0900-097F,U+1CD0-1CF6,U+1CF8-1CF9,U+200C-200D,U+20A8,U+20B9,U+25CC,U+A830-A839,U+A8E0-A8FB}@font-face{font-family:'Poppins';font-style:normal;font-weight:800;font-display:swap;src:url(/wp-content/themes/dat/assets/fonts/poppins/pxiByp8kv8JHgFVrLDD4Z1JlFd2JQEl8qw.woff2) format('woff2');unicode-range:U+0100-024F,U+0259,U+1E00-1EFF,U+2020,U+20A0-20AB,U+20AD-20CF,U+2113,U+2C60-2C7F,U+A720-A7FF}@font-face{font-family:'Poppins';font-style:normal;font-weight:800;font-display:swap;src:url(/wp-content/themes/dat/assets/fonts/poppins/pxiByp8kv8JHgFVrLDD4Z1xlFd2JQEk.woff2) format('woff2');unicode-range:U+0000-00FF,U+0131,U+0152-0153,U+02BB-02BC,U+02C6,U+02DA,U+02DC,U+2000-206F,U+2074,U+20AC,U+2122,U+2191,U+2193,U+2212,U+2215,U+FEFF,U+FFFD}@font-face{font-family:'Poppins';font-style:normal;font-weight:900;font-display:swap;src:url(/wp-content/themes/dat/assets/fonts/poppins/pxiByp8kv8JHgFVrLBT5Z11lFd2JQEl8qw.woff2) format('woff2');unicode-range:U+0900-097F,U+1CD0-1CF6,U+1CF8-1CF9,U+200C-200D,U+20A8,U+20B9,U+25CC,U+A830-A839,U+A8E0-A8FB}@font-face{font-family:'Poppins';font-style:normal;font-weight:900;font-display:swap;src:url(/wp-content/themes/dat/assets/fonts/poppins/pxiByp8kv8JHgFVrLBT5Z1JlFd2JQEl8qw.woff2) format('woff2');unicode-range:U+0100-024F,U+0259,U+1E00-1EFF,U+2020,U+20A0-20AB,U+20AD-20CF,U+2113,U+2C60-2C7F,U+A720-A7FF}@font-face{font-family:'Poppins';font-style:normal;font-weight:900;font-display:swap;src:url(/wp-content/themes/dat/assets/fonts/poppins/pxiByp8kv8JHgFVrLBT5Z1xlFd2JQEk.woff2) format('woff2');unicode-range:U+0000-00FF,U+0131,U+0152-0153,U+02BB-02BC,U+02C6,U+02DA,U+02DC,U+2000-206F,U+2074,U+20AC,U+2122,U+2191,U+2193,U+2212,U+2215,U+FEFF,U+FFFD}";

        $fontFaces =  apply_filters( 'webfonts_local', $fontFaces );

        return $fontFaces;

    }

    /**
     * Enqueue the style.css file.
     *
     */
    public function _theme_enqueue_styles()
    {

        $suffix = defined('SCRIPT_DEBUG') && SCRIPT_DEBUG ? '' : '.min';

        wp_enqueue_style(
            'theme-layout',
            get_template_directory_uri(). '/assets/css/theme-layout'.$suffix.'.css',
            '',
            DAT_VERSION
        );

        $styles = $this->webfonts_local();

        $placeholder      =  get_template_directory_uri() .'/assets/images/placeholder.jpg';

        if( file_exists( get_stylesheet_directory() .'/assets/images/placeholder.jpg' ) ){
            $placeholder = get_stylesheet_directory_uri() .'/assets/images/placeholder.jpg';
        }

        $styles .= '.wp-block-group-featured-image:empty,.wp-block-group-featured-image .wp-block-post-featured-image__placeholder {background-image: url('.$placeholder.') !important;}';

        wp_add_inline_style( 'theme-layout', $styles );

        wp_enqueue_style(
            'theme-style',
            get_stylesheet_uri(),
            '',
            DAT_VERSION
        );

        wp_register_script(
            'theme-scripts',
            get_theme_file_uri( 'assets/js/theme-scripts'.$suffix.'.js' ),
            array(),
            true
        );

        wp_enqueue_script( 'theme-scripts' );

        wp_register_script(
            'theme-popup-login',
            get_theme_file_uri( 'assets/js/theme-popup-login'.$suffix.'.js' ),
            array( 'jquery' ),
            true
        );

        $localize_script = array( 
            'ajax_url' => admin_url( 'admin-ajax.php' ),
            'wp_is_mobile'                  => wp_is_mobile() ? true : false,
            'is_user_logged_in'             => is_user_logged_in() ? true : false,
        );

        $localize_script = apply_filters( '_theme_localize_script', $localize_script );
            
        wp_localize_script( 'theme-popup-login', '_theme_params', $localize_script );

    }

    /**
     * Adds theme-supports.
     *
     * @access public
     * @return void
     */
    public function action_hook()
    {

        $theme_json_data = self::read_json_file(self::get_file_path_from_theme('theme.json'));
        if ($theme_json_data) {
            $this->theme_json = $theme_json_data;
            $this->blocks_supports = $this->get_settings_blocks();
        }
        
         add_filter('get_custom_logo', [ $this, 'get_custom_logo' ], 10, 2);

         //add_filter( 'default_wp_template_part_areas', [ $this, 'gutenberg_get_allowed_template_part_areas' ], 10, 1 );
         add_filter('block_type_metadata', [ $this, 'block_type_metadata' ], 10, 1);

         add_filter('get_the_archive_title', [ $this, 'get_the_archive_title' ], 10, 3);
    }


    /**
     * Admin styles.
     *
     */

    public static function _theme_admin_styles()
    {
        $css = '.php-error #adminmenuback, .php-error #adminmenuwrap { margin-top:auto; }';
        wp_add_inline_style('admin-menu', $css);
    }


    /**
     * Show '(No title)' if post has no title.
     */

    public function _theme_the_title($title) {
        if (! is_admin() && empty($title)) {
            $title = __('(No title)');
        }

        return $title;
    }

    public static function get_the_archive_title($title, $original_title, $prefix)
    {

        if (is_post_type_archive()) {
            return $original_title;
        } elseif (is_tax()) {
            return $original_title;
        } elseif (is_category()) {
            return $original_title;
        }

        return $title;
    }

    public function get_custom_logo($html, $blog_id)
    {
        if ('' === $html) {
            $html = '
            <div class="is-default-logo wp-block-site-logo">
                <a href="'.esc_url(home_url('/')).'" class="custom-logo-link" rel="home" aria-current="page">
                    <img alt="'.get_bloginfo('name', 'display').'" width="640" height="360" loading="no" class="default-logo" src="'.esc_url(get_template_directory_uri()).'/assets/images/logo.png" />
                </a>
            </div>';
        }
        return $html ;
    }

    function gutenberg_get_allowed_template_part_areas($default_area_definitions)
    {

        $_area_definitions = array(
            array(
                'area'        => WP_TEMPLATE_PART_AREA_SIDEBAR,
                'label'       => __('Sidebar'),
                'description' => __(
                    'Sidebar templates often perform a specific role like displaying post content, and are not tied to any particular area.',
                    'dat'
                ),
                'icon'        => 'layout',
                'area_tag'    => 'aside',
            ),
            array(
                'area'        => 'navigation',
                'label'       => __('Navigation'),
                'description' => __(
                    'The Navigation template defines a page area that typically contains navigation.',
                    'dat'
                ),
                'icon'        => 'navigation',
                'area_tag'    => 'section',
            )
        );

        $default_area_definitions = array_merge($default_area_definitions, $_area_definitions);

        return $default_area_definitions;
    }

    private static function get_file_path_from_theme($file_name)
    {
        // This used to be a locate_template call.
        // However, that method proved problematic
        // due to its use of constants (STYLESHEETPATH)
        // that threw errors in some scenarios.
        //
        // When the theme.json merge algorithm properly supports
        // child themes, this should also fallback
        // to the template path, as locate_template did.
        $located   = '';
        $candidate = get_stylesheet_directory() . '/' . $file_name;
        if (is_readable($candidate)) {
            $located = $candidate;
        }
        return $located;
    }

    private static function read_json_file($file_path)
    {
        $config = array();
        if ($file_path) {
            $decoded_file = json_decode(
                file_get_contents($file_path),
                true
            );

            $json_decoding_error = json_last_error();
            if (JSON_ERROR_NONE !== $json_decoding_error) {
                trigger_error('Error when decoding a theme.json schema at path ' . esc_attr($file_path) . ' ' . json_last_error_msg());
                return $config;
            }

            if (is_array($decoded_file)) {
                $config = $decoded_file;
            }
        }
        return $config;
    }

    public function get_settings()
    {
        if (! isset($this->theme_json['settings'])) {
            return array();
        } else {
            return $this->theme_json['settings'];
        }
    }

    public function get_settings_blocks()
    {
        if (! isset($this->theme_json['settings']['blocks'])) {
            return array();
        } else {
            return $this->theme_json['settings']['blocks'];
        }
    }

    public function block_type_metadata($metadata)
    {

        if (is_array($this->blocks_supports) && isset($metadata['name'])) {
            foreach ($this->blocks_supports as $key => $value) {
                if ($key == $metadata['name']) {
                    if (isset($value['supports'])
                        && is_array($value['supports'])
                        && isset($metadata['supports'])
                        && is_array($metadata['supports'])
                    ) {
                        $supports = array_replace_recursive($metadata['supports'], $value['supports']);

                        $metadata['supports'] = $supports;
                    }
                }
            }
        }

        return $metadata;

        /**
        $metadata['supports']['typography']['fontSize'] = true;
        $metadata['supports']['typography']['lineHeight'] = true;
        $metadata['supports']['typography']['__experimentalFontFamily'] = true;
        $metadata['supports']['typography']['__experimentalFontStyle'] = true;
        $metadata['supports']['typography']['__experimentalFontWeight'] = true;
        $metadata['supports']['typography']['__experimentalTextDecoration'] = true;
        $metadata['supports']['typography']['__experimentalTextTransform'] = true;
        */
    }

    public function _theme_ajax_login() {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $remember = $_POST['remember'];
        
        $creds = array(
            'user_login' => $username,
            'user_password' => $password,
            'remember' => $remember,
        );

        $secure_cookie   = '';
            
        // If the user wants SSL but the session is not SSL, force a secure cookie.
        if ( ! empty( $_POST['username'] ) && ! force_ssl_admin() ) {
            $user_name = sanitize_user( wp_unslash( $_POST['username'] ) );
            $user      = get_user_by( 'login', $user_name );

            if ( ! $user && strpos( $user_name, '@' ) ) {
                $user = get_user_by( 'email', $user_name );
            }

            if ( $user ) {
                if ( get_user_option( 'use_ssl', $user->ID ) ) {
                    $secure_cookie = true;
                    force_ssl_admin( true );
                }
            }
        }

        $user = wp_signon( $creds, $secure_cookie);

        if (is_wp_error($user)) {
            if (!empty($user->errors)) {
                foreach( $user->errors as $error_code ){
                    $err .= $error_code[0];
                }
            } else {
                $err = "invalid credentials username or password.";
            }
            echo json_encode(array('message' => $err));
        } else {
            echo 'success';
        }

        wp_die();
    }

    public function _theme_popup_login(){

        global $theme_options;

        $login_modal = is_array($theme_options) && isset($theme_options['login_modal']) ? $theme_options['login_modal'] : false;
        $signup_text = is_array($theme_options) && isset($theme_options['signup_text']) && !empty($theme_options['signup_text']) ? $theme_options['signup_text'] : __('Sign Up');
        $signup_url  = is_array($theme_options) && isset($theme_options['signup_url']) ? $theme_options['signup_url'] : '';

        if( $login_modal === false || $login_modal === 'false' ){
            return;
        }

        if( function_exists('is_account_page') && is_account_page()) {
            return;
        }

        if( function_exists('is_checkout') && is_checkout()) {
            return;
        }

        $suffix = defined('SCRIPT_DEBUG') && SCRIPT_DEBUG ? '' : '.min';
        if (! wp_style_is('bootstrap-modal', 'registered')) {
            wp_register_style('bootstrap-modal', get_template_directory_uri() . '/assets/bootstrap/modal' . $suffix . '.css', array(), '4.1.1', 'all');
        }

        if (! wp_style_is('doorkeeper', 'registered')) {
            wp_register_style('doorkeeper', get_template_directory_uri() . '/assets/bootstrap/doorkeeper' . $suffix . '.css', array(), '4.1.1', 'all');
        }

        if (! wp_script_is('bootstrap-util', 'registered')) {
            wp_register_script('bootstrap-util', get_template_directory_uri() . '/assets/bootstrap/util' . $suffix . '.js', array( 'jquery' ), '4.1.1', false);
        }

        if (! wp_script_is('bootstrap-modal', 'registered')) {
            wp_register_script('bootstrap-modal', get_template_directory_uri() . '/assets/bootstrap/modal' . $suffix . '.js', array( 'jquery', 'bootstrap-util' ), '4.1.1', false);
        }

        wp_enqueue_style( 'bootstrap-modal');
        wp_enqueue_style( 'doorkeeper');
        wp_enqueue_script( 'bootstrap-util' );
        wp_enqueue_script( 'bootstrap-modal' );
        wp_enqueue_script( 'theme-popup-login' );

        ?>
        <div id="login-modal" class="modal doorkeeper-modal doorkeeper-modal-centered">
            <div class="modal-dialog modal-dialog-centered" data-active-tab="">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="block-modal" style="background-color: rgba(0, 0, 0, 0.3) !important;"><div style="margin: auto;height:250px;width: 100px;"><div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);"><i class="" style="font-size: 50px;"><svg width="50" height="50" class="icon-loading" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64"><path fill="currentColor" d="M50.287 32A18.287 18.287 0 1 1 32 13.713a1.5 1.5 0 1 1 0 3A15.287 15.287 0 1 0 47.287 32a1.5 1.5 0 0 1 3 0Z" data-name="Loading"></path></svg></i></div></div></div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <div class="login-core">
                            <h2><?php _e('Login');?></h2>
                            <div id="ajax-login-message"></div>
                            <?php
                            do_action('login_enqueue_scripts');
                            ob_start();
                            wp_login_form( array(

                                'echo'           => true,
                                // Default 'redirect' value takes the user back to the request URI.
                                'redirect'       => ( is_ssl() ? 'https://' : 'http://' ) . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'],
                                'form_id'        => 'loginform',
                                'label_username' => __( 'Username or email address' ),
                                'label_password' => __( 'Password' ),
                                'label_remember' => __( 'Remember Me' ),
                                'label_log_in'   => __( 'Log In' ),
                                'id_username'    => 'user_login',
                                'id_password'    => 'user_pass',
                                'id_remember'    => 'rememberme',
                                'id_submit'      => 'wp-submit',
                                'remember'       => true,
                                'value_username' => '',
                                // Set 'value_remember' to true to default the "Remember me" checkbox to checked.
                                'value_remember' => false,
                                
                            ) );

                            $login_form_html = ob_get_clean();
                            $login_form_html = str_replace( 'button button-primary', 'button button-primary wp-element-button popup-signin-btn', $login_form_html );
                            $login_form_html = str_replace( '<label for="user_login">Username or email address</label>', '<label for="user_login">Username or email address <span class="required">*</span></label>', $login_form_html );
                            $login_form_html = str_replace( '<label for="user_pass">Password</label>', '<label for="user_pass">Password <span class="required">*</span></label>', $login_form_html );
                            
                            echo $login_form_html;

                            ?>
                            <p id="nav">
                                <?php

                                if ( get_option( 'users_can_register' ) ) {
                                    $login_link_separator = apply_filters( 'login_link_separator', ' | ' );

                                    $registration_url = sprintf( '<a href="%s">%s</a>', esc_url( wp_registration_url() ), __( 'Register' ) );

                                    /** This filter is documented in wp-includes/general-template.php */
                                    echo apply_filters( 'register', $registration_url );

                                    echo esc_html( $login_link_separator );
                                }

                                $html_link = sprintf( '<a href="%s">%s</a>', esc_url( wp_lostpassword_url() ), __( 'Lost your password?' ) );

                                /**
                                 * Filters the link that allows the user to reset the lost password.
                                 *
                                 * @since 6.1.0
                                 *
                                 * @param string $html_link HTML link to the lost password form.
                                 */
                                echo apply_filters( 'lost_password_html_link', $html_link );

                                ?>
                            </p>
                            <?php

                            if ( !empty( $signup_url ) ) {
                                $signup_url = sprintf( '<div class="signup-wrapper"><a href="%s" class="popup-signup-btn button wp-element-button">%s</a></div>', esc_url( $signup_url ), $signup_text );
                                /** This filter is documented in wp-includes/general-template.php */
                                echo apply_filters( 'signup', $signup_url );
                            }

                            ?>
                       
                        </div>
                    </div>
               </div>
            </div>
        </div>

    <?php
    }

    public function _theme_tweak_custom_login()
    {

        global $theme_options;

        $login_form_css = is_array($theme_options) && isset($theme_options['login_form_css']) ? $theme_options['login_form_css'] : false;

        $login_form_logo = is_array($theme_options) && isset($theme_options['login_form_logo']) ? $theme_options['login_form_logo'] : '';

        echo '<style type="text/css">';
        if( $login_form_css !== false ){
            echo $login_form_css;
        }
        if( !empty($login_form_logo) ){
            echo 'body #login h1 a {
                background: none !important;
                width: auto;
                height: auto !important;
                text-indent: inherit !important;
                margin: 0
            }';
        }
        echo '</style>';

        if( !empty($login_form_logo) ){
            ?>
            <script type="text/javascript">
                document.addEventListener('DOMContentLoaded', function() {
                    var loginTitleLink = document.querySelector('#login h1 a');
                    loginTitleLink.innerHTML = '<img src="<?php echo $login_form_logo;?>" />';
                });
            </script>
            <?php
        }
    }
}


new Theme_Hook();
