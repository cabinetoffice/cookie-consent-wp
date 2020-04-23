<?php
/**
 * The settings of the plugin.
 *
 * @link       https://www.affinity-digital.com
 * @since      1.0.0
 *
 * @package    Co_Cookie_Consent
 * @subpackage Co_Cookie_Consent/includes
 */

/**
 * Class WordPress_Plugin_Template_Settings
 *
 */
class Co_Cookie_Consent_Admin_Settings {
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
	 * @param string    $plugin_name       The name of this plugin.
	 * @param string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {
		$this->plugin_name = $plugin_name;
		$this->version = $version;
	}
  /**
   * Introduces the link into the 'Settings' menu 
   */
  public function setup_plugin_options_menu() {
	add_options_page(
		'Cookie Consent Options',           // The title to be displayed in the browser window for this page.
		'Cookie Consent Options',          // The text to be displayed for this menu item
		'manage_options',          // Which type of users can see this menu item (Admin)
		'co_cookie_consent_options',      // The unique ID - that is, the slug - for this menu item
		array( $this, 'render_settings_page_content')        // The name of the function to call when rendering this menu's page
	);
  }
  /**
   * Provides default values for the Display Options.
   *
   * @return array
   */
  public function default_display_options() {
	$defaults = array(
		'google_tag_id'    =>  '',
		'preference_link' => '',
	);
    return $defaults;
  }
  /**
   * Provide default values for the Cookie Notice.
   *
   * @return array
   */
  public function default_cookie_notice() {
    $defaults = array(
      'cookie_notice'    =>  '',
    );
    return  $defaults;
  }
  /**
   * Provides default values for the Logs tab (empty).
   *
   * @return array
   */
  public function default_input_options() {
    $defaults = array(
    );
    return $defaults;
  }
  /**
   * Renders a simple page to display for the theme menu defined above.
   */
  public function render_settings_page_content( $active_tab = '' ) {
    ?>
    <!-- Create a header in the default WordPress 'wrap' container -->
    <div class="wrap">
      <h2 id="page_title"><?php _e( 'Cabinet Office Cookie Consent Options', 'co_cookie_consent-plugin' ); ?></h2>
      <?php settings_errors(); ?>
      <?php if( isset( $_GET[ 'tab' ] ) ) {
        $active_tab = $_GET[ 'tab' ];
      } else if( $active_tab == 'cookie_notice' ) {
        $active_tab = 'cookie_notice';
      } else if( $active_tab == 'notice_logs' ) {
        $active_tab = 'notice_logs';
      } else {
        $active_tab = 'display_options';
      } // end if/else ?>
      <h2 class="nav-tab-wrapper">
        <a href="?page=co_cookie_consent_options&tab=display_options" class="nav-tab <?php echo $active_tab == 'display_options' ? 'nav-tab-active' : ''; ?>"><?php _e( 'Settings', 'co_cookie_consent-plugin' ); ?></a>
        <a href="?page=co_cookie_consent_options&tab=cookie_notice" class="nav-tab <?php echo $active_tab == 'cookie_notice' ? 'nav-tab-active' : ''; ?>"><?php _e( 'Cookie Notice', 'co_cookie_consent-plugin' ); ?></a>
        <a href="?page=co_cookie_consent_options&tab=notice_logs" class="nav-tab <?php echo $active_tab == 'notice_logs' ? 'nav-tab-active' : ''; ?>"><?php _e( 'Logs', 'co_cookie_consent-plugin' ); ?></a>
      </h2>
        <?php
				if( $active_tab == 'display_options' ) { ?>
				
				<form method="post" action="options.php"> 
				<?php
          settings_fields( 'co_cookie_consent_display_options' );
					do_settings_sections( 'co_cookie_consent_display_options' );
					
					submit_button();
					?>
				</form>

  <?php
        } elseif( $active_tab == 'cookie_notice' ) {
          settings_fields( 'co_cookie_consent_cookie_notice' );
					do_settings_sections( 'co_cookie_consent_cookie_notice' ); 
					// Generate a custom nonce value.
					$nds_add_meta_nonce = wp_create_nonce( 'nds_add_user_meta_form_nonce' ); 
					?>
					<input type="hidden" name="add_user_meta_nonce" value="<?php echo $nds_add_meta_nonce ?>" />
					<button id="create-post" class="button button-primary">Save Changes</button>
       <?php } else {
					$args = array( 'post_type' => 'cookie_notice', 'posts_per_page' => -1,
          'orderby'   => array(
            'date' =>'DESC',
           )); ?>
					<table class="wp-list-table widefat fixed striped items cn_logs">
					<thead>
					<tr>
					<td class="manage-column column-date">Date</td>
					<td class="manage-column">Cookie Notice</td>
					</tr>
					</thead>
					<tbody>
					<?php
				 $loop = new WP_Query( $args );
				 while ( $loop->have_posts() ) : $loop->the_post();
				 echo '<tr>';
				 		echo '<td class="entry-content">';
            echo esc_html(get_the_date( get_option('date_format') ));
            echo '<br />';
						echo esc_html(the_time( 'H:i:s' ));
					 	echo '</td>';
					 	echo '<td class="entry-content">';
             esc_html(the_content());
					 	echo '</td>';
						 echo '</tr>';
				 endwhile;
				 echo '</tbody>';
				 echo '</table>';
          settings_fields( 'co_cookie_consent_notice_logs' );
          do_settings_sections( 'co_cookie_consent_notice_logs' );
        } // end if/else
        ?>
    </div><!-- /.wrap -->
  <?php
	}
	
	
  /**
   * This function provides a simple description for the General Options page.
   *
   */
  public function general_options_callback() {
    $options = get_option('co_cookie_consent_display_options');
    //var_dump($options);
		echo '<p>' . __( 'Description text to go here and include shortcode for cookie preferences page.', 'co_cookie_consent-plugin' ) . '</p>';
    echo '<p>' . __( 'The shortcode to add in the functionality into the Cookie Preferences page is [cookiepreferences]', 'co_cookie_consent-plugin' ) . '</p>';
  } // end general_options_callback
  /**
   * This function provides a simple description for the Cookie Notice page.
   *
   * in the add_settings_section function.
   */
  public function cookie_notice_callback() {
    $options = get_option('co_cookie_consent_cookie_notice');
    //var_dump($options);
    echo '<p>' . __( 'Provide the text for the Cookie Notice', 'co_cookie_consent-plugin' ) . '</p>';
  } // end general_options_callback
  /**
   * This function provides a simple description for the Logs page.
   *
   */
  public function notice_logs_callback() {
    $options = get_option('co_cookie_consent_notice_logs');
    //var_dump($options);
    echo '<p>' . __( 'Cookie Notice Logs', 'co_cookie_consent-plugin' ) . '</p>';
  } // end general_options_callback
  /**
   * Initializes the theme's display options page by registering the Sections,
   * Fields, and Settings.
   *
   * This function is registered with the 'admin_init' hook.
   */
  public function initialize_display_options() {
    // If the theme options don't exist, create them.
    if( false == get_option( 'co_cookie_consent_display_options' ) ) {
      $default_array = $this->default_display_options();
      add_option( 'co_cookie_consent_display_options', $default_array );
    }
    add_settings_section(
      'general_settings_section',                  // ID used to identify this section and with which to register options
      __( 'Cookie Notice Display Options and Google Tag ID', 'co_cookie_consent-plugin' ),            // Title to be displayed on the administration page
      array( $this, 'general_options_callback'),      // Callback used to render the description of the section
      'co_cookie_consent_display_options'                    // Page on which to add this section of options
    );
    add_settings_field(
      'google_tag_id',
      __( 'Google Tag Manager ID', 'co_cookie_consent-plugin' ),
      array( $this, 'toggle_footer_callback'),
      'co_cookie_consent_display_options',
      'general_settings_section',
      array(
        __( 'Google Tag Manager ID e.g. UA-29068232-1', 'co_cookie_consent-plugin' ),
      )
    );
    add_settings_field(
      'preference_link',
      __( 'Cookie Preference Link', 'co_cookie_consent-plugin' ),
      array( $this, 'toggle_preference_link_callback'),
      'co_cookie_consent_display_options',
      'general_settings_section',
      array(
        __( 'Link to Cookie Preferences Page', 'co_cookie_consent-plugin' ),
      )
    );
    // Register the fields with WordPress
    register_setting(
      'co_cookie_consent_display_options',
      'co_cookie_consent_display_options'
    );
  } // end 
  /**
   * Initializes Cookie Notice
   *
   * This function is registered with the 'admin_init' hook.
   */
  public function initialize_cookie_notice() {
    //delete_option('co_cookie_consent_cookie_notice');
    if( false == get_option( 'co_cookie_consent_cookie_notice' ) ) {
      $default_array = $this->default_cookie_notice();
      //update_option( 'co_cookie_consent_cookie_notice', $default_array );
    } // end if
    add_settings_section(
      'cookie_notice_section',      // ID used to identify this section and with which to register options
      __( 'Cookie Notice Text', 'co_cookie_consent-plugin' ),    // Title to be displayed on the administration page
      array( $this, 'cookie_notice_callback'),  // Callback used to render the description of the section
      'co_cookie_consent_cookie_notice'    // Page on which to add this section of options
    );
		add_settings_field(
      'cookie_notice',
      '',
      array( $this, 'cookie_text_callback'),
      'co_cookie_consent_cookie_notice',
      'cookie_notice_section'
    );
    register_setting(
      'co_cookie_consent_cookie_notice',
      'co_cookie_consent_cookie_notice',
      array( $this, 'sanitize_cookie_notice')
    );
  }
  /**
   * Initializes the Logs
   */
		public function initialize_notice_logs() {
			//delete_option('co_cookie_consent_notice_logs');
    if( false == get_option( 'co_cookie_consent_notice_logs' ) ) {
      $default_array = $this->default_input_options();
      //update_option( 'co_cookie_consent_notice_logs', $default_array );
    } // end if
    register_setting(
      'co_cookie_consent_notice_logs',
      'co_cookie_consent_notice_logs',
      array( $this, 'validate_c_o')
    );
  }
  /**
   * This function renders the interface elements for toggling the visibility of the header element.
   *
   * It accepts an array or arguments and expects the first element in the array to be the description
   * to be displayed next to the checkbox.
   */

  public function toggle_footer_callback($args) {
    $options = get_option('co_cookie_consent_display_options');
		$google_tag_id = '';
		if( isset( $options['google_tag_id'] ) ) {
			$google_tag_id = esc_html( $options['google_tag_id'] );
		}
		echo '<input type="text" id="google_tag_id" name="co_cookie_consent_display_options[google_tag_id]" value="' . $google_tag_id . '" />';
	} // end 
	
  public function toggle_preference_link_callback($args) {
    $options = get_option('co_cookie_consent_display_options');
		$preference_link = '';
		if( isset( $options['preference_link'] ) ) {
			$preference_link = esc_url( $options['preference_link'] );
		}
		//echo '<input type="text" id="preference_link" name="co_cookie_consent_display_options[preference_link]" value="' . $preference_link . '" />';
		$option = "<option value=\"\">Select page</option>";
		$pages = get_pages();
		foreach ( $pages as $page ) {
			$page_link = get_page_link( $page->ID );
			$selected = "";
			if ($page_link == $preference_link) {$selected = "selected";}
			$option .= '<option value="' . $page_link . '" '. $selected.'>';
			$option .= $page->post_title;
			$option .= '</option>';
			//echo $option;
		}
		echo "<select  id=\"preference_link\" name=\"co_cookie_consent_display_options[preference_link]\"> 
 		$option
		</select>";
	} // end toggle_footer_callback
  public function cookie_text_callback() {
    // Get the latest Cookie Notice
		//$options = get_option( 'co_cookie_consent_cookie_notice' );
		$args = array('numberposts'=>1, 'post_type' => 'cookie_notice',
    'orderby'   => array(
      'date' =>'DESC',
     ));
		$notices = get_posts( $args );
    foreach ( $notices as $notice ){
					$cookie_notice = $notice->post_content;
		}
		//$cookie_notice = $options['cookie_notice'];
		$settings = array(
			'wpautop' => true,
			'media_buttons' => false,
			'textarea_name' => 'co_cookie_consent_cookie_notice[cookie_notice]',
			'teeny' => true,
			'textarea_rows' => 15,
			'tabindex' => 1
	);
	wp_editor($cookie_notice, 'cookie_notice', $settings);
  } // end cookie_text_callback 
  /**
   * Sanitization callback for the social options. Since each of the social options are text inputs,
   * this function loops through the incoming option and strips all tags and slashes from the value
   * before serializing it.
   *
   * @params  $input  The unsanitized collection of options.
   *
   * @returns      The collection of sanitized values.
   */
  public function sanitize_cookie_notice( $input ) {
    // Define the array for the updated options
    $output = array();
    // Loop through each of the options sanitizing the data
    foreach( $input as $key => $val ) {
      if( isset ( $input[$key] ) ) {
        $output[$key] = stripslashes( $input[$key] ) ;
      } // end if
    } // end foreach
    // Return the new collection
    return apply_filters( 'sanitize_cookie_notice', $output, $input );
  } // end sanitize_cookie_notice
  public function validate_c_o( $input ) {
    // Create our array for storing the validated options
    $output = array();
    // Loop through each of the incoming options
    foreach( $input as $key => $value ) {
      // Check to see if the current option has a value. If so, process it.
      if( isset( $input[$key] ) ) {
        // Strip all HTML and PHP tags and properly handle quoted strings
        $output[$key] = strip_tags( stripslashes( $input[ $key ] ) );
      } // end if
    } // end foreach
    // Return the array processing any additional functions filtered by this action
    return apply_filters( 'validate_c_o', $output, $input );
	} // end validate_c_o

	public function programmatically_create_post() {
		$post_content = wp_kses_post($_POST['post_content']);
		$post_usernonce = $_POST['user_nonce'];
		if( isset( $post_usernonce ) && wp_verify_nonce( $post_usernonce, 'nds_add_user_meta_form_nonce') ) {
		wp_insert_post(
			array(
				'comment_status'    =>  'closed',
				'ping_status'       =>  'closed',
				'post_author'       =>  1,
				'post_content'			=>	$post_content,        
				'post_title'        =>  'Cookie Notice',
        'post_status'				=>	'publish',            
				'post_type'         =>  'cookie_notice',
			)
    );
		} else {
			wp_die( __( 'Invalid nonce specified', $this->plugin_name ), __( 'Error', $this->plugin_name ), array(
						'response' 	=> 403,
						'back_link' => 'admin.php?page=' . $this->plugin_name,
	
				) );
		}
	} 
}
