<?php
/**
 * Blue Blaze Disable Login Customizer Widgets
 *
 * @author  Blue Blaze Associates
 * @license GPL-2.0+
 * @link    https://github.com/blueblazeassociates/blueblaze-disable-login-customizer-dashboard-widgets
 */

/*
 * Plugin Name:       Blue Blaze Disable Login Customizer Widgets
 * Plugin URI:        https://github.com/blueblazeassociates/blueblaze-disable-login-customizer-dashboard-widgets
 * Description:       Disables dashboard widgets from the Login Customizer plugin.
 * Version:           1.0.0
 * Author:            Blue Blaze Associates
 * Author URI:        http://www.blueblazeassociates.com
 * License:           GPL v2 or later
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.html
 * GitHub Plugin URI: https://github.com/blueblazeassociates/blueblaze-disable-login-customizer-dashboard-widgets
 * GitHub Branch:     master
 * Requires WP:       4.7
 * Requires PHP:      7.0
 */

/**
 * Removes the 'themeisle' and 'logincust_subscribe_widget' meta boxes from the WordPress dashboard.
 *
 * @since 1.0.0
 */
function blueblaze__disable_login_customizer_dashboard_widgets() {
  remove_meta_box( 'themeisle', 'dashboard', 'side' );
  remove_meta_box( 'logincust_subscribe_widget', 'dashboard','side' );
}
add_action( 'wp_dashboard_setup', 'blueblaze__disable_login_customizer_dashboard_widgets' );

/*
 * Override the themeisle_dashboard_widget() function.
 *
 * This will prevent login_customizer from loading the RSS feed into the database.
 */
if (!function_exists('themeisle_dashboard_widget')) {
  /**
   * @return null
   */
  function themeisle_dashboard_widget() {
    return null;
  }
}
