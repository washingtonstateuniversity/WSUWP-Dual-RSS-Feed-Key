<?php
/*
Plugin Name: WSU Dual RSS Feed
Plugin URI: http://web.wsu.edu/wordpress/plugins/dual-rss-feed/
Description: Provide a "secret" full text RSS feed on sites with summary RSS feeds enabled.
Author: washingtonstateuniversity, jeremyfelt
Version: 0.0.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

class WSU_Dual_RSS_Feed {
	/**
	 * Set things up.
	 */
	public function __construct() {
		add_filter( 'pre_option_rss_use_excerpt', array( $this, 'override_excerpt' ) );
		add_action( 'admin_init', array( $this, 'admin_init' ) );
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

			$expected_key = get_option( 'wsu_drf_options', false );

			if ( isset( $expected_key['secret_key'] ) && $dual_rss_feed_key === $expected_key['secret_key'] ) {
				return 0;
			}
		}

		return false;
	}

	/**
	 * Register the setting used to hold the secret key.
	 */
	public function admin_init() {
		register_setting( 'reading', 'wsu_drf_options', array( $this, 'sanitize_key' ) );
		add_settings_field( 'wsu_drf_key', 'Dual RSS Secret Key', array( $this, 'secret_key_input' ), 'reading', 'default' );
	}

	/**
	 * Sanitize the value input for the Dual RSS Feed Secret Key.
	 *
	 * @param $input Array of inputs. In this case, we expect one key.
	 *
	 * @return array Inputs with modifications.
	 */
	public function sanitize_key( $input ) {
		if ( isset( $input['secret_key'] ) ) {
			$sanitized_input = array();
			$sanitized_input['secret_key'] = sanitize_key( $input['secret_key'] );
		} else {
			return array();
		}

		return $sanitized_input;
	}

	/**
	 * Provide a space to input the secret key on the Reading Options page.
	 */
	public function secret_key_input() {
		$wsu_drf_options = get_option( 'wsu_drf_options', false );

		if ( isset( $wsu_drf_options['secret_key'] ) ) {
			$dual_rss_feed_key = $wsu_drf_options['secret_key'];
		} else {
			$dual_rss_feed_key = '';
		}

		?>
		<input name="wsu_drf_options[secret_key]" id="wsu_drf_key" value="<?php echo esc_attr( $dual_rss_feed_key ); ?>" />
		<?php if ( '' === $dual_rss_feed_key ) : ?>
			<p class="description">Input a secret key here to attach to your RSS feed for a full text version. (e.g. <?php echo esc_url( home_url( '/feed/?dual_rss_feed_key=' ) ); ?>)</p>
		<?php else : ?>
			<p class="description">The full text RSS feed URL for your site is <?php echo esc_url( home_url( '/feed/?dual_rss_feed_key=' . $dual_rss_feed_key ) ); ?></p>
		<?php endif;
	}
}
new WSU_Dual_RSS_Feed();