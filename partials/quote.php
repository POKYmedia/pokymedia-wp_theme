<?php
$quoteLoop = new WP_Query([
    'post_type' => 'quote',
    'posts_per_page' => 1,
    'orderby' => 'rand'
]);
?>

<?php if ($quoteLoop->have_posts()) : ?>
    <?php while ($quoteLoop->have_posts()) : $quoteLoop->the_post() ?>
        <section class="flex justify-center font-serif shadow-inner-xl-bottom p-16 sm:p-20 bg-primary">
            <div class="container">
                <div class="w-full md:w-4/6 mx-auto relative">
                    <span class="text-6xl text-accent quote-mark">&quot;</span>
                    <blockquote class="text-xl">
                        <?php echo get_the_content() ?>
                    </blockquote>

                    <?php
                    $author = get_post_meta(get_the_ID(), 'pokymedia-quote_author', true);
                    if (isset($author) && !empty($author)): ?>

                        <small class="block w-full text-right font-bold text-accent mt-2 text-xl"
                        >~<span class="font-sans">
                                <?php echo $author ?>
                            </span>
                        </small>

                    <?php endif ?>
                </div>
            </div>
        </section>
    <?php
    endwhile;
    wp_reset_postdata(); // reset the wp loop
    ?>
<?php endif ?>



