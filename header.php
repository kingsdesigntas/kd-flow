<!DOCTYPE html>
<html <?php language_attributes();?>>

<head>
    <link rel="profile" href="https://gmpg.org/xfn/11" />
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/style.css" />
    <!-- <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/sal.css" /> -->
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type');?>; charset=<?php bloginfo('charset');?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo wp_get_document_title(); ?></title>
    <?php wp_head();?>
</head>

<body <?php body_class();?>>
    <div id="curtain-menu">
        <div class="curtain-button-placer">
            <button id="close-curtain-button" class="curtain-menu-button" aria-label="close navigation menu"
                onclick="closeCurtain()">
                <svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round"
                    stroke-linejoin="round" height="1.5rem" xmlns="http://www.w3.org/2000/svg">
                    <line x1="18" y1="6" x2="6" y2="18"></line>
                    <line x1="6" y1="6" x2="18" y2="18"></line>
                </svg>
            </button>
        </div>
        <div id="curtain-menu-container">
            <nav>
                <?php if (has_nav_menu('primary_navigation')) {
    echo wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']);
}?>
            </nav>
        </div>
    </div>
    <header class="theme-header">
        <div class="header-content">
            <a aria-label="brand logo" href="<?php echo home_url() ?>" class="brand">
                <svg xmlns="http://www.w3.org/2000/svg" height="2rem" viewBox="0 0 100 80" fill="currentColor">
                    <path
                        d="M0 0v20h71.6c1-1.6 2.1-3.1 3.4-4.6A62.6 62.6 0 01100 0zM0 30v20h57.5l1.6-3.3c2.5-5.4 4.6-11.2 7-16.7zM0 60v20h37.3c5.1-6.5 10.1-13 14.5-20z" />
                </svg>

                <span>flow</span>
            </a>
            <div class="navigation-items">
                <nav class="desktop-nav">
                    <?php if (has_nav_menu('primary_navigation')) {
    echo wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']);
}?>
                </nav>
                <button id="open-curtain-button" aria-label="open navigation menu" class="btn curtain-menu-button"
                    onclick="openCurtain()">
                    <svg fill="currentColor" height="1.5rem" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
                        <g>
                            <rect x="6" y="22" width="36" height="4"></rect>
                            <rect x="6" y="10" width="36" height="4"></rect>
                            <rect x="6" y="34" width="36" height="4"></rect>
                        </g>
                    </svg>
                </button>
            </div>
        </div>
    </header>
    <div id="page">