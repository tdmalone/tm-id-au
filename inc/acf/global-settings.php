<?php
/**
 * Global ACF fields for tm.id.au theme.
 *
 * @author Tim Malone <tdmalone@gmail.com>
 */

if ( ! function_exists( 'acf_add_local_field_group' ) ) {
  return;
}

acf_add_options_page([
  'page_title' => 'Theme Options',
  'menu_slug'  => 'theme-options',
]);

acf_add_local_field_group([
  'key' => 'group_tm_global_settings',
  'title' => 'Global Settings',
  'fields' => [
    [
      'key' => 'field_tm_global_settings_site_image',
      'label' => 'Site Image',
      'name' => 'site_image',
      'type' => 'image',
    ],
  ],
  'location' => [
    [
      [
        'param' => 'options_page',
        'operator' => '==',
        'value' => 'theme-options',
      ],
    ],
  ],
]);
