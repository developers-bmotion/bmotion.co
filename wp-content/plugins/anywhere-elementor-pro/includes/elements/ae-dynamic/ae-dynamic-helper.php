<?php
namespace Aepro;

use Elementor;
use Elementor\Controls_Manager;

class AE_Dynamic_Helper{
    public static $_instance = null;

    public static function instance() {
        if ( is_null( self::$_instance ) ) {
            self::$_instance = new self();
        }

        return self::$_instance;
    }

    public function ae_get_acf_field_groups(){

    	$acf_groups = acf_get_field_groups();
        return $acf_groups;
    }

    public function ae_get_acf_fields($acf_group = []){
    	$fields = acf_get_fields($acf_group);
        return $fields;
    }

    public function ae_acf_get_repeater(){
        $acf_groups = $this->ae_get_acf_field_groups();

        foreach ( $acf_groups as $acf_group ) {
//            die('dfasd');
            $is_on_option_page = false;
            foreach ($acf_group['location'] as $locations) {
//                echo $acf_group['title'];
//                echo '<pre>';
//                print_r($locations);
//                echo '</pre>';
                foreach ($locations as $location) {
                    if ($location['param'] === 'options_page') {
                        $is_on_option_page = true;
                    }
                }
            }
            $only_on_option_page = '';
            if($is_on_option_page == true && 1===count($acf_group['location'])){
                $only_on_option_page = true;
            }
            $fields = $this->ae_get_acf_fields($acf_group);
            $options = [];
            foreach ($fields as $field) {
                if ($field['type'] == 'repeater') {
                    if($only_on_option_page){
                        $options['option' . ':' . $field['ID'] . ':' . $field['name']] = 'Option:' . $field['label'];
                    }else{
                        if ($is_on_option_page == true) {
                            $options['option' . ':' . $field['ID'] . ':' . $field['name']] = 'Option:' . $field['label'];
                        }

                        $options['post' . ':' . $field['ID'] . ':' . $field['name']] = $field['label'];
                    }

                }
            }
            if(!empty($options)){
                $groups[] = [
                    'label'     =>  $acf_group['title'],
                    'options'   =>  $options,
                ];
            }


        }
//        echo '<pre>'; print_r($groups); echo '</pre>';
//        die('dfadsad');
        return $groups;


    }

    public function ae_get_group_fields($tag , $sup_fields){
//    	$helper = new Helper();
//    	$demo_post_data = $helper->get_demo_post_data();
//    	$demo_post_id = $demo_post_data->ID;
	    global $post;
	    $post_id = $post->ID;
	    $post_type = $post->post_type;
	    if($post_type == 'ae_global_templates'){
		    $selected_repeater = get_post_meta($post_id , 'ae_acf_repeater_name' , true);
	    }
		$default = !empty($selected_repeater) ? $selected_repeater : '';
	    //$post_meta = get_post_meta($post_id);
        $acf_groups = $this->ae_get_acf_field_groups();
        $repeaters = $this->ae_acf_get_repeater();
        $tag->add_control(
            'acf_repeater',
            [
                'label' => __( 'Repeater', 'ae-pro' ),
                'type' => Controls_Manager::SELECT,
                'groups' => $repeaters,
	            'default'   =>  $default
            ]
        );

        foreach ( $acf_groups as $acf_group ) {
            $fields = $this->ae_get_acf_fields($acf_group);
            foreach ($fields as $field){
                if($field['type'] == 'repeater'){
                    $tag->add_control(
                        $field['ID'].':'.$field['name'],
                        [
                            'label'     =>  __('Sub Field' , 'ae-pro'),
                            'type'      =>  Controls_Manager::SELECT,
                            'options'   =>  $this->ae_acf_get_group_fields($field['ID'] , $sup_fields),
                            'condition' =>  [
                                'acf_repeater'  => [
                                    'post:'.$field['ID'].':'.$field['name'],
                                    'option:'.$field['ID'].':'.$field['name'],
                                ]

                            ],
                        ]
                    );
                }
            }

        }

//        foreach ($repeaters as $repeater){
//            $option_fields = [];
//            foreach ($repeater['options']  as $key => $value){
//                $field_data = explode(':' , $key);
//                if($field_data[0] == 'option'){
//                    $option_fields = $field_data[1];
//                }
//                if(in_array($field_data[1] , $option_fields , true)){
//
//                }
//                $repeater_id = $field_data[1];
//                $tag->add_control(
//                    'acf_repeater_field_'.$field_data[1].':'.$field_data[2],
//                    [
//                        'label' => __( 'Fields' , 'ae-pro' ),
//                        'type' => Controls_Manager::SELECT,
//                        'options' => AE_Dynamic_Helper::instance()->ae_acf_get_group_fields($field_data[0].':'.$repeater_id , $sup_fields),
////                        'condition' =>  [
////                            'acf_repeater'  => [
////                                'post:'.$field_data[1].':'.$field_data[2],
////                                'option:'.$field_data[1].':'.$field_data[2],
////                            ],
////                        ]
//                    ]
//                );
//            }
//
//
//        }

    }

    public function ae_acf_get_group_fields($field_id , $sup_fields){
        $options = [
            ''  =>  __('-- Select --' , 'ae-pro'),
        ];
        $field = acf_get_field($field_id);
        $sub_fields = $field['sub_fields'];

        foreach ($sub_fields as $sub_field){
            if(in_array($sub_field['type'] , $sup_fields)){
                $options[$sub_field['name']] = $sub_field['label'];
            }
        }

        return $options;

    }

    public function key_name($settings , $key){
        return 'acf_repeater_field_'.$key;
    }

    public function get_repeater_data($settings){
        $helper = new Helper();
        $repeater_data =  explode(':' , $settings['acf_repeater']);
        $repeater_is = $repeater_data[0];
        $repeater = $repeater_data[2];
        $field_name = $settings[$repeater_data[1].':'.$repeater_data[2]];
        $value = '';
        if(!empty($repeater) && !empty($field_name)){
            if( ! Frontend::$_in_repeater_block ) {

                if($repeater_is == 'option'){
                    $repeater_field = get_field($repeater, 'option');
                    if(is_array($repeater_field) && !empty($repeater_field[0][$field_name])){
                        $value          = $repeater_field[0][$field_name];
                    }

                }else{
                    $post_data      = $helper->get_demo_post_data();
                    $post_id        = $post_data->ID;
                    $repeater_field = get_field($repeater, $post_id);
                    if(is_array($repeater_field) && !empty($repeater_field[0][$field_name])){
                        $value          = $repeater_field[0][$field_name];
                    }
                    //echo '<pre>'; print_r($value); echo '</pre>';
                }

            }else{
                $value = get_sub_field($field_name);
            }
            return $value;
        }

    }
}