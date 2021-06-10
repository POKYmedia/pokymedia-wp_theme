<?php
$jumbotron_enabled = isset($args['jumbotron']) && ($args['jumbotron'] == true)
?>
<header class="relative w-full <?= $jumbotron_enabled ? 'h-144 md:h-full' : '' ?>">

    <?php if ($jumbotron_enabled): ?>

        <?php get_template_part('partials/jumbotron', null, $args) ?>

        <div class="absolute top-0 w-full text-white">
            <?php get_template_part('partials/navigation') ?>
        </div>

    <?php else: ?>
        <?php get_template_part('partials/navigation', null, ['dark' => true]) ?>
    <?php endif; ?>
</header>
