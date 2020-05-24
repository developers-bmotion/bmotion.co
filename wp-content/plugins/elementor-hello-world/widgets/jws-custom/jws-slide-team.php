<?php
namespace ElementorHelloWorld\Widgets\JwsCustom;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Elementor Hello World
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class JwsTeams extends Widget_Base {

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
		return 'jws-teams';
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
		return __( 'JWS-Teams', 'consbie' );
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
		return 'eicon-posts-ticker';
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
		return [ 'general' ];
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
		return [ 'consbie' ];
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
			'section_title',
			[
				'label' => __( 'Team', 'consbie' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_responsive_control(
			'columns',
			[
				'label' => __( 'Columns', 'consbie' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '4',
				'tablet_default' => '2',
				'mobile_default' => '1',
				'options' => [
					'1' => '12',
					'2' => '6',
					'3' => '4',
					'4' => '3',
					'6' => '2',
					'12' => '1',
				],
			]
		);

		$this->add_control(
			'posts_per_page',
			[
				'label' => __( 'Teams Per Page', 'consbie' ),
				'type' => Controls_Manager::NUMBER,
				'default' => 6,
			]
		);

		$this->add_responsive_control(
			'slidesToShow',
			[
				'label' => __( 'Slides to Show', 'consbie' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '3',
				'tablet_default' => '2',
				'mobile_default' => '1',
				'options' => [
					'1' => '1',
					'2' => '2',
					'3' => '3',
					'4' => '4',
					'5' => '5',
					'6' => '6',
					'7' => '7',
					'8' => '8',
					'9' => '9',
					'10' => '10',
				],
			]
		);

		$this->add_responsive_control(
			'slidesToScroll',
			[
				'label' => __( 'Slides to Scroll', 'consbie' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '3',
				'tablet_default' => '2',
				'mobile_default' => '1',
				'options' => [
					'1' => '1',
					'2' => '2',
					'3' => '3',
					'4' => '4',
					'5' => '5',
					'6' => '6',
					'7' => '7',
					'8' => '8',
					'9' => '9',
					'10' => '10',
				],
			]
		);

		$this->add_responsive_control(
			'layout',
			[
				'label' => __( 'Layout', 'consbie' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'layout-team1',
				'options' => [
					'layout-team1' => 'layout 1',
					'layout-team2' => 'layout 2',
					'layout-team3' => 'layout 3',
					'layout-team4' => 'layout 4',
					'layout-team5' => 'layout 5',
					'layout-team6' => 'layout 6',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Image_Size::get_type(),
			[
				'name' => 'image', // Actually its `image_size`.
				'label' => __( 'Image Size', 'consbie' ),
				'default' => 'large',
                'exclude' 		=> [ 'custom' ],
			]
		);
		$this->add_control(
			'show_title',
			[
				'label' => __( 'Show Title', 'consbie' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'label_off' => __( 'Off', 'consbie' ),
				'label_on' => __( 'On', 'consbie' ),
			]
		);
		$this->add_control(
			'show_decription',
			[
				'label' => __( 'Show Decription', 'consbie' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'label_off' => __( 'Off', 'consbie' ),
				'label_on' => __( 'On', 'consbie' ),
			]
		);
		$this->add_control(
			'teams_per_words',
			[
				'label' => __( 'Teams Per Words', 'consbie' ),
				'type' => Controls_Manager::NUMBER,
                'default' => '50',
                'condition' 	=> [
					'show_decription!'	=> '',
				],
			]
		);
		$this->add_control(
			'icon_list',
			[
				'label' => '',
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'text' => __( 'List Item #1', 'consbie' ),
						'icon' => 'fa fa-check',
					],
					[
						'text' => __( 'List Item #2', 'consbie' ),
						'icon' => 'fa fa-times',
					],
					[
						'text' => __( 'List Item #3', 'consbie' ),
						'icon' => 'fa fa-dot-circle-o',
					],
				],
				'fields' => [
					[
						'name' => 'text',
						'label' => __( 'Text', 'consbie' ),
						'type' => Controls_Manager::TEXT,
						'label_block' => true,
						'placeholder' => __( 'List Item', 'consbie' ),
						'default' => __( 'List Item', 'consbie' ),
					],
					[
						'name' => 'icon',
						'label' => __( 'Icon', 'consbie' ),
						'type' => Controls_Manager::ICON,
						'label_block' => true,
						'default' => 'fa fa-check',
					],
					[
						'name' => 'link',
						'label' => __( 'Link', 'consbie' ),
						'type' => Controls_Manager::URL,
						'label_block' => true,
						'placeholder' => __( 'http://your-link.com', 'consbie' ),
					],
				],
				'title_field' => '<i class="{{ icon }}" aria-hidden="true"></i> {{{ text }}}',
			]
		);

		$this->add_control(
			'view',
			[
				'label' => __( 'View', 'consbie' ),
				'type' => Controls_Manager::HIDDEN,
				'default' => 'traditional',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_query',
			[
				'label' => __( 'Query', 'consbie' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'orderby',
			[
				'label' => __( 'Orderby', 'consbie' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'menu_order',
				'options' => [
					'post_date' => 'Date',
					'menu_order' => 'Menu Order',
					'post_title' => 'Title',
					'rand' => 'Random',
				],
			]
		);

		$this->add_control(
			'order',
			[
				'label' => __( 'Order', 'consbie' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'ASC',
				'options' => [
					'ASC' => 'ASC',
					'DESC' => 'DESC',
				],
			]
		);
		
		$this->end_controls_section();


		
		// silde option 

		$this->start_controls_section(
			'section_slider_options',
			[
				'label' => __( 'Slider Options', 'consbie' ),
				'type' => Controls_Manager::SECTION,
			]
		);

		$this->add_control(
			'navigation',
			[
				'label' => __( 'Navigation', 'consbie' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'both',
				'options' => [
					'both' => __( 'Arrows and Dots', 'consbie' ),
					'arrows' => __( 'Arrows', 'consbie' ),
					'dots' => __( 'Dots', 'consbie' ),
					'none' => __( 'None', 'consbie' ),
				],
			]
		);

		$this->add_control(
			'pause_on_hover',
			[
				'label' => __( 'Pause on Hover', 'consbie' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);

		$this->add_control(
			'autoplay',
			[
				'label' => __( 'Autoplay', 'consbie' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);

		$this->add_control(
			'autoplay_speed',
			[
				'label' => __( 'Autoplay Speed', 'consbie' ),
				'type' => Controls_Manager::NUMBER,
				'default' => 5000,
				'condition' => [
					'autoplay' => 'yes',
				],
				'selectors' => [
					'{{WRAPPER}} .slick-slide-bg' => 'animation-duration: calc({{VALUE}}ms*1.2); transition-duration: calc({{VALUE}}ms)',
				],
			]
		);

		$this->add_control(
			'infinite',
			[
				'label' => __( 'Infinite Loop', 'consbie' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);

		$this->add_control(
			'transition',
			[
				'label' => __( 'Transition', 'consbie' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'slide',
				'options' => [
					'slide' => __( 'Slide', 'consbie' ),
					'fade' => __( 'Fade', 'consbie' ),
				],
			]
		);

		$this->add_control(
			'transition_speed',
			[
				'label' => __( 'Transition Speed', 'consbie' ) . ' (ms)',
				'type' => Controls_Manager::NUMBER,
				'default' => 500,
			]
		);

		$this->add_control(
			'content_animation',
			[
				'label' => __( 'Content Animation', 'consbie' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'fadeInUp',
				'options' => [
					'' => __( 'None', 'consbie' ),
					'fadeInDown' => __( 'Down', 'consbie' ),
					'fadeInUp' => __( 'Up', 'consbie' ),
					'fadeInRight' => __( 'Right', 'consbie' ),
					'fadeInLeft' => __( 'Left', 'consbie' ),
					'zoomIn' => __( 'Zoom', 'consbie' ),
				],
			]
		);

		$this->end_controls_section();
		
		// Post 
		$this->start_controls_section(
			'section_post',
			[
				'label' => __( 'Teams', 'consbie' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_responsive_control(
			'align',
			[
				'label' => __( 'Alignment', 'consbie' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'consbie' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'consbie' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'consbie' ),
						'icon' => 'fa fa-align-right',
					],
					'justify' => [
						'title' => __( 'Justified', 'consbie' ),
						'icon' => 'fa fa-align-justify',
					],
				],
				'default' => '',
				'selectors' => [
					'{{WRAPPER}}' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'text_transform_post',
			[
				'label' => __( 'Text Transform', 'consbie' ),
				'type' => Controls_Manager::SELECT,
				'default' => '',
				'options' => [
					'' => __( 'None', 'consbie' ),
					'uppercase' => __( 'UPPERCASE', 'consbie' ),
					'lowercase' => __( 'lowercase', 'consbie' ),
					'capitalize' => __( 'Capitalize', 'consbie' ),
				],
				'selectors' => [
					'{{WRAPPER}} .teams' => 'text-transform: {{VALUE}};',
				],
			]
		);
		$this->start_controls_tabs( 'tabs_post_style' );
		$this->start_controls_tab(
			'tab_post_normal',
			[
				'label' => __( 'Normal', 'consbie' ),
			]
		);

		$this->add_control(
			'text_color_post',
			[
				'label' => __( 'Text Color', 'consbie' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .team-info' => 'color: {{VALUE}};',
				],
			]
		);

		
		$this->add_control(
			'background_color_post',
			[
				'label' => __( 'Background Color', 'consbie' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .team-info' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'tab_post_hover',
			[
				'label' => __( 'Hover', 'consbie' ),
			]
		);

		$this->add_control(
			'hover_post_color',
			[
				'label' => __( 'Text Color', 'consbie' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .teams:hover team-info' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'post_background_hover_color',
			[
				'label' => __( 'Background Color', 'consbie' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .teams:hover team-info' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();
		$this->end_controls_tabs();


		$this->add_control(
			'text_margin_post',
			[
				'label' => __( 'Text Margin', 'consbie' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .teams' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);

		$this->add_control(
			'text_padding_post',
			[
				'label' => __( 'Text Padding', 'consbie' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .teams' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'border_post',
				'label' => __( 'Border', 'consbie' ),
				'placeholder' => '1px',
				'default' => '1px',
				'selector' => '{{WRAPPER}} .teams',
				'separator' => 'before',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'image_box_shadow',
				'exclude' => [
					'box_shadow_position',
				],
				'selector' => '{{WRAPPER}} .teams',
			]
		);

		$this->end_controls_section();

		// category

		$this->start_controls_section(
			'section_category',
			[
				'label' => __( 'Category', 'consbie' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'typography-author',
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .team-category',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'text_shadow_author',
				'selector' => '{{WRAPPER}} .team-category',
			]
		);


		$this->add_control(
			'text_color-author',
			[
				'label' => __( 'Text Color', 'consbie' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .team-category a' => 'color: {{VALUE}};',
				],
			]
		);

		
		$this->add_control(
			'background_color-author',
			[
				'label' => __( 'Background Color', 'consbie' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .team-category' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'text_margin_author',
			[
				'label' => __( 'Text Margin', 'consbie' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .team-category' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);

		$this->add_control(
			'text_padding_author',
			[
				'label' => __( 'Text Padding', 'consbie' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .team-category' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);

		$this->end_controls_section();

		// title

		$this->start_controls_section(
			'section_title_style',
			[
				'label' => __( 'Title', 'consbie' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'typography-title',
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .team-title',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'text_shadow-title',
				'selector' => '{{WRAPPER}} .team-title',
			]
		);

		$this->add_control(
			'text_color-title',
			[
				'label' => __( 'Text Color', 'consbie' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .team-title' => 'color: {{VALUE}};',
				],
			]
		);


		$this->add_control(
			'text_margin_title',
			[
				'label' => __( 'Text Margin', 'consbie' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .team-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);

		$this->add_control(
			'text_padding_title',
			[
				'label' => __( 'Text Padding', 'consbie' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .team-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);

		$this->end_controls_section();

		// icon

		$this->start_controls_section(
			'section_icon_style',
			[
				'label' => __( 'Icon', 'consbie' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'typography-icon',
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .elementor-icon-list-icon i',
			]
		);

		$this->start_controls_tabs( 'tabs_icon_style' );
		$this->start_controls_tab(
			'tab_icon_normal',
			[
				'label' => __( 'Normal', 'consbie' ),
			]
		);

		$this->add_control(
			'text_color_icon',
			[
				'label' => __( 'Text Color', 'consbie' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .elementor-icon-list-icon i' => 'color: {{VALUE}};',
				],
			]
		);

		
		$this->add_control(
			'background_color_icon',
			[
				'label' => __( 'Background Color', 'consbie' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .elementor-icon-list-icon' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'tab_icon_hover',
			[
				'label' => __( 'Hover', 'consbie' ),
			]
		);

		$this->add_control(
			'hover_icon_color',
			[
				'label' => __( 'Text Color', 'consbie' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elementor-icon-list-icon:hover' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'icon_background_hover_color',
			[
				'label' => __( 'Background Color', 'consbie' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elementor-icon-list-icon:hover' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();
		$this->end_controls_tabs();


		$this->add_control(
			'text_margin_icon',
			[
				'label' => __( 'Text Margin', 'consbie' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .elementor-icon-list-item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);

		$this->add_control(
			'text_padding_icon',
			[
				'label' => __( 'Text Padding', 'consbie' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .elementor-icon-list-icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);

		$this->end_controls_section();

		// decription

		$this->start_controls_section(
			'section_decription_style',
			[
				'label' => __( 'Decription', 'consbie' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'typography-decription',
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .team-decription',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'text_shadow-decription',
				'selector' => '{{WRAPPER}} .team-decription',
			]
		);

		$this->add_control(
			'text_color-decription',
			[
				'label' => __( 'Text Color', 'consbie' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .team-decription' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'text_margin_decription',
			[
				'label' => __( 'Text Margin', 'consbie' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .team-decription' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);

		$this->add_control(
			'text_padding_decription',
			[
				'label' => __( 'Text Padding', 'consbie' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .team-decription' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);
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
		$settings = $this->get_settings_for_display();
		// WP_Query arguments
		$args = array (
			'post_type'              => array( 'teams' ),
			'post_status'            => array( 'publish' ),
			'posts_per_page'		 => $settings['posts_per_page'],
			'order'                  => $settings['order'],
			'orderby'                => $settings['orderby'],
		);

		// The Query
		$services = new \WP_Query( $args );

		// The Loop
		?>
		<p class="<?php echo $settings['navigation'] ?>">
		</p>
		<div class="<?php echo $settings['navigation'] ?> <?php echo $settings['layout'] ?> slide-team elementor-post" data-slick='{"slidesToShow": <?php echo $settings['slidesToShow'] ?> ,"slidesToScroll": <?php echo $settings['slidesToScroll'] ?> ,"dots":true,  "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": <?php echo $settings['slidesToShow_tablet'] ?>,"slidesToScroll": <?php echo $settings['slidesToScroll_tablet'] ?>}},{"breakpoint": 768,"settings":{"slidesToShow": <?php echo $settings['slidesToShow_mobile'] ?>,"slidesToScroll": <?php echo $settings['slidesToScroll_mobile'] ?>}}]}'>
		<?php
		if ( $services->have_posts() ) {
			while ( $services->have_posts() ) {
				$services->the_post();
				// include('html/content.php');
				echo '<div class="teams">';
							$this->render_team();
				echo   '</div> ';
			}
		} else {
			// no posts found
		}
		?>
		</div>
		
		<?php
		// Restore original Post Data
		wp_reset_postdata();
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
	protected function render_thumbnail() {
		$settings = $this->get_settings();
		?>
			<a href="#"><?php the_post_thumbnail($settings['image_size'])?></a>

		<?php
	}
	
	protected function render_category() {
		?>
		
			<p class="team-category"><?php echo get_the_term_list(get_the_ID(), 'teams_cat', '', ', '); ?></p>
		<?php
	}
	protected function render_title() {
		if ( ! $this->get_settings( 'show_title' ) ) {
			return;
		}
		?><a href="#">
				<p class="team-title"><?php the_title() ?></p>
				
			</a>
		<?php

	}

	protected function render_excerpt() {
		$settings = $this->get_settings();
		if ( ! $this->get_settings( 'show_decription' ) ) {
			return;
		}
		?>
		<div class="team-decription"><?php echo wp_trim_words( get_the_excerpt(), $settings['teams_per_words'] , '...' ) ?>	</div>
		<?php
		
	}


	protected function render_icon() {
		$entries = get_post_meta( get_the_ID(), 'info_group', true );
		?>
		<ul class="elementor-icon-list-item icon-team">
			<?php
			foreach ( (array) $entries as $key => $entry ) {
				?> <li class="elementor-icon-list-icon"> <?php
				if(isset($entry['link'])){
					?>
					<a href="<?php echo $entry['link'] ?>" target="_blank">
					<?php if(isset($entry['iconselect'])){ ?>
						<i class="<?php echo $entry['iconselect'] ?>"></i>
					<?php } ?>
					</a>
					</li>
					<?php
				}
			}
		?></ul><?php
    }

	protected function render_team() {
			$this->render_thumbnail();
		echo '<div class="team-info">';
			$this->render_title();
			$this->render_category();
			echo '<div class="team-decription-icon">';
				$this->render_excerpt();
				$this->render_icon();
			echo '</div>';
		echo '</div>';
		// $a = get_post_meta( get_the_ID(), 'link', true );
		// var_dump($a);

		

	}

	
	protected function _content_template() {
		
	}
}
