<?php 
function squarecandy_menu_admin_limit_depth( $hook ) {
  if ( 'nav-menus.php' !== $hook ) {
    return;
  }

  wp_enqueue_script( 'squarecandy-admin-menu-depth', get_stylesheet_directory_uri() . '/scripts/admin-menu-depth.js', array(), '1.0.0', true );
}
add_action( 'admin_enqueue_scripts', 'squarecandy_menu_admin_limit_depth' );