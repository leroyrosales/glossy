<?php
/**
 * The main template file
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists
 *
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since   Timber 0.1
 */

global $paged;
if (!isset($paged) || !$paged){
	$paged = 1;
}

$context          = Timber::context();

// $definitions = array(
// 	'post_type' => 'definition',
// 	'orderby'=> 'title', 
// 	'order' => 'ASC',
// 	'paged' => $paged,
// );

$context['posts'] = new Timber\PostQuery( );

$templates        = array( 'index.twig' );
if ( is_home() ) {
	array_unshift( $templates, 'front-page.twig', 'home.twig' );
}
Timber::render( $templates, $context );
