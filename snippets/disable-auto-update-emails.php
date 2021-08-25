<?php
//Disable plugin auto-update email notification
add_filter('auto_plugin_update_send_email', '__return_false');
 
//Disable theme auto-update email notification
add_filter('auto_theme_update_send_email', '__return_false');