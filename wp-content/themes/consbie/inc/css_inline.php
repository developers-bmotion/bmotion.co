<?php
/**
 * Render custom styles.
 *
 * @since 1.0.0
 */
if ( ! function_exists( 'jws_custom_css' ) ) {
	function jws_custom_css( $css = array() ) {
    
    global $jws_option;
        $custom_meta_color = get_post_meta(get_the_ID(), 'custom_main_color', true);
        if(!empty($custom_meta_color)) {
          $color_main = $custom_meta_color;  
        }else {
          $color_main = (isset($jws_option['main-color']) && $jws_option['main-color']) ? $jws_option['main-color'] : '';   
        }
        if(!empty($custom_meta_color)) {
          $button_hover = $custom_meta_color;  
        }else {
          $button_hover = (isset($jws_option['button-hover']) && $jws_option['button-hover']) ? $jws_option['button-hover'] : '';   
        }
        if(!empty($custom_meta_color)) {
          $color1 = $custom_meta_color;  
        }else {
          $color1 = (isset($jws_option['color1']) && $jws_option['color1']) ? $jws_option['color1'] : '';   
        }
        if(!empty($custom_meta_color)) {
          $color2 = $custom_meta_color;  
        }else {
          $color2 = (isset($jws_option['color2']) && $jws_option['color2']) ? $jws_option['color2'] : '';   
        }
        if(!empty($custom_meta_color)) {
          $color3 = $custom_meta_color;  
        }else {
          $color3 = (isset($jws_option['color3']) && $jws_option['color3']) ? $jws_option['color3'] : '';   
        }
        if(!empty($custom_meta_color)) {
          $color4 = $custom_meta_color;  
        }else {
          $color4 = (isset($jws_option['color4']) && $jws_option['color4']) ? $jws_option['color4'] : '';   
        }
     
		if ( $color_main ) {
            $css[] = '.elementor-element .elementor-widget-price-table .elementor-price-table__button,
                      .elementor-element.elementor-widget-button a.elementor-button, .elementor-widget-button .elementor-button,
                      .elementor-element.elementor-widget-progress .elementor-progress-wrapper .elementor-progress-bar,
                      .layout-service2 .elementor-service::before,
                      .layout-review-1 .slick-track .slick-slide .slide-icon,
                      .icon-hover-scale .elementor-icon-list-item .elementor-icon-list-icon i::after,
                      .layout-service1:hover .elementor-service,
                      .slide-team li.slick-active,
                      .home-blog .layout1 .post-link__text,
                      .layout-service3 .elementor-service::before,
                      .layout-review-3 .slide-content-review__box-shadow:before, .layout-review-3 .elementor-slide-description:before, .layout-review-3 .slide-content-review__box-shadow::after, .layout-review-3 .elementor-slide-description::after,
                      .layout-studies3 .studies-info,
                      .layout-team4 .teams:hover .team-info,
                      .elementor-element.elementor-widget-price-table .elementor-price-table__ribbon-inner,
                      .pricing__price-home3 .price-most-popular .elementor-widget-container .elementor-heading-title,
                      .wpcf7 .wpcf7-submit
                      { background-color: ' . esc_attr( $color_main ) . '}';
            
            $css[] = '.home-blog .layout4 .post-author,
                      .home-blog .layout4:hover .post-link a,
                      .home-blog .layout3:hover .post-link a,
                      .layout-service5:hover .elementor-service,
                      .layout-service5 .img-services,
                      .layout-review-5 .elementor-slide-description,
                      .toogle-home5 .elementor-accordion-item .elementor-tab-title a span,
                      .jws-post-archive .layout-post-archive1 .post-info .post-time,
                      .jws-post-archive .layout-post-archive1 .post-link__text,
                      .navigation .nxl_pagi_inner ul li .current,
                      .jws-post-archive .layout-post-archive2 .post-author,
                      .jws-post-archive .layout-post-archive2:hover .post-link a,
                      .jws-post-archive .layout-post-archive1 .post-info .post-author::before,
                      .layout-single-team1 .single-team:hover .team-info,
                      .accordion-faq .elementor-tab-content a,
                      .elementor-element.elementor-menu-cart--items-indicator-bubble .elementor-menu-cart__toggle .elementor-button-icon[data-counter]:before,
                      .comment-form .form-submit .submit:hover
                       { background: ' . esc_attr( $color_main ) . '}';

            $css[] = '.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt,                   .woocommerce input.button.alt,
                      .woocommerce a.remove:hover,
                      .checkout-page .nxl_woo_your_order .woocommerce-checkout-payment ul label::after,
                      .elementor-2741 .elementor-element.elementor-element-ab4f1a1 .add_to_cart_button,
                      .product-archive .bg-f7f7f7 .option-product .add_to_wishlist:hover, .product-archive .bg-f7f7f7 .option-product .compare:hover, .product-archive .bg-f7f7f7 .option-product .product-eyes a:hover, .product-archive .bg-f7f7f7 .option-product .yith-wcwl-wishlistexistsbrowse a:hover, .product-archive .bg-f7f7f7 .option-product .yith-wcwl-wishlistaddedbrowse a:hover,
                      .jws-shop-archive2 .jws-shop-slidebar .ui-slider-range,
                      .jws-shop-archive2 .jws-shop-slidebar .ui-slider-handle,
                      .mfp-content .popup-quick-view .jws-summary .summary .single_add_to_cart_button,
                      .wishlist .yith-wcwl-share ul li,
                      .wishlist .woocommerce tr td.product-add-to-cart .add_to_cart,
                      .elementor-menu-cart__container.elementor-lightbox .elementor-menu-cart__main .elementor-button,
                      .woocommerce nav.woocommerce-pagination ul li a:focus, .woocommerce nav.woocommerce-pagination ul li a:hover, .woocommerce nav.woocommerce-pagination ul li span.current
                       { background: ' . esc_attr( $color_main ) . '}';
                  
            $css[] = '.elementor-element.elementor-widget-button a.elementor-button:hover,
                      .home-blog .layout1 .elementor-post .post-link__text:hover,
                      .jws-post-archive .layout-post-archive1 .post-link__text:hover,
                      .elementor-2741 .elementor-element.elementor-element-ab4f1a1 .add_to_cart_button:hover,
                      .woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover,
                      .shop-single-related .cart-hover .add_to_cart_button:hover,
                      .wishlist .yith-wcwl-share ul li:hover,
                      .wishlist .woocommerce tr td.product-add-to-cart .add_to_cart:hover,
                      .wpcf7 .wpcf7-submit:hover
                        { background: ' . esc_attr( $button_hover ) . '}';
            
            $css[] =   'a:hover,
                       .elementor-element.elementor-widget-circle-progress .ee-circle-progress__value,
                       .elementor-element.elementor-widget-icon-list .elementor-icon-list-icon i,
                       .studies_filter .masonry-filter .filter-active,
                       .home-blog .layout2:hover .color-layout-hover,
                       .layout-studies1 .studies-category a,
                       .home-blog .layout3:hover .color-layout-hover,
                       .home-blog .layout3 .post-link a,
                       .home-blog .layout4 .post-time,
                       .home-blog .layout4 .post-link a,
                       .jws-post-archive .layout-post-archive2 .post-time,
                       .jws-post-archive .layout-post-archive2 .post-link a,
                       .elementor-widget-heading.elementor-widget-heading h4.elementor-heading-title,
                       .elementor-element.elementor-widget-accordion .elementor-accordion .elementor-tab-title,
                       .elementor-element.elementor-widget-accordion .elementor-accordion .elementor-tab-title.elementor-active,
                       .product-archive .bg-f7f7f7 .option-product .product-eyes a,
                       .mfp-content .popup-quick-view .jws-summary .summary .price,
                       .toogle-home5.toggle-question .elementor-active a:hover,
                       .mega_menu .megasub .elementor-heading-title .active,
                       .backToTop:hover,
                       .elementor-custom-embed-play i,
                       .nxl_feature_box .nxl_feature_box_video a { color: ' . esc_attr( $color_main ) . '}';
             
            $css[] = '.height-593 .elementor-widget-container,
                      .layout-service2 .border-bottom-servecis,
                      .height-600 .elementor-widget-container,
                      .height-553 .elementor-widget-container,
                      .home-blog .layout3 .post-link a,
                      .home-blog .layout4 .post-link a,
                      .height-595 .elementor-widget-container,
                      .jws-post-archive .layout-post-archive2 .post-link a,
                      .checkout-page .woocommerce-checkout .checkout-ship h3 span:after,
                      .elementor-widget__width-initial.elementor-widget.elementor-widget-heading .elementor-widget-container,
                      .single-product .single-product-left .flex-control-nav li img.flex-active,
                      .nxl_service_box.layout3 .nxl_service_box_content .nxl_service_boxbutton:hover:after{ border-color: ' . esc_attr( $color_main ) . '}';
            
            $css[] =   '.elementor-widget-heading.elementor-widget-heading h2.elementor-heading-title,
                      .elementor-widget-progress .elementor-title,
                      .layout-service2 .post-title,
                      .layout-review-1 .slick-track .slick-slide .elementor-slide-your_name,
                      .elementor-widget-jws-post .post-title,
                      .layout-studies1 .studies-title,
                      .elementor-element.layout-service1 .post-title,
                      .elementor-element.elementor-widget-jws-services .post-title,
                      .elementor-element.elementor-widget-Jws-slide .elementor-slide-your_name,
                      .elementor-element.elementor-widget-jws-post-archive .post-title,
                      .elementor-element.elementor-widget-jws-services .post-title,
                      .nxl_feature_box .nxl_feature_box_video a { color: ' . esc_attr( $color1 ) . '}';

            $css[] = '.elementor-widget-heading.elementor-widget-heading p.elementor-heading-title,
                      .layout-service2 .post-decription,
                      .layout-review-1 .slick-track .slick-slide .elementor-slide-description,
                      .studies_filter .masonry-filter li a,
                      .elementor-element.elementor-widget-icon-list .elementor-icon-list-text,
                      .elementor-element.elementor-widget-accordion .elementor-accordion .elementor-tab-content,
                      .elementor-element.elementor-widget-circle-progress .ee-circle-progress__text,
                      .elementor-element.elementor-widget-text-editor,
                      .layout-service1 .services-category a,
                      .elementor-element.elementor-widget-Jws-slide .elementor-slide-description,
                      .elementor-widget-jws-teams .team-category a,
                      .elementor-element.elementor-widget-jws-post-archive .post-decription,
                      .elementor-element.elementor-widget-jws-services .post-decription,
                      .elementor-element.elementor-widget-jws-post .post-decription,
                      .nxl_feature_box .nxl_feature_box_video a { color: ' . esc_attr( $color2 ) . '}';

            $css[] = '.elementor-widget-heading.elementor-widget-heading h3.elementor-heading-title { color: ' . esc_attr( $color3 ) . '}';

            $css[] = '.layout-service2:hover .post-title, .layout-service2:hover .post-decription,
                      .toggle-question .elementor-active a:hover,
                      .layout-service1:hover .services-category a, .layout-service1:hover .post-title{ color: ' . esc_attr( $color4 ) . '}';
		}
	

		return preg_replace( '/\n|\t/i', '', implode( '', $css ) );
	}
}