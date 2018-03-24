<?php
/**
 * Functions file for tm.id.au WordPress theme.
 *
 * In general, this file is pretty simple - it just sets some constants and glob requires every
 * file in /inc.
 *
 * @author Tim Malone <tdmalone@gmail.com>
 */

// Despite WordPress standards asking us not to use file system reads here, the purpose of that
// rule doesn't apply for a simple read, as it the filesystem API is mainly for writing files.
// @see https://wordpress.stackexchange.com/a/166172/46066
// phpcs:ignore WordPress.WP.AlternativeFunctions
$package_json = json_decode( file_get_contents( __DIR__ . '/package.json' ) );

define( 'TM_VERSION', $package_json->version );
define( 'TM_GTM_ID', 'GTM-TS276L' );

// Find and require each functions file in inc/.
foreach ( glob( __DIR__ . '/inc/*.php' ) as $filename ) {
  require_once( $filename );
}
