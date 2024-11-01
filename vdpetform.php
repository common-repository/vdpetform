<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              Vergelijkdirect.com
 * @since             3.2
 * @package           Vdpetform
 *
 * @wordpress-plugin
 * Plugin Name:       Vergelijkdirect.com - Vergelijk verzekeringen, energie en telecom.
 * Plugin URI:        vergelijkdirect.com
 * Description:       Vergelijkdirect.com vergelijkt verzekeringen, energie en telecomaanbieders. Met deze simpele plugin ben je in staat om vergelijkingsmodules op je website te plaatsen om je bezoekers een onafhankelijke vergelijking aan te kunnen bieden!
 * Version:           3.2
 * Author:            Vergelijkdirect.com
 * Author URI:        Vergelijkdirect.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       vdpetform
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
define( 'VDPlugin', '3.2' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-vdpetform-activator.php
 */
function activate_vdpetform() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-vdpetform-activator.php';
	Vdpetform_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-vdpetform-deactivator.php
 */
function deactivate_vdpetform() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-vdpetform-deactivator.php';
	Vdpetform_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_vdpetform' );
register_deactivation_hook( __FILE__, 'deactivate_vdpetform' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-vdpetform.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_vdpetform() {

	$plugin = new Vdpetform();
	$plugin->run();

}
run_vdpetform();
