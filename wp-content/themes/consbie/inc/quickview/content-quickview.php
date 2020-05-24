<?php
/**
 *    jws: Quick view product content
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

global $post, $product;

/* Product summary: Opening tags */
function jws_qv_product_summary_open()
{
    echo '<div class="jws-summary-wrap">';
}

/* Product summary: Closing tags */
function jws_qv_product_summary_close()
{
    echo '</div>';
}


add_action('woocommerce_single_product_summary', 'jws_qv_product_summary_open', 1);
add_action('woocommerce_single_product_summary', 'jws_qv_product_summary_close', 100);


// Main wrapper class
$class = 'product' . ' product-quick-view single-product-content product-' . $product->get_type();

?>

<div id="product-<?php the_ID(); ?>" <?php post_class($class); ?>>

    <div class="row row-eq-height row_quick_view">

        <div class="jws-product-image col-xl-6 col-lg-6 col-12">
            <?php include( 'product-image.php' ); ?>
        </div>

        <div class="jws-summary col-xl-6 col-lg-6 col-12">
            <div id="jws-product-summary" class="summary">
                <?php
                /**
                 * woocommerce_single_product_summary hook
                 *
                 * @hooked jws_qv_product_summary_open - 1
                 * @hooked woocommerce_template_single_title - 5
                 * @hooked woocommerce_template_single_price - 10
                 * @hooked jws_qv_product_summary_divider - 15
                 * @hooked woocommerce_template_single_excerpt - 20
                 * @hooked woocommerce_template_single_rating - 21
                 * @hooked woocommerce_template_single_add_to_cart - 30
                 * @hooked jws_qv_product_summary_actions - 30
                 * @hooked woocommerce_template_single_sharing - 50
                 * @hooked jws_qv_product_summary_close - 100
                 */
                do_action('woocommerce_single_product_summary');
                ?>
            </div>
        </div>
    </div>
</div>
