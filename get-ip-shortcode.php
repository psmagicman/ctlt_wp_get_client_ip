<?php
/**
 * @package Get Client IP Shortcode
 *
 * Plugin Name: Get Client IP Shortcode
 * Plugin URI: https://github.com/psmagicman/ctlt_wp_get_client_ip
 * Description: Get Client's IP - simple as that.
 * Version: 1.0
 * Author: Michael Ha, Devindra Payment, Julien Law, CTLT
 * Author URI: http://ctlt.ubc.ca/
 */
/* 
 * Copyright 2013 Michael Ha, Devindra Payment, Julien Law (email : michael.ha@ubc.ca)
 * 
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License, version 2, as 
 * published by the Free Software Foundation.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

class IP_Shortcode {
    static $add_script;
    
    /**
     * Initializes the class, and begins the process of replacing the shortcodes.
     */
    static function init() {
        // create the handle tag for the wordpress shortcode
        add_shortcode( 'get_ip', array(__CLASS__, 'get_address') );
        
        // Add these functions to register and print the javascript.
        add_action( 'init', array(__CLASS__, 'register_script') );
        add_action( 'wp_footer', array(__CLASS__, 'print_script') );
        
        // Add this function for Ajax.
        add_action( 'wp_ajax_get_ip', array(__CLASS__, 'get_ip_ajax' ));
    }
    
    /**
     * Get the client's IP address.
     * Or, if WP Super Cache is active, then return a .ip-shortcode element, and set the add_script flag.
     * The .ip-shortcode element will later be replaced via javascript.
     */
    static function get_address() {
        //if (is_plugin_active('wp-super-cache/wp-cache.php')) {
            // Confirms that the shortcode is being used, and thus the javascript file needs to be added.
            self::$add_script = true;
            
            // Javascript will replace the span tags with the client ip address.
            return '<span class="ip-shortcode"></span>';
        /*} else {
            // Return the client's IP address.
            return $_SERVER['REMOTE_ADDR'];
        }*/
    }
    
    /**
     * Register handles for any scripts used by this class.
     * The handles are then used to reference the script, later in the code.
     */
    static function register_script() {
        wp_register_script('get-ip-javascript', plugins_url('get-ip-javascript.js', __FILE__), array('jquery'), '1.0', true);
    }
    
    /**
     * If the add_script flag has been set, then print any scripts used by this class onto the page.
     */
    static function print_script() {
        if ( !self::$add_script ) {
            // If the add_script flag has not been set - in get_address() - then don't add the scripts.
            return;
        }
        
        // Adds this javascript file to the page.
        wp_enqueue_script( 'get-ip-javascript' );
        wp_localize_script( 'get-ip-javascript', 'get_ip_ajaxurl', admin_url('admin-ajax.php') );
    }

    static function get_ip_ajax() {
        header("Pragma: no-cache");
        header("Cache-Control: no-cache, must-revalidate");
        header("Expires: Thu, 01 Jan 1970 00:00:00 GMT");
        header("Content-type: text/plain");
        echo $_SERVER['REMOTE_ADDR'];
        die();
    }
}

// Initialize and start the IP shortcode replacement.
IP_Shortcode::init(true);