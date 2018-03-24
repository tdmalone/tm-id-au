<?php
/**
 * Default index template for tm.id.au WordPress theme.
 *
 * @author Tim Malone <tdmalone@gmail.com>
 */

get_header();

// No posts? Just get the footer and bow out now.
if ( ! have_posts() ) {
  return get_footer();
}

// Ensure that an <h1> will be shown in every case that isn't already handled.
// Front-page-not-paged is handled in the header, and singular is handled below.
if ( ( ! is_singular() && ! is_front_page() ) || ( is_front_page() && is_paged() ) ) {

  $title = wp_title( '', false );

  // If Yoast is running, massage title for display, since we're probably not really meant to be
  // using wp_title() anyway.
  if ( class_exists( 'WPSEO_Option_Titles') ) {

    $separator_options = WPSEO_Option_Titles::get_instance()->get_separator_options();
    $separator = $separator_options[ get_option( 'wpseo_titles' )['separator'] ];

    $title = str_replace( get_bloginfo( 'name' ), '', $title );
    $title = trim( $title );
    $title = preg_replace( '/(^' . $separator . '|' . $separator .'$)/', '', $title );

  }

  ?>
  <h1><?php echo $title; ?></h1>
  <?php
}

while ( have_posts() ) {
  the_post();
  ?>

  <article <?php post_class(); ?>>
    <?php

    // If we have a template part for this post's format, use that.
    // Otherwise, we default to the standard template.
    $post_format = get_post_format() ?: 'standard';
    $template_exists = locate_template( 'content/format-' . $post_format . '.php' );
    $template_part = $template_exists ? $post_format : 'standard';
    get_template_part( 'content/format', $template_part );

    ?>
  </article>

  <?php
} // While have_posts.

get_footer();
