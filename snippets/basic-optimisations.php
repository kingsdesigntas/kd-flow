<?php
//-----------------
// Move jquery to the footer
//
add_action('wp_default_scripts', function ($scripts) {
    //Dont mess with the admin
    if (is_admin()) {
        return;
    }

    //Remove jquery migrate as a dependency of jquery
    if (!empty($scripts->registered['jquery'])) {
        $scripts->registered['jquery']->deps = array_diff($scripts->registered['jquery']->deps, array('jquery-migrate'));
    }

    //Move to footer
    $scripts->add_data('jquery', 'group', 1);
    $scripts->add_data('jquery-core', 'group', 1);
    $scripts->add_data('jquery-migrate', 'group', 1);
});
//
//=================

//-----------------
// Use modern jQuery
//
add_action('wp_default_scripts', function ($scripts) {
    if (is_admin()) {
        return;
    }

    if (!empty($scripts->registered['jquery'])) {
        $scripts->registered['jquery-core']->src = 'https://code.jquery.com/jquery-3.6.0.min.js';
        $scripts->registered['jquery']->deps = ['jquery-core']; //not sure about this line
    }
}, 99); //run at low priority
//
//=================

//-----------------