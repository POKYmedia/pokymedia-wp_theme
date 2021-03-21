<?php
$jumbotron_enabled = isset($args['jumbotron']) && ($args['jumbotron'] == true)
?>
<header class="relative w-full <?= $jumbotron_enabled ? 'h-full' : '' ?>">

    <?php if ($jumbotron_enabled): ?>

        <?php get_template_part('partials/jumbotron') ?>

        <div class="absolute top-0 w-full text-white">
            <?php get_template_part('partials/navigation') ?>
        </div>

    <?php else: ?>
        <?php get_template_part('partials/navigation') ?>
    <?php endif; ?>
</header>
