<?php
/**
 * The code to register a WordPress Custom Post Type (CPT) `fe_recipe`
 * with a custom Taxonomy `fe_recipe_tag`
 * @package fe_recipe
 */

add_action( 'init', 'fe_recipe_cpt' );

/**
 * Register a public CPT and Taxonomy
 */
function fe_recipe_cpt() {

	// Post type should be prefixed, singular, and no more than 20 characters.
	register_post_type( 'fe_recipe', array(
		// Label should be plural and L10n ready.
		'label'       => __( 'Recipes', 'fe_recipe' ),
		'public'      => true,
		'has_archive' => true,
		'rewrite'     => array(
			// Slug should be plural and L10n ready.
			'slug'        => _x( 'recipes', 'CPT permalink slug', 'fe_recipe' ),
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
		'fe_recipe_tag',
		'fe_recipe',
		array(
			// Label should be plural and L10n ready.
			'label'             => __( 'Recipe Tags', 'fe_recipe' ),
			'show_admin_column' => true,
			'rewrite'           => array(
				// Slug should be singular and L10n ready..
				'slug' => _x( 'recipe-tag', 'Custom Taxonomy slug', 'fe_recipe' ),
			),
		)
	);

}

add_filter( 'register_post_type_args', 'add_tags_support_to_service_post_type', 10, 2 );

function add_tags_support_to_service_post_type( $args, $post_type ) {
	// Let's make sure that we're customizing the post type we really need
	if ( $post_type !== 'fe_recipe' ) {
		return $args;
	}

	$args['show_in_rest'] = true;

	$args['show_ui'] = true;

	$args['show_in_graphql'] = true;

	$args['hierarchical'] = true;

	$args['graphql_single_name'] = 'recipe';

	$args['graphql_plural_name'] = 'recipes';
	
	return $args;
}