<?php
/**
 * Assorted functions that modify WordPress admin behaviour for the tm.id.au theme.
 *
 * @author Tim Malone <tdmalone@gmail.com>
 */

/**
 * Adds custom folders/files to the Theme Check exclusion list (works only on a custom modified
 * version of Theme Check).
 *
 * @param array $exclusions The default exclusions list as provided by Theme Check (modified).
 * @return array The exclusions list with our additions.
 * @see https://github.com/tdmalone/theme-check-tdmalone
 */
function tm_theme_check_exclusions( $exclusions ) {

  // Exclude Jest coverage reports.
  $exclusions[] = 'coverage/';

  return $exclusions;

}

add_filter( 'tm_theme_check_exclusions', 'tm_theme_check_exclusions' );
