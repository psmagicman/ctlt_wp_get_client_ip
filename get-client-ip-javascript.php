<script>
    jQuery(document).ready(function() {
        jQuery('.ip-class').each(function() {
            jQuery(this).replaceWith('<?php echo $_SERVER['REMOTE_ADDR']; ?>');
        });
    });
</script>