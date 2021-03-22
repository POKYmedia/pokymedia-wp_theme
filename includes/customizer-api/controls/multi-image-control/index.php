<?php

/**
 * Allows us to create multi-image control
 *
 * @author Tom Groot <https://wordpress.stackexchange.com/users/118863/tom-groot>
 */

if (!class_exists('WP_Customize_Image_Control')) {
    return null;
}

class Multi_Image_Custom_Control extends WP_Customize_Control
{

    public function enqueue()
    {
        wp_enqueue_style('multi-image-style', THEME_DIRECTORY_URI . '/includes/customizer-api/controls/multi-image-control/style.css');
        wp_enqueue_script('multi-image-script', THEME_DIRECTORY_URI . '/includes/customizer-api/controls/multi-image-control/script.js', array('jquery'), rand(), true);
    }

    public function render_content()
    { ?>
        <span class='customize-control-title'><?= $this->label ?></span>
        <span class="description customize-control-description">
            <?= $this->description ?>
        </span>
        <div>
            <ul id="multi-image-control" class="image-list"></ul>
        </div>
        <div class='actions'>
            <a class="button-secondary add-image"><?= __('Add image', 'pokymedia') ?></a>
        </div>

        <input class="wp-editor-area" id="images-input" type="hidden" <?php $this->link(); ?>>
        <?php
    }
}

?>
