<?php
/**
 * Plugin Name:     HC Provisional Content
 * Plugin URI:      https://github.com/mlaa/hc-provisional-content
 * Description:     Constrain visibility of content created by unvetted users to help fight spam.
 * Author:          MLA
 * Author URI:      https://github.com/mlaa
 * Text Domain:     hc-provisional-content
 * Domain Path:     /languages
 * Version:         0.1.0
 *
 * @package         HC_Provisional_Content
 */

/**
 * Is user allowed to create non-provisional content?
 *
 * @global Humanities_Commons $humanities_commons
 */
function hcpc_is_user_vetted() {
	global $humanities_commons;
	return $humanities_commons->hcommons_vet_user();
}

require_once( trailingslashit( __DIR__ ) . 'includes/docs.php' );
require_once( trailingslashit( __DIR__ ) . 'includes/groups.php' );

if ( function_exists( 'bp_is_root_blog' ) && ! bp_is_root_blog() ) {
	require_once( trailingslashit( __DIR__ ) . 'includes/blogs.php' );
}
