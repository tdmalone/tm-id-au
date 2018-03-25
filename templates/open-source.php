<?php
/**
 * Template Name: Open Source
 */

$github_username = 'tdmalone';

get_header();
the_content();

// Return the footer now if we don't have any additional information.
if ( ! function_exists( 'get_field' ) || ! get_field( 'open_source_projects' ) ) {
  return get_footer();
}

$projects = (array) get_field( 'open_source_projects' );

// Sort projects by name.
usort( $projects, function ( $a, $b ) {
  return strcasecmp( $a['project_name'], $b['project_name'] ) > 0;
});

?>

<dl>
  <?php
  foreach ( $projects as $project ) {

    // Turn tech stack list into strings.
    $project['tech_stack'] = array_map( function( $item ) {
      return $item['technology'];
    }, $project['tech_stack'] );

    // Alphabetically sort tech stack.
    asort( $project['tech_stack'], SORT_FLAG_CASE | SORT_NATURAL );

    $project_url = 'https://github.com/' . $github_username . '/' . $project['project_name'];

    ?>
    <dt>
      <a href="<?php echo esc_url( $project_url ); ?>">
        <?php echo $project['project_name']; ?>
      </a>
    </dt>

    <dd>

      <?php if ( $project['description'] ) { ?>
        <span class="description">
          <?php echo $project['description']; ?>
        </span>
      <?php } ?>

      <?php if ( count( $project['tech_stack'] ) ) { ?>
        <span class="tech-stack">
          <?php echo join( ', ', $project['tech_stack'] ); ?>
        </span>
      <?php } ?>

      <?php if ( $project['license'] ) { ?>
        <span class="license">
          <?php echo $project['license']; ?>
        </span>
      <?php } ?>

    </dd>
    <?php
  } // Foreach projects.
  ?>
</dl>

<?php

get_footer();
