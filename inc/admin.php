<?php

add_filter( 'tm_theme_check_exclusions', function( $exclusions ) {

  // Exclude Jest coverage reports.
  $exclusions[] = 'coverage/';

  return $exclusions;

});
