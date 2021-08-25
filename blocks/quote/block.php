<?php
$quote = block_value('quote');
$source = block_value('source');
?>
<div class="quote-block flow flow-space-lg <?php block_field('className');?>" style="--flow: 1.5rem">
    <figure class="flow" style="--flow: 1rem;">
        <blockquote data-sal="slide-up" data-sal-duration="600">
            <p><?php echo $quote ?></p>
        </blockquote>
        <?php if ($source): ?>
        <figcaption data-sal="slide-up" data-sal-duration="600">- <?php echo $source ?></figcaption>
        <?php endif;?>
    </figure>
</div>