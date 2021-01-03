<?php

require_once 'colors.php';


$color_customizer_api = new Pokymedia_CustomizerAPI_Color_Section();

add_action('customize_register', function ($wp_customize) use ($color_customizer_api) {

    $wp_customize->remove_section('background_image');

    // Register settings into customizer API
    $color_customizer_api->register_color_settings($wp_customize);
});

add_action('wp_enqueue_scripts', function () use ($color_customizer_api) {
    // Add custom styles into the dom
    $color_customizer_api->add_inline_style();
}, 2); // lower priority than styles in `./scripts-and-styles.php`
