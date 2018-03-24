<?php
/**
 * Sidebar for tm.id.au WordPress theme.
 *
 * @author Tim Malone <tdmalone@gmail.com>
 */

$sidebar_contents = tm_get_dynamic_sidebar( 'sidebar' );

if ( $sidebar_contents ) {
  ?>

  <aside class="sidebar">
    <?php echo $sidebar_contents; ?>
  </aside>

  <?php
}
