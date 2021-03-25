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

<section id="mosaic-gallery" class="masonry container mx-auto py-20 px-10">
    <?php
    $images = get_post_meta(get_the_ID(), 'vdw_gallery_id', true);
    if (!empty($images)) :
        foreach ($images as $image_id): ?>
            <div class="fill flex-auto">
                <img class="masonry-brick" src="<?php echo wp_get_attachment_url($image_id) ?>" alt="">
            </div>
        <?php endforeach;
    endif ?>
</section>

<?php get_footer() ?>
