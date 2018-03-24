<?php
/**
 * Image post format template. Intended to display an image, a caption, and not much else.
 *
 * @author Tim Malone <tdmalone@gmail.com>
 */

?>

<figure>

  <?php the_post_thumbnail(); ?>

  <figcaption>
    <?php the_content(); ?>
  </figcaption>

</figure>

<div class="meta">
  <?php echo get_the_date(); ?>
  <?php the_time(); ?>
</div>
