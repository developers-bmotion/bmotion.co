<?php

	/**
	 * Hook: woocommerce_before_shop_loop.
	 *
	 * @hooked woocommerce_output_all_notices - 10
	 * @hooked woocommerce_result_count - 20
	 * @hooked woocommerce_catalog_ordering - 30
	 */
	?><div class="row">
		<div class="col-12 fitter-product">
			<?php
				do_action( 'woocommerce_before_shop_loop' );
			?>
		</div>
		
	</div>

		<div class="row product-archive">
	<?php
		// WP_Query arguments
		// $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		// $args = array (
		// 	'post_type'              => array( 'product' ),
		// 	'posts_per_page'         => $settings['posts_per_page'],
		// 	'order'                  => $settings['order'],
		// 	'orderby'                => $settings['orderby'],
		// 	'paged' => $paged
		// );

		// The Query
		// $services = new \WP_Query( $args );
		// if ( wc_get_loop_prop( 'total' ) ) {
		// if ($services->have_posts()) {
            while (have_posts()) {
                the_post();

                /**
                 * Hook: woocommerce_shop_loop.
                 */
                do_action('woocommerce_shop_loop');

                include('product.php');
            }
		// }
		// }
	?>
		</div>

	<?php


	/**
	 * Hook: woocommerce_after_shop_loop.
	 *
	 * @hooked woocommerce_pagination - 10
	 */
	do_action('woocommerce_after_shop_loop');
