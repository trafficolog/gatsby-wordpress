<?php

function resheno_acf_add_local_field_groups() {

	acf_add_local_field_group(array(
		'key' => 'group_1',
		'title' => 'Перечень этапов',
		'show_in_graphql' => true,
		'fields' => array (
			array (
				'key' => 'field_1',
				'label' => 'Этап',
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
					'value' => 're_service',
				),
			),
		),
	));

}

add_action('acf/init', 'resheno_acf_add_local_field_groups');