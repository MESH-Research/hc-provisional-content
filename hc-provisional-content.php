<?php

/**
 * Plugin Name: HC Provisional Content
 * Description: Restrict access to content created by new members to help fight spam.
 */

/**
 * is user allowed to create non-provisional content?
 *
 * @global Humanities_Commons $humanities_commons
 */
function hcpc_is_user_vetted() {
	global $humanities_commons;
	return $humanities_commons->hcommons_vet_user();
}

require_once( trailingslashit( __DIR__ ) . 'includes/groups.php' );
require_once( trailingslashit( __DIR__ ) . 'includes/blogs.php' );
