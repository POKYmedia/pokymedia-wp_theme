<?php
    $isDarkTheme = isset($args['dark']) && ($args['dark'] == true);

    // white logo is invisible on light background, use the dark variant there
    $darkLogoId = get_theme_mod('dark_logo');
    if ($isDarkTheme && $darkLogoId) {
        $logo = sprintf(
            '<a href="%s" class="custom-logo-link" rel="home">%s</a>',
            esc_url(home_url('/')),
            wp_get_attachment_image($darkLogoId, 'full', false, ['class' => 'custom-logo', 'alt' => get_bloginfo('name', 'display')])
        );
    } else {
        $logo = has_custom_logo() ? get_custom_logo() : '';
    }
?>

<nav class="navigation md:py-4 w-full">

    <!-- hamburger menu -->
    <div class="md:hidden py-2 flex items-center flex-wrap">

        <?php if ($logo) : ?>
            <div class="w-16 inline-block my-1 ml-3">
                <?= $logo ?>
            </div>
        <?php endif ?>

        <a
                id="navbarToggleBtn"
                href="javascript:void(0)"
                class="inline-block p-2 px-3 rounded-lg ml-auto mr-4 box-content border border-transparent <?= $isDarkTheme ? 'focus:border-gray-300 hover:bg-gray-200' : 'focus:border-white-transparent-70 hover:bg-white-transparent-70' ?>"
        >
            <i class="fas fa-bars text-3xl align-bottom <?= $isDarkTheme ? 'text-gray-900' : 'text-gray-200' ?>"></i>
        </a>
    </div>

    <!-- navigation -->
    <div
            id="navbarMenu"
            class="block w-full md:container md:flex items-center uppercase mx-0 md:mx-auto  py-6 md:py-0 text-center md:text-left hidden shadow-inner-xl-top md:shadow-inner-none"
    >
        <?php
        $navigation = wp_get_nav_menu_items('navigation');
        global $wp;
        $currentURL = trim(home_url($wp->request), '/');

        // two halves around the logo, so the logo stays centered even with an odd number of items
        $halves = $navigation ? array_chunk($navigation, (int) ceil(count($navigation) / 2)) : [];
        ?>

        <?php foreach ($halves as $halfIndex => $half) : ?>
            <ul class="md:flex-1 md:flex items-center md:justify-around">
                <?php foreach ($half as $navItem) :
                    $active_class = (trim($navItem->url, '/') == $currentURL) ? 'active' : '';
                    ?>
                    <li class="<?= $active_class ?>">
                        <a href="<?= $navItem->url ?>"
                           class="py-2 md:py-0 block mx-auto">
                            <span><?= $navItem->title ?></span>
                        </a>
                    </li>
                <?php endforeach ?>
            </ul>

            <?php if ($halfIndex == 0 && $logo) : ?>
                <!-- logo in the middle of the nav -->
                <div class="hidden md:block w-32 md:mx-8">
                    <?= $logo ?>
                </div>
            <?php endif ?>
        <?php endforeach ?>
    </div>
</nav>
