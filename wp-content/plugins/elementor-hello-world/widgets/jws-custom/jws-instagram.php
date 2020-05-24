<?php
namespace ElementorHelloWorld\Widgets\JwsCustom;

use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Border;
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Elementor Hello World
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class Instagram extends Widget_Base {

	/**
	 * Retrieve the widget name.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'jws_instagram';
	}

	/**
	 * Retrieve the widget title.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Jws Instagram', 'fatcy' );
	}

	/**
	 * Retrieve the widget icon.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-site-search';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * Note that currently Elementor supports only one category.
	 * When multiple categories passed, Elementor uses the first one.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'jws-elements' ];
	}

    /**
	 * Retrieve the list of scripts the widget depended on.
	 *
	 * Used to set scripts dependencies required to run the widget.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget scripts dependencies.
	 */
	public function get_script_depends() {
		return [ 'instagram' , 'masonry' ];
	}
	/**
	 * Register the widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function _register_controls() {
		$this->start_controls_section(
  			'jws_section_instafeed_settings_account',
  			[
  				'label' => esc_html__( 'Instagram Account Settings', 'essential-addons-elementor' )
  			]
  		);

        $this->add_control(
			'title',
			[
				'label' => __( 'Title', 'elementor-hello-world' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Instagram Feed', 'elementor-hello-world' ),
			]
        );
        
        $this->add_control(
			'show_title',
			[
				'label' => __( 'Show Title', 'elementor-pro' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'label_off' => __( 'Off', 'elementor-pro' ),
				'label_on' => __( 'On', 'elementor-pro' ),
			]
        );
        
		$this->add_control(
			'jws_instafeed_access_token',
			[
				'label' => esc_html__( 'Access Token', 'essential-addons-elementor' ),
				'type' => Controls_Manager::TEXT,

				'default' => esc_html__( '4507625822.ba4c844.2608ae40c33d40fe97bffdc9bed8c9c7', 'essential-addons-elementor' ),
				'description' => '<a href="http://www.jetseotools.com/instagram-access-token/" class="jws-btn" target="_blank">Get Access Token</a>', 'essential-addons-elementor',
			]
		);

		$this->add_control(
			'jws_instafeed_user_id',
			[
				'label' => esc_html__( 'User ID', 'essential-addons-elementor' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( '4507625822', 'essential-addons-elementor' ),
				'description' => '<a href="https://codeofaninja.com/tools/find-instagram-user-id" class="jws-btn" target="_blank">Get User ID</a>', 'essential-addons-elementor',
			]
		);


		$this->add_control(
			'jws_instafeed_client_id',
			[
				'label' => esc_html__( 'Client ID', 'essential-addons-elementor' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( '09908b866b954358b028cc488171dadf', 'essential-addons-elementor' ),
				'description' => '<a href="https://www.instagram.com/developer/clients/manage/" class="jws-btn" target="_blank">Get Client ID</a>', 'essential-addons-elementor',
			]
		);



		$this->end_controls_section();

  		$this->start_controls_section(
  			'jws_section_instafeed_settings_content',
  			[
  				'label' => esc_html__( 'Feed Settings', 'essential-addons-elementor' )
  			]
  		);

		$this->add_control(
			'jws_instafeed_source',
			[
				'label' => esc_html__( 'Instagram Feed Source', 'essential-addons-elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'user',
				'options' => [
					'user' => esc_html__( 'User', 'essential-addons-elementor' ),
					'tagged' => esc_html__( 'Hashtag', 'essential-addons-elementor' ),
				],
			]
		);

		$this->add_control(
			'jws_instafeed_hashtag',
			[
				'label' => esc_html__( 'Hashtag', 'essential-addons-elementor' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'cars', 'essential-addons-elementor' ),
				'condition' => [
					'jws_instafeed_source' => 'tagged',
				],
				'description' => 'Place the hashtag without #', 'essential-addons-elementor',
			]
		);

		$this->add_control(
			'jws_instafeed_sort_by',
			[
				'label' => esc_html__( 'Sort By', 'essential-addons-elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'none',
				'options' => [
					'none' => esc_html__( 'None', 'essential-addons-elementor' ),
					'most-recent' => esc_html__( 'Most Recent',   'essential-addons-elementor' ),
					'least-recent' => esc_html__( 'Least Recent', 'essential-addons-elementor' ),
					'most-liked' => esc_html__( 'Most Likes', 'essential-addons-elementor' ),
					'least-liked' => esc_html__( 'Least Likes', 'essential-addons-elementor' ),
					'most-commented' => esc_html__( 'Most Commented', 'essential-addons-elementor' ),
					'least-commented' => esc_html__( 'Least Commented', 'essential-addons-elementor' ),
					'random' => esc_html__( 'Random', 'essential-addons-elementor' ),
				],
			]
		);

		$this->add_control(
			'jws_instafeed_image_count',
			[
				'label' => esc_html__( 'Max Visible Images', 'essential-addons-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 12,
				],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 100,
					],
				],
			]
		);

		$this->add_control(
			'jws_instafeed_image_resolution',
			[
				'label' => esc_html__( 'Image Resolution', 'essential-addons-elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'low_resolution',
				'options' => [
					'thumbnail' => esc_html__( 'Thumbnail (150x150)', 'essential-addons-elementor' ),
					'low_resolution' => esc_html__( 'Low Res (306x306)',   'essential-addons-elementor' ),
					'standard_resolution' => esc_html__( 'Standard (612x612)', 'essential-addons-elementor' ),
				],
			]
		);

		$this->add_control(
			'jws_instafeed_force_square',
			[
				'label' => esc_html__( 'Force Square Image?', 'essential-addons-elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => '',
			]
		);

		$this->add_responsive_control(
			'jws_instafeed_sq_image_size',
			[
				'label' => esc_html__( 'Image Dimension (px)', 'essential-addons-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 300,
				],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 1000,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .jws-instafeed-square-img .jws-insta-img-wrap img' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}}; object-fit: cover;',
				],
 				'condition' => [
					'jws_instafeed_force_square' => 'yes',
				],
			]
		);

		$this->end_controls_section();


  		$this->start_controls_section(
  			'jws_section_instafeed_settings_general',
  			[
  				'label' => esc_html__( 'General Settings', 'essential-addons-elementor' )
  			]
  		);

        $this->add_responsive_control(
				'jws_instafeed_columns',
				[
					'label'          => __( 'Columns', 'uael' ),
					'type'           => Controls_Manager::SELECT,
					'default'        => '4',
					'tablet_default' => '3',
					'mobile_default' => '1',
					'options'        => [
						'1' => '1',
						'2' => '2',
						'3' => '3',
						'4' => '4',
						'5' => '5',
						'6' => '6',
                        '7' => '7',
					],
				]
		);
		$this->add_control(
			'jws_instafeed_pagination_heading',
			[
				'label' => __( 'Pagination', 'essential-addons-elementor' ),
				'type' => Controls_Manager::HEADING,
			]
		);

		$this->add_control(
			'jws_instafeed_pagination',
			[
				'label' => esc_html__( 'Enable Load More?', 'essential-addons-elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => '',
			]
		);

		$this->add_control(
			'jws_instafeed_caption_heading',
			[
				'label' => __( 'Link & Content', 'essential-addons-elementor' ),
				'type' => Controls_Manager::HEADING,
			]
		);

		$this->add_control(
			'jws_instafeed_caption',
			[
				'label' => esc_html__( 'Display Caption', 'essential-addons-elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'return_value' => 'show-caption',
				'default' => '',
			]
		);

		$this->add_control(
			'jws_instafeed_likes',
			[
				'label' => esc_html__( 'Display Like', 'essential-addons-elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'jws_instafeed_comments',
			[
				'label' => esc_html__( 'Display Comments', 'essential-addons-elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'jws_instafeed_link',
			[
				'label' => esc_html__( 'Enable Link', 'essential-addons-elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'jws_instafeed_link_target',
			[
				'label' => esc_html__( 'Open in new window?', 'essential-addons-elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => 'yes',
				'condition' => [
					'jws_instafeed_link' => 'yes',
				],
			]
		);

		$this->end_controls_section();


		$this->start_controls_section(
			'jws_section_instafeed_styles_general',
			[
				'label' => esc_html__( 'Instagram Feed Styles', 'essential-addons-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);

	   $this->add_responsive_control(
			'column_gap',
			[
				'label'     => __( 'Columns Gap', 'uael' ),
				'type'      => Controls_Manager::SLIDER,
				'default'   => [
					'size' => 20,
				],
				'range'     => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .jws-insta-grid .jws-insta-feed' => 'padding-right: calc( {{SIZE}}{{UNIT}}/2 ); padding-left: calc( {{SIZE}}{{UNIT}}/2 );',
					'{{WRAPPER}} .jws-insta-grid' => 'margin-left: calc( -{{SIZE}}{{UNIT}}/2 ); margin-right: calc( -{{SIZE}}{{UNIT}}/2 );',
				],
			]
		);

		$this->add_responsive_control(
			'row_gap',
			[
				'label'     => __( 'Rows Gap', 'uael' ),
				'type'      => Controls_Manager::SLIDER,
				'default'   => [
					'size' => 35,
				],
				'range'     => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .jws-insta-grid .jws-insta-feed' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'jws_instafeed_box_border',
				'label' => esc_html__( 'Border', 'essential-addons-elementor' ),
				'selector' => '{{WRAPPER}} .jws-insta-feed-wrap',
			]
		);

		$this->add_control(
			'jws_instafeed_box_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'essential-addons-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'selectors' => [
					'{{WRAPPER}} .jws-insta-feed-inner' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
				],
			]
		);

		$this->end_controls_section();


		$this->start_controls_section(
			'jws_section_instafeed_styles_content',
			[
				'label' => esc_html__( 'Color &amp; Typography', 'essential-addons-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);


		$this->add_control(
			'jws_instafeed_overlay_color',
			[
				'label' => esc_html__( 'Hover Overlay Color', 'essential-addons-elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => 'rgba(0,0,0, .75)',
				'selectors' => [
					'{{WRAPPER}} .jws-instagram-feed .jws-insta-feed .jws-insta-feed-inner .jws-insta-feed-wrap .jws-insta-info-wrap:after' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'jws_instafeed_like_comments_heading',
			[
				'label' => __( 'Like & Comments Styles', 'essential-addons-elementor' ),
				'type' => Controls_Manager::HEADING,
			]
		);

		$this->add_control(
			'jws_instafeed_like_comments_color',
			[
				'label' => esc_html__( 'Like &amp; Comments Color', 'essential-addons-elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#fbd800',
				'selectors' => [
					'{{WRAPPER}} .jws-instagram-feed .jws-insta-feed .jws-insta-feed-inner .jws-insta-feed-wrap .jws-insta-info-wrap .jws-insta-likes-comments > p' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
             'name' => 'jws_instafeed_like_comments_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_2,
				'selector' => '{{WRAPPER}} .jws-insta-likes-comments > p',
			]
		);

		$this->add_control(
			'jws_instafeed_caption_style_heading',
			[
				'label' => __( 'Caption Styles', 'essential-addons-elementor' ),
				'type' => Controls_Manager::HEADING,
			]
		);

		$this->add_control(
			'jws_instafeed_caption_color',
			[
				'label' => esc_html__( 'Caption Color', 'essential-addons-elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .jws-insta-info-wrap' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
             'name' => 'jws_instafeed_caption_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_2,
				'selector' => '{{WRAPPER}} .jws-insta-info-wrap',
			]
		);


		$this->end_controls_section();

		$this->start_controls_section(
            'jws_section_load_more_btn',
            [
                'label' => __( 'Load More Button Style', 'essential-addons-elementor' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

		$this->add_responsive_control(
			'jws_instafeed_load_more_btn_padding',
			[
				'label' => esc_html__( 'Padding', 'essential-addons-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
	 					'{{WRAPPER}} .jws-load-more-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	 			],
			]
		);

		$this->add_responsive_control(
			'jws_instafeed_load_more_btn_margin',
			[
				'label' => esc_html__( 'Margin', 'essential-addons-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
	 					'{{WRAPPER}} .jws-load-more-button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	 			],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
	         'name' => 'jws_instafeed_load_more_btn_typography',
				'selector' => '{{WRAPPER}} .jws-load-more-button',
			]
		);

		$this->start_controls_tabs( 'jws_instafeed_load_more_btn_tabs' );

			// Normal State Tab
			$this->start_controls_tab( 'jws_instafeed_load_more_btn_normal', [ 'label' => esc_html__( 'Normal', 'essential-addons-elementor' ) ] );

			$this->add_control(
				'jws_instafeed_load_more_btn_normal_text_color',
				[
					'label' => esc_html__( 'Text Color', 'essential-addons-elementor' ),
					'type' => Controls_Manager::COLOR,
					'default' => '#fff',
					'selectors' => [
						'{{WRAPPER}} .jws-load-more-button' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'jws_cta_btn_normal_bg_color',
				[
					'label' => esc_html__( 'Background Color', 'essential-addons-elementor' ),
					'type' => Controls_Manager::COLOR,
					'default' => '#29d8d8',
					'selectors' => [
						'{{WRAPPER}} .jws-load-more-button' => 'background: {{VALUE}};',
					],
				]
			);

			$this->add_group_control(
				Group_Control_Border::get_type(),
				[
					'name' => 'jws_instafeed_load_more_btn_normal_border',
					'label' => esc_html__( 'Border', 'essential-addons-elementor' ),
					'selector' => '{{WRAPPER}} .jws-load-more-button',
				]
			);

			$this->add_control(
				'jws_instafeed_load_more_btn_border_radius',
				[
					'label' => esc_html__( 'Border Radius', 'essential-addons-elementor' ),
					'type' => Controls_Manager::SLIDER,
					'range' => [
						'px' => [
							'max' => 100,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .jws-load-more-button' => 'border-radius: {{SIZE}}px;',
					],
				]
			);

			$this->add_group_control(
				Group_Control_Box_Shadow::get_type(),
				[
					'name' => 'jws_instafeed_load_more_btn_shadow',
					'selector' => '{{WRAPPER}} .jws-load-more-button',
					'separator' => 'before'
				]
			);

			$this->end_controls_tab();

			// Hover State Tab
			$this->start_controls_tab( 'jws_instafeed_load_more_btn_hover', [ 'label' => esc_html__( 'Hover', 'essential-addons-elementor' ) ] );

			$this->add_control(
				'jws_instafeed_load_more_btn_hover_text_color',
				[
					'label' => esc_html__( 'Text Color', 'essential-addons-elementor' ),
					'type' => Controls_Manager::COLOR,
					'default' => '#fff',
					'selectors' => [
						'{{WRAPPER}} .jws-load-more-button:hover' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'jws_instafeed_load_more_btn_hover_bg_color',
				[
					'label' => esc_html__( 'Background Color', 'essential-addons-elementor' ),
					'type' => Controls_Manager::COLOR,
					'default' => '#27bdbd',
					'selectors' => [
						'{{WRAPPER}} .jws-load-more-button:hover' => 'background: {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'jws_instafeed_load_more_btn_hover_border_color',
				[
					'label' => esc_html__( 'Border Color', 'essential-addons-elementor' ),
					'type' => Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .jws-load-more-button:hover' => 'border-color: {{VALUE}};',
					],
				]

			);

			$this->add_group_control(
				Group_Control_Box_Shadow::get_type(),
				[
					'name' => 'jws_instafeed_load_more_btn_hover_shadow',
					'selector' => '{{WRAPPER}} .jws-load-more-button:hover',
					'separator' => 'before'
				]
			);
			$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();

	}

	/**
	 * Render the widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function render() {
		$settings 	= $this->get_settings();
        $image_limit 	= $this->get_settings( 'jws_instafeed_image_count' );
        $force_square = ( ($settings['jws_instafeed_force_square'] == 'yes') ? "jws-instafeed-square-img" : "" );
    	$column_count = ($settings['jws_instafeed_columns']);
    	$classes 		= $force_square;     
		include( dirname(__DIR__) .'/html/instagram.php');

	}

	/**
	 * Render the widget output in the editor.
	 *
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function _content_template() {}
}