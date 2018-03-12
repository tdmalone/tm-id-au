<?php
/**
 * Footer for tm.id.au WordPress theme.
 *
 * @author Tim Malone <tdmalone@gmail.com>
 */

?>

        <div class="pagination">
          <?php posts_nav_link(); ?>
        </div>

      </main>

      <?php get_sidebar(); ?>

      <footer>
        <?php dynamic_sidebar( 'footer' ); ?>
      </footer>

      <?php wp_footer(); ?>

    </div> <!-- .page-wrapper -->
  </body>
</html>
