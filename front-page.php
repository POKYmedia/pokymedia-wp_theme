<?php get_header() ?>

<?php get_template_part('partials/quote') ?>

<?php if (have_posts()) : ?>
    <?php global $wp_query; ?>
    <section id="gallery" class="p-4 md:px-8 md:py-16 lg:px-0">
        <div class="container mx-auto">
            <!-- first row start -->
            <div class="flex flex-col md:flex-row row">

                <?php while (have_posts()) : the_post() ?>
                    <a href="<?php the_permalink() ?>" class="fill w-full row-item">
                        <?php the_post_thumbnail(); ?>
                    </a>

                    <?php
                    // end row and create new one
                    $post_order = $wp_query->current_post + 1;
                    if ($post_order % 3 === 0 && ($post_order !== $wp_query->post_count)) {
                        echo '</div><div class="flex flex-col md:flex-row row">';
                    }
                    ?>
                <?php endwhile ?>
            </div>
            <!-- last row end -->
        </div>
    </section>
<?php endif ?>

<?php get_template_part('partials/testimonials') ?>

<?php get_footer() ?>
