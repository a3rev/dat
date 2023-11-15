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
                <div class="wp-block-a3-blockpress-buttons a3-blockpress-button-wrapper a3-blockpress-button-wrapper-align-center"><!-- wp:a3-blockpress/button {"buttonmarginLeft":"0","buttonmarginTop":"10","buttonmarginRight":"0","buttonmarginBottom":"10","buttonNormalborderStyle":"solid","buttonNormalborderColor":"#1d1b1a","buttonNormalradiusTopLeft":"4","buttonNormalradiusTopRight":"4","buttonNormalradiusBottomRight":"4","buttonNormalradiusBottomLeft":"4","buttonNormalradiusSync":true,"buttonHoverborderStyle":"solid","buttonHoverborderColor":"#1d1b1a","buttonIcon":"ic_home","blockID":"2kOGID","text":"Home page","buttonHoverColor":"#fafafa","buttonNormalBackgroundColor":"#1d1b1a","buttonHoverBackgroundColor":"#1d1b1a","iconPosition":"left"} -->
                <span class="wp-block-a3-blockpress-button a3-blockpress-button a3-blockpress-button-2kOGID"><div style="display:inline-flex;justify-content:center;align-items:center" class="a3blockpress-svg-icon a3blockpress-svg-icon-ic_home a3-blockpress-button-icon-left"><svg style="display:inline-block;vertical-align:middle" viewBox="0 0 8 8" height="25" width="25" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M4 0l-4 3h1v4h2v-2h2v2h2v-4.03l1 .03-4-3z"></path></svg></div><span class="a3-blockpress-button-text">Home page</span></span>
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

    register_block_pattern(
        'dat/slide-section',
        array(
            'title'       => esc_html__('Call to Action with Animated Image', 'dat'),
            'categories'  => array( 'dat-pattern' ),
            'description' => esc_html__('The Call to Action with Animated Image section.', 'dat'),
            'content'     => '

                <!-- wp:a3-blockpress/row {"blockID":"spGwV","align":"full","columns":2,"layout":"50-50","verticalAlignment":"middle","bgOverlayType":"normal","bgOverlayColor":"#ffffff","bgOverlayColorOpacity":85,"topDivider":"","bottomDivider":"mtns","bottomDividerColor":"#dfdccc","bottomDividerHeight":66,"paddingLeft":"6","paddingTop":"6","paddingRight":"6","paddingBottom":"8","paddingUnit":"%","marginLeft":"0","marginTop":"0","marginRight":"0","marginBottom":"-1","bgImage":{"id":55,"url":"'.get_template_directory_uri(). '/assets/images/agency-bg.webp"},"bgAttachment":"fixed","gradientStartColor":"#114c6a","gradientStartLocation":69,"gradientEndColor":"#7792ce","gradientAngle":168} -->
                <div class="wp-block-a3-blockpress-row alignfull a3-blockpress-row a3-blockpress-row-spGwV align-full valign-middle columns-2 mobile-layout-100"><div class="a3-blockpress-row__inner"><!-- wp:a3-blockpress/column {"blockID":"Z2u8AJT","width":"70.05"} -->
                <div class="wp-block-a3-blockpress-column a3-blockpress-column a3-blockpress-column-Z2u8AJT"><div class="a3-blockpress-column__inner"><!-- wp:heading {"textAlign":"center","style":{"typography":{"fontSize":"69px","fontStyle":"normal","fontWeight":"600"},"elements":{"link":{"color":{"text":"var:preset|color|dark-blue"}}}},"textColor":"dark-blue"} -->
                <h2 class="wp-block-heading has-text-align-center has-dark-blue-color has-text-color has-link-color" style="font-size:69px;font-style:normal;font-weight:600">Welcome Title</h2>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"50px","lineHeight":"1.3","fontStyle":"normal","fontWeight":"600"}},"textColor":"dark-blue"} -->
                <p class="has-text-align-center has-dark-blue-color has-text-color" style="font-size:50px;font-style:normal;font-weight:600;line-height:1.3">A Catching Tag Line Goes Here!</p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"align":"center"} -->
                <p class="has-text-align-center">You <strong>can write some line of text here to encourage them to click the Button below.</strong></p>
                <!-- /wp:paragraph -->

                <!-- wp:a3-blockpress/buttons {"align":"center"} -->
                <div class="wp-block-a3-blockpress-buttons a3-blockpress-button-wrapper a3-blockpress-button-wrapper-align-center"><!-- wp:a3-blockpress/button {"buttonpaddingLeft":"25","buttonpaddingTop":"20","buttonpaddingRight":"25","buttonpaddingBottom":"20","buttonmarginTop":"20","buttonmarginBottom":"20","buttonNormalborderTop":"","buttonNormalradiusTopLeft":"30","buttonNormalradiusTopRight":"30","buttonNormalradiusBottomRight":"30","buttonNormalradiusBottomLeft":"30","buttonNormalradiusSync":true,"buttonIcon":"fe_arrowRight","buttonTypoSize":18,"buttonTypoFontWeight":"bold","blockID":"10uoaY","text":"ADD YOUR BUTTON TEXT HERE","buttonHoverColor":"#ffffff","buttonNormalBackgroundColor":"#69b86b","buttonHoverBackgroundColor":"#77cc7a","iconSize":33,"enableCustomFont":true} -->
                <a class="wp-block-a3-blockpress-button a3-blockpress-button a3-blockpress-button-10uoaY" href="https://a3fastwebsites.com.au/book-a-strategy-plan/"><span class="a3-blockpress-button-text">ADD YOUR BUTTON TEXT HERE</span><div style="display:inline-flex;justify-content:center;align-items:center" class="a3blockpress-svg-icon a3blockpress-svg-icon-fe_arrowRight a3-blockpress-button-icon-right"><svg style="display:inline-block;vertical-align:middle" viewBox="0 0 24 24" height="33" width="33" fill="none" stroke="currentColor" xmlns="http://www.w3.org/2000/svg" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg></div></a>
                <!-- /wp:a3-blockpress/button --></div>
                <!-- /wp:a3-blockpress/buttons --></div></div>
                <!-- /wp:a3-blockpress/column -->

                <!-- wp:a3-blockpress/column {"blockID":"8aWtQ","width":"29.95","bgColorOpacity":39,"bgSize":"contain","animationType":"slide","animationDirection":"right","animationDuration":3} -->
                <div class="wp-block-a3-blockpress-column a3-blockpress-column a3-blockpress-column-8aWtQ animateMe" data-animation="slideInRight" style="animation-delay:0s;animation-duration:3s"><div class="a3-blockpress-column__inner"><!-- wp:image {"align":"center","id":3689,"width":"203px","sizeSlug":"full","linkDestination":"none"} -->
                <figure class="wp-block-image aligncenter size-full is-resized"><img src="'.get_template_directory_uri(). '/assets/images/phone.webp" alt="" class="wp-image-3689" style="width:203px"/><figcaption class="wp-element-caption">100% Mobile Responsive</figcaption></figure>
                <!-- /wp:image --></div></div>
                <!-- /wp:a3-blockpress/column --></div><div class="a3-blockpress-row__bottom_divider a3-blockpress-row__divider_mtns"><svg viewBox="0 0 1000 100" preserveAspectRatio="none"><path d="M1000 50L817.31 4.714 525.279 65.911 334.404 24.836 190.656 53.63 0 30v70h1000V50z" opacity="0.4"></path><path d="M1000 57L847.219 34.411l-214.383 19.81L473.518 32.75l-177.44 25.875-192.722 5.627L0 36.977V100h1000V57z"></path></svg></div></div>
                <!-- /wp:a3-blockpress/row -->
            ',
        ),

    );
}
