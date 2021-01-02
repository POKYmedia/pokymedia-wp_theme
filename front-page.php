<?php get_header() ?>

<?php get_template_part('partials/quote') ?>

<section id="gallery" class="p-4 md:px-8 md:py-16 lg:px-0">
    <div class="container mx-auto">
        <div class="flex flex-col md:flex-row row">
            <div class="w-full row-item fill">
                <img src="./img/wedding/wedding-1.jpeg" alt="" />
            </div>
            <div class="w-full row-item fill">
                <img src="./img/wedding/wedding-2.jpeg" alt="" />
            </div>
            <div class="w-full row-item fill">
                <img src="./img/wedding/wedding-3.jpg" alt="" />
            </div>
        </div>
    </div>
</section>


<?php get_template_part('partials/testimonials') ?>

<?php get_footer() ?>
