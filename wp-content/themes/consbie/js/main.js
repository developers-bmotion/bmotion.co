var jwsThemeModule;



(function ($) {

    "use strict";



    jwsThemeModule = (function () {

        

        return {

            



            init: function () {

                this.scrollTop();

                this.menu_mobile();

                this.project_slider();

                this.projects_filter();

                this.sticky_header();

                this.InstagramGallery();

                this.qickview();
                
                this.menu_canvas();



            },
             menu_canvas : function() {
                $('.jws_menu_canvas').eq(0).each(function() {
                  var seft = $(this);
                  seft.on('click', '.jws_menu_button', function(e) {
                    e.preventDefault();
                    seft.addClass('active');
                  });
                  seft.on('click', '.jws_menu_canvas_overlay', function(e) {
                    e.preventDefault();
                    seft.removeClass('active');
                  });
                  $(document).on("click", function(e) {
                    if (!$(e.target).is('.jws_menu_canvas, .jws_menu_canvas * , .jws_menu_canvas_sidebar ,  .jws_menu_canvas_sidebar *')) {
                      seft.removeClass('active');
                    }
                  });
                })
              },
            InstagramGallery: function() {    

           



                var instagramGallery = $('.jws-instagram-feed'),

                    caption          = (instagramGallery.find('.jws-insta-grid').data('caption') === 'show-caption') ? '<p class="insta-caption">{{caption}}</p>' : '',

                    likes            = (instagramGallery.find('.jws-insta-grid').data('likes') === 'yes') ? '<p class="jws-insta-post-likes"> <i class="fas fa-heart" aria-hidden="true"></i> {{likes}}</p>' : '',

                    comments         = (instagramGallery.find('.jws-insta-grid').data('comments') === 'yes') ? '<p class="jws-insta-post-comments"><i class="fas fa-comment" aria-hidden="true"></i> {{comments}}</p>' : '',

                    link_target      = (instagramGallery.find('.jws-insta-grid').data('link-target') === 'yes') ? 'target="_blank"' : '',

                    link             = (instagramGallery.find('.jws-insta-grid').data('link') === 'yes') ? '<a href=\"{{link}}\" ' +link_target+ '></a>' : '';

        

                $(instagramGallery).each(function() {

                    var get = $(this).find('.jws-insta-grid').data('get'),

                        tagName = $(this).find('.jws-insta-grid').data('tag-name'),

                        userId = $(this).find('.jws-insta-grid').data('user-id'),

                        clientId = $(this).find('.jws-insta-grid').data('client-id'),

                        accessToken = $(this).find('.jws-insta-grid').data('access-token'),

                        limit = $(this).find('.jws-insta-grid').data('limit'),

                        resolution = $(this).find('.jws-insta-grid').data('resolution'),

                        sortBy = $(this).find('.jws-insta-grid').data('sort-by'),

                        target = $(this).find('.jws-insta-grid').data('target');

        

                    var loadButton = $(this).find('.jws-load-more-button');

                    var feed = new Instafeed({

                        get: ''+get+'',

                        tagName: ''+tagName+'',

                        userId: userId,

                        clientId: ''+clientId+'',

                        accessToken: ''+accessToken+'',

                        limit: ''+limit+'',

                        resolution: ''+resolution+'',

                        sortBy: ''+sortBy+'',

                        target: ''+target+'',

                        template: '<div class="jws-insta-feed jws_item"><div class="jws-insta-feed-inner"><div class="jws-insta-feed-wrap"><div class="jws-insta-img-wrap"><img src="{{image}}" /></div><div class="jws-insta-info-wrap"><div class="jws-insta-info-wrap-inner"><div class="jws-insta-likes-comments">' + likes + comments + '</div>' + caption + '</div></div>' + link + '</div></div></div>',

                        after: function() {

                            var el = $(this);

                            if (el.classList)

                                el.classList.add('show');

                            else

                                el.className += ' ' + 'show';

        

                            // disable button if no more results to load

                            if (!this.hasNext()) {

                                $(loadButton).parent().addClass( 'no-pagination' );

                                loadButton.attr('disabled', 'disabled');

                            }

                        },

                        success: function() {

                            $(this).find('.jws-insta-grid').masonry();

                            $(loadButton).removeClass( 'button--loading' );

                            $(loadButton).find( 'span' ).html( 'Load More' );

                        }

                    });

        

                    // bind the load more button

                    loadButton.on('click', function() {

                        feed.next();

                        $(loadButton).addClass( 'button--loading' );

                        $(loadButton).find( 'span' ).html( 'Loading...' );

                    });

        

                    feed.run();

        

                    $(window).load(function() {

                        $(this).find('.jws-insta-grid').masonry({

                            itemSelector: '.jws-insta-feed',

                            percentPosition: true,

                            columnWidth: '.jws-insta-box'

                        });

                    });

                });

             },

            project_slider: function () {
                $('.autoplay').slick({
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    autoplaySpeed: 2000,
                    responsive: [
                        {
                          breakpoint: 990,
                          settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1,
                            autoplaySpeed: 2000,
                          }
                        },
                        {
                          breakpoint: 578,
                          settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                          }
                        }
                    ]
                });  
            },


            sticky_header: function () {



                // $(window).scroll(function () {

                //     var scroll = $(window).scrollTop();

                //     var height = $('.menu-header2').height() + 80;

                //     if (scroll >= height) {

                //         $(".menu-header2").addClass("menu-header2-sticky");

                //     } else {

                //         $(".menu-header2").removeClass("menu-header2-sticky");

                //     }

                // });



                $(window).scroll(function () {

                    var scroll = $(window).scrollTop();

                    var height = $('.backToTop').height() + 100;

                    if (scroll >= height) {

                        $(".backToTop").addClass("totop-show");

                    } else {

                        $(".backToTop").removeClass("totop-show");

                    }

                });



                if ($('.vc_row').hasClass('nxl_header_sticky_offset')) {

                    $(".nxl_header_sticky_offset").sticky({topSpacing: 0});

                }





            },

            

            scrollTop: function () {

               

                $(window).scroll(function () {

                    if ($(this).scrollTop() > 50 || $(this).pageYOffset > 50) {

                        $('.header-stick').addClass('header2-sticky');

                    } else {

                        $('.header-stick').removeClass('header2-sticky');

                    }

                });

                $(document).ready(function(){
                    var page = window.location.href;
                    $(".mega_menu a").each(function(){
                        if ($(this).attr("href") == page)
                        $(this).addClass("active")
                    });     
                });



                //Click event to scroll to top

                $('.backToTop').on("click", function() {    

                    $('html, body').animate({

                        scrollTop: 0

                    }, 800);

                    return false;

                });

            },









            projects_filter: function () {

                $('.nxl_projects_filter').each(function () {

                    var $this = $(this);

                    var $container = $this.find('.nxl_projects_filter_content'),

                        $filter = $this.find(".nxl_nav_filter");



                   



                    $(window).on("load resize", function () {

                        $container.isotope({

                            itemSelector: ".nxl_projects_item",

                            layoutMode: 'masonry',

                            hiddenStyle: {

                                transform: 'rotateY(-180deg)',

                                opacity: '0'

                            },

                            visibleStyle: {



                                transform: 'rotateY(0deg)',

                                opacity: '1'

                            },

                            transitionDuration: "0.7s"

                        });



                        

                        $filter.find("a").on("click touchstart", function (e) {

                            var $t = $(this),

                                selector = $t.data("filter");

                            // Don't proceed if already selected

                            if ($t.hasClass("filter-active"))

                                return false;



                            $filter.find("a").removeClass("filter-active");

                            $t.addClass("filter-active");

                            $container.isotope({filter: selector});



                            e.stopPropagation();

                            e.preventDefault();

                        });

                    })

                });

            },



            menu_mobile: function() {

                var body = $("body"),

                    dropDownCat = $(".elementor_jws_menu_layout_menu_vertical .menu-item-has-children ,.elementor_jws_menu_layout_menu_vertical .menu_has_shortcode"),

                    elementIcon = '<button class="icon-sub-menu icon-next4"></button>',

                    butOpener = $(".icon-sub-menu");

                $(elementIcon).insertAfter(dropDownCat.find('> a'));

                $(document).on("click", ".icon-sub-menu", function(e) {

                    var t = $(this).parent(),

                        n = $(t).parent();

                    if ($(t).hasClass("active")) $(t).find(">.sub-menu-dropdown ,  .sub-menu").parent().removeClass("active");

                    else {

                        var s = $(n).children("li.active");

                        $(s).removeClass("active").children(".mega-menu , .sub-menu").css({

                            height: "auto"

                        }), $(t).children(".sub-menu-dropdown, .sub-menu").parent().addClass("active")

                    }

                    return !1

                })

            },

            qickview: function() {
                // Ajax delete product in the cart
                $(document).on('click', '.product-remove a', function (e)
                {
                    e.preventDefault();

                    var product_id = $(this).attr("data-product_id"),
                        cart_item_key = $(this).attr("data-cart_item_key"),
                        product_container = $(this).parents('.mini_cart_item');

                    // Add loader
                    product_container.block({
                        message: null,
                        overlayCSS: {
                            cursor: 'none'
                        }
                    });
                    $('.woocommerce-mini-cart').addClass('loading');
                    $.ajax({
                        type: 'POST',
                        dataType: 'json',
                        url: wc_add_to_cart_params.ajax_url,
                        data: {
                            action: "product_remove",
                            product_id: product_id,
                            cart_item_key: cart_item_key
                        },
                        success: function(response) {
                            $('.woocommerce-mini-cart').removeClass('loading');
                            if ( ! response || response.error )
                                return;

                            var fragments = response.fragments;

                            // Replace fragments
                            if ( fragments ) {
                                $.each( fragments, function( key, value ) {
                                    $( key ).replaceWith( value );
                                });
                                $('.elementor-menu-cart__wrapper').on('click', '#elementor-menu-cart__toggle_button', function(e) { 
                                    e.preventDefault();
                                    $('.elementor-lightbox').addClass('elementor-menu-cart--shown');

                                });
                            }
                        }
                    });
                });


                // Open popup with product info when click on Quick View button

                $(document).on('click', '.product-eyes a', function(e) {

                    e.preventDefault();

                    var productId = $(this).data('product_id'),

                        loopName = $(this).data('loop-name'),

                        closeText = 'close_view',

                        loadingText = 'loading_view',

                        loop = $(this).data('loop'),

                        prev = '',

                        next = '',

                        loopBtns = $('.quick-view').find('[data-loop-name="' + loopName + '"]'),

                        btn = $(this);

                    btn.addClass('loading');

                    if (typeof loopBtns[loop - 1] != 'undefined') {

                        prev = loopBtns.eq(loop - 1).addClass('quick-view-prev');

                        prev = $('<div>').append(prev.clone()).html();

                    }

                    if (typeof loopBtns[loop + 1] != 'undefined') {

                        next = loopBtns.eq(loop + 1).addClass('quick-view-next');

                        next = $('<div>').append(next.clone()).html();

                    }

                    jwsThemeModule.quickViewLoad(productId, btn, prev, next, closeText, loadingText);

                });

            },

            quickViewLoad: function(id, btn, prev, next, closeText, loadingText) {

                var data = {

                    id: id,

                    action: "jws_ajax_load_product"

                };

                $.ajax({

                    url: MS_Ajax.ajaxurl,

                    data: data,

                    method: 'get',

                    success: function(data) {

                        // Open directly via API
                           
                        $.magnificPopup.open({

                            items: {

                                src: '<div id="jws-quickview" class="mfp-with-anim popup-quick-view">' + data + '</div>', // can be a HTML string, jQuery object, or CSS selector

                                type: 'inline'

                            },

                            tClose: closeText,

                            tLoading: loadingText,

                            removalDelay: 500, //delay removal by X to allow out-animation

                            callbacks: {

                                beforeOpen: function() {

                                    this.st.mainClass = 'mfp-zoom-in';

                                },

                                open: function() {

                                    $('.popup-quick-view').find('.variations_form').each(function() {

                                        $(this).wc_variation_form().find('.variations select:eq(0)').change();

                                        if (typeof $.fn.tawcvs_variation_swatches_form !== 'undefined') {

                                            $(this).tawcvs_variation_swatches_form();

                                        }

                                    });

                                    $('.variations_form').trigger('wc_variation_form');

                                    $('body').trigger('jws-quick-view-displayed');

                                    $('.quick-view-gallery').slick();

                                }

                            },

                        });

                    },

                    complete: function() {

                        btn.removeClass('loading');

                    },

                    error: function() {},

                });

            },

        }

    }());





    var team_slider = function($scope, $) {

        $scope.find('.slide-team').eq(0).each(function() {

            var $this = $(this);

            $this.slick();   

         });

     }

     var review_slider = function($scope, $) {

        $scope.find('.slide-review').eq(0).each(function() {

            var $this = $(this);

            $this.slick();   

         });

     }

    var studies_slider = function($scope, $) {

        $scope.find('.jws-studies-slide').eq(0).each(function() {

            var $this = $(this);

            $this.slick();   

         });


     }



     // Make sure you run this code under Elementor..

 $(window).on('elementor/frontend/init', function() {

    var widgets = {

      'jws-teams.default':team_slider,

      'Jws-slide.default':review_slider,

      'jws-studies-slide.default':studies_slider,

    };

    $.each(widgets, function(widget, callback) {

      if ('object' === typeof callback) {

        $.each(callback, function(index, cb) {

          elementorFrontend.hooks.addAction('frontend/element_ready/' + widget, cb);

        });

      } else {

        elementorFrontend.hooks.addAction('frontend/element_ready/' + widget, callback);

      }

    });

  });

})(jQuery);







jQuery(document).ready(function () {



    jwsThemeModule.init();

    



});

     