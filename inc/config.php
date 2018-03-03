<?php

if ( ! isset ( $content_width ) ) {
  $content_width = 1200;
}

function tm_theme_setup() {

  $post_formats = [
    'aside',
    'gallery',
    'image',
    'audio',
    'video',
    'quote',
    'link',
    'status',
    'chat',
  ];

  add_theme_support( 'automatic-feed-links' );
  add_theme_support( 'post-formats', $post_formats );
  add_theme_support( 'post-thumbnails' );
  add_theme_support( 'title-tag' );

  load_theme_textdomain( 'tm-id-au', get_template_directory() . '/languages' );

  register_nav_menus([
    'main-menu' => __( 'Main Menu', 'tm-id-au' ),
  ]);

} // Function tm_theme_setup.

add_action( 'after_setup_theme', 'tm_theme_setup' );

function tm_enqueue_assets() {

  wp_enqueue_style( 'tm-fonts', 'https://fonts.googleapis.com/css?family=Karma:400,400i,700,700i', [], TM_VERSION );
  wp_enqueue_script( 'tm-bundle', get_template_directory_uri() . '/dist/bundle.js', [], TM_VERSION, true );

}

add_action( 'wp_enqueue_scripts', 'tm_enqueue_assets' );
