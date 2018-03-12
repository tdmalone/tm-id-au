<?php
/**
 * Standard post format template. Applies to any post without an explicit format set, and can
 * generally also be used for other formats if a more specific template is not available.
 *
 * @author Tim Malone <tdmalone@gmail.com>
 */

if ( is_singular() ) {
  ?>

  <h1>
    <?php the_title(); ?>
  </h1>

  <?php
} else {
  ?>

  <h2>
    <a href="<?php the_permalink(); ?>">
      <?php the_title(); ?>
    </a>
  </h2>

<?php

}

if ( ! is_page() ) {
  ?>

  <div class="meta">
    <span class="date"><?php echo get_the_date(); ?></span>
    <span class="time"><?php the_time(); ?></span>
    <span class="category"><?php the_category(); ?></span>
    <span class="tags"><?php the_tags(); ?></span>
    <span class="format"><?php echo get_post_format(); ?></span>
  </div>

  <?php
}

if ( has_post_thumbnail() ) {
  ?>

  <figure>
    <?php the_post_thumbnail(); ?>
  </figure>

  <?php
}
?>

<div class="content">
  <?php the_content(); ?>
</div>
