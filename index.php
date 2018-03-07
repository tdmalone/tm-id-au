<?php
/**
 * Default index template for tm.id.au WordPress theme.
 *
 * @author Tim Malone <tdmalone@gmail.com>
 */

get_header();

// No posts? Just get the footer and bow out now.
if ( ! have_posts() ) {
  return get_footer();
}

// Ensure that an <h1> will be shown in every case that isn't already handled.
// Front page not paged is handled in the header, and singular is handled below.
if ( ( ! is_singular() && ! is_front_page() ) || ( is_front_page() && is_paged() ) ) {
  // TODO: A title is not being shown for paged front page, even though it is available in the title tag...
  ?>
  <h1><?php echo wp_title( '' ); ?></h1>
  <?php
}

while ( have_posts() ) {
  the_post();
  ?>

  <article <?php post_class(); ?>>

    <?php if ( is_singular() ) { ?>

      <h1>
        <?php the_title(); ?>
      </h1>

    <?php } else { ?>

      <h2>
        <a href="<?php the_permalink(); ?>">
          <?php the_title(); ?>
        </a>
      </h2>

    <?php } ?>

    <div class="meta">
      <span class="date"><?php the_date(); ?></span>
      <span class="time"><?php the_time(); ?></span>
      <span class="category"><?php the_category(); ?></span>
      <span class="tags"><?php the_tags(); ?></span>
      <span class="format"><?php echo get_post_format(); ?></span>
    </div>

    <figure>
      <?php the_post_thumbnail(); ?>
    </figure>

    <div>
      <?php the_content(); ?>
    </div>

  </article>

  <?php
}

get_footer();
