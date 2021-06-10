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

        <div class="w-full container mx-auto relative z-20 -top-72">
            <?php if (isset($args['title'])): ?>
                <div class="bg-white-transparent-70 py-8 relative -top-72">
                    <p class="text-center text-3xl text-white font-serif"><?= $args['title'] ?></p>
                </div>
            <?php endif; ?>

            <a
                    id="scroll-bottom"
                    href="javascript:void(0)"
                    class="hidden md:flex justify-center text-white text-4xl cursor-pointer <?= isset($args['title']) ? 'relative -top-36' : ''?>"
            >
                <i class="fas fa-angle-down"></i>
            </a>
        </div>

        <!-- overlay -->
        <div class="overlay"></div>
    </div>
</div>

