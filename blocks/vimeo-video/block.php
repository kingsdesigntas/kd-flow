<?php
$video = block_value('video');
$title = block_value('title');
$aspect = block_value('aspect-ratio');
?>
<div data-sal="slide-up" data-sal-duration="600" class="vimeo-block <?php block_field('className');?>">
    <iframe title="<?php echo $title ?>" style="aspect-ratio:<?php echo $aspect ?>"
        src="https://player.vimeo.com/video/<?php echo $video ?>" frameborder="0" allow="fullscreen; picture-in-picture"
        allowfullscreen>
    </iframe>
</div>