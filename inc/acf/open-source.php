<?php

if ( ! function_exists( 'acf_add_local_field_group' ) ) {
  return;
}

acf_add_local_field_group([
  'key' => 'group_5ab6f46a2dc57',
  'title' => 'Open Source projects',
  'fields' => [
    [
      'key' => 'field_5ab6f488a18c7',
      'label' => '',
      'name' => 'open_source_projects',
      'type' => 'repeater',
      'layout' => 'block',
      'button_label' => 'Add project',
      'sub_fields' => [
        [
          'key' => 'field_5ab6f4dde004d',
          'label' => 'Project Name',
          'name' => 'project_name',
          'type' => 'text',
        ],
        [
          'key' => 'field_5ab6f4e8e004e',
          'label' => 'Description',
          'name' => 'description',
          'type' => 'textarea',
          'rows' => 2,
        ],
        [
          'key' => 'field_5ab6f4f2e004f',
          'label' => 'Tech Stack',
          'name' => 'tech_stack',
          'type' => 'repeater',
          'layout' => 'table',
          'button_label' => 'Add technology',
          'sub_fields' => [
            [
              'key' => 'field_5ab6f537e0050',
              'label' => '',
              'name' => 'technology',
              'type' => 'text',
            ],
          ],
        ],
      ],
    ],
  ],
  'location' => [
    [
      [
        'param' => 'page_template',
        'operator' => '==',
        'value' => 'templates/open-source.php',
      ],
    ],
  ],
]);
