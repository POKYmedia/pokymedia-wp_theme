<?php
$images = explode(',', rtrim(get_theme_mod('header-images'), ','));
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
                        alt=""
                />
            </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="item bg-black"></div>
        <?php endif; ?>

        <!-- overlay -->
        <div class="overlay"></div>
    </div>
</div>

