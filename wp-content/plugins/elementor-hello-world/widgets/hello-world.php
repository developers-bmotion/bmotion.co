<?php
namespace ElementorHelloWorld\Widgets;

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
class Hello_World extends Widget_Base {

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
		return 'jws-post';
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
		return __( 'JWS-Post', 'consbie' );
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
				'label' => __( 'Post', 'consbie' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_responsive_control(
			'columns',
			[
				'label' => __( 'Columns', 'consbie' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '4',
				'tablet_default' => '6',
				'mobile_default' => '12',
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
				'label' => __( 'Posts Per Page', 'consbie' ),
				'type' => Controls_Manager::NUMBER,
				'default' => 3,
			]
		);

		$this->add_responsive_control(
			'layout',
			[
				'label' => __( 'Layout', 'consbie' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'layout1',
				'options' => [
					'layout1' => 'layout 1',
					'layout2' => 'layout 2',
					'layout3' => 'layout 3',
					'layout4' => 'layout 4',
					'layout5' => 'layout 5',
					'aside1' => 'aside 1',
					'aside2' => 'aside 2',
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
			'show_time',
			[
				'label' => __( 'Show Time', 'consbie' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'label_off' => __( 'Off', 'consbie' ),
				'label_on' => __( 'On', 'consbie' ),
			]
		);
		$this->add_control(
			'icon-time',
			[
				'label' => __( 'Icon Time', 'consbie' ),
				'type' => Controls_Manager::ICON,
				'label_block' => true,
				'default' => '',
				'condition' 	=> [
					'show_time!'	=> '',
				],
				'frontend_available' => true,
			]
			
		);
		$this->add_control(
			'show_comment',
			[
				'label' => __( 'Show Comment', 'consbie' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'label_off' => __( 'Off', 'consbie' ),
				'label_on' => __( 'On', 'consbie' ),
			]
		);
		$this->add_control(
			'icon-comment',
			[
				'label' => __( 'Icon Comment', 'consbie' ),
				'type' => Controls_Manager::ICON,
				'label_block' => true,
				'default' => '',
				'condition' 	=> [
					'show_comment!'	=> '',
				],
			]
		);
		$this->add_control(
			'show_author',
			[
				'label' => __( 'Show Author', 'consbie' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'label_off' => __( 'Off', 'consbie' ),
				'label_on' => __( 'On', 'consbie' ),
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
			'posts_per_words_title',
			[
				'label' => __( 'Posts Per Words', 'consbie' ),
				'type' => Controls_Manager::NUMBER,
				'default' => '20',
				'condition' 	=> [
					'show_title!'	=> '',
				],
				
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
			'posts_per_words',
			[
				'label' => __( 'Posts Per Words', 'consbie' ),
				'type' => Controls_Manager::NUMBER,
				'default' => '50',
				'condition' 	=> [
					'show_decription!'	=> '',
				],
				
			]
		);
		$this->add_control(
			'show_reading_contlnue',
			[
				'label' => __( 'Show Button', 'consbie' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'label_off' => __( 'Off', 'consbie' ),
				'label_on' => __( 'On', 'consbie' ),
			]
		);
		$this->add_control(
			'text',
			[
				'label' => __( 'Text', 'consbie' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Click me', 'consbie' ),
				'placeholder' => __( 'Click me', 'consbie' ),
				'condition' 	=> [
					'show_reading_contlnue!'	=> '',
				],
			]
		);
		$this->add_control(
			'icon-button',
			[
				'label' => __( 'Icon Button', 'consbie' ),
				'type' => Controls_Manager::ICON,
				'label_block' => true,
				'default' => '',
				'condition' 	=> [
					'show_reading_contlnue!'	=> '',
				],
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
		// Post 
		$this->start_controls_section(
			'section_post',
			[
				'label' => __( 'Post', 'consbie' ),
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
					'{{WRAPPER}} .elementor-post' => 'text-transform: {{VALUE}};',
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
					'{{WRAPPER}} .elementor-post' => 'color: {{VALUE}};',
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
					'{{WRAPPER}} .elementor-post' => 'background-color: {{VALUE}};',
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
					'{{WRAPPER}} .elementor-post:hover' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'post_background_hover_color',
			[
				'label' => __( 'Background Color', 'consbie' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elementor-post:hover' => 'background-color: {{VALUE}};',
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
					'{{WRAPPER}} .elementor-post' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .elementor-post' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
				'selector' => '{{WRAPPER}} .elementor-post',
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
				'selector' => '{{WRAPPER}} .elementor-post',
			]
		);

		$this->end_controls_section();

		// Time //

		$this->start_controls_section(
			'section_time',
			[
				'label' => __( 'Time', 'consbie' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'typography-time',
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .post-time',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'text_shadow_time',
				'selector' => '{{WRAPPER}} .post-time',
			]
		);


		$this->add_control(
			'text_color-time',
			[
				'label' => __( 'Text Color', 'consbie' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .post-time' => 'color: {{VALUE}};',
				],
			]
		);

		
		$this->add_control(
			'background_color-time',
			[
				'label' => __( 'Background Color', 'consbie' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .post-time' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'text_margin_time',
			[
				'label' => __( 'Text Margin', 'consbie' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .post-info' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);

		$this->add_control(
			'text_padding_time',
			[
				'label' => __( 'Text Padding', 'consbie' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .post-info' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);

		$this->end_controls_section();

		// comment

		$this->start_controls_section(
			'section_comment',
			[
				'label' => __( 'Comment', 'consbie' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'typography-comment',
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .post-comment',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'text_shadow_comment',
				'selector' => '{{WRAPPER}} .post-comment',
			]
		);


		$this->add_control(
			'text_color-comment',
			[
				'label' => __( 'Text Color', 'consbie' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .post-comment' => 'color: {{VALUE}};',
				],
			]
		);

		
		$this->add_control(
			'background_color-comment',
			[
				'label' => __( 'Background Color', 'consbie' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .post-comment' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'text_margin_comment',
			[
				'label' => __( 'Text Margin', 'consbie' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .post-comment' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);

		$this->add_control(
			'text_padding_comment',
			[
				'label' => __( 'Text Padding', 'consbie' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .post-comment' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);

		$this->end_controls_section();

		// author

		$this->start_controls_section(
			'section_author',
			[
				'label' => __( 'Author', 'consbie' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'typography-author',
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .post-author',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'text_shadow_author',
				'selector' => '{{WRAPPER}} .post-author',
			]
		);


		$this->add_control(
			'text_color-author',
			[
				'label' => __( 'Text Color', 'consbie' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .post-author' => 'color: {{VALUE}};',
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
					'{{WRAPPER}} .post-author' => 'background-color: {{VALUE}};',
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
					'{{WRAPPER}} .post-author' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .post-author' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
				'selector' => '{{WRAPPER}} .post-title',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'text_shadow-title',
				'selector' => '{{WRAPPER}} .post-title',
			]
		);

		$this->add_control(
			'text_color-title',
			[
				'label' => __( 'Text Color', 'consbie' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .post-title' => 'color: {{VALUE}};',
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
					'{{WRAPPER}} .post-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .post-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
				'selector' => '{{WRAPPER}} .post-decription',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'text_shadow-decription',
				'selector' => '{{WRAPPER}} .post-decription',
			]
		);

		$this->add_control(
			'text_color-decription',
			[
				'label' => __( 'Text Color', 'consbie' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .post-decription' => 'color: {{VALUE}};',
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
					'{{WRAPPER}} .post-decription' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .post-decription' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);

		$this->end_controls_section();

		// button

		$this->start_controls_section(
			'section_botton',
			[
				'label' => __( 'Button', 'consbie' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'typography',
				'label' => __( 'Typography', 'consbie' ),
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_4,
				'selector' => '{{WRAPPER}} .post-link__text',
			]
		);

		$this->start_controls_tabs( 'tabs_button_style' );

		$this->start_controls_tab(
			'tab_button_normal',
			[
				'label' => __( 'Normal', 'consbie' ),
			]
		);

		$this->add_control(
			'button_text_color',
			[
				'label' => __( 'Text Color', 'consbie' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .post-link__text' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'background_color',
			[
				'label' => __( 'Background Color', 'consbie' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					' {{WRAPPER}} .post-link__text' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'tab_button_hover',
			[
				'label' => __( 'Hover', 'consbie' ),
			]
		);

		$this->add_control(
			'hover_color',
			[
				'label' => __( 'Text Color', 'consbie' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .post-link:hover' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_background_hover_color',
			[
				'label' => __( 'Background Color', 'consbie' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					' {{WRAPPER}} .post-link:hover' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_hover_border_color',
			[
				'label' => __( 'Border Color', 'consbie' ),
				'type' => Controls_Manager::COLOR,
				'condition' => [
					'border_border!' => '',
				],
				'selectors' => [
					'{{WRAPPER}} .post-link:hover' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'hover_animation',
			[
				'label' => __( 'Animation', 'consbie' ),
				'type' => Controls_Manager::HOVER_ANIMATION,
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'border',
				'label' => __( 'Border', 'consbie' ),
				'placeholder' => '1px',
				'default' => '1px',
				'selector' => '{{WRAPPER}} .post-link__text',
				'separator' => 'before',
			]
		);

		$this->add_control(
			'border_radius',
			[
				'label' => __( 'Border Radius', 'consbie' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .post-link__text' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'button_box_shadow',
				'selector' => '{{WRAPPER}} .post-link__text',
			]
		);

		$this->add_control(
			'text_padding',
			[
				'label' => __( 'Text Padding', 'consbie' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					' {{WRAPPER}} .post-link__text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);
		$this->add_control(
			'button_padding',
			[
				'label' => __( 'Button Padding', 'consbie' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					' {{WRAPPER}} .post-link' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);

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
		$settings = $this->get_settings_for_display();
		// WP_Query arguments
		$args = array (
			'post_type'              => array( 'post' ),
			'post_status'            => array( 'publish' ),
			'posts_per_page'		 => $settings['posts_per_page'],
			'order'                  => $settings['order'],
			'orderby'                => $settings['orderby'],
		);

		// The Query
		$services = new \WP_Query( $args );
		// The Loop
		?>
		<div class="row home-blog">
		<?php
		
		if ( $services->have_posts() ) {
			while ( $services->have_posts() ) {
				$services->the_post();
				// include('html/content.php');
				echo '<div class="col-'. $settings['columns_mobile'] .' col-lg-'. $settings['columns_tablet'] .' col-xl-'. $settings['columns'] .' '. $settings['layout'] .'">
						<div class="elementor-post ">';
							$this->render_post();
				echo   '</div>
					</div>';
			}
		} else {
			// no posts found
		}
		?>	
		</div>
		<!-- <div class="navigation"><p><?php echo get_the_posts_pagination(); ?></p></div> -->
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
		the_post_thumbnail($settings['image_size']);
	}
	
	protected function render_time() {
		$settings = $this->get_settings();
        if (! $this->get_settings('show_time')) {
            return;
        }
		?>
			<span class="post-time">
				<?php if ( ! empty( $settings['icon-time'] ) ) : ?>
				<i class="<?php echo esc_attr( $settings['icon-time'] ); ?>" aria-hidden="true"></i>
				<?php else :
					switch ($settings['layout']) {
						case 'layout1':
							echo '<i class="fa fa-clock-o" aria-hidden="true"></i>';
							break;
						case 'layout2':
							echo '<i class="fa fa-calendar" aria-hidden="true"></i>';
							break;
						case 'layout3':
							break;
						case 'aside1':
							echo '<i class="fa fa-clock-o" aria-hidden="true"></i>';
							break;
					}
				?>
				<?php endif; ?>
				<span class="color-layout-hover">
					<?php 
						switch ($settings['layout']) {
							case 'layout1':
								the_time('d M Y');
								break;
							case 'layout2':
								the_time('M d, Y');
								break;
							case 'layout3':
								the_time('M d, Y');
								break;
							case 'layout4':
								the_time('M d, Y');
								break;
							case 'layout5':
								the_time('d M Y');
								break;
							case 'aside1':
								the_time('d M Y');
								break;
							case 'aside2':
								the_time('d M Y');
								break;
						}
					?>
				</span>
			</span>
		<?php
	}

	protected function render_comment() {
		$settings = $this->get_settings();
		if ( ! $this->get_settings( 'show_comment' ) ) {
			return;
		}
		?><span class="post-comment">
			<?php if ( ! empty( $settings['icon-comment'] ) ) : ?>
			<i class="<?php echo esc_attr( $settings['icon-comment'] ); ?>" aria-hidden="true"></i>
			<?php else :
				switch ($settings['layout']) {
					case 'layout1':
						echo '<i class="fa fa-comment" aria-hidden="true"></i>';
						break;
					case 'layout2':
						echo '<i class="fa fa-comment" aria-hidden="true"></i>';
						break;
					case 'layout3':
						break;	
					case 'layout4':
						break;
					case 'layout5':
						break;
					case 'aside1':
						echo '<i class="fa fa-comment" aria-hidden="true"></i>';
						break;
				}
			 ?>
			<?php endif; ?><?php echo get_comments_number(); ?>
		</span>
		<?php

	}

	protected function render_author() {
		$settings = $this->get_settings();
		if ( ! $this->get_settings( 'show_author' ) ) {
			return;
		}
		?>	<span class="post-author">
				By <span class="color-layout-hover"><?php the_author(); ?></span>
			</span>
		<?php

	}
	protected function render_title() {
		$settings = $this->get_settings();
		if ( ! $this->get_settings( 'show_title' ) ) {
			return;
		}
		?><a href="<?php the_permalink() ?>">
				<p class="post-title"><?php echo wp_trim_words( get_the_title(), $settings['posts_per_words_title'] , '...' ) ?></p>
			</a>
		<?php
	}
	protected function render_excerpt() {
		$settings = $this->get_settings();
		if ( ! $this->get_settings( 'show_decription' ) ) {
			return;
		}
		?>
		<div class="post-decription"><?php echo wp_trim_words( get_the_excerpt(), $settings['posts_per_words'] , '...' ) ?></div>
		<?php
	}

	protected function render_button() {

		if ( ! $this->get_settings( 'show_reading_contlnue' ) ) {
			return;
		}
		$settings = $this->get_settings();

		$this->add_render_attribute( 'text', 'class', 'elementor-button-text' );

		$this->add_inline_editing_attributes( 'text', 'none' );
		?>
		<div class="post-link">
			<a href="<?php the_permalink() ?>">
				<span class="post-link__text" ><?php echo $settings['text']; ?>
					<?php if ( ! empty( $settings['icon-button'] ) ) : ?>
						<i class="<?php echo esc_attr( $settings['icon-button'] ); ?>" aria-hidden="true"></i>
					<?php endif; ?>
				</span>
			</a>
		</div>
		
		<?php
	}

	protected function render_post() {
		$settings = $this->get_settings();
        if ($settings['layout'] == 'layout2') {
            echo '<div class="position-relative">';
				echo '<a href="'.get_the_permalink().'">';
					$this->render_thumbnail();
					$this->render_button();
				echo '</a>';
            echo '</div>';
        }else{
			echo '<a href="'.get_the_permalink().'">';
				$this->render_thumbnail();
			echo '</a>';
		}
		echo '<div class="m-30">
				<div class="post-info">';
					$this->render_time();
					$this->render_comment();
					$this->render_author();
				echo   '</div>';
				$this->render_title();
				$this->render_excerpt();
				if($settings['layout'] != 'layout2'){
					$this->render_button();
				}
		echo '</div>';
	}

	
	protected function _content_template() {
		
	}
}



