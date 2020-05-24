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

class JwsServices extends Widget_Base {



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

		return 'jws-services';

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

		return __( 'JWS-Services', 'consbie' );

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

				'default' => 'layout-service1',

				'options' => [

					'layout-service1' => 'layout 1',

					'layout-service2' => 'layout 2',

					'layout-service3' => 'layout 3',

					'layout-service4' => 'layout 4',

					'layout-service5' => 'layout 5',

				],

			]

		);



        $this->add_control(

			'show_image_bottom',

			[

				'label' => __( 'Show Image Bottom', 'consbie' ),

				'type' => Controls_Manager::SWITCHER,

				'default' => 'yes',

				'label_off' => __( 'Off', 'consbie' ),

				'label_on' => __( 'On', 'consbie' ),

			]

        );

        $this->add_control(
			'image',
			[
				'label' => __( 'Choose Image', 'consbie' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' 	=> [
                    'show_image_bottom!'	=> '',
                ],
                'frontend_available' => true
			]
        );
        
        $this->add_control(

			'show_category',

			[

				'label' => __( 'Show Category', 'consbie' ),

				'type' => Controls_Manager::SWITCHER,

				'default' => 'yes',

				'label_off' => __( 'Off', 'consbie' ),

				'label_on' => __( 'On', 'consbie' ),

			]

        );
        
        $this->add_control(

			'show_number',

			[

				'label' => __( 'Show Number', 'consbie' ),

				'type' => Controls_Manager::SWITCHER,

				'default' => 'no',

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

			'section_service',

			[

				'label' => __( 'Service', 'consbie' ),

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

					'{{WRAPPER}} .elementor-service' => 'text-align: {{VALUE}};',

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

					'{{WRAPPER}} .elementor-service' => 'text-transform: {{VALUE}};',

				],

			]

		);

		$this->start_controls_tabs( 'tabs_service_style' );

		$this->start_controls_tab(

			'tab_service_normal',

			[

				'label' => __( 'Normal', 'consbie' ),

			]

		);



		$this->add_control(

			'text_color_service',

			[

				'label' => __( 'Text Color', 'consbie' ),

				'type' => Controls_Manager::COLOR,

				'default' => '',

				'selectors' => [

					'{{WRAPPER}} .elementor-service' => 'color: {{VALUE}};',

				],

			]

		);



		

		$this->add_control(

			'background_color_service',

			[

				'label' => __( 'Background Color', 'consbie' ),

				'type' => Controls_Manager::COLOR,

				'default' => '',

				'selectors' => [

					'{{WRAPPER}} .elementor-service' => 'background-color: {{VALUE}};',

				],

			]

		);



		$this->end_controls_tab();



		$this->start_controls_tab(

			'tab_service_hover',

			[

				'label' => __( 'Hover', 'consbie' ),

			]

		);



		$this->add_control(

			'hover_service_color',

			[

				'label' => __( 'Text Color', 'consbie' ),

				'type' => Controls_Manager::COLOR,

				'selectors' => [

					'{{WRAPPER}} .elementor-service:hover' => 'color: {{VALUE}};',

				],

			]

		);



		$this->add_control(

			'service_background_hover_color',

			[

				'label' => __( 'Background Color', 'consbie' ),

				'type' => Controls_Manager::COLOR,

				'selectors' => [

					'{{WRAPPER}} .elementor-service:hover' => 'background-color: {{VALUE}};',

				],

			]

		);



		$this->end_controls_tab();

		$this->end_controls_tabs();





		$this->add_control(

			'text_margin_service',

			[

				'label' => __( 'Text Margin', 'consbie' ),

				'type' => Controls_Manager::DIMENSIONS,

				'size_units' => [ 'px', 'em', '%' ],

				'selectors' => [

					'{{WRAPPER}} .elementor-service' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

				],

				'separator' => 'before',

			]

		);



		$this->add_control(

			'text_padding_service',

			[

				'label' => __( 'Text Padding', 'consbie' ),

				'type' => Controls_Manager::DIMENSIONS,

				'size_units' => [ 'px', 'em', '%' ],

				'selectors' => [

					'{{WRAPPER}} .elementor-service' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

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
        
        // category

        $this->start_controls_section(

			'section_category_style',

			[

				'label' => __( 'Category', 'consbie' ),

				'tab' => Controls_Manager::TAB_STYLE,

			]

		);



		$this->add_group_control(

			\Elementor\Group_Control_Typography::get_type(),

			[

				'name' => 'typography-category',

				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,

				'selector' => '{{WRAPPER}} .services-category a',

			]

		);



		$this->add_control(

			'text_color-category',

			[

				'label' => __( 'Text Color', 'consbie' ),

				'type' => Controls_Manager::COLOR,

				'default' => '',

				'selectors' => [

					'{{WRAPPER}} .services-category a' => 'color: {{VALUE}};',

				],

			]

		);

        $this->end_controls_section();
        
        //  number

        $this->start_controls_section(

			'section_number_style',

			[

				'label' => __( 'Number', 'consbie' ),

				'tab' => Controls_Manager::TAB_STYLE,

			]

		);



		$this->add_group_control(

			\Elementor\Group_Control_Typography::get_type(),

			[

				'name' => 'typography-number',

				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,

				'selector' => '{{WRAPPER}} .services-number',

			]

		);



		$this->add_control(

			'text_color-number',

			[

				'label' => __( 'Text Color', 'consbie' ),

				'type' => Controls_Manager::COLOR,

				'default' => '',

				'selectors' => [

					'{{WRAPPER}} .services-number' => 'color: {{VALUE}};',

				],

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

			'post_type'              => array( 'services' ),

			'post_status'            => array( 'publish' ),

			'posts_per_page'		 => $settings['posts_per_page'],

			'order'                  => $settings['order'],

			'orderby'                => $settings['orderby'],

		);



		// The Query

		$services = new \WP_Query( $args );



		// The Loop

		?>

		<div class="row">

        <?php
        if ( $this->get_settings( 'show_number' ) ) {

            $i = 01;

		}

		if ( $services->have_posts() ) {

			while ( $services->have_posts() ) {

				$services->the_post();

				// include('html/content.php');

				echo '<div class="col-'. $settings['columns_mobile'] .' col-lg-'. $settings['columns_tablet'] .' col-xl-'. $settings['columns'] .' '. $settings['layout'] .'">

                        <div class="elementor-service ">';
                            if(isset($i)){
                                if($i<10){
                                    echo '<div class="services-number">0'.$i.'</div>';
                                }else{
                                    echo '<div class="services-number">'.$i.'</div>';
                                }
                                $i++;
                            }
                            $this->render_post();

				echo   '</div>

					</div>';

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
            <a href="<?php the_permalink()?>" class="img-services"><?php the_post_thumbnail()?></a>
        <?php
    }
    
    protected function render_image_bottom() {
        $settings = $this->get_settings();
        if ( ! $this->get_settings( 'show_image_bottom' ) ) {
			return;
        }
        ?>
            <p class="mt--20"><img src="<?php echo $settings['image']['url'] ?>" alt="#"></p>
        <?php
	}


	protected function render_category() {
        if ( ! $this->get_settings( 'show_category' ) ) {
			return;
		}
		?>
            <p class="services-category"><?php echo get_the_term_list(get_the_ID(), 'services_cat', '', ', '); ?></p>
		<?php

	}

	protected function render_title() {
		if ( ! $this->get_settings( 'show_title' ) ) {
			return;
		}
		?><a href="<?php the_permalink() ?>">
				<p class="post-title"><?php the_title() ?></p>
                <span class="border-bottom-servecis"></span>
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


	protected function render_post() {
        $this->render_thumbnail();
        
        $this->render_image_bottom();

		$this->render_category();
		echo '<div class="services-title-excerpt">';
			$this->render_title();

			$this->render_excerpt();
		echo "</div>";
	}

	protected function _content_template() {

	}

}

