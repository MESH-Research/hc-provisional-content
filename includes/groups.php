<?php

/**
 * filter group options before save to enforce visibility depending on user status
 *
 * since group settings page only occurs after group exists (unlike blogs),
 * this handles both intial visibility setting & later updates
 *
 * @uses hcpc_is_user_vetted()
 * @param string $status
 * @return string $status
 */
function hcpc_filter_groups_group_status_before_save( string $status ) {
	$vetted_user = hcpc_is_user_vetted();
	$vetted_user = false; // TODO testing only

	if ( ! $vetted_user ) {
		$status = 'hidden';
	}

	return $status;
}
add_filter( 'groups_group_status_before_save', 'hcpc_filter_groups_group_status_before_save' );

/**
 * disable relevant visibility radio buttons and add explanatory notice to label using inline js
 * this only works if hooked to actions before wp_head
 */
function hcpc_preset_group_settings() {
	wp_add_inline_script( 'jquery-core', file_get_contents( plugin_dir_path( __DIR__ ) . 'js/hcpc-group-settings.js' ) );
}
add_action( 'bp_before_create_group_page', 'hcpc_preset_group_settings' );
add_action( 'groups_screen_group_admin_settings', 'hcpc_preset_group_settings' );
