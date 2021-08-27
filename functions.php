<?php
wp_enqueue_script('jquery');

// Gutenberg custom stylesheet
add_theme_support('editor-styles');
add_editor_style('style.css');
add_editor_style('editor-style.css');

// Disable woocommerce stylesheets
add_filter('woocommerce_enqueue_styles', '__return_empty_array');

/**
 * Theme setup
 */
add_action('after_setup_theme', function () {
/**
 * Register navigation menus
 * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
 */
    register_nav_menus([
        'primary_navigation' => __('Primary Navigation'),
        'footer_one' => __('Footer Navigation One'),
        'footer_two' => __('Footer Navigation Two'),
    ]);
    /**
     * Display a nav menu with navwalker
     */
    function display_menu($slug, $args = [])
    {
        $args = array_merge(
            array(
                'theme_location' => $slug, // eg 'primary_navigation'
                'menu_class' => 'nav',
                'walker' => new \App\wp_bootstrap4_navwalker(),
            ), $args);
        return wp_nav_menu($args);
    }

    /**
     * Enable post thumbnails
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support('post-thumbnails');

    /**
     * Enable HTML5 markup support
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#html5
     */
    add_theme_support('html5', ['caption', 'comment-form', 'comment-list', 'gallery', 'search-form']);

    /**
     * Enable selective refresh for widgets in customizer
     * @link https://developer.wordpress.org/themes/advanced-topics/customizer-api/#theme-support-in-sidebars
     */
    add_theme_support('customize-selective-refresh-widgets');

/**
 * Add custom logo support
 */
    add_theme_support('custom-logo');

    /**
     * Add alignwide/alignfull support
     */
    add_theme_support('align-wide');

    /**
     * Add woocoommerce support
     */
    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');

/**
 * Add image size
 */
//   add_image_size('gallery_thumb', 300, 300, true);
}, 20);

/**
 * Register sidebars
 */
add_action('widgets_init', function () {
    $config = [
        'before_widget' => '<div class="widget %1$s %2$s">',
        'after_widget' => '</div>',
    ];
    register_sidebar([
        'name' => __('Footer Column One'),
        'id' => 'footer-col-one',
    ] + $config);

});

add_action('widgets_init', function () {
    $config = [
        'before_widget' => '<div class="widget %1$s %2$s">',
        'after_widget' => '</div>',
    ];
    register_sidebar([
        'name' => __('Footer Column Three'),
        'id' => 'footer-col-three',
    ] + $config);

});

/**
 * Register ACF Blocks
 */

add_action('acf/init', 'my_acf_init_block_types');
function my_acf_init_block_types()
{

    // Check function exists.
    if (function_exists('acf_register_block_type')) {

        // register a testimonial block.
        acf_register_block_type(array(
            'name' => 'block-test',
            'title' => __('Block Test'),
            'description' => __('A test block.'),
            'render_template' => 'template-parts/blocks/test-block/test-block.php',
            'category' => 'formatting',
            'icon' => 'admin-comments',
            'keywords' => array('testimonial', 'quote'),
        ));
    }
}

add_post_type_support('page', 'excerpt');

// Filter except length to 35 words.
// tn custom excerpt length
function tn_custom_excerpt_length($length)
{
    return 25;
}
add_filter('excerpt_length', 'tn_custom_excerpt_length', 999);