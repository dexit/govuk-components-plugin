<?php

namespace GovukComponents\Blocks;

class Details implements \Dxw\Iguana\Registerable
{
    public $templatePath = '/templates/details.php';

    public function register()
    {
        add_action('init', [$this, 'registerBlock']);
        add_action('init', [$this, 'registerFields']);
    }

    public function registerBlock()
    {
        if (function_exists('acf_register_block_type')) {
            acf_register_block_type([
                'name'              => 'details',
                'title'             => 'Details',
                'render_callback'   => [$this, 'render'],
                'mode' => 'auto',
                'category'          => 'formatting',
                'icon'              => 'arrow-down',
                'keywords'          => [ 'details', 'accordion' ],
            ]);
        }
    }

    public function registerFields()
    {
        if (function_exists('acf_add_local_field_group')):

            acf_add_local_field_group([
                'key' => 'group_600aa546ee518',
                'title' => 'Details',
                'fields' => [
                    [
                        'key' => 'field_600aa55198405',
                        'label' => 'Summary',
                        'name' => 'details_summary',
                        'type' => 'text',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => [
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ],
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'maxlength' => '',
                    ],
                    [
                        'key' => 'field_600aa57398406',
                        'label' => 'Text',
                        'name' => 'details_text',
                        'type' => 'textarea',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => [
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ],
                        'default_value' => '',
                        'placeholder' => '',
                        'maxlength' => '',
                        'rows' => '',
                        'new_lines' => 'br',
                    ],
                ],
                'location' => [
                    [
                        [
                            'param' => 'block',
                            'operator' => '==',
                            'value' => 'acf/details',
                        ],
                    ],
                ],
                'menu_order' => 0,
                'position' => 'normal',
                'style' => 'default',
                'label_placement' => 'top',
                'instruction_placement' => 'label',
                'hide_on_screen' => '',
                'active' => true,
                'description' => '',
            ]);
            
        endif;
    }

    public function render()
    {
        load_template(dirname(plugin_dir_path(__FILE__), 2) . $this->templatePath, false);
    }
}