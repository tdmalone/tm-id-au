<?php
/**
 * Assorted theme utilities and functions.
 *
 * @author Tim Malone <tdmalone@gmail.com>
 */

/**
 * Gets, rather than echos, the contents of a 'dynamic sidebar' (i.e. widget area).
 * Polyfills the lack of a get_dynamic_sidebar() function in WordPress core.
 *
 * @param integer $index The name or ID of the dynamic sidebar to get (just like dynamic_sidebar()).
 * @see https://core.trac.wordpress.org/ticket/13169#comment:1
 */
function tm_get_dynamic_sidebar( $index = 1 ) {
  ob_start();
  dynamic_sidebar( $index );
  return ob_get_clean();
}

/**
 * A simple utility function to make a Google Fonts URL from a collection of desired font names and
 * styles/weights.
 *
 * @param array $fonts An associative array, with font names as keys and indexed arrays, of styles
 *                     and weights, as values. Styles and weights are are in the format eg. '400' or
 *                     '700i'.
 * @return string A Google Fonts stylesheet URL combining the requested fonts and styles.
 */
function tm_get_google_font_query( $fonts ) {

  $font_query = array_map( function( $key, $values ) {
    return $key . ':' . join( ',', $values );
  }, array_keys( $fonts ), $fonts );

  return 'https://fonts.googleapis.com/css?family=' . join( '|', $font_query );

}
