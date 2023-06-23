<?php
/**
 * Block patterns
 *
 * @package BlockPress
 * @since 1.3.2
 */

/**
 * Register Block Pattern Category.
 */
if (function_exists('register_block_pattern_category')) {
    register_block_pattern_category(
        'dat-pattern',
        array( 'label' => esc_html__('DAT', 'dat') )
    );
}

/**
 * Register Block Patterns.
 */
if (function_exists('register_block_pattern')) {
    register_block_pattern(
        'dat/404-page',
        array(
            'title'       => esc_html__('404 Page', 'dat'),
            'categories'  => array( 'dat-pattern' ),
            'description' => esc_html__('The default a 404 Page.', 'dat'),
            'content'     => '
				<!-- wp:group {"tagName":"main","align":"full","className":"site-main","layout":{"inherit":true,"type":"constrained"}} -->
                <main class="wp-block-group alignfull site-main"><!-- wp:columns -->
                <div class="wp-block-columns"><!-- wp:column -->
                <div class="wp-block-column"><!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"200px"}},"textColor":"black","fontFamily":"monospace"} -->
                <p class="has-text-align-center has-black-color has-text-color has-monospace-font-family" style="font-size:200px">404</p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"25px"}}} -->
                <p class="has-text-align-center" style="font-size:25px"><strong>It looks like nothing was found at this location. </strong></p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"align":"center","fontSize":"medium"} -->
                <p class="has-text-align-center has-medium-font-size"><strong>Maybe go back to homepage</strong></p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"align":"center"} -->
                <p class="has-text-align-center"><strong>or</strong></p>
                <!-- /wp:paragraph -->

                <!-- wp:a3-blockpress/buttons {"align":"center"} -->
                <div class="wp-block-a3-blockpress-buttons a3-blockpress-button-wrapper a3-blockpress-button-wrapper-align-center"><!-- wp:a3-blockpress/button {"buttonmarginLeft":"0","buttonmarginTop":"10","buttonmarginRight":"0","buttonmarginBottom":"10","buttonNormalborderStyle":"solid","buttonNormalborderColor":"#1d1b1a","buttonNormalradiusTopLeft":"4","buttonNormalradiusTopRight":"4","buttonNormalradiusBottomRight":"4","buttonNormalradiusBottomLeft":"4","buttonNormalradiusSync":true,"buttonHoverborderStyle":"solid","buttonHoverborderColor":"#1d1b1a","buttonIcon":"ic_home","blockID":"2kOGID","text":"Homepage","buttonHoverColor":"#fafafa","buttonNormalBackgroundColor":"#1d1b1a","buttonHoverBackgroundColor":"#1d1b1a","iconPosition":"left"} -->
                <span class="wp-block-a3-blockpress-button a3-blockpress-button a3-blockpress-button-2kOGID"><div style="display:inline-flex;justify-content:center;align-items:center" class="a3blockpress-svg-icon a3blockpress-svg-icon-ic_home a3-blockpress-button-icon-left"><svg style="display:inline-block;vertical-align:middle" viewBox="0 0 8 8" height="25" width="25" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M4 0l-4 3h1v4h2v-2h2v2h2v-4.03l1 .03-4-3z"></path></svg></div><span class="a3-blockpress-button-text">Homepage</span></span>
                <!-- /wp:a3-blockpress/button --></div>
                <!-- /wp:a3-blockpress/buttons -->

                <!-- wp:search {"label":"Search","showLabel":false,"buttonText":"Search"} /--></div>
                <!-- /wp:column -->

                <!-- wp:column -->
                <div class="wp-block-column"><!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"25px"},"spacing":{"padding":{"top":"5px","bottom":"20px"}}}} -->
                <p class="has-text-align-center" style="padding-top:5px;padding-bottom:20px;font-size:25px">Did you check these popular posts ?</p>
                <!-- /wp:paragraph -->

                <!-- wp:query {"queryId":0,"query":{"pages":"100","offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","sticky":"","exclude":[],"perPage":"2","inherit":false},"displayLayout":{"type":"flex","columns":2},"className":"has-aligned-buttons"} -->
                <div class="wp-block-query has-aligned-buttons"><!-- wp:post-template -->
                <!-- wp:group -->
                <div class="wp-block-group"><!-- wp:group {"className":"wp-block-group-featured-image"} -->
                <div class="wp-block-group wp-block-group-featured-image"><!-- wp:post-featured-image /--></div>
                <!-- /wp:group -->

                <!-- wp:post-author {"showBio":true,"fontSize":"xx-small"} /-->

                <!-- wp:spacer {"height":"20px"} -->
                <div style="height:20px" aria-hidden="true" class="wp-block-spacer"></div>
                <!-- /wp:spacer -->

                <!-- wp:post-title {"isLink":true,"style":{"typography":{"lineHeight":"1.5"}},"className":"is-no-margin","fontSize":"large"} /-->

                <!-- wp:post-date {"className":"is-no-margin","fontSize":"xx-small"} /-->

                <!-- wp:spacer {"height":"20px"} -->
                <div style="height:20px" aria-hidden="true" class="wp-block-spacer"></div>
                <!-- /wp:spacer -->

                <!-- wp:post-excerpt {"moreText":"Read more...","fontSize":"small"} /-->

                <!-- wp:spacer {"height":"20px"} -->
                <div style="height:20px" aria-hidden="true" class="wp-block-spacer"></div>
                <!-- /wp:spacer -->

                <!-- wp:group -->
                <div class="wp-block-group"><!-- wp:separator {"opacity":"css","backgroundColor":"dark-black","className":"is-style-wide is-no-margin"} -->
                <hr class="wp-block-separator has-text-color has-dark-black-color has-css-opacity has-dark-black-background-color has-background is-style-wide is-no-margin"/>
                <!-- /wp:separator -->

                <!-- wp:spacer {"height":"5px"} -->
                <div style="height:5px" aria-hidden="true" class="wp-block-spacer"></div>
                <!-- /wp:spacer -->

                <!-- wp:post-terms {"term":"category"} /-->

                <!-- wp:spacer {"height":"5px"} -->
                <div style="height:5px" aria-hidden="true" class="wp-block-spacer"></div>
                <!-- /wp:spacer -->

                <!-- wp:separator {"opacity":"css","backgroundColor":"dark-black","className":"is-style-wide is-no-margin"} -->
                <hr class="wp-block-separator has-text-color has-dark-black-color has-css-opacity has-dark-black-background-color has-background is-style-wide is-no-margin"/>
                <!-- /wp:separator -->

                <!-- wp:spacer {"height":"5px"} -->
                <div style="height:5px" aria-hidden="true" class="wp-block-spacer"></div>
                <!-- /wp:spacer -->

                <!-- wp:post-terms {"term":"post_tag"} /--></div>
                <!-- /wp:group --></div>
                <!-- /wp:group -->
                <!-- /wp:post-template --></div>
                <!-- /wp:query --></div>
                <!-- /wp:column --></div>
                <!-- /wp:columns --></main>
                <!-- /wp:group -->
			',
        )
    );
}
