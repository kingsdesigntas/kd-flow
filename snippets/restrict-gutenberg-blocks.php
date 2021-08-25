<?php
add_filter( 'allowed_block_types', 'gutenberg_allowed_block_types' );
 
function gutenberg_allowed_block_types( $allowed_blocks ) {
 
	return array(
		'core/image',
		'core/paragraph',
		'core/heading',
		'core/list',
		'core/embed',
		'core/separator',
		'core/html',
		'core/shortcode',
		'genesis-custom-blocks/auto-grid',
		'genesis-custom-blocks/banner-block',
		'genesis-custom-blocks/feature-text',
		'genesis-custom-blocks/inner-content-section',
		'genesis-custom-blocks/post-grid',
		'genesis-custom-blocks/user-card',
	);
}