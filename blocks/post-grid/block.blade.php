<?php // The Query
$limit = block_value('limit');
$type = block_value('post-type');
$the_query = new WP_Query(array('post_type' => $type, 'posts_per_page' => $limit));
?>

<div class="post-grid-block alignwide flow-space-lg <?php block_field('className');?>">
    <?php
// The Loop
if ($the_query->have_posts()) {
    echo '<ul>';
    while ($the_query->have_posts()) {
        $the_query->the_post();
        ?><li class="post-grid-item flow" style="--flow:1.5rem">
        {!! echo wp_get_attachment_image(get_post_thumbnail_id(), 'medium') !!}
        <h3><a href="<?php echo get_the_permalink() ?>"><?php echo get_the_title() ?></a></h3>
        <p><time><?php echo get_the_date() ?></time></p>
        <p><?php echo get_the_excerpt() ?></p>
    </li> <?php
}
    echo '</ul>';
} else {
    // no posts found
}
/* Restore original Post Data */
wp_reset_postdata();?>
</div>