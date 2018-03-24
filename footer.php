<?php
/**
 * Footer for tm.id.au WordPress theme.
 *
 * @author Tim Malone <tdmalone@gmail.com>
 */

?>

        <?php

        $pagination = get_posts_nav_link();

        if ( $pagination ) {
          ?>
          <div class="pagination">
            <?php echo $pagination; ?>
          </div>
          <?php
        }
        ?>

      </main>

      <?php

      get_sidebar();

      $footer_contents = tm_get_dynamic_sidebar( 'footer' );

      if ( $footer_contents ) {
        ?>
        <footer>
          <?php echo $footer_contents; ?>
        </footer>
        <?php
      }

      wp_footer();

      ?>

    </div> <!-- .page-wrapper -->
  </body>
</html>
