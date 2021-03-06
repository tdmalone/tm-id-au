<?php
/**
 * Tweaks and addons to support use of the Simply Static plugin.
 *
 * TODO: Use a better method for REST-API auth, such as:
 * https://wordpress.org/plugins/jwt-authentication-for-wp-rest-api/
 *
 * @author Tim Malone <tdmalone@gmail.com>
 * @see https://wordpress.org/plugins/simply-static/
 * @see https://developer.wordpress.org/rest-api/extending-the-rest-api/adding-custom-endpoints/
 * @see https://developer.wordpress.org/rest-api/using-the-rest-api/authentication/
 */

/**
 * Hooks into the Simply Static plugin, and starts its static site generation function. Attached to
 * a REST route, this allows the static generation to be called remotely, such as during a CI job.
 * The generation is then run asynchronously in the background by Simply Static.
 *
 * TODO: Add some sort of error handling if the function call doesn't work.
 *
 * @param WP_REST_Request $request Data from the incoming REST API request.
 * @return WP_REST_Response A simple response to the API caller.
 * @see ::tm_ss_rest_route
 * @see https://developer.wordpress.org/reference/classes/wp_rest_request/
 */
function tm_ss_generate( WP_REST_Request $request ) {

  if ( ! is_plugin_active( 'simply-static/simply-static.php' ) ) {
    return new WP_REST_Response([
      'error' => 'Plugin Simply Static is not activated.',
    ], 500 );
  }

  $simply_static = new Simply_Static\Archive_Creation_Job();
  $simply_static->start();

  return new WP_REST_Response([
    'message' => 'Job started.',
  ], 200 );

} // Function tm_simply_static_generate.

/**
 * Adds a custom REST route for invoking the Static Site generation function. The route is locked
 * down to a valid API key being provided via the X-Tm-Api-Key header.
 *
 * @return void
 * @see ::tm_simply_static_generate
 * @see https://developer.wordpress.org/reference/classes/wp_rest_request
 */
function tm_ss_rest_route() {

  $args = [

    'methods'  => 'POST',
    'callback' => 'tm_ss_generate',

    'permission_callback' => function( WP_REST_Request $request ) {
      $api_key = $request->get_header( 'X-Tm-Api-Key' );
      return $api_key && getenv( 'TM_WP_REST_API_TOKEN' ) === $api_key;
    },

  ];

  register_rest_route( 'tm/v1', '/ss/generate', $args );

} // Function tm_ss_rest_route.

add_action( 'rest_api_init', 'tm_ss_rest_route' );

/**
 * Adds a quick link to the WordPress admin bar to invoke the Simply Static generate function in
 * one click. Should be hooked to the admin_bar_menu action. Designed to work alongside the inline
 * JS added by tm_ss_generate_script().
 *
 * @return void
 * @see ::tm_ss_generate_script
 */
function tm_ss_admin_bar() {
  global $wp_admin_bar;

  $args = [
    'id'    => 'tm_ss_generate',
    'title' => 'Generate Static',
    'href'  => admin_url( 'admin.php?page=simply-static&tm-action=ss-generate' ),
  ];

  $wp_admin_bar->add_node( $args );

} // Function tm_ss_admin_bar.

add_action( 'admin_bar_menu', 'tm_ss_admin_bar', 200 );

/**
 * Adds a quick script to simulate a 'click' on the Simply Static plugin's 'Generate' button
 * if the right conditions exist. Should be hooked to the admin_print_scripts action. Designed to
 * work along with the admin bar menu link added by tm_ss_admin_bar().
 *
 * @return void
 * @see ::tm_ss_admin_bar
 */
function tm_ss_generate_script() {

  if ( 'toplevel_page_simply-static' !== get_current_screen()->id ) {
    return;
  }

  if ( ! isset( $_GET['tm-action'] ) || 'ss-generate' !== $_GET['tm-action'] ) {
    return;
  }

  ?>

  <script type="text/javascript">
    window.onload = () => {
      /* global jQuery */
      jQuery( '#generate' ).trigger( 'click' );
    };
  </script>

  <?php
} // Function tm_ss_generate_script.

add_action( 'admin_print_scripts', 'tm_ss_generate_script' );
