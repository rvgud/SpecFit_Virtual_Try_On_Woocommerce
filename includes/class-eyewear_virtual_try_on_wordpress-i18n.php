<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://www.dugudlabs.com
 * @since      1.0.0
 *
 * @package    Eyewear_virtual_try_on_wordpress
 * @subpackage Eyewear_virtual_try_on_wordpress/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Eyewear_virtual_try_on_wordpress
 * @subpackage Eyewear_virtual_try_on_wordpress/includes
 * @author     DugudLabs <ravindrashekhawat5876@gmail.com>
 */
class Eyewear_virtual_try_on_wordpress_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'eyewear_virtual_try_on_wordpress',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
