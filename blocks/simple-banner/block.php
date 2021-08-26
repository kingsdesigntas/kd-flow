<?php $image = block_value('image')?>

<div class="simple-banner-block first-block-negative-margin alignfull flow-space-lg <?php block_field('className');?>"
    style="--focus: <?php block_field('focal-point')?>;min-height: <?php block_field('minimum-height')?>">
    <?php echo wp_get_attachment_image($image, 'full'); ?>
</div>