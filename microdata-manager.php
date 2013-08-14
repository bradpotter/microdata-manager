<?php
/**
Plugin Name: Microdata Manager
Plugin URI: http://www.bradpotter.com/plugins/microdata-manager
Description: Allows the end user to change Genesis Microdata settings.
Version: 0.9.0
Author: Brad Potter
Author URI: http://www.bradpotter.com/
License: GPL-2.0+
License URI: http://www.opensource.org/licenses/gpl-license.php
Copyright (c) 2013 Brad Potter
 */

/**
 * Prevent direct access to this file.
 *
 * @since 0.9.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}

/**
 * Setting constants
 *
 * @since 0.9.0
 */
define( 'MICRODATAMANAGER_PLUGIN_DIR', dirname( __FILE__ ) );


register_activation_hook( __FILE__, 'microdata_manager_activation' );
/**
 * This function runs on plugin activation. It checks to make sure Genesis
 * or a Genesis child theme is active. If not, it deactivates itself.
 *
 * @since 0.9.0
 */
function microdata_manager_activation() {

	if ( ! defined( 'PARENT_THEME_VERSION' ) || ! version_compare( PARENT_THEME_VERSION, '2.0.0', '>=' ) )
		microdata_manager_deactivate( '2.0.0', '3.6' );

}

/**
 * Deactivate Microdata Manager.
 *
 * This function deactivates Microdata Manager.
 *
 * @since 0.9.0
 */
function microdata_manager_deactivate( $genesis_version = '2.0.0', $wp_version = '3.6' ) {
	
	deactivate_plugins( plugin_basename( __FILE__ ) );
	wp_die( sprintf( __( 'Sorry, you cannot run Microdata Manager without WordPress %s and <a href="%s">Genesis %s</a>, or greater.', 'microdata_manager' ), $wp_version, 'http://bradpotter.com/go/genesis', $genesis_version ) );

}

add_action( 'genesis_init', 'microdata_manager_functions_init', 15 );
/**
 * Load Microdata Manager Functions
 */
function microdata_manager_functions_init() {

		require_once( MICRODATAMANAGER_PLUGIN_DIR . '/lib/microdata-manager-functions.php');
}
