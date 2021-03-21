<?php

class Pokymedia_CustomizerAPI_Color_Section
{
    private $colors;

    public function __construct()
    {
        $this->colors = [

            // Text color
            [
                'setting_key' => 'text_color',
                'setting_name' => __('Text color', 'pokymedia'),
                'setting_description' => __('Sets the color of the text.', 'pokymedia'),
                'default_color' => '2d3748',
                'style_callback_fn' => function ($hex) {
                    ?>
                    body,
                    .text-normal {
                    color: <?php echo $hex; ?>
                    }

                    .hover\:text-normal:hover {
                    color: <?php echo adjust_brightness($hex, 0.2) ?>
                    }
                    <?php
                }
            ],

            // Footer text color
            [
                'setting_key' => 'footer_text_color',
                'setting_name' => __('Footer text color', 'pokymedia'),
                'setting_description' => __('Text color of the bottom part of the page.', 'pokymedia'),
                'default_color' => 'edf2f7',
                'style_callback_fn' => function ($hex) {
                    ?>
                    .text-footer {
                    color: <?php echo $hex; ?>
                    }

                    .hover\:text-footer:hover {
                        color: <?php echo adjust_brightness($hex, -0.1); ?>
                    }

                    .bg-text-footer {
                    background-color: <?php echo $hex; ?>
                    }

                    .hover\:bg-text-footer:hover {
                    background-color: <?php echo adjust_brightness($hex, -0.1); ?>
                    }

                    .text-footer-inverse {
                        color: <?php echo invert_color($hex); ?>
                    }

                    .bg-footer-inverse {
                        background-color: <?php echo $hex; ?>
                    }
                    <?php
                },
            ],
        ];
    }

    function add_color_setting($wp_customize, $setting_key, $setting_preview_name, $description = '', $default_color = '')
    {

        $wp_customize->add_setting($setting_key, array(
            'default' => $default_color,
            'transport' => 'refresh',
            'sanitize_callback' => 'sanitize_hex_color',
        ));

        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, $setting_key, array(
            'section' => 'colors',
            'label' => __($setting_preview_name, 'pokymedia'),
            'description' => $description
        )));
    }


    function get_theme_customizer_css()
    {
        ob_start();

        foreach ($this->colors as $color) {
            $value = get_theme_mod($color['setting_key'], true);
            if (!empty($value)) {
                $color['style_callback_fn']($value);
            }
        }

        return ob_get_clean();
    }

    public function register_color_settings($wp_customize)
    {
        foreach ($this->colors as $color) {
            $this->add_color_setting($wp_customize, $color['setting_key'], $color['setting_name'], $color['setting_description'], $color['default_color']);
        }
    }

    public function add_inline_style()
    {
        $custom_css = $this->get_theme_customizer_css();
        wp_add_inline_style('wp-style', $custom_css);
    }
}
