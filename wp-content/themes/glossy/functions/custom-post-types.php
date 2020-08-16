<?php
/**
 * Register Post Types
 * - Definitions.
 */

add_action( 'init', function() {


	$labels = [
		"name" => __( "Definitions", "custom-post-type-ui" ),
		"singular_name" => __( "Definition", "custom-post-type-ui" ),
		"all_items" => __( "All Definitions", "custom-post-type-ui" ),
	];

	$args = [
		"label" => __( "Definitions", "custom-post-type-ui" ),
		"labels" => $labels,
    "description" => "",
    "menu_icon" => "dashicons-edit-page",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => [ "slug" => "definition", "with_front" => true ],
		"query_var" => true,
		"supports" => [ "title", "editor" ],
	];

  register_post_type( "definition", $args );
  
});
