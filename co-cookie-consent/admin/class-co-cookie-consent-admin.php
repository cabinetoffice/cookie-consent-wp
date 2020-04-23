<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://www.affinity-digital.com
 * @since      1.0.0
 *
 * @package    Co_Cookie_Consent
 * @subpackage Co_Cookie_Consent/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Co_Cookie_Consent
 * @subpackage Co_Cookie_Consent/admin
 * @author     Mark Hudson <mark.hudson@affinity-digital.com>
 */
class Co_Cookie_Consent_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		$this->load_dependencies();
	}
	private function load_dependencies() {
		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */

		require_once plugin_dir_path( dirname( __FILE__ ) ) .  'admin/class-co-cookie-consent-admin-settings.php';
	}



	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/co-cookie-consent-admin.css', array(), $this->version, 'all' );
	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/co-cookie-consent-admin.js', array( 'jquery' ), $this->version, false );
	}

	/**
	 * Creates a new custom post type
	 *
	 * @since 1.0.0
	 * @access public
	 * @uses register_post_type()
	 */
	public static function new_cpt_cookie_notice() {
		$args = array();
		register_post_type( 'cookie_notice', $args ); 
	} // new_cpt()
}
