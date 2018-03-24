<?php
/**
 * Content related functionality for tm.id.au theme.
 *
 * @author Tim Malone <tdmalone@gmail.com>
 */

/**
 * Provides a 'read more' link, in addition to an ellipsis (...). Designed to be hooked to the
 * excerpt_more filter.
 *
 * @param string $read_more The existing 'read more' text, which we ignore.
 * @return string An ellipsis, plus a link to read more of the current post.
 */
function tm_read_more_excerpt( $read_more ) {

  $more_dots = '&hellip;';
  $more_link = '<a class="more-link" href="' . get_permalink() . '">read more</a>';

  return $more_dots . ' ' . $more_link;

}

add_filter( 'excerpt_more', 'tm_read_more_excerpt' );
