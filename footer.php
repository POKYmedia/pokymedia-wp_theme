<?php
$footer_style = 'background-color:transparent;';
$footer_image = get_theme_mod('footer-image');

if (isset($footer_image) && !empty($footer_image)) {
    $footer_style = 'background-image: url(' . esc_url(wp_get_attachment_image_url($footer_image, 'large')) . ');';
}
?>

<div
        class="footer"
        style="<?= $footer_style ?>"
>
    <?php get_template_part('partials/testimonials') ?>

    <?php
    // check whether the contact section isn't hidden
    if (!in_array('contact', $args['hide'] ?? [])):
        ?>
        <div
                class="bg-black-transparent-40"
        >
            <?php get_template_part('partials/contact-us') ?>
            <?php get_template_part('partials/copyright') ?>
        </div>
    <?php else: ?>
        <?php get_template_part('partials/copyright') ?>
    <?php endif; ?>
</div>

<?php wp_footer(); ?>
</body>
</html>
