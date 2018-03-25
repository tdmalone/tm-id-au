<?php
/**
 * Media related functions for the tm.id.au theme.
 *
 * @author Tim Malone <tdmalone@gmail.com>
 */

/**
 * Gets the best ALT text for an ACF image field.
 *
 * @param array $image_field An ACF image field array, as obtained from get_field().
 * @return string The best ALT text that could be found for the image, falling back to the image's
 *                filename if nothing else is available.
 */
function tm_get_alt_text( $image_field ) {

  $alt_text = (
    $image_field['alt'] ?:
    $image_field['caption'] ?:
    $image_field['description'] ?:
    $image_field['title'] ?:
    $image_field['filename']
  );

  return $alt_text;

}
