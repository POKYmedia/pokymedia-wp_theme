<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="utf-8"/>
    <meta name="referrer" content="no-referrer"/>
    <meta name="viewport" content="initial-scale=1.0"/>

    <meta name="author" content="František Gič"/>
    <meta
            name="description"
            content="<?php echo get_bloginfo('description') ?>"
    />

    <!-- Facebook Meta Tags -->
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="<?php echo get_bloginfo('name') ?>"/>
    <meta property="og:url" content="<?php echo get_bloginfo('url') ?>"/>
    <meta
            property="og:description"
            content="<?php echo get_bloginfo('description') ?>"
    />
    <meta property="og:image" content="<?php echo get_site_icon_url() ?>"/>

    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image"/>
    <meta name="twitter:title" content="<?php echo get_bloginfo('name') ?>"/>
    <meta
            name="twitter:description"
            content="<?php echo get_bloginfo('description') ?>"
    />
    <meta property="twitter:url" content="<?php echo get_bloginfo('url') ?>"/>
    <meta name="twitter:image" content="<?php echo get_site_icon_url() ?>"/>

    <link rel="icon" type="image/png" href="<?php echo get_site_icon_url() ?>"/>
    <?php wp_head(); ?>
</head>
<body <?php body_class('bg-white overflow-x-hidden') ?>>
