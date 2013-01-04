jQuery(document).ready(function() {
    // Get each instance of the shortcode, and replace it with the user's ip address.
    jQuery('.ip-shortcode').each(function() {
        jQuery(this).replaceWith(ipaddr);
        //ipaddr is defined in the get-client-ip-shortcode.php, using the wp_localize_script() function.
    });
});
