<?php

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
