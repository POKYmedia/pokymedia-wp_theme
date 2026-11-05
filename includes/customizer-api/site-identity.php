<?php

class Pokymedia_CustomizerAPI_Site_Identity_Section
{

    private $fields;

    public function __construct()
    {
        $this->fields = [
            [
                'setting_key' => 'instagram_link',
                'setting_name' => __('Instagram Page URL', 'pokymedia'),
                'setting_description' => ''
            ],
            [
                'setting_key' => 'facebook_link',
                'setting_name' => __('Facebook Page URL', 'pokymedia'),
                'setting_description' => ''
            ], [
                'setting_key' => 'youtube_link',
                'setting_name' => __('Youtube channel URL', 'pokymedia'),
                'setting_description' => ''
            ]
        ];
    }

    public function add_site_identity_fields($wp_customize)
    {
        foreach ($this->fields as $field) {
            $wp_customize->add_setting(
                $field['setting_key'],
                array(
                    'default' => '',
                    'type' => 'theme_mod',
                    'capability' => 'edit_theme_options'
                )
            );

            $wp_customize->add_control(new WP_Customize_Control(
                $wp_customize,
                $field['setting_key'],
                array(
                    'label' => $field['setting_name'],
                    'description' => $field['setting_description'],
                    'section' => 'title_tagline',
                    'type' => 'text',
                )
            ));
        }

        // Logo variant for light backgrounds (pages without jumbotron)
        $wp_customize->add_setting('dark_logo', array(
            'default' => '',
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'absint',
        ));

        $wp_customize->add_control(new WP_Customize_Media_Control(
            $wp_customize,
            'dark_logo',
            array(
                'label' => __('Dark logo', 'pokymedia'),
                'description' => __('Used on pages with a light background.', 'pokymedia'),
                'section' => 'title_tagline',
                'mime_type' => 'image',
                'priority' => 9,
            )
        ));
    }
}
