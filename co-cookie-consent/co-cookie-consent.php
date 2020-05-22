<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.affinity-digital.com
 * @since             1.0.1
 * @package           Co_Cookie_Consent
 *
 * @wordpress-plugin
 * Plugin Name:       Cabinet Office Cookie Consent
 * Plugin URI:        https://www.affinity-digital.com
 * Description:       Cabinet Office Cookie Consent Plugin
 * Version:           1.0.0
 * Author:            Affinity Digital
 * Author URI:        https://www.affinity-digital.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       co-cookie-consent
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'CO_COOKIE_CONSENT_VERSION', '1.0.1' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-co-cookie-consent-activator.php
 */
function activate_co_cookie_consent() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-co-cookie-consent-activator.php';
	Co_Cookie_Consent_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-co-cookie-consent-deactivator.php
 */
function deactivate_co_cookie_consent() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-co-cookie-consent-deactivator.php';
	Co_Cookie_Consent_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_co_cookie_consent' );
register_deactivation_hook( __FILE__, 'deactivate_co_cookie_consent' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-co-cookie-consent.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_co_cookie_consent() {

	$plugin = new Co_Cookie_Consent();
	$plugin->run();

}
run_co_cookie_consent();
