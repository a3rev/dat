<?php
/**
 * Block patterns
 *
 * @package BlockPress
 * @since 1.2.0
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
				<!-- wp:group {"layout":{"inherit":true,"type":"constrained"}} -->
                <div class="wp-block-group"><!-- wp:columns {"className":"is-no-margin-bottom product"} -->
                <div class="wp-block-columns is-no-margin-bottom product"><!-- wp:column -->
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
}
