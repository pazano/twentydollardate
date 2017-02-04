<?php
/**
 * Plugin Name: Social Warfare - Pro
 * Plugin URI:  http://warfareplugins.com
 * Description: A plugin to maximize social shares and drive more traffic using the fastest and most intelligent share buttons on the market, calls to action via in-post click-to-tweets, popular posts widgets based on share popularity, link-shortening, Google Analytics and much, much more!
 * Version:     2.2.1
 * Author:      Warfare Plugins
 * Author URI:  http://warfareplugins.com
 * Text Domain: social-warfare
 */

defined( 'WPINC' ) || die;

/**
 * Define plugin constants for use throughout the plugin (Version and Directories)
 */
define( 'SWPP_VERSION', '2.2.1' );
define( 'SWPP_PLUGIN_FILE', __FILE__ );
define( 'SWPP_PLUGIN_URL', untrailingslashit( plugin_dir_url( __FILE__ ) ) );
define( 'SWPP_PLUGIN_DIR', dirname( __FILE__ ) );

add_action( 'plugins_loaded' , 'swpp_initiate_plugin' , 10 );
function swpp_initiate_plugin() {
    if(defined('SWP_VERSION') && SWP_VERSION === SWPP_VERSION):
        /**
         * Include the necessary files
         */
        require_once SWPP_PLUGIN_DIR . '/functions/meta-box/meta-box.php';
        require_once SWPP_PLUGIN_DIR . '/functions/utility.php';
        require_once SWPP_PLUGIN_DIR . '/functions/registration.php';
        require_once SWPP_PLUGIN_DIR . '/functions/post-options.php';
        require_once SWPP_PLUGIN_DIR . '/functions/header-meta-tags.php';
        require_once SWPP_PLUGIN_DIR . '/functions/scripts.php';
        require_once SWPP_PLUGIN_DIR . '/functions/options-array.php';

        /**
         * Include the networks files
         * 
         */
        require_once SWPP_PLUGIN_DIR . '/functions/social-networks/tumblr.php';
        require_once SWPP_PLUGIN_DIR . '/functions/social-networks/reddit.php';
        require_once SWPP_PLUGIN_DIR . '/functions/social-networks/yummly.php';
        require_once SWPP_PLUGIN_DIR . '/functions/social-networks/email.php';
        require_once SWPP_PLUGIN_DIR . '/functions/social-networks/whatsapp.php';
        require_once SWPP_PLUGIN_DIR . '/functions/social-networks/pocket.php';
        require_once SWPP_PLUGIN_DIR . '/functions/social-networks/buffer.php';
        require_once SWPP_PLUGIN_DIR . '/functions/social-networks/hackernews.php';
        require_once SWPP_PLUGIN_DIR . '/functions/social-networks/flipboard.php';

    endif;
}

/**
 * A class for checking for plugin updates
 *
 */
require_once SWPP_PLUGIN_DIR . '/functions/update-checker/plugin-update-checker.php';
$swpp_github_checker = PucFactory::getLatestClassVersion('PucGitHubChecker');
$swpp_update_checker = new $swpp_github_checker(
    'https://github.com/warfare-plugins/social-warfare-pro/',
    __FILE__,
    'master'
);

/**
 * Coming soon
 */
// require_once SWP_PLUGIN_DIR . '/functions/media-options.php';
