jQuery(document).ready(function() {
    jQuery('.ip-shortcode').each(function() {
        var shortcode = jQuery(this);
        var data = {
            action: 'get_ip',
        };
        
        jQuery.post(ajaxurl, data, function(response) {
            shortcode.replaceWith(response);
        });
    });
});