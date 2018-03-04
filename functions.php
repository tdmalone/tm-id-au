<?php
/**
 * Functions file for tm.id.au WordPress theme.
 *
 * In general, this file is pretty simple - it just sets some constants and glob requires every
 * file in /inc.
 *
 * @author Tim Malone <tdmalone@gmail.com>
 */

global $wp_filesystem;
$package_json = json_decode( $wp_filesystem->get_contents( __DIR__ . '/package.json' ) );

define( 'TM_VERSION', $package_json->version );
define( 'TM_GTM_ID', 'GTM-TS276L' );

// Find and require each functions file in inc/.
foreach ( glob( __DIR__ . '/inc/*.php' ) as $filename ) {
  require_once( $filename );
}
