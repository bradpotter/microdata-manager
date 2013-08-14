<?php
/**
 * Microdata Manager plugin for Genesis 2.0.0+.
 *
 * @package    MicrodataManager
 * @author     Brad Potter
 * @copyright  Copyright (c) 2013, Brad Potter
 * @license    GPL-2.0+
 * @link       http://bradpotter.com/plugins/microdata-manager
 *
 * @wordpress-plugin
 * Plugin Name: Microdata Manager
 * Plugin URI:  http://www.bradpotter.com/plugins/microdata-manager
 * Description: Allows the end user to change Genesis Microdata settings.
 * Version:     0.9.0
 * Author:      Brad Potter
 * Author URI:  http://www.bradpotter.com/
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: microdata-manager
 * Domain Path: /lang
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

register_activation_hook( __FILE__, 'microdata_manager_activation' );
/**
 * Ensure Genesis is active, and that the version is not less than 2.0.0.
 *
 * If not, the plugin deactivates itself.
 *
 * @since 1.0.0
 */
function microdata_manager_activation() {
	if ( ! defined( 'PARENT_THEME_VERSION' ) || version_compare( PARENT_THEME_VERSION, '2.0.0', '<' ) ) {
		deactivate_plugins( plugin_basename( __FILE__ ) );
		wp_die(
			sprintf(
				__( 'Sorry, you cannot run Microdata Manager without <a href="%s">Genesis 2.0.0</a>, or greater.', 'microdata-manager' ),
				'http://bradpotter.com/go/genesis'
			)
		);
	}
}

add_action( 'genesis_init', 'microdata_manager_functions_init', 15 );
/**
 * Load Microdata Manager Functions
 *
 * @since 1.0.0
 */
function microdata_manager_functions_init() {

		require_once plugin_dir_path( __FILE__ ) . '/microdata-manager-functions.php';
}
