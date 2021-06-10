<?php get_header() ?>
<?php get_template_part('partials/header') ?>

<div class="container mx-auto my-10 font-serif">
    <?php the_content(); ?>
</div>

<?php get_footer(null, ['hide' => ['contact']]) ?>

