<?php
function my_init() {
        wp_deregister_script('jquery');
        wp_register_script('jquery', false);
}
add_action('init', 'my_init');