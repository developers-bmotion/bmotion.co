<?php

/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package WordPress
 * @subpackage consbie
 * @since 1.0.0
 */


/**
 * Render header layout.
 *
 * @return string
 */

function jws_mime_types($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}

add_filter('upload_mimes', 'jws_mime_types');

function jws_get_excerpt($limit, $source = null)
{

    $excerpt = $source == "content" ? get_the_content() : get_the_excerpt();
    $excerpt = preg_replace(" (\[.*?\])", '', $excerpt);
    $excerpt = strip_shortcodes($excerpt);
    $excerpt = strip_tags($excerpt);
    $excerpt = substr($excerpt, 0, $limit);
    $excerpt = substr($excerpt, 0, strripos($excerpt, " "));
    $excerpt = trim(preg_replace('/\s+/', ' ', $excerpt));
    $excerpt = $excerpt . '...';
    return $excerpt;
}

if (!function_exists('jws_query_pagination')) {
    function jws_query_pagination($pages = '', $range = 2)
    {
        $showitems = ($range * 2);

        global $paged;

        if (empty($paged)) $paged = 1;

        if ($pages == '') {
            global $wp_query;
            $pages = $wp_query->max_num_pages;
            if (!$pages) {
                $pages = 1;
            }
        }

        if (1 != $pages) {
            echo "<div class='nxl-pagination'><div class='nxl_pagi_inner'>";
            if ($paged > 1) echo "<a class='prev' href='" . get_pagenum_link($paged - 1) . "'><span class='fa fa-arrow-left'></span></a>";
            echo "<ul>";
            for ($i = 1; $i <= $pages; $i++) {
                if (1 != $pages && (!($i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems)) {
                    echo wp_kses_post(($paged == $i) ? "<li><span class='item current'>" . $i . "</span></li>" : "<li><a href='" . get_pagenum_link($i) . "' class='inactive item' >" . $i . "</a></li>");
                }
            }
            echo "</ul>";

            if ($paged < $pages) echo "<a class='next' href='" . get_pagenum_link($paged + 1) . "'><span class='fa fa-arrow-right'></span></a>";
            echo "</div></div>\n";
        }
    }
}

/**
 * Render post tags.
 *
 * @since 1.0.0
 */
if (!function_exists('jws_get_tags')) :
    function jws_get_tags()
    {
        $output = '';

        // Get the tag list
        $tags_list = get_the_tag_list('', '');
        if ($tags_list) {
            $output .= sprintf('<div class="post-tags">' . esc_html__('%1$s', 'consbie') . '</div>', $tags_list);
        }
        return apply_filters('jws_get_tags', $output);
    }
endif;

/**
 * Render related post based on post tags.
 *
 * @since 1.0.0
 */
if (!function_exists('jws_related_post')) {

    function jws_related_post()
    {

        //$cats = get_the_category(get_the_ID());
        $cats = wp_get_object_terms( get_the_ID(), 'studies_cat', array('fields' => 'ids') );

    

        $args = array(
            'post_type' => 'studies',
            'post_status' => 'publish',
            'posts_per_page' => 100, // you may edit this number
            'orderby' => 'rand',
            'tax_query' => array(
                array(
                    'taxonomy' => 'studies_cat',
                    'field' => 'id',
                    'terms' =>  $cats
                )
            ),
            'post__not_in' => array (get_the_ID()),
         );

        $my_query = new WP_Query($args);
        $count = $my_query->post_count;
  
            ?>

        
   
            <h1 class="related_post_title"><?php echo esc_html__('Related Articles', 'consbie'); ?></h1>
  
            <div class="jws-post-related-slider nxl_blog_grid layout1"
                 data-slick='{"slidesToShow": 2 ,"slidesToScroll": 1,  "responsive":[{"breakpoint": 960,"settings":{"slidesToShow": 2}},{"breakpoint": 767,"settings":{"slidesToShow": 1}}]}'>
                <?php if ($my_query->have_posts()) {

                    while ($my_query->have_posts()) : $my_query->the_post();


                        get_template_part('template-parts/content/related');


                    endwhile;

                }

                wp_reset_postdata(); ?>


            </div>

        <?php

 

    }
}

/*Custom comment list*/
function jws_custom_comment($comment, $args, $depth)
{
    $GLOBALS['comment'] = $comment;
    extract($args, EXTR_SKIP);

    if ('div' == $args['style']) {
        $tag = 'div ';
        $add_below = 'comment';
    } else {
        $tag = 'li ';
        $add_below = 'div-comment';
    }
    ?>
    <<?php echo wp_kses_post($tag) ?><?php comment_class(empty($args['has_children']) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
    <?php if ('div' != $args['style']) : ?>
    <div id="div-comment-<?php comment_ID() ?>" class="comment-body">
<?php endif; ?>

    <div class="comment-avatar">
        <?php if ($args['avatar_size'] != 0) echo get_avatar($comment, $args['avatar_size']); ?>
    </div>
    <div class="comment-info">
        <div class="comment-header-info">
            <span class="comment-author"><?php printf(esc_html__('%s', 'consbie'), get_comment_author()); ?></span>
            <span class="comment-date"><?php printf(esc_html__('%1$s ', 'consbie'), get_comment_date()); ?></span>
            <span class="reply">
                <?php comment_reply_link(array_merge($args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))); ?>
            </span>
        </div>
        <?php comment_text(); ?>
        <?php if ($comment->comment_approved == '0') : ?>
            <em class="comment-awaiting-moderation"><?php esc_html_e('Your comment is awaiting moderation.', 'consbie'); ?></em>
            <br/>
        <?php endif; ?>
    </div>

    <?php if ('div' != $args['style']) : ?>
    </div>
<?php endif; ?>
    <?php
}

function jws_move_comment_field_to_bottom($fields)
{
    $comment_field = $fields['comment'];
    unset($fields['comment']);
    $fields['comment'] = $comment_field;
    return $fields;
}

add_filter('comment_form_fields', 'jws_move_comment_field_to_bottom');


if (!function_exists('jws_ajax_load_form_search')) {


    function jws_ajax_load_form_search()
    {

        ?>
        <span class="nxl_close_search fa fa-times-circle"></span>
        <div class="nxl_search_popup_inner"> <?php

            get_search_form();

         ?> </div> <?php

        die();
    }


    // Note: Keep default AJAX actions in case WooCommerce endpoint URL is unavailable
    add_action('wp_ajax_jws_ajax_load_form_search', 'jws_ajax_load_form_search');
    add_action('wp_ajax_nopriv_jws_ajax_load_form_search', 'jws_ajax_load_form_search');

}

// **********************************************************************// 
// ! Add favicon 
// **********************************************************************// 
if (!function_exists('jws_favicon')) {
    function jws_favicon()
    {

        if (function_exists('has_site_icon') && has_site_icon()) return '';

        // Get the favicon.
        $favicon = get_stylesheet_directory_uri() . '/favicon.ico';


        global $jws_option;
        
        if(isset($jws_option['favicon']) && !empty($jws_option['favicon'])) {
            $favicon = $jws_option['favicon']['url'];
        }

        ?>
        <link rel="shortcut icon" href="<?php echo esc_attr($favicon); ?>">
        <link rel="apple-touch-icon-precomposed" sizes="152x152" href="<?php echo esc_attr($favicon); ?>">
        <?php
    }

    add_action('wp_head', 'jws_favicon');
}

if (class_exists('Woocommerce')) {
    if( ! function_exists( 'jws_ajax_load_product' ) ) {
    	function jws_ajax_load_product($id = false) {
    		if( isset($_GET['id']) ) {
    			$id = (int) $_GET['id'];
    		}
    
    
    		global $post, $product;
    
    
    		$args = array( 'post__in' => array($id), 'post_type' => 'product' );
    
    		$quick_posts = get_posts( $args );
    
    	
    
    		foreach( $quick_posts as $post ) :
    			setup_postdata($post);
    			$product = wc_get_product($post);
    			include('quickview/content-quickview.php' );
    		endforeach; 
    
    		wp_reset_postdata(); 
    
    		die();
    	}
    
        
        // Note: Keep default AJAX actions in case WooCommerce endpoint URL is unavailable
        add_action('wp_ajax_jws_ajax_load_product', 'jws_ajax_load_product');
        add_action('wp_ajax_nopriv_jws_ajax_load_product', 'jws_ajax_load_product');
    
    } 
}
if( ! function_exists( 'jws_product_label' ) ) {
	function jws_product_label() {
		global $product;

		$output = array();


		if ( $product->is_on_sale() ) {

			$percentage = '';

			if ( $product->get_type() == 'variable' ) {

				$available_variations = $product->get_variation_prices();
				$max_percentage = 0;

				foreach( $available_variations['regular_price'] as $key => $regular_price ) {
					$sale_price = $available_variations['sale_price'][$key];

					if ( $sale_price < $regular_price ) {
						$percentage = round( ( ( $regular_price - $sale_price ) / $regular_price ) * 100 );

						if ( $percentage > $max_percentage ) {
							$max_percentage = $percentage;
						}
					}
				}

				$percentage = $max_percentage;
			} elseif ( ( $product->get_type() == 'simple' || $product->get_type() == 'external' ) ) {
				$percentage = round( ( ( $product->get_regular_price() - $product->get_sale_price() ) / $product->get_regular_price() ) * 100 );
			}

			if ( $percentage ) {
				$output[] = '<span class="onsale jws_pr_label">-' . $percentage . '%' . '</span>';
			}else{
				$output[] = '<span class="onsale jws_pr_label">' . esc_html__( 'Sale', 'consbie' ) . '</span>';
			}
		}
		
		if( !$product->is_in_stock() ){
			$output[] = '<span class="out-of-stock jws_pr_label">' . esc_html__( 'Sold out', 'consbie' ) . '</span>';
		}

		if ( $product->is_featured()) {
			$output[] = '<span class="featured jws_pr_label">' . esc_html__( 'Hot', 'consbie' ) . '</span>';
		}
		
		if ( get_post_meta( get_the_ID(), 'jws_new_label', true )) {
			$output[] = '<span class="new jws_pr_label">' . esc_html__( 'New', 'consbie' ) . '</span>';
		}
		
		
		if ( $output ) {
			echo '<div class="jws_pr_labels">' . implode( '', $output ) . '</div>';
		}
	}
}
add_filter( 'woocommerce_sale_flash', 'jws_product_label', 10 );

// Remove product in the cart using ajax
function warp_ajax_product_remove()
{
    // Get mini cart
    ob_start();

    foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item)
    {
        if($cart_item['product_id'] == $_POST['product_id'] && $cart_item_key == $_POST['cart_item_key'] )
        {
            WC()->cart->remove_cart_item($cart_item_key);
        }
    }

    WC()->cart->calculate_totals();
    WC()->cart->maybe_set_cart_cookies();

    woocommerce_mini_cart();

    $mini_cart = ob_get_clean();

    // Fragments and mini cart are returned
    $data = array(
        'fragments' => apply_filters( 'woocommerce_add_to_cart_fragments', array(
                'div.widget_shopping_cart_content' => '<div class="widget_shopping_cart_content">' . $mini_cart . '</div>'
            )
        ),
        'cart_hash' => apply_filters( 'woocommerce_add_to_cart_hash', WC()->cart->get_cart_for_session() ? md5( json_encode( WC()->cart->get_cart_for_session() ) ) : '', WC()->cart->get_cart_for_session() )
    );

    wp_send_json( $data );

    die();
}

add_action( 'wp_ajax_product_remove', 'warp_ajax_product_remove' );
add_action( 'wp_ajax_nopriv_product_remove', 'warp_ajax_product_remove' );

// Remove product in the cart using ajax
function backtotop(){ ?>
    <a href="#" class="backToTop fa fa-arrow-up"></a>
<?php }
add_action( 'wp_footer', 'backtotop' );
