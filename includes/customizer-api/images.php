<?php

require_once 'controls/multi-image-control/index.php';

class Pokymedia_CustomizerAPI_Images_Section
{

    private $fields;

    public function __construct()
    {
        $this->fields = [
            [
                'setting_key' => 'header-images',
                'control' => function ($wp_customize) {
                    $wp_customize->add_control(
                        new Multi_Image_Custom_Control(
                            $wp_customize,
                            'header-images',
                            array(
                                'label' => __('Header images', 'pokymedia'),
                                'description' => __('Images on the top of the page', 'pokymedia'),
                                'section' => 'images',
                            )
                        ));
                },
            ],
            [
                'setting_key' => 'footer-image',
                'setting_name' => __('Footer image', 'pokymedia'),
                'setting_description' => __('Background image of the bottom part of the page', 'pokymedia'),
            ],
        ];
    }

    public function add_fields($wp_customize)
    {
        $wp_customize->add_section('images', array(
            'title' => __('Images', 'pokymedia'),
            'priority' => 40,
        ));

        foreach ($this->fields as $field) {
            $wp_customize->add_setting(
                $field['setting_key'],
                array(
                    'default' => '',
                    'type' => 'theme_mod',
                    'capability' => 'edit_theme_options'
                )
            );

            if (isset($field['control'])) {
                $field['control']($wp_customize);
            } else {
                $wp_customize->add_control(new WP_Customize_Media_Control(
                    $wp_customize,
                    $field['setting_key'],
                    array(
                        'label' => $field['setting_name'],
                        'description' => $field['setting_description'],
                        'section' => 'images',
                    )
                ));
            }
        }
    }
}
