<?php
/**
 * Block patterns
 *
 * @package BlockPress
 * @since 1.3.0
 */

/**
 * Register Block Pattern Category.
 */
if (function_exists('register_block_pattern_category')) {
    register_block_pattern_category(
        'dat-woocommerce',
        array( 'label' => esc_html__('DAT WooCommerce', 'dat') )
    );
}

/**
 * Register Block Patterns.
 */
if (function_exists('register_block_pattern')) {
    register_block_pattern(
        'woocommerce/single-product-default',
        array(
            'title'       => esc_html__('WooCommerce Single Product 1', 'dat'),
            'categories'  => array( 'dat-woocommerce' ),
            'description' => esc_html__('The default a Single Product.', 'dat'),
            'content'     => '
				<!-- wp:group {"layout":{"inherit":true,"type":"constrained"},"className":"woocommerce product"} -->
                <div class="wp-block-group woocommerce product"><!-- wp:columns {"className":"is-no-margin-bottom"} -->
                <div class="wp-block-columns is-no-margin-bottom"><!-- wp:column -->
                <div class="wp-block-column"><!-- wp:spacer {"height":"30px"} -->
                <div style="height:30px" aria-hidden="true" class="wp-block-spacer"></div>
                <!-- /wp:spacer -->

                <!-- wp:woocommerce/breadcrumbs /-->

                <!-- wp:woocommerce/store-notices /-->

                <!-- wp:columns {"className":"woocommerce-dat-shadow","align":"wide"} -->
                <div class="wp-block-columns alignwide woocommerce-dat-shadow">
                
                <!-- wp:column -->
                <div class="wp-block-column"><!-- wp:post-title {"style":{"typography":{"lineHeight":"1"},"spacing":{"margin":{"bottom":"20px"}}},"__woocommerceNamespace":"woocommerce/product-query/product-title"} /-->

                <!-- wp:woocommerce/product-price {"isDescendentOfSingleProductTemplate":true} /-->

                <!-- wp:post-excerpt {"style":{"spacing":{"margin":{"bottom":"20px"}}},"__woocommerceNamespace":"woocommerce/product-query/product-summary"} /-->

                <!-- wp:woocommerce/add-to-cart-form /-->

                <!-- wp:group {"className":"wp-block-woocommerce-product-meta","layout":{"type":"flex","flexWrap":"nowrap"}} -->
                <div class="wp-block-group wp-block-woocommerce-product-meta">
                    <!-- wp:woocommerce/product-sku {"isDescendentOfSingleProductTemplate":true} /-->

                    <!-- wp:post-terms {"term":"product_cat","prefix":"Category: "} /-->

                    <!-- wp:post-terms {"term":"product_tag","prefix":"Tags: "} /-->
                </div>
                <!-- /wp:group -->

                </div>
                <!-- /wp:column -->

                <!-- wp:column -->
                <div class="wp-block-column"><!-- wp:woocommerce/product-image-gallery /--></div>
                <!-- /wp:column -->

                </div>
                <!-- /wp:columns -->

                <!-- wp:woocommerce/product-details {"align":"wide"} /-->

                <!-- wp:woocommerce/related-products {"align":"wide"} -->
                <div class="wp-block-woocommerce-related-products alignwide"><!-- wp:query {"queryId":0,"query":{"perPage":5,"pages":0,"offset":0,"postType":"product","order":"asc","orderBy":"title","author":"","search":"","exclude":[],"sticky":"","inherit":false},"displayLayout":{"type":"flex","columns":4},"namespace":"woocommerce/related-products","lock":{"remove":true,"move":true}} -->
                <div class="wp-block-query"><!-- wp:heading {"style":{"spacing":{"margin":{"bottom":"20px"}}}} -->
                <h2 class="wp-block-heading" style="margin-bottom:20px">Related products</h2>
                <!-- /wp:heading -->

                <!-- wp:post-template {"__woocommerceNamespace":"woocommerce/product-query/product-template"} -->
                <!-- wp:woocommerce/product-image {"isDescendentOfQueryLoop":true} /-->

                <!-- wp:post-title {"textAlign":"center","level":3,"isLink":true,"style":{"spacing":{"margin":{"bottom":"0px"}}},"fontSize":"medium","__woocommerceNamespace":"woocommerce/product-query/product-title"} /-->

                <!-- wp:woocommerce/product-price {"isDescendentOfQueryLoop":true,"textAlign":"center","style":{"spacing":{"margin":{"bottom":"1rem"}}}} /-->

                <!-- wp:woocommerce/product-button {"isDescendentOfQueryLoop":true,"textAlign":"center","style":{"spacing":{"margin":{"bottom":"0rem"}}}} /-->
                <!-- /wp:post-template --></div>
                <!-- /wp:query --></div>
                <!-- /wp:woocommerce/related-products -->

                <!-- wp:spacer {"height":"30px"} -->
                <div style="height:30px" aria-hidden="true" class="wp-block-spacer"></div>
                <!-- /wp:spacer --></div>
                <!-- /wp:column --></div>
                <!-- /wp:columns --></div>
                <!-- /wp:group -->
			',
        )
    );

    register_block_pattern(
        'woocommerce/404-page',
        array(
            'title'       => esc_html__('404 Page', 'dat'),
            'categories'  => array( 'dat-woocommerce' ),
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

                <!-- wp:wp-predictive-search/form {"blockID":"Zfi8sV","align":"center","width":500,"widthUnit":"px","mobilemIconEnable":false,"numberPostTypes":{"post":0,"page":0,"product":6},"numberTaxonomies":{"category":0,"post_tag":0,"product_cat":3},"marginLeft":"","marginTop":"5","marginRight":"","marginBottom":"1","marginUnit":"%","className":"aligncenter"} -->
                <!-- wp:wp-predictive-search/mobile-icon {"blockID":"Z1yWS6R","iconSize":50,"normalIconColor":"#1d1b1a","activeIconColor":"#1d1b1a"} -->
                <div style="display:inline-flex;justify-content:center;align-items:center" class="wp-block-wp-predictive-search-mobile-icon a3blockpress-svg-icon a3blockpress-svg-icon-fe_search"><svg style="display:inline-block;vertical-align:middle" viewBox="0 0 24 24" height="50" width="50" fill="none" stroke="currentColor" xmlns="http://www.w3.org/2000/svg" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg></div>
                <!-- /wp:wp-predictive-search/mobile-icon -->

                <!-- wp:wp-predictive-search/search-bar {"blockID":"Z1DJXdY","rootID":"Zfi8sV","height":40,"enableCustomBorder":true,"borderColor":"#dadada","borderFocusColor":"#fabc02","backgroundColor":"#fafafa","radiusTopLeft":"3","radiusTopRight":"3","radiusBottomRight":"3","radiusBottomLeft":"3","radiusSync":true} -->
                <!-- wp:wp-predictive-search/category-dropdown {"blockID":"fIJJ4","taxonomy":"product_cat","maxWidth":35,"normalTextColor":"#1d1f35","normalBackgroundColor":"#fafafa"} -->
                <div style="display:inline-flex;justify-content:center;align-items:center" class="wp-block-wp-predictive-search-category-dropdown a3blockpress-svg-icon a3blockpress-svg-icon-fe_chevronDown wpps_nav_down_icon"><svg style="display:inline-block;vertical-align:middle" viewBox="0 0 24 24" height="12" width="12" fill="none" stroke="currentColor" xmlns="http://www.w3.org/2000/svg" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"></polyline></svg></div>
                <!-- /wp:wp-predictive-search/category-dropdown -->

                <!-- wp:wp-predictive-search/search-icon {"blockID":"YipPu","hoverBackgroundColor":"#1d1b1a"} -->
                <div style="display:inline-flex;justify-content:center;align-items:center" class="wp-block-wp-predictive-search-search-icon a3blockpress-svg-icon a3blockpress-svg-icon-fe_search wpps_nav_submit_icon"><svg style="display:inline-block;vertical-align:middle" viewBox="0 0 24 24" height="16" width="16" fill="none" stroke="currentColor" xmlns="http://www.w3.org/2000/svg" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg></div>
                <!-- /wp:wp-predictive-search/search-icon -->

                <!-- wp:wp-predictive-search/search-input {"blockID":"29R1Xx","rootID":"Zfi8sV","placeholder":"Try searching here...","backgroundColor":"#fafafa"} -->
                <svg aria-hidden="true" viewBox="0 0 512 512" aria-label="Searching" class="wp-block-wp-predictive-search-search-input wpps_searching_icon"><path d="M288 39.056v16.659c0 10.804 7.281 20.159 17.686 23.066C383.204 100.434 440 171.518 440 256c0 101.689-82.295 184-184 184-101.689 0-184-82.295-184-184 0-84.47 56.786-155.564 134.312-177.219C216.719 75.874 224 66.517 224 55.712V39.064c0-15.709-14.834-27.153-30.046-23.234C86.603 43.482 7.394 141.206 8.003 257.332c.72 137.052 111.477 246.956 248.531 246.667C393.255 503.711 504 392.788 504 256c0-115.633-79.14-212.779-186.211-240.236C302.678 11.889 288 23.456 288 39.056z"></path></svg>
                <!-- /wp:wp-predictive-search/search-input -->
                <!-- /wp:wp-predictive-search/search-bar -->

                <!-- wp:wp-predictive-search/results-dropdown {"blockID":"Z21SAmT"} -->
                <!-- wp:wp-predictive-search/dropdown-close-icon {"blockID":"ZrYkH3","parentID":"Z21SAmT"} /-->

                <!-- wp:wp-predictive-search/dropdown-title {"blockID":"Z1JEcp1","parentID":"Z21SAmT"} /-->

                <!-- wp:wp-predictive-search/dropdown-items {"blockID":"23Cy9x","parentID":"Z21SAmT"} /-->

                <!-- wp:wp-predictive-search/dropdown-footer {"blockID":"2jiJiQ","rootID":"Zfi8sV","parentID":"Z21SAmT"} /-->
                <!-- /wp:wp-predictive-search/results-dropdown -->
                <!-- /wp:wp-predictive-search/form --></div>
                <!-- /wp:column -->

                <!-- wp:column -->
                <div class="wp-block-column"><!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"25px"},"spacing":{"padding":{"top":"5px","bottom":"20px"}}}} -->
                <p class="has-text-align-center" style="padding-top:5px;padding-bottom:20px;font-size:25px">Did you check these popular products ?</p>
                <!-- /wp:paragraph -->

                <!-- wp:query {"queryId":51,"query":{"perPage":"3","pages":"0","offset":"0","postType":"product","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false,"parents":[]},"displayLayout":{"type":"flex","columns":3},"className":"has-aligned-buttons","layout":{"type":"default"}} -->
                <div class="wp-block-query has-aligned-buttons"><!-- wp:post-template -->
                <!-- wp:woocommerce/product-image {"isDescendentOfQueryLoop":true} /-->

                <!-- wp:post-title {"textAlign":"center","fontSize":"medium","__woocommerceNamespace":"woocommerce/product-query/product-title"} /-->

                <!-- wp:columns {"style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}}} -->
                <div class="wp-block-columns" style="margin-top:0px;margin-bottom:0px"><!-- wp:column -->
                <div class="wp-block-column"><!-- wp:a3-blockpress/product-price {"blockID":"Z15iGdX","textAlign":"center","fontSize":"small","style":{"typography":{"fontStyle":"normal","fontWeight":"300"},"spacing":{"margin":{"bottom":"20px"}}}} /-->

                <!-- wp:a3-blockpress/product-addtocart {"blockID":"1JAjXH"} /--></div>
                <!-- /wp:column --></div>
                <!-- /wp:columns -->
                <!-- /wp:post-template --></div>
                <!-- /wp:query --></div>
                <!-- /wp:column --></div>
                <!-- /wp:columns --></main>
                <!-- /wp:group -->
            ',
        )
    );
}
