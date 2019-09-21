<?php

/**
 * Fired during plugin activation
 *
 * @link       http://google.com
 * @since      1.0.0
 *
 * @package    Lrsgen
 * @subpackage Lrsgen/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Lrsgen
 * @subpackage Lrsgen/includes
 * @author     Trevor Wagner <tmwagner66@gmail.com>
 */
class Lrsgen_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		if (!class_exists('ACF')) {
			die('Plugin NOT activated: This plugin requires that Advanced Custom Fields be installed before it can be activated.');
		}
	}
}
