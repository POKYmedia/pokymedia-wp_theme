<?php

$disabled_menu_pages = [
    'edit.php', // posts,
    'edit.php?post_type=page', // pages
    'edit-comments.php', // comments
    'upload.php' // media
];

$disabled_submenu_pages = [
    ['themes.php', 'theme-editor.php'], // appearance -> theme editor
    ['plugins.php', 'plugin-editor.php'] // plugins -> plugin editor
];

// Remove pages from side admin menu
add_action('admin_menu', function () use ($disabled_menu_pages, $disabled_submenu_pages) {

    // Main menus
    foreach ($disabled_menu_pages as $disabled_page) {
        remove_menu_page($disabled_page);
    }

    // Submenus
    foreach ($disabled_submenu_pages as $disabled_page) {
        remove_submenu_page($disabled_page[0], $disabled_page[1]);
    }
}, 999);

// Remove +New <item> in top Admin Menu Bar
add_action('admin_bar_menu', function ($wp_admin_bar) {
    $wp_admin_bar->remove_node('new-post');
    $wp_admin_bar->remove_node('new-page');
    $wp_admin_bar->remove_node('new-media');
}, 999);

// Remove Quick Draft Dashboard Widget
add_action('wp_dashboard_setup', function () {
    remove_meta_box('dashboard_quick_press', 'dashboard', 'side');
}, 999);



