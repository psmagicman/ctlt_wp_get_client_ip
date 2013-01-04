ctlt_wp_get_client_ip
=====================
A simple wordpress plugin that adds a shortcode with the id [get_ip]. The shortcode will be replaced with the user's ID.
This plugin is designed to bypass the Wordpress Super Cache plugin (http://wordpress.org/extend/plugins/wp-super-cache/).
It uses javascript to replace the shortcode, ensuring that the IP is refreshed regardless of whether the page is cached or not.

Plugin Name: Get Client IP Shortcode

Plugin URI: https://github.com/psmagicman/ctlt_wp_get_client_ip/

Description: Get Client's IP - simple as that.

Version: 1.0

Author: Michael Ha, Devindra Payment, Julien Law

Author URI: http://ctlt.ubc.ca/


HOW TO USE:

1. Install and Activate the plugin in Wordpress' administrative dashboard. (http://codex.wordpress.org/Managing_Plugins#Installing_Plugins)

2. Use the [get_ip] shortcode in any of your pages or blog posts.

3. This will display any visitor's IP to them.
