<?php
/**
 * Main configuration file for tm.id.au WordPress theme.
 * Includes theme setup functions, asset enqueues, etc.
 *
 * @author Tim Malone <tdmalone@gmail.com>
 */

// If you update this, also update $page-width in /src/sass/abstracts/_master.scss
// @see https://codex.wordpress.org/Content_Width.
if ( ! isset( $content_width ) ) {
  $content_width = 960;
}

/**
 * Adds theme support for common features such as post formats, thumbnails and feed links.
 *
 * @return void
 */
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

/**
 * Enqueues styles and scripts required by the theme.
 *
 * @return void
 */
function tm_enqueue_assets() {

  $fonts = [

    'Karma' => [
      '400',
      '400i',
      '700',
      '700i',
    ],

  ];

  wp_enqueue_style(
    'tm-fonts', tm_get_google_font_query( $fonts ), [], TM_VERSION
  );

  wp_enqueue_script(
    'tm-bundle', get_template_directory_uri() . '/dist/bundle.js', [], TM_VERSION, true
  );

}

add_action( 'wp_enqueue_scripts', 'tm_enqueue_assets' );
