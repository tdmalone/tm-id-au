<?php

define( 'TM_VERSION', json_decode( file_get_contents( __DIR__ . '/package.json' ) )->version );
define( 'TM_GTM_ID', 'GTM-TS276L' );

// Find and require each functions file in inc/.
foreach ( glob( __DIR__ . '/inc/*.php' ) as $filename ) {
  require_once( $filename );
}
