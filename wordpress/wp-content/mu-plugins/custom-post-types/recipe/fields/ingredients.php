<?php

function my_acf_add_local_field_groups() {

	acf_add_local_field_group(array(
		'key' => 'group_1',
		'title' => 'My Group',
		'show_in_graphql' => true,
		'fields' => array (
			array (
				'key' => 'field_1',
				'label' => 'Sub Title',
				'name' => 'sub_title',
				'type' => 'text',
				'graphql_field_name' => 'subTitle',
			)
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'fe_recipe',
				),
			),
		),
	));

}

add_action('acf/init', 'my_acf_add_local_field_groups');