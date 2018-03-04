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
  </head>
  <body <?php body_class(); ?>>
    <?php tm_add_google_tag_manager_body(); ?>

    <header>

      <figure class="logo">

        <?php if ( is_front_page() ) { ?>

          <h1>
            <?php bloginfo(); ?>
          </h1>

        <?php } else { ?>

          <a href="<?php echo home_url(); ?>">
            <?php bloginfo(); ?>
          </a>

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
