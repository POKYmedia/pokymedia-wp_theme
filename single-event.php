<?php get_header() ?>
<?php get_template_part('partials/header', null, ['jumbotron' => true]) ?>

<section>
    <h1><?php the_title() ?></h1>
    <p><?php the_content() ?></p>

    <?php $images = get_post_meta(get_the_ID(), 'vdw_gallery_id', true); ?>

    <?php
    if (!empty($images)) :
        foreach ($images as $image_id): ?>
            <img src="<?php echo wp_get_attachment_url($image_id) ?>" alt="">
        <?php endforeach;
    endif ?>

</section>

<?php get_footer() ?>
