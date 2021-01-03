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
                class="block w-full md:flex items-center justify-center uppercase md:container mx-0 md:mx-auto shadow-inner-xl-top md:shadow-inner-none py-6 md:p-0 text-center md:text-left hidden"
        >
            <li class="md:mr-12 lg:mr-20">
                <a href="javascript:void(0)" class="py-2 md:py-0 block md:hover:bg-white hover:text-normal">
                    <span class="border-accent"> O nás </span>
                </a>
            </li>
            <li class="md:mr-12 lg:mr-20">
                <a href="javascript:void(0)" class="py-2 md:py-0 block hover:text-normal">
                    <span class="border-accent"> Rande </span>
                </a>
            </li>
            <li class="md:mr-12 lg:mr-20 active">
                <a href="javascript:void(0)" class="py-2 md:py-0 block hover:text-normal">
                    <span class="border-accent">Svadobné</span>
                </a>
            </li>
            <li class="md:mr-12 lg:mr-20 hidden md:block">
                <div class="w-24">
                    <?php get_template_part('partials/logo') ?>
                </div>
            </li>
            <li class="md:mr-12 lg:mr-20">
                <a href="javascript:void(0)" class="py-2 md:py-0 block hover:text-normal">
                    <span class="border-accent">Rodinné</span>
                </a>
            </li>
            <li class="md:mr-12 lg:mr-20">
                <a href="javascript:void(0)" class="py-2 md:py-0 block hover:text-normal"
                >
                    <span class="border-accent"> Video</span>
                </a>
            </li>
            <li>
                <a href="javascript:void(0)" class="py-2 md:py-0 block hover:text-normal">
                    <span class="border-accent"> Kontakt </span>
                </a>
            </li>
        </ul>
    </nav>
</header>
