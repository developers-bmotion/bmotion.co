<?php
namespace ElementorHelloWorld\Widgets\JwsCustom;
use Elementor\Controls_Manager;
use Elementor\Core\Responsive\Responsive;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Widget_Base;
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Elementor Hello World
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class Nav_Menu extends Widget_Base {

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
		return 'jws_menu_nav';
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
		return __( 'Jws Nav Menu', 'consbie' );
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
	 * Register the widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function _register_controls() {
        $this->register_content_nav_menu_controls();
        $this->register_style_nav_controls();
        $this->register_style_sub_menu_controls();
        $this->register_style_sub_mega_controls();
	}
    /**
	 * Register Nav Menu General Controls.
	 *
	 * @since 0.0.1
	 * @access protected
	*/
	protected function register_content_nav_menu_controls() {

		$this->start_controls_section(
			'section_layout',
			[
				'label' => __( 'Layout', 'consbie' ),
			]
		);
         $this->add_control(
			'layout',
			[
				'label' => __( 'Layout', 'consbie' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'menu_horizontal' => __( 'Horizontal Menu', 'consbie' ),
                    'menu_vertical' => __( 'Vertical Menu', 'consbie' ),
				],
				'default' => 'menu_horizontal',
                'prefix_class' => 'elementor_jws_menu_layout_',
			]
		);
		$menus = $this->get_available_menus();

		if ( ! empty( $menus ) ) {
			$this->add_control(
				'menu',
				[
					'label' => __( 'Menu', 'consbie' ),
					'type' => Controls_Manager::SELECT,
					'options' => $menus,
					'default' => array_keys( $menus )[0],
					'save_default' => true,
					'separator' => 'after',
					'description' => sprintf( __( 'Go to the <a href="%s" target="_blank">Menus screen</a> to manage your menus.', 'consbie' ), admin_url( 'nav-menus.php' ) ),
				]
			);
		} else {
			$this->add_control(
				'menu',
				[
					'type' => Controls_Manager::RAW_HTML,
					'raw' => '<strong>' . __( 'There are no menus in your site.', 'consbie' ) . '</strong><br>' . sprintf( __( 'Go to the <a href="%s" target="_blank">Menus screen</a> to create one.', 'consbie' ), admin_url( 'nav-menus.php?action=edit&menu=0' ) ),
					'separator' => 'after',
					'content_classes' => 'elementor-panel-alert elementor-panel-alert-info',
				]
			);
		}
        $this->add_responsive_control(
			'align_items',
			[
				'label' => __( 'Nav Menu Align', 'consbie' ),
				'type' => Controls_Manager::CHOOSE,
				'label_block' => false,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'consbie' ),
						'icon' => 'eicon-h-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'consbie' ),
						'icon' => 'eicon-h-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'consbie' ),
						'icon' => 'eicon-h-align-right',
					],
				],
                'prefix_class' => 'elementor-jws-menu-align-',
			]
		);
        $this->add_control(
			'skins',
			[
				'label' => __( 'Skins', 'consbie' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'skin1' => __( 'skin 1', 'consbie' ),
                    'skin2' => __( 'skin 2', 'consbie' ),
				],
				'default' => 'skin1',
                'prefix_class' => 'elementor-jws-menu-skin-',
			]
		);
          $this->add_control(
			'before_menu_item',
			[
				'label' => __( 'Before Menu Item', 'consbie' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'none' => __( 'None', 'consbie' ),
                    'circle' => __( 'Circle', 'consbie' ),
                    'square' => __( 'Square', 'consbie' ),
				],
				'default' => 'none',
                'prefix_class' => 'elementor-before-menu-skin-',
			]
		);
		$this->end_controls_section();
	}
    /**
	 * Style Tab
	*/
	/**
	 * Register Nav Menu Controls.
	 *
	 * @since 0.0.1
	 * @access protected
	 */
	protected function register_style_nav_controls() {
		$this->start_controls_section(
			'section_style_nav',
			[
				'label' => __( 'Nav Menu', 'consbie' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

        
        $this->start_controls_tabs( 'nav_tabs_style' );

		$this->start_controls_tab(
				'nav_normal',
				[
					'label'     => __( 'Normal', 'consbie' ),
				]
		);
        $this->add_control(
			'nav_color',
			[
				'label' 	=> __( 'Text Color', 'consbie' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> '#222222',
				'selectors' => [
					'{{WRAPPER}} .jws_main_menu .jws_nav_menu > ul > li > a' => 'color: {{VALUE}};',
				],
			]
        );
        $this->add_control(
					'bg_before_item_color',
					[
						'label' 	=> __( 'Before Item Color', 'consbie' ),
						'type' 		=> Controls_Manager::COLOR,
						'default' 	=> '',
						'selectors' => [
							'{{WRAPPER}}.elementor-before-menu-skin-circle .jws_main_menu .jws_nav_menu > ul > li > a:before' => 'background: {{VALUE}};',
                            '{{WRAPPER}}.elementor-before-menu-skin-square .jws_main_menu .jws_nav_menu > ul > li > a:before' => 'background: {{VALUE}};',
						],
                        'condition' => [
						  'before_menu_item!' => 'none',
				        ],
					]
		);
        $this->end_controls_tab();

		$this->start_controls_tab(
				'nav_hover',
				[
					'label'     => __( 'Hover', 'consbie' ),
				]
		);
         $this->add_control(
					'nav_color_hover',
					[
						'label' 	=> __( 'Text Color', 'consbie' ),
						'type' 		=> Controls_Manager::COLOR,
						'default' 	=> '',
						'selectors' => [
							'{{WRAPPER}} .jws_main_menu .jws_nav_menu > ul > li > a:hover , {{WRAPPER}} .jws_main_menu .jws_nav_menu > ul > li.current-menu-item > a' => 'color: {{VALUE}};',
						],
					]
		);
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'nav_typography',
				'label' => __( 'Typography', 'consbie'),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .jws_main_menu .jws_nav_menu > ul > li > a',
			]
		);
        $this->add_responsive_control(
					'nav_padding',
					[
						'type' 			=> Controls_Manager::DIMENSIONS,
						'label' 		=> __( 'Padding', 'consbie' ),
						'size_units' 	=> [ 'px', '%' ],
						'selectors' 	=> [
							'{{WRAPPER}} .jws_main_menu .jws_nav_menu > ul > li > a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
		);
        $this->add_responsive_control(
					'nav_margin',
					[
						'type' 			=> Controls_Manager::DIMENSIONS,
						'label' 		=> __( 'Margin', 'consbie' ),
						'size_units' 	=> [ 'px', '%' ],
                        'default' => [
                            'top' => '0',
                            'right' => '10',
                            'bottom' => '0',
                            'left' => '10',
                            'unit' => 'px',
                            'isLinked' => false
                        ],
						'selectors' 	=> [
							'{{WRAPPER}} .jws_main_menu .jws_nav_menu > ul > li > a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
		);
        $this->add_group_control(
				Group_Control_Border::get_type(),
				[
					'name' 		=> 'nav_menu_border',
					'label' 	=> __( 'Border', 'consbie' ),
					'selector' 	=> '{{WRAPPER}}.elementor_jws_menu_layout_menu_horizontal .jws_main_menu .jws_nav_menu > ul > li > a , {{WRAPPER}}.elementor_jws_menu_layout_menu_vertical .jws_main_menu .jws_nav_menu > ul > li',
				]
		);
		$this->end_controls_section();
	}

    
    /**
	 * Register Sub Mega Menu Controls.
	 *
	 * @since 0.0.1
	 * @access protected
	 */
	protected function register_style_sub_menu_controls() {
		$this->start_controls_section(
			'section_style_sub',
			[
				'label' => __( 'Sub Menu', 'consbie' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
        $this->add_control(
				'sub_skins',
				[
					'label'     => __( 'Skins', 'consbie' ),
					'type'      => Controls_Manager::SELECT,
					'default'   => 'skin1',
					'options'   => [
						'skin1'   => __( 'Skin 1', 'consbie' ),
						'skin2' => __( 'Skin 2', 'consbie' ),
					],
				]
		);
        $this->add_responsive_control(
			'sub_width',
			[
				'label' => __( 'Width', 'consbie' ),
				'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'default' => [
					'unit' => 'px',
					'size' => 200,
				],
				'range' => [
					'px' => [
						'min' => 200,
						'max' => 1000,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .jws_main_menu .menu-item-design-standard .sub-menu' => 'width: {{SIZE}}{{UNIT}}',
				],
			]
		);
        $this->add_control(
					'sub_bg',
					[
						'label' 	=> __( 'Background Color', 'consbie' ),
						'type' 		=> Controls_Manager::COLOR,
						'default' 	=> '#ffffff',
						'selectors' => [
							'{{WRAPPER}} .jws_main_menu .menu-item-design-standard .sub-menu' => 'background-color: {{VALUE}};',
						],
					]
		);
        $this->add_responsive_control(
					'sub_radius',
					[
						'type' 			=> Controls_Manager::DIMENSIONS,
						'label' 		=> __( 'Border Radius', 'consbie' ),
						'size_units' 	=> [ 'px', '%' ],
						'selectors' 	=> [
							'{{WRAPPER}} .jws_main_menu .menu-item-design-standard .sub-menu' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
		);
        $this->add_group_control(
				Group_Control_Border::get_type(),
				[
					'name' 		=> 'sub_border',
					'label' 	=> __( 'Border', 'consbie' ),
					'selector' 	=> '{{WRAPPER}} .jws_main_menu .menu-item-design-standard .sub-menu',
				]
		);
        $this->add_responsive_control(
					'sub_pading',
					[
						'type' 			=> Controls_Manager::DIMENSIONS,
						'label' 		=> __( 'Padding', 'consbie' ),
						'size_units' 	=> [ 'px', '%' ],
                        'default' => [
            				'unit' => 'px',
            				'top' => 25,
                            'bottom' => 25,
                            'left' => 25,
                            'right' => 25,
            			],
						'selectors' 	=> [
							'{{WRAPPER}} .jws_main_menu .menu-item-design-standard .sub-menu' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
		);
		$this->add_responsive_control(
			'sub_margin',
			[
				'type' 			=> Controls_Manager::DIMENSIONS,
				'label' 		=> __( 'Margin', 'consbie' ),
				'size_units' 	=> [ 'px', '%' ],
				'default' => [
					'unit' => 'px',
					'top' => 0,
					'bottom' => 0,
					'left' => -10,
					'right' => 0,
				],
				'selectors' 	=> [
					'{{WRAPPER}} .jws_main_menu .menu-item-design-standard .sub-menu' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'sub_margin_first',
			[
				'type' 			=> Controls_Manager::DIMENSIONS,
				'label' 		=> __( 'Margin First', 'consbie' ),
				'size_units' 	=> [ 'px', '%' ],
				'default' => [
					'unit' => 'px',
					'top' => 0,
					'bottom' => 0,
					'left' => -20,
					'right' => 0,
				],
				'selectors' 	=> [
					'{{WRAPPER}} .jws_main_menu .jws_nav .menu-item-design-standard:first-child .sub-menu' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'sub_box_shadow',
				'label' => __( 'Box Shadow', 'consbie' ),
				'selector' => '{{WRAPPER}} .jws_main_menu .menu-item-design-standard .sub-menu',
			]
		);
        
        $this->add_responsive_control(
		'sub_item_style',
			[
				'type' => Controls_Manager::HEADING,
				'label' => __( 'Item Font And Color', 'consbie' ),
				'separator' => 'before',
			]
		);
        $this->add_responsive_control(
			'menu_icon_size',
			[
				'label' => __( 'Icon Size', 'consbie' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 2,
						'max' => 100,
						'step' => 1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .jws_main_menu .menu-item-design-standard .sub-menu li a i' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);
        $this->add_control(
					'menu_icon_color',
					[
						'label' 	=> __( 'Icon Color', 'consbie' ),
						'type' 		=> Controls_Manager::COLOR,
						'default' 	=> '#ffffff',
						'selectors' => [
							'{{WRAPPER}} .jws_main_menu .menu-item-design-standard .sub-menu li a i' => 'color: {{VALUE}};',
						],
					]
		);
        $this->add_control(
					'sub_item_color',
					[
						'label' 	=> __( 'Color', 'consbie' ),
						'type' 		=> Controls_Manager::COLOR,
						'default' 	=> '',
						'selectors' => [
							'{{WRAPPER}} .jws_main_menu .menu-item-design-standard .sub-menu li a' => 'color: {{VALUE}};',
						],
					]
		);
        $this->add_control(
					'sub_item_bg_color_even',
					[
						'label' 	=> __( 'Background EVEN AND ODD', 'consbie' ),
						'type' 		=> Controls_Manager::COLOR,
						'default' 	=> '',
						'selectors' => [
							'{{WRAPPER}} .jws_main_menu .menu-item-design-standard .sub-menu li:nth-child(even) a' => 'background: {{VALUE}};',
						],
                        'condition' => [
        					'sub_skins' => 'skin2',
        				],
					]
		);
        $this->add_control(
					'sub_item_color_hover',
					[
						'label' 	=> __( 'Color Hover', 'consbie' ),
						'type' 		=> Controls_Manager::COLOR,
						'default' 	=> '',
						'selectors' => [
							'{{WRAPPER}} .jws_main_menu .menu-item-design-standard .sub-menu li a:hover , {{WRAPPER}} .jws_main_menu .menu-item-design-standard .sub-menu li.current-menu-item a' => 'color: {{VALUE}};',
                            '{{WRAPPER}} .jws_main_menu .menu-item-design-standard .sub-menu li a:hover i' => 'color: {{VALUE}};',
						],
					]
		);
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'sub_item_typography',
				'label' => __( 'Typography', 'consbie'),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .jws_main_menu .menu-item-design-standard .sub-menu li a',
			]
		);
        $this->add_responsive_control(
					'sub_item_pading',
					[
						'type' 			=> Controls_Manager::DIMENSIONS,
						'label' 		=> __( 'Padding', 'consbie' ),
						'size_units' 	=> [ 'px', '%' ],
						'selectors' 	=> [
							'{{WRAPPER}} .jws_main_menu .menu-item-design-standard .sub-menu li a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
		);
		$this->add_responsive_control(
			'sub_item_pading_hover',
			[
				'type' 			=> Controls_Manager::DIMENSIONS,
				'label' 		=> __( 'Padding Hover', 'consbie' ),
				'size_units' 	=> [ 'px', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .jws_main_menu .menu-item-design-standard .sub-menu li a:hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        $this->add_responsive_control(
		'sub_item_border',
			[
				'type' => Controls_Manager::HEADING,
				'label' => __( 'Item Border', 'consbie' ),
				'separator' => 'before',
			]
		);

		$this->add_control(
			'sub_item_border_style',
			[
				'label' => __( 'Style', 'consbie' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'' => __( 'None', 'consbie' ),
					'solid' => __( 'Solid', 'consbie' ),
					'double' => __( 'Double', 'consbie' ),
					'dotted' => __( 'Dotted', 'consbie' ),
					'dashed' => __( 'Dashed', 'consbie' ),
					'groove' => __( 'Groove', 'consbie' ),
				],
				'selectors' => [
					'{{WRAPPER}} .jws_main_menu .menu-item-design-standard .sub-menu li a' => 'border-bottom-style: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'sub_item_border_color',
			[
				'label' => __( 'Color', 'consbie' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .jws_main_menu .menu-item-design-standard .sub-menu li a' => 'border-color: {{VALUE}}',
				],
			]
		);
        $this->add_control(
			'sub_item_border_color_hover',
			[
				'label' => __( 'Color Hover', 'consbie' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .jws_main_menu .menu-item-design-standard .sub-menu li a:hover' => 'border-color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'sub_item_border_width',
			[
				'label' => __( 'Weight', 'consbie' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 10,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .jws_main_menu .menu-item-design-standard .sub-menu li a' => 'border-bottom-width: {{SIZE}}{{UNIT}}',
				],
			]
		);
		$this->end_controls_section();
	}
    /**
	 * Register Sub Mega Menu Controls.
	 *
	 * @since 0.0.1
	 * @access protected
	 */
	protected function register_style_sub_mega_controls() {
		$this->start_controls_section(
			'section_style_sub_mega',
			[
				'label' => __( 'Sub Mega Menu', 'consbie' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
        $this->add_control(
					'sub_mega_bg',
					[
						'label' 	=> __( 'Background Color', 'consbie' ),
						'type' 		=> Controls_Manager::COLOR,
						'default' 	=> '',
						'selectors' => [
							'{{WRAPPER}} .jws_main_menu .jws_nav_menu > ul > li .megasub' => 'background-color: {{VALUE}};',
						],
					]
		);
        
         $this->add_responsive_control(
					'sub_mega_padding_menu',
					[
						'type' 			=> Controls_Manager::DIMENSIONS,
						'label' 		=> __( 'Padding Menu', 'consbie' ),
						'size_units' 	=> [ 'px', '%' ],
						'selectors' 	=> [
							'{{WRAPPER}} .jws_main_menu .jws_nav_menu > ul > li .sub-menu-dropdown' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
		);
		$this->add_responsive_control(
			'sub_mega_padding',
			[
				'type' 			=> Controls_Manager::DIMENSIONS,
				'label' 		=> __( 'Padding', 'consbie' ),
				'size_units' 	=> [ 'px', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .jws_main_menu .jws_nav_menu > ul > li .megasub' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
);
		$this->add_responsive_control(
			'sub_mega_margin',
			[
				'type' 			=> Controls_Manager::DIMENSIONS,
				'label' 		=> __( 'Margin', 'consbie' ),
				'size_units' 	=> [ 'px', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .jws_main_menu .jws_nav_menu > ul > li .sub-menu-dropdown' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'sub_mega_box_shadow',
				'label' => __( 'Box Shadow', 'consbie' ),
				'selector' => '{{WRAPPER}} .jws_main_menu .jws_nav_menu > ul > li .megasub',
			]
		);
        $this->add_group_control(
				Group_Control_Border::get_type(),
				[
					'name' 		=> 'sub_mega_border',
					'label' 	=> __( 'Sub Mega Border', 'consbie' ),
					'selector' 	=> '{{WRAPPER}} .jws_nav_menu > ul > li .megasub',
				]
		);
        $this->add_responsive_control(
					'sub_mega_radius',
					[
						'type' 			=> Controls_Manager::DIMENSIONS,
						'label' 		=> __( 'Border Radius', 'consbie' ),
						'size_units' 	=> [ 'px', '%' ],
						'selectors' 	=> [
							'{{WRAPPER}} .jws_main_menu .jws_nav_menu > ul > li .megasub' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
		);
		$this->add_control(
			'sub_mega_color_hover',
			[
				'label' 	=> __( 'Color Hover', 'consbie' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> '',
				'selectors' => [
					'{{WRAPPER}} .jws_main_menu .megasub a:hover' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_responsive_control(
			'sub_mega_padding_hover',
			[
				'type' 			=> Controls_Manager::DIMENSIONS,
				'label' 		=> __( 'Padding Hover', 'consbie' ),
				'size_units' 	=> [ 'px', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .jws_main_menu .megasub a:hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
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
		$settings = $this->get_settings();
        $attr = array(
                'menu_id' => 'menu-' . $this->get_nav_menu_index() . '-' . $this->get_id(),
                'menu' => $settings['menu'],
                'container' => '',
                'container_class' => 'jws_menu_list',
                'menu_class' => 'jws_nav',
                'echo' => true,
                'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                'depth' => 0,

         );
    
         ?>
             <div class="jws_main_menu<?php echo ' sub_skin_'.$settings['sub_skins']; ?>">    
                    <div class="jws_nav_menu">
                                <?php wp_nav_menu($attr); ?>
                    </div> 
             </div>  
         <?php

	}
    private function get_available_menus() {
		$menus = wp_get_nav_menus();

		$options = [];

		foreach ( $menus as $menu ) {
			$options[ $menu->slug ] = $menu->name;
		}

		return $options;
	}
    protected function get_nav_menu_index() {
		return $this->nav_menu_index++;
	}
    protected $nav_menu_index = 1;
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