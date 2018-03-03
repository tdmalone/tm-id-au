<?php

get_header();

if ( have_posts() ) {
  while ( have_posts() ) {
    the_post();
    ?>

    <article <?php post_class(); ?>>

      <h2>
        <a href="<?php the_permalink(); ?>">
          <?php the_title(); ?>
        </a>
      </h2>

      <?php the_date(); ?>
      <?php the_time(); ?>
      <?php the_category(); ?>
      <?php the_tags(); ?>
      <?php echo get_post_format(); ?>

      <figure>
        <?php the_post_thumbnail(); ?>
      </figure>

      <div>
        <?php the_content(); ?>
      </div>

    </article>

    <?php
  }
}

get_footer();
