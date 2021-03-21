<?php

add_action('wp_enqueue_scripts', function () {
    // styles
    wp_enqueue_style('wp-style', get_stylesheet_uri());
    wp_enqueue_style('poky-style', THEME_DIRECTORY_URI . '/dist/css/style.css');

    // scripts
    wp_enqueue_script('poky-script', THEME_DIRECTORY_URI . '/dist/js/script.js', null, null, true);
}, 1);

