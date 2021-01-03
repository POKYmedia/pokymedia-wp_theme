<?php
// Get the testimonials from the DB
$testimonialLoop = new WP_Query([
    'post_type' => 'testimonial',
    'orderby' => 'rand'
]);
?>

<?php if ($testimonialLoop->have_posts()) : ?>

    <section class="block py-16 md:py-20 shadow-inner-xl-top carousel-wrapper bg-primary">
        <div class="carousel">

            <?php while ($testimonialLoop->have_posts()) : $testimonialLoop->the_post() ?>

                <div class="flex flex-col items-center bg-white rounded-lg w-5/6 sm:w-4/5 md:w-1/2 px-10 py-12 relative shadow-md carousel-item <?php if (0 == $testimonialLoop->current_post) echo 'initial'; ?>">
                    <div class="fill w-20 h-20 rounded-full absolute -top-8">
                        <?php if (has_post_thumbnail()) :
                            the_post_thumbnail('thumbnail');
                        else: // use default stock profile image
                            ?>
                            <img
                                    src="<?php echo THEME_DIRECTORY_URI . '/assets/images/stock-person.jpg' ?>"
                                    alt="Default person image"
                            />
                        <?php endif ?>
                    </div>
                    <strong class="mt-3">
                        <?php the_title() ?>
                    </strong>
                    <p class="text-center w-4/5 my-6 break-words">
                        <?php echo get_the_content() ?>
                    </p>
                </div>

            <?php
            endwhile;
            wp_reset_postdata(); // reset the wp loop
            ?>

            <!-- carousel buttons -->
            <a
                    href="#"
                    class="flex flex-1 items-center text-gray-500 hover:text-gray-600 px-3 carousel-button-prev"
            >
                <i class="fas fa-chevron-left text-2xl"></i>
            </a>
            <a
                    href="#"
                    class="flex flex-1 items-center text-gray-500 hover:text-gray-600 px-3 carousel-button-next"
            >
                <i class="fas fa-chevron-right text-2xl"></i>
            </a>
        </div>
    </section>
<?php endif ?>

