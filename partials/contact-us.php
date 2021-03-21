<div class="text-xl uppercase font-serif py-3 text-normal bg-white text-center">
    Najaktuálnejšie príspevky nájdete na našom instagrame:<!--
        --><a class="pl-3" href="<?= get_theme_mod('instagram_link'); ?>">POKY.MEDIA</a>
</div>


<div
        class="w-full pt-10 pb-3"
>

    <div class="flex text-footer">
        <div class="flex justify-center items-center w-1/2 ">
            <div class="flex flex-col items-center w-1/2 text-center">

                <p class="text-2xl">
                    <span class="text-2x handwritten tracking-wide leading-10">
                    Ozvite sa nám! Potešíme sa a porozprávame sa o Vašich predstavách.
                    </span>
                </p>

                <!-- social links -->
                <div class="flex w-1/2 mx-auto justify-between mt-4">

                    <?php
                    $facebook_link = get_theme_mod('facebook_link');

                    if (isset($facebook_link) && !empty($facebook_link)) :?>
                        <a
                                href="<?php echo $facebook_link ?>"
                                class="flex justify-center items-center rounded-full w-8 h-8 bg-text-footer hover:bg-text-footer text-footer-inverse"
                        >
                            <i class="fab fa-facebook-f text-xl"></i>
                        </a>
                    <?php endif ?>

                    <?php
                    $instagram_link = get_theme_mod('instagram_link');
                    if (isset($instagram_link) && !empty($instagram_link)) :?>
                        <a
                                href="<?php echo $instagram_link ?>"
                                class="flex justify-center items-center rounded-full w-8 h-8 bg-text-footer hover:bg-text-footer text-footer-inverse"
                        >
                            <i class="fab fa-instagram text-2xl"></i>
                        </a>
                    <?php endif ?>


                    <?php
                    $youtube_link = get_theme_mod('youtube_link');
                    if (isset($youtube_link) && !empty($youtube_link)) :?>
                        <a
                                href="<?php echo $youtube_link ?>"
                                class="flex justify-center items-center rounded-full w-8 h-8 bg-text-footer hover:bg-text-footer text-footer-inverse"
                        >
                            <i class="fab fa-youtube text-xl"></i>
                        </a>
                    <?php endif ?>

                </div>
            </div>
        </div>

        <!-- contact button -->

        <div class="flex justify-center items-center w-1/2 handwritten text-2xl">
            <a
                    class="flex justify-center items-center px-16 pt-8 pb-4 text-2x handwritten leading-36 rounded-3xl cursor-pointer bg-white-transparent-70 hover:bg-white-transparent-60"
                    href="<?= get_permalink(get_page_by_title('Kontakt')) ?>"
            >
                Kontaktovať
            </a>
        </div>
    </div>
</div>
