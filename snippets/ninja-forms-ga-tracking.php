<?php
add_action('wp_footer',function(){
  ?>
<script>
(function($) {
    $(document).on('nfFormSubmitResponse', function(e, data) {
        if (typeof data === "undefined" || typeof window.gtag === "undefined") return;
        //Do Stuff
        var formID = get(data, 'response.data.form_id', -1);
        var formTitle = get(data, 'response.data.settings.title', '');
        if (formID == -1) return;
        var formString = 'ID: ' + formID + (formTitle.length ? (' - ' + formTitle) : '')
        //ga('send', 'event', 'form', 'submit', formString);
        gtag('event', 'form', {
            event_category: 'form',
            event_action: 'Submit',
            event_label: formString
        });
        //fbq('track', 'Lead', {content_category: 'Form Submit', content_name: formString});
    });

    function get(object, path, defaultValue) {
        var result = object == null ? undefined : baseGet(object, path);
        return result === undefined ? defaultValue : result;
    }

    function baseGet(object, path) {
        var paths = path.split('.'),
            current = object,
            i;

        for (i = 0; i < paths.length; ++i) {
            if (current[paths[i]] == undefined) {
                return undefined;
            } else {
                current = current[paths[i]];
            }
        }
        return current;
    }
})(jQuery);
</script>
<?php
},100);