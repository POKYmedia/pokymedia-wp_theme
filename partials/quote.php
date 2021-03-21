<?php
$quoteLoop = new WP_Query([
    'post_type' => 'quote',
    'posts_per_page' => 1,
    'orderby' => 'rand'
]);
?>

<?php if ($quoteLoop->have_posts()) : ?>
    <?php while ($quoteLoop->have_posts()) : $quoteLoop->the_post() ?>
        <section class="flex justify-center p-10 sm:p-12 handwritten">
            <div class="container">
                <div class="w-full md:w-4/6 mx-auto relative">
                    <span class="quote-mark">&quot;</span>
                    <blockquote class="text-5xl">
                        <?php echo get_the_content() ?>
                    </blockquote>

                    <?php
                    $author = get_post_meta(get_the_ID(), 'pokymedia-quote_author', true);
                    if (isset($author) && !empty($author)): ?>

                        <small class="block w-full text-right font-bold mt-2 text-3xl"
                        >~<span>
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



