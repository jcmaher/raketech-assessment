<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;
if ( ! class_exists( 'Raketech_Assessment' ) ) :

	/**
	 * Main Raketech_Assessment Class.
	 *
	 * @package		RAKETECHAS
	 * @subpackage	Classes/Raketech_Assessment
	 * @since		1.0.0
	 * @author		Joshua Maher
	 */
	final class Raketech_Assessment {

		/**
		 * The real instance
		 *
		 * @access	private
		 * @since	1.0.0
		 * @var		object|Raketech_Assessment
		 */
		private static $instance;

		/**
		 * RAKETECHAS helpers object.
		 *
		 * @access	public
		 * @since	1.0.0
		 * @var		object|Raketech_Assessment_Helpers
		 */
		public $helpers;

		/**
		 * RAKETECHAS settings object.
		 *
		 * @access	public
		 * @since	1.0.0
		 * @var		object|Raketech_Assessment_Settings
		 */
		public $settings;

		/**
		 * Throw error on object clone.
		 *
		 * Cloning instances of the class is forbidden.
		 *
		 * @access	public
		 * @since	1.0.0
		 * @return	void
		 */
		public function __clone() {
			_doing_it_wrong( __FUNCTION__, __( 'You are not allowed to clone this class.', 'raketech-assessment' ), '1.0.0' );
		}

		/**
		 * Disable unserializing of the class.
		 *
		 * @access	public
		 * @since	1.0.0
		 * @return	void
		 */
		public function __wakeup() {
			_doing_it_wrong( __FUNCTION__, __( 'You are not allowed to unserialize this class.', 'raketech-assessment' ), '1.0.0' );
		}

		/**
		 * Main Raketech_Assessment Instance.
		 *
		 * Insures that only one instance of Raketech_Assessment exists in memory at any one
		 * time. Also prevents needing to define globals all over the place.
		 *
		 * @access		public
		 * @since		1.0.0
		 * @static
		 * @return		object|Raketech_Assessment	The one true Raketech_Assessment
		 */
		public static function instance() {
			if ( ! isset( self::$instance ) && ! ( self::$instance instanceof Raketech_Assessment ) ) {
				self::$instance					= new Raketech_Assessment;
				self::$instance->base_hooks();
				self::$instance->includes();
				self::$instance->helpers		= new Raketech_Assessment_Helpers();
				self::$instance->settings		= new Raketech_Assessment_Settings();

				//Fire the plugin logic
				new Raketech_Assessment_Run();

				/**
				 * Fire a custom action to allow dependencies
				 * after the successful plugin setup
				 */
				do_action( 'RAKETECHAS/plugin_loaded' );
			}

			return self::$instance;
		}

		/**
		 * Include required files.
		 *
		 * @access  private
		 * @since   1.0.0
		 * @return  void
		 */
		private function includes() {
			require_once RAKETECHAS_PLUGIN_DIR . 'core/includes/classes/class-raketech-assessment-helpers.php';
			require_once RAKETECHAS_PLUGIN_DIR . 'core/includes/classes/class-raketech-assessment-settings.php';

			require_once RAKETECHAS_PLUGIN_DIR . 'core/includes/classes/class-raketech-assessment-run.php';
		}

		/**
		 * Add base hooks for the core functionality
		 *
		 * @access  private
		 * @since   1.0.0
		 * @return  void
		 */
		private function base_hooks() {
			add_action( 'plugins_loaded', array( self::$instance, 'load_textdomain' ) );
		}

		/**
		 * Loads the plugin language files.
		 *
		 * @access  public
		 * @since   1.0.0
		 * @return  void
		 */
		public function load_textdomain() {
			load_plugin_textdomain( 'raketech-assessment', FALSE, dirname( plugin_basename( RAKETECHAS_PLUGIN_FILE ) ) . '/languages/' );
		}

	}

endif; // End if class_exists check.