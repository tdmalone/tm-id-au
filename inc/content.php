<?php
/**
 * Content related functionality for tm.id.au theme.
 *
 * @author Tim Malone <tdmalone@gmail.com>
 */

function tm_read_more_excerpt( $excerpt ) {

  $excerpt = preg_replace( '/<\/?p>/', '', trim( $excerpt ) );
  $more_dots = '&hellip;';
  $more_link = '<a class="more-link" href="' . get_permalink() . '">read more</a>';

  return wpautop( $excerpt . $more_dots . ' ' . $more_link );

}

add_filter( 'excerpt_more', '__return_empty_string' );
add_filter( 'the_excerpt', 'tm_read_more_excerpt' );
