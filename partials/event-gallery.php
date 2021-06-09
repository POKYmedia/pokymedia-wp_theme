<section id="gallery" class="px-4 py-10 lg:px-0">
    <div class="container mx-auto">

        <?php if (have_posts()) : global $wp_query; ?>

            <!-- first row start -->
            <div class="flex flex-col md:flex-row row">

                <?php while (have_posts()) : the_post() ?>

                    <a href="<?php the_permalink() ?>" class="fill w-full row-item">
                        <?php the_post_thumbnail('large'); ?>
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

        <?php else: ?>
            <div class="w-5/6 mx-auto py-10">
                <p><?php _e("Sorry, this section does not contain any posts yet.", 'pokymedia') ?></p>
            </div>
        <?php endif ?>

    </div>
</section>
