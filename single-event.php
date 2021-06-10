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
);
?>

<div class="container w-5/6 md:w-full my-10 mx-auto font-serif">
    <?php the_content(); ?>
</div>

<a
        href="javascript:void(0)"
        id="scroll-to-top"
>
    <i class="fas fa-chevron-up"></i>
</a>

<?php get_footer() ?>
