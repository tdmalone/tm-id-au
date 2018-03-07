<?php
/**
 * Status post format template. Intended for 'tweet' like posts. Generally quite succinct and
 * compressed, without a title.
 *
 * @author Tim Malone <tdmalone@gmail.com>
 */

?>

<div class="content">
  <?php the_content(); ?>
</div>

<div class="meta">
  <?php echo get_the_date(); ?>
  <?php the_time(); ?>
</div>
