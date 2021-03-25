<?php get_header() ?>
<?php
$thumbnail_image = get_the_post_thumbnail_url(get_the_ID());
$title = get_the_title();

get_template_part(
    'partials/header',
    null,
    [
        'jumbotron' => true,
        'images' => [$thumbnail_image],
        'title' => $title
    ]
)
?>

<section>
<!--    <p>--><?php //the_content() ?><!--</p>-->
    <?php $images = get_post_meta(get_the_ID(), 'vdw_gallery_id', true); ?>

    <?php
    if (!empty($images)) :
        foreach ($images as $image_id): ?>
            <img src="<?php echo wp_get_attachment_url($image_id) ?>" alt="">
        <?php endforeach;
    endif ?>

</section>

<?php get_footer() ?>
