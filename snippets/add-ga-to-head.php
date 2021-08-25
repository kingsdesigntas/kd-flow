<?php
function add_google_analytics() {
  ?>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-NUMBER"></script>
<script>
window.dataLayer = window.dataLayer || [];

function gtag() {
    dataLayer.push(arguments);
}
gtag("js", new Date());

gtag("config", "UA-NUMBER");
</script>
<?php
}
add_action('wp_head', 'add_google_analytics');