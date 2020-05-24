<?php
add_theme_support('wc-product-gallery-zoom');
add_theme_support('wc-product-gallery-slider');
add_theme_support('woocommerce');
if (!function_exists('jws_cat_list')) {
    function jws_cat_list()
    { echo '<div class="jws_cat_list">';  
        echo wc_get_product_category_list( get_the_id(),' <span></span> ' );
      echo '</div>';  
    }
}
//add_filter('woocommerce_enqueue_styles', '__return_empty_array');
if (!function_exists('woocommerce_template_loop_product_title')) {

    /**
     * Show the product title in the product loop. By default this is an H2.
     */
    function woocommerce_template_loop_product_title()
    {
        echo '<h2 class="woocommerce-loop-product__title"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h2>';
    }
}
if (!function_exists('woocommerce_get_product_thumbnail_gallery')) {

    /**
     * Get the product thumbnail gallery , or the placeholder if not set.
     *
     * @param string $size (default: 'woocommerce_thumbnail').
     * @param int $deprecated1 Deprecated since WooCommerce 2.0 (default: 0).
     * @param int $deprecated2 Deprecated since WooCommerce 2.0 (default: 0).
     * @return string
     */

    function woocommerce_get_product_thumbnail_gallery()
    {
        global $product;
        $attachment_ids = $product->get_gallery_image_ids();
        if (isset($attachment_ids[0])) {
            $attachment_id = $attachment_ids[0];
            echo '<div class="nxl_product_image_gallery">' . wp_get_attachment_image($attachment_id, 'woocommerce_thumbnail') . '</div>';
        }
    }

    add_action('woocommerce_before_shop_loop_item_title', 'woocommerce_get_product_thumbnail_gallery', 20);
}


/**
 * Change number of products that are displayed per page (shop page)
 */
add_filter('loop_shop_per_page', 'jws_new_loop_shop_per_page', 20);

function jws_new_loop_shop_per_page($cols)
{
    global $jws_option;
    // $cols contains the current number of products per page based on the value stored on Options -> Reading
    // Return the number of products you wanna show per page.
    $cols = $jws_option['shop_post_number'];
    return $cols;
}


if (!function_exists('woocommerce_review_display_gravatar')) {
    /**
     * Display the review authors gravatar
     *
     * @param array $comment WP_Comment.
     * @return void
     */
    function woocommerce_review_display_gravatar($comment)
    {
        echo get_avatar($comment, apply_filters('woocommerce_review_gravatar_size', '110'), '');
    }
}
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10);;
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 15);

add_filter('woocommerce_checkout_fields', 'jws_override_billing_checkout_fields', 20, 1);
function jws_override_billing_checkout_fields($fields)
{

    $fields['billing']['billing_first_name']['placeholder'] = 'First Name';
    $fields['billing']['billing_last_name']['placeholder'] = 'Last Name';
    $fields['billing']['billing_company']['placeholder'] = 'Company name (optional)';
    $fields['billing']['billing_address_1']['placeholder'] = 'Street address';
    $fields['billing']['billing_address_2']['placeholder'] = 'Street address';
    $fields['billing']['billing_postcode']['placeholder'] = 'Postcode / ZIP';
    $fields['billing']['billing_phone']['placeholder'] = 'Phone';
    $fields['billing']['billing_city']['placeholder'] = 'Town / City';
    $fields['billing']['billing_email']['placeholder'] = 'Email Address';
    $fields['billing']['billing_state']['placeholder'] = ' State';


    $fields['shipping']['shipping_first_name']['placeholder'] = 'First Name';
    $fields['shipping']['shipping_last_name']['placeholder'] = 'Last Name';
    $fields['shipping']['shipping_company']['placeholder'] = 'Company name (optional)';
    $fields['shipping']['shipping_address_1']['placeholder'] = 'Street address';
    $fields['shipping']['shipping_address_2']['placeholder'] = 'Street address';
    $fields['shipping']['shipping_postcode']['placeholder'] = 'Postcode / ZIP';
    $fields['shipping']['shipping_phone']['placeholder'] = 'Phone';
    $fields['shipping']['shipping_city']['placeholder'] = 'Town / City';
    $fields['shipping']['shipping_email']['placeholder'] = 'Email Address';
    $fields['shipping']['shipping_state']['placeholder'] = ' State';


    return $fields;
}