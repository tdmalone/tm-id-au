<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>

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
