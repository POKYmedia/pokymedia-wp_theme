<?php
if (isset($args['images']) && !empty($args['images'])) {
    $images = $args['images'];
} else {
    $images = explode(',', rtrim(get_theme_mod('header-images'), ','));
}
?>

<div id="jumbotron-carousel" class="carousel-wrapper h-full w-full">
    <div class="carousel w-full h-full">

        <!-- Wrapper for slides -->
        <?php if (isset($images) && !empty($images)): ?>
            <?php foreach ($images as $key => $image): ?>
                <div class="carousel-item fill <?= 0 == $key ? 'initial' : '' ?>">
                    <img
                            class="w-full h-full"
                            src=" <?= $image ?>"
                            loading="lazy"
                    />
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="item bg-black"></div>
        <?php endif; ?>

        <?php if (isset($args['title'])): ?>
            <div class="w-full container relative bottom-4/5 mx-auto z-20 bg-white-transparent-70 py-8">
                <p class="text-center text-3xl text-white font-serif"><?= $args['title'] ?></p>
            </div>
        <?php endif; ?>

        <!-- overlay -->
        <div class="overlay"></div>
    </div>
</div>

