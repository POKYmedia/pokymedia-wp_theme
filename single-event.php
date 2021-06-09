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

$images = get_post_meta(get_the_ID(), 'vdw_gallery_id', true);

const WIDTHS = [1, 2, 3, 4];
const HEIGHTS = [400, 600, 600, 800];
$leftover_width = 0;
$leftover_height = 0;

function get_random_mosaic_dimension_classes()
{
    global $leftover_width, $leftover_height;
    $result = [];

    // new row
    if (0 === $leftover_width) {
        $result['width'] = WIDTHS[array_rand(WIDTHS)];
        $result['height'] = HEIGHTS[array_rand(HEIGHTS)];

        $leftover_width = 4 - $result['width'];
        $leftover_height = $result['height'];
    } // image in the same row
    else {
        # reduce leftover from MAX
        $result['width'] = $leftover_width;
        $result['height'] = $leftover_height;
        $leftover_width = 0;
        $leftover_height = 0;
    }

    return 'width-' . $result['width'] . ' ' . 'height-' . $result['height'];
}

?>

<div
        id="mosaic-gallery"
        class="container mx-auto px-4 py-32 md:py-18 lg:px-0"
        itemscope
        itemtype="http://schema.org/ImageGallery"
>
    <?php
    if (!empty($images)) :
        foreach ($images as $image):
            $full_image = wp_get_attachment_image_url($image, 'full');
            $image_meta = wp_get_attachment_metadata($image, false);
            ?>
            <figure
                    itemprop="associatedMedia"
                    itemscope
                    itemtype="http://schema.org/ImageObject"
                    class="<?= get_random_mosaic_dimension_classes() ?>"
            >
                <a
                        href="<?= $full_image ?>"
                        itemprop="contentUrl"
                        data-size="<?= $image_meta['width'] . 'x' . $image_meta['height'] ?>"
                        class="w-full h-full fill"
                >
                    <img
                            loading="lazy"
                            src=" <?php echo wp_get_attachment_image_url($image, 'large') ?>"
                            itemprop="thumbnail"
                    >
                </a>
            </figure>
        <?php endforeach;
    endif ?>
</div>

<?php get_footer() ?>
