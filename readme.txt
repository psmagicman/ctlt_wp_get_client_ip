=== Get Client IP Shortcode ===
Contributors: devindra, psmagicman, ctlt-dev, ubcdev
Donate link: 
Tags: plugin, shortcode, ip
Requires at least: 3.5
Tested up to: 3.5
Stable tag: 
License: GNU General Public License
License URI: http://www.gnu.org/licenses/gpl-3.0.html

Adds a simple shortcode that can be used to display a vistor's IP back to them.

== Description ==

Adds the [get_ip] shortcode to Wordpress. When this shortcode is used, anyone who visits the page will see their own IP address in place of the shortcode.

This plugin is designed to work with and bypass WP Super Cache. Normally the IP address would be cached and thus users would see the first IP address that was cached, instead of their own.

== Installation ==

1. Upload `ctlt_wp_get_client_ip` folder to the `/wp-content/plugins/` directory.
1. Activate the plugin through the 'Plugins' menu in WordPress.
1. Use the `[get_ip]` shortcode in your blog posts.

== Changelog ==

= 1.0 =
* Initial Release
