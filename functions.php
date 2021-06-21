<?php

define('THEME_DIRECTORY', get_template_directory());
define('THEME_DIRECTORY_URI', get_template_directory_uri());

/**
 * Load translation
 */
add_action('plugins_loaded', function () {
    load_theme_textdomain('pokymedia');
});

/**
 * Helper functions
 */
require_once THEME_DIRECTORY . '/includes/helper-functions.php';

/**
 * Theme Settings
 */
require_once THEME_DIRECTORY . '/includes/theme-settings.php';

/**
 * Scripts and styles
 */
require_once THEME_DIRECTORY . '/includes/scripts-and-styles.php';
