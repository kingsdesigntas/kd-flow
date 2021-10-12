<?php
/**
 * Footer
 *
 *
 *
 */

?>
</div> <!-- #page ends -->
<footer class="theme-footer">

    <div class="footer-content">
        <div data-sal="slide-up" data-sal-duration="600" class="flow" style="--flow: 1rem">
            <p class="font-sm heading-font" style="font-weight:bold">About Us</p>
            <?php dynamic_sidebar('footer-col-one');?>
        </div>
        <div data-sal="slide-up" data-sal-duration="600" class="flow" style="--flow: 1rem">
            <p class="font-sm heading-font" style="font-weight:bold">Sitemap</p>
            <nav>
                <?php if (has_nav_menu('footer_one')) {
    echo wp_nav_menu(['theme_location' => 'footer_one', 'menu_class' => 'nav']);
}?>
            </nav>
        </div>
        <div data-sal="slide-up" data-sal-duration="600" class="flow" style="--flow: 1rem">
            <p class="font-sm heading-font" style="font-weight:bold">Contact Us</p>
            <?php dynamic_sidebar('footer-col-three');?>
        </div>
        <div data-sal="slide-up" data-sal-duration="600" class="flow" style="--flow: 1rem">
            <p class="font-sm heading-font" style="font-weight:bold">Information</p>

            <nav>
                <?php if (has_nav_menu('footer_two')) {
    echo wp_nav_menu(['theme_location' => 'footer_two', 'menu_class' => 'nav']);
}?>
            </nav>
        </div>
    </div>
</footer>
<script defer>
var curtain = document.querySelector('#curtain-menu');
var curtainContent = document.querySelector('#curtain-menu-container');
var openCurtainButton = document.querySelector('#open-curtain-button');
var closeCurtainButton = document.querySelector('#close-curtain-button');
var lastCurtainLink = document.querySelector('#menu-primary_navigation > li:last-child a:last-of-type');

closeCurtainButton.addEventListener("keydown", function(event) {
    setTimeout(() => {
        if (event.shiftKey && event.keyCode == 9) {
            lastCurtainLink.focus();
        }
    }, 110);
})

lastCurtainLink.addEventListener("keydown", function(event) {
    setTimeout(() => {
        if (!event.shiftKey && event.keyCode == 9) {
            closeCurtainButton.focus();
        }
    }, 10);
})

function handleCurtainKeydown(event) {
    if (event.key === "Escape") {
        closeCurtain();
        window.removeEventListener("keydown", handleCurtainKeydown);
    }
}

function openCurtain() {
    document.querySelector('html').style.overflow = 'hidden';
    window.addEventListener('keydown', handleCurtainKeydown);
    curtain.style.width = "100vw";
    curtain.style.visibility = "visible";
    setTimeout(() => {
        curtainContent.style.opacity = "1";
        closeCurtainButton.style.opacity = "1";
        closeCurtainButton.focus();
    }, 350);
}

function closeCurtain() {
    document.querySelector('html').style.overflow = 'auto';
    curtainContent.style.opacity = "0";
    closeCurtainButton.style.opacity = "0";
    setTimeout(() => {
        curtain.style.width = "0";
    }, 350);
    setTimeout(() => {

        curtain.style.visibility = "hidden";
        openCurtainButton.focus();
    }, 650);
}
</script>
<?php wp_footer();?>
</body>

</html>