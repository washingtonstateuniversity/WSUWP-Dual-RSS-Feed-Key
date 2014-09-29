# WSU Dual RSS Feed Key

In some cases, it's necessary to provide a summary of each post in your primary RSS feed while still syndicating
your content with full text to various parties. Dual RSS Feed Key allows you to enter a secret key to use with
your RSS feed to display a full text version of a site's feed to those who have the key.

## Installation

1. Upload `plugin-name.php` to the `/wp-content/plugins/` directory or install it through the dashboard.
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Enter a secret key in Settings -> Reading.
1. Visit the new feed URL at `http://example.org/feed/?dual_rss_feed_key=yoursecretkey`

## Configuration and Use

Dual RSS Feed Key is most useful when a WordPress site is configured to display a feed consisting of summaries rather than the full text of each article. This option is configured under '''Settings -> Reading''' in WordPress.

![](https://github.com/github/washingtonstateuniversity/wsuwp-dual-rss-feed-key/blob/master/repo-assets/screenshot-001.png)

Once Dual RSS Feed Key is installed, an option is available to create a second, full text feed with the addition of a secret key.

![](https://github.com/github/washingtonstateuniversity/wsuwp-dual-rss-feed-key/blob/master/repo-assets/screenshot-002.png)

Create a secret key of your choosing and type it in the available input box. Once saved, a full text feed will be available for anyone that is given the address with this secret key.

For example, if a WordPress site was at `http://example.newspaper.com` and had a summary RSS feed provided by WordPress at `http://example.newspaper.com/feed/`, and I add a secret key of `my-secret-key-abc-123`, a second RSS feed will now be available at `http://example.newspaper.com/feed/?dual_rss_feed_key=my-secret-key-abc-123`.

Visitors to the newspaper site would continue to see summary text when subscribed to the feed. Systems that connected to the secret key feed would receive full text.