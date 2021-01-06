<?php


add_action('after_setup_theme', function () {

    /*
     * Theme support
     */

    // Featured images to posts
    add_theme_support('post-thumbnails');

    // <title> tag
    add_theme_support('title-tag');

    // Menus
    register_nav_menus([
        'navigation' => __('Navigation', 'pokymedia'),
    ]);

    // Logo setup in Customizer API
    add_theme_support('custom-logo', [
        'height' => 500,
        'width' => 500,
        'flex-width' => true,
        'flex-height' => true,
    ]);

    // Background color in Customizer API
    add_theme_support('custom-background', [
        'default-color' => 'ffffff',
        'default-image' => '',
    ]);

    /**
     * Load Translation
     */
    load_theme_textdomain('pokymedia');
});

// Remove default wordpress features such as posts and comments
require_once THEME_DIRECTORY . '/includes/remove-default-features.php';

// Customizer API
require_once THEME_DIRECTORY . '/includes/customizer-api/index.php';

