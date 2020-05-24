<?php

	?>
	<div class="product-featured-sider">
        <h3><?php echo $settings['title'] ?></h3>
    <?php
        $tax_query[] = array(
            'taxonomy' => 'product_visibility',
            'field'    => 'name',
            'terms'    => 'featured',
            'operator' => 'IN', // or 'NOT IN' to exclude feature products
        );
        // The query
        $services = new WP_Query( array(
            'post_type'           => 'product',
            'post_status'         => 'publish',
            'posts_per_page'	  => $settings['posts_per_page'],
			'order'               => $settings['order'],
			'orderby'             => $settings['orderby'],
            'tax_query'           => $tax_query // <===
        ) );

		// The Query
        if ($services->have_posts()) {
            while ($services->have_posts()) {
                $services->the_post();
                ?><div class="jws-product-featured-sider"><a href="<?php the_permalink(); ?>"><?php
                    do_action( 'woocommerce_before_shop_loop_item_title' );
                ?> </a> <div class="ml-15"><?php
                        do_action( 'woocommerce_shop_loop_item_title' );
                        jws_cat_list();
                        do_action( 'woocommerce_after_shop_loop_item_title' );
                    ?></div>
                </div><?php
            }
        }
	?>
    </div>
    
