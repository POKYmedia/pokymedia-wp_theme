<?php get_header() ?>
<?php get_template_part('partials/navigation') ?>

<!-- TODO: full screen height -->
<div class="flex flex-col w-screen h-1/2 justify-center items-center text-center py-20 text-gray-900">
    <h1 class="text-6xl">
        404
    </h1>
    <p class="text-xl">
        <?php _e('Page not found', 'pokymedia') ?>
    </p>
</div>

<?php get_footer() ?>
