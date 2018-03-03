<?php

register_sidebar([
  'name'          => __( 'Sidebar', 'tm-id.au' ),
  'id'            => 'sidebar',
  'description'   => __( 'Displayed on the side of site content, or below on mobile.', 'tm-id-au' ),
  'before_widget' => '<div id="%1$s" class="widget %2$s">',
  'after_widget'  => '</div>',
  'before_title'  => '<h2 class="widgettitle">',
  'after_title'   => '</h2>'
]);

register_sidebar([
  'name'          => __( 'Header', 'tm-id.au' ),
  'id'            => 'header',
  'description'   => __( 'Displayed alongside the menu in the header, or underneath the logo on mobile.', 'tm-id-au' ),
  'before_widget' => '<div id="%1$s" class="widget %2$s">',
  'after_widget'  => '</div>',
  'before_title'  => '<h2 class="widgettitle">',
  'after_title'   => '</h2>'
]);

register_sidebar([
  'name'          => __( 'Footer', 'tm-id.au' ),
  'id'            => 'footer',
  'description'   => __( 'Displayed along the bottom of the page, or at the bottom of the page on mobile.', 'tm-id-au' ),
  'before_widget' => '<div id="%1$s" class="widget %2$s">',
  'after_widget'  => '</div>',
  'before_title'  => '<h2 class="widgettitle">',
  'after_title'   => '</h2>'
]);
