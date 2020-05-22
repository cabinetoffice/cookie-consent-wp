<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://www.affinity-digital.com
 * @since      1.0.1
 *
 * @package    Co_Cookie_Consent
 * @subpackage Co_Cookie_Consent/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Co_Cookie_Consent
 * @subpackage Co_Cookie_Consent/public
 * @author     Mark Hudson <mark.hudson@affinity-digital.com>
 */
class Co_Cookie_Consent_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.1
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.1
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Co_Cookie_Consent_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Co_Cookie_Consent_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/co-cookie-consent-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Co_Cookie_Consent_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Co_Cookie_Consent_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/co-cookie-consent-public.js', array( 'jquery' ), $this->version, false, true );

	}
	/**
	 * Add Javascript to header
	 *
	 */
	public function addcookiescript() {
		$options = get_option('co_cookie_consent_display_options');
		$google_tag_id = esc_html( $options['google_tag_id'] );
		include 'partials/co-cookie-consent-public-additional.php';
	} // 

	/**
	 * Set the javascript to run
	 *
	 */
	public function initiatecookiescript() {
		echo '<script type="text/javascript">setupCookieChoices();</script>';
	} // 

	/**
	* Registers all shortcodes at once
	*
	* @return [type] [description]
	*/
	public function register_shortcodes() {
		add_shortcode( 'cookiepreferences', array( $this, 'cookie_preferences' ) );
		add_shortcode( 'cookiepreferencesconfirm', array( $this, 'cookie_preferences_confirm' ) );
	} // register_shortcodes()

	/**
	* Processes shortcode cookiepreferences
	*
	* @param array $atts The attributes from the shortcode
	*
	*
	* @return mixed $output Output of the buffer
	*/

	public function cookie_preferences( ) {

		include 'partials/co-cookie-consent-public-display.php';
		$more_js ='<script type="text/javascript">
		function setupPrefRadio(name, optedIn) {
		  let radioButton = document.getElementById(name + (optedIn ? "-on" : "-off"));
		  radioButton.checked = true;
		}
		
		function getPrefRadio(name) {
		  return document.querySelector(\'input[name="\' + name + \'"]:checked\').value === "on";
		}
		
		let policy = retrieveCookiePolicy();
		//setupPrefRadio("cookie-settings", policy.settings);
		setupPrefRadio("cookie-website", policy.usage);
		//setupPrefRadio("cookie-comms", policy.campaigns);
		
		let btnSave = document.getElementById("btn-save");
		btnSave.onclick = function() {
		  storeCookiePolicy(
			true,
			//getPrefRadio("cookie-settings"),
			getPrefRadio("cookie-website"),
			//getPrefRadio("cookie-comms")
			);
		  document.getElementById("save_confirm").style.display = "block";
		  document.getElementById("global-cookie-message").style.display = "none";
		  document.getElementById("global-cookie-confirm").style.display = "none";
		  window.scrollTo(0,0);
		};</script>';
		echo $more_js;

	} //
	/**
	* Processes shortcode cookiepreferencesconfirm
	*
	* @param array $atts The attributes from the shortcode
	*
	*
	* @return mixed $output Output of the buffer
	*/

	public function cookie_preferences_confirm( ) {

		include 'partials/co-cookie-consent-public-confirm.php';

	} //
}