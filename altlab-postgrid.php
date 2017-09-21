<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://luetkemj.github.io
 * @since             1.0.0
 * @package           Altlab_Postgrid
 *
 * @wordpress-plugin
 * Plugin Name:       ALT Lab Post Grid
 * Plugin URI:        https://github.com/vcualtlab/postgrid
 * Description:       Shortcode to display posts in Masonry Grid [altlab-postgrid category='something' max_column='2' excerpt='false' author='false' date='false']
 * Version:           1.1.0
 * Author:            Mark Luetke
 * Author URI:        http://luetkemj.github.io
 * License:           WTFL
 * License URI:       http://www.wtfpl.net/
 * Text Domain:       altlab-postgrid
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-altlab-postgrid-activator.php
 */
function activate_altlab_postgrid() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-altlab-postgrid-activator.php';
	Altlab_Postgrid_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-altlab-postgrid-deactivator.php
 */
function deactivate_altlab_postgrid() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-altlab-postgrid-deactivator.php';
	Altlab_Postgrid_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_altlab_postgrid' );
register_deactivation_hook( __FILE__, 'deactivate_altlab_postgrid' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-altlab-postgrid.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_altlab_postgrid() {

	$plugin = new Altlab_Postgrid();
	$plugin->run();

}
run_altlab_postgrid();
