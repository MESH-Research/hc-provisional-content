<?php

/**
 * filter blog options before save to enforce visibility depending on user status
 *
 * @uses hcpc_is_user_vetted()
 * @param string $status
 * @return string $status
 */
function hcpc_filter_bp_blogs_blog_before_save( BP_Blogs_Blog $blog ) {
	$required_blog_public_option_value = -3; // required value of blog_public option for non-vetted users (assumes MPO)

	$vetted_user = hcpc_is_user_vetted();
	$vetted_user = false; // TODO testing only

	if ( ! $vetted_user && $blog_details->public !== $required_blog_public_option_value ) {
		update_blog_details( $blog_details->blog_id, [ 'public' => $required_blog_public_option_value ] );
	}

	return $blog;
}
add_action( 'bp_blogs_blog_before_save', 'hcpc_filter_bp_blogs_blog_before_save' );

/**
 * disable relevant visibility radio buttons and add explanatory notice to label using inline js
 * this only works if hooked to actions before wp_head
 */
function hcpc_preset_blog_settings() {
	wp_add_inline_script( 'jquery-core', file_get_contents( plugin_dir_path( __DIR__ ) . 'js/hcpc-blog-settings.js' ) );
}
add_action( 'bp_blogs_screen_create_a_blog', 'hcpc_preset_blog_settings' );
// TODO find/target hook to handle changing settings after blog exists
//add_action( 'groups_screen_group_admin_settings', 'hcpc_preset_blog_settings' );
