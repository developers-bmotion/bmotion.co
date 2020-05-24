<?php
namespace Aepro;
use Elementor\Controls_Manager;
use Elementor\Core\DynamicTags\Data_Tag;
use Elementor\Core\DynamicTags\Tag;
use Elementor\Plugin;

class AE_URL_Dynamic extends Data_Tag
{
    public function get_name()
    {
        return 'ae-url';
    }

    public function get_title()
    {
        return __('Repeater Url', 'ae-pro');
    }

    public function get_group()
    {
        return 'acf';
    }

    public function get_categories()
    {
        return [
            \Elementor\Modules\DynamicTags\Module::URL_CATEGORY,
        ];

    }

    public function get_panel_template_setting_key() {
        return 'key';
    }

    protected function _register_controls() {
        AE_Dynamic_Helper::instance()->ae_get_group_fields($this , $this->get_supported_fields());
    }

    protected function get_supported_fields(){
        return [
            'url',
            'text',
            'link',
	        'oembed',
        ];
    }

    public function get_value( array $options = [] )
    {
        $settings = $this->get_settings();
        $value = AE_Dynamic_Helper::instance()->get_repeater_data($settings);
        return $value;
    }
}