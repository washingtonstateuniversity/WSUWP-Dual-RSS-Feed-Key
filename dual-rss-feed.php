<?php
/*
Plugin Name: WSU Dual RSS Feed
Plugin URI: http://web.wsu.edu/wordpress/plugins/dual-rss-feed/
Description: Provide a "secret" full text RSS feed on sites with summary RSS feeds enabled.
Author: washingtonstateuniversity, jeremyfelt
Version: 0.0.1
*/

class WSU_Dual_RSS_Feed {
	/**
	 * Set things up.
	 */
	public function __construct() {
		add_filter( 'pre_option_rss_use_excerpt', array( $this, 'override_excerpt' ) );
	}

	/**
	 * Determine if we are overriding the default RSS setting based on the existence of
	 * a secret key and provide the option value if so.
	 *
	 * @return int|bool 0 if we are overriding the default setting. False to allow default setting.
	 */
	public function override_excerpt() {
		if ( is_feed() && isset( $_GET['dual_rss_feed_key'] ) ) {
			$dual_rss_feed_key = sanitize_key( $_GET['dual_rss_feed_key'] );

			$expected_key = get_option( 'dual_rss_feed_key', false );

			if ( $dual_rss_feed_key === $expected_key ) {
				return 0;
			}
		}

		return false;
	}
}
new WSU_Dual_RSS_Feed();