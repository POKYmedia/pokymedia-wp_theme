<footer class="flex flex-col items-center py-12 bg-footer text-footer">
    <div class="w-1/2 sm:w-1/3 md:w-1/6 text-center">

        <div class="w-40 text-center mx-auto">
            <?php get_template_part('partials/logo') ?>
        </div>

        <div class="flex my-10 justify-between">
            <?php
            $facebook_link = get_theme_mod('facebook_link');
            if (isset($facebook_link) && !empty($facebook_link)) :?>

                <a
                        href="<?php echo $facebook_link ?>"
                        class="flex justify-center items-center rounded-full w-10 h-10 bg-text-footer hover:bg-text-footer text-footer-inverse"
                >
                    <i class="fab fa-facebook-f text-2xl"></i>
                </a>
            <?php endif ?>


            <?php
            $youtube_link = get_theme_mod('youtube_link');
            if (isset($youtube_link) && !empty($youtube_link)) :?>
                <a
                        href="<?php echo $youtube_link ?>"
                        class="flex justify-center items-center rounded-full w-10 h-10 bg-text-footer hover:bg-text-footer text-footer-inverse"
                >
                    <i class="fab fa-youtube text-2xl"></i>
                </a>
            <?php endif ?>

            <?php
            $instagram_link = get_theme_mod('instagram_link');
            if (isset($instagram_link) && !empty($instagram_link)) :?>
                <a
                        href="<?php echo $instagram_link ?>"
                        class="flex justify-center items-center rounded-full w-10 h-10 bg-text-footer hover:bg-text-footer text-footer-inverse"
                >
                    <i class="fab fa-instagram fa-2x"></i>
                </a>
            <?php endif ?>

        </div>
        <small class="whitespace-no-wrap">&copy; <?php echo date('Y') ?> | <?php echo get_bloginfo('title') ?></small>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
