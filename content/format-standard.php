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
    <a class="post-link" href="<?php the_permalink(); ?>">
      <?php the_title(); ?>
    </a>
  </h2>

<?php

}

if ( ! is_page() ) {
  ?>

  <div class="meta">

    <span class="date">
      <?php echo get_the_date(); ?>
    </span>

    <span class="time">
      <?php the_time(); ?>
    </span>

    <!-- These sections for later inclusion. -->
    <!--

    <span class="category">
      <?php the_category(); ?>
    </span>

    <span class="tags">
      <?php the_tags(); ?>
    </span>

    -->

    <?php
    $post_format = get_post_format();

    if ( $post_format && 'standard' !== $post_format ) {
      ?>
      <span class="format"><!--
        --><?php echo $post_format; ?><!--
      --></span>
      <?php
    }
    ?>

  </div> <!-- .meta -->

  <?php
}

if ( has_post_thumbnail() ) {
  ?>

  <figure class="post-thumbnail">
    <?php the_post_thumbnail(); ?>
  </figure>

  <?php
}
?>

<div class="content">
  <?php
  if ( is_singular() ) {
    the_content();
  } else {
    the_excerpt();
  }
  ?>
</div>
