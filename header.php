<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
    <?php tm_add_google_tag_manager_body(); ?>

    <header>

      <?php wp_title(); ?>

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
