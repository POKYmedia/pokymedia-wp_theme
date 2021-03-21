<nav class="navigation md:py-4 w-full">

    <!-- hamburger menu -->
    <div class="md:hidden py-2 flex items-center flex-wrap">

        <?php if (has_custom_logo()) : ?>
            <div class="w-16 inline-block my-1 ml-3">
                <?= get_custom_logo() ?>
            </div>
        <?php endif ?>

        <a
                id="navbarToggleBtn"
                href="javascript:void(0)"
                class="inline-block p-2 px-3 rounded-lg ml-auto mr-4 box-content border border-white focus:border-gray-300 hover:bg-gray-200"
        >
            <i class="fas fa-bars text-3xl text-gray-900 align-bottom"></i>
        </a>
    </div>

    <!-- navigation -->
    <ul
            id="navbarMenu"
            class="block w-full md:container md:flex items-center justify-between uppercase mx-0 md:px-5 md:mx-auto shadow-inner-xl-top md:shadow-inner-none py-6 md:p-0 text-center md:text-left hidden"
    >
        <?php
        $navigation = wp_get_nav_menu_items('navigation');
        global $wp;
        $currentURL = trim(home_url($wp->request), '/');
        ?>

        <?php foreach ($navigation as $index => $navItem) :
            $active_class = (trim($navItem->url, '/') == $currentURL) ? 'active' : '';
            ?>

            <li class="<?= $active_class ?>">
                <a href="<?= $navItem->url ?>"
                   class="py-2 md:py-0 block mx-auto">
                    <span><?= $navItem->title ?></span>
                </a>
            </li>

            <!-- logo in the middle of the nav -->
            <?php if (has_custom_logo()) : ?>
            <?php if (floor((count($navigation) - 1) / 2) == $index) : ?>
                <li class="hidden md:inline-block">
                    <div class="w-32">
                        <?= get_custom_logo() ?>
                    </div>
                </li>
            <?php endif ?>
        <?php endif ?>

        <?php endforeach ?>
    </ul>
</nav>
