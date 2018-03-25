<?php
/**
 * Header for tm.id.au WordPress theme.
 *
 * @author Tim Malone <tdmalone@gmail.com>
 */

$site_image_field = get_field( 'site_image', 'options' );

if ( $site_image_field ) {
  $image_source = $site_image_field['sizes']['thumbnail'];
  $alt_text = tm_get_alt_text( $site_image_field );
  $site_image = '<img src="' . $image_source . '" alt="' . $alt_text . '" />';
}

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <?php wp_head(); ?>
    <meta name="viewport" content="width=device-width" />
  </head>
  <body <?php body_class(); ?> style="opacity: 0;">

    <?php tm_add_google_tag_manager_body(); ?>

    <div class="page-wrapper">
      <header>

        <figure class="logo">

          <?php if ( is_front_page() && ! is_paged() ) { ?>

            <h1 class="site-heading">
              <?php
              if ( isset( $site_image ) ) {
                echo $site_image;
              }

              bloginfo();
              ?>
            </h1>

          <?php } else { ?>

            <div class="site-heading">
              <a href="<?php echo home_url(); ?>">
                <?php
                if ( isset( $site_image ) ) {
                  echo $site_image;
                }

                bloginfo();
                ?>
              </a>
            </div>

          <?php } ?>

        </figure> <!-- .logo -->

        <nav>
          <?php
          wp_nav_menu([
            'theme_location' => 'main-menu',
          ]);
          ?>
        </nav>

        <?php dynamic_sidebar( 'header' ); ?>

      </header>
      <main>
