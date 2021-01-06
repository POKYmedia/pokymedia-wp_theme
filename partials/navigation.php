<header>
    <!-- TODO: sticky (absolute) -->
    <nav class="navigation md:py-2 sticky top-0 w-full z-10 shadow-xl-bottom navbar-background">
        <div class="md:hidden py-2 flex items-center flex-wrap">

            <div class="w-16 inline-block my-1 ml-3">
                <?php get_template_part('partials/logo') ?>
            </div>

            <a
                    id="navbarToggleBtn"
                    href="javascript:void(0)"
                    class="inline-block p-2 px-3 rounded-lg ml-auto mr-4 box-content border border-white focus:border-gray-300 hover:bg-gray-200"
            >
                <i class="fas fa-bars text-3xl text-gray-900 align-bottom"></i>
            </a>

        </div>
        <ul
                id="navbarMenu"
                class="block w-full md:container md:flex items-center justify-center uppercase mx-0 md:px-5 md:mx-auto shadow-inner-xl-top md:shadow-inner-none py-6 md:p-0 text-center md:text-left hidden"
        >
            <?php
            $navigation = wp_get_nav_menu_items('navigation');
            global $wp;
            $currentURL = trim(home_url($wp->request), '/');
            ?>

            <?php foreach ($navigation as $index => $navItem) :
                $active_class = (trim($navItem->url, '/') == $currentURL) ? 'active' : '';
                ?>

                <li class="flex flex-1 items-center justify-between <?= $active_class ?>">
                    <a href="<?= $navItem->url ?>"
                       class="py-2 md:py-0 block mx-auto md:hover:bg-white hover:text-normal">
                        <span class="border-accent"><?= $navItem->title ?></span>
                    </a>
                </li>

                <!-- logo in the middle of the nav -->
                <?php if (floor((count($navigation) - 1) / 2) == $index) : ?>
                <li class="items-center justify-between hidden md:flex flex-1">
                    <div class="w-24">
                        <?php get_template_part('partials/logo') ?>
                    </div>
                </li>
                <?php endif ?>

            <?php endforeach ?>
        </ul>
    </nav>
</header>
