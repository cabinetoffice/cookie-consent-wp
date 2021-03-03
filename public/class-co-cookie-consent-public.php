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
	 * @since    2.0.0
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
		$preference_link = esc_attr( $display_options['preference_link'] );
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
	 * Add a class to the body tag when banner displays
	 *
	 * @since    1.0.3
	 */
	public function my_body_classes( $classes ) {
		$cookie_name = 'cookie_policy';
		if(!isset($_COOKIE[$cookie_name])) {
			$classes[] = 'co-cookie-consent';
		}
		 
		return $classes;
		 
	}
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

	public function prefix_register_resources() {
		//wp_register_script("prefix-script", 'js/co-cookie-consent-public-preferences.js', array(), false, true);
		wp_register_script("prefix-script", plugins_url("js/co-cookie-consent-public-preferences.js", __FILE__), array(), false, true);
	}

	public function cookie_preferences( ) {

		ob_start();
    	include 'partials/co-cookie-consent-public-display.php';
		wp_enqueue_script("prefix-script");
    	return ob_get_clean();

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

		ob_start();
    	include 'partials/co-cookie-consent-public-confirm.php';
    	return ob_get_clean();

	} //
}