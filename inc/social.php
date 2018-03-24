<?php
/**
 * Social media integrations for tm.id.au WordPress theme.
 *
 * @author Tim Malone <tdmalone@gmail.com>
 */

/**
 * Adds additional contact methods to user profiles for common social media accounts.
 *
 * @param array $contact_methods An associative array of contact methods as provided by the
 *                               user_contactmethods filter.
 * @return array The same as the input array, with additional social media contact methods added.
 */
function tm_user_contact_methods( $contact_methods ) {

  $contact_methods['twitter'] = __( 'Twitter', 'tm-id-au' );
  $contact_methods['facebook'] = __( 'Facebook', 'tm-id-au' );
  $contact_methods['linkedin'] = __( 'LinkedIn', 'tm-id-au' );
  $contact_methods['github'] = __( 'GitHub', 'tm-id-au' );
  $contact_methods['instagram'] = __( 'Instagram', 'tm-id-au' );
  $contact_methods['stackoverflow'] = __( 'StackOverflow', 'tm-id-au' );
  $contact_methods['lastfm'] = __( 'last.fm', 'tm-id-au' );

  return $contact_methods;

} // Function tm_user_contact_methods.

add_filter( 'user_contactmethods','tm_user_contact_methods' );
