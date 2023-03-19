<?php
/**
 * The code to register a WordPress Custom Post Type (CPT) `re_service`
 * with a custom Taxonomy `re_service_tag`
 * @package re_service
 */

add_action( 'init', 're_service_cpt' );

/**
 * Register a public CPT and Taxonomy
 */
function re_service_cpt() {

	// Post type should be prefixed, singular, and no more than 20 characters.
	register_post_type( 're_service', array(
		// Label should be plural and L10n ready.
		'label'       => __( 'Services', 're_service' ),
		'public'      => true,
		'has_archive' => true,
		'rewrite'     => array(
			// Slug should be plural and L10n ready.
			'slug'        => _x( 'services', 'CPT permalink slug', 're_service' ),
			'with_front'  => false,
		),

		/**
		 * 'title', 'editor', 'thumbnail' 'author', 'excerpt','custom-fields',
		 * 'page-attributes' (menu order),'revisions' (will store revisions),
		 * 'trackbacks', 'comments', 'post-formats',
		 */
		'supports'    => array( 'title', 'editor', 'custom-fields' ),

		// Url to icon or choose from built-in https://developer.wordpress.org/resource/dashicons/.
		'menu_icon'   => 'dashicons-feedback',
	) );

	register_taxonomy(
		're_service_tag',
		're_service',
		array(
			// Label should be plural and L10n ready.
			'label'             => __( 'Service Tags', 're_service' ),
			'show_admin_column' => true,
			'rewrite'           => array(
				// Slug should be singular and L10n ready..
				'slug' => _x( 'service-tag', 'Custom Taxonomy slug', 're_service' ),
			),
		)
	);

}

add_filter( 'register_post_type_args', 'add_tags_support_to_service_post_type', 10, 2 );

function add_tags_support_to_service_post_type( $args, $post_type ) {
	// Let's make sure that we're customizing the post type we really need
	if ( $post_type !== 're_service' ) {
		return $args;
	}

	$args['show_in_rest'] = true;

	$args['show_ui'] = true;

	$args['show_in_graphql'] = true;

	$args['hierarchical'] = true;

	$args['graphql_single_name'] = 'service';

	$args['graphql_plural_name'] = 'services';
	
	return $args;
}