<?php

require_once 'colors.php';
require_once 'site-identity.php';
require_once 'images.php';

$color_customizer_api = new Pokymedia_CustomizerAPI_Color_Section();
$site_identity_customizer_api = new Pokymedia_CustomizerAPI_Site_Identity_Section();
$images_customizer_api = new Pokymedia_CustomizerAPI_Images_Section();

add_action('customize_register', function ($wp_customize) use ($color_customizer_api, $site_identity_customizer_api, $images_customizer_api) {

    $wp_customize->remove_section('header_image');
    $wp_customize->remove_section('background_image');
    $wp_customize->remove_section('static_front_page');

    // Register settings into customizer API
    $color_customizer_api->register_color_settings($wp_customize);

    // Register site identity
    $site_identity_customizer_api->add_site_identity_fields($wp_customize);

    // Register images
    $images_customizer_api->add_fields($wp_customize);
}, 90);

add_action('wp_enqueue_scripts', function () use ($color_customizer_api) {
    // Add custom styles into the dom
    $color_customizer_api->add_inline_style();
}, 2); // lower priority than styles in `./scripts-and-styles.php`
