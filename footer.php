<div
        style="background-image: url('<?= THEME_DIRECTORY_URI . '/dist/assets/images/footer-bg.png' ?>'); background-size: cover;"
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
