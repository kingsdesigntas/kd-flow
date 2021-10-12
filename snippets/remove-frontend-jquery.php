<?php
function my_init() {
        wp_deregister_script('jquery');
        wp_register_script('jquery', false);
}
add_action('init', 'my_init'); {
        var pdf = jQuery(this).attr('href');
        gtag('event', 'download', {
            event_category: 'download',
            event_action: 'pdf',
            event_label: pdf
        });
    });
    jQuery('a[href^="mailto:"]').click(function() {
        var mailto = jQuery(this).attr('href');
        gtag('event', 'contact', {
            event_category: 'contact',
            event_action: 'mailto',
            event_label: mailto
        });
    });
    jQuery('a[href^="tel:"]').click(function() {
        var ctc = jQuery(this).attr('href');
        gtag('event', 'contact', {
            event_category: 'contact',
            event_action: 'click-to-call',
            event_label: ctc
        });
    });
});
</script>
<?php
},90);