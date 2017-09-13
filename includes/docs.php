<?php

/**
 * enforce creator-only read access for docs
 * this handles both initial visibility as well as updates to existing docs
 */
function hcpc_preset_doc_settings( $doc_settings ) {
	$vetted_user = hcpc_is_user_vetted();
	$vetted_user = false; // TODO testing only

	if ( ! $vetted_user ) {
		$doc_settings['read'] = 'creator';
		$doc_settings['edit'] = 'creator';
		$doc_settings['read_comments'] = 'creator';
		$doc_settings['post_comments'] = 'creator';
		$doc_settings['view_history'] = 'creator';
	}

	return $doc_settings;
}
add_filter( 'bp_docs_get_doc_settings', 'hcpc_preset_doc_settings' );

/**
 * add explanatory notice to label using inline js
 */
function hcpc_add_label_notice() {
	echo '<script>' . file_get_contents( plugin_dir_path( __DIR__ ) . 'js/hcpc-doc-settings.js' ) . '</script>';
}
add_action( 'bp_docs_after_access_settings_meta_box', 'hcpc_add_label_notice' );
