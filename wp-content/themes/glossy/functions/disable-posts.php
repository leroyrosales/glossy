<?php

/**
 *  
 * Disable Posts
 *
 */

// TODO: Disable posts related feeds and pings?


// Remove posts page in menu
add_action( 'admin_menu', function() {
	remove_menu_page('edit.php');
} );

// Remove 'post' type from the REST API
add_action( 'init', 'disable_rest_api_posts', 25, 1 );
function disable_rest_api_posts() {
	global $wp_post_types;
	// If the API calls 'post', return false
	if ( isset( $wp_post_types['post'] ) ) {
			$wp_post_types['post']->show_in_rest = FALSE;
			return TRUE;
	}
	return FALSE;
}

// Redirect any user trying to access posts page
add_action( 'admin_init', 'disable_site_posts_admin_menu_redirect' );
function disable_site_posts_admin_menu_redirect() {
	global $pagenow;

	// Prevent users from adding new posts
	if ( $pagenow === 'post-new.php' && $_SERVER['REQUEST_METHOD'] == 'GET' && ( ! isset( $_GET['post_type'] ) || isset( $_GET['post_type'] ) && $_GET['post_type'] == 'post' ) ) {
		wp_safe_redirect( admin_url(), 301 );
		exit;
	}

	// If user can edit faqs will return
	if( $pagenow == 'edit.php?post_type=faq' && current_user_can( 'edit_faqs' ) ) {
		return;
	// Redirects users from edit.php unless they're an admin
	} elseif ( $pagenow == 'edit.php' && $_SERVER['REQUEST_METHOD'] == 'GET' && ( ! isset( $_GET['post_type'] ) || isset( $_GET['post_type'] ) && $_GET['post_type'] == 'post' ) && !current_user_can( 'administrator' ) ) {
		wp_safe_redirect( admin_url(), 301 );
		exit;
	} 

}

// Remove posts from toolbar
add_action( 'wp_before_admin_bar_render', 'remove_posts_toolbar_node', 999 );
function remove_posts_toolbar_node( $wp_admin_bar ) {
	
	global $wp_admin_bar;
	
	$wp_admin_bar->remove_menu('new-post');
	
}
