<?php
if (has_custom_logo()) :
    $custom_logo_id = get_theme_mod('custom_logo');

    echo '<a href="' . get_site_url() . '">';

    // If logo is svg image, print inline contents
    if (is_svg($custom_logo_id)) {
        ?>
        <div class="fill-current">
            <?= load_inline_svg($custom_logo_id) ?>
        </div>

        <?php
    } else {
        $logo = wp_get_attachment_image_url($custom_logo_id);
        ?>
        <img
                src="<?php echo esc_url($logo) ?>"
                alt="<?php echo get_bloginfo('name') ?>"
        >
        <?php
    }

    echo '</a>';

endif;
