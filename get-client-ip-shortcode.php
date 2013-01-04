<?php
/**
 * @package Get Client IP Shortcode
 */
/*
Plugin Name: Get Client IP Shortcode
Plugin URI: http://ctlt.ubc.ca/
Description: Get Client's IP - simple as that.
Version: 1.0
Author: Michael Ha
Author URI: http://ctlt.ubc.ca/
*/

/*function get_ip_func() {
  return $_SERVER['REMOTE_ADDR'];
}

add_shortcode('get_ip','get_ip_func');*/

class Ip_Get {
	static $add_script;
	
	static function init($wordpress = false) {
		add_shortcode('get_ip', array(__CLASS__, 'get_address'));
		add_action('init', array(__CLASS__, 'register_script'));
		add_action('wp_footer', array(__CLASS__, 'print_script'));
	}
	
	static function get_address() {
		self::$add_script = true;
		
		return '<span class="ip-class"></span>';
	}
	
	static function register_script() {
		wp_register_script('get-client-ip-javascript', plugins_url('get-client-ip-javascript.js', __FILE__), array('jquery'), '1.0', true);
	}
	
	static function print_script() {
		if(!self::$add_script)
			return;
			
		wp_enqueue_script('get-client-ip-javascript');
		wp_localize_script('get-client-ip-javascript', 'ipaddr', $_SERVER['REMOTE_ADDR']);
	}
}

Ip_Get::init(true);
?>
