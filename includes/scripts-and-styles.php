<?php

add_action('wp_enqueue_scripts', function () {
    // styles
    wp_enqueue_style('wp-style', get_stylesheet_uri());
    wp_enqueue_style('poky-vendor-style', THEME_DIRECTORY_URI . '/css/vendor.min.css');
    wp_enqueue_style('poky-style', THEME_DIRECTORY_URI . '/css/script.min.css');

    // scripts
    wp_enqueue_script('poky-vendor-script', THEME_DIRECTORY_URI . '/js/vendor.min.js', null, null, true);
    wp_enqueue_script('poky-script', THEME_DIRECTORY_URI . '/js/script.min.js', null, null, true);
}, 1);

