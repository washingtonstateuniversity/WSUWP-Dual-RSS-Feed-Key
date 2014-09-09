=== Dual RSS Feed Key ===
Contributors: jeremyfelt
Donate link: http://web.wsu.edu
Tags: rss, feed
Requires at least: 4.0.0
Tested up to: 4.0.0
Stable tag: 0.0.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Provide a "secret" full text RSS feed on WordPress sites with summary RSS feeds enabled.

== Description ==

In some cases, it's necessary to provide a summary of each post in your primary RSS feed while still syndicating
your content with full text to various parties. Dual RSS Feed Key allows you to enter a secret key to use with
your RSS feed to display a full text version of a site's feed to those who have the key.

== Installation ==

1. Upload `plugin-name.php` to the `/wp-content/plugins/` directory or install it through the dashboard.
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Enter a secret key in Settings -> Reading.
1. Visit the new feed URL at `http://example.org/feed/?dual_rss_feed_key=yoursecretkey`

== Frequently Asked Questions ==

= Where do I enter my secret key? =

* Under Settings -> Reading.

== Changelog ==

= 0.0.1 =

* Howdy.