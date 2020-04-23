<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://www.affinity-digital.com
 * @since      1.0.0
 *
 * @package    Co_Cookie_Consent
 * @subpackage Co_Cookie_Consent/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Co_Cookie_Consent
 * @subpackage Co_Cookie_Consent/includes
 * @author     Mark Hudson <mark.hudson@affinity-digital.com>
 */
class Co_Cookie_Consent_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'co-cookie-consent',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
