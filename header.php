<?php
/**
 * Header for tm.id.au WordPress theme.
 *
 * @author Tim Malone <tdmalone@gmail.com>
 */

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
              <?php bloginfo(); ?>
            </h1>

          <?php } else { ?>

            <div class="site-heading">
              <a href="<?php echo home_url(); ?>">
                <?php bloginfo(); ?>
              </a>
            </div>

          <?php } ?>

        </figure>

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
