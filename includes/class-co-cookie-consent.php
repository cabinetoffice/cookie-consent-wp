<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://www.affinity-digital.com
 * @since      1.0.0
 *
 * @package    Co_Cookie_Consent
 * @subpackage Co_Cookie_Consent/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Co_Cookie_Consent
 * @subpackage Co_Cookie_Consent/includes
 * @author     Mark Hudson <mark.hudson@affinity-digital.com>
 */
class Co_Cookie_Consent {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Co_Cookie_Consent_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    2.0.1
	 */
	public function __construct() {
		if ( defined( 'CO_COOKIE_CONSENT_VERSION' ) ) {
			$this->version = CO_COOKIE_CONSENT_VERSION;
		} else {
			$this->version = '2.0.1';
		}
		$this->plugin_name = 'co-cookie-consent';

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();

	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Co_Cookie_Consent_Loader. Orchestrates the hooks of the plugin.
	 * - Co_Cookie_Consent_i18n. Defines internationalization functionality.
	 * - Co_Cookie_Consent_Admin. Defines all hooks for the admin area.
	 * - Co_Cookie_Consent_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies() {

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-co-cookie-consent-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-co-cookie-consent-i18n.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-co-cookie-consent-admin.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-co-cookie-consent-public.php';

		$this->loader = new Co_Cookie_Consent_Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Co_Cookie_Consent_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new Co_Cookie_Consent_i18n();

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_admin_hooks() {

		$plugin_admin = new Co_Cookie_Consent_Admin( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );

		//Cabinet-Office settings
		$plugin_settings = new Co_Cookie_Consent_Admin_Settings( $this->get_plugin_name(), $this->get_version() );
		$this->loader->add_action( 'admin_menu', $plugin_settings, 'setup_plugin_options_menu' );
		$this->loader->add_action( 'admin_init', $plugin_settings, 'initialize_display_options' );
		$this->loader->add_action( 'admin_init', $plugin_settings, 'initialize_cookie_notice' );
		$this->loader->add_action( 'admin_init', $plugin_settings, 'initialize_notice_logs' );
		$this->loader->add_action( 'init', $plugin_admin, 'new_cpt_cookie_notice' );
		$this->loader->add_action( 'wp_ajax_create-post', $plugin_settings, 'programmatically_create_post' );
	}

	/**
	 * Register all of the hooks related to the public-facing functionality and display notice
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_public_hooks() {

		$plugin_public = new Co_Cookie_Consent_Public( $this->get_plugin_name(), $this->get_version() );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );
		$this->loader->add_filter( 'wp_head', $plugin_public, 'addcookiescript' );
		$this->loader->add_filter( 'wp_footer', $plugin_public, 'initiatecookiescript' );
		$this->loader->add_action( 'init', $plugin_public, 'register_shortcodes' );
			/**
			 * Add class to body
			 *
			 * @since    1.0.3
			 */
		$this->loader->add_filter( 'body_class', $plugin_public, 'my_body_classes' );
		$this->loader->add_action( 'init', $plugin_public, 'prefix_register_resources' );
		/**
		 * Loops through page code, looks for the body tag and places Cookie notice after this
		 * Required to do it using this method as other method was dependant on later version of Wordpress
		 */
		function callback( $buffer ) {
			// modify buffer here, and then return the updated code.

			$display_options = get_option( 'co_cookie_consent_display_options' );
			$preference_link = esc_attr( $display_options['preference_link'] );
			$options_notice = get_option( 'co_cookie_consent_cookie_notice' );
			$args = array( 'numberposts' => 1, 'post_type' => 'cookie_notice', 'orderby' => array( 'date' => 'DESC',));
			$notices = get_posts( $args );
			foreach ( $notices as $notice ){
					$cookie_notice = $notice->post_content;
			}
			$after_body.='<div class="gem-c-cookie-banner" data-module="cookie-banner" role="region" aria-label="cookie banner" >
			<div id="global-cookie-message" class="gem-c-cookie-banner__wrapper govuk-width-container" style="display: none;">
				<p class="gem-c-cookie-banner__message">' . $cookie_notice . '</p>
				  <!--form style="display: inline" action="/preference-centre/"-->
				  <div class="gem-c-cookie-banner__buttons">
					<button id="btn-accept-cookies" class="govuk-button govuk-button--secondary" type="submit" data-module="track-click" data-accept-cookies="true" data-track-category="cookieBanner" data-track-action="Cookie banner accepted">Accept all cookies</button>
					<button id="btn-reject-cookies" class="govuk-button govuk-button--secondary" type="submit" data-module="track-click" data-accept-cookies="false" data-track-category="cookieBanner" data-track-action="Cookie banner rejected">Reject optional cookies</button>
					<div style="padding-top:8px; display:inline-block;">
					<a class="govuk-link" data-module="govuk-button" href="' . $preference_link . '">
						Set cookie preferences
					</a>
				</div>
					</div>
				<!--/form-->
			</div>
			<div id="global-cookie-confirm" class="gem-c-cookie-banner__confirmation govuk-width-container" tabindex="-1" style="display: none;">
				<p class="gem-c-cookie-banner__confirmation-message">
					You\'ve accepted all cookies. You can <a class="govuk-link" href="' . $preference_link . '" data-module="track-click" data-track-category="cookieBanner" data-track-action="Cookie banner settings clicked from confirmation">change your cookie settings</a> at any time.
				</p>
				<button id="btn-hide-cookie-confirm" class="govuk-button gem-c-button--inline" data-hide-cookie-banner="true" data-module="track-click" data-track-category="cookieBanner" data-track-action="Hide cookie banner">Hide Cookie Message</button>
			</div>
			<div id="global-cookie-reject" class="gem-c-cookie-banner__confirmation govuk-width-container" tabindex="-1" style="display: none;">
				<p class="gem-c-cookie-banner__confirmation-message">
					You\'ve rejected all optional cookies. You can <a class="govuk-link" href="' . $preference_link . '" data-module="track-click" data-track-category="cookieBanner" data-track-action="Cookie banner settings clicked from confirmation">change your cookie settings</a> at any time.
				</p>
				<button id="btn-hide-cookie-reject" class="govuk-button gem-c-button--inline" data-hide-cookie-banner="true" data-module="track-click" data-track-category="cookieBanner" data-track-action="Hide cookie banner">Hide Cookie Message</button>
			</div>
		</div>';
			$buffer = preg_replace( '/(\<body.*\>)/', '$1' . $after_body, $buffer );
			return $buffer;
		}

		function buffer_start() { ob_start("callback"); }

		function buffer_end() { ob_end_flush(); }
			add_action( 'wp_head', 'buffer_start' );
			add_action( 'wp_footer', 'buffer_end' );
	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.0.0
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.0.0
	 * @return    Co_Cookie_Consent_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}
}
