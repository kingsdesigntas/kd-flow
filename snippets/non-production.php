<?php 
function kd_is_production() {
return ((defined('WP_ENV') && WP_ENV === 'production'));
}

if (!kd_is_production() && !is_admin()) {
add_action('pre_option_blog_public', '__return_zero');
}

add_action('admin_footer', function() {
if(kd_is_production()) return;
?>
<script>
(function() {
    var storageKey = 'non-production-notice_+<?php echo base64_encode(home_url()); ?>';
    var bannerDismissTime = localStorage.getItem(storageKey);

    // Dismiss for 24 hours
    if (bannerDismissTime && new Date().getTime() - bannerDismissTime < 1000 * 60 * 60 * 24) return;

    var noticeEl = document.createElement('div');
    noticeEl.innerHTML = '<p>Development/Staging site. This site is NOT being indexed by Google.</p>';
    noticeEl.classList.add('non-production-notice');

    var dismissButton = document.createElement('button');
    dismissButton.innerHTML = 'x';
    dismissButton.classList.add('dismiss-button');

    noticeEl.appendChild(dismissButton);

    document.body.appendChild(noticeEl);


    dismissButton.addEventListener('click', dismissNotice);

    function dismissNotice() {
        localStorage.setItem(storageKey, new Date().getTime());
        noticeEl.remove();
    }
})();
</script>
<style>
#wpbody {
    padding-bottom: 36px;
}

.non-production-notice {
    position: fixed;
    left: 160px;
    bottom: 0;
    right: 0;
    background: #E53E3E;
    color: #fff;
    border: 1px solid #C53030;
    border-left-width: 4px;
    padding: 1px 12px;
    z-index: 100000;
    display: flex;
    align-items: center;
    padding-right: 50px;
}

.non-production-notice p {
    font-size: 13px;
    margin: 0.5em 0;
}

.non-production-notice .dismiss-button {
    position: absolute;
    right: 1rem;
    top: 50%;
    transform: translateY(-50%);
    border: 1px solid #742A2A;
    font-size: 1rem;
    width: 20px;
    height: 20px;
    background: #C53030;
    padding: 0;
    text-align: center;
    display: flex;
    align-items: center;
    justify-content: center;
    display: block;
    color: #fff;
    cursor: pointer;
}
</style>
<?php
},1000);