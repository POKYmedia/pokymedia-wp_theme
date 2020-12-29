<?php


add_action('after_setup_theme', function () {

    /*
     * Theme support
     */

    // Featured images to posts
    add_theme_support('post-thumbnails');

    // <title> tag
    add_theme_support('title-tag');

    // Logo
    add_theme_support('custom-logo', [
        'height' => 500,
        'width' => 500,
        'flex-height' => false,
        'flex-width' => false,
    ]);

    // Background color
    add_theme_support('custom-background', [
        'default-color' => 'ffffff',
        'default-image' => '',
    ]);

    /**
     * Load Translation
     */
    load_theme_textdomain('pokymedia');
});

